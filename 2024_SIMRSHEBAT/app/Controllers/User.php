<?php

namespace App\Controllers;

class User extends Api
{
    public function login(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'username',
            'password',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            // $user =  $this->db->query("SELECT * FROM erm_users u inner join pegawai using(id_pegawai)
            //     WHERE u.user_name = '$input->username' AND u.password = '$input->password'");
            $pass = md5($input->password);
            $user =  $this->db->query("SELECT * FROM zusers zu WHERE zu.user_names = '$input->username' AND zu.password = '$pass'");
            if($user->getNumRows() > 0){
                $output['status'] = "sukses";
                $output['data'] = $user->getRow();
            }else{
                $output['pesan'] = "Username dan password salah";
            }                    
        }

        $this->hasil($output);
    }
    
    public function getTrustee() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'user',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $query = "
            SELECT DISTINCT
            erm_modul.* ,
            erm_parent_modul.deskripsi,
            erm_parent_modul.class_parent
            FROM
            erm_modul
            JOIN erm_parent_modul USING ( id_parent_modul )
            JOIN erm_trustee USING ( id_modul )
            JOIN erm_group_member USING ( id_group ) 
            WHERE
            kd_user = '$input->user'
            AND laporan = 'f' AND aktif = 't'
            ORDER BY id_parent_modul, id_modul ASC
            ";
            $list_modul =  $this->db->query($query);
            if($list_modul->getNumRows()>0){
                $output['status'] = "sukses";
                $output['list'] = $list_modul->getResult();
            }else{
                $output['pesan'] = "User tidak memiliki modul";
            }                    
        }
        $this->hasil($output);
    }
    
    public function getLaporan() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'user',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            $query = "
            SELECT DISTINCT
            erm_modul.*
            FROM
            erm_modul
            JOIN erm_trustee USING ( id_modul )
            JOIN erm_group_member USING ( id_group ) 
            WHERE
            kd_user = '$input->user'
            AND laporan = 't'
            ORDER BY id_modul
            ";
            $list_laporan =  $this->db->query($query);
            $output['status'] = "sukses";
            $output['list'] = $list_laporan->getResult();
        }
        $this->hasil($output);
    }
    public function dokter()
    {
        
        $pegawai =  $this->db->query("SELECT * FROM dokter where jenis_dokter='1'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
    public function dokterbyunit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $pegawai =  $this->db->query("SELECT * FROM zusers where kd_unit like '%$input->id%' and kd_dokter >''  ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
    public function perawat()
    {
        $pegawai =  $this->db->query("SELECT * FROM dokter where jenis_dokter='0'");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }
}