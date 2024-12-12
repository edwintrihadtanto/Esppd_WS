<?php
namespace App\Controllers;

class Logistik extends Api {

    public function modpembelianLogistik()
    {
        return view('view/modal/logistik/modpembelianLogistik');
    }

    public function modpermintaanLogistik()
    {
        return view('view/modal/logistik/modpermintaanLogistik');
    }

    public function modpengirimanLogistik()
    {
        return view('view/modal/logistik/modpengirimanLogistik');
    }

    public function modpemakaianLogistik()
    {
        return view('view/modal/logistik/modpemakaianLogistik');
    }

    public function modreturnLogistik()
    {
        return view('view/modal/logistik/modreturnLogistik');
    }

    public function mod_ListBarangLogistikUnit()
    {
        return view('view/modal/logistik/mod_ListBarangLogistikUnit');
    }

    public function mod_ListBarangLogistikUnitpakai()
    {
        return view('view/modal/logistik/mod_ListBarangLogistikUnitpakai');
    }

    public function mod_ListBarangLogistikUnitreturn()
    {
        return view('view/modal/logistik/mod_ListBarangLogistikUnitreturn');
    }
    
    public function getGudangLogistik()
    {
        /* $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_gudang_unit',
        ]; */
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        /* if ($this->evalParam($input, $listParam)) { */
            $data = $this->db->query("SELECT * FROM gudang_unit WHERE gudang_logistik = true");


            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Gudang Hilang";
            }
        /* } */

