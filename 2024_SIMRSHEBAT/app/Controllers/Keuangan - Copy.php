<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Keuangan extends Api
{

    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }

    public function tes()
    {
        // $this->load->model('main/vi_gettrustee');
    }


    public function lookupPendaftaranPasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
            'nama',
            'nik',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $parameter = '';
            if ($input->no_rm > '') {
                $parameter .= "AND no_rm = '$input->no_rm'";
            }
            if ($input->nama > '') {
                $parameter .= "AND nama ILIKE '%$input->nama%'";
            }
            if ($input->nik > '') {
                $parameter .= "AND nik = '$input->nik'";
            }

            if ($parameter == '') {
                $output['pesan'] = "Pasien tidak ditemukan";
            } else {
                $query = "
                    SELECT ROW_NUMBER
                        ( ) OVER ( ORDER BY no_rm ) AS no,
                        pasien.*
                    FROM
                        pasien 
                    WHERE
                        no_rm > '' $parameter
                    ORDER BY
                        no_rm
                ";
                $list_pasien = $this->db->query($query);
                if ($list_pasien->getNumRows() > 0) {
                    $output['status'] = "sukses";
                    $output['data'] = $list_pasien->getResult();
                } else {
                    $output['pesan'] = "Pasien tidak ditemukan";
                }
            }
        }
        $this->hasil($output);
    }

    public function riwayatPenyakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    TO_CHAR(tgl_kunjungan, 'dd/mm/yyyy') AS tgl_kunjungan,
                    id_penyakit,
                    penyakit,
                    status
                FROM
                    mr_penyakit
                    JOIN unit USING ( id_unit )
                    JOIN penyakit USING ( id_penyakit ) 
                    JOIN status_diagnosa USING (status_diag)
                WHERE
                    no_rm = '$input->no_rm' 
                ORDER BY
                    tgl_kunjungan DESC, status_diag ASC
            ";
            $list_penyakit = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_penyakit->getResult();
        }
        $this->hasil($output);
    }

    public function riwayatKunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    TO_CHAR(tgl_masuk, 'dd/mm/yyyy') AS tgl_masuk,
                    nama_unit,
                    nama_pegawai 
                FROM
                    kunjungan
                    JOIN transaksi USING ( id_transaksi )
                    JOIN pegawai USING ( id_pegawai )
                    JOIN unit USING ( id_unit ) 
                WHERE
                    no_rm = '$input->no_rm' 
                ORDER BY
                    tgl_masuk DESC
            ";
            $list_penyakit = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_penyakit->getResult();
        }
        $this->hasil($output);
    }

    public function listNoka()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    * 
                FROM
                    penjamin_pasien
                WHERE
                    no_rm = '$input->no_rm' 
            ";
            $list_penyakit = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_penyakit->getResult();
        }
        $this->hasil($output);
    }

    public function unit()
    {
        $user =  $this->db->query("SELECT * FROM unit where jenis_unit =  '3' ");
        $output['status']   = 'sukses';
        $output['data']     = $user->getResult();
        echo json_encode($output);
    }

    public function mod_kasir()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
        // $id_kunjungan  = str_replace('"', '', json_encode($data->id_kunjungan));

        $kel =  $this->db->query("
            SELECT * FROM
            transaksi
            JOIN kunjungan USING ( id_transaksi )
            JOIN pasien USING ( no_rm )
            JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        // $detailtra =  $this->db->query("
        //     SELECT * FROM
        //     transaksi
        //     JOIN detail_transaksi USING (id_transaksi)
        //     JOIN kunjungan USING ( id_transaksi )
        //     JOIN pasien USING ( no_rm )
        //     JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$id_transaksi' and kunjungan.id_kunjungan='$id_kunjungan ' ");
        // $outputx['detail'] = $detailtra->getResult();

        $data = json_decode(json_encode($outputx), true);

        return view('view/modal/kasirgeneral/mod_kasir', $data);
    }

    public function mod_Bayarkasir()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_Bayarkasir', $data);
    }
    public function mod_DepositPasien()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_deposit', $data);
    }

    public function mod_Bayarkasirpelunasan()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_Bayarkasirpelunasan', $data);
        // return view('view/modal/kasirgeneral/mod_Bayarkasirpelunasan');
    }


    public function mod_historipiutang()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_historypiutang', $data);
        // return view('view/modal/kasirgeneral/mod_Bayarkasirpelunasan');
    }

    public function mod_Penatajasa()
    {
        return view('view/modal//mod_Penatajasa');
    }

    public function simpanpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'norm', 'namapasien'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "INSERT INTO PASIEN ( no_rm, nama ) VALUES (
                -- LPAD((MAX(no_rm)::INTEGER+1)::VARCHAR, 6, '0'),
                '$input->norm'
                '$input->namapasien'
            )";


            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Berhasil Mendaftarkan Pasien";
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        echo json_encode($output);
    }

    public function caripasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kdpasiencariKasir', 'caritgl1', 'caritgl2', 'caristatuslunas', 'jmlpasiencari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            if ($input->caristatustutuptransaksi == 'all') {
                $criteriatutup = "";
            } elseif ($input->caristatustutuptransaksi == 't' || $input->caristatustutuptransaksi == true) {
                $criteriatutup = "AND tra.tgl_tutup is not null";
            } elseif ($input->caristatustutuptransaksi == 'f' || $input->caristatustutuptransaksi == false) {
                $criteriatutup = "AND tra.tgl_tutup is null";
            }


            if ($input->caristatuslunas == 'all') {
                $criterialunas = "";
            } else {
                $criterialunas = "AND tra.lunas='$input->caristatuslunas'";
            }

            if ($input->kdpasiencariKasir == null || $input->kdpasiencariKasir == '') {
                $krierianama = "AND pas.nama ilike '%$input->nmpasiencariKasir%'";
                $krieriakdpasien = "";
            } else {
                $krierianama = "";
                $krieriakdpasien = "AND tra.no_rm = '$input->kdpasiencariKasir'";
            }

            $query = " SELECT
                    * 
                FROM
                    transaksi tra 
                    JOIN pasien pas on tra.no_rm=pas.no_rm
                    where
                    '1'='1'
                    $krieriakdpasien
                    $criterialunas
                    $criteriatutup
                    $krierianama
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
    public function detailtransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            // $query = "SELECT * 
            // FROM
            //     detail_transaksi join produk using(id_produk)
            //     join kunjungan using(id_kunjungan)
            //     join unit using(id_unit)
            //     where detail_transaksi.id_transaksi='$input->id_transaksi' 
            // ";
            $query = "SELECT 
            dt.tgl_input,
            dt.diskon,
            unit.nama_unit,
            dt.id_produk,
            produk.nama_produk,
            dt.qty,
            dt.harga,
            dt.total_harga,
            dt.id_detail_transaksi,
            x.namapeg,
            kunjungan.tgl_masuk
        FROM
            detail_transaksi dt
            join kunjungan using(id_kunjungan)
            join unit using(id_unit)
            join produk using(id_produk)
            LEFT JOIN (
                            SELECT ARRAY_AGG
                        ( peg.nama_pegawai ) AS namapeg,
                        dtx.id_detail_transaksi 
                    FROM
                        detail_transaksi dtx
                        JOIN detail_component dc ON dtx.id_detail_transaksi = dc.id_detail_transaksi
                        JOIN pegawai peg ON dc.id_pegawai = peg.id_pegawai 
                    WHERE
                        dtx.id_transaksi = '$input->id_transaksi' 
                    GROUP BY
                        dtx.id_detail_transaksi 
            ) x ON dt.id_detail_transaksi = x.id_detail_transaksi 
        WHERE
            dt.id_transaksi = '$input->id_transaksi'
            order by dt.id_detail_transaksi desc
            ";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    // $output['pesan']    = "Data Detail Transaksi";
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
    public function KasirG_simpanTransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'in_id_transaksi',
            'in_id_kunjungan',
            'in_id_produk',
            'in_tgl_input',
            'in_id_tarif',
            'in_qty',
            'in_diskon',
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            if ($input->in_diskon == '') {
                $diskon = 0;
            } else {
                $diskon = $input->in_diskon;
            }
            $this->db->transStart();
            //insert detail kunjungan
            $querydetailkunjungan = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, qty) 
            VALUES ('$input->in_id_kunjungan', '$input->in_id_produk','$input->in_qty') returning id_detail_kunjungan";
            $detail_kunjungan = $this->db->query($querydetailkunjungan)->getRow()->id_detail_kunjungan;
            // echo"$querydetailkunjungan";
            // return;
            //insert detail transaksi
            $querydetailtransaksi = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, tgl_input, id_tarif, qty, diskon, id_detail_kunjungan) 
            VALUES ('$input->in_id_transaksi', '$input->in_id_kunjungan', '$input->in_id_produk', '$input->in_tgl_input','$input->in_id_tarif','$input->in_qty','$diskon','$detail_kunjungan')";
            //    echo"$querydetailtransaksi";
            //    exit();
            $this->db->query($querydetailtransaksi);
            $this->db->transComplete();

            // if ($this->db->simpleQuery($query)) {
            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses menambahkan transaksi";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal memasukan transaksi";
                //$output['error']    = $this->db->error()['message'];
                //echo"$query";
            }
        }
        $this->hasil($output);
    }

    public function datapenindakbyiddettransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT
            array_agg(nama_pegawai) as namapeg
        FROM
            detail_component
            JOIN pegawai USING ( id_pegawai ) 
        WHERE
            detail_transaksi.id_transaksi='$input->id_transaksi' 
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data Detail Transaksi";
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

    public function penatajasa_detailpasien()
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
            $unit           = $input->poli;
            if (($unit == '') || ($unit == '0')) {
                $paramunit = '';
            } else {
                $paramunit = "AND k.id_unit = '" . $unit . "'";
            }
            $jml            = $input->jml;
            $tgl_transaksi  = $input->tglkunj;
            //$tgl_transaksi  = '2023-05-24';

            $query = "
                SELECT
                    tr.id_transaksi,
                    k.id_kunjungan,
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
                    peg.nama_pegawai
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg ON peg.id_pegawai=k.id_pegawai
                WHERE
                    u.jenis_unit = '3'    -->> 
                    AND upper(p.nama) like UPPER('" . $nmapasien . "%') AND tr.no_rm like UPPER('" . $norm . "%') AND P.nik like '%" . $nik . "%' " . $paramunit . "
                    AND DATE(tr.tgl_transaksi) = '" . $tgl_transaksi . "' 
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

    public function cariproduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kel =  $this->db->query("SELECT
                                        prod.id_produk,
                                        prod.nama_produk
                                    FROM
                                        produk_unit pu
                                        JOIN produk prod ON pu.id_produk = prod.id_produk 
                                    WHERE
                                        id_unit = '3001'
                                        and prod.nama_produk ilike '%$input->id%' ");
        $output['status'] = 'sukses';
        $output['data'] = $kel->getResult();

        echo json_encode($output);
    }
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
                                        id_unit = '3001'");
        $output['status'] = 'sukses';
        $output['data'] = $kel->getResult();

        echo json_encode($output);
    }
    public function penatajasa_detailtindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = " SELECT dk.id_detail_tindakan, dk.id_produk, p.kd_produk, p.nama_produk, dk.ketrangan, dk.qty FROM detail_kunjungan dk INNER JOIN produk p ON p.id_produk = dk.id_produk WHERE dk.id_kunjungan = '$input->id_kunj' ORDER BY dk.id_detail_tindakan ASC";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['pesan']    = "Data tidak ditemukan";
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
    public function penatajasa_simpanProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunj',
            'idprd',
            'ket',
            'qty',
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, ketrangan, qty) VALUES ('$input->id_kunj', '$input->idprd', '$input->ket', '$input->qty')";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses menambahkan produk";
            } else {
                $output['pesan']    = "Gagal memasukan produk";
            }
        }
        $this->hasil($output);
    }

    public function penatajasa_deleteProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_tindakan',
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "DELETE FROM detail_kunjungan WHERE id_detail_tindakan = '$input->id_detail_tindakan'";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Hapus Produk";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Produk";
            }
        }
        $this->hasil($output);
    }

    public function jenisbayar()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran order by id_jenis_pembayaran asc ");
        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }
    public function jenisbayardeposit()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran  where id_jenis_pembayaran='4' order by id_jenis_pembayaran asc ");
        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }
    public function jenisbayarpelunasan()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran where id_jenis_pembayaran not in ('2','4') order by id_jenis_pembayaran asc ");
        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }

    public function pembayaran()
    {
        $input = json_decode(file_get_contents('php://input'));
        $x =  $this->db->query("SELECT * FROM pembayaran where id_jenis_pembayaran='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }

    public function apakahkartu()
    {
        $input = json_decode(file_get_contents('php://input'));
        $x =  $this->db->query("SELECT * FROM pembayaran where id_pembayaran='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }

    // public function mod_lookkup()
    // {
    //     return view('view/modal/kasirgeneral/mod_lookkup');
    // }

    public function mod_deposit()
    {
        return view('view/modal/kasirgeneral/mod_deposit');
    }

    public function mod_bataltransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_bataltransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
        // return view('view/modal/kasirgeneral/mod_bataltransaksi');
    }
    public function cetakbill()
    {
        $input = json_decode(file_get_contents('php://input'));
        // var_dump($input);
        // exit();
        $validtrans   = $_POST['idtransaksi'];
        // echo"$validtrans";
        // exit();
        $querypasien = $this->db->query("SELECT * FROM
        transaksi
        JOIN pasien USING ( no_rm )
        JOIN kelurahan ON pasien.kd_kelurahan_ktp = kelurahan.kd_kelurahan
        JOIN kecamatan USING ( kd_kecamatan )
        JOIN kabupaten USING ( kd_kabupaten )
        JOIN propinsi USING ( kd_propinsi ) 
     WHERE
         transaksi.id_transaksi = '$validtrans'");


        $query = $this->db->query("SELECT
        kunjungan.tgl_masuk,
        unit.nama_unit,
        produk.nama_produk,
        detail_transaksi.qty,
        detail_transaksi.total_harga
    FROM
        detail_transaksi
        JOIN kunjungan USING ( id_kunjungan ) 
        JOIN produk USING (id_produk)
        JOIN unit USING (id_unit)
    WHERE
        detail_transaksi.id_transaksi = '$validtrans'
        order by kunjungan.tgl_masuk,unit.nama_unit asc");

        $querytotal = $this->db->query("SELECT sum(total_harga) as totalharga FROM
        detail_transaksi
        WHERE
        id_transaksi = '$validtrans'");

        $querybayar = $this->db->query("SELECT * from bayar join pembayaran using(id_pembayaran) WHERE id_transaksi = '$validtrans'");
        // var_dump($querypasien);
        // exit();
        $html = "<html>
            <body>
            <table border='1' align='center' style='width:100%'>
            <tr>
              <td align='center' style='width: 100px;' ><img src='" . base_url('_assets/dist/img/darmayu.png') . "' height='30'></td>
              <td align='center'>RINCIAN BIAYA PELAYANAN<br>RUMAH SAKIT UMUM DARMAYU<br>
              Jl. Dr  Sutomo No 44 – 50 Kelurahan Bangunsari, Kecamatan Ponorogo, Kabupaten Ponorogo. <br>
              Telp 0352-481320, Fax 0352-461253, email rsudarmayu@yahoo.com
              </td>
            </tr>
          </table>

          <table border='1' align='center' style='width:100%'>";
        foreach ($querypasien->getResult() as $datatransaksi); {
            $tgltransaksi = substr($datatransaksi->tgl_transaksi, 0, 10);
            $html .= "<tr>
                <td>No Transaksi</td>
                <td>:</td>
                <td>#" . $datatransaksi->id_transaksi . "</td>
                </tr>
                <tr>
                <td>Tgl Transaksi</td>
                <td>:</td>
                <td>" . date_indo($tgltransaksi) . "</td>
                </tr>
                <tr>
                <td>Nama</td>
                <td>:</td>
                <td>$datatransaksi->nama</td>
                </tr>
                <tr>
                <td>Medrec</td>
                <td>:</td>
                <td>$datatransaksi->no_rm</td>
                </tr>
                <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>" . $datatransaksi->alamat_ktp . ", " . $datatransaksi->kelurahan . ", " . $datatransaksi->kecamatan . "," . $datatransaksi->kabupaten . " " . $datatransaksi->propinsi . " </td>
                </tr>";
        }
        $html .= "</table>

          <table border='1' align='center' style='width:100%'>
            <tr>
            <td style='text-align: center;font-weight: bold;width:50px;'>No</td>
            <td style='text-align: left;font-weight: bold;'>Unit</td>
            <td style='text-align: left;font-weight: bold;'>Deskripsi</td>
            <td style='text-align: center;font-weight: bold;width:50px;'>Jumlah</td>
            <td style='text-align: right;font-weight: bold;width:200px;'>Total</td>
            </tr>
            ";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "
            <tr>
            <td style='text-align: center;'>$no</td>
            <td>$row->nama_unit</td>
            <td>$row->nama_produk</td>
            <td style='text-align: center;'>$row->qty</td>
            <td style='text-align: right;'>" . format_ribuan($row->total_harga) . "</td>
            </tr>
            ";
            $no++;
        }
        foreach ($querytotal->getResult() as $rowtotal) {
            $html .= "
            <tr>
            <td style='text-align: right;font-weight: bold' colspan='4'>Total Biaya</td>
            <td  style='text-align: right;font-weight: bold'>Rp. " . format_ribuan($rowtotal->totalharga) . "</td>
            </tr>
            ";
            $no++;
        }
        foreach ($querybayar->getResult() as $rowtotalbayar) {
            $html .= "
            <tr>
            <td style='text-align: right;font-weight: bold' colspan='4'>" . $rowtotalbayar->deskripsi_pembayaran . "</td>
            <td  style='text-align: right;font-weight: bold;'><i>Rp. " . format_ribuan($rowtotalbayar->jumlah) . "<i></td>
            </tr>
            ";
            $no++;
        }
        $html .= "
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
    public function cetakkwitansi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));
        $idtransaksi   = $_POST['idtransaksi'];
        $idbayar = $_POST['idbayar'];
        $nominal = $_POST['idnominal'];
        $namauser = $_POST['val_namauser'];
        $namapas = $_POST['val_namapas'];
        $freenama = $_POST['val_freenama'];
        $freeuraian = $_POST['val_freeuraian'];
        $iduser = $_POST['val_iduser'];
        $tglsekarang = date("Y-m-d H:i:s");

        //     $querymaxkwitansi = $this->db->query("SELECT * FROM
        //     transaksi
        //     JOIN pasien USING ( no_rm )
        //     JOIN kelurahan ON pasien.kd_kelurahan_ktp = kelurahan.kd_kelurahan
        //     JOIN kecamatan USING ( kd_kecamatan )
        //     JOIN kabupaten USING ( kd_kabupaten )
        //     JOIN propinsi USING ( kd_propinsi ) 
        //  WHERE
        //      transaksi.id_transaksi = '$idtransaksi'");

        $queryinsertnomorkwitansi = "INSERT INTO kwitansi (id_transaksi, id_pembayaran, nominal, id_user, nama_kwitansi,deskripsi)
                                                        VALUES (
                                                        '$idtransaksi',
                                                                '$idbayar',
                                                                '$nominal',
                                                                '$iduser',
                                                                '$freenama',
                                                                '$freeuraian'
                                                         ) returning id_kwitansi";
        //  echo"$queryinsertnomorkwitansi";
        //  exit();                                                
        $id_kwitansi = $this->db->query($queryinsertnomorkwitansi)->getRow()->id_kwitansi;

        $html = "<html>
            <body>
            <div>
    <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td rowspan='5' style='align:center;'><img src='" . base_url('_assets/dist/img/darmayu.png') . "' height='50px'></td>
            <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM DARMAYU
            </td>
        </tr>
        <tr>
            <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Dr Sutomo No 44 – 50 Kelurahan Bangunsari, Kecamatan Ponorogo, Kabupaten Ponorogo</td>
        </tr>
        <tr>
            <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0352-481320, Fax 0352-461253, email rsudarmayu@yahoo.com</td>
        </tr>
    </table>
    <hr>
    
    <table border='0' style='padding-top: 0px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
    <tr>
        <td style='width: 600px;'><div style='padding-top: 0px;padding-bottom:10px;text-align:left;font-weight: bold;font-style: italic;text-decoration: underline;'>KUITANSI Nomor #$id_kwitansi</div></td>
        <td style='width: 400px;text-align:right'><div style='padding-top: 0px;padding-bottom:10px;text-align:right;font-weight: bold;font-style: italic;text-decoration: underline;'>No.Transaksi #$idtransaksi</div></td>
    </tr>
    </table>
    <table border='0' style='padding-top: 0px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td style='width: 150px;font-size:15px;'>Sudah Terima dari</td>
            <td>:</td>
            <td style='width: 500px;font-size:15px;'>$freenama</td>
        </tr>
        <tr>
            <td style='width: 100px;font-size:15px;'>Jumlah Uang</td>
            <td>:</td>
            <td style='width: 500px;font-size:15px;'> <b>Rp. " . format_ribuan($nominal) . "</b></td>
        </tr>
        <tr>
            <td valign='top' style='width: 100px;font-size:15px'>Pembayaran</td>
            <td valign='top'>:</td>
            <td valign='top' style='width: 500px;font-size:15px;'>$freeuraian</td>
        </tr>
    </table>
    <table border='0' style='padding-top: 0px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td valign='top'>Terbilang : </td>
            <td valign='top' style='width: 400px;font-size:15px;text-align:left'> <b>" . terbilang($nominal) . " Rupiah</b></td>
        </tr>
    </table>
   
    <table border='0' style='padding-top: 5px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
        
        <tr>
            <td style='width: 350px;font-size:15px;text-align:center'>

            </td>
            <td style='width: 350px;text-align:center'>
            " . date_indo(substr($tglsekarang, 0, 10)) . "<br>
                Operator <br>
                <br><br><br>
                <u>$namauser</u>
            </td>
        </tr>
    </table>


</div>
            </body>
            </html>";
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'A4',
            'format' => [160, 90]
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
    public function laporanpendapatanrs()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $replacetglwal = str_replace("/", "-", $_POST['tglawal']);
        $dateawal = date_create($replacetglwal);
        $tglawal = date_format($dateawal, "Y-m-d");

        $replacetglakhir = str_replace("/", "-", $_POST['tglakhir']);
        $dateakhir = date_create($replacetglakhir);
        $tglakhir = date_format($dateakhir, "Y-m-d");

        // $tglawal   = $_POST['tglawal'];
        // $tglakhir = $_POST['tglakhir'];
        $id_jenis_pembayaran_laporan = $_POST['id_jenis_pembayaran_laporan'];
        $id_pembayaran_laporan = $_POST['id_pembayaran_laporan'];
        $tglawal_shift1 = $_POST['tglawal_shift1'];
        $tglawal_shift2 = $_POST['tglawal_shift2'];
        $tglawal_shift3 = $_POST['tglawal_shift3'];
        $tglakhir_shift1 = $_POST['tglakhir_shift1'];
        $tglakhir_shift2 = $_POST['tglakhir_shift2'];
        $tglakhir_shift3 = $_POST['tglakhir_shift3'];
        $tglsekarang = date("Y-m-d H:i:s");
        $shift_all = "false";
        $shift_all_2 = "false";

        $dt1         = date_create(date('Y-m-d', strtotime($tglawal)));
        $dt2         = date_create(date('Y-m-d', strtotime($tglakhir)));
        $date_diff     = date_diff($dt1, $dt2);
        $range         =  $date_diff->format("%a");

        $q_waktu = '';
        $q_shift = '';
        $q_shift2 = '';
        $q_shift3 = '';
        $t_shift = '';
        $t_shift2 = '';
        $t_shift3 = '';

        if ($id_pembayaran_laporan == 'all') {
            $idpembayaran = "";
        } else {
            $idpembayaran = "and id_pembayaran='$id_pembayaran_laporan'";
        }

        // echo"$tglawal";echo"<br>";
        // echo"$tglakhir";echo"<br>";
        // echo"$id_jenis_pembayaran_laporan";echo"<br>";
        // echo"$id_pembayaran_laporan";echo"<br>";
        // echo"tglawal_shift1: ".$tglawal_shift1."";echo"<br>";
        // echo"$tglawal_shift2";echo"<br>";
        // echo"$tglawal_shift3";echo"<br>";
        // echo"$tglakhir_shift1";echo"<br>";
        // echo"$tglakhir_shift2";echo"<br>";
        // echo"$tglakhir_shift3";echo"<br>";
        // exit();

        if ($tglawal_shift1 == 'true' && $tglawal_shift2 == 'true' && $tglawal_shift3 == 'true' && $tglakhir_shift1 == 'true' && $tglakhir_shift2 == 'true' && $tglakhir_shift3 == 'true') {
            // echo"a";
            // exit();
            $q_waktu = " ((date(tgl_bayar)) between '" . $tglawal . "' and  '" . $tglakhir . "' ) or date(tgl_bayar) = '" . date('Y-m-d', strtotime($tglakhir . ' +1 day')) . "'  And Shift=4 ";
        } else {
            #GRUP COMBO 1
            if ($shift_all == 'true') {
                $q_shift =    " 
								(
									(
										date(tgl_bayar) = '" . $tglawal . "' And Shift In (1,2,3)
									)     
									Or  
									(
										date(tgl_bayar) = '" . date('Y-m-d', strtotime($tglawal . ' +1 day')) . "'  And Shift=4
								) 

							";
                $t_shift = 'SHIFT (1,2,3)';
            } else {
                if ($tglawal_shift1 == 'true' || $tglawal_shift2 == 'true' || $tglawal_shift3 == 'true') {
                    $s_shift = '';
                    if ($tglawal_shift1 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '1';
                    }
                    if ($tglawal_shift2 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '2';
                    }
                    if ($tglawal_shift3 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '3';
                    }
                    $q_shift .= " date(tgl_bayar) = '" . $tglawal . "'   And Shift In (" . $s_shift . ")";
                    if ($tglawal_shift3 == 'true') {
                        $q_shift = "(" . $q_shift . " Or  ((date(tgl_bayar))= '" . date('Y-m-d', strtotime($tglawal . ' +1 day')) . "'  And Shift=4) )	";
                    }
                    $t_shift = 'SHIFT (' . $s_shift . ')';
                    $q_shift = $q_shift;
                }
            }

            #GRUP COMBO 2
            if ($shift_all_2 == 'true') {
                $q_shift2 =    " 
								(
									(
										date(tgl_bayar) = '" . $tglakhir . "' And shift In (1,2,3)
									)     
									Or  
									(
										date(tgl_bayar) = '" . date('Y-m-d', strtotime($tglakhir . ' +1 day')) . "'  And Shift=4
								) 

							";
                $t_shift2 = 'SHIFT (1,2,3)';
            } else {
                if ($tglakhir_shift1 == 'true' || $tglakhir_shift2 == 'true' || $tglakhir_shift3 == 'true') {
                    $s_shift = '';
                    if ($tglakhir_shift1 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '1';
                    }
                    if ($tglakhir_shift2 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '2';
                    }
                    if ($tglakhir_shift3 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '3';
                    }
                    $q_shift2 .= " date(tgl_bayar) = '" . $tglakhir . "'   And Shift In (" . $s_shift . ")";
                    if ($tglakhir_shift3 == 'true') {
                        $q_shift2 = "(" . $q_shift2 . " Or  ((date(tgl_bayar))= '" . date('Y-m-d', strtotime($tglakhir . ' +1 day')) . "'  And Shift=4) )	";
                    }
                    $t_shift2 = 'SHIFT (' . $s_shift . ')';
                    $q_shift2 = $q_shift2;
                }
            }


            # 3. RANGE PERIODE TGL BERBEDA > 1 HARI
            if ($range > 1) {
                $q_shift3 =    " OR (
								(
									(
										date(tgl_bayar) between '" . date('Y-m-d', strtotime($tglawal . ' +1 day')) . "'  And '" . date('Y-m-d', strtotime($tglakhir . ' -1 day')) . "'  And Shift In (1,2,3)
									)     
									Or  
									(
										date(tgl_bayar) between '" . date('Y-m-d', strtotime($tglawal . ' +2 day')) . "'  And  '" . $tglakhir . "'  And Shift=4
									) 
								)
							";
            }

            $q_waktu = " ((" . $q_shift . ") OR ((" . $q_shift2 . ")) " . $q_shift3 . " )  ";
        }

        $query = $this->db->query("SELECT
                    * 
                FROM
                    bayar 
                    left join transaksi using(id_transaksi)
                    join pembayaran using(id_pembayaran)
                    join pasien using(no_rm)
                    
                WHERE
                $q_waktu    
                $idpembayaran
                order by tgl_bayar asc,id_transaksi");

        $jumlahnominal = $this->db->query("SELECT
                    sum(jumlah) as totaljumlah 
                FROM
                    bayar
                    LEFT JOIN transaksi USING ( id_transaksi )
                    JOIN pembayaran USING ( id_pembayaran )
                    JOIN pasien USING ( no_rm ) 
                WHERE
                $q_waktu
                    $idpembayaran
                ");
                $tes="SELECT
                * 
            FROM
                bayar 
                left join transaksi using(id_transaksi)
                join pembayaran using(id_pembayaran)
                join pasien using(no_rm)
                
            WHERE
            $q_waktu
            $idpembayaran
            order by tgl_bayar asc,id_transaksi";
        // echo"$tes";
        // exit();

        $tglawal_shift1 = $_POST['tglawal_shift1'];
        $tglawal_shift2 = $_POST['tglawal_shift2'];
        $tglawal_shift3 = $_POST['tglawal_shift3'];
        $tglakhir_shift1 = $_POST['tglakhir_shift1'];
        $tglakhir_shift2 = $_POST['tglakhir_shift2'];
        $tglakhir_shift3 = $_POST['tglakhir_shift3'];

        if ($tglawal_shift1 == 'true') {
            $v_shift1 = '1';
        } else {
            $v_shift1 = '';
        }

        if ($tglawal_shift2 == 'true') {
            $v_shift2 = '2';
        } else {
            $v_shift2 = '';
        }

        if ($tglawal_shift3 == 'true') {
            $v_shift3 = '3';
        } else {
            $v_shift3 = '';
        }

        if ($tglakhir_shift1 == 'true') {
            $v_shift1_x = '1';
        } else {
            $v_shift1_x  = '';
        }

        if ($tglakhir_shift2 == 'true') {
            $v_shift2_x = '2';
        } else {
            $v_shift2_x  = '';
        }

        if ($tglakhir_shift3 == 'true') {
            $v_shift3_x = '3';
        } else {
            $v_shift3_x  = '';
        }

        $html = "<html>
            <body>
            <div>
    <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td rowspan='5' style='align:center;'><img src='" . base_url('_assets/dist/img/darmayu.png') . "' height='50px'></td>
            <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM DARMAYU
            </td>
        </tr>
        <tr>
            <td style='width: 650px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Dr Sutomo No 44 – 50 Kelurahan Bangunsari, Kecamatan Ponorogo, Kabupaten Ponorogo</td>
        </tr>
        <tr>
            <td style='width: 650px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0352-481320, Fax 0352-461253, email rsudarmayu@yahoo.com</td>
        </tr>
    </table>
    <hr>
    <div style='text-align:center';paddibg-top:15px>Laporan Penerimaan Pasien $tglawal Shift ($v_shift1,$v_shift2,$v_shift3) sd $tglakhir Shift ($v_shift1_x,$v_shift2_x,$v_shift3_x) </div>

    <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
    <tr>
    <td><b>Waktu Bayar</b></td>
    <td><b>No. Transaksi</b></td>
    <td><b>Shift</b></td>
    <td><b>No.Rm</b></td>
    <td><b>Nama Pasien</b></td>
    <td><b>Pembayaran</b></td>
    <td style='text-align:right'><b>Nominal</b></td>
    </tr>
    ";
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
       <td>$row->tgl_bayar</td>
       <td>$row->id_transaksi</td>
       <td>$row->shift</td>
       <td>$row->no_rm</td>
       <td>$row->nama</td>
       <td>$row->deskripsi_pembayaran</td>
       <td style='text-align:right'>" . format_ribuan($row->jumlah) . "</td>

       </tr>
       ";
        };
        foreach ($jumlahnominal->getResult() as $rowjumlahnominal) {
            $html .= "<tr>
       <td colspan='6'>Jumlah</td>
       <td style='text-align:right'>" . format_ribuan($rowjumlahnominal->totaljumlah) . "</td>

       </tr>
       ";
        };

        $html .= "</table>
    

    

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
    public function kunjunganpas()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
      * 
  FROM
      transaksi tra
      JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi
      JOIN unit un ON kun.id_unit = un.id_unit and un.jenis_unit in ('1','2','3')
  WHERE
      tra.id_transaksi = '$input->idtrans'
      AND kun.aktif='t';
       ");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function penjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
        * 
    FROM
        penjamin_transaksi join penjamin using(id_penjamin)
    WHERE
        id_transaksi = '$input->idtrans' order by penjamin_utama desc;
       ");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function kelolapenjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
        * 
    FROM
        penjamin
            where id_penjamin not in (SELECT
        id_penjamin
    FROM
        penjamin
        LEFT JOIN penjamin_transaksi USING ( id_penjamin ) 
    WHERE
        id_transaksi = '$input->idtrans')");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function getProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_unit'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $listProdukx = $this->db->query("SELECT P.id_produk,P.kd_produk,P.nama_produk,un.nama_unit,tar.harga,tar.id_tarif
            FROM
           produk
           P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk
               INNER JOIN tarif tar ON tar.id_produk=pu.id_produk
           INNER JOIN unit un ON un.id_unit = pu.id_unit 
       WHERE pu.id_unit = '$input->id_unit'");

            $listProduk = $this->db->query("SELECT 
            P.id_produk,
            P.kd_produk,
            P.nama_produk,
            un.nama_unit,
            tar.harga,
            tar.id_tarif,
            tar.id_penjamin 
        FROM
            produk
            P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk
            INNER JOIN tarif tar ON tar.id_produk = pu.id_produk
            INNER JOIN unit un ON un.id_unit = pu.id_unit 
        WHERE
            pu.id_unit = '$input->id_unit' and id_penjamin='$input->id_penjamin'");

            if ($listProduk->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "Produk ditemukan";
                $output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Produk tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    public function mod_lookkup_jas()
    {
        $data = json_decode($_GET['data']);
        $id_detail_transaksi  = str_replace('"', '', json_encode($data->id_detailtransaksi));
        // var_dump($data->id_detailtransaksi);
        // exit;
        $query =  $this->db->query("SELECT
        dt.id_detail_transaksi,
        tar.id_tarif,
        pr.id_produk,
        pr.kd_produk,
        pr.nama_produk,
        jc.jenis_component,
        tc.operator,
        dc.harga,
        peg.nama_pegawai
    FROM
        detail_transaksi dt
        JOIN tarif tar ON dt.id_tarif = tar.id_tarif 
        JOIN produk pr on tar.id_produk = pr.id_produk
        JOIN detail_component dc ON dt.id_detail_transaksi=dc.id_detail_transaksi
        JOIN tarif_component tc ON tc.id_tarif=tar.id_tarif and dc.id_jenis_component=tc.id_jenis_component
        JOIN jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
        LEFT JOIN pegawai peg ON peg.id_pegawai=dc.id_pegawai
    WHERE
        dt.id_detail_transaksi='$id_detail_transaksi'
             ");
        $outputx['data'] = $query->getResult();

        $data = json_decode(json_encode($outputx), true);

        return view('view/modal/kasirgeneral/mod_lookkup_jas', $data);
    }
    public function mod_lookkup_jas2()
    {
        $data = json_decode($_GET['data']);
        $id_detail_transaksi  = str_replace('"', '', json_encode($data->id_detailtransaksi));
        // var_dump($data->id_detailtransaksi);
        // exit;
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $outputx['data'] = $data->id_detailtransaksi;

        $data = json_decode(json_encode($outputx), true);

        return view('view/modal/kasirgeneral/mod_lookkup_jas', $data);
    }
    public function pegawaibyid()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT * from pegawai where jenis_pegawai = '1'");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function selectdetailcomponent()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detailtransaksi'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {

            $listProduk = $this->db->query("SELECT
        dt.id_detail_transaksi,
        jc.id_jenis_component,
        tar.id_tarif,
        pr.id_produk,
        pr.kd_produk,
        pr.nama_produk,
        jc.jenis_component,
        tc.operator,
        dc.harga,
        peg.nama_pegawai,
        peg.id_pegawai,
        jc.edit
    FROM
        detail_transaksi dt
        JOIN tarif tar ON dt.id_tarif = tar.id_tarif 
        JOIN produk pr on tar.id_produk = pr.id_produk
        JOIN detail_component dc ON dt.id_detail_transaksi=dc.id_detail_transaksi
        JOIN tarif_component tc ON tc.id_tarif=tar.id_tarif and dc.id_jenis_component=tc.id_jenis_component
        JOIN jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
        LEFT JOIN pegawai peg ON peg.id_pegawai=dc.id_pegawai
    WHERE
        dt.id_detail_transaksi='$input->id_detailtransaksi'");

            if ($listProduk->getNumRows() > 0) {
                $output['status']   = "sukses";
                //$output['pesan']    = "Component ditemukan";
                $output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Componen tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    public function updatedetailcomponentpeg()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'valueidpeg', 'valueiddetailtransaksi', 'valueidjeniscomponent'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $query = "UPDATE detail_component SET id_pegawai ='$input->valueidpeg' where id_detail_transaksi= '$input->valueiddetailtransaksi' and id_jenis_component='$input->valueidjeniscomponent'";
            //         echo "$a";
            //         exit;
            //         $listProduk = $this->db->query("UPDATE detail_component SET id_pegawai ='$input->valueidpeg' where id_detail_transaksi= '$input->valueiddetailtransaksi' and id_jenis_component='$input->valueidjeniscomponent'
            // ");

            if ($this->db->simpleQuery($query)) {

                $output['status']   = "sukses";
                $output['pesan']    = "Component Berhasil Diupdate";
                //$output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Componen tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    public function Kasir_deletetindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi', 'id_transaksi'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $querycekbayar =  $this->db->query("SELECT * from bayar where id_transaksi='$input->id_transaksi'");
            if ($querycekbayar->getNumRows() <= 0) {
                $iddetailkunjungan = $this->db->query("SELECT id_detail_kunjungan from detail_transaksi where id_detail_transaksi='$input->id_detail_transaksi'")->getRow()->id_detail_kunjungan;
                $queryhapus = "DELETE FROM detail_kunjungan WHERE id_detail_kunjungan = '$iddetailkunjungan'";
                // $iddetailkunjungan = $this->db->query("SELECT id_detail_kunjungan from detail_transaksi where id_detail_transaksi='$input->id_detail_transaksi'")->getRow()->id_detail_kunjungan;
                // $queryhapus = "DELETE FROM detail_transaksi WHERE id_detail_transaksi = '$input->id_detail_transaksi'";
                if ($this->db->simpleQuery($queryhapus)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus Transaksi";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Transaksi";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Pembayaran Sudah dilakukan";
            }
        }
        $this->hasil($output);
    }
    public function Kasir_pergantianshift()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_shiftsaatini', 'val_shifselanjutnya', 'val_tanggalshift', 'val_jamshift', 'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $waktutransaksi = "" . $input->val_tanggalshift . " " . "$input->val_jamshift";
        $replace = str_replace("/", "-", $waktutransaksi);
        $date = date_create($replace);
        $val_date2 = date_format($date, "Y-m-d H:i:s");
        $kode = "KASIR_RS";

        if ($this->evalParam($input, $listParam)) {
            $gantishift = "UPDATE ganti_shift set shift='$input->val_shifselanjutnya',last_update='$val_date2' where kode='$kode'";
            $insertlog = "INSERT INTO log_ganti_shift (tanggal_ganti,id_user,shift_ke,kode)
                values('$val_date2','$input->val_id_user','$input->val_shifselanjutnya','$kode')";
            $this->db->query($insertlog);

            if ($this->db->simpleQuery($gantishift)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Ganti Shift";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hubungi Admin";
            }
        }
        $this->hasil($output);
    }
    public function tampilsjp()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = " SELECT * FROM
            penjamin_transaksi
						join penjamin using (id_penjamin)
           where penjamin_transaksi.id_transaksi='$input->id_transaksi'
               ";
            $list_sjp = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_sjp->getResult();
        }
        $this->hasil($output);
    }
    public function totalyangharusdibayar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->id_transaksi'";
            $querybayar = "select sum(jumlah) as sudahdibayar from bayar where id_transaksi='$input->id_transaksi'";
            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $hasil = $totalnominal - $totalnominalsudahdibayar;
            //echo"$hasil";
            //exit();


            //    $query = "WITH total_bayar AS ( SELECT $input->id_transaksi id_transaksi, SUM ( jumlah ) jumlah_bayar FROM bayar WHERE id_transaksi = $input->id_transaksi ) SELECT SUM
            //    ( total_harga ) - AVG ( jumlah_bayar ) totalharusdibayar 
            //    FROM
            //        detail_transaksi
            //        JOIN total_bayar USING ( id_transaksi ) 
            //    WHERE
            //        id_transaksi = '$input->id_transaksi' "; 

            //        echo"$query";
            $sum = $hasil;
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    public function totalyangharusdibayarpelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            ( debit ) AS totalharusdibayar,
            id_piutang
        FROM
            piutang 
        WHERE
            id_transaksi = '$input->id_transaksi' 
            and id_referensi='$input->id_bayar'
            and (kredit is null or kredit=0)
            ";
            // echo"$query";
            // exit();
            $id_piutang = $this->db->query($query)->getRow()->id_piutang;
            $querybayar = "SELECT sum(debit) as sudahdibayar from kas where id_transaksi='$input->id_transaksi' 
                             and id_referensi='$id_piutang'
                             AND id_jenis_aktivitas_keuangan in ('4')";
            // echo"$querybayar";
            // exit();

            $queryperbaikan = "SELECT sum(kredit) as diperbaiki from kas where id_transaksi='$input->id_transaksi' 
                             and id_referensi='$id_piutang'
                             AND id_jenis_aktivitas_keuangan in ('7')";

            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $totalperbaikan = $this->db->query($queryperbaikan)->getRow()->diperbaiki;

            $hasil = $totalnominal - $totalnominalsudahdibayar + $totalperbaikan;
            // echo"$hasil";
            // exit();


            //    $query = "WITH total_bayar AS ( SELECT $input->id_transaksi id_transaksi, SUM ( jumlah ) jumlah_bayar FROM bayar WHERE id_transaksi = $input->id_transaksi ) SELECT SUM
            //    ( total_harga ) - AVG ( jumlah_bayar ) totalharusdibayar 
            //    FROM
            //        detail_transaksi
            //        JOIN total_bayar USING ( id_transaksi ) 
            //    WHERE
            //        id_transaksi = '$input->id_transaksi' "; 

            //        echo"$query";
            $sum = $hasil;
            // echo"$sum";
            // exit();
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    public function totalsisadepositpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_norm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT SUM
            ( kredit ) - SUM ( debit ) AS sisadeposit 
        FROM
            deposit 
        WHERE
            no_rm = '$input->val_norm'
            ";
            // echo"$query";
            // exit();
            $hasil = $this->db->query($query)->getRow()->sisadeposit;

            $sum = $hasil;
            // echo"$sum";
            // exit();
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();
        }
        $this->hasil($output);
    }
    public function lihatshifkasir()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $hasil = $this->db->query($query)->getRow()->shift;
        if (!$hasil) {
            $output['status'] = "gagal";
            $output['code'] = "XX";
            $output['pesan'] = "gagal mengambil shift";
        } else {
            $output['status'] = "sukses";
            $output['data'] = $hasil;
        }


        $this->hasil($output);
    }
    public function tampilhisbayar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = " SELECT * FROM
            bayar join pembayaran using (id_pembayaran)
            join users using(id_user)
           where bayar.id_transaksi='$input->id_transaksi'
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhispiutang()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = " SELECT * FROM
            bayar join pembayaran using (id_pembayaran)
            join jenis_pembayaran using (id_jenis_pembayaran)
            join users using(id_user)
           where bayar.id_transaksi='$input->id_transaksi'
           and jenis_pembayaran.id_jenis_pembayaran='2'
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilpenjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            *,
        CASE
                WHEN penjamin_utama = 't' THEN
                'PENJAMIN UTAMA' ELSE' ' 
            END AS penjaminutama 
        FROM
            penjamin_transaksi
            JOIN penjamin USING ( id_penjamin ) 
        WHERE
            id_transaksi = '$input->id_transaksi'
               ";
            $wow = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $wow->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhispembayaranpiutang()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT id_piutang from piutang where id_transaksi='$input->id_transaksi'
            and id_referensi='$input->id_bayar'
            ";
            // echo"$query";
            // exit();
            $id_piutang = $this->db->query($query)->getRow()->id_piutang;
            $query = "SELECT
            * 
        FROM
            kas join jenis_aktivitas_keuangan using(id_jenis_aktivitas_keuangan)
            join users using(id_user)
        WHERE
            id_referensi = '$id_piutang' 
            AND id_transaksi='$input->id_transaksi'
            AND id_jenis_aktivitas_keuangan in ('4')
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhisdeposit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            * 
        FROM
            deposit 
            join users USING(id_user)
        WHERE
            no_rm ='$input->no_rm'
            and debit=0";
            // echo"$query";
            // exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhispembayaranpiutang_perbaikan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT id_piutang from piutang where id_transaksi='$input->id_transaksi'
            and id_referensi='$input->id_bayar'
            ";
            // echo"$query";
            // exit();
            $id_piutang = $this->db->query($query)->getRow()->id_piutang;
            $query = "SELECT
            * 
        FROM
            kas join jenis_aktivitas_keuangan using(id_jenis_aktivitas_keuangan)
            join users using(id_user)
        WHERE
            id_referensi = '$id_piutang' 
            AND id_transaksi='$input->id_transaksi'
            AND id_jenis_aktivitas_keuangan in ('7')
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilprodukunit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            * 
        FROM
            produk
            LEFT JOIN produk_unit USING ( id_produk )
            LEFT JOIN tarif ON tarif.id_produk = produk.id_produk 
            AND tarif.id_penjamin = '1'
            JOIN unit USING (id_unit)
            where produk_unit.id_unit in (
            select id_unit from kunjungan where id_transaksi='102'
            )
            order by produk.nama_produk,unit.nama_unit asc
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function Buka_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi', 'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();

            $querylog = "INSERT INTO log_buka_transaksi (id_transaksi,id_user,alasan) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan'
            )";
            // echo"$querylog";
            // exit();
            $this->db->query($querylog);

            // $queryupdatetransaksi = "UPDATE transaksi SET lunas ='f' where id_transaksi= '$input->val_id_transaksi'";
            $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup = NULL where id_transaksi= '$input->val_id_transaksi'";
            //  echo"$queryupdatetransaksi";
            // exit();
            $this->db->query($queryupdatetransaksi);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Buka Transaksi";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Buka Transaksi";
            }
        }
        $this->hasil($output);
    }


    public function cekpostingtransaksiKasir()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "gagal";
        $output['code'] = "XX";
        if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT
            * 
        FROM
            kunjungan 
            join unit using(id_unit)
        WHERE
            id_transaksi = '$input->val_id_transaksi' 
            AND posting = 'f' 
            LIMIT 1");

            if ($query->getNumRows() > 0) {
                foreach ($query->getResult() as $row) {
                    $namaunit = $row->nama_unit;
                };
                $output['status'] = "sukses";
                $output['pesan'] = "Ada unit yang Belum Posting Transaksi UNIT $namaunit";
                $output['code'] = "XX";
            } else {
                $output['status'] = "sukses";
                $output['pesan'] = "Silahkan klik tombol tutup transaksi";
                $output['code'] = "200";
            }
            $output['data'] = $query->getResult();
        }
        $this->hasil($output);
    }
    public function paidtransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_pembayaran', 'val_idtransaksi', 'val_jumlahbayarkasir', 'val_tglbayar', 'id_user', 'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');
        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }
        // komen jangan dihapus
        // if ($jam >= '07' && $jam < '14') {
        //     $shit = '1';
        // } elseif ($jam >= '14' && $jam < '21') {
        //     $shit = '2';
        // } elseif ($jam >= '21') {
        //     $shit = '3';
        // } elseif ($jam < '7') {
        //     $shit = '4';
        // }

        if ($this->evalParam($input, $listParam)) {
            $query = "INSERT INTO bayar ( id_transaksi, id_pembayaran, jumlah, id_user, tgl_bayar, shift )
            VALUES (
                '$input->val_idtransaksi',
                '$input->val_id_pembayaran',
                '$input->val_jumlahbayarkasir',
                '$input->id_user',
                '$valwaktutransaksi',
                '$shit'
            )";
            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function tambahdeposit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_norm', 'val_jumlahbayarkasir', 'val_tglbayar', 'id_user', 'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');
        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }
        // komen jangan dihapus
        // if ($jam >= '07' && $jam < '14') {
        //     $shit = '1';
        // } elseif ($jam >= '14' && $jam < '21') {
        //     $shit = '2';
        // } elseif ($jam >= '21') {
        //     $shit = '3';
        // } elseif ($jam < '7') {
        //     $shit = '4';
        // }

        if ($this->evalParam($input, $listParam)) {
            $query = "INSERT INTO deposit (tgl_deposit, no_rm, id_user, shift, kredit,id_jenis_aktivitas_keuangan)
            VALUES (
                '$valwaktutransaksi',
                '$input->val_norm',
                '$input->id_user',
                '$shit',
                '$input->val_jumlahbayarkasir',
                '8'
            )";
            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Deposit Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function paidtransaksipelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if ($input->val_jumlahbayarkasir < 0) {
            $idjenisaktivitas = '7';
        } else {
            $idjenisaktivitas = '4';
        }

        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }
        // komen jangan di hapus jika otomatis tanpa tutup buka shift
        // if ($jam >= '07' && $jam < '14') {
        //     $shit = '1';
        // } elseif ($jam >= '14' && $jam < '21') {
        //     $shit = '2';
        // } elseif ($jam >= '21') {
        //     $shit = '3';
        // } elseif ($jam < '7') {
        //     $shit = '4';
        // }
        if ($this->evalParam($input, $listParam)) {
            $idreferensi = $this->db->query("SELECT
                        id_piutang 
                        FROM
                        piutang 
                        WHERE
                        id_referensi = '$input->val_idbayar' 
                        AND 
                        id_transaksi = '$input->val_idtransaksi' 
                        AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;

            //  echo"$idreferensi";
            //  exit();
            $query = "INSERT INTO kas ( id_transaksi, debit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
                                            VALUES (
                                                '$input->val_idtransaksi',
                                                '$input->val_jumlahbayarkasir',
                                                '$valwaktutransaksi',
                                                '$idjenisaktivitas',
                                                '$idreferensi',
                                                '$input->id_user',
                                                '$shit'
                                            )";

            //  echo"$query";
            //  exit();                           
            // $query = "INSERT INTO piutang ( id_transaksi,id_referensi, kredit, id_jenis_aktivitas_keuangan, id_user, shift )
            // VALUES (
            //     '$input->val_idtransaksi',
            //     '$idreferensi',
            //     '$input->val_jumlahbayarkasir',
            //     '4',
            //     '$input->id_user',
            //     '$shit'
            // )";
            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function hapustransaksipelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if ($input->val_jumlahbayarkasir > 0) {
            $idjenisaktivitas = '7';
        }


        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }

        if ($this->evalParam($input, $listParam)) {
            $idreferensi = $this->db->query("SELECT
                        id_piutang 
                        FROM
                        piutang 
                        WHERE
                        id_referensi = '$input->val_idbayar' 
                        AND 
                        id_transaksi = '$input->val_idtransaksi' 
                        AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;


            $query = "INSERT INTO kas ( id_transaksi, kredit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
                                            VALUES (
                                                '$input->val_idtransaksi',
                                                '$input->val_jumlahbayarkasir',
                                                '$valwaktutransaksi',
                                                '$idjenisaktivitas',
                                                '$idreferensi',
                                                '$input->id_user',
                                                '$shit'
                                            )";

            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil direvisi";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function hapusdepositperbaikan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_nominalhapus',
            'val_norm',
            'id_user'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $idjenisaktivitas = '10';



        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '08') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }

        if ($this->evalParam($input, $listParam)) {
            $keterangan = "Perbaikan deposit pasien " . $input->val_norm . "";
            $query = "INSERT INTO deposit (tgl_deposit,no_rm,id_user,shift,debit,id_jenis_aktivitas_keuangan,keterangan)
                                            VALUES (
                                                '$valwaktutransaksi',
                                                '$input->val_norm',
                                                '$input->id_user',
                                                '$shit',
                                                '$input->val_nominalhapus',
                                                '$idjenisaktivitas',
                                                '$keterangan'
                                            )";
            //  echo"$query"; 
            //  exit();                  
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Deposit Berhasil direvisi";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    // public function paidtransaksipelunasanperbaikan()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'val_idtransaksi',
    //         'val_jumlahbayarkasir',
    //         'val_tglbayar',
    //         'id_user',
    //         'val_jambayar'
    //     ];
    //     $output = array();
    //     $output['status'] = "gagal";
    //     $output['pesan'] = "";

    //     $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
    //     $replace = str_replace("/", "-", $waktutransaksi);

    //     $date = date_create($replace);
    //     $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
    //     $jam = $date->format('H');

    //     $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
    //     $shiftsekarang = $this->db->query($query)->getRow()->shift;

    //     if(($jam <= '07') && ($shiftsekarang==3 || $shiftsekarang=='3')){
    //         $shit = '4';
    //     }
    //     else{
    //         $shit = $shiftsekarang;
    //     }
    //     // komen jangan di hapus jika otomatis tanpa tutup buka shift
    //     // if ($jam >= '07' && $jam < '14') {
    //     //     $shit = '1';
    //     // } elseif ($jam >= '14' && $jam < '21') {
    //     //     $shit = '2';
    //     // } elseif ($jam >= '21') {
    //     //     $shit = '3';
    //     // } elseif ($jam < '7') {
    //     //     $shit = '4';
    //     // }
    //     if ($this->evalParam($input, $listParam)) {
    //         $idreferensi = $this->db->query("SELECT
    //                     id_piutang 
    //                     FROM
    //                     piutang 
    //                     WHERE
    //                     id_referensi = '$input->val_idbayar' 
    //                     AND 
    //                     id_transaksi = '$input->val_idtransaksi' 
    //                     AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;

    //         //  echo"$idreferensi";
    //         //  exit();
    //         $query = "INSERT INTO kas ( id_transaksi, debit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
    //                                         VALUES (
    //                                             '$input->val_idtransaksi',
    //                                             '$input->val_jumlahbayarkasir',
    //                                             '$valwaktutransaksi',
    //                                             '4',
    //                                             '$idreferensi',
    //                                             '$input->id_user',
    //                                             '$shit'
    //                                         )";
    //             //  echo"$query";
    //             //  exit();                           
    //         // $query = "INSERT INTO piutang ( id_transaksi,id_referensi, kredit, id_jenis_aktivitas_keuangan, id_user, shift )
    //         // VALUES (
    //         //     '$input->val_idtransaksi',
    //         //     '$idreferensi',
    //         //     '$input->val_jumlahbayarkasir',
    //         //     '4',
    //         //     '$input->id_user',
    //         //     '$shit'
    //         // )";
    //         // echo"$query";
    //         // exit();
    //         if ($this->db->simpleQuery($query)) { //true
    //             $output['status']   = "sukses";
    //             $output['code']     = "00";
    //             $output['pesan']    = "Pembayaran Berhasil";
    //         } else {
    //             $output['code']     = "XX";
    //             $output['status']   =  'gagal simpan';
    //             $output['pesan']    = $this->db->error()['message'];
    //             //echo"$query";

    //         }
    //     }
    //     $this->hasil($output);
    // }

    public function hapusbayarpelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);
        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');
        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;
        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }
        if ($this->evalParam($input, $listParam)) {
            $idreferensi = $this->db->query("SELECT
                        id_piutang 
                        FROM
                        piutang 
                        WHERE
                        id_referensi = '$input->val_idbayar' 
                        AND 
                        id_transaksi = '$input->val_idtransaksi' 
                        AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;
            //  echo"$idreferensi";
            //  exit();
            $query = "INSERT INTO kas ( id_transaksi, debit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
                                            VALUES (
                                                '$input->val_idtransaksi',
                                                '$input->val_jumlahbayarkasir',
                                                '$valwaktutransaksi',
                                                '4',
                                                '$idreferensi',
                                                '$input->id_user',
                                                '$shit'
                                            )";
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function Kasir_deletepembayaran()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idbayar', 'val_idtransakasi', 'val_idpembayaran'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $tutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$input->val_idtransakasi'")->getRow()->tgl_tutup;
            if ($tutuptransaksi == null) {
                $queryidpembayaran = "SELECT
                                                * 
                                            FROM
                                                pembayaran
                                                JOIN jenis_pembayaran USING ( id_jenis_pembayaran ) 
                                            WHERE
                                                id_pembayaran = '$input->val_idpembayaran'";
                $rowidpembayaran = $this->db->query($queryidpembayaran)->getRow()->id_jenis_pembayaran;
                if ($rowidpembayaran == 1 || $rowidpembayaran == '1') {
                    $idreferensi = $this->db->query("SELECT
                                                    id_kas 
                                                FROM
                                                    kas 
                                                WHERE
                                                    id_referensi = '$input->val_idbayar' 
                                                    AND id_transaksi = '$input->val_idtransakasi' 
                                                    AND id_jenis_aktivitas_keuangan = '1'")->getRow()->id_kas;
                } elseif ($rowidpembayaran == 2 || $rowidpembayaran == '2') {
                    $idreferensi = $this->db->query("SELECT
                    id_piutang 
                FROM
                    piutang 
                WHERE
                    id_referensi = '$input->val_idbayar' 
                    AND id_transaksi = '$input->val_idtransakasi' 
                    AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;
                }

                $querylog = "INSERT INTO log_hapus_bayar (id_transaksi,id_user,nominal,alasan) VALUES (
                        '$input->val_idtransakasi',
                        '$input->val_iduser',
                        '$input->val_nominal',
                        '$input->val_alasan'
                    )";
                // echo"$querylog";

                $this->db->query($querylog);
                // $this->db->simpleQuery($querylog);
                $queryinsereditbayarhistori = "INSERT INTO history_edit_bayar (id_user,nominal,alasan,id_jenis_pembayaran,id_transaksi,id_referensi) 
                VALUES (
                    '$input->val_iduser',
                    '$input->val_nominal',
                    '$input->val_alasan',
                    '$rowidpembayaran',
                    '$input->val_idtransakasi',
                    '$idreferensi'
                )";
                // $queryhapus = "DELETE FROM bayar WHERE id_bayar = '$input->val_idbayar'";
                // echo"$queryinsereditbayarhistori";
                // exit();
                if ($this->db->simpleQuery($queryinsereditbayarhistori)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus Pembayaran";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Bayar";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Transaksi, transaksi sudah tertutup";
            }
            // echo"$queryhapus";
            // exit();
        }
        $this->hasil($output);
    }
    public function Kasir_deletepenjaminhistory()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_penjamin', 'idtransaksi', 'nosjp'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $queryhapus = "DELETE FROM penjamin_transaksi WHERE id_penjamin = '$input->id_penjamin'
                and id_transaksi = '$input->idtransaksi' and no_sjp = '$input->nosjp'";

            if ($this->db->simpleQuery($queryhapus)) {


                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Hapus penjamin";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus penjamin";
            }
        }
        $this->hasil($output);
    }
    public function mod_bukatransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_bukatransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_KasirPEnjamintransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_kasirpenjamintransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_lookkup()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_lookkup', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_tutuptransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_tutuptransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_tutuptransaksi');
    }
    public function XXXBuka_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi', 'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();

            $querylog = "INSERT INTO log_buka_transaksi (id_transaksi,id_user,alasan) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan'
            )";
            // echo"$querylog";
            // exit();
            $this->db->query($querylog);

            // $queryupdatetransaksi = "UPDATE transaksi SET lunas ='f' where id_transaksi= '$input->val_id_transaksi'";
            $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup = NULL where id_transaksi= '$input->val_id_transaksi'";
            //  echo"$queryupdatetransaksi";
            // exit();
            $this->db->query($queryupdatetransaksi);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Buka Transaksi";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Buka Transaksi";
            }
        }
        $this->hasil($output);
    }
    public function tambahtransaksipenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_user'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            // echo"$input->apakahutama";
            // exit();
            if ($input->apakahutama == 't') {
                // echo"aasasa";
                // exit(); 
                $update = "UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->id_transaksi'";
                $this->db->query($update);

                $querinsert = "INSERT INTO penjamin_transaksi (id_penjamin,id_transaksi,penjamin_utama,no_sjp) VALUES (
                    '$input->id_penjamin',
                    '$input->id_transaksi',
                    '$input->apakahutama',
                    '$input->sep'
                )";
                $this->db->query($querinsert);
            } else {
                // echo"xxx";
                // exit(); 
                // echo"$input->id_penjamin";
                // echo"$input->val_id_transaksi";
                // echo"$input->apakahutama";
                // echo"$input->sep";

                // exit();
                $querinsert = "INSERT INTO penjamin_transaksi (id_penjamin,id_transaksi,penjamin_utama,no_sjp) VALUES (
                    '$input->id_penjamin',
                    '$input->id_transaksi',
                    '$input->apakahutama',
                    '$input->sep'
                )";
                // echo"$querinsert";
                // exit();              
                $this->db->query($querinsert);
            }



            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Tambah Penjamin";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Sukses Tambah Penjamin";
            }
        }
        $this->hasil($output);
    }
    public function Batal_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi', 'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $querycekbayar =  $this->db->query("SELECT * from bayar where id_transaksi='$input->val_id_transaksi'");
            if ($querycekbayar->getNumRows() <= 0) {


                $this->db->transStart();

                $querylog = "INSERT INTO log_batal_transaksi (id_transaksi,id_user,alasan) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan'
            )";
                // echo"$querylog";
                // exit();
                $this->db->query($querylog);
                //delete transaksi detail
                $querydeletetransaksidetail = "DELETE from detail_transaksi where id_transaksi= '$input->val_id_transaksi'";
                // echo"$querydeletetransaksidetail";
                // exit();
                $this->db->query($querydeletetransaksidetail);
                //delete kunjungan detail
                $querydeletekunjungandetail = "DELETE 
                                            FROM
                                                detail_kunjungan 
                                            WHERE
                                                id_detail_kunjungan IN ( SELECT detail_kunjungan.id_detail_kunjungan FROM transaksi JOIN kunjungan USING ( id_transaksi ) JOIN detail_kunjungan USING ( id_kunjungan ) WHERE transaksi.id_transaksi = '$input->val_id_transaksi' )
                                            ";
                // echo"$querydeletekunjungandetail";   
                // exit();                             
                $this->db->query($querydeletekunjungandetail);
                //delete kunjungan
                $querydeletekunjungan = "DELETE FROM kunjungan WHERE id_transaksi = '$input->val_id_transaksi'";
                // echo"$querydeletekunjungan ";
                // exit();
                $this->db->query($querydeletekunjungan);
                //delete tgransaksi
                $querydeletetransaksi = "DELETE FROM transaksi WHERE id_transaksi = '$input->val_id_transaksi'";
                $this->db->query($querydeletetransaksi);


                $this->db->transComplete();

                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Batal Transaksi";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Buka Transaksi";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Pembayaran sudah dilakukan";
            }
        }
        $this->hasil($output);
    }
    public function Tutup_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi', 'val_id_user'
        ];
        date_default_timezone_set('Asia/Jakarta');

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $waktutransaksi = "" . $input->val_tgl . " " . "$input->val_jam";
        $replace = str_replace("/", "-", $waktutransaksi);
        $date = date_create($replace);
        //$val_date = strtotime($waktutransaksi);
        $val_date2 = date_format($date, "Y-m-d H:i:s");
        // echo"$val_date2";
        //    exit();
        if ($this->evalParam($input, $listParam)) {
            // $this->db->transStart();
            $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->val_id_transaksi'";
            $querybayar = "select sum(jumlah) as sudahdibayar from bayar where id_transaksi='$input->val_id_transaksi'";
            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $hasil = $totalnominal - $totalnominalsudahdibayar;

            $querylunas = "select lunas from transaksi where id_transaksi='$input->val_id_transaksi'";
            $rowquerylunas = $this->db->query($querylunas)->getRow()->lunas;

            if (($hasil == 0 || $hasil == '0') && ($rowquerylunas == 't')) {
                $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup ='$val_date2' where id_transaksi= '$input->val_id_transaksi'";
                // echo"$queryupdatetransaksi";
                // exit();
                // $this->db->query($queryupdatetransaksi);
                if ($this->db->simpleQuery($queryupdatetransaksi)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Tutup Transaksi";
                    // echo"a";
                    // exit();
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Tutup Transaksai";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Pembayaran belum balance";
                // echo"b";
                // exit();
            }
        }
        $this->hasil($output);
    }
    public function generatetarifkasir()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi', 'val_id_penjamin'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query =  $this->db->query("SELECT 
            transaksi.id_transaksi,
	 detail_kunjungan.id_produk,
     detail_kunjungan.qty,
     detail_kunjungan.id_kunjungan,
     detail_kunjungan.id_detail_kunjungan,
     tarif.id_tarif
