<?php

namespace Database\Factories;

use App\Constants\PaymentStatusses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement((new PaymentStatusses)->toArray()),
            'request_id' => $this->faker->randomDigit(),
            'payment_url' => $this->faker->url(),
        ];
    }
}
