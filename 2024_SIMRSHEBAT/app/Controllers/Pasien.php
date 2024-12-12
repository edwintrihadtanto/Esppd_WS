<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of Pasien
 *
 * @author lapto
 */
class Pasien extends Api
{
    private function generateNoRM(){
        $query = "INSERT INTO pasien
        (SELECT TO_CHAR((MAX((no_rm::INTEGER))+1), 'fm0000000') as no_rm FROM pasien)
        RETURNING no_rm;
        ";
        return $this->db->query($query)->getRow()->no_rm;
    }
    public function addPasien() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kd_kelurahan',
            'kd_pendidikan',
            'kd_pekerjaan',
            'kd_agama',
            'nama',
            'tgl_lahir',
            'gol_darah',
            'jenis_kelamin',
            'status_hidup',
            'status_marita',
            'alamat',
            'kota',
            'telepon',
            'kd_pos',
            'nik',
            'wni',
            'tempat_lahir',
            'handphone',
            'email',
            'nama_ayah',
            'nama_ibu',
            'suami_istri',
            'alamat_ktp',
            'kd_pos_ktp',
            'kd_kelurahan_ktp',
            'kd_pendidikan_ayah',
            'kd_pendidikan_ibu',
            'kd_pendidikan_suamiistri',
            'kd_pekerjaan_ayah',
            'kd_pekerjaan_ibu',
            'kd_pekerjaan_suamiistri'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if ($this->evalParam($input, $listParam)) {
            $data = array();
            foreach ($listParam as $kolom) {
                $data[$kolom] = $input->$kolom;
            }
            $newRM = $this->generateNoRM();
            $builder = $this->db->table('pasien');
            $builder->where('no_rm', $newRM);
            $builder->update($data);
            if($this->db->affectedRows() > 0){
                $output['status'] = "sukses";
                $output['data'] = $newRM;
            }else{
                $output['pesan'] = "Pasien gagal ditambahkan";
            }
        }

