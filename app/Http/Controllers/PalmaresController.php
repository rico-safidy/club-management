<?php

namespace App\Http\Controllers;

use App\Models\Palmares;
use App\Models\Trophy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PalmaresController extends Controller
{
    // view trophy
    public function trophy()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $trophies = Trophy::orderBy('id', 'desc')->get();
        return view('admin.trophy', compact('trophies'));
    }
    // view trophy add
    public function trophy_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.trophy_add');
    }
    // insert trophy
    public function insert_trophy(Request $request)
    {
        $this->validate($request, [
            'number-trophy' => 'required',
            'name-trophy' => 'required | string'
        ]);
        $trophyName = $request->input('name-trophy');
        $trophyExist = Trophy::where('name_trophy', $trophyName)->exists();
        if ($trophyName != $trophyExist) {
            $trophy = new Trophy();
            $trophy->number_trophy = $request->input('number-trophy');
            $trophy->name_trophy = $request->input('name-trophy');
            $trophy->save();
            return redirect()->route('trophy');
        } else {
            return back()->withErrors('Le nom du trophée est dejà existé !');
        }
    }
    // delete trophy
    public function delete_trophy($id)
    {
        $trophy = Trophy::findOrFail($id);
        $trophy->delete();
        return back();
    }
    // view palmares
    public function palmares()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $palmares = Palmares::all();
        return view('admin.palmares', compact('palmares'));
    }
    // view palmares add
    public function palmares_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $trophies = Trophy::all();
        return view('admin.palmares_add', compact('trophies'));
    }
    // insert palmares
    public function insert_palmares(Request $request)
    {
        $this->validate($request, [
            'trophy-title'=>'required|string',
            'trophy-desc'=>'required|string|max:255',
            'trophy-date'=>'required|string',
        ]);
        $palmares = new Palmares();
        $palmares->palmares_name = $request->input('trophy-title');
        $palmares->palmares_date = $request->input('trophy-date');
        $palmares->palmares_description = $request->input('trophy-desc');
        $palmares->save();
        return redirect()->route('palmares');
    }
    // delete palmares
    public function delete_palmares($id)
    {
        $palmares = Palmares::findOrFail($id);
        $palmares->delete();
        return back();
    }
}
