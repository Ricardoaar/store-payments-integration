<?php

namespace Tests\Unit\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_order_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $order = Order::factory()->for($user)->create();
        $this->assertInstanceOf(User::class, $order->user);
        $this->assertEquals($user->id, $order->user->id);
    }

    public function test_order_belongs_to_a_cart()
    {
        $cart = Cart::factory()->create();
        $order = Order::factory()->for($cart)->create();
        $this->assertInstanceOf(Cart::class, $order->cart);
    }


    public function test_get_total_order()
    {
        $total = 0;
        $user = User::factory()->create();
        $products = Product::factory(5)->create();
        $cart = Cart::factory()->create();
        foreach ($products as $product) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                $cart->products()->attach($product);
                $total += $product->price;
            }
        }
        $order = Order::factory()->for($user)->create();
        $order->cart()->associate($cart);
        $this->assertEquals($order->total, $total);
    }


}

