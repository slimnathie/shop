<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\ProductRemoveRequest;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * Gets all available products
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(): View
    {
        $products = Product::all();
        return view('market', compact('products'));
    }

    /**
     * Add item to the shopping cart
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function addToCart(int $id) : RedirectResponse
    {
        Product::findOrfail($id);

        $cart = session()->get('cart', []);

        isset($cart[$id]) ? $cart[$id]['quantity']++ : $cart[$id]['quantity'] = 1;

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart');
    }


    /**
     * Updates the quantity of an item in session
     *
     * @param ProductUpdateRequest $request
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(ProductUpdateRequest $request)
    {
        if ($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Item Quantity updated');
        }
    }


    /**
     * Remove Item from the session cart
     *
     * @param ProductRemoveRequest $request
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function remove(ProductRemoveRequest $request)
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
