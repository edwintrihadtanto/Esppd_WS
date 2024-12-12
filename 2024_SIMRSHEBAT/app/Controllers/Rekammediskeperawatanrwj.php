<?php


namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author lapto
 */
class Rekammediskeperawatanrwj extends Api
{
    public function addeErmIrja() {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_pegawai',
            'subjek',
            'objek',
            'assesmen',
            'planning',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $erm = false;
        if ($this->evalParam($input, $listParam)) {
                    $erm = $this->db->simpleQuery("INSERT INTO soap_pasien(no_rm,id_kunjungan,subjek,objek,assesmen,planning,id_pegawai,aktif) VALUES('$input->rm','$input->id_kunjungan','$input->subjek','$input->objek','$input->assesmen','$input->planning','$input->id_pegawai','t')");
        }
                
        if ($erm) {
            $output['status']   = "sukses";
            $output['pesan']    ='Berhasil';
            $output['data']     ='';
        } else {
            $output['status']   = "gagal";
            $output['pesan'] = "tidak berhasil simpan erm irja";
            $output['data'] = $this->db->error();
        }
        
        $this->hasil($output);
    }


        public function listpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            
            $query = "
                SELECT
                    tr.id_transaksi,k.id_kunjungan,
                    DATE(tr.tgl_transaksi) as tgl_transaksi,
                    k.id_unit,
                    u.nama_unit,
                    tr.no_rm,
                    UPPER(P.nama) as nama,
                    UPPER(P.alamat) as alamat,
                    --P.tgl_lahir,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                WHERE
                    LEFT (k.id_unit, 1) = '1'   -->> Rawat Jalan
                    AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                    $output['umur']     = umur('1992-08-03');
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

