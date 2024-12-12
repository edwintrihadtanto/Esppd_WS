<?php
namespace App\Controllers;

use CodeIgniter\Controller;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Laporan extends Api
{
    function view($target){
        try {
         return view('view/modal/vlaporan/'.$target);
     }catch (\CodeIgniter\View\Exceptions\ViewException $e){
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
  }
}

public function LaporanExpiredObat() {
    date_default_timezone_set('Asia/Jakarta');
    $input = json_decode(file_get_contents('php://input'));
    
    $depo       = $_POST['depo'];
    $tglawal    = $_POST['tglawal'];
    $tglakhr    = $_POST['tglakhir'];
    
    $replacetglwal = str_replace("/", "-", $_POST['tglawal']);
    $dateawal = date_create($replacetglwal);
    $tglawal1 = date_format($dateawal, "d-M-Y");

    $replacetglwal2 = str_replace("/", "-", $_POST['tglakhir']);
    $dateawal2 = date_create($replacetglwal2);
    $tglawal2 = date_format($dateawal2, "d-M-Y");

    $getNmaUnit = $this->db->query(" SELECT * FROM unit WHERE id_unit = '".$depo."'")->getRow();
    $nm_unit    = $getNmaUnit->nama_unit;

    $query  = $this->db->query("SELECT
                                        * 
        FROM
        far_stok 
        INNER JOIN far_obat using(kd_obat)
        INNER JOIN far_obat_milik using(kd_milik)
        INNER JOIN far_sub_jenis USING (kd_sub_jns) 
        WHERE
        id_unit = '".$depo."' and exp BETWEEN '".$tglawal."' AND '".$tglakhr."'
        ORDER BY sub_jenis, nama_obat ASC");
    
    $html = "<html>
    <body>
    <div>
    <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
    <tr>
    <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
    <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
    RUMAH SAKIT UMUM DARMAYU 
    </td>
    </tr>
    <tr>
    <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
    </tr>
    <tr>
    <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
    </tr>
    </table>
    <hr>
    <p style='text-align:center; font-weight: bold';>Laporan Masa Expired Kersediaan Stok Obat $nm_unit <br>Tanggal $tglawal1 s/d $tglawal2 </p>
    <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
    <tr>
    <td width='30'><b>No</b></td>
    <td width='100'><b>Expired</b></td>
    <td width='100'><b>Sub Jenis</b></td>
    <td width='150'><b>Kode Obat</b></td>
    <td><b>Nama Obat</b></td>
    <td width='60' style='text-align:center;'><b>Stok</b></td>
    </tr>";
    $no = 1;
    foreach ($query->getResult() as $row) {
        $html .= "<tr>
        <td>$no</td>
        <td>$row->exp</td>
        <td>$row->sub_jenis</td>
        <td>$row->kd_obat</td>
        <td>$row->nama_obat</td>
        <td style='text-align:right'>$row->stok_unit</td>
        </tr>";
        $no++;
    };
    
    $html .= "      </table>
    </div>
    </body>
    </html>";
    
    $mpdf   = new \Mpdf\Mpdf(
        [
            'mode'      => 'utf-8',
            'format'    => 'A4'
        ]);

    $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

    $mpdf->WriteHTML($html);
    $mpdf->Output("Laporan Masa Expired Kersediaan Stok Obat.pdf", 'I');
    exit;
}

public function laporanstokobat(){
    date_default_timezone_set('Asia/Jakarta');
    $input = json_decode(file_get_contents('php://input'));
    
    $depo       = $_POST['depo'];
        // $tglawal    = $_POST['tglawal'];
        // $tglakhr    = $_POST['tglakhir'];
    $tglawal = date('d-M-Y');

    $getNmaUnit = $this->db->query(" SELECT * FROM unit WHERE id_unit = '".$depo."'")->getRow();
    $nm_unit    = $getNmaUnit->nama_unit;

    $query = $this->db->query("SELECT DISTINCT 
        kd_obat, nama_obat, 
        SUM(COALESCE(stok_unit, 0)) as stok_unit, 
        harga, 
        round((SUM(COALESCE(stok_unit, 0)) * harga) :: numeric ,2)
        as hpp,
        milik
        FROM
        far_obat
        LEFT JOIN far_stok USING ( kd_obat )
        LEFT JOIN tarif_obat USING ( kd_obat, kd_milik )
        LEFT JOIN far_obat_milik USING ( kd_milik )
        WHERE id_unit = '".$depo."' GROUP BY kd_obat, nama_obat, milik, harga ORDER BY nama_obat ASC");
    $query_tot  = $this->db->query("SELECT 
        sum(x.total) as total,
        round(sum(x.hpp)::numeric,2) as hpp 
        from 
        (SELECT 
            SUM ( COALESCE ( stok_unit, 0 ) ) AS total,
            harga * SUM ( COALESCE ( stok_unit, 0 ) ) hpp
            FROM
            far_obat
            LEFT JOIN far_stok USING ( kd_obat )
            LEFT JOIN tarif_obat USING ( kd_obat, kd_milik )
            LEFT JOIN far_obat_milik USING ( kd_milik ) 
            WHERE id_unit = '".$depo."' GROUP BY tarif_obat.harga) x");
        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM DARMAYU 
        </td>
        </tr>
        <tr>
        <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr>
        <p style='text-align:center; font-weight: bold';>Laporan Stok Obat $nm_unit <br>Tanggal $tglawal</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='150'><b>Kode Obat</b></td>
        <td><b>Nama Obat</b></td>
        <td><b>HPP</b></td>
        <td width='60' style='text-align:center;'><b>Stok</b></td>
        <td><b>Jumlah</b></td>
        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
            <td>$no</td>
            <td>$row->kd_obat</td>
            <td>$row->nama_obat</td>
            <td style='text-align:right'>$row->harga</td>
            <td style='text-align:right'>$row->stok_unit</td>
            <td style='text-align:right'>$row->hpp</td>
            </tr>";
            $no++;
        };
        foreach ($query_tot->getResult() as $total) {
            $html .= "  <tr>
            <td colspan='4' style='text-align:center; font-weight: bold;'>Total</td>
            <td style='text-align:right; font-weight: bold;'>$total->total</td>
            <td style='text-align:right; font-weight: bold;'>$total->hpp</td>
            </tr>
            ";
        };

        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Stok Obat Per Depo.pdf", 'I');
        exit;



    }
    public function laporan_kunjungan_igd(){
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];



        $query = $this->db->query("SELECT
            case WHEN jenis_kelamin='f' then 'perempuan'
            WHEN jenis_kelamin='t' then 'laki-laki'
            END as kelaminpasien,nama_penjamin,
        * 
            FROM
            kunjungan
            LEFT JOIN transaksi USING (id_transaksi)
            JOIN unit USING ( id_unit )
            JOIN pasien USING (no_rm)
            join penjamin_transaksi USING (id_transaksi)
            join penjamin using (id_penjamin)
            where unit.jenis_unit='3'
            and tgl_masuk BETWEEN '$tglawal' and '$tglakhr' order by tgl_masuk asc");

        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM
        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
        </tr>
        <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
        <p style='text-align:center; font-weight: bold';>Laporan Kunjungan Pasien IGD <br>Tanggal $tglawal s/d $tglakhr</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='150'><b>Tanggal</b></td>
        <td width='150'><b>Nama Pasien</b></td>
        <td width='150'><b>Kelamin</b></td>
        <td><b>Kode Pasien</b></td>
        <td><b>Alamat Ktp</b></td>
        <td><b>Penjamin</b></td>
        <td width='60' style='text-align:center;'><b>Unit</b></td>
        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
            <td>$no</td>
            <td>".date_indo($row->tgl_masuk)."</td>
            <td>$row->nama</td>
            <td>$row->kelaminpasien</td>
            <td>$row->no_rm</td>
            <td>$row->alamat_ktp</td>
            <td>$row->nama_penjamin</td>

            <td style='text-align:right'>$row->nama_unit</td>
            </tr>";
            $no++;
        };


        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Kunjungan IGD.pdf", 'I');
        exit;

    }
    public function laporan_kunjungan_rajal(){
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];



        $query = $this->db->query("SELECT
            case WHEN jenis_kelamin='f' then 'perempuan'
            WHEN jenis_kelamin='t' then 'laki-laki'
            END as kelaminpasien,nama_penjamin,
        * 
            FROM
            kunjungan
            LEFT JOIN transaksi USING (id_transaksi)
            JOIN unit USING ( id_unit )
            JOIN pasien USING (no_rm)
            join penjamin_transaksi USING (id_transaksi)
            join penjamin using (id_penjamin)
            where unit.jenis_unit='1'
            and tgl_masuk BETWEEN '$tglawal' and '$tglakhr'
            order by kunjungan.tgl_masuk,nama_unit,nama asc");

        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM
        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
        </tr>
        <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
        <p style='text-align:center; font-weight: bold';>Laporan Kunjungan Pasien Rawat Jalan <br>Tanggal $tglawal s/d $tglakhr</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='150'><b>Tanggal</b></td>
        <td width='150'><b>Nama Pasien</b></td>
        <td width='150'><b>Kelamin</b></td>
        <td><b>Kode Pasien</b></td>
        <td><b>Alamat Ktp</b></td>
        <td><b>Penjamin</b></td>
        <td width='60' style='text-align:center;'><b>Unit</b></td>
        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
            <td>$no</td>
            <td>".date_indo($row->tgl_masuk)."</td>
            <td>$row->nama</td>
            <td>$row->kelaminpasien</td>
            <td>$row->no_rm</td>
            <td>$row->alamat_ktp</td>
            <td>$row->nama_penjamin</td>

            <td style='text-align:right'>$row->nama_unit</td>
            </tr>";
            $no++;
        };


        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Kunjungan RAJAL.pdf", 'I');
        exit;

    }
    public function laporan_kunjungan_ranap(){
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];



        $query = $this->db->query("SELECT
            CASE
            WHEN
            jenis_kelamin = 'f' THEN
            'perempuan' 
            WHEN jenis_kelamin = 't' THEN
            'laki-laki' 
            END AS kelaminpasien,nama_penjamin,
                * 
            FROM
            kunjungan
            LEFT JOIN transaksi USING ( id_transaksi )
            JOIN unit USING ( id_unit )
            JOIN pasien USING ( no_rm ) 
            JOIN kamar using(id_kamar)
            JOIN ruang_inap using(id_ruang)
            join penjamin_transaksi USING (id_transaksi)
            join penjamin using (id_penjamin)
            WHERE
            unit.jenis_unit = '2' 
            AND kunjungan.awal_inap is true
            and tgl_masuk BETWEEN '$tglawal' and '$tglakhr'
            ORDER BY
            kunjungan.tgl_masuk,
            nama_unit,
            nama ASC");

        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM
        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
        </tr>
        <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
        <p style='text-align:center; font-weight: bold';>Laporan Kunjungan Pasien Rawat Inap <br>Tanggal $tglawal s/d $tglakhr</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='120'><b>Tanggal</b></td>
        <td width='150'><b>Nama Pasien</b></td>
        <td width='100'><b>Kelamin</b></td>
        <td><b>Kode Pasien</b></td>
        <td><b>Alamat Ktp</b></td>
        <td><b>Unit</b></td>
        <td><b>Ruang/Kamar</b></td>
        <td><b>Penjamin</b></td>


        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
            <td>$no</td>
            <td>".date_indo($row->tgl_masuk)."</td>
            <td>$row->nama</td>
            <td>$row->kelaminpasien</td>
            <td>$row->no_rm</td>
            <td>$row->alamat_ktp</td>
            <td>$row->nama_unit</td>
            <td>".$row->nama_ruang." / ".$row->nama_kamar."</td>
            <td>$row->nama_penjamin</td>
            </tr>";
            $no++;
        };


        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Kunjungan Ranap.pdf", 'I');
        exit;

    }
    public function laporan_kunjungan_lab(){
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];



        $query = $this->db->query("SELECT 
            CASE
            WHEN
            jenis_kelamin = 'f' THEN
            'perempuan' 
            WHEN jenis_kelamin = 't' THEN
            'laki-laki' 
            END AS kelaminpasien,
            CASE
            WHEN
            LEFT(unit.id_unit, 1) = '1' THEN
            'Rawat Jalan' 
            WHEN LEFT(unit.id_unit, 1) = '2' THEN
            'Rawat Inap'        
            WHEN LEFT(unit.id_unit, 1) = '3' THEN
            'IGD Umum'                  
            WHEN unit.id_unit is null THEN
            'Umum' 
            END AS nama_unit,pasien.no_rm,pasien.nama,pasien.alamat, transaksi.id_transaksi, kunjungan.id_kunjungan id_lama,kunjungan_lab.tgl_masuk,nama_kamar,penjamin.nama_penjamin
            FROM order_lab
            JOIN kunjungan ON order_lab.id_kunjungan = kunjungan.id_kunjungan
            JOIN unit ON kunjungan.id_unit = unit.id_unit 
            LEFT JOIN kamar on kamar.id_kamar = kunjungan.id_kamar                              
            FULL JOIN kunjungan AS kunjungan_lab ON kunjungan_lab.id_kunjungan = order_lab.id_kunjungan_lab 
            JOIN transaksi ON (kunjungan_lab.id_transaksi = transaksi.id_transaksi OR kunjungan.id_transaksi = transaksi.id_transaksi)
            JOIN pasien ON transaksi.no_rm = pasien.no_rm 
            JOIN penjamin_transaksi ON transaksi.id_transaksi=penjamin_transaksi.id_transaksi
            JOIN penjamin on penjamin.id_penjamin=penjamin_transaksi.id_penjamin
            WHERE (kunjungan_lab.id_unit LIKE '6%' OR kunjungan_lab.id_unit IS NULL)  
            and penjamin_transaksi.penjamin_utama ='t' 
            and kunjungan_lab.tgl_masuk BETWEEN '$tglawal' and '$tglakhr'
            AND kunjungan_lab.tgl_masuk is NOT NULL
            ORDER BY kunjungan_lab.tgl_masuk,
            nama_unit,
            nama ASC ");

        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM
        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
        </tr>
        <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
        <p style='text-align:center; font-weight: bold';>Laporan Kunjungan Pasien Laboratorium <br>Tanggal $tglawal s/d $tglakhr</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='150'><b>Tanggal</b></td>
        <td width='150'><b>Nama Pasien</b></td>
        <td width='150'><b>Kelamin</b></td>
        <td><b>Kode Pasien</b></td>
        <td><b>Alamat Ktp</b></td>
        <td><b>Unit</b></td>
        <td><b>Ruang/Kamar</b></td>

        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {

            $html .= "<tr>
            <td>$no</td>
            <td>".date_indo($row->tgl_masuk)."</td>
            <td>$row->nama</td>
            <td>$row->kelaminpasien</td>
            <td>$row->no_rm</td>
            <td>$row->alamat</td>
            <td>$row->nama_unit</td>
            <td>".$row->nama_kamar."</td>
            </tr>";
            $no++;
        };


        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Kunjungan Ranap.pdf", 'I');
        exit;
    }

    public function laporan_tindakan_lab(){
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];

        $query = $this->db->query("SELECT DISTINCT nama_produk,COUNT(nama_produk) as jumlah FROM detail_kunjungan
            JOIN kunjungan on detail_kunjungan.id_kunjungan=kunjungan.id_kunjungan
            JOIN unit on kunjungan.id_unit=unit.id_unit
            JOIN produk on produk.id_produk=detail_kunjungan.id_produk
            WHERE unit.id_unit='6001'
            AND kunjungan.tgl_masuk BETWEEN '$tglawal' AND '$tglakhr'
            GROUP BY nama_produk
            ORDER BY jumlah ASC");

        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM
        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
        </tr>
        <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
        <p style='text-align:center; font-weight: bold';>Laporan Tindakan Pasien Laboratorium <br>Tanggal $tglawal s/d $tglakhr</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='150'><b>Nama Tindakan</b></td>
        <td width='100'><b>Jumlah</b></td>
        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {

            $html .= "<tr>
            <td>$no</td>
            <td>$row->nama_produk</td>
            <td>$row->jumlah</td>
            </tr>";
            $no++;
        };

        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
        'P', // L - landscape, P - portrait
        '',
        '',
        '',
        '',
        2, // margin_left
        2, // margin right
        2, // margin top
        2, // margin bottom
        0, // margin header
        2
    ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Kunjungan Ranap.pdf", 'I');
        exit;

    }

    public function laporan_kunjungan_rad(){
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];

        $query = $this->db->query("SELECT 
            CASE
            WHEN
            jenis_kelamin = 'f' THEN
            'perempuan' 
            WHEN jenis_kelamin = 't' THEN
            'laki-laki' 
            END AS kelaminpasien,
            CASE
            WHEN
            LEFT(unit.id_unit, 1) = '1' THEN
            'Rawat Jalan' 
            WHEN LEFT(unit.id_unit, 1) = '2' THEN
            'Rawat Inap'        
            WHEN LEFT(unit.id_unit, 1) = '3' THEN
            'IGD Umum'                  
            WHEN unit.id_unit is null THEN
            'Umum' 
            END AS nama_unit,pasien.no_rm,  pasien.nama, pasien.alamat, transaksi.id_transaksi, kunjungan_rad.tgl_masuk tgl_masuk_rad,  nama_kamar,penjamin.nama_penjamin
            FROM    order_rad
            JOIN kunjungan USING ( id_kunjungan )
            FULL JOIN kunjungan kunjungan_rad ON kunjungan_rad.id_kunjungan = order_rad.id_kunjungan_rad
            JOIN transaksi ON transaksi.id_transaksi = kunjungan.id_transaksi 
            OR transaksi.id_transaksi = kunjungan_rad.id_transaksi
            LEFT JOIN unit ON kunjungan.id_unit = unit.id_unit
            JOIN pasien USING ( no_rm )
            LEFT JOIN pegawai ON kunjungan_rad.id_pegawai = pegawai.id_pegawai
            JOIN penjamin_transaksi  ON transaksi.id_transaksi=penjamin_transaksi.id_transaksi
            JOIN penjamin on penjamin_transaksi.id_penjamin=penjamin.id_penjamin
            LEFT JOIN kamar on kamar.id_kamar = kunjungan.id_kamar
            WHERE (kunjungan_rad.id_unit LIKE '5%' OR kunjungan_rad.id_unit IS NULL)  
            and penjamin_transaksi.penjamin_utama ='t' 
            and kunjungan_rad.tgl_masuk BETWEEN '$tglawal' and '$tglakhr'
            AND kunjungan_rad.tgl_masuk is NOT NULL
            ORDER BY kunjungan_rad.tgl_masuk,
            unit.nama_unit,
            nama ASC ");

        $html = "<html>
        <body>
        <div>
        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
        <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
        RUMAH SAKIT UMUM
        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
        </td>
        </tr>
        <tr>
        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
        <p style='text-align:center; font-weight: bold';>Laporan Kunjungan Pasien Radiologi <br>Tanggal $tglawal s/d $tglakhr</p>
        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
        <tr>
        <td width='30'><b>No</b></td>
        <td width='150'><b>Tanggal</b></td>
        <td width='150'><b>Nama Pasien</b></td>
        <td width='100'><b>Kelamin</b></td>
        <td><b>Kode Pasien</b></td>
        <td><b>Alamat Ktp</b></td>
        <td><b>Unit</b></td>
        <td><b>Ruang/Kamar</b></td>

        </tr>";
        $no = 1;
        foreach ($query->getResult() as $row) {

            $html .= "<tr>
            <td>$no</td>
            <td>".date_indo($row->tgl_masuk_rad)."</td>
            <td>$row->nama</td>
            <td>$row->kelaminpasien</td>
            <td>$row->no_rm</td>
            <td>$row->alamat</td>
            <td>$row->nama_unit</td>
            <td>".$row->nama_kamar."</td>
            </tr>";
            $no++;
        };


        $html .= "  </table>
        </div>
        </body>
        </html>";

        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

        ]);

        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan Kunjungan Ranap.pdf", 'I');
        exit;

    }

    //GET ID Kunjungan Far Resep
    public function cekIdKunjunganResep($noresep, $id_kunj, $no_rm, $idfar){
        $query    = "SELECT * FROM far_obat_out 
        WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$no_rm."' AND id_far = '".$idfar."'";
        $row   = $this->db->query($query)->getRow();
        $id_kunj_far   = $row->id_kunjungan_far;
        return $id_kunj_far;
    }

    public function LaporanBillResep() {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $id_kunj   = $_POST['id_kunj'];
        $tgl_kunj  = $_POST['tgl_kunj'];
        $tgl_resp  = $_POST['tgl_resp'];
        $no_rm     = $_POST['no_rm'];
        $idunit    = $_POST['idunit'];
        $noresep   = $_POST['noresep'];

        $getJenisUnit   = " SELECT 
        jenis_unit
        FROM unit WHERE id_unit = '".$idunit."'";

        $rowx        = $this->db->query($getJenisUnit)->getRow();
        $jenis_unit = $rowx->jenis_unit;

        if ($jenis_unit == 0){
            $output['status']   = "gagal";
            $output['pesan']    = "Cek Unit Pasien dari Gawat Darurat, Rawat Jalan atau Rawat Inap";
            $this->hasil($output);
            return;
        }else{
            if ($jenis_unit == '1'){
                $idfar = '4001';
            }else if ($jenis_unit == '2'){
                $idfar = '4002';
            }else if ($jenis_unit == '3'){        
                $idfar = '4003';
            }else if ($jenis_unit == '4'){        
                $idfar = $idunit;
            }
        }

        $id_kunj_far = $this->cekIdKunjunganResep($noresep, $id_kunj, $no_rm, $idfar);

        $query  = " SELECT
        no_rm, pasien.nama, tgl_masuk,
        id_kunjungan,
        noresep, tglresep,
        far_obat_out.id_unit,
        nama_unit,
        tgl_lahir,
        id_kunjungan_far,
        nama_pegawai,
        users.nama AS nm_user,
        nama_penjamin,
        gatot, hpp, ppn,
        kunjungan.id_unit
        FROM
        far_obat_out
        LEFT JOIN kunjungan USING ( id_kunjungan )
        INNER JOIN transaksi USING ( id_transaksi )
        INNER JOIN pasien USING ( no_rm )
        INNER JOIN unit ON kunjungan.id_unit = unit.id_unit 
                        --INNER JOIN pegawai ON pegawai.id_pegawai = kunjungan.id_pegawai
                        INNER JOIN pegawai ON pegawai.id_pegawai = far_obat_out.id_pegawai
                        INNER JOIN users ON users.id_user = far_obat_out.id_user
                        INNER JOIN penjamin ON penjamin.id_penjamin = far_obat_out.penjamin
                        WHERE
                        LEFT ( kunjungan.id_unit, 1 ) = '$jenis_unit' and
                        far_obat_out.id_kunjungan_far = '$id_kunj_far'";

                        $row        = $this->db->query($query)->getRow();
                        if ($this->db->query($query)->getNumRows() == 0){
                            $output['status']   = "gagal";
                            $output['pesan']    = "Resep Belum Disimpan..";
                            $this->hasil($output);
                            return;
                        }
                        
                        if (strlen($row->nama) > 26) {
                            $nmapasien = substr($row->nama, 0, 26)."...";
                        }else{
                            $nmapasien = $row->nama;
                        }
                        $html = "<html>
                        <body>
                        <div>
                        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                        <tr>
                        <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
                        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                        RUMAH SAKIT UMUM DARMAYU 
                        </td>
                        </tr>
                        <tr>
                        <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                        </tr>
                        <tr>
                        <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                        </tr>
                        </table>
                        <hr>
                        <table align='center' cellspacing='3' cellpadding='3' style='border:1px solid black;' width='100%'>";
                        $html .= "
                        <tr>
                        <td width='100'>No Resep</td>
                        <td width='10'>:</td>
                        <td width='268'>$noresep</td>
                        <td width='110'>Nama</td>
                        <td width='10'>:</td>
                        <td>$nmapasien</td>
                        </tr>
                        <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>$tgl_resp</td>
                        <td>Nomor RM</td>
                        <td>:</td>
                        <td>$row->no_rm</td>
                        </tr>
                        <tr>
                        <td>Dokter</td>
                        <td>:</td>
                        <td>$row->nama_pegawai</td>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td>".umur($row->tgl_lahir)."</td>
                        </tr>
                        <tr>
                        <td>User</td>
                        <td>:</td>
                        <td>$row->nm_user</td>
                        <td>Penjamin</td>
                        <td>:</td>
                        <td>$row->nama_penjamin</td>
                        </tr>";
                        $html .= "</table>";
                        $qbatJadi  = "  SELECT
                                *
                        FROM
                        far_obat_out
                        INNER JOIN far_obat_outdet USING(noresep, tglresep, id_far)
                        INNER JOIN far_obat USING (kd_obat)
                        INNER JOIN mapping_signa USING (id_signa)
                        INNER JOIN pegawai USING (id_pegawai)
                        WHERE
                        noresep = '$noresep' and tglresep = '$tgl_resp' and id_far = '$idfar' and id_kunjungan = '$id_kunj' and jns_racikan = '0' ORDER BY urut ASC
                        ";

                        $totalhargaObatJadi = 0;
                        if ($this->db->query($qbatJadi)->getNumRows() > 0){

                            $html .= "<p style='text-align:center; font-weight: bold';>-- Obat Non Racik --</p>
                            <table border='1' cellpadding='2' cellspacing='0' width='100%'>
                            <tr>
                            <td width='30'><b>No</b></td>
                            <td ><b>Nama Obat</b></td>
                            <td width='200'><b>Signa</b></td>
                            <td width='70'><b>Jumlah</b></td>
                            <td width='100'><b>Harga</b></td>
                            <td width='100'><b>Total</b></td>
                            </tr>";
                            $no = 1;
                            foreach ($this->db->query($qbatJadi)->getResult() as $row) {
                                $totalharga = $row->jumlah * $row->harga_jual;
                                $totalhargaObatJadi += $totalharga;
                                $html .= "<tr>
                                <td>$no.</td>
                                <td>$row->nama_obat</td>
                                <td style='text-align: center;'>".strtoupper($row->signa)."</td>
                                <td style='text-align: center;'>$row->jumlah</td>
                                <td style='text-align: right;'>$row->harga_jual</td>
                                <td style='text-align: right;'>$totalharga</td>
                                </tr>";
                                    // if ($row->signa > ''){
                                    //     $html .= "<tr>
                                    //                 <td colspan='5'><b>Signa : </b>".strtoupper($row->signa)."</td>
                                    //              </tr>";
                                    // }
                                if ($row->ket > ''){
                                    $html .= "<tr>
                                    <td colspan='6'><b>Ket : </b>".strtoupper($row->ket)."</td>
                                    </tr>";
                                }
                                $no++;
                            };
                            $html .= "<tr>
                            <td colspan='6' style='text-align: right;'><b>Total : Rp. ".format_ribuan($totalhargaObatJadi)."</b></td>
                            </tr>";
                            
                            $html .= "</table>";
                        }

                        $qbatJnsRacik  = "  SELECT
                        jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                        FROM
                        far_obat_outdet food 
                        INNER JOIN mapping_signa ms ON ms.id_signa = food.id_signa
                        WHERE
                        noresep = '".$noresep."' 
                        AND id_far = '".$idfar."' 
                        AND tglresep = '".$tgl_resp."'  
                        AND jns_racikan != '0' 
                        GROUP BY
                        noresep, tglresep, jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                        ORDER BY jns_racikan ASC
                        ";

                        $totalhargaObatRacik = 0;
                        if ($this->db->query($qbatJnsRacik)->getNumRows() > 0){
                            $html .= "<p style='text-align:center; font-weight: bold';>-- Obat Racik --</p>";
                            $html .= "<table border='1' cellpadding='2' cellspacing='0' width='100%'>
                            <tr>
                            <td width='10'><b>No</b></td>
                            <td><b>Nama Obat</b></td>
                            <td width='50'><b>Permintaan</b></td>
                            <td width='70'><b>Jumlah</b></td>
                            <td width='100'><b>Harga</b></td>
                            <td width='100'><b>Total</b></td>
                            </tr>";
                            foreach ($this->db->query($qbatJnsRacik)->getResult() as $rowqbatJnsRacik) {
                                $qbatRacik  = " 
                                SELECT
                                        *
                                FROM
                                far_obat_out
                                INNER JOIN far_obat_outdet USING(noresep, tglresep, id_far)
                                INNER JOIN far_obat USING (kd_obat)
                                INNER JOIN mapping_signa USING (id_signa)
                                INNER JOIN pegawai USING (id_pegawai)
                                WHERE
                                noresep = '$noresep' and tglresep = '$tgl_resp' and id_far = '$idfar' and id_kunjungan = '$id_kunj' and jns_racikan = '$rowqbatJnsRacik->jns_racikan' ORDER BY urut ASC ";
                                
                                $no = 1;
                                $html .= "<tr><td colspan='6' style='text-align: center;'>$rowqbatJnsRacik->jns_racikan</td></tr>";
                                foreach ($this->db->query($qbatRacik)->getResult() as $row) {
                                    $totalhargaRacik = $row->jumlah * $row->harga_jual;
                                    $totalhargaObatRacik += $totalhargaRacik;
                                    $html .= "<tr>
                                    <td>$no.</td>
                                    <td>$row->nama_obat</td>
                                    <td style='text-align: center;'>$row->dosis</td>
                                    <td style='text-align: center;'>$row->jumlah</td>
                                    <td style='text-align: right;'>$row->harga_jual</td>
                                    <td style='text-align: right;'>$totalhargaRacik</td>
                                    </tr>";
                                    if ($row->ket > ''){
                                        $html .= "<tr>
                                        <td colspan='6'><b>Keterangan : </b>".strtoupper($row->ket)."</td>
                                        </tr>";
                                    }
                                    $no++;
                                };
                                // $html .= "<tr><td colspan='5' style='text-align: left;'><b>Signa : </b>".strtoupper($rowqbatJnsRacik->signa)."</td></tr>";
                                // $html .= "<tr><td colspan='5' style='text-align: left;'><b>Catatan : </b>$rowqbatJnsRacik->ket_racik</td></tr>";
                                if ($rowqbatJnsRacik->signa > ''){
                                    $html .= "<tr>
                                    <td colspan='6'><b>Signa : </b>".strtoupper($rowqbatJnsRacik->signa)."</td>
                                    </tr>";
                                }
                                if ($rowqbatJnsRacik->ket_racik > ''){
                                    $html .= "<tr>
                                    <td colspan='6'><b>Catatan : </b>".strtoupper($rowqbatJnsRacik->ket_racik)."</td>
                                    </tr>";
                                }
                            }
                            $html .= "<tr>
                            <td colspan='6' style='text-align: right;'><b>Total : Rp. ".format_ribuan($totalhargaObatRacik)."</b></td>
                            </tr>";
                            $html .= "</table>";
                        }


                //$grandtotalALL = $totalhargaObatJadi + $totalhargaObatRacik; // CARA MANUAL
                $subtotalALL    = $row->gatot;  // AMBIL DATABASE
                $ppntotalALL    = $row->ppn;    // AMBIL DATABASE

                // if ($row->id_unit == '4001'){
                //     $ppntotalALL    = ($grandtotalALL * 11) / 100; // CARA MANUAL
                // }else{
                //     $ppntotalALL    = 0;
                // }

                $grandtotalALL  = $subtotalALL + $ppntotalALL; // AMBIL DATABASE

                $html .= "<table border='1' cellpadding='2' cellspacing='0' width='100%'>
                <tr>
                <td style='text-align: right;' ><b>SubTotal</b></td>
                <td width='10'><b>:</b></td>
                <td width='150' style='text-align: right;'><b>Rp. ".format_ribuan($subtotalALL)."</b></td>
                </tr>
                <tr>
                <td style='text-align: right;' ><b>PPN</b></td>
                <td width='10'><b>:</b></td>
                <td width='150' style='text-align: right;'><b>Rp. ".format_ribuan($ppntotalALL)."</b></td>
                </tr>
                <tr>
                <td style='text-align: right;'><b>Grand Total</b></td>
                <td><b>:</b></td>
                <td style='text-align: right;'><b>Rp. ".format_ribuan($grandtotalALL)."</b></td>
                </tr>
                </table>";
                $html .= "</div>
                </body>
                </html>";
                
                $mpdf   = new \Mpdf\Mpdf(
                    [
                        'mode'      => 'utf-8',
                        'format'    => 'A4'
                    ]);

                $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                $mpdf->WriteHTML($html);
        // $mpdf->SetWatermarkText('Please Waitt, On Progress..!');
        // $mpdf->showWatermarkText = true;
                $mpdf->Output("Laporan Bill Resep.pdf", 'I');
                exit;

            }
            
            public function pegawai()
            {
                $peg =  $this->db->query("SELECT * FROM pegawai order by nama_pegawai asc ");
                $output['status'] = 'sukses';
                $output['data'] = $peg->getResult();

                echo json_encode($output);

            }
            public function LaporanSuratSehat()
            {
                date_default_timezone_set('Asia/Jakarta');
                $input = json_decode(file_get_contents('php://input'));
                $norm    = $_POST['norm'];
                $umur    = $_POST['umur'];
                $transaksi= $_POST['id_transaksi'];

                $tandavital = $this->db->query("SELECT * from tanda_vital  where no_rm='0000460' and aktif='t' limit 1")->getRow();

                $pasien =$this->db->query("SELECT * FROM pasien p 
                    left join agama using (kd_agama)
                    left join pekerjaan using (kd_pekerjaan)
                    left join pendidikan using (kd_pendidikan)
                    left join kelurahan using(kd_kelurahan)
                    left join kecamatan using(kd_kecamatan)
                    left join kabupaten using(kd_kabupaten)
                    left join propinsi using(kd_propinsi) where p.no_rm='" . $norm . "'")->getRow();

                if ($pasien->jenis_kelamin=='f') {
                    $kelamin='Laki-laki';
                } else {
                    $kelamin='Perempuan';
                }
                $suratsehat=$this->db->query("select * from surat_sehat inner join users using(id_user) where id_transaksi='".$transaksi."' ")->getRow();


                $html = "<html>
                <body>
                <div>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                <tr>
                <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
                <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM DARMAYU 
                </td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                </tr>
                </table>
                <hr>
                <p style='text-align:center; font-weight: bold;font-size:16px;'>SURAT KETERANGAN SEHAT</p><br>
                <p style='text-align:center';>No: 00$suratsehat->nomor/RS.DmyM/SKS/B-IGD/III/2024</p><br>
                <p>Yang Bertanda tangan dibawah ini, Menerangakan bahwa :</p>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama</td><td style='width:5px;'>:</td><td>$pasien->nama</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Jenis Kelamin</td><td  style='width:5px;'>:</td><td>$kelamin</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Umur</td><td style='width:5px;'>:</td><td>$umur</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Pekerjaan</td><td style='width:5px;'>:</td><td>$pasien->pekerjaan</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Alamat</td><td style='width:5px;'>:</td><td>$pasien->alamat $pasien->kelurahan $pasien->kabupaten $pasien->propinsi</td>

                </tr>
                </table>
                <p>Hasil Pemeriksaan</p>    

                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >";

                if (!empty($tandavital)) {
                    $html .= "<tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Tekanan Darah </td>
                    <td>:</td>
                    <td>$tandavital->tekanan_darah1'/'$tandavital->tekanan_darah2</td>
                    <td>mmHg</td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Berat Badan </td>
                    <td>:</td>
                    <td>$tandavital->bb</td>
                    <td>Kg</td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Tinggi Badan </td>
                    <td>:</td>
                    <td>$tandavital->tinggi_badan</td>
                    <td>cm</td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Gol Darah </td>
                    <td>:</td>
                    <td>$tandavital->tinggi_badan</td>
                    <td></td>
                    </tr>
                    <tr>
                    <tdstyle='width:200px;text-align:left;padding-left: 30px;'>Buta Warna </td>
                    <td>:</td>
                    <td>$tandavital->tinggi_badan</td>
                    <td></td>
                    </tr>";
                } else{
                    $html .= "<tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Tekanan Darah </td>
                    <td style='width:5px;'>:</td>
                    <td>$suratsehat->tekanan_darah</td>
                    <td>mmHg</td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Berat Badan </td>
                    <td style='width:5px;' >:</td>
                    <td>$suratsehat->berat_b</td>
                    <td>Kg</td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Tinggi Badan </td>
                    <td style='width:5px;'>:</td>
                    <td>$suratsehat->t_badan</td>
                    <td>cm</td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Gol Darah </td>
                    <td style='width:5px;'>:</td>
                    <td>$suratsehat->gol_darah</td>
                    <td></td>
                    </tr>
                    <tr>
                    <td style='width:200px;text-align:left;padding-left: 30px;'>Buta Warna </td>
                    <td style='width:5px;'>:</td>
                    <td>$suratsehat->buta_warna</td>
                    <td></td>
                    </tr>";

                }



                $html .= "      </table>
                <p>Berdasarkan hasil Pemeriksaan yang telah dilakukan, pasien tersebut dalam keadaan SEHAT. Surat Keterangan Sehat ini digunakan Untuk $suratsehat->keperluan</p>
                <p>Demikian surat ini dibuat dengan sejujurnya untuk digunakan sebagaimana mestinya.</p>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%'>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>Dokter</h4>
                </td>
                </tr>
                <tr>
                <td><br><br><br><br></td>
                <td><br><br><br><br></td>
                </tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>$suratsehat->nama</h4>
                </td>
                </tr>
                </table>
                </div>
                </body>
                </html>";


                $mpdf   = new \Mpdf\Mpdf(
                    [
                        'mode'      => 'utf-8',
                        'format'    => 'A4'
                    ]
                );

                $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                $mpdf->WriteHTML($html);
                $mpdf->Output("Surat sehat.pdf", 'I');
                exit;
            }
            public function LaporanSuratKelahiran()
            {
                date_default_timezone_set('Asia/Jakarta');
                $input = json_decode(file_get_contents('php://input'));

                $norm  = $_POST['norm'];


                $pasien =$this->db->query("SELECT * FROM pasien p 
                    left join agama using (kd_agama)
                    left join pekerjaan using (kd_pekerjaan)
                    left join pendidikan using (kd_pendidikan)
                    left join kelurahan using(kd_kelurahan)
                    left join kecamatan using(kd_kecamatan)
                    left join kabupaten using(kd_kabupaten)
                    left join propinsi using(kd_propinsi) where p.no_rm='" . $norm . "'")->getRow();
                $tandavital = $this->db->query("SELECT * from tanda_vital  where no_rm='" . $norm . "' and aktif='t' limit 1")->getRow();
                $suratkelahiran=$this->db->query("SELECT * from surat_kelahiran  where no_rm='" . $norm . "' ")->getRow();
                $ibupasien =$this->db->query("SELECT * FROM pasien p 
                    left join agama using (kd_agama)
                    left join pekerjaan using (kd_pekerjaan)
                    left join pendidikan using (kd_pendidikan)
                    left join kelurahan using(kd_kelurahan)
                    left join kecamatan using(kd_kecamatan)
                    left join kabupaten using(kd_kabupaten)
                    left join propinsi using(kd_propinsi) where p.no_rm='" . $suratkelahiran->rmibu . "'")->getRow();
                $dokterobg=$this->db->query("select nama_pegawai from pegawai where id_pegawai='".$suratkelahiran->dr_obg."' ")->getRow()->nama_pegawai;
                switch ($suratkelahiran->agamaayah) {
                    case 0:
                    $agamaayah='Islam';
                    break;

                    case 1:
                    $agamaayah='PROTESTAN';
                    break;
                    case 2:
                    $agamaayah='KATHOLIK';
                    break;
                    case 3:
                    $agamaayah='BUDHA';
                    break;
                    case 4:
                    $agamaayah='KONG HU CU';
                    break;
                    case 5:
                    $agamaayah='HINDU';
                    break;
                    case 6:
                    $agamaayah='KEPERCAYAAN';
                    break;
                }
                if ($suratkelahiran->keadaanbayi=='1') {
                    $keadaanbayi='Hidup';
                } else {
                    $keadaanbayi='Mati';
                }
                if ($suratkelahiran->jeniskelahiranbayi=='1') {
                    $jeniskelahiranbayi='Spontan';
                } else {
                    $jeniskelahiranbayi='Sectio Caesarea';
                }
                if ($suratkelahiran->ditolongoleh=='1') {
                    $ditolongoleh='Dokter';
                } else {
                    $ditolongoleh='Bidan';
                }
                if ($pasien->jenis_kelamin=='f') {
                    $kelamin='Laki-laki';
                } else {
                    $kelamin='Perempuan';
                }

                $tandavital = $this->db->query("SELECT * from tanda_vital  where no_rm='0000460' and aktif='t' limit 1")->getRow();


                $html = "<html>
                <body>
                <div>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                <tr>
                <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
                <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM DARMAYU 
                </td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                </tr>
                </table>
                <hr>
                <p style='text-align:center; font-weight: bold';>SURAT KETERANGAN KELAHIRAN</p>
                <p style='text-align:center';>No: 00$suratkelahiran->nomor/RS.DmyM/SKL/B-RM/".date('m')."/".date('Y')."</p><br>
                <p>Yang Bertanda tangan dibawah ini, Menerangakan bahwa :</p>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama</td><td style='width:5px;'>:</td><td>$ibupasien->nama</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>NIK</td><td style='width:5px;'>:</td><td>$ibupasien->nik</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tanggal Lahir</td><td style='width:5px;'>:</td><td>$ibupasien->tgl_lahir</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Agama</td><td style='width:5px;'>:</td><td>$ibupasien->agama</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama Ayah</td><td style='width:5px;'>:</td><td>$suratkelahiran->namaayah</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>NIK Ayah</td><td style='width:5px;'>:</td><td>$suratkelahiran->nikayah</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tanggal Lahir</td><td style='width:5px;'>:</td><td>$suratkelahiran->tgllahirayah</td></tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Agama</td><td style='width:5px;'>:</td><td>$agamaayah</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Alamat</td><td style='width:5px;'>:</td><td>$pasien->alamat $pasien->kelurahan $pasien->kabupaten $pasien->propinsi</td>

                </tr>

                </table>
                <p>Telah melahirkan Bayi:</p>

                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >";


                $html .= "
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama</td><td style='width:5px;'>:</td><td>$pasien->nama</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Jenis Kelamin</td><td  style='width:5px;'>:</td><td>$kelamin</td></tr>

                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Keadaan Bayi</td><td style='width:5px;'>:</td><td>$pasien->keterangan</td>

                </tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Anak yang dilahirkan</td><td style='width:5px;'>:</td><td>$suratkelahiran->jumlahdilahirkan</td>

                </tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Anak Ke</td><td style='width:5px;'>:</td><td>$suratkelahiran->urutanak</td>

                </tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Jenis Kelahiran</td><td style='width:5px;'>:</td><td>$jeniskelahiranbayi</td>

                </tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Kelahiran tsb. Ditolong oleh</td><td style='width:5px;'>:</td><td></td>

                </tr>
                <tr>

                <td style='width:200px;text-align:left;padding-left: 30px;'>Berat Badan </td>
                <td>:</td>
                <td>$suratkelahiran->berat</td>
                <td>Kg</td>
                </tr>
                <tr>
                <td style='width:200px;text-align:left;padding-left: 30px;'>Tinggi Badan </td>
                <td>:</td>
                <td>$suratkelahiran->panjang</td>
                <td>cm</td>
                </tr>
                <tr>
                <td style='width:200px;text-align:left;padding-left: 30px;'>Gol Darah </td>
                <td>:</td>
                <td></td>
                <td></td>
                </tr>

                </tr>";


                $html .= "      </table>
                <p>Demikian surat ini dibuat dengan sejujurnya untuk digunakan sebagaimana mestinya.</p>
                </div>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%'>
                <tr><td><br><br></td><td><br><br></td></tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>Madiun,".substr($suratkelahiran->tgl_input,0,16)."</h4>
                </td>
                </tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>Dokter</h4>
                </td>
                </tr>
                <tr>
                <td style='width:120px;text-align:center;'> </td>
                <td style='width:100px;text-align:center;'><img src='".$suratkelahiran->ttd."' style='width:200px;height:200px;'  ></td>
                </tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>$dokterobg</h4>
                </td>
                </tr>
                </table>
                </body>
                </html>";

                $mpdf   = new \Mpdf\Mpdf(
                    [
                        'mode'      => 'utf-8',
                        'format'    => 'A4'
                    ]
                );

                $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                $mpdf->WriteHTML($html);
                $mpdf->Output("Surat Kelahiran.pdf", 'I');
                exit;
            }
            public function LaporanKematian()
            {
                date_default_timezone_set('Asia/Jakarta');
                $input = json_decode(file_get_contents('php://input'));
                $bulan=date('m');
                $tahun=date('Y');
                $waktu=date('d-m-Y');
                $jam  =date('h:m');
                $norm  = $_POST['norm'];
                $umur  = $_POST['umur'];
                $sebabpxmd = $_POST['sebab'];
                $tglpxmd   = $_POST['time'];
                $user   = $_POST['user']; 
                $pasien =$this->db->query("SELECT * FROM pasien p 
                    left join agama using (kd_agama)
                    left join pekerjaan using (kd_pekerjaan)
                    left join pendidikan using (kd_pendidikan)
                    left join kelurahan using(kd_kelurahan)
                    left join kecamatan using(kd_kecamatan)
                    left join kabupaten using(kd_kabupaten)
                    left join propinsi using(kd_propinsi) where p.no_rm='" . $norm . "'")->getRow();
                $datakematian=$this->db->query("SELECT TO_CHAR(waktu_kematian, 'dd-mm-yyyy hh:mm:ss') as waktu,id_surat_kematian as id, nomor,riwayat_penyakit from surat_kematian where no_rm='".$norm."' limit 1")->getRow();
                $tandavital = $this->db->query("SELECT * from tanda_vital  where no_rm='" . $norm . "' and aktif='t' limit 1")->getRow();
                if ($pasien->jenis_kelamin=='f') {
                    $kelamin='Laki-laki';
                } else {
                    $kelamin='Perempuan';
                }

                $html = "<html>
                <body>
                <div>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                <tr>
                <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='100px' width='100px'></td>
                <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM DARMAYU 
                </td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                </tr>
                </table>
                <hr>
                <p style='text-align:center; font-weight: bold';>SURAT KETERANGAN KEMATIAN</p>
                <p style='text-align:center';>No:00$datakematian->nomor/RS.DmyM/SKK/B-MKM/$bulan/$tahun</p><br><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang Bertanda tangan dibawah ini, Menerangakan bahwa :</p>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Nama</td><td style='width:5px;'>:</td><td>$pasien->nama</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Jenis Kelamin</td><td  style='width:5px;'>:</td><td>$kelamin</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Umur</td><td style='width:5px;'>:</td><td>$umur</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Pekerjaan</td><td style='width:5px;'>:</td><td>$pasien->pekerjaan</td></tr>
                <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Alamat</td><td style='width:5px;'>:</td><td>$pasien->alamat $pasien->kelurahan $pasien->kabupaten $pasien->propinsi</td>

                </tr>
                </table><br>

                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >";

                $html .= "
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Riwayat Penyakit </td>
                <td style='width:5px;'>:</td>
                <td >$datakematian->riwayat_penyakit</td>
                <td></td>
                </tr><tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 40px;'>Sebab Meninggal </td>
                <td style='width:5px;'>:</td>
                <td >$sebabpxmd</td>
                <td></td>
                </tr>
                <tr>
                <td style='width:200px;text-align:left;padding-left: 40px;'>Tanggal Meninggal </td>
                <td>:</td>
                <td>$datakematian->waktu WIB</td>
                <td></td>
                </tr>
                <tr>
                <td style='width:200px;text-align:left;padding-left: 40px;'>Umur Saat Meninggal </td>
                <td>:</td>
                <td>$umur</td>
                <td></td>
                </tr>";

                $html .= "      </table>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini dibuat dengan sejujurnya untuk digunakan sebagaimana mestinya.</p>
                </div>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%'>
                <tr><td><br><br><br><br></td><td><br><br><br><br></td></tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                
                </td>
                <td style='width:100px;text-align:center;'>
                Madiun, $waktu Jam $jam
                </td>
                </tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>Dokter Yang Menerangkan</h4>
                </td>
                </tr>
                <tr>
                <td><br><br><br><br></td>
                <td><br><br><br><br></td>
                </tr>
                <tr>
                <td style='width:120px;text-align:center;'>
                </td>
                <td style='width:100px;text-align:center;'>
                <h4>$user</h4>
                </td>
                </tr>
                </table>
                </body>
                </html>";

                $mpdf   = new \Mpdf\Mpdf(
                    [
                        'mode'      => 'utf-8',
                        'format'    => 'A4'
                    ]
                );

                $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                $mpdf->WriteHTML($html);
                $mpdf->Output("Surat Kematian.pdf", 'I');
                exit;
            }
            public function Resume()
            {
                date_default_timezone_set('Asia/Jakarta');
                $id_kunjungan   = $_POST['id_kunjungan'];
                $nama           = $_POST['nama'];
                $rm             = $_POST['rm'];
                $id_unit        = $_POST['id_unit'];

                $cek =$this->db->query("SELECT * FROM resume_pasien r 
                    inner join pegawai p on p.id_pegawai=r.dpjp 

                    WHERE r.id_kunjungan='".$id_kunjungan."' and aktif is true ORDER  BY r.jam desc limit 1");


                if ($cek->getNumRows()>0) {
                 $pasien=$this->db->query("SELECT * FROM resume_pasien r 
                    inner join pegawai p on p.id_pegawai=r.dpjp 
                    inner join transaksi t on t.id_transaksi = r.id_transaksi
                    inner join pasien ps on ps.no_rm = t.no_rm
                    WHERE r.id_kunjungan='".$id_kunjungan."' and aktif is true ORDER  BY r.jam desc limit 1")->getRow();

                 switch ($pasien->instruksi_lanjutan) {
                    case '1':
                    $instruksi_lanjutan='Dirawat';
                    break;
                    case '2':
                    $instruksi_lanjutan='Dirujuk';
                    break;
                    case '3':
                    $instruksi_lanjutan='Pulang';
                    break;
                    case '4':
                    $instruksi_lanjutan='Meninggal';
                    break;
                    case '5':
                    $instruksi_lanjutan='Death Arrival';
                    break;

                }
                switch ($pasien->cara_masuk) {
                    case '1':
                    $cara_masuk='Datang Sendiri';
                    break;
                    case '2':
                    $cara_masuk='Rujukan';
                    break;
                    case '3':
                    $cara_masuk='Poliklinik';
                    break;
                    case '4':
                    $cara_masuk='IGD';
                    break;
                    case '5':
                    $cara_masuk='Dokter';
                    break;
                }
                switch ($pasien->cara_keluar) {
                    case '1':
                    $cara_keluar='PULANG';
                    break;
                    case '2':
                    $cara_keluar='DIRUJUK ATAS';
                    break;
                    case '3':
                    $cara_keluar='MRS';
                    break;
                    case '4':
                    $cara_keluar='RUJUKAN LAIN';
                    break;
                    case '5':
                    $cara_keluar='RUJUKAN BAWAH';
                    break;
                    case '6':
                    $cara_keluar='KONSULTASI POLI';
                    break;
                    case '7':
                    $cara_keluar='EPISODE LANJUTAN';
                    break;
                    case '8':
                    $cara_keluar='KEMBALI KE UNIT ASAL';
                    break;
                    case '9':
                    $cara_keluar='MENINGGAL < 48 Jam';
                    break;
                    case '10':
                    $cara_keluar='MENINGGAL >= 48 Jam';
                    break;
                    case '11':
                    $cara_keluar='APS';
                    break;
                }
                switch ($pasien->keadaan_umum) {
                    case '1':
                    $keadaan_umum='SEMBUH';
                    break;
                    case '2':
                    $keadaan_umum='MEMBAIK';
                    break;
                    case '3':
                    $keadaan_umum='BELUM SEMBUH';
                    break;
                    case '4':
                    $keadaan_umum='MENINGGAL';
                    break;

                }
                if ($pasien->ttdpasien==''||$pasien->ttdpasien== null  ) {
                    $ttdpasien="<br><br><br><br><br><br><br><br><br><br><br>";
                } else {
                    $ttdpasien="<img src='".$pasien->ttdpasien.";' style='width:200px;height:200px;'  >";
                }

                if ($pasien->ttd =='' || $pasien->ttd == null) {
                    $ttd="<br><br><br><br><br><br><br><br><br><br><br>";
                } else {
                    $ttd="<img src='".$pasien->ttd.";' style='width:200px;height:200px;' >";
                }
                

                $html = "<html>
                <body>
                <div>
                <table border='0' style='font-family: Arial, Helvetica, sans-serif;margin-right:20px;margin-left:20px;'>
                <tr>
                <td rowspan='5' style='align:center;'><img src='_assets/dist/img/darmayu.jpg' height='140px' width='140px'></td>
                <td style='width: 700px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM DARMAYU 
                </td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 15px;letter-spacing: 1px;letter-spacing:2px'>MADIUN</td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 14px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                </tr>
                <tr>
                <td style='width: 650px;text-align: center;font-size: 16px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                </tr>
                </table>
                <hr>
                <p style='text-align:center; font-weight: bold';>RESUME MEDIS</p><br><br>


                <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%;margin-right:20px;margin-left:20px;text-align:justify;' >
                <tr>
                <td colspan='4'>
                <p>Yang Bertanda tangan dibawah ini, Menerangakan bahwa :</p>
                </td>
                </tr>
                <tr>
                <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nomor Rekam Medis</td>
                <td colspan='3' >$rm</td>
                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama Pasien</td>
                <td colspan='3'>$nama</td>
                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tanggal Masuk</td>
                <td colspan='3'>$pasien->tgl_masuk</td>
                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tanggal Keluar</td>
                <td colspan='3'>$pasien->tgl_keluar</td>
                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>DPJP</td>
                <td colspan='3'>$pasien->nama_pegawai</td>
                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Cara Masuk</td>
                <td colspan='3'>$cara_masuk</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Berat Lahir</td>
                <td colspan='3'>$pasien->berat_lahir</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Riwayat Kesehatan</td>
                <td colspan='3'>$pasien->riwayat_kesehatan</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Pemeriksaan Fisik</td>
                <td colspan='3'>$pasien->pemeriksaan_fisik</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Diagnostik</td>
                <td colspan='3'>$pasien->pemeriksaan_diagnostik</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Terapi</td>
                <td colspan='3'>$pasien->terapi</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tindakan</td>
                <td colspan='3'>$pasien->tindakan</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Instruksi</td>
                <td colspan='3'>$pasien->instruksi</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Diagnosa</td>
                <td colspan='3'>$pasien->diagnosis</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Perkembangan Perawatan</td>
                <td colspan='3'>$pasien->perkembangan_perawatan</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Cara Keluar</td>
                <td colspan='3'>$cara_keluar</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Keadaan Umum</td>
                <td colspan='3'>$keadaan_umum</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Kesadaran</td>
                <td colspan='3'>$pasien->kesadaran</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>MObilitas Pulang</td>
                <td colspan='3'>$pasien->mobilitasi_plg</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tanda Vital</td>
                <td colspan='3'>tensi= $pasien->tensi | nadi= $pasien->nadi | suhu= $pasien->suhu | respirasi= $pasien->respirasi</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Alamat</td>
                <td colspan='3' >$pasien->alamat</td>

                </tr>
                <tr>
                <td style='width:10px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Instruksi Lanjutan</td>
                <td colspan='3' >$instruksi_lanjutan</td>

                </tr>
                <tr>
                <td colspan='4' style='text-align:justify;'>
                Dengan ini saya menyatakan MENGERTI tentang penjelasan riwayat kesehatan dan instruksi tindak lanjut yang di jelaskan oleh
                Dokter Penanggung Jawab Pasien (DPJP)
                </td>
                </tr>

                <tr>
                <td colspan='4' style='text-align:justify;'>
                </td>
                </tr>

                <tr>
                <td colspan='4' style='text-align:center;'>
                <table>
                <tr >
                <td style='width:400px;'>
                <div class='card' >
                <h3 style='padding-top:40px;'>Madiun, ".substr($pasien->jam,0,16)." WIB</h3>
                <h4>Pasien / Wali</h4>
                <div style='text-align:center;width:200px;height:200px;'>
                ".$ttdpasien."
                </div>
                <h4>$nama</h4>
                </div>
                </td>
                <td style='width:400px;'>
                <div class='card'>
                <h3>Madiun, ".substr($pasien->jam,0,16)." WIB</h3>
                <h4>Dokter Penanggung Jawab Pelayanan</h4>
                <div  style='text-align:center;width:200px;height:200px;'>
                ".$ttd."
                </div>
                <h4>$pasien->nama_pegawai</h4>
                </div>
                </td>
                </tr>
                </table>

                </td>
                </tr>
                </table><br>
                </body>
                </html>";

            } else {
               $html='RESUME BELUM ADA!!!';
           }


           $mpdf   = new \Mpdf\Mpdf(
            [
                'mode'      => 'utf-8',
                'format'    => 'LEGAL'
            ]
        );

           $mpdf->AddPage(
                'P', // L - landscape, P - portrait
                '',
                '',
                '',
                '',
                2, // margin_left
                2, // margin right
                2, // margin top
                2, // margin bottom
                0, // margin header
                2
            ); // margin footer

           $mpdf->WriteHTML($html);
           $mpdf->Output("Resume.pdf", 'I');
           exit;
       }


       public function lapjasa()
       {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Jasa.xls");
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));
        $tglawal    = $_POST['tglawal'];
        $tglakhir    = $_POST['tglakhir'];
        $statustransaksi = $_POST['statustransaksi'];
        $id_pegawai_lap_jasa = $_POST['id_pegawai_lap_jasa'];
        $jenis = $_POST['jenis'];
            // echo"$id_pegawai_lap_jasa";
            // exit();
        if ($id_pegawai_lap_jasa == 'all') {
            $a_pegawai = "";
        } else {
            $a_pegawai = "and pegawai.id_pegawai='$id_pegawai_lap_jasa'";
        }
            // echo"ini $a_pegawai";
            // exit();
        switch ($statustransaksi) {
            case "0":
            $q_statustransaksi = "";
            break;
            case "1":
            $q_statustransaksi = "AND transaksi.tgl_tutup IS NOT NULL ";
            break;
            case "2":
            $q_statustransaksi = "AND transaksi.tgl_tutup IS NULL ";
            break;
            default:
            echo "gagal pilih ";
        }

        $queryidpegawai =  $this->db->query("SELECT
            pegawai.id_pegawai,pegawai.nama_pegawai
            FROM
            detail_component
            JOIN pegawai USING ( id_pegawai )
            JOIN jenis_component USING ( id_jenis_component )
            JOIN detail_transaksi USING ( id_detail_transaksi )
            JOIN transaksi USING ( id_transaksi )
            WHERE
            id_pegawai IS NOT NULL 
            and date(detail_transaksi.tgl_input) BETWEEN '$tglawal' and '$tglakhir'
            $q_statustransaksi
            $a_pegawai 
            and jenis_component.id_jenis_component not in ('1')
            GROUP by  pegawai.id_pegawai,pegawai.nama_pegawai
            ORDER BY id_pegawai asc");

        $html = "<html>
        <body>
        <div>";
        if($jenis=='pdf'){
            $html .="
            <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
            <tr>
            <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
            <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
            RUMAH SAKIT UMUM
            <p style='font-size:30px;color:#14B937'>DARMAYU</p>
            </td>
            </tr>
            <tr>
            <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
            </tr>
            <tr>
            <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
            </tr>
            </table>
            <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>";
        }
        $html.="<div style='text-align:center';paddibg-top:15px>Laporan Jasa " . date_indo($tglawal) . " sd " . date_indo($tglakhir) . " </div>

        <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >

        ";
        foreach ($queryidpegawai->getResult() as $row) {
            $html .= "<tr>
            <td colspan='8'><b>$row->nama_pegawai</b></td>
            </tr>";
            $html .= "<tr>
            <td>No Transaksi</td>
            <td>Penjamin Utama</td>
            <td>Unit</td>
            <td>Tgl input</td>
            <td>Jenis Komponen</td>
            <td>No Rm</td>
            <td>nama</td>
            <td>Nominal</td>
            </tr>";
            $query = $this->db->query("SELECT
                detail_transaksi.tgl_input::date as tglinput,
                detail_component.harga as jasaterima,
            * 
                FROM
                detail_component join pegawai USING(id_pegawai)
                join jenis_component USING(id_jenis_component)
                join detail_transaksi using(id_detail_transaksi)
                join transaksi using(id_transaksi)
                join produk using(id_produk)
                left join pasien using(no_rm)
                left join penjamin_transaksi on penjamin_transaksi.id_transaksi=detail_transaksi.id_transaksi and penjamin_transaksi.penjamin_utama='t'
                left join penjamin using(id_penjamin)
                left join kunjungan using(id_kunjungan)
                left join unit using(id_unit)
                WHERE
                detail_component.id_pegawai = '$row->id_pegawai'
                and detail_transaksi.tgl_input BETWEEN '$tglawal' and '$tglakhir'
                $q_statustransaksi
                and jenis_component.id_jenis_component not in ('1')
                order by detail_transaksi.tgl_input ASC
                ");

            foreach ($query->getResult() as $row_detail) {
                $html .= "<tr>
                <td>$row_detail->id_transaksi</td>
                <td>$row_detail->nama_penjamin</td>
                <td>$row_detail->nama_unit</td>
                <td>" . date_indo($row_detail->tglinput) . "</td>
                <td>".$row_detail->jenis_component." / ".$row_detail->nama_produk."</td>
                <td>$row_detail->no_rm</td>
                <td>$row_detail->nama</td>
                <td align='right'>Rp. " . format_ribuan($row_detail->jasaterima) . "</td>
                </tr>";
                
            }
            $queryjumlah = $this->db->query("SELECT
                sum(detail_component.harga) as penerimaan
                FROM
                detail_component join pegawai USING(id_pegawai)
                join jenis_component USING(id_jenis_component)
                join detail_transaksi using(id_detail_transaksi)
                join transaksi using(id_transaksi)
                WHERE
                detail_component.id_pegawai = '$row->id_pegawai'
                and detail_transaksi.tgl_input BETWEEN '$tglawal' and '$tglakhir'
                $q_statustransaksi
                and jenis_component.id_jenis_component not in ('1')
                ");
            foreach ($queryjumlah->getResult() as $row_jumlah);
            $html .= "<tr>
            <td colspan='7' align='right'>Jumlah</td>
            <td align='right'><b>Rp. " . format_ribuan($row_jumlah->penerimaan)."</b></td>
            </tr>";
        };
        $html .= "</table>
        </div>
        </body>
        </html>";
        if($jenis=='pdf'){
            $mpdf   = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4'

            ]);
            $mpdf->AddPage(
                'P', // L - landscape, P - portrait
                '',
                '',
                '',
                '',
                2, // margin_left
                2, // margin right
                2, // margin top
                2, // margin bottom
                0, // margin header
                2
            ); // margin footer

            $mpdf->WriteHTML($html);
            $mpdf->Output("cetak.pdf", 'I');
        // echo $html;
            exit;
        }
        if($jenis=='excel'){
            echo $html;
            exit;
        }

    }
    public function ceklaporan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'iduser'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT lap FROM zusers where kd_user = '$input->iduser'";
            $query = $this->db->query($query)->getRow()->lap;
                // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $query;
                // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }

    public function LaporanPenerimaanBarangMasuk()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Penerimaan Barang Masuk.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $no_gud_in      = $_POST['no_gud_in'];
        $pbf            = $_POST['pbf'];
        $tgl_gud_in     = $_POST['tgl_gud_in'];
        $no_faktur      = $_POST['no_faktur'];

        $replacetglwal  = str_replace("/", "-", $_POST['tgl_gud_in']);
        $dateawal       = date_create($replacetglwal);
        $tglawal1       = date_format($dateawal, "d-M-Y");

        $getVendor  = $this->db->query(" SELECT * FROM far_vendor WHERE kd_vendor = '" . $pbf . "'")->getRow();
        $namaPBF    = $getVendor->nama;

        $query  = $this->db->query("SELECT
            urut,
            no_obat_in,
            kd_obat,
            nama_obat,
            kd_sat_besar,
            goid.kd_milik,
            jml_in_obt,
            hrg_beli_obt,
            gud_obat_in.disc AS discfaktur,
            disc_total,
            ppn_item,
            ppn_rupiah,
            goid.disc AS disc,
            disc_rupiah,
            boxqty,
            frac,
            tag,
            tag_disc,
            hrg_satuan,
            to_char( EXP, 'dd-mm-YYYY' ) as expired,
            gin,
            batch,
            fp.kd_pabrik,
            pabrik,
            (hrg_beli_obt * jml_in_obt) as subtotal_item,
            (hrg_beli_obt * jml_in_obt) + ppn_rupiah - disc_rupiah as grandtotal_item 
            FROM
            gud_obat_in
            INNER JOIN gud_obat_in_det goid USING ( no_obat_in )
            INNER JOIN far_obat USING ( kd_obat )
            INNER JOIN far_pabrik fp ON goid.kd_pabrik = fp.kd_pabrik
            INNER JOIN far_jenis_obat USING ( kd_jns_obt )
            INNER JOIN far_sub_jenis USING ( kd_sub_jns ) 
            WHERE
            no_obat_in = '$no_gud_in' ORDER BY urut ASC");

        $html = "<html>
        <body style='font-family: Times New Roman;'>
        <h4 style='text-align:center; font-weight: bold';>Laporan Penerimaan Barang Masuk<br>$namaPBF / $no_faktur<br>Tanggal $tglawal1</h4>
        <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
        <tr style='background-color: #abdaa8;'>
        <td><b>No.</b></td>
        <td width='180'><b>No.Penerimaan</b></td>
        <td><b>Nama Obat</b></td>
        <td width='130'><b>Qty Besar</b></td>
        <td width='100'><b>Frac</b></td>
        <td width='150'><b>Harga Beli</b></td>
        <td width='130'><b>Qty Kecil</b></td>
        <td width='110'><b>Diskon%</b></td>
        <td width='150'><b>Rp. Diskon</b></td>
        <td width='120'><b>PPn%</b></td>
        <td width='180'><b>Sub Total</b></td>
        <td width='130'><b>Exp. Date</b></td>
        <td width='130'><b>Batch</b></td>
        <td width='180'><b>Total</b></td>
        </tr>";
        if ($query->getNumRows() > 0){

            $no = 1;
            $subtotal       = 0;
            $grandtotal     = 0;
            $grandtotalItem = 0;
            $discItem       = 0;
            $ppn            = 0;
            $discFaktur     = 0;

            foreach ($query->getResult() as $row) {

                $grandtotalItem = $row->subtotal_item + $row->ppn_rupiah - $row->disc_rupiah;
                    // <td style='vertical-align: middle;'>$row->kd_sat_besar</td>
                $html .= "  <tr>
                <td style='vertical-align: middle;'>$no</td>
                <td style='vertical-align: middle;'>$row->no_obat_in</td>
                <td style='vertical-align: middle;'>".strtoupper($row->nama_obat)."</td>
                <td style='vertical-align: middle;'>$row->boxqty</td>
                <td style='vertical-align: middle;'>$row->frac</td>
                <td style='vertical-align: middle; text-align: right;'>$row->hrg_beli_obt</td>
                <td style='vertical-align: middle;'>$row->jml_in_obt</td>
                <td style='vertical-align: middle; text-align: right;'>$row->disc</td>
                <td style='vertical-align: middle; text-align: right;'>$row->disc_rupiah</td>
                <td style='vertical-align: middle; text-align: right;'>$row->ppn_item%</td>
                <td style='vertical-align: middle; text-align: right;'>$row->subtotal_item</td>
                <td style='vertical-align: middle;'>$row->expired</td>
                <td style='vertical-align: middle;'>$row->batch</td>
                <td style='vertical-align: middle; text-align: right;'>$grandtotalItem</td>
                </tr>";
                $no++;
                $discItem   += $row->disc_rupiah;
                $ppn        += $row->ppn_rupiah;
                $subtotal   += $row->subtotal_item;
                $discFaktur += $row->discfaktur;
                $grandtotal += $grandtotalItem;
            }
            $html .= "  <tr style='background-color: #abdaa8;'>
            <td colspan='8' style='vertical-align: middle; text-align: right;'><b>Total Discon Item (-)</b></td>
            <td style='vertical-align: middle; text-align: right;'><b>$discItem</b></td>
            <td colspan='1' style='vertical-align: middle; text-align: right;'><b>Sub Total</b></td>
            <td style='vertical-align: middle; text-align: right;'><b>$subtotal</b></td>
            <td colspan='2' style='vertical-align: middle; text-align: right;'><b>PPn (+)</b></td>
            <td style='vertical-align: middle; text-align: right;'><b>$ppn</b></td>
            </tr>
            <tr style='background-color: #abdaa8;'>
            <td colspan='13' style='vertical-align: middle; text-align: right;'><b>Discon Faktur</b></td>
            <td style='vertical-align: middle; text-align: right;'><b>$discFaktur</b></td>
            </tr>
            <tr style='background-color: #abdaa8;'>
            <td colspan='13' style='vertical-align: middle; text-align: right;'><b>Grand Total</b></td>
            <td style='vertical-align: middle; text-align: right;'><b>$grandtotal</b></td>
            </tr>";
        }else{
            $html .= "  <tr>
            <td colspan='14' style='vertical-align: middle; text-align: center;'><b>-- Data Tidak Ditemukan --</b></td>                            
            </tr>";
        }

        $html .= "      </table>
        </body>
        </html>";

        echo $html;
        exit;
    }

    public function LaporanPenerimaanBarangMasukAllIn()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Penerimaan Barang Masuk.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal      = $_POST['tglawal'];
        $tglakhir     = $_POST['tglakhir'];
        $username     = $_POST['username'];

        $replacetglwal1  = str_replace("/", "-", $_POST['tglawal']);
        $dateawal1       = date_create($replacetglwal1);
        $tglawal1        = date_format($dateawal1, "d-M-Y");

        $replacetglwal2  = str_replace("/", "-", $_POST['tglakhir']);
        $dateawal2       = date_create($replacetglwal2);
        $tglawal2        = date_format($dateawal2, "d-M-Y");

            // $getVendor  = $this->db->query(" SELECT * FROM far_vendor WHERE kd_vendor = '" . $pbf . "'")->getRow();
            // $namaPBF    = $getVendor->nama;

        $query  = $this->db->query("SELECT
            to_char( tgl_obat_in, 'dd-mm-YYYY' ) AS tglcreated,
            no_obat_in,
            urut,
            far_vendor.nama as nmvendor,
            remark :: text,
            kd_obat,
            nama_obat,
            boxqty,
            frac,
                                        --  kd_sat_besar,
                                        --  goid.kd_milik,
                                        jml_in_obt,
                                        hrg_beli_obt,
                                        hrg_satuan,
                                        ( hrg_beli_obt * jml_in_obt ) AS subharga_total,
                                        --  gud_obat_in.disc AS discfaktur,
                                        --  disc_total,
                                        goid.disc AS disc,
                                        disc_rupiah,
                                        ( hrg_beli_obt * jml_in_obt ) - disc_rupiah as hna,
                                        ppn_item,
                                        ppn_rupiah,
                                        ( hrg_beli_obt * jml_in_obt ) - disc_rupiah + ppn_rupiah AS grandtotal_item,
                                        to_char( EXP, 'dd-mm-YYYY' ) AS expired,
                                        gin,
                                        batch
                                        FROM
                                        gud_obat_in
                                        INNER JOIN gud_obat_in_det goid USING ( no_obat_in )
                                        INNER JOIN far_obat USING ( kd_obat )
                                        INNER JOIN far_jenis_obat USING ( kd_jns_obt )
                                        INNER JOIN far_sub_jenis USING ( kd_sub_jns )
                                        INNER JOIN far_vendor USING (kd_vendor)
                                        WHERE
                                        tgl_obat_in BETWEEN '$tglawal' AND '$tglakhir' AND posting = 't' AND stsacc = 't'
                                        ORDER BY
                                        no_obat_in, urut ASC");
            // echo $query;
            // return;
        $html = "<html>
        <body style='font-family: Times New Roman;'>
        <h4 style='text-align:center; font-weight: bold';>Laporan Penerimaan Barang Masuk<br>Tanggal $tglawal1 s/d $tglawal2</h4>
        <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
        <tr style='background-color: #abdaa8;'>
        <td><b>No.</b></td>
        <td width='180'><b>No.Penerimaan</b></td>
        <td width='120'><b>No.Faktur</b></td>
        <td width='130'><b>Tgl. Created</b></td>
        <td width='120'><b>Expired</b></td>
        <td><b>Nama Supplier</b></td>
        <td><b>Nama Obat</b></td>
        <td width='130'><b>Qty Besar</b></td>
        <td width='130'><b>Qty Kecil</b></td>
        <td width='150'><b>Harga Beli</b></td>
        <td width='130'><b>Total Harga</b></td>
        <td width='110'><b>Diskon%</b></td>
        <td width='150'><b>Rp. Diskon</b></td>
        <td width='180'><b>HNA (DPP)</b></td>
        <td width='120'><b>PPn%</b></td>
        <td width='120'><b>PPn 11%</b></td>
        <td width='180'><b>Total Neto</b></td>
        </tr>";
        if ($query->getNumRows() > 0){

            $no = 1;
            $subtotal       = 0;
            $grandtotal     = 0;
            $grandtotalItem = 0;
            $discItem       = 0;
            $ppn            = 0;
            $discFaktur     = 0;

            foreach ($query->getResult() as $row) {

                    //$grandtotalItem = $row->subtotal_item + $row->ppn_rupiah - $row->disc_rupiah;
                    // <td style='vertical-align: middle;'>$row->kd_sat_besar</td>
                $html .= "  <tr>
                <td style='vertical-align: middle;'>$no</td>
                <td style='vertical-align: middle;'>$row->no_obat_in</td>
                <td style='vertical-align: middle; text-align: right;'>$row->remark</td>
                <td style='vertical-align: middle; text-align: right;'>$row->tglcreated</td>
                <td style='vertical-align: middle; text-align: right;'>$row->expired</td>
                <td style='vertical-align: middle;'>".strtoupper($row->nmvendor)."</td>
                <td style='vertical-align: middle;'>".strtoupper($row->nama_obat)."</td>
                <td style='vertical-align: middle;'>$row->boxqty</td>
                <td style='vertical-align: middle;'>$row->jml_in_obt</td>
                <td style='vertical-align: middle; text-align: right;'>$row->hrg_beli_obt</td>
                <td style='vertical-align: middle; text-align: right;'>$row->subharga_total</td>
                <td style='vertical-align: middle; text-align: right;'>$row->disc%</td>
                <td style='vertical-align: middle; text-align: right;'>$row->disc_rupiah</td>
                <td style='vertical-align: middle; text-align: right;'>$row->hna</td>
                <td style='vertical-align: middle; text-align: right;'>$row->ppn_item%</td>
                <td style='vertical-align: middle; text-align: right;'>$row->ppn_rupiah</td>
                <td style='vertical-align: middle; text-align: right;'>$row->grandtotal_item</td>
                </tr>";
                $no++;
                    // $discItem   += $row->disc_rupiah;
                    // $ppn        += $row->ppn_rupiah;
                    // $subtotal   += $row->subtotal_item;
                    // $discFaktur += $row->discfaktur;
                    // $grandtotal += $grandtotalItem;
            }
                // $html .= "  <tr style='background-color: #abdaa8;'>
                //                 <td colspan='8' style='vertical-align: middle; text-align: right;'><b>Total Discon Item (-)</b></td>
                //                 <td style='vertical-align: middle; text-align: right;'><b>$discItem</b></td>
                //                 <td colspan='1' style='vertical-align: middle; text-align: right;'><b>Sub Total</b></td>
                //                 <td style='vertical-align: middle; text-align: right;'><b>$subtotal</b></td>
                //                 <td colspan='2' style='vertical-align: middle; text-align: right;'><b>PPn (+)</b></td>
                //                 <td style='vertical-align: middle; text-align: right;'><b>$ppn</b></td>
                //             </tr>
                //             <tr style='background-color: #abdaa8;'>
                //                 <td colspan='13' style='vertical-align: middle; text-align: right;'><b>Discon Faktur</b></td>
                //                 <td style='vertical-align: middle; text-align: right;'><b>$discFaktur</b></td>
                //             </tr>
                //             <tr style='background-color: #abdaa8;'>
                //                 <td colspan='13' style='vertical-align: middle; text-align: right;'><b>Grand Total</b></td>
                //                 <td style='vertical-align: middle; text-align: right;'><b>$grandtotal</b></td>
                //             </tr>";
        }else{
            $html .= "  <tr>
            <td colspan='17' style='vertical-align: middle; text-align: center;'><b>-- Data Tidak Ditemukan --</b></td>                            
            </tr>";
        }

        $html .= "      </table>
        </body>
        </html>";

        echo $html;
        exit;
    }
    function cetakgeneralconcent(){
        $input = json_decode(file_get_contents('php://input'));
        $norm        = $_POST['norm'];
        $id_kunjungan=$_POST['id_kunjungan'];
        $data =$this->db->query("select *,p.nama as nama_pasien  from general_consent g inner join pasien p on p.no_rm=g.no_rm
            inner join users u on u.id_user=id_pegawai
            where g.id_kunjungan='".$id_kunjungan."' and p.no_rm='".$norm."'  and g.aktif=true limit 1");
        $hasil=$data->getRow();
        if ($hasil->pilihan_privasi=='1') {
         $privasi='Mengijinkan';
     } else {
         $privasi='Tidak Mengijinkan';
     }

     if ($hasil->lepas_info_hub1=='1') {
         $lepas_info_hub1='Mengijinkan';
     } else {
         $lepas_info_hub1='Tidak Mengijinkan';
     } 
     switch ($hasil->lepas_info_hub1) {
       case '1':
       $lepas_info_hub1='Diri sendiri';
       break;
       case '2':
       $lepas_info_hub1='Suami';
       break;
       case '3':
       $lepas_info_hub1='Istri';
       break;
       case '4':
       $lepas_info_hub1='Anak';
       break;
       case '5':
       $lepas_info_hub1='Orang Tua';
       break;
       case '6':
       $lepas_info_hub1='Keluarga';
       break;
       case '7':
       $lepas_info_hub1='Pengantar';
       break;

   }  
   switch ($hasil->lepas_info_hub2) {
       case '1':
       $lepas_info_hub2='Diri sendiri';
       break;
       case '2':
       $lepas_info_hub2='Suami';
       break;
       case '3':
       $lepas_info_hub2='Istri';
       break;
       case '4':
       $lepas_info_hub2='Anak';
       break;
       case '5':
       $lepas_info_hub2='Orang Tua';
       break;
       case '6':
       $lepas_info_hub2='Keluarga';
       break;
       case '7':
       $lepas_info_hub2='Pengantar';
       break;

   }
   $mpdf   = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'A4'
]);

   $title  = "Label Pasien";

   $mpdf->SetDisplayMode('fullpage');
   $mpdf->SetTitle($title);
   $mpdf->WriteHTML("<style>
    body{
        font-family:Arial;
    }
    div.a {
        text-align: center;
        width:100%;
    }
    .lh{
        line-height:0.1;
    }
    .lh1{
        line-height:1;
    }
    table td{
        text-align:justify;
        padding-top:2px;
    }


    </style>");
   $mpdf->WriteHTML('        
    <table>
    <tr>
    <td colspan="2" style="text-align:center;">
    <H2>GENERAL CONCENT</H2>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    A. PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN
    </td>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>1.</td>
    <td>Saya menyetujui untuk perawatan di Rumah Sakit  sebagai pasien rawat inap.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    2. 
    </td>
    <td >
    Saya mengetahui bahwa pasien/saya memiliki kondisi yang membutuhkan perawatan medis, 
    pasien/saya mengizinkan dokter dan profesional tenaga kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk 
    memberikan pengobatan medis seperti yang dilakukan dalam profesional mereka. Prosedur diagnostik dan perawatan medis 
    termasuk terapi tidak terbatas pada EKG, X-RAY, tes darah, terapi fisik, pemberian obat suntik dan cairan infus.
    Persetujuan yang saya berikan tidak termasuk persetujuan untuk prosedur/ tindakan invasive (misalnya, operasi) 
    atau tindakan yang mempunyai resiko tinggi.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    3. 
    </td>
    <td>
    Saya sadar bahwa praktek kedokteran dan bedah bukan ilmu pasti dan saya mengakui tidak 
    ada jaminan atas hasil apapun terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada pasien/saya.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    4
    </td>
    <td>
    Saya mengerti dan memahami bahwa :
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    a. </td>
    <td>
    Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan 
    ( termasuk identitas setiap orang yang memberikan atau mengamati pengobatan ) setiap saat.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    b.
    </td>
    <td >
    Saya mengerti dan memahami bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk 
    setiap prosedur / tindakan invasif (misalnya operasi) atau tindakan yang mempunyai resiko tinggi
    Jika saya memutuskan untuk menghentikan perawatan medis untuk diri saya sendiri. Saya memahami dan 
    menyadari bahwa Rumah Sakit  atau dokter <br>tidak bertanggungjawab atas hasil yang merugikan saya.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    B. HASIL YANG TIDAK DIHARAPKAN
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td >
    Saya sadar bahwa praktek kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil 
    apapun terhadap perawatan, prosedur atau pemeriksaan apapun yang dilakukan kepada saya.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    C. PERSETUJUAN PELEPASAN INFORMASI
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    Saya memahami informasi yang ada didalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang 
    akan digunakan untuk perawatan medis, Rumah Sakit  akan menjamin kerahasiaannya. 
    <br>Saya memberi wewenang kepada RS untuk memberikan informasi tentang tentang diagnosis, hasil pelayanan dan pengobatan bila 
    diperlukan untuk memproses klaim asuransi / perusahaan dan atau lembaga pemerintah.Sesuai kewajiban simpan rahasia kedokteran 
    dan mengacu pada peraturan menteri kesehatan refublik indonesia no. 36/MENKES/III/2008, Saya memberi wewenang kepada Rumah Sakit  
    untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya dan kepada:
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>


    <table>
    <tr>
    <td>
    &nbsp;&nbsp;
    </td>
    <td>
    Nama 
    </td>
    <td>
    :
    </td>
    <td>
    '.$hasil->lepas_info_nama1.' 
    </td>
    </tr>
    <tr>
    <td>
    &nbsp;&nbsp;
    </td>
    <td>
    Telp 
    </td>
    <td>
    :
    </td>
    <td>
    '.$hasil->lepas_info_tlfn1.' 
    </td>
    </tr>
    <tr>
    <td>
    &nbsp;&nbsp;
    </td>
    <td>
    Hubungan dengan Pasien 
    </td>
    <td>
    :
    </td>
    <td>
    '.$lepas_info_hub1.' 
    </td>
    </tr>
    <tr>
    <td>
    &nbsp;&nbsp;
    </td>
    <td>
    Nama 
    </td>
    <td>
    :
    </td>
    <td>
    '.$hasil->lepas_info_nama2.' 
    </td>
    </tr>
    <tr>
    <td>
    &nbsp;&nbsp;
    </td>
    <td>
    Telp 
    </td>
    <td>
    :
    </td>
    <td>
    '.$hasil->lepas_info_tlfn2.' 
    </td>
    </tr>
    <tr>
    <td>
    &nbsp;&nbsp;
    </td>
    <td>
    Hubungan dengan Pasien 
    </td>
    <td>
    :
    </td>
    <td>
    '.$lepas_info_hub2.' 
    </td>
    </tr>
    </table>

    <tr>
    <td>
    </td>
    <td >
    Saya menyatakan bahwa pernyataan diatas dibuat dengan penuh kesadaran dan tanpa paksaan. 
    </td>
    </tr>


    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    D. PRIVASI
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <h3>'.$privasi.'</h3>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    1. '.$hasil->privasi1.'
    </td>
    </tr>
    <tr>
    <td colspan="2">
    2. '.$hasil->privasi2.'
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    Saya megijinkan Rumah Sakit memberikan akses bagi : keluarga dan handai taulan serta 
    orang-orang yang akan menjenguk atau menemui saya.
    <br>Sebutkan nama/profesi bila ada permintaan :
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    E. INFORMASI BIAYA
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>

    <tr>
    <td>
    </td>
    <td >
    Pihak Pembayar :
    <br>Pribadi  &nbsp;&nbsp;&nbsp; &nbsp;: Saya berkewajiban untuk membayar biaya perawatan yang telah diberikan oleh Rumah  Sakit  
    <br>Jaminan  : Saya akan tunduk pada ketentuan yang ditetapkan oleh badan penjamin/asuransi yang akan membiayai perawatan saya.
    <br>Saya memahami tentang informasi biaya pengobatan atau biaya tindakan yang dijelaskan oleh petugas Rumah Sakit.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    F. HAK DAN KEWAJIBAN PASIEN
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>

    <tr>
    <td>
    </td>
    <td >
    Saya memiliki hak untuk mengambil bagian dalam keputusan mengenai penyakit saya dan dalam hal perawatan medis dan 
    rencana pengobatan. Saya telah mendapat informasi tentang â€œHak dan kewajiban pasien di Rumah Sakit  
    melalui Leaflet dan banner yang disediakan oleh petugas. 
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td >
    Saya memiliki hak untuk mendapatkan pelayanan kerohanian sesuai agama dan kepercayaan yang saya anut.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>Saya/pasien memahami bahwa Rumah Sakit  tidak bertanggungjawab atas kehilangan barang-barang pribadi dan 
    barang berharga yang dibawa ke Rumah Sakit.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    G. PESERTA DIDIK / PELATIH
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td >
    Ikut berpartisipasi dalam asuhan pasien sebagai bagian dari pendidikan / pelatihan mereka 
    dengan pengawasan atau supervisi staf yang kompeten.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    H. INFORMASI RAWAT INAP
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    Saya tidak diperkenankan untuk membawa barang-barang berharga keruang rawat inap, jika ada anggota keluarga atau 
    teman harus diminta untuk membawa pulang uang atau perhiasan. Bila tidak ada anggota keluarga, RS sakit menyediakan 
    tempat penitipan barang milik pasien ditempat resmi yang telah disediakan RS. Saya telah menerima informasi tentang 
    peraturan yang diberlakukan oleh Rumah Sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan 
    mematuhi jam berkunjung pasien sesuai dengan aturan di rumah sakit.
    </td>
    </tr>

    <tr>
    <td>
    </td>
    <td >
    Anggota keluarga pasien/saya yang menunggu pasien (sebanyak 1 orang) bersedia untuk selalu memakai tanda pengenal 
    khusus yang diberikan oleh Rumah Sakit , dan demi keamanan  seluruh pasien setiap keluarga dan siapapun yang 
    akan megunjungi pasien/saya diluar jam berkunjung bersedia untuk diminta/diperiksa identitasnya dan memakai identitias 
    yang diberikan oleh Rumah Sakit.
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>
    <tr>
    <td colspan="2">
    <BR>
    </td>
    </tr>

    </table>

    <table>
    <tr>
    <td style="text-align:center;">
    <div class="card">
    <h4>Penjelas</h4>
    <div style="width:500px;height:210px;text-align:center;">
    <img src="'.$hasil->ttd_penjelas.'" style="width:200px;height:200px;">
    </div>
    <h4>'.$hasil->nama.'</h4>
    </div>
    </td>
    <td>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td style="text-align:center;">
    <div class="card">
    <h4>Pasien</h4>
    <div style="width:500px;height:210px;text-align:center;">
    <img src="'.$hasil->ttd_pasien.'" style="width:200px;height:200px;">
    </div>
    <h4>'.$hasil->nama_pasien.'</h4>
    </div>
    </td>
    </tr>
    </table>
    ');
$mpdf->Output("General Consent.pdf", 'I');
exit;
} 
public function LaporanReturBarangMasuk()
{
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Retur Barang Masuk.xls");

    date_default_timezone_set('Asia/Jakarta');
    $input = json_decode(file_get_contents('php://input'));

    $tglawal      = $_POST['tglawal'];
    $tglakhir     = $_POST['tglakhir'];
    $username     = $_POST['username'];

    $replacetglwal1  = str_replace("/", "-", $_POST['tglawal']);
    $dateawal1       = date_create($replacetglwal1);
    $tglawal1        = date_format($dateawal1, "d-M-Y");

    $replacetglwal2  = str_replace("/", "-", $_POST['tglakhir']);
    $dateawal2       = date_create($replacetglwal2);
    $tglawal2        = date_format($dateawal2, "d-M-Y");

    $query  = $this->db->query("SELECT
        to_char( tgl_ret, 'dd-mm-YYYY' ) AS tglcreated,
        no_ret,
        no_obat_in,
        gor.urut,
        far_vendor.nama AS nmvendor,
        remark :: TEXT,
        gor.kd_obat,
        nama_obat,
        boxqty,
        jml_in_obt,
        qty_ret,
        fraction,
                                        --hrg_beli_obt,
                                        hargasat,
                                        ( hargasat * qty_ret ) AS subharga_total,
                                        gor.ppn_item,
                                        -- ( hargasat * qty_ret ) * gor.ppn_item / 100 AS ppn_rupiah,
                                        ( hargasat * gor.ppn_item) / 100 AS ppn_rupiah,
                                        -- (( hargasat * qty_ret ) * gor.ppn_item / 100) + ( hargasat * qty_ret )  AS subtotal,
                                        (( hargasat * gor.ppn_item) / 100) + ( hargasat * qty_ret )  AS subtotal,
                                        to_char( exp_ret, 'dd-mm-YYYY' ) AS expired,
                                        batch_ret
                                        FROM
                                        gud_obat_ret
                                        INNER JOIN gud_obat_retdet gor USING ( no_ret, tgl_ret )
                                        INNER JOIN gud_obat_in_det goid USING ( no_obat_in, kd_obat)
                                        INNER JOIN far_obat USING ( kd_obat )
                                        INNER JOIN far_jenis_obat USING ( kd_jns_obt )
                                        INNER JOIN far_sub_jenis USING ( kd_sub_jns )
                                        INNER JOIN far_vendor USING ( kd_vendor )
                                        WHERE
                                        tgl_ret BETWEEN '$tglawal' AND '$tglakhir' AND posting = 't'
                                        ORDER BY
                                        no_ret, gor.urut ASC");
        // echo $query;
        // return;
    $html = "<html>
    <body style='font-family: Times New Roman;'>
    <h4 style='text-align:center; font-weight: bold';>Laporan Retur Barang Masuk<br>Tanggal $tglawal1 s/d $tglawal2</h4>
    <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
    <tr style='background-color: #abdaa8;'>
    <td><b>No.</b></td>
    <td width='130'><b>No.Retur</b></td>
    <td width='130'><b>Tgl. Created</b></td>
    <td width='130'><b>Expired</b></td>
    <td width='550'><b>Nama Supplier</b></td>
    <td><b>Nama Obat</b></td>
    <td width='130'><b>Stok Awal</b></td>
    <td width='130'><b>Qty Retur</b></td>
    <td width='150'><b>Harga</b></td>
    <td width='120'><b>PPn%</b></td>
    <td width='120'><b>PPn 11%</b></td>
    <td width='130'><b>Total Harga</b></td>
    </tr>";
    if ($query->getNumRows() > 0){

        $no = 1;
        $grandtotal     = 0;

        foreach ($query->getResult() as $row) {

            $html .= "  <tr>
            <td style='vertical-align: middle;'>$no</td>
            <td style='vertical-align: middle;'>$row->no_ret</td>
            <td style='vertical-align: middle; text-align: right;'>$row->tglcreated</td>
            <td style='vertical-align: middle; text-align: right;'>$row->expired</td>
            <td style='vertical-align: middle;'>".strtoupper($row->nmvendor)."</td>
            <td style='vertical-align: middle;'>".strtoupper($row->nama_obat)."</td>
            <td style='vertical-align: middle;'>$row->jml_in_obt</td>
            <td style='vertical-align: middle;'>$row->qty_ret</td>
            <td style='vertical-align: middle; text-align: right;'>".number_format($row->hargasat, 2)."</td>
            <td style='vertical-align: middle; text-align: right;'>$row->ppn_item%</td>
            <td style='vertical-align: middle; text-align: right;'>".number_format($row->ppn_rupiah, 2)."</td>
            <td style='vertical-align: middle; text-align: right;'>".number_format($row->subtotal, 2)."</td>
            </tr>";
            $no++;
                //$grandtotal += $row->subtotal;
        }
            /*$html .= "  <tr style='background-color: #abdaa8;'>
                            <td colspan='11' style='vertical-align: middle; text-align: right;'><b>Grand Total</b></td>
                            <td style='vertical-align: middle; text-align: right;'><b>".number_format($grandtotal, 2)."</b></td>
                            </tr>";*/
                        }else{
                            $html .= "  <tr>
                            <td colspan='12' style='vertical-align: middle; text-align: center;'><b>-- Data Tidak Ditemukan --</b></td>
                            </tr>";
                        }

                        $html .= "      </table>
                        </body>
                        </html>";

                        echo $html;
                        exit;
                    }
                    public function cetak_suratsakit()
                    {
                        $input = json_decode(file_get_contents('php://input'));
                        $id_transaksi = $_POST['id_transaksi'];
                        $querypasien = $this->db->query("SELECT
        * 
                            FROM
                            surat_sakit
                            INNER JOIN users USING ( id_user ) 
                            INNER join transaksi using(id_transaksi)
                            INNER join pasien using(no_rm)
                            left join agama using (kd_agama)
                            left join pekerjaan using (kd_pekerjaan)
                            left join pendidikan using (kd_pendidikan)
                            left join kelurahan using(kd_kelurahan)
                            left join kecamatan using(kd_kecamatan)
                            left join kabupaten using(kd_kabupaten)
                            left join propinsi using(kd_propinsi)
                            WHERE
                            id_transaksi = '$id_transaksi'");


        // var_dump($querypasien);
        // exit();
                        $html = "
                        <html>
                        <body>
                        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                        <tr>
                        <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
                        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                        RUMAH SAKIT UMUM
                        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
                        </td>
                        </tr>
                        <tr>
                        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                        </tr>
                        <tr>
                        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                        </tr>
                        </table>
                        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>";
                        foreach ($querypasien->getResult() as $datas) {
                            $tglsurat = substr($datas->tgl_surat, 0, 10);
                            $tglmulai = substr($datas->tgl_mulai, 0, 10);
                            $tglakhir = substr($datas->tgl_akhir, 0, 10);

                            if ($datas->jenis_kelamin=='f') {
                                $kelamin='Laki-laki';
                            } else {
                                $kelamin='Perempuan';
                            }

                            $html .= "

                            <p style='text-align:center; font-weight: bold;font-size:16px;'>SURAT KETERANGAN SAKIT</p><br><br>
                            <p>Yang Bertanda tangan dibawah ini, Menerangakan bahwa :</p>
                            <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
                            <tr>
                            <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama</td><td style='width:5px;'>:</td><td>$datas->nama</td></tr>
                            <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Jenis Kelamin</td><td  style='width:5px;'>:</td><td>$kelamin</td></tr>
                            \        <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Pekerjaan</td><td style='width:5px;'>:</td><td>$datas->pekerjaan</td></tr>
                            <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Alamat</td><td style='width:5px;'>:</td><td>$datas->alamat $datas->kelurahan $datas->kabupaten $datas->propinsi</td>

                            </tr>
                            </table>
                            <p style='text-align:center; font-weight: bold;font-size:16px;'></p>
                            <p>Hendaknya dapat di ijinkan untuk istirahat selama $datas->hari hari, pada tanggal ".date_indo($tglmulai)." sampai dengan ".date_indo($tglakhir)." dikarenakan sakit $datas->diagnosa.
                            Demikian surat keterangan sakit ini, mohon digunakan sebagaimana mestinya</p>
                            ";
                        }

                        $html .= "
                        <table style='padding-left:600px;padding-top:20px'>
                        <tr>
                        <td>
                        Dibuat Tanggal ".date_indo($tglsurat)."<br><img src='$datas->ttddokter' width='100px' alt=''>
                        </td>
                        <tr>
                        <tr>
                        <td>$datas->dokter</td>
                        </tr>
                        </table>
                        </body>
                        </html>";
        //echo $html;
                        $mpdf   = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            'format' => 'A4'
                        ]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
                        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                        $mpdf->WriteHTML($html);
                        $mpdf->Output("cetak_bill.pdf", 'I');
                        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');


                    }

                    public function printrencanapulang()
                    {
                        $input = json_decode(file_get_contents('php://input'));
                        $id_transaksi = $_POST['transaksi'];
                        $querypasien = $this->db->query("SELECT * FROM discharge_planning
                            INNER JOIN users USING ( id_user ) 
                            INNER join transaksi using(id_transaksi)
                            INNER JOIN pasien on pasien.no_rm=transaksi.no_rm
                            INNER join pegawai on pegawai.id_pegawai=discharge_planning.id_dpjp
                            left join agama using (kd_agama)
                            left join pekerjaan using (kd_pekerjaan)
                            left join pendidikan using (kd_pendidikan)
                            left join kelurahan using(kd_kelurahan)
                            left join kecamatan using(kd_kecamatan)
                            left join kabupaten using(kd_kabupaten)
                            left join propinsi using(kd_propinsi)
                            WHERE
                            id_transaksi = '$id_transaksi'");

                        $querydischarge_planning = $this->db->query("SELECT * FROM discharge_planning
                            INNER JOIN users USING ( id_user ) 
                            INNER join pegawai on pegawai.id_pegawai=users.id_pegawai
                            LEFT JOIN kamar on kamar.id_kamar=discharge_planning.id_kamar
                            WHERE id_transaksi = '$id_transaksi'");


                            // echo"$x";exit();
                            // var_dump($querypasien);
                            // exit();

                        foreach($querydischarge_planning->getResult() as $row_planning);
                        foreach ($querypasien->getResult() as $datas) {
                            $tglkontrol = substr($datas->tgl_kontrol, 0, 10);


                            if ($datas->jenis_kelamin=='f') {
                                $kelamin='Laki-laki';
                            } else {
                                $kelamin='Perempuan';
                            }
                        }
                        $html = "
                        <html>
                        <body>
                        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                        <tr>
                        <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
                        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                        RUMAH SAKIT UMUM
                        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
                        </td>
                        </tr>
                        <tr>
                        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                        </tr>
                        <tr>
                        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                        </tr>
                        </table>

                        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
                        <table border='1' style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;'>
                        <tr>
                        <td colspan='3' style='width: 750px;text-align: center;'><b>RENCANA PEMULANGAN PASIEN<br>(DISCHARGE PLANING)</b></td>
                        </tr>
                        <tr>
                        <td colspan='2' style='width: 400px;'>
                        Diagnosa Medis : $row_planning->diagnosa
                        </td>
                        <td style='width: 350px;'>
                        Ruangan : $row_planning->nama_kamar
                        </td>
                        </tr>
                        <tr style='background-color:#B2BABB'>
                        <td colspan='3'><b>SAAT MRS / ON ADMISSION </b></td>
                        </tr>
                        <tr>
                        <td colspan='3'> Tanggal : ".date_indo($row_planning->tgl_masuk)."</td>
                        </tr>
                        <tr>
                        <td colspan='3'> Alasan Mrs : $row_planning->alasan_mrs</td>
                        </tr>
                        <tr>
                        <td colspan='3'> Tanggal dilakukan Perencanaan Pemulangan Pasien : ".date_indo($row_planning->tgl_keluar)."</td>
                        </tr>
                        <tr>
                        <td colspan='3'> Nama Perawat : $row_planning->nama_pegawai</td>
                        </tr>
                        <tr style='background-color:#B2BABB'>
                        <td colspan='3'><b>KETERANGAN RENCANA PEMULANGAN : </b></td>
                        </tr>
                        <tr>
                        <td>1</td>
                        <td>Pengaruh Rawat Inap terhadap<br>Pasien dan Keluarga Pasien</td>
                        <td>";

                        if ($row_planning->pengaruh_keluarga == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b> $row_planning->pengaruh_keluarga_ket";
                        }

                        $html .= "<br></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>Pekerjaan</td>
                        <td>";
                        if ($row_planning->pengaruh_pekerjaan == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  $row_planning->pengaruh_pekerjaan_ket";
                        }
                        $html .= "<br></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>Keuangan</td>
                        <td>";
                        if ($row_planning->pengaruh_keuangan == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  $row_planning->pengaruh_keuangan_ket";
                        } 
                        $html .= "<br></td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Antisipasi terhadap masalah saat pulang</td>
                        <td>";
                        if ($row_planning->antisipasi == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  $row_planning->antisipasi_ket";
                        }
                        $html .= "</td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td colspan='3'>Bantuan diperlukan dalam hal : <br>";
                        if ($row_planning->bantuan_menyiapkan_makanan == '2') {
                            $html .= " Menyiapkan Makanan &nbsp; ,";
                        }
                        if ($row_planning->bantuan_mandi == '2') {
                            $html .= " Mandi &nbsp; ,";
                        }
                        if ($row_planning->bantuan_makanan == '2') {
                            $html .= " Makan &nbsp; ,";
                        }
                        if ($row_planning->bantuan_perpakaian == '2') {
                            $html .= " Berpakaian &nbsp; ,";
                        }
                        if ($row_planning->bantuan_diet == '2') {
                            $html .= " Diet &nbsp; ,";
                        }
                        if ($row_planning->bantuan_transportasi == '2') {
                            $html .= " Transportasi &nbsp; ,";
                        }
                        if ($row_planning->bantuan_menyiapkan_obat == '2') {
                            $html .= " Menyiapkan Obat &nbsp; ,";
                        }
                        if ($row_planning->bantuan_edukasi_kesehatan == '2') {
                            $html .= " Edukasi Kesehatan &nbsp; ,";
                        }
                        if ($row_planning->bantuan_lain == '2') {
                            $html .= " Lain-lain &nbsp;  $row_planning->bantuanlain_ket";
                        }
                        
                        $html .= "
                        </td>
                        </tr>
                        <tr>
                        <td>4</td>
                        <td>Adakah yang membantu keperluan diatas ?</td>
                        <td>";
                        if ($row_planning->helper == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  $row_planning->helper_ket";
                        }
                        $html .= "</td>
                        </tr>
                        <tr>
                        <td>5</td>
                        <td>Apakah pasien tinggal sendiri setelah keluar dari rumah sakit ?</td>
                        <td>
                        ";
                        if ($row_planning->sendiri == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  $row_planning->sendiri_ket";
                        }

                        $html .= " </td>
                        <tr>
                        <tr>
                        <td>6</td>
                        <td>Apakah pasien menggunakan peralatan medis di rumah setelah keluar rumah sakit ? ( contoh Cateter , NGT , double lumen, oksigen )</td>
                        <td>";
                        if ($row_planning->alat_medis == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            if ($row_planning->alat_medis_cateter == '2') {
                                $html .= " Cateter &nbsp; ,";
                            }
                            if ($row_planning->alat_medis_ngt == '2') {
                                $html .= " NGT &nbsp; ,";
                            }
                            if ($row_planning->alat_medis_dobelumen == '2') {
                                $html .= " Double Lumen &nbsp; ,";
                            }
                            if ($row_planning->alat_medis_oksigen == '2') {
                                $html .= " Oksigen &nbsp; ,";
                            }
                            if ($row_planning->alat_medis_lain == '2') {
                                $html .= " Lain-lain &nbsp;  $row_planning->alat_medis_ket ";
                            }
                        }
                        $html .= " </td>
                        </tr>
                        <tr>
                        <td>7</td>
                        <td>Apakah pasien memerlukan alat bantu setelah keluar dari rumah sakit ?(longkat,kursi roda, dll)</td>
                        <td>";
                        if ($row_planning->alat_jln == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            if ($row_planning->alat_jln_tongkat == '2') {
                                $html .= " Tongkat &nbsp; ,";
                            }
                            if ($row_planning->alat_jln_kursiroda == '2') {
                                $html .= " Kursi Roda &nbsp; ,";
                            }
                            if ($row_planning->alat_jln_walker == '2') {
                                $html .= " Walker &nbsp; ,";
                            }
                            if ($row_planning->alat_jln_lain == '2') {
                                $html .= " Lain - lain &nbsp; $row_planning->alat_medis_ket";
                            }
                            
                        }
                        $html .= " </td>
                        </tr>
                        <tr>
                        <td>8</td>
                        <td>Apakah pasien menggunakan peralatan medis di rumah setelah keluar rumah sakit ? ( contoh Cateter , NGT , double lumen, oksigen )</td>
                        <td>";
                        if ($row_planning->rawat_khusus == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            if ($row_planning->home_care == '2') {
                                $html .= " Home Care &nbsp; ,";
                            }
                            if ($row_planning->visite_care == '2') {
                                $html .= " Visite Care &nbsp; ";
                            }
                        }
                        $html .= " 
                        </td>
                        </tr>
                        <tr>
                        <td>9</td>
                        <td>Apakah pasien bermasalah dalam memenuhi kebutuhan pribadinya setelah keluar dari rumah sakit ? ( makan , minum )</td>
                        <td>
                        ";
                        if ($row_planning->kesulitan == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            if ($row_planning->masalah_makan == '2') {
                                $html .= " Makan &nbsp; ,";
                            }
                            if ($row_planning->masalah_minum == '2') {
                                $html .= " Minum &nbsp; ";
                            }
                            if ($row_planning->masalah_bab == '2') {
                                $html .= " Bab/Bak &nbsp; ,";
                            }
                            if ($row_planning->masalah_lain == '2') {
                                $html .= " Lain-lain &nbsp; $row_planning->alat_medis_ket";
                            }
                        }
                        $html .= "
                        </td>
                        </tr>
                        <tr>
                        <td>10</td>
                        <td>Apakah pasien memiliki nyeri kronis dan kelelahan setelah keluar dari rumah sakit ?</td>
                        <td>
                        ";
                        if ($row_planning->nyeri == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            $html .= " Lain &nbsp; $row_planning->nyeri_ket";
                        }
                        $html .= "
                        </td>
                        </tr>
                        <tr>
                        <td>11</td>
                        <td>Apakah pasien dan keluarga memerlukan edukasi kesehatan setelah keluar dari rumah sakit ?</td>
                        <td>";
                        if ($row_planning->edukasi == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            if ($row_planning->edukasi_obat == '2') {
                                $html .= " Obat-obatan &nbsp; ,";
                            }
                            if ($row_planning->edukasi_efeksamping == '2') {
                                $html .= " Efek samping obat &nbsp; ,";
                            }
                            if ($row_planning->edukasi_nyeri == '2') {
                                $html .= " Nyeri &nbsp; ,";
                            }
                            if ($row_planning->edukasi_diit == '2') {
                                $html .= " Diit &nbsp; ,";
                            }
                            if ($row_planning->edukasi_tolong == '2') {
                                $html .= " Mencari Perolongan &nbsp; ,";
                            }
                            if ($row_planning->edukasi_folup == '2') {
                                $html .= " Follow Up &nbsp; ,";
                            }
                            if ($row_planning->edukasi_lain == '2') {
                                $html .= " Lain-lain &nbsp; $row_planning->edukasi_ket";
                            }
                        }
                        $html .= "
                        </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td> Apakah pasien dan keluarga memerlukan keterampilan khusus setelah keluar dari rumah sakit ?</td>
                        <td>
                        ";
                        if ($row_planning->keterampilan == '1') {
                            $html .= "<b>Tidak</b>";
                        } else {
                            $html .= "<b>Ya</b>  <br>"; 
                            if ($row_planning->keterampilan_rawatluka == '2') {
                                $html .= " Perawatan Luka &nbsp; ,";
                            }
                            if ($row_planning->keterampilan_injeksi == '2') {
                                $html .= " Injeksi &nbsp; ,";
                            }
                            if ($row_planning->keterampilan_bayi == '2') {
                                $html .= " Perawatan Bayi &nbsp; ,";
                            }
                            if ($row_planning->keterampilan_lain == '2') {
                                $html .= " Lain-lain &nbsp; $row_planning->keterampilan_ket";
                            }
                        }
                        $html .= "</td>
                        </tr>
                        
                        </table>
                        <div>
                        <br>
                        <div style='text-align:right'>
                        Dibuat Tanggal ".date_indo($datas->tgl_input)."<br>
                        <img src='$datas->ttddpjp' width='100px' alt=''>
                        <br>$row_planning->nama_pegawai
                        </div>
                        <pagebreak>

                        <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                        <tr>
                        <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
                        <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                        RUMAH SAKIT UMUM
                        <p style='font-size:30px;color:#14B937'>DARMAYU</p>
                        </td>
                        </tr>
                        <tr>
                        <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
                        </tr>
                        <tr>
                        <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
                        </tr>
                        </table>
                        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>";
                        $html .= "
                        <div style='padding-left:20px'>
                        <p style='text-align:center; font-weight: bold;font-size:16px;'>SURAT RUJUKAN KONTROL</p><br><br>
                        <p>Kepada yang Terhormat : $datas->nama_pegawai</p>
                        <p>Mohon penanganan lebih lanjut atas nama :</p>
                        <table border='0' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
                        <tr>
                        <td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Nama</td><td style='width:5px;'>:</td><td>$datas->nama</td></tr>
                        <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>No. Rekam Medis</td><td style='width:5px;'>:</td><td>$datas->no_rm</td></tr>
                        <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Jenis Kelamin</td><td  style='width:5px;'>:</td><td>$kelamin</td></tr>
                        <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Tgl Lahir</td><td style='width:5px;'>:</td><td>".date_indo($datas->tgl_lahir)."</td></tr>
                        <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Alamat</td><td style='width:5px;'>:</td><td>$datas->alamat $datas->kelurahan $datas->kabupaten $datas->propinsi</td>
                        <tr><td style='width:200px;text-align:left;letter-spacing: 1px;padding-left: 30px;'>Rencana Kontrol</td><td style='width:5px;'>:</td><td>".date_indo($datas->tgl_kontrol)."</td>
                        </tr>
                        </table>
                        <p>Dokumen & Hasil pemeriksaan yang disertakan : ";
                        if ($row_planning->dokumen_lab == '2') {
                            $html .= " Laboratorium ,";
                        }
                        if ($row_planning->dokumen_rad == '2') {
                            $html .= " Radiologi ,";
                        }
                        if ($row_planning->dokumen_lain == '2') {
                            $html .= "$row_planning->dokumen_lain_ket";
                        }
                        $html .= "
                        </p>
                        <p style='text-align:center; font-weight: bold;font-size:16px;'></p>
                        ";
                        

                        // var_dump($querypembuat);
                        $html .= "
                        <table style='padding-left:600px;padding-top:20px'>
                        <tr>
                        <td style='width:200px'>Dibuat Tanggal ".date_indo($datas->tgl_input)."<br><img src='$datas->ttddpjp' width='100px' alt=''></td>
                        <tr>
                        <tr>
                        <td>$row_planning->nama_pegawai</td>
                        </tr>
                        </table>
                        </div>
                        </body>
                        </html>";
        //echo $html;
                        $mpdf   = new \Mpdf\Mpdf([
                            'mode' => 'utf-8',
                            'format' => 'A4'
                        ]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
                        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                        $mpdf->WriteHTML($html);
                        $mpdf->Output("cetak.pdf", 'I');
                        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');


                    }

                    public function laporanoperasi()
                    {
                        date_default_timezone_set('Asia/Jakarta');
                        $input = json_decode(file_get_contents('php://input'));

                        $idkunj          = $_POST['idkunj'];
                        $idtransaksi     = $_POST['idtransaksi'];

                        $replacetglwal1  = str_replace("/", "-", $_POST['tglkunj']);
                        $dateawal1       = date_create($replacetglwal1);
                        $tglkunj         = date_format($dateawal1, "d-M-Y");

                        $data  = $this->db->query("
                            SELECT
            * 
                            FROM transaksi
                            LEFT JOIN kunjungan USING ( id_transaksi) 
                            INNER JOIN unit USING (id_unit)
                            INNER JOIN pasien USING (no_rm)
                            INNER JOIN pegawai USING (id_pegawai)
                            WHERE
                            id_kunjungan = '$idkunj' AND id_transaksi = '$idtransaksi' ")->getRow();

                        if ($data->jenis_kelamin == 'f') {
                            $kelamin = 'Laki-laki';
                        } else {
                            $kelamin = 'Perempuan';
                        }

                        $html   = " <html>
                        <style type='text/css' style='font-family: Arial;'>
                        .contoh12 { font-size:12px; }
                        .contoh11 { font-size:11px; }
                        .contoh14 { font-size:14px; line-height: 14px;}
                        .allborder {border: 1px solid black;}
                        .borderkiri {border-left:1px solid black;}
                        .borderkanan {border-right:1px solid black;}
                        .borderatas {border-top:1px solid black;}
                        .borderbawah {border-bottom:1px solid black;}
                        </style>
                        <body>";

                        $html .= "
                        <table class='allborder' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>                    
                        <td align='left' style='padding:2mm;' colspan='2' class='borderkanan' width='50%'>
                        <table cellspacing='0'>
                        <tr>
                        <td style='padding:2mm;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
                        <td align='left' width='72mm'><h3>RSU Darmayu</h3><br>
                        <p class='contoh12'>Jl. Kapten Tendean No. 47, <br>Kel. Demangan, Kec. Taman, Kota Madiun<br>Telp 0351-4109999 <br>Email : rsudarmayumdn@yahoo.com</p>
                        </td>
                        </tr>
                        </table>
                        </td>
                        <td align='left' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td style='width:32mm; text-align:left;'><p class='contoh11'>No. RM</p></td>
                        <td style='width:70mm; text-align:left;'><p class='contoh11'>: $data->no_rm</p></td>
                        </tr>
                        <tr>
                        <td><p class='contoh11'>Nama RM</p></td>
                        <td><p class='contoh11'>: $data->nama</p></td>
                        </tr>
                        <tr>
                        <td><p class='contoh11'>Jenis Kelamin</p></td>
                        <td><p class='contoh11'>: $kelamin</p></td>
                        </tr>
                        <tr>
                        <td><p class='contoh11'>Tgl. Lahir / Umur</p></td>
                        <td><p class='contoh11'>: ".date_indo($data->tgl_lahir)." / ".umur($data->tgl_lahir)."</p></td>
                        </tr>
                        <tr>
                        <td><p class='contoh11'>Dokter Yang Merawat</p></td>
                        <td><p class='contoh11'>: $data->nama_pegawai</p></td>
                        </tr>
                        <tr>
                        <td><p class='contoh11'>Kelas Rawat</p></td>
                        <td><p class='contoh11'>: $data->nama_unit</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>";

                        $querybedah  = $this->db->query("
                            SELECT *,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = dok_op1 :: INT) as dokter_operator1,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = dok_op2 :: INT) as dokter_operator2,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = dok_ane1 :: INT) as dokter_anastesi1,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = dok_ane2 :: INT) as dokter_anastesi2,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_ass1 :: INT) as perawat_asisten1,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_ass2 :: INT) as perawat_asisten2,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_instru :: INT) as perawat_instrumen,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_omloop1 :: INT) as perawat_omloop1,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_omloop2 :: INT) as perawat_omloop2,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_omloop3 :: INT) as perawat_omloop3,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = sus_omloop4 :: INT) as perawat_omloop4,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = nata_anes1 :: INT) as perawat_anastesi1,
                            (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = nata_anes2 :: INT) as perawat_anastesi2,
                            (SELECT nama_anastesi FROM jenis_anastesi WHERE idjns_anestesi = jns_anestesi :: INT) as nama_anastesi,
                            (SELECT id_penyakit ||' - '|| penyakit FROM penyakit WHERE id_penyakit = icd_pra ) as icd_pra_penyakit,
                            (SELECT id_penyakit ||' - '|| penyakit FROM penyakit WHERE id_penyakit = icd_pasca ) as icd_pasca_penyakit
                            FROM input_bedah 
                            WHERE id_kunjungan = '$idkunj' AND id_transaksi = '$idtransaksi' and aktif = 'true' ")->getRow();

                        $dari   = date_create($querybedah->tgl_awal);
                        $sampai = date_create($querybedah->tgl_akhir);
                        $diff   = date_diff($dari, $sampai);
                        if ($diff->d != 0){
                            $lamahari = $diff->d . ' Hari, ';
                        }else{
                            $lamahari = '';
                        }

                        if ($diff->s != 0){
                            $lamadetik = $diff->s . ' Detik, ';
                        }else{
                            $lamadetik = '';
                        }

                        $lamadurasi = $lamahari. $diff->h . ' Jam, '.$diff->i . ' Menit, '.$lamadetik;
                        $html .= "
                        <tr>
                        <td class='borderatas borderbawah' colspan='4' align='center'><h4>LAPORAN PEMBEDAHAN</h4></td>
                        </tr>
                        <tr>
                        <td class='borderkanan borderbawah' style='padding:2mm;' colspan='2' rowspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:30mm;'><p class='contoh12'>Dokter Operator</p></td>
                        <td align='left'><p class='contoh12'>: 1. $querybedah->dokter_operator1</p></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td ><p class='contoh12'>: 2. $querybedah->dokter_operator2</p></td>
                        </tr>
                        </table>
                        </td>
                        <td class='borderbawah' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm;'><p class='contoh12'>Dokter Anastesi</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        <td align='left'><p class='contoh12'>1. $querybedah->dokter_anastesi1</p></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        <td align='left'><p class='contoh12'>2. $querybedah->dokter_anastesi2</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <tr>
                        <td class='borderbawah' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm;'><p class='contoh12'>Jenis Anastesi</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        <td align='left'><p class='contoh12'>$querybedah->nama_anastesi</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>

                        <tr>
                        <td class='borderkanan borderbawah' colspan='2' rowspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm; padding:2mm;'><p class='contoh12'>Diagnosa Pra Bedah</p></td>
                        <td align='left'><p class='contoh12'>: $querybedah->icd_pra_penyakit</p></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        </tr>
                        </table>
                        </td>
                        <td class='borderbawah' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:45mm;'><p class='contoh12'>Tanggal Pembedahan</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        <td align='left'><p class='contoh12'>".substr($querybedah->tgl_awal, 0, 10)."</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <tr>
                        <td class='borderbawah' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:45mm;'><p class='contoh12'>Jam Mulai Pembedahan</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        <td align='left'><p class='contoh12'>$querybedah->tgl_awal</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>

                        <tr>
                        <td class='borderkanan borderbawah' colspan='2' rowspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm; padding:2mm;'><p class='contoh12'>Diagnosa Pasca Bedah</p></td>
                        <td align='left'><p class='contoh12'>: $querybedah->icd_pasca_penyakit</p></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td></td>
                        </tr>
                        </table>
                        </td>
                        <td class='borderbawah' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:45mm;'><p class='contoh12'>Jam Akhir Pembedahan</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        <td align='left'><p class='contoh12'>$querybedah->tgl_akhir</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <tr>
                        <td class='borderbawah' style='padding:2mm;' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:45mm;'><p class='contoh12'>Lama Pembedahan</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        <td align='left'><p class='contoh12'></p class='contoh12'>$lamadurasi</td>
                        </tr>
                        </table>
                        </td>
                        </tr>

                        <tr>
                        <td class='borderbawah' style='padding:2mm;'><p class='contoh12'>Diagnosa Klinis Pra Bedah</p></td>
                        <td class='borderbawah borderkanan'><p class='contoh12'>: $querybedah->diagnose_pra</p></td>
                        <td rowspan='3' colspan='2'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:30mm; padding:2mm;'><p class='contoh12'>Klasifikasi Bedah</p></td>
                        <td align='left' colspan='2' style='width:30mm; padding:2mm;'><p class='contoh12'>Jenis Pembedahan</p></td>
                        </tr>";

                        $html .=" <tr>";
                        if ($querybedah->klasifikasi == 1){

                            $html .=" <td align='left' style='padding:2mm;'><p class='contoh12'><input type='checkbox' checked='true'>Emergency / Cito</p></td>
                            ";
                        }else{
                            $html .=" <td align='left' style='padding:2mm;'><p class='contoh12'><input type='checkbox'>Emergency / Cito</p></td>";
                        }

                        if ($querybedah->bedah == 1){

                            $html .="<td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' checked='true'>Mayor</p></td>
                            ";
                        }else{
                            $html .=" <td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' >Mayor</p></td>";
                        }
                        $html .=" </tr>";

                        $html .=" <tr>";
                        if ($querybedah->klasifikasi == 2){

                            $html .=" <td align='left' style='padding:2mm;'><p class='contoh12'><input type='checkbox' checked='true'>Elektif</p></td>
                            ";
                        }else{
                            $html .=" <td align='left' style='padding:2mm;'><p class='contoh12'><input type='checkbox'>Elektif</p></td>";
                        }

                        if ($querybedah->bedah == 2){

                            $html .="<td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' checked='true'>Medium</p></td>
                            ";
                        }else{
                            $html .=" <td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' >Medium</p></td>";
                        }
                        $html .=" </tr>";

                        $html .=" <tr>";
                        if ($querybedah->klasifikasi == 3){

                            $html .=" <td align='left' style='padding:2mm;'><p class='contoh12'><input type='checkbox' checked='true'>Poliklinik / ODC</p></td>
                            ";
                        }else{
                            $html .=" <td align='left' style='padding:2mm;'><p class='contoh12'><input type='checkbox'>Poliklinik / ODC</p></td>";
                        }

                        if ($querybedah->bedah == 3){

                            $html .="<td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' checked='true'>Minor</p></td>
                            ";
                        }else{
                            $html .=" <td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' >Minor</p></td>";
                        }

                        if ($querybedah->bedah == 4){

                            $html .="<td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox'  checked='true'>Khusus</p></td>";
                        }else{
                            $html .=" <td align='left' colspan='2' style='padding:2mm;'><p class='contoh12'><input type='checkbox' >Khusus</p></td>";
                        }

                        $html .=" </tr>";

                        $html .=" <tr>
                        <td align='left' style='width:40mm; padding:2mm;'><p class='contoh12'>Jumlah Perdarahan</p></td>
                        <td align='left' style='width:1mm; padding:2mm;'><p class='contoh12'>:</p></td>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>$querybedah->pendarahan cc</p></td>
                        </tr>
                        <tr>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>Jumlah darah yang ditransfusikan</p></td>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>:</p></td>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>$querybedah->transfusi cc</p></td>
                        </tr>
                        </table>
                        </td>
                        </tr>
                        <tr>
                        <td class='borderbawah' style='padding:2mm;'><p class='contoh12'>Diagnosa Klinis Pasca Bedah</p></td>
                        <td class='borderbawah borderkanan'><p class='contoh12'>: $querybedah->diagnose_pasca</p></td>
                        </tr>
                        <tr>
                        <td style='padding:2mm;'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:45mm;'><p class='contoh12'>Tindakan Pembedahan</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        </tr>
                        <tr>
                        <td align='left'><p class='contoh12'>1</p></td>
                        </tr>
                        <tr>
                        <td align='left'><p class='contoh12'>2</p></td>
                        </tr>
                        </table>
                        </td>
                        <td class='borderkanan'></td>
                        </tr>
                        <tr>
                        <td class='borderbawah borderatas' colspan='4' align='center'><h4>URAIAN PEMBEDAHAN</h4></td>
                        </tr>
                        <tr>
                        <td class='borderbawah' style='padding:2mm;' colspan='4'>
                        <table cellspacing='0'>
                        <tr>
                        <td height='250' align='left' colspan='3' style='vertical-align:top;' ><p class='contoh12'>".nl2br(str_replace('', '', htmlspecialchars($querybedah->uraian)))."</p></td>
                        </tr>
                        <tr>
                        <td align='left' style='width:10mm;' ><p class='contoh12'>Komplikasi</p></td>
                        <td align='left' style='width:2mm;' ><p class='contoh12'>:</p></td>";

                        if ($querybedah->komplikasi == 0){

                            $html .=" <td align='left' ><p class='contoh12'><input type='checkbox' checked='true' > Tidak</p></td>";
                        }else{
                            $html .=" <td align='left' ><p class='contoh12'><input type='checkbox'> Tidak</p></td>";
                        }

                        $html .="</tr>
                        <tr>
                        <td></td>
                        <td></td>";
                        if ($querybedah->komplikasi == 1){

                            $html .=" <td align='left' ><p class='contoh12'><input type='checkbox' checked='true' > Ya, Sebutkan : $querybedah->isiankomplikasi</p></td>";
                        }else{
                            $html .=" <td align='left' ><p class='contoh12'><input type='checkbox'> Ya, Sebutkan :</p></td>";
                        }
                        $html .="</tr>
                        </table>
                        </td>
                        </tr>                
                        </table>

                        <table class='borderkanan borderkiri borderbawah' cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                        <td class='borderkanan' style='padding:2mm;'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm;' ><p class='contoh12'>Jaringan Ke Patologi</p></td>
                        <td align='left' style='width:1mm;' ><p class='contoh12'>:</p></td>
                        </tr>";
                        if ($querybedah->patologi == 0){

                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox' checked='true' > Tidak</p></td>
                            <td></td>
                            </tr>";
                        }else{
                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox'> Tidak</p></td>
                            <td></td>
                            </tr>";
                        }

                        if ($querybedah->patologi == 1){

                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox' checked='true' > Ya</p></td>
                            <td></td>
                            </tr>";
                        }else{
                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox'> Ya</p></td>
                            <td></td>
                            </tr>";
                        }

                        $html .=" <tr>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>Tanggal : $querybedah->tglpatologi</p></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>Asal Jaringan : $querybedah->isianpatologi</p></td>
                        <td></td>
                        </tr>
                        </table>
                        </td>
                        <td class='borderkanan' style='padding:2mm;'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm;' ><p class='contoh12'>Pemasangan Implant</p></td>
                        <td align='left' style='width:1mm;' ><p class='contoh12'>:</p></td>
                        </tr>";
                        if ($querybedah->implant == 0){

                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox' checked='true' > Tidak</p></td>
                            <td></td>
                            </tr>";
                        }else{
                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox'> Tidak</p></td>
                            <td></td>
                            </tr>";
                        }

                        if ($querybedah->implant == 1){

                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox' checked='true' > Ya</p></td>
                            <td></td>
                            </tr>";
                        }else{
                            $html .="<tr>
                            <td align='left' ><p class='contoh12'><input type='checkbox'> Ya</p></td>
                            <td></td>
                            </tr>";
                        }

                        $html .=" <tr>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>Jenis : $querybedah->jns_implant</p></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td align='left' style='padding:2mm;'><p class='contoh12'>No. Registrasi : </p></td>
                        <td></td>
                        </tr>
                        </table>
                        </td>
                        <td class='borderkanan' style='padding:2mm;'>
                        <table cellspacing='0'>
                        <tr>
                        <td align='left' style='width:35mm;' ><p class='contoh12'>Perawat Ass Bedah</p></td>
                        <td align='left' style='width:1mm;' ><p class='contoh12'>:</p></td>
                        </tr>";

                        if ($querybedah->sus_ass1 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_asisten1</p></td>
                            <td></td>
                            </tr>";  
                        }else{
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. _ _ _ _</p></td>
                            <td></td>
                            </tr>";
                        }
                        if ($querybedah->sus_ass2 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_asisten2</p></td>
                            <td></td>
                            </tr>";  
                        }

                        $html .=" <tr>
                        <td align='left'><p class='contoh12'>Perawat Instrument</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        </tr>";

                        if ($querybedah->sus_instru != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_instrumen</p></td>
                            <td></td>
                            </tr>";  
                        }else{
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. _ _ _ _</p></td>
                            <td></td>
                            </tr>";
                        }

                        $html .=" <tr>
                        <td align='left'><p class='contoh12'>Perawat Onloop</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        </tr>";

                        if (($querybedah->sus_omloop1 == 0)&&($querybedah->sus_omloop2 == 0)&&($querybedah->sus_omloop3 == 0)&&($querybedah->sus_omloop4 == 0)){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. _ _ _</p></td>
                            <td></td>
                            </tr>";  
                        }

                        if ($querybedah->sus_omloop1 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_omloop1</p></td>
                            <td></td>
                            </tr>";  
                        }

                        if ($querybedah->sus_omloop2 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_omloop2</p></td>
                            <td></td>
                            </tr>";  
                        }

                        if ($querybedah->sus_omloop3 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_omloop3</p></td>
                            <td></td>
                            </tr>";  
                        }

                        if ($querybedah->sus_omloop4 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_omloop4</p></td>
                            <td></td>
                            </tr>";  
                        }

                        $html .=" <tr>
                        <td align='left'><p class='contoh12'>Perawat Anestesi</p></td>
                        <td align='left'><p class='contoh12'>:</p></td>
                        </tr>";

                        if ($querybedah->nata_anes1 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_anastesi1</p></td>
                            <td></td>
                            </tr>";  
                        }

                        if ($querybedah->nata_anes2 != 0){
                            $html .="   <tr>
                            <td align='left'><p class='contoh12'>*. $querybedah->perawat_anastesi2</p></td>
                            <td></td>
                            </tr>";  
                        }

                        $html .=" </table>
                        </td>";

                        $writer = new PngWriter();
            // $qrCode = QrCode::create('id dokter :' . $querybedah->dok_op1 . 'dokter :' . $querybedah->dokter_operator1)
                        $qrCode = QrCode::create('id dokter :' . $data->id_pegawai . 'dokter :' . $data->nama_pegawai)
                        ->setEncoding(new Encoding('UTF-8'))
                        ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                        ->setSize(150)
                        ->setMargin(10)
                        ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                        ->setForegroundColor(new Color(0, 0, 0))
                        ->setBackgroundColor(new Color(255, 255, 255));

                        $result = $writer->write($qrCode);

                        $dataUri = $result->getDataUri();
                        $html .="<td style='padding:1mm;' align='center' width='30%'>
                        <p class='contoh12'>Madiun, ".date('d-m-Y')."<br>Dokter Operator</p><p  class='contoh12'><img src='" . $dataUri . "' width='100' height='100'><br><u>$data->nama_pegawai</u><br><i>Nama & Tanda Tangan</i></p>
                        </td>
                        </tr>
                        </table>

                        ";
                        $html .= "</body></html>";

                        $mpdf = new \Mpdf\Mpdf([
                            'mode'      => 'utf-8',
                            'format'    => 'A4'
                        ]);

                        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

                        $mpdf->WriteHTML($html);
                        $mpdf->Output("Laporan Operasi.pdf", 'I');
                        exit;

                    }


                }