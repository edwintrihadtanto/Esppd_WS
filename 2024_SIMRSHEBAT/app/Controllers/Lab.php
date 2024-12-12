<?php

namespace App\Controllers;

use CodeIgniter\Controller;


/**
 * Description of Lab
 *
 * @author lapto
 */
class Lab extends Api
{
    function addOrder(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'user',
            'id_kunjungan',
            'tgl_rencana_lab',
            'order_produk'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if($this->evalParam($input, $listParam)){
            $json_order = json_encode($input->order_produk);
            $json_order = str_replace('"',"''",$json_order);
            $json_order = str_replace('[',"(",$json_order);
            $json_order = str_replace(']',")",$json_order);
            $queryx = "SELECT count(*) + 1 as jumlah FROM order_lab WHERE id_kunjungan = '$input->id_kunjungan'";
            $urut_masuk = $this->db->query($queryx)->getRow()->jumlah;
            $query = "SELECT * FROM order_lab WHERE id_kunjungan = '$input->id_kunjungan' and id_kunjungan_lab ISNULL ";
            $hasil = $this->db->query($query);
            if($hasil->getNumRows() > 0){

                    $query = "
                        UPDATE order_lab
                        SET tgl_rencana_lab = '$input->tgl_rencana_lab',
                            order_produk = '$json_order',
                            id_user = '$input->user'
                        WHERE id_kunjungan = '$input->id_kunjungan' and id_kunjungan_lab IS NULL
                    ";
                    if($this->db->query($query)){
                        $output['status'] = "sukses";
                        $output['pesan'] = "Order Lab berhasil diupdate";
                    }else{
                        $output['status'] = "gagal";
                        $output['pesan'] = "Order Lab gagal diupdate";
                    }
                
            }else{
                $query = "
                    INSERT INTO order_lab(tgl_rencana_lab, order_produk, id_user, id_kunjungan,urut_masuk)
                    VALUES ('$input->tgl_rencana_lab',
                        '$json_order',
                        '$input->user', 
                        '$input->id_kunjungan',
                        $urut_masuk)
                ";
                if($this->db->query($query)){
                    $output['status'] = "sukses";
                    $output['pesan'] = "Order Lab berhasil ditambahkan";
                }else{
                    $output['status'] = "gagal";
                    $output['pesan'] = $query ;
                }
            }
        }
        $this->hasil($output);
    }
    
