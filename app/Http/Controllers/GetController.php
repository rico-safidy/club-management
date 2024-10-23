<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use App\Models\Category;
use App\Models\Color;
use App\Models\NextGame;
use App\Models\Palmares;
use App\Models\Payment;
use App\Models\PlayerCategory;
use App\Models\Shop;
use App\Models\Size;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\Team;
use App\Models\TeamCategory;
use App\Models\Trophy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GetController extends Controller
{
    //
    public function home()
    {
        $actus = Actu::orderBy('id', 'desc')->get();
        $next_games = NextGame::where('match_date', '>=', Carbon::now())
        ->orderBy('match_date', 'asc')
        ->get();
        $palmares = Palmares::all();
        $trophies = Trophy::orderBy('number_trophy', 'desc')->get();
        return view('user.welcome', compact('actus', 'next_games', 'palmares', 'trophies'));
    }
    public function actu($id)
    {
        $actu = Actu::where('id', $id)->first();
        return view('user.actuality', compact('actu'));
    }
    public function match($id)
    {
        $match = NextGame::findOrFail($id);
        return view('user.match-detail', compact('match'));
    }
    public function team()
    {
        $teams = Team::orderBy('number', 'asc')->get();
        $staffs = Staff::orderBy('id', 'desc')->get();
        return view('user.team', compact('teams', 'staffs'));
    }
    public function team_detail($id)
    {
        $team = Team::where('id', $id)->first();
        $staff = Staff::where('id', $id)->first();
        return view('user.team_detail', compact('team', 'staff'));
    }
    public function login()
    {
        if (Auth::user()) {
            return back();
        }
        return view('user.login');
    }
    public function signin()
    {
        if (Auth::user()) {
            return back();
        }
        return view('user.signin');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function profile()
    {
        if (! Auth::user()) {
            return redirect()->route('home');
        }
        return view('user.profile');
    }
    public function profile_update()
    {
        if (! Auth::user()) {
            return redirect()->route('home');
        }
        $user = auth()->user();
        return view('user.profile_update', compact('user'));
    }
    public function shop()
    {
        $articles = Shop::all();
        $categories = Category::all();
        return view('user.shop', compact('articles', 'categories'));
    }
    public function shop_collection()
    {
        $articles = Shop::all();
        return view('user.shop_collection', compact('articles'));
    }
    public function shop_collection_detail($id)
    {
        $article = Shop::where('id', $id)->first();
        return view('user.shop_collection-detail', compact('article'));
    }
    public function checkout()
    {
        if(!Session('user')) {
            return redirect()->route('login')->withErrors('Vous devez être connecter pour proceder au paument !');
        }
        return view('user.checkout');
    }
    public function not_found()
    {
        return view('errors.not_found');
    }
    public function donation_checkout()
    {
        return view('user.donate_checkout');
    }
    public function invoice($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $payment = Payment::findOrFail($id);

        $article_name = json_decode($payment->article_name, true);
        $article_size = json_decode($payment->article_size, true);
        $article_color = json_decode($payment->article_color, true);
        $article_number = json_decode($payment->article_number, true);
        $article_price = json_decode($payment->article_price, true);

        $articles = [];
        foreach ($article_name as $index => $name) {
            $size = $article_size[$index] ?? 'N/A';
            $color = $article_color[$index] ?? 'N/A';
            $number = $article_number[$index] ?? 0;
            $price = $article_price[$index] ?? 0;

            $articles[] = [
                'article_name' => $name,
                'article_size' => $size,
                'article_color' => $color,
                'article_number' => $number,
                'article_price' => $price,
            ];
        }

        return view('vendor.invoice', compact('payment', 'articles'));
    }
}
