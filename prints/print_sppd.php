<?php ob_start(); 
error_reporting(true);


require("../config_koneksi/konfigurasi_nya.php");
require("../config_koneksi/library.php");

$Kode = $_GET['id_sppd'];
//$Kode = "5915";

$query = (mysqli_query($con,"SELECT * FROM  tb_input_sppdbaru s inner join tb_pegawai p WHERE s.nip=p.nip and id_sppd='$Kode' "));

$data = mysqli_fetch_array($query);
$nosptsppd=$data[nomor_spt];

$akun=$data[akun_pembebanan_anggaran];

$lama_perj=$data[lama_perj];

$query1 = (mysqli_query($con,"SELECT * FROM  tb_akun_anggaran WHERE no_akun = '$akun' and aktif = 'y'  "));

$data1 = mysqli_fetch_array($query1);


$query5 = (mysqli_query($con,"SELECT * FROM  tb_spt WHERE nomor_spt='$nosptsppd' "));

$data5 = mysqli_fetch_array($query5);

$dt_nm = $data['nama_pegawai'];
?>

<html>

<head>

  <title>Cetak PDF</title>



</head>

<body>

<style type="text/css" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">

   .contoh1 { font-size:16px; }

   .contoh2 { font-size:14px; line-height: 20px;}

   .contoh3 { font-size:16px; line-height: 2em;}

   .contoh4 { font-size:16px; line-height: 2;}

</style>

<p class='contoh1'>

<table  border="0" style="padding-top:-2mm; padding-left:-2mm;">
  <tr>
  <td valign="top" style="padding-top:2mm; padding-left:10mm;"><img src="../images/logo_hitam_putih.png" width="94" height="110"/></td>
  <td style="text-align: center; width:155mm;"><strong>PEMERINTAH PROVINSI JAWA TIMUR</strong>
  <br>
    <strong>RSUD Dr.SOEDONO MADIUN</strong><br>
    Jl. Dr.Soetomo No.59 Telp (0351) 464326, 464325 Fax (0351) 458054<br>
    <strong>MADIUN 63116</strong><br><br>
    <strong><u>SURAT PERINTAH PERJALANAN DINAS (SPPD)</u></strong><br>
    <strong>Nomor : <?php echo $data['nomor_surat_sppd'] ?></strong><br>
  </td>
  </tr>
</table>
<br>

<table border="1" cellpadding="50" cellspacing="0" style="border-color: #000000; " >
  <tr>
    <td height="25" style="width:100mm;">1. Pengguna Anggaran / Kuasa Pengguna Anggaran</td>
    <td style='width:103mm;'>&nbsp;<?php echo $data1['nama_kpa'] ?></td>
  </tr>
  <tr>
    <td height="25" style="width:100mm;">2. Nama Pegawai Yang Diperintahkan</td>
    <td>&nbsp;<?php echo $data['nama_pegawai'] ?></td>
  </tr>
  <tr>
    <td height="25">3. a. Pangkat dan Golongan</td>
    <td>&nbsp;a. <?php 

$gol_peg= $data['golongan'] ;

if ($gol_peg == "I/a") {
echo "Juru Muda ", $data['golongan'];

}else if ($gol_peg == "I/b") {
echo "Juru Muda Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "I/c") {
echo "Juru ", $data['golongan'] ;

}else if ($gol_peg == "I/d") {
echo "Juru Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "II/a") {
echo "Pengatur Muda ", $data['golongan'] ;

}else if ($gol_peg == "II/b") {
echo "Pengatur Muda Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "II/c") {
echo "Pengatur ", $data['golongan'] ;

}else if ($gol_peg == "II/d") {
echo "Pengatur Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "III/a") {
echo "Penata Muda ",$data['golongan'] ;

}else if ($gol_peg == "III/b") {
echo "Penata Muda Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "III/c") {
echo "Penata ", $data['golongan'] ;

}else if ($gol_peg == "III/d") {
echo "Penata Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "IV/a") {
echo "Pembina ", $data['golongan'] ;

}else if ($gol_peg == "IV/b") {
echo "Pembina Tingkat I ", $data['golongan'] ;

}else if ($gol_peg == "IV/c") {
echo "Pembina Utama Muda ", $data['golongan'] ;

}else if ($gol_peg == "IV/d") {
echo "Pembina Utama Madya ", $data['golongan'] ;

}else if ($gol_peg == "IV/e") {
echo "Pembina Utama ", $data['golongan'] ;

}else  if (($gol_peg == "S1-DOKTER") || ($gol_peg == "S2-DOKTER") || ($gol_peg == "DIII") || 
  ($gol_peg == "S1") || ($gol_peg == "SMA"))  {

echo $data['golongan'] ;

}

