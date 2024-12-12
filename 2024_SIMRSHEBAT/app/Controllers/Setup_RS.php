<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use CodeIgniter\Files\File;

/**
 * Description of Setup
 *
 * @author lapto
 */
class Setup_RS extends Api{
    
    public function getGolonganBarang() {
        $output = array();
        $query = "
            SELECT *
            FROM
                logistik_golongan
            ORDER BY golongan_barang ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListBarangLogistik() {
        $output = array();
        $query = "
            SELECT a.*, b.golongan_barang
            FROM
                logistik_barang a
            INNER JOIN
                logistik_golongan b
            ON
                a.id_gol=b.id_gol
            ORDER BY nama_barang ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListSupplier() {
        $output = array();
        $query = "
            SELECT *
            FROM
                logistik_supplier
            ORDER BY nama_supplier ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListGudangLogistik() {
        $output = array();
        $query = "
            SELECT *
            FROM
                gudang_unit
            ORDER BY nama_gudang ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getAccount() {
        $output = array();
        $query = "
            SELECT *
            FROM
                account
            ORDER BY id_coa ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }



    public function addeditsupplierLogistik() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_supplier = $input->id_sup;
            $nama_supplier      = $input->nama_sup;
            $no_tlpn   = $input->notlpn_sup;
            $alamat     = $input->alamat_sup;
            
            $this->db->transStart();
            if ($proses == true){
                $update = " UPDATE logistik_supplier SET 
                                nama_supplier = '$nama_supplier',
                                no_tlpn = '$no_tlpn',
                                alamat = '$alamat'
                            WHERE id_supplier_logistik = '$id_supplier'";
                $this->db->query($update);
                
            }else if ($proses == false){
                $cek    = "SELECT id_supplier_logistik FROM logistik_supplier ORDER BY id_supplier_logistik DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $x      = $row->id_supplier_logistik;
                        $real   = ((int)$x + 1);
                        $id_supplier_logistik = $real;
                    }else{
                        $id_supplier_logistik = 1;
                    }
                }

                $insert = "INSERT INTO logistik_supplier (id_supplier_logistik, nama_supplier, no_tlpn, alamat) VALUES ('$id_supplier_logistik','$nama_supplier','$no_tlpn','$alamat')";
                $this->db->query($insert);

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function hapus_supplierLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_Sup'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_Sup        = $input->id_Sup;

            $this->db->transStart();
            $delete = " DELETE FROM logistik_supplier WHERE id_supplier_logistik = '$id_Sup'";
            $this->db->query($delete);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }
        }
        $this->hasil($output);
    }

