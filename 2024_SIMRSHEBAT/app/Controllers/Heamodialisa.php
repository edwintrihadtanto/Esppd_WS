<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of Heamodialisa
 *
 */
class Heamodialisa extends Api{
    public function updatepasienhd(){
        $input  = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $updatePasien="UPDATE pasien SET 
        kd_kelurahan='$input->kelurahan',
        kd_pendidikan='$input->pendidikan',
        kd_pekerjaan='$input->pekerjaan',
        kd_perusahaan=null,
        kd_agama='$input->agama',
        nama='$input->namapasien',
        tgl_lahir='$input->tanggallahir',
        gol_darah='$input->goldarah',
        jenis_kelamin='$input->kelamin',
        status_hidup='t',
        status_marita='$input->statusmarital',
        alamat='$input->alamat',
        kota='$input->kabupaten',
        telepon='$input->telepon',
        kd_pos='$input->kdpos',
        nik='$input->nik',
        nama_ayah='$input->ayah',
        kd_pendidikan_ayah='$input->pendidikanayah',
        kd_pekerjaan_ayah='$input->pekerjaanayah',
        nama_ibu='$input->ibu',
        kd_pendidikan_ibu='$input->pendidikanibu',
        kd_pekerjaan_ibu='$input->pekerjaanibu'
        where no_rm='$input->no_rm' ";

          if ($this->db->simpleQuery($updatePasien)) { //true
              $output['status'] = "sukses";
              $output['pesan']  = "Berhasil";
          } else {
              $output['status'] = "gagal";
              $output['pesan'] = "update data pasien gagal, silahkan ulangi!";
          }
        echo json_encode($output);
    }
    
    public function simpanpasienhd(){
        $input  = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $addPasien = " INSERT INTO PASIEN 
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
            kota,
            telepon,
            kd_pos,
            jabatan,
            tanda_pengenal,
            nik,
            keterangan,
            kode_lama,
            wni,
            nama_keluarga,
            tempat_lahir,
            nama_ayah,
            nama_ibu,
            alamat_ktp,
            kd_pos_ktp,
            kd_kelurahan_ktp,
            kd_pendidikan_ayah,
            kd_pendidikan_ibu,
            kd_pekerjaan_ayah,
            kd_pekerjaan_ibu
        )
        SELECT
            TO_CHAR((MAX((no_rm::INTEGER))+1), 'fm0000000'),
            '$input->kelurahan',
            '$input->pendidikan',
            '$input->pekerjaan',
            NULL,
            '$input->agama',
            '$input->namapasien',
            '$input->tanggallahir',
            '$input->goldarah',
            '$input->kelamin',
            't',
            '$input->statusmarital',
            '$input->alamat',
            '$input->kabupaten',
            '$input->telepon',
            '$input->kdpos',
            null,
            null,
            '$input->nik',
            null,
            null,
            '$input->wni',
            '$input->keluarga',
            '$input->tempatlahir',
            '$input->ayah',
            '$input->ibu',
            '$input->alamatktp',
            '$input->kdposktp',
            '$input->kelurahanktp',
            '$input->pendidikanayah',
            '$input->pendidikanibu',
            '$input->pekerjaanayah',
            '$input->pekerjaanibu'
        FROM pasien ";
        
            if ($this->db->simpleQuery($addPasien)) { //true
                $output['status'] = "sukses";
                $output['pesan']  = "Berhasil";
                $output['no_rm']  = $this->db->query("SELECT no_rm from pasien where nik='$input->nik' ")->getRow()->no_rm;
            } else {
                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error();
            }

