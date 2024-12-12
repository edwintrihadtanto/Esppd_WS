<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Rawatinap extends Api
{
    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }
    public function dokter()
    {
        $dok =  $this->db->query("SELECT * FROM pegawai where jenis_pegawai='1' ");
        $output['status'] = 'sukses';
        $output['data'] = $dok->getResult();

        echo json_encode($output);
    }
    public function propinsi()
    {
        $user =  $this->db->query("SELECT * FROM propinsi ");
        $output['status'] = 'sukses';
        $output['data'] = $user->getResult();

        echo json_encode($output);
    }
    public function kota()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kota =  $this->db->query("SELECT * FROM kabupaten where kd_propinsi='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $kota->getResult();

        echo json_encode($output);
    }
    public function kecamatan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kec =  $this->db->query("SELECT * FROM kecamatan where kd_kabupaten='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $kec->getResult();

        echo json_encode($output);
    }
    public function kelurahan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kel =  $this->db->query("SELECT * FROM kelurahan where kd_kecamatan='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $kel->getResult();

        echo json_encode($output);
    }

    // public function navbar()
    // {
    //     return view('_layout/nav_bar');
    // }

    // public function sidebar()
    // {
    //     return view('_layout/sidebar2');
    // }

    // public function pendaftaranRWJ()
    // {
    //     return view('view/pendaftaranRWJ');
    // }

    // public function pendaftaranRWI()
    // {
    //     return view('view/pendaftaranRWI');
    // }

    public function mod_RWIkasir()
    {
        return view('view/modal/rwi/mod_RWIkasir');
    }

    // public function mod_RWJkasir()
    // {
    //     return view('view/modal/mod_RWJkasir');
    // }

    // public function mod_RWJBayarkasir()
    // {
    //     return view('view/modal/mod_RWJBayarkasir');
    // }
    // public function mod_IGDkasir()
    // {
    //     return view('view/modal/mod_IGDkasir');
    // }

    // public function mod_IGDBayarkasir()
    // {
    //     return view('view/modal/mod_IGDBayarkasir');
    // }
    public function mod_RWIPenatajasa()
    {
        return view('view/modal/rwi/mod_RWIPenatajasa');
    }
    // public function mod_IGDPenatajasa()
    // {
    //     return view('view/modal/mod_IGDPenatajasa');
    // }
    // public function mod_RWJPenatajasa()
    // {
    //     return view('view/modal/mod_RWJPenatajasa');
    // }
    public function mod_PembayaranRWIkasir()
    {
        return view('view/modal/mod_PembayaranRWIkasir');
    }

    //     public function simpanpasienigd()
    //     {
    //         $input = json_decode(file_get_contents('php://input'));
    //         $listParam = [
    //             'norm', 'namapasien'
    //         ];
    //         if ($this->evalParam($input, $listParam)) {
    //             $output = array();
    //             $output['status'] = "gagal";
    //             $output['pesan'] = "";

    //             $query = "INSERT INTO PASIEN 
    //     ( no_rm, 
    //     nama
    //     )
    // VALUES
    //     (
    //         -- LPAD((MAX(no_rm)::INTEGER+1)::VARCHAR, 6, '0'),
    //         '$input->norm'
    //     '$input->namapasien')";

    //             if ($this->db->simpleQuery($query)) { //true
    //                 $output['status'] = "sukses";
    //                 $output['code'] = "00";


    //                 $output['pesan'] = "Berhasil Mendaftarkan Pasien";
    //             } else {
    //                 $output['code'] = "01";
    //                 $output['status'] =  'gagal simpan';
    //                 $output['pesan'] = $this->db->error()['message'];
    //                 //echo"$query";

    //             }
    //         }
    //         echo json_encode($output);
    //     }
    public function ruangsps()
    {
        $input = json_decode(file_get_contents('php://input'));
        //        $tes = "SELECT
        //        ruang_inap.id_ruang,
        //        ruang_inap.nama_ruang 
        //    FROM
        //        sps_ruang
        //        JOIN ruang_inap USING ( id_ruang ) 
        //    WHERE
        //        sps_ruang.id_unit = '$input->id' 
        //        AND ruang_inap.aktif = 't' 
        //    GROUP BY
        //        ruang_inap.id_ruang,ruang_inap.nama_ruang
        //    ORDER BY
        //        nama_ruang ASC";
        //        echo"$tes";
        $ruang =  $this->db->query(" 
            SELECT
                ruang_inap.id_ruang,
                ruang_inap.nama_ruang 
            FROM
              sps_ruang
              JOIN ruang_inap USING ( id_ruang ) 
            WHERE
              sps_ruang.id_unit = '$input->id' 
              AND ruang_inap.aktif = 't' 
            GROUP BY
              ruang_inap.id_ruang,ruang_inap.nama_ruang
            ORDER BY
              nama_ruang ASC");
        //   echo $ruang;

        $output['status'] = 'sukses';
        $output['data'] = $ruang->getResult();

        echo json_encode($output);
    }
    public function detailpasienrwi()
    {
        $input = json_decode(file_get_contents('php://input'));

        $query = "
        SELECT
            CASE WHEN un.jenis_unit = '1' THEN '3'
            WHEN un.jenis_unit = '3' then '4'
            END as cara_masuk_pasien ,* 
        FROM
            transaksi
            JOIN kunjungan USING ( id_transaksi )
            JOIN pasien USING ( no_rm )
            JOIN unit un USING (id_unit)
            JOIN pengantar_rawat_inap pi ON pi.id_kunjungan = kunjungan.id_kunjungan AND pi.id_transaksi = transaksi.id_transaksi 
           where 
           -- pasien.no_rm='" . $input->id . "' and 
           kunjungan.id_kunjungan='" . $input->id_kunjungan . "'";
        // echo"$query";
        if ($this->db->simpleQuery($query)) { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['data'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }

    public function unit()
    {
        //    $input = json_decode(file_get_contents('php://input'));
        $unit =  $this->db->query("
            SELECT * 
            FROM
                unit
            WHERE jenis_unit = '2' and aktif = 't'
            ORDER BY nama_unit asc ");

        $output['status'] = 'sukses';
        $output['data'] = $unit->getResult();

        echo json_encode($output);
    }

    public function cekShiftUser()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        $query = "
            SELECT * FROM shift_ruangan JOIN ruang_inap USING(id_ruang) WHERE id_user = '$input->user'
        ";
        $hasil = $this->db->query($query);
        if ($hasil->getNumRows() > 0) {
            $output['status'] = "sukses";
            $output['data'] = $hasil->getRow();
        } else {
            $output['status'] = "sukses";
        }
        echo json_encode($output);
    }

    public function getShiftRuangan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        $query = "
            SELECT ROW_NUMBER() OVER(ORDER BY nama_pegawai) as no, nama_pegawai, id_user
            FROM shift_ruangan
            JOIN users USING(id_user)
            JOIN pegawai USING(id_pegawai)
            WHERE shift_ruangan.id_ruang = '$input->ruang'
        ";
        $hasil = $this->db->query($query);
        $output['status'] = "sukses";
        $output['data'] = $hasil->getResult();
        echo json_encode($output);
    }

    public function gantiShiftRuangan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";


        $this->db->transStart();
        $query = "
            DELETE FROM shift_ruangan
            WHERE id_ruang = '$input->ruang'
        ";
        $this->db->query($query);

        foreach ($input->petugas as $petugas) {
            $query = "
                INSERT INTO shift_ruangan(id_ruang, id_user, user_pengganti)
                VALUES ('$input->ruang', '$petugas->id_user', '$input->user');
            ";
            $this->db->query($query);
        }
        $this->db->transComplete();

        if ($this->db->transStatus()) {
            $output['status'] = "sukses";
        } else {
            $output['pesan'] = "Gagal mengganti shift";
        }

        echo json_encode($output);
    }

    public function getCalonPegawaiShiftRuangan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        $query = "
            SELECT nama_pegawai, id_user
            FROM users
            JOIN pegawai USING(id_pegawai)
            WHERE id_ruang = '$input->ruang'
        ";
        $hasil = $this->db->query($query);
        $output['status'] = "sukses";
        $output['data'] = $hasil->getResult();
        echo json_encode($output);
    }

    public function cekSettingRuangUser()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        $query = "
            SELECT * FROM users JOIN ruang_inap USING(id_ruang) WHERE id_user = '$input->user' AND id_ruang IS NOT NULL
        ";
        $hasil = $this->db->query($query);
        if ($hasil->getNumRows() > 0) {
            $output['status'] = "sukses";
            $output['data'] = $hasil->getRow();
        } else {
            $output['pesan'] = "Anda tidak terdaftar sebagai perawat rawat inap";
        }
        echo json_encode($output);
    }

    public function historipenyakit()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tglnow = date('Y-m-d');
        $tgl = date('Y-m-d', strtotime('-30 day', strtotime($tglnow)));

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'RWIpendkdpasiencari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $query = "SELECT
                * 
            FROM
                mr_penyakit
                JOIN penyakit USING ( id_penyakit ) 
                JOIN status_diagnosa USING (status_diag)
            WHERE
                no_rm = '$input->RWIpendkdpasiencari'
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status'] = "sukses";
                    $output['code'] = "00";
                    $output['pesan'] = "Berhasil Cari histori penyakit";
                    //echo"$query";
                    $output['data'] = $this->db->query($query)->getResult();
                } else {
                    // $output['status'] = "sukses";
                    // $output['code'] = "00";
                    // $output['pesan'] = "Data Pasien Tidak ada";
                    // $output['data'] = $this->db->query($query)->getResult();
                }
            } else {
                $output['code'] = "01";
                $output['status'] =  'gagal cari, hubungi admin';
                $output['pesan'] = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }
    public function caripasienrwi()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tglnow = date('Y-m-d');
        $tgl = date('Y-m-d', strtotime('-100 day', strtotime($tglnow)));

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'RWIpendkdpasiencari', 'RWIpendnmpasiencari', 'jmlpasienrwicari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";

            // if ($input->RWIpendnmpasiencari == null || $input->RWIpendnmpasiencari == '') {
            //     $nama = "";
            // } else {
            //     $nama = $input->RWIpendnmpasiencari;
            // }

            // if ($input->RWIpendkdpasiencari == null || $input->RWIpendkdpasiencari == '') {
            //     $norm = "";
            // } else {
            //     $norm = $input->RWIpendkdpasiencari;
            // }

            if ($input->RWIcarinik == null || $input->RWIcarinik == '') {
                $nik = "";
            } else {
                $nik =  "or pas.nik ilike '%$input->RWIcarinik%'";
            }

            if ($input->RWIcarialamatktp == null || $input->RWIcarialamatktp == '') {
                $alamatktp = "";
            } else {
                $alamatktp = "or pas.alamat_ktp ilike '%$input->RWIcarialamatktp%'";
            }



            if ($input->RWIpendnmpasiencari == null || $input->RWIpendnmpasiencari == '') {
                $query = "SELECT
                CASE
                        
                    WHEN
                        un.jenis_unit = '1' THEN
                            '3' 
                            WHEN un.jenis_unit = '2' THEN
                            '4' 
                        END AS cara_masuk_pasien,* 
                    FROM
                        transaksi tra
                        JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi
                        JOIN pasien pas ON pas.no_rm = tra.no_rm
                        JOIN penjamin_transaksi pt ON pt.id_transaksi = tra.id_transaksi
                        JOIN penjamin pj ON pj.id_penjamin = pt.id_penjamin
                        JOIN unit un ON un.id_unit = kun.id_unit
                        JOIN pengantar_rawat_inap pi ON pi.id_kunjungan = kun.id_kunjungan 
                        AND pi.id_transaksi = tra.id_transaksi 
                    WHERE
                        tra.no_rm = '$input->RWIpendkdpasiencari' 
                        $nik
                        $alamatktp
                        AND un.jenis_unit IN ( '1', '3' ) 
                        AND kun.tgl_masuk BETWEEN '$tgl' 
                        AND '$tglnow' 
                        AND kun.id_cara_keluar = '3' 
                    -- AND kun.tgl_keluar IS NOT NULL 
                        AND tra.tgl_tutup is null
                    LIMIT '$input->jmlpasienrwicari'
            ";
                // echo"$query";
            } else {
                $query = "SELECT
                CASE
                        
                    WHEN
                        un.jenis_unit = '1' THEN
                            '3' 
                            WHEN un.jenis_unit = '2' THEN
                            '4' 
                        END AS cara_masuk_pasien,* 
                    FROM
                        transaksi tra
                        JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi
                        JOIN pasien pas ON pas.no_rm = tra.no_rm
                        JOIN penjamin_transaksi pt ON pt.id_transaksi = tra.id_transaksi
                        JOIN penjamin pj ON pj.id_penjamin = pt.id_penjamin
                        JOIN unit un ON un.id_unit = kun.id_unit
                        JOIN pengantar_rawat_inap pi ON pi.id_kunjungan = kun.id_kunjungan 
                        AND pi.id_transaksi = tra.id_transaksi 
                    WHERE
                        pas.nama ilike '%$input->RWIpendnmpasiencari%'
                        $nik
                        $alamatktp
                        AND un.jenis_unit IN ( '1', '3' ) 
                        AND kun.tgl_masuk BETWEEN '$tgl' 
                        AND '$tglnow' 
                        AND kun.id_cara_keluar = '3' 
                        AND tra.tgl_tutup is null
                   -- AND kun.tgl_keluar IS NOT NULL 
                    LIMIT '$input->jmlpasienrwicari'
            ";
                // echo"$query";
            }


            //echo"$query";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status'] = "sukses";
                    $output['code'] = "00";
                    $output['pesan'] = "Berhasil Cari Pasien";
                    // echo"$query";
                    $output['data'] = $this->db->query($query)->getResult();
                } else {
                    $output['status'] = "sukses";
                    $output['code'] = "00";
                    $output['pesan'] = "Data Pasien Tidak ada";
                    //echo "$query";

                    // $output['data'] = $this->db->query($query)->getResult();
                }
            } else {
                $output['code'] = "01";
                $output['status'] =  'gagal cari, hubungi admin';
                $output['pesan'] = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }
    public function caripasienrwiinfo()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tglnow = date('Y-m-d');
        $tgl = date('Y-m-d', strtotime('-90 day', strtotime($tglnow)));

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'RWIpendkdpasiencari', 'RWIpendnmpasiencari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            if ($input->RWIpendnmpasiencari == null || $input->RWIpendnmpasiencari == '') {
                $namaq = '';
            } else {
                $namaq = "AND pasien.nama ilike '%$input->RWIpendnmpasiencari%'";
            }

            if ($input->RWIpendkdpasiencari == null || $input->RWIpendkdpasiencari == '') {
                $kdpasq = '';
            } else {
                $kdpasq = "AND pasien.no_rm = '$input->RWIpendkdpasiencari'";
            }

            if ($input->statuspulang == 0 || $input->statuspulang == '0') {
                $pulang = "kun.tgl_keluar IS NULL";
            } else {
                $pulang = "kun.tgl_keluar is not NULL";
            }




            // if ($input->RWIpendnmpasiencari == null || $input->RWIpendnmpasiencari == '') {
            $query = "SELECT
                            * 
                        FROM
                            transaksi tra
                            JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi 
                            AND kun.aktif = 't'
                            JOIN kamar USING ( id_kamar ) 
                            JOIN ruang_inap ON ruang_inap.id_ruang = kamar.id_ruang ::
                            INT JOIN unit ON unit.id_unit = kun.id_unit
                            JOIN pasien USING ( no_rm ) 
                        WHERE
                            $pulang
                            $namaq
                            $kdpasq
                            AND unit.jenis_unit = '2' 
                            AND kun.tgl_masuk BETWEEN '$tgl' 
                        AND '$tglnow' ";
            // echo"$query";
            //echo"$query";
            // } 



            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status'] = "sukses";
                    $output['code'] = "00";
                    $output['pesan'] = "Berhasil Cari Pasien";
                    //echo"$query";
                    $output['data'] = $this->db->query($query)->getResult();
                } else {
                    $output['status'] = "sukses";
                    $output['code'] = "00";
                    $output['pesan'] = "Data Pasien Tidak ada";
                    // $output['data'] = $this->db->query($query)->getResult();
                }
            } else {
                $output['code'] = "01";
                $output['status'] =  'gagal cari, hubungi admin';
                $output['pesan'] = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }

    public function penatajasaRWI_detailpasien()
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
            $tgl_transaksi_awal   = $input->tglkunj_start;
            $tgl_transaksi_akhir  = $input->tglkunj_end;
            // $tgl_transaksi_awal  = '2023-06-21';
            // $tgl_transaksi_akhir  = '2023-06-21';
            $id_kamar = $this->db->query("SELECT id_kamar from users where id_user='$input->id_user'")->getRow()->id_kamar;


            $query = "
                SELECT
                    K.posting,
                    K.id_kunjungan,
                    K.aktif,
                    tr.id_transaksi,
                    DATE(tr.tgl_transaksi) as tgl_transaksi,
                    k.id_unit,
                    u.nama_unit,
                    ru.nama_ruang,
                    kam.nama_kamar,
                    tr.no_rm,
                    UPPER(P.nama) as nama,
                    UPPER(P.alamat) as alamat,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,
                    P.nik,
                    k.id_kunjungan,
                    k.posting,
                    peg.nama_pegawai,
                    peg.id_pegawai,
                    pt.id_penjamin,
                    K.id_kamar,
                    K.tgl_keluar
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi and aktif='t'
                    INNER JOIN unit u ON u.id_unit = k.id_unit and u.jenis_unit='2'
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama='t'
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg on peg.id_pegawai=k.id_pegawai
                    LEFT join kamar kam on kam.id_kamar=K.id_kamar
	                LEFT join ruang_inap ru on ru.id_ruang=kam.id_ruang
                WHERE
                    u.jenis_unit = '2'    -->> RWI
                    AND K.aktif='t'
                    AND upper(p.nama) like UPPER('" . $nmapasien . "%') AND tr.no_rm like UPPER('" . $norm . "%') AND P.nik like '%" . $nik . "%' " . $paramunit . "
                    AND DATE(k.tgl_masuk) BETWEEN '" . $tgl_transaksi_awal . "' AND '" . $tgl_transaksi_akhir . "' 
                    AND k.posting='$input->posting'
                    -- AND k.id_kamar in ($id_kamar)
                    LIMIT '" . $jml . "'";

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
    public function simpanpasienrwi()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $listParam = [
            'namapasien',
            'pendidikanayah',
            'pendidikanayah',
            'pendidikanibu',
            'pekerjaanayah',
            'pekerjaanibu'
        ];

        // $builder = $this->db->table('PASIEN');

        // $data = [
        //     'no_rm' =>  'LPAD((MAX(no_rm)::INTEGER + 1)::VARCHAR, 6, 0)',
        //     'nama'    => "$input->namapasien"
        // ];

        // $builder->insert($data);
        // echo  $this->db->insertID();
        // exit();
        if ($input->pendidikanayah == '') {
            $pendidikanayah = null;
        }
        if ($this->evalParam($input, $listParam)) {
            // $lastnorm = $this->db->query("SELECT LPAD((MAX(no_rm)::INTEGER+1)::VARCHAR, 6, '0') as no_rm FROM pasien")->getRow()->no_rm;
            // $lastnormx = "INSERT INTO pasien
            // (SELECT TO_CHAR(((MAX(no_rm)::INTEGER)+1), 'fm0000000') as no_rm FROM pasien)
            // RETURNING no_rm;
            // ";
            // $lastnorm = $this->db->query($lastnormx)->getRow()->no_rm;
            $nama = str_replace("'", "''", "$input->namapasien");
            $querysimpan = $this->db->query("INSERT INTO PASIEN 
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
            telepon,
            kd_pos,
            nik,
            wni,
            nama_keluarga,
            tempat_lahir,
            nama_ayah,
            kd_pendidikan_ayah,
            kd_pekerjaan_ayah,
            nama_ibu,
            kd_pendidikan_ibu,
            kd_pekerjaan_ibu,
            alamat_ktp,
            kd_pos_ktp,
            kd_kelurahan_ktp
        )
        SELECT
             TO_CHAR((MAX((no_rm::INTEGER))+1), 'fm0000000'),
            '$input->kelurahan', 
            '$input->pendidikan', 
            '$input->pekerjaan',
	         NULL, 
            '$input->agama',
            '$nama',
            '$input->tanggallahir',
            '$input->goldarah',
            '$input->kelamin',
            't',
             '$input->statusmarital',
            '$input->alamat',
            '$input->telepon',
            '$input->kdpos',
            '$input->nik',
            '$input->wni',
            '$input->keluarga',
            '$input->tempatlahir',
            '$input->ayah',
            '$input->pendidikanayah',
            '$input->pekerjaanayah',
            '$input->ibu',
            '$input->pendidikanibu',
            '$input->pekerjaanibu',
            '$input->alamatktp',
            '$input->kdposktp',
            '$input->kelurahanktp' 
            FROM pasien RETURNING no_rm");
            // echo"$querysimpan";
            // exit();

            // $this->db->query($querysimpan)->getRow()->no_rm;

            // $runquery = $this->db->simpleQuery($querysimpan)->getRow()->no_rm;;
            // echo"hah";
            // exit();
            // if ($normnya > '0') { //true
            if ($querysimpan->getNumRows() > 0) {
                foreach ($querysimpan->getResult() as $row) {
                    $x = $row->no_rm;
                };
                $output['status'] = "sukses";
                $output['pesan']  = "Berhasil Simpan Pasien";
                //$output['no_rm']  = $this->db->query("SELECT no_rm from pasien where nik='$input->nik' ")->getRow()->no_rm;
                // $output['no_rm'] = $normnya ;
                $output['no_rm'] = "$x";
                // $output['no_id']   =  "$lastid";
            } else {
                $output['status'] = "gagal";
                $output['pesan'] = "pendaftaran gagal, silahkan ulangi!";
                echo "$querysimpan";
            }
        }
        // echo $x;
        // exit();
        echo json_encode($output);
    }
    public function updatepasienrwi()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $nama = str_replace("'", "''", "$input->namapasien");
        $updatedata = "UPDATE pasien
                        SET
                        kd_kelurahan = '$input->kelurahan',
                        kd_pendidikan =  '$input->pendidikan',
                        kd_pekerjaan = '$input->pekerjaan',
                        kd_perusahaan = NULL,
                        kd_agama = '$input->agama',
                        nama = '$nama',
                        tgl_lahir = '$input->tanggallahir', 
                        gol_darah = '$input->goldarah',
                        jenis_kelamin = '$input->kelamin',
                        status_hidup = 't',
                        status_marita = '$input->statusmarital',
                        alamat = '$input->alamat',
                        telepon = '$input->telepon',
                        kd_pos = '$input->kdpos',
                        nik = '$input->nik',
                        wni = '$input->wni',
                        nama_keluarga = '$input->keluarga',
                        tempat_lahir = '$input->tempatlahir',
                        nama_ayah = '$input->ayah',
                        kd_pendidikan_ayah = '$input->pendidikanayah',
                        kd_pekerjaan_ayah = '$input->pekerjaanayah',
                        nama_ibu = '$input->ibu',
                        kd_pendidikan_ibu = '$input->pendidikanibu',
                        kd_pekerjaan_ibu = '$input->pekerjaanibu',
                        alamat_ktp = '$input->alamatktp',
                        kd_pos_ktp = '$input->kdposktp',
                        kd_kelurahan_ktp = '$input->kelurahanktp'
                        WHERE no_rm = '$input->no_rm'";


        if ($this->db->simpleQuery($updatedata)) { //true
            //$db->insertID();
            //$db->insertID();
            //$lastid = $this->db->insert_id();
            //var_dump($this->db->insert_id());

            $output['status'] = "sukses";
            $output['pesan']  = "Berhasil Update Pasien";
            $output['no_rm']  = $this->db->query("SELECT no_rm from pasien where nik='$input->nik' ")->getRow()->no_rm;
            //$output['no_id']   =  "$lastid";
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = "pendaftaran gagal, silahkan ulangi!";
            // echo"$query";
        }
        //echo "idnya".."";
        echo json_encode($output);
    }

    public function cekketersediaankamar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kamar =  $this->db->query("SELECT 
       ( jumlah_bed - digunakan - rusak ) AS sisa,
                 jumlah_bed,
                 digunakan,
                 rusak,
                 nama_kamar ,
                 id_kamar
               FROM
                 kamar 
              WHERE
          id_kamar = '" . $input->id . "'");
        $output['status'] = 'sukses';
        $output['data'] = $kamar->getResult();
        echo json_encode($output);
    }

    public function penatajasaRWI_getProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kamar =  $this->db->query("SELECT 
       ( jumlah_bed - digunakan - rusak ) AS sisa,
                 jumlah_bed,
                 digunakan,
                 rusak,
                 nama_kamar ,
                 id_kamar
               FROM
                 kamar 
              WHERE
          id_kamar = '" . $input->id . "'");
        $output['status'] = 'sukses';
        $output['data'] = $kamar->getResult();
        echo json_encode($output);
    }

    public function penatajasaRWI_detailtindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj', 'id_transak'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT
            dt.tgl_input,
						kamar.nama_kamar,
						ruang_inap.nama_ruang,
						concat(un.nama_unit,' ',kamar.nama_kamar) as unit_ruang_kamar,
            dt.id_detail_transaksi,
            kun.tgl_masuk,
            un.nama_unit,
            un.id_unit,
            ruang_inap.id_unit_depo,
            dk.id_detail_kunjungan,
            dk.id_produk,
            P.kd_produk,
            P.nama_produk,
            dk.ketrangan,
            dk.qty 
        FROM
            transaksi tra
            join kunjungan kun on tra.id_transaksi=kun.id_transaksi
            join detail_kunjungan dk on kun.id_kunjungan=dk.id_kunjungan
            join detail_transaksi dt on dt.id_detail_kunjungan=dk.id_detail_kunjungan
            JOIN produk P ON P.id_produk = dk.id_produk 
            join unit un on un.id_unit=kun.id_unit
						left join kamar on kamar.id_kamar=kun.id_kamar
						left join ruang_inap on kamar.id_ruang=ruang_inap.id_ruang
        WHERE
            tra.id_transaksi= '$input->id_transak' 
           -- and dk.id_kunjungan = '$input->id_kunj' 
            and kun.id_kamar is not null
        ORDER BY
            dt.id_detail_transaksi desc,
            kun.tgl_masuk desc,
            un.id_unit,
            dk.id_detail_kunjungan DESC";
            // echo"$query";
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

    public function penatajasaRWI_simpanProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transak',
            'id_kunj',
            'idprd',
            'qty',
            'idtarif',
            'idpegawai'
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

                // echo"$querydetailkunjungan";
                // exit();
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
    public function penatajasaRWI_updatedokterpenindak()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi',
            'id_pegawai'
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {

            $this->db->transStart();
            $queryupdatedokter_penindak = "UPDATE detail_component SET id_pegawai = '$input->id_pegawai' WHERE id_detail_transaksi = '$input->id_detail_transaksi' AND id_jenis_component = 3";
            $this->db->query($queryupdatedokter_penindak);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal memasukan produk";
            }
        }

        $this->hasil($output);
    }

    public function penatajasaRWI_deleteProduk()
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
                $output['pesan']    = "Transaksi sudah di tutup kasir";
            }
        }
        $this->hasil($output);
    }

    public function pindahkamar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'rwjpindahidtrans',
            'rwjpindahidkamar',
            'rwjpindahidpegawai',
            'rwjpindahidunit',
            'rwiidkunjungan'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $transaksiBaru = false;

        if ($this->evalParam($input, $listParam)) {
            date_default_timezone_set("Asia/Jakarta");
            $tgltime = date('Y-m-d H:i:s');
            $tgl = date('Y-m-d');
            // $a="SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjpindahidtrans' AND id_unit ='$input->rwjpindahidunit' and id_kamar='$input->rwjpindahidkamar' and tgl_masuk = '$tgl'";
            // echo"$a";
            // exit();
            
            $cektutuptransaksi =  $this->db->query("SELECT * FROM kunjungan WHERE id_kunjungan = '$input->rwiidkunjungan' and tgl_keluar is not null");
            if ($cektutuptransaksi->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['flag']   = "erm";
                $output['pesan']    = "Telah diposting oleh ERM, silahkan refresh halaman";
                $this->hasil($output);
                exit();
            }
            $this->db->transStart();

            $cekdobel =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjpindahidtrans' AND id_unit ='$input->rwjpindahidunit' and id_kamar='$input->rwjpindahidkamar' and aktif='t' ");
            if ($cekdobel->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['flag']   = "";
                $output['pesan']    = "Tidak Bisa Pindah Ditempat Yang Sama";
            } else {
                $cekdobel =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjpindahidtrans' AND id_unit ='$input->rwjpindahidunit' and id_kamar='$input->rwjpindahidkamar' and aktif='t' ");
                $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$input->rwiidkamarlama'");
                $updateaktifkamar = "UPDATE kunjungan SET aktif = 'f', tgl_keluar='$tgl', jam_keluar='$tgltime',posting='t',status_kunjungan='2' WHERE id_kunjungan='$input->rwiidkunjungan' and id_transaksi = '$input->rwjpindahidtrans' and aktif='t' and id_kamar is not null";
                // echo"$updateaktifkamar";
                // exit;
                $exupdateaktifkamar = $this->db->query($updateaktifkamar);
                $this->db->transComplete();
                if ($exupdateaktifkamar) {
                    $updatekamar = $this->db->query("update kamar set digunakan=digunakan+1 where id_kamar='$input->rwjpindahidkamar'");
                    $query = $this->db->query("INSERT INTO kunjungan(id_unit,tgl_masuk,id_transaksi,jam_masuk,id_pegawai,status_kunjungan,id_kamar) VALUES('$input->rwjpindahidunit',' $tgl', '$input->rwjpindahidtrans',' $tgltime','$input->rwjpindahidpegawai','3','$input->rwjpindahidkamar')");
                    if($this->db->transStatus()){
                        // $ruangkamar = $this->db->simpleQuery("SELECT Concat(nama_ruang,'',nama_kamar) as tempat from kamar join ruang_inap using(id_ruang) where id_kamar='$input->rwjpindahidkamar'")->getRow()->tempat;
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses pindah kamar";
                        $output['flag']   = "";
                        // $output['ruangkamar']    = "$ruangkamar";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal pindah kamar";
                        $output['flag']   = "";
                        //echo"$query";
                    }
                }
            }
        }

        $this->hasil($output);
    }
    public function addKunjunganrwi_lanjutan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kamar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $transaksiBaru = false;

        if ($this->evalParam($input, $listParam)) {

            date_default_timezone_set("Asia/Jakarta");
            $tgltime = date('Y-m-d H:i:s');
            $tgl = date('Y-m-d');
            $jam = $input->tgl_masuk . " " . $input->jam_masuk;
            if ($input->idtransaksi == '') {
                $output['status']   = "gagal";
                $output['pesan']    = "Sudah berhasil didaftarkan atau id transaksi tidak ada";
                return $this->hasil($output);
            }
            // echo"$input->id_kamar";
            // exit();
            $cekdobel =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$input->idtransaksi' AND id_unit ='$input->id_unit' and id_kamar='$input->id_kamar' and aktif='t' ");
            if ($cekdobel->getNumRows() > 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Tidak Bisa Pindah Ditempat Yang Sama";
            } else {
                $cekpenjamin =   $this->db->query("SELECT * FROM penjamin_transaksi where id_transaksi='$input->idtransaksi' and id_penjamin='$input->id_penjamin' and no_sjp='$input->no_sjp'");
               // echo"$cekpenjamin";exit();
                if ($cekpenjamin->getNumRows() <= 0 && $input->id_penjamin != '1') {
                    //echo"q";exit();
                    $clearpenjamin =  $this->db->query("UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->idtransaksi'");
                    $queryPenjamin = $this->db->query("INSERT INTO penjamin_transaksi(id_penjamin,id_transaksi,no_sjp,cara_masuk) VALUES('$input->id_penjamin', '$input->idtransaksi', '$input->no_sjp' ,'$input->caraterima')");
                }
                $closeupdateaktifkamar = $this->db->query("UPDATE kunjungan SET aktif = 'f', tgl_keluar='$tgl', jam_keluar='$tgltime',posting='f' WHERE id_transaksi = '$input->idtransaksi' and aktif='t' and id_kamar is not null");
                $updatekamar =  $this->db->query("update kamar set digunakan=digunakan+1 where id_kamar='$input->id_kamar'");
                $query = $this->db->query("INSERT INTO kunjungan(id_unit,tgl_masuk,id_transaksi,jam_masuk,id_pegawai,status_kunjungan,id_kamar,awal_inap) VALUES('$input->id_unit',' $tgl', '$input->idtransaksi',' $jam','$input->id_pegawai','3','$input->id_kamar','t')");
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    // $ruangkamar = $this->db->simpleQuery("SELECT Concat(nama_ruang,'',nama_kamar) as tempat from kamar join ruang_inap using(id_ruang) where id_kamar='$input->rwjpindahidkamar'")->getRow()->tempat;
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses kunjungan inap";
                    // $output['ruangkamar']    = "$ruangkamar";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal kunjungan inap";
                    //echo"$query";
                }
            }
        }


        $this->hasil($output);
    }
    public function selectruangkamarganti()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'rwjpindahidkamar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        // echo"'$input->rwjpindahidkamar'";
        // exit();
        $ruangkamar = $this->db->query("SELECT Concat(nama_ruang,' ',nama_kamar) as tempat, unit.nama_unit from kamar join ruang_inap using(id_ruang) JOIN unit USING ( id_unit ) where id_kamar='$input->rwjpindahidkamar'");
        $output['status'] = 'sukses';
        $output['data'] = $ruangkamar->getResult();

        echo json_encode($output);
    }
    public function last_idkunjunganranap()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        // echo"'$input->rwjpindahidkamar'";
        // exit();
        $this->db->transStart();
        $idkunjungan = $this->db->query("SELECT id_kunjungan from kunjungan where id_transaksi='$input->id_transaksi' and status_kunjungan='3'")->getRow()->id_kunjungan;
        $depo = $this->db->query("SELECT id_unit_depo FROM kunjungan JOIN kamar ON kunjungan.id_kamar = kamar.id_kamar JOIN ruang_inap ON kamar.id_ruang = ruang_inap.id_ruang WHERE id_kunjungan = '$idkunjungan'")->getRow()->id_unit_depo;
        $this->db->transComplete();
        if ($this->db->transStatus()) {
        $output['status'] = 'sukses';
        $output['data'] = $idkunjungan;
        $output['datadepo'] = $depo;
        }
        else{
            $output['status'] = 'gagal';
            $output['data'] = 'kosong';
            $output['datadepo'] = 'kosong';
        }
        echo json_encode($output);
    }
}
