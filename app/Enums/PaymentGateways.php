<?php

namespace App\Enums;


class PaymentGateways implements IEnum
{

    const PLACE_TO_PAY = 'PlaceToPay';
    const  MERCADO_PAGO = 'MercadoPago';

    static function toArray(): array
    {
        return [
            self::PLACE_TO_PAY,
            self::MERCADO_PAGO
        ];
    }

    static function isInEnum(string $key): bool
    {
        return in_array($key, self::toArray());
    }


}
