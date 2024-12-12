<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Historykunjungan extends Api
{

    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }



    public function historykunjungan_detailpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['norm'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm           = $input->norm;
            $nmapasien      = $input->nmpasien;
            $nik            = $input->nik;
        
            $jml            = $input->jml;
            
            //$tgl_transaksi  = '2023-05-24';

            $query = "SELECT * from pasien
                         WHERE
                   upper(nama) like UPPER('" . $nmapasien . "%') AND no_rm like UPPER('" . $norm . "%') AND nik like '%" . $nik . "%' ORDER BY no_rm DESC
                    LIMIT '" . $jml . "'";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function mod_hiskunjungan()
    {
        return view('view/modal/historykunjungan/mod_historykunjungan');
    }
    public function hapuskunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan','id_transaksi'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            $ceksisa = $this->db->query("SELECT
            count(id_kunjungan) as sisa 
        FROM
            transaksi 
            join kunjungan using(id_transaksi)
        WHERE
            id_transaksi = '$input->id_transaksi'")->getRow()->sisa;

            if($ceksisa==1 || $ceksisa==1){
                $output['status']   = "gagal";
                $output['code']   = "XX";
                $output['pesan']    = "Silahkan batalkan transaksi dimodul kasir";
                $this->hasil($output);
                exit();
            }
            $idkamar = $this->db->query("select id_kamar from kunjungan where id_kunjungan='$input->id_kunjungan'")->getRow()->id_kamar;
            $cekdetailkunjungan = $this->db->query("select * from detail_kunjungan where id_kunjungan='$input->id_kunjungan' limit 1");
            if($cekdetailkunjungan->getNumRows() <= 0){
            if ($idkamar > 0){
                $this->db->simpleQuery("update kamar set digunakan=digunakan-1 where id_kamar='$idkamar'");
            }
            $query = "DELETE FROM kunjungan WHERE id_kunjungan = '$input->id_kunjungan'";

                if ($this->db->simpleQuery($query)) {
                    $output['status']   = "sukses";
                    $output['code']   = "200";
                    $output['pesan']    = "Sukses Hapus kunjungan";
                } else {
                    $output['status']   = "gagal";
                    $output['code']   = "XX";
                    $output['pesan']    = "Gagal Hapus Produk";
                }
            } else {
                $output['status']   = "gagal";
                $output['code']   = "XX";
                $output['pesan']    = "Telah ada detail tindakan transaksi, silahkan hapus terlebih dahulu";
            }
            $this->db->transComplete();
        }
        $this->hasil($output);
    }

    public function detail_kunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['norm'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            
            $query = "SELECT
            * 
        FROM
            transaksi
            JOIN kunjungan USING ( id_transaksi )
            JOIN pasien pas USING ( no_rm )
            JOIN unit USING ( id_unit )
            LEFT JOIN kamar kam ON kam.id_kamar = kunjungan.id_kamar
            LEFT JOIN ruang_inap rip ON rip.id_ruang = kam.id_ruang 
        WHERE
            transaksi.no_rm = '$input->norm' order by kunjungan.id_kunjungan desc
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['pesan']    = "Belum ada detail kunjungan";
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'Gagal, Hubungi Admin!!';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    function createlabel(){
        $input = json_decode(file_get_contents('php://input'));
        $norm       = $_POST['norm'];
        $idtransaksi  = $_POST['idtransaksi'];
        $idkunjungan  = $_POST['idkunjungan'];
        $modul      = $_POST['modul'];

        if ($modul == ''){
            $output['status']   = "Cetak Label Pasien Gagal!!";
            $output['pesan']    = "Simpan Dahulu, Baru Bisa Cetak Label";   
            $this->hasil($output);
            return;
        }
        
        $data = "SELECT
        id_transaksi,
        no_rm,
        nama,
        TO_CHAR( tgl_lahir, 'dd-mm-YYYY' ) AS tgl_lahir,
        nik,
        marital,
        CASE
            WHEN pasien.jenis_kelamin = 'false' THEN
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
        LEFT JOIN penjamin_transaksi USING ( id_transaksi )
        INNER JOIN penjamin USING ( id_penjamin ) 
    WHERE no_rm = '$norm'
                        --AND LEFT (kunjungan.id_unit, 1) = '2'
                        and penjamin_transaksi.penjamin_utama='t'
                        and kunjungan.id_kunjungan='$idkunjungan'
                        ORDER BY kunjungan DESC";
       // echo"$data";exit();
        $pasien = $this->db->query($data)->getRow();
        if ($this->db->query($data)->getNumRows() == 0){
            $output['status']   = "Cetak Label Pasien Gagal!!";
            $output['pesan']    = "Simpan Dahulu, Baru Bisa Cetak Label";   
            $this->hasil($output);
            return;
        }

        if ($pasien->nik == ''){
            $output['status']   = "Cetak Label Pasien Gagal!!";
            $output['pesan']    = "NIK tidak diketahui, Barcode Gagal!!";   
            $this->hasil($output);
            return;
        }
        $nmpasien = $pasien->nama;
        //$nmpasien = 'EDWIN TRI HADTANTO, A.Md';
        $nmdokter = $pasien->nama_pegawai;
        //$nmdokter = 'Melati Arum Satiti,Sp.A M.Sc,drCCC';
        if (strlen($nmdokter) >= 31) {
            $formatkertas = [270, 93]; //panjang, tinggi
            $dokter = '<h1 class="lh1">'.$nmdokter.'</h1>';
        }else{
            $formatkertas = [270, 87]; //panjang, tinggi
            $dokter = '<h1 class="lh">'.$nmdokter.'</h1>';
        }

        if (strlen($nmpasien) > 20) {
         $nm = substr($nmpasien, 0, 20)."...";
     }else{
         $nm = $nmpasien; 
     }

     $mpdf   = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'A4',
        'format' => $formatkertas, 
        'margin_top' => 2,
        'margin_bottom' => 0,
        'margin_left' => 2,
        'margin_right' => 2,
        'mirrorMargins' => true
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
        .barcode {
            padding: 0mm;
            margin: 0;
            vertical-align: top;
            color: #000044;
        }
        </style>");
     $mpdf->WriteHTML('<div class="a" style="float: right; width: 45%;">
        <barcode code="'.$pasien->nik.'" type="C128A" class="barcode" size="0.80" height="1.20" />
        <h1 style="margin-top:0px;" >'.$pasien->nik.'</h1>
        <h1 class="lh">'.$nm.'</h1>
        <h1 class="lh">'.umurdepan($pasien->tgl_lahir).' / '.$pasien->jenis_kelamin.' / '.$pasien->tgl_lahir.'</h1>
        <h1 class="lh">'.$pasien->no_rm.' / '.$pasien->nama_unit.'</h1>
        '.$dokter.'
        <h1 class="lh">'.$pasien->nama_penjamin.'</h1>
        <h1 class="lh">'.substr($pasien->jam_masuk, 0, 16).'</h1>
        </div>
        <div style="float: center; width: 20%;"></div>
        <div class="a" style="float: left; width: 45%;">
        <barcode code="'.$pasien->nik.'" type="C128A" class="barcode" size="0.80" height="1.20" />
        <h1 style="margin-top:0px;" >'.$pasien->nik.'</h1>
        <h1 class="lh">'.$nm.'</h1>
        <h1 class="lh">'.umurdepan($pasien->tgl_lahir).' / '.$pasien->jenis_kelamin.' / '.$pasien->tgl_lahir.'</h1>
        <h1 class="lh">'.$pasien->no_rm.' / '.$pasien->nama_unit.'</h1>
        '.$dokter.'
        <h1 class="lh">'.$pasien->nama_penjamin.'</h1>
        <h1 class="lh">'.substr($pasien->jam_masuk, 0, 16).'</h1>
        </div>');
     $mpdf->Output("Label Pasien.pdf", 'I');
     exit;
 }
 public function caripasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kdpasiencariSep', 'caritgl1', 'caritgl2'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";


            if ($input->kdpasiencariSep == null || $input->kdpasiencariSep == '') {
                $krierianama = "AND pas.nama ilike '%$input->nmpasiencariSep%'";
                $krieriakdpasien = "";
            } else {
                $krierianama = "";
                $krieriakdpasien = "AND tra.no_rm = '$input->kdpasiencariSep'";
            }

            $query = " SELECT x.namaunit,
                    * 
                FROM
                    transaksi tra 
                    JOIN pasien pas on tra.no_rm=pas.no_rm
                    JOIN penjamin_transaksi pj ON tra.id_transaksi = pj.id_transaksi AND pj.penjamin_utama = 't'
                    JOIN penjamin using(id_penjamin)
                    LEFT JOIN (
                            SELECT ARRAY_AGG
                        ( unit.nama_unit ) AS namaunit,kunjungan.id_transaksi
                    FROM
                        kunjungan
                        JOIN unit using(id_unit)
					where unit.jenis_unit in (1,2,3)
                    GROUP BY
                        kunjungan.id_transaksi 
            ) x ON tra.id_transaksi = x.id_transaksi 
                    where
                    '1'='1'
                    $krieriakdpasien
                   
                    $krierianama
                    AND penjamin.id_penjamin ='2'
                    AND date(tra.tgl_transaksi) between date('$input->caritgl1') and date('$input->caritgl2')
                    order by tra.id_transaksi desc
                limit '$input->jmlpasiencari'
            ";

            // echo"$query";
            // exit();


            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Berhasil Cari Pasien";
                    $output['data']     = $this->db->query($query)->getResult();
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->query($query)->getResult();
                }
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }

    public function mod_Sep()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
        $kel =  $this->db->query("
            SELECT * FROM
            transaksi
            JOIN kunjungan USING ( id_transaksi )
            JOIN pasien USING ( no_rm )
            JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$id_transaksi' ");
        if ($kel->getNumRows() <= 0) {
            // echo"tes";
            // exit();
        }
        $outputx['data'] = $kel->getResult();
        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/historykunjungan/mod_seppenjamintransaksi', $data);
    }   
    public function mod_Sep_ubah()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
        $id_penjamin  = str_replace('"', '', json_encode($data->id_penjamin));
        if(!$data->no_sjp){
            $no_sjp  = '';    
        }
        else{
            $no_sjp  = str_replace('"', '', json_encode($data->no_sjp));
        }
       
        // $a="SELECT
        //                                 * 
        //                             FROM
        //                                 penjamin_transaksi 
        //                                 left join penjamin_pasien using(no_rm)
        //                             WHERE
        //                                 id_transaksi = '$id_transaksi' 
        //                                 AND id_penjamin = '$id_penjamin ' 
        //                                 AND no_sjp = '$no_sjp'";
        //                                 echo"$a";
        //                                 exit();
        // echo"SELECT
        // * 
        // FROM
        //     penjamin_transaksi
        //     LEFT JOIN transaksi USING ( id_transaksi )
        //     LEFT JOIN penjamin_pasien ON penjamin_pasien.no_rm = transaksi.no_rm 
        //     AND penjamin_pasien.id_penjamin = penjamin_transaksi.id_penjamin 
        // WHERE
        //     id_transaksi = '$id_transaksi' 
        //     AND penjamin_transaksi.id_penjamin = '$id_penjamin' 
        //     AND no_sjp = '$no_sjp'";exit();
        $kel =  $this->db->query("SELECT
                                    	penjamin_transaksi.id_penjamin,* 
                                FROM
                                    penjamin_transaksi
                                    LEFT JOIN transaksi USING ( id_transaksi )
                                    LEFT JOIN penjamin_pasien ON penjamin_pasien.no_rm = transaksi.no_rm 
                                    AND penjamin_pasien.id_penjamin = penjamin_transaksi.id_penjamin 
                                WHERE
                                    id_transaksi = '$id_transaksi' 
                                    AND penjamin_transaksi.id_penjamin = '$id_penjamin' 
                                    AND no_sjp = '$no_sjp'");
        if ($kel->getNumRows() <= 0) {
            // echo"tes";
            // exit();
        }
        $outputx['data'] = $kel->getResult();
        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/historykunjungan/mod_sep_ubah', $data);
    }    
    public function ubahseppenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi','val_id_user','id_penjamin','sep'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            $updatenoka = "UPDATE penjamin_pasien SET no_kartu = '$input->noka' where no_rm= '$input->norm' and id_penjamin='$input->id_penjamin'";

            $update = "UPDATE penjamin_transaksi SET no_sjp = '$input->sep' where id_transaksi= '$input->id_transaksi' and id_penjamin='$input->id_penjamin' and no_sjp='$input->nosjplama'";
            // /echo"$updatenoka";exit();

            $this->db->query($updatenoka);
            $this->db->query($update);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Update";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal";
            }
        }
        $this->hasil($output);
    }

   
}
