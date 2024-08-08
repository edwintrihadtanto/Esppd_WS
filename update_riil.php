<?php
date_default_timezone_set('Asia/Jakarta');
require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {	

    $query = "SELECT * FROM tb_rincian_pengeluaran_riil WHERE id_riil = :id_riil";
    $parameter_nya = array(

        ':id_riil' => $_POST['id_riil']

    );

        try {

            $statement_nya   = $db->prepare($query);
            $result = $statement_nya->execute($parameter_nya);

        }catch (PDOException $ex) {

            $jawaban_nya["berhasil"] = 0;
            $jawaban_nya["tampilkan_pesan"] = "No ID Tidak Terdaftar !!!";
    
            die(json_encode($jawaban_nya));
        }

        $validasi_identitas = false;
        $row = $statement_nya->fetch();

    if ($row) {

        if ($_POST['id_riil'] === $row['id_riil']) {
            $login_nya_ok = true;
        }

    }


        if ($login_nya_ok) {
    
            $sql_update = "UPDATE tb_rincian_pengeluaran_riil SET  uraian_daftar_riil = :uraian_daftar_riil, jumlah_riil = :jumlah_riil, tgl_pembuatan = :tgl_pembuatan 

	            WHERE id_riil = :id_riil" ;
	            
	        $update_query = array(
	
            	':id_riil'		            => $_POST['id_riil'],
            	
            	':uraian_daftar_riil'		=> $_POST['uraian_daftar_riil'],
            	
            	':jumlah_riil'			    => $_POST['jumlah_riil'],
            
            	':tgl_pembuatan'            => date("Y-m-d")
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

  <form action="update_rincian_riil.php" method="post"> 

      nomor_surat_sppd:<br /> 

      <input type="text" name="id_riil" placeholder="nomor_surat_sppd" /> 

      <br /><br /> 


      nip:<br /> 

      <input type="text" name="nip" placeholder="nip" value="" /> 

      <br /><br /> 


      <input type="submit" value="Login" /> 

  </form> 


 <?php
}

?> 