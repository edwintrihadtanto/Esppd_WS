<?php ob_start(); 



error_reporting(0);



include("../config_koneksi/config_koneksi.php");

include_once "../config_koneksi/library.php";

$Kode = $_GET['id_spt'];
//$Kode = '255';

$query = (@mysqli_query($con,"SELECT * FROM tb_spt where id_spt='$Kode'"));

$data = @mysqli_fetch_array($query) or die ("Query salah bos: ".@mysqli_error());

$nomor_spt=$data['nomor_spt'];

$cek_jml=$data['jml_petugas'];

$nip=$data['nip'];

$query55 = (@mysqli_query($con,"SELECT * FROM tb_ttd where nip='$nip' "));

$ttd = @mysqli_fetch_array($query55) or die ("Pilih Tanda Tangan Pejabat: ".@mysqli_error());

?>

<html>



<head>



<title>Cetak PDF</title>



<style type="text/css" style="font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;">



   .contoh1 { font-size:16px; }



   .contoh2 { font-size:16px; line-height: 25px; font:Arial;}



   .contoh3 { font-size:16px; line-height: 1.5em;}



   .contoh4 { font-size:16px; line-height: 2;}



</style>



</head>



<body>



<table style='width:140mm; padding-top:10mm;' border="0" cellpadding="0" cellspacing="0">



  <tr>



    <td rowspan="5" valign="top" style="padding-top:5mm;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/logo_hitam_putih.png" width="89" height="110"/></td>



    <td style="text-align: center; width: 150mm; font-size: 18px;"><strong>PEMERINTAH PROVINSI JAWA TIMUR</strong></td>



  </tr>



  <tr>



    <td style="text-align: center; width: 150mm; font-size: 20px;"><strong>RUMAH SAKIT UMUM DAERAH Dr.SOEDONO MADIUN</strong></td>



  </tr>



  <tr>



    <td style="text-align: center; width: 150mm; font-size: 16px;">Jl. Dr.Soetomo No.59 Telp (0351) 464326, 464325 Fax (0351) 458054</td>



  </tr>



  <tr>



    <td style="text-align: center; width: 150mm; font-size: 16px;"><u>MADIUN 63116</u></td>



  </tr>



  <tr>



    <td style="text-align: center; width: 150mm; font-size: 16px;"><strong><br>



      <br>



      SURAT PERINTAH TUGAS</strong><br>



    	Nomor : <?php echo $data['nomor_spt'];?>



    </td>



  </tr>



</table>



<br>



<br>



<table cellpadding='0' cellspacing='1' style='width: 210mm;'>















  <tr>















    <td style='width: 40mm;' valign="top" ><p class="contoh2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dasar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>















    <td style='width: 5mm;' valign="top"><p class="contoh2">: </p></td>















    <td style='width: 150mm; text-align:justify;' valign="top" ><p class="contoh2"><?php echo $data['dasar'];?></p></td>















  </tr>















</table>















<table cellpadding='0' cellspacing='1' style='width: 210mm;'>















  <tr>















    <td style='width: 40mm;' valign="top"><p class="contoh2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>















    <td style='width: 5mm;' valign="top"><p class="contoh2">: </p></td>















    <td style='width: 150mm;'>



<?php 



//$queryPegawai = (@mysqli_query($con,"SELECT a.nip, a.nama_pegawai, a.jabatan, a.golongan FROM  tb_pegawai a, tb_petugas_yg_ditugaskan b, tb_spt c WHERE
//	 a.nip = b.nip and b.nomor_spt='$nomor_spt' and c.nomor_spt = '$nomor_spt'")); 

