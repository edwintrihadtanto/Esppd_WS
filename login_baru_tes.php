<?php
date_default_timezone_set('Asia/Jakarta');

//require("config_koneksi/konfigurasi_nya.php");
include_once "config_koneksi/konfigurasi_nya.php";

	 class usr{}

	 $username = $_POST["nip"];
     $password = md5($_POST["pass"]);

 	
 		//$username = '303-03081992-052017-8776';

	 	//$password = md5('edwin');
    

	 if ((empty($username)) || (empty($password))) { 

	 	$response = new usr();

	 	$response->success = 0;

	 	$response->message = "Kolom Inputan Tidak Boleh Kosong"; 

	 	die(json_encode($response));

	 }

	 $cek_user 		= @mysqli_query($con, "SELECT * FROM tb_user WHERE 
				nip='$username' order by nip ASC");	
	 $row_cek_user	= @mysqli_fetch_array($cek_user);

	 $query = @mysqli_query($con, "
	 SELECT 
	 tb_pegawai.nip as nip, 
	 nama_pegawai, jabatan, golongan, security_level, pass 
	 FROM  tb_user, tb_pegawai 
	 WHERE tb_user.nip = tb_pegawai.nip and tb_user.nip='$username' 
	 AND pass='$password' 
	 order by tb_user.nip ASC");

	 $row = @mysqli_fetch_array($query);

if ($row_cek_user) {
        if ($row) {
        
	        if($row['security_level'] == 1){

		    //$cek_level_ok_1 = true;
		    
        	 	$response = new usr();
        
        		$response->level = 1;
        
        	 	$response->success = 1;
        
        	 	$response->message = "Selamat datang Administrator\n".$row['nama_pegawai'];
        
        	 	$response->id = $row['id'];
        
        	 	$response->nip = $row['nip'];
        
        	 	$response->nama_pegawai = $row['nama_pegawai'];
        	 	
        	 	$response->jabatan = $row['jabatan'];
        	 	
        	 	$response->golongan = $row['golongan'];
        	 	
        	 	$response->password = $row['pass'];
        
        	 	die(json_encode($response));


		    }else if ($row['security_level'] == 2){

		    //$cek_level_ok_2 = true;
		    
        	 	$response = new usr();
        
        		$response->level = 2;
        
        	 	$response->success = 1;
        
        	 	$response->message = "Selamat datang Petugas\n".$row['nama_pegawai'];
        
        	 	$response->id = $row['id'];
        
        	 	$response->nip = $row['nip'];
        
        	 	$response->nama_pegawai = $row['nama_pegawai'];
        	 	
        	 	$response->jabatan = $row['jabatan'];
        	 	
        	 	$response->golongan = $row['golongan'];
        	 	
        	 	$response->password = $row['pass'];
        	 	
        	 	$response->sukses_simpan = 0;
        
          
                $nip_login = $_POST["nip"];
                
                $tgl_skrng = date("d/m/y");
                
             	$jam_skrng = date("H:i:sa");
             	
             	$versi    = $_POST["versi"];
             	
            	     
                $query =  @mysqli_query($con,"insert into login_activity (nip, tgl_bln_thn, waktu, versi) values ('$nip_login', '$tgl_skrng' , '$jam_skrng', '$versi')");
          
        	 	die(json_encode($response));
		    
		    }else if ($row['security_level'] == 3){
		    
		    //$cek_level_ok_3 = true;
		    	$response = new usr();
        
        		$response->level = 3;
        
        	 	$response->success = 1;
        
        	 	$response->message = "Selamat Datang Pak Boss, Silahkan Berselancar Di Aplikasi E-SPPD".$row['nama_pegawai'];
        
        	 	$response->id = $row['id'];
        
        	 	$response->nip = $row['nip'];
        
        	 	$response->nama_pegawai = $row['nama_pegawai'];
        
        	 	die(json_encode($response));
		    }    

        }else{
			$response = new usr();

			$response->level = 0;

			$response->success = 0;

			$response->message = "NIP/NPK dan Passoword Anda Salah\nSilahkan Ulangi Lagi Dengan Benar.";

			die(json_encode($response));
		}
}else{
			$response = new usr();

			$response->level = 0;

			$response->success = 0;

			$response->message = "Anda belum REGISTER untuk masuk ke aplikasi E-SPPD\n.-_-.Silahkan anda REGISTER di menu yang telah disediakan.-_-.";

			die(json_encode($response));
}
	

	 @mysqli_close($con);



?> 