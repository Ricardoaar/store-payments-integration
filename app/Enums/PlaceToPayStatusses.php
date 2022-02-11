<?php

namespace App\Enums;

class PlaceToPayStatusses implements IEnum
{
    const PENDING = 'PENDING';
    const APPROVED = 'APPROVED';
    const REJECTED = 'REJECTED';
    const FAILED = 'FAILED';

    static function toArray(): array
    {
        return [
            self::PENDING,
            self::APPROVED,
            self::REJECTED,
            self::FAILED
        ];
    }


    static function isInEnum(string $key): bool
    {
        return in_array($key, self::toArray());
    }
}
