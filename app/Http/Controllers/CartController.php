<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Gets the Items Selected for Cart view page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index() : View
    {
        $subtotal = 0;
        $shipping = 0;
        $total = 0;
        $vat = 0;
        $item = [];

        if(session('cart')) {

            $shipping = env('SHIPPING_FEE');
            $vat = env('VAT_AMOUNT');

            foreach(session('cart') as $id => $details) {
                $product = Product::find($id);
                $subtotal += $product['price'] * $details['quantity'];

                $item[] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'photo' => $product['photo'],
                    'quantity' => $details['quantity'],
                    'subtotal' => $product['price'] * $details['quantity']
                ];

            }

            $total += round(($subtotal + $shipping) * $vat, 2);
        }


        return view('cart', compact('item', 'subtotal', 'total', 'shipping', 'vat'));
    }
}
