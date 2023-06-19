<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

class Utils
{
    /**
     * Get Month in Integer
     */
    public static function GetMonthFromDate($date)
    {
        $month = date('m', strtotime($date));
        return $month;
    }

    /**
     * Get Year in Integer
     */
    public static function GetYearFromDate($date)
    {
        $year = date('Y', strtotime($date));
        return $year;
    }
}
