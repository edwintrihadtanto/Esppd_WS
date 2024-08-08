<?php
date_default_timezone_set('Asia/Jakarta');

//require("config_koneksi/konfigurasi_nya.php");
include_once "../config_koneksi/konfigurasi_nya.php";

	 class usr{}

	 $username = $_POST["nip"];
    
	 if ((empty($username))) { 

	 	$response = new usr();

	 	$response->success = 0;

	 	$response->message = "Data Kosong"; 

	 	die(json_encode($response));

	 }

	 $cek_user 		= @mysqli_query($con, "SELECT * FROM tb_pegawai WHERE nip='$username'");	
	 $row_cek_user	= @mysqli_fetch_array($cek_user);

if ($row_cek_user) {
		    
        	 	$response = new usr();
        
        	 	$response->success      = 1;
        
        	 	$response->message      = "Data Barang Terdaftar\n".$row_cek_user['nama_pegawai'];
        
        	 	$response->id_nip       = $row_cek_user['id_nip'];
        
        	 	$response->nip          = $row_cek_user['nip'];
        
        	 	$response->nama_pegawai = $row_cek_user['nama_pegawai'];
        	 	
        	 	$response->jabatan      = $row_cek_user['jabatan'];
        	 	
        	 	$response->golongan     = $row_cek_user['golongan'];
        	 	
        
        	 	die(json_encode($response));

}else{
			$response = new usr();

			$response->success = 0;

			$response->message = "Barang Belum Ada Dalam Database";

			die(json_encode($response));
}
	

	 @mysqli_close($con);



?> 