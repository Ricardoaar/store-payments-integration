<?php


interface IConstant
{
    function toArray(): array;

    function isOnArray(string $key): bool;


}
