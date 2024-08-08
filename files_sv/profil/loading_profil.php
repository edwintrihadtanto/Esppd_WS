<?php
date_default_timezone_set('Asia/Jakarta');
include_once "../../config_koneksi/konfigurasi_nya.php";

	class loading{}

	$nip   = $_POST["nip"];
	//$nip   = "303-03081992-052017-8776";
    
	if (empty($nip)){ 

	 	$response = new loading();

	 	$response->sukses = 404;
	 	$response->pesan = "Session Telah Berakhir\nSilahkan Login Kembali !!!"; 

	 	die(json_encode($response));

	}

	 $cek_user 		= @mysqli_query($con, "
	         SELECT 
        	 tb_pegawai.nip as nip, 
        	 nama_pegawai, jabatan, golongan, security_level, pass, email, image
        	 FROM  tb_user, tb_pegawai 
        	 WHERE tb_user.nip = tb_pegawai.nip and tb_user.nip='$nip' 
        	 order by tb_user.nip ASC ");	
	 $row	        = @mysqli_fetch_array($cek_user);

	 
    if ($row) {
        
	 	$response = new loading();

		$response->sukses       = 1;
	 	$response->pesan        = "Data Ditemukan";
	 	$response->nip          = $row['nip'];
	 	$response->nama         = $row['nama_pegawai'];
	 	$response->jabatan      = $row['jabatan'];
	 	$response->golongan     = $row['golongan'];
	 	$response->password     = $row['pass'];
	 	$response->email        = $row['email'];
	 	$response->image        = $row['image'];
	 	die(json_encode($response));


    }else{
    
		$response = new loading();
		$response->sukses       = 0;
		$response->pesan        = "Data Tidak Ditemukan";
		die(json_encode($response));
	}

@mysqli_close($con);
?> 