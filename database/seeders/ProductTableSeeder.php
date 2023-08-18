<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Blue Nike Classic',
                'description' => 'Awesome shoes 1',
                'photo' => 'https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'Hot Pink Nike Classic',
                'description' => 'Awesome shoes 2',
                'photo' => 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'Red Nike Classic',
                'description' => 'Awesome shoes 3',
                'photo' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'White Nike Classic',
                'description' => 'Awesome shoes 4',
                'photo' => 'https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'Blue Nike Classic v2',
                'description' => 'Awesome shoes 5 ',
                'photo' => 'https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'Hot Pink Nike Classic v2',
                'description' => 'Awesome shoes 6',
                'photo' => 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'Red Nike Classic v2',
                'description' => 'Awesome shoes 7',
                'photo' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],
            [
                'name' => 'White Nike Classic v2',
                'description' => 'Awesome shoes 8',
                'photo' => 'https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'price' => 500,
            ],


        ])->each(function ($product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'photo' => $product['photo'],
                'price' => $product['price'],
            ]);
        });
    }
}