    public function addhistorialergi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam=[
            'id_kunjungan',
            'id_jenis',
            'keterangan',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input,$listParam)) {
            $save=$this->db->simpleQuery("INSERT INTO histori_alergi(id_kunjungan,alergi,id_jenis) VALUES('$input->id_kunjungan','$input->keterangan','$input->id_jenis')");
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Lengkap";
        }


           if ($save) {
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = '';
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "tidak berhasil simpan erm irja";
                $output['data']     = $this->db->error();
            }
            
            $this->hasil($output);
    }
    public function addhistoripemberianobat()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam=[
            'id_kunjungan',
            'id_jenis',
            'keterangan',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input,$listParam)) {
            $save=$this->db->simpleQuery("INSERT INTO histori_pengobatan(id_kunjungan,histori_pengobatan,id_jenis) VALUES('$input->id_kunjungan','$input->keterangan','$input->id_jenis')");
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Lengkap";
        }

            if ($save) {
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = '';
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "tidak berhasil simpan erm irja";
                $output['data']     = $this->db->error();
            }
            
            $this->hasil($output);
        
    }
    public function addhistoripenyakitfam()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =[
            'id_kunjungan',
            'id_jenis',
            'keterangan',];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input, $listParam)) {
            $save=$this->db->simpleQuery("INSERT INTO histori_penyakit_fam(id_kunjungan,penyakit_keluarga,id_jenis)
                VALUES('$input->id_kunjungan','$input->keterangan','$input->id_jenis')");
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Lengkap";
        }

            if ($save) {
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = '';
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "tidak berhasil simpan erm irja";
                $output['data']     = $this->db->error();
            }
            
            $this->hasil($output);
        
    }    
    public function addhistoripenyakitold()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =[
            'id_kunjungan',
            'id_jenis',
            'keterangan',];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input, $listParam)) {
            $save=$this->db->simpleQuery("INSERT INTO histori_penyakit_old(id_kunjungan,penyakit,id_jenis)
                VALUES('$input->id_kunjungan','$input->keterangan','$input->id_jenis')");
        } 

        if ($save) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "tidak berhasil simpan erm irja";
            $output['data']     = $this->db->error();
        }
        
        $this->hasil($output);
        
    }
    public function saveAssesmenDokterIrja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =[
                  'id_kunjungan',
                  'keluhanutamaErmIrja',
                  'RiwayatPenyakitNowErmIrja',];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input, $listParam)) {
            $save=$this->db->simpleQuery("INSERT INTO 
                    assesmen_medis_irja_umum(
                    id_kunjungan,
                    keluhan_utama,
                    penyakit_sekarang,
                    keadaan_umum,
                    respirasi,
                    nadi,
                    spo2,
                    pupil,
                    tekanan_darah,
                    palpasi,
                    suhu,
                    reflek_cahaya,
                    bb,
                    tinggi_badan,
                    imt,
                    skor_kesadaran,
                    assesmen_medis,
                    tindakan_medis,
                    planning_medis,
                    pasien_kompleks,
                    status_lokalis,
                    kepala,
                    kepala_ket,
                    jantung,
                    jantung_ket,
                    mata,
                    mata_ket,
                    paru,
                    paru_ket,
                    tht,
                    tht_ket,
                    abdomen,
                    abdomen_ket,
                    leher,
                    leher_ket,
                    genitalia,
                    genitalia_ket,
                    mulut,
                    mulut_ket,
                    thoraks,
                    thoraks_ket,
                    riwayat_penyakit_sekarang,
                    riwayat_penyakit_dulu,
                    riwayat_penyakit_kel,
                    riwayat_obat_tindakan,
                    alergi)
                VALUES(
                  '$input->id_kunjungan',
                  '$input->keluhanutamaErmIrja',
                  '$input->RiwayatPenyakitNowErmIrja',
                  '$input->KeadaanUmumAssMedIrja',
                  '$input->respirasiAssMedIrja',
                  '$input->nadiAssMedIrja',
                  '$input->Spo2AssMedIrja',
                  '$input->pupilAssMedIrja',
                  '$input->tekananDarahErmIrja',
                  '$input->palpasiErmIrja',
                  '$input->suhuErmIrja',
                  '$input->reflekCahayaKiriErmIrja',
                  '$input->bbErmIrja',
                  '$input->tinggiErmIrja',
                  '$input->imtErmIrja',
                  '$input->dacrjasesmenmedis_bgcstot',
                  '$input->AssesmenErmIrja',
                  '$input->tindakanErmIrja',
                  '$input->planningErmIrja',
                  '$input->pasienKompleksErmIrja',
                  '$input->fisikStatusLocalisErmIrja',   
                  '$input->fisikKepalaErmIrja',          
                  '$input->fisikKepalaErmIrjaKet',       
                  '$input->fisikJantungErmIrja',         
                  '$input->fisikJantungErmIrjaKet',      
                  '$input->fisikMataErmIrja',            
                  '$input->fisikMataErmIrjaKet',        
                  '$input->fisikParuErmIrja',           
                  '$input->fisikParuErmIrjaKet',         
                  '$input->fisikThtErmIrja',            
                  '$input->fisikThtErmIrjaKet',          
                  '$input->fisikAbdomenErmIrja',         
                  '$input->fisikAbdomenErmIrjaKet',                               
                  '$input->fisikLeherErmIrja',           
                  '$input->fisikLeherErmIrjaKet',       
                  '$input->fisikGenitaliaErmIrja',       
                  '$input->fisikGenitaliaErmIrjaKet',    
                  '$input->fisikMulutErmIrja',           
                  '$input->fisikMulutErmIrjaKet',        
                  '$input->fisikThoraxErmIrja',          
                  '$input->fisikThoraxErmIrjaKet',
                  '$input->RiwayatPenyakitNowErmIrja',
                  '$input->RiwayatPenyakitDuluErmIrja',
                  '$input->RiwayatPenyakitFam',
                  '$input->RiwayatOpErmIrja',
                  '$input->RiwayatAlergiErmIrja')");
        } 

        if ($save) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    =$this->db->error();
            $output['data']     = $this->db->error();
        }
        
        $this->hasil($output);
        
    }

}
