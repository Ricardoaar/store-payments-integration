<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_belongs_to_a_role()
    {
        Role::factory(2)->create();
        $user = User::factory()->create();
        $this->assertInstanceOf(Role::class, $user->role);

    }

    public function test_user_has_many_orders()
    {
        $role = Role::factory()->create();
        $user = User::factory()->create(['role_id' => $role->id]);
        $orders = Order::factory()
            ->count(2)->for($user, 'customer')
            ->create();

        foreach ($orders as $order) {
            $this->assertInstanceOf(Order::class, $order);
            $this->assertEquals($user->id, $order->customer_id);
        }
    }

    public function test_user_is_admin()
    {
        $role = Role::factory()->create(['description' => \App\Constants\UserRoles::ADMIN]);
        $user = User::factory()->create(['role_id' => $role->id]);
        $this->assertTrue($user->isAdmin());
    }

    public function test_user_is_not_admin()
    {
        $role = Role::factory()->create(['description' => \App\Constants\UserRoles::USER]);
        $user = User::factory()->create(['role_id' => $role->id]);
        $this->assertFalse($user->isAdmin());
    }


}

