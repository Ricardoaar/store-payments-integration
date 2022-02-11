<?php

namespace Tests\Unit\Factories;

use App\Enums\PaymentGateways;
use App\Factories\Payment\PaymentGatewayFactory;
use App\Factories\Payment\PlaceToPay;
use Exception;
use PHPUnit\Framework\TestCase;

class PaymentGatewayFactoryTest extends TestCase
{


    /**
     * @throws Exception
     */
    public function test_get_instance()
    {
        $placeToPay = PaymentGatewayFactory::getInstance(PaymentGateways::PLACE_TO_PAY);
        $this->assertInstanceOf(PlaceToPay::class, $placeToPay);
    }
}
