<?php

namespace App\Controllers;

class Cetak extends Api
{
    
    function cetakkartupasienLAMA(){
        $input = json_decode(file_get_contents('php://input'));
        $norm       = $_POST['norm'];
        $nm_pasien  = $_POST['nm_pasien'];
        $pasien=$this->db->query("SELECT *,TO_CHAR(tgl_lahir,'dd-mm-YYYY') as tgl_lahirx from pasien where no_rm = '$norm' ")->getRow();

        if ($pasien->jenis_kelamin == 't'){
            $jns_kel = 'Laki-laki';
        }else{
            $jns_kel = 'Perempuan';
        }
        $mpdf   = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            //'A4',
                            'format' => [82, 180]
                            ]);
        $title  = "Kartu Pasien";
        $mpdf->AddPage('L', // L - landscape, P - portrait                
                '', '', '', '',
                2, // margin_left
                2, // margin right
                2, // margin top
                0, // margin bottom
                0, // margin header
                0); // margin footer        
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML("<style>            
            table{
                width: 100%;
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                //font-size: 10;
            }
            .border {
                border: 1px solid black;
            }
        </style>");
        $mpdf->WriteHTML('<html><body>'.'<table cellspacing="0" border="0">
            <tr>
                <td width="50">
                    <img src="_assets/dist/img/darmayu.jpg" width="50" height="50" />
                </td>
                <td>
                    <b style="font-size: 14;">RSU Darmayu</b><br>
                    <font style="font-size: 12px;">Jl. Dr. Sutomo No. 44 - 50 Ponorogo</font><br>
                    <font style="font-size: 12px;">Telp. (0352) 481320, 485999</font>
                    <font style="font-size: 12px;">Fax. (0352) 461253</font>
                </td>
            </tr>            
        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">                        
                                <tr>
                                    <td width="100" class="border">No. Medrec</td>
                                    <td width="15" class="border" align="center">:</td>
                                    <td width="250" class="border">'.$pasien->no_rm.'</td>
                                    <td rowspan="10" width="10" style="border-left: 1px solid black;height: auto;"></td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td width="100" class="border">Nama Pasien</td>
                                    <td width="15" class="border" align="center">:</td>
                                    <td width="250" class="border">'.$pasien->nama.'</td>
                                    <td rowspan="10" width="10" style="border-left: 1px solid black;height: auto;"></td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Tgl. Lahir</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->tgl_lahirx.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Jenis Kelamin</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$jns_kel.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Status</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->status_marita.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Alamat Lengkap</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->alamat.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Kota/Kecamatan</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->kota.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">No. Telp</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->telepon.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Pekerjaan</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->kd_pekerjaan.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Nama Keluarga</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">'.$pasien->nama_keluarga.'</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                                <tr>
                                    <td class="border">Penjamin</td>
                                    <td class="border" align="center">:</td>
                                    <td class="border">UMUM</td>
                                    <td style="border-bottom: 1px dashed black;"></td>
                                </tr>
                            
                        </table>'
                        . '</body></html>'); 
        //$mpdf->SetWatermarkImage('_assets/dist/img/watermark.jpg');
        $mpdf->showWatermarkImage = true;
        $mpdf->Output("cetak.pdf", 'I');
        exit;
    }

    function cetakkartupasien(){
        $input = json_decode(file_get_contents('php://input'));
        $norm       = $_POST['norm'];
        $nm_pasien  = $_POST['nm_pasien'];
        $pasien     = $this->db->query("SELECT *,TO_CHAR(tgl_lahir,'DD MONTH YYYY') as tgl_lahirx from pasien where no_rm = '$norm' ")->getRow();

        if ($pasien->jenis_kelamin == 't'){
            $jns_kel = 'Laki-laki';
        }else{
            $jns_kel = 'Perempuan';
        }

        if (strlen($pasien->alamat) > 30) {
            $alamat = substr($pasien->alamat, 0, 30)."...";
        }else{
            $alamat = $pasien->alamat;
        }

        $mpdf   = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            'A4',
                            'format' => [130, 80],
                            'margin_top'    => 5,
                            'margin_left'   => 5,
                            'margin_bottom' => 0,
                            'margin_right'  => 5
                            ]);
        $title  = "Kartu Pasien";
            
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML("<style>            
            table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                //font-size: 10;
            }
            .border {
                border: 1px solid black;
            }
        </style>");
        
        $mpdf->WriteHTML('<div style="top: 100; position: absolute; padding-left: 10px; font-weight: bold;">
                        <table cellspacing="0" cellpadding="3" border="0" style=" font-weight: bold; font-size: 15px">
                            <tr>
                                <td align="left" width="330"> No. RM : '.$pasien->no_rm.'</td>
                            </tr>
                            <tr>
                                <td align="left">'.strtoupper($pasien->nama).'</td>
                            </tr>
                            <tr>
                                <td align="left">'.strtoupper($pasien->tgl_lahirx.' / '.$jns_kel).'</td>
                            </tr>
                            <tr>
                                <td align="left" >'.strtoupper($pasien->alamat).'</td>
                            </tr>
                        </table></div>'
                        . '</body></html>');
        $mpdf->Output("Kartu Pasien.pdf", 'I');
        exit;
    }

    function cetakkartukontrol(){
        $mpdf   = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            //'A4',
                            //'format' => [82, 180]
                            'format' => 'letter'
                            ]);
        $title  = "Kartu Kontrol Pasien";
        $mpdf->AddPage('P', // L - landscape, P - portrait                
                '', '', '', '',
                2, // margin_left
                2, // margin right
                2, // margin top
                0, // margin bottom
                0, // margin header
                0); // margin footer        
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML("<style>            
            table{
                width: 100%;
                font-family: Arial, Helvetica, sans-serif;
                //border-collapse: collapse;
                //font-size: 10;
            }
            .border {
                border: 1px solid black;
            }
        </style>");
        $mpdf->WriteHTML('<html><body>'.'<table cellspacing="0" border="0">
            <tr>
                <td width="70">
                    <img src="_assets/dist/img/darmayu.jpg" width="80" height="80" />
                </td>
                <td>
                    <b style="font-size: 20;">RSU Darmayu</b><br>
                    <font style="font-size: 16px;">Jl. Dr. Sutomo No. 44 - 50 Ponorogo</font><br>
                    <font style="font-size: 16px;">Telp. (0352) 481320, 485999</font>
                    <font style="font-size: 16px;">Fax. (0352) 461253</font>
                </td>
            </tr>            
        </table>
        <hr width="100%">');
        
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td align="center"><h2>SURAT KETERANGAN KONTROL</h2></td>
                        </tr>
                        <tr>
                            <td align="center">Nomor Surat : 68603/RSKC/RJ-SK/VI/2023</td>
                        </tr>
                        </table>');

        $mpdf->WriteHTML('<table border="0" style="margin-top:15px; font-size:16px;">                        
                                <tr>
                                    <td width="100">Nomor RM</td>
                                    <td width="15" align="center">:</td>
                                    <td width="250" >000222385</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td align="center">:</td>
                                    <td><b>KRISTIN SULISTYOWATI BYNY</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td align="center">:</td>
                                    <td>PEREMPUAN</td>
                                </tr>
                                <tr>
                                    <td>Tempat / Tanggal Lahir</td>
                                    <td align="center">:</td>
                                    <td>PO, 25/06/2023</td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td align="center">:</td>
                                    <td>0 Tahun 0 Bulan 0 Hari</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td align="center">:</td>
                                    <td>JL.SUBOKASTOWO 64B TAMBAKBAYAN / MANGUNHARJO MADIUN</td>
                                </tr>
                                <tr>
                                    <td>Kode ICD</td>
                                    <td align="center">:</td>
                                    <td>P034</td>
                                </tr>
                                <tr>
                                    <td>Diagnosa ICD</td>
                                    <td align="center">:</td>
                                    <td>Fetus and newborn affected by caesarean delivery</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Rujukan</td>
                                    <td align="center">:</td>
                                    <td>25/06/2023</td>
                                </tr>
                                <tr>
                                    <td>Obat / Terapi</td>
                                    <td align="center">:</td>
                                    <td>HANDSCOON SENSIGLOVE - , KASA STERIL - , MAXTER 7 - , NEDLE 24 - , SPUIT 3 CC - , UMBILICAL CORD NYLON OM - , UNDER PAD / U-PAD STERIL -</td>
                                </tr>
                        </table>');
        
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan :</td>
                        </tr>
                        <tr>
                            <td height="50" style="padding-left:10px;">Kontrol post rawat inap</td>
                        </tr>
                        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td>Rencana Tindak Lanjut yang akan dilakukan pada kunjungan selanjutnya :</td>
                        </tr>
                        <tr>
                            <td height="50" style="padding-left:10px;">Kontrol kembali RS</td>
                        </tr>
                        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td colspan="5">Saran Kontrol :</td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Kontrol Ulang Tanggal</td>
                            <td width="10" >:</td>
                            <td><b>Selasa, 4 Juli 2023</b></td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Konsul Ke </td>
                            <td width="10" >:</td>
                            <td><b>dr. KAUTSAR P.E.B, Sp.A, M.Sc</b></td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Jadwal</td>
                            <td width="10" >:</td>
                            <td><b>Selasa Siang 14:30 - 16:00</b></td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Nomor Booking</td>
                            <td width="10" >:</td>
                            <td><b>6O9749</b></td>
                        </tr>
                        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:35px;">
                        <tr>
                            <td width="30%"></td>
                            <td width="40%"></td>
                            <td width="30%" align="center">Dokter<br>Ponorogo, '.date('d/m/Y').'</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td height="50" align="center" style="border-bottom:2px solid"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td align="center">dr. KAUTSAR P.E.B, Sp.A, M.Sc</td>
                        </tr>
                        </table>');
                
        $mpdf->SetHTMLFooter('
        <table width="100%" border="0" cellpadding="0">
            <tr>
                <td height="5" align="left"><i>** Surat Keterangan ini digunakan untuk 1 (satu) kali kunjungan dengan diagnosa di atas.</i></td>
            </tr>
            <tr>
                <td height="5"><hr></td>
            </tr>
            <tr>
                <td align="right" style="font-size:10px"><i>Hal {PAGENO}/{nbpg}</i></td>
            </tr>
        </table>');
        
        $mpdf->WriteHTML('</body></html>');
        $mpdf->SetWatermarkImage('_assets/dist/img/watermark.jpg');
        $mpdf->showWatermarkImage = true;
        $mpdf->Output("cetak.pdf", 'I');
        exit;
    }

    function suratpernyataan(){
        $mpdf   = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            //'A4',
                            //'format' => [82, 180]
                            'format' => 'letter'
                            ]);
        $title  = "Surat Pernyataan Pasien";
        $mpdf->AddPage('P', // L - landscape, P - portrait                
                '', '', '', '',
                2, // margin_left
                2, // margin right
                2, // margin top
                0, // margin bottom
                0, // margin header
                0); // margin footer        
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML("<style>            
            table{
                width: 100%;
                font-family: Arial, Helvetica, sans-serif;
                //border-collapse: collapse;
                //font-size: 10;
            }
            .border {
                border: 1px solid black;
            }
        </style>");
        $mpdf->WriteHTML('<html><body>'.'<table cellspacing="0" border="0">
            <tr>
                <td width="70">
                    <img src="_assets/dist/img/darmayu.jpg" width="80" height="80" />
                </td>
                <td>
                    <b style="font-size: 20;">RSU Darmayu</b><br>
                    <font style="font-size: 16px;">Jl. Dr. Sutomo No. 44 - 50 Ponorogo</font><br>
                    <font style="font-size: 16px;">Telp. (0352) 481320, 485999</font>
                    <font style="font-size: 16px;">Fax. (0352) 461253</font>
                </td>
            </tr>            
        </table>
        <hr width="100%">');
        
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td align="center"><h2>SURAT KETERANGAN KONTROL</h2></td>
                        </tr>
                        <tr>
                            <td align="center">Nomor Surat : 68603/RSKC/RJ-SK/VI/2023</td>
                        </tr>
                        </table>');

        $mpdf->WriteHTML('<table border="0" style="margin-top:15px; font-size:16px;">                        
                                <tr>
                                    <td width="100">Nomor RM</td>
                                    <td width="15" align="center">:</td>
                                    <td width="250" >000222385</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td align="center">:</td>
                                    <td><b>KRISTIN SULISTYOWATI BYNY</b></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td align="center">:</td>
                                    <td>PEREMPUAN</td>
                                </tr>
                                <tr>
                                    <td>Tempat / Tanggal Lahir</td>
                                    <td align="center">:</td>
                                    <td>PO, 25/06/2023</td>
                                </tr>
                                <tr>
                                    <td>Umur</td>
                                    <td align="center">:</td>
                                    <td>0 Tahun 0 Bulan 0 Hari</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td align="center">:</td>
                                    <td>JL.SUBOKASTOWO 64B TAMBAKBAYAN / MANGUNHARJO MADIUN</td>
                                </tr>
                                <tr>
                                    <td>Kode ICD</td>
                                    <td align="center">:</td>
                                    <td>P034</td>
                                </tr>
                                <tr>
                                    <td>Diagnosa ICD</td>
                                    <td align="center">:</td>
                                    <td>Fetus and newborn affected by caesarean delivery</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Rujukan</td>
                                    <td align="center">:</td>
                                    <td>25/06/2023</td>
                                </tr>
                                <tr>
                                    <td>Obat / Terapi</td>
                                    <td align="center">:</td>
                                    <td>HANDSCOON SENSIGLOVE - , KASA STERIL - , MAXTER 7 - , NEDLE 24 - , SPUIT 3 CC - , UMBILICAL CORD NYLON OM - , UNDER PAD / U-PAD STERIL -</td>
                                </tr>
                        </table>');
        
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td>Belum dapat dikembalikan ke Fasilitas Perujuk dengan alasan :</td>
                        </tr>
                        <tr>
                            <td height="50" style="padding-left:10px;">Kontrol post rawat inap</td>
                        </tr>
                        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td>Rencana Tindak Lanjut yang akan dilakukan pada kunjungan selanjutnya :</td>
                        </tr>
                        <tr>
                            <td height="50" style="padding-left:10px;">Kontrol kembali RS</td>
                        </tr>
                        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:5px;">
                        <tr>
                            <td colspan="5">Saran Kontrol :</td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Kontrol Ulang Tanggal</td>
                            <td width="10" >:</td>
                            <td><b>Selasa, 4 Juli 2023</b></td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Konsul Ke </td>
                            <td width="10" >:</td>
                            <td><b>dr. KAUTSAR P.E.B, Sp.A, M.Sc</b></td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Jadwal</td>
                            <td width="10" >:</td>
                            <td><b>Selasa Siang 14:30 - 16:00</b></td>
                        </tr>
                        <tr>
                            <td width="40"></td>
                            <td width="40" height="30" style="border:2px solid black; border-radius:15px;"></td>
                            <td width="180" >Nomor Booking</td>
                            <td width="10" >:</td>
                            <td><b>6O9749</b></td>
                        </tr>
                        </table>');
        $mpdf->WriteHTML('<table border="0" style="margin-top:35px;">
                        <tr>
                            <td width="30%"></td>
                            <td width="40%"></td>
                            <td width="30%" align="center">Dokter<br>Ponorogo, '.date('d/m/Y').'</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td height="50" align="center" style="border-bottom:2px solid"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td align="center">dr. KAUTSAR P.E.B, Sp.A, M.Sc</td>
                        </tr>
                        </table>');
                
        $mpdf->SetHTMLFooter('
        <table width="100%" border="0" cellpadding="0">
            <tr>
                <td height="5" align="left"><i>** Surat Keterangan ini digunakan untuk 1 (satu) kali kunjungan dengan diagnosa di atas.</i></td>
            </tr>
            <tr>
                <td height="5"><hr></td>
            </tr>
            <tr>
                <td align="right" style="font-size:10px"><i>Hal {PAGENO}/{nbpg}</i></td>
            </tr>
        </table>');
        
        $mpdf->WriteHTML('</body></html>');
        $mpdf->SetWatermarkImage('_assets/dist/img/watermark.jpg');
        $mpdf->showWatermarkImage = true;
        $mpdf->Output("cetak.pdf", 'I');
        exit;
    }
    
    function tesGambar() {
        $data = $_POST['gambar'];
        echo '<img src="' . $data . '" />';
    }
    
    function cetakgelang(){
        $input = json_decode(file_get_contents('php://input'));
        $norm       = $_POST['norm'];
        $nm_pasien  = $_POST['nm_pasien'];
        $lahir      = $_POST['lahir'];
        $modul      = $_POST['modul'];

        if ($modul == ''){
            $output['status']   = "Cetak Gelang Pasien Gagal!!";
            $output['pesan']    = "Simpan Dahulu, Baru Bisa Cetak Label";   
            $this->hasil($output);
            return;
        }

        $data = "   SELECT
                        id_transaksi,
                        no_rm,
                        nama,
                        TO_CHAR( tgl_lahir, 'dd-mm-YYYY' ) AS tgl_lahir,
                        nik,
                        marital,
                        CASE
                            
                            WHEN jenis_kelamin = 'f' THEN
                            'P' ELSE'L' 
                        END AS jenis_kelamin,
                        nama_unit,
                        nama_pegawai,
                        nama_penjamin,
                        tgl_masuk,
                        jam_masuk 
                    FROM
                        kunjungan
                        INNER JOIN transaksi USING ( id_transaksi )
                        INNER JOIN pasien USING ( no_rm )
                        INNER JOIN unit ON kunjungan.id_unit = unit.id_unit
                        LEFT JOIN marital ON pasien.status_marita = marital.kd_marital
                        INNER JOIN pegawai USING ( id_pegawai )
                        LEFT JOIN penjamin_pasien USING ( no_rm )
                        INNER JOIN penjamin USING ( id_penjamin ) 
                    WHERE no_rm = '$norm' AND LEFT (kunjungan.id_unit, 1) = '$modul' ORDER BY kunjungan DESC";
        $pasien = $this->db->query($data)->getRow();
        
        if ($this->db->query($data)->getNumRows() == 0){
            $output['status']   = "Cetak Gelang Pasien Gagal!!";
            $output['pesan']    = "Simpan Dahulu, Baru Bisa Cetak Label";   
            $this->hasil($output);
            return;
        }

        $nmpasien = $pasien->nama;
        //$nmpasien = 'EDWIN TRI HADTANTO, A.Md';
        $nmdokter = $pasien->nama_pegawai;
        //$nmdokter = 'Melati Arum Satiti,Sp.A M.Sc,drCCC';
    
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'A4',
            'format'        => [210, 80], 
            'margin_top'    => 5,
            'margin_bottom' => 0,
            'margin_left'   => 5,
            'margin_right'  => 2,
            'mirrorMargins' => false
        ]);
        
        $title  = "Gelang Pasien";
   
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetTitle($title);
        $mpdf->WriteHTML("<style>
            body{
                font-family:Arial;
            }
            div.a {
                text-align: left;
                width:100%;
            }
            .lh{
                line-height:0.1;
                font-size: 50px;
            }
            </style>");
        $mpdf->WriteHTML('<div class="a">
                            <p class="lh"><b>'.$pasien->no_rm.' / '.$nmpasien.'</p>
                            <p class="lh">'.umurdepan($pasien->tgl_lahir).' / '.$pasien->jenis_kelamin.' / '.$pasien->tgl_lahir.' / '.$pasien->nama_unit.'</p>
                            <p class="lh">'.$pasien->nama_penjamin.' / '.substr($pasien->jam_masuk, 0, 16).'</p>
                            <p class="lh">'.$nmdokter.'</p>
                        </div>
                        ');
        $mpdf->Output("Gelang Pasien.pdf", 'I');
        exit;
    }
}