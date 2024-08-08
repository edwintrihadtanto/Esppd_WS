<?php

function tanggal_indo($tanggal)

{

	$bulan = array (1 =>   'Januari',

				'Februari',

				'Maret',

				'April',

				'Mei',

				'Juni',

				'Juli',

				'Agustus',

				'September',

				'Oktober',

				'November',

				'Desember'

			);

	$split = explode('-', $tanggal);

	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

}



function IntervalDays($CheckIn,$CheckOut){

$CheckInX = explode("-", $CheckIn);

$CheckOutX = explode("-", $CheckOut);

$date1 = mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);

$date2 = mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);

$interval =($date2 - $date1)/(3600*24);

// returns numberofdays

return $interval ;

}

# Fungsi untuk membuat format rupiah pada angka (uang)

function format_angka($angka) {

	$hasil =  number_format($angka,0, ",",".");

	return $hasil;

}



function format_angka2($angka) {

	$hasil =  number_format($angka,0, ",",",");

	return $hasil;

}



function kekata($x) {

    $x = abs($x);

    $angka = array("", "satu", "dua", "tiga", "empat", "lima",

    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

    $temp = "";

    if ($x <12) {

        $temp = " ". $angka[$x];

    } else if ($x <20) {

        $temp = kekata($x - 10). " belas";

    } else if ($x <100) {

        $temp = kekata($x/10)." puluh". kekata($x % 10);

    } else if ($x <200) {

        $temp = " seratus" . kekata($x - 100);

    } else if ($x <1000) {

        $temp = kekata($x/100) . " ratus" . kekata($x % 100);

    } else if ($x <2000) {

        $temp = " seribu" . kekata($x - 1000);

    } else if ($x <1000000) {

        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);

    } else if ($x <1000000000) {

        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);

    } else if ($x <1000000000000) {

        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));

    } else if ($x <1000000000000000) {

        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));

    }     

        return $temp;

}





function terbilang($x, $style=4) {

    if($x<0) {

        $hasil = "minus ". trim(kekata($x));

    } else {

        $hasil = trim(kekata($x));

    }     

    switch ($style) {

        case 1:

            $hasil = strtoupper($hasil);

            break;

        case 2:

            $hasil = strtolower($hasil);

            break;

        case 3:

            $hasil = ucwords($hasil);

            break;

        default:

            $hasil = ucfirst($hasil);

            break;

    }     

    return $hasil;

}



?>