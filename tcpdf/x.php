<?php
// http://cariprogram.blogspot.com
// nuramijaya@gmail.com
require_once('tcpdf.php');
//Page orientation (P=portrait, L=landscape).

$pdf = new TCPDF('P', 'mm', 'legal', true, 'UTF-8', false);

//$pdf->SetFont('dejavusans', '', 10);
$pdf->SetFont('times', '', 10);

$pdf->setHeaderData('',0,'','',array(0,0,0), array(255,255,255) );  


$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

$html = '
<h1>Biodata</h1>
<table width="500" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td width="103">Nama</td>
    <td width="200">Nur Amijaya</td>
    <td width="171" rowspan="5"><img src="examples/images/tcpdf_logo.jpg" alt="test alt attribute" width="100" height="100" border="0" /></td>
  </tr>
  <tr>
    <td valign="top">Alamat</td>
    <td>Jl. Kaliurang Km. 13 Sleman Yogyakarta <br />
    55281</td>
  </tr>
  <tr>
    <td>No Telp</td>
    <td>089999999999</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-right: 1px solid white;border-top: 1px solid white;border-bottom: 1px solid black;">0274444444</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table><br/><br/>
<table width="500" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td width="103">Nama</td>
    <td width="200" style="border-left: 1px solid black;border-top: 1px solid black;">Nur Amijaya</td>
    <td width="171" rowspan="5"><img src="tcpdf/examples/images/tcpdf_logo.jpg" alt="test alt attribute" width="100" height="100" border="0" /></td>
  </tr>
  <tr>
    <td valign="top">Alamat</td>
    <td style="border-left: 1px solid black;background-color: yellow;text-align: justify;">Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta 55281. Jl. Kaliurang Km. 13 Sleman Yogyakarta <br />
    55281</td>
  </tr>
  <tr>
    <td>No Telp</td>
    <td style="border-left: 1px solid black;text-align: right;">089999999999</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style="border-left: 1px solid black;border-bottom: 1px solid black;text-align: center;">0274444444</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

$pdf->AddPage();

$html = '
<h1>Halaman 2</h1>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

//$pdf->Output('print.pdf', 'F');
$pdf->Output('print.pdf', 'I');
?>