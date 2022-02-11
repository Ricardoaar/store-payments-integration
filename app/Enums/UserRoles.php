<?php

namespace App\Enums;


class UserRoles implements IEnum
{
    const ADMIN = 'admin';
    const USER = 'customer';


    static function toArray(): array
    {
        return [
            self::ADMIN,
            self::USER
        ];
    }

    static function isInEnum(string $key): bool
    {
        return in_array($key, self::toArray());
    }
}
