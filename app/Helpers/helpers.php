<?php

if (!function_exists('moneyFormat')) {
    /**
     * moneyFormat
     *
     * @param  mixed $str
     * @return void
     */
    function moneyFormat($str)
    {
        return 'Rp. ' . number_format($str, '0', '', '.');
    }
}

if (!function_exists('percentage')) {
    function percentage($danaSementara, $target_donation)
    {
        return $danaSementara / $target_donation * 100;
    }
}
