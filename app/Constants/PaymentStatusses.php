<?php

namespace App\Constants;


class PaymentStatusses extends Constant
{

    const CREATED = 'CREATED';
    const PAYED = 'PAYED';
    const REJECTED = 'REJECTED';

    function toArray(): array
    {

        return [
            self::CREATED,
            self::PAYED,
            self::REJECTED
        ];
    }

}
