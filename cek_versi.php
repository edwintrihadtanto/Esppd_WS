<?php
require("config_koneksi/konfigurasi_nya.php");
if($_POST['kirim_versi'] === '2.0') {
    $cek_versi = true;
}

$versi_saat_ini = $_POST['kirim_versi'];
$versiapk = '2.0';

if ($cek_versi) {

 	$jawaban_nya["berhasil"] = 1;
    $jawaban_nya["tampilkan_pesan"] = "Versi 2.0";
    //$jawaban_nya["tampilkan_pesan"] = "Wajib"; //UNTUK MENGAKTIFKAN INI VERSI DIATAS HARUS DIGANTI
    //$jawaban_nya["pesan"] = "Versi Tebaru Telah Tersedia, Silahkan Anda Download Dengan Cara Klik Download Dibawah Ini atau Melalui Website\nsppdrssm.rssoedonomadiun.co.id\nTerima Kasih ^_^";
    $pesan = "\nMohon Maaf, Untuk Saat Ini Sistem E-SPPD Sedang Ada Pembaruan.\nKemungkinan ada beberapa menu yang mengalami trouble...\nMohon maaf atas ketidaknyamanannya, Terima Kasih Atas Perhatiannya";
    //$jawaban_nya["tampilkan_pesan"] = ".-Sedang Maintenance Sistem-.".$pesan;
        
    die(json_encode($jawaban_nya));

 
}else{

    $jawaban_nya["berhasil"] = 0;
    //$jawaban_nya["tampilkan_pesan"] = "Silahkan Download Versi e-sppd Terbaru e-Sppd.v.$versiapk.apk atau Hubungi Pihak Administrator Untuk Mendapatkan Update'an Versi atau Masuk Ke Website\nsppdrssm.rssoedonomadiun.co.id"; //khusus versi 1.3.3
      
    //$jawaban_nya["tampilkan_pesan"] = "Silahkan Anda Download Versi E-SPPD Terbaru $versiapk!!!\n\n atau\n\nHubungi Pihak Administrator Untuk Mendapatkan Update'an Versi...";
    //$jawaban_nya["tampilkan_pesan"] = "Wajib";
    
//    $jawaban_nya["tampilkan_pesan"] = "Sunnah";
    
    $jawaban_nya["tampilkan_pesan"] = "Maintenance Aplikasi E-SPPD... Tunggu beberapa jam lagi !!!\nTerima kasih";
//	$jawaban_nya["tampilkan_pesan"] = "Mohon Maaf, Untuk Saat Ini Sistem E-SPPD Sedang Ada Pembaruan.\nKemungkinan ada beberapa menu yang mengalami trouble...\nMohon maaf atas ketidaknyamanannya, Terima Kasih Atas Perhatiannya";
    
	$jawaban_nya["kirim_versinya"]  = "2.0"; //DIGANTI KETIKA ADA VERSI BARU
	$jawaban_nya["pesan"] = "Versi Tebaru Telah Tersedia, Silahkan Anda Download Dengan Cara Klik DOWNLOAD Dibawah Ini atau Melalui Website\n\nsppdrssm.rssoedonomadiun.co.id\nTerima Kasih ^_^";
	


    die(json_encode($jawaban_nya));
    
	}


?> 