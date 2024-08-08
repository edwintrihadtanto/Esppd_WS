<?php
date_default_timezone_set('Asia/Jakarta');
include_once "../../config_koneksi/konfigurasi_nya.php";

$nip        = $_POST['nip'];
$namafoto   = $_POST['namafoto'];

if (!empty($_POST)) {

	if (empty($nip)) {
    
        $jawaban_nya["sukses"]  = 0;
        $jawaban_nya["pesan"]   = "Silahkan Anda Login Dari Awal !!!"; 

        die(json_encode($jawaban_nya));

    }else{
  
        $query_update        = "UPDATE tb_pegawai SET image = :image WHERE nip = :nip_pegawai " ;
    	$array_update = array(
    	
    	':nip_pegawai'	=> $nip,
    	':image'        => $namafoto
    	
    	);

        try {
     		
    	    $statement_update   = $db->prepare($query_update );
            $hasil_update       = $statement_update->execute($array_update);
    
        }catch (PDOException $ex) {
    
            $jawaban_nya["sukses"]  = 0;
            $jawaban_nya["pesan"]   = "Foto Gagal Diperbarui";
    
            die(json_encode($jawaban_nya));
    
        }
  
            $jawaban_nya["sukses"] = 1;
            $jawaban_nya["pesan"] = ".-_-.Foto Berhasil Di Perbarui.-_-.";
            echo json_encode($jawaban_nya);
    
    }
}
?> 