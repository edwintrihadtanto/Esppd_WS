<?php ob_start(); 

error_reporting(0);

// Load file koneksi.php

require("../config_koneksi/konfigurasi_nya.php");
require("../config_koneksi/library.php");

$no_spt = $_GET['no_spt'];
$nip = $_GET['nip'];

//$no_spt = '800/29.899/303/2019';


//$Nip = '19820920 201001 2 006';

//$query = (mysqli_query($con,"select * from tb_laporan_petugas_stlh_perj_dinas left join tb_spt 

//				 on tb_laporan_petugas_stlh_perj_dinas.nomor_spt=tb_spt.nomor_spt left join tb_pegawai on  tb_laporan_petugas_stlh_perj_dinas.nip=tb_pegawai.nip left join tb_input_sppdbaru on tb_laporan_petugas_stlh_perj_dinas.nomor_spt=tb_input_sppdbaru.nomor_spt where tb_input_sppdbaru.nip=tb_laporan_petugas_stlh_perj_dinas.nip and tb_laporan_petugas_stlh_perj_dinas.nomor_spt='$no_spt' and tb_laporan_petugas_stlh_perj_dinas.nip='$Nip'"));

$query = (mysqli_query($con,"select * from tb_laporan_petugas_stlh_perj_dinas left join tb_spt 
				 on tb_laporan_petugas_stlh_perj_dinas.nomor_spt=tb_spt.nomor_spt left join tb_pegawai 				
				 on  tb_laporan_petugas_stlh_perj_dinas.nip=tb_pegawai.nip left join tb_input_sppdbaru 				
				 on tb_laporan_petugas_stlh_perj_dinas.nomor_spt=tb_input_sppdbaru.nomor_spt 				 
				 where 				 
				 tb_input_sppdbaru.nip=tb_laporan_petugas_stlh_perj_dinas.nip and tb_laporan_petugas_stlh_perj_dinas.nomor_spt='$no_spt'
				 "));

$data = mysqli_fetch_array($query) or die ("Kode salah : Belum Membuat Laporan ".mysqli_error());

$a= tanggal_indo($data['tgl_berangkat']);

$b= tanggal_indo($data['tgl_tiba']);

$c="s.d";

$d = "$a $c $b";

$dd = "$a";

$lama_perj = $data['lama_pelaksanaan'];


$tgl=date('Y-m-d');

$tglsekarangini=$tgl;

$hasilpertemuan = $data['hasil_pertemuan'];
$panj_kar_hasilpertemuan = strlen(trim($hasilpertemuan));


?>

<html>

<head>

  <title>Cetak PDF</title>

<style type="text/css" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif">

   .contoh1 { font-size:16px; }

   .contoh2 { font-size:14px; line-height: 20px;}

   .contoh3 { font-size:16px; line-height: 1.5em;}

   .contoh4 { font-size:16px; line-height: 2;}
   
   .contoh5 { font-size:13px; margin-left:-0.5mm;}

</style>

</head>

<body>



<br>

<br>

<br>


<div style='padding-left:10mm;'>
<table width="100%" border="0" >

  <tr>

    <td style='width: 200mm; font-size: 18px;' align="center"><strong>LAPORAN PERJALANAN DINAS

    </strong></td>

  </tr>

</table>

<p>&nbsp;</p>



<table width="" border="0">

  <tr>

  

    <td style='width: 45mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2">1. Dasar SPT </p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['nomor_spt']; ?></p></td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">&nbsp;</p></td>

    <td><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo tanggal_indo($data['tgl_dikeluarkan']); ?></p></td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">2. Tanggal Pelaksanaan</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;'><p class="contoh2"><?php
if ($lama_perj > 1 ){
	echo $d;
	}else{
	echo $dd;
	}
 ?></p></td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">3. Nama Petugas</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;'>
    <?php



$queryPegawai = (mysqli_query($con,"
        
        SELECT a.nip, a.nama_pegawai, a.jabatan, a.golongan 
        
        FROM  tb_pegawai a, tb_petugas_yg_ditugaskan b, tb_spt c, tb_golongan d
        
        WHERE 
        
        a.nip = b.nip and 
        
        b.nomor_spt='$no_spt' and 
        
        c.nomor_spt = '$no_spt' and
        
        a.golongan = d.golongan order by d.id_golongan DESC ")); 

while ($datape=mysqli_fetch_array($queryPegawai)) 

{
	$no++;
echo"
<table border='0'>
  <tr>
        <td><p class='contoh5'>$datape[nama_pegawai]</p></td>
  </tr>
</table>
  ";  
  }
?>
    
    </td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">4. Daerah Tujuan</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; valign="top"'><span style="width: 135mm; font-size: 12px; text-align:justify;"><p class="contoh2"><?php echo $data['tempat_tujuan']; ?></p></span></td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">5. Instansi yang dikunjungi</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['surat_masuk_dari']; ?></p></td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">6. Acara</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['untuk']; ?></p></td>

  </tr>


  <tr>

    <td valign="top"><p class="contoh2">7. Hasil pertemuan / rapat</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top">
      <p class="contoh2" style="height: 100mm;"><?php echo $hasilpertemuan ;?></p>
    </td>

  </tr>
<?php 
$hasilnya = $data['masalah'];
//$hasilnya = "-";
if ($panj_kar_hasilpertemuan > '1000') { 

echo "</table><page></page><table width='' border='0' style='padding-left:10mm;'>";
echo "
 <tr>

    <td valign='top'><p class='contoh2'>8. Masalah / Temuan</p></td>

    <td valign='top'><p class='contoh2'>:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign='top'><p class='contoh2'> $hasilnya </p></td>

  </tr>
";
}else{
    
    echo "
 <tr>

    <td valign='top'><p class='contoh2'>8. Masalah / Temuan</p></td>

    <td valign='top'><p class='contoh2'>:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign='top'><p class='contoh2'> $hasilnya </p></td>

  </tr>
";
}
?>

 <!-- <tr>

    <td valign="top"><p class="contoh2">8. Masalah / Temuan</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['masalah']; ?></p></td>

  </tr>
!-->
  <tr>

    <td valign="top"><p class="contoh2">9. Saran Tindakan</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['saran']; ?></p></td>

  </tr>

  <tr>

    <td valign="top"><p class="contoh2">10. Lain - lain</p></td>

    <td valign="top"><p class="contoh2">:</p></td>

    <td style='width: 135mm; font-size: 12px; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['lain_lain']; ?></p></td>

  </tr>

</table>

<p>&nbsp;</p>

<p>&nbsp;</p>

<table width="" border="0">

  <tr>

    <td style='width: 125mm; font-size: 12px;' valign="top"></td>

    <td style='width: 70mm; font-size: 12px;' valign="top"><p class="contoh2">Madiun, <?php //echo $b; ?><br>

      Petugas</p>

      <p>&nbsp;</p>

     <p class="contoh2"><u><?php echo $data['nama_pegawai']; ?></u><br>
      NIP/NPK <?php echo $data['nip']; ?> </p>    </td>

  </tr>

</table>

<p>&nbsp;</p>
</div>

</body>
</html>


<?php

$html = ob_get_contents();
ob_end_clean();
require_once('../../do_printsjs/html2pdf/html2pdf.class.php');
//$pdf = new HTML2PDF('P','legal','en');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Perjalanan Dinas Petugas.pdf', '');

?>