<?php

namespace App\Constants;


class PaymentStatusses extends Constant
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

}
