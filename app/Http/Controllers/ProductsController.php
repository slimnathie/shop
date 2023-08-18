<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('market', compact('products'));
    }

    public function addToCart($id)
    {
        Product::findOrfail($id);

        $cart = session()->get('cart', []);

        isset($cart[$id]) ? $cart[$id]['quantity']++ : $cart[$id]['quantity'] = 1;

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Item Quantity updated');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item removed');
        }
    }
}
