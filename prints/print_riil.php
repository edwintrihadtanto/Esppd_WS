<?php 
ob_start(); 
error_reporting(0);

require("../config_koneksi/konfigurasi_nya.php");
require("../config_koneksi/library.php");

$Kode       = $_GET['id_sppd'];
$query      = (mysqli_query($con,"SELECT * FROM tb_input_sppdbaru where id_sppd='$Kode'"));
$data       = mysqli_fetch_array($query) or die ("Query salah sppd : ".mysqli_error());
$tglkembali = $data['tgl_kembali'];
$nosptsppd	= $data['nomor_spt'];
$nosppd     = $data['nomor_surat_sppd'];
$nip        = $data['nip'];
$akun       = $data['akun_pembebanan_anggaran'];


$query_ambil_spt    = (mysqli_query($con,"SELECT * FROM  tb_spt WHERE nomor_spt = '$nosptsppd' "));
$data_spt           = mysqli_fetch_array($query_ambil_spt);
$tgl_dikeluarkan    = $data_spt['tgl_dikeluarkan'];

$queryakun  = (mysqli_query($con,"SELECT * FROM  tb_akun_anggaran WHERE no_akun='$akun' and aktif = 'y' "));
$akunrow    = mysqli_fetch_array($queryakun);

$query2 = (mysqli_query($con,"SELECT * FROM tb_pegawai where nip='$nip'"));
$datapo = mysqli_fetch_array($query2) or die ("Query pegawai salah : ".mysqli_error());

$tgl            = date('Y-m-d');
$tglsekarangini = $data[tgl_kembali];

?>
<html>
<head>
  <title>Cetak PDF</title>
<style type="text/css" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">
   .contoh1 { font-size:16px; }
   .contoh2 { font-size:14px; line-height: 20px;}
   .contoh3 { font-size:16px; line-height: 1.5em;}
   .contoh4 { font-size:16px; line-height: 2;}
</style>
</head>
<body>
    <div style="padding-left:10mm;">

  <p><h3>DAFTAR PENGELUARAN RIIL</h3></p>
  <p class="contoh2">
<table width="100%" border="0">
  <tr>
    <td>Yang bertanda tangan di bawah ini :</td>
  </tr>
</table>
<table width="100%" border="0" align="left">
  <tr>
    <td width="80">Nama </td>
    <td width="378">: <span style="text-align: justify"><?php echo $datapo['nama_pegawai'];?></span></td>
  </tr>
  <tr>
    <td width="80">NIP / NPK </td>
    <td width="378">: <span style="text-align: justify"><?php echo $datapo['nip'];?></span></td>
  </tr>
  
  <tr>
    <td width="80">Jabatan</td>
    <td width="378">: <span style="text-align: justify"><?php echo $datapo['jabatan'];?></span></td>
  </tr>
  
</table>
<br>
<br>
<table width="100%" border="0" align="left">
  <tr>
   
    <td style="text-align: justify"> Berdasarkan Surat Perintah Perjalanan Dinas (SPPD) Nomor : <?php echo $data['nomor_surat_sppd'];?><br>
Tanggal <?php echo tanggal_indo($tgl_dikeluarkan);?>, dengan ini kami menyatakan dengan sesungguhnya bahwa :</td>
  </tr>
</table>
<br>
<table style='width: 200mm;' border="0" align="left">
  <tr>
    <td style='width: 10mm; text-align:center;' valign="top">1.</td>
    <td style='width: 176mm; text-align:justify'> Biaya Transport pegawai dan / atau biaya penginapan dibawah ini yang tidak dapat diperoleh bukti-bukti pengeluarnya meliputi :</td>
  </tr>
</table>
<br>
<table border="1" style='width: 210mm; text-align:left;' cellspacing="0" >
<tr>
    <th style='width: 10mm; text-align:center;' valign="top">No</th>
    <th style='width: 125mm; text-align:center;' valign="top">Uraian</th>
    <th th style='width: 50mm; text-align:center;' valign="top">Jumlah</th>
</tr>
<?php
$queryPegawai = (mysqli_query($con,"SELECT * from tb_rincian_pengeluaran_riil where  nomor_surat_sppd = '$nosppd' and nip='$nip'")); 

	while ($datape=mysqli_fetch_array($queryPegawai))
	 {
	
	$no++;
	    echo "<tr>";
        echo "<td style='text-align:center;' valign='top'>".$no."</td>";
        echo "<td style=' text-align:left; width: 125mm;' valign='top'>".$datape['uraian_daftar_riil']."</td>";
        echo "<td style=' text-align:right;'>Rp. ".format_angka($datape['jumlah_riil'])."</td>";
        echo "</tr>";
    }
	
	
?>
<tr>
<?php
	$dataSql = mysqli_query($con, "SELECT *, sum(jumlah_riil) as totalekui From tb_rincian_pengeluaran_riil where nomor_surat_sppd = '$nosppd' and nip='$nip'  ");
	$i = mysqli_fetch_array($dataSql) or die ("Error Query".mysql_error());
	?>
<td colspan="2" style="text-align:center"><strong>Jumlah</strong></td>
<td style="text-align:right"><strong>Rp. <?php echo format_angka($i['totalekui']); ?></strong></td>
</tr>
</table>

<br>
<table style='width: 200mm;' border="0" align="left">
  <tr>
    <td style='width: 10mm; text-align:center;' valign="top">2.</td>
    <td style='width: 176mm; text-align:justify'> Jumlah uang tersebut pada angka 1 diatas benar-benar dikeluarkan untuk pelaksanaan Perjalanan Dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kembali tersebut ke daerah.</td>
  </tr>
</table>
<br>

<table style="text-align: justify" border="0">
  <tr>
    <td style="text-align: justify ; width: 188mm;">Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</td>
  </tr>
</table>
<br>
<table style='width: 210mm;' border="0">

  <tr>
    <td border="0" style='width: 125mm; text-align:left;'><p>Mengetahui/Menyetujui :<br>
      Kuasa Pengguna Anggaran<br>
  </p>
      <p><br>
        <br>
        <span style="text-align: justify"><u><?php echo $akunrow['nama_kpa'];?></u></span><br>
    NIP  <?php echo $akunrow['nip'];?></p></td>
    <td border="0" style='width: 65mm; text-align:left;'>
	<p>Madiun, <span style="width: 135mm;"><?php echo tanggal_indo($tglsekarangini); ?></span> <br>
      Pelaksana SPPD<br>
  </p>
      <p><br>
        <br>
        <u><span style="text-align: justify"><?php echo $datapo['nama_pegawai'];?></span></u><br>
        <span style="text-align: justify">NIP/NPK <?php echo $datapo['nip'];?></span><br>
        <br>
    </p></td>
  </tr>
</table>
</p>
<br>
</div>
</body>
</html>

<?php

$html = ob_get_contents();
ob_end_clean();
        
require_once('../../do_printsjs/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','legal','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Perincian Biaya Riil.pdf', '');
?>

