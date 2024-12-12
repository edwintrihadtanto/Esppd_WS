<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Kamaroperasi extends Api
{
    public function modaladdjadwalok()
    {
        return view('view/modal/kamaroperasi/modJadwalOK');
    }
    public function modalListpasienOKnew()
    {
        return view('view/kamaroperasi/listkunjunganOKbaru');
    }
    public function modalListjadwalok()
    {
        return view('view/modal/kamaroperasi/modbokingOK');
    }
    public function modInputPembedahan()
    {
        return view('view/modal/kamaroperasi/modInputPembedahan');
    }
    public function modalInputpenataJasaOK()
    {
        return view('view/modal/kamaroperasi/modPenataJasaOK');
    }
    public function modalupdatedetailcomponen()
    {
        return view('view/modal/kamaroperasi/modupdatedetailcomponent');
    }
    public function modInstruksiPembedahan()
    {
        return view('view/modal/kamaroperasi/modInstruksiPembedahan');
    }
    function getKamarRR()
    {
        $kmok =  $this->db->query("SELECT SUM
            (jumlah_bed - digunakan - rusak ) AS sisa,
            jumlah_bed,
            digunakan,
            rusak,
            nama_kamar ,
            id_kamar
            FROM
            kamar 
            WHERE
            id_ruang = '13'
            GROUP BY
            id_kamar 
            ORDER BY
            nama_kamar ASC 
            ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $kmok->getResult();
        echo json_encode($output);
    }
    function getSisabedRR()
    {
        $kmok =  $this->db->query("SELECT SUM(jumlah_bed - digunakan - rusak ) AS sisa,jumlah_bed,digunakan,rusak,nama_kamar,id_kamar
            FROM kamar 
            WHERE
            id_ruang = '13' 
            GROUP BY
            id_kamar");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $kmok->getResult();
        echo json_encode($output);
    }
    function getDatadetailcomponentOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {

            $listProduk = $this->db->query("SELECT
                dt.id_detail_transaksi,
                tar.id_tarif,
                pr.id_produk,
                pr.kd_produk,
                pr.nama_produk,
                jc.id_jenis_component,
                jc.jenis_component,
                jc.edit,
                tc.operator,
                dc.harga,
                peg.nama_pegawai,
                peg.id_pegawai
                FROM
                detail_transaksi dt
                JOIN tarif tar ON dt.id_tarif = tar.id_tarif 
                JOIN produk pr on tar.id_produk = pr.id_produk
                JOIN detail_component dc ON dt.id_detail_transaksi=dc.id_detail_transaksi
                JOIN tarif_component tc ON tc.id_tarif=tar.id_tarif and dc.id_jenis_component=tc.id_jenis_component
                JOIN jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
                LEFT JOIN pegawai peg ON peg.id_pegawai=dc.id_pegawai
                WHERE
                dt.id_detail_transaksi='$input->id_detail_transaksi'");

            if ($listProduk->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Componen tidak ditemukan";
            }
        }
        $this->hasil($output);
    }

    public function updatedetailcomponentpegok()
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

    public function icd9()
    {
        $input = json_decode(file_get_contents('php://input'));
        $plus = '/ +/i';

        if (strlen($input->id) > 1) {
            $query = "SELECT * from icd_9 where upper(deskripsi) like upper('" . $input->id . "%') limit 10";
        } else {
            $query = "SELECT * from icd_9 where kd_icd9 like upper('" . $input->id . "%') limit 10";
        }

        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['icd'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }


    public function getDatadokter()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunjungan    = $input->id_kunjungan;
            $query = "
            SELECT * FROM ok_pembedahan WHERE id_kunjungan='" . $id_kunjungan . "'";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();

                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                }
            } else {
                $output['status']   = 'gagal';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function getOkproduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_penjamin', 'idunit'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $listProduk = $this->db->query("SELECT
                b.id_produk,
                b.id_jenis_produk,
                b.kd_produk,
                b.nama_produk,
                C.harga,
                C.id_tarif,
                C.id_unit,
                d.nama_unit
                FROM
                    --ok_produk A 
                    --INNER JOIN 
                    produk b 
                    --ON A.id_produk = b.id_produk
                    INNER JOIN tarif C ON b.id_produk = C.id_produk 
                    INNER JOIN unit d ON c.id_unit = d.id_unit
                    WHERE
                    C.id_penjamin = '$input->id_penjamin'
                    AND C.id_unit = '$input->idunit'
                    AND b.id_jenis_produk = '5'
                    AND C.tgl_selesai IS NULL 
                    AND C.tgl_berlaku <= CURRENT_DATE");

            if ($listProduk->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Produk tidak ditemukan";
            }
        }
        $this->hasil($output);
    }

    public function kamarOK()
    {
        $kmok =  $this->db->query("SELECT * FROM kamar WHERE id_unit='8001'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $kmok->getResult();
        echo json_encode($output);
    }
    public function rlpembedahan()
    {
        $rl =  $this->db->query("SELECT * FROM rl_36");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $rl->getResult();
        echo json_encode($output);
    }
    public function dokterOperator()
    {
        $dokterOpt =  $this->db->query("SELECT * FROM pegawai WHERE jenis_pegawai='1'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokterOpt->getResult();
        echo json_encode($output);
    }
    public function getListUnitinapOK()
    {
        $output = array();
        $query = "
        SELECT
                *,
        CASE
        WHEN aktif
        THEN 'Aktif' 
        ELSE 'Tidak Aktif' 
        END status
        FROM
        unit
        JOIN jenis_unit USING ( jenis_unit )
        where unit.jenis_unit='8'
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function dokterAnestesi()
    {
        $dokterAnes =  $this->db->query("SELECT * FROM pegawai WHERE jenis_pegawai ='1'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokterAnes->getResult();
        echo json_encode($output);
    }
    public function perawatAsisten()
    {
        $dokterAnes =  $this->db->query("SELECT * FROM pegawai ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokterAnes->getResult();
        echo json_encode($output);
    }
    public function perawatInstrumen()
    {
        $dokterAnes =  $this->db->query("SELECT * FROM pegawai ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokterAnes->getResult();
        echo json_encode($output);
    }
    public function perawatOmloop()
    {
        $dokterAnes =  $this->db->query("SELECT * FROM pegawai ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokterAnes->getResult();
        echo json_encode($output);
    }
    public function penataAnestesi()
    {
        $dokterAnes =  $this->db->query("SELECT * FROM pegawai ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $dokterAnes->getResult();
        echo json_encode($output);
    }
    public function unit()
    {
        $unit =  $this->db->query("SELECT * FROM unit WHERE jenis_unit NOT IN(9,4)");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }
    public function unitsekarang()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_unit'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $id_unit  =  $input->id_unit;

            $unit =  $this->db->query("SELECT * FROM unit WHERE id_unit IN(" . $id_unit . ")");
            $output['status']   = 'sukses';
            $output['pesan']    = '';
            $output['data']     = $unit->getResult();
        }
        echo json_encode($output);
    }
    public function unitasal()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();

            $unit =  $this->db->query("SELECT a.id_unit_asal,b.nama_unit FROM ok_booking_kamar a INNER JOIN unit b ON a.id_unit_asal=b.id_unit WHERE a.id_kunjungan_ok='$input->id_kunjungan'");
            $output['status']   = 'sukses';
            $output['pesan']    = '';
            $output['data']     = $unit->getResult();
        }
        echo json_encode($output);
    }
    public function jenisbedah()
    {
        $jenis_bedah =  $this->db->query("SELECT * FROM ok_jenis_bedah");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $jenis_bedah->getResult();
        echo json_encode($output);
    }
    public function klasifikasibedah()
    {
        $klas_bedah =  $this->db->query("SELECT * FROM ok_klasifikasi_bedah");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $klas_bedah->getResult();
        echo json_encode($output);
    }
    public function jenisanestesi()
    {
        $anestesi =  $this->db->query("SELECT * FROM ok_jenis_anestesi");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $anestesi->getResult();
        echo json_encode($output);
    }

    public function getPenyakit()
    {
        $icd =  $this->db->query("SELECT * FROM penyakit");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $icd->getResult();
        echo json_encode($output);
    }

    public function getListprodukPasienOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT
            dk.id_detail_kunjungan,
            dt.id_detail_transaksi,
            dt.id_tarif,
            dt.tgl_input,
            dk.id_produk,
            P.kd_produk,
            P.nama_produk,
            P.id_jenis_produk,
            dk.ketrangan,
                    --okp.id_bedah,
                    dk.qty,
                    dt.harga 
                    FROM
                    detail_kunjungan dk
                    INNER JOIN kunjungan k ON k.id_kunjungan=dk.id_kunjungan
                    INNER JOIN produk P ON P.id_produk = dk.id_produk
                    --INNER JOIN ok_pembedahan okp ON okp.id_kunjungan = k.id_kunjungan
                    INNER JOIN detail_transaksi dt ON dk.id_detail_kunjungan = dt.id_detail_kunjungan 
                    WHERE
                    dk.id_kunjungan = '" . $input->id_kunj . "' 
                    --AND P.id_jenis_produk = '5' 
                    ORDER BY
                    dk.id_detail_kunjungan DESC";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $output['code']    = "200";
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

    public function getMrpenyakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT C
            .no_rm,
            b.id_penyakit,
            b.penyakit,
            A.id_kunjungan,
            C.nama 
            FROM
            mr_penyakit
            A INNER JOIN penyakit b ON A.id_penyakit = b.id_penyakit
            INNER JOIN pasien C ON A.no_rm = C.no_rm
            WHERE id_kunjungan='$input->id_kunj'
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $output['code']    = "200";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
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
    public function getTindakanLamaOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT tindakan FROM ok_booking_kamar
            WHERE id_kunjungan_ok='$input->id_kunj'
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $output['code']    = "200";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                }
            }
        }
        echo json_encode($output);
    }


    public function penatajasaOK_simpanProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi',
            'id_kunjungan'
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $id_transaksi = $input->id_transaksi;
        $id_kunjungan = $input->id_kunjungan;
        $kd_prd = $input->idproduk;
        $id_tarif = $input->idtarif;
        $qty = $input->qty;
        // $hrg_beli = $input->hrg_beli;

        if ($this->evalParam($input, $listParam)) {
            $cektutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$id_transaksi'")->getRow()->tgl_tutup;
            if ($cektutuptransaksi == null || $cektutuptransaksi == 'null' || $cektutuptransaksi == '' || empty($cektutuptransaksi)) {
                // $data = $input->data;
                // for ($i = 0; $i < $input->count; $i++) {

                $this->db->transStart();
                $querydetailkunjungan = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, qty) 
                VALUES ('$id_kunjungan', '$kd_prd','$qty') returning id_detail_kunjungan";

                $detail_kunjungan = $this->db->query($querydetailkunjungan)->getRow()->id_detail_kunjungan;

                $querydetailtransaksi = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, id_tarif, qty,diskon, id_detail_kunjungan) 
                VALUES ('$id_transaksi', '$id_kunjungan', '$kd_prd','$id_tarif','$qty','0','$detail_kunjungan')returning id_detail_transaksi";
                $this->db->query($querydetailtransaksi);
                // $id_detail_transaksi = $this->db->query($querydetailtransaksi)->getRow()->id_detail_transaksi;

                // $queryDetailcomponent = "UPDATE detail_component set id_pegawai='" . $input->id_pegawai . "' WHERE id_jenis_component='6' AND id_detail_transaksi='" . $id_detail_transaksi . "'";
                // $this->db->query($queryDetailcomponent);

                $this->db->transComplete();
                // }
                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses menambahkan produk";
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


    public function penataJasaOK_deleteProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_kunjungan'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $cektutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$input->id_trans'")->getRow()->tgl_tutup;
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


    public function getpenjaminOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_transaksi'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_transaksi    = $input->id_transaksi;

            $query = "
            SELECT
            tr.no_rm,
            penj.id_penjamin,
            penj.nama_penjamin,
            no_sjp 
            FROM
            transaksi tr
            INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
            INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
            WHERE
            tr.id_transaksi = '" . $id_transaksi . "'";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();

                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Penjamin Tidak Ditemukan!!";
                }
            } else {
                $output['status']   = 'gagal';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function listkunjunganPasienbaru()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            if ($input->no_rm != '') {
                $no_rm       = $input->no_rm;

                $query = "
                SELECT 
                T.id_transaksi,
                T.nama_penanggung_jawab,
                T.hubungan_penanggung_jawab,
                P.nama,
                P.no_rm,
                P.alamat,
                P.jenis_kelamin,
                age( P.tgl_lahir ) :: VARCHAR,
                EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur 
                FROM transaksi T 
                INNER JOIN pasien P ON T.no_rm=P.no_rm 
                WHERE T.no_rm ='$no_rm' 
                AND T.tgl_tutup IS NULL
                LIMIT 1";

                // if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "201";
                    $output['pesan']    = "Tidak ditemukan";
                }
            } else {
                $output['code']     = "01";
                $output['status']   = "sukses";
                $output['pesan']    = "Masukan No RM";
            }
        }
        $this->hasil($output);
    }

    public function listkunjunganbaruPasienOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_rm       = $input->no_rm;

            $query = "
            SELECT 
            K.id_kunjungan,
            K.tgl_masuk,
            K.status_kunjungan,
            K.id_unit,
                    --u.nama_unit,
                    K.id_pegawai,
                    --u.id_unit,
                    T.id_transaksi,
                    T.nama_penanggung_jawab,
                    T.hubungan_penanggung_jawab,
                    P.nama,
                    P.no_rm,
                    P.alamat,
                    P.jenis_kelamin,
                    --peg.id_pegawai,
                    --peg.nama_pegawai,
                    age( P.tgl_lahir ) :: VARCHAR,
                    EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur 
                    FROM
                    transaksi T
                    LEFT JOIN kunjungan K ON T.id_transaksi = K.id_transaksi
                    INNER JOIN pasien P ON P.no_rm = T.no_rm
                    --INNER JOIN pegawai peg ON K.id_pegawai = peg.id_pegawai
                    --INNER JOIN unit u ON K.id_unit = u.id_unit
                    WHERE 
                    P.no_rm='" . $no_rm . "'
                    --AND k.tgl_keluar IS NULL
                    ORDER BY k.id_kunjungan DESC
                    LIMIT 1

                    ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
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

    public function listkunjunganbaruPasienOKbaru()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_rm       = $input->no_rm;
            $checkedtgl       = $input->checkedtgl;
            $nmpasien  = $input->nmpasien;
            $jml        = $input->jml;
            $unit        = $input->unit;
            $tglawal  = $input->tglawal;
            $tglahir = $input->tglahir;

            if ($checkedtgl == true) {
                $konz = "AND DATE(K.tgl_masuk) BETWEEN '" . $tglawal . "' AND '" . $tglahir . "'";
            } else {
                $konz = "";
            }
            $query = "
            SELECT 
            K.id_kunjungan,
            K.tgl_masuk,
            K.status_kunjungan,
            K.id_unit,
            u.nama_unit,
            K.id_pegawai,
                    --u.id_unit,
                    T.id_transaksi,
                    T.nama_penanggung_jawab,
                    T.hubungan_penanggung_jawab,
                    P.nama,
                    P.no_rm,
                    kam.nama_kamar,
                    P.alamat,
                    P.jenis_kelamin,
                    ri.nama_ruang,
                    --peg.id_pegawai,
                    peg.nama_pegawai,
                    age( P.tgl_lahir ) :: VARCHAR,
                    EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur 
                    FROM
                    transaksi T
                    LEFT JOIN kunjungan K ON T.id_transaksi = K.id_transaksi
                    INNER JOIN pasien P ON P.no_rm = T.no_rm
                    INNER JOIN pegawai peg ON K.id_pegawai = peg.id_pegawai
                    INNER JOIN unit u ON K.id_unit = u.id_unit
                    LEFT join kamar kam on kam.id_kamar=K.id_kamar
                    LEFT join ruang_inap ri on ri.id_ruang=kam.id_ruang
                    WHERE
                    u.jenis_unit ='2'
                    AND P.no_rm like UPPER('" . $no_rm . "%') 
                        AND upper(P.nama) like UPPER('" . $nmpasien . "%') $konz
                        AND K.id_unit LIKE('" . $unit . "%')
                        AND k.tgl_keluar IS NULL
                        AND t.tgl_tutup IS NULL
                        ORDER BY K.tgl_masuk DESC
                        LIMIT '" . $jml . "' 

                        ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
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

    public function listpenataJasaOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_rm       = $input->no_rm;
            $nmpasien  = $input->nmpasien;
            $jml    = $input->jml;
            $checkedtgl       = $input->checkedtgl;
            $tglawal  = $input->tglawal;
            $tglahir = $input->tglahir;
            $postingOK = $input->postingOK;

            if ($checkedtgl == true) {
                $konz = "AND DATE(K.tgl_masuk) BETWEEN '" . $tglawal . "' AND '" . $tglahir . "'";
            } else {
                $konz = "";
            }
            if ($jml != "") {
                $jumlah = "LIMIT '" . $jml . "'";
            } else {
                $jumlah = "";
            }

            $query = "
            SELECT
            tr.id_transaksi,
            K.id_kunjungan,
            DATE ( tr.tgl_transaksi ) AS tgl_transaksi,
            K.id_unit,
            K.id_pegawai,
            u.nama_unit,
            tr.no_rm,
            un.nama_unit AS asal,
            tr.nama_penanggung_jawab,
            tr.no_hp_penanggung_jawab,
            UPPER ( P.nama ) AS nama,
            UPPER ( P.alamat ) AS alamat,
            P.telepon,
            age( P.tgl_lahir ) :: VARCHAR,
            EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur,
            P.nik,
            P.jenis_kelamin,
            K.posting,
            peg.nama_pegawai,
            ob.id_unit_asal
            FROM
            transaksi tr
            INNER JOIN pasien P ON tr.no_rm = P.no_rm
            INNER JOIN kunjungan K ON K.id_transaksi = tr.id_transaksi
            INNER JOIN unit u ON u.id_unit = K.id_unit
            INNER JOIN pegawai peg ON peg.id_pegawai = K.id_pegawai 
            INNER JOIN ok_booking_kamar ob ON ob.id_kunjungan_ok=k.id_kunjungan
            INNER JOIN unit un ON un.id_unit=ob.id_unit_asal
            WHERE
                    u.jenis_unit = '8' -->> OK
                    AND K.aktif='t'
                    AND P.no_rm like UPPER('" . $no_rm . "%') 
                        AND K.posting='" . $postingOK . "'
                        AND upper(P.nama) like UPPER('" . $nmpasien . "%') $konz
                        ORDER BY K.id_kunjungan DESC
                        $jumlah
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
            }
        }
        echo json_encode($output);
    }

    public function listbookingkamarOK()
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
            $checkedtgl       = $input->checkedtgl;
            $tglawal  = $input->tglawal;
            $tglahir = $input->tglahir;

            if ($checkedtgl == true) {
                $konz = "AND DATE(K.tgl_masuk) BETWEEN '" . $tglawal . "' AND '" . $tglahir . "'";
            } else {
                $konz = "";
            }
            if ($jml != "") {
                $jumlah = "LIMIT '" . $jml . "'";
            } else {
                $jumlah = "";
            }

            $query = "
            SELECT
            bk.*,
            okb.nama_kamar,
            okb.id_kamar,
            K.id_kunjungan,
            K.tgl_masuk,
            K.status_kunjungan,
            K.id_unit,
            K.posting,
            u.nama_unit,
            K.id_pegawai,
            T.id_transaksi,
            T.nama_penanggung_jawab,
            T.no_hp_penanggung_jawab,
            P.nama,
            P.no_rm,
            P.alamat,
            P.jenis_kelamin,
                    --pp.no_kartu,
                    --pn.id_penjamin,
                    --pn.nama_penjamin,
                    peg.nama_pegawai,
                    age( P.tgl_lahir ) :: VARCHAR,
                    EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur 
                    FROM
                    ok_booking_kamar bk
                    LEFT JOIN kamar okb ON bk.id_kamar = okb.id_kamar
                    INNER JOIN kunjungan K ON K.id_kunjungan = bk.id_kunjungan_ok
                    INNER JOIN transaksi T ON T.id_transaksi = K.id_transaksi
                    INNER JOIN pasien P ON P.no_rm = T.no_rm
                    INNER JOIN pegawai peg ON K.id_pegawai = peg.id_pegawai
                    INNER JOIN unit u ON K.id_unit = u.id_unit
                    --INNER JOIN penjamin_pasien pp ON pp.no_rm = P.no_rm
                    --INNER JOIN penjamin pn ON pn.id_penjamin = pp.id_penjamin
                    WHERE 
                    P.no_rm like UPPER('" . $no_rm . "%') AND upper(P.nama) like UPPER('" . $nmpasien . "%') 
                        $konz
                        ORDER BY bk.id_boking DESC
                        $jumlah
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
    public function listantrianOK()
    {
        date_default_timezone_set('Asia/Jakarta');
        // $input = json_decode(file_get_contents('php://input'));
        $dinoiki = date('Y-m-d');

        $query = "
        SELECT
        bk.status_boking,
        okb.nama_kamar_ok,
        P.nama 
        FROM
        ok_booking_kamar bk
        LEFT JOIN ok_kamar_bedah okb ON bk.id_kamar = okb.id_kamar_ok
        INNER JOIN kunjungan K ON K.id_kunjungan = bk.id_kunjungan_ok
        INNER JOIN transaksi T ON T.id_transaksi = K.id_transaksi
        INNER JOIN pasien P ON P.no_rm = T.no_rm
        WHERE 
        status_boking NOT IN ( 2 ) 
        AND DATE ( bk.tgl_boking ) = '$dinoiki' 
        ORDER BY
        bk.tgl_boking ASC 
        LIMIT 5
        ";

        $queryx = $this->db->query($query)->getResult();
        if (!empty($queryx)) { //JIKA TIDAK KOSONG
            $output['status']   = "sukses";
            $output['code']     = "00";
            $output['pesan']    = "Antrian Ditemukan";
            $output['data']     = $queryx;
        } else { // JIKA KOSONG
            $output['status']   = "sukses";
            $output['code']     = "XX";
            $output['pesan']    = "";
        }
        echo json_encode($output);
    }

    function hapusjadwaloperasi()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_boking'];
        $output = array();

        if ($this->evalParam($input, $listParam)) {

            $id_boking = $input->id_boking;
            $id_kunjungan = $input->id_kunjungan;
            $querycek = $this->db->query("SELECT posting FROM kunjungan WHERE id_kunjungan='$id_kunjungan'");
            $row  = $querycek->getRow();
            $posting  = $row->posting;
            if ($posting == 't') {
                $output['status'] = "gagal";
                $output['code'] = "500";
                $output['pesan']    = "Kunjungan Sudah Diposting!";
            } else {
                $queryhapusJadwal = "DELETE FROM ok_booking_kamar WHERE id_boking='$id_boking' AND id_kunjungan_ok='$id_kunjungan'";
                $querydeleteKunj = "DELETE FROM kunjungan WHERE id_kunjungan='$id_kunjungan'";
                $this->db->simpleQuery($querydeleteKunj);

                if ($this->db->simpleQuery($queryhapusJadwal)) {
                    $output['status'] = "sukses";
                    $output['code'] = "200";
                    $output['pesan']    = 'Berhasil Hapus Jadwal';
                } else {
                    $output['status'] = "gagal";
                    $output['code'] = "500";
                    $output['pesan']    = "";
                }
            }
        }
        echo json_encode($output);
    }

    public function getListpembedahan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunjungan   = $input->id_kunjungan;

            $query = "
            SELECT *
            FROM 
            ok_pembedahan a 
            INNER JOIN ok_pembedahandet b ON a.id_bedah=b.id_bedah
            WHERE id_kunjungan='$id_kunjungan'
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    // $output['pesan']    = "Belum Input Pembedahan";
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function simpanBookingOK()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_transaksi'];
        $output = array();
        $output['status'] = "sukses";
        $output['pesan'] = "";

        if ($this->evalParam($input, $listParam)) {
            // $id_kunjungan  = $input->id_kunjungan;
            $id_boking  = $input->id_boking;
            // $id_kunjungan_ok  = $input->id_kunjungan_ok;
            $id_unit       = $input->id_unit;
            $id_unit_asal       = $input->id_unit_asal;
            $id_transaksi       = $input->id_transaksi;
            $id_pegawai    = $input->id_pegawai; //dokter
            $tglboking = $input->tglboking;
            $klasifikasi = $input->klasifikasi;
            $jenis_bedah = $input->jenis_bedah;
            $kamar = $input->kamar;
            $statusboking = $input->statusboking;
            $tindakan = $input->tindakan;
            $ket = $input->ket;
            $id_user = $input->id_user;

            $queryCektutup = "SELECT * FROM transaksi WHERE id_transaksi= $input->id_transaksi";
            $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;

            if (empty($cekTgltutup)) {

                if ($id_boking == '') {
                    $cek = "SELECT id_boking FROM ok_booking_kamar ORDER BY id_boking DESC LIMIT 1 ";
                    if ($this->db->simpleQuery($cek)) { //true
                        $cekx   = $this->db->query($cek)->getResult();
                        $row    = $this->db->query($cek)->getRow();
                        if (!empty($cekx)) {
                            $x      = $row->id_boking;
                            $real   = ((int)$x + 1);
                            $no_order = $real;
                        } else {
                            $no_order = 1;
                        }
                    }

                    $queryAddkunjunganOK = "INSERT INTO kunjungan
                    (id_unit,id_transaksi,id_pegawai,id_kamar,status_kunjungan)
                    VALUES('$id_unit','$id_transaksi','$id_pegawai','$kamar','1') returning id_kunjungan";
                    $id_kunjungan_ok = $this->db->query($queryAddkunjunganOK)->getRow()->id_kunjungan;

                    $id_boking = $no_order;
                    $addBooking = "INSERT INTO ok_booking_kamar
                    (id_kunjungan_ok,id_boking,id_unit,id_pegawai,tgl_boking,id_klasifikasi_bedah,id_jenis_bedah,id_kamar,status_boking,tindakan,keterangan,id_user,id_unit_asal)
                    VALUES('$id_kunjungan_ok','$id_boking','$id_unit ','$id_pegawai','$tglboking','$klasifikasi','$jenis_bedah','$kamar','$statusboking','$tindakan','$ket','$id_user','$id_unit_asal')";
                    if ($this->db->simpleQuery($addBooking)) {
                        $output['status'] = "sukses";
                        $output['code'] = "200";
                        $output['data']   = $this->db->query($cek)->getResult();
                        $output['pesan']    = 'Berhasil Simpan Jadwal';
                    } else {
                        $output['status'] = "gagal";
                        $output['code'] = "500";
                        $output['pesan']    = "Gagal Simpan Jadwal!!";
                    }
                } else {
                    $updateOrder = "UPDATE ok_booking_kamar SET id_pegawai='$id_pegawai',id_klasifikasi_bedah='$klasifikasi',id_jenis_bedah='$jenis_bedah',tgl_boking='$tglboking',status_boking='$statusboking',id_kamar='$kamar',tindakan='$tindakan',keterangan='$ket',id_user='$id_user',id_unit_asal='$id_unit_asal' WHERE id_boking='$id_boking'";

                    if ($this->db->simpleQuery($updateOrder)) { //true
                        $output['status'] = "sukses";
                        $output['code'] = "200";
                        $output['pesan']  = 'Berhasil Update Jadwal';
                    } else {
                        $output['status'] = "gagal";
                        $output['code'] = "500";
                        $output['pesan']  = "Gagal Simpan Jadwal!!";
                    }
                }
            } else {
                $output['pesan'] = "Transaksi Sudah ditutup kasir!!";
            }
        }
        $this->hasil($output);
    }

    public function unpostingpenataJasaOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $queryCektutup = "SELECT * FROM transaksi WHERE id_transaksi= $input->id_transaksi";
            $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;

            if (empty($cekTgltutup)) {
                $query = "UPDATE kunjungan SET posting = 'f',jam_keluar=null,id_cara_keluar=null,tgl_keluar=null WHERE id_kunjungan = '$input->id_kunjungan'";

                if ($this->db->simpleQuery($query)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Buka Penata Jasa";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Coba Lagi";
                }
            } else {
                $output['code']   = "101";
                $output['status']   = "gagal";
                $output['pesan']   = "Transaksi Sudah Ditutup Kasir!";
            }
        }
        $this->hasil($output);
    }

    public function postingcarakeluarOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'idcarakeluar', 'idtransaksi', 'idkunjungan'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if ($this->evalParam($input, $listParam)) {
            date_default_timezone_set("Asia/Jakarta");
            $queryKeluarOK = "UPDATE kunjungan SET tgl_keluar =CURRENT_DATE,id_cara_keluar='$input->idcarakeluar',jam_keluar=CURRENT_TIMESTAMP,posting='t' WHERE id_transaksi='$input->idtransaksi' AND id_kunjungan='$input->idkunjungan'";

            $queryUpdatebokingOk = "UPDATE ok_booking_kamar SET status_boking='2' WHERE id_kunjungan_ok='$input->idkunjungan'";
            $this->db->simpleQuery($queryUpdatebokingOk);

            if ($this->db->simpleQuery($queryKeluarOK)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses posting";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal posting";
            }
        }
        $this->hasil($output);
    }

    public function simpanpindahRR()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id_transaksi'];
        $output = array();
        $output['status'] = "sukses";
        $output['pesan'] = "";

        if ($this->evalParam($input, $listParam)) {
            $id_transaksi       = $input->id_transaksi;
            $id_pegawai    = $input->id_pegawai;
            $id_kamar    = $input->id_kamar;

            $queryCektutup = "SELECT * FROM transaksi WHERE id_transaksi= $input->id_transaksi";
            $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;

            if (empty($cekTgltutup)) {
                $cekkunjRR = $this->db->query("SELECT * FROM transaksi T INNER JOIN kunjungan K ON t.id_transaksi=k.id_transaksi WHERE k.id_unit='2004' AND t.id_transaksi='$input->id_transaksi' AND K.tgl_keluar IS NULL");


                if ($cekkunjRR->getNumRows() > 0) {
                    $transaksi = $cekkunjRR->getRow();
                    $output['status'] = "gagal";
                    $output['pesan'] = "Pasien Sudah Masuk RR!";
                    $this->hasil($output);
                    return;
                } else {
                    $ceksisa = $this->db->query("SELECT jumlah_bed-digunakan-rusak as p from kamar where id_kamar='$id_kamar'");
                    if ($ceksisa->getRow('p') <= 0) {
                        $output['status'] = "gagal";
                        $output['pesan'] = "Kamar RR Penuh, Hubungi RR untuk posting tindakan";
                    } else {
                        $queryAddkunjunganRR = "INSERT INTO kunjungan
                        (id_unit,id_transaksi,id_pegawai,id_kamar,status_kunjungan,aktif)
                        VALUES('2004','$id_transaksi','$id_pegawai','$id_kamar','1','true')";

                        $queryUpdatejumlahbed = "UPDATE kamar SET digunakan=digunakan+1 WHERE id_kamar='$id_kamar'";
                        $this->db->simpleQuery($queryUpdatejumlahbed);

                        if ($this->db->simpleQuery($queryAddkunjunganRR)) {
                            $output['status'] = "sukses";
                            $output['code'] = "200";
                            $output['pesan']    = 'Berhasil Pindah Ke RR';
                        } else {
                            $output['status'] = "sukses";
                            $output['code'] = "500";
                            $output['pesan']    = "Gagal Pindah Pasien!";
                        }
                    }
                }
            } else {
                $output['pesan'] = "Transaksi Sudah ditutup kasir!!";
            }
        }
        $this->hasil($output);
    }
}
