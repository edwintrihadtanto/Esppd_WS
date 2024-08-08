<?php
date_default_timezone_set('Asia/Jakarta');
include_once "../config_koneksi/konfigurasi_nya.php";

$versiapk_POST      = $_POST['versi_apk'];
$versiapk_saatini   = '3.0'; //disesuaikan dengan versi yg lama atau yg baru

$kode_info          = 0;    //ganti 405 untuk memberikan info dan ganti 0 untuk proses aman
$kode_maintenance   = 0;  //ganti 404 untuk maintenance supaya tidak bisa digunakan dan ganti 0 untuk proses aman

// if($versi_apk == $versiapkx) { //
//     $cek_versi = true; //jika versinya sama 2.0
// }

if ($versiapk_POST == $versiapk_saatini) {
    
    if (($kode_info == 405)&&($kode_maintenance == 404)){
        $json["code"]     = 405404;
        $json["warning"]  = "Informasi E-SPPD";
        $json["pesan"]    = "Info dan Maintenance";
        die(json_encode($json));
    }else if ($kode_info == 405){                   //INFO
        $json["code"]     = 405;
        $json["warning"]  = "Informasi E-SPPD";
        $json["pesan"]    = "Mohon Maaf, Untuk Saat Ini Sistem E-SPPD Sedang Ada Pembaruan.\nKemungkinan ada beberapa menu yang mengalami trouble...\nMohon maaf atas ketidaknyamanannya, Terima Kasih Atas Perhatiannya";
        die(json_encode($json));
        
    }else if ($kode_maintenance == 404){            //MAINTENANCE
        $json["code"]     = 404;
        $json["warning"]  = "Informasi E-SPPD";
        $json["pesan"]    = "Maintenance";
        die(json_encode($json));
        
    }else{
        //tidak terjadi apapun
        $json["code"]   = 1;
        $json["pesan"]  = "Anda Sudah Menggunakan Versi Terbaru";
        die(json_encode($json));
    }
 

 
}else{ //jika versinya tidak sama 2.0 atau dengan versi yg lebih baru

    $versiapk_baru2         = '3.0';
    $json["code"]           = 101;
    $json["versiygbaru"]    = $versiapk_baru2;
    $json["warning"]        = "Pembaruan E-SPPD V3 Sudah Selesai";
    $json["pesan"]          = "Silahkan Anda DOWNLOAD atau Masuk Ke WEBSITE Kami\n\nTerima Kasih, Atas Dukungan dan Bantuannya...";
    die(json_encode($json));
}
?> 