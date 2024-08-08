<?php


include_once "config_koneksi/config_koneksi.php";


	$nip= $_POST['nip'];

	$no_sppd= $_POST['no_sppd'];
	
	$query = "UPDATE tb_input_sppdbaru SET status_rincian_biaya = 'SUDAH', status_riil = 'SUDAH', status_post = '1'  

		WHERE nomor_surat_sppd = '$no_sppd' and nip = '$nip' and status_laporan_petugas = 'SUDAH'	" ;	

	$result = @mysql_query($query, $link) or die('Error query:  '.$query);

	echo "SUCCESS";

?>