        echo json_encode($output);
    }
        
    public function rujukanAsal(){
        $input = json_decode(file_get_contents('php://input'));
        if ($input->id== '99' || $input->id== 99) {
            $asal =  $this->db->query(" SELECT * FROM rujukan_asal where cara_penerimaan  in ('99')");
        } else {
            $asal =  $this->db->query(" SELECT * FROM rujukan_asal where cara_penerimaan not in ('99')");
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $asal->getResult();
        echo json_encode($output);
    }
    
    public function rujukan(){
        $input  = json_decode(file_get_contents('php://input'));
        $asal   =  $this->db->query(" SELECT * FROM rujukan where cara_penerimaan ='$input->id' ");

        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $asal->getResult();
        echo json_encode($output);
    }
    
    public function propinsi(){
        $user =  $this->db->query("SELECT * FROM propinsi ");
        $output['status']   = 'sukses';
        $output['data']     = $user->getResult();
        echo json_encode($output);
    }
    
    public function kota(){
        $input  = json_decode(file_get_contents('php://input'));
        $kota   =  $this->db->query("SELECT * FROM kabupaten where kd_propinsi='$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $kota->getResult();

        echo json_encode($output);
    }
    
    public function kecamatan(){
        $input  = json_decode(file_get_contents('php://input'));
        $kec    =  $this->db->query("SELECT * FROM kecamatan where kd_kabupaten='$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $kec->getResult();

        echo json_encode($output);
    }
    
    public function kelurahan(){
        $input  = json_decode(file_get_contents('php://input'));
        $kel    =  $this->db->query("SELECT * FROM kelurahan where kd_kecamatan='$input->id' ");
        $output['status']   = 'sukses';
        $output['data']     = $kel->getResult();

        echo json_encode($output);
    }
    
    public function penjamin(){
        $input = json_decode(file_get_contents('php://input'));
        // $parameter ="";
        // if(!empty($input->no_rm)){
        //  $parameter="JOIN penjamin_pasien USING (id_penjamin) JOIN pasien USING (no_rm) WHERE no_rm='".$input->no_rm."';";
        // }else if(!empty($input->kel_penj)){
        //  $parameter="where id_kelompok_penjamin=".$input->kel_penj.";";
        // }
        $query="SELECT id_penjamin, nama_penjamin from penjamin JOIN penjamin_pasien USING (id_penjamin) JOIN pasien USING (no_rm) WHERE no_rm='".$input."'";


        $penjamin= $this->db->query($query)->getResult();
        $output['status']   = 'sukses';
        $output['data']     = $penjamin;
        echo json_encode($output);
    }
        
    public function pegawai(){
        $pegawai =  $this->db->query("SELECT * FROM pegawai JOIN dokter_klinik USING (id_pegawai) WHERE id_unit='7001'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
    
    public function dpjpBPJS(){
        $input = json_decode(file_get_contents('php://input'));
        $pegawai =  $this->db->query("SELECT * FROM pegawai where id_pegawai ='$input->id' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getRow()->kd_dokter_bpjs;
        echo json_encode($output);
    }
    
    public function penatajasaHD_detailpasien(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm           = $input->norm;
            $nmapasien      = $input->nmpasien;
            $nik            = $input->nik;
            $jml            = $input->jml;
            $tgl_masuk      = $input->tglkunj;
            
            $query = "
                SELECT ROW_NUMBER () OVER ( ORDER BY transaksi.id_transaksi ) AS no, pasien.no_rm,pasien.nama,pasien.alamat,transaksi.id_transaksi, unit.nama_unit, kunjungan_hd.id_kunjungan id_baru,kunjungan_hd.id_pegawai id_pembaca,baru.nama_pegawai,kunjungan_hd.tgl_keluar, kunjungan.id_kunjungan id_lama,kunjungan.id_pegawai id_pengirim,lama.nama_pegawai pegawai_lama, kunjungan_hd.tgl_masuk jam_masuk,kunjungan.id_kamar,nama_kamar,unit.id_unit,penjamin.nama_penjamin,TO_CHAR(tgl_lahir, 'dd Mon yyyy') as tgl_lahir,kunjungan_hd.posting
                    FROM order_hd
                    JOIN kunjungan on order_hd.id_kunjungan_asal=kunjungan.id_kunjungan
                    FULL JOIN kunjungan kunjungan_hd on order_hd.id_kunjungan=kunjungan_hd.id_kunjungan
                    LEFT JOIN transaksi ON (kunjungan_hd.id_transaksi = transaksi.id_transaksi OR kunjungan.id_transaksi = transaksi.id_transaksi)
                    LEFT JOIN unit u_lam on u_lam.id_unit=kunjungan.id_unit
                    LEFT JOIN unit on unit.id_unit=kunjungan_hd.id_unit
                    JOIN pasien ON transaksi.no_rm = pasien.no_rm 
                    JOIN penjamin_transaksi ON transaksi.id_transaksi=penjamin_transaksi.id_transaksi
                    JOIN penjamin on penjamin.id_penjamin=penjamin_transaksi.id_penjamin
                    LEFT JOIN pegawai as baru on kunjungan_hd.id_pegawai = baru.id_pegawai
                    LEFT JOIN pegawai as lama on kunjungan.id_pegawai=lama.id_pegawai
                    LEFT JOIN kamar on kamar.id_kamar = kunjungan.id_kamar
                    WHERE (kunjungan_hd.id_unit LIKE '7%' OR kunjungan_hd.id_unit IS NULL) 
                    and penjamin_transaksi.penjamin_utama ='t'
                AND upper(pasien.nama) like UPPER('".$nmapasien."%') AND transaksi.no_rm like UPPER('".$norm."%') AND pasien.nik like '%".$nik."%'
                    AND DATE(kunjungan_hd.tgl_masuk) = '".$tgl_masuk."'                     
                ORDER BY transaksi.id_transaksi DESC LIMIT '".$jml."'";              
            
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
	
	public function getNotifhd(){
		$output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $query = "SELECT ROW_NUMBER () OVER ( ORDER BY transaksi.id_transaksi DESC) AS nomor,nama,no_rm,tgl_masuk,(SELECT COUNT(*) FROM kunjungan WHERE id_unit LIKE '7%' AND tgl_keluar is NULL)
		FROM kunjungan
		JOIN transaksi USING(id_transaksi)
		JOIN pasien USING (no_rm)
		WHERE id_unit LIKE '7%' AND tgl_keluar is NULL
		ORDER BY id_transaksi DESC";
        
		$hasil = $this->db->query($query);
        
		if ($hasil) {
			$output['status']   = "sukses";
			$output['pesan']    = "";
			$output['id'] 		= '14002';
			$output['data'] 	= $hasil->getResult();
		} else {
			$output['status']   = "gagal";
			$output['pesan']    = "";
		}  
		
        echo json_encode($output); 
	}

    public function SaveKunjHD(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan'
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){

            $queryaddKunj="INSERT INTO order_hd("
                                . "id_kunjungan_asal"
                                . ") VALUES("
                                . "'".$input->id_kunjungan."'"
                                . ")";
// var_dump($queryaddKunj);
            if($this->db->query($queryaddKunj)){
                $hasil['status']   = "sukses";
                $hasil['pesan']   = "Berhasil";
            }else{
                $hasil['status']   = "gagal";
                $hasil['pesan']   = "";
                $hasil['data'] = "";
            }                    
        }
        echo json_encode($hasil);    
    }   
    
    public function ProdHD(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kd_produk',
            'nama_produk',
            'id_penjamin'
        ];            
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        
        if($this->evalParam($input, $listParam)){
            $parameter = '';
            if ($input->kd_produk > '') {
                $parameter .= "AND LOWER(kd_produk) LIKE '$input->kd_produk%'";
            }
            if ($input->nama_produk > '') {
                $parameter .= "AND LOWER(nama_produk) LIKE '$input->nama_produk%'";
            }           
            if ($parameter == '') {
                $query = "SELECT ROW_NUMBER () OVER ( ORDER BY id_produk ) AS no, id_produk,kd_produk,nama_produk,harga,id_tarif FROM produk JOIN tarif USING (id_produk) WHERE tgl_selesai is null and produk.kd_produk like 'HD%' AND id_penjamin=$input->id_penjamin";
            } else {
                $query = "
                SELECT ROW_NUMBER () OVER ( ORDER BY id_produk ) AS no, id_produk,kd_produk,nama_produk,harga,id_tarif FROM produk JOIN tarif USING (id_produk) WHERE tgl_selesai is null and produk.kd_produk like 'HD%' AND id_penjamin=$input->id_penjamin".$parameter."  
            ";
            } 
        $output['status'] = "sukses";           
        $output['data'] = $this->db->query($query)->getResult();            
        } 
        echo json_encode($output);
    }
    
    public function viewOrderProdHD(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $detil_transaksi = "SELECT ROW_NUMBER () OVER ( ORDER BY id_detail_transaksi ) AS no, produk.id_produk,produk.nama_produk,id_detail_kunjungan, pegawai.nama_pegawai,tgl_input,detail_transaksi.total_harga
            FROM detail_transaksi 
            JOIN produk USING(id_produk)
            JOIN kunjungan USING (id_kunjungan)
            JOIN pegawai USING(id_pegawai)
            JOIN detail_kunjungan USING (id_detail_kunjungan)
            WHERE kunjungan.id_kunjungan = $input->id_kunjungan";
            
            $output['status'] = "sukses";
            $output['data'] = /* */$this->db->query($detil_transaksi)->getResult();
            
        echo json_encode($output); 
        }
    }
    
    public function viewCaraKeluar(){
        $query = "SELECT * FROM cara_keluar";       
        $output['status'] = "sukses";
        $output['data'] = /* */$this->db->query($query)->getResult();
        echo json_encode($output); 
    }
    
    function savePasienKeluar(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
            'id_cara_keluar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $query="UPDATE kunjungan SET id_cara_keluar=".$input->id_cara_keluar.", tgl_keluar= CURRENT_DATE, jam_keluar= CURRENT_TIMESTAMP,posting='t' 
            WHERE id_kunjungan='$input->id_kunjungan'";

            if ($this->db->simpleQuery($query)) { //true
              $output['status'] = "sukses";
              $output['pesan']  = "Berhasil";
          } else {
              $output['status'] = "gagal";
              $output['pesan'] = "update gagal, silahkan ulangi!";
          }
          echo json_encode($output); 
        }       
    }
    
    public function saveProdHD(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam=[
            'id_unit',
            'id_transaksi',
            'id_pegawai',
            'id_penjamin',
            'id_kunjungan',
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
                $queryUpdatePosting="UPDATE kunjungan set posting='t' WHERE id_transaksi='".$input->id_transaksi."'";
                                            
                $queryaddDetilKunj = "INSERT INTO detail_kunjungan("
                                        . "id_kunjungan, "
                                        . "id_produk "
                                        . ") VALUES("
                                        . "'".$input->id_kunjungan."',"
                                        . "'".$input->id_produk."')returning id_detail_kunjungan;";
                                        
                $queryTarif="SELECT * FROM tarif WHERE tgl_selesai is null AND id_produk = ".$input->id_produk." AND id_penjamin=$input->id_penjamin";

                //Start Query Checking
                /* */$this->db->transStart();
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
                                            . "'".$input->id_kunjungan."',"
                                            . "'".$input->id_produk."',"
                                            . "'".$id_tarif->id_tarif."',"
                                            . "'1',"
                                            . "'".$id_detail_kunjungan."')returning id_detail_transaksi;";
                
                $id_detail_transaksi = $this->db->query($queryDetilTrans)->getRow()->id_detail_transaksi;

                $queryDetilComp="UPDATE detail_component set id_pegawai='".$input->id_pegawai."' WHERE id_jenis_component='3' AND id_detail_transaksi='".$id_detail_transaksi."'";
                $this->db->query($queryDetilComp);

                //End Query Checking
                $this->db->transComplete(); 
                if($this->db->transStatus()){
                    $hasil['status']   = "sukses";
                    $hasil['pesan']   = "Berhasil";
                }else{
                    $hasil['status']   = "gagal";
                    $hasil['pesan']   = "gagal menyimpan";
                    $hasil['data'] = "";
                }
            echo json_encode($hasil);           
            }
        }
    }

    function delDetilProd(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $delet_prod = " DELETE FROM detail_transaksi WHERE id_kunjungan='$input->id_kunjungan' AND id_produk='$input->id_produk' AND tgl_input='$input->tgl_input'; ";          
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

    function orderHD(){
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        
        $queryorderhd = "INSERT INTO order_hd (id_kunjungan_asal)VALUES($input)";          

        if ($this->db->query($queryorderhd)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Sukses Order HD";
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Order HD";
        }                       
        $this->hasil($output);     
    }
}