        $this->hasil($output);
    }

    public function getGudangUnit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_gudang_unit',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM gudang_unit WHERE id_gudang_unit = '$input->id_gudang_unit'");


            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getRow('nama_gudang');
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getSupllierLogistik()
    {
        $data           = $this->db->query("SELECT * FROM logistik_supplier");
        $output['status']   = 'sukses';
        $output['data']     = $data->getResult();
        echo json_encode($output);
    }

    public function getBarangLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'barangcari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM logistik_barang ORDER BY nama_barang ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getlistStokLogistik()
    {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

            $data = $this->db->query("SELECT * FROM logistik_barang WHERE qty != '0' ORDER BY nama_barang ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }

        $this->hasil($output);
    }

    public function getBarangLogistikMinta()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'barangcari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM logistik_barang WHERE qty != '0' ORDER BY nama_barang ASC");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }
        }

        $this->hasil($output);
    }


    // Pembelian Logistik 
    public function list_pembelianLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['nofak'];
        if ($this->evalParam($input, $listParam)) {
            $checkedtgl        = $input->checkedtgl;
            $jml        = $input->jmlh;
            $nofak        = $input->nofak;
            $tglfak        = $input->tglfak;
            // $tgldatang        = $input->tgldatang;
            // $tgltempo        = $input->tgltempo;
            // $tgltagih        = $input->tgltagih;
            if ($checkedtgl == true) {
                $kondisiku = "AND a.tgl_faktur = '$tglfak'";
            } else {
                $kondisiku = "";
            }

            if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            }
            $query = $this->db->query("SELECT * FROM logistik_pembelian a INNER JOIN logistik_supplier b on a.supplier=b.id_supplier_logistik WHERE upper(a.no_faktur) like UPPER('" . $nofak ."%') $kondisiku $kondisi");

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

    public function getlistPembelianLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_pembelian_logistik',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            if($input->id_pembelian_logistik != 'null'){
                $kondisi = "WHERE id_pembelian_logistik = '$input->id_pembelian_logistik'";
            }else{
                $kondisi = 'WHERE id_pembelian_logistik = null';
            }
            $data = $this->db->query("SELECT * FROM logistik_pembelian $kondisi");
            
            $datadetail = $this->db->query("SELECT a.*,b.nama_barang,a.qty as qty_beli FROM logistik_pembelian_detail a INNER JOIN logistik_barang b ON a.id_barang_logistik=b.id_barang_logistik $kondisi");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
                $output['datadetail']     = $datadetail->getResult();
            } else {
                $output['status']   = "sukses";
            }
        }

        $this->hasil($output);
    }

    public function SimpanPembelianLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $nofak  = $input->nofak;
            $supplier  = $input->supplier;
            $tglfak  = $input->tglfak;
            $tgldatang  = $input->tgldatang;
            $tgltempo  = $input->tgltempo;
            $tgltagih  = $input->tgltagih;
            $potongan  = $input->ptg;
            $biayalain  = $input->biayalain;
            $ongkoskirim  = $input->ongkoskirim;
            $ppnpersen  = $input->ppnpersen;

            if ($input->id_pembelian != '') { //JIKA SUDAH ADA ID ORDERNYA MAKA UPDATE
                $id_pembelian_logistik  = $input->id_pembelian;
                $this->db->simpleQuery("DELETE FROM logistik_pembelian_detail WHERE id_pembelian_logistik = '$id_pembelian_logistik'");
                $query  = "UPDATE logistik_pembelian SET
                            no_faktur = '$nofak',
                            supplier = '$supplier',
                            tgl_faktur = '$tglfak',
                            tgl_datang = '$tgldatang',
                            tgl_tempo = '$tgltempo',
                            tgl_tagih = '$tgltagih',
                            potongan = '$potongan',
                            ppn = '$ppnpersen',
                            biaya_lain = '$biayalain',
                            ongkir = '$ongkoskirim'
                            WHERE id_pembelian_logistik = '$id_pembelian_logistik'";

            } else { //JIKA MASIH KOSONG BUAT BARU ID ORDERNYA
                $cek    = "SELECT id_pembelian_logistik FROM logistik_pembelian ORDER BY id_pembelian_logistik DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $id_pembelian_logistik   = $row->id_pembelian_logistik;
                        //$realx  = date('Ymd');
                        $real   = ((int)$id_pembelian_logistik + 1);
                        $id_pembelian = $real;
                    } else {
                        $id_pembelian = 1;
                    }
                }

                $id_pembelian_logistik = $id_pembelian;

                $query = "INSERT INTO logistik_pembelian (id_pembelian_logistik, no_faktur, supplier, tgl_faktur, tgl_datang, tgl_tempo, tgl_tagih, potongan, ppn, biaya_lain, ongkir) VALUES ('$id_pembelian_logistik', '$nofak', '$supplier', '$tglfak', '$tgldatang', '$tgltempo', '$tgltagih', '$potongan', '$ppnpersen', $biayalain, '$ongkoskirim')";
            }

            if ($this->db->simpleQuery($query)) {
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $kd_brg       = $data[$i]->kd_brg;
                    $qty       = $data[$i]->qty;
                    $hrg_beli       = $data[$i]->hrg_beli;
                    $exp          = $data[$i]->exp;
                    $ket          = $data[$i]->ket;
                    $diskonitem          = $data[$i]->diskon;
                    $qtyB          = $data[$i]->qtyB;
                    $frac          = $data[$i]->frac;
                    $satuanbeli          = $data[$i]->satBeli;
                    $new_harga = $hrg_beli - $diskonitem;

                    $simpanpembelian = "INSERT INTO logistik_pembelian_detail (id_pembelian_logistik, id_barang_logistik, qty, harga_beli,tgl_exp, ket, diskon, frac, qtybsr, satuanbeli) VALUES ('$id_pembelian_logistik', '$kd_brg', '$qty', '$new_harga','$exp', '$ket', '$diskonitem', '$frac', '$qtyB', '$satuanbeli')";

                    /* $cekbarang = $this->db->query("SELECT * FROM logistik_barang WHERE id_barang_logistik = '$kd_brg'")->getRow('qty');

                    $stokupdate = $cekbarang + $qty;

                    $querystok  = "UPDATE logistik_barang SET
                            harga_beli = '$hrg_beli',
                            qty = '$stokupdate',
                            frac = '$frac',
                            qtybsr = '$qtyB',
                            satuan_beli = '$satuanbeli'
                            WHERE id_barang_logistik = '$kd_brg'"; */

                    if ($this->db->simpleQuery($simpanpembelian)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil Pembelian";
                        $output['xx']        = $id_pembelian_logistik;

                    }else{
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan Pembelian";
                    }
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Pembelian";
                //$output['pesan']    = $this->db->error();
                // $output['x']        = '';
            }
        }
        $this->hasil($output);
    }

    public function PostingPembelianLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_pembelian_logistik  = $input->id_pembelian;
            $jumlahtotal  = $input->jumlahtotal;
            $grandtotal  = $input->grandtotal;
            $id_pegawai  = $input->id_peg;
            $potongan  = $input->ptg;
            $nm_sup  = $input->nm_sup;
            $ppn  = $input->ppn;
            $biayalain  = $input->biayalain;
            $ongkoskirim  = $input->ongkoskirim;
            $tgl = $input->tgl;

            $id_gl = "LOGBL-" . $id_pembelian_logistik;
            $keterangan = "Pembelian logistik ID " . $id_pembelian_logistik;
            $this->db->transStart();
            $query = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$tgl', '$keterangan', '$id_pegawai') returning id_jurnal";
            $id_jurnal = $this->db->query($query)->getRow()->id_jurnal;

            $this->db->transComplete();
                if($this->db->transStatus()) {
                    $data = $input->data;
                    for ($i = 0; $i < $input->count; $i++) {
                        $kd_brg       = $data[$i]->kd_brg;
                        $qty       = $data[$i]->qty;
                        $hrg_beli       = $data[$i]->hrg_beli;
                        $qtyB          = $data[$i]->qtyB;
                        $frac          = $data[$i]->frac;
                        $satuanbeli          = $data[$i]->satBeli;

                        $cekbarang = $this->db->query("SELECT * FROM logistik_barang WHERE id_barang_logistik = '$kd_brg'")->getRow('qty');

                        $stokupdate = $cekbarang + $qty;

                        $queryharga = $this->db->query("SELECT total::FLOAT / (SELECT COUNT(harga_beli) FROM logistik_pembelian_detail WHERE id_barang_logistik = '$kd_brg')::FLOAT AS new_harga FROM 
(SELECT SUM(harga_beli) AS total FROM logistik_pembelian_detail WHERE id_barang_logistik = '$kd_brg') y
")->getRow('new_harga');

                        $querystok  = "UPDATE logistik_barang SET
                                harga_beli = '$queryharga',
                                qty = '$stokupdate',
                                frac = '$frac',
                                qtybsr = '$qtyB',
                                satuan_beli = '$satuanbeli',
                                updated_date = '$tgl'
                                WHERE id_barang_logistik = '$kd_brg'";
                        $this->db->simpleQuery($querystok);
                    }

                    
                    $queryupdate = "UPDATE logistik_pembelian SET
                            id_jurnal = '$id_jurnal',
                            posting = 't'
                            WHERE id_pembelian_logistik = '$id_pembelian_logistik'";

                    $simpandebit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '29', 'Persediaan Logistik ( Non Medis), ID : $id_pembelian_logistik', '5','$nm_sup', '$jumlahtotal', '0', '20', '$id_pegawai')";

                    $simpankredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '95', 'Hutang Pembelian Logistik, ID : $id_pembelian_logistik', '5','$nm_sup', '0', '$grandtotal', '20', '$id_pegawai')";

                    if ($potongan != '0') {
                        $simpanpotongan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '149', 'Potongan Pembelian Logistik, ID : $id_pembelian_logistik', '5','$nm_sup', '0', '$potongan', '20', '$id_pegawai')";
                        $this->db->simpleQuery($simpanpotongan);
                    }
                    if ($ppn != '0') {
                        $simpanppn = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '51', 'PPN Pembelian Logistik, ID : $id_pembelian_logistik', '5','$nm_sup', '$ppn', '0', '20', '$id_pegawai')";
                        $this->db->simpleQuery($simpanppn);
                    }

                    if ($biayalain != '0') {
                        $simpanbiayalain = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '215', 'Biaya lain-lain Logistik, ID : $id_pembelian_logistik', '5','$nm_sup', '$biayalain', '0', '20', '$id_pegawai')";
                        $this->db->simpleQuery($simpanbiayalain);
                    }
                    if ($ongkoskirim != '0') {
                        $simpanongkoskirim = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '151', 'Ongkos angkut Logistik, ID : $id_pembelian_logistik', '5','$nm_sup', '$ongkoskirim', '0', '20', '$id_pegawai')";
                        $this->db->simpleQuery($simpanongkoskirim);
                    }

                    if ($this->db->simpleQuery($queryupdate) && $this->db->simpleQuery($simpandebit) && $this->db->simpleQuery($simpankredit)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Posting";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Posting";
                    }
                } else {
                    $this->db->transRollback();
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Posting";
                }
            }
        /* } */
        $this->hasil($output);
    }



    // Pembelian Logistik 

    // Permintaan Logistik 
    public function list_permintaanLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['unitorder'];
        if ($this->evalParam($input, $listParam)) {
            $checkedtgl        = $input->checkedtgl;
            $unitorder        = $input->unitorder;
            $jml        = $input->jmlh;
            $tglpermintaan        = $input->tglpermintaan;
            $id_gudang_unit        = $input->idgd;

            
            if ($checkedtgl == true) {
                $kondisiku = "AND a.tgl_permintaan = '$tglpermintaan'";
            } else{
                $kondisiku = "";

            }
            if ($unitorder == '') {
                $kondisi1 = '';
            } else {
                $kondisi1 = "AND upper(ke.nama_gudang) like UPPER('" . $unitorder . "%')";
            }
            if (($jml == '') || ($jml == '0')) {
                $kondisi2 = '';
            } else {
                $kondisi2 = "LIMIT '" . $jml . "'";
            }
            $query = $this->db->query("SELECT a.*, dari.nama_gudang AS unit_dari, ke.nama_gudang AS unit_ke, d.nama_pegawai AS pegawai_dari, k.nama_pegawai AS pegawai_kirim FROM logistik_permintaan a INNER JOIN gudang_unit dari ON a.id_gudang_unit_dari=dari.id_gudang_unit INNER JOIN gudang_unit ke ON a.id_gudang_unit_ke=ke.id_gudang_unit INNER JOIN pegawai d ON a.id_pegawai=d.id_pegawai LEFT JOIN pegawai k ON a.id_pegawai_kirim=k.id_pegawai WHERE a.id_gudang_unit_ke = '$id_gudang_unit' $kondisiku $kondisi1 $kondisi2");

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

    public function SimpanPermintaanLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";


            $tglorder  = $input->tglorder;
            $dari  = $input->dari;
            $ke  = $input->ke;
            $ket  = $input->ket;
            $id_pegawai  = $input->idpeg;
            $count  = $input->count;

            if ($input->id_permintaan != '') { //JIKA SUDAH ADA ID ORDERNYA MAKA UPDATE
                $id_logistik_permintaan  = $input->id_permintaan;
                $this->db->simpleQuery("DELETE FROM logistik_permintaan_detail WHERE id_logistik_permintaan = '$id_logistik_permintaan'");
                $query  = "UPDATE logistik_permintaan SET
                            id_gudang_unit_dari = '$dari',
                            id_gudang_unit_ke = '$ke',
                            ket = '$ket',
                            tgl_permintaan = '$tglorder'
                            WHERE id_logistik_permintaan = '$id_logistik_permintaan'";
            } else { //JIKA MASIH KOSONG BUAT BARU ID ORDERNYA
                $cek    = "SELECT id_logistik_permintaan FROM logistik_permintaan ORDER BY id_logistik_permintaan DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $id_logistik_permintaan   = $row->id_logistik_permintaan;
                        $real   = ((int)$id_logistik_permintaan + 1);
                        $id_permintaan = $real;
                    } else {
                        $id_permintaan = 1;
                    }
                }

                $id_logistik_permintaan = $id_permintaan;
                
                $query = "INSERT INTO logistik_permintaan (id_logistik_permintaan, id_pegawai, id_gudang_unit_dari, id_gudang_unit_ke, ket, tgl_permintaan) VALUES ('$id_logistik_permintaan', '$id_pegawai', '$dari', '$ke', '$ket', '$tglorder')";

            }

            if ($this->db->simpleQuery($query)) {
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $kd_brg       = $data[$i]->kd_brg;
                    $qty       = $data[$i]->qty;

                    $simpan = "INSERT INTO logistik_permintaan_detail (id_logistik_permintaan, id_barang_logistik, qty) VALUES ('$id_logistik_permintaan', '$kd_brg', '$qty')";

                    $this->db->simpleQuery($simpan);
                    $output['status']   = "sukses";
                    $output['pesan']    = "Simpan Berhasil Permintaan";
                    $output['x']        = $id_logistik_permintaan;

                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Permintaan";
                $output['pesan']    = $this->db->error();
                $output['x']        = '';
            }
        }
        $this->hasil($output);
    }

    // Permintaan Logistik

    // Pengiriman Logistik

    public function list_pengirimanLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['unitorder'];
        if ($this->evalParam($input, $listParam)) {
            $checkedtgl        = $input->checkedtgl;
            $unitorder        = $input->unitorder;
            $jml        = $input->jmlh;
            $tglpermintaan        = $input->tglpermintaan;
            $statuskirim        = $input->statuskirim;

            

            if ($checkedtgl == true) {
                $kondisiku = "WHERE a.tgl_permintaan = '$tglpermintaan'";
                $whereand = 'AND';
            } else {
                $kondisiku = "";
                $whereand = 'WHERE';
            }

            if ($unitorder == '') {
                $kondisi1 = '';
            } else {
                $kondisi1 = "AND upper(ke.nama_gudang) like UPPER('" . $unitorder . "%')";
            }
            if (($jml == '') || ($jml == '0')) {
                $kondisi2 = '';
            } else {
                $kondisi2 = "LIMIT '" . $jml . "'";
            }

            if ($statuskirim == '') {
                $kodisikirim = '';
            } if ($statuskirim == 't') {
                $kodisikirim = "$whereand a.status = 't'";
            } if ($statuskirim == 'f') {
                $kodisikirim = "$whereand a.status = 'f'";
            }
            $query = $this->db->query("SELECT a.*, dari.nama_gudang AS unit_dari, ke.nama_gudang AS unit_ke, d.nama_pegawai AS pegawai_dari, k.nama_pegawai AS pegawai_kirim FROM logistik_permintaan a INNER JOIN gudang_unit dari ON a.id_gudang_unit_dari=dari.id_gudang_unit INNER JOIN gudang_unit ke ON a.id_gudang_unit_ke=ke.id_gudang_unit INNER JOIN pegawai d ON a.id_pegawai=d.id_pegawai LEFT JOIN pegawai k ON a.id_pegawai_kirim=k.id_pegawai $kondisiku $kodisikirim $kondisi1 $kondisi2");

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

    public function SimpanUpdatePengirimanLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_logistik_permintaan  = $input->id_permintaan;
            $query = "DELETE FROM logistik_permintaan_detail WHERE id_logistik_permintaan = '$id_logistik_permintaan'";

            if ($this->db->simpleQuery($query)) {
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $kd_brg       = $data[$i]->kd_brg;
                    $qty       = $data[$i]->qty;

                    $simpan = "INSERT INTO logistik_permintaan_detail (id_logistik_permintaan, id_barang_logistik, qty) VALUES ('$id_logistik_permintaan', '$kd_brg', '$qty')";

                    $this->db->simpleQuery($simpan);
                    $output['status']   = "sukses";
                    $output['pesan']    = "Simpan Berhasil";
                    $output['x']        = $id_logistik_permintaan;

                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $output['pesan']    = $this->db->error();
                $output['x']        = '';
            }
        }
        $this->hasil($output);
    }

    public function pengirimanLogistikKirimLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_permintaan'];
        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";


            $id_permintaan  = $input->id_permintaan;
            $tgl_kirim  = $input->tgl_kirim;
            $data = $input->data;
            $output['pesan']    = $input->count;

            for ($i = 0; $i < $input->count; $i++) {
                $kd_brg       = $data[$i]->kd_brg;
                $qty       = $data[$i]->qty;
                $test = $this->db->query("SELECT * FROM logistik_barang WHERE id_barang_logistik = '$kd_brg'")->getRow('qty');
                $newqty = $test - $qty;
                $this->db->query("UPDATE logistik_barang SET
                            qty = '$newqty'
                            WHERE id_barang_logistik = '$kd_brg'");
            }

            $this->db->query("UPDATE logistik_permintaan SET
                            status = 'true',
                            tgl_kirim = '$tgl_kirim'
                            WHERE id_logistik_permintaan = '$id_permintaan'");

            $query = "INSERT INTO logistik_stok_unit (tgl_kirim, qty_permintaan, id_gudang_unit, id_barang_logistik) SELECT '$tgl_kirim' as tgl_kirim, a.qty, b.id_gudang_unit_ke, a.id_barang_logistik FROM logistik_permintaan_detail a INNER JOIN logistik_permintaan b ON a.id_logistik_permintaan=b.id_logistik_permintaan WHERE a.id_logistik_permintaan = '$id_permintaan'";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Pengiriman Berhasil";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Pengiriman Gagal";
            }
        }
        $this->hasil($output);
    }

    // Pengiriman Logistik

    public function getlistPermintaanLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_permintaan_logistik',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            if ($input->id_permintaan_logistik != 'null') {
                $kondisi = "WHERE id_logistik_permintaan = '$input->id_permintaan_logistik'";
            } else {
                $kondisi = 'WHERE id_logistik_permintaan = null';
            }
            $data = $this->db->query("SELECT * FROM logistik_permintaan $kondisi");
            $datadetail = $this->db->query("SELECT a.*, b.nama_barang, b.satuan_beli FROM logistik_permintaan_detail a INNER JOIN logistik_barang b ON a.id_barang_logistik=b.id_barang_logistik $kondisi");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
                $output['datadetail']     = $datadetail->getResult();
            } else {
                $output['status']   = "sukses";
            }
        }

        $this->hasil($output);
    }

    // Pemakaian Logistik

    public function getListGudang_pemakaianLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'gudang_unit',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT y.*, z.jml_barang FROM (SELECT a.id_gudang_unit, a.nama_gudang, SUM(qty_permintaan-qty_pakai) AS stok_total, COUNT(b.id_logistik_stok_unit) AS transaksi FROM gudang_unit a INNER JOIN logistik_stok_unit b ON a.id_gudang_unit=b.id_gudang_unit GROUP BY a.id_gudang_unit , a.nama_gudang) y INNER JOIN (SELECT id_gudang_unit, COUNT(id_barang_logistik) AS jml_barang FROM (SELECT id_gudang_unit, id_barang_logistik FROM logistik_stok_unit GROUP BY id_gudang_unit, id_barang_logistik) a GROUP BY id_gudang_unit) z ON y.id_gudang_unit=z.id_gudang_unit WHERE y.id_gudang_unit = '$input->gudang_unit' ");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $data->getResult();
            }
        }

        $this->hasil($output);
    }

    public function SimpanPemakaianLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_gudang_unit  = $input->id_gudang;
            $tgl_pakai  = $input->tgl_pakai;
            $id_pegawai  = $input->id_peg;
            $jumlahtotal  = $input->hargatotal;

            $cekjurnal    = "SELECT id_jurnal FROM ac_jurnal ORDER BY id_jurnal DESC LIMIT 1";
            if ($this->db->simpleQuery($cekjurnal)) { //true
                $cekx   = $this->db->query($cekjurnal)->getResult();
                $row    = $this->db->query($cekjurnal)->getRow();
                if (!empty($cekx)) {
                    $id_jurnal   = $row->id_jurnal;
                    $real   = ((int)$id_jurnal + 1);
                    $idjur = $real;
                } else {
                    $idjur = 1;
                }
            }

            $id_jurnal = $idjur;

            $queryjurnal = "INSERT INTO ac_jurnal (id_jurnal, id_gl, tgl_jurnal, id_pegawai) VALUES ('$id_jurnal', '13', '$tgl_pakai', '$id_pegawai')";

            if ($this->db->simpleQuery($queryjurnal)) {
                $data = $input->data;
                for ($i = 0; $i < $input->count; $i++) {
                    $kd_brg       = $data[$i]->kd_brg;
                    $total       = $data[$i]->pakai;
                    $id_account       = $data[$i]->idacc;
                    $harga_belibiaya       = $data[$i]->pakai * $data[$i]->hargabeli;
                    $harga_pokokpersedi       = $data[$i]->pakai * $data[$i]->hargapokok;

                    $coa = $this->db->query("SELECT * FROM account WHERE id_acc = '$id_account'")->getRow('coa');

                    $simpandebit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$id_account', '$coa, ID : $kd_brg', '5','PERUSAHAAN', '$harga_belibiaya', '0', '20', '$id_pegawai')";

                    $simpankredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '29', 'Persediaan Logistik ( Non Medis), ID : $kd_brg', '5','PERUSAHAAN', '0', '$harga_pokokpersedi', '20', '$id_pegawai')";

                    $this->db->simpleQuery($simpandebit);
                    $this->db->simpleQuery($simpankredit);
    
                    $querycount = $this->db->query("SELECT id_logistik_stok_unit, qty_permintaan-(qty_pakai+qty_return) AS qty_total FROM logistik_stok_unit WHERE id_gudang_unit = '$id_gudang_unit' AND id_barang_logistik = '$kd_brg' AND qty_permintaan != (qty_pakai+qty_return) ORDER BY tgl_kirim")->getNumRows();
    
                    $a = 0;
    
                    // Query Inpo Link
                    while ($a < $querycount) {
                        $query = $this->db->query("SELECT id_logistik_stok_unit, qty_permintaan-(qty_pakai+qty_return) AS qty_total, qty_permintaan-qty_return as qty, qty_pakai FROM logistik_stok_unit  WHERE id_gudang_unit = '$id_gudang_unit' AND id_barang_logistik = '$kd_brg' AND qty_permintaan != (qty_pakai+qty_return) ORDER BY tgl_kirim ASC LIMIT 1");
                        $qty_total = $query->getRow('qty_total');
                        $id_logistik_stok_unit = $query->getRow('id_logistik_stok_unit');
                        $qty = $query->getRow('qty');
                        $qty_pakai = $query->getRow('qty_pakai');
    
    
                        $total -= $qty_total;
    
                        $a++;
                        if ($total >= 0) {
                            $this->db->query("UPDATE logistik_stok_unit SET
                                    qty_pakai = '$qty', tgl_pakai = '$tgl_pakai'
                                    WHERE id_logistik_stok_unit = '$id_logistik_stok_unit'");
                        } else {
                            $sisa = $qty_total + $total + $qty_pakai;
                            $this->db->query("UPDATE logistik_stok_unit SET
                                    qty_pakai = '$sisa', tgl_pakai = '$tgl_pakai'
                                    WHERE id_logistik_stok_unit = '$id_logistik_stok_unit'");
                            break;
                        }
                    }
                }
            }

            $output['status']   = "sukses";
            $output['pesan']    = "Simpan Berhasil";

            /* $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan";
            $output['pesan']    = $this->db->error();
            $output['x']        = ''; */

            /* $data = $input->data;
            for ($i = 0; $i < $input->count; $i++) {
                $kd_brg       = $data[$i]->kd_brg;
                $qty       = $data[$i]->qty;

                $querycek = "SELECT qty_permintaan-qty_pakai AS qty_total FROM logistik_pemakaian a INNER JOIN logistik_permintaan_detail b ON a.id_logistik_permintaan_detail=b.id_logistik_permintaan_detail  WHERE a.id_gudang_unit = '35' AND b.id_barang_logistik = '128' ORDER BY a.tgl_kirim ASC LIMIT 1"

                
                $simpan = "INSERT INTO logistik_permintaan_detail (id_logistik_permintaan, id_barang_logistik, qty) VALUES ('$id_logistik_permintaan', '$kd_brg', '$qty')";

                $this->db->simpleQuery($simpan);
                
            } */
        }
        $this->hasil($output);
    }

    // Pemakaian Logistik

    /* public function getAccount_pAset()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_gudang_unit',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT * FROM logistik_pemakaian a INNER JOIN logistik_permintaan_detail b ON a.id_logistik_permintaan_detail=b.id_logistik_permintaan_detail INNER JOIN gudang_unit c ON a.id_gudang_unit=c.id_gudang_unit INNER JOIN logistik_barang d ON b.id_barang_logistik=d.id_barang_logistik WHERE a.id_gudang_unit = '$input->id_gudang_unit'");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['pesan']    = "Barang tidak ditemukan";
            }
        }

        $this->hasil($output);
    } */

    


    

    // Return Logistik
    public function getListreturnLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'gudang_unit',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $data = $this->db->query("SELECT a.*, dr.nama_gudang AS unit_asal, ke.nama_gudang AS logistik FROM logistik_return a INNER JOIN gudang_unit dr ON a.id_gudang_unit_dari=dr.id_gudang_unit INNER JOIN gudang_unit ke ON a.id_gudang_unit_ke=ke.id_gudang_unit");

            if ($data->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Barang ditemukan
                $output['data']     = $data->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['code'] = 'XX';
                $output['data']     = $data->getResult();
            }
        }

        $this->hasil($output);
    }

    public function SimpanReturnLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['data'];
        if ($this->evalParam($input, $listParam)) {

            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_gudang_unit  = $input->id_gudang;
            $tgl_return  = $input->tgl_return;
            $id_pegawai  = $input->id_peg;
            $ket  = $input->ket;
            $jumlahtotal = $input->hargatotal;

            $cek    = "SELECT id_return_logistik FROM logistik_return ORDER BY id_return_logistik DESC LIMIT 1";
            if ($this->db->simpleQuery($cek)) { //true
                $cekx   = $this->db->query($cek)->getResult();
                $row    = $this->db->query($cek)->getRow();
                if (!empty($cekx)) {
                    $id_return_logistik   = $row->id_return_logistik;
                    $real   = ((int)$id_return_logistik + 1);
                    $id_return = $real;
                } else {
                    $id_return = 1;
                }
            }

            $cekjurnal    = "SELECT id_jurnal FROM ac_jurnal ORDER BY id_jurnal DESC LIMIT 1";
            if ($this->db->simpleQuery($cekjurnal)) { //true
                $cekx   = $this->db->query($cekjurnal)->getResult();
                $row    = $this->db->query($cekjurnal)->getRow();
                if (!empty($cekx)) {
                    $id_jurnal   = $row->id_jurnal;
                    $real   = ((int)$id_jurnal + 1);
                    $idjur = $real;
                } else {
                    $idjur = 1;
                }
            }

            $id_return_logistik = $id_return;
            $id_jurnal = $idjur;

            $queryjurnal = "INSERT INTO ac_jurnal (id_jurnal, id_gl, tgl_jurnal, id_pegawai) VALUES ('$id_jurnal', '13', '$tgl_return', '$id_pegawai')";
            $this->db->simpleQuery($queryjurnal);

            $this->db->query("INSERT INTO logistik_return (id_return_logistik, id_pegawai, id_gudang_unit_dari, id_gudang_unit_ke, ket, tgl_return ) VALUES ('$id_return_logistik','$id_pegawai','$id_gudang_unit','58','$ket','$tgl_return')");

            $data = $input->data;
            for ($i = 0; $i < $input->count; $i++) {
                $kd_brg       = $data[$i]->kd_brg;
                $total       = $data[$i]->returnbrg;
                $id_account       = $data[$i]->idacc;
                $harga_belibiaya       = $data[$i]->returnbrg * $data[$i]->hargabeli;
                $harga_pokokpersedi       = $data[$i]->returnbrg * $data[$i]->hargapokok;

                $coa = $this->db->query("SELECT * FROM account WHERE id_acc = '$id_account'")->getRow('coa');

                $simpandebit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '29', 'Persediaan Logistik ( Non Medis), ID : $kd_brg', '5','PERUSAHAAN', '$harga_pokokpersedi', '0', '20', '$id_pegawai')";

                $simpankredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, cc, id_pegawai) VALUES ('$id_jurnal', '$id_account', '$coa, ID : $kd_brg', '5','PERUSAHAAN', '0', '$harga_belibiaya', '20', '$id_pegawai')";

                $this->db->simpleQuery($simpandebit);
                $this->db->simpleQuery($simpankredit);

                $this->db->query("INSERT INTO logistik_return_detail (id_return_logistik, id_barang_logistik, qty_return) VALUES ('$id_return_logistik','$kd_brg','$total')");

                $querycount = $this->db->query("SELECT id_logistik_stok_unit, qty_permintaan-(qty_pakai+qty_return) AS qty_total FROM logistik_stok_unit WHERE id_gudang_unit = '$id_gudang_unit' AND id_barang_logistik = '$kd_brg' AND qty_permintaan != (qty_pakai+qty_return) ORDER BY tgl_kirim")->getNumRows();

                $a = 0;

                // Query Inpo Link
                while ($a < $querycount) {
                    $query = $this->db->query("SELECT id_logistik_stok_unit, qty_permintaan-(qty_pakai+qty_return) AS qty_total, qty_permintaan-qty_pakai as qty, qty_pakai FROM logistik_stok_unit  WHERE id_gudang_unit = '$id_gudang_unit' AND id_barang_logistik = '$kd_brg' AND qty_permintaan != (qty_pakai+qty_return) ORDER BY tgl_kirim ASC LIMIT 1");
                    $qty_total = $query->getRow('qty_total');
                    $id_logistik_stok_unit = $query->getRow('id_logistik_stok_unit');
                    $qty = $query->getRow('qty');
                    $qty_return = $query->getRow('qty_return');


                    $total -= $qty_total;

                    $a++;
                    if ($total >= 0) {
                        $this->db->query("UPDATE logistik_stok_unit SET
                                qty_return = '$qty', tgl_return = '$tgl_return'
                                WHERE id_logistik_stok_unit = '$id_logistik_stok_unit'");
                    } else {
                        $sisa = $qty_total + $total + $qty_return;
                        $this->db->query("UPDATE logistik_stok_unit SET
                                qty_return = '$sisa', tgl_return = '$tgl_return'
                                WHERE id_logistik_stok_unit = '$id_logistik_stok_unit'");
                        break;
                    }
                }
                
            }
            $output['status']   = "sukses";
            $output['pesan']    = "Simpan Berhasil";
        }
        $this->hasil($output);
    }
    /* public function list_returnLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['jmlh'];
        if ($this->evalParam($input, $listParam)) {
            $jml        = $input->jmlh;

            if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            }
            $query = $this->db->query("SELECT * FROM logistik_return $kondisi");

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
    } */

    public function getlistStokUnit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_gd_unit'];
        if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT a.id_barang_logistik,b.nama_barang, a.id_gudang_unit, SUM(a.qty_permintaan-(a.qty_pakai+a.qty_return)) AS qty_total, c.id_acc, b.harga_beli, b.harga_pokok FROM logistik_stok_unit a INNER JOIN logistik_barang b ON a.id_barang_logistik=b.id_barang_logistik INNER JOIN logistik_golongan c ON b.id_gol=c.id_gol WHERE a.qty_permintaan != (a.qty_pakai+a.qty_return) AND a.id_gudang_unit = '$input->id_gd_unit' AND b.nama_barang LIKE UPPER('" . $input->cari_barang . "%') GROUP BY a.id_barang_logistik, a.id_gudang_unit, b.nama_barang, c.id_acc, b.harga_beli, b.harga_pokok");

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

    
}
