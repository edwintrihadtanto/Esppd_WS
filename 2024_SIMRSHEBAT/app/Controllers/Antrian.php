<?php
namespace App\Controllers;

class Antrian extends Api {
    
    public function antrianLoketRS()
    {
        return view('view/modal/antrian/antrianLoketRS');
    }
    public function antrianPoliRS()
    {
        return view('view/modal/antrian/antrianPoliRS');
    }

    // BTN Display
    public function list_antrianDisplay()
    {

        $query = $this->db->query("SELECT * FROM display");

        if ($query->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $query->getResult();
        } else {
            $output['pesan']    = "Group display tidak ditemukan";
        }
        echo json_encode($output);
    }


    //LOKET
    public function loket_list()
    {
            
        $query = $this->db->query("SELECT * FROM loket");

        if ($query->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $query->getResult();
        } else {
            $output['pesan']    = "Loket tidak ditemukan";
        }
        echo json_encode($output);
    }

    public function antrianLoket_list()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_antrian','hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_jenis_antrian    = $input->id_jenis_antrian;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT * FROM antrian a INNER JOIN jenis_antrian b ON a.jenis_antrian=b.id_jenis_antrian WHERE a.jenis_antrian = '$id_jenis_antrian' AND a.tanggal='$hariini' ORDER BY no_antrian");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['pesan']    = "Antrian tidak ditemukan";
            }
        }
        echo json_encode($output);
    }

    public function jmlantrian_Loket()
    {
            
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_antrian', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_jenis_antrian    = $input->id_jenis_antrian;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT * FROM antrian a INNER JOIN jenis_antrian b ON a.jenis_antrian=b.id_jenis_antrian WHERE a.jenis_antrian = '$id_jenis_antrian' AND a.tanggal='$hariini'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getNumRows();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "0";
            }
        }
        echo json_encode($output);
    }

    public function antriansekarang_Loket()
    {
            
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_antrian', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_jenis_antrian    = $input->id_jenis_antrian;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT CONCAT(b.kode, a.no_antrian) as no_antrian FROM antrian a INNER JOIN jenis_antrian b ON a.jenis_antrian=b.id_jenis_antrian WHERE a.jenis_antrian = '$id_jenis_antrian' AND a.tanggal='$hariini' AND a.status = '1' ORDER BY updated_date DESC LIMIT 1 ");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getRow('no_antrian');
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "00";
            }
        }
        echo json_encode($output);
    }

    public function antrianselanjutnya_Loket()
    {
            
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_antrian', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_jenis_antrian    = $input->id_jenis_antrian;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT CONCAT(b.kode, a.no_antrian) as no_antrian FROM antrian a INNER JOIN jenis_antrian b ON a.jenis_antrian=b.id_jenis_antrian WHERE a.jenis_antrian = '$id_jenis_antrian' AND a.tanggal='$hariini' AND a.status = '0' ORDER BY updated_date DESC LIMIT 1 ");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getRow('no_antrian');
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "00";
            }
        }
        echo json_encode($output);
    }

    public function sisaantrian_Loket()
    {
            
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_jenis_antrian', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_jenis_antrian    = $input->id_jenis_antrian;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT * FROM antrian a INNER JOIN jenis_antrian b ON a.jenis_antrian=b.id_jenis_antrian WHERE a.jenis_antrian = '$id_jenis_antrian' AND a.tanggal='$hariini' AND a.status = '0'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getNumRows();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "0";
            }
        }
        echo json_encode($output);
    }

    public function updateAntrianLoket()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_loket', 'nama_loket', 'id_antrian_loket'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $tanggal = date("Y-m-d H:i:s");
            $id_loket    = $input->id_loket;
            $nama_loket    = $input->nama_loket;
            $id_antrian_loket    = $input->id_antrian_loket;
            $query = "UPDATE antrian SET status = 1, cek = 1, loket_panggil = '$id_loket', kode='$nama_loket', updated_date ='$tanggal' WHERE id= '$id_antrian_loket'";
            if ($this->db->simpleQuery($query)) {

                $output['status']   = "sukses";
                $output['pesan']    = "Memanggil";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal memanggil";
            }

            

        }
        $this->hasil($output);
        //echo json_encode($output);
    }

    //POLI
    public function poli_list()
    {

        $query = $this->db->query("SELECT * FROM dokter_klinik a INNER JOIN pegawai b ON a.id_pegawai=b.id_pegawai INNER JOIN unit c ON a.id_unit=c.id_unit WHERE jenis_unit = '1'");

        if ($query->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $query->getResult();
        } else {
            $output['pesan']    = "Poli tidak ditemukan";
        }
        echo json_encode($output);
    }

    public function antrianPoli_list()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_pegawai', 'hariini'];
        if ($this->evalParam($input,$listParam)) {
            $id_pegawai    = $input->id_pegawai;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT * FROM antrian_poli a INNER JOIN dokter_klinik b ON a.id_pegawai=b.id_pegawai WHERE a.id_pegawai = '$id_pegawai' AND a.tanggal='$hariini'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getResult();
            } else {
                $output['pesan']    = "Antrian tidak ditemukan";
            }
        }
        echo json_encode($output);
    }

    public function jmlantrian_Poli()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_pegawai', 'hariini'];
        if ($this->evalParam($input,$listParam )) {
            $id_pegawai    = $input->id_pegawai;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT * FROM antrian_poli WHERE id_pegawai = '$id_pegawai' AND tanggal='$hariini'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getNumRows();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "0";
            }
        }
        echo json_encode($output);
    }

    public function antriansekarang_Poli()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_pegawai', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_pegawai    = $input->id_pegawai;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT no_antrian FROM antrian_poli WHERE id_pegawai = '$id_pegawai' AND tanggal='$hariini' AND status = '1' ORDER BY updated_date DESC LIMIT 1 ");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getRow('no_antrian');
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "00";
            }
        }
        echo json_encode($output);
    }

    public function antrianselanjutnya_Poli()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_pegawai', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_pegawai    = $input->id_pegawai;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT no_antrian FROM antrian_poli  WHERE id_pegawai = '$id_pegawai' AND tanggal='$hariini' AND status = '0' ORDER BY updated_date DESC LIMIT 1 ");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getRow('no_antrian');
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "00";
            }
        }
        echo json_encode($output);
    }

    public function sisaantrian_Poli()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_pegawai', 'hariini'];
        if ($this->evalParam($input, $listParam)) {
            $id_pegawai    = $input->id_pegawai;
            $hariini    = $input->hariini;
            $query = $this->db->query("SELECT * FROM antrian_poli WHERE id_pegawai = '$id_pegawai' AND tanggal='$hariini' AND status = '0'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $query->getNumRows();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "0";
            }
        }
        echo json_encode($output);
    }

    public function updateAntrianPoli()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_antrian_poli'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $tanggal = date("Y-m-d H:i:s");
            $id_antrian_poli    = $input->id_antrian_poli;
            $query = "UPDATE antrian_poli SET status = 1, cek = 1, updated_date = '$tanggal' WHERE id_antrian_poli= '$id_antrian_poli'";
            if ($this->db->simpleQuery($query)) {

                $output['status']   = "sukses";
                $output['pesan']    = "Memanggil";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal memanggil";
            }
        }
        $this->hasil($output);
    }
}

?>