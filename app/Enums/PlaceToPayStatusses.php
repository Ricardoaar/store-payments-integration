<?php

namespace App\Enums;

class PlaceToPayStatusses implements IEnum
{
    const PENDING = 'PENDING';
    const APPROVED = 'APPROVED';
    const REJECTED = 'REJECTED';

    static function toArray(): array
    {
        return [
            self::PENDING,
            self::APPROVED,
            self::REJECTED,
        ];
    }


    static function isInEnum(string $key): bool
    {
        return in_array($key, self::toArray());
    }
}
