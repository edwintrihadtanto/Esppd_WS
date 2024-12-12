<?php

namespace App\Controllers;

class Laporan_RL extends Api
{
    public function RL1dasarrumahsakit()
    {
        return view('view/laporanrl/modal/RL1dasarrumahsakit');
    }

    public function RL3fasilitasrumahsakit()
    {
        return view('view/laporanrl/modal/RL3fasilitasrumahsakit');
    }

    public function RL2kualifikasipend()
    {
        return view('view/laporanrl/modal/RL2kualifikasipend');
    }
    
    public function RL3laporandetail($idrl)
    {
        return view('view/laporanrl/modal/'. $idrl.'laporandetail');
    }

    public function RL4alaporandetail()
    {
        return view('view/laporanrl/modal/RL4alaporandetail');
    }

    public function RL4blaporandetail()
    {
        return view('view/laporanrl/modal/RL4blaporandetail');
    }

    public function RL51laporandetail()
    {
        return view('view/laporanrl/modal/RL51laporandetail');
    }

    public function RL52laporandetail()
    {
        return view('view/laporanrl/modal/RL52laporandetail');
    }

    public function RL53laporandetail()
    {
        return view('view/laporanrl/modal/RL53laporandetail');
    }

    public function RL54laporandetail()
    {
        return view('view/laporanrl/modal/RL54laporandetail');
    }

    public function getListRl()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_parent',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT REPLACE(id_rl, '.', '') as id_rl, deskripsi, id_parent FROM rl WHERE id_parent = '$input->id_parent'");
            if ($query->getNumRows() > 0) {
                $output['status'] = "sukses";
                $output['data'] = $query->getResult();
            } else {
                $output['pesan'] = "User tidak memiliki modul";
            }
        }
        $this->hasil($output);
    }
    

    public function getLaporan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'user',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
            SELECT DISTINCT
            modul.*
            FROM
            modul
            JOIN trustee USING ( id_modul )
            JOIN group_member USING ( id_group ) 
            WHERE
            id_user = '$input->user'
            AND laporan = 't'
            ORDER BY id_modul
            ";
            $list_laporan =  $this->db->query($query);
            $output['status'] = "sukses";
            $output['list'] = $list_laporan->getResult();
        }
        $this->hasil($output);
    }

    public function list_RL3fasilitasrumahsakit()
    {
        // $input = json_decode(file_get_contents('php://input'));
        // $listParam = [
        //     'id_parent',
        // ];
        // $output = array();
        // $output['status'] = "gagal";
        // $output['pesan'] = "";
        // if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT * FROM spesialisasi_kamar");
            if ($query->getNumRows() > 0) {
                $output['status'] = "sukses";
                $output['data'] = $query->getResult();
            } else {
                $output['pesan'] = "Data Tidak Ditemukan";
            }
        // }
        $this->hasil($output);
    }

    public function list_RL2kualifikasipend()
    {
        // $input = json_decode(file_get_contents('php://input'));
        // $listParam = [
        //     'id_parent',
        // ];
        // $output = array();
        // $output['status'] = "gagal";
        // $output['pesan'] = "";
        // if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT * FROM rl_kualifikasi_pendidikan ORDER BY id_parent, id");
            if ($query->getNumRows() > 0) {
                $output['status'] = "sukses";
                $output['data'] = $query->getResult();
            } else {
                $output['pesan'] = "Data Tidak Ditemukan";
            }
        // }
        $this->hasil($output);
    }

    public function list_RL52kunjrj()
    {
        // $input = json_decode(file_get_contents('php://input'));
        // $listParam = [
        //     'id_parent',
        // ];
        // $output = array();
        // $output['status'] = "gagal";
        // $output['pesan'] = "";
        // if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT u.nama_unit, SUM(y.nilai::INT) AS countkunj FROM unit u INNER JOIN (SELECT u.id_unit, CASE WHEN k.id_kunjungan IS NULL THEN '0' ELSE '1' END AS nilai FROM unit u LEFT JOIN kunjungan k ON u.id_unit=k.id_unit) y ON u.id_unit = y.id_unit  WHERE u.jenis_unit = '1'  GROUP BY u.nama_unit ORDER BY countkunj DESC");
            if ($query->getNumRows() > 0) {
                $output['status'] = "sukses";
                $output['data'] = $query->getResult();
            } else {
                $output['pesan'] = "Data Tidak Ditemukan";
            }
        // }
        $this->hasil($output);
    }
}
