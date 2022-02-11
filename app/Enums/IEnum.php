<?php


namespace App\Enums;


interface IEnum
{
    static function toArray(): array;

    static function isInEnum(string $key): bool;

}
