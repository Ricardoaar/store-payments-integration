<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\CartController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartControllerTest extends TestCase
{

    private $cartController;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_cart_for_user()
    {
        $user = User::factory()->create();
        $controller = new CartController();

        $this->actingAs($user);
        $cart = $controller->createCart();
        $this->assertEquals($user->currentCart->id, $cart->id);
        $this->assertEquals($user->id, $cart->user_id);
    }


}
