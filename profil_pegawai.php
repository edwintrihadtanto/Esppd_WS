<?php
date_default_timezone_set('Asia/Jakarta'); 

  $server = "localhost"; 

  $username = "rssoedon_admin"; 

  $password = "admin12345"; 
  
  $database = "rssoedon_sppd_rssm"; 
  


$link = @mysql_connect($server, $username, $password) or die('Cannot connect to the DB');

@mysql_select_db($database, $link) or die('Tidak Dapat Konek Database');


$nip = $_GET['nip_pegawai'];

//$nip = "053 108 294 1";


$sql_query = "SELECT * FROM tb_pegawai, tb_user where tb_pegawai.nip = tb_user.nip  and tb_pegawai.nip = '$nip' ";

$result = @mysql_query($sql_query, $link) or die('Errorquery:  '.$sql_query);

$tgl_sekarang = date('Y-m-d');

$jam_sekarang = date('H:i:s');

$data = array();



while($row = @mysql_fetch_object($result)){

	$data['tampil_data'][]= $row;

}



echo json_encode($data);


?>