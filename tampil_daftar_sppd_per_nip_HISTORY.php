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
//$nip = '303-03081992-052017-8776';

$sql_query = mysqli_query($link,"SELECT
									id_sppd,
									id_spt,
									tb_input_sppdbaru.nomor_spt,
									nomor_surat_sppd,
									tb_pegawai.nip,
									tb_pegawai.nama_pegawai,
									tb_pegawai.jabatan,
									tb_pegawai.golongan,
									biaya_perj,
									maksud_perj,
									alat_angkutan,
									tempat_brngkt,
									tempat_tujuan,
									lama_perj,
									DATE_FORMAT( tgl_brngkt, '%d %b %Y' ) AS tgl_brngkt,
									DATE_FORMAT( tgl_kembali, '%d %b %Y' ) AS tgl_kembali,
									tambh_pengikut1,
									tambh_pengikut2,
									tambh_pengikut3,
									tambh_pengikut4,
									tambh_pengikut5,
									tanggal_aktivitas,
									waktu_aktivitas,
									surat_masuk_dari,
									tgl_surat_masuk,
									akun_pembebanan_anggaran,
									status_laporan_petugas,
									status_riil,
									status_rincian_biaya,
									status_post 
								FROM
									tb_input_sppdbaru
									LEFT JOIN tb_spt ON tb_input_sppdbaru.nomor_spt = tb_spt.nomor_spt 
									LEFT JOIN tb_pegawai ON tb_input_sppdbaru.nip = tb_pegawai.nip	
								WHERE
									tb_pegawai.nip = '$nip' 
									AND status_post = '1'
								ORDER BY tb_spt.id_spt DESC LIMIT 20");
$no = 1;
// $result = @mysql_query($sql_query, $link) or die('Errorquery:  '.$sql_query);
// $data = array();

// while($row = @mysql_fetch_object($result)){
// 	//$no++;
// 	$data['no_urut'][]= $no++;
// 	$data['tampil_daftar_sppd'][]= $row;
// }
// echo json_encode($data);

while ($data = mysqli_fetch_assoc($sql_query)) {
    $dataX['no_urut'][]= $no++;
 	$dataX['tampil_daftar_sppd'][]= $data;
}

echo json_encode($dataX);

?>