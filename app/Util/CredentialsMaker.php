<?php

namespace App\Util;

use Exception;
use function Symfony\Component\String\s;

class CredentialsMaker
{


    public static function getSeed(int $time = null)
    {
        return date('c', $time ?? time());
    }


    public static function createNonce(int $length = 6, int $time = null)
    {
        $time = ($time === null) ? time() : $time;

        $nonce = gmstrftime('%Y-%m-%dT%H:%M:%SZ', $time);
        if ($length < 1) {
            return $nonce;
        }
        $chars = (range('A', 'Z') + range('a', 'z') + range('0', '9'));
        $unique = '';
        for ($i = 0; $i < $length; $i++) {
            $unique = array_rand($chars);
        }
        return $nonce . $unique;
    }
}

