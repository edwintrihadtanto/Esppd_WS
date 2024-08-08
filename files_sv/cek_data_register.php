<?php
date_default_timezone_set('Asia/Jakarta');

include_once "../config_koneksi/konfigurasi_nya.php";

	 class usr{}

	 $nip_pegawai = $_POST["nip"];
	 //$nip_pegawai = "19800825 200801 2 009";

	 if (empty($nip_pegawai)) { 

	 	$response = new usr();

	 	$response->success = 0;
	 	$response->message = "NIP/NPK Pegawai Harus Diisi !!!"; 

	 	die(json_encode($response));

	 }

// 	 $cek_user 		= @mysqli_query($con, "SELECT * FROM tb_user WHERE nip= '$nip_pegawai' order by nip ASC");	
// 	 $row_cek_user	= @mysqli_fetch_array($cek_user);

    $cek_data = @mysqli_query($con, "
    SELECT
	count( tb_pegawai.nip ) AS count_nip,
	count( tb_user.nip ) AS count_user,
	tb_pegawai.nip AS nip,
	nama_pegawai,
	jabatan,
	golongan,
	security_level,
	pass,
	email
FROM
	tb_user
	RIGHT JOIN tb_pegawai ON tb_user.nip = tb_pegawai.nip 
WHERE
	tb_pegawai.nip = '$nip_pegawai' 
ORDER BY
	tb_user.nip ASC;
	");

	 $row = @mysqli_fetch_array($cek_data);

if (($row['count_nip'] == 0) && ($row['count_user'] == 0)){
    
    $response = new usr();
    $response->success = 404;
    $response->message = "Anda Belum Terdaftar Di Kepegawaian !!!";
    
    $response->nip          = "";
    $response->nama_pegawai = "";
    $response->jabatan      = "";
    $response->golongan     = "";
    $response->password     = "";
    $response->email        = "";
    die(json_encode($response));
    
}else{
    if($row['count_user'] == 1){
    
        $response = new usr();
        
        $response->success      = 1;
        
        $response->message      = "Data Anda Sudah Terdaftar";
        
        $response->nip          = $row['nip'];
        
        $response->nama_pegawai = $row['nama_pegawai'];
        
        $response->jabatan      = $row['jabatan'];
        
        $response->golongan     = $row['golongan'];
        
        $response->password     = $row['pass'];
        
        $response->email        = $row['email'];
        
        die(json_encode($response));
    
    }else{
        $response = new usr();
        
        $response->success      = 0;
        
        $response->message      = "Silahkan Isi Password Baru Anda";
        
        $response->nip          = $row['nip'];
        
        $response->nama_pegawai = $row['nama_pegawai'];
        
        $response->jabatan      = $row['jabatan'];
        
        $response->golongan     = $row['golongan'];
        
        $response->password     = "";
        
        $response->email        = $row['email'];
        
        die(json_encode($response));
        
    }
}
@mysqli_close($con);



?> 