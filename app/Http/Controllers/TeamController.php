<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PlayerCategory;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    // insert team
    public function insert_team(Request $req)
    {
        $this->validate($req, [
            'fname' => 'required | string',
            'lname' => 'required | string',
            'birth-date' => 'required | string',
            'birth-place' => 'required | string',
            'profile' => 'required | image | mimes:jpeg,jpg,png,jfif',
            'pseudo' => 'required | string',
            'number' => 'required',
            'post' => 'required',
        ]);
        if ($req->hasFile('profile')) {
            $image = $req->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('imageTeam', $imageName, 'public');
        }
        $team_number = Team::where('number', $req->input('number'))->first();
        if (!$team_number) {
            $today = date('Y-m-d');
            if ($req->input('birth-date') <= $today) {
                $team = new Team();
                $team->first_name = $req->input('fname');
                $team->last_name = $req->input('lname');
                $team->birth_date = $req->input('birth-date');
                $team->birth_place = $req->input('birth-place');
                $team->profile = $imageName;
                $team->pseudo = $req->input('pseudo');
                $team->number = $req->input('number');
                $team->post = $req->input('post');
                $team->save();
                return redirect()->Route('team_admin');
            } else {
                return back()->withErrors('La date de naissance n\'est pas validée !');
            }
        } else {
            return back()->withErrors("Ce numéro est dejà existé");
        }
    }
    // insert staff
    public function insert_staff(Request $req)
    {
        $this->validate($req, [
            'fname' => 'required | string',
            'lname' => 'required | string',
            'birth-date' => 'required | string',
            'birth-place' => 'required | string',
            'profile' => 'required | image | mimes:jpeg,jpg,png',
            'pseudo' => 'required | string',
            'post' => 'required',
        ]);
        if ($req->hasFile('profile')) {
            $image = $req->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('imageTeam', $imageName, 'public');
        }
        $today = date('Y-m-d');
        if ($req->input('birth-date') <= $today) {
            $team = new Staff();
            $team->first_name = $req->input('fname');
            $team->last_name = $req->input('lname');
            $team->birth_date = $req->input('birth-date');
            $team->birth_place = $req->input('birth-place');
            $team->profile = $imageName;
            $team->pseudo = $req->input('pseudo');
            $team->post = $req->input('post');
            $team->save();
            return redirect()->Route('team_admin');
        } else {
            return back()->withErrors('La date de naissance n\'est pas validée !');
        }
    }
    // delete team
    public function delete_team($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return back();
    }
    // category
    public function team_category()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $categories = TeamCategory::all();
        $playerCategories = PlayerCategory::all();
        $staffCategories = StaffCategory::all();
        return view('admin.team_category', compact('categories', 'playerCategories', 'staffCategories'));
    }
    // category add
    public function team_category_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.team_category_add');
    }
    // insert category
    public function insert_team_category(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|string',
        ]);
        $category_exist = TeamCategory::where('name', $request->input('category'))->first();
        $category = new TeamCategory();
        if ($category_exist !== $request->input('category')) {
            $category->name = $request->input('category');
            $category->save();
            return redirect()->route('team_category');
        } else {
            return back()->withErrors('Cet categorie est dejà existé !');
        }
    }
    // delete category
    public function delete_team_category($id)
    {
        $category = TeamCategory::findOrFail($id);
        $category->delete();
        return back();
    }
    // team update view
    public function team_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $team = Team::findOrFail($id);
        $team_categories = TeamCategory::all();
        $player_categories = PlayerCategory::all();
        $staff_categories = StaffCategory::all();
        return view('admin.team_update', compact('team', 'team_categories', 'player_categories', 'staff_categories'));
    }
    // update team
    public function update_team(Request $req, $id)
    {
        $team = Team::findOrFail($id);
        $this->validate($req, [
            'u-fname' => 'nullable',
            'u-lname' => 'nullable',
            'u-birth-date' => 'nullable',
            'u-birth-place' => 'nullable',
            'u-profile' => 'nullable',
            'u-pseudo' => 'nullable',
            'u-number' => [
                'required',
                'integer',
                Rule::unique('teams', 'number')->ignore($team->id),
            ],
            'u-post' => 'required',
        ]);
        $imageName = $team->profile;
        if ($req->hasFile('u-profile')) {
            if ($imageName) {
                Storage::delete($imageName);
            }
            $image = $req->file('u-profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('imageTeam', $imageName, 'public');
        }
        $team->update([
            'first_name' => $req->input('u-lname'),
            'last_name' => $req->input('u-lname'),
            'birth_date' => $req->input('u-birth-date'),
            'birth_place' => $req->input('u-birth-place'),
            'profile' => $imageName,
            'pseudo' => $req->input('u-pseudo'),
            'number' => $req->input('u-number'),
            'post' => $req->input('u-post'),
        ]);
        return back()->with('message', 'Mise a jour effectuée avec succès !');
    }
    // player category add
    public function player_category_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.player_category_add');
    }
    // insert player category
    public function insert_player_category(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|string',
        ]);
        $category_exist = PlayerCategory::where('name', $request->input('category'))->first();
        $category = new PlayerCategory();
        if ($category_exist !== $request->input('category')) {
            $category->name = $request->input('category');
            $category->save();
            return redirect()->route('team_category');
        } else {
            return back()->withErrors('Cet categorie est dejà existé !');
        }
    }
    // delete player category
    public function delete_player_category($id)
    {
        $category = PlayerCategory::findOrFail($id);
        $category->delete();
        return back();
    }
    // staff category add
    public function staff_category_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.staff_category_add');
    }
    // insert staff category
    public function insert_staff_category(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|string',
        ]);
        $category_exist = StaffCategory::where('name', $request->input('category'))->first();
        $category = new StaffCategory();
        if ($category_exist != $request->input('category')) {
            $category->name = $request->input('category');
            $category->save();
            return redirect()->route('team_category');
        } else {
            return back()->withErrors('Cet categorie est dejà existé !');
        }
    }
    // delete staff category
    public function delete_staff_category($id)
    {
        $category = StaffCategory::findOrFail($id);
        $category->delete();
        return back();
    }
}
