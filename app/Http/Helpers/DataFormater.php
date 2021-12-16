<?php

namespace App\Http\Helpers;

trait DataFormater {

    /**
     * @param string $size
     * @param int $precision
     * @return string
     */
    public static function formatBytes($size, $precision = 2)
    {
        if ($size === 0 || $size === null) {
            return "0B";
        }

        $sign = $size < 0 ? '-' : '';
        $size = abs($size);

        $base = log($size) / log(1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

        return $sign . round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    }

}
