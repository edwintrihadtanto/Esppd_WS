<?php 
ob_start(); 
error_reporting(0);

require("../config_koneksi/konfigurasi_nya.php");
require("../config_koneksi/library.php");

// include("../koneksi.php");
// include_once "../config/library.php";

$Kode       = $_GET['id_sppd'];
$query      = mysqli_query($con,"SELECT * FROM tb_input_sppdbaru where id_sppd='$Kode'");
$data       = mysqli_fetch_array($query) or die ("Query salah sppd : ".mysqli_error());
$nosptsppd  = $data['nomor_spt'];
$nosppd     = $data['nomor_surat_sppd'];
$nip        = $data['nip'];
$akun       = $data['akun_pembebanan_anggaran'];

$query_ambil  = mysqli_query($con,"SELECT * FROM  tb_spt WHERE nomor_spt='$nosptsppd' ");
$data_spt     = mysqli_fetch_array($query_ambil);

$queryakun  = mysqli_query($con,"SELECT * FROM  tb_akun_anggaran WHERE no_akun='$akun' and aktif = 'y' ");
$akunrow    = mysqli_fetch_array($queryakun);

$bendahra   = $akunrow[id_bendahara];

$query2 = mysqli_query($con,"SELECT * FROM tb_pegawai where nip='$nip'");

$datapo = mysqli_fetch_array($query2) or die ("Query pegawai salah : ".mysqli_error());



$tgl=date('Y-m-d');

$tglsekarangini=$data[tgl_kembali];



$query3 = mysqli_query($con,"SELECT * FROM tb_bendahara where id_bendahara='$bendahra'");

$data3 = mysqli_fetch_array($query3) or die ("Anda Belum Memilih Akun Bendahara !!! ".mysqli_error());

$jabatan_bendahara=$data3[jabatan];

$nama_bendahara=$data3[nama_bendahara];

$nipbendahara=$data3[nip];

?>

<html>

<head>

  <title>Cetak PDF</title>



</head>

<body>

<div style="padding-top:10mm; padding-left:10mm;">



<table  border='0'>

  <tr>

    <td style='width:185mm; text-align:center;'><strong>RINCIAN BIAYA PERJALANAN DINAS</strong></td>

  </tr>

</table>



<table width="100%" border="0">

  <tr>

    <td></td>

  </tr>

</table>

<table width="100%" border="0" align="left">

  <tr>

    <td style='width:50mm; text-align:left;'>Lampiran SPPD Nomor</td>

    <td width="378">: <span style="text-align: justify"><?php echo $data['nomor_surat_sppd'];?></span></td>

  </tr>

  <tr>

    <td width="80">Tanggal </td>

    <td width="378">: <span style="text-align: justify"><?php echo tanggal_indo($data_spt['tgl_dikeluarkan']);?></span></td>

  </tr>

  

</table>

<br>

<br>



<table style='width: 210mm; text-align:left;' cellspacing="0" border="0.5" cellpadding="50" >

<tr>

    <th style='width: 8mm; text-align:center;' valign="top">NO</th>

    <th style='text-align:center;' valign="top">PERINCIAN BIAYA</th>

    <th th style='width: 30mm; text-align:center;' valign="top">JUMLAH</th>

    <th th style='width: 50mm; text-align:center;' valign="top">KETERANGAN</th>

</tr>

<?php

$queryrincian = mysqli_query($con,"SELECT * from tb_perincian_biaya where  nomor_surat_sppd = '$nosppd' and nip='$nip'"); 
while ($datape=mysqli_fetch_array($queryrincian) )
{
$no++;
?>
	    <tr>
		<td style='text-align:center;width:8mm;'valign='top'><?php echo $no; ?></td>
        <td style="text-align:left; width:100mm;"><?php echo $datape['rincian_biaya'] ?></td>
 		<td style="text-align:right;width:30mm;" valign='top' >Rp. <?php echo format_angka($datape['jumlah']) ?></td>
		<td style="text-align:left; width:10mm;" valign='top'><?php echo $datape['keterangan'] ?></td>
		</tr>
<?php
}
?>
<tr>

<?php

	$datarincian = mysqli_query($con, "SELECT *, sum(jumlah) as totaleiki From tb_perincian_biaya where nomor_surat_sppd = '$nosppd' and nip='$nip'");

	$o = mysqli_fetch_array($datarincian) or die ("Error Query".mysql_error());

	

	$dataSql = mysqli_query($con, "SELECT *, sum(jumlah_riil) as totalekui From tb_rincian_pengeluaran_riil where nomor_surat_sppd = '$nosppd' and nip='$nip'  ");

	$i = mysqli_fetch_array($dataSql) or die ("Error Query".mysql_error());

	

$semua=	$o[totaleiki]+$i[totalekui];

?>

  

<td style='text-align:center;' valign="top"><?php echo $no+1; ?></td>

<td style='text-align:left;' valign="top">Daftar Pengeluaran Riil</td>

<td style='text-align:right;' valign="top">Rp. <?php echo format_angka($i['totalekui']); ?></td>

