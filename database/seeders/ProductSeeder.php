<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Captain Run T-Shirt',
            'price' => '100',
            'image_route' => '/images/Product.jpeg',
        ]);
    }
}