FROM
	transaksi
	LEFT JOIN kunjungan USING ( id_transaksi )
	LEFT JOIN detail_kunjungan USING ( id_kunjungan ) 
    JOIN tarif USING(id_produk)
WHERE
	detail_kunjungan.id_detail_kunjungan NOT IN ( SELECT id_detail_kunjungan FROM detail_transaksi WHERE id_transaksi = '$input->val_id_transaksi' ) 
	AND id_transaksi = '$input->val_id_transaksi'
    AND tarif.id_penjamin='$input->val_id_penjamin'
    AND tarif.tgl_selesai is null");
            if ($query->getNumRows() > 0) {
                $this->db->transStart();
                foreach ($query->getResult() as $row) {
                    $querydetailtransaksi =  $this->db->query("INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, id_tarif, qty, id_detail_kunjungan) 
                    VALUES ('$input->val_id_transaksi', '$row->id_kunjungan', '$row->id_produk','$row->id_tarif','$row->qty','$row->id_detail_kunjungan')");
                }
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "Sukses generate " . $query->getNumRows() . " produk";
                } else {
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Gagal hubungi admin";
                    //$output['error']    = $this->db->error()['message'];
                    //echo"$query";
                }
            } else {
                $output['status']   = "sukses";
                $output['code']     = "200";
                $output['pesan']    = "Tarif sudah lengkap";
            }
        }
        echo json_encode($output);
    }
    public function Kasir_GantipenjamingenerateTarif()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi', 'id_penjamin'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $cekdetailtransaksiapotek = $this->db->query("select * from detail_transaksi where id_transaksi='$input->id_transaksi' and id_produk in ('134','133')");
            if ($cekdetailtransaksiapotek->getNumRows() > 0) {
                $output['status']   = "gagal";
                $output['code']     = "XX";
                $output['pesan']    = "Hubungi Apotik untuk mengganti kepemilikan Obat"; 
            }
            else{
            $queryhapusdetailtransaksi = $this->db->query("DELETE FROM detail_transaksi WHERE id_transaksi= '$input->id_transaksi'");
            $query =  $this->db->query("SELECT 
                                                transaksi.id_transaksi,
                                        detail_kunjungan.id_produk,
                                        detail_kunjungan.qty,
                                        detail_kunjungan.id_kunjungan,
                                        detail_kunjungan.id_detail_kunjungan,
                                        tarif.id_tarif
                                    FROM
                                        transaksi
                                        LEFT JOIN kunjungan USING ( id_transaksi )
                                        LEFT JOIN detail_kunjungan USING ( id_kunjungan ) 
                                        JOIN tarif USING(id_produk)
                                    WHERE
                                        detail_kunjungan.id_detail_kunjungan NOT IN ( SELECT id_detail_kunjungan FROM detail_transaksi WHERE id_transaksi = '$input->id_transaksi' ) 
                                        AND id_transaksi = '$input->id_transaksi'
                                        AND tarif.id_penjamin='$input->id_penjamin'
                                        AND tarif.tgl_selesai is null");
            if ($query->getNumRows() > 0) {
                $this->db->transStart();
                foreach ($query->getResult() as $row) {
                    $querydetailtransaksi =  $this->db->query("INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, id_tarif, qty, id_detail_kunjungan) 
                    VALUES ('$input->id_transaksi', '$row->id_kunjungan', '$row->id_produk','$row->id_tarif','$row->qty','$row->id_detail_kunjungan')");
                }
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "Sukses ganti tarif " . $query->getNumRows() . " produk";
                } else {
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Gagal hubungi admin";
                    //$output['error']    = $this->db->error()['message'];
                    //echo"$query";
                }
            } else {
                $output['status']   = "sukses";
                $output['code']     = "200";
                $output['pesan']    = "Tarif sudah lengkap";
            }
        }
    }
        echo json_encode($output);
    }
}
