<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

if (!function_exists('bln')) {
    function bln($idbln)
    {
        switch ($idbln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Agu";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

if (!function_exists('fetch_bulan')) {
    function fetch_bulan()
    {
        $bulan = array(
            "01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April",
            "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus",
            "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember",
        );
        return $bulan;
    }
}

if (!function_exists('format_singkat')) {
    function format_singkat($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bulan = bln($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('format_indo')) {
    function format_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}

if (!function_exists('format_en')) {
    function format_en($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = $pecah[1];
        $tahun = $pecah[0];
        return $bulan . '/' . $tanggal . '/' . $tahun;
    }
}

if (!function_exists('format_bulan')) {
    function format_bulan($tgl)
    {
        $ubah  = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $bulan . ' ' . $tahun;
    }
}

if (!function_exists('format_tahun')) {
    function format_tahun($tgl)
    {
        $ubah  = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tahun = $pecah[0];
        return $tahun;
    }
}

if (!function_exists('format_biasa')) {
    function format_biasa($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = $pecah[1];
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}

if (!function_exists('format_timestamp')) {
    function format_timestamp($tgl)
    {
        $tglBaru = explode(" ", $tgl);
        $tglBaru1 = $tglBaru[0];
        $tglBaru2 = $tglBaru[1];
        $tglBarua = explode("-", $tglBaru1);

        $tgl = $tglBarua[2];
        $bln = $tglBarua[1];
        $thn = $tglBarua[0];

        $bln = bulan($bln);
        $ubahTanggal = "$tgl $bln $thn | $tglBaru2 ";

        return $ubahTanggal;
    }
}

if (!function_exists('sort_jam_timestamp')) {
    function sort_jam_timestamp($tgl)
    {
        // $inttime = date('Y-m-d H:i:s', $tgl);
        $tglBaru = explode(" ", $tgl);
        $tglBaru1 = $tglBaru[0];
        $tglBaru2 = $tglBaru[1];
        $tglBarua = explode("-", $tglBaru1);

        $tgl = $tglBarua[2];
        $bln = $tglBarua[1];
        $thn = $tglBarua[0];

        $bln = bulan($bln);
        $ubahTanggal = "$tglBaru2 ";

        return substr($ubahTanggal, 0, 5);
    }
}
