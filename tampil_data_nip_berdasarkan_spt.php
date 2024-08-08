<?php



header('Content-type: application/json');

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST, GET, OPTIONS');



require("config_koneksi/config_koneksi.php");

$query = "SELECT

tb_spt.nomor_spt, tb_pegawai.nip, nama_pegawai, jabatan, golongan, jml_petugas, dikeluarkan, tgl_dikeluarkan, lama_pelaksanaan,

tgl_berangkat, tgl_tiba

FROM 

tb_pegawai, tb_spt, tb_petugas_yg_ditugaskan 

where 

tb_spt.nomor_spt = tb_petugas_yg_ditugaskan.nomor_spt 

and 

tb_petugas_yg_ditugaskan.nip = tb_pegawai.nip 

order by tb_petugas_yg_ditugaskan.id_tugas DESC ";


$result = @mysql_query($query, $link) or die('Errorquery:  '.$query);

$data = array();

while($row = @mysql_fetch_object($result)){

	$data['tampil_data_nip'][]= $row;

}



echo json_encode($data);



?>