?></td>
  </tr>
  <tr>
    <td height="25">&nbsp;&nbsp;&nbsp;&nbsp;b. Jabatan / Instansi</td>
    <td style="width:96mm; padding-left:1.5mm;">b. <?php echo $data['jabatan'] ?></td>
  </tr>
  <tr>
    <td height="25">&nbsp;&nbsp;&nbsp;&nbsp;c. Tingkat Biaya Perjalanan Dinas</td>
    <td height="25">&nbsp;c. </td>
  </tr>
  <tr>
    <td  height="25" valign="top">4. Maksud Perjalanan Dinas</td>
    <td style="width:100mm; padding-left:2mm;" ><?php echo $data['maksud_perj'] ?></td>
  </tr>
  <tr>
    <td height="25">5. Alat angkut yang dipergunakan</td>
    <td><span style="width:96mm;">&nbsp;<?php echo $data['alat_angkutan'] ?></span></td>
  </tr>
  <tr>
    <td height="25">6. a. Tempat Berangkat</td>
    <td><span style="width:96mm;">&nbsp;<?php echo $data['tempat_brngkt'] ?></span></td>
  </tr>
  <tr>
    <td height="25"> &nbsp;&nbsp;&nbsp;&nbsp;b. Tempat Tujuan</td>
    <td><span style="width:96mm;">&nbsp;<?php echo $data['tempat_tujuan'] ?></span></td>
  </tr>
  <tr>
    <td height="25">7. a. Lamanya Perjalanan Dinas</td>
    <td><span style="width:96mm;">&nbsp;a. <?php echo $data['lama_perj']," (",terbilang($lama_perj),") Hari"; ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;&nbsp;&nbsp;&nbsp;b. Tanggal Berangkat</td>
    <td><span style="width:96mm;">&nbsp;b. <?php echo tanggal_indo($data['tgl_brngkt']) ?></span></td>
  </tr>
  <tr>
    <td height="25">&nbsp;&nbsp;&nbsp;&nbsp;c. Tanggal Harus Kembali / Tiba Ditempat Baru</td>
    <td><span style="width:96mm;">&nbsp;c. <?php echo tanggal_indo($data['tgl_kembali']) ?></span></td>
  </tr>
  <tr>
    <td height="25" colspan="2">8. Pengikut Nama</td>
  </tr>
  <tr>
    <td height="25" colspan="2">1. <span style="width:96mm;"><?php echo $data['tambh_pengikut1'] ?></span></td>
  </tr>
  <tr>
    <td height="25" colspan="2">2. <span style="width:96mm;"><?php echo $data['tambh_pengikut2'] ?></span></td>
  </tr>
  
  <tr>
    <td height="25" colspan="2">KETERANGAN : </td>
  </tr>
  <tr>
    <td height="25" colspan="2">9. Pembebanan Anggaran </td>
  </tr>
  <tr>
    <td height="25"> a. SKPD </td>
    <td>&nbsp;RSUD dr. SOEDONO MADIUN</td>
  </tr>
  <tr>
    <td height="25"> b. Akun </td>
    <td>&nbsp;<?php echo $data1['no_akun'] ?></td>
  </tr>
  <tr>
    <td height="25">10. Keterangan Lain-Lain</td>
    <td>&nbsp;</td>
  </tr>
</table>

<br>
<br>
<table border="0">
  <tr>
    <td style="width:100mm;">&nbsp;</td>
    <td style="width:95mm;">Dikeluarkan di : Madiun<br>
    Pada Tanggal&nbsp;: <?php echo tanggal_indo($data5['tgl_dikeluarkan']) ?><br>
    -------------------------------------------------------------------<br>
    Pengguna Anggaran / Kuasa Pengguna Anggaran <br>
    <br>
    <br>
    <br>
        <span style="width:96mm;" align="center"><br><u><?php echo $data1['nama_kpa'] ?></u><br>

    NIP <?php echo $data1['nip'] ?></span></td>
  </tr>
</table>


</p>
</body>

</html>

<?php

$html = ob_get_contents();

ob_end_clean();

        

require_once('../../do_printsjs/html2pdf/html2pdf.class.php');

$pdf = new HTML2PDF('P','legal','en');

$pdf->WriteHTML($html);

$pdf->Output('Surat Permohonan Perjalanan Dinas '.$dt_nm.'.pdf', '');
?>