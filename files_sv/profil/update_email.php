<?php
date_default_timezone_set('Asia/Jakarta');
include_once "../../config_koneksi/konfigurasi_nya.php";

$nip    = $_POST['nip'];
$email  = $_POST['email'];

if (!empty($_POST)) {

	if (empty($nip)) {
    
        $jawaban_nya["sukses"]  = 0;
        $jawaban_nya["pesan"]   = "Silahkan Anda Login Dari Awal !!!"; 

        die(json_encode($jawaban_nya));

    }else{
  
        $query_update        = "UPDATE tb_pegawai SET email = :email WHERE nip = :nip_pegawai " ;
    	$array_update = array(
    	
    	':nip_pegawai'	=> $nip,
    	':email'        => $email
    	
    	);

        try {
     		
    	    $statement_update   = $db->prepare($query_update );
            $hasil_update       = $statement_update->execute($array_update);
    
        }catch (PDOException $ex) {
    
            $jawaban_nya["sukses"]  = 0;
            $jawaban_nya["pesan"]   = "Gagal Update Email";
    
            die(json_encode($jawaban_nya));
    
        }
  
            $jawaban_nya["sukses"] = 1;
            $jawaban_nya["pesan"] = ".-_-.Email Berhasil Di Ganti.-_-.";
            echo json_encode($jawaban_nya);
    
    }
}
?> 