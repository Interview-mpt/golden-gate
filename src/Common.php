<?php

namespace MrMinh\GoldenGate;

class Common
{
    /**
     * Get and rounding to 2 decimal places
     * @param  float  $number
     * @param  int|null  $precision
     * @return float
     */
    public static function round(float $number, ?int $precision = 2): float
    {
        return round($number, $precision);
    }

    public static function currencyFormat(float $number, ?int $precision = 2): string
    {
        return "$" . number_format($number, $precision);
    }
}