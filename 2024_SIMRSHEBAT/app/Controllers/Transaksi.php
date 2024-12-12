<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;

use CodeIgniter\Controller;

class Transaksi extends Api
{
    // public function __construct()
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $this->db =  db_connect();
    // }
    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }

    public function jenisbayar()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran order by id_jenis_pembayaran asc ");
        $output['status']='sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }

    public function pembayaran()
    {
        $input = json_decode(file_get_contents('php://input'));
        $x =  $this->db->query("SELECT * FROM pembayaran where id_jenis_pembayaran='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }

    public function apakahkartu()
    {
        $input = json_decode(file_get_contents('php://input'));
        $x =  $this->db->query("SELECT * FROM pembayaran where id_pembayaran='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }

    public function mod_lookkup()
    {
        return view('view/modal/mod_lookkup');
    }

    public function mod_deposit()
    {
        return view('view/modal/kasirgeneral/mod_deposit');
    }
    public function mod_tutuptransaksi()
    {
        return view('view/modal/kasirgeneral/mod_tutuptransaksi');
    }
   
}
