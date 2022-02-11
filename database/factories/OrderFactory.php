<?php

namespace Database\Factories;

use App\Enums\PaymentStatusses;
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
            'status' => $this->faker->randomElement(PaymentStatusses::toArray()),
            'request_id' => $this->faker->randomDigit(),
            'payment_url' => $this->faker->url(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'reference' => $this->faker->randomNumber(),
        ];
    }
}
