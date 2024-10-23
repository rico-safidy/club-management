<?php

namespace App\Http\Controllers;

use App\Models\Stade;
use App\Models\StadiumPlace;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    //
    public function ticket()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.ticket.ticket');
    }
    public function ticket_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $ticket_categories = TicketCategory::all();
        return view('admin.ticket.ticket_add', compact('ticket_categories'));
    }
    public function ticket_category()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $categories = TicketCategory::orderBy('id', 'desc')->get();

        return view('admin.ticket.category_ticket', compact('categories'));
    }
    public function ticket_category_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.ticket.ticket_category_add');
    }
    public function add_ticket_category(Request $request)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'category' => 'required|string',
        ]);
        $category = TicketCategory::where('ticket_category_name', $request->input('category'))->first();
        if ($category != $request->input('category')) {
            TicketCategory::create([
                'ticket_category_name' => $request->input('category'),
            ]);
        }
        return redirect()->route('ticket_category');
    }
    public function ticket_category_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $category = TicketCategory::findOrFail($id);
        return view('admin.ticket.ticket_category_update', compact('category'));
    }
    public function update_ticket_category(Request $request, $id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'u-category' => 'required|string',
        ]);
        $category = TicketCategory::find($id);
        $category->update([
            'ticket_category_name' => $request->input('u-category'),
        ]);
        return redirect()->route('ticket_category');
    }
    public function delete_ticket_category($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $category = TicketCategory::find($id);
        $category->delete();
        return back();
    }
    public function place_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $places = StadiumPlace::orderBy('id', 'desc');
        $stade = Stade::all();
        return view('admin.ticket.stadium_place_add', compact('places', 'stade'));
    }
    public function add_place(Request $request)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'stadium-place-location' => 'required|string',
            'stadium-place-number' => 'required|numeric',
            'stadium-place-desc' => 'required|string',
        ]);
        $place = StadiumPlace::all();
        foreach ($place as $item) {
            $place_exist = $item->stadium_place_location;
        }
        if ($place_exist != $request->input('stadium-place-location')) {
            $stade = Stade::all();
            foreach ($stade as $item) {
                $stade_location_number = $item->stade_place_location_number_disponible;
            }
            if ($request->input('stadium-place-number') <= $stade_location_number) {
                $stade_location_number -= $request->input('stadium-place-number');
                StadiumPlace::create([
                    'stadium_place_location' => $request->input('stadium-place-location'),
                    'stadium_place_number' => $request->input('stadium-place-number'),
                    'stadium_place_number_disponible' => $request->input('stadium-place-number'),
                    'stadium_place_description' => $request->input('stadium-place-desc'),
                ]);
                $item->update([
                    'stade_place_location_number_disponible' => $stade_location_number,
                ]);
                return redirect()->route('ticket_category');
            } else {
                return back()->withErrors('Le nombre de la place ne doit pas être superieur au nombre de la place totale de la stadium !');
            }
        } else {
            return back()->withErrors('Cette place est dejà existée !');
        }
    }
    public function place_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $place = StadiumPlace::find($id);

        return view('admin.ticket.stadium_place_update', compact('place'));
    }
    public function update_place(Request $request, $id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'u-location' => 'required|string',
            'u-number' => 'required|numeric',
            'u-desc' => 'required|string',
        ]);
        $place = StadiumPlace::find($id);
        $stade = Stade::all();
        foreach ($stade as $item) {
            $stade_location_number = $item->stade_place_location_number_disponible;
        }
        if ($request->input('stadium-place-number') <= $stade_location_number) {
            $stade_location_number -= $request->input('stadium-place-number');

            $place->update([
                'stadium_place_location' => $request->input('u-location'),
                'stadium_place_number' => $request->input('u-number'),
                'stadium_place_number_disponible' => $request->input('u-number'),
                'stadium_place_description' => $request->input('u-desc'),
            ]);

            $item->update([
                'stade_place_location_number_disponible' => $stade_location_number,
            ]);
            return redirect()->route('ticket_category');
        } else {
            return back()->withErrors('Le nombre de la place ne doit pas être superieur au nombre de la place totale de la stadium !');
        }
        return redirect()->route('ticket_category');
    }
    public function delete_place($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $place = StadiumPlace::find($id);
        $place_number = $place->stadium_place_number;
        $place->delete();
        $stade = Stade::all();
        foreach ($stade as $item) {
            $stade_total_place_number_disponible = $item->stade_place_location_number_disponible;
        }
        $stade_total_place_number_disponible += $place_number;
        $item->update([
            'stade_place_location_number_disponible' => $stade_total_place_number_disponible,
        ]);
        return back();
    }

    public function stade()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $stade = Stade::orderBy('id', 'desc')->get();
        $places = StadiumPlace::orderBy('id', 'desc')->get();
        return view('admin.ticket.stade', compact('stade', 'places'));
    }
    public function stade_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.ticket.stadium_add');
    }
    public function add_stade(Request $request)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($request, [
            's-name' => 'required|string',
            's-location' => 'required|string',
            's-place-number' => 'required|numeric',
        ]);
        Stade::create([
            'stade_name' => $request->input('s-name'),
            'stade_location' => $request->input('s-location'),
            'stade_place_number' => $request->input('s-place-number'),
            'staate_place_location_disponible' => $request->input('s-place-number'),
            'stade_place_number_disponible' => $request->input('s-place-number'),
        ]);
        return redirect()->route('ticket_category');
    }
    public function stade_update($id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $stade = Stade::find($id);
        return view('admin.ticket.stade_update', compact('stade'));
    }
    public function update_stade(Request $request, $id)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'u-s-name' => 'required|string',
            'u-s-location' => 'required|string',
            'u-s-place-number' => 'required|numeric',
        ]);
        $stade = Stade::find($id);
        $stade->update([
            'stade_name' => $request->input('u-s-name'),
            'state_location' => $request->input('u-s-location'),
            'stade_place_number' => $request->input('u-s-place-number'),
            'stade_place_location_number_disponible' => $request->input('u-s-place-number'),
            'stade_place_number_disponible' => $request->input('u-s-place-number'),
        ]);
        return redirect()->route('ticket_category');
    }

    public function ticket_cart()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('user.ticket_cart');
    }
    public function add_ticket_cart()
    {

    }
    Public function ticket_checkout()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('user.ticket_checkout');
    }
}