    function lookUpOrder(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'norm',
            'tgl_renc',
            'tgl_kunj',
        ];
            
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        if ($this->evalParam($input, $listParam)) {

        $parameter = '';
            if ($input->norm > '') {
                $parameter .= "AND pasien.no_rm = '$input->norm'";
            }
            if ($input->tgl_renc > '') {
                $parameter .= "AND order_lab.tgl_rencana_lab = '$input->tgl_renc'";
            }
            if ($input->tgl_kunj > '') {
                $parameter .= "AND kunjungan_lab.tgl_masuk = '$input->tgl_kunj'";
            }
                        

            $query = "
                SELECT pasien.no_rm,pasien.nama,pasien.alamat, order_lab.tgl_rencana_lab,transaksi.id_transaksi, unit.nama_unit, order_lab.order_produk, kunjungan_lab.id_kunjungan id_baru,kunjungan_lab.id_pegawai id_pembaca,baru.id_lis baru_lis,kunjungan_lab.tgl_keluar, kunjungan.id_kunjungan id_lama,kunjungan.id_pegawai id_pengirim,lama.id_lis lama_lis, kunjungan_lab.tgl_masuk tgl_masuk_lab,nama_kamar,id_lis_kamar,unit.id_unit,penjamin.nama_penjamin,TO_CHAR(tgl_lahir, 'dd Mon yyyy') as tgl_lahir,urut_masuk
                FROM order_lab
                JOIN kunjungan ON order_lab.id_kunjungan = kunjungan.id_kunjungan
                JOIN unit ON kunjungan.id_unit = unit.id_unit 
                LEFT JOIN kamar on kamar.id_kamar = kunjungan.id_kamar
                FULL JOIN kunjungan AS kunjungan_lab ON kunjungan_lab.id_kunjungan = order_lab.id_kunjungan_lab 
                JOIN transaksi ON (kunjungan_lab.id_transaksi = transaksi.id_transaksi OR kunjungan.id_transaksi = transaksi.id_transaksi)
                JOIN pasien ON transaksi.no_rm = pasien.no_rm 
                JOIN penjamin_transaksi ON transaksi.id_transaksi=penjamin_transaksi.id_transaksi
                JOIN penjamin on penjamin.id_penjamin=penjamin_transaksi.id_penjamin
                LEFT JOIN pegawai as baru on kunjungan_lab.id_pegawai = baru.id_pegawai
                LEFT JOIN pegawai as lama on kunjungan.id_pegawai=lama.id_pegawai
                WHERE (kunjungan_lab.id_unit LIKE '6%' OR kunjungan_lab.id_unit IS NULL)  and penjamin_transaksi.penjamin_utama ='t' ".$parameter." 
                ORDER BY id_transaksi DESC       
            "; 
            /*         
            $query = "
                SELECT pasien.no_rm,pasien.nama, order_lab.tgl_rencana_lab,transaksi.id_transaksi, unit.nama_unit, order_lab.order_produk, kunjungan_lab.id_kunjungan id_baru,kunjungan_lab.id_pegawai id_pembaca,kunjungan_lab.tgl_keluar, kunjungan.id_kunjungan id_lama,kunjungan.id_pegawai id_pengirim , kunjungan_lab.tgl_masuk tgl_masuk_lab,nama_kamar
                FROM order_lab
                JOIN kunjungan ON order_lab.id_kunjungan = kunjungan.id_kunjungan
                JOIN unit ON kunjungan.id_unit = unit.id_unit 
                LEFT JOIN kamar on kamar.id_kamar = kunjungan.id_kamar
                FULL JOIN kunjungan AS kunjungan_lab ON kunjungan_lab.id_kunjungan = order_lab.id_kunjungan_lab 
                JOIN transaksi ON (kunjungan_lab.id_transaksi = transaksi.id_transaksi OR kunjungan.id_transaksi = transaksi.id_transaksi)
                JOIN pasien ON transaksi.no_rm = pasien.no_rm 
                WHERE (kunjungan_lab.id_unit LIKE '6%' OR kunjungan_lab.id_unit IS NULL)  ".$parameter."  ORDER BY id_transaksi DESC       
            "; */


            $hasil = $this->db->query($query);
                        
            if ($hasil->getNumRows() > 0) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['data'] = $hasil->getResult();
            } else {
                $output['status'] = "gagal";
                $output['pesan'] = "Pasien tidak ditemukan";
            }
        }       
        echo json_encode($output);
    }

    public function lookUpOrderByKunjungan() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if($this->evalParam($input, $listParam)){
            $query = "
                SELECT
                    *
                FROM
                    order_lab
                WHERE
                    id_kunjungan = '$input->id_kunjungan'
                ORDER BY tgl_rencana_lab
            ";
            
            $output['status'] = "sukses";
            $output['data'] = $this->db->query($query)->getResult();
        }
        $this->hasil($output);
    }
    
    public function getListOrderProduk() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
            'tgl_rencana_lab',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if($this->evalParam($input, $listParam)){
            $query = "
                SELECT
                    order_produk
                FROM
                    order_lab
                WHERE
                    id_kunjungan = '$input->id_kunjungan'
                    AND tgl_rencana_lab = '$input->tgl_rencana_lab'
            ";
            
            $order_lab = $this->db->query($query);
            if($order_lab->getNumRows() == 1){
                $selected = $order_lab->getRow();
                $query = "
                    SELECT
                        *
                    FROM
                        produk
                    WHERE
                        id_produk IN $selected->order_produk
                ";
                $list_produk = $this->db->query($query);
                if($list_produk->getNumRows() > 0){
                    $output['status'] = "sukses";
                    $output['data'] = $list_produk->getResult();
                }else{
                    $output['pesan'] = "Produk tidak ditemukan";
                }
            }else{
                $output['status'] = "sukses";

            }
        }
        $this->hasil($output);
    }

    public function getListProdukLab() {
        $input = json_decode(file_get_contents('php://input'));
        
        $list_produk['status'] = "gagal";
        $list_produk['pesan'] = "";
        $list_produk['data'] = "";
        $query = "SELECT id_produk,nama_produk FROM produk WHERE id_produk IN $input";
        $list_produk['status'] = "sukses";                      
        $list_produk['data'] = $this->db->query($query)->getResult();
        echo json_encode($list_produk);     
    }
    
    public function getHasilLab(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'norm',
            'tgl_renc',
            'tgl_kunj',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        
            $parameter = '';
            if ($input->norm > '') {
                $parameter .= "AND pasien.no_rm = '$input->norm'";
            }
            if ($input->tgl_renc > '') {
                $parameter .= "AND order_lab.tgl_rencana_lab = '$input->tgl_renc'";
            }
            if ($input->tgl_kunj > '') {
                $parameter .= "AND baru.tgl_masuk = '$input->tgl_kunj'";
            }
            
                /* $query = "
                SELECT pasien.no_rm,pasien.nama,tgl_rencana_lab,transaksi.tgl_transaksi tgl_masuk,hasil_lab.id_kunjungan,order_lab.id_kunjungan kunj_lama,order_produk,baru.id_pegawai dok_baru,d_baru.nama_pegawai nama_baru, lama.id_pegawai dok_lama,d_lama.nama_pegawai nama_lama,nama_unit,nama_kamar
                FROM    hasil_lab               
                JOIN kunjungan baru on baru.id_kunjungan=hasil_lab.id_kunjungan             
                JOIN transaksi on transaksi.id_transaksi=baru.id_transaksi
                JOIN pasien ON transaksi.no_rm=pasien.no_rm 
                JOIN pegawai d_baru on baru.id_pegawai=d_baru.id_pegawai
                LEFT JOIN order_lab on order_lab.id_kunjungan_lab=baru.id_kunjungan
                LEFT JOIN kunjungan lama on order_lab.id_kunjungan=lama.id_kunjungan
                LEFT JOIN pegawai d_lama on lama.id_pegawai=d_lama.id_pegawai
                LEFT JOIN unit on lama.id_unit=unit.id_unit
                LEFT JOIN kamar on lama.id_kamar=kamar.id_kamar
                WHERE baru.id_cara_keluar is NOT null ORDER BY tgl_masuk DESC"; */
                
                $query = "
                SELECT pasien.no_rm,pasien.nama,pasien.alamat,baru.id_kunjungan kunj_baru,lama.id_kunjungan kunj_lama,tgl_rencana_lab,baru.tgl_masuk,lama.id_kamar,nama_kamar,id_lis_kamar,lama.id_unit,nama_unit,pengirim dok_lama,kirim.nama_pegawai nama_lama,kirim.id_lis kirim_lis,dokter dok_baru,baca.nama_pegawai nama_baru,baca.id_lis baca_lis,hasil_lab.no_lab_lis,cito,penjamin.nama_penjamin,TO_CHAR(tgl_lahir, 'dd Mon yyyy') as tgl_lahir,transaksi.id_transaksi,catatan
                FROM hasil_lab              
                JOIN kunjungan baru on baru.id_kunjungan=hasil_lab.id_kunjungan         
                left JOIN order_lab on order_lab.id_kunjungan_lab=baru.id_kunjungan         
                LEFT JOIN kunjungan lama on order_lab.id_kunjungan=lama.id_kunjungan 
                JOIN transaksi on (transaksi.id_transaksi=baru.id_transaksi or transaksi.id_transaksi=lama.id_transaksi)
                join pasien on pasien.no_rm=transaksi.no_rm                
                JOIN pegawai baca on baru.id_pegawai =baca.id_pegawai
                LEFT JOIN pegawai kirim on lama.id_pegawai=kirim.id_pegawai
                LEFT JOIN kamar on lama.id_kamar=kamar.id_kamar
                LEFT JOIN unit on lama.id_unit=unit.id_unit
                JOIN penjamin_transaksi ON transaksi.id_transaksi=penjamin_transaksi.id_transaksi
                JOIN penjamin on penjamin.id_penjamin=penjamin_transaksi.id_penjamin
                WHERE baru.id_cara_keluar is NOT null and penjamin_transaksi.penjamin_utama ='t' ".$parameter."ORDER BY baru.tgl_masuk DESC";
            
            if (!empty($this->db->query($query)->getResult())) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['data'] = $this->db->query($query)->getResult();
            } else {
                $output['status'] = "gagal";
                $output['pesan'] = "Pasien tidak ditemukan";
            }
        $this->hasil($output);
    }
    
    public function getHasilProdLab(){
        $input = json_decode(file_get_contents('php://input'));

        $listParam = [            
            'order_produk',
            'id_kunjungan_lab'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $query0="SELECT * FROM hasil_lab_detail WHERE id_kunjungan='$input->id_kunjungan_lab'  ";
        
        $query1 = "SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no, produk.id_produk,produk.nama_produk,indikator_hasil.nama_indikator_hasil,nilai_hasil_normal,satuan_indikator_hasil,indikator_hasil.id_indikator_hasil,hasil_lab_detail.hasil,hasil_lab_detail.abnormal
        FROM hasil_lab_detail        
        JOIN indikator_hasil on hasil_lab_detail.id_indikator_hasil=indikator_hasil.id_indikator_hasil
        JOIN map_produk_indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=indikator_hasil.id_indikator_hasil
        JOIN produk on map_produk_indikator_hasil.id_produk=produk.id_produk
        WHERE id_kunjungan='$input->id_kunjungan_lab' and  produk.id_produk IN $input->order_produk";
        
        $query20="SELECT ROW_NUMBER () OVER ( ORDER BY detail_transaksi.id_produk ) AS no,detail_transaksi.id_produk,map_produk_indikator_hasil.id_indikator_hasil
        FROM detail_transaksi        
        JOIN map_produk_indikator_hasil on detail_transaksi.id_produk=map_produk_indikator_hasil.id_produk  
        WHERE detail_transaksi.id_kunjungan='$input->id_kunjungan_lab' and  detail_transaksi.id_produk IN $input->order_produk";

        $query21="SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no,detail_transaksi.id_produk,produk.nama_produk,indikator_hasil.nama_indikator_hasil,indikator_hasil.nilai_hasil_normal,indikator_hasil.satuan_indikator_hasil,indikator_hasil.id_indikator_hasil
        FROM detail_transaksi        
        JOIN produk on detail_transaksi.id_produk=produk.id_produk
        JOIN map_produk_indikator_hasil on produk.id_produk=map_produk_indikator_hasil.id_produk
        JOIN indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=indikator_hasil.id_indikator_hasil
        WHERE detail_transaksi.id_kunjungan='$input->id_kunjungan_lab' and  produk.id_produk IN $input->order_produk";
        
        $query22="SELECT ROW_NUMBER () OVER ( ORDER BY detail_transaksi.id_produk ) AS no,detail_transaksi.id_produk,produk.nama_produk,map_produk_indikator_hasil.id_indikator_hasil,item_periksa_lab.nmtestind nama_indikator_hasil,item_periksa_lab.unittest satuan_indikator_hasil
        FROM detail_transaksi        
        JOIN produk on detail_transaksi.id_produk=produk.id_produk
        JOIN map_produk_indikator_hasil on detail_transaksi.id_produk=map_produk_indikator_hasil.id_produk
                join item_periksa_lab on map_produk_indikator_hasil.id_indikator_hasil=item_periksa_lab.id
        WHERE detail_transaksi.id_kunjungan='$input->id_kunjungan_lab' and  produk.id_produk IN $input->order_produk";

        $query3="SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no, produk.id_produk,produk.nama_produk,item_periksa_lab.nmtestind nama_indikator_hasil,item_periksa_lab.unittest satuan_indikator_hasil,hasil_lab_detail.id_indikator_hasil,hasil_lab_detail.hasil,hasil_lab_detail.abnormal
        FROM hasil_lab_detail        
        JOIN item_periksa_lab on hasil_lab_detail.id_indikator_hasil=item_periksa_lab.id
        JOIN map_produk_indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=hasil_lab_detail.id_indikator_hasil
        JOIN produk on produk.id_produk=map_produk_indikator_hasil.id_produk
        WHERE id_kunjungan='$input->id_kunjungan_lab' and produk.id_produk IN $input->order_produk";

        if(empty($this->db->query($query0)->getResult())){
            $hasil=$this->db->query($query20)->getRow();
            if($hasil->id_indikator_hasil<10000){
                $list_produk['status'] = "sukses";                      
                $list_produk['data'] = $this->db->query($query21)->getResult();
            }else{
                $list_produk['status'] = "sukses";                      
                $list_produk['data'] = $this->db->query($query22)->getResult();  
            }                
        }else{
            $hasil=$this->db->query($query0)->getRow();
            if($hasil->id_indikator_hasil<10000){
                $list_produk['status'] = "sukses";                      
                $list_produk['data'] = $this->db->query($query1)->getResult();
            }else{
                $list_produk['status'] = "sukses";                      
                $list_produk['data'] = $this->db->query($query3)->getResult();
            }
        }
        echo json_encode($list_produk);  
    }
    
    public function getProdhasil(){
        $input = json_decode(file_get_contents('php://input'));

        $listParam = [            
            'order_produk',
            'id_kunjungan_lab'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $query = "SELECT id_produk 
                from detail_transaksi 
                JOIN kunjungan on kunjungan.id_kunjungan=detail_transaksi.id_kunjungan
                WHERE kunjungan.tgl_keluar is not NULL and detail_transaksi.id_kunjungan='$input'";
        
        $list_produk['status'] = "sukses";                      
        $list_produk['data'] = $this->db->query($query)->getResult();
        echo json_encode($list_produk); 
    }

    public function getNotiflab(){
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $query = "SELECT ROW_NUMBER () OVER ( ORDER BY transaksi.id_transaksi DESC) AS nomor,nama,no_rm,tgl_masuk,(SELECT COUNT(*) FROM kunjungan WHERE id_unit LIKE '6%' AND tgl_keluar is NULL)
        FROM kunjungan
        JOIN transaksi USING(id_transaksi)
        JOIN pasien USING (no_rm)
        WHERE id_unit LIKE '6%' AND tgl_keluar is NULL
        ORDER BY id_transaksi DESC";
        
        $hasil = $this->db->query($query);
        
        if ($hasil) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['id']       = '09001';
            $output['data']     = $hasil->getResult();
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "";
        }  
        // if ($hasil->getNumRows() => 0) {
            // $output['status'] = "sukses";
            // $output['pesan'] = "";
            // $output['data'] = $hasil->getResult();
        // }
        
        echo json_encode($output); 
    }
    
    public function generateKunjungan() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
            'tgl_rencana_lab',
            'dokter_lab',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if($this->evalParam($input, $listParam)){
            $query = "
                SELECT
                    order_produk
                FROM
                    order_lab
                    JOIN kunjungan USING ( id_kunjungan )
                WHERE
                    id_kunjungan = '$input->id_kunjungan'
                    AND tgl_rencana_lab = '$input->tgl_rencana_lab'
            ";
            
            $order_lab = $this->db->query($query);
            if($order_lab->getNumRows() == 1){
                $selected = $order_lab->getRow();
                
            }else{
                $output['pesan'] = "Order tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    
    public function produk(){
      $input = json_decode(file_get_contents('php://input'));
      $query = "SELECT * from produk WHERE id_jenis_produk='3' ";
      $output['produk'] =$this->db->query($query)->getResult();
      $output['status'] = "sukses";
      $output['pesan'] = "";
      echo json_encode($output);
    }
    
    public function produklabby(){
      $input = json_decode(file_get_contents('php://input'));
      $query = "SELECT * from produk WHERE id_jenis_produk='3' and upper(nama_produk) like upper('%$input->produk%') ";
      $output['produk'] =$this->db->query($query)->getResult();
      $output['status'] = "sukses";
      $output['pesan'] = "";
      echo json_encode($output);
    }
    
    public function produkRad(){
      $input = json_decode(file_get_contents('php://input'));
      $query = "SELECT * from produk WHERE left(kd_produk,2)='$input->kode' ";
      $output['produk'] =$this->db->query($query)->getResult();
      $output['status'] = "sukses";
      $output['pesan'] = "";
      echo json_encode($output);
    }
    
    public function dokterLab(){    
      $output = array();    
      $query = "SELECT * from dokter_klinik 
                JOIN pegawai USING (id_pegawai) 
                WHERE id_unit LIKE '6%'";      
      $output['status'] = "sukses";
      $output['pesan'] = "";
      $output['data'] =$this->db->query($query)->getResult();
      echo json_encode($output);
    }
    
    public function produkLab(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [          
            'id_penjamin'
        ];
        $output = array();  
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if($this->evalParam($input, $listParam)){
            $parameter = '';
            if ($input->produk > '') {
                $parameter .= "AND LOWER(kd_produk) LIKE '$input->kd_produk%'";
            }
            if ($input->nama_produk > '') {
                $parameter .= "AND LOWER(nama_produk) LIKE '%$input->nama_produk%'";
            }           
            if ($parameter == '') {
                $query = "SELECT ROW_NUMBER () OVER ( ORDER BY id_produk ) AS no, id_produk,kd_produk,nama_produk,harga,id_tarif,nama_unit FROM produk JOIN tarif USING (id_produk) JOIN unit USING(id_unit) WHERE tgl_selesai is null AND id_jenis_produk='3' AND id_penjamin=$input->id_penjamin AND id_unit='$input->id_unit'";
            } else {
                $query = "
                SELECT ROW_NUMBER () OVER ( ORDER BY id_produk ) AS no, id_produk,kd_produk,nama_produk,harga,id_tarif,nama_unit FROM produk JOIN tarif USING (id_produk) JOIN unit USING(id_unit) WHERE tgl_selesai is null AND id_jenis_produk='3' AND id_penjamin=$input->id_penjamin AND id_unit='$input->id_unit'".$parameter."  
            ";
            
            } 
        $output['status'] = "sukses";           
        $output['data'] = $this->db->query($query)->getResult();            
        }
        echo json_encode($output);
    }
    
    public function listPenjamnLab(){
      $input = json_decode(file_get_contents('php://input'));
    // var_dump($input);
      $output=array();
      $output['status'] = "gagal";
      $output['pesan'] = "";
      $output['data'] = "";
      $query = "SELECT id_penjamin, nama_penjamin  from penjamin  JOIN penjamin_transaksi USING (id_penjamin)  JOIN transaksi on penjamin_transaksi.id_transaksi=transaksi.id_transaksi JOIN pasien on pasien.no_rm=transaksi.no_rm WHERE pasien.no_rm = '".$input->no_rm."' AND transaksi.id_transaksi=$input->id_transaksi";
      $output['data'] =$this->db->query($query)->getResult();
      $output['status'] = "sukses";
      $output['pesan'] = "";
      echo json_encode($output);
    }
    
    public function saveKunjunganLab(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam=[
            'id_unit',
            'id_transaksi',
            'id_pegawai',
            'status_kunjungan'
        ];

        $hasil = array();
        $hasil['status']    = "gagal";
        $hasil['pesan']     = "";
        $hasil['data']      = "";
        
        //Cek tutup transaksi
        $queryCektutup="SELECT * FROM transaksi WHERE id_transaksi= $input->id_transaksi";
        $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;

        if(empty($cekTgltutup)){
            //Cek Kunjungan lab 
            $queryCeknull = "SELECT * FROM order_lab WHERE id_kunjungan = $input->id_kunjungan AND tgl_rencana_lab = '".$input->tgl_rencana_lab."' AND urut_masuk=$input->urut ORDER BY urut_masuk desc";
            $cekNull=$this->db->query($queryCeknull)->getResult();

            if(empty($cekNull[0]->id_kunjungan_lab)){
                if($this->evalParam($input,$listParam)){
                
                    $queryaddKunj="INSERT INTO Kunjungan("
                                    . "id_unit, "
                                    . "id_transaksi, "
                                    . "id_pegawai,"
                                    . "status_kunjungan"
                                    . ") VALUES("
                                    . "'6001',"
                                    . "'".$input->id_transaksi."',"
                                    . "'".$input->id_pegawai."',"
                                    . "'".$input->status_kunjungan."') returning id_kunjungan";
                
                    $queryaddDetilKunj="";      

                    //Start Query Checking
                    $this->db->transStart();
                    $id_kunjungan = $this->db->query($queryaddKunj)->getRow()->id_kunjungan;
                    
                    $queryaddhasillab = "INSERT INTO hasil_lab (id_kunjungan,pengirim,dokter)VALUES($id_kunjungan,'$input->id_pengirim','$input->id_pegawai')";
            
                    $this->db->query($queryaddhasillab);
                    
                    $queryUpdateOrderLab="UPDATE order_lab set id_kunjungan_lab='".$id_kunjungan."' WHERE tgl_rencana_lab='".$input->tgl_rencana_lab."' AND id_kunjungan='".$input->id_kunjungan."'AND urut_masuk=".$cekNull[0]->urut_masuk." ";
                    $this->db->query($queryUpdateOrderLab);
                    
                    // $queryUpdatePosting="UPDATE Kunjungan set posting='t' WHERE  id_transaksi='".$input->id_transaksi."'";
                    // $this->db->query($queryUpdatePosting);
                    
                    foreach($input->id_produk as $produk_baru){
                        
                        $id_produk = $produk_baru->id_produk;
                        $queryaddDetilKunj = "INSERT INTO detail_kunjungan(id_kunjungan, id_produk ) VALUES('".$id_kunjungan."','".$id_produk."') returning id_detail_kunjungan;";
                        $id_detail_kunjungan = $this->db->query($queryaddDetilKunj)->getRow()->id_detail_kunjungan;
                    
                        // $queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$id_produk." AND id_penjamin=$input->id_penjamin;";//pake return id_tarif   biasa   
                        $queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$id_produk." AND id_penjamin=$input->id_penjamin AND id_unit='$input->id_unit';";//pake return id_tarif Per kelas
                        $tarif = $this->db->query($queryTarif)->getResult();                    


                        $queryDetilTrans="INSERT INTO detail_transaksi("
                                        . "id_transaksi, "
                                        . "id_kunjungan, "                          
                                        . "id_produk, "
                                        . "id_tarif, "
                                        . "qty, "
                                        . "harga,"
                                        . "total_harga,"
                                        . "id_detail_kunjungan"                         
                                        . ") VALUES("
                                        . "'".$input->id_transaksi."',"
                                        . "'".$id_kunjungan."',"
                                        . "'".$id_produk."',"
                                        . "".$tarif[0]->id_tarif.","
                                        . "'1',"
                                        . "".$tarif[0]->harga.","   
                                        . "".$tarif[0]->harga.","
                                        . "'".$id_detail_kunjungan."')returning id_detail_transaksi;";
                        $id_detail_transaksi = $this->db->query($queryDetilTrans)->getRow()->id_detail_transaksi;
                        
                        $queryDetilComp="UPDATE detail_component set id_pegawai='".$input->id_pegawai."' WHERE id_jenis_component='3' AND id_detail_transaksi='".$id_detail_transaksi."'";
                
                        $this->db->query($queryDetilComp);
                    }
                    
                    //End Query Checking
                    $this->db->transComplete(); 
                    
                    if($this->db->transStatus()){
                        $hasil['status']   = "sukses";
                        $hasil['pesan']   = "Berhasil";
                        $hasil['data'] = $id_kunjungan;
                    }else{
                        $hasil['status']   = "gagal";
                        $hasil['pesan']   = "";
                        $hasil['data'] = "";
                    }
                }
            }else{
                $hasil['pesan']  = "Kunjungan sudah ada";
            }
        }else{
            $hasil['pesan']  = "Silahkan Hubungi Kasir";
        }
        echo json_encode($hasil);           
    }

    public function saveProdLab(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam=[
            'id_unit',
            'id_transaksi',
            'id_pegawai',
            'id_penjamin',
            'id_kunjungan_lab',
            'id_produk'
        ];
    
        $hasil = array();
        $hasil['status']    = "gagal";
        $hasil['pesan']     = "";
        $hasil['data']      = "";
        
        //Cek tutup transaksi
        $queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
        $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
        
        if(empty($cekTgltutup)){
            if($this->evalParam($input,$listParam)){
                //Start Query Checking
                $this->db->transStart();
                $queryaddDetilKunj = "INSERT INTO detail_kunjungan("
                                    . "id_kunjungan, "
                                    . "id_produk "
                                    . ") VALUES("
                                    . "'".$input->id_kunjungan_lab."',"
                                    . "'".$input->id_produk."')returning id_detail_kunjungan;";         
            
                // $queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$input->id_produk." AND id_penjamin=$input->id_penjamin";
                $queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$input->id_produk." AND id_penjamin=$input->id_penjamin AND id_unit='$input->id_unit'";
                $queryUpdatePosting="UPDATE kunjungan set posting='t' WHERE  id_kunjungan='".$input->id_kunjungan_lab."'";
                $this->db->query($queryUpdatePosting);
                
                $id_detail_kunjungan = $this->db->query($queryaddDetilKunj)->getRow()->id_detail_kunjungan;
                $id_tarif = $this->db->query($queryTarif)->getRow();
                
                $queryDetilTrans="INSERT INTO detail_transaksi("
                                            . "id_transaksi, "
                                            . "id_kunjungan, "                          
                                            . "id_produk, "
                                            . "id_tarif, "
                                            . "qty, "
                                            . "id_detail_kunjungan"                         
                                            . ") VALUES ("
                                            . "'".$input->id_transaksi."',"
                                            . "'".$input->id_kunjungan_lab."',"
                                            . "'".$input->id_produk."',"
                                            . "'".$id_tarif->id_tarif."',"
                                            . "'1',"
                                            . "'".$id_detail_kunjungan."')returning id_detail_transaksi;";
                    
                $id_detail_transaksi = $this->db->query($queryDetilTrans)->getRow()->id_detail_transaksi;
                
                $queryDetilComp="UPDATE detail_component set id_pegawai='".$input->id_pegawai."' WHERE id_jenis_component='3' AND id_detail_transaksi='".$id_detail_transaksi."'";
                // var_dump($queryDetilComp);
                $this->db->query($queryDetilComp);
            
                //End Query Checking
                $this->db->transComplete(); 
                if($this->db->transStatus()){
                    $hasil['status']   = "sukses";
                    $hasil['pesan']   = "Berhasil";
                }else{
                    $hasil['status']   = "gagal";
                    $hasil['pesan']   = "";
                    $hasil['data'] = "";
                }
                echo json_encode($hasil);
            }
        }
    }
    
    public function delDetilProd(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan_lab',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $delet_prod = " DELETE FROM detail_transaksi WHERE id_kunjungan='$input->id_kunjungan_lab' AND id_produk='$input->id_produk' AND tgl_input='$input->tgl_input';DELETE FROM detail_kunjungan WHERE id_kunjungan='$input->id_kunjungan_lab' AND id_produk='$input->id_produk'; ";         
            if ($this->db->query($delet_prod)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Hapus Produk";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Produk";
            }                       
        $this->hasil($output); 
        }
    }
    
    public function viewDetail(){
        $input = json_decode(file_get_contents('php://input'));     

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
            $detil_transaksi = "SELECT ROW_NUMBER () OVER ( ORDER BY id_detail_transaksi ) AS no, produk.id_produk,produk.nama_produk,id_detail_kunjungan, pegawai.nama_pegawai,tgl_input,detail_transaksi.total_harga
            FROM detail_transaksi 
            JOIN produk USING(id_produk)
            JOIN kunjungan USING (id_kunjungan)
            JOIN pegawai USING(id_pegawai)
            JOIN detail_kunjungan USING (id_detail_kunjungan)
            WHERE kunjungan.id_kunjungan = $input->id_kunjungan_lab";
            
            $output['status'] = "sukses";
            $output['data'] = /* */$this->db->query($detil_transaksi)->getResult();
            
        echo json_encode($output); 
    }
    
    public function cektransLngsung(){
        $input = json_decode(file_get_contents('php://input'));     

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $cekTrans = "SELECT tgl_tutup FROM transaksi WHERE no_rm='$input'";
        
        $output['status'] = "sukses";
        $output['data'] = /* */$this->db->query($cekTrans)->getResult();
            
        echo json_encode($output); 
    }
    
    public function cekhasilLngsung(){
        $input = json_decode(file_get_contents('php://input'));     

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $cekTrans = "SELECT pengirim FROM hasil_lab WHERE id_kunjungan='$input'";
        
        $output['status'] = "sukses";
        $output['data'] = /* */$this->db->query($cekTrans)->getRow();
            
        echo json_encode($output); 
    }
    
    public function cekLISprod(){
        $input = json_decode(file_get_contents('php://input'));     

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $cekTrans = "SELECT id_produk 
                from detail_transaksi 
                JOIN kunjungan on kunjungan.id_kunjungan=detail_transaksi.id_kunjungan
                WHERE detail_transaksi.id_kunjungan='$input'";
        $prod_order=$this->db->query($cekTrans)->getResult();
    
        $arr_prod_LIS=[];
        for($i=0;$i<count($prod_order);$i++){
            
            $id_liat_prod[$i]=$prod_order[$i]->id_produk;
            // $queryprodLIS="SELECT id 
            //          FROM produk
            //          JOIN item_periksa_lab on (produk.nama_produk=item_periksa_lab.nmtestind) or (produk.nama_produk=item_periksa_lab.nmtesteng)
            //          WHERE id_produk='$id_liat_prod[$i]'";
                        
            $queryprodLIS="SELECT id_produk,id_indikator_hasil id,nama_produk
                        FROM map_produk_indikator_hasil
                        JOIN  produk USING (id_produk)                      
                        WHERE id_indikator_hasil >100000 AND id_produk='$id_liat_prod[$i]'";
                        
            $id_pr=$this->db->query($queryprodLIS)->getResult();
            
            if(empty($id_pr)){
                $out = "gagal";
                $pesan = "Indikator Tidak Ditemukan";
            }else{
                $out = "sukses";
                $pesan = "";
                foreach ($id_pr as $key) {
                    array_push($arr_prod_LIS, (object)[
                        'id_pemeriksaan' => $key->id,
                        'status' => 'add'
                    ]);
                }               
            }
        }
        
        $output['status'] = $out;
        $output['pesan']  = $pesan;
        $output['data'] = $arr_prod_LIS;
            
        echo json_encode($output); 
    }
    
    public function CariLisKamar(){
        $input = json_decode(file_get_contents('php://input'));     

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $cekkmar="SELECT * FROM kamar WHERE id_unit='$input'";
        // var_dump($cekkmar);return;
        if ($this->db->simpleQuery($cekkmar)) { //true
              $output['status'] = "sukses";
              $output['pesan']  = "";
              $output['data'] = /* */$this->db->query($cekkmar)->getResult();
          } else {
              $output['status'] = "gagal";
              $output['pesan'] = "update gagal, silahkan ulangi!";
          }
            
        echo json_encode($output); 
    }
    
    public function saveKunjunganLabLangsung(){
        $input = json_decode(file_get_contents('php://input')); 
        $listParam = [
            'nik',
            'nama',
            'hubungan',
            'no_hp',
            'alamat',
            'id_user',
            'no_rm'
        ];

        $hasil = array();
        $hasil['status']   = "gagal";
        $hasil['pesan']    = "";
        
        if($this->evalParam($input, $listParam)){
            //Start Query Checking
            $this->db->transStart();
            $queryaddTrans = "INSERT INTO transaksi("
                                . "id_user, "
                                . "no_rm, "
                                . "id_penanggung_jawab,"
                                . "hubungan_penanggung_jawab,"
                                . "no_hp_penanggung_jawab,"
                                . "alamat_penanggung_jawab"
                                . ") VALUES("
                                . "'".$input->id_user."',"
                                . "'".$input->no_rm."',"
                                . "'".$input->nik."',"
                                . "'".$input->hubungan."',"
                                . "'".$input->no_hp."',"
                                . "'".$input->alamat."')returning id_transaksi";
            $id_transaksi = $this->db->query($queryaddTrans)->getRow()->id_transaksi;
            
            $queryaddpenjmTrans="INSERT INTO penjamin_transaksi("
                                . "id_transaksi, "
                                . "id_penjamin, "
                                . "cara_masuk"
                                . ") VALUES("
                                . "'".$id_transaksi."',"
                                . "'1',"
                                . "'2')";
            $this->db->query($queryaddpenjmTrans);
            
            $queryaddKunjRad="INSERT INTO kunjungan("
                                . "id_unit, "
                                . "id_transaksi, "
                                . "id_pegawai"
                                . ") VALUES("
                                . "'6001',"
                                . "'".$id_transaksi."',"
                                . "'".$input->id_pegawai."')returning id_kunjungan";
            $id_kunjungan=$this->db->query($queryaddKunjRad)->getRow()->id_kunjungan;
            
            $queryaddhasillab = "INSERT INTO hasil_lab (id_kunjungan,pengirim,cito)VALUES($id_kunjungan,null,'$input->cito')";
    // var_dump($queryaddhasillab);
            $this->db->query($queryaddhasillab);
            
            foreach($input->produk as $produk_baru){
                    $id_produk = $produk_baru->id_produk;
                    $queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$id_produk." AND id_penjamin='1' AND id_unit='6001';";//pake return id_tarif fixed

                    $queryaddDetilKunj = "INSERT INTO detail_kunjungan("
                                    . "id_kunjungan, "
                                    . "id_produk "
                                    . ") VALUES("
                                    . "'".$id_kunjungan."',"
                                    . "'".$id_produk."')returning id_detail_kunjungan;";
            // var_dump($queryTarif);
                    $id_detail_kunjungan = $this->db->query($queryaddDetilKunj)->getRow()->id_detail_kunjungan;
                    $tarif = $this->db->query($queryTarif)->getRow()->id_tarif;
                    
                    $queryDetilTrans="INSERT INTO detail_transaksi("
                                    . "id_transaksi, "
                                    . "id_kunjungan, "                          
                                    . "id_produk, "
                                    . "id_tarif, "
                                    . "qty, "
                                    . "id_detail_kunjungan"                         
                                    . ") VALUES("
                                    . "'".$id_transaksi."',"
                                    . "'".$id_kunjungan."',"
                                    . "'".$id_produk."',"
                                    . "".$tarif.","
                                    . "'1',"
                                    . "'".$id_detail_kunjungan."')returning id_detail_transaksi;";
                    $id_detail_transaksi = $this->db->query($queryDetilTrans)->getRow()->id_detail_transaksi;
                    
                    $queryDetilComp="UPDATE detail_component set id_pegawai='".$input->id_pegawai."' WHERE id_jenis_component='3' AND id_detail_transaksi='".$id_detail_transaksi."'";
                    $this->db->query($queryDetilComp);  
                }
                // var_dump($queryaddDetilKunj);
            $queryoutput="SELECT id_pegawai,nama_pegawai,no_rm,nama,id_kunjungan,alamat,id_transaksi
                        FROM kunjungan
                        JOIN transaksi USING (id_transaksi)
                        JOIN pegawai USING (id_pegawai)
                        JOIN pasien USING (no_rm)
                        WHERE   ( id_kunjungan IS NOT NULL OR id_unit LIKE'6%' ) 
                        AND id_kunjungan=$id_kunjungan";
            $output=$this->db->query($queryoutput)->getResult();
            
            $querypenyakit = "
                INSERT INTO mr_penyakit (no_rm,id_unit,id_penyakit,id_kunjungan,status_diag,id_transaksi)VALUES(
                '$input->no_rm','6001','$input->diagnosa',$id_kunjungan,0,$id_transaksi)";
            $this->db->query($querypenyakit);
            
            //End Query Checking
            $this->db->transComplete();             
            
            if($this->db->transStatus()){
                $hasil['status']   = "sukses";
                $hasil['pesan']   = "Berhasil";
                $hasil['data'] = $output;
            }else{
                $hasil['status']   = "gagal";
                $hasil['pesan']   = "";
                $hasil['data'] = "";
            }
            echo json_encode($hasil);
        }
    }
    
    public function viewCaraKeluar(){
        $query = "SELECT * FROM cara_keluar";       
        $output['status'] = "sukses";
        $output['data'] = /* */$this->db->query($query)->getResult();
        echo json_encode($output); 
    }
    
    public function savePasienKeluar(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
            'id_cara_keluar'
        ];
        
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $json_order='';         
            for($i=0;$i<count($input->id_produk);$i++){             
                $id_produk = $input->id_produk[$i]->id_produk;
                $json_order=$json_order."''".$id_produk."'',";  
            }
            $order=substr($json_order, 0, -1);
            
            $query="UPDATE kunjungan SET id_cara_keluar=".$input->id_cara_keluar.", tgl_keluar= CURRENT_DATE, jam_keluar= CURRENT_TIMESTAMP,posting='t' 
            WHERE id_kunjungan='$input->id_kunjungan'";
            $queryupdate = "UPDATE order_lab SET order_produk = '($order)' WHERE id_kunjungan_lab = $input->id_kunjungan";
            $queryupdate2 = "UPDATE hasil_lab SET pengirim = '$input->pengirim' WHERE id_kunjungan = $input->id_kunjungan";
            
            $this->db->query($query);
            $this->db->query($queryupdate);
            $this->db->query($queryupdate2);

            if ($this->db->simpleQuery($query)) { //true
              $output['status'] = "sukses";
              $output['pesan']  = "Berhasil";
          } else {
              $output['status'] = "gagal";
              $output['pesan'] = "update gagal, silahkan ulangi!";
          }
        }else{
            $output['status'] = "gagal";
            $output['pesan'] = "Inputan Masih Kosong!";
        }       
        echo json_encode($output); 
    }
    
    public function saveHasilLab(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'hasil_pembacaan',
            'id_kunjungan_lab',
            'id_indikator_hasil'
        ];
        
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $queryCeknull="SELECT * from hasil_lab_detail WHERE id_kunjungan=$input->id_kunjungan_lab";
            if(!empty($this->db->query($queryCeknull)->getRow())){
                // $status="gagal";
                // $pesan = "Sudah Ada Hasil";
                $this->db->transStart();
                
                $queryupdate = "UPDATE hasil_lab SET dokter = '$input->user' WHERE id_kunjungan = $input->id_kunjungan_lab";
                $this->db->query($queryupdate);
                for($i=0;$i<count($input->hasil_pembacaan);$i++){
                    $query="
                            UPDATE hasil_lab_detail set hasil='".$input->hasil_pembacaan[$i]."',abnormal='".$input->check[$i]."' WHERE id_kunjungan=$input->id_kunjungan_lab AND id_indikator_hasil=".$input->id_indikator_hasil[$i]."
                            ";
                            // var_dump($query);return;
                            $this->db->query($query);
                }
                $queryCatat="UPDATE hasil_lab SET catatan='$input->catatan' WHERE id_kunjungan=$input->id_kunjungan_lab";
                $this->db->query($queryCatat);
                $status="sukses";
                $pesan="Berhasil";
                //End Query Checking
                $this->db->transComplete();
            }else{
                $this->db->transStart();
                
                $queryupdate = "UPDATE hasil_lab SET dokter = '$input->user' WHERE id_kunjungan = $input->id_kunjungan_lab";
                $this->db->query($queryupdate);
                for($i=0;$i<count($input->hasil_pembacaan);$i++){
                    $query="
                            INSERT INTO hasil_lab_detail (id_kunjungan,id_indikator_hasil,hasil,normal,abnormal)VALUES(
                            $input->id_kunjungan_lab,
                            ".$input->id_indikator_hasil[$i].",
                            '".$input->hasil_pembacaan[$i]."',
                            '".$input->nilai_hasil_normal[$i]."',
                            '".$input->check[$i]."');
                            ";
                            // var_dump($query);return;
                            $this->db->query($query);
                }
                $queryCatat="UPDATE hasil_lab SET catatan='$input->catatan' WHERE id_kunjungan=$input->id_kunjungan_lab";
                $this->db->query($queryCatat);
                
                $status="sukses";
                $pesan="Berhasil";
                //End Query Checking
                $this->db->transComplete();
            }
            // var_dump($this->db->query($queryCeknull)->getRow());
        }
        
        if($this->db->transStatus()){ //true
          $output['status'] = $status;
          $output['pesan']  = $pesan;
        } else {
          $output['status'] = "gagal";
          $output['pesan'] = "update gagal, silahkan ulangi!";
        }
        echo json_encode($output);      
    }
    
    public function dellistorder(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
            'urut_masuk'
        ];
        
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
        $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
        
        if(empty($cekTgltutup)){
            if(!empty($input->id_kunjungan)){
                $queryCekkunj_lab="SELECT * from order_lab WHERE id_kunjungan='$input->id_kunjungan' and urut_masuk='$input->urut_masuk'";
                $cekKunj_lab=$this->db->query($queryCekkunj_lab)->getRow()->id_kunjungan_lab;
                if(!empty($cekKunj_lab)){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Order Sudah Dilakukan \n Hapus Order Jika Ingin Melanjutkan";
                }else{
                    $delet_ord = "DELETE FROM order_lab WHERE id_kunjungan='$input->id_kunjungan' and urut_masuk='$input->urut_masuk'";     

                    if ($this->db->query($delet_ord)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Hapus Produk";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Hapus Produk";
                    }     
                }                                  
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Ini Kunjungan Langsung \n Hubungi Kasir Jika Ingin Melanjutkan";
            }
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Transaksi Sudah di Tutup \n Hubungi Kasir Jika Ingin Melanjutkan";
        }
        $this->hasil($output); 
    }
    
    public function deleteorder(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan_lab',
            'id_transaksi'
        ];
        
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
            $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
            if(empty($cekTgltutup)){
                $delet_kunj = "DELETE FROM kunjungan WHERE id_kunjungan='$input->id_kunjungan_lab';DELETE FROM hasil_lab WHERE id_kunjungan='$input->id_kunjungan_lab';";     
    
                if ($this->db->query($delet_kunj)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus Produk";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Produk";
                }                       
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Transaksi Sudah di Tutup";
            }   
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Oder Belum Dilakukan";
        }
        $this->hasil($output); 
    }
    
    public function deleteorderlngsung(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan_lab',
            'id_transaksi'
        ];
        
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $queryCektutup="SELECT * FROM transaksi WHERE id_transaksi = $input->id_transaksi";
            $cekTgltutup = $this->db->query($queryCektutup)->getRow()->tgl_tutup;
            if(empty($cekTgltutup)){
                $delet_kunj = "DELETE FROM detail_kunjungan WHERE id_kunjungan='$input->id_kunjungan_lab';UPDATE kunjungan set tgl_keluar=null,id_cara_keluar=null,jam_keluar=null WHERE id_kunjungan='$input->id_kunjungan_lab';";     /* DELETE FROM hasil_lab WHERE id_kunjungan='$input->id_kunjungan_lab'; */
    // var_dump($delet_kunj);return;
                if ($this->db->query($delet_kunj)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus Produk";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Produk";
                }                       
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Transaksi Sudah di Tutup";
            }   
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Oder Belum Dilakukan";
        }
        $this->hasil($output); 
    }
    
    public function saveLis(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_lab',
            'id_kunjungan',
            'id'
        ];
        
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        
        if($this->evalParam($input, $listParam)){
            $query="UPDATE hasil_lab SET no_lab_lis='$input->no_lab', id_lis=$input->id WHERE id_kunjungan=$input->id_kunjungan;UPDATE order_lab SET no_lab_lis='$input->no_lab', id_lis=$input->id WHERE id_kunjungan_lab=$input->id_kunjungan;";
            //var_dump($query);return;
            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Simpan Order";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Order";
            }
        }else{
            $output['status'] = "gagal";
            $output['pesan'] = "Inputan Masih Kosong!";
        }
        
        echo json_encode($output); 
    }
    
    public function saveHasilLISLab(){
        $input = json_decode(file_get_contents('php://input'));     

        $listParam = [
            'id_kunjungan_lab'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if($this->evalParam($input, $listParam)){
            $queryCeknull="SELECT * from hasil_lab_detail WHERE id_kunjungan=$input->id_kunjungan_lab";
            if(!empty($this->db->query($queryCeknull)->getRow())){
                $status="gagal";
                $pesan = "Sudah Ada Hasil";
            }else{
                $this->db->transStart();

                $queryupdate = "UPDATE hasil_lab SET dokter = '$input->user' WHERE id_kunjungan = $input->id_kunjungan_lab";
                $this->db->query($queryupdate);
            
                for($i=0;$i<count($input->pemeriksaan);$i++){
                    $abnormal='';
                    if($input->pemeriksaan[$i]->flag=='L'){$abnormal=1;}else if($input->pemeriksaan[$i]->flag=='H'){$abnormal=1;}else{$abnormal=0;}
                    $query="
                            INSERT INTO hasil_lab_detail (id_kunjungan,id_indikator_hasil,hasil,normal,abnormal)VALUES(
                            $input->id_kunjungan_lab,
                            ".$input->pemeriksaan[$i]->id.",
                            '".$input->pemeriksaan[$i]->hasil."',
                            '".$input->pemeriksaan[$i]->nilnor."',
                            '".$abnormal."');
                            ";
                            // var_dump($query,$input->pemeriksaan[$i]->flag);return;
                            $this->db->query($query);
                }
                
                $queryCatat="UPDATE hasil_lab SET catatan='$input->catatan' WHERE id_kunjungan=$input->id_kunjungan_lab";
                $this->db->query($queryCatat);
                
                $status="sukses";
                $pesan="Berhasil";
                //End Query Checking
                $this->db->transComplete();
                if($this->db->transStatus()){ //true
                  $output['status'] = $status;
                  $output['pesan']  = $pesan;
                } else {
                  $output['status'] = "gagal";
                  $output['pesan'] = "update gagal, silahkan ulangi!";
                }
            }
        }else{
            $output['status'] = "gagal";
            $output['pesan'] = "Masih ada yang kosong!";
        }
        
        echo json_encode($output); 
    }
    
    public function cetakhasil(){
        $input = json_decode(file_get_contents('php://input'));
        $produk   = $_POST['order_produk'];
        $id_kunjungan_lab   = $_POST['id_kunjungan_lab'];
        $dokter_pengirim   = $_POST['dokter_pengirim'];
        $nma_peg_login   = $_POST['user'];
        $table   = json_decode($_POST['table']);
        $jk;
        $queryhasil;
        // var_dump($user);return;
        // exit();
        $querycekindi = $this->db->query("SELECT * from hasil_lab_detail 
                JOIN hasil_lab USING(id_kunjungan) 
                LEFT JOIN pegawai on CAST(hasil_lab.dokter as INT) =pegawai.id_pegawai
                WHERE id_kunjungan='$id_kunjungan_lab'")->getRow();

        if($querycekindi->id_indikator_hasil<100000){
            $queryhasil = $this->db->query("SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no, produk.id_produk,produk.nama_produk,indikator_hasil.nama_indikator_hasil,nilai_hasil_normal,satuan_indikator_hasil,indikator_hasil.id_indikator_hasil,hasil_lab_detail.hasil,hasil_lab_detail.abnormal
            FROM hasil_lab_detail        
            JOIN indikator_hasil on hasil_lab_detail.id_indikator_hasil=indikator_hasil.id_indikator_hasil
            JOIN map_produk_indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=indikator_hasil.id_indikator_hasil
            JOIN produk on map_produk_indikator_hasil.id_produk=produk.id_produk
            WHERE id_kunjungan='$id_kunjungan_lab' and  produk.id_produk IN $produk");
        }else{
            $queryhasil = $this->db->query("SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no, produk.id_produk,produk.nama_produk,item_periksa_lab.nmtestind nama_indikator_hasil,item_periksa_lab.unittest satuan_indikator_hasil,hasil_lab_detail.id_indikator_hasil,hasil_lab_detail.hasil,hasil_lab_detail.abnormal,hasil_lab_detail.normal nilai_hasil_normal
            FROM hasil_lab_detail        
            JOIN item_periksa_lab on hasil_lab_detail.id_indikator_hasil=item_periksa_lab.id
            JOIN map_produk_indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=hasil_lab_detail.id_indikator_hasil
            JOIN produk on produk.id_produk=map_produk_indikator_hasil.id_produk
            WHERE id_kunjungan='$id_kunjungan_lab' 
            AND produk.id_produk in $produk");            
        }
    
        $querypasien= $this->db->query("SELECT no_rm,nama,tgl_lahir,alamat,pasien.jenis_kelamin,nama_pegawai
        FROM kunjungan
        JOIN transaksi USING (id_transaksi)
        JOIN pasien USING (no_rm)
        JOIN pegawai USING (id_pegawai)
        WHERE id_kunjungan='$id_kunjungan_lab'")->getRow();

        $queryoperator= $this->db->query("SELECT * FROM pegawai WHERE id_pegawai=$nma_peg_login")->getRow();
        
        $no_rm =$querypasien->no_rm;    
        $nama =$querypasien->nama;  
        $tgl_lahir =date_indo($querypasien->tgl_lahir); 
        $alamat =$querypasien->alamat;  
        $nama_pegawai =$querypasien->nama_pegawai;  
        $nama_pegawai_ttd =$queryoperator->nama_pegawai; 
        if($querypasien->jenis_kelamin=='t'){$jk='Laki-laki';}else{$jk='Perempuan';}
        
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
            <table border='0' style='font-family: Arial, Helvetica, sans-serif; padding-left:50px;'>
                <tr>
                    <td>Dokter Penanggung Jawab</td>
                    <td>:</td>
                    <td>$nama_pegawai</td>
                </tr>
                <tr>
                    <td>RM</td>
                    <td>:</td>
                    <td>$no_rm</td>
                </tr>
                <tr>
                    <td>Tanggal Periksa</td>
                    <td>:</td>
                    <td>".date_indo(date("Y-m-d"))."</td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td>$nama</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir Pasien</td>
                    <td>:</td>
                    <td>$tgl_lahir</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>$jk</td>
                </tr>
                <tr>
                    <td>Alamat Pasien</td>
                    <td>:</td>
                    <td>$alamat</td>
                </tr>
                <tr>
                    <td>Dokter Pengirim</td>
                    <td>:</td>
                    <td>$dokter_pengirim</td>
                </tr>
            </table><br><br>

            <table border='1' align='center'  style='border:1px solid black;border-collapse:collapse;width:100%'>
                <tr>
                    <td style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>No</td>
                    <td style='border:1px solid black;text-align: center;font-weight: bold;'>Nama Pemeriksaan</td>
                    <td style='border:1px solid black;text-align: center;font-weight: bold;'>Hasil</td>
                    <td style='border:1px solid black;text-align: center;font-weight: bold;'>Nilai Normal</td>
                    <td style='border:1px solid black;text-align: center;font-weight: bold;'>Indikator</td>
                    <td style='border:1px solid black;text-align: center;font-weight: bold;'>Abnormal</td>
                </tr>";
            
        foreach ($queryhasil->getResult() as $datahasil){
            $check='';
            $nilsat='';
            if($datahasil->abnormal=='t'){$check='*';}
            if($datahasil->id_indikator_hasil>100000){
                $queryindi= $this->db->query("SELECT * FROM item_periksa_lab WHERE id='$datahasil->id_indikator_hasil'")->getRow();
                $nilsat=$queryindi->unittest;
            }else{
                $nilsat=$datahasil->satuan_indikator_hasil;
            }
            $html .= "
                <tr>
                    <td style='border:1px solid black;'>$datahasil->no</td>
                    <td style='border:1px solid black;'>$datahasil->nama_indikator_hasil</td>
                    <td style='border:1px solid black; text-align: center;'>$datahasil->hasil</td>
                    <td style='border:1px solid black; text-align: center;'>$datahasil->nilai_hasil_normal</td>
                    <td style='border:1px solid black; text-align: center;'>$nilsat</td>
                    <td style='border:1px solid black; text-align: center;'>$check</td>
                </tr>";
        }
        
        $html .= "
            </table><br><br>

            <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
                <tr>
                    <td style='text-align: center;font-weight: bold;width:50px;'></td>
                    <td style='text-align: center;font-weight: bold;width:150px;'><br><br><br><br><br></td>
                    <td style='text-align: center;font-weight: bold;width:175px;'></td>
                    <td style='text-align: center;font-weight: bold;width:75px;'></td>
                    <td style='text-align: center;font-weight: bold;width:250px;'>Pemeriksa <br><br><br><br><br>$nama_pegawai_ttd</td>
                </tr>
            </table><br><br>
            
            </body>
            </html>";
        // echo $html;
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
    
    public function Verifikator(){
        $input = json_decode(file_get_contents('php://input'));
        
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        $query = "SELECT * FROM users WHERE id_unit like '%6001%' and id_pegawai=$input ORDER BY id_user asc";
    // var_dump($query);return;
        if($this->db->query($query)->getResult()){
            $output['status']   = "sukses";
            $output['pesan']   = "Berhasil";
            $output['data'] = $this->db->query($query)->getResult();
        }else{
            $output['status']   = "sukses";
            $output['pesan']   = "";
        }
        echo json_encode($output);  
    }
    
    public function Connect(){      

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://192.168.1.225:773/ws', /*  https://demo2.terassekawanbersama.co.id/ws/*/
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'x-user: SIMRS@DARMAYU',/*  demo*/
            'x-secret: SIMRS@DARMAYU',/*  123qwe*/
            'x-mod: auth',
            'x-cid: 1702201907120002'/*  4301202030080005*/
          ),
        ));
        $response = curl_exec($curl);
        if($response==false){
            $hasil = "Error ". curl_strerror(curl_errno($curl))." ".curl_errno($curl) ;
        }else{
            $hasil = json_decode($response);
        }
        curl_close($curl);
        
        $output['status']   = "sukses";
        $output['data']    = $hasil->token;
        echo json_encode($output);
        // var_dump($output->token);
        // $this->Orderclient($output->token);
        // $this->SyncClient($output->token);
    }
    
    public function Orderclient(){

        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        //var_dump($input[0]->data_pasien->no_rekam);return;
        
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://192.168.1.225:773/ws/',  /*  https://demo2.terassekawanbersama.co.id/ws/*/
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "data_pasien": {
                "no_rekam": "'.$input[0]->data_pasien->no_rekam.'",
                "no_ref": "'.$input[0]->data_pasien->no_ref.'",
                "no_bpjs": "'.$input[0]->data_pasien->no_bpjs.'",
                "sebutan": "'.$input[0]->data_pasien->sebutan.'",
                "nama_pasien": "'.$input[0]->data_pasien->nama.'",
                "jenis_kelamin": "'.$input[0]->data_pasien->jns_kelamin.'",
                "tgl_lahir": "'.$input[0]->data_pasien->tgl_lahir.'",
                "y": '.$input[0]->data_pasien->umur.',
                "m": 0,
                "d": 0,
                "jam": 0,
                "alamat": "'.$input[0]->data_pasien->alamat.'",
                "telp": "'.$input[0]->data_pasien->telp.'"
            },
            "data_order": {
                "status_pasien": "'.$input[1]->data_order->status_pasien.'",
                "ruang": "'.$input[1]->data_order->ruang.'",
                "dokter_pengirim": "'.$input[1]->data_order->dokter_pengirim.'",
                "dokter_pk": "'.$input[1]->data_order->dokter_pk.'",
                "bahasa": "'.$input[1]->data_order->bahasa.'",
                "diagnosa": "'.$input[1]->data_order->diagnosa.'",
                "cito": '.$input[1]->data_order->cito.',
                "golongan":'.$input[1]->data_order->golongan.'
            },
            "pemeriksaan": '.json_encode($input[2]->data_pemeriksaan).',
            "no_lab": ""    
        }',
          CURLOPT_HTTPHEADER => array(
            'x-token:  '.$input[3]->token->data,/*  3842393743414541344337374444323532454236363341333736304537343646*/
            'x-mod: order'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        if($response==null){
            $output['status']   = "gagal";
            $output['pesan']   = "Gagal Order Periksa";
        }else{
            $hasil= json_decode($response);
            $output['status']   = "sukses";
            $output['pesan']   = $hasil->pesan;
            $output['data'] = array();
            array_push($output['data'],$hasil->no_lab,$hasil->id);
        }
        
        // echo json_encode($response);
        echo json_encode($output);
        // $no_lab = $output->no_lab;
        // var_dump($output);
        // $this->getHasilclient($no_lab);
    }
    
    public function SyncClient(){
        $input = json_decode(file_get_contents('php://input'));
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://192.168.1.225:773/ws',  /*  https://demo2.terassekawanbersama.co.id/ws/*/
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'x-mod: item',
//      'x-ref: list',
            'x-token: '.$input  /* 3842393743414541344337374444323532454236363341333736304537343646 */
          ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        
        $eho = json_decode($response);
        $output['status'] = "sukses";
        $output['data'] = /* */$eho;
        echo json_encode($output);
        // echo $response; 
        // $this->hasil($output);
    }
    
    public function getHasilclient(){
        $input = json_decode(file_get_contents('php://input'));
        
        $listParam = [
            'no_lab',
            'token'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://192.168.1.225:773/ws/',  /*  https://demo2.terassekawanbersama.co.id/ws/*/
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_HTTPHEADER => array(
            'x-mod: get_hasil',
            'x-token: '.$input->token, /*3842393743414541344337374444323532454236363341333736304537343646  */
            'x-noo: '.$input->no_lab/*20210810005  */
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        // var_dump($data);return;
        $output = array();
        // $output['data']  = $data;
        
        if($response==null){
            $output['status']   = "gagal";
            $output['pesan']   = "Gagal Mencari Order";
        }else if(isset($data->pesan)){
            $output['status']   = "sukses";
            $output['pesan']   = $data->pesan;
        }else{
            $output['status']   = "sukses";
            $output['pesan']   = "Hasil Order ditemukan";
            $output['data'] = $data;
        }
        echo json_encode($output);
    }
}
