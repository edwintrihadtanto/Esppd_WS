<?php
require("config_koneksi/konfigurasi_nya.php");

// $token      = $_POST['fcm_token'];
// $nip        = $_POST['nip_pegawai'];
//$token_new  = $_POST['fcm_token_baru'];
$token = 'hoke';
$nip   = '303-03081992-052017-877699';

if ((!empty($token)) && (!empty($nip))) {  //jika token tidak kosong 

    try {
        $delete = $db->prepare("DELETE FROM tb_fcmtoken WHERE nip = :nip");
        $delete->bindParam(":nip", $nip);        
        $delete->execute();
      
        $query_insert = "INSERT INTO tb_fcmtoken (no_fcm, nip) values (:fcm_token, :nip)" ;
        $array_simpan = array(
    
            ':fcm_token'  => $token,
            ':nip'        => $nip
        );
      
        $query_readimage = "SELECT * FROM tb_pegawai WHERE nip = :nip" ;
        $array_readimage = array(
            ':nip'        => $nip
        );
      
        $statement = $db->prepare($query_insert );
        $statement2 = $db->prepare($query_readimage );
        $hasil_simpan = $statement->execute($array_simpan);
        $statement2->execute($array_readimage);       
        $row = $statement2->fetch(PDO::FETCH_OBJ);

        $jawaban_nya["sukses"]          = 1;
        $jawaban_nya["pesan"]           = "--_-- E-SPPD Aktif --_--";
        $jawaban_nya["nama_pegawai"]    = $row->nama_pegawai;
        $jawaban_nya["jabatan_pegawai"] = $row->jabatan;
        $jawaban_nya["golongan"]        = $row->golongan;
        $jawaban_nya["status_pegawai"]  = $row->status;
        $jawaban_nya["image"]           = $row->image;
        echo json_encode($jawaban_nya);

    }catch(PDOException $e){
        
        $jawaban_nya["sukses"] = 0;
        $jawaban_nya["pesan"] = "Terjadi Masalah Dengan Notifikasi\nHubungi IPDE !!!";
        die(json_encode($jawaban_nya));
        
    }      
        $db = null;

}else{
    
    $jawaban_nya["sukses"] = 1;
    $jawaban_nya["pesan"] = "--_-- E-SPPD Gagal Di Aktifkan --_--";
    echo json_encode($jawaban_nya);
}


?> 