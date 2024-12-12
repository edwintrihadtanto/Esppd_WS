<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use Predis\Command\Redis\SUBSTR;

class Keuangan extends Api
{

    // public function __construct()
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $this->db =  db_connect();
    // }
    public function modKeuanganJurnalUmum()
    {
        return view('view/modal/keuangan/modKeuanganJurnalUmum');
    }

    public function modKeuanganAP()
    {
        return view('view/modal/keuangan/modKeuanganAP');
    }

    public function modKeuanganAPRwtByr()
    {
        return view('view/modal/keuangan/modKeuanganAPRwtByr');
    }

    public function modKeuanganAR()
    {
        return view('view/modal/keuangan/modKeuanganAR');
    }

    public function modKeuanganARpiutang()
    {
        return view('view/modal/keuangan/modKeuanganARpiutang');
    }

    public function modKeuanganKasBank()
    {
        return view('view/modal/keuangan/modKeuanganKasBank');
    }

    public function modkeuanganNeracaBukuBesar()
    {
        return view('view/modal/keuangan/modkeuanganNeracaBukuBesar');
    }

    public function modKeuanganBukuBesar_ListAccount()
    {
        return view('view/modal/keuangan/modKeuanganBukuBesar_ListAccount');
    }

    public function modkeuanganKasBankPenerima()
    {
        return view('view/modal/keuangan/modKeuanganKasBank_ListPenerima');
    }

    public function modkeuanganKasBankPasien()
    {
        return view('view/modal/keuangan/modKeuanganKasBank_ListPasien');
    }

    public function modkeuanganKasBankAsuransi()
    {
        return view('view/modal/keuangan/modKeuanganKasBank_ListAsuransi');
    }

    public function modkeuanganKasBankSupplier()
    {
        return view('view/modal/keuangan/modKeuanganKasBank_ListSupplier');
    }

    public function modalviewKeuanganNeraca()
    {
        return view('view/modal/keuangan/modalviewKeuanganNeraca');
    }

    public function modalviewKeuanganLabaRugi()
    {
        return view('view/modal/keuangan/modalviewKeuanganLabaRugi');
    }



