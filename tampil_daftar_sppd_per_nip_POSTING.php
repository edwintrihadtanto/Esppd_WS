<?php
//require("config_koneksi/config_koneksi.php");
$host     = "localhost"; 
$username = "rssoedon_admin"; 
$password = "admin12345"; 
$dbname   = "rssoedon_sppd_rssm"; 

$link = mysqli_connect($host,$username,$password,$dbname);
if ($link->connect_error) {   
   die('Maaf koneksi gagal: '. $connect->connect_error);
}

$nip = $_GET['nip_pegawai'];

//$nip = "303-03081992-052017-8776";


//-----------------------------------------------------------------------------//

// $sql_query_ambil_jmlh_posting = " 
// SELECT
// 	count( status_post ) AS jml_stspost,
// 	count( nomor_surat_sppd ) AS jml_nomor_surat_sppd,
// 	'Ket: Dimohon Untuk Mem Posting SPPD, apabila telah selesai dikerjakan.' AS note,
// 	jml_terposting 
// FROM
// 	tb_spt
// 	JOIN tb_petugas_yg_ditugaskan ON tb_petugas_yg_ditugaskan.nomor_spt = tb_spt.nomor_spt
// 	JOIN tb_pegawai ON tb_petugas_yg_ditugaskan.nip = tb_pegawai.nip
// 	JOIN tb_input_sppdbaru ON tb_input_sppdbaru.nomor_spt = tb_spt.nomor_spt 
// 	AND tb_input_sppdbaru.nip = '$nip' 
// 	AND tb_petugas_yg_ditugaskan.nip = '$nip' 
// 	AND status_post = '0'
// 	JOIN (
// 	SELECT
// 		count( nomor_surat_sppd ) AS jml_terposting 
// 	FROM
// 		tb_spt
// 		JOIN tb_petugas_yg_ditugaskan ON tb_petugas_yg_ditugaskan.nomor_spt = tb_spt.nomor_spt
// 		JOIN tb_pegawai ON tb_petugas_yg_ditugaskan.nip = tb_pegawai.nip
// 		JOIN tb_input_sppdbaru ON tb_input_sppdbaru.nomor_spt = tb_spt.nomor_spt 
// 		AND tb_input_sppdbaru.nip = '$nip' 
// 		AND tb_petugas_yg_ditugaskan.nip = '$nip' 
// 	AND status_post = '1' 
// 	) AS x";

$sql_query_ambil_jmlh_posting = mysqli_query($link,"SELECT
													-- ( SELECT COUNT( id_sppd ) FROM tb_input_sppdbaru WHERE nip = '$nip' AND status_post = 1 ) AS jml_terposting,													
													CONCAT( COUNT(id_sppd),' ','SPPD BELUM DIKIRIM / POSTING')  AS jml_terposting,
													CONCAT( COUNT(id_sppd),' ','SPPD BELUM DIKIRIM / POSTING')  AS jml_stspost,
													-- CONCAT( COUNT(id_sppd),' ','SPPD')  AS jml_nomor_surat_sppd,
													CONCAT( ( SELECT COUNT( id_sppd ) FROM tb_input_sppdbaru WHERE nip = '$nip' AND status_post = 1 ),' ','SPPD') AS jml_nomor_surat_sppd,
													' -- -- JANGAN LUPA DIPOSTING YA !! -- --' AS note
													FROM
													tb_input_sppdbaru
													WHERE
													nip = '$nip' AND status_post = 0 LIMIT 1");

//$hasil 	= @mysql_query($sql_query_ambil_jmlh_posting, $link) or die('Jumlah Posting Error:  '.$sql_query_ambil_jmlh_posting);
// $data2 = array();
// while($row2 = @mysql_fetch_object($hasil)){
// 	$data2['tampil_jmlh_blmpostingan'][] = $row2;
// }
//$dataX = array();
while ($data = mysqli_fetch_assoc($sql_query_ambil_jmlh_posting)) {
    $dataX['tampil_jmlh_blmpostingan'][]= $data;
}
echo json_encode($dataX);



?>