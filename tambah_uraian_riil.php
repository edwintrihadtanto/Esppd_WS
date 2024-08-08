<?php
date_default_timezone_set('Asia/Jakarta');
require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {	

   	$query = "insert into tb_rincian_pengeluaran_riil

		(nomor_surat_sppd, nip, uraian_daftar_riil, jumlah_riil, tgl_pembuatan, nama_file_upload) 

		values 

		( :nomor_sppd, :nip, :rincian_biaya, :jumlah, :tgl_pembuatan_rincian, '-')";
  	
	$array = array(
	
//	':nomor_sppd'		=> "094/54321/303/2017",
	
//	':nip'			    => "303-03081992-052017-8776",

	':nomor_sppd'		=> $_POST['nomor_sppd'],
	
	':nip'			    => $_POST['nip'],

 	':rincian_biaya'	=> $_POST['uraian_daftar_riil'],

	':jumlah'		    => $_POST['jumlah_riil'],

	':tgl_pembuatan_rincian'=> date("Y-m-d")

    	);
	
	
	try {

		    $statement  = $db     ->prepare($query);
        	$hasil      = $statement -> execute($array);
        	
	}catch (PDOException $ex) {

        	$jawaban_nya["berhasil"] = 0;
        	$jawaban_nya["tampilkan_pesan"] = "Maaf, Sedang Dalam Maintenance Sistem Data !!!";
        	die(json_encode($jawaban_nya));

    	}
    
    
        	$jawaban_nya["berhasil"] = 1;
        	$jawaban_nya["tampilkan_pesan"] = "Simpan Berhasil !!!";
        	echo json_encode($jawaban_nya);
    
     
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