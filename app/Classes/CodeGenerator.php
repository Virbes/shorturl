<?php

namespace App\Classes;

class CodeGenerator
{
    protected $charts = '0123456789abcdefghijklmnoprstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ';

    public function get_code($key): string
    {
        $random_num = $this->get_random_number($key);
        $base62_num = $this->get_base62($random_num);
        $random_key = $this->charts[rand(0, 61)];

        return  $random_key . $base62_num;
    }
    private function get_random_number($key): int
    {
        list($ms, $s) = explode(' ', microtime());

        $s = $s - 1608000000;
        $ms = round($ms * 1000);
        $ms = $ms < 100 ? $ms * 10 : $ms;
        $num = (int) $s . $ms;
        $num = $num + $key;

        return $num;
    }

    private function get_base62($c): string
    {
        $status = true;
        $base62_num = '';

        do {
            if ($c > 62) {
                $r = $c % 62;
                $c = intdiv($c, 62);
                $base62_num .= $this->charts[$r];
            } else {
                $status = false;
                $base62_num .= $this->charts[$c];
            }
        } while ($status);

        return $base62_num = strrev($base62_num);
    }
}
