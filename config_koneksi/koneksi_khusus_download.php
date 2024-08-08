<?php
/*
define('HOST','localhost');

define('USER','root');

define('PASS','');

define('DB','rssoedon_sppd_rssm');

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect Databases');

*/


$dbhost = ''; 
$dbuser = '';     // ini berlaku di xampp
$dbpass = '';         // ini berlaku di xampp
$dbname = '';
 
// melakukan koneksi ke database
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
 
// cek koneksi yang kita lakukan berhasil atau tidak
if ($connect->connect_error) {
   // jika terjadi error, matikan proses dengan die() atau exit();
   die('Maaf koneksi gagal: '. $connect->connect_error);
}

	function rupiah($angka){
           $jadi="Rp.".number_format($angka,0,',','.');
           return $jadi;
	}

	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
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
?>