    public function addeditsetupBarangLogistik() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_barang = $input->id_Brg;
            $nama_barang      = $input->nama_Brg;
            $satuan_beli   = $input->satuan_beli;
            $id_gol     = $input->id_gol;
            $produsen     = $input->produsen;
            $harga_beli     = $input->harga_beli;
            $frac     = $input->frac;

            
            $this->db->transStart();
            if ($proses == true){
                $update = " UPDATE logistik_barang SET 
                                nama_barang = '$nama_barang',
                                satuan_beli = '$satuan_beli',
                                id_gol = '$id_gol',
                                produsen = '$produsen',
                                harga_beli = '$harga_beli',
                                frac = '$frac'
                            WHERE id_barang_logistik = '$id_barang'";
                $this->db->query($update);
                
            }else if ($proses == false){
                $cek    = "SELECT id_barang_logistik FROM logistik_barang ORDER BY id_barang_logistik DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $x      = $row->id_barang_logistik;
                        $real   = ((int)$x + 1);
                        $id_barang_logistik = $real;
                    }else{
                        $id_barang_logistik = 1;
                    }
                }

                $insert = "INSERT INTO logistik_barang (id_barang_logistik, nama_barang, satuan_beli, id_gol, produsen, harga_beli, frac) VALUES ('$id_barang_logistik','$nama_barang','$satuan_beli','$id_gol', '$produsen', '$harga_beli', '$frac')";
                $this->db->query($insert);

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function hapus_setupBarangLogistik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_Brg'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_Brg        = $input->id_Brg;

            $delete = "DELETE FROM logistik_barang WHERE id_barang_logistik = '$id_Brg'";
            if($this->db->query($delete)){
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            }else{
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Barang Tidak Bisa Dihapus";
            }
        }
        $this->hasil($output);
    }

    public function addeditsetupCoa()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_acc = $input->id_acc;
            $kode_coa      = $input->kode_coa;
            $coa   = $input->coa;
            $level     = $input->level;
            $normal     = $input->normal;
            $parent     = $input->parent;
            $info     = $input->info;

            $this->db->transStart();
            if ($proses == true) {
                $output['status']   = "sukses";
                // $output['pesan']    = "Koordinasikan Dulu";
                $output['kode'] = 'KO';
                $this->hasil($output);
                return;
                // $update = " UPDATE account SET 
                //                 id_coa = '$kode_coa',
                //                 coa = '$coa',
                //                 level = '$level',
                //                 normal = '$normal',
                //                 parent = '$parent',
                //                 info = '$info'
                //             WHERE id_acc = '$id_acc'";
                // $this->db->query($update);
            } else if ($proses == false) {
                $cek    = "SELECT id_acc FROM account ORDER BY id_acc DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_acc;
                        $real   = ((int)$x + 1);
                        $id_acc = $real;
                    } else {
                        $id_acc = 1;
                    }
                }

                $insert = "INSERT INTO account (id_acc, id_coa, coa, level, normal, parent, info) VALUES ('$id_acc','$kode_coa','$coa','$level','$normal','$parent','$info')";
                $this->db->query($insert);
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = $this->db->query($insert);
            }
        }
        $this->hasil($output);
    }
	
	
	// public function importsupplierLogistik(){
	// 	$input = json_decode(file_get_contents('php://input')); 
	// 	// var_dump(count($input));
		
	// 	if(count($input)>751){
	// 		$output['code']         = "500";
	// 		$output['status']       = "gagal";
	// 		$output['pesan']        = "Data Terlalu Besar";
	// 	}else{
	// 		$this->db->transStart();
	// 		    for($i=0;$i<count($input)-1;++$i){
	// 			$id_supplier_logistik = $input[$i]->id_supplier_logistik;

	// 			$insert = "INSERT INTO logistik_supplier (id_supplier_logistik) VALUES ($id_supplier_logistik) on conflict do nothing"; 
	// 			$this->db->query($insert); 
	// 		}
	// 			$this->db->transComplete();		
			
	// 		if ($this->db->transStatus()) {
	// 			$output['code']         = "200";
	// 			$output['status']       = "sukses";
	// 			$output['pesan']        = "Simpan Berhasil";
	// 		}else{
	// 			$this->db->transRollback();
	// 			$output['code']         = "500";
	// 			$output['status']       = "gagal";
	// 			$output['pesan']        = "Gagal Simpan";
	// 		}
	// 	}		
	// 	$this->hasil($output);
	// }

    // SETUP OK
    function getJenisanestesiOK()
    {
        $output = array();
        $query = "
            SELECT
                *
            FROM
            ok_jenis_anestesi
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    function getKlasifikasiBedahOK()
    {
        $output = array();
        $query = "
            SELECT
                *
            FROM
            ok_klasifikasi_bedah
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    function getKamarBedahOK()
    {
        $output = array();
        $query = "
            SELECT
                *
            FROM
            ok_kamar_bedah
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    function getJenisMakananGizi()
    {
        $output = array();
        $query = "
            SELECT
                *
            FROM
            jenis_makanan
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

     function getJenisDietGizi()
    {
        $output = array();
        $query = "
            SELECT
                *
            FROM
            gizi_jenis_diet
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }


    public function addeditjenisanestesiOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_jenis_anestesi = $input->id_jenis_anestesi;
            $jenis_anestesi      = $input->jenis_anestesi;

            $this->db->transStart();
            if ($proses == true) {
                $update = "UPDATE ok_jenis_anestesi SET 
                            jenis_anestesi = '$jenis_anestesi'
                            WHERE id_jenis_anestesi = '$id_jenis_anestesi'";
                $this->db->query($update);
            } else if ($proses == false) {
                $cek    = "SELECT id_jenis_anestesi FROM ok_jenis_anestesi ORDER BY id_jenis_anestesi DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_jenis_anestesi;
                        $real   = ((int)$x + 1);
                        $id_jenis_anestesi = $real;
                    } else {
                        $id_jenis_anestesi = 1;
                    }
                }

                $insert = "INSERT INTO ok_jenis_anestesi (id_jenis_anestesi, jenis_anestesi) VALUES ('$id_jenis_anestesi','$jenis_anestesi')";
                $this->db->query($insert);
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }

    public function HapusJenisAnestesiOK()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_anestesi'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_jenis_anestesi        = $input->id_jenis_anestesi;

            $this->db->transStart();
            $delete = " DELETE FROM ok_jenis_anestesi WHERE id_jenis_anestesi = '$id_jenis_anestesi'";
            $this->db->query($delete);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }
        }
        $this->hasil($output);
    }

    public function addeditKlasifikasibedah()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_klasifikasi_bedah = $input->id_klasifikasi_bedah;
            $klasifikasi_bedah      = $input->klasifikasi_bedah;

            $this->db->transStart();
            if ($proses == true) {
                $update = "UPDATE ok_klasifikasi_bedah SET 
                            klasifikasi_bedah = '$klasifikasi_bedah'
                            WHERE id_klasifikasi_bedah = '$id_klasifikasi_bedah'";
                $this->db->query($update);
            } else if ($proses == false) {
                $cek    = "SELECT id_klasifikasi_bedah FROM ok_klasifikasi_bedah ORDER BY id_klasifikasi_bedah DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_klasifikasi_bedah;
                        $real   = ((int)$x + 1);
                        $id_klasifikasi_bedah = $real;
                    } else {
                        $id_klasifikasi_bedah = 1;
                    }
                }

                $insert = "INSERT INTO ok_klasifikasi_bedah (id_klasifikasi_bedah, klasifikasi_bedah) VALUES ('$id_klasifikasi_bedah','$klasifikasi_bedah')";
                $this->db->query($insert);
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }

    public function hapusKlasifikasiBedah()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_klasifikasi_bedah'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_klasifikasi_bedah        = $input->id_klasifikasi_bedah;

            $this->db->transStart();
            $delete = " DELETE FROM ok_klasifikasi_bedah WHERE id_klasifikasi_bedah = '$id_klasifikasi_bedah'";
            $this->db->query($delete);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }
        }
        $this->hasil($output);
    }

    public function addeditKamarbedah()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_kamar_ok = $input->id_kamar_ok;
            $nama_kamar_ok      = $input->nama_kamar_ok;

            $this->db->transStart();
            if ($proses == true) {
                $update = "UPDATE ok_kamar_bedah SET 
                            nama_kamar_ok = '$nama_kamar_ok'
                            WHERE id_kamar_ok = '$id_kamar_ok'";
                $this->db->query($update);
            } else if ($proses == false) {
                $cek    = "SELECT id_kamar_ok FROM ok_kamar_bedah ORDER BY id_kamar_ok DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_kamar_ok;
                        $real   = ((int)$x + 1);
                        $id_kamar_ok = $real;
                    } else {
                        $id_kamar_ok = 1;
                    }
                }

                $insert = "INSERT INTO ok_kamar_bedah (id_kamar_ok, nama_kamar_ok) VALUES ('$id_kamar_ok','$nama_kamar_ok')";
                $this->db->query($insert);
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }

    public function hapusKamarBedah()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kamar_ok'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kamar_ok        = $input->id_kamar_ok;

            $this->db->transStart();
            $delete = " DELETE FROM ok_kamar_bedah WHERE id_kamar_ok = '$id_kamar_ok'";
            $this->db->query($delete);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }
        }
        $this->hasil($output);
    }

    public function addeditJenisMakanan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $kd_makanan = $input->kd_makanan;
            $jenis_makanan      = $input->jenis_makanan;

            $this->db->transStart();
            if ($proses == true) {
                $update = "UPDATE jenis_makanan SET 
                            jenis_makanan = '$jenis_makanan'
                            WHERE kd_makanan = '$kd_makanan'";
                $this->db->query($update);
            } else if ($proses == false) {
                $cek    = "SELECT kd_makanan FROM jenis_makanan ORDER BY kd_makanan DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->kd_makanan;
                        $real   = ((int)$x + 1);
                        $kd_makanan = $real;
                    } else {
                        $kd_makanan = 1;
                    }
                }

                $insert = "INSERT INTO jenis_makanan (kd_makanan, jenis_makanan) VALUES ('$kd_makanan','$jenis_makanan')";
                $this->db->query($insert);
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }

    public function hapusJenisMakanan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['kd_makanan'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $kd_makanan        = $input->kd_makanan;

            $this->db->transStart();
            $delete = " DELETE FROM jenis_makanan WHERE kd_makanan = '$kd_makanan'";
            $this->db->query($delete);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }
        }
        $this->hasil($output);
    }

    public function addeditJenisDiet()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['proses'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_jenis_diet = $input->id_jenis_diet;
            $jenis_diet      = $input->jenis_diet;

            $this->db->transStart();
            if ($proses == true) {
                $update = "UPDATE gizi_jenis_diet SET 
                            jenis_diet = '$jenis_diet'
                            WHERE id_jenis_diet = '$id_jenis_diet'";
                $this->db->query($update);
            } else if ($proses == false) {
                $cek    = "SELECT id_jenis_diet FROM gizi_jenis_diet ORDER BY id_jenis_diet DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)) {
                        $x      = $row->id_jenis_diet;
                        $real   = ((int)$x + 1);
                        $id_jenis_diet = $real;
                    } else {
                        $id_jenis_diet = 1;
                    }
                }

                $insert = "INSERT INTO gizi_jenis_diet (id_jenis_diet, jenis_diet) VALUES ('$id_jenis_diet','$jenis_diet')";
                $this->db->query($insert);
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }

    public function hapusJenisDiet()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_diet'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_jenis_diet        = $input->id_jenis_diet;

            $this->db->transStart();
            $delete = " DELETE FROM gizi_jenis_diet WHERE id_jenis_diet = '$id_jenis_diet'";
            $this->db->query($delete);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            } else {
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }
        }
        $this->hasil($output);
    }
}
