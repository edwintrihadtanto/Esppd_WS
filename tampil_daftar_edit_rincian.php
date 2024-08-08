<?php

require("config_koneksi/config_koneksi.php");



$nip = $_GET['nip_pegawai'];
$nomor_sppd = $_GET['nomor_surat_sppd'];

//$nomor_sppd = '094/2165/303/2017';

$sql_query = " SELECT * from tb_perincian_biaya where nomor_surat_sppd = '$nomor_sppd' and bukti_image <> ' ' order by jumlah DESC ";



$result = @mysql_query($sql_query, $link) or die('Errorquery:  '.$sql_query);

$data = array();

while($row = @mysql_fetch_object($result)){

$no++;

	$data['tampilkan_saja'][]= $row;

}



echo json_encode($data);


?>