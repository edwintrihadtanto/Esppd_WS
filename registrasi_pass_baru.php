
<?php

date_default_timezone_set('Asia/Jakarta');
require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {

	if (empty($_POST['nip'])) {
    
        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Data Ridak Boleh Kosong"; 

        die(json_encode($jawaban_nya));

    }

    $query        = " SELECT * FROM tb_user WHERE nip = :nip_pegawai";
    $yang_di_query = array(

        ':nip_pegawai' => $_POST['nip']	
    );

    //jalankan query-nya

    try {

        // bikin statement apa yang mau di query ke database. 
        $statement_nya   = $db->prepare($query);

        $result = $statement_nya->execute($yang_di_query);
    }

    catch (PDOException $ex) {
        $jawaban_nya["sukses"] = 1;

        $jawaban_nya["pesan"] = "Maaf Nama Anda Sudah Terdaftar";

        die(json_encode($jawaban_nya));

    }    

	

 // $query_update = "UPDATE tb_user SET pass = :pass, security_level = :level WHERE nip = :nip_pegawai " ;

    $query_update = "insert into tb_user (nip, pass, security_level, tgl_buat) values (:nip_pegawai, :pass_md5, :level, :tgl_skrng)" ;

	$array_simpan_update = array(
	
	':nip_pegawai'	=> $_POST['nip'],

	':pass_md5'		=> md5($_POST['pass']),
    
	':level'	    => "2",
	
	':tgl_skrng'    => date("Y/m/d H:i:s")
    );


    $query_simpan_backup = "insert into tb_backup_users (md5_pass,nip,pass_show, tgl_buat) values (:pass_md5,:nip_pegawai, :pass_show, :tgl_buat)" ;

	$array_backup = array(
	
	':nip_pegawai'	=> $_POST['nip'],

	':pass_md5'		=> md5($_POST['pass']),
    
	':pass_show'	=> $_POST['pass'],
	
	':tgl_buat'     => date("Y/m/d H:i:s")
	
    	);

    try {
 		
	    $statement_update   = $db->prepare($query_update );
        $hasil_update = $statement_update->execute($array_simpan_update);

        $statement_backup   = $db->prepare($query_simpan_backup );
        $backup = $statement_backup->execute($array_backup);
    }catch (PDOException $ex) {

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Gagal, Pembuatan Password Baru !!!";

        die(json_encode($jawaban_nya));

    }
  

    $jawaban_nya["sukses"] = 1;

    $jawaban_nya["pesan"] = "Pembuatan Password Baru, Berhasil !!!";

    echo json_encode($jawaban_nya);
 
} else {



?>



 <h1>Register</h1> 



 <form action="simpan_data_SPT.php" method="post"> 



     Nomor Test:<br /> <input type="text" name="nomor_spt" value="" /> <br /><br /> 



     Nip:<br /> <input type="text" name="nip" value="" /> <br /><br /> 





     <input type="submit" value="Register User Baru" /> 



 </form>



 <?php



}



?> 