<td></td>

</tr>

<tr>



    

<td colspan="2"  style='width: 80mm; text-align:left'><strong>Terbilang : <?php echo terbilang($semua); ?> rupiah</strong></td>

<td style="text-align:right"><strong>Rp. <?php echo format_angka($semua); ?></strong></td>

<td><strong></strong></td>


</tr>

</table>

<br>

<table style='width: 210mm;' border="0">

  <tr>

    <td border="0" style='width: 115mm; text-align:left;'><p>Telah dibayar sejumlah :<br>

      Rp. <strong><?php echo format_angka($semua); ?></strong><br>

      <br>

      <br>

      <?php echo $jabatan_bendahara; ?>

      <br>

  </p>

      <p><br>

        <br>

        <u><?php echo $nama_bendahara; ?></u><br>

    <?php echo "NIP.$nipbendahara" ; ?></p></td>

    <td border="0" style='width: 75mm; text-align:left;'><p>Madiun, <span style="width: 135mm; font-size: 12px;"><?php //echo tanggal_indo($tglsekarangini); ?></span><br>

      Telah terima jumlah uang sebesar<br>

      Rp. <strong><?php echo format_angka($semua); ?></strong><br>

      <br>

      Yang Menerima

<br>

<br>

  </p>

      <p><br>

        <u><span style="text-align: justify; font-size:12px;"><?php echo $datapo['nama_pegawai'];?></span></u><br>

        <span style="text-align: justify;">NIP/NPK <?php echo $datapo['nip'];?></span><br>

        <br>

    </p></td>

  </tr>

</table>

<br>

<hr>

<br>
<br>

<table border="0">

  <tr>

    <td style='width:185mm; text-align:center;'> PERHITUNGAN SPPD RAMPUNG</td>

  </tr>

</table>

<br>

<table border="0">

  <tr>

    <td style='width:98mm; text-align:left;'>Ditetapkan sejumlah</td>

    <td style='width:2mm; text-align:left;'>:</td>

    <td style='width:5mm; text-align:left;'>Rp.</td>

    <td style='width:50mm; text-align:right;'><strong><?php echo format_angka($semua); ?></strong></td>

  </tr>

  <tr>

    <td>Yang telah dibayar semula</td>

    <td>:</td>

    <td>Rp.</td>

    <td align="right"> -</td>

  </tr>

  <tr>

    <td>Sisa kurang / lebih</td>

    <td>:</td>

    <td>Rp.</td>

     <td align="right"><strong><?php echo format_angka($semua); ?></strong></td>

  </tr>

</table>

<br>

<table border="0">

  <tr>

    <td style='width:110mm; text-align:left;'>&nbsp;</td>

    <td style='width:65mm; text-align:left; padding-left:5mm;'><p>Kuasa Pengguna Anggaran</p>

    <p>&nbsp;</p>

    <p><u><?php echo $akunrow['nama_kpa'];?></u><br>NIP <?php echo $akunrow['nip'];?></p>
    </td>

  </tr>

</table>

</div>

<br>



<page></page>

<table width="200" border="0">

  <tr>

    <td>BUKTI GAMBAR PERINCIAN BIAYA SPPD Nomor : <b><?php echo $data['nomor_surat_sppd'];?></b></td>

  </tr>

</table>

<br>



<table border="1" style='width: 210mm; text-align:left;' cellspacing="0" >

  <tr>

    <th style='width: 10mm; text-align:center;' valign="top">No</th>

    <th style='width: 125mm; text-align:center;' valign="top">Bukti</th>

    <th th style='width: 50mm; text-align:center;' valign="top">Keterangan</th>

</tr>

<?php

$queryPegawai = mysqli_query($con,"SELECT * from tb_perincian_biaya where nomor_surat_sppd = '$nosppd' and nip='$nip'"); 



	while ($g=mysqli_fetch_array($queryPegawai))

	 {

	$gambar=$g[nama_file_upload];

	

	$ni++;

	    echo "<tr>";

        echo "<td style='text-align:center;' valign='middle'>".$ni."</td>";

        echo "<td style='width: 10mm; text-align:center;' valign='middle'>";

		

	  if (empty($g[bukti_image])){

			echo "<b><p style='padding-top:15;'>Tidak Ada Bukti Gambar</p></b>";

	  }else{

			echo "<img src='../sppd_rssm_apk/temp/upload/$g[bukti_image]' width='300' height='300'>";

	  }

		

		echo "</td>";

		

        echo "<td style='width: 50mm; text-align:center;padding:5px;' valign='middle' >".$g[rincian_biaya]."</td>";

        echo "</tr>";

    }
?>
</table>
</body>
</html>

<?php

$html = ob_get_contents();

ob_end_clean();
      
require_once('../../do_printsjs/html2pdf/html2pdf.class.php');

$pdf = new HTML2PDF('P','legal','en');

$pdf->WriteHTML($html);

$pdf->Output('Laporan Perincian Biaya.pdf', '');

?>