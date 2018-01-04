<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product = new Product();
        $product->bar_code = '1';
        $product->name = 'Product 1';
        $product->price = '100';
        $product->description = 'This is a product';
        $product->quantity = '1';
        $product->expiry_date = '2017-10-10';
        $product->weight = '1';
        $product->save();

        $product = new Product();
        $product->bar_code = '2';
        $product->name = 'Product 1';
        $product->price = '100';
        $product->description = 'This is a product';
        $product->quantity = '1';
        $product->expiry_date = '2017-10-10';
        $product->weight = '1';
        $product->save();

        $product = new Product();
        $product->bar_code = '3';
        $product->name = 'Product 1';
        $product->price = '100';
        $product->description = 'This is a product';
        $product->quantity = '1';
        $product->expiry_date = '2017-10-10';
        $product->weight = '1';
        $product->save();

        $product = new Product();
        $product->bar_code = '4';
        $product->name = 'Product 1';
        $product->price = '100';
        $product->description = 'This is a product';
        $product->quantity = '1';
        $product->expiry_date = '2017-10-10';
        $product->weight = '1';
        $product->save();

        $product = new Product();
        $product->bar_code = '5';
        $product->name = 'Product 1';
        $product->price = '100';
        $product->description = 'This is a product';
        $product->quantity = '1';
        $product->expiry_date = '2017-10-10';
        $product->weight = '1';
        $product->save();

    }
}
