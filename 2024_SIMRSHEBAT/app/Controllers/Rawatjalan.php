<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Rawatjalan extends Api
{
    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }
    public function unit()
    {
        $unit =  $this->db->query("SELECT * FROM unit where jenis_unit = '1' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }
    public function unitakses()
    {
        $input = json_decode(file_get_contents('php://input'));
        $unit =  $this->db->query("SELECT * FROM unit where jenis_unit = '1' and id_unit in ($input->unit) ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }
    public function pegawai()
    {
        $pegawai =  $this->db->query("SELECT * FROM pegawai where jenis_pegawai='1'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
    public function perawat()
    {
        $pegawai =  $this->db->query("SELECT * FROM pegawai where jenis_pegawai='0'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
    public function dokter()
    {
        $input = json_decode(file_get_contents('php://input'));
        $pegawai =  $this->db->query("SELECT * FROM pegawai INNER JOIN dokter_klinik USING (id_pegawai) where jenis_pegawai='1' and id_unit='$input->unitakses' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
    public function dpjpBPJS()
    {
        $input = json_decode(file_get_contents('php://input'));
        $pegawai =  $this->db->query("SELECT * FROM pegawai where id_pegawai ='$input->id' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getRow()->kd_dokter_bpjs;
        echo json_encode($output);
    }

    public function penjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $penjamin           = $this->db->query("SELECT * FROM penjamin where id_kelompok_penjamin = '$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $penjamin->getResult();
        echo json_encode($output);
    }

    public function rujukanAsal()
    {
        $input = json_decode(file_get_contents('php://input'));
        if ($input->id == '99' || $input->id == 99) {
            $asal =  $this->db->query(" SELECT * FROM rujukan_asal where cara_penerimaan  in ('99')");
        } else {
            $asal =  $this->db->query(" SELECT * FROM rujukan_asal where cara_penerimaan not in ('99')");
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $asal->getResult();
        echo json_encode($output);
    }

    public function rujukan()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $asal   =  $this->db->query(" SELECT * FROM rujukan where cara_penerimaan ='$input->id' ");

        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $asal->getResult();
        echo json_encode($output);
    }
    public function propinsi()
    {
        $user =  $this->db->query("SELECT * FROM propinsi ");
        $output['status']   = 'sukses';
        $output['data']     = $user->getResult();
        echo json_encode($output);
    }

    public function kota()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $kota   =  $this->db->query("SELECT * FROM kabupaten where kd_propinsi='$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $kota->getResult();

        echo json_encode($output);
    }
    public function kecamatan()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $kec    =  $this->db->query("SELECT * FROM kecamatan where kd_kabupaten='$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $kec->getResult();

        echo json_encode($output);
    }
    public function kelurahan()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $kel    =  $this->db->query("SELECT * FROM kelurahan where kd_kecamatan='$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $kel->getResult();

        echo json_encode($output);
    }

    public function mod_RWJkasir()
    {
        return view('view/modal/rwj/mod_RWJkasir');
    }

    public function mod_RWJBayarkasir()
    {
        return view('view/modal/rwj/mod_RWJBayarkasir');
    }

    public function mod_RWJPenatajasa()
    {
        return view('view/modal/rwj/mod_RWJPenatajasa');
    }

    public function simpanpasienrwj()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $addPasien = " INSERT INTO PASIEN 
    ( 
        no_rm, 
        kd_kelurahan, 
        kd_pendidikan, 
        kd_pekerjaan, 
        kd_perusahaan,
        kd_agama,
        nama,
        tgl_lahir,
        gol_darah,
        jenis_kelamin,
        status_hidup,
        status_marita,
        alamat,
        kota,
        telepon,
        kd_pos,
        jabatan,
        tanda_pengenal,
        nik,
        keterangan,
        kode_lama,
        wni,
        nama_keluarga,
        tempat_lahir,
        nama_ayah,
        nama_ibu,
        alamat_ktp,
        kd_pos_ktp,
        kd_kelurahan_ktp,
        kd_pendidikan_ayah,
        kd_pendidikan_ibu,
        kd_pekerjaan_ayah,
        kd_pekerjaan_ibu
        )
    SELECT
    TO_CHAR((MAX((no_rm::INTEGER))+1), 'fm0000000'),
            --max(cast(no_rm as integer)+1),
            '$input->kelurahan',
            '$input->pendidikan',
            '$input->pekerjaan',
            NULL,
            '$input->agama',
            '$input->namapasien',
            '$input->tanggallahir',
            '$input->goldarah',
            '$input->kelamin',
            't',
            '$input->statusmarital',
            '$input->alamat',
            '$input->kabupaten',
            '$input->telepon',
            '$input->kdpos',
            null,
            null,
            '$input->nik',
            null,
            null,
            '$input->wni',
            '$input->keluarga',
            '$input->tempatlahir',
            '$input->ayah',
            '$input->ibu',
            '$input->alamatktp',
            '$input->kdposktp',
            '$input->kelurahanktp',
            '$input->pendidikanayah',
            '$input->pendidikanibu',
            '$input->pekerjaanayah',
            '$input->pekerjaanibu'
            FROM pasien ";

        if ($this->db->simpleQuery($addPasien)) { //true
            $output['status'] = "sukses";
            $output['pesan']  = "Berhasil";
            $output['no_rm']  = $this->db->query("SELECT no_rm from pasien where nik='$input->nik' ")->getRow()->no_rm;
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
        }

        echo json_encode($output);
    }

    public function updatepasienrwj()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $updatePasien = "UPDATE pasien SET 
            kd_kelurahan='$input->kelurahan',
            kd_pendidikan='$input->pendidikan',
            kd_pekerjaan='$input->pekerjaan',
            kd_perusahaan=null,
            kd_agama='$input->agama',
            nama='$input->namapasien',
            tgl_lahir='$input->tanggallahir',
            gol_darah='$input->goldarah',
            jenis_kelamin='$input->kelamin',
            status_hidup='t',
            status_marita='$input->statusmarital',
            alamat='$input->alamat',
            kota='$input->kabupaten',
            telepon='$input->telepon',
            kd_pos='$input->kdpos',
            nik='$input->nik',
            nama_ayah='$input->ayah',
            kd_pendidikan_ayah='$input->pendidikanayah',
            kd_pekerjaan_ayah='$input->pekerjaanayah',
            nama_ibu='$input->ibu',
            kd_pendidikan_ibu='$input->pendidikanibu',
            kd_pekerjaan_ibu='$input->pekerjaanibu'
            where no_rm='$input->no_rm' ";

        if ($this->db->simpleQuery($updatePasien)) { //true
            $output['status'] = "sukses";
            $output['pesan']  = "Berhasil";
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
        }

        echo json_encode($output);
    }

    public function pendidikan()
    {
        $user =  $this->db->query("SELECT * FROM pendidikan ");
        $output['status']   = 'sukses';
        $output['data']     = $user->getResult();

        echo json_encode($output);
    }

    public function pekerjaan()
    {
        $user =  $this->db->query("SELECT * FROM pekerjaan ");
        $output['status']   = 'sukses';
        $output['data']     = $user->getResult();

        echo json_encode($output);
    }

    public function penatajasaRWJ_detailpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm           = $input->norm;
            $nmapasien      = $input->nmpasien;
            $nik            = $input->nik;
            $unit           = $input->poli;
            $id_pegawai = $input->id_pegawai;
            if (($unit == '') || ($unit == '0')) {
                $paramunit = '';
            } else {
                $paramunit = "AND k.id_unit = '" . $unit . "'";
            }
            $jml            = "LIMIT '" . $input->jml . "'";
            if ($input->jml == 'all') {
                $jml = "";
            }
            $dokter = "AND peg.id_pegawai='$id_pegawai'";
            if ($id_pegawai == 'all' || $id_pegawai == '') {
                $dokter = "";
            }
            $tgl_masuk  = $input->tglkunj;
            //$tgl_transaksi  = '2023-06-14';
            $userunit = $this->db->query("SELECT id_unit from users where id_user='$input->id_user'")->getRow()->id_unit;
            // echo"$userunit";
            // exit(); 
            $query = "
            SELECT
            tr.id_transaksi,
            DATE(tr.tgl_transaksi) as tgl_transaksi,
            k.id_unit,
            u.nama_unit,
            tr.no_rm,
            UPPER(P.nama) as nama,
            UPPER(P.alamat) as alamat,
                    --P.tgl_lahir,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,
                    P.nik,
                    k.posting,
                    k.id_kunjungan,
                    peg.nama_pegawai,
                    pt.id_penjamin,
                    peg.id_pegawai
                    FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama='t'
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg on peg.id_pegawai=k.id_pegawai
                    WHERE
                    u.jenis_unit = '1'
                    AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%') AND P.nik like '%".$nik."%' ".$paramunit."
                        AND DATE(k.tgl_masuk) = '".$tgl_masuk."' 
                        AND pt.penjamin_utama='t'
                        AND u.id_unit in ($userunit)
                        $dokter
                        $jml
                        ";

                    //echo"$query";


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
                    //echo"$query"; 
                    // echo"$query";                 
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    /*proses cetak*/

    function createlabel(){
        $input = json_decode(file_get_contents('php://input'));
        $norm       = $_POST['norm'];
        $nm_pasien  = $_POST['nm_pasien'];
        $modul      = $_POST['modul'];

        if ($modul == ''){
            $output['status']   = "Cetak Label Pasien Gagal!!";
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
        WHERE no_rm = '$norm' AND LEFT (kunjungan.id_unit, 1) = '$modul' 
        AND penjamin_transaksi.penjamin_utama='t' ORDER BY kunjungan DESC";
        //echo"$data";exit();
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
    /*end proses cetak*/
    public function produkunitall()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kel =  $this->db->query("SELECT
        prod.id_produk,
        prod.nama_produk
        FROM
        produk_unit pu
        JOIN produk prod ON pu.id_produk = prod.id_produk 
        WHERE
        id_unit = '$input->id'");
        $output['status'] = 'sukses';
        $output['data'] = $kel->getResult();

        echo json_encode($output);
    }

    public function penatajasaRWJ_detailtindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            // $queryx = " SELECT dk.id_detail_kunjungan, dk.id_produk, p.kd_produk, p.nama_produk, dk.ketrangan, dk.qty FROM detail_kunjungan dk INNER JOIN produk p ON p.id_produk = dk.id_produk WHERE dk.id_kunjungan = '$input->id_kunj' ORDER BY dk.id_detail_kunjungan ASC";
            $query = "SELECT
        dt.tgl_input,
        dk.id_detail_kunjungan,
        dk.id_produk,
        P.kd_produk,
        P.nama_produk,
        dk.ketrangan,
        dk.qty,
        dt.id_Detail_transaksi
        FROM
        detail_kunjungan dk
        INNER JOIN produk P ON P.id_produk = dk.id_produk 
        INNER JOIN detail_transaksi dt on dt.id_detail_kunjungan=dk.id_detail_kunjungan
        WHERE
        dk.id_kunjungan = '$input->id_kunj'";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['pesan']    = "Belum ada detail tindakan";
                    $output['data']     = $queryx;
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'Gagal, Hubungi Admin!!';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function penatajasaRWJ_simpanProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transak',
            'id_kunj',
            'idprd',
            'qty',
            'idtarif'
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        // echo"$input->id_transak<br>";
        // echo"$input->id_kunj<br>";
        // echo"$input->idprd<br>";
        // echo"$input->qty<br>";
        // echo"$input->idtarif";
        // exit();
        if ($this->evalParam($input, $listParam)) {
            $cektutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$input->id_transak'")->getRow()->tgl_tutup;

            if ($cektutuptransaksi == null || $cektutuptransaksi == 'null' || $cektutuptransaksi == '' || empty($cektutuptransaksi)) {
                // $query = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, ketrangan, qty) VALUES ('$input->id_kunj', '$input->idprd', '$input->ket', '$input->qty')";
                //insert detail kunjungan
                $this->db->transStart();
                $querydetailkunjungan = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, qty) 
                VALUES ('$input->id_kunj', '$input->idprd','$input->qty') returning id_detail_kunjungan";

                //echo"$querydetailkunjungan";
                //exit();
                $detail_kunjungan = $this->db->query($querydetailkunjungan)->getRow()->id_detail_kunjungan;
                // echo"$detail_kunjungan";
                // exit();

                $querydetailtransaksi = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, id_tarif, qty,diskon, id_detail_kunjungan) 
                VALUES ('$input->id_transak', '$input->id_kunj', '$input->idprd','$input->idtarif','$input->qty','0','$detail_kunjungan')returning id_detail_transaksi";
                // echo"$querydetailtransaksi";
                // exit();
                $id_detail_transaksi = $this->db->query($querydetailtransaksi)->getRow()->id_detail_transaksi;


                $this->db->transComplete();


                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses menambahkan produk";
                    $output['id_detail_transaksi']    = "$id_detail_transaksi";
                    $output['id_pegawai']    = "$input->idpegawai";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal memasukan produk";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Transaksi sudah di tutup oleh kasir";
            }
        }
        $this->hasil($output);
    }

    public function penatajasaRWJ_deleteProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_kunjungan',
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $cektutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$input->id_transak'")->getRow()->tgl_tutup;
            if ($cektutuptransaksi == null || $cektutuptransaksi == 'null' || $cektutuptransaksi == '' || empty($cektutuptransaksi)) {
                $query = "DELETE FROM detail_kunjungan WHERE id_detail_kunjungan = '$input->id_detail_kunjungan'";

                if ($this->db->simpleQuery($query)) {
                    $output['status']   = "sukses";
                    $output['code']   = "200";
                    $output['pesan']    = "Sukses Hapus Produk";
                } else {
                    $output['status']   = "gagal";
                    $output['code']   = "XX";
                    $output['pesan']    = "Gagal Hapus Produk";
                }
            } else {
                $output['status']   = "gagal";
                $output['code']   = "XX";
                $output['pesan']    = "Transakasi sudah ditutup oleh admin";
            }
        }
        $this->hasil($output);
    }
    public function dokter_pilih()
    {
        $input = json_decode(file_get_contents('php://input'));
        $pegawai =  $this->db->query("SELECT * FROM pegawai  where jenis_pegawai='1' order by nama_pegawai asc ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
}
