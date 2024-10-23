<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Shop;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Symfony\Component\Console\Input\Input;

class ShopController extends Controller
{
    // // insert article
    // public function insert_article(Request $req)
    // {
    //     $this->validate($req, [
    //         'category' => 'required|in:Maillot,T-shirt',
    //         'name' => 'required|string',
    //         'size' => 'required|array',
    //         'size.*' => 'required|string|distinct',
    //         'color' => 'required|array',
    //         'color.*' => 'required|string|distinct',
    //         'price' => 'required|numeric',
    //         'image' => 'required | image | mimes:jpeg,jpg,png,gif'
    //     ]);
    //     if ($req->hasFile('image')) {
    //         $image = $req->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->storeAs('imageShop', $imageName, 'public');
    //     }
    //     $category = $req->input('category');
    //     $name = $req->input('name');
    //     $size = implode(', ', $req->input('size', []));
    //     $color = implode(', ', $req->input('color', []));
    //     $price = $req->input('price');
    //     $image = $imageName;

    //     DB::transaction(function () use ($category, $name, $size, $color, $price, $image) {
    //         Shop::create([
    //             'category' => $category,
    //             'name' => $name,
    //             'size' => $size,
    //             'color' => $color,
    //             'price' => $price,
    //             'image' => $image,
    //         ]);
    //     });
    //     return redirect()->route('shop_admin');
    // }
    // delete article
    public function delete_article($id)
    {
        $article = Shop::findOrFail($id);
        $article->delete();
        return back();
    }
    // cart
    public function cart(Request $req, $id)
    {
        $sizeSelect = $req->input('taille');
        $colorSelect = $req->input('color');

        $articles = Shop::all();
        $item = Shop::find($id);
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }
        $cart = Session::get('cart');

        $cartItem = [
            'id' => $item->id,
            'name' => $item->name,
            'category' => $item->category,
            'size' => $sizeSelect,
            'color' => $colorSelect,
            'price' => $item->price,
            'image' => $item->image,
        ];

        if (!in_array($cartItem, $cart)) {
            $cart[] = $cartItem;
            Session::put('cart', $cart);
        }
        $categories = Category::all();
        return view('user.shop', compact('articles', 'categories'));
    }
    // delete cart
    public function delete_cart($id)
    {
        $articles = Shop::all();
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            foreach ($cart as $index => $produit) {
                if ($produit['id'] == $id) {
                    unset($cart[$index]);
                    break;
                }
            }
            Session::put('cart', $cart);
        }

        // return response()->json([
        //     'success' => 'Article supprimer du panier'
        // ]);
        $categories = Category::all();
        return view('user.shop', compact('articles', 'categories'));
    }
    // insert category
    public function insert_category(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);
        $categories = new Category();
        $categories->category = $request->input('category');
        $categories->save();

        return redirect()->route('category');
    }
    // delete category
    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back();
    }
    // category
    public function category_update($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.category_update', compact('categories'));
    }
    // update category
    public function update_category(Request $req, $id)
    {
        $this->validate($req, [
            'category-update' => 'nullable',
        ]);
        $category = Category::findOrFail($id);
        $category->update([
            'category' => $req->input('category-update'),
        ]);
        return back()->with('message', 'Mise a jour effectuée !');
    }
    // insert size
    public function insert_size(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|string',
        ]);
        $sizes = new Size();
        $sizes->sizes = $request->input('size');
        $sizes->save();

        return redirect()->route('size');
    }
    // delete size
    public function delete_size($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        return back();
    }
    // insert color
    public function insert_color(Request $request)
    {
        $this->validate($request, [
            'color' => 'required|string',
        ]);
        $colorExist = Color::where('name', $request->input('color'))->first();
        $color = new Color();
        if ($colorExist != $request->input('color')) {
            $color->name = $request->input('color');
            $color->save();
            return redirect()->route('color');
        } else {
            return back()->withErrors('Cette couleur est dejà existé !');
        }
    }
}
