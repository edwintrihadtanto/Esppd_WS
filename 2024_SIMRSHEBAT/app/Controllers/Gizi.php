<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Gizi extends Api
{
    public function modalpermintaangizi()
    {
        return view('view/modal/gizi/modPermintaanGizi');
    }

    public function modalassesmengizi()
    {
        return view('view/modal/gizi/modAssesmenGizi');
    }

    public function modalpenerimaangizi()
    {
        return view('view/modal/gizi/modPenerimaanGizi');
    }

    public function modalpermintaangizipreview()
    {
        return view('view/modal/gizi/modpreviewPermintaanGizi');
    }
    public function modalpermintaangizibaru()
    {
        return view('view/modal/gizi/modOrderGizibaru');
    }

    public function dokter()
    {
        $dokter =  $this->db->query("SELECT * FROM pegawai WHERE jenis_pegawai='1'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokter->getResult();
        echo json_encode($output);
    }
    public function petugas()
    {
        $petugas =  $this->db->query("SELECT * FROM pegawai");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $petugas->getResult();
        echo json_encode($output);
    }

    public function jenis_makanan()
    {
        $makanan =  $this->db->query("SELECT * FROM jenis_makanan ORDER BY kd_makanan");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $makanan->getResult();
        echo json_encode($output);
    }

    public function unit()
    {
        $unit =  $this->db->query("SELECT * FROM unit where jenis_unit = '2' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }

    public function ruangInap()
    {
        $rinap =  $this->db->query("SELECT c.id_ruang,c.nama_ruang,a.id_kamar,a.nama_kamar,b.id_unit,b.nama_unit FROM kamar a INNER JOIN unit b ON a.id_unit=b.id_unit INNER JOIN ruang_inap c ON a.id_ruang=c.id_ruang  ORDER BY c.nama_ruang ASC");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $rinap->getResult();

        echo json_encode($output);
    }
    public function kamar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kamar =  $this->db->query("SELECT * FROM kamar where id_unit='$input->id'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $kamar->getResult();

        echo json_encode($output);
    }
    public function cekbox()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_order'];
        if ($this->evalParam($input, $listParam)) {
            $jenis_diet =  $this->db->query("SELECT jenis_diet FROM order_gizi where id_order=' $input->id_order'");
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $jenis_diet->getRow('jenis_diet');

        echo json_encode($output);
    }

    public function TambahOrderbaru()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            if ($input->no_rm != '') {
                $query = "SELECT 
                K.id_kunjungan,
                K.id_unit,
                K.id_pegawai,
                T.id_transaksi,
                P.nama,
                p.no_rm,
                peg.nama_pegawai,
                age( P.tgl_lahir ) :: VARCHAR,
                        EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur
            FROM
                kunjungan K 
                INNER JOIN transaksi T ON T.id_transaksi = K.id_transaksi
                INNER JOIN pasien P ON P.no_rm = T.no_rm
                INNER JOIN pegawai peg ON K.id_pegawai = peg.id_pegawai
                WHERE P.no_rm LIKE ('" . $input->no_rm . "%') ORDER BY k.id_kunjungan DESC LIMIT 1";

                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = ' Ditemukan';
                    $output['code']     = '200';
                    $output['data']     = $queryx;
                } else {
                    $output['status']   = "gagal";
                    $output['code']     = '201';
                    $output['pesan']    = 'Tidak Ditemukan';
                }
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = ' Masukan No RM';
            }
        }
        $this->hasil($output);
    }

    public function getriwayatAlergi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT p.no_rm,p.nama,alg.alergi FROM alergi alg LEFT JOIN pasien p ON alg.no_rm=p.no_rm WHERE p.no_rm = '$input->no_rm' ORDER BY alg.tgl_buat DESC LIMIT 1";
            $queryx = $this->db->query($query)->getResult();
            if (!empty($queryx)) {
                $output['status']   = "sukses";
                $output['pesan']    = 'Riwayat Alergi Ditemukan';
                $output['code']     = '200';
                $output['data']     = $queryx;
            } else {
                $output['status']   = "sukses";
                $output['code']     = 'XX';
                $output['pesan']    = "";
            }
        }
        $this->hasil($output);
    }

    public function permintaanGizi_listorder()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";

            $no_rm       = $input->no_rm;
            $nmpasien  = $input->nmpasien;
            $jml        = $input->jml;
            $unit  = $input->unit;
            $tglorder  = date('Y-m-d');

            $query = "
                SELECT
                    org.id_order,
                    org.tglorder,
                    org.jenis_diet,
                    org.mulai_makan,
                    org.qty,
                    org.ket,
                    org.dilayani,
                    org.id_pegawai as petugas_gizi,
                    org.kd_makanan,
                    org.ket_lain_lain,
                    org.status_makanan,
                    org.status_order,
                    org.jam_order,
                    org.id_ruang,
                    org.id_kamar,
                    ri.nama_ruang,
                    km.nama_kamar,
                    jm.jenis_makanan,
                    tr.id_transaksi,
                    K.id_kunjungan,
                    K.tgl_masuk,
                    DATE ( tr.tgl_transaksi ) AS tgl_transaksi,
                    K.id_unit,
                    u.nama_unit,
                    tr.no_rm,
                    UPPER ( P.nama ) AS nama,
                    UPPER ( P.alamat ) AS alamat,
                --P.tgl_lahir,
                    P.telepon,
                    P.jenis_kelamin,
                    peg.id_pegawai,
                    peg.nama_pegawai,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age( P.tgl_lahir ) :: VARCHAR,
                    EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur,
                    sp.id_kunjungan AS soap 
                FROM
                    order_gizi org
                    INNER JOIN kunjungan K ON K.id_kunjungan = org.id_kunjungan
                    INNER JOIN transaksi tr ON K.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN unit u ON u.id_unit = K.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    LEFT JOIN pegawai peg ON peg.id_pegawai = K.id_pegawai
                    LEFT JOIN soap_pasien sp ON sp.id_kunjungan = K.id_kunjungan 
                    LEFT JOIN jenis_makanan jm ON jm.kd_makanan = org.kd_makanan
                    LEFT JOIN ruang_inap ri ON ri.id_ruang = org.id_ruang
                    LEFT JOIN kamar km ON km.id_kamar = org.id_kamar
                    WHERE 
                    tr.no_rm like UPPER('" . $no_rm . "%') AND upper(p.nama) like UPPER('" . $nmpasien . "%') AND u.id_unit LIKE('" . $unit . "%') 
                    --AND org.tglorder='" . $tglorder . "' 
                    ORDER BY org.tglorder DESC
                    LIMIT '" . $jml . "'
                ";

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
    public function penerimaanGizi_listorder()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_rm       = $input->no_rm;
            $nmpasien  = $input->nmpasien;
            $jml        = $input->jml;
            $unit  = $input->unit;
            $tglorder  = date('Y-m-d');

            $query = "
                SELECT
                    org.id_order,
                    org.tglorder,
                    org.jenis_diet,
                    org.mulai_makan,
                    org.qty,
                    org.ket,
                    org.dilayani,
                    org.id_pegawai as petugas_gizi,
                    org.kd_makanan,
                    org.ket_lain_lain,
                    org.status_makanan,
                    org.jam_order,
                    org.id_ruang,
                    org.id_kamar,
                    ri.nama_ruang,
                    km.nama_kamar,
                    jm.jenis_makanan,
                    tr.id_transaksi,
                    K.id_kunjungan,
                    K.tgl_masuk,
                    DATE ( tr.tgl_transaksi ) AS tgl_transaksi,
                    K.id_unit,
                    u.nama_unit,
                    tr.no_rm,
                    UPPER ( P.nama ) AS nama,
                    UPPER ( P.alamat ) AS alamat,
                --P.tgl_lahir,
                    P.telepon,
                    P.jenis_kelamin,
                    peg.id_pegawai,
                    peg.nama_pegawai,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age( P.tgl_lahir ) :: VARCHAR,
                    EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur,
                    sp.id_kunjungan AS soap 
                FROM
                    order_gizi org
                    INNER JOIN kunjungan K ON K.id_kunjungan = org.id_kunjungan
                    INNER JOIN transaksi tr ON K.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN unit u ON u.id_unit = K.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    LEFT JOIN pegawai peg ON peg.id_pegawai = K.id_pegawai
                    LEFT JOIN soap_pasien sp ON sp.id_kunjungan = K.id_kunjungan 
                    LEFT JOIN jenis_makanan jm ON jm.kd_makanan = org.kd_makanan
                    LEFT JOIN ruang_inap ri ON ri.id_ruang = org.id_ruang
                    LEFT JOIN kamar km ON km.id_kamar = org.id_kamar
                    WHERE 
                    tr.no_rm like UPPER('" . $no_rm . "%') AND upper(p.nama) like UPPER('" . $nmpasien . "%') AND u.id_unit LIKE('" . $unit . "%')  AND status_order='true'
                    --AND org.tglorder='" . $tglorder . "' 
                    ORDER BY org.tglorder DESC
                    LIMIT '" . $jml . "' 
                ";

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
    public function assesmenGizi_listpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_rm       = $input->no_rm;
            $nmpasien  = $input->nmpasien;
            $jml        = $input->jml;
            $unit  = $input->unit;
            $tglorder  = date('Y-m-d');

            $query = "
                SELECT
                    org.id_order,
                    ass.status_assesmen,
                    ass.id_pegawai as ahli_gizi,
                    ass.skrining_perawat,
                    ass.skrining_ahli_gizi,
                    ass.kondisi_khusus,
                    ass.alergi,
                    ass.diet_awal,
                    ass.tindak_lanjut,
                    ass.jenis_pasien,
                    ass.tgl_assesmen,
                    tr.id_transaksi,
                    K.id_kunjungan,
                    K.tgl_masuk,
                    DATE ( tr.tgl_transaksi ) AS tgl_transaksi,
                    K.id_unit,
                    u.nama_unit,
                    tr.no_rm,
                    UPPER ( P.nama ) AS nama,
                    UPPER ( P.alamat ) AS alamat,
                --P.tgl_lahir,
                    P.telepon,
                    P.jenis_kelamin,
                    peg.id_pegawai,
                    peg.nama_pegawai,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age( P.tgl_lahir ) :: VARCHAR,
                    EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur,
                    sp.id_kunjungan AS soap 
                FROM
                    order_gizi org
                    INNER JOIN kunjungan K ON K.id_kunjungan = org.id_kunjungan
                    INNER JOIN transaksi tr ON K.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN unit u ON u.id_unit = K.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    LEFT JOIN pegawai peg ON peg.id_pegawai = K.id_pegawai
                    LEFT JOIN soap_pasien sp ON sp.id_kunjungan = K.id_kunjungan 
                    LEFT JOIN assesmen_gizi ass ON ass.id_kunjungan = org.id_kunjungan 
                    WHERE 
                    tr.no_rm like UPPER('" . $no_rm . "%') AND upper(p.nama) like UPPER('" . $nmpasien . "%') AND u.id_unit LIKE('" . $unit . "%') 
                    --AND org.tglorder='" . $tglorder . "' 
                    ORDER BY org.tglorder DESC
                    LIMIT '" . $jml . "' 
                ";

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
    public function simpanOrderGizibaru()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan', 'id_order', 'id_unit', 'id_pegawai', 'qty', 'kd_makanan', 'mulai_makan', 'ket', 'jenis_diet', 'tglorder', 'ket_lain_lain', 'status_makanan', 'jam_order', 'id_ruang', 'id_kamar'];
        $output = array();
        $output['status'] = "sukses";
        $output['pesan'] = "";

        /* SIMPAN PERMINTAAN GIZI */
        if ($this->evalParam($input, $listParam)) {
            $id_kunjungan  = $input->id_kunjungan;
            $id_unit       = $input->id_unit;
            $id_pegawai    = $input->id_pegawai; //petugas_gzi
            $qty      = $input->qty;
            $kd_makanan      = $input->kd_makanan;
            $mulai_makan      = $input->mulai_makan;
            $ket      = $input->ket;
            $ket_lain_lain      = $input->ket_lain_lain;
            $jenis_diet  =  json_encode($input->jenis_diet);
            $tglorder      = $input->tglorder;
            $status_order  = 'false';
            $id_order = $input->id_order;
            $status_makanan = $input->status_makanan;
            $jam_order = $input->jam_order;
            $id_ruang = $input->id_ruang;
            $id_kamar = $input->id_kamar;
            $dilayani = '0';
            if ($id_order == '') {
                $cek = "SELECT id_order FROM order_gizi  ORDER BY id_order DESC LIMIT 1 ";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_order;
                        $real   = ((int)$x + 1);
                        $no_order = $real;
                    } else {
                        $no_order = 1;
                    }
                }
                $id_order = $no_order;
                $addOrderGizi = "INSERT INTO order_gizi 
                    ( id_kunjungan,id_order,id_unit,id_pegawai,qty,kd_makanan,mulai_makan,ket,jenis_diet,tglorder,status_order,ket_lain_lain,status_makanan,jam_order,dilayani,id_ruang,id_kamar)
                    VALUES('$id_kunjungan','$id_order','$id_unit ',' $id_pegawai',' $qty',' $kd_makanan ','$mulai_makan','$ket','$jenis_diet','$tglorder','false','$ket_lain_lain','$status_makanan','$jam_order','$dilayani','$id_ruang','$id_kamar')";
                if ($this->db->simpleQuery($addOrderGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['data']   = $this->db->query($cek)->getResult();
                    $output['pesan']    = 'Berhasil Simpan Order';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Order Gizi!!";
                }
            } else {
                $updateOrderGizi = "UPDATE order_gizi SET tglorder='$tglorder',id_pegawai='$id_pegawai',kd_makanan='$kd_makanan',mulai_makan='$mulai_makan',qty='$qty',jenis_diet='$jenis_diet',ket='$ket',dilayani='$dilayani',status_order='$status_order',ket_lain_lain='$ket_lain_lain',status_makanan='$status_makanan',jam_order='$jam_order',id_ruang='$id_ruang',id_kamar='$id_kamar' WHERE id_kunjungan='$id_kunjungan' AND id_order='$id_order'";

                if ($this->db->simpleQuery($updateOrderGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Update Order';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Order Gizi!!";
                }
            }
        }
        $this->hasil($output);
    }
    public function simpanOrderGizi()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan', 'id_order', 'id_unit', 'id_pegawai', 'qty', 'kd_makanan', 'mulai_makan', 'ket', 'jenis_diet', 'tglorder', 'ket_lain_lain', 'status_makanan', 'jam_order', 'id_ruang', 'id_kamar'];
        // $listParam = ['id_order'];
        $output = array();
        $output['status'] = "sukses";
        $output['pesan'] = "";

        /* SIMPAN PERMINTAAN GIZI */
        if ($this->evalParam($input, $listParam)) {
            $id_kunjungan  = $input->id_kunjungan;
            $id_unit       = $input->id_unit;
            $id_pegawai    = $input->id_pegawai; //petugas_gzi
            $qty      = $input->qty;
            $kd_makanan      = $input->kd_makanan;
            $mulai_makan      = $input->mulai_makan;
            $ket      = $input->ket;
            $ket_lain_lain      = $input->ket_lain_lain;
            $jenis_diet  =  json_encode($input->jenis_diet);
            $tglorder      = $input->tglorder;
            $status_order  = 'false';
            $id_order = $input->id_order;
            $status_makanan = $input->status_makanan;
            $jam_order = $input->jam_order;
            $id_ruang = $input->id_ruang;
            $id_kamar = $input->id_kamar;
            $dilayani = '0';
            $cek = "SELECT id_order FROM order_gizi WHERE id_order='$id_order' AND id_kunjungan='$id_kunjungan' ORDER BY id_order DESC LIMIT 1 ";
            if (empty($this->db->query($cek)->getResult())) {
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_order;
                        $real   = ((int)$x + 1);
                        $no_order = $real;
                    } else {
                        $no_order = 1;
                    }
                }
                $id_order = $no_order;
                $addOrderGizi = "INSERT INTO order_gizi 
                ( id_kunjungan,id_order,id_unit,id_pegawai,qty,kd_makanan,mulai_makan,ket,jenis_diet,tglorder,status_order,ket_lain_lain,status_makanan,jam_order,id_ruang,id_kamar)
                VALUES('$id_kunjungan','$id_order','$id_unit ',' $id_pegawai',' $qty',' $kd_makanan ','$mulai_makan','$ket','$jenis_diet','$tglorder','false','$ket_lain_lain','$status_makanan','$jam_order','$id_ruang','$id_kamar')";

                if ($this->db->simpleQuery($addOrderGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Simpan Order';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Order Gizi!!";
                }
            } else {
                $updateOrderGizi = "UPDATE order_gizi SET tglorder='$tglorder',id_pegawai='$id_pegawai',kd_makanan='$kd_makanan',mulai_makan='$mulai_makan',qty='$qty',jenis_diet='$jenis_diet',ket='$ket',dilayani='$dilayani',status_order='$status_order',ket_lain_lain='$ket_lain_lain',status_makanan='$status_makanan',jam_order='$jam_order',id_ruang='$id_ruang',id_kamar='$id_kamar' WHERE id_kunjungan='$id_kunjungan' AND id_order='$id_order'";

                if ($this->db->simpleQuery($updateOrderGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Update Order';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Order Gizi!!";
                }
            }
        }
        $this->hasil($output);
    }
    public function simpanPermintaanGizi()
    {
        // var_dump('dasfad');
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan', 'id_order', 'id_unit', 'id_pegawai', 'qty', 'kd_makanan', 'mulai_makan', 'ket', 'jenis_diet', 'tglorder', 'tgl_diterima', 'ket_lain_lain', 'status_makanan', 'jam_order', 'id_ruang', 'id_kamar'];
        // $listParam = ['id_order'];
        $output = array();
        $output['status'] = "sukses";
        $output['pesan'] = "";

        /* SIMPAN PERMINTAAN GIZI */
        if ($this->evalParam($input, $listParam)) {
            $id_kunjungan  = $input->id_kunjungan;
            $id_unit       = $input->id_unit;
            $id_pegawai    = $input->id_pegawai; //petugas_gzi
            $qty      = $input->qty;
            $kd_makanan      = $input->kd_makanan;
            $mulai_makan      = $input->mulai_makan;
            $ket      = $input->ket;
            $ket_lain_lain      = $input->ket_lain_lain;
            $jenis_diet  =  json_encode($input->jenis_diet);
            $tglorder      = $input->tglorder;
            $status_order  = 'true';
            $id_order = $input->id_order;
            $status_makanan = $input->status_makanan;
            $tgl_diterima = $input->tgl_diterima;
            $jam_order = $input->jam_order;
            $id_ruang = $input->id_ruang;
            $id_kamar = $input->id_kamar;
            $dilayani = '1';
            $cek = "SELECT id_order FROM order_gizi WHERE id_order='$id_order' ORDER BY id_order DESC LIMIT 1 ";
            if (empty($this->db->query($cek)->getResult())) {
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_order;
                        $real   = ((int)$x + 1);
                        $no_order = $real;
                    } else {
                        $no_order = 1;
                    }
                }
                $id_order = $no_order;
                $addOrderGizi = "INSERT INTO order_gizi 
                ( id_kunjungan,id_order,id_unit,id_pegawai,qty,kd_makanan,mulai_makan,ket,jenis_diet,tglorder,status_order,ket_lain_lain,status_makanan,jam_order,id_ruang,id_kamar')
                VALUES('$id_kunjungan','$id_order','$id_unit ',' $id_pegawai',' $qty',' $kd_makanan ','$mulai_makan','$ket','$jenis_diet','$tglorder','$status_order','$ket_lain_lain','$status_makanan','$jam_order','$id_ruang','$id_kamar')";

                if ($this->db->simpleQuery($addOrderGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Simpan Order';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Order Gizi!!";
                }
            } else {
                $updateOrderGizi = "UPDATE order_gizi SET tglorder='$tglorder',id_pegawai='$id_pegawai',kd_makanan='$kd_makanan',mulai_makan='$mulai_makan',qty='$qty',jenis_diet='$jenis_diet',ket='$ket' ,tgl_diterima='$tgl_diterima',dilayani='$dilayani',ket_lain_lain='$ket_lain_lain',status_makanan='$status_makanan',jam_order='$jam_order',id_ruang='$id_ruang',id_kamar='$id_kamar' WHERE id_kunjungan='$id_kunjungan' AND id_order='$id_order'";

                if ($this->db->simpleQuery($updateOrderGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Terima Order';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Terima Order Gizi!!";
                }
            }
        }
        echo json_encode($output);
    }

    public function simpanassesmenGizi()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan', 'id_pegawai', 'jenis_pasien', 'skrining_perawat', 'skrining_ahli_gizi', 'kondisi_khusus', 'alergi', 'diet_awal', 'tindak_lanjut', 'tgl_assesmen'];

        $output = array();
        $output['status'] = "sukses";
        $output['pesan'] = "";

        /* SIMPAN ASSESMEN GIZI */
        if ($this->evalParam($input, $listParam)) {
            $id_kunjungan  = $input->id_kunjungan;
            $id_pegawai    = $input->id_pegawai; //petugas_gzi
            $jenis_pasien    = $input->jenis_pasien;
            $skrining_perawat      = $input->skrining_perawat;
            $skrining_ahli_gizi      = $input->skrining_ahli_gizi;
            $kondisi_khusus      = $input->kondisi_khusus;
            $alergi      = $input->alergi;
            $diet_awal  = $input->diet_awal;
            $tindak_lanjut      = $input->tindak_lanjut;
            $tgl_assesmen      = $input->tgl_assesmen;
            $status_assesmen  = 'true';

            $cekKunj = "SELECT id_kunjungan FROM assesmen_gizi WHERE id_kunjungan='$id_kunjungan' ORDER BY tgl_assesmen DESC LIMIT 1";
            if (empty($this->db->query($cekKunj)->getResult())) {
                $addAssesmenGizi = "INSERT INTO assesmen_gizi 
                    ( id_kunjungan,id_pegawai,jenis_pasien,skrining_perawat,skrining_ahli_gizi,kondisi_khusus,alergi,diet_awal,tindak_lanjut,tgl_assesmen,status_assesmen)
                    VALUES('$id_kunjungan','$id_pegawai','$jenis_pasien','$skrining_perawat ',' $skrining_ahli_gizi',' $kondisi_khusus',' $alergi ','$diet_awal','$tindak_lanjut','$tgl_assesmen','$status_assesmen')";
                if ($this->db->simpleQuery($addAssesmenGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Simpan Assesmen';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Assesmen Gizi!!";
                }
            } else {
                $updateAssesmenGizi = "UPDATE assesmen_gizi SET tgl_assesmen='$tgl_assesmen',id_pegawai='$id_pegawai',jenis_pasien='$jenis_pasien',skrining_perawat='$skrining_perawat',skrining_ahli_gizi='$skrining_ahli_gizi',kondisi_khusus='$kondisi_khusus',alergi='$alergi',diet_awal='$diet_awal',tindak_lanjut='$tindak_lanjut' WHERE id_kunjungan='$id_kunjungan'";

                if ($this->db->simpleQuery($updateAssesmenGizi)) { //true
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Update Assesmen';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "Gagal Simpan Assesmen Gizi!!";
                }
            }
        }
        echo json_encode($output);
    }

    public function KirimOrderkeGizi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_order', 'id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_order  = $input->id_order;
            $id_kunj  = $input->id_kunj;
            $cek    = "SELECT status_order FROM order_gizi WHERE id_order = '" . $id_order . "' AND id_kunjungan='$id_kunj' ORDER BY id_order DESC LIMIT 1";

            if ($this->db->simpleQuery($cek)) { //true
                $row        = $this->db->query($cek)->getRow();
                $status_order   = $row->status_order;
                if ($status_order == 't') {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Order Gizi Sudah Dilayani!!";
                    $this->hasil($output);
                    return;
                } else {
                    $query  = "UPDATE order_gizi SET status_order  = 'true' WHERE id_kunjungan = '$input->id_kunj' AND id_order = '$id_order' ";
                }
            }

            if ($this->db->simpleQuery($query)) {

                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil Kirim Order";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Kirim Order";
            }
        }
        $this->hasil($output);
    }
}
