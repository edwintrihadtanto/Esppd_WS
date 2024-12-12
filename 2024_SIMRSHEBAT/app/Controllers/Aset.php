<?php

namespace App\Controllers;

class Aset extends Api
{

    public function modpenerimaanAset()
    {
        return view('view/modal/logistik/modpenerimaanAset');
    }

    public function modtransferAset()
    {
        return view('view/modal/logistik/modtransferAset');
    }

    public function modjualAset()
    {
        return view('view/modal/logistik/modjualAset');
    }

    public function modpenerimaanAsetListAccount()
    {
        return view('view/modal/logistik/modpenerimaanAsetListAccount');
    }

    public function modlistAsetJualAset()
    {
        return view('view/modal/logistik/mod_listAsetJualAset');
    }

    public function getAsetList()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $data = $this->db->query("SELECT a.*, g.nama_gudang FROM aset_barang a INNER JOIN gudang_unit g ON a.id_gudang_unit=g.id_gudang_unit ORDER BY a.nama_aset ASC");

        if ($data->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Barang ditemukan
            $output['data']     = $data->getResult();
            $output['X']        = "";
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "Barang tidak ditemukan";
            $output['X']        = "X";

        }

        $this->hasil($output);
    }

    public function getGudangUnit()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_gudang_unit',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) { */
            $data = $this->db->query("SELECT * FROM gudang_unit");


            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }
        /* } */

        $this->hasil($output);
    }

    public function getKas()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kascari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            if ($input->kascari == '') {
                $kondisi = '';
            } else {
                $kondisi = "WHERE a.kas_nama like upper('" . $input->kascari . "%')";
            } */
            $data = $this->db->query("SELECT * FROM ac_kas a INNER JOIN account b ON a.id_acc=b.id_acc ORDER BY a.id_kas ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Kas Bank tidak ditemukan";
            }
        /* } */

        $this->hasil($output);
    }

    public function getSupllierLogistik()
    {
        $data           = $this->db->query("SELECT * FROM logistik_supplier");
        $output['status']   = 'sukses';
        $output['data']     = $data->getResult();
        echo json_encode($output);
    }

    public function list_penerimaanAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'jmlh'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $jml = $input->jmlh;
            $tglbeli = $input->tglbeli;
            $tglbelisd = $input->tglbelisd;
            $checkedtgl        = $input->checkedtgl;

            if ($checkedtgl == true) {
                $kondisiku = "WHERE a.tgl_beli BETWEEN '$tglbeli' AND '$tglbelisd'";
            } else {
                $kondisiku = "";
            }
            if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            }
            
            $query = $this->db->query("SELECT a.*, g.nama_gudang, s.nama_supplier, ac.id_jurnal FROM aset_barang a INNER JOIN gudang_unit g ON a.id_gudang_unit=g.id_gudang_unit INNER JOIN logistik_supplier s ON a.id_supplier=s.id_supplier_logistik LEFT JOIN ac_jurnal ac ON a.id_gl=ac.id_gl $kondisiku ORDER BY a.id_barang_aset ASC $kondisi");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $query->getResult();
                /* $output['datadetail']     = $datadetail->getResult(); */
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $query->getResult();
            }
        }

        $this->hasil($output);
    }

    public function list_penerimaanAsetdetail()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_barang_asetPaset',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $id_barang_asetPaset = $input->id_barang_asetPaset;
            
            $query = $this->db->query("SELECT a.harga_beli-(SELECT SUM(jumlah) as jumlah FROM aset_bayar WHERE id_aset = ' $id_barang_asetPaset') AS sisa_bayar, a.*, g.nama_gudang, s.nama_supplier, fixed.coa AS coa_fixed, akm.coa AS coa_akm, beban.coa AS coa_beban FROM aset_barang a INNER JOIN gudang_unit g ON a.id_gudang_unit=g.id_gudang_unit INNER JOIN logistik_supplier s ON a.id_supplier=s.id_supplier_logistik INNER JOIN account fixed ON a.id_coa_fixed=fixed.id_acc INNER JOIN account akm ON a.id_coa_akm=akm.id_acc INNER JOIN account beban ON a.id_coa_fixed=beban.id_acc WHERE a.id_barang_aset = ' $id_barang_asetPaset'");

            if ($query->getNumRows() > 0) {
                $id_gl = $query->getRow()->id_gl;

                $id_jurnal = $this->db->query("SELECT * FROM ac_jurnal WHERE id_gl = '$id_gl'");

                if ($id_jurnal->getNumRows() > 0) {
                    $output['status']   = "sukses";
                    $output['pesan']    = ""; //Barang ditemukan
                    $output['data']     = $query->getResult();
                    $output['id_jurnal']     = $id_jurnal->getRow()->id_jurnal;
                }else{
                    $output['status']   = "sukses";
                    $output['pesan']    = ""; //Barang ditemukan
                    $output['data']     = $query->getResult();
                    $output['id_jurnal']     = '';
                }
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['id_jurnal']     = '';
                $output['data']     = $query->getResult();
            }
        }

        $this->hasil($output);
    }

    public function getMetodeaset()
    {
        $data           = $this->db->query("SELECT * FROM aset_metode_penyusutan");
        $output['status']   = 'sukses';
        $output['data']     = $data->getResult();
        echo json_encode($output);
    }

    public function getTipefiscal()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'idMetodeaset'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM aset_tipe_fiscal WHERE id_metode_penyusutan = '$input->idMetodeaset' ORDER BY nama");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            }
        }

        $this->hasil($output);
    }

    public function getTipeaset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'idTipefiscal'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $datatarif = $this->db->query("SELECT * FROM aset_tipe_fiscal WHERE id_fiscal = '$input->idTipefiscal'");
            $data = $this->db->query("SELECT * FROM aset_tipe_aset WHERE id_fiscal = '$input->idTipefiscal' ORDER BY nama_tipe_aset");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
                $output['datatarif']     = $datatarif->getResult();
            } else {
                $output['pesan']    = "Tipe Aset tidak ditemukan";
            }
        }

        $this->hasil($output);
    }
    

    public function getAccount_pAset()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_gudang_unit',
        ]; */
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        /* if ($this->evalParam($input, $listParam)) { */
            $data = $this->db->query("SELECT * FROM account");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }
        /* } */

        $this->hasil($output);
    }
    
    
    public function SimpanPenerimaanAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['noFaktur','namaBarang','tglBeli','tglPakai','tglAkhirsusut','asetBulan','asetTahun','hargaBeli','nilaiAset','asetBerwujud','penghitungSusut','statusAset','gudangAset','supplierAset','metodePenyusutan','tipeFiscal','tipeAset','masaManfaat','tarifPenyusutan','coaFixed','coaAkm','coaBeban','asetKet'];

        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "OOOOO Tidak Bisa";

            $id_gl = $input->id_gl;
            $id_aset = $input->id_aset;
            $no_faktur = $input->noFaktur;
            $nama_aset = $input->namaBarang;
            $tgl_beli = $input->tglBeli;
            $tgl_pakai = $input->tglPakai;
            $tgl_akhir_susut = $input->tglAkhirsusut;
            $aset_bulan = $input->asetBulan;
            $aset_tahun = $input->asetTahun;
            $harga_beli = $input->hargaBeli;
            $nilai_aset = $input->nilaiAset;
            $aset_berwujud = $input->asetBerwujud;
            $penghitung_susut = $input->penghitungSusut;
            $status = $input->statusAset;
            $id_gudang_unit = $input->gudangAset;
            $id_supplier = $input->supplierAset;
            $metode_penyusutan = $input->metodePenyusutan;
            $id_tipe_fiscal = $input->tipeFiscal;
            $id_tipe_aset = $input->tipeAset;
            $masa_manfaat = $input->masaManfaat;
            $tarif_penyusutan = $input->tarifPenyusutan;
            $id_coa_fixed = $input->coaFixed;
            $id_coa_akm = $input->coaAkm;
            $id_coa_beban = $input->coaBeban;
            $ket = $input->asetKet;
            $no_aset = $input->noAset;

            if($id_aset == ''){
                $cek    = "SELECT SUBSTRING(id_gl, 4)::INT as id_gl FROM aset_barang ORDER BY id_gl DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $idgl   = $row->id_gl;
                        $real   = ((int)$idgl + 1);
                        $id_gl = $real;
                    } else {
                        $id_gl = 1;
                    }
                }

                $new_id_gl = "FA-" . $id_gl;

                $this->db->transStart();


                $query = "INSERT INTO aset_barang (nama_aset,no_faktur,tgl_beli,tgl_pakai,tgl_akhir_susut,id_gudang_unit,id_supplier,ket,id_gl,umur_bulan,umur_tahun,harga_beli,nilai_aset,aset_berwujud,hitung_susut,metode_susut,id_tipe_fiscal,id_tipe_aset,masa_manfaat,tarif_susut,id_coa_fixed,id_coa_akm,id_coa_beban,status, no_aset) VALUES ('$nama_aset','$no_faktur','$tgl_beli','$tgl_pakai','$tgl_akhir_susut','$id_gudang_unit','$id_supplier','$ket','$new_id_gl','$aset_bulan','$aset_tahun','$harga_beli','$nilai_aset','$aset_berwujud','$penghitung_susut','$metode_penyusutan','$id_tipe_fiscal','$id_tipe_aset','$masa_manfaat','$tarif_penyusutan','$id_coa_fixed','$id_coa_akm','$id_coa_beban','$status', '$no_aset') returning id_barang_aset";

                $id_barang_aset = $this->db->query($query)->getRow()->id_barang_aset;

                $this->db->transComplete();
            }else{
                $this->db->transStart();

                $query = "UPDATE aset_barang SET nama_aset = '$nama_aset', no_faktur = '$no_faktur', tgl_beli = '$tgl_beli', tgl_pakai = '$tgl_pakai', tgl_akhir_susut = '$tgl_akhir_susut', id_gudang_unit = '$id_gudang_unit', id_supplier = '$id_supplier', ket = '$ket', umur_bulan = '$aset_bulan', umur_tahun = '$aset_tahun', harga_beli = '$harga_beli', nilai_aset = '$nilai_aset', aset_berwujud = '$aset_berwujud', hitung_susut = '$penghitung_susut', metode_susut = '$metode_penyusutan', id_tipe_fiscal = '$id_tipe_fiscal', id_tipe_aset = '$id_tipe_aset', masa_manfaat = '$masa_manfaat', tarif_susut = '$tarif_penyusutan', id_coa_fixed = '$id_coa_fixed', id_coa_akm = '$id_coa_akm', id_coa_beban = '$id_coa_beban', no_aset = '$no_aset' WHERE id_barang_aset = '$id_aset'";

                $new_id_gl = $id_gl;
                $id_barang_aset = $id_aset;

                $this->db->query($query);

                $this->db->transComplete();

            }

            






            // $query = "INSERT INTO aset_barang (nama_aset,no_faktur,tgl_beli,tgl_pakai,tgl_akhir_susut,id_gudang_unit,id_supplier,ket,jenis_susut,total_jml,cicilan,sisa,id_gl,umur_bulan,umur_tahun,harga_beli,nilai_aset,aset_berwujud,hitung_susut,metode_susut,id_tipe_fiscal,id_tipe_aset,masa_manfaat,tarif_susut,id_coa_fixed,id_coa_akm,id_coa_beban,status) VALUES ($nama_aset','$no_faktur','$tgl_beli','$tgl_pakai','$tgl_akhir_susut','$id_gudang_unit','$id_supplier','$ket','$jenis_susut','$total_jml','$cicilan','$sisa','$id_gl','$aset_bulan','$aset_tahun','$harga_beli','$nilai_aset','$aset_berwujud','$penghitung_susut','$metode_penyusutan','$id_tipe_fiscal','$id_tipe_aset','$masa_manfaat','$tarif_penyusutan','$id_coa_fixed','$id_coa_akm','$id_coa_beban','$status')";


            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Simpan Berhasil Permintaan";
                $output['x']        = $new_id_gl;
                $output['xx']        = $id_barang_aset;
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Permintaan";
                $output['pesan']    = $this->db->error();
                $output['x']        = '';
                $output['xx']        = '';
            }
        }
        $this->hasil($output);
    }

    public function PostingPenerimaanAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_gl'];

        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "OOOOO Tidak Bisa";

            $id_gl = $input->id_gl;
            $hargaBeli = $input->hargaBeli;
            $id_aset = $input->id_aset;
            $tgl = date('Y-m-d');
            $keterangan = "Fixed Asset ID : ". $id_aset;
            $keterangan2 = "Hutang Usaha FA ID : ". $id_aset;
            $id_user = $input->id_user;
            $coaFixed = $input->coaFixed;
            $coaHutang = "94";

            $this->db->transStart();
            $query = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$tgl', '$keterangan', '$id_user') returning id_jurnal";
            $id_jurnal = $this->db->query($query)->getRow()->id_jurnal;

            $this->db->transComplete();


            if ($this->db->transStatus()) {
                $simpandebit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$coaFixed', '$keterangan', '5','', '$hargaBeli', '0', '20', '$id_user')";

                $simpankredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$coaHutang', '$keterangan2', '5','', '0', '$hargaBeli', '20', '$id_user')";

                if ($this->db->simpleQuery($simpandebit) && $this->db->simpleQuery($simpankredit)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Simpan Posting";
                    $output['x']        = $id_jurnal;
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Posting";
                    $output['x']        = '';
                }
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Permintaan";
                $output['pesan']    = $this->db->error();
                $output['x']        = '';
            }
        }
        $this->hasil($output);
    }

    public function getRiwayatBayarAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_aset'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT a.*, b.nama_aset, u.nama FROM aset_bayar a INNER JOIN aset_barang b ON a.id_aset=b.id_barang_aset INNER JOIN ac_jurnal ac ON a.id_gl=ac.id_gl INNER JOIN users u ON ac.id_pegawai=u.id_user WHERE a.id_aset = '$input->id_aset'");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
                $output['code']     = '';
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code']     = 'XX';
            }
        }

        $this->hasil($output);
    }

    public function SimpanBayarPenerimaanAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['idAset'];

        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "OOOOO Tidak Bisa";

            $idAset = $input->idAset;
            $tglbayarAset = $input->tglbayarAset;
            $kasbayarAset = $input->kasbayarAset;
            $jmlbayarAset = $input->jmlbayarAset;
            $nocekAset = $input->nocekAset;
            $tglcekAset = $input->tglcekAset;
            $tipebayarAset = $input->tipebayarAset;
            $ketAset = $input->ketAset;
            $id_user = $input->id_user;
            $id_acchutang = '94';

            $cekgl    = "SELECT * FROM (SELECT SUBSTRING(id_gl, 4)::INT as id_gl FROM ac_jurnal WHERE id_gl LIKE 'KL%') y ORDER BY y.id_gl DESC LIMIT 1";
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

            $id_gl = "KL-" . $idgl;

            $this->db->transStart();
            $queryrwt = "INSERT INTO aset_bayar (id_aset, tgl_bayar, tipe_bayar, kas_bank, jumlah, no_cek, tgl_cek, keterangan, id_gl) VALUES ('$idAset', '$tglbayarAset', '$tipebayarAset', '$kasbayarAset', '$jmlbayarAset', '$nocekAset', '$tglcekAset', '$ketAset', '$id_gl') returning id_bayar";
            $id_bayar = $this->db->query($queryrwt)->getRow()->id_bayar;

            $ketbeli = 'Pembelian FA '. $id_bayar;
            $ketbayarbeli = 'Bayar FA'. $id_bayar;

            $query = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$tglbayarAset', '$ketAset', '$id_user') returning id_jurnal";
            $id_jurnal = $this->db->query($query)->getRow()->id_jurnal;

            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $simpandebit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$id_acchutang', '$ketbeli', '5','', '$jmlbayarAset', '0', '20', '$id_user')";

                $simpankredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$kasbayarAset', '$ketbayarbeli', '5','', '0', '$jmlbayarAset', '20', '$id_user')";

                if ($this->db->simpleQuery($simpandebit) && $this->db->simpleQuery($simpankredit)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Simpan Berhasil";
                    $output['x']        = 'x';
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Berhasil";
                    $output['x']        = 'xx';
                }
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Berhasil";
                $output['pesan']    = $this->db->error();
                $output['x']        = 'xx';
            }
        }
        $this->hasil($output);
    }


    public function list_transferAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'checkedtgl'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            // $jml = $input->jmlh;
            // $tglbeli = $input->tglbeli;
            // $tglbelisd = $input->tglbelisd;
            // $checkedtgl        = $input->checkedtgl;

            // if ($checkedtgl == true) {
            //     $kondisiku = "WHERE a.tgl_beli BETWEEN '$tglbeli' AND '$tglbelisd'";
            // } else {
            //     $kondisiku = "";
            // }
            // if (($jml == '') || ($jml == '0')) {
            //     $kondisi = '';
            // } else {
            //     $kondisi = "LIMIT '" . $jml . "'";
            // }

            $query = $this->db->query("SELECT a.*, b.nama_aset, asal.nama_gudang AS gudang_asal, tj.nama_gudang AS gudang_tujuan, u.nama FROM aset_transfer a INNER JOIN aset_barang b ON a.id_barang_aset=b.id_barang_aset INNER JOIN gudang_unit asal ON a.id_gud_asal=asal.id_gudang_unit INNER JOIN gudang_unit tj ON a.id_gud_tujuan=tj.id_gudang_unit INNER JOIN users u ON a.id_user=u.id_user");

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
    

    public function listDaftarAset()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'checkedtgl'
        ]; */
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        /* if ($this->evalParam($input, $listParam)) { */
            // $jml = $input->jmlh;
            // $tglbeli = $input->tglbeli;
            // $tglbelisd = $input->tglbelisd;
            // $checkedtgl        = $input->checkedtgl;

            // if ($checkedtgl == true) {
            //     $kondisiku = "WHERE a.tgl_beli BETWEEN '$tglbeli' AND '$tglbelisd'";
            // } else {
            //     $kondisiku = "";
            // }
            // if (($jml == '') || ($jml == '0')) {
            //     $kondisi = '';
            // } else {
            //     $kondisi = "LIMIT '" . $jml . "'";
            // }

            $query = $this->db->query("SELECT a.id_barang_aset, a.nama_aset, a.id_gudang_unit, g.nama_gudang FROM aset_barang a INNER JOIN gudang_unit g ON a.id_gudang_unit=g.id_gudang_unit");

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
        // }

        $this->hasil($output);
    }

    public function getGudangaset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'gudangcari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM gudang_unit ORDER BY nama_gudang ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Gudang tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function SimpanTransferAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_barang_aset'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("INSERT INTO aset_transfer (id_barang_aset, id_gud_asal, id_gud_tujuan, id_user, ket, tanggal) VALUES('$input->id_barang_aset', '$input->id_gud_asal', '$input->id_gud_tj', '$input->id_user', '$input->ket_tf', '$input->tgl_tf')");

            $this->db->query("UPDATE aset_barang SET id_gudang_unit='$input->id_gud_tj' WHERE id_barang_aset = '$input->id_barang_aset'");

            if ($query) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['X']     = 'X';
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = ""; //Barang ditemukan
                $output['X']     = '';
            }
        }

        $this->hasil($output);
    }

    public function list_jualAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'checkedtgl'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            // $jml = $input->jmlh;
            // $tglbeli = $input->tglbeli;
            // $tglbelisd = $input->tglbelisd;
            // $checkedtgl        = $input->checkedtgl;

            // if ($checkedtgl == true) {
            //     $kondisiku = "WHERE a.tgl_beli BETWEEN '$tglbeli' AND '$tglbelisd'";
            // } else {
            //     $kondisiku = "";
            // }
            // if (($jml == '') || ($jml == '0')) {
            //     $kondisi = '';
            // } else {
            //     $kondisi = "LIMIT '" . $jml . "'";
            // }

            $query = $this->db->query("SELECT j.*, b.nama_aset, u.nama, kas.kas_nama FROM aset_jual j INNER JOIN aset_barang b ON j.id_aset=b.id_barang_aset INNER JOIN users u ON j.id_user=u.id_user INNER JOIN ac_kas kas ON j.kas_bank=kas.id_acc");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = '';
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
}