<?php
$host     = "localhost"; 
$username = "rssoedon_admin"; 
$password = "admin12345"; 
$dbname   = "rssoedon_sppd_rssm"; 

$link = mysqli_connect($host,$username,$password,$dbname);
if ($link->connect_error) {   
   die('Maaf koneksi gagal: '. $connect->connect_error);
}

$query = mysqli_query($link,"SELECT
								tb_pegawai.nip,
								nama_pegawai,
								jabatan,
								golongan,
								pass
							FROM
								tb_pegawai
							LEFT JOIN tb_user ON tb_pegawai.nip = tb_user.nip
							WHERE
								nama_pegawai <> 'Administrator'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
							ORDER BY
								nama_pegawai ASC");
// �
$dataX = array();
while ($data = mysqli_fetch_assoc($query)) {
    $dataX['tampil_data_nip'][]= $data;
}

mysqli_close($link);

echo json_encode($dataX);

?>
