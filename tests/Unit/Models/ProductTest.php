<?php

namespace Tests\Unit\Models;

use App\Models\Cart;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_product_belongs_to_many_carts()
    {
        $carts = Cart::factory(2)->create();
        $product = Product::factory()->create();

        $carts->each(function ($cart) use ($product) {
            $product->carts()->attach($cart);
        });

        $this->assertInstanceOf(Cart::class, $product->carts->first());
        $this->assertInstanceOf(Cart::class, $product->carts->last());
    }
}
