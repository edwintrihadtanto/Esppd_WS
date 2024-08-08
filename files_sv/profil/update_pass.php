<?php
date_default_timezone_set('Asia/Jakarta');
include_once "../../config_koneksi/konfigurasi_nya.php";

if (!empty($_POST)) {

	if (empty($_POST['nip_pegawai'])) {
    
        $jawaban_nya["sukses"]  = 0;
        $jawaban_nya["pesan"]   = "Silahkan Anda Login Dari Awal !!!"; 

        die(json_encode($jawaban_nya));

    }

    $query          = " SELECT * FROM tb_user WHERE nip = :nip_pegawai";
    $yang_di_query  = array(
        ':nip_pegawai' => $_POST['nip_pegawai']	
    );

    try {

        $statement_nya      = $db->prepare($query); // bikin statement apa yang mau di query ke database.
        $result             = $statement_nya->execute($yang_di_query);
    }

    catch (PDOException $ex) {
        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Data Tidak Terdaftar";

        die(json_encode($jawaban_nya));

    }    

  
    $query_update = "UPDATE tb_user SET pass = :pass_md5, tgl_buat = :tgl_buat  WHERE nip = :nip_pegawai " ;

	$array_simpan_update = array(
	
	':nip_pegawai'	=> $_POST['nip_pegawai'],

	':pass_md5'		=> md5($_POST['ambil_pass_baru']),
	
	':tgl_buat'     => date("Y/m/d H:i:s")
	
    	);

    $query_delete_backup = "DELETE FROM tb_backup_users where nip = :nip_pegawai " ;

	$array_deletebackup = array(
	
	':nip_pegawai'	=> $_POST['nip_pegawai']
	
    );
    	
    $query_simpan_backup = "INSERT INTO tb_backup_users (md5_pass,nip,pass_show, tgl_buat) values (:pass_md5,:nip_pegawai, :pass_show, :tgl_buat)" ;

	$array_backup = array(
	
	':nip_pegawai'	=> $_POST['nip_pegawai'],

	':pass_md5'		=> md5($_POST['ambil_pass_baru']),
    
	':pass_show'	=> $_POST['ambil_pass_baru'],
	
	':tgl_buat'     => date("Y/m/d H:i:s")
	
    	);


    try {
 		
	    $statement_update   = $db->prepare($query_update );
        $hasil_update       = $statement_update->execute($array_simpan_update);
        
        $statement_deletebackup   = $db->prepare($query_delete_backup );
        $deletebackup             = $statement_deletebackup->execute($array_deletebackup);
        
        $statement_backup   = $db->prepare($query_simpan_backup );
        $backup             = $statement_backup->execute($array_backup);

    }catch (PDOException $ex) {

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Gagal Update Password";

        die(json_encode($jawaban_nya));

    }
  

    $jawaban_nya["sukses"] = 1;

    $jawaban_nya["pesan"] = ".-_-.Password Berhasil Di Ganti.-_-.";

    echo json_encode($jawaban_nya);
 
}
?> 