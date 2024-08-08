<?php

header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


require("config_koneksi/config_koneksi.php");

$query = "SELECT tb_pegawai.nip, nama_pegawai, jabatan, golongan, pass FROM tb_pegawai LEFT JOIN tb_user

ON tb_pegawai.nip = tb_user.nip where nama_pegawai <> 'Administrator' and nama_pegawai <> '--- Nama Pegawai ---'   order by nama_pegawai ASC ";

//$query = "SELECT * FROM tb_pegawai where nama_pegawai <> 'Administrator' and nama_pegawai <> '--- Nama Pegawai ---'  order by nama_pegawai ASC ";


$result = @mysql_query($query, $link) or die('Errorquery:  '.$query);

$data = array();

while($row = @mysql_fetch_object($result)){

	$data['tampil_data_nip'][]= $row;

}

echo json_encode($data);

?>
