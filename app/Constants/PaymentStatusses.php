<?php

namespace App\Constants;

use IConstant;

class PaymentStatusses implements IConstant
{

    const PENDING = 'CREATED';
    const PAYED = 'PAYED';
    const REJECTED = 'REJECTED';

    function toArray(): array
    {

        return [
            self::PENDING,
            self::PAYED,
            self::REJECTED
        ];
    }

    function isOnArray(string $key): bool
    {
        return in_array($key, $this->toArray());
    }
}
