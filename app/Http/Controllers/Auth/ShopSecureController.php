<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Shop;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopSecureController extends Controller
{
    // insert article
    public function insert_article(Request $req)
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $this->validate($req, [
            'category' => 'required|in:Maillot,T-shirt',
            'name' => 'required|string',
            'size' => 'required|array',
            'size.*' => 'required|string|distinct',
            'color' => 'required|array',
            'color.*' => 'required|string|distinct',
            'price' => 'required|numeric',
            'image' => 'required | image | mimes:jpeg,jpg,png,gif'
        ]);
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('imageShop', $imageName, 'public');
        }
        $category = $req->input('category');
        $name = $req->input('name');
        $size = implode(', ', $req->input('size', []));
        $color = implode(', ', $req->input('color', []));
        $price = $req->input('price');
        $image = $imageName;

        DB::transaction(function () use ($category, $name, $size, $color, $price, $image) {
            Shop::create([
                'category' => $category,
                'name' => $name,
                'size' => $size,
                'color' => $color,
                'price' => $price,
                'image' => $image,
            ]);
        });
        return redirect()->route('shop_admin');
    }
    //
    public function shop_admin()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $articles = Shop::orderBy('id', 'desc')->paginate(4);
        return view('admin.shop_admin', compact('articles'));
    }
    // category
    public function category()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $categories = Category::all();
        return view('admin.shop_category', compact('categories'));
    }
    // category add view
    public function category_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.shop_category_add');
    }
    // size
    public function size()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $sizes = Size::all();
        return view('admin.size', compact('sizes'));
    }
    public function size_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.size_add');
    }
    // color
    public function color()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        $colors = Color::all();
        return view('admin.color', compact('colors'));
    }
    // color add
    public function color_add()
    {
        if (! Auth::user() || Auth::user()->statut !== 'admin') {
            return redirect()->route('home');
        }
        return view('admin.color_add');
    }
}
