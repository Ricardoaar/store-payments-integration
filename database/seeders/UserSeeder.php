<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ricardo Rito Anguiano',
            'email' => '26richardr@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_number' => '4185498654',
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Captain Run',
            'email' => '05rungr@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_number' => '24888881',
            'role_id' => 2,
        ]);

        $products = Product::factory()->count(5)->create();
        $users = User::factory(5)->create();
        $carts = Cart::factory()->count(5)->create();
        $orders = Order::factory()->count(5)->create();
        for ($i = 0; $i < 5; $i++) {
            $carts[$i]->products()->attach($products[$i]);
            $orders[$i]->cart()->associate($carts[$i]);
            $orders[$i]->user()->associate($users[$i]);
            $carts[$i]->save();
            $orders[$i]->save();
        }

    }
}
