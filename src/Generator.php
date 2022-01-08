<?php

declare(strict_types=1);

namespace FastPass;

class Generator
{
    public function random(int $length = 8, $uppercase = true, $lowercase = true, $numbers = true)
    {
        $chars = '@#$%&*!';

        if ($lowercase) {
            $chars = $chars . 'abcdefghijklmnopqrstuvxyz';
        }

        if ($uppercase) {
            $chars = $chars . 'ABCDEF';
        }

        if ($numbers) {
            $chars = $chars . '1234567890';
        }
    
        $password = substr(str_shuffle($chars), 0, $length);

        return $password;
    }
}