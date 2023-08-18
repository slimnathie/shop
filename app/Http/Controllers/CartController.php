<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $subtotal = 0;
        $shipping = 0;
        $total = 0;
        $vat = 0;
        $item = [];

        if(session('cart')) {

            $shipping = 4.99;
            $vat = 1.20;

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
