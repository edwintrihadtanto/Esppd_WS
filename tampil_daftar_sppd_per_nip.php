<?php
$host     = "localhost"; 
$username = "rssoedon_admin"; 
$password = "admin12345"; 
$dbname   = "rssoedon_sppd_rssm"; 

$link = mysqli_connect($host,$username,$password,$dbname);
if ($link->connect_error) {   
   die('Maaf koneksi gagal: '. $connect->connect_error);
}
$nip = $_GET['nip_pegawai'];

$no = mysqli_query($link, "SET @no = 0") or die('Error No Urut:'.$no);

$query = mysqli_query($link,"SELECT
								@NO := @NO + 1 AS nomor_urut,
								id_sppd,
								id_spt,
								tb_input_sppdbaru.nomor_spt,
								nomor_surat_sppd,
								tb_petugas_yg_ditugaskan.nip,
								tb_petugas_yg_ditugaskan.nama_pegawai,
								tb_petugas_yg_ditugaskan.jabatan,
								tb_petugas_yg_ditugaskan.golongan,
								biaya_perj,
								maksud_perj,
								alat_angkutan,
								tempat_brngkt,
								tempat_tujuan,
								lama_perj,
								DATE_FORMAT( tgl_brngkt, '%d-%b-%Y' ) AS tgl_brngkt,
								DATE_FORMAT( tgl_kembali, '%d-%b-%Y' ) AS tgl_kembali,	
								tambh_pengikut1,
								tambh_pengikut2,
								tambh_pengikut3,
								tambh_pengikut4,
								tambh_pengikut5,
								tanggal_aktivitas,
								waktu_aktivitas,
								surat_masuk_dari,
								DATE_FORMAT( tgl_surat_masuk, '%d %M %Y' ) AS tgl_surat_masuk,	
								akun_pembebanan_anggaran,
								status_laporan_petugas,
								status_riil,
								status_rincian_biaya,
								status_post,
								tb_laporan_petugas_stlh_perj_dinas.nip AS nip_pembuatlaporanperj,
								tb_laporan_petugas_stlh_perj_dinas.nomor_spt AS nomor_spt_laporanperj,	
								hasil_pertemuan,
								masalah,
								saran,
								lain_lain,
								tgl_pembuatan_laporan
							FROM
								tb_petugas_yg_ditugaskan  
								LEFT JOIN tb_input_sppdbaru ON tb_input_sppdbaru.nomor_spt = tb_petugas_yg_ditugaskan.nomor_spt and tb_petugas_yg_ditugaskan.nip = tb_input_sppdbaru.nip
								LEFT JOIN tb_spt ON tb_input_sppdbaru.nomor_spt = tb_spt.nomor_spt	
								LEFT JOIN tb_laporan_petugas_stlh_perj_dinas ON tb_input_sppdbaru.nomor_spt = tb_laporan_petugas_stlh_perj_dinas.nomor_spt
								LEFT JOIN tb_pegawai ON tb_petugas_yg_ditugaskan.nip = tb_pegawai.nip
							WHERE 
								tb_input_sppdbaru.nip = '$nip' AND status_post = '0'
							ORDER BY tb_spt.id_spt DESC");

// $dataX = mysqli_fetch_array($query) or die ("Petugas Belum Membuat Laporan Perjalan Petugas ...".mysqli_error());
// $dataX = array();
// while($row = mysqli_fetch_object($query)){
// 	$dataX['tampil_daftar_sppd'][]= $row;
// }

while ($data = mysqli_fetch_assoc($query)) {
    $dataX['tampil_daftar_sppd'][]= $data;
}

echo json_encode($dataX);
?>