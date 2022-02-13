<?php

namespace Tests\Feature\Http\Controllers;

use App\Enums\PaymentStatusses;
use App\Models\Role;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentControllerTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

    }

//    public function test_create_payment()
//    {
//        $user = User::factory()->create();
//        $data = [
//            'reference' => '1-' . time(),
//            'description' => 'cats',
//            'currency' => 'USD',
//            'total' => '15',
//            'ipAddress' => '127.0.0.1',
//            'userAgent' => 'MAC'
//        ];
//        $response = $this->actingAs($user)->post('/user/payment/PlaceToPay', $data);
//
//        $response->assertStatus(200);
//    }
//
//    public function test_check_payment()
//    {
//        $user = User::factory()->create();
//
//        $response = $this->actingAs($user)->post("/user/payment/PlaceToPay/49388");
//        $this->assertEquals(302, $response->status());
//    }

}
