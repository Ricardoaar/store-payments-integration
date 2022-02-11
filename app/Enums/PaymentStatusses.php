<?php

namespace App\Enums;


class PaymentStatusses implements IEnum
{

    const CREATED = 'CREATED';
    const PAYED = 'PAYED';
    const REJECTED = 'REJECTED';

    static function toArray(): array
    {

        return [
            self::CREATED,
            self::PAYED,
            self::REJECTED
        ];
    }

    static function isInEnum(string $key): bool
    {
        return in_array($key, self::toArray());
    }
}