    public function cekAksesKeu()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_user',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM ac_akses_keu WHERE id_user = '$input->id_user'");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getRow('hak_akses');
            } else {
                $output['status']   = "sukses";
                $output['data']     = "";

            }
        }

        $this->hasil($output);
    }

    public function getAccountbyIdacc()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_acc',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM account WHERE id_acc = '$input->id_acc'");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Account tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getAccount()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'accountcari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM account WHERE coa like upper('" . $input->accountcari . "%') AND level = '5' ORDER BY id_coa ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Account tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getKas()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kascari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            if($input->kascari == ''){
                $kondisi = '';
            }else{
                $kondisi = "WHERE a.kas_nama like upper('" . $input->kascari . "%')";
            }
            $data = $this->db->query("SELECT * FROM ac_kas a INNER JOIN account b ON a.id_acc=b.id_acc $kondisi ORDER BY a.id_kas ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Kas Bank tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getKasCoa()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kascari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            if($input->kascari == ''){
                $kondisi = '';
            }else{
                $kondisi = "WHERE a.coa like upper('" . $input->kascari . "%')";
            }
            $data = $this->db->query("SELECT CASE WHEN b.id_kas IS NULL THEN
		'000'
	ELSE
		b.id_kas
END AS id_kas,
CASE WHEN b.kas_nama IS NULL THEN
		''
	ELSE
		b.kas_nama
END AS kas_nama,
a.id_acc, a.id_coa, a.coa FROM account a LEFT JOIN ac_kas b ON a.id_acc=b.id_acc ORDER BY a.id_acc ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Kas Bank tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getCekKas()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'cek_id_kas',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT jumlah FROM ac_kas WHERE id_acc = $input->cek_id_kas");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['saldo']     = $data->getRow()->jumlah;
            } else {
                $output['pesan']    = "Kas Bank";
            }
        }

        $this->hasil($output);
    }


    public function getPegawaiAkses()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT * FROM users WHERE id_user != 1 ORDER BY nama ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
        } else {
            $output['pesan']    = "Data Tidak Ada";
        }

        $this->hasil($output);
    }

    public function getListPegawaiAkses()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT u.id_user, u.nama, ac.hak_akses FROM users u INNER JOIN ac_akses_keu ac ON u.id_user=ac.id_user ORDER BY u.nama ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = "";

        }

        $this->hasil($output);
    }

    public function keuanganAkseskeu_Simpan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "DELETE FROM ac_akses_keu";
        

            if ($this->db->query($query)) {
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $id_user       = $data[$i]->getId_User;
                    $hak_akses       = $data[$i]->getHakAkses;


                    $querydetail = "INSERT INTO ac_akses_keu (id_user, hak_akses) VALUES ('$id_user', '$hak_akses')";

                    if ($this->db->query($querydetail)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan";
                    }
                }
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                //$output['pesan']    = $this->db->error();
                // $output['x']        = '';
            }
        }
        $this->hasil($output);
    }

    public function getPenerima()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT * FROM ac_penerima ORDER BY id_penerima ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
        } else {
            $output['pesan']    = "Jenis Penerima tidak ditemukan";
        }

        $this->hasil($output);
    }
    
    public function listPasien()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT * FROM pasien ORDER BY no_rm ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
        } else {
            $output['pesan']    = "Pasien tidak ditemukan";
        }

        $this->hasil($output);
    }

    public function ListAsuransi()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT * FROM penjamin ORDER BY nama_penjamin ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
        } else {
            $output['pesan']    = "Asuransi tidak ditemukan";
        }

        $this->hasil($output);
    }

    public function ListSupplier()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT kd_vendor AS id, nama FROM far_vendor
                        UNION ALL
                        SELECT id_supplier_logistik AS id, nama_supplier AS nama FROM logistik_supplier
                        ORDER BY nama ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
        } else {
            $output['pesan']    = "Supplier tidak ditemukan";
        }

        $this->hasil($output);
    }

    public function list_keuanganJurnalUmum()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tgl_transaksi'];
        if ($this->evalParam($input, $listParam)) {
            $checkedtgl        = $input->checkedtgl;
            $tgl_transaksi        = $input->tgl_transaksi;
            $tgl_transaksisd        = $input->tgl_transaksisd;
            $id_gl        = $input->id_gl;
            $jml        = $input->jmlh;
            if ($checkedtgl == true) {
                $kondisiku = "WHERE a.tgl_jurnal BETWEEN '$tgl_transaksi' AND '$tgl_transaksisd'";
            } else {
                $kondisiku = "";
            }
            if ($id_gl == '') {
                $kondisiku2 = "";
            } else {
                $kondisiku2 = "AND a.id_gl LIKE UPPER('%$id_gl%')";
            }

            if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            }
            $query = $this->db->query("SELECT a.*, b.nama as nama_pegawai FROM ac_jurnal a INNER JOIN users b ON a.id_pegawai=b.id_user $kondisiku $kondisiku2 $kondisi");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        }

        echo json_encode($output);
    }

    public function hapuskeuanganJurnalUmum()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jurnal'];
        if ($this->evalParam($input, $listParam)) {
            $id_jurnal        = $input->id_jurnal;
            $id_user        = $input->id_user;
            $ket        = $input->ket;


            $query = $this->db->query("SELECT LEFT(ac.id_gl, 2) AS id_gl_new, ac.*, acd.*, kas.id_acc FROM ac_jurnal ac INNER JOIN ac_jurnal_detail acd ON ac.id_jurnal=acd.id_jurnal INNER JOIN ac_kas kas ON acd.id_acc=kas.id_acc WHERE ac.id_jurnal = '$id_jurnal'");

            if ($query->getNumRows() > 0) {
                foreach($query->getResult() as $row){
                    if ($query->getRow('id_gl_new') == 'KM') {
                        $kembali1 = $row->debit;
                        $kembali2 = $row->kredit;
                        $idacc_kas = $row->id_acc;
                        if($kembali1 == 0){
                            $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') + $kembali2 WHERE id_acc = '$idacc_kas'");
                        }else{
                            $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') - $kembali1 WHERE id_acc = '$idacc_kas'");
                        }
                    } else {
                        $kembali1 = $row->kredit;
                        $kembali2 = $row->debit;
                        $idacc_kas = $row->id_acc;
                        if ($kembali1 == 0) {
                            $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') - $kembali2 WHERE id_acc = '$idacc_kas'");
                        } else {
                            $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') + $kembali1 WHERE id_acc = '$idacc_kas'");
                        }
                        // $kembali = $query->getRow('kredit');
                        // $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') + $kembali  WHERE id_acc = '$idacc_kas'");
                    }
                }
                // $idacc_kas = $query->getRow('id_acc');
                // $output['status']   = "sukses";
                // $output['pesan']    = "$idacc_kas";
                // if($query->getRow('id_gl_new') == 'KM'){
                //     $kembali = $query->getRow('debit');
                //     $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') - $kembali  WHERE id_acc = '$idacc_kas'");
                // }else{
                //     $kembali = $query->getRow('kredit');
                //     $this->db->query("UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') + $kembali  WHERE id_acc = '$idacc_kas'");
                // }
                $querydelete = $this->db->query("DELETE FROM ac_jurnal WHERE id_jurnal = '$id_jurnal'");
                $this->db->query("WITH deletejurnal AS (DELETE FROM ac_jurnal_detail WHERE id_jurnal = '$id_jurnal' RETURNING id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created, CURRENT_DATE, $id_user, '$ket') INSERT INTO ac_log_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_user_created, date_created, date_deleted, id_user_hapus, ket) SELECT * FROM deletejurnal");
            }else{
                $querydelete = $this->db->query("DELETE FROM ac_jurnal WHERE id_jurnal = '$id_jurnal'");
                $this->db->query("WITH deletejurnal AS (DELETE FROM ac_jurnal_detail WHERE id_jurnal = '$id_jurnal' RETURNING id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created, CURRENT_DATE, $id_user, '$ket') INSERT INTO ac_log_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_user_created, date_created, date_deleted, id_user_hapus, ket) SELECT * FROM deletejurnal");
            }
            if ($querydelete) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                // $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = '';
                // $output['data']     = $query->getResult();
            }
        }

        echo json_encode($output);
    }

    public function list_keuanganJurnalUmumDetail()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_jurnal',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM ac_jurnal WHERE id_jurnal = $input->id_jurnal");
            $detail = $this->db->query("SELECT a.*, b.coa, b.id_coa FROM ac_jurnal_detail a INNER JOIN account b ON a.id_acc=b.id_acc WHERE a.id_jurnal = $input->id_jurnal");
            $cekdetail = $this->db->query("SELECT * FROM ac_jurnal_detail WHERE id_jurnal = $input->id_jurnal LIMIT 1");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
                $output['detail']     = $detail->getResult();
                $output['cekdetail']     = $cekdetail->getResult();
            } else {
                $output['status']   = "sukses";
            }
        }

        $this->hasil($output);
    }

    public function SimpankeuanganJurnalUmum()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $tgl_transaksi  = $input->tgl_trans;
            $jumlah  = $input->jumlah;
            $keterangan  = $input->ket;
            $id_pegawai  = $input->id_peg;
            $penerima  = $input->penerima;
            $nm_penerima  = $input->nmpenerima;

            if ($input->id_jurnal != '') {
                $this->db->transStart();
                $id_jurnal  = $input->id_jurnal;
                $id_gl  = $input->id_gl;
                $this->db->simpleQuery("DELETE FROM ac_jurnal_detail WHERE id_jurnal = '$id_jurnal'");
                $query  = "UPDATE ac_jurnal SET
                            tgl_jurnal = '$tgl_transaksi',
                            id_pegawai = '$id_pegawai'
                            WHERE id_jurnal = '$id_jurnal'";
                $this->db->simpleQuery($query);
                $this->db->transComplete();
            } else {
                $cekgl    = "SELECT * FROM (SELECT SUBSTRING(id_gl, 4)::INT as id_gl FROM ac_jurnal WHERE id_gl LIKE 'JM%') y ORDER BY y.id_gl DESC LIMIT 1";
                if ($this->db->simpleQuery($cekgl)) { //true
                    $cekx   = $this->db->query($cekgl)->getResult();
                    $row    = $this->db->query($cekgl)->getRow();
                    if (!empty($cekx)) {
                        $id_gl   = $row->id_gl;
                        $real   = ((int)$id_gl + 1);
                        $idgl = $real;
                    } else {
                        $idgl = 1;
                    }
                }

                $id_gl = "JM-".$idgl;

                $this->db->transStart();
                $query = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$tgl_transaksi', '$keterangan', '$id_pegawai') returning id_jurnal";
                $id_jurnal = $this->db->query($query)->getRow()->id_jurnal;
                $this->db->transComplete();
            }

            if ($this->db->transStatus()) {
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $id_acc       = $data[$i]->id_acc;
                    $debit       = $data[$i]->debit;
                    $kredit       = $data[$i]->kredit;
                    $ket          = $data[$i]->ket;


                    $querydetail = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai, date_created) VALUES ('$id_jurnal', '$id_acc', '$ket', '$penerima','$nm_penerima', '$debit', '$kredit', '20', '$id_pegawai', '$tgl_transaksi')";

                    if ($this->db->simpleQuery($querydetail)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil Jurnal";
                        $output['x']        = $id_jurnal;
                        $output['xx']        = $id_gl;
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan Jurnal";
                    }
                }
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Jurnal";
                //$output['pesan']    = $this->db->error();
                // $output['x']        = '';
            }
        }
        $this->hasil($output);
    }


    public function list_keuanganTutupBulan()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tgl_transaksi']; */
        /* if ($this->evalParam($input, $listParam)) { */

            /* if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            } */

            $query = $this->db->query("SELECT a.*, u.nama FROM ac_bulan a INNER JOIN users u ON a.id_pegawai=u.id_user");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        /* } */

        echo json_encode($output);
    }

    public function SimpankeuanganTutupBulan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['bulan'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_pegawai  = $input->id_peg;
            $bulan  = $input->bulan;
            $tahun  = $input->tahun;
            $bulantahun =  $tahun."-".$bulan."-1";

            $ceks = $this->db->query("SELECT * FROM ac_bulan WHERE bulan = '$bulan' AND tahun = '$tahun'");


            if($ceks->getNumRows() > 0){
                $output['status']   = "sukses";
                $output['xx']    = "";
            } else{
                $cek    = "SELECT id_bulan FROM ac_bulan ORDER BY id_bulan DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $id_bulan   = $row->id_bulan;
                        $real   = ((int)$id_bulan + 1);
                        $idbulan = $real;
                    } else {
                        $idbulan = 1;
                    }
                }

                $id_bulan = $idbulan;
                $query = "INSERT INTO ac_bulan (id_bulan, bulan, tahun, id_pegawai) VALUES ('$id_bulan','$bulan', '$tahun', $id_pegawai)";
                if ($this->db->simpleQuery($query)){
                    $bulantahunlalu = date('d-m-Y', strtotime("-1 months", strtotime($bulantahun)));
                    $bulanlalu = date('m', strtotime($bulantahunlalu));
                    $tahunlalu = date('Y', strtotime($bulantahunlalu));

                    $cekxx    = $this->db->query("SELECT * FROM ac_bulan WHERE bulan = '$bulanlalu' AND tahun ='$tahunlalu'");

                    if ($cekxx->getNumRows() > 0) {
                        $kondisi = "LEFT JOIN ac_bulan C ON b.id_bulan = C.id_bulan 
                    WHERE
                    C.bulan = '$bulanlalu'
                    AND C.tahun = '$tahunlalu'";
                    } else {
                        $kondisi = '';
                    }

                    $querytutupbulan = "INSERT INTO ac_periode_bulan ( id_bulan, id_acc, awal_d, awal_k, trans_d, trans_k, ahir_d, ahir_k, id_pegawai ) SELECT '$id_bulan' AS id_bulan, x.id_acc, SUM(y.awal_d) AS awal_d, SUM(y.awal_k) AS awal_k, SUM(x.debit) AS debit, SUM(x.kredit) AS kredit, SUM(debit + y.awal_d) AS ahir_d, SUM(kredit + y.awal_k) AS ahir_k, '$id_pegawai' AS id_pegawai FROM ( SELECT * FROM ( SELECT A.id_acc, A.id_coa, A.coa, CASE WHEN b.date_created IS NULL THEN '$bulantahun' ELSE b.date_created END AS date_created, CASE WHEN SUM ( b.debit ) IS NULL THEN 0 ELSE SUM ( b.debit ) END AS debit, CASE WHEN SUM ( b.kredit ) IS NULL THEN 0 ELSE SUM ( b.kredit ) END AS kredit FROM account A LEFT JOIN (SELECT * FROM ac_jurnal_detail WHERE EXTRACT ( MONTH FROM date_created ) = '$bulan' AND EXTRACT ( YEAR FROM date_created ) = '$tahun') b ON A.id_acc = b.id_acc GROUP BY A.id_coa, A.coa, A.id_acc, b.date_created ) q WHERE EXTRACT ( MONTH FROM q.date_created ) = '$bulan' AND EXTRACT ( YEAR FROM q.date_created ) = '$tahun' ) x INNER JOIN ( SELECT A.id_acc, CASE WHEN b.ahir_d IS NULL THEN 0 ELSE b.ahir_d END AS awal_d, CASE WHEN b.ahir_k IS NULL THEN 0 ELSE b.ahir_k END AS awal_k FROM account A LEFT JOIN ac_periode_bulan b ON A.id_acc = b.id_acc $kondisi ) y ON x.id_acc = y.id_acc GROUP BY x.id_acc, x.id_coa ORDER BY x.id_coa";

                    if ($this->db->simpleQuery($querytutupbulan)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil Jurnal";
                    } else {
                        $output['status']   = "sukses";
                        /* $output['pesan']    = "Gagal Simpan Jurnal"; */
                        $output['test']    = $this->db->error();
                    }
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "ID Gagal dibuat";
                }
            }
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "ID Gagal dibuat";
            //$output['pesan']    = $this->db->error();
            // $output['x']        = '';
        }
        $this->hasil($output);
    }

    public function keuanganTutupBulan_hapus()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_bulan'];
        if ($this->evalParam($input, $listParam)) {
            $id_bulan        = $input->id_bulan;


            $query = $this->db->query("DELETE FROM ac_bulan WHERE id_bulan = '$id_bulan'");
            $this->db->query("DELETE FROM ac_periode_bulan WHERE id_bulan = '$id_bulan'");

            if ($query) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                // $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = '';
                // $output['data']     = $query->getResult();
            }
        }

        echo json_encode($output);
    }

    public function list_keuanganNeraca()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['bulan', 'tahun'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            if($input->bulan == 1){
                $newbulan = '12';
                $newtahun = $input->tahun - 1;
            }else{
                $newbulan = $input->bulan - 1;
                $newtahun = $input->tahun;
            }


            // $query = $this->db->query("SELECT a.id_coa, a.coa, b.*, c.bulan,c.tahun FROM account a INNER JOIN ac_periode_bulan b ON a.id_acc=b.id_acc INNER JOIN ac_bulan c ON b.id_bulan=c.id_bulan WHERE a.parent IN ('1','2','3') AND  a.level = '5' ORDER BY a.id_coa");

            $query = $this->db->query("SELECT z.*, z.awald + z.transd AS ahird, z.awalk + z.transk AS ahirk FROM ( SELECT ac.id_acc, ac.id_coa, ac.coa, CASE WHEN x.awald IS NULL THEN '0' ELSE x.awald END AS awald, CASE WHEN x.awalk IS NULL THEN '0' ELSE x.awalk  END AS awalk, CASE WHEN y.transd IS NULL THEN '0' ELSE y.transd  END AS transd, CASE WHEN y.transk IS NULL THEN '0' ELSE y.transk END AS transk FROM account ac LEFT JOIN ( SELECT id_acc, SUM ( debit ) AS awald, SUM ( kredit ) AS awalk FROM ac_jurnal_detail  WHERE EXTRACT ( MONTH FROM date_created ) BETWEEN '01'  AND '$newbulan' AND EXTRACT ( YEAR FROM date_created ) BETWEEN '2000'  AND '$newtahun' GROUP BY id_acc) x ON ac.id_acc = x.id_acc LEFT JOIN ( SELECT id_acc, SUM ( debit ) AS transd, SUM ( kredit ) AS transk FROM ac_jurnal_detail  WHERE EXTRACT ( MONTH FROM date_created ) = '$input->bulan'  AND EXTRACT ( YEAR FROM date_created ) = '$input->tahun'  GROUP BY id_acc) y ON ac.id_acc = y.id_acc WHERE ac.parent IN ( '1', '2', '3' ) AND LEVEL = '5') z ORDER BY z.id_coa");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        }

        $this->hasil($output);

    }

    public function printlist_keuanganNeraca()
    {
        $input = json_decode(file_get_contents('php://input'));
        $bulan   = $_POST['bulan'];
        $tahun = $_POST['tahun'];

        if($bulan == 1){
            $newbulan = '12';
            $newtahun = $tahun - 1;
        }else{
            $newbulan = $bulan - 1;
            $newtahun = $tahun;
        }


        // $query = $this->db->query("SELECT a.id_coa, a.coa, b.*, c.bulan,c.tahun FROM account a INNER JOIN ac_periode_bulan b ON a.id_acc=b.id_acc INNER JOIN ac_bulan c ON b.id_bulan=c.id_bulan WHERE a.parent IN ('1','2','3') AND  a.level = '5' ORDER BY a.id_coa");

        $data['neraca'] = $this->db->query("SELECT z.*, z.awald + z.transd AS ahird, z.awalk + z.transk AS ahirk FROM ( SELECT ac.id_acc, ac.id_coa, ac.coa, CASE WHEN x.awald IS NULL THEN '0' ELSE x.awald END AS awald, CASE WHEN x.awalk IS NULL THEN '0' ELSE x.awalk  END AS awalk, CASE WHEN y.transd IS NULL THEN '0' ELSE y.transd  END AS transd, CASE WHEN y.transk IS NULL THEN '0' ELSE y.transk END AS transk FROM account ac LEFT JOIN ( SELECT id_acc, SUM ( debit ) AS awald, SUM ( kredit ) AS awalk FROM ac_jurnal_detail  WHERE EXTRACT ( MONTH FROM date_created ) BETWEEN '01'  AND '$newbulan' AND EXTRACT ( YEAR FROM date_created ) BETWEEN '2000'  AND '$newtahun' GROUP BY id_acc) x ON ac.id_acc = x.id_acc LEFT JOIN ( SELECT id_acc, SUM ( debit ) AS transd, SUM ( kredit ) AS transk FROM ac_jurnal_detail  WHERE EXTRACT ( MONTH FROM date_created ) = '$bulan'  AND EXTRACT ( YEAR FROM date_created ) = '$tahun'  GROUP BY id_acc) y ON ac.id_acc = y.id_acc WHERE ac.parent IN ( '1', '2', '3' ) AND LEVEL = '5') z ORDER BY z.id_coa")->getResult();

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

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

        $html = view('view/keuangan/keuanganNeracaprint', $data);


        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan_Neraca_".$bulan."-".$tahun." .pdf", 'I');
        exit;

    }

    public function list_keuanganLabaRugi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['bulan', 'tahun'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            // $output['status']   = "gagal";
            // $output['pesan']    = "";

            $querycek = $this->db->query("SELECT id_bulan FROM ac_bulan WHERE bulan = '$input->bulan' and tahun = '$input->tahun'");
            if ($querycek->getNumRows() > 0) {
                $id_bulan = $querycek->getRow('id_bulan');

                $querysum = $this->db->query("SELECT SUM(trans_d) AS debit, SUM(trans_k) AS kredit FROM ac_periode_bulan b INNER JOIN account ac ON b.id_acc=ac.id_acc WHERE id_bulan = '$id_bulan' AND parent IN ('4', '5', '6','7')");

                $query = $this->db->query("SELECT ac.id_coa, CASE 
	WHEN ac.coa IS NULL AND y.induk IS NOT NULL THEN
		'JUMLAH'
	WHEN ac.coa IS NULL AND y.induk IS NULL THEN
		'Laba / Rugi'
		ELSE
		ac.coa
END AS coa
, b.trans_d, b.trans_k, y.jumlah, y.induk, ac.normal, ac.level FROM account ac INNER JOIN (SELECT * FROM ac_periode_bulan WHERE id_bulan = '$id_bulan') b ON ac.id_acc=b.id_acc RIGHT JOIN 
(SELECT x.id_coa, SUM(a.trans_k-a.trans_d) AS jumlah, x.induk  FROM ac_periode_bulan a INNER JOIN 

(SELECT id_coa, id_acc, SUBSTR(id_coa, 1,2) AS induk FROM account WHERE SUBSTR(id_coa, 1,2) IN (
SELECT id_coa FROM account WHERE  parent IN ('4', '5', '6', '7', '8')) ORDER BY id_coa ASC) x ON a.id_acc=x.id_acc WHERE a.id_bulan = '$id_bulan' GROUP BY ROLLUP (induk, x.id_coa)) y ON ac.id_coa=y.id_coa WHERE CHAR_LENGTH(induk) > 1 OR ac.id_acc IS NOT NULL AND b.id_bulan = '$id_bulan' OR induk IS NULL ORDER BY induk, ac.id_coa  ASC");
            }

            
            
            // $output['status']   = "sukses";
            // $output['data']     = $querycek;

            // $query = $this->db->query($test); 
            if ($querycek->getNumRows() > 0 ) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
                $output['debitkredit']     = $querysum->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                // $output['debitkredit']     = $querysum->getResult();
                // $output['data']     = $query->getResult();
            }

        }

        $this->hasil($output);

    }

    public function printlist_keuanganLabaRugi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $bulan   = $_POST['bulan'];
        $tahun = $_POST['tahun'];

        $querycek = $this->db->query("SELECT id_bulan FROM ac_bulan WHERE bulan = '$bulan' and tahun = '$tahun'");

        $id_bulan = $querycek->getRow('id_bulan');

        $querysum = $this->db->query("SELECT SUM(trans_d) AS debit, SUM(trans_k) AS kredit FROM ac_periode_bulan b INNER JOIN account ac ON b.id_acc=ac.id_acc WHERE id_bulan = '$id_bulan' AND parent IN ('4', '5', '6','7')");

        $data['labarugi'] = $this->db->query("SELECT ac.id_coa, CASE 
	WHEN ac.coa IS NULL AND y.induk IS NOT NULL THEN
		'JUMLAH'
	WHEN ac.coa IS NULL AND y.induk IS NULL THEN
		'Laba / Rugi'
		ELSE
		ac.coa
END AS coa
, b.trans_d, b.trans_k, y.jumlah, y.induk, ac.normal, ac.level FROM account ac INNER JOIN ac_periode_bulan b ON ac.id_acc=b.id_acc RIGHT JOIN 
(SELECT x.id_coa, SUM(a.trans_k-a.trans_d) AS jumlah, x.induk  FROM ac_periode_bulan a INNER JOIN 

(SELECT id_coa, id_acc, SUBSTR(id_coa, 1,2) AS induk FROM account WHERE SUBSTR(id_coa, 1,2) IN (
SELECT id_coa FROM account WHERE  parent IN ('4', '5', '6', '7', '8')) ORDER BY id_coa ASC) x ON a.id_acc=x.id_acc WHERE a.id_bulan = '$id_bulan' GROUP BY ROLLUP (induk, x.id_coa)) y ON ac.id_coa=y.id_coa WHERE CHAR_LENGTH(induk) > 1 OR ac.id_acc IS NOT NULL AND b.id_bulan = '$id_bulan' OR induk IS NULL ORDER BY induk, ac.id_coa  ASC")->getResult();


        // $query = $this->db->query("SELECT a.id_coa, a.coa, b.*, c.bulan,c.tahun FROM account a INNER JOIN ac_periode_bulan b ON a.id_acc=b.id_acc INNER JOIN ac_bulan c ON b.id_bulan=c.id_bulan WHERE a.parent IN ('1','2','3') AND  a.level = '5' ORDER BY a.id_coa");

        /* $data['labarugi'] = $this->db->query("SELECT a.id_coa, a.coa, a.level, b.*, c.bulan,c.tahun FROM account a INNER JOIN ac_periode_bulan b ON a.id_acc=b.id_acc INNER JOIN ac_bulan c ON b.id_bulan=c.id_bulan WHERE a.parent IN ('4', '5', '6', '7', '8') AND c.bulan = '$bulan' AND c.tahun = '$tahun'  ORDER BY a.id_coa")->getResult(); */

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

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

        $html = view('view/keuangan/keuanganLabaRugiprint', $data);


        $mpdf->WriteHTML($html);
        $mpdf->Output("Laporan_Neraca_" . $bulan . "-" . $tahun . " .pdf", 'I');
        exit;
    }

    public function list_penerimaKaryawan()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tgl_transaksi']; */
        /* if ($this->evalParam($input, $listParam)) { */

        /* if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            } */

        $query = $this->db->query("SELECT * FROM pegawai");

        if ($query->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $query->getResult();
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['code'] = 'XX';
            $output['data']     = $query->getResult();
        }
        /* } */

        $this->hasil($output);
    }

    public function list_keuanganKasBank()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['jenistrans'];
        if ($this->evalParam($input, $listParam)) {
            $checkedtgl = $input->checkedtgl;
            $tgl_transaksi = $input->tgl_transaksi;
            $tgl_transaksisd = $input->tgl_transaksisd;
            $jenistrans = $input->jenistrans;
            $kasBank = $input->kasBank;

            if ($checkedtgl == true) {
                $kondisiku = "AND y.tgl_jurnal BETWEEN '$tgl_transaksi' AND '$tgl_transaksisd'";
            } else {
                $kondisiku = "";
            }

            if($kasBank == '' || $kasBank == '0'){
                $kondisi1 = "";
            }else{
                $kondisi1 = "AND x.id_acc = '$kasBank'";
            }

            if($jenistrans == '0'){
                $kondisi2 = "";
            }else{
                $kondisi2 = "AND id_gl LIKE '$jenistrans%'";
            }
            $query = $this->db->query("SELECT *  FROM ac_kas x INNER JOIN ( SELECT a.id_gl, SUBSTRING(id_gl, 1,2) as jenis, SUBSTRING(id_gl, 4) as id, a.tgl_jurnal, a.keterangan, b.penerima, b.nm_penerima, CASE WHEN id_gl LIKE'KM%' THEN debit  WHEN id_gl LIKE'KL%' THEN kredit  END AS jml, id_acc  FROM ac_jurnal a INNER JOIN ac_jurnal_detail b ON a.id_jurnal = b.id_jurnal  WHERE id_gl LIKE'KM%'  OR id_gl LIKE'KL%'  ) y ON x.id_acc = y.id_acc INNER JOIN ac_penerima p ON y.penerima::int=p.id_penerima WHERE jml != '0' $kondisiku $kondisi1 $kondisi2 ");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
            }

            $this->hasil($output);
    }

    public function list_keuanganKasBank_detail()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_gl'];
        if ($this->evalParam($input, $listParam)) {
            $id_gl = $input->id_gl;
            $jns_TransaksiKasBank = $input->jns_TransaksiKasBank;

            if($jns_TransaksiKasBank == 'KM'){
                $kondisi1 = "b.debit = '0'";
                $kondisi2 = "b.kredit = '0'";
            }else{
                $kondisi1 = "b.kredit = '0'";
                $kondisi2 = "b.debit = '0'";
            }
            

            $query = $this->db->query("SELECT a.id_gl,a.tgl_jurnal, b.* FROM ac_jurnal a INNER JOIN ac_jurnal_detail b ON a.id_jurnal=b.id_jurnal WHERE a.id_gl = '$id_gl' AND $kondisi2");
            $querydetail = $this->db->query("SELECT b.*, c.coa, c.id_coa, CASE WHEN kas.kas_nama IS NULL THEN
		''
	ELSE
		kas.kas_nama
END AS kas_nama FROM ac_jurnal a INNER JOIN ac_jurnal_detail b ON a.id_jurnal=b.id_jurnal INNER JOIN account c ON b.id_acc=c.id_acc LEFT JOIN ac_kas kas ON c.id_acc=kas.id_acc WHERE a.id_gl = '$id_gl' AND $kondisi1");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
                $output['detail']     = $querydetail->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
            }

            $this->hasil($output);
    }

    public function SimpankeuanganKasBank()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $jenis_trans  = $input->jenis_trans;
            $idacc_kas  = $input->idacc_kas;
            $jmlkasall  = $input->jmlkasall;
            $jmlkas  = $input->jmlkas;
            $tgl_trans  = $input->tgl_trans;
            $keterangan  = $input->keterangan;
            $penerima  = $input->penerima;
            $nm_penerima  = $input->nm_penerima;
            /* $id_kas  = $input->id_kas;
            $id_gl  = $input->id_gl; */
            $id_pegawai  = $input->id_peg;

            if($jenis_trans == 'KM'){
                $kode_gl = 'KM-';
            }else{
                $kode_gl = 'KL-';
            }

            if ($input->id_gl != '') {
                $this->db->transStart();
                $id_gl  = $input->id_gl;
                $id_jurnal = $this->db->query("SELECT * FROM ac_jurnal WHERE id_gl = '$id_gl'")->getRow('id_jurnal');
                $this->db->simpleQuery("DELETE FROM ac_jurnal_detail WHERE id_jurnal = '$id_jurnal'");
                $query  = "UPDATE ac_jurnal SET
                            tgl_jurnal = '$tgl_trans',
                            id_pegawai = '$id_pegawai'
                            WHERE id_jurnal = '$id_jurnal'";
                $this->db->simpleQuery($query);
                $this->db-> transComplete();
            } else {
                $this->db->transStart();

                $cekgl    = "SELECT * FROM (SELECT SUBSTRING(id_gl, 4)::INT as id_gl FROM ac_jurnal WHERE id_gl LIKE '$kode_gl%') y ORDER BY y.id_gl DESC LIMIT 1";
                if ($this->db->simpleQuery($cekgl)) { //true
                    $cekx   = $this->db->query($cekgl)->getResult();
                    $row    = $this->db->query($cekgl)->getRow();
                    if (!empty($cekx)) {
                        $id_gl   = $row->id_gl;
                        $real   = ((int)$id_gl + 1);
                        $idgl = $real;
                    } else {
                        $idgl = 1;
                    }
                }
                $id_gl = $idgl;

                $query = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('" . $kode_gl . $id_gl . "', '$tgl_trans', '$keterangan', '$id_pegawai') returning id_jurnal";
                $id_jurnal = $this->db->query($query)->getRow()->id_jurnal;
                $this->db->transComplete();
            }

            if ($this->db->transStatus()) {
                if ($jenis_trans == 'KM') {
                    $querykas = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$idacc_kas', '$keterangan', '5','PERUSAHAAN', '$jmlkas', '0', '20', '$id_pegawai')";
                    $updatekas = "UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') + $jmlkas WHERE id_acc = '$idacc_kas'";
                } else {
                    $querykas = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$idacc_kas', '$keterangan', '5','PERUSAHAAN', '0', '$jmlkas', '20', '$id_pegawai')";
                    $updatekas = "UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$idacc_kas') - $jmlkas WHERE id_acc = '$idacc_kas'";
                }
                $this->db->simpleQuery($querykas);
                $this->db->simpleQuery($updatekas);
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $id_acc       = $data[$i]->id_acc;
                    $jml       = $data[$i]->jmltrans_kas;
                    $ket          = $data[$i]->ket;

                    if ($jenis_trans == 'KM') {
                        $querydetail = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$id_acc', '$ket', '5','PERUSAHAAN', '0', '$jml', '20', '$id_pegawai')";
                        $updatesaldo = "UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$id_acc') - $jml WHERE id_acc = '$id_acc'";
                    } else {
                        $querydetail = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$id_acc', '$ket', '5','PERUSAHAAN', '$jml', '0', '20', '$id_pegawai')";
                        $updatesaldo = "UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$id_acc') + $jml WHERE id_acc = '$id_acc'";
                    }
                    if ($this->db->simpleQuery($querydetail) && $this->db->simpleQuery($updatesaldo)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil Kas";
                        $output['x']        = $id_jurnal;
                        $output['xx']        = $kode_gl . $id_gl;
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan Kas";
                    }
                }
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Kas";
                //$output['pesan']    = $this->db->error();
                // $output['x']        = '';
            }
        }
        $this->hasil($output);
    }


    public function list_keuanganAP()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['carivendor'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = $this->db->query("SELECT y.kode_vendor, y.nama, SUM(debit) AS debit, SUM(kredit) AS kredit, b.id_acc FROM ac_jurnal_detail a INNER JOIN account b ON a.id_acc=b.id_acc INNER JOIN 
            (SELECT gud.id_jurnal, ven.nama, CONCAT('F', gud.kd_vendor) AS kode_vendor FROM gud_obat_in gud INNER JOIN far_vendor ven ON gud.kd_vendor=ven.kd_vendor
            UNION
            SELECT p.id_jurnal, s.nama_supplier, CONCAT('L', s.id_supplier_logistik) AS kode_vendor FROM logistik_pembelian p INNER JOIN logistik_supplier s ON p.supplier=s.id_supplier_logistik
						UNION ALL
						SELECT id_jurnal_debit AS id_jurnal, nama, kd_vendor AS kode_vendor FROM ac_apbayar ap INNER JOIN 
						(SELECT CONCAT('F',kd_vendor) as kd_vendor, nama FROM far_vendor
						UNION ALL
						SELECT CONCAT('L',id_supplier_logistik) as kd_vendor, nama_supplier as nama FROM logistik_supplier) x ON ap.kode_vendor=x.kd_vendor GROUP BY id_jurnal_debit, x.nama, x.kd_vendor
						) y ON a.id_jurnal=y.id_jurnal WHERE b.id_coa LIKE '2%' AND y.nama LIKE '$input->carivendor%' GROUP BY y.nama, y.kode_vendor, b.id_acc");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        }

        $this->hasil($output);
    }

    public function list_keuanganAPdetail()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['kode_vendor'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            if($input->filterTgl != ''){
                $kondisi = "AND a.date_created = '$input->filterTgl'";
            }else{
                $kondisi = "";
            }


            $query = $this->db->query("SELECT y.id_beli, y.nama, y.kode_fak, b.coa,b.id_coa, a.*, peg.nama as nama_pegawai FROM ac_jurnal_detail a INNER JOIN account b ON a.id_acc=b.id_acc INNER JOIN 
            (SELECT gud.no_obat_in::INT AS id_beli, gud.id_jurnal, ven.nama, CONCAT('F', gud.kd_vendor) AS kode_vendor, remark AS kode_fak FROM gud_obat_in gud INNER JOIN far_vendor ven ON gud.kd_vendor=ven.kd_vendor
            UNION ALL
            SELECT p.id_pembelian_logistik::INT AS id_beli, p.id_jurnal, s.nama_supplier, CONCAT('L', s.id_supplier_logistik) AS kode_vendor, p.no_faktur AS kode_fak FROM logistik_pembelian p INNER JOIN logistik_supplier s ON p.supplier=s.id_supplier_logistik) y ON a.id_jurnal=y.id_jurnal INNER JOIN users peg ON a.id_pegawai=peg.id_user LEFT JOIN ac_apbayar ap ON y.id_jurnal=ap.id_jurnal_kredit WHERE b.id_coa LIKE '2%' AND ap.id_ac_apbayar IS NULL AND y.kode_vendor = '$input->kode_vendor' $kondisi");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }   
        }

        $this->hasil($output);
    }
    public function listReturn_keuanganAP()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['kode_vendor'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $kode_vendor = SUBSTR($input->kode_vendor, 1);

            $query = $this->db->query("SELECT no_ret, total AS total_return FROM gud_obat_ret a LEFT JOIN ac_apret b ON a.no_ret=b.id_ret WHERE kd_vendor = '$kode_vendor' AND posting = 'true' AND id_ret IS NULL");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            }   
        }

        $this->hasil($output);
    }


    public function list_keuanganAPRwtByr()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['kode_vendor'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";


            $query = $this->db->query("SELECT ac.*, ven.nama, k.kas_nama, u.nama AS nama_peg FROM ac_apbayar ac INNER JOIN 

(SELECT CONCAT('F',kd_vendor) as kd_vendor, nama FROM far_vendor
UNION ALL
SELECT CONCAT('L',id_supplier_logistik) as kd_vendor, nama_supplier as nama FROM logistik_supplier) ven
ON ac.kode_vendor=ven.kd_vendor INNER JOIN ac_kas k ON ac.id_acc_kas=k.id_acc INNER JOIN users u ON ac.id_user=u.id_user WHERE ven.kd_vendor = '$input->kode_vendor'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }   
        }

        $this->hasil($output);
    }

    public function SimpanModKeuanganAP()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $kode_vendor  = $input->kode_vendor;
            $kas_bank  = $input->kas_bank;
            $tgl_trans  = $input->tgl_trans;
            $jenis_penerima  = $input->jenis_penerima;
            $total_jumlah  = $input->total_jumlah;
            $penerima  = $input->penerima;
            $ket  = $input->ket;
            $id_user  = $input->id_user;
            $idAcc_ap  = $input->idAcc_ap;
            $kode_gl = "KL-";

            $flagkode = SUBSTR($kode_vendor, 0, 1);
            
            $this->db->transStart();

            $cekgl    = "SELECT * FROM (SELECT SUBSTRING(id_gl, 4)::INT as id_gl FROM ac_jurnal WHERE id_gl LIKE '$kode_gl%') y ORDER BY y.id_gl DESC LIMIT 1";
            if ($this->db->simpleQuery($cekgl)) { //true
                $cekx   = $this->db->query($cekgl)->getResult();
                $row    = $this->db->query($cekgl)->getRow();
                if (!empty($cekx)) {
                    $id_gl   = $row->id_gl;
                    $real   = ((int)$id_gl + 1);
                    $idgl = $real;
                } else {
                    $idgl = 1;
                }
            }
            $id_gl = $idgl;

            $query = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('" . $kode_gl . $id_gl . "', '$tgl_trans', '$ket', '$id_user') returning id_jurnal";
            $id_jurnal = $this->db->query($query)->getRow()->id_jurnal;
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $querykas = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$kas_bank', '$ket', '$jenis_penerima','$penerima', '0', '$total_jumlah', '20', '$id_user')";
                $queryhutang = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$idAcc_ap', '$ket', '$jenis_penerima','$penerima', '$total_jumlah', '0', '20', '$id_user')";
                $updatekas = "UPDATE ac_kas SET jumlah = (SELECT jumlah FROM ac_kas WHERE id_acc = '$kas_bank') - $total_jumlah WHERE id_acc = '$kas_bank'";
                
                $this->db->simpleQuery($querykas);
                $this->db->simpleQuery($updatekas);
                $this->db->simpleQuery($queryhutang);
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $data_id_jurnal       = $data[$i]->id_jurnal;
                    $jml       = $data[$i]->jml;
                    $id_beli       = $data[$i]->id_beli;
                    
                    $querydetail = "INSERT INTO ac_apbayar (id_jurnal_kredit, kode_vendor, tgl_bayar, jml,id_acc_kas, id_jurnal_debit, id_user, ket) VALUES('$data_id_jurnal', '$kode_vendor', '$tgl_trans', '$jml', '$kas_bank', '$id_jurnal', '$id_user', '$ket')";
                    

                    $updateobat = "UPDATE gud_obat_in SET bayar = 'true' WHERE no_obat_in = '$id_beli'";
                    if($flagkode == 'F'){
                        $this->db->simpleQuery($updateobat);
                    }
                    
                    if ($this->db->simpleQuery($querydetail)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil";

                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan";
                        // $output['pesan']    = $this->db->error();

                    }
                }

                if ($flagkode == 'F') {
                    $dataRet = $input->dataRet;
                    for ($i = 0; $i < $input->countRet; $i++) {
                        $no_ret       = $dataRet[$i]->no_ret;
                        $total_return       = $dataRet[$i]->total_return;

                        $queryRet = "INSERT INTO ac_apret (id_ret, jumlah) VALUES('$no_ret', '$total_return')";

                        if ($this->db->simpleQuery($queryRet)) {
                            $output['status']   = "sukses";
                            $output['pesan']    = "Simpan Berhasil";
                        } else {
                            $output['status']   = "gagal";
                            $output['pesan']    = "Gagal Simpan";
                            // $output['pesan']    = $this->db->error();
                        }
                    }
                }
                
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                //$output['pesan']    = $this->db->error();
                // $output['x']        = '';
            }
        }
        $this->hasil($output);
    }


    public function list_keuanganAR()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tgl_transaksi']; */
        /* if ($this->evalParam($input, $listParam)) { */

        /* if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            } */

        $query = $this->db->query("SELECT
	x.id_acc,
	b.coa,
	b.id_coa,
	x.FLAG,
	SUM ( debit ) AS debit,
	SUM ( kredit ) AS kredit 
FROM
	( SELECT CASE id_bayar WHEN '0' THEN '0' ELSE'1' END AS FLAG, id_acc, date_create, debit, kredit FROM ac_ar ) x
	INNER JOIN account b ON x.id_acc = b.id_acc 
GROUP BY
	x.id_acc,
	b.coa,
	b.id_coa,
	x.FLAG");

        if ($query->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $query->getResult();
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['code'] = 'XX';
            $output['data']     = $query->getResult();
        }
        /* } */

        $this->hasil($output);
    }

    public function keuanganARListPiutangPendapatan()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tgl_transaksi']; */
        /* if ($this->evalParam($input, $listParam)) { */

        /* if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            } */

        $query = $this->db->query("SELECT * FROM pembayaran WHERE id_jenis_pembayaran = '2'");

        if ($query->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $query->getResult();
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['code'] = 'XX';
            $output['data']     = $query->getResult();
        }
        /* } */

        $this->hasil($output);
    }

    public function list_modkeuanganAR()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_acc'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            /* if (($jml == '') || ($jml == '0')) {
                    $kondisi = '';
                } else {
                    $kondisi = "LIMIT '" . $jml . "'";
                } */

            $query = $this->db->query("SELECT * from ac_ar ar INNER JOIN account ac ON ar.id_ac=ac.id_acc WHERE id_ac='$input->id_acc'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        }

        $this->hasil($output);
    }

    public function list_modKeuanganARpiutang()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_pembayaran'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            /* if (($jml == '') || ($jml == '0')) {
                    $kondisi = '';
                } else {
                    $kondisi = "LIMIT '" . $jml . "'";
                } */

            $query = $this->db->query("SELECT ar.* FROM ac_ar ar INNER JOIN bayar b ON ar.id_bayar=b.id_bayar WHERE b.id_pembayaran = '$input->id_pembayaran'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        }

        $this->hasil($output);
    }

    public function list_keuanganBukuBesar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_coa'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            /* if (($jml == '') || ($jml == '0')) {
                    $kondisi = '';
                } else {
                    $kondisi = "LIMIT '" . $jml . "'";
                } */
            $tgl = date('Y-m-d', strtotime('-1 day', strtotime($input->tgl_transaksi)));

            $query = $this->db->query("SELECT a.id_acc, CASE b.normal WHEN 'DEBET' THEN SUM ( a.debit - a.kredit ) ELSE SUM ( a.kredit - a.debit ) END AS sumsaldo FROM ac_jurnal_detail a INNER JOIN account b ON a.id_acc = b.id_acc WHERE a.id_acc = '$input->id_coa' AND date_created BETWEEN '2000-01-01' AND '$tgl' GROUP BY a.id_acc, b.normal");

            $data = $this->db->query("SELECT b.id_gl, a.* FROM ac_jurnal_detail a INNER JOIN ac_jurnal b ON a.id_jurnal=b.id_jurnal WHERE id_acc = '$input->id_coa' AND date_created BETWEEN '$input->tgl_transaksi' AND '$input->tgl_transaksisd' ORDER BY date_created");

            /* if ($query->getNumRows() > 0) { */
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = '';  
                $output['saldoawal']     = $query->getResult();
                $output['data']     = $data->getResult();
            /* } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';  
                $output['saldoawal']     = $query->getResult();
                $output['data']     = $query->getResult();
            } */
        }

        $this->hasil($output);
    }


    public function CetakKasKeluar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $cek_id_gl       = $_POST['id_gl'];

        if($cek_id_gl == ''){
            $id_jurnal = $_POST['id_jurnal'];
            $id_gl = $this->db->query("SELECT * FROM ac_jurnal WHERE id_jurnal = '$id_jurnal'")->getRow('id_gl');
        }else{
            $id_gl       = $_POST['id_gl'];
        }
        $data['nama']       = $_POST['nama'];
        $data['ket']       = $_POST['ket'];
        $data['penerima']       = $_POST['penerima'];
        $data['tgl']       = $_POST['tgl'];
        $data['kasbank']       = $_POST['kasbank'];
        $data['jumlah']       = $_POST['jumlah'];


        $data['datadetail'] = $this->db->query("SELECT b.*, c.coa, c.id_coa, CASE WHEN kas.kas_nama IS NULL THEN '' ELSE kas.kas_nama END AS kas_nama FROM ac_jurnal a INNER JOIN ac_jurnal_detail b ON a.id_jurnal=b.id_jurnal INNER JOIN account c ON b.id_acc=c.id_acc LEFT JOIN ac_kas kas ON c.id_acc=kas.id_acc WHERE a.id_gl = '$id_gl' AND b.kredit = '0'")->getResult();

        $html = view('view/keuangan/print/cetakkaskeluar',$data);

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
        $mpdf->Output("Bukti Pengeluaran Kas ID-GL: ". $id_gl." | ". date('d-m-Y', strtotime($_POST['tgl'])).".pdf", 'I');
        exit;
    }
}
