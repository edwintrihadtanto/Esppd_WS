<?php

 $server = ""; 

  $username = ""; 

  $password = ""; 
  
  $database = ""; 
  

@mysql_connect($server, $username, $password) or die(@mysql_error());

@mysql_select_db($database) or die(@mysql_error());

include "fungsi_thumb.php";


//include "function_images.php";



  $lokasi_file    = $_FILES['uploaded_file']['tmp_name'];

  $tipe_file      = $_FILES['uploaded_file']['type'];

  $nama_file      = $_FILES['uploaded_file']['name'];

  $acak           = rand(1,9999);
  

  $nomor_surat_sppd 	= $_POST['no_sppd'];

  $nip 			= $_POST['ambilnip'];

  $rincian_biaya 	= $_POST['uraian'];

  $jumlah 		= $_POST['jml'];

  $tgl_pembuatan 	= $_POST['tgl_buat'];


  $nama_file_unik 	= $acak."-".$nama_file;



if (!empty($lokasi_file)){

    UploadImage($nama_file_unik);

 	$querry = "INSERT INTO tb_perincian_biaya

	(nomor_surat_sppd, nip, rincian_biaya, jumlah, tgl_pembuatan_rincian, bukti_image) 

	VALUES

	('$nomor_surat_sppd', '$nip', '$rincian_biaya', '$jumlah', '$tgl_pembuatan', '$nama_file_unik')";

     	@mysql_query($querry);



}else {


echo 'oops! Please try again!';


}


?>