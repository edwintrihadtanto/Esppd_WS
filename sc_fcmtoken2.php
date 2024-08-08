<?php
require("config_koneksi/konfigurasi_nya.php");

//$query     =  @mysqli_query($con,"INSERT INTO tb_fcmtoken (no_fcm, nip) VALUES ('$fcm_token', '$nip') ");
$token      = $_POST['fcm_token'];
$nip        = $_POST['nip_pegawai'];
$token_new  = $_POST['fcm_token_new'];
//$token = 'hoke';
//$nip   = '303-03081992-052017-8776';

if (!empty($token)) {   

$cek_nim = $db->prepare("SELECT * FROM tb_fcmtoken WHERE no_fcm = :no_fcm");
$cek_nim->bindParam(":no_fcm", $token);
$cek_nim->execute();
$num_rows = $cek_nim->fetchColumn();

if($num_rows){    
    if ($token == $token_new ){
        try {
        $sql = $db->prepare("UPDATE tb_fcmtoken SET no_fcm = :no_fcm_new WHERE nip = :nip and no_fcm = :no_fcm");
        $sql->bindParam(":nip", $nip);
        $sql->bindParam(":no_fcm", $token);
        $sql->bindParam(":no_fcm_new", $token_new);
        $sql->execute();
        //echo $sql->rowCount() . " Record update successfully";   
            $jawaban_nya["sukses"] = 1;
            $jawaban_nya["pesan"] = "--_-- BERHASIL UPDATE--_--";        
            die(json_encode($jawaban_nya));
        }catch(PDOException $e){
        //echo $e->getMessage();
            $jawaban_nya["sukses"] = 0;
            $jawaban_nya["pesan"] = "FCMToken Gagal UPDATE !!!";
            die(json_encode($jawaban_nya));
        }      
        $db = null;
    }else{
        try {
        $sql = $db->prepare("DELETE FROM tb_fcmtoken WHERE nip = :nip");
        $sql->bindParam(":nip", $nip);        
        $sql->execute();
          
            $query_insert = "INSERT INTO tb_fcmtoken (no_fcm, nip) values (:fcm_token, :nip)" ;
            $array_simpan = array(
            
            ':fcm_token'  => $token,
            ':nip'        => $nip
            );

            try {
            
                $statement = $db->prepare($query_insert );
                $hasil_simpan = $statement->execute($array_simpan);       
              
            }catch (PDOException $ex) {
            
                $jawaban_nya["sukses"] = 0;
                $jawaban_nya["pesan"] = "FCMToken Gagal Tersimpan !!!";
                die(json_encode($jawaban_nya));
            
            }
            
            $jawaban_nya["sukses"] = 1;
            $jawaban_nya["pesan"] = "--_-- BERHASIL DIUPDATE --_--";
            echo json_encode($jawaban_nya);
        
        }catch(PDOException $e){
        
        }
        
        $db = null;
    }

}else{
 // $query_update = "UPDATE tb_user SET pass = :pass, security_level = :level WHERE nip = :nip_pegawai " ;

    $query_insert = "INSERT INTO tb_fcmtoken (no_fcm, nip) values (:fcm_token, :nip)" ;
    $array_simpan = array(
  
      ':fcm_token'  => $token,
      ':nip'        => $nip
    );

    try {
    
      $statement = $db->prepare($query_insert );
      $hasil_simpan = $statement->execute($array_simpan);       
        
    }catch (PDOException $ex) {

      $jawaban_nya["sukses"] = 0;
      $jawaban_nya["pesan"] = "FCMToken Gagal Tersimpan !!!";
      die(json_encode($jawaban_nya));

    }

    $jawaban_nya["sukses"] = 1;
    $jawaban_nya["pesan"] = "--_-- BERHASIL --_--";
    echo json_encode($jawaban_nya);
}

}else{
    $jawaban_nya["sukses"] = 1;
    $jawaban_nya["pesan"] = "Data Tidak Boleh Kosong";
    echo json_encode($jawaban_nya);
}


?> 