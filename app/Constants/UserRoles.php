<?php

namespace App\Constants;


class UserRoles extends Constant
{
    const ADMIN = 'admin';
    const USER = 'customer';


    function toArray(): array
    {
        return [
            self::ADMIN,
            self::USER
        ];
    }

}
