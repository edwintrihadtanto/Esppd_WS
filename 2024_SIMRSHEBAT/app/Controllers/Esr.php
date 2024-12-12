<?php

namespace App\Controllers;

class Esr extends Api
{
    public function penjamin()
    {
        $penjamin =  $this->db->query("SELECT * FROM penjamin where id_penjamin IN(1,2)");
        $output['status']   = 'sukses';
        $output['data']     = $penjamin->getResult();
        echo json_encode($output);
    }
    public function jenisunit()
    {
        $unit =  $this->db->query("SELECT * FROM jenis_unit WHERE jenis_unit IN(1,2,3)");
        $output['status']   = 'sukses';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }
    public function unit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['idjenisunit'];
        if ($this->evalParam($input, $listParam)) {
            if ($input->idjenisunit != "") {
                $qrjenis = "WHERE jenis_unit ='$input->idjenisunit'";
            } else {
                $qrjenis = "WHERE jenis_unit='0'";
            }
            $unit =  $this->db->query("SELECT * FROM unit $qrjenis");
        }
        $output['status']   = 'sukses';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }

    function totalkunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tglawal'];

        if ($this->evalParam($input, $listParam)) {
            if ($input->jenisunit != "") {
                $jenisunit = "AND b.jenis_unit='$input->jenisunit'";
            } else {
                $jenisunit = "";
            }
            if ($input->id_unit != "0") {
                $idunit = "AND b.id_unit='$input->id_unit'";
            } else {
                $idunit = "";
            }
            if ($input->penjamin != "") {
                $penjamin = "AND d.id_penjamin='$input->penjamin'";
            } else {
                $penjamin = "";
            }
            if ($input->kategori == 2) {
                $slct = "EXTRACT(MONTH FROM a.tgl_masuk) AS tgl_masuk";
                $klasf = "GROUP BY EXTRACT(MONTH FROM a.tgl_masuk),EXTRACT (YEAR FROM a.tgl_masuk) ORDER BY EXTRACT(YEAR FROM a.tgl_masuk) ASC, EXTRACT(MONTH FROM a.tgl_masuk) ASC";
            } else {
                $slct = "a.tgl_masuk";
                $klasf = "GROUP BY a.tgl_masuk ORDER BY a.tgl_masuk ASC";
            }

            $jmltotkunj =  $this->db->query("SELECT COUNT(*) as kunj,$slct FROM kunjungan a INNER JOIN unit b ON a.id_unit=b.id_unit INNER JOIN transaksi c ON a.id_transaksi=c.id_transaksi INNER JOIN penjamin_transaksi d ON c.id_transaksi=d.id_transaksi WHERE a.tgl_masuk BETWEEN '$input->tglawal' AND '$input->tglahir' $jenisunit $idunit $penjamin AND b.jenis_unit IN(1,2,3) $klasf
        ")->getResult();
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $jmltotkunj;
        echo json_encode($output);
    }
    function totalkunjunganperunit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['jenisunit'];
        if ($this->evalParam($input, $listParam)) {
            $jmligd =  $this->db->query("SELECT COUNT(*) as jmlperunit,EXTRACT(MONTH FROM a.tgl_masuk) as bulan FROM kunjungan a INNER JOIN unit b ON a.id_unit=b.id_unit WHERE a.tgl_masuk >  CURRENT_DATE - INTERVAL '5 months' AND b.jenis_unit='$input->jenisunit' GROUP BY EXTRACT(MONTH FROM a.tgl_masuk),EXTRACT (YEAR FROM a.tgl_masuk) ORDER BY EXTRACT (YEAR FROM a.tgl_masuk) ASC,EXTRACT(MONTH FROM a.tgl_masuk) ASC")->getResult();
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $jmligd;
        echo json_encode($output);
    }

    function totalkunjungangender()
    {
        $jmligd =  $this->db->query("SELECT COUNT(*) as jmlperunit,EXTRACT(MONTH FROM a.tgl_masuk) as bulan,d.jenis_kelamin FROM kunjungan a INNER JOIN transaksi c ON a.id_transaksi=c.id_transaksi INNER JOIN pasien d ON c.no_rm=d.no_rm WHERE a.tgl_masuk > CURRENT_DATE - INTERVAL '5 months' GROUP BY EXTRACT(MONTH FROM a.tgl_masuk),d.jenis_kelamin,EXTRACT(YEAR FROM a.tgl_masuk) ORDER BY EXTRACT(YEAR FROM a.tgl_masuk) ASC")->getResult();

        $bulan = $this->db->query("SELECT EXTRACT(MONTH FROM tgl_masuk) AS bulan FROM kunjungan WHERE tgl_masuk > CURRENT_DATE - INTERVAL '5 months'  GROUP BY EXTRACT(MONTH FROM tgl_masuk),EXTRACT(YEAR FROM tgl_masuk) ORDER BY EXTRACT(YEAR FROM tgl_masuk) ASC,EXTRACT(MONTH FROM tgl_masuk) ASC")->getResult();
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $jmligd;
        $output['data2']     = $bulan;
        echo json_encode($output);
    }
    function penyakitterbanyak()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tglawal'];
        if ($this->evalParam($input, $listParam)) {

            $penyakit = $this->db->query("SELECT COUNT(*) as jmlpenyakit,c.penyakit,c.id_penyakit FROM mr_penyakit a INNER JOIN kunjungan b ON a.id_kunjungan=b.id_kunjungan INNER JOIN penyakit c ON a.id_penyakit=c.id_penyakit WHERE b.tgl_masuk BETWEEN '$input->tglawal' AND '$input->tglahir' GROUP BY c.penyakit,c.id_penyakit ORDER BY jmlpenyakit DESC LIMIT $input->limitp")->getResult();
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $penyakit;
        echo json_encode($output);
    }
    function periksaperpoli()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['tglawal'];
        if ($this->evalParam($input, $listParam)) {

            if ($input->penjamin != "") {
                $penjamin = "AND d.id_penjamin='$input->penjamin'";
            } else {
                $penjamin = "";
            }

            $poli = $this->db->query("SELECT COUNT(*) as jmlperpoli,b.nama_unit FROM kunjungan a INNER JOIN unit b ON a.id_unit=b.id_unit INNER JOIN transaksi c ON a.id_transaksi=c.id_transaksi INNER JOIN penjamin_transaksi d ON c.id_transaksi=d.id_transaksi WHERE a.tgl_masuk BETWEEN '$input->tglawal' AND '$input->tglahir' $penjamin AND b.jenis_unit='1' GROUP BY b.nama_unit ORDER BY jmlperpoli DESC")->getResult();

            $analismax = $this->db->query("SELECT COUNT(*) as jmlperpolimax,b.nama_unit FROM kunjungan a INNER JOIN unit b ON a.id_unit=b.id_unit INNER JOIN transaksi c ON a.id_transaksi=c.id_transaksi INNER JOIN penjamin_transaksi d ON c.id_transaksi=d.id_transaksi WHERE a.tgl_masuk BETWEEN '$input->tglawal' AND '$input->tglahir' $penjamin AND b.jenis_unit='1' GROUP BY b.nama_unit ORDER BY jmlperpolimax DESC LIMIT 3")->getResult();

            $analismin = $this->db->query("SELECT COUNT(*) as jmlperpolimin,b.nama_unit FROM kunjungan a INNER JOIN unit b ON a.id_unit=b.id_unit INNER JOIN transaksi c ON a.id_transaksi=c.id_transaksi INNER JOIN penjamin_transaksi d ON c.id_transaksi=d.id_transaksi WHERE a.tgl_masuk BETWEEN '$input->tglawal' AND '$input->tglahir' $penjamin AND b.jenis_unit='1' GROUP BY b.nama_unit ORDER BY jmlperpolimin ASC LIMIT 3")->getResult();

            $batal = $this->db->query("SELECT COUNT(*) as jmlperpoli,b.nama_unit FROM kunjungan a INNER JOIN unit b ON a.id_unit=b.id_unit INNER JOIN transaksi c ON a.id_transaksi=c.id_transaksi INNER JOIN penjamin_transaksi d ON c.id_transaksi=d.id_transaksi INNER JOIN log_batal_transaksi e ON c.id_transaksi=e.id_transaksi::INT WHERE a.tgl_masuk BETWEEN '$input->tglawal' AND '$input->tglahir' $penjamin AND b.jenis_unit='1' GROUP BY b.nama_unit ORDER BY jmlperpoli DESC")->getResult();
        }
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $poli;
        $output['data2']     = $analismax;
        $output['data3']     = $analismin;
        $output['data4']     = $batal;
        echo json_encode($output);
    }

    function getlistdatakunjperpoli()
    {
        $poli = $this->db->query("SELECT * FROM esr_kunj_poli")->getResult();
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $poli;
        echo json_encode($output);
    }
    function simpanlistkunjperpoli()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['tglawal'];
        $output = array();

        /* SIMPAN PERMINTAAN GIZI */
        if ($this->evalParam($input, $listParam)) {
            $addOrderGizidet = "INSERT INTO esr_kunj_poli 
            (tgl_awal,tgl_ahir,ket,created_by)
            VALUES('$input->tglawal','$input->tglahir','$input->ket','$input->iduser')";

            if ($this->db->simpleQuery($addOrderGizidet)) {
                $output['status'] = "sukses";
                $output['code'] = "200";
                $output['pesan']    = 'Berhasil Simpan Data';
            } else {
                $output['status'] = "gagal";
                $output['code'] = "500";
                $output['pesan']    = "";
            }
        }
        echo json_encode($output);
    }
    function hapuslistkunjperpoli()
    {
        $input  = json_decode(file_get_contents('php://input'));
        $listParam = ['id'];
        $output = array();

        /* SIMPAN PERMINTAAN GIZI */
        if ($this->evalParam($input, $listParam)) {
            $deleteList = "DELETE FROM esr_kunj_poli WHERE id_esr='$input->id';";

            if ($this->db->simpleQuery($deleteList)) {
                $output['status'] = "sukses";
                $output['code'] = "200";
                $output['pesan']    = 'Berhasil Hapus Data';
            } else {
                $output['status'] = "gagal";
                $output['code'] = "500";
                $output['pesan']    = "";
            }
        }
        echo json_encode($output);
    }
}
