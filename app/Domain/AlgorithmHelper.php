<?php

namespace App\Domain;

class AlgorithmHelper
{
    const K_GREY_LEVELS = ['1' => 4, '2' => 16, '3' => 12, '4' => 16, '5' => 24];
    const K_DELTA_LEVELS = [
        '1' => 50,
        '2' => 100,
        '3' => 150,
        '4' => 200,
        '5' => 300
    ];

    /**
     * @param $k_grey
     * @param $kGreyLevels
     * @return int
     */
    public static function getKGreyMax($k_grey, int $level): int
    {
        $kGreyMax = $k_grey + self::K_GREY_LEVELS[$level];;
        if ($kGreyMax > 255) {
            $kGreyMax = 255;
        }
        return $kGreyMax;
    }

    /**
     * @param $k_grey
     * @param $kGreyLevels
     * @return int
     */
    public static function getKGreyMin($k_grey, int $level): int
    {
        $kGreyMin = $k_grey - self::K_GREY_LEVELS[$level];
        if ($kGreyMin < 0) {
            $kGreyMin = 0;
        }
        return $kGreyMin;
    }

    public static function getKDeltaMax(int $level): int
    {
        return self::K_DELTA_LEVELS[$level];
    }
}
