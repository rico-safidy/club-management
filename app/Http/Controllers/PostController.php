<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Actu;
use App\Models\Actus;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use Symfony\Contracts\Service\Attribute\Required;

use function Laravel\Prompts\password;

class PostController extends Controller
{
    // send email
    public function sendEmail(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);
        
        $to = 'ricosafidy@gamil.com';
        $title = 'Nouveau message';
        $content = 'Message de ' . $req->input('name');
        $sms = $req->input('message');

        Mail::to($to)->send(new sendEmail($title, $content, $sms));

        return view('user.contact')->with('message', 'Votre message a été envoyé !');
    }
    // signup
    public function inscription(Request $req)
    {
        $this->validate($req, [
            'lname' => 'required',
            'lname' => 'nullable',
            'email' => 'required | email | unique:users',
            'password' => 'required',
            'password-confirm' => 'required'
        ]);
        $password = $req->input('password');
        $passwordConfirm = $req->input('password-confirm');

        $user = new User();
        if (strlen($password) >= 5) {
            if ($password === $passwordConfirm) {
                $user->first_name = $req->input('fname');
                $user->last_name = $req->input('lname');
                $user->email = $req->input('email');
                $user->password = password_hash($req->input('password'), PASSWORD_DEFAULT);
                $user->statut = 'user';
                $user->save();
                return redirect()->Route('login');
            } else {
                return back()->withErrors('Mot de passe non identique !');
            }
        } else {
            return back()->withErrors('Le mot de passe doit avoir au moins 5 caracteres.');
        }
    }
    // login
    public function connexion(Request $req)
    {
        $this->validate($req, [
            'email' => 'required | email',
            'password' => 'required',
        ]);
        $user = User::where('email', $req->input('email'))->first();
        if ($user) {
            if (password_verify($req->input('password'), $user->password)) {
                Session::put('user', $user);
                Auth::login($user);
                if ($user->statut === 'user') {
                    return redirect()->route('home');
                } elseif ($user->statut === 'admin') {
                    return redirect()->route('dashboard');
                }

            } else {
                return back()->withErrors('Mot de passe incorect');
            }
        } else {
            return back()->withErrors("Vous n'avez pas de compte! Veuillez vous inscrire");
        }
    }
    // logout
    public function logout()
    {
        Session::forget('user');
        Auth::logout('user');
        Session::forget('cart');
        return redirect()->route('login');
    }
    // insert actu
    public function insert_actu(Request $req)
    {
        $this->validate($req, [
            'image' => 'required | image | mimes:jpeg,jpg,png,gif',
            'title' => 'required | string',
            'desc' => 'required | string'
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('imageActu', $imageName, 'public');
        }
        $actu = new Actu();
        $actu->image = $imageName;
        $actu->title = $req->input('title');
        $actu->description = $req->input('desc');
        $actu->save();
        return redirect()->Route('actuality_admin');
    }
    // Delete actu
    public function delete_actu($id)
    {
        $actu = Actu::findOrFail($id);
        $actu->delete();
        return back();
    }

}