        $this->hasil($output);
    }
    
    public function cariPasienKunjunganLangsung() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'key'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if ($this->evalParam($input, $listParam)) {
            if($input->key == '' || $input->key == '-'){
                $output['status'] = "sukses";
            }else{
                $query = "SELECT * FROM pasien WHERE no_rm = '$input->key' OR nik = '$input->key'";
                $hasil = $this->db->query($query);
                if($hasil != false){
                    $output['status'] = "sukses";
                    if($hasil->getNumRows() > 0){
                        $output['data'] = $hasil->getRow();
                    }
                }else{
                    $output['pesan'] = "Error database";
                }
            }
        }
        $this->hasil($output);
    }
    
    public function addPasienKunjunganLangsung() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'nama',
            'alamat',
            'telepon',
            'tgl_lahir',
            'nik'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if ($this->evalParam($input, $listParam)) {
            $defaultKelurahan = "2448";
            $data = array();
            foreach ($listParam as $kolom) {
                $data[$kolom] = $input->$kolom;
            }
            $data['kd_kelurahan'] = $defaultKelurahan;
            $data['kd_kelurahan_ktp'] = $defaultKelurahan;
            $newRM = $this->generateNoRM();
            $builder = $this->db->table('pasien');
            $builder->where('no_rm', $newRM);
            $builder->update($data);
            if($this->db->affectedRows() > 0){
                $output['status'] = "sukses";
                $output['data'] = $this->db->query("SELECT * FROM pasien WHERE no_rm = '$newRM'")->getRow();
            }else{
                $output['pesan'] = "Pasien gagal ditambahkan";
            }
        }
        $this->hasil($output);
    }
    
    public function updatePasien() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kd_kelurahan',
            'kd_pendidikan',
            'kd_pekerjaan',
            'kd_agama',
            'nama',
            'tgl_lahir',
            'gol_darah',
            'jenis_kelamin',
            'status_hidup',
            'status_marita',
            'alamat',
            'kota',
            'telepon',
            'kd_pos',
            'nik',
            'wni',
            'tempat_lahir',
            'handphone',
            'email',
            'nama_ayah',
            'nama_ibu',
            'suami_istri',
            'alamat_ktp',
            'kd_pos_ktp',
            'kd_kelurahan_ktp',
            'kd_pendidikan_ayah',
            'kd_pendidikan_ibu',
            'kd_pendidikan_suamiistri',
            'kd_pekerjaan_ayah',
            'kd_pekerjaan_ibu',
            'kd_pekerjaan_suamiistri'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        if ($this->evalParam($input, $listParam)) {
            $data = array();
            foreach ($listParam as $kolom) {
                $data[$kolom] = $input->$kolom;
            }
            $newRM = $input->no_rm;
            $builder = $this->db->table('pasien');
            $builder->where('no_rm', $newRM);
            $builder->update($data);
            if($this->db->affectedRows() > 0){
                $output['status'] = "sukses";
                $output['data'] = $newRM;
            }else{
                $output['pesan'] = "Pasien gagal ditambahkan";
            }
        }

        $this->hasil($output);
    }
    
    public function hapusPasien(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {   
         $query = "DELETE FROM pasien WHERE no_rm = '$input->no_rm'";
         if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
        } else {
            $output['pesan'] = "Gagal menghapus pasien";
        }
        }
        $this->hasil($output);
    }
    
    public function addPenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
            'id_penjamin',
            'no_kartu',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "INSERT INTO penjamin_pasien VALUES('$input->no_rm', '$input->id_penjamin', '$input->no_kartu')";
            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
            } else {
                $output['pesan'] = "Gagal menambahkan penjamin";
            }
        }

        $this->hasil($output);
    }
    
    public function updatePenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
            'id_penjamin',
            'no_kartu',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "INSERT INTO penjamin_pasien VALUES('$input->no_rm', '$input->id_penjamin', '$input->no_kartu')
                    ON CONFLICT (no_rm, id_penjamin) 
                    DO 
                       UPDATE SET no_kartu = EXCLUDED.no_kartu;
            ";
            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
            } else {
                $output['pesan'] = "Gagal mengupdate penjamin";
            }
        }

        $this->hasil($output);
    }
    
    public function hapusPenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
            'id_penjamin',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "DELETE FROM penjamin_pasien WHERE no_rm = '".$input->no_rm."' AND id_penjamin = '".$input->id_penjamin."' 
            ";
            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
            } else {
                $output['pesan'] = "Gagal menghapus penjamin";
            }
        }

        $this->hasil($output);
    }
    
    public function listPenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    kelompok_penjamin,
                    nama_penjamin,
                    id_penjamin,
                    no_kartu 
                FROM
                    penjamin_pasien
                    JOIN penjamin USING ( id_penjamin )
                    JOIN kelompok_penjamin USING ( id_kelompok_penjamin ) 
                WHERE
                    no_rm = '".$input->no_rm."' 
                ORDER BY
                    kelompok_penjamin,
                    nama_penjamin
            ";
            $output['status'] = "sukses";
            $output['data'] = $this->db->query($query)->getResult();
        }

        $this->hasil($output);
    }
    
    
    public function caripasienbyrm()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * FROM pasien p 
        left join agama using (kd_agama)
        left join pekerjaan using (kd_pekerjaan)
        left join pendidikan using (kd_pendidikan) where p.no_rm='" . $input->id . "'";
        if ($this->db->query($query)->getRow()>'') { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $this->db->query($query)->getResult();
        } else {
            $output['code'] = 201;
            $output['status'] = "gagal";
            $output['pesan'] = 'Pasien Tidak Ditemukan';
        }
        echo json_encode($output);
    }
        public function caripasienlengkapbyrm()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * FROM pasien p 
        left join agama using (kd_agama)
        left join pekerjaan using (kd_pekerjaan)
        left join pendidikan using (kd_pendidikan)
        left join kelurahan using(kd_kelurahan)
        left join kecamatan using(kd_kecamatan)
        left join propinsi using(kd_propinsi) where p.no_rm='" . $input->id . "'";
        if ($this->db->query($query)->getRow()>'') { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $this->db->query($query)->getResult();
        } else {
            $output['code'] = 201;
            $output['status'] = "gagal";
            $output['pesan'] = 'Pasien Tidak Ditemukan';
        }
        echo json_encode($output);
    }
    public function caripasienbynamaalamat()
    {
        $input = json_decode(file_get_contents('php://input'));
        $nama=$input->nama;
        $alamat=$input->alamat;
        if ($nama>'' && !isset($alamat) ) {
            $query = "SELECT * FROM pasien p 
            INNER JOIN penjamin_pasien ps on 
            p.no_rm=ps.no_rm where upper(p.nama) like upper('".$nama."%') limit ".$input->jumlah."";
        } else if($nama>'' && $alamat>''){
            $query = "SELECT * FROM pasien p 
            INNER JOIN penjamin_pasien ps on 
            p.no_rm=ps.no_rm where upper(p.nama) like upper('".$nama."%') 
                and upper(p.alamat) like UPPER('".$alamat."%') limit ".$input->jumlah." ";
            }else{
              $query = "SELECT * FROM pasien p 
              INNER JOIN penjamin_pasien ps on 
              p.no_rm=ps.no_rm where upper(p.nama) like upper('".$nama."%') 
                limit ".$input->jumlah." ";  
            }

        if ($this->db->query($query)->getRow()>'') { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $this->db->query($query)->getResult();
        } else {
            $output['code'] = 201;
            $output['status'] = "gagal";
            $output['pesan'] = "Pasien Tidak Ditemukan";
        }
        echo json_encode($output);
    }
    public function caripasienbynik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $nik=$input->nik;
        $query = "SELECT * FROM pasien p 
        INNER JOIN penjamin_pasien ps on 
        p.no_rm=ps.no_rm where p.nik='".$nik."' ";
        
        if ($this->db->query($query)->getRow()>'') { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['code'] = 201;
            $output['pesan'] = "Pasien Tidak Ditemukan";
        }
        echo json_encode($output);
    }
    public function historipenyakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * FROM mr_penyakit mr INNER JOIN penyakit p on 
        mr.id_penyakit=p.id_penyakit where mr.no_rm='" . $input->rm . "'";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['history'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }

    public function detailpasienrwi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query="SELECT * FROM pasien p INNER JOIN penjamin_pasien ps on 
        p.no_rm=ps.no_rm where p.no_rm='".$input->id."'";
    if($this->db->simpleQuery($query)){ //true
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $this->db->query($query)->getResult();
    }else{

        $output['status'] = "gagal";
        $output['pesan'] = $this->db->error()['message'];
    }
    echo json_encode($output);
}
}
