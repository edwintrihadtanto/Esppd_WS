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

class Gawatdarurat extends Api
{

    function index()
    {
        $this->load->model('main/vi_gettrustee');
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

    public function mod_IGDkasir()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
        $id_kunjungan  = str_replace('"', '', json_encode($data->id_kunjungan));

        $kel =  $this->db->query("
            SELECT * FROM
            transaksi
            JOIN kunjungan USING ( id_transaksi )
            JOIN pasien USING ( no_rm )
            JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $detailtra =  $this->db->query("
            SELECT * FROM
            transaksi
            JOIN detail_transaksi USING (id_transaksi)
            JOIN kunjungan USING ( id_transaksi )
            JOIN pasien USING ( no_rm )
            JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$id_transaksi' and kunjungan.id_kunjungan='$id_kunjungan ' ");
        $outputx['detail'] = $detailtra->getResult();

        $data = json_decode(json_encode($outputx), true);

        return view('view/modal/igd/mod_IGDkasir', $data);
    }

    public function mod_IGDBayarkasir()
    {
        return view('view/modal/igd/mod_IGDBayarkasir');
    }

    public function mod_IGDPenatajasa()
    {
        return view('view/modal/igd/mod_IGDPenatajasa');
    }

    public function listPoliBPJS(){
        $query = "SELECT map_bpjs FROM unit WHERE jenis_unit = '1' AND aktif = TRUE AND map_bpjs IS NOT NULL AND map_bpjs > '' ORDER BY map_bpjs";
        $output = array();
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $this->db->query($query)->getResult();
        echo json_encode($output);
    }

    public function simpanpasienigd()
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

            // $query="INSERT INTO PASIEN 
            //                     ( no_rm, 
            //                     kd_kelurahan, 
            //                     kd_pendidikan, 
            //                     kd_pekerjaan, 
            //                     kd_perusahaan,
            //                     kd_agama,
            //                     nama,
            //                     tgl_lahir,
            //                     gol_darah,
            //                     jenis_kelamin,
            //                     status_hidup,
            //                     status_marita,
            //                     alamat,
            //                     kota,
            //                     telepon,
            //                     kd_pos,
            //                     kd_asuransi,
            //                     no_asuransi,
            //                     jabatan,
            //                     tanda_pengenal,
            //                     no_pengenal,
            //                     keterangan,
            //                     kode_lama,
            //                     wni,
            //                     nama_keluarga,
            //                     tempat_lahir,
            //                     pemegang_asuransi,
            //                     no_reg_lama,
            //                     kd_suku,
            //                     ket_simpan,
            //                     handphone,
            //                     email,
            //                     nama_ayah,
            //                     nama_ibu,
            //                     suami_istri,
            //                     alamat_ktp,
            //                     kd_pos_ktp,
            //                     kd_kelurahan_ktp,
            //                     kd_pendidikan_ayah,
            //                     kd_pendidikan_ibu,
            //                     kd_pendidikan_suamiistri,
            //                     kd_pekerjaan_ayah,
            //                     kd_pekerjaan_ibu,
            //                     kd_pekerjaan_suamiistri,
            //                     part_number_nik,
            //                     bahasa,
            //                     penerjemah,
            //                     keyakinan,
            //                     type_pembelajaran,
            //                     hamatan_edukasi,
            //                     emosi,
            //                     baca_tulis,
            //                     kesadaran,
            //                     keterbatasan
            //                     )
            //                 VALUES
            //                     (
            //                     LPAD((MAX(no_rm)::INTEGER+1)::VARCHAR, 6, '0'),
            //                     '$input->kelurahan',
            //                     '$input->pendidikan',
            //                     '$input->pekerjaan',
            //                     NULL,
            //                     '$input->agama',
            //                     '$input->namapasien',
            //                     '$input->tanggallahir')";

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

    public function caripasienigd()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kdpasiencariKasirIGD', 'igdcaritgl1', 'igdcaritgl1', 'igdcaristatuslunas', 'jmlpasienigdcari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "
            SELECT * 
            FROM
                transaksi tra
                JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi 
                join pasien pas on pas.no_rm=tra.no_rm
                join penjamin_transaksi pt on pt.id_transaksi=tra.id_transaksi
                join penjamin pj on pj.id_penjamin=pt.id_penjamin
                join unit un on un.id_unit=kun.id_unit
            WHERE
                tra.no_rm = '$input->kdpasiencariKasirIGD'
                AND un.jenis_unit = '3' 
                AND tra.tgl_transaksi between '$input->igdcaritgl1 00:00:00' and '$input->igdcaritgl2 23:59:59'
                AND tra.lunas='$input->igdcaristatuslunas'
                limit '$input->jmlpasienigdcari'
            ";

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
    public function detailtransaksiigd()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi', 'id_kunjungan'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "
            SELECT * 
            FROM
                detail_transaksi join produk using(id_produk)
                join kunjungan using(id_kunjungan)
                join unit using(id_unit)
                where detail_transaksi.id_transaksi='$input->id_transaksi' and detail_transaksi.id_kunjungan='$input->id_kunjungan'
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

    public function penatajasaIGD_detailpasien()
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
                    peg.nama_pegawai,
                    pt.id_penjamin,
                    peg.id_pegawai,
                    k.jam_masuk
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama='t'
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg ON peg.id_pegawai=k.id_pegawai
                WHERE
                    u.jenis_unit = '3'    -->> IGD
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
    public function penatajasaIGD_detailtindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            // $querytes = " SELECT dk.id_detail_kunjungan, dk.id_produk, p.kd_produk, p.nama_produk, dk.ketrangan, dk.qty FROM detail_kunjungan dk INNER JOIN produk p ON p.id_produk = dk.id_produk WHERE dk.id_kunjungan = '$input->id_kunj' ORDER BY dk.id_detail_kunjungan ASC";
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
            dk.id_kunjungan = '$input->id_kunj' 
        ORDER BY
            dk.id_detail_kunjungan ASC";
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
    public function penatajasaIGD_simpanProduk()
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
            // echo"$querydetailkunjungan";exit();

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
    public function penatajasaIGD_deleteProduk()
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
    public function cetak_spri()
    {
        $input = json_decode(file_get_contents('php://input'));
        $idkunjungan = $_POST['id_kunjungan'];
        $querypasien = $this->db->query("SELECT
        pasien.nama as namapasien,
        pegawai.nama_pegawai as nama_dokterpengirim,
        peg.nama_pegawai as nama_dokterdpjp,
        pegawai.id_pegawai as id_dokterpengirim,
        peg.id_pegawai as id_dokterdpjp,
        *	 
    FROM
        pengantar_rawat_inap
        JOIN pegawai ON pegawai.id_pegawai = pengantar_rawat_inap.dokterpengirim 
        JOIN pegawai as peg ON peg.id_pegawai = pengantar_rawat_inap.dokterdpjp 
        JOIN ruang_inap on ruang_inap.id_ruang=pengantar_rawat_inap.ruangan
        JOIN status_emergency ON status_emergency.id_emergency = pengantar_rawat_inap.status_emergency 
        JOIN kunjungan on pengantar_rawat_inap.id_kunjungan=kunjungan.id_kunjungan
	    JOIN transaksi on transaksi.id_transaksi=kunjungan.id_transaksi
		JOIN pasien on pasien.no_rm=transaksi.no_rm
        WHERE
        pengantar_rawat_inap.id_kunjungan = '$idkunjungan'");


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

  

          <table align='center' style='border:0px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querypasien->getResult() as $dataspri) {
            $tglbuat = substr($dataspri->tgl_buat, 0, 10);
            $writer = new PngWriter();

            // Create QR code
            $qrCode = QrCode::create('id kunjung spri' . $dataspri->id_kunjungan . 'dokter' . $dataspri->nama_dokterpengirim)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(150)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            $qrCode1 = QrCode::create('id kunjung spri' . $dataspri->id_kunjungan . 'dokter' . $dataspri->nama_dokterdpjp)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(150)
                ->setMargin(10)
                ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));

            // Create generic logo
            $logo = Logo::create(FCPATH . '/icon.png')
                ->setResizeToWidth(50);

            // Create generic label
            $label = Label::create($dataspri->nama_dokterpengirim)
                ->setTextColor(new Color(255, 0, 0));

            $result = $writer->write($qrCode);

            $dataUri = $result->getDataUri();


            // Create generic label
            $label1 = Label::create($dataspri->nama_dokterdpjp)
                ->setTextColor(new Color(255, 0, 0));


            // $result1 = $writer->write($qrCode1, $logo, $label1);
            $result1 = $writer->write($qrCode1);

            $dataUri1 = $result1->getDataUri();

            $html .= "<tr>
                <td style='border:1px solid black;width:200px;'><b>No SEP Rajal</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>#" . $dataspri->no_sjp_rajal . "</td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Tgl SPRI</b></td>
                <td style='border:1px solid black;width:20px;'>:</td>
                <td style='border:1px solid black;'>" . date_indo($tglbuat) . "</td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>No RM</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'> $dataspri->no_rm </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Nama Pasien</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'> $dataspri->namapasien </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Keluhan</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'> $dataspri->keluhan </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Rikjang</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>$dataspri->rikjang</td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Diagnosa</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->diagnosa . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Tindakan Pembedahan</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->tindakan_pembedahan . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Terapi</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->terapi . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Dokter Pengirim</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->nama_dokterpengirim . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Dokter DPJP</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->nama_dokterdpjp . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Status Emergency</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->emergency . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Ruangan</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->nama_ruang . " </td>
                </tr>
                <tr>
                <td style='border:1px solid black;'><b>Intruksi DPJP</b></td>
                <td style='border:1px solid black;'>:</td>
                <td style='border:1px solid black;'>" . $dataspri->intruksi_dpjp . " </td>
                </tr>
                ";
        }

        $html .= "
            </table>
            <table style='padding-left:20px;padding-top:20px'>
            <tr>
            <td style='width:500px'>Dokter Pengirim<br><img src='" . $dataUri . "' alt=''><br>$dataspri->nama_dokterpengirim</td>
            <td>Dokter DPJP<br><img src='" . $dataUri1 . "' alt=''><br>$dataspri->nama_dokterdpjp</td>
            <tr>
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
    public function mod_gantidokterkunjungan()
    {
        $data = json_decode($_GET['data']);
        $id_kunjungan  = str_replace('"', '', json_encode($data->id_kunjungan));
        $kel =  $this->db->query("SELECT
                                    * 
                                FROM
                                    kunjungan 
                                    join transaksi using(id_transaksi)
                                    join pegawai using(id_pegawai)
                                    join pasien using(no_rm)
                                WHERE
                                    id_kunjungan = '$id_kunjungan'");
        $outputx['data'] = $kel->getResult();
        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/igd/mod_gantidoketerkunjungan', $data);
    }
}
