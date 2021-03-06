<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('rupiah')) {
    function rupiah($uang)
    {
        $format = number_format($uang, 0, ",", ".");
        return $format;
    }
}

if (!function_exists('count_format')) {
    function count_format($n, $point = '.', $sep = ',')
    {
        if ($n < 0) {
            return 0;
        }

        if ($n < 10000) {
            return number_format($n, 0, $point, $sep);
        }

        $d = $n < 1000000 ? 1000 : 1000000;

        $f = round($n / $d, 1);

        return number_format($f, $f - intval($f) ? 1 : 0, $point, $sep) . ($d == 1000 ? 'k' : 'M');
    }
}

if (!function_exists('akuntansi')) {
    function akuntansi($uang)
    {
        $format = "<span style='float:left;'>Rp.</span><span style='float:right;'>" . number_format($uang, 0, ",", ".") . "</span>";
        return $format;
    }
}
