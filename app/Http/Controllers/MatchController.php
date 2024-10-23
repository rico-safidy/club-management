<?php

namespace App\Http\Controllers;

use App\Models\NextGame;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    // Insert match
    public function insert_match(Request $request)
    {
        $this->validate($request, [
            'home-team' => 'required',
            'visitor-team' => 'required',
            'type' => 'required',
            
            'location' => 'required',
            'date' => 'required|date',
            'hour' => 'required',
            'desc' => 'required'
        ]);
        $today = date('Y-m-d');
        if ($request->input('home-team') != $request->input('visitor-team')) {
            if ($request->input('date') > $today) {
                $match = new NextGame();
                $match->home_team = $request->input('home-team');
                $match->visitor_team = $request->input('visitor-team');
                $match->match_type = $request->input('type');
                $match->match_location = $request->input('location');
                $match->match_date = $request->input('date');
                $match->match_hour = $request->input('hour');
                $match->match_description = $request->input('desc');
                $match->save();
                return redirect()->route('match_admin');
            } else {
                return back()->withErrors('La date ne doit pas etre au passée !');
            }
        } else {
            return back()->withErrors("Les noms des 2 equipes ne doivent pas être les mêmes");
        }
    }
}
