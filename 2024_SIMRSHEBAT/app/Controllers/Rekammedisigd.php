<?php


namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author lapto
 */
class Rekammedisigd extends Api
{
    public function addeErmIgd() {
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
        $s=str_replace("'",'',$input->subjek);
        $o=str_replace("'",'',$input->objek);
        $a=str_replace("'",'',$input->assesmen);
        $p=str_replace("'",'',$input->planning);
        $i=str_replace("'",'',$input->instruksi);
        $nadi=str_replace("'",'',$input->nadi);
        $suhu=str_replace("'",'',$input->suhu);
        $saturasi=str_replace("'",'',$input->saturasi);
        $tdarah=str_replace("'",'',$input->tekanandarah);
        $spo2=str_replace("'",'',$input->Spo2);
        $ceksoap=$this->db->query("select *from soap_pasien where id_kunjungan='$input->id_kunjungan' and id_pegawai='$input->id_pegawai' and aktif='t' ")->getResult();
        if (!empty($ceksoap)) { 
            $this->db->query("update soap_pasien set aktif='f' where id_kunjungan='$input->id_kunjungan' and id_pegawai='$input->id_pegawai'  ");
        }
        if ($this->evalParam($input, $listParam)) {
            $erm = $this->db->simpleQuery("INSERT INTO soap_pasien(id_kunjungan,subjek,objek,assesmen,planning,id_pegawai,aktif,instruksi,suhu,tekanan_darah,nadi,saturasi,no_rm,spo2) 
                VALUES('$input->id_kunjungan','".$s."','".$o."','".$a."','".$p."','$input->id_pegawai','t','".$i."','".$suhu."','".$tdarah."','".$nadi."','".$saturasi."','$input->rm','".$spo2."')");
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
        public function suratsehatigd()
        {
            return view('view/modal/erm/suratsehatigd');
        }
        public function suratkelahiranigd()
        {
            return view('view/modal/erm/suratkelahiranigd');
        }
        public function suratkematianigd()
        {
            return view('view/modal/erm/suratkematian');
        }
        public function saveTreage() {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'id_kunjungan',
            ];
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $treage = false;
            $vital  = false;
            if ($this->evalParam($input, $listParam)) {
                $treage=$this->db->simpleQuery("
                  INSERT INTO treage(
                    id_kunjungan,
                    tgl_masuk,
                    jam_datang,
                    jam_periksa,
                    id_pegawai,
                    cara_masuk,
                    terima_informasi,
                    asal_masuk,
                    hub_pemberi_informasi,
                    nama_pemberi_informasi,
                    doa,
                    triage_pasien,
                    keluhan_utama,
                    status_laka,
                    asal_rujukan,
                    jenis_laka,
                    tgl_laka,
                    tempat_laka,
                    pengatar_laka
                    )VALUES(
                    '$input->id_kunjungan',
                    '$input->dactriage_atgl',
                    '$input->ajammasuk',
                    '$input->ajamperiksa',
                    '$input->id_pegawai',
                    '$input->dactriage_bmasuk',
                    '$input->selectinfotreage',
                    '$input->selectrujukantreage',
                    '$input->hubwalitrage',
                    '$input->namawalitreage',
                    '$input->doatreage',
                    '$input->dactriage_hlevel',
                    '$input->Treagekeluhan',
                    '$input->selectkecelakaantreage',
                    '$input->selectrujukantreage',
                    '$input->selectjenislakatreage',
                    '$input->tglkecelakaantreage',
                    '$input->tempatkejadiaantreage',
                    '$input->pengatarpasientreage'
                )");
            }
            if ($treage) {
                $vital = $this->db->simpleQuery("INSERT INTO tanda_vital(
                    id_kunjungan,
                    keadaan_umum,
                    respirasi,
                    nadi,
                    spo2,
                    pupil_kiri,
                    tekanan_darah1,
                    suhu,
                    reflek_cahaya_kiri,
                    bb,
                    tinggi_badan,
                    imt,
                    skor_kesadaran,
                    tipe_kesadaran,
                    pupil_kanan,
                    reflek_cahaya_kanan,
                    tekanan_darah2,
                    aktif,
                    id_pegawai

                    ) 
                VALUES(
                    '$input->id_kunjungan',
                    '$input->KeadaanUmumTriageIgd',
                    '$input->respirasiTriageIgd',
                    '$input->nadiTriageIgd',
                    '$input->Spo2TriageIgd',
                    '$input->pupilkiriTriageIgd',
                    '$input->tekananDarahTriageIgd1',
                    '$input->suhuTriageIgd',
                    '$input->reflekCahayaKiriTriageIgd',
                    '$input->bbTriageIgd',
                    '$input->tinggiTriageIgd',
                    '$input->imtTriageIgd',
                    '$input->skor_kesadaran',
                    '$input->tipe_kesadaran',
                    '$input->pupilkananTriageIgd',
                    '$input->reflekCahayaKananTriageIgd',
                    '$input->tekananDarahTriageIgd2',
                    true,
                    '$input->id_user')");
            }
/*        echo $vital;
exit;*/
if($vital){
    $kat_treage=$this->db->simpleQuery("INSERT into detail_treage(
        id_kunjungan,
        airway_level1,
        airway_level2,
        airway_level3,
        airway_level4,
        airway_level5,
        breathing_level1,
        breathing_level2,
        breathing_level3,
        breathing_level4,
        breathing_level5,
        circulation_level1,
        circulation_level2,
        circulation_level3,
        circulation_level4,
        circulation_level5,
        disability_level1,
        disability_level2,
        disability_level3,
        disability_level4,
        disability_level5
        )VALUES(
        '$input->id_kunjungan',
        '$input->dactriage_hlevel1alist',
        '$input->dactriage_hlevel2alist',
        '$input->dactriage_hlevel3alist',
        '$input->dactriage_hlevel4alist',
        '$input->dactriage_hlevel5alist',
        '$input->dactriage_hlevel1blist',
        '$input->dactriage_hlevel2blist',
        '$input->dactriage_hlevel3blist',
        '$input->dactriage_hlevel4blist',
        '$input->dactriage_hlevel5blist',
        '$input->dactriage_hlevel1clist',
        '$input->dactriage_hlevel2clist',
        '$input->dactriage_hlevel3clist',
        '$input->dactriage_hlevel4clist',
        '$input->dactriage_hlevel5clist',
        '$input->dactriage_hlevel1dlist',
        '$input->dactriage_hlevel2dlist',
        '$input->dactriage_hlevel3dlist',
        '$input->dactriage_hlevel4dlist',
        '$input->dactriage_hlevel5dlist'
    )");
}else{
    $output['status']   = "gagal";
    $output['pesan'] = $this->db->error();
    $output['data'] = $this->db->error();  
}

if ($kat_treage) {
    $output['status']   = "sukses";
    $output['pesan']    ='Berhasil';
    $output['data']     ='';
} else {
    $output['status']   = "gagal";
    $output['pesan'] = $this->db->error();
    $output['data'] = $this->db->error();
}

echo json_encode($output);
}
public function pemeriksaanawalperawat()
{
    $input = json_decode(file_get_contents('php://input'));
    $ceksoap=$this->db->query("select * from soap_pasien where id_kunjungan ='$input->id_kunjungan' ")->getResult();
    if (!empty($ceksoap)) { 
        $output['status']   = "sukses";
        $output['pesan']    = '';
        $output['code']     =200;
        $output['data']     = $ceksoap;
    } else { 
        $output['status']   = "gagal";
        $output['code']     =201;
        $output['pesan']    = 'Belum dilakukan pemeriksaan awal pasien';                   
    }
    echo json_encode($output);

}
public function ruangan()
{

  $input = json_decode(file_get_contents('php://input'));

  $output = array();
  $output['status']   = "gagal";
  $output['pesan']    = "";    

  $query = "select * from kunjungan inner join unit using(id_unit)  where id_kunjungan='$input'";

  $ruang= $this->db->query($query)->getResult();
  $output['status']   = 'sukses';
  $output['data']     = $ruang;        
  echo json_encode($output);

}
public function statuspulangirja() {
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [
        'id_kunjungan',
    ];
    $output = array();
    $output['status'] = "gagal";
    $output['pesan'] = "";
    $erm = false;
        //$updatekunjungan=false;
    if ($this->evalParam($input, $listParam)) {
        $erm = $this->db->simpleQuery("INSERT INTO status_keluar(id_kunjungan,id_cara_keluar,tujuan) 
            VALUES('$input->id_kunjungan','$input->statuspulang','$input->rujukan')");
    }
    if ($erm) {
        $output['status']   = "sukses";
        $output['pesan']    ='Berhasil';
        $output['data']     ='';
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "tidak berhasil simpan erm irja";
        $output['data']     = $this->db->error();
    }

    $this->hasil($output);
}



public function viewkondisiawal()
{
 $input = json_decode(file_get_contents('php://input'));
 $query="SELECT
                    * 
 FROM
 soap_pasien
 WHERE
 no_rm = '$input->rm' order by tgl_input desc limit 1";

 $queryx = $this->db->query($query)->getResult();                
 if (!empty($queryx)) { 
    $output['status']   = "sukses";
    $output['pesan']    = "";
    $output['data']     = $queryx;
} else { 
    $output['status']   = 'gagal';
    $output['pesan']    = 'kondisi awal belum diisi';                  
}
echo json_encode($output);
}

public function ReviewAssesmenMedisIrja()
{
 $input = json_decode(file_get_contents('php://input'));
 $query="SELECT
                    * 
 FROM
 transaksi
 INNER JOIN kunjungan USING ( id_transaksi )
 INNER JOIN assesmen_medis_umum USING ( id_kunjungan ) 
 WHERE
 no_rm = '$input->rm' order by tgl_masuk desc limit 1";

 $queryx = $this->db->query($query)->getResult();                
 if (!empty($queryx)) { 
    $output['status']   = "sukses";
    
    $output['code']     =200;
    $output['data']     = $queryx;
    $output['pesan']    = ''; 
} else { 
    $output['status']   = "gagal";
    $output['code']     =201;
    $output['pesan']    = 'Pasien belum dilakukan assesmen medis';   

}
echo json_encode($output);
}

public function ReviewAssesmenKeperawatanIrja()
{
 $input = json_decode(file_get_contents('php://input'));
 $query="SELECT
                    * 
 FROM
 transaksi
 INNER JOIN kunjungan USING ( id_transaksi )
 INNER JOIN assesmen_keperawatan_umum USING ( id_kunjungan ) 
 WHERE
 no_rm = '$input->rm' order by tgl_masuk desc limit 1";

 $queryx = $this->db->query($query)->getResult();                
 if (!empty($queryx)) { 
    $output['status']   = "sukses";
    
    $output['code']     =200;
    $output['data']     = $queryx;
    $output['pesan']    = ''; 
} else { 
    $output['status']   = "gagal";
    $output['code']     =201;
    $output['pesan']    = 'Pasien belum dilakukan assesmen medis';   

}
echo json_encode($output);
}

public function ReviewAssesmenPerawatIrja()
{
 $input = json_decode(file_get_contents('php://input'));
 $query="SELECT
                    * 
 FROM
 transaksi
 INNER JOIN kunjungan USING ( id_transaksi )
 INNER JOIN assesmen_keperawatan_umum USING ( id_kunjungan ) 
 WHERE
 no_rm = '$input->rm' order by tgl_masuk desc limit 1";

 $queryx = $this->db->query($query)->getResult();                
 if (!empty($queryx)) { 
    $output['status']   = "sukses";
    $output['pesan']    = '';
    $output['code']     =200;
    $output['data']     = $queryx;
} else { 
    $output['status']   = "gagal";
    $output['code']     =201;
    $output['pesan']    = 'Pasien belum dilakukan assesmen perawat';                   
}
echo json_encode($output);
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
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,k.id_kunjungan as soap, jam_masuk
                    FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama=true
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    left join (SELECT * from soap_pasien limit 1) sp on sp.id_kunjungan=k.id_kunjungan
                    WHERE
                    LEFT (k.id_unit, 1) = '3'   -->> Rawat Jalan
                    AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%') and tr.tgl_transaksi::date=current_date";

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

    public function listpasienby()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $cek=is_numeric($norm);
            if ($cek==true) {
              $query = "
              SELECT
              tr.id_transaksi,k.id_kunjungan,
              DATE(tr.tgl_transaksi) as tgl_transaksi,
              k.id_unit,
              u.nama_unit,
              tr.no_rm,
              pt.id_penjamin,
              UPPER(P.nama) as nama,
              UPPER(P.alamat) as alamat,
              P.tgl_lahir,
              P.kd_agama,
              P.kd_pendidikan,
              P.kd_pekerjaan,
              P.telepon,
              pt.no_sjp,
              penj.nama_penjamin,
              age(P.tgl_lahir) :: varchar,
              EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,x.id_kunjungan as soap, jam_masuk
              FROM
              transaksi tr
              INNER JOIN pasien P ON tr.no_rm = P.no_rm
              INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
              INNER JOIN unit u ON u.id_unit = k.id_unit
              INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
              and pt.penjamin_utama=true
              INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
              left join (select * from soap_pasien order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
              WHERE
                    left(k.id_unit,1) ='3'   -->> Rawat IGD
                    AND  tr.no_rm like UPPER('".$norm."%') and tr.tgl_transaksi::date='$input->tgl' ";
                }else{
                  $query = "
                  SELECT
                  tr.id_transaksi,k.id_kunjungan,
                  DATE(tr.tgl_transaksi) as tgl_transaksi,
                  k.id_unit,
                  u.nama_unit,
                  tr.no_rm,
                  UPPER(P.nama) as nama,
                  UPPER(P.alamat) as alamat,
                  P.tgl_lahir,
                  P.kd_agama,
                  P.kd_pendidikan,
                  P.kd_pekerjaan,
                  P.telepon,
                  pt.no_sjp,
                  penj.nama_penjamin,
                  age(P.tgl_lahir) :: varchar,
                  EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,x.id_kunjungan as soap, jam_masuk
                  FROM
                  transaksi tr
                  INNER JOIN pasien P ON tr.no_rm = P.no_rm
                  INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                  INNER JOIN unit u ON u.id_unit = k.id_unit
                  INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                  INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                  left join (select * from soap_pasien order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
                  WHERE
                    left(k.id_unit,1) ='3'   -->> Rawat IGD
                    AND upper(p.nama) like UPPER('".$norm."%') and tr.tgl_transaksi::date='$input->tgl' ";      
                }


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
            $output['pesan']    = "";
        }


        if ($save) {
            $output['status']   = "sukses";
            $output['pesan']    = '';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "";
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
            $output['pesan']    = '';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "";
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
                $output['pesan']    = '';
                $output['data']     = '';
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "";
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
                    $output['pesan']    = '';
                    $output['data']     = '';
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->error();
                }

                $this->hasil($output);

            }
            public function saveResumeErmIrja()
            {
                $input = json_decode(file_get_contents('php://input'));
                $listParam =[
                  'id_kunjungan',];
                  $output = array();
                  $output['status']   = "gagal";
                  $output['pesan']    = "";
                  $save               = false;
                  if ($this->evalParam($input, $listParam)) {
                    $save=$this->db->simpleQuery("INSERT INTO 
                        resume_pasien(
                            id_kunjungan,
                            tgl_masuk,
                            tgl_keluar,
                            dpjp,
                            cara_masuk,
                            berat_lahir,
                            tgl,
                            riwayat_kesehatan,
                            pemeriksaan_fisik,
                            pemeriksaan_diagnostik,
                            terapi,
                            tindakan,
                            instruksi,
                            diagnosis,
                            perkembangan_perawatan,
                            cara_keluar,
                            keadaan_umum,
                            kesadaran,
                            mobilitasi_plg,
                            covid,
                            tensi,
                            nadi,
                            alat_bantu,
                            kasus_baru,
                            suhu,
                            respirasi,
                            alat_medis_terpasang,
                            kegiatan,
                            instruksi_lanjutan
                            )VALUES(
                            '$input->id_kunjungan',
                            '$input->tgl_masuk',
                            '$input->tgl_keluar',
                            '$input->dpjp',
                            '$input->cara_masuk',
                            '$input->berat_lahir',
                            '$input->tgl',
                            '$input->riwayat_kesehatan',
                            '$input->pemeriksaan_fisik',
                            '$input->pemeriksaan_diagnostik',
                            '$input->terapi',
                            '$input->tindakan',
                            '$input->instruksi',
                            '$input->diagnosis',
                            '$input->perkembangan_perawatan',
                            '$input->cara_keluar',
                            '$input->keadaan_umum',
                            '$input->kesadaran',
                            '$input->mobilitasi_plg',
                            '$input->covid',
                            '$input->tensi',
                            '$input->nadi',
                            '$input->alat_bantu',
                            '$input->kasus_baru',
                            '$input->suhu',
                            '$input->respirasi',
                            '$input->alat_medis_terpasang',
                            '$input->kegiatan',
                            '$input->instruksi_lanjutan'
                        )");
                }
                if ($save) {
                    $output['status']   = "sukses";
                    $output['pesan']    = 'Berhasil';
                    $output['data']     = '';
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    =$this->db->error();
                }

                $this->hasil($output);
            }
            public function saveAssesmenDokterigd()
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
                  $saveggi            = false;
                  if ($this->evalParam($input, $listParam)) {

                    $save=$this->db->simpleQuery("INSERT INTO 
                        assesmen_medis_umum(
                            id_kunjungan,
                            keluhan_utama,
                            penyakit_sekarang,
                            tinggal,
                            status_mental,
                            status_psikologi,
                            pengguna_restrain,
                            budaya,
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
                            id_pegawai,
                            ttd)
                        VALUES(
                          '$input->id_kunjungan',
                          '$input->keluhanutamaErmIrja',
                          '$input->RiwayatPenyakitNowErmIrja',
                          '$input->TinggalBersamaErmIRja',
                          '$input->statusmentalErmIrja',
                          '$input->statusPsikologis',
                          '$input->penggunaanRestrainErmIrja',
                          '$input->BudayaErmIrja',
                          '$input->Assesmenassmedigd ',
                          '$input->tindakanassmedigd ',
                          '$input->planningassmedigd ',
                          '$input->pasienKompleksassmedigd ',
                          '$input->fisikStatusLocalisassmedigd ',   
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
                          '$input->id_user',
                          '$input->ttd')");
                } 

                if ($save) {
                    $queryx="INSERT INTO
                    tanda_vital(
                        id_kunjungan,
                        keadaan_umum,
                        respirasi,
                        nadi,
                        spo2,
                        pupil_kiri,
                        tekanan_darah1,
                        suhu,
                        reflek_cahaya_kiri,
                        bb,
                        tinggi_badan,
                        imt,
                        skor_kesadaran,
                        tipe_kesadaran,
                        pupil_kanan,
                        reflek_cahaya_kanan,
                        tekanan_darah2,
                        aktif,
                        id_pegawai,
                        respon_e,
                        respon_v,
                        respon_m)values(

                        '$input->id_kunjungan',
                        '$input->KeadaanUmumassmedigd',
                        '$input->respirasiassmedigd',
                        '$input->nadiassmedigd',
                        '$input->Spo2assmedigd',
                        '$input->pupilkiriassmedigd',
                        '$input->tekananDarahassmedigd1',
                        '$input->suhuassmedigd',
                        '$input->reflekCahayaKiriassmedigd',
                        '$input->bbassmedigd',
                        '$input->tinggiassmedigd',
                        '$input->imtassmedigd',
                        '$input->dacrjasesmenmedis_bgcstot',
                        '$input->tipekesadaranassmedmigd',
                        '$input->pupilkananassmedigd',
                        '$input->reflekCahayaKananassmedigd',
                        '$input->tekananDarahassmedigd2',
                        true,
                        '$input->id_user',
                        '$input->respon_e',
                        '$input->respon_v',
                        '$input->respon_m')";
                        $tanda_vital=$this->db->simpleQuery($queryx);
                    }
                    if ($tanda_vital) {
                        $output['status']   = "sukses";
                        $output['pesan']    = 'Berhasil';
                    } else {
                     $output['status']   = "gagal";
                     $output['pesan']    =$queryx;
                 }

                 $this->hasil($output);

             }
             public function saveAssesmenKeperawatanIgd()
             {
                $input = json_decode(file_get_contents('php://input'));
                $listParam =[
                  'id_kunjungan',
                  'keluhanutama',
                  'RiwayatPenyakitNow',];
                  $output = array();
                  $output['status']   = "gagal";
                  $output['pesan']    = "";
                  $save               = false;
                  if ($this->evalParam($input, $listParam)) {
                    $query="INSERT INTO 
                    assesmen_keperawatan_umum(
                        id_kunjungan,
                        keluhan_utama,
                        penyakit_sekarang,
                        tinggal,
                        status_mental,
                        status_psikologi,
                        pengguna_restrain,
                        budaya,
                        diagnosa_kep,
                        intervensi_kep,
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
                        skrining_gizi,
                        penurunan_bb,
                        asupan_makan,
                        skor_gizi,
                        saran_tindakan_gizi,
                        status_fungsional,
                        cara_berjalan,
                        cara_pegang,
                        resiko_jatuh,
                        ket_resiko_jatuh,
                        skorface,
                        bicara,
                        penerjemah,
                        bhs_isyarat,
                        hambatan,
                        aktif,
                        id_pegawai,
                        ttd)
                    VALUES(
                      '$input->id_kunjungan',
                      '$input->keluhanutama',
                      '$input->RiwayatPenyakitNow',
                      '$input->TinggalBersama',
                      '$input->statusmental',
                      '$input->statusPsikologis',
                      '$input->Restrain',
                      '$input->Budaya',
                      '$input->diagnosaKeperawatan',
                      '$input->intervensi',
                      '$input->fisikStatusLocalis',   
                      '$input->fisikKepala',          
                      '$input->fisikKepalaKet',       
                      '$input->fisikJantung',         
                      '$input->fisikJantungKet',      
                      '$input->fisikMata',            
                      '$input->fisikMataKet', 
                      '$input->fisikParu',           
                      '$input->fisikParuKet',         
                      '$input->fisikTht',            
                      '$input->fisikThtKet',          
                      '$input->fisikAbdomen',         
                      '$input->fisikAbdomenKet',                               
                      '$input->fisikLeher',           
                      '$input->fisikLeherKet',       
                      '$input->fisikGenitalia',       
                      '$input->fisikGenitaliaKet',  
                      '$input->fisikMulut',           
                      '$input->fisikMulutKet',        
                      '$input->fisikThorax',          
                      '$input->fisikThoraxKet',
                      '$input->RiwayatPenyakitNow',
                      '$input->bbturun',
                      '$input->bbturunkg',
                      '$input->penurunanmakan',
                      '$input->totalskor',
                      '$input->saran',
                      '$input->fungsional',
                      '$input->keseimbangan',          
                      '$input->penopang',              
                      '$input->hasilskrining',  
                      '$input->hasilkesimpulan',
                      '$input->skorface',
                      '$input->KebKomBicaraasskepigd',
                      '$input->Penerjemahasskepigd',
                      '$input->Isyaratasskepigd',
                      '$input->HamBelajarasskepigd', 
                      true,'$input->id_user',
                      '$input->ttd')";
                    $save=$this->db->simpleQuery($query);    
                    
                    $queryrl="INSERT INTO rl_kegiatan(id_kunjungan,id_kegiatan) VALUES('$input->id_kunjungan','$input->kegiatan_rl')";    
                    $this->db->simpleQuery($queryrl);
                } 

                if ($save) 
                {

                   if ($input->id_unit=='3002' || $input->id_unit==3002) {
                       $querybidan="INSERT INTO
                       assesmen_bidan(
                        id_kunjungan,
                        rwytmenstruasi,
                        umurenarche,
                        jmldarahhaid,
                        hsiklushaid,
                        hlamahaid,
                        hdesminore,
                        hkawin,
                        hkawin1usia,
                        husiasuami1,
                        hkawin2usia,
                        husiasuami2,
                        hobstetrikg,
                        hobstetrikp,
                        hobstetrika,
                        htglhpht,
                        htglsalin,
                        hhamiltm1list,
                        hhamiltm2list,
                        hginekologilist,
                        riwayatkblama,
                        riwayatkblist,
                        riwayatkbkomplikasilist,
                        aktif,
                        id_pegawai
                        )values(
                        '$input->id_kunjungan',
                        '$input->rwytmenstruasi', 
                        '$input->umurenarche', 
                        '$input->jmldarahhaid', 
                        '$input->hsiklushaid', 
                        '$input->hlamahaid', 
                        '$input->hdesminore', 
                        '$input->hkawin', 
                        '$input->hkawin1usia', 
                        '$input->husiasuami1', 
                        '$input->hkawin2usia', 
                        '$input->husiasuami2', 
                        '$input->hobstetrikg', 
                        '$input->hobstetrikp', 
                        '$input->hobstetrika', 
                        '$input->htglhpht', 
                        '$input->htglsalin', 
                        '$input->hhamiltm1list', 
                        '$input->hhamiltm2list', 
                        '$input->hginekologilist', 
                        '$input->riwayatkblama', 
                        '$input->riwayatkblist', 
                        '$input->riwayatkbkomplikasilist',
                        true,
                        '$input->id_user')"; 
                        $savebidan=$this->db->simpleQuery($querybidan); 
                        if ($savebidan) {
                            $queryx="INSERT INTO
                            tanda_vital(
                                id_kunjungan,
                                keadaan_umum,
                                respirasi,
                                nadi,
                                spo2,
                                pupil_kiri,
                                tekanan_darah1,
                                suhu,
                                reflek_cahaya_kiri,
                                bb,
                                tinggi_badan,
                                imt,
                                skor_kesadaran,
                                tipe_kesadaran,
                                pupil_kanan,
                                reflek_cahaya_kanan,
                                tekanan_darah2,
                                aktif,
                                id_pegawai,
                                palpasi)values(
                                '$input->id_kunjungan',
                                '$input->KeadaanUmum',
                                '$input->respirasi',
                                '$input->nadi',
                                '$input->Spo2',
                                '$input->pupilkiri',
                                '$input->tekananDarah1',
                                '$input->suhu',
                                '$input->reflekCahayaKiri',
                                '$input->bb',
                                '$input->tinggi',
                                '$input->imt',
                                '$input->skor',
                                '$input->tipekesadaranasskepermigd',
                                '$input->pupilkanan',
                                '$input->reflekCahayaKiri',
                                '$input->tekananDarah2',
                                true,
                                '$input->id_user',
                                '$input->palpasi')";
                                $tanda_vital=$this->db->simpleQuery($queryx);
                                if ($tanda_vital) {
                                    $output['status']   = "sukses";
                                    $output['pesan']    = $query;
                                    $output['data']     = '';
                                } else {
                                    $output['status']   = "gagal";
                                    $output['pesan']    =$this->db->error()['message'];
                                    $output['data']     = $this->db->error()['message'];
                                }
                            }





                        }else{
                         $queryx="INSERT INTO
                         tanda_vital(
                            id_kunjungan,
                            keadaan_umum,
                            respirasi,
                            nadi,
                            spo2,
                            pupil_kiri,
                            tekanan_darah1,
                            suhu,
                            reflek_cahaya_kiri,
                            bb,
                            tinggi_badan,
                            imt,
                            skor_kesadaran,
                            tipe_kesadaran,
                            pupil_kanan,
                            reflek_cahaya_kanan,
                            tekanan_darah2,
                            aktif,
                            id_pegawai,
                            palpasi)values(
                            '$input->id_kunjungan',
                            '$input->KeadaanUmum',
                            '$input->respirasi',
                            '$input->nadi',
                            '$input->Spo2',
                            '$input->pupilkiri',
                            '$input->tekananDarah1',
                            '$input->suhu',
                            '$input->reflekCahayaKiri',
                            '$input->bb',
                            '$input->tinggi',
                            '$input->imt',
                            '$input->skor',
                            '$input->tipekesadaranasskepermigd',
                            '$input->pupilkanan',
                            '$input->reflekCahayaKiri',
                            '$input->tekananDarah2',
                            true,
                            '$input->id_user',
                            '$input->palpasi')";
                            $tanda_vital=$this->db->simpleQuery($queryx);
                            if ($tanda_vital) {
                                $output['status']   = "sukses";
                                $output['pesan']    = 'Berhasil';
                                $output['data']     = '';
                            } else {
                                $output['status']   = "gagal";
                                $output['pesan']    =$this->db->error()['message'];
                                $output['data']     = $this->db->error()['message'];
                            }
                        }
                    }

                    $this->hasil($output);

                }
                public function saveResumeErmIgd()
                {
                    $input = json_decode(file_get_contents('php://input'));
                    $listParam =[
                      'id_kunjungan',];
                      $output = array();
                      $output['status']   = "gagal";
                      $output['pesan']    = "";
                      $save               = false;
                      if ($this->evalParam($input, $listParam)) {
                        $cek=$this->db->query("select * from resume_pasien where id_kunjungan='$input->id_kunjungan' ")->getResult();
                        if (!empty($cek)) {
                            $this->db->query("update resume_pasien set aktif=false where id_kunjungan='$input->id_kunjungan' ");
                        } 
                        $save=$this->db->simpleQuery("INSERT INTO 
                            resume_pasien(
                                id_kunjungan,
                                tgl_masuk,
                                tgl_keluar,
                                dpjp,
                                cara_masuk,
                                berat_lahir,
                                tgl,
                                riwayat_kesehatan,
                                pemeriksaan_fisik,
                                pemeriksaan_diagnostik,
                                terapi,
                                tindakan,
                                instruksi,
                                diagnosis,
                                perkembangan_perawatan,
                                cara_keluar,
                                keadaan_umum,
                                kesadaran,
                                mobilitasi_plg,
                                covid,
                                tensi,
                                nadi,
                                alat_bantu,
                                kasus_baru,
                                suhu,
                                respirasi,
                                alat_medis_terpasang,
                                kegiatan,
                                instruksi_lanjutan,
                                ttd,
                                aktif
                                )VALUES(
                                '$input->id_kunjungan',
                                '$input->tgl_masuk',
                                '$input->tgl_keluar',
                                '$input->dpjp',
                                '$input->cara_masuk',
                                '$input->berat_lahir',
                                '$input->tgl',
                                '$input->riwayat_kesehatan',
                                '$input->pemeriksaan_fisik',
                                '$input->pemeriksaan_diagnostik',
                                '$input->terapi',
                                '$input->tindakan',
                                '$input->instruksi',
                                '$input->diagnosis',
                                '$input->perkembangan_perawatan',
                                '$input->cara_keluar',
                                '$input->keadaan_umum',
                                '$input->kesadaran',
                                '$input->mobilitasi_plg',
                                '$input->covid',
                                '$input->tensi',
                                '$input->nadi',
                                '$input->alat_bantu',
                                '$input->kasus_baru',
                                '$input->suhu',
                                '$input->respirasi',
                                '$input->alat_medis_terpasang',
                                '$input->kegiatan',
                                '$input->instruksi_lanjutan',
                                '$input->ttd',
                                true
                            )");
                    }
                    if ($save) {
                        $output['status']   = "sukses";
                        $output['pesan']    = 'Berhasil';
                        $output['data']     = '';
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    =$this->db->error();
                    }

                    $this->hasil($output);
                }
                public function addmrpenyakitirja()
                {
                    $input = json_decode(file_get_contents('php://input'));
                    $tgl=date('Y-m-d');
                    $output = array();
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,tgl_kunjungan,id_penyakit,id_kunjungan,status_diag) VALUES('$input->rm','$input->unit','".$tgl."','$input->kode', '$input->id_kunjungan','$input->stat') ");
                        $output['status']   = "sukses";
                        $output['code']     = '';
                        $output['pesan']    = '';

                        echo json_encode($output);
                    }
                    public function datakunjunganhistorirm()
                    {
                        $input = json_decode(file_get_contents('php://input'));
                        $listParam = [ 'norm' ];
                        if ($this->evalParam($input, $listParam)) {
                            $output = array();
                            $output['status']   = "gagal";
                            $output['pesan']    = "";
                            $norm       = $input->norm;

                            $query = "SELECT
                    * 
                            FROM
                            kunjungan kun
                            JOIN transaksi tra ON kun.id_transaksi = tra.id_transaksi 
                            JOIN unit un on kun.id_unit=un.id_unit
                            where
                            tra.no_rm = '$norm'
                            AND un.jenis_unit in ('1','2')
                            AND kun.aktif='t' order by kun.tgl_masuk desc
                            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $norm;                    
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function tindakanirja()
    {
     $tindakan =  $this->db->query("SELECT * FROM produk");
     $output['status'] = 'sukses';
     $output['pesan'] ='';
     $output['data'] = $tindakan->getResult();

     echo json_encode($output); 
 }

 public function datakunjunganhistorirmsoapi()
 {
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'idkunjungan' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $id       = $input->idkunjungan;

        $query = "SELECT * FROM soap_pasien where id_kunjungan ='$id' and aktif='t' order by jam_input desc";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $id;                    
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function datapenunjangradiologipasienigd()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;

            $query = "SELECT
               * 
            FROM
            order_rad o inner join
            hasil_radiologi h on o.id_kunjungan_rad=h.id_kunjungan
            where o.id_kunjungan in 
            (SELECT id_kunjungan
                FROM
                kunjungan kun
                JOIN transaksi tra ON kun.id_transaksi = tra.id_transaksi 
                JOIN unit un on kun.id_unit=un.id_unit
                where
                tra.no_rm = '$norm'
                AND un.jenis_unit in ('1','2','3'))
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $norm;                    
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function datapenunjangpasienigd()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;

            $query = "SELECT
               * 
            FROM
            order_lab o inner join
            hasil_lab h on o.id_kunjungan_lab=h.id_kunjungan
            where o.id_kunjungan in 
            (SELECT id_kunjungan
                FROM
                kunjungan kun
                JOIN transaksi tra ON kun.id_transaksi = tra.id_transaksi 
                JOIN unit un on kun.id_unit=un.id_unit
                where
                tra.no_rm = '$norm'
                AND un.jenis_unit in ('1','2','3'))
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $norm;                    
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    /*detail lab*/
    public function detaillaboratorium()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT * 
            FROM
            order_lab o inner join
            hasil_lab h on o.id_kunjungan_lab=h.id_kunjungan
            INNER JOIN hasil_lab_detail hd
            on h.id_kunjungan=hd.id_kunjungan
            inner join indikator_hasil ih on hd.id_indikator_hasil=ih.id_indikator_hasil
            where hd.id_kunjungan ='$input->id_kunjungan' ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "201";
                    $output['pesan']    = "";                   
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    /*detail lab*/

    public function datakunjunganrmmedisdetail()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id       = $input->id;
            
            $query = "SELECT * FROM assesmen_medis_umum k inner join (select * from tanda_vital where aktif='true' ) v on v.id_kunjungan=k.id_kunjungan where k.id_kunjungan ='$id'";
            $querytreage = "SELECT * FROM treage k inner join (select * from tanda_vital where aktif='true' ) v on v.id_kunjungan=k.id_kunjungan where k.id_kunjungan ='$id'";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                   $queryz = $this->db->query($querytreage)->getResult();                
                if (!empty($queryz)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryz;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "Data tidak ditemukan";                   
                }                  
            }
        } else {
            $output['code']     = "01";
            $output['status']   = 'gagal cari, hubungi admin';
            $output['pesan']    = $this->db->error()['message'];
        }
    }
    echo json_encode($output);
}
public function datakunjunganrmkeperdetail()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'id' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $id       = $input->id;

        $query = "SELECT * FROM assesmen_keperawatan_umum k inner join (select * from tanda_vital where aktif='true' ) v on v.id_kunjungan=k.id_kunjungan where k.id_kunjungan ='$id' and k.aktif='true'";
        $querytreage = "SELECT * FROM treage k inner join (select * from tanda_vital where aktif='true' ) v on v.id_kunjungan=k.id_kunjungan where k.id_kunjungan ='$id' limit 1 ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $queryz = $this->db->query($querytreage)->getResult();  
                     if (!empty($queryz)) { //JIKA TIDAK KOSONG
                        $output['status']   = "sukses";
                        $output['code']     = "00";
                        $output['pesan']    = "Data ditemukan";
                        $output['data']     = $queryz;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "Data tidak ditemukan";                   
                }                   
            }
        } else {
            $output['code']     = "01";
            $output['status']   = 'gagal cari, hubungi admin';
            $output['pesan']    = $this->db->error()['message'];
        }
    }
    echo json_encode($output);
}
public function viewasstreage()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'id_kunjungan' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $query   = "SELECT * from tanda_vital  where id_kunjungan='$input->id_kunjungan' and aktif='t' limit 1";
              if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getRow();   
                $treage   = $this->db->query("SELECT * from treage  where id_kunjungan ='$input->id_kunjungan'  limit 1")->getRow();   
                $detailtreage=$this->db->query("SELECT * from detail_treage where id_kunjungan='$input->id_kunjungan'  limit 1")->getRow();        
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                    $output['treage']   = $treage;
                    $output['detailtreage']=$detailtreage;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "201"; 
                    $output['pesan']    = "Tanda Vital kosong";                 
                }
            } 
        };
        echo json_encode($output);
    }

    public function Rlkegiatan()
    {
        $unit =  $this->db->query("SELECT * FROM kegiatan WHERE rl='3.2'");
        $output['status']   = 'sukses';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }

}
