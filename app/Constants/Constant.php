<?php


namespace App\Constants;

abstract class Constant
{
    abstract function toArray(): array;

    function isOnArray(string $key): bool
    {
        return array_key_exists($key, $this->toArray());
    }

}
