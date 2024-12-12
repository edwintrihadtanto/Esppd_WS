<?php

namespace App\Controllers;

class Keuanganku extends Api
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

    public function modKeuanganKasBank()
    {
        return view('view/modal/keuangan/modKeuanganKasBank');
    }

    public function list_keuanganJurnalUmum()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tgl_transaksi'];
        if ($this->evalParam($input, $listParam)) {
            $tgl_transaksi        = $input->tgl_transaksi;
            $tgl_transaksisd        = $input->tgl_transaksisd;
            $jml        = $input->jmlh;

            if (($jml == '') || ($jml == '0')) {
                $kondisi = '';
            } else {
                $kondisi = "LIMIT '" . $jml . "'";
            }
            $query = $this->db->query("SELECT * FROM kas WHERE tgl_aktivitas BETWEEN '$tgl_transaksi' AND '$tgl_transaksisd' $kondisi");

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
            $data = $this->db->query("SELECT * FROM coa WHERE deskripsi_coa like upper('" . $input->accountcari . "%') ORDER BY deskripsi_coa ASC");

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
}
