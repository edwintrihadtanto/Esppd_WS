<?php
date_default_timezone_set('Asia/Jakarta');
require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {	

    $query = "SELECT * FROM tb_perincian_biaya WHERE nomor_surat_sppd = :nomor_surat_sppd";
    $parameter_nya = array(

        ':nomor_surat_sppd' => $_POST['nomor_surat_sppd']

    );

    try {

        $statement_nya   = $db->prepare($query);
        $result = $statement_nya->execute($parameter_nya);

    }

    catch (PDOException $ex) {

        $jawaban_nya["berhasil"] = 0;

        $jawaban_nya["tampilkan_pesan"] = "No SPPD Tidak Terdaftar !!!";

        die(json_encode($jawaban_nya));

    }

    $validasi_identitas = false;
    $row = $statement_nya->fetch();

    if ($row) {

        if ($_POST['nip'] === $row['nip']) {
            $login_nya_ok = true;
        }

    }


        if ($login_nya_ok) {
    
        
            
            $sql_update = "UPDATE tb_perincian_biaya SET  rincian_biaya = :rincian_biaya, jumlah = :jumlah, tgl_pembuatan_rincian = :tgl_pembuatan_rincian 

	            WHERE id_rincian = :id_rincian and nomor_surat_sppd = :nomor_surat_sppd " ;
	            
	        $update_query = array(
	
            	':rincian_biaya'		=> $_POST['uraian'],
            	
            	':jumlah'			    => $_POST['jml'],
            
            	':tgl_pembuatan_rincian'=> date("Y-m-d"),
            
            	':id_rincian'		    => $_POST['id_rincian'],
            
            	':nomor_surat_sppd'		=> $_POST['nomor_surat_sppd']
    	    );
    	    
        	    try {
    
    		     $proses  = $db->prepare($sql_update);
                 $result  = $proses->execute($update_query);
    
        	    }
    
        		catch (PDOException $ex) {
    
            	$jawaban_nya["berhasil"] = 0;
            	$jawaban_nya["tampilkan_pesan"] = "Gagal Update/Insert Data !!!";
            	die(json_encode($jawaban_nya));
    
        	    }
        	
            	$jawaban_nya["berhasil"] = 1;
            	$jawaban_nya["tampilkan_pesan"] = "Update Data Sukses !!! ";
                die(json_encode($jawaban_nya));
    
        } else {
            
            $jawaban_nya["berhasil"] = 0;
            $jawaban_nya["tampilkan_pesan"] = "Masukan Data Yang Benar !!!";
            die(json_encode($jawaban_nya));
        }

 
} else {


?>
 <h1>Login</h1> 

  <form action="update_rincian_biaya.php" method="post"> 

      nomor_surat_sppd:<br /> 

      <input type="text" name="nomor_surat_sppd" placeholder="nomor_surat_sppd" /> 

      <br /><br /> 


      nip:<br /> 

      <input type="text" name="nip" placeholder="nip" value="" /> 

      <br /><br /> 


      <input type="submit" value="Login" /> 

  </form> 


 <?php
}

?> 