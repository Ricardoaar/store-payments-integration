<?php

namespace Tests\Unit;

use App\Enums\UserRoles;
use App\Models\Order;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    private $adminRole;
    private $userRole;

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
        $this->userRole = $roles->where('description', UserRoles::USER)->first();
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
        $user = User::factory()->create(['role_id' => $this->userRole->id]);
        $orders = Order::factory()
            ->count(2)->for($user, 'customer')
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
        $user = User::factory()->create(['role_id' => $this->userRole->id]);
        $this->assertFalse($user->isAdmin());
    }


}