$queryPegawai = (@mysqli_query($con,"
	SELECT a.nip, a.nama_pegawai, a.jabatan, a.golongan 
	FROM  tb_pegawai a, tb_petugas_yg_ditugaskan b, tb_spt c, tb_golongan d
	WHERE 
	a.nip = b.nip and 
	b.nomor_spt='$nomor_spt' and 
	c.nomor_spt = '$nomor_spt' and
	a.golongan = d.golongan order by d.id_golongan DESC "));

//$limit_jmlptgs = 4;
$x = 0;
if ($cek_jml > 1){

//MENGGUNAKAN NOMOR JIKA JUMLAH PETUGAS > 1

	while ($datape=mysqli_fetch_array($queryPegawai)) {

if ($cek_jml == 4 or $cek_jml == 5){

	if ($x >= 4) {



	echo"</td></tr></table><page></page>";

	echo "<table>

			<tr>

			<td style='width: 40mm;' valign='top'><p class='contoh2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

			<td style='width: 5mm;' valign='top'><p class='contoh2'> </p></td>

			<td style='width: 150mm;'>";

			$x = 0;

		}

	$x++;

}else if ($cek_jml == 6 ){

	if ($x >= 6) {



	echo"</td></tr></table><page></page>";

	echo "<table>

			<tr>

			<td style='width: 40mm;' valign='top'><p class='contoh2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

			<td style='width: 5mm;' valign='top'><p class='contoh2'> </p></td>

			<td style='width: 150mm;'>";

			$x = 0;

		}

	$x++;
}else if ($cek_jml == 8){

	if ($x >= 7) {

	echo "</td></tr></table><page></page>";

	echo "<table>

			<tr>

			<td style='width: 40mm;' valign='top'><p class='contoh2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

			<td style='width: 5mm;' valign='top'><p class='contoh2'> </p></td>

			<td style='width: 150mm;'>";

			$x = 0;

		}

	$x++;	
}else if ($cek_jml == 18){

	if ($x >= 8) {

	echo "</td></tr></table><page></page>";

	echo "<table>

			<tr>

			<td style='width: 40mm;' valign='top'><p class='contoh2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

			<td style='width: 5mm;' valign='top'><p class='contoh2'> </p></td>

			<td style='width: 150mm;'>";

			$x = 0;

		}

	$x++;

}else{

	if ($x >= 6) {



	echo"</td></tr></table><page></page>";

	echo "<table>

			<tr>

			<td style='width: 40mm;' valign='top'><p class='contoh2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>

			<td style='width: 5mm;' valign='top'><p class='contoh2'> </p></td>

			<td style='width: 150mm;'>";

			$x = 0;

		}

	$x++;

	

}
	$no++;
	echo"

<table border='0'>

<p class='contoh2'>"; 
echo"

    <tr> 
    <td><p class='contoh2'>$no.</p></td>
    <td><p class='contoh2'>&nbsp;&nbsp;&nbsp;&nbsp;Nama</p></td>
    <td><p class='contoh2'>:</p></td>
    <td><p class='contoh2'> $datape[nama_pegawai]</p></td>
  </tr>



  <tr>



    <td>&nbsp;</td>



    <td>&nbsp;&nbsp;&nbsp;&nbsp;NIP</td>



    <td>:</td>



    <td> $datape[nip]</td>



  </tr>



  <tr>



    <td>&nbsp;</td>



    <td>&nbsp;&nbsp;&nbsp;&nbsp;Pangkat/Golongan</td>



    <td>:</td>



    <td style='width:100mm;'>";  



		$gol_peg = $datape['golongan']; 		



		if ($gol_peg == "I/a") {



			echo "Juru Muda / ", $datape['golongan'];



			



			}else if ($gol_peg == "I/b") {



			echo "Juru Muda Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "I/c") {



			echo "Juru / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "I/d") {



			echo "Juru Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "II/a") {



			echo "Pengatur Muda / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "II/b") {



			echo "Pengatur Muda Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "II/c") {



			echo "Pengatur / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "II/d") {



			echo "Pengatur Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "III/a") {



			echo "Penata Muda / ",$datape['golongan'] ;



			



			}else if ($gol_peg == "III/b") {



			echo "Penata Muda Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "III/c") {



			echo "Penata / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "III/d") {



			echo "Penata Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "IV/a") {



			echo "Pembina / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "IV/b") {



			echo "Pembina Tingkat I / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "IV/c") {



			echo "Pembina Utama Muda / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "IV/d") {



			echo "Pembina Utama Madya / ", $datape['golongan'] ;



			



			}else if ($gol_peg == "IV/e") {



			echo "Pembina Utama / ", $datape['golongan'] ;



			



			}else  if (($gol_peg == "S1-DOKTER") || ($gol_peg == "S2-DOKTER") || ($gol_peg == "DIII") || 



				($gol_peg == "S1") || ($gol_peg == "SMA"))  {



			



			echo $datape['golongan'] ;



		}//PUNYAKNYA IF



	echo" 



	</td>



  </tr>



  <tr>



    <td >&nbsp;</td>



    <td valign='top'>&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</td>



    <td valign='top'>:</td>



    <td style='width:100mm;'> $datape[jabatan]</td>



  </tr>



 



</p> 



</table>



 



"; 







}//BATASNYA WHILE



	



}else{



//TIDAK MENGGUNAKAN NOMOR JIKA JUMLAH PETUGAS < 1







while ($datape=mysqli_fetch_array($queryPegawai)) {



	echo"



<table border='0'>



<p class='contoh2'>



  <tr>



    <td><p class='contoh2'>&nbsp;&nbsp;&nbsp;Nama</p></td>



    <td><p class='contoh2'>:</p></td>



    <td><p class='contoh2'> $datape[nama_pegawai]</p></td>



  </tr>



  <tr>



    <td>&nbsp;&nbsp;&nbsp;NIP</td>



    <td>:</td>



    <td> $datape[nip]</td>



  </tr>



  <tr>



    <td>&nbsp;&nbsp;&nbsp;Pangkat/Golongan</td>



    <td>:</td>



    <td style='width:100mm;'>";  



			$gol_peg = $datape['golongan']; 			



			if ($gol_peg == "I/a") {



				echo "Juru Muda / ", $datape['golongan'];



				



				}else if ($gol_peg == "I/b") {



				echo "Juru Muda Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "I/c") {



				echo "Juru / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "I/d") {



				echo "Juru Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "II/a") {



				echo "Pengatur Muda / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "II/b") {



				echo "Pengatur Muda Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "II/c") {



				echo "Pengatur / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "II/d") {



				echo "Pengatur Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "III/a") {



				echo "Penata Muda / ",$datape['golongan'] ;



				



				}else if ($gol_peg == "III/b") {



				echo "Penata Muda Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "III/c") {



				echo "Penata / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "III/d") {



				echo "Penata Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "IV/a") {



				echo "Pembina / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "IV/b") {



				echo "Pembina Tingkat I / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "IV/c") {



				echo "Pembina Utama Muda / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "IV/d") {



				echo "Pembina Utama Madya / ", $datape['golongan'] ;



				



				}else if ($gol_peg == "IV/e") {



				echo "Pembina Utama / ", $datape['golongan'] ;



				



				}else  if (($gol_peg == "S1-DOKTER") || ($gol_peg == "S2-DOKTER") || ($gol_peg == "DIII") || 



					($gol_peg == "S1") || ($gol_peg == "SMA"))  {



				



				echo $datape['golongan'] ;				



			}//PUNYAKNYA IF



		echo" 



	</td>



  </tr>



  <tr>



    <td valign='top'>&nbsp;&nbsp;&nbsp;Jabatan</td>



    <td valign='top'>:</td>



    <td style='width:100mm;'> $datape[jabatan]</td>



  </tr>



</p> 



</table>



";  



}//tutup WHILE



}//TUTUP IF





?>









    </td>



  </tr>



</table>







<table cellpadding='0' cellspacing='1' style='width: 210mm;'>



  <tr>



    <td style='width: 40mm;' valign="top"><p class="contoh2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>



    <td style='width: 5mm;' valign="top"><p class="contoh2">: </p></td>



    <td td style='width: 150mm; text-align:justify;' valign="top"><p class="contoh2"><?php echo $data['untuk'];?></p></td>



  </tr>







  <tr>



    <td style='width: 40mm;' valign="top"><p class="contoh2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></td>



    <td style='width: 5mm;' valign="top"><p class="contoh2"> </p></td>



    <td td style='width: 150mm; text-align:justify;' valign="top"><p class="contoh2">Demikian surat perintah tugas ini untuk dilaksanakan.</p></td>



  </tr>



  <tr>



    <td width="31%">&nbsp;</td>



    <td width="69%">&nbsp;</td>



    <td width="69%">&nbsp;</td>



  </tr>



</table>



<br><br>







<?php







$tanggal_dikeluarkan= tanggal_indo($data['tgl_dikeluarkan']);















if ($ttd['nip']=='19601021 198511 1 001'){ //bangun







	echo"







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    ---------------------------------------------------------------------<br>







    <span style='text-align: center;'>







	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIREKTUR RSUD DR SOEDONO MADIUN<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19600812 198603 1 026'){ //boedi







	echo"







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    ---------------------------------------------------------------------<br>







    <span style='text-align: center;'>







	&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>

	WAKIL DIREKTUR UMUM DAN KEUANGAN<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19620506 198901 1 002'){ //ilham







	echo"







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    ---------------------------------------------------------------------<br>







    <span style='text-align: center;'>







	&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR UMUM DAN KEUANGAN<br>











    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19600401 198711 2 001'){ //dita







	echo"







	






<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    ---------------------------------------------------------------------<br>







    <span style='text-align: center;'>







	&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>

	

	WAKIL DIREKTUR PENUNJANG DAN DIKLIT<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19730227 199903 1 003'){ //cahyono







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR UMUM DAN KEUANGAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19620628 198903 2 003'){ //suswati







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR UMUM DAN KEUANGAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19660411 199606 2 001'){ //siwi







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR UMUM DAN KEUANGAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19650519 200501 1 005'){ //anwar -- YANMED







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR PELAYANAN MEDIK DAN KEPERAWATAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19630827 198409 2 001'){ //niniek -- YANMED







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR PELAYANAN MEDIK DAN KEPERAWATAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19671231 199112 1 014'){ //sugeng -- PENUNJANG







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR PENUNJANG DAN PENDIDIKAN PENELITIAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else if ($ttd['nip']=='19680827 200604 2 008'){ //ratih -- PENUNJANG







	echo"







	







<p class='contoh2'>







<table border='0'>







  <tr>







    <td style='width:100mm;'></td>







    <td style='width:100mm;'>&nbsp;Dikeluarkan di&nbsp;&nbsp;: $data[dikeluarkan]<br>







    &nbsp;Pada Tanggal&nbsp;&nbsp;: $tanggal_dikeluarkan<br>







    -------------------------------------------------------------------<br>







    <span style='text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;an. DIREKTUR RSUD DR SOEDONO MADIUN<br>







	WAKIL DIREKTUR PENUNJANG DAN PENDIDIKAN PENELITIAN<br>







	u.b.<br>







	$ttd[jabatan]<br>







    <br>







    <br>







    <br>







    <u>$ttd[nama]</u><br>







    $ttd[pangkat]<br>







    NIP $ttd[nip]</span></td>







  </tr>







</table>";







}







else{







echo"Pilih Tanda Tangan Pejabat";	







}







?>





















</p>















</body>















</html>















<?php















$html = ob_get_contents();















ob_end_clean();















        















require_once('../html2pdf/html2pdf.class.php');















$pdf = new HTML2PDF('P','legal','en');















$pdf->WriteHTML($html);















$pdf->Output('Data Spt.pdf', '');







?>