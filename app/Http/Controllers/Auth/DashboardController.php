<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Actu;
use App\Models\Category;
use App\Models\Color;
use App\Models\NextGame;
use App\Models\Payment;
use App\Models\PlayerCategory;
use App\Models\Shop;
use App\Models\Size;
use App\Models\Stade;
use App\Models\StadiumPlace;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\Team;
use App\Models\TeamCategory;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $users = User::all();
        $teams = Team::all();
        $articles = Shop::all();
        $payments = Payment::all();
        $shops = Shop::all();
        $user_views = User::limit(5)->orderBy('id', 'desc')->get();
        $team_views = Team::limit(5)->orderBy('id', 'desc')->get();
        return view('admin.dashboard', compact(
            'users',
            'teams',
            'articles',
            'user_views',
            'team_views',
            'payments',
            'shops',
        ));
    }
    public function users_admin()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $users = User::all();
        return view('admin.users_admin', compact('users'));
    }
    public function nbr_user()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $users = User::all();
        return view('admin.layouts.header', compact('users'));
    }
    public function team_admin()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $teams = Team::all();
        $gardiens = Team::where('post', 'Gardien de but')->orderBy('id', 'desc')->paginate(2);
        $defenses = Team::where('post', 'Defense')->orderBy('id', 'desc')->paginate(2);
        $milieux = Team::where('post', 'Milieu de terrain')->orderBy('id', 'desc')->paginate(2);
        $attaquants = Team::where('post', 'Attaquant')->orderBy('id', 'desc')->paginate(2);
        $staffs = Staff::orderBy('id', 'desc')->paginate(2);
        return view('admin.team-admin', compact(
            'teams',
            'gardiens',
            'defenses',
            'milieux',
            'attaquants',
            'staffs',
        ));
    }
    public function team_admin_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $team_categories = TeamCategory::all();
        $player_categories = PlayerCategory::all();
        $staff_categories = StaffCategory::all();
        return view('admin.team_admin_add', compact('team_categories', 'player_categories', 'staff_categories'));
    }
    public function staff_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $staff_categories = StaffCategory::all();
        return view('admin.staff_add', compact('staff_categories'));
    }
    public function actuality_admin()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $actus = Actu::orderBy('id', 'desc')->paginate(4);
        return view('admin.actuality_admin', compact('actus'));
    }
    public function actuality_admin_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.actuality_admin_add');
    }
    // actu update view
    public function actu_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $actu = Actu::findOrFail($id);
        return view('admin.actu_update', compact('actu'));
    }
    // update actu
    public function update_actu(Request $request, $id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $actu = Actu::findOrFail($id);
        $this->validate($request, [
            'u-image' => 'nullable|mimes:png,jpg,jpeg,gif',
            'u-title' => 'required|string',
            'u-desc' => 'required|string',
        ]);
        $imageName = $actu->image;
        if ($request->hasFile('u-image')) {
            if ($imageName) {
                Storage::delete($imageName);
            }
            $image = $request->file('u-image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $image->storeAs('imageActu', $imageName, 'public');
        }
        $actu->update([
            'image' => $request->input('u-image'),
            'title' => $request->input('u-title'),
            'description' => $request->input('u-desc'),
        ]);
        return back()->with('message', 'Mise à jour effectuée avec succès');
    }
    // update profile
    public function update_profile(Request $request)
    {
        if (! Auth::user()) {
            return redirect()->route('home');
        }
        $user = auth()->user();
        $this->validate($request, [
            'u-fname' => 'required|string',
            'u-lname' => 'required|string',
            'u-email' => 'required|email|unique:users,email,' . $user->id,
            'u-password' => 'nullable|min:5',
            'u-password-confirm' => 'nullable',
        ]);
        $password = $request->input('u-password');
        $password_confirm = $request->input('u-password-confirm');

        $user->update([
            'first_name' => $request->input('u-fname'),
            'last_name' => $request->input('u-lname'),
            'email' => $request->input('u-email'),
        ]);

        if ($request->filled('u-password')) {
            if ($password === $password_confirm) {
                $user->update([
                    'password' => Hash::make($password),
                ]);
            } else {
                if ($password_confirm == 0) {
                    return back()->withErrors('Le champs confimation du mot de passe doit être remplit !');
                } else {
                    return back()->withErrors('Le mot de passe doit être identique !');
                }
            }
        } else {
            $request->input('u-password');
            $request->input('u-password-confirm');
        }
        return back()->with('message', 'Modification du profile effectuée avec succès !');
    }
    public function match_admin()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $next_games = NextGame::orderBy('id', 'desc')->paginate(6);
        return view('admin.match_admin', compact('next_games'));
    }
    public function match_admin_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $ticket_categories = TicketCategory::all();
        return view('admin.match_admin_add', compact('ticket_categories'));
    }
    // match update
    public function match_admin_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $match = NextGame::findOrFail($id);
        return view('admin.match_admin_update', compact('match'));
    }
    // update match
    public function update_match(Request $request, $id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $next_game = NextGame::findOrFail($id);
        $this->validate($request, [
            'u-home-team' => 'required|string',
            'u-visitor-team' => 'required|string',
            'u-type' => 'required|string',
            'u-location' => 'required|string',
            'u-date' => 'required|string',
            'u-hour' => 'required|string',
            'u-desc' => 'required|string',
        ]);
        $next_game->update([
            'home_team' => $request->input('u-home-team'),
            'visitor_team' => $request->input('u-visitor-team'),
            'match_type' => $request->input('u-type'),
            'match_location' => $request->input('u-location'),
            'match_date' => $request->input('u-date'),
            'match_hour' => $request->input('u-hour'),
            'match_description' => $request->input('u-desc'),
        ]);
        return redirect()->route('match_admin');
    }
    // delete match
    public function delete_match($id)
    {
        $match = NextGame::findOrFail($id);
        $match->delete();
        return back()->with('message', 'Suppression effectuée avec succès !');
    }
    public function shop_admin_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $sizes = Size::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.shop_admin_add', compact('sizes', 'categories', 'colors'));
    }
    public function shop_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $article = Shop::findOrFail($id);
        $sizes = Size::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.shop_update', compact('article', 'sizes', 'categories', 'colors'));
    }
    public function update_shop(Request $request, $id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $article = Shop::findOrFail($id);
        $this->validate($request, [
            'u-category' => 'required|in:Maillot,T-shirt',
            'u-name' => 'required|string',
            'u-size' => 'required|array',
            'u-size.*' => 'required|string|distinct',
            'u-color' => 'required|array',
            'u-color.*' => 'required|string|distinct',
            'u-price' => 'required',
            'u-image' => 'required|mimes:png,jpg,jpeg,gif',
        ]);
        if ($request->hasFile('u-image')) {
            $image = $request->file('u-image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('imageShop', $imageName, 'public');
        }
        $size = implode(', ', $request->input('u-size', []));
        $color = implode(', ', $request->input('u-color', []));
        $article->update([
            'category' => $request->input('u-category'),
            'name' => $request->input('u-name'),
            'size' => $size,
            'color' => $color,
            'price' => $request->input('u-price'),
            'image' => $imageName,
        ]);
        return back()->with('message', 'Mise à jour effectuée avec succès !');
    }
    public function ticket_shop($id)
    {
        if(!auth::user()) {
            return redirect()->route('home');
        }
        $match = NextGame::findOrFail($id);
        return view('user.ticket_shop', compact('match'));
    }
    public function ticket_detail($id)
    {
        if(!auth::user()) {
            return redirect()->route('home');
        }
        $match = NextGame::findOrFail($id);
        $stadium_place = StadiumPlace::all();
        return view('user.ticket_detail', compact('match', 'stadium_place'));
    }
}
