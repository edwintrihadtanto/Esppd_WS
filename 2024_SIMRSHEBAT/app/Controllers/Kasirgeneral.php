<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Kasirgeneral extends Api
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
    public function cek_kunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $query = $this->db->query("SELECT * FROM
                        transaksi
                        JOIN kunjungan USING ( id_transaksi )
                        JOIN pasien USING ( no_rm )
                        JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$input->id_transaksi'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Berhasil Cari Pasien";
            } else {
                $output['status']   = "sukses";
                $output['code']     = "XX";
                $output['pesan']    = "";
            }
        }
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

        if ($kel->getNumRows() <= 0) {
            // echo"tes";
            // exit();
        }


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
        // $listParam = [
        //     'kdpasiencariKasir', 'caritgl1', 'caritgl2', 'caristatuslunas', 'jmlpasiencari'
        // ];
        $listParam = [
            'kdpasiencariKasir', 'caritgl1', 'caritgl2'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            if ($input->caristatustutuptransaksi == 'all') {
                $criteriatutup = "";
            } elseif ($input->caristatustutuptransaksi == 't') {
                $criteriatutup = "AND tra.tgl_tutup is not null";
            } elseif ($input->caristatustutuptransaksi == 'f') {
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
                    JOIN penjamin_transaksi pj ON tra.id_transaksi = pj.id_transaksi AND pj.penjamin_utama = 't'
                    JOIN penjamin using(id_penjamin)
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
            produk.kd_produk,
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
            'in_id_user',
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
            VALUES ('$input->in_id_transaksi', '$input->in_id_kunjungan', '$input->in_id_produk', '$input->in_tgl_input','$input->in_id_tarif','$input->in_qty','$diskon','$detail_kunjungan') returning id_detail_transaksi";
            //    echo"$querydetailtransaksi";
            //    exit();
            $id_detail_transaksi = $this->db->query($querydetailtransaksi)->getRow()->id_detail_transaksi;
            // echo"$id_detail_transaksi";
            // exit();
            //INSERT KE AC JURNAL
            // $sumtotal = $this->db->query("select sum(harga) as total from detail_component where id_detail_transaksi='$id_detail_transaksi'")->getRow()->total;
            // $codegl = "PNJ";
            // $idgl = "".$codegl."-".$input->in_id_transaksi."-".$id_detail_transaksi."";
            // // echo"$idgl";
            // // exit();
            // $lastidjurnal =  $this->db->query("INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, jumlah, id_pegawai) 
            // VALUES ('$idgl', '$input->in_tgl_input', 'Penjualan $input->in_id_transaksi','$sumtotal','$input->in_id_user') returning id_jurnal")->getRow()->id_jurnal;
            //INSERT KE JURNAL DETAIL
            // $qinsertjurnaildetail = "SELECT
            //                                 jenis_component.jenis_component,
            //                                 detail_component.id_jenis_component,
            //                                 detail_component.id_detail_transaksi,
            //                                 detail_component.harga_asli,
            //                                 detail_component.diskon_rupiah,
            //                                 detail_component.harga,
            //                                 detail_component.id_pegawai,
            //                                 map_componen_account.normal,
            //                                 map_componen_account.id_acc
            //                         FROM
            //                         detail_component 
            //                         JOIN jenis_component using(id_jenis_component)
            //                         JOIN account on account.id_acc=jenis_component.id_acc
            //                                     JOIN map_componen_account on detail_component.id_jenis_component=map_componen_account.id_jenis_component
            //                         WHERE
            //                         detail_component.id_detail_transaksi = '$id_detail_transaksi '
            //                                     and map_componen_account.kondisi='1';";
            // // echo"$qinsertjurnaildetail";
            // // exit();
            // $insertjurnaildetail = $this->db->query($qinsertjurnaildetail);
            // foreach ($insertjurnaildetail->getResult() as $rowinsertjurnaildetail) {
            //     // echo"$rowinsertjurnaildetail->jenis_component";
            //     // exit();
            //     if ($rowinsertjurnaildetail->normal == 'KREDIT') {
            //         $insertdetailjurnal = $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan,debit, kredit, id_pegawai, date_created) 
            //     VALUES ('$lastidjurnal', '$rowinsertjurnaildetail->id_acc', 'Penjualan $input->in_id_transaksi $rowinsertjurnaildetail->jenis_component','0','$rowinsertjurnaildetail->harga','$input->in_id_user','$input->in_tgl_input')");
            //     }
            //      else {
            //         $insertdetailjurnal = $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan,debit, kredit, id_pegawai, date_created) 
            //     VALUES ('$lastidjurnal', '$rowinsertjurnaildetail->id_acc', 'Penjualan $input->in_id_transaksi $rowinsertjurnaildetail->jenis_component','$rowinsertjurnaildetail->harga','0','$input->in_id_user','$input->in_tgl_input')");
            //     }
            // }


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
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran where id_jenis_pembayaran <>'4' order by id_jenis_pembayaran asc ");
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
    // public function selecttellerkas()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $idkas =  $this->db->query("SELECT id_kas from users where id_user='$input->id_user'")->getRow()->id_kas;
    //     // $bayar =  $this->db->query("SELECT * FROM ac_kas where teller='f' or id_kas='$idkas' order by teller desc");
    //     // echo"$input->id";
    //     // exit();
    //     if ($input->id == 1 || $input->id == '1' || $input->id == '4' || $input->id == '4') {
    //         $bayar =  $this->db->query("SELECT
    //         * 
    //     FROM
    //         ac_kas 
    //     WHERE
    //         id_kas='$idkas'");
    //         // echo"a";
    //         // echo"$input->id";

    //     } else {
    //         $bayar =  $this->db->query("SELECT
    //         * 
    //     FROM
    //         ac_kas 
    //     WHERE
    //         id_jenis_pembayaran='$input->id'");
    //         // echo"b"; 
    //         // echo"$input->id";

    //     }



    //     $output['status'] = 'sukses';
    //     $output['data'] = $bayar->getResult();
    //     echo json_encode($output);
    // }
    public function selecttellerkas()
    {
        $input = json_decode(file_get_contents('php://input'));
        $idkas =  $this->db->query("SELECT id_kas from users where id_user='$input->id_user'")->getRow()->id_kas;
        // $bayar =  $this->db->query("SELECT * FROM ac_kas where teller='f' or id_kas='$idkas' order by teller desc");
        // echo"$input->id";
        // exit();
        if ($input->id == 1 || $input->id == '1') {
            $bayar =  $this->db->query("SELECT
            * 
        FROM
            ac_kas 
        WHERE
            id_kas='$idkas'");
            // echo"a";
            // echo"$input->id";

        } elseif ($input->id == 4 || $input->id == '4') {
            //     $bayar =  $this->db->query("SELECT
            //     * 
            // FROM
            //     ac_kas 
            //     join deposit on ac_kas.id_kas=deposit.id_kas
            // WHERE
            //     deposit.no_rm='$input->norm'
            //     and ac_kas.id_kas <> 7
            //     group by ac_kas.id_kas
            //     ");
            $bayar =  $this->db->query("SELECT
                                    ac_kas.id_kas,ac_kas.kas_nama
                                FROM
                                    ac_kas
                                    JOIN deposit ON ac_kas.id_kas = deposit.id_kas 
                                WHERE
                                    deposit.no_rm = '$input->norm' 
                                    AND ac_kas.id_kas <> 7 
                                GROUP BY
                                    ac_kas.id_kas");
            // echo"a";
            // echo"$input->id";

        } else {
            $bayar =  $this->db->query("SELECT
            * 
        FROM
            ac_kas 
        WHERE
            id_jenis_pembayaran='$input->id'");
            // echo"b"; 
            // echo"$input->id";

        }



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
    public function cetakbill_old()
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

        $querydokterkunjungan = $this->db->query("SELECT
        distinct(nama_pegawai)
        FROM
        transaksi
        JOIN kunjungan USING ( id_transaksi ) 
        JOIN pegawai using(id_pegawai)
        WHERE
        id_transaksi = '$validtrans'
        and pegawai.jenis_pegawai='1'");

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

  

          <table align='center' style='border:1px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querypasien->getResult() as $datatransaksi); {
            if($datatransaksi->jenis_kelamin == 'f'){
                $kelamin = "Perempuan";
            }
            else{
                $kelamin = "Laki-laki";
            }
            $tgltransaksi = substr($datatransaksi->tgl_transaksi, 0, 10);
            $html .= "<tr>
                <td style='width: 150px;'>No Transaksi</td>
                <td style='width: 5px;'>:</td>
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
                <td>Kelamin</td>
                <td>:</td>
                <td>$kelamin</td>
                </tr>
                <tr>
                <td>Tgl. Lahir</td>
                <td>:</td>
                <td>" . date_indo($datatransaksi->tgl_lahir) . "</td>
                </tr>
                <tr>
                <td>No.Rekam Medis</td>
                <td>:</td>
                <td>$datatransaksi->no_rm</td>
                </tr>
                <tr>
                <td valign='top'>Alamat</td>
                <td valign='top'>:</td>
                <td valign='top'>" . $datatransaksi->alamat_ktp . ", " . $datatransaksi->kelurahan . ", " . $datatransaksi->kecamatan . "," . $datatransaksi->kabupaten . " " . $datatransaksi->propinsi . " </td>
                </tr>";
        }
        $html .= "</table>
        <br>
          <table border='1' align='center'  style='border:1px solid black;border-collapse:collapse;width:100%'>
            <tr>
            <td style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>No</td>
            <td style='border:1px solid black;text-align: left;font-weight: bold;'>Unit</td>
            <td style='border:1px solid black;text-align: left;font-weight: bold;'>Deskripsi</td>
            <td style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Jumlah</td>
            <td style='border:1px solid black;text-align: right;font-weight: bold;width:200px;'>Total</td>
            </tr>
            ";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "
            <tr>
            <td style='border:1px solid black;text-align: center;'>$no</td>
            <td style='border:1px solid black;'>$row->nama_unit</td>
            <td style='border:1px solid black;'>$row->nama_produk</td>
            <td style='border:1px solid black;text-align: center;'>$row->qty</td>
            <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->total_harga) . "</td>
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
            <td style='border:1px solid black;text-align: right;font-weight: bold' colspan='4'>" . $rowtotalbayar->deskripsi_pembayaran . "</td>
            <td  style='border:1px solid black;text-align: right;font-weight: bold;'><i>Rp. " . format_ribuan($rowtotalbayar->jumlah) . "<i></td>
            </tr>
            ";
            $no++;
        }
        $html .= "
            </table>
            <br>
            <div style='border:0px solid black;border-collapse:collapse;width:100%';font-size:8px><u><b>Dokter</b></u> :</div>
            <table style='border:0px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querydokterkunjungan->getResult() as $rowquerydokterkunjungan) {
            $html .= "
            <tr>
            <td style='font-size:10px'>$rowquerydokterkunjungan->nama_pegawai</td>
            </tr>";
        }
        $html .= "</table>
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
            'format' => [90, 160]
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
        // header("Content-type: application/vnd-ms-excel");
        // header("Content-Disposition: attachment; filename=Laporan Pendapatan Rs.xls");
        
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
        $id_userpaid = $_POST['id_userpaid'];
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

        if ($id_userpaid == 'all') {
            $iduser = "";
            $namapegawai = "";
        } else {
            $iduser = "and bayar.id_user='$id_userpaid'";
            $namapegawai = $this->db->query("SELECT nama from users where id_user='$id_userpaid'")->getRow()->nama;;
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
                    *,pasien.nama as namapasien,users.nama as namausers 
                FROM
                    bayar 
                    left join transaksi using(id_transaksi)
                    join pembayaran using(id_pembayaran)
                    join jenis_pembayaran using(id_jenis_pembayaran)
                    join pasien using(no_rm)
                    left join users on users.id_user=bayar.id_user
                WHERE
                $q_waktu    
                $idpembayaran
                $iduser 
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
                $iduser
                ");


        $tes = "SELECT
                * 
            FROM
                bayar 
                left join transaksi using(id_transaksi)
                join pembayaran using(id_pembayaran)
                join pasien using(no_rm)
                
            WHERE
            $q_waktu
            $idpembayaran
            $iduser
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
    
    <div style='text-align:center';paddibg-top:15px>Laporan Penerimaan Pasien $tglawal Shift ($v_shift1,$v_shift2,$v_shift3) sd $tglakhir Shift ($v_shift1_x,$v_shift2_x,$v_shift3_x) <br>$namapegawai</div>
    <br>
    <table border='1' style='font-family: Arial, Helvetica, sans-serif;border:1px solid black;border-collapse:collapse;width:100%'  >
    <tr>
    <td><b>No</b></td>
    <td><b>Tgl Bayar</b></td>
    <td><b>Jam Bayar</b></td>
    <td><b>Transaksi</b></td>
    <td><b>Shift</b></td>
    <td><b>No.Rm</b></td>
    <td><b>Pasien</b></td>
    <td><b>Pembayaran</b></td>
    <td><b>User</b></td>
    <td style='text-align:right'><b>Nominal</b></td>
    </tr>
    ";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $tgl = substr($row->tgl_bayar, 0, 10);
            $waktu = substr($row->tgl_bayar, 11, 5);
            $html .= "<tr>
        <td>" . $no . "</td>
       <td>" . mediumdate_indo($tgl) . "</td>
       <td>" . $waktu . "</td>
       <td>$row->id_transaksi</td>
       <td>$row->shift</td>
       <td>$row->no_rm</td>
       <td>$row->namapasien</td>
       <td>".$row->deskripsi_pembayaran." </td>
       <td>$row->namausers</td>
       <td style='text-align:right;width:150px'><b>Rp. " . format_ribuan($row->jumlah) . "</b></td>
       </tr>
       ";
            $no++;
        };

        foreach ($jumlahnominal->getResult() as $rowjumlahnominal) {
            $html .= "<tr>
       <td colspan='9' style='text-align:right'><b>Jumlah<b></td>
       <td style='text-align:right'><b>Rp. " . format_ribuan($rowjumlahnominal->totaljumlah) . "</b></td>

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
        DISTINCT(un.id_unit),
              un.nama_unit,
        kun.id_kunjungan,
              un.jenis_unit,
              CASE WHEN un.jenis_unit = 2 Then 'ranap' else 'rajal'
              END as coba,
              rip.nama_ruang,
              kam.nama_kamar,
              kun.posting,
              kun.tgl_masuk
    FROM
        transaksi tra
        JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi
        JOIN unit un ON kun.id_unit = un.id_unit and ( un.jenis_unit in ('1','2','3') or un.id_unit='7001' )
              LEFT JOIN kamar kam ON kam.id_kamar=kun.id_kamar
              LEFT JOIN ruang_inap rip ON rip.id_ruang=kam.id_ruang
    WHERE
        tra.id_transaksi = '$input->idtrans'
        -- AND kun.aktif='t'
              GROUP BY un.id_unit,kun.id_kunjungan,kam.nama_kamar,rip.nama_ruang;");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function kunjunganpas_unposting()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
        DISTINCT(un.id_unit),
              un.nama_unit,
        kun.id_kunjungan,
              un.jenis_unit,
              CASE WHEN un.jenis_unit = 2 Then 'ranap' else 'rajal'
              END as coba,
              rip.nama_ruang,
              kam.nama_kamar,
              kun.posting,
              kun.tgl_masuk,
              status_kunjungan,
			  kun.aktif
    FROM
        transaksi tra
        JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi and kun.status_kunjungan not in ('2')
        JOIN unit un ON kun.id_unit = un.id_unit and un.jenis_unit in ('1','2','3')
              LEFT JOIN kamar kam ON kam.id_kamar=kun.id_kamar
              LEFT JOIN ruang_inap rip ON rip.id_ruang=kam.id_ruang
    WHERE
        tra.id_transaksi = '$input->idtrans'
        -- AND kun.aktif='t'
              GROUP BY un.id_unit,kun.id_kunjungan,kam.nama_kamar,rip.nama_ruang
              order by kun.tgl_masuk desc;
       ");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function penjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
    //     $kunj =  $this->db->query("SELECT
    //     * 
    // FROM
    //     penjamin_transaksi join penjamin using(id_penjamin)
    // WHERE
    //     id_transaksi = '$input->idtrans' order by penjamin_utama desc;
    //    ");
    $kunj =  $this->db->query("SELECT
    id_penjamin,nama_penjamin 
 FROM
     penjamin_transaksi join penjamin using(id_penjamin)
 WHERE
     id_transaksi='$input->idtrans' 
             GROUP BY id_penjamin,nama_penjamin");
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
            //         $listProdukx = $this->db->query("SELECT P.id_produk,P.kd_produk,P.nama_produk,un.nama_unit,tar.harga,tar.id_tarif
            //         FROM
            //        produk
            //        P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk
            //            INNER JOIN tarif tar ON tar.id_produk=pu.id_produk
            //        INNER JOIN unit un ON un.id_unit = pu.id_unit 
            //    WHERE pu.id_unit = '$input->id_unit'");

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
    public function mod_lookkup_penatajasa()
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

        return view('view/modal/kasirgeneral/mod_lookkup_penatajasa', $data);
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
        dc.id_detail_transaksi,
        dc.harga_asli, 
        dc.diskon_rupiah,
        dc.diskon_persen * 100 as diskon_persen,
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
    public function updatedetailcomponentransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $nominal = str_replace(".", "", $input->val_nominalubah);
        //harga total
        // $diskon_persen = $this->db->query("SELECT diskon_persen from detail_component 
        //     WHERE
        //         id_detail_transaksi = '$input->id_detail_transaksi' 
        //         AND id_jenis_component = '$input->id_jenis_component'
        //         ")->getRow()->diskon_persen;
        $diskon_persen = 0;
        if ($diskon_persen > 0) {
            $diskonrupiah = $nominal * $diskon_persen;
            $diskon_persen = $diskon_persen;
        } else {
            $diskonrupiah = 0;
            $diskon_persen = 0;
        }
        // echo"$nominal<br>";
        // echo"$diskonrupiah";
        // exit();
        $jumlah = $nominal - $diskonrupiah;
        // echo"$jumlah";
        // exit();
        $updatecomponen = "UPDATE detail_component 
                                            SET diskon_rupiah='$diskonrupiah', diskon_persen='$diskon_persen', harga='$jumlah'
                                            WHERE
                                                id_detail_transaksi = '$input->id_detail_transaksi' 
                                                AND id_jenis_component = '$input->id_jenis_component'
                                                ";
        // echo"$updatecomponen";

        if ($this->db->simpleQuery($updatecomponen)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil ubah nominal";
        } else {
            $output['status']   = "gagal";
            $output['pesan'] = "gagal";
        }

        $this->hasil($output);
    }
    public function updatedetailcomponentransaksidiskon()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $diskonpersen = $input->val_nominalubah;

        //harga asli
        $selectharga = $this->db->query("SELECT harga_asli from detail_component 
        WHERE
            id_detail_transaksi = '$input->id_detail_transaksi' 
            AND id_jenis_component = '$input->id_jenis_component'
            ")->getRow()->harga_asli;

        //harga total
        $harga = $this->db->query("SELECT harga from detail_component 
        WHERE
            id_detail_transaksi = '$input->id_detail_transaksi' 
            AND id_jenis_component = '$input->id_jenis_component'
            ")->getRow()->harga;


        $persenrupiah = $selectharga *  ($diskonpersen / 100);
        $persen = ($diskonpersen / 100);
        $harga_tot = $selectharga - $persenrupiah;

        $updatecomponen = "UPDATE detail_component 
                                            SET harga = '$harga_tot' , diskon_rupiah='$persenrupiah',
                                            diskon_persen='$persen'
                                            WHERE
                                                id_detail_transaksi = '$input->id_detail_transaksi' 
                                                AND id_jenis_component = '$input->id_jenis_component'
                                                ";

        if ($this->db->simpleQuery($updatecomponen)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil ubah nominal";
        } else {
            $output['status']   = "gagal";
            $output['pesan'] = "gagal";
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

            $cekpenunjang =  $this->db->query("SELECT
                                                * 
                                            FROM
                                                detail_transaksi
                                                JOIN kunjungan USING ( id_kunjungan )
                                                JOIN unit USING ( id_unit ) 
                                            WHERE
                                                id_detail_transaksi = '$input->id_detail_transaksi' 
                                                and unit.jenis_unit in('4','5','6','7','8')");
            if ($cekpenunjang->getNumRows() > 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Transaksi, silahkan hubungi penunjang untuk pembatalan";
                return $this->hasil($output);
                exit();
            }

            $cekkomponen =  $this->db->query("SELECT
                                                    * 
                                                FROM
                                                    detail_transaksi
                                                    JOIN detail_component USING ( id_detail_transaksi ) 
                                                WHERE
                                                    id_detail_transaksi = '$input->id_detail_transaksi'");
            if ($cekkomponen->getNumRows() <= 0) {
                $iddetailkunjungan = $this->db->query("SELECT id_detail_kunjungan from detail_transaksi where id_detail_transaksi='$input->id_detail_transaksi'")->getRow()->id_detail_kunjungan;
                $queryhapus = "DELETE FROM detail_kunjungan WHERE id_detail_kunjungan = '$iddetailkunjungan'";

                if ($this->db->simpleQuery($queryhapus)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus tanpa Komponen";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Transaksi";
                }
                return $this->hasil($output);
            }
            $cekjurnal =  $this->db->query("SELECT
                                        jurnal
                                    FROM
                                        detail_transaksi
                                        JOIN detail_component USING ( id_detail_transaksi ) 
                                    WHERE
                                        id_detail_transaksi = '$input->id_detail_transaksi'
                                        GROUP BY jurnal
                                        limit 1")->getRow()->jurnal;

            if ($cekjurnal == 't') {
                $output['status']   = "gagal";
                $output['pesan']    = "Sudah dilakukan penjurnalan";
                $this->hasil($output);
                exit();
            } else {
                // $querycekbayar =  $this->db->query("SELECT * from bayar where id_transaksi='$input->id_transaksi'");
                // if ($querycekbayar->getNumRows() <= 0) {
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
                // } else {
                //     $output['status']   = "gagal";
                //     $output['pesan']    = "Pembayaran Sudah dilakukan";
                // }
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
            $querydeposit = "SELECT
                        CASE
                            WHEN
                                sisadeposit IS NULL THEN
                                    '0' ELSE x.sisadeposit 
                                    END AS sisadepositnya 
                        FROM
                            ( SELECT SUM ( kredit ) - SUM ( debit ) AS sisadeposit FROM deposit WHERE no_rm = '$input->norm' ) AS x";
            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $totalnominalsisadeposit = $this->db->query($querydeposit)->getRow()->sisadepositnya;

            $hasil = $totalnominal - $totalnominalsudahdibayar - $totalnominalsisadeposit;
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
            $output['totaltransaksi'] = $totalnominal;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    // public function totalyangharusdibayar()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'id_transaksi'
    //     ];
    //     $output = array();
    //     $output['status'] = "gagal";
    //     $output['pesan'] = "";
    //     if ($this->evalParam($input, $listParam)) {
    //         $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->id_transaksi'";
    //         $querybayar = "select sum(jumlah) as sudahdibayar from bayar where id_transaksi='$input->id_transaksi'";
    //         $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
    //         $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
    //         $hasil = $totalnominal - $totalnominalsudahdibayar;
    //         //echo"$hasil";
    //         //exit();


    //         //    $query = "WITH total_bayar AS ( SELECT $input->id_transaksi id_transaksi, SUM ( jumlah ) jumlah_bayar FROM bayar WHERE id_transaksi = $input->id_transaksi ) SELECT SUM
    //         //    ( total_harga ) - AVG ( jumlah_bayar ) totalharusdibayar 
    //         //    FROM
    //         //        detail_transaksi
    //         //        JOIN total_bayar USING ( id_transaksi ) 
    //         //    WHERE
    //         //        id_transaksi = '$input->id_transaksi' "; 

    //         //        echo"$query";
    //         $sum = $hasil;
    //         // $sum = $this->db->query($query);
    //         $output['status'] = "sukses";
    //         $output['data'] = $sum;
    //         // $output['data'] = $sum->getResult();

    //     }
    //     $this->hasil($output);
    // }
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
    // public function totalsisadepositpasien()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'val_norm'
    //     ];
    //     $output = array();
    //     $output['status'] = "gagal";
    //     $output['pesan'] = "";
    //     if ($this->evalParam($input, $listParam)) {
    //         $query = "SELECT SUM
    //         ( kredit ) - SUM ( debit ) AS sisadeposit 
    //     FROM
    //         deposit 
    //     WHERE
    //         no_rm = '$input->val_norm'
    //         ";
    //         // echo"$query";
    //         // exit();
    //         $hasil = $this->db->query($query)->getRow()->sisadeposit;

    //         $sum = $hasil;
    //         // echo"$sum";
    //         // exit();
    //         // $sum = $this->db->query($query);
    //         $output['status'] = "sukses";
    //         $output['data'] = $sum;
    //         // $output['data'] = $sum->getResult();
    //     }
    //     $this->hasil($output);
    // }
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
    public function lihatkasuser()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $query = "SELECT kas_nama from users join ac_kas using(id_kas) where id_user='$input->iduser'";
        $hasil = $this->db->query($query)->getRow()->kas_nama;
        if (!$hasil) {
            $output['status'] = "gagal";
            $output['code'] = "XX";
            $output['pesan'] = "gagal";
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
            id_transaksi = '$input->id_transaksi' order by id_penjamin asc
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
    // public function tampilhisdeposit()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'no_rm'
    //     ];
    //     $output = array();
    //     $output['status'] = "gagal";
    //     $output['pesan'] = "";
    //     if ($this->evalParam($input, $listParam)) {
    //         $query = "SELECT
    //         * 
    //     FROM
    //         deposit 
    //         join users USING(id_user)
    //     WHERE
    //         no_rm ='$input->no_rm'
    //         and debit=0";
    //         // echo"$query";
    //         // exit();
    //         $list_bayar = $this->db->query($query);
    //         $output['status'] = "sukses";
    //         $output['data'] = $list_bayar->getResult();
    //     }
    //     $this->hasil($output);
    // }
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
            deposit.no_rm,
            deposit.kredit as kredit,
            deposit.tgl_deposit,
            deposit.shift,
            users.nama,
            ac_kas.kas_nama,
            ac_kas.id_kas,
            ac_kas.id_acc,
            pasien.nama as namapasien
        FROM
            deposit 
            join pasien USING(no_rm)
            left join ac_kas USING(id_kas)
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
            	-- JOIN unit USING ( id_unit ) 
	LEFT join unit on unit.id_unit=produk_unit.id_unit
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

            $querylog = "INSERT INTO log_buka_transaksi (id_transaksi,id_user,alasan,waktu_buka) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan',
                 current_timestamp
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
            'val_id_pembayaran',
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

        if (($jam <= '08') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shift = '4';
        } else {
            $shift = $shiftsekarang;
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
            $this->db->transStart();

            if ($input->id_kas > 0) {
                $query = "INSERT INTO bayar ( id_transaksi, id_pembayaran, jumlah, id_user, tgl_bayar, shift, id_kas )
                VALUES (
                    '$input->val_idtransaksi',
                    '$input->val_id_pembayaran',
                    '$input->val_jumlahbayarkasir',
                    '$input->id_user',
                    '$valwaktutransaksi',
                    '$shift',
                    '$input->id_kas'
                )";
            } else {
                $query = "INSERT INTO bayar ( id_transaksi, id_pembayaran, jumlah, id_user, tgl_bayar, shift )
                VALUES (
                    '$input->val_idtransaksi',
                    '$input->val_id_pembayaran',
                    '$input->val_jumlahbayarkasir',
                    '$input->id_user',
                    '$valwaktutransaksi',
                    '$shift'
                )";
            }
            $this->db->query($query);
            //jika ada pembayaran deposit
            if ($input->val_nominal_deposit > 0) {
                $querydeposit = "INSERT INTO bayar ( id_transaksi, id_pembayaran, jumlah, id_user, tgl_bayar, shift, id_kas )
                VALUES (
                    '$input->val_idtransaksi',
                    '6',
                    '$input->val_nominal_deposit',
                    '$input->id_user',
                    '$valwaktutransaksi',
                    '$shift',
                    '$input->id_kas'
                )";
                //echo"$querydeposit";exit();
                $this->db->query($querydeposit);
            }
            // echo"$query";
            // exit();
            $this->db->transComplete();

            if ($this->db->transStatus()) {
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
    // public function tambahdeposit()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'val_norm', 'val_jumlahbayarkasir', 'val_tglbayar', 'id_user', 'val_jambayar'
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

    //     if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
    //         $shit = '4';
    //     } else {
    //         $shit = $shiftsekarang;
    //     }
    //     // komen jangan dihapus
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
    //         $query = "INSERT INTO deposit (tgl_deposit, no_rm, id_user, shift, kredit,id_jenis_aktivitas_keuangan)
    //         VALUES (
    //             '$valwaktutransaksi',
    //             '$input->val_norm',
    //             '$input->id_user',
    //             '$shit',
    //             '$input->val_jumlahbayarkasir',
    //             '8'
    //         )";
    //         // echo"$query";
    //         // exit();
    //         if ($this->db->simpleQuery($query)) { //true
    //             $output['status']   = "sukses";
    //             $output['code']     = "00";
    //             $output['pesan']    = "Deposit Berhasil";
    //         } else {
    //             $output['code']     = "XX";
    //             $output['status']   =  'gagal simpan';
    //             $output['pesan']    = $this->db->error()['message'];
    //             //echo"$query";

    //         }
    //     }
    //     $this->hasil($output);
    // }
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
            $this->db->transStart();
            $idGL = "DP-$input->val_id_transaksi";
            $cekidjurnal = $this->db->query("SELECT id_jurnal from ac_jurnal where id_gl='$idGL'");
            // echo"$cekidjurnal";
            // exit();

            if ($cekidjurnal->getNumRows() > 0) {
                $getid = $this->db->query("SELECT id_jurnal from ac_jurnal where id_gl='$idGL'")->getRow()->id_jurnal;
                $id_jurnal = $getid;
            } else {
                
                // echo"$input->val_id_user";
                // exit();
                //jika belum ada ac_jurnal maka insert ac jurnal
                $insertacjurnal = "INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                    '$idGL',
                    'DEPOSIT NORM  $input->val_norm id Transaksi $input->val_id_transaksi',
                    '$input->id_user'
                )returning id_jurnal";
                // echo"$insertacjurnal";
                // exit();
                $id_jurnal = $this->db->query($insertacjurnal)->getRow()->id_jurnal;
                // echo"disini";exit();

            }

            $querynama =  $this->db->query("SELECT nama FROM pasien where no_rm='$input->val_norm'")->getRow()->nama;
            $queryidacc =  $this->db->query("SELECT id_acc FROM ac_kas where id_kas='$input->val_id_kas'")->getRow()->id_acc;

            //JURNAL DETAIL DEBIT
            $nama = str_replace("'", "''", "$querynama");
            $insert_detail_ac_jurnal = $this->db->query("INSERT INTO ac_jurnal_detail 
            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
            VALUES ('$id_jurnal', '$queryidacc', 'DEPOSIT NORM  $input->val_norm id Transaksi $input->val_id_transaksi','4','$nama','$input->val_jumlahbayarkasir','0','$input->id_user')");

            //JURNAL DETAIL KREDIT
            $insert_detail_ac_jurnal = $this->db->query("INSERT INTO ac_jurnal_detail 
            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
            VALUES ('$id_jurnal', '82', 'DEPOSIT NORM  $input->val_norm id Transaksi $input->val_id_transaksi','4','$nama','0','$input->val_jumlahbayarkasir','$input->id_user')");

            //UPDATE NOMINAL KAS
           $this->db->query("UPDATE ac_kas 
                        SET jumlah = (jumlah + $input->val_jumlahbayarkasir) 
                        WHERE
                            id_kas = '$input->val_id_kas'");

            //==================================================
          //simpan deposit
          $query = $this->db->query("INSERT INTO deposit (tgl_deposit, no_rm, id_user, shift, kredit,id_jenis_aktivitas_keuangan,id_kas)
          VALUES (
              '$valwaktutransaksi',
              '$input->val_norm',
              '$input->id_user',
              '$shit',
              '$input->val_jumlahbayarkasir',
              '8',
              '$input->val_id_kas'
          )");
            // echo"$query";
            // exit();
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Deposit dan kirim jurnal";
                // echo"a";
                // exit();
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Tutup Transaksai";
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

        if (($jam <= '08') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shift = '4';
        } else {
            $shift = $shiftsekarang;
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
            $this->db->transStart();
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
                                                '$shift'
                                            )";
            $this->db->query($query);
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


            //JURNAL
            $this->db->query("INSERT INTO bayar_pelunasan(id_transaksi, id_pembayaran,jumlah, id_user, shift, id_kas,jurnal )
            VALUES (
                '$input->val_idtransaksi',
                '$input->val_id_pembayaran',
                '$input->val_jumlahbayarkasir',
                '$input->id_user',
                '$shift',
                '$input->val_id_kas',
                'f'
            )");

            $gl_kas_max = $this->db->query("SELECT
            max(substr(id_gl,4)::INTEGER+1) as glkasmax
            FROM
            ac_jurnal 
            WHERE
            id_gl ILIKE 'KM%'")->getRow()->glkasmax;
            $newGL = "KM-$gl_kas_max";


            $namakas = $this->db->query("select kas_nama from ac_kas where id_kas='$input->val_id_kas'")->getRow()->kas_nama;

            // echo"$namakas";
            // exit();
            //insert jurnal bayar 
            $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                '$newGL',
                '$namakas id bayar piutang $input->val_idbayar dan no transaksi $input->val_idtransaksi',
                '$input->id_user'
            )returning id_jurnal")->getRow()->id_jurnal;
            // echo"$id_jurnalkas";
            // exit();

            $idacc = $this->db->query("select id_acc from ac_kas where id_kas='$input->val_id_kas'")->getRow()->id_acc;
            $namapas = $this->db->query("SELECT
            nama 
        FROM
            transaksi
            JOIN pasien USING ( no_rm ) 
        WHERE
            id_transaksi = '$input->val_idtransaksi'")->getRow()->nama;

            //kas debet    
            $this->db->query("INSERT INTO ac_jurnal_detail 
            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
            VALUES ('$id_jurnalkas', '$idacc', 'Pembayaran Piutang idbayar $input->val_idbayar notransaksi  $input->val_idtransaksi','4','$namapas','$input->val_jumlahbayarkasir','0','$input->id_user')");
            //piutang pendapatan kredit
            $this->db->query("INSERT INTO ac_jurnal_detail 
            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
            VALUES ('$id_jurnalkas', '32', 'Pembayaran Piutang idbayar $input->val_idbayar notransaksi  $input->val_idtransaksi','4','$namapas','0','$input->val_jumlahbayarkasir','$input->id_user')");
            // echo"$x";
            // exit();
            $tambahjumlahkasbank = $this->db->query("UPDATE ac_kas 
                                                    SET jumlah = (jumlah + $input->val_jumlahbayarkasir) 
                                                    WHERE id_kas = '$input->val_id_kas'");
            $nominal_ac_ar = $this->db->query("select kredit from ac_ar where id_bayar='$input->val_idbayar'")->getRow()->kredit;
            $this->db->query("UPDATE ac_ar SET kredit = $nominal_ac_ar+$input->val_jumlahbayarkasir WHERE id_bayar = '$input->val_idbayar'");

            $this->db->transComplete();


            if ($this->db->transStatus()) {
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
            $bayarjurnal = $this->db->query("SELECT jurnal from bayar where id_bayar='$input->val_idbayar'")->getRow()->jurnal;

            if ($bayarjurnal == 't') {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal , transaksi sudah pernah dijurnal $bayarjurnal";
                $this->hasil($output);
                exit();
            }
            $this->db->transStart();
            $tutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$input->val_idtransakasi'")->getRow()->tgl_tutup;
            if ($tutuptransaksi == null) {
                $queryidpembayaran = "SELECT
                                                * 
                                            FROM
                                                pembayaran
                                                JOIN jenis_pembayaran USING ( id_jenis_pembayaran ) 
                                            WHERE
                                                id_pembayaran = '$input->val_idpembayaran'";

                // echo"$queryidpembayaran";
                // exit();
                $rowidpembayaran = $this->db->query($queryidpembayaran)->getRow()->id_jenis_pembayaran;
                // echo"$rowidpembayaran";
                // exit();
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

                $querylog = "INSERT INTO log_hapus_bayar (id_transaksi,id_user,nominal,alasan,waktu_hapus) VALUES (
                    '$input->val_idtransakasi',
                    '$input->val_iduser',
                    '$input->val_nominal',
                    '$input->val_alasan',
                    current_timestamp
                )";
                // echo"$querylog";

                $this->db->query($querylog);
                //$this->db->simpleQuery($querylog);
                // if($rowidpembayaran = '1' || $rowidpembayaran = '2' ||  $rowidpembayaran = '3'){
                // if($rowidpembayaran = '1'){
                // $queryinsereditbayarhistori = "INSERT INTO history_edit_bayar (id_user,nominal,alasan,id_jenis_pembayaran,id_transaksi,id_referensi) 
                // VALUES (
                //     '$input->val_iduser',
                //     '$input->val_nominal',
                //     '$input->val_alasan',
                //     '$rowidpembayaran',
                //     '$input->val_idtransakasi',
                //     '$idreferensi'
                // )";
                // $this->db->query($queryinsereditbayarhistori);
                // }
                $queryhapus = "DELETE FROM bayar WHERE id_bayar = '$input->val_idbayar'";
                $this->db->query($queryhapus);
                // exit();
                $this->db->transComplete();

            // if ($this->db->simpleQuery($query)) {
                if ($this->db->transStatus()) {
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
    public function Kasir_bukapenatajasa()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "UPDATE kunjungan SET posting = 'f',jam_keluar=null,id_cara_keluar=null,tgl_keluar=null WHERE id_kunjungan = '$input->id_kunjungan'";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Buka Penata Jasa";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Coba Lagi";
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
    public function mod_KasirUnpostingPJ()
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
        return view('view/modal/kasirgeneral/mod_KasirUnpostingPJ', $data);
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
                  //proses tambah penjamin pasien
                //$ceknorm ="select no_rm from transaksi where id_transaksi= '$input->id_transaksi'";
                // $no_rm = $this->db->query($ceknorm)->getRow()->no_rm;
                $cekpenjaminapakahtelahda = $this->db->query("select * from penjamin_pasien where no_rm='$input->norm' and id_penjamin='$input->id_penjamin'");
                if($cekpenjaminapakahtelahda->getNumRows() > 0){
                    $update = "UPDATE penjamin_pasien SET no_kartu = '$input->no_kartu' where no_rm= '$input->norm' and id_penjamin='$input->id_penjamin'";
                    $this->db->query($update);
                }
                else{
                    $querinsert = "INSERT INTO penjamin_pasien (no_rm,id_penjamin,no_kartu) VALUES (
                        '$input->norm',
                        '$input->id_penjamin',
                        '$input->no_kartu'
                    )";
                    $this->db->query($querinsert);
                }
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

                $querydetailtransaksi =  $this->db->query("SELECT * from detail_transaksi where id_transaksi='$input->val_id_transaksi'");
                if ($querydetailtransaksi->getNumRows() > 0) {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Sudah Ada Detail transaksi";
                    $this->hasil($output);
                    exit();
                }

                $this->db->transStart();

                // $idkamar =  $this->db->query("SELECT id_kamar from kunjungan where id_kamar is not null and id_transaksi='$input->val_id_transaksi' and  status_kunjungan='3'")->getRow()->id_kamar;;
                // if($idkamar > 0){
                //     $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$idkamar'");
                // }

                $cek_kamar =  $this->db->query("SELECT id_kamar from kunjungan where id_kamar is not null and id_transaksi='$input->val_id_transaksi' and  status_kunjungan='3'");
                //echo"$idkamar";exit();
                if($cek_kamar->getNumRows() > 0){
                    $idkamar= $cek_kamar->getRow()->id_kamar;
                    $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$idkamar'");
                }

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

                $querydeletepengantaranap = "DELETE FROM pengantar_rawat_inap WHERE id_transaksi = '$input->val_id_transaksi'";
                $this->db->query($querydeletepengantaranap);


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
            $cekobat_retur =  $this->db->query("select * from far_retur where id_transaksi='$input->val_id_transaksi' and posting='f'");
            if ($cekobat_retur->getNumRows() > 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Ada retur obat belum close, silahkan hubungi apotik";
                $this->hasil($output);
                exit();
            }
            
            // $this->db->transStart();
            $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->val_id_transaksi'";
            $querybayar = "select sum(jumlah) as sudahdibayar from bayar where id_transaksi='$input->val_id_transaksi'";
            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $hasil = $totalnominal - $totalnominalsudahdibayar;

            $querylunas = "select lunas from transaksi where id_transaksi='$input->val_id_transaksi'";
            $rowquerylunas = $this->db->query($querylunas)->getRow()->lunas;



            if (($hasil == 0 || $hasil == '0') || ($rowquerylunas == 't')) {
                $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup ='$val_date2',lunas='t' where id_transaksi= '$input->val_id_transaksi'";
                // echo"$queryupdatetransaksi";
                // exit();

                $this->db->transStart();
                $this->db->query($queryupdatetransaksi);
                //PROSES MENJURNAL
                $idGL = "PNJ-$input->val_id_transaksi";
                // echo"$idGL";
                // exit();
                // echo"$idGL";
                // echo"<br>";
                // echo"$input->val_id_transaksi";
                // echo"<br>";
                // echo"$input->val_id_user";
                // echo"<br>";
                // exit();
                //cek apakah id jurnal sudah ada ?
                $cekidjurnal = $this->db->query("SELECT id_jurnal from ac_jurnal where id_gl='$idGL'");
                // echo"$cekidjurnal";
                // exit();
                if ($cekidjurnal->getNumRows() > 0) {
                    $getid = $this->db->query("SELECT id_jurnal from ac_jurnal where id_gl='$idGL'")->getRow()->id_jurnal;
                    $id_jurnal = $getid;
                } else {
                    // echo"b";
                    // exit();
                    //jika belum ada ac_jurnal maka insert ac jurnal
                    $insertacjurnal = "INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                        '$idGL',
                        'Penjualan id Transaksi $input->val_id_transaksi',
                        '$input->val_id_user'
                    )returning id_jurnal";
                    // echo"$insertacjurnal";
                    // exit();
                    $id_jurnal = $this->db->query($insertacjurnal)->getRow()->id_jurnal;
                }
                // echo"$id_jurnal";
                // exit();
                // echo"$insertacjurnal";
                // exit();


                //cek komponen tarif maping
                $carikomponennull =  "SELECT
               jenis_component.jenis_component
           FROM
               transaksi 
               join pasien using(no_rm)
               join detail_transaksi using(id_transaksi)
               join detail_component using(id_detail_transaksi)
               JOIN jenis_component USING ( id_jenis_component )
               LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
               LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.kredit
           WHERE 
               id_transaksi = '$input->val_id_transaksi'
               and jurnal='f'
               AND account.id_acc is null
               group by 
               jenis_component.jenis_component,
               account.id_acc,
               account.coa,
               transaksi.id_transaksi,
               pasien.nama limit 1";
                if ($this->db->query($carikomponennull)->getNumRows() > 0) {
                    $komponenya = $this->db->query($carikomponennull)->getRow()->jenis_component;
                    // echo"a";exit();
                    $output['pesan'] = "Gagal Menjurnalkan silahkan cek mapping komponen $komponenya";
                    $output['status']   = "gagal";
                    $this->hasil($output);
                    exit();
                }

                // PROSES JURNAL DETAIL DEBIT
                $selectmapingcomponendebit = $this->db->query("SELECT
                                            jenis_component.jenis_component,
                                            sum(detail_component.harga*detail_transaksi.qty) as harga,
                                            account.id_acc,
                                            account.coa,
                                            transaksi.id_transaksi,
                                            pasien.nama,
                                            concat(account.coa,' ',transaksi.id_transaksi,' ',jenis_component.jenis_component) as keterangan
                                        FROM
                                            transaksi 
                                            join pasien using(no_rm)
                                            join detail_transaksi using(id_transaksi)
                                            join detail_component using(id_detail_transaksi)
                                            JOIN jenis_component USING ( id_jenis_component )
                                            LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
                                            LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.debit
                                        WHERE 
                                            id_transaksi = '$input->val_id_transaksi'
                                            and jurnal='f'
                                            group by 
                                            jenis_component.jenis_component,
                                            account.id_acc,
                                            account.coa,
                                            transaksi.id_transaksi,
                                            pasien.nama
                                            ");

                foreach ($selectmapingcomponendebit->getResult() as $rowselectmapingcomponendebit) {
                    // echo"$rowselectmapingcomponendebit->id_jenis_component";echo"<br>";
                    // echo"$rowselectmapingcomponendebit->id_acc";echo"<br>";
                    // echo"$rowselectmapingcomponendebit->jenis_component";echo"<br>";
                    // echo"$rowselectmapingcomponendebit->harga";echo"<br>";
                    // echo"$input->val_id_user";echo"<br>";
                    // exit();
                    // INSERT DETAIL JURNAL debit
                    $nama = str_replace("'", "''", "$rowselectmapingcomponendebit->nama");
                    $insert_detail_ac_jurnal = $this->db->query("INSERT INTO ac_jurnal_detail 
                    (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                    VALUES ('$id_jurnal', '$rowselectmapingcomponendebit->id_acc', '$rowselectmapingcomponendebit->keterangan','4','$nama','$rowselectmapingcomponendebit->harga','0','$input->val_id_user')");
                    // echo"$insert_detail_ac_jurnal";
                    // // exit();
                }
                // akhir debit
                // kredit
                
                $selectmapingcomponenkredit = $this->db->query("SELECT
                    jenis_component.jenis_component,
                    sum(detail_component.harga*detail_transaksi.qty) as harga,
                    account.id_acc,
                    account.coa,
                    transaksi.id_transaksi,
                    pasien.nama,
                    concat(account.coa,' ',transaksi.id_transaksi,' ',jenis_component.jenis_component) as keterangan
                FROM
                    transaksi 
                    join pasien using(no_rm)
                    join detail_transaksi using(id_transaksi)
                    join detail_component using(id_detail_transaksi)
                    JOIN jenis_component USING ( id_jenis_component )
                    LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
                    LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.kredit
                WHERE 
                    id_transaksi = '$input->val_id_transaksi'
                    and jurnal='f'
                    group by 
                    jenis_component.jenis_component,
                    account.id_acc,
                    account.coa,
                    transaksi.id_transaksi,
                    pasien.nama");
                    
                //echo"$selectmapingcomponenkredit";

                //cek komponen tarif maping
                // $carikomponennull =  $this->db->query("SELECT
                //     jenis_component.jenis_component
                // FROM
                //     transaksi 
                //     join pasien using(no_rm)
                //     join detail_transaksi using(id_transaksi)
                //     join detail_component using(id_detail_transaksi)
                //     JOIN jenis_component USING ( id_jenis_component )
                //     LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
                //     LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.kredit
                // WHERE 
                //     id_transaksi = '$input->val_id_transaksi'
                //     and jurnal='f'
                //     AND account.id_acc is null
                //     group by 
                //     jenis_component.jenis_component,
                //     account.id_acc,
                //     account.coa,
                //     transaksi.id_transaksi,
                //     pasien.nama")->getRow()->jenis_component;

                // if ($carikomponennull > 0) {
                //     // echo"a";exit();
                //     $output['pesan'] = "Gagal Menjurnalkan silahkan cek maping komponen $carikomponennull";
                //     $output['status']   = "gagal";
                //     $this->hasil($output);
                //     exit();
                // }

                foreach ($selectmapingcomponenkredit->getResult() as $rowselectmapingcomponenkredit) {
                    // var_dump($selectmapingcomponenkredit);
                    // echo"a";exit();
                    // INSERT DETAIL JURNAL
                    $nama = str_replace("'", "''", "$rowselectmapingcomponenkredit->nama");
                    $insert_detail_ac_jurnal =  $this->db->query("INSERT INTO ac_jurnal_detail 
                    (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                    VALUES ('$id_jurnal', '$rowselectmapingcomponenkredit->id_acc', '$rowselectmapingcomponenkredit->keterangan','4','$nama','0','$rowselectmapingcomponenkredit->harga','$input->val_id_user')");
                }
                
                $sqlupdatejurnal = $this->db->query("SELECT
                                                * 
                                            FROM
                                                detail_component 
                                            WHERE
                                                detail_component.jurnal='f' 
                                                and id_detail_transaksi IN ( SELECT id_detail_transaksi FROM detail_transaksi WHERE id_transaksi = '$input->val_id_transaksi' )");

                foreach ($sqlupdatejurnal->getResult() as $rowsqlupdatejurnal) {
                    $this->db->query("UPDATE detail_component SET jurnal = 't' WHERE id_detail_transaksi = '$rowsqlupdatejurnal->id_detail_transaksi' AND id_jenis_component = '$rowsqlupdatejurnal->id_jenis_component' and jurnal='f' ");
                }

                // JIKA ADA PEMABAYARAN DEPOSIT

                $cekapakahadapembayarandeposit = $this->db->query("SELECT * From bayar where id_transaksi='$input->val_id_transaksi' and id_pembayaran='6'");
                if ($cekapakahadapembayarandeposit->getNumRows() > 0) {
                    
                    $gl_kas_max = $this->db->query("SELECT
                                                CASE	
                                                    WHEN
                                                        x.glkasmax IS NULL THEN
                                                            '1' ELSE x.glkasmax 
                                                            END AS glkasmax 
                                                FROM
                                                    ( SELECT MAX ( substr( id_gl, 4 ) :: INTEGER + 1 ) AS glkasmax FROM ac_jurnal WHERE id_gl ILIKE'KM%' ) x")->getRow()->glkasmax;
                    $newGL = "KM-$gl_kas_max";
                    // Total Pembayaran
                    $querybayar = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->val_id_transaksi'";
                    $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;

                    //insert jurnal bayar 
                    $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                            '$newGL',
                            'Pemabayaran transaksi $input->val_id_transaksi',
                            '$input->val_id_user'
                        )returning id_jurnal")->getRow()->id_jurnal;

                    $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->val_id_transaksi'";
                    $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;

                    $querynama = "SELECT nama from transaksi join pasien using(no_rm) where id_transaksi='$input->val_id_transaksi' ";
                    $rowquerynama = $this->db->query($querynama)->getRow()->nama;


                    //piutang pendapatan K balance
                    $this->db->query("INSERT INTO ac_jurnal_detail 
                           (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                           VALUES ('$id_jurnalkas', '32', 'Piutang Pendapatan transaksi $input->val_id_transaksi','4','$rowquerynama','0','$totalnominal','$input->val_id_user')");

                    $listpembayaran = $this->db->query("SELECT
                        case 
                        when pembayaran.piutang='t' then 'piutang'
                        when (pembayaran.piutang='f' and pembayaran.bank='f'and bayar.id_pembayaran <> '6')  then 'kas'
                        when (pembayaran.piutang='f' and pembayaran.bank='t' )  then 'bank'
                        when (pembayaran.piutang='f' and pembayaran.bank='f'and bayar.id_pembayaran = '6')  then 'deposit'
                        end as kelompok,
                        bayar.tgl_bayar,
                        bayar.id_bayar,
                        bayar.id_transaksi,
                        bayar.id_pembayaran,
                        pembayaran.deskripsi_pembayaran,
                        bayar.jumlah,
                        ac_kas.id_kas,
                        ac_kas.kas_nama,
                        pembayaran.piutang,
                        pembayaran.bank,
                        pasien.nama,
                        pasien.no_rm,
                        ac_kas.id_acc,
                        ac_kas.kredit as kreditbayar                    
                        FROM
                        bayar 
                        join pembayaran using(id_pembayaran)
                        left join ac_kas using(id_kas)
                        join transaksi using(id_transaksi)
                        join pasien using(no_rm)
                        WHERE
                        id_transaksi = '$input->val_id_transaksi'
                        and jurnal ='f'");

                    foreach ($listpembayaran->getResult() as $rowlistpembayaran) {
                        if ($rowlistpembayaran->kelompok == 'kas') {
                          
                            if ($rowlistpembayaran->jumlah < 0) {
                                $nominalbalik = str_replace("-", "", $rowlistpembayaran->jumlah);

                                $kurangijumlahkasteller = $this->db->query("UPDATE ac_kas 
                                SET jumlah = (jumlah - $nominalbalik) 
                                WHERE
                                    id_kas = '$rowlistpembayaran->id_kas'");
                               
                                //kas kredit pengembalian    
                                $this->db->query("INSERT INTO ac_jurnal_detail 
                                (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                                VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$nominalbalik','$input->val_id_user')");
                        
                        } else {
                                $tambahjumlahkasteller = $this->db->query("UPDATE ac_kas 
                                SET jumlah = (jumlah + $rowlistpembayaran->jumlah) 
                                WHERE
                                    id_kas = '$rowlistpembayaran->id_kas'");
                                //DEBIT 
                                $this->db->query("INSERT INTO ac_jurnal_detail 
                                (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                                VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                            }
                        }
                        if ($rowlistpembayaran->kelompok == 'piutang') {
                            $gl_piu_max = $this->db->query("SELECT
                            CASE
                                WHEN
                                x.glmaxpiu IS NULL THEN 1 
                                ELSE x.glmaxpiu 
                                end as glmax_piutang
                                from ( SELECT MAX ( substr( id_gl, 5 ) :: INTEGER + 1 ) AS glmaxpiu FROM ac_jurnal WHERE id_gl ILIKE'PIU%' ) x")->getRow()->glmax_piutang;
                            $newGL_piu = "PIU-$gl_piu_max";
                            switch ($rowlistpembayaran->id_pembayaran) {
                                case "15": //jika piutang karyawan
                                    //debet
                                    $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                                                        VALUES ('34', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                    // //tabel ac_jurnal
                                    // //insert jurnal piutang 
                                    // $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    //     VALUES (
                                    //             '$newGL_piu',
                                    //             'Piutang karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                    //             '$input->val_id_user'
                                    //             )returning id_jurnal")->getRow()->id_jurnal;
                                    // //piutang karyawan debet    
                                    // $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '34', 'Piutang Karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                    // //piutang pendapatan kredit
                                    // $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                                    
                                    //piutang karyawan Jurnal Deposit
                                     $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalkas', '34', 'Piutang Karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                    break;
    
                                case "2": //jika piutang bpjs
                                    //debet
                                    $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) VALUES ('254', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                    // //tabel ac_jurnal
                                    // //insert jurnal piutang 
                                    // $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    //     VALUES (
                                    //             '$newGL_piu',
                                    //             'Piutang bpjs id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                    //             '$input->val_id_user'
                                    //             )returning id_jurnal")->getRow()->id_jurnal;
                                    // //piutang bpjs debet    
                                    // $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '254', 'Piutang BPJS id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                    // //piutang pendapatan kredit
                                    // $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                                    
                                    //piutang bpjs debet jurnal deposit
                                    $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalkas', '254', 'Piutang BPJS id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");

                                    break;
    
                                default: // selain itu masuk ke piutang non bpjs
                                    $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) VALUES ('49', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                    // //tabel ac_jurnal
                                    // //insert jurnal piutang 
                                    // $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    //     VALUES (
                                    //             '$newGL_piu',
                                    //             'Piutang Non bpjs id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                    //             '$input->val_id_user'
                                    //             )returning id_jurnal")->getRow()->id_jurnal;
                                    // //piutang non bpjs debet    
                                    // $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '49', 'Piutang Non Bpjs id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                    // //piutang pendapatan kredit
                                    // $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                           
                                    //piutang kas masuk deposit
                                    $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalkas', '49', 'Piutang Non Bpjs id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");

                                }
                        }
                        if ($rowlistpembayaran->kelompok == 'deposit') {
                            //uang muka penjualan D balance
                            $this->db->query("INSERT INTO ac_jurnal_detail 
                                            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                                            VALUES ('$id_jurnalkas', '82', 'Uang Muka Penjualan transaksi $input->val_id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                        }
                    }
                    
                } else {
                
                $listpembayaran = $this->db->query("SELECT
                    case 
                    when pembayaran.piutang='t' then 'piutang'
                    when (pembayaran.piutang='f' and pembayaran.bank='f'and bayar.id_pembayaran <> '6')  then 'kas'
                    when (pembayaran.piutang='f' and pembayaran.bank='t' )  then 'bank'
					when (pembayaran.piutang='f' and pembayaran.bank='f'and bayar.id_pembayaran = '6')  then 'deposit'
                    end as kelompok,
                    bayar.tgl_bayar,
                    bayar.id_bayar,
                    bayar.id_transaksi,
                    bayar.id_pembayaran,
                    pembayaran.deskripsi_pembayaran,
                    bayar.jumlah,
                    ac_kas.id_kas,
                    ac_kas.kas_nama,
                    pembayaran.piutang,
                    pembayaran.bank,
                    pasien.nama,
                    pasien.no_rm,
                    ac_kas.id_acc,
                    ac_kas.kredit as kreditbayar                    
                FROM
                    bayar 
                    join pembayaran using(id_pembayaran)
                    left join ac_kas using(id_kas)
                    join transaksi using(id_transaksi)
                    join pasien using(no_rm)
                WHERE
                    id_transaksi = '$input->val_id_transaksi'
                    and jurnal ='f'");
                foreach ($listpembayaran->getResult() as $rowlistpembayaran) {

                    //tunai
                    if ($rowlistpembayaran->kelompok == 'kas') {
                        // if (($rowlistpembayaran->piutang == false || $rowlistpembayaran->piutang == 'f') && ($rowlistpembayaran->bank == false || $rowlistpembayaran->bank == 'f')) {
                        // echo "".$rowlistpembayaran->id_bayar."kas";
                        // echo "<br>";
                        //insert kas
                        $tambahjumlahkasteller = $this->db->query("UPDATE ac_kas 
                        SET jumlah = (jumlah + $rowlistpembayaran->jumlah) 
                        WHERE
                            id_kas = '$rowlistpembayaran->id_kas'");


                        $gl_kas_max = $this->db->query("SELECT
                                        max(substr(id_gl,4)::INTEGER+1) as glkasmax
                                    FROM
                                        ac_jurnal 
                                    WHERE
                                        id_gl ILIKE 'KM%'")->getRow()->glkasmax;
                        $newGL = "KM-$gl_kas_max";
                        
                        // echo"INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                        //     '$newGL',
                        //     '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi',
                        //     '$input->val_id_user'
                        // )returning id_jurnal";exit();
                        //insert jurnal bayar 
                        $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                            '$newGL',
                            '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi',
                            '$input->val_id_user'
                        )returning id_jurnal")->getRow()->id_jurnal;
                                        // echo"a";exit();    

                        //kas debet    
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                        //piutang pendapatan kredit
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->kreditbayar', 'Piutang Pendapatan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                }
                    //by bank
                    if ($rowlistpembayaran->kelompok == 'bank') {
                        // if (($rowlistpembayaran->piutang == false || $rowlistpembayaran->piutang == 'f') && ($rowlistpembayaran->bank == true || $rowlistpembayaran->bank == 't')) {
                        // echo "".$rowlistpembayaran->id_bayar."bank";
                        // echo "<br>";
                        //insert kas
                        $tambahjumlahkasbank = $this->db->query("UPDATE ac_kas 
                        SET jumlah = (jumlah + $rowlistpembayaran->jumlah) 
                        WHERE
                            id_kas = '$rowlistpembayaran->id_kas'");

                        $gl_kas_max = $this->db->query("SELECT
                        max(substr(id_gl,4)::INTEGER+1) as glkasmax
                        FROM
                        ac_jurnal 
                        WHERE
                        id_gl ILIKE 'KM%'")->getRow()->glkasmax;
                        $newGL = "KM-$gl_kas_max";

                        //insert jurnal bayar 
                        $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                        '$newGL',
                        '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi',
                        '$input->val_id_user'
                        )returning id_jurnal")->getRow()->id_jurnal;;
                        //insert kas
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                        //piutang pendapatan kredit
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                           (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                           VALUES ('$id_jurnalkas', '$rowlistpembayaran->kreditbayar', 'Piutang Pendapatan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                    }
                    //piutang
                    if ($rowlistpembayaran->kelompok == 'piutang') {
                      
                        $gl_piu_max = $this->db->query("SELECT
                        CASE
                            WHEN
                            x.glmaxpiu IS NULL THEN 1 
                            ELSE x.glmaxpiu 
                            end as glmax_piutang
                            from ( SELECT MAX ( substr( id_gl, 5 ) :: INTEGER + 1 ) AS glmaxpiu FROM ac_jurnal WHERE id_gl ILIKE'PIU%' ) x")->getRow()->glmax_piutang;
                         $newGL_piu = "PIU-$gl_piu_max";

                        switch ($rowlistpembayaran->id_pembayaran) {
                            case "15": //jika piutang karyawan
                                //debet
                                $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                                                    VALUES ('34', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                //tabel ac_jurnal
                                //insert jurnal piutang 
                                $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    VALUES (
                                            '$newGL_piu',
                                            'Piutang karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                            '$input->val_id_user'
                                            )returning id_jurnal")->getRow()->id_jurnal;    
                                //piutang karyawan debet    
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '34', 'Piutang Karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                //piutang pendapatan kredit
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");                            
                                break;

                            case "2": //jika piutang bpjs
                                //debet
                                $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) VALUES ('254', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                //tabel ac_jurnal
                                //insert jurnal piutang 
                                $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    VALUES (
                                            '$newGL_piu',
                                            'Piutang bpjs id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                            '$input->val_id_user'
                                            )returning id_jurnal")->getRow()->id_jurnal;    
                                //piutang bpjs debet    
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '254', 'Piutang BPJS id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                //piutang pendapatan kredit
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                               break;

                            default: // selain itu masuk ke piutang non bpjs
                                $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) VALUES ('49', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                               //tabel ac_jurnal
                                //insert jurnal piutang 
                                $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    VALUES (
                                            '$newGL_piu',
                                            'Piutang Non bpjs id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                            '$input->val_id_user'
                                            )returning id_jurnal")->getRow()->id_jurnal;    
                                //piutang non bpjs debet    
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '49', 'Piutang Non Bpjs id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                //piutang pendapatan kredit
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                              
                       }
                    }
                    if ($rowlistpembayaran->kelompok == 'deposit') {
                        // if (($rowlistpembayaran->piutang == false || $rowlistpembayaran->piutang == 'f') && ($rowlistpembayaran->bank == true || $rowlistpembayaran->bank == 't')) {
                        // echo "".$rowlistpembayaran->id_bayar."bank";
                        // echo "<br>";
                        //insert kas

                        $gl_kas_max = $this->db->query("SELECT
                                                    CASE
                                                        WHEN
                                                            x.glkasmax IS NULL THEN 1 
                                                            ELSE x.glkasmax 
                                                                END AS glkasmax 
                                                    FROM
                                                        ( SELECT MAX ( substr( id_gl, 4 ) :: INTEGER + 1 ) AS glkasmax FROM ac_jurnal WHERE id_gl ILIKE'KM%' ) x")->getRow()->glkasmax;
                        $newGL = "KM-$gl_kas_max";

                        $sisadeposit = $this->db->query("SELECT sum(kredit) - sum(debit) as sisa
                                                            from deposit
                                                            where no_rm='$rowlistpembayaran->no_rm'
                                                            and id_kas='$rowlistpembayaran->id_kas'")->getRow()->sisa;
                        //insert jurnal bayar 
                        $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                        '$newGL',
                        'Pembayaran dari deposit $rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi',
                        '$input->val_id_user'
                        )returning id_jurnal")->getRow()->id_jurnal;

                        //uang muka penjualan D balance
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                       (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                       VALUES ('$id_jurnalkas', '82', 'Uang Muka Penjualan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                        //piutang pendapatan K balance
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                       (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                       VALUES ('$id_jurnalkas', '$rowlistpembayaran->kreditbayar', 'Piutang Pendapatan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");

                        if ($sisadeposit > 0) {
                            // kas / bank  K
                            $keterangan = 'Pengembalian dana otomatis tutup tansaksi';
                            $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$keterangan $rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$sisadeposit','$input->val_id_user')");
                            //uang muka penjualan D balance
                            // $this->db->query("INSERT INTO ac_jurnal_detail 
                            //    (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                            //    VALUES ('$id_jurnalkas', '82', 'Kembalian Uang Muka Penjualan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$sisadeposit','0','$input->val_id_user')");

                            //udpate nominal kas untuk kembalian sisa
                            $this->db->query("UPDATE ac_kas 
                        SET jumlah = (jumlah - $sisadeposit) 
                        WHERE
                            id_acc = '$rowlistpembayaran->id_acc'");
                            // update tabel deposit
                            $idjenisaktivitas = '10';
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

                            $this->db->query("INSERT INTO deposit (tgl_deposit,no_rm,id_user,shift,debit,id_jenis_aktivitas_keuangan,keterangan,id_kas)
                                VALUES (
                                    '$valwaktutransaksi',
                                    '$rowlistpembayaran->no_rm',
                                    '$input->val_id_user',
                                    '$shit',
                                    '$sisadeposit',
                                    '$idjenisaktivitas',
                                    '$keterangan',
                                    '$rowlistpembayaran->id_kas' )");
                        } else {
                            //kas bank D
                            // $this->db->query("INSERT INTO ac_jurnal_detail 
                            // (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                            // VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");

                        }
                    }
                }

            }
                //update jurnal f di bayar
                $this->db->query("UPDATE bayar SET jurnal = 't' WHERE id_transaksi = '$input->val_id_transaksi'");
                // $this->db->query("UPDATE transaksi SET jurnal = 't' WHERE id_transaksi = '$input->val_id_transaksi'");



                $this->db->transComplete();


                if ($this->db->transStatus()) {
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
                $output['nominalkurang']    = $hasil;

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
            } else {
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
    public function laporanpercomponen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $replacetglwal = str_replace("/", "-", $_POST['tglawal']);
        $dateawal = date_create($replacetglwal);
        $tglawal = date_format($dateawal, "Y-m-d");

        $replacetglakhir = str_replace("/", "-", $_POST['tglakhir']);
        $dateakhir = date_create($replacetglakhir);
        $tglakhir = date_format($dateakhir, "Y-m-d");



        $query = $this->db->query("SELECT
        transaksi.id_transaksi,
        nama,
        nama_penjamin,
        sum(detail_component.harga*detail_transaksi.qty) as sum_sub_jumlahharga
    FROM
        transaksi
        join pasien on pasien.no_rm=transaksi.no_rm
        join detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        join detail_component on detail_component.id_detail_transaksi=detail_transaksi.id_detail_transaksi
        left join penjamin_transaksi on penjamin_transaksi.id_transaksi=transaksi.id_transaksi and penjamin_transaksi.penjamin_utama='t'
        left join penjamin on penjamin.id_penjamin=penjamin_transaksi.id_penjamin
    WHERE
        DATE ( tgl_tutup ) BETWEEN '$tglawal' 
        AND '$tglakhir'
        GROUP by transaksi.id_transaksi,nama_penjamin,nama");


        $html = "<html>
            <body>
            <div>
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
    <div style='text-align:center';paddibg-top:15px>Laporan Penerimaan Pasien Percomponent " . date_indo($tglawal) . " sd " . date_indo($tglakhir) . " </div>

    <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
    ";
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
            <td colspan='4'><b>No.Transaksi : " . $row->id_transaksi . " / " . $row->nama . " / " . $row->nama_penjamin . " / " . format_ribuan($row->sum_sub_jumlahharga) . " </b></td>
            </tr>";
            $html .= "<tr>
            <td><b>Tgl.Tutup Transaksi</b></td>
            <td><b>Jenis Componen</b></td>
            <td><b>Diskon</b></td>
            <td><b>Jumlah</b></td>

            </tr>";
            $query_detail = $this->db->query("SELECT
            date(tra.tgl_tutup) as tgl_tutup,
                tra.id_transaksi,
                jc.jenis_component,
                sum(dc.harga_asli) sum_harga_asli,
                sum(dc.diskon_rupiah) as sum_diskon_rupiah,
                sum(dc.harga*dtra.qty) as sum_harga
            FROM
                detail_component dc
                JOIN detail_transaksi dtra ON dc.id_detail_transaksi = dtra.id_detail_transaksi
                join jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
                join transaksi tra on tra.id_transaksi=dtra.id_transaksi and tra.tgl_tutup is not null
                WHERE date(tra.tgl_tutup) between '$tglawal' and '$tglakhir'
                and tra.id_transaksi='$row->id_transaksi'
				GROUP by tra.tgl_tutup,jenis_component, tra.id_transaksi,jc.jenis_component");
            foreach ($query_detail->getResult() as $row_detail) {
                $html .= "<tr>
                        <td>" . tglindo($row_detail->tgl_tutup) . "</td>
                        <td>$row_detail->jenis_component</td>
                        <td>" . format_ribuan($row_detail->sum_diskon_rupiah) . "</td>
                        <td>" . format_ribuan($row_detail->sum_harga) . "</td>
                    </tr>
                    ";
            }
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
    public function pegawaikas()
    {
        $x =  $this->db->query("SELECT * FROM users where id_kas is not null order by nama ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }
    public function ceknominalkoma()
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
            count(id_transaksi) as jum
        FROM
            detail_transaksi 
        WHERE
            id_transaksi = '$input->id_transaksi' 
            AND total_harga :: VARCHAR ILIKE '%.%'";
            $query = $this->db->query($query)->getRow()->jum;


            $sum = $query;
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    public function penatajasaRWJ_deletecomponentpegawai(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_jenis_component','id_detail_transaksi'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
           
                $query = "UPDATE detail_component SET id_pegawai = NULL WHERE id_detail_transaksi = '$input->id_detail_transaksi' AND id_jenis_component = '$input->id_jenis_component'";
                // echo"$query";
                // exit();
                if ($this->db->simpleQuery($query)) {
                    $output['status']   = "sukses";
                    $output['code']   = "200";
                    $output['pesan']    = "Sukses";
                } else {
                    $output['status']   = "gagal";
                    $output['code']   = "XX";
                    $output['pesan']    = "Gagal";
                }
            
            
        }
        $this->hasil($output);
    }
    public function LaporanPertindakanPerkomponen2()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Komponen Detail V2.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];

        $replacetglwal  = str_replace("/", "-", $_POST['tglawal']);
        $dateawal       = date_create($replacetglwal);
        $tglawal1       = date_format($dateawal, "d-M-Y");

        $replacetglwal2 = str_replace("/", "-", $_POST['tglakhir']);
        $dateawal2      = date_create($replacetglwal2);
        $tglawal2       = date_format($dateawal2, "d-M-Y");


        $query  = $this->db->query("SELECT
        transaksi.id_transaksi,
		penjamin.nama_penjamin,
        transaksi.tgl_transaksi,
        transaksi.tgl_tutup,
        pasien.no_rm,
        pasien.nama ,
        unit.nama_unit,
		CASE WHEN  ruang_inap is null THEN unit.nama_unit ELSE ruang_inap.nama_ruang END as nama_ruang,
        produk.nama_produk,
        jenis_component.jenis_component,
        detail_component.harga*detail_transaksi.qty as harga,
        account.coa
    FROM
        detail_component
        JOIN detail_transaksi using( id_detail_transaksi )
        JOIN transaksi using(id_transaksi)
				join penjamin_transaksi on transaksi.id_transaksi =penjamin_transaksi.id_transaksi and penjamin_utama is true
				join penjamin using (id_penjamin)
        JOIN kunjungan using(id_kunjungan)
        JOIN unit using(id_unit)
				left join  kamar using (id_kamar)
				left join  ruang_inap using (id_ruang)
        JOIN pasien using(no_rm)
        JOIN produk using(id_produk)
        JOIN jenis_component using(id_jenis_component)
        JOIN map_componen_account_jurnal on map_componen_account_jurnal.id_jenis_component=jenis_component.id_jenis_component
        JOIN account on account.id_acc=map_componen_account_jurnal.kredit
        where transaksi.tgl_tutup is not null
        and date(transaksi.tgl_tutup) BETWEEN '$tglawal' and '$tglakhr'
        order by transaksi.id_transaksi asc;
        ");
        // echo"$query";
        // exit();
        $html = "<html>
                    <body style='font-family: Times New Roman;'>
                        <h4 style='text-align:center; font-weight: bold';>Laporan Penerimaan Perkomponen Detail <br>Tanggal $tglawal1 s/d $tglawal2 </h4>
                        <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
                            <tr style='background-color: #abdaa8;'>
                                <td><b>No</b></td>
                                <td><b>No. Transaksi</b></td>
                                <td><b>Nama Penjamin</b></td>
                                <td><b>Tgl. Transaksi</b></td>
                                <td><b>Tgl. Tutup Transaksi</b></td>
                                <td><b>No Rm</b></td>
                                <td><b>Nama Pasien</b></td>
                                <td><b>Unit</b></td>
                                <td><b>Ruangan</b></td>
                                <td><b>Deskripsi</b></td>
                                <td><b>Komponen</b></td>
                                <td><b>Nominal</b></td>
                                <td><b>Coa</b></td>
                            </tr>";
        if ($query->getNumRows() > 0){
            $no = 1;
            foreach ($query->getResult() as $row) {
                $html .= "  <tr>
                                <td style='vertical-align: middle;'>$no</td>
                                <td style='vertical-align: middle;'>$row->id_transaksi</td>
                                <td style='vertical-align: middle;'>$row->nama_penjamin</td>
                                <td style='vertical-align: middle;'>$row->tgl_transaksi</td>
                                <td style='vertical-align: middle;'>$row->tgl_tutup</td>
                                <td style='vertical-align: middle;'>$row->no_rm</td>
                                <td style='vertical-align: middle;'>$row->nama</td>
                                <td style='vertical-align: middle;'>$row->nama_unit</td>
                                <td style='vertical-align: middle;'>$row->nama_ruang</td>
                                <td style='vertical-align: middle;'>$row->nama_produk</td>
                                <td style='vertical-align: middle;'>$row->jenis_component</td>
                                <td style='vertical-align: middle;'>$row->harga</td>
                                <td style='vertical-align: middle;'>$row->coa</td>
                            </tr>";
                $no++;
            }
        }else{
            $html .= "  <tr>
                            <td colspan='15' style='vertical-align: middle; text-align: center;'><b>-- Data Tidak Ditemukan --</b></td>                            
                        </tr>";
        }

        $html .= "      </table>
                    </body>
                </html>";

        echo $html;
        exit;
    }
    public function cetakbill()
    {
        $input = json_decode(file_get_contents('php://input'));
        // var_dump($input);
        // exit();
        $namauser   = $_POST['namausernya'];
        // echo"$namauser";
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
         transaksi.id_transaksi = '$validtrans'
         ");

        $querydokterkunjungan = $this->db->query("SELECT
        distinct(nama_pegawai)
        FROM
        transaksi
        JOIN kunjungan USING ( id_transaksi ) 
        JOIN pegawai using(id_pegawai)
        WHERE
        id_transaksi = '$validtrans'
        and pegawai.jenis_pegawai='1'");

        $nama_penjamin = $this->db->query("select nama_penjamin from penjamin_transaksi join penjamin using(id_penjamin) where id_transaksi='$validtrans' and penjamin_utama='t'")->getRow()->nama_penjamin;
        $sep = $this->db->query("select no_sjp from penjamin_transaksi join penjamin using(id_penjamin) where id_transaksi='$validtrans' and penjamin_utama='t'")->getRow()->no_sjp;

        $query = $this->db->query("SELECT
        detail_transaksi.id_detail_transaksi,
        produk.id_produk,
        kunjungan.tgl_masuk,
        unit.nama_unit,
        produk.nama_produk,
        jenis_produk.deskripsi,
        x.harga_asli,
        x.harga_penyajian,
        x.diskon_rupiah,
        x.sum_diskon_rupiah,
        detail_transaksi.qty,
        detail_transaksi.harga,
        detail_transaksi.total_harga,
        x.sum_total_harga_asli,
				case when x.harga_detail_component = x.harga_asli Then  x.sum_total_harga_asli
						 when x.harga_detail_component <> x.harga_asli Then  x.sum_detail_component
						 END hargapenyajiantotal,
                case when x.sum_diskon_rupiah = 0 Then  x.harga_penyajian
						 when (x.sum_diskon_rupiah > 0 or x.sum_diskon_rupiah is null) Then  x.harga_asli
						 END v_hargapenyajian              
        FROM
        detail_transaksi
        JOIN kunjungan USING ( id_kunjungan ) 
        JOIN produk USING (id_produk)
        JOIN jenis_produk using (id_jenis_produk)
        JOIN unit USING (id_unit)
        LEFT JOIN (
                                SELECT id_produk,id_detail_transaksi,
                                sum((harga_asli*qty)/qty) as harga_asli,
                                sum(harga_asli*qty) as sum_total_harga_asli, 
                                sum(diskon_rupiah*qty) as sum_diskon_rupiah,
                                sum((diskon_rupiah*qty)/qty) as diskon_rupiah,
								sum((detail_component.harga*qty)/qty) as harga_detail_component,
								sum(detail_component.harga*qty) as sum_detail_component,
                                SUM ( (detail_component.harga * qty) / qty ) AS harga_penyajian
                                FROM 
                                detail_transaksi JOIN detail_component using(id_detail_transaksi) 
                                where detail_transaksi.id_transaksi = '$validtrans'
                                GROUP by id_produk,id_detail_transaksi
                            ) x on detail_transaksi.id_detail_transaksi=x.id_detail_transaksi
        WHERE
        detail_transaksi.id_transaksi = '$validtrans' order by kunjungan.tgl_masuk,unit.nama_unit");

        $querytotal = $this->db->query("SELECT sum(total_harga) as totalharga FROM
        detail_transaksi
        WHERE
        id_transaksi = '$validtrans'");

        $querybayar = $this->db->query("SELECT * from bayar join pembayaran using(id_pembayaran) WHERE id_transaksi = '$validtrans'");
        // var_dump($querypasien);
        // exit();

        //cek apakah ada inap
        $cekinap = $this->db->query("select count(id_kunjungan) as adainap from kunjungan where id_transaksi='$validtrans' and id_kamar is not null")->getRow()->adainap;
        if($cekinap> 0){
            //awal masuk kunjungan entah itu igd atau inap
            // $masukawalsekali = $this->db->query("select tgl_masuk from kunjungan where id_transaksi='$validtrans' and status_kunjungan=0")->getRow()->tgl_masuk;
            //awal masuk inap
             $masukawalinap =  $this->db->query("select tgl_masuk from kunjungan where id_transaksi='$validtrans' and awal_inap='t'")->getRow()->tgl_masuk;
            //keluar inap
            $keluarinap = $this->db->query("select tgl_keluar from kunjungan where id_transaksi='$validtrans' and status_kunjungan='3'")->getRow()->tgl_keluar;
            if($keluarinap == null || $keluarinap == ''){
                $keluarinap ='-';
                $lamarawat ='-';
                $keluarinap_indo = '-';
                $masukawalinap_indo = date_indo($masukawalinap);
            }
            else{
                $keluarinap_indo = date_indo($keluarinap);
                $masukawalinap_indo = date_indo($masukawalinap);
                $date1=date_create("$masukawalinap");
                $date2=date_create("$keluarinap");
                $diff=date_diff($date1,$date2);
                $lamarawat = ($diff->format("%R%a"))+1;
                // exit();
            }
            //
            
            $htmlinap = "<tr>
                            <td>Tgl. Masuk inap</td>
                            <td>:</td>
                            <td>" . $masukawalinap_indo . "</td>
                          </tr>
                          <tr>
                            <td>Tgl. Keluar inap</td>
                            <td>:</td>
                            <td>" . $keluarinap_indo . "</td>
                          </tr>
                          <tr>
                            <td>Lama Rawat</td>
                            <td>:</td>
                            <td>" . $lamarawat  . " hari</td>
                          </tr>";
        }
        else{
            $htmlinap = "";
        }
        $html = "<div><table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
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
    <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'></div>";  
         $html .= " <table align='center' style='border:0px solid black;border-collapse:collapse;width:100%;'>";

        foreach ($querypasien->getResult() as $datatransaksi); {
            if ($datatransaksi->jenis_kelamin == 'f') {
                $kelamin = "Perempuan";
            } else {
                $kelamin = "Laki-laki";
            }
            $tgltransaksi = substr($datatransaksi->tgl_transaksi, 0, 10);
            if($datatransaksi->tgl_tutup == null || $datatransaksi->tgl_tutup == ''){
                $tgltutuptransaksi ="-";
            }
            else{
                $tgltutuptransaksi = date_indo(substr($datatransaksi->tgl_tutup, 0, 10));
            }
           
            // echo"$tgltutuptransaksi";exit();
            $html .= "<tr>
            <td style='width: 150px;'>No. Transaksi</td>
            <td style='width: 5px;'>:</td>
            <td>#" . $datatransaksi->id_transaksi . "</td>
            </tr>
            <tr>
            <td style='width: 150px;'>Penjamin</td>
            <td style='width: 5px;'>:</td>
            <td>" . $nama_penjamin . "</td>
            </tr>
            <tr>
            <td style='width: 150px;'>No. Penjamin</td>
            <td style='width: 5px;'>:</td>
            <td>" . $sep . "</td>
            </tr>
            <tr>
            <td>Tgl. Transaksi</td>
            <td>:</td>
            <td>" . date_indo($tgltransaksi) . "</td>
            </tr>
            <tr>
            <td>Tgl. Tutup Transaksi</td>
            <td>:</td>
            <td>" . $tgltutuptransaksi. "</td>
            </tr>
            <tr>
            <td>Nama</td>
            <td>:</td>
            <td>$datatransaksi->nama</td>
            </tr>
            <tr>
            <td>No.Rekam Medis</td>
            <td>:</td>
            <td>$datatransaksi->no_rm</td>
            </tr>
            <tr>
            <td>Kelamin</td>
            <td>:</td>
            <td>$kelamin</td>
            </tr>
            <tr>
            <td>Tgl. Lahir</td>
            <td>:</td>
            <td>" . date_indo($datatransaksi->tgl_lahir) . "</td>
            </tr>
            <tr>
            <td valign='top'>Alamat</td>
            <td valign='top'>:</td>
            <td valign='top'>" . $datatransaksi->alamat_ktp . ", " . $datatransaksi->kelurahan . ", " . $datatransaksi->kecamatan . "," . $datatransaksi->kabupaten . " " . $datatransaksi->propinsi . " </td>
            </tr>
            $htmlinap";
        }
        $html .= "</table>";
        $html .= "
          <br>
          <table border='1' align='center'  style='border:1px solid black;border-collapse:collapse;width:100%;'>
            <tr>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>No</th>
            <th style='border:1px solid black;text-align: left;font-weight: bold;'>Unit</th>
            <th style='border:1px solid black;text-align: left;font-weight: bold;'>Deskripsi</th>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Jumlah</th>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Harga</th>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Diskon</th>
            <th style='border:1px solid black;text-align: right;font-weight: bold;width:130px;'>Total</th>
            </tr>
            ";
        $queryjenisproduk = $this->db->query("SELECT
        jenis_produk.id_jenis_produk,
        jenis_produk.deskripsi
    FROM
        detail_transaksi 
        join produk using(id_produk)
        join jenis_produk using(id_jenis_produk)
    WHERE
        id_transaksi = '$validtrans'
        GROUP by jenis_produk.id_jenis_produk
        order by jenis_produk.deskripsi asc");
        foreach ($queryjenisproduk->getResult() as $datajenisproduk) {
            $html .= "
            <tr>
                <td colspan='7'><b>$datajenisproduk->deskripsi</b></td>
            </tr>";
            $no = 1;
            $sum = 0;

            foreach ($query->getResult() as $row) {
                if ($datajenisproduk->deskripsi == $row->deskripsi) {

                    $html .= "
                    <tr>
                    <td style='border:1px solid black;text-align: center;'>$no</td>
                    <td style='border:1px solid black;'>$row->nama_unit</td>
                    <td style='border:1px solid black;'>$row->nama_produk";
                    if($datajenisproduk->id_jenis_produk == '10' || $datajenisproduk->id_jenis_produk == '5' || $datajenisproduk->id_jenis_produk == '13'){
                        $querypeg=$this->db->query("SELECT
                                                    pegawai.nama_pegawai 
                                                FROM
                                                    detail_component join pegawai on detail_component.id_pegawai=pegawai.id_pegawai
                                                    join jenis_component on jenis_component.id_jenis_component=detail_component.id_jenis_component
                                                WHERE
                                                    id_detail_transaksi = '$row->id_detail_transaksi'");
                                    foreach ($querypeg->getResult() as $row_querypeg) {
                            
                                     $html .= "<br><p style='font-size:10px'>$row_querypeg->nama_pegawai</p>";
                                
                                         }
                    }

                    $html.="</td>
                    <td style='border:1px solid black;text-align: center;'>$row->qty</td>
                    <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->v_hargapenyajian) . "</td>
                    <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->sum_diskon_rupiah) . "</td>
                    <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->total_harga) . "</td>
                    </tr>
                    ";
                    $no++;
                    $sum += $row->total_harga;
                }
              
                
            }
            $html .= "
            <tr>
                <td colspan='6' style='text-align:right'><b>Sub Total</b></td>
                <td style='text-align:right'><b>".format_ribuan($sum)."</b></td>
            </tr>";
        }


        foreach ($querytotal->getResult() as $rowtotal) {

            $html .= "
            <tr>
            <td style='text-align: right;font-weight: bold' colspan='6'>Total Biaya</td>
            <td  style='text-align: right;font-weight: bold'>Rp. " . format_ribuan($rowtotal->totalharga) . "</td>
            </tr>
            ";
            
        }
        foreach ($querybayar->getResult() as $rowtotalbayar) {
            $html .= "
            <tr>
            <td style='border:1px solid black;text-align: right;font-weight: bold' colspan='6'>" . $rowtotalbayar->deskripsi_pembayaran . "</td>
            <td  style='border:1px solid black;text-align: right;font-weight: italic;'><i>Rp. " . format_ribuan($rowtotalbayar->jumlah) . "<i></td>
            </tr>
            ";
            
        }
        $html .= "
            </table>
            <br>
            <div style='border:0px solid black;border-collapse:collapse;width:100%';font-size:8px><u><b>Dokter</b></u> :</div>
            <table style='border:0px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querydokterkunjungan->getResult() as $rowquerydokterkunjungan) {
            $html .= "
            <tr>
            <td style='font-size:10px'>$rowquerydokterkunjungan->nama_pegawai</td>
            </tr>";
        }
        $html .= "</table><pagebreak>";
         //RESEP
       
         $cariresep = $this->db->query(" SELECT * FROM kunjungan inner join far_obat_out using(id_kunjungan) WHERE id_transaksi = '$validtrans' and far_obat_out.dilayani='1' order by id_kunjungan asc");
          
        foreach ($cariresep->getResult() as $listRow_cariresep) {
             $id_kunj   =  $listRow_cariresep->id_kunjungan;
             //$tgl_kunj  = $listRow_cariresep->tgl_masuk;
             //echo"a";exit();

             $tgl_resp  = $listRow_cariresep->tglresep;
             
             $no_rm     = $listRow_cariresep->norm;
             
             $idunit    = $listRow_cariresep->id_unit;

             $noresep   = $listRow_cariresep->noresep;


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
                 if (($jenis_unit == '1')||($jenis_unit == '7')){
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
             $html .= "<div>

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
             <td>$nama_penjamin</td>
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
             $html .= "</div><pagebreak>";

        }

        $cariretur = $this->db->query(" SELECT * FROM kunjungan inner join far_retur ON kunjungan.id_kunjungan = far_retur.id_kunjungan_far  WHERE kunjungan.id_transaksi = '$validtrans' and far_retur.posting = true  order by id_kunjungan asc");
          
        foreach ($cariretur->getResult() as $listRow_cariretur) {
            $id_kunj       = $listRow_cariretur->id_kunjungan;
            $no_retur      = $listRow_cariretur->no_retur;
            $tgl_retur     = $listRow_cariretur->tgl_retur;
            $no_rm         = $listRow_cariretur->no_rm;
            $idunit        = $listRow_cariretur->id_unit;

            $query  = " SELECT
                            no_rm,
                            pasien.nama,
                            tgl_masuk,
                            no_retur,
                            tgl_retur,
                            far_retur.id_unit,
                            nama_unit,
                            tgl_lahir,
                            nama_pegawai,
                            users.nama AS nm_user,
                            nama_penjamin,
                            total,
                            hpp,
                            ppn,
                            kunjungan.id_unit 
                        FROM
                            far_retur
                            LEFT JOIN kunjungan ON kunjungan.id_kunjungan = far_retur.id_kunjungan_far 
                            INNER JOIN pasien USING ( no_rm )
                            INNER JOIN unit ON kunjungan.id_unit = unit.id_unit
                            INNER JOIN pegawai ON pegawai.id_pegawai = far_retur.id_pegawai
                            INNER JOIN users ON users.id_user = far_retur.id_user
                            INNER JOIN penjamin ON penjamin.id_penjamin = far_retur.penjamin 
                        WHERE
                            far_retur.id_kunjungan_far = '$id_kunj'";
         
            $row        = $this->db->query($query)->getRow();
            if ($this->db->query($query)->getNumRows() == 0){
                $output['status']   = "gagal";
                $output['pesan']    = "Retur Belum Disimpan..";
                $this->hasil($output);
                return;
            }
             
            if (strlen($row->nama) > 26) {
                $nmapasien = substr($row->nama, 0, 26)."...";
            }else{
                $nmapasien = $row->nama;
            }
            
            $html .= "
                <div><hr>
                <table align='center' cellspacing='3' cellpadding='3' style='border:1px solid black;' width='100%'>";
            $html .= "
                <tr>
                    <td width='100'>No Retur</td>
                    <td width='10'>:</td>
                    <td width='268'>$no_retur</td>
                    <td width='110'>Nama</td>
                    <td width='10'>:</td>
                    <td>$nmapasien</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>$tgl_retur</td>
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
                    <td>$nama_penjamin</td>
                </tr>";
            $html .= "</table>";
            
            $ReturObatJadi  = " SELECT
                                    * 
                                FROM
                                    far_retur
                                    INNER JOIN far_retur_det USING ( no_retur, tgl_retur)
                                    INNER JOIN far_obat USING ( kd_obat )
                                    INNER JOIN pegawai USING ( id_pegawai ) 
                                WHERE
                                    no_retur = '$no_retur' 
                                    -- AND jns_racikan = '0' 
                                ORDER BY
                                    urut ASC ";
         
            $totalhargaReturObat = 0;
            
            if ($this->db->query($ReturObatJadi)->getNumRows() > 0){
                                     
                $html .= "<p style='text-align:center; font-weight: bold';>-- Obat Retur--</p>
                    <table border='1' cellpadding='2' cellspacing='0' width='100%'>
                    <tr>
                    <td width='30'><b>No</b></td>
                    <td ><b>Nama Obat</b></td>
                    <td width='70'><b>Jumlah</b></td>
                    <td width='100'><b>Harga</b></td>
                    <td width='200'><b>Keterangan</b></td>
                    <td width='100'><b>Total</b></td>
                    </tr>";
                 $no = 1;
                 
                foreach ($this->db->query($ReturObatJadi)->getResult() as $row) {
                     $totalharga = $row->jumlah * $row->hrga_jual;
                     $totalhargaReturObat += $totalharga;
                     $html .= "
                     <tr>
                     <td>$no.</td>
                     <td>$row->nama_obat</td>
                     <td style='text-align: center;'>$row->jumlah</td>
                     <td style='text-align: right;'>$row->hrga_jual</td>";
                     if ($row->jns_racikan != 0){
                        $html .= "<td style='text-align: center;'>Racikan</td>";
                     }else{
                        $html .= "<td></td>";
                     }
                     
                     $html .= "<td style='text-align: right;'>$totalharga</td></tr>";
                     $no++;
                };
                
                $html .= "<tr>
                 <td colspan='6' style='text-align: right;'><b>Total : Rp. ".format_ribuan($totalhargaReturObat)."</b></td>
                 </tr>";
                 
                $html .= "</table>";
            }
         
             
            $subtotalALL    = $row->total;  // AMBIL DATABASE
            $ppntotalALL    = $row->ppn;    // AMBIL DATABASE

            $grandtotalALL = $totalhargaReturObat + $ppntotalALL; // CARA MANUAL
            // $grandtotalALL = $subtotalALL + $ppntotalALL; // AMBIL DATABASE

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

            $html .= "</div><pagebreak>";

        }
        
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'
        ]);
        // $mpdf = new \Mpdf\Mpdf();

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
        // $mpdf->SetHTMLHeader($judul);
        //$mpdf->AddPage();

        $mpdf->WriteHTML($html);

        $mpdf->SetHTMLFooter('
        <table width="100%">
        <tr>
            <td width="33%">{DATE j-m-Y}</td>
            <td width="33%" align="center">{PAGENO}/{nbpg}</td>
            <td width="33%" style="text-align: right;">'.$namauser.'</td>
        </tr>
        </table>');

        $mpdf->Output("Billing Pasien $datatransaksi->nama.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');


    }
    public function Kasir_deletetransaksinyantol()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransakasi'
        ];
        // echo"$input->val_idtransakasi";
        // exit();
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "DELETE FROM transaksi WHERE id_transaksi = '$input->val_idtransakasi'";

            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) {
                $querylog = "INSERT INTO log_batal_transaksi (id_transaksi,id_user,alasan) VALUES (
                    '$input->val_id_transaksi',
                    '$input->val_id_user',
                    'pendaftaran gagal'
                )";
                $this->db->query($querylog);
                $output['status']   = "sukses";
                $output['code']   = "200";
                $output['pesan']    = "Sukses hapus dan hubungi admisi";
            } else {
                $output['status']   = "gagal";
                $output['code']   = "XX";
                $output['pesan']    = "Gagal";
            }
        }
        $this->hasil($output);
    }

    public function Kasir_ubahpenjamintransaksiutama()
    {
       
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_penjamin', 'idtransaksi', 'nosjp'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            // echo"UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->idtransaksi'";exit();
            $clear =  $this->db->query("UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->idtransaksi'");
            // if($clear->getNumRows() > 0){
                // $queryubah = "UPDATE penjamin_transaksi SET penjamin_utama = 't' where id_transaksi= '$input->idtransaksi' and id_penjamin = '$input->id_penjamin'";
                $queryubah = "UPDATE penjamin_transaksi SET penjamin_utama = 't' where id_transaksi= '$input->idtransaksi' and id_penjamin = '$input->id_penjamin' and no_sjp = '$input->nosjp'";

                // }
            // echo"UPDATE penjamin_transaksi SET penjamin_utama = 't' where id_transaksi= '$input->idtransaksi' and id_penjamin = '$input->id_penjamin'";exit();

            if ($this->db->simpleQuery($queryubah)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Ganti Penjamin Utama";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal silahkan hubungi tim it";
            }
        }
        $this->hasil($output);
    }
    //GET ID Kunjungan Far Resep
    public function cekIdKunjunganResep($noresep, $id_kunj, $no_rm, $idfar){
        $query    = "SELECT * FROM far_obat_out 
                WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$no_rm."' AND id_far = '".$idfar."'";
        $row   = $this->db->query($query)->getRow();
        $id_kunj_far   = $row->id_kunjungan_far;
        return $id_kunj_far;
    }
    public function ambilnomorkartu()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * from penjamin_pasien where no_rm='$input->no_rm' and id_penjamin='$input->id_penjamin'";
        // echo"$query";exit();
        if ($this->db->query($query)->getRow() > '') { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $this->db->query($query)->getResult();
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = "Silahkan Isi nomorkartu";

        }
        echo json_encode($output);
    }
    public function selecttellerkasdeposit()
    {
       

        //------------------
        $input = json_decode(file_get_contents('php://input'));
        $idkas =  $this->db->query("SELECT id_kas from users where id_user='$input->id_user'")->getRow()->id_kas;
        // $bayar =  $this->db->query("SELECT * FROM ac_kas where teller='f' or id_kas='$idkas' order by teller desc");
        // echo"$input->id";
        // exit();
        if ($input->id == 1 || $input->id == '1' || $input->id == '4' || $input->id == '4') {
            $bayar =  $this->db->query("SELECT
            * 
        FROM
            ac_kas 
        WHERE
            id_kas='$idkas'
            or ac_kas.teller='f' ");
            // echo"a";
            // echo"$input->id";

        } else {
            $bayar =  $this->db->query("SELECT
            * 
        FROM
            ac_kas 
        WHERE
            id_jenis_pembayaran='$input->id' or ac_kas.teller='f' ");
            // echo"b"; 
            // echo"$input->id";

        }



        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }
    public function selectnomialkasperidKas()
    {
        $input = json_decode(file_get_contents('php://input'));
        // $a="SELECT kredit from deposit
        // where no_rm='$input->norm' 
        // and id_kas='$input->id_kas'";
        // echo"$a";
        // $sql =  $this->db->query("SELECT kredit from deposit
        // where no_rm='$input->norm' 
        // and id_kas='$input->id_kas'
        // ");
        $sql =  $this->db->query("SELECT
                                    sum(kredit) as sumkredit,
                                        sum(debit) as sumdebit,
                                        (sum(kredit)) - (sum(debit)) as sisadepositperidkas
                                FROM
                                    deposit 
                                WHERE
                                    no_rm = '$input->norm' 
                                    AND id_kas = '$input->id_kas'");

        $output['status'] = 'sukses';
        $output['data'] = $sql->getResult();
        echo json_encode($output);
    }
}
