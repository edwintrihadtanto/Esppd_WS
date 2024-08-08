<?php


include_once "config_koneksi/config_koneksi.php";


	$nip= $_POST['nip'];

	$feedback= $_POST['feedback'];

	$tgl_kritik= $_POST['tgl_kritik'];

	$query = "insert into tb_kritik_saran 

		(nip, feedback, tgl_kritik) 

		values

		('$nip','$feedback','$tgl_kritik')";	

	$result = @mysql_query($query, $link) or die('Error query:  '.$query);

	echo "SUCCESS";

?>