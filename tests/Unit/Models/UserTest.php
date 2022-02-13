<?php

namespace Tests\Unit\Models;

use App\Enums\UserRoles;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{


    private $adminRole;


    public function setUp(): void
    {
        parent::setUp();

        $roles = Role::all();
        array_map(function ($role) {
            $exists = Role::where('description', $role)->exists();
            if (!$exists) {
                Role::create(['description' => $role]);
            }
        }, UserRoles::toArray());
        $this->adminRole = $roles->where('description', UserRoles::ADMIN)->first();
    }

    /**
     * A basic unit test example.
     * @return void
     */
    public
    function test_user_belongs_to_a_role()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(Role::class, $user->role);
    }

    public
    function test_user_has_many_orders()
    {
        $user = User::factory()->create();
        $orders = Order::factory()
            ->count(2)->for($user,)
            ->create();

        foreach ($orders as $order) {
            $this->assertInstanceOf(Order::class, $order);
            $this->assertEquals($user->id, $order->customer_id);
        }
    }

    public
    function test_user_is_admin()
    {
        $user = User::factory()->create(['role_id' => $this->adminRole->id]);
        $this->assertTrue($user->isAdmin());
    }

    public
    function test_user_is_not_admin()
    {
        $user = User::factory()->create();
        $this->assertFalse($user->isAdmin());
    }


    public function test_user_has_n_orders_and_spent_n_money()
    {
        $ordersQuantity = rand(1, 5);
        $user = User::factory()->create();


        $orders = Order::factory()
            ->count($ordersQuantity)->for($user)
            ->create();
        $carts = Cart::factory($ordersQuantity)->create();
        $this->assertEquals($ordersQuantity, $user->ordersQuantity);

        for ($i = 0; $i < $ordersQuantity; $i++) {
            $product = Product::factory()->create();
            $carts[$i]->products()->attach($product);
            $orders[$i]->update(['cart_id' => $carts[$i]->id]);
        }

        $total = [];

        foreach ($orders->toArray() as $order) {
            $currency = $order['currency'];
            $total[$currency] = $total[$currency] ?? 0;
            $total[$currency] += $order['total'];
        }

        $this->assertEquals($total, $user->totalSpent);
    }
}
