<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Shop;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use Session;

use PDF;

class StripeController extends Controller
{
    // pay
    public function pay(Request $request)
    {
        $this->validate($request, [
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|email',
            'adress' => 'required',
            'phone' => 'required',
            'stripe-token' => 'required',
            'final-price' => 'required',
            'order' => 'required',
        ]);
        $price = $request->input('final-price');
        $token = $request->input('stripe-token');

        if (!Session::has('cart')) {
            return view('user.checkout')->with('message', 'Panier vide !');
        }

        Stripe::setApiKey(
            'sk_test_51PSYkJP76SRag7Wh3u9JmYfoWBXMLHXCTLnDgmk1TUjnvHbR2VxrKMrUgSVXBIISZM0Krg8i9foZCo7TFNfanNUa00Qq54LGVA'
        ); // secret key

        try {
            $charge = Charge::create(array(
                'amount' => intval($price) * 100,
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Test Payment avec Laravel',
            ));
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error',$e->getMessage());
        }

        $cart = json_decode($request->input('order'), true);
        $qty = [];
        $name = [];
        $size = [];
        $color = [];
        $price = [];

        foreach ($cart as $item) {
            $qty[] = $item['number'];
            $name[] = $item['article'];
            $size[] = $item['size'];
            $color[] = $item['color'];
            $price[] = $item['price'];
        }

        $random_number = rand(10000, 99999);

        $payment = Payment::create([
            'stripe_charge_id' => $charge->id,
            'invoice_number' => $random_number,
            'article_number' => json_encode($qty),
            'article_name' => json_encode($name),
            'article_size' => json_encode($size),
            'article_color' => json_encode($color),
            'article_number' => count($cart),
            'article_price' => json_encode($price),
            'article_final_price' => json_encode($price),
            'customer_name' => $request->input('card-name'),
            'customer_adress' => $request->input('adress'),
        ]);

        // Générer le PDF de la facture
        $pdf = PDF::loadView('vendor.invoice', ['payment' => $payment, 'articles' => $cart]);

        // Retourner le PDF comme téléchargement
        Session::forget('cart');

        return $pdf->download('facture_' . $payment->invoice_number . '.pdf');
        return redirect()->route('checkout')->with('message', 'Achat effectuée avec succçès !');
    }

    // donate
    public function donate(Request $request)
    {
        $this->validate($request, [
            'stripe-token' => 'required',
            'sum' => 'required',
        ]);

        $stripeToken = $request->input('stripe-token');
        $sum = $request->input('sum');

        Stripe::setApiKey(
            'sk_test_51PSYkJP76SRag7Wh3u9JmYfoWBXMLHXCTLnDgmk1TUjnvHbR2VxrKMrUgSVXBIISZM0Krg8i9foZCo7TFNfanNUa00Qq54LGVA'
        ); // secret key

        try {
            $charge = Charge::create(array(
                'amount' => intval($sum) * 100,
                'currency' => 'usd',
                'source' => $stripeToken,
                'description' => 'Test Don avec Laravel',
            ));
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        return view('user.donate_checkout')->with('message', 'Donation effectué avec succès, Merci pour votre soutien !');
    }
}
