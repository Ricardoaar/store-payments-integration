<?php

namespace App\Factories\Payment;

use App\Enums\PaymentGateways;
use App\Factories\Factory;
use App\Factories\Payment\Interfaces\IPayment;
use Exception;

class PaymentGatewayFactory extends Factory
{
    /**
     * @throws Exception
     */
    public static function getInstance($key): IPayment
    {
        if (!PaymentGateways::isInEnum($key)) {
            throw new Exception("Payment gateway not found $key");
        }

        $class = "\App\Factories\Payment\\$key";
        return new $class();
    }

}
