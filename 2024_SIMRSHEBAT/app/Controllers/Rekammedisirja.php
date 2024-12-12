<?php


namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author lapto
 */
class Rekammedisirja extends Api
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
        $updatesoap=false;
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

        if ($this->evalParam($input, $listParam)) {
            $cek=$this->db->query("select * from soap_pasien where id_kunjungan='$input->id_kunjungan' and id_pegawai='$input->id_pegawai' and aktif=true ")->getResult();
            if (!empty($cek)) {
                $updatesoap=$this->db->simpleQuery("update soap_pasien set aktif=false where id_kunjungan='$input->id_kunjungan' and id_pegawai= '$input->id_pegawai' ");
                if ($updatesoap) {
                    $erm = $this->db->simpleQuery("INSERT INTO soap_pasien(id_kunjungan,
                        subjek,
                        objek,
                        assesmen,
                        planning,
                        id_pegawai,
                        aktif,
                        instruksi,
                        suhu,
                        tekanan_darah,nadi,saturasi,no_rm,spo2) 
                    VALUES('$input->id_kunjungan','".$s."','".$o."','".$a."','".$p."','$input->id_pegawai','t','".$i."','".$suhu."','".$tdarah."','".$nadi."','".$saturasi."','$input->rm','".$spo2."')");
                }else{
                  $output['status']   = "gagal";
                  $output['pesan']    = "tidak berhasil simpan erm irja";
                  $output['data']     = $this->db->error();
              }
          } else {
            $erm = $this->db->simpleQuery("INSERT INTO soap_pasien(id_kunjungan,
                subjek,
                objek,
                assesmen,
                planning,
                id_pegawai,
                aktif,
                instruksi,
                suhu,
                tekanan_darah,nadi,saturasi,no_rm,spo2) 
            VALUES('$input->id_kunjungan','".$s."','".$o."','".$a."','".$p."','$input->id_pegawai','t','".$i."','".$suhu."','".$tdarah."','".$nadi."','".$saturasi."','$input->rm','".$spo2."')");
        }

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
public function suratsehatirja()
{
    return view('view/modal/erm/suratsehatirja');
}
public function viewMonitoringHD()
{
    return view('view/modal/rwj/MonitoringHD');
}
public function daftarMonitoringHD()
{
  $input = json_decode(file_get_contents('php://input'));
  $output = array();
  $output['status']   = "gagal";
  $output['pesan']    = "";
  $query = "SELECT
  o.observasi,
  M.tgl_masuk,
  M.ket,
  M.qblood,
  M.ufr,
  M.tensi,
  M.tensi1,
  M.hr,
  M.suhu,
  M.rr,
  M.MAP,
  M.tmp,
  M.vp,
  M.ap,
  M.nyeri,
  M.gcs,
  M.targerufg,
  M.nacl,
  M.dektros,
  M.mamin,
  M.lain,
  M.jmlcc,
  M.uf_vol,
  p.nama_pegawai 
  FROM
  monitor_hd
  M INNER JOIN observasi o ON o.kd_observasi = M.observasi
  INNER JOIN pegawai P ON M.perawat = P.id_pegawai  where M.id_transaksi='$input->id_transaksi' " ;
  $monitorhd     = $this->db->query($query)->getResult();
  $output['status']   = 'sukses';
  $output['monitorhd']  = $monitorhd;
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
        $output['pesan']    = 'Belum dilakukan SOAP I';                   
    }
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

        $erm = $this->db->simpleQuery("INSERT INTO status_keluar(id_kunjungan,id_cara_keluar,tujuan,aktif) 
            VALUES('$input->id_kunjungan','$input->statuspulang','$input->rujukan',true)");
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

public function datakunjunganhistorirmsoapiresume()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'idkunjungan' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $id       = $input->idkunjungan;
        $user     = $input->user;

        $query = "SELECT * FROM soap_pasien s inner join pegawai p on p.id_pegawai=s.id_pegawai where s.id_kunjungan ='$id' and aktif='t' and s.id_pegawai='$user' limit 1  ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getRow();                
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

public function ReviewAssesmenMedisIrjaresume()
{
 $input = json_decode(file_get_contents('php://input'));
 $query="SELECT
 concat ( 'Jantung ', CASE WHEN jantung = '1' THEN 'normal' ELSE jantung_ket END ) AS jantung,
 concat ( 'Kepala ', CASE WHEN kepala = '1' THEN 'normal' ELSE kepala_ket END ) AS kepala,
 concat ( 'Mata ',CASE WHEN  mata = '1' THEN 'normal' ELSE mata_ket END ) AS mata,
 concat ( 'Tht ',CASE WHEN tht = '1' THEN 'normal' ELSE tht_ket END ) AS tht,
 concat ( 'Leher ',CASE WHEN leher = '1' THEN 'normal' ELSE leher_ket END ) AS leher,
 concat ( 'Mulut ',CASE WHEN mulut = '1' THEN 'normal' ELSE mulut_ket END ) AS mulut,
 concat ( 'Thorak ',CASE WHEN thoraks = '1' THEN 'normal' ELSE thoraks_ket END ) AS thoraks,
 concat ( 'Paru ',CASE WHEN paru = '1' THEN 'normal' ELSE paru_ket END, paru_ket ) AS paru,
 concat ( 'Abdomen ',CASE WHEN abdomen = '1' THEN 'normal' ELSE abdomen_ket END ) AS abdomen,
 concat ( 'Genitalis ',CASE WHEN genitalia = '1' THEN 'normal' ELSE genitalia_ket END  ) AS genitalia 
 FROM
 assesmen_medis_umum
 INNER JOIN kunjungan USING ( id_kunjungan )  where
 id_kunjungan = '$input->id_kunjungan' order by tgl_masuk desc limit 1";
 $querycaramasuk="SELECT C
 .cara_masuk,r.rujukan 
 FROM
 penjamin_transaksi
 T INNER JOIN cara_masuk C ON C.kd_cara_masuk = T.cara_masuk
 inner join rujukan r on r.kd_rujukan=T.id_rujukan where T.id_transaksi='$input->transaksi' limit 1 ";
 $obat="SELECT
    * 
 FROM
 far_obat_out foo
 JOIN far_obat_outdet food USING (noresep, tglresep)
 JOIN far_obat fo USING ( kd_obat )
 JOIN mapping_signa ms USING ( id_signa )
 JOIN tarif_obat USING ( kd_obat ) 
 WHERE

 foo.id_kunjungan='$input->id_kunjungan'
 ORDER BY
 urut ASC";

 $query1 = $this->db->query($query)->getRow(); 
 $query2 = $this->db->query($querycaramasuk)->getRow();   
 $obat   = $this->db->query($obat)->getResult();             
 if (!empty($query1)) { 
    $output['status']   = "sukses";
    
    $output['code']     =200;
    $output['data1']     = $query1;
    $output['data2']     = $query2;
    $output['obat']      = $obat;
    $output['pesan']    = ''; 
} else { 
    $output['status']   = "gagal";
    $output['code']     =201;
    $output['pesan']    = 'Pasien belum dilakukan assesmen medis';  
    $output['data']     =''; 

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

        
        $querycekindi = $this->db->query("SELECT * from hasil_lab_detail 
            JOIN hasil_lab USING(id_kunjungan) 
            LEFT JOIN pegawai on CAST(hasil_lab.dokter as INT) =pegawai.id_pegawai
            WHERE id_kunjungan='$input->id_kunjungan'")->getRow();
        if (!empty($querycekindi)) {
            if($querycekindi->id_indikator_hasil<100000){
                $queryhasil = "    SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no, produk.id_produk,produk.nama_produk,item_periksa_lab.nmtestind nama_indikator_hasil,item_periksa_lab.unittest satuan_indikator_hasil,hasil_lab_detail.id_indikator_hasil,hasil_lab_detail.hasil,hasil_lab_detail.abnormal,hasil_lab_detail.normal nilai_hasil_normal
                FROM hasil_lab_detail        
                JOIN item_periksa_lab on hasil_lab_detail.id_indikator_hasil=item_periksa_lab.id
                JOIN map_produk_indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=hasil_lab_detail.id_indikator_hasil
                JOIN produk on produk.id_produk=map_produk_indikator_hasil.id_produk
                WHERE id_kunjungan='$input->id_kunjungan' ";
            }else{
                $queryhasil ="    SELECT ROW_NUMBER () OVER ( ORDER BY produk.id_produk ) AS no, produk.id_produk,produk.nama_produk,item_periksa_lab.nmtestind nama_indikator_hasil,item_periksa_lab.unittest satuan_indikator_hasil,hasil_lab_detail.id_indikator_hasil,hasil_lab_detail.hasil,hasil_lab_detail.abnormal,hasil_lab_detail.normal nilai_hasil_normal
                FROM hasil_lab_detail        
                JOIN item_periksa_lab on hasil_lab_detail.id_indikator_hasil=item_periksa_lab.id
                JOIN map_produk_indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=hasil_lab_detail.id_indikator_hasil
                JOIN produk on produk.id_produk=map_produk_indikator_hasil.id_produk
                WHERE id_kunjungan='$input->id_kunjungan' ";            
            }

            
             if ($this->db->simpleQuery($queryhasil)) { //true
                $queryx = $this->db->query($queryhasil)->getResult();                
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
        }else{
          $output['status']   = "sukses";
          $output['code']     = "201";
          $output['pesan']    = "";        
      }

  }
  echo json_encode($output);
}
/*obat diterima*/
public function obatditerimairja()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'id_kunjungan' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $query = "SELECT
    * 
        FROM
        far_obat_out foo
        JOIN far_obat_outdet food USING (noresep, tglresep)
        JOIN far_obat fo USING ( kd_obat )
        JOIN mapping_signa ms USING ( id_signa )
        JOIN tarif_obat USING ( kd_obat ) 
        WHERE

        foo.id_kunjungan='$input->id_kunjungan'
        ORDER BY
        urut ASC";

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
    /*icd9*/
    public function datamricd9irja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT    kd_icd9,deskripsi,tgl_tindakan
            from mr_tindakan inner join icd_9 USING(kd_icd9) where id_kunjungan='$input->kunjungan'";

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
    /*icd 10*/
    public function datamrpenyakitirja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT    id_penyakit,
            penyakit,
            CASE
            
            WHEN status_diag = 0 THEN
            'awal' ELSE 
            case when status_diag = 1 then 'utama' ELSE
            'sekunder'
            end
            END AS status 
            from mr_penyakit inner join penyakit USING(id_penyakit) where id_kunjungan='$input->kunjungan'";

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
    public function ReviewAssesmenKepIrja()
    {
     $input = json_decode(file_get_contents('php://input'));
     $query="SELECT
                    * 
     FROM
     transaksi
     INNER JOIN kunjungan USING ( id_transaksi )
     INNER JOIN assesmen_keperawatan_umum USING ( id_kunjungan ) 
     WHERE
     no_rm = '$input->rm' and id_unit='$input->id_unit'  order by id desc limit 1";

     $queryx = $this->db->query($query)->getResult();                
     if (!empty($queryx)) { 
        $output['status']   = "sukses";

        $output['code']     =200;
        $output['data']     = $queryx;
        $output['pesan']    = ''; 
    } else { 
        $output['status']   = "gagal";
        $output['code']     =201;
        $output['pesan']    = 'Pasien belum dilakukan assesmen keperawatan';   

    }
    echo json_encode($output);
}
public function ReviewSoapIrja()
{
 $input = json_decode(file_get_contents('php://input'));
 $query="SELECT
                    * 
 FROM
 soap_pasien
 WHERE
 id_kunjungan = '$input->kunjungan' and id_pegawai='$input->id_user' order by id desc limit 1";

 $queryx = $this->db->query($query)->getResult();                
 if (!empty($queryx)) { 
    $output['status']   = "sukses";
    
    $output['code']     =200;
    $output['data']     = $queryx;
    $output['pesan']    = ''; 
} else { 
    $output['status']   = "gagal";
    $output['code']     =201;
    $output['pesan']    = 'user anda belum input SOAP I';   

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
 INNER JOIN assesmen_keperawatan_irja_umum USING ( id_kunjungan ) 
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
 assesmen_keperawatan_umum ass where ass.id_kunjungan='$input->id_kunjungan' and ass.aktif='t'";

 $queryx = $this->db->query($query)->getRow();                
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
        P.telepon,
        P.kd_agama,
        P.kd_pendidikan,
        P.kd_pekerjaan,
        pt.no_sjp,
        pt.id_penjamin,
        penj.nama_penjamin,
        peg.nama_pegawai,
        age(P.tgl_lahir) :: varchar,
        EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,x.id_kunjungan as soap,
        jam_masuk
        FROM
        transaksi tr
        INNER JOIN pasien P ON tr.no_rm = P.no_rm
        INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
        INNER JOIN unit u ON u.id_unit = k.id_unit
        inner join pegawai peg on peg.id_pegawai=k.id_pegawai
        INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama=true
        INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
        left join (select * from soap_pasien where aktif=true order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
        WHERE
        k.id_unit IN ($input->unit_user)  and left(k.id_unit,1)in ('1','7')
        AND tr.no_rm like UPPER('".$norm."%') and tr.tgl_transaksi::date=current_date ";

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
              peg.nama_pegawai,
              age(P.tgl_lahir) :: varchar,
              EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir, k.id_kunjungan as soap,
              jam_masuk
              FROM
              transaksi tr
              INNER JOIN pasien P ON tr.no_rm = P.no_rm
              INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
              INNER JOIN unit u ON u.id_unit = k.id_unit
              INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
              INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
              inner join pegawai peg on peg.id_pegawai=k.id_pegawai
              left join (select * from soap_pasien where aktif=true order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
              WHERE
              k.id_unit IN ($input->unit_user) and left(k.id_unit,1)in ('1','7')
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
              peg.nama_pegawai,
              age(P.tgl_lahir) :: varchar,
              EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir, k.id_kunjungan as soap,
              jam_masuk
              FROM
              transaksi tr
              INNER JOIN pasien P ON tr.no_rm = P.no_rm
              INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
              INNER JOIN unit u ON u.id_unit = k.id_unit
              INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
              INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
              inner join pegawai peg on peg.id_pegawai=k.id_pegawai
              left join (select * from soap_pasien where aktif=true order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
              WHERE
              k.id_unit IN ($input->unit_user) and left(k.id_unit,1)in ('1','7')
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
    public function listpasienbyunit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $unitakses  = $input->unit_user;
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
              peg.nama_pegawai,
              age(P.tgl_lahir) :: varchar,
              EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir, k.id_kunjungan as soap,
              jam_masuk
              FROM
              transaksi tr
              INNER JOIN pasien P ON tr.no_rm = P.no_rm
              INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
              INNER JOIN unit u ON u.id_unit = k.id_unit
              INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
              INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
              inner join pegawai peg on peg.id_pegawai=k.id_pegawai
              left join (select * from soap_pasien where aktif=true order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
              WHERE
              k.id_unit IN ('".$unitakses."') and left(k.id_unit,1)in('1','7')
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
                  peg.nama_pegawai,
                  age(P.tgl_lahir) :: varchar,
                  EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir, k.id_kunjungan as soap,
                  jam_masuk
                  FROM
                  transaksi tr
                  INNER JOIN pasien P ON tr.no_rm = P.no_rm
                  INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                  INNER JOIN unit u ON u.id_unit = k.id_unit
                  INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                  INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                  inner join pegawai peg on peg.id_pegawai=k.id_pegawai
                  left join (select * from soap_pasien where aktif=true order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
                  WHERE
                  k.id_unit IN ('".$unitakses."') and left(k.id_unit,1)in('1','7')
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
            public function savemonitoringhd()
            {
                $input      = json_decode(file_get_contents('php://input'));
                $listParam  =['id_kunjungan',];
                $output             = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $save               = false;
                if ($this->evalParam($input, $listParam)) {
                    $query="INSERT INTO monitor_hd(
                        id_transaksi,
                        id_kunjungan,
                        perawat,
                        tgl_masuk,
                        observasi,
                        qblood,
                        ufr,
                        tensi,
                        tensi1,
                        hr,
                        suhu,
                        rr,
                        map,
                        tmp,
                        vp,
                        ap,
                        nyeri,
                        gcs,
                        targerufg,
                        nacl,
                        dektros,
                        mamin,
                        lain,
                        jmlcc,
                        uf_vol,
                        ket,
                        ttd
                        )values(
                        '$input->id_transaksi',
                        '$input->id_kunjungan',
                        '$input->perawat',
                        '$input->tgl',
                        '$input->observasi',
                        '$input->qb',
                        '$input->ufr',
                        '$input->tensi',
                        '$input->tensi1',
                        '$input->hr',
                        '$input->suhu',
                        '$input->rr',
                        '$input->map',
                        '$input->tmp',
                        '$input->vp',
                        '$input->ap',
                        '$input->nyeri',
                        '$input->gcs',
                        '$input->targetufg',
                        '$input->bnacl',
                        '$input->bdektros',
                        '$input->bmakanminum',
                        '$input->bket',
                        '$input->bketisi',
                        '$input->bvolume',
                        '$input->bket1',
                        '$input->ttd'
                    )";
                        /*-- ufg         :$('#dactindakanhd_ufg').val(),
                        -- ktv         :$('#dactindakanhd_ktv').val(),
                        -- clear       :$('#dactindakanhd_clear').val()*/

                        $save=$this->db->simpleQuery($query);
                    }
                    if ($save) {
                        $queryx="INSERT INTO dokumen_pasien values (
                            '$input->id_transaksi',
                            '33','$input->id_kunjungan')";
                        $save_dok=$this->db->simpleQuery($queryx);
                        if ($save_dok) {
                            $output['status']   = "sukses";
                            $output['pesan']    = 'Berhasil';
                            $output['data']     = '';
                        } else {
                            $output['status']   = "gagal";
                            $output['pesan']    = $query;
                        }

                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
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

                public function saveAssesmenDokterIrja()
                {
                    $input = json_decode(file_get_contents('php://input'));
                    $listParam =[
                      'id_kunjungan',
                      'keluhanutamaErmIrja',
                      'RiwayatPenyakitNowErmIrja',];
                      $output = array();
                      $unit =$input->id_unit;
                      $output['status']   = "gagal";
                      $output['pesan']    = "";
                      $save               = false;
                      $saveggi            = false;
                      $save_ass_penunjang = false;
                      $save_tandavital    = false;
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
                                gambar,
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
                              '$input->gambar',
                              '$input->id_user',
                              '$input->ttd')");
} 
if ($save) {
    $save_tandavital=$this->db->simpleQuery("
        INSERT into tanda_vital(
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
            palpasi,
            aktif,
            id_pegawai,
            respon_e,
            respon_m,
            respon_v,
            dpjp
            )
        values(
           '$input->id_kunjungan',
           '$input->keluhanutamaErmIrja',
           '$input->respirasiAssMedIrja',
           '$input->nadiAssMedIrja',
           '$input->Spo2AssMedIrja',
           '$input->pupilAssMedIrjakiri',
           '$input->tekananDarahErmIrja',
           '$input->suhuErmIrja',
           '$input->reflekCahayaKiriErmIrja',
           '$input->bbErmIrja',
           '$input->tinggiErmIrja',
           '$input->imtErmIrja',
           '$input->dacrjasesmenmedis_bgcstot',
           '$input->tipekesadaranassmedermrwj',
           '$input->pupilAssMedIrjakanan',
           '$input->reflekCahayaKananErmIrja',
           '$input->tekananDarahErmIrja2',
           '$input->palpasiErmIrja',
           true,
           '$input->id_user',
           '$input->eyeOpen',
           '$input->responMotorik',
           '$input->responVerbal',
           true)");
}else {
    $output['status']   = "gagal";
    $output['pesan']    =$this->db->error();

}

if ($save_tandavital) {
    $save_ass_penunjang=$this->db->simpleQuery("INSERT INTO assesmen_penunjang_medis(
        id_kunjungan,
        id_pegawai,
        laboratorium,
        radiologi,
        ekg,
        lain
        ) VALUES(
        '$input->id_kunjungan',
        '$input->id_user',
        '$input->laboratorium',
        '$input->radiologi',
        '$input->ekg',
        '$input->lain'
    )");
}else{
   $output['status']   = "gagal";
   $output['pesan']    =$this->db->error(); 
}
if ($save_ass_penunjang) {
    switch ($input->id_unit) {

        case '1008':
        $save_ggi=$this->db->simpleQuery("
            INSERT INTO assesmen_medis_gigi(
                id_kunjungan,
                lidah,
                mukosa_pipi,
                oklusi,
                torus_p,
                torus_m,
                palatum,
                diastema,
                anomali,
                frenulum_labialis,
                frenulum_lingualis,
                ohi_s,
                temuan,
                diastema_ket
                )VALUES(
                '$input->id_kunjungan',
                '$input->dacrjasesmengigmedis_glidahket',
                '$input->dacrjasesmengigmedis_gmukosapipi',
                '$input->dacrjasesmengigmedis_goklusiId',
                '$input->dacrjasesmengigmedis_gtorus1Id',
                '$input->dacrjasesmengigmedis_gtorus2Id',
                '$input->dacrjasesmengigmedis_gpalatumId',
                '$input->dacrjasesmengigmedis_gdiastemaId',
                '$input->dacrjasesmengigmedis_ganomaliId',
                '$input->dacrjasesmengigmedis_gfrenulum1Id',
                '$input->dacrjasesmengigmedis_gfrenulum2Id',
                '$input->dacrjasesmengigmedis_gohisId',
                '$input->dacrjasesmengigmedis_gtemuanlain',
                '$input->dacrjasesmengigmedis_gdiastemaket'
            )"
            );
        if ($save_ggi) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    =$this->db->error();

        }
        break;

        case '1002':
        $save_mata=$this->db->simpleQuery("INSERT INTO assesmen_medis_mata(
            id_kunjungan,
            od,
            os,
            adisi,
            av_od,
            av_os,
            ishihara,
            ishihara_od,
            ishihara_os
            ) VALUES(
            '$input->id_kunjungan',
            '$input->dacrjasesmenmatmedis_mod',
            '$input->dacrjasesmenmatmedis_mos',
            '$input->dacrjasesmenmatmedis_madisi',
            '$input->dacrjasesmenmatmedis_mavod',
            '$input->dacrjasesmenmatmedis_mavos',
            '$input->dacrjasesmenmatmedis_mishiharaId',
            '$input->dacrjasesmenmatmedis_mschimer1',
            '$input->dacrjasesmenmatmedis_mschimer2'
        )");
        if ($save_mata) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    =$this->db->error();
        }
        break;

        case '1014':
        $save_mata=$this->db->simpleQuery("INSERT INTO assesmen_medis_obgyn(
            id_kunjungan,
            tfu,
            lila,
            his,
            djj,
            vulva_inspekulo,
            partio_inspekulo,
            corpus_inspekulo,
            uterus_inspekulo,
            cavum_inspekulo,
            vulva_dalam,
            partio_dalam,
            pembukaan,
            hodge,
            presentasi_janin,
            ketuban,
            his_lama
            ) VALUES(
            '$input->id_kunjungan',
            '$input->dacrjasesmenmtmedis_otfu',
            '$input->dacrjasesmenmtmedis_olila',
            '$input->dacrjasesmenmtmedis_ohis',
            '$input->dacrjasesmenmtmedis_odjj',
            '$input->dacrjasesmenmtmedis_ovulva',
            '$input->dacrjasesmenmtmedis_oportio',
            '$input->dacrjasesmenmtmedis_ocorpus',
            '$input->dacrjasesmenmtmedis_oparametrium',
            'dacrjasesmenmtmedis_ocavum',
            'dacrjasesmenmtmedis_ovulvadalam',
            'dacrjasesmenmtmedis_oportiodalam',
            'dacrjasesmenmtmedis_opembukaan',
            'dacrjasesmenmtmedis_ohodge',
            'dacrjasesmenmtmedis_opresentasi',
            'dacrjasesmenmtmedis_oketuban',
            'dacrjasesmenmtmedis_ohislama'
        )");
        if ($save_mata) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    =$this->db->error();
        }
        break;

        case '1016':
        $save_hd=$this->db->simpleQuery("INSERT INTO assesmen_medis_hd(
            id_kunjungan,
            preparat_besi,
            erytopoetin,
            obat_emergensi,
            antipiretik,
            antibiotik,
            analgetik,
            transfusi_darah,
            transfusi_darah_cc,
            gluconas,
            lain,
            resep_hd,
            dialisat,
            prolifing,
            heparinisasi,
            ufg,
            qb,
            qd,
            ureum_pre,
            ureum_post,
            frekuensi,
            time_dialisis_jam,
            time_dialisis_menit,
            ufr,
            urr,
            medikasi_dialisis,
            evaluasi_medis
            ) VALUES(
            '$input->id_kunjungan',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_1',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_2',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_3',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_4',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_5',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_6',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_7',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_8',
            '$input->dacrjasesmenmedishd_kolaborasihdlist_9',
            '$input->dacrjasesmenmedishd_kolaborasihdlain',
            '$input->dacrjasesmenmedishd_resephd',
            '$input->dacrjasesmenmedishd_dialisat',
            '$input->dacrjasesmenmedishd_pprofilinglist',
            '$input->dacrjasesmenmedishd_heparinisasilist',
            '$input->dacrjasesmenmedishd_ufg',
            '$input->dacrjasesmenmedishd_qb',
            '$input->dacrjasesmenmedishd_qd',
            '$input->dacrjasesmenmedishd_ureumpre',
            '$input->dacrjasesmenmedishd_ureumpost',
            '$input->dacrjasesmenmedishd_frekuensi',
            '$input->dacrjasesmenmedishd_urasihd',
            '$input->dacrjasesmenmedishd_urasihdmenit',
            '$input->dacrjasesmenmedishd_ufr',
            '$input->dacrjasesmenmedishd_urr',
            '$input->dacrjasesmenmedishd_obatin',
            '$input->EvaluasiErmIrja'

        )");
        if ($save_hd) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';
            $output['data']     = '';
        } else {
            $output['status']   = "gagal";
            $output['pesan']    =$this->db->error();
        }
        break;
        case '1001':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1003':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1004':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1005':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1006':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1007':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1009':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1010':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1011':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1012':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1013':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1015':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1017':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1018':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        case '1019':
        $output['status']   = "sukses";
        $output['pesan']    = 'Berhasil';
        $output['data']     = '';
        break;
        default:
    }
} else {
 $output['status']   = "gagal";
 $output['pesan']    =$this->db->error();
}

$this->hasil($output);

}
public function savekonsultasipoli()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan',];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $save               = false;
    $queryKunjungan     = false;
    if ($this->evalParam($input, $listParam)) {
        $save=$this->db->simpleQuery("INSERT INTO konsultasi(
            id_kunjungan,
            id_pegawai_tanya,
            id_pegawai_jawab,
            tanya,
            jawab,
            id_unit
            )values(
            '$input->id_kunjungan',
            '$input->user',
            '$input->dokterkonsulpoli',
            '$input->pertanyaankonsulpoli',
            '$input->jawabankonsulpoli',
            '$input->unitkonsulpoli')");
    }
    if ($save) {
        $queryKunjungan = $this->db->simpleQuery("INSERT INTO 
            kunjungan(id_transaksi,id_unit,id_pegawai)VALUES('$input->id_transaksi','$input->unitkonsulpoli','$input->dokterkonsulpoli')");

    } else {
       $output['status']   = "gagal";
       $output['pesan']    =$this->db->error();
   }
   if ($queryKunjungan) {
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
public function saveAssesmenKeperawatanIrja()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =[
      'id_kunjungan',
      'keluhanutamaErmKeperawatanIrja',
      'RiwayatPenyakitNowErmKeperawatanIrja',];
      $output = array();
      $output['status']   = "gagal";
      $output['pesan']    = "";
      $save               = false;
      if ($this->evalParam($input, $listParam)) {
        $save=$this->db->simpleQuery("INSERT INTO 
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
                aktif,
                id_pegawai,
                skorface,
                ttd,
                ttd_pasien,
                nama_ttd_pasien)
            VALUES(
              '$input->id_kunjungan',
              '$input->keluhanutamaErmKeperawatanIrja',
              '$input->RiwayatPenyakitNowErmKeperawatanIrja',
              '$input->TinggalBersamaErmIrja',
              '$input->statusmentalErmIrja',
              '$input->statusPsikologis',
              '$input->RestrainAssKeperawatanErmIrja',
              '$input->BudayaAssKeperawatanErmIrja',
              '$input->diagnosaKeperawatan',
              '$input->intervensiErmKeperawatanIrja',
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
              true,
              '$input->id_user',
              '$input->ermrwjkeperawatanskorface',
              '$input->ttd',
              '$input->ttd_pasien',
              '$input->nama_ttd_pasien')");
    } 
    if ($save) {
        $save_tandavital=$this->db->simpleQuery("
            INSERT into tanda_vital(
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
                palpasi,
                aktif,
                id_pegawai,
                dpjp,
                respon_e,
                respon_m,
                respon_v)
            values(
               '$input->id_kunjungan',
               '$input->keluhanutamaErmKeperawatanIrja',
               '$input->respirasiAssKepIrja',
               '$input->nadiAssKepIrja',
               '$input->Spo2AssKepIrja',
               '$input->pupilkiri',
               '$input->tekananDarahErmKepIrja1',
               '$input->suhuErmKepIrja',
               '$input->reflekCahayaKiriErmKepIrja',
               '$input->bbErmKepIrja',
               '$input->tinggiErmKepIrja',
               '$input->imtErmKepIrja',
               '$input->dacrjasesmenkeperawatan_bgcstot',
               '$input->tipekesadaranasskepermrwj',
               '$input->pupilkanan',
               '$input->reflekCahayaKananErmKepIrja',
               '$input->tekananDarahErmKepIrja2',
               '$input->palpasiErmKepIrja',
               true,
               '$input->id_user',
               false,
               '$input->eyeOpen',
               '$input->responMotorik',
               '$input->responVerbal')");
    }else {
        $output['status']   = "gagal";
        $output['pesan']    =$this->db->error();

    }

    if ($save_tandavital) {
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
public function addmrpenyakitirja()
{
    $input = json_decode(file_get_contents('php://input'));
    $tgl=date('Y-m-d');
    
    $output = array();
    $cekkasus=$this->db->query("select id_penyakit from mr_penyakit where no_rm='$input->rm' and id_penyakit='$input->kode' group by id_penyakit ")->getResult();

    if (!empty($cekkasus)) {
        $kasus='t';
    } else{
        $kasus='f';
    }

    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,tgl_kunjungan,id_penyakit,id_kunjungan,status_diag,kasus,id_transaksi) VALUES('$input->rm','$input->unit','".$tgl."','$input->kode', '$input->id_kunjungan','$input->stat','$kasus','$input->id_transaksi') ");
        if ($penyakit) {
            $output['status']   = "sukses";
            $output['code']     = '200';
            $output['pesan']    = 'Berhasil';
        } else {
            $output['status']   = "gagal";
            $output['code']     = '201';
            $output['pesan']    = $this->db->error();;
        }
        


        echo json_encode($output);
    }
    public function addmricd9irja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $tgl=date('Y-m-d');
        $output = array();
        $penyakit = $this->db->simpleQuery("INSERT INTO mr_tindakan(
            kd_icd9,
            tgl_tindakan,
            id_unit,
            id_kunjungan

            ) VALUES('$input->kode','".$tgl."','$input->unit',
            '$input->id_kunjungan') ");
            if ($penyakit) {

                $output['status']   = "sukses";
                $output['code']     = '';
                $output['pesan']    = 'Berhasil';
            }else{
             $output['status']   = "gagal";
             $output['code']     = '';
             $output['pesan']    = $this->db->error();
         }

         echo json_encode($output);
     }
     public function deletemrpenyakitirja()
     {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $penyakit = $this->db->simpleQuery("DELETE FROM mr_penyakit where id_kunjungan= '$input->id_kunjungan' and id_penyakit='$input->kode' ");
        if ($penyakit) {
         $output['status']   = "sukses";
         $output['code']     = '';
         $output['pesan']    = 'Berhasil';
     } else {
        $output['status']   = "gagal";
        $output['code']     = '';
        $output['pesan']    = '';
    }
    echo json_encode($output);
}
public function deletemrtindakanirja()
{
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $penyakit = $this->db->simpleQuery("DELETE FROM mr_tindakan where id_kunjungan= '$input->id_kunjungan' and kd_icd9='$input->kode' ");
    $output['status']   = "sukses";
    $output['code']     = '';
    $output['pesan']    = 'Berhasil';

    echo json_encode($output);
}

public function savepenyakitkel()
{
    $input = json_decode(file_get_contents('php://input'));
    $tgl=date('Y-m-d');
    $output = array();
    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit_fam(id_penyakit,no_rm) VALUES(
        '$input->no_rm','$input->icd') ");
    $output['status']   = "sukses";
    $output['code']     = '';
    $output['pesan']    = 'Berhasil';

    echo json_encode($output);
}
public function datapenunjangradiologipasienirja()
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
    public function datapenunjangpasienirja()
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
            inner join unit un on kun.kd_unit=un.kd_unit
            where
            kun.kd_pasien = '$norm'
            order by kun.tgl_masuk desc
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

        $query = "SELECT * FROM soap_pasien s inner join pegawai p on p.id_pegawai=s.id_pegawai where s.id_kunjungan ='$id' and aktif='t' ORDER BY jam_input desc";

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
    public function datakunjunganrmmedisdetail()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id       = $input->id;
            
            $query = "SELECT * FROM
            assesmen_medis_umum a 
            INNER JOIN tanda_vital t on a.id_kunjungan=t.id_kunjungan where a.id_kunjungan ='$id'  and t.aktif='t' and a.aktif='t'  LIMIT 1";

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
                    $output['pesan']    = "Data tidak ditemukan";
                    $output['data']     = "";                    
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function ReviewDiagnosaPerawat()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $detaildx= $this->db->query("SELECT diagnosa from mr_diagnosa_perawat where id_kunjungan='$input->id_kunjungan' limit 1")->getRow()->diagnosa;
            $query = "SELECT  kd_diagnosa_perawat,uraian  FROM intervensi_import where kd_produk in $detaildx ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Data Kosong";                   
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
            $idunit   = $input->idunit;
            if ($idunit=='3002' || $idunit==3002) {
              $query = "SELECT * 
              FROM
              assesmen_keperawatan_umum ass
              INNER JOIN ( SELECT * FROM tanda_vital WHERE aktif = TRUE  ) td ON td.id_kunjungan = ass.id_kunjungan
              INNER JOIN ( SELECT * FROM assesmen_bidan WHERE aktif = TRUE ) asd ON asd.id_kunjungan = ass.id_kunjungan 
              WHERE
              ass.id_kunjungan = '$id' 
              AND ass.aktif = 't'
              LIMIT 1 ";
          } else {
            $query = "SELECT * FROM assesmen_keperawatan_umum ass INNER JOIN (select * from tanda_vital where aktif=true and dpjp=false) td on td.id_kunjungan=ass.id_kunjungan where ass.id_kunjungan ='$id' AND ass.aktif='t'  limit 1 ";
        }


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
                    $output['pesan']    = "Data tidak ditemukan";                   
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    function adddiagperawat(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'user',
            'id_kunjungan',
            'order_produk'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $output['data'] = "";
        $date =date('Y-m-d');
        if($this->evalParam($input, $listParam)){
            $json_order = json_encode($input->order_produk);
            $json_order = str_replace('"',"''",$json_order);
            $json_order = str_replace('[',"(",$json_order);
            $json_order = str_replace(']',")",$json_order);
            $queryx = "SELECT count(*) + 1 as jumlah FROM mr_diagnosa_perawat WHERE id_kunjungan = '$input->id_kunjungan'";
            $query = "SELECT * FROM mr_diagnosa_perawat WHERE id_kunjungan = '$input->id_kunjungan'  ";
            $hasil = $this->db->query($query);
            if($hasil->getNumRows() > 0){

                $query = "
                UPDATE mr_diagnosa_perawat
                SET tgl_masuk    = '$date',
                diagnosa     = '$json_order',
                id_user      = '$input->user'
                WHERE id_kunjungan = '$input->id_kunjungan'";
                if($this->db->query($query)){
                    $output['status'] = "sukses";
                    $output['pesan']  = "Diagnosa berhasil diupdate";
                }else{
                    $output['status'] = "gagal";
                    $output['pesan']  = $query;
                }
                
            }else{
                $query = "
                INSERT INTO mr_diagnosa_perawat(id_kunjungan,tgl_masuk, diagnosa, id_user)
                VALUES ('$input->id_kunjungan',
                    '$date',
                    '$json_order',
                    '$input->user')
                ";
                if($this->db->query($query)){
                    $output['status'] = "sukses";
                    $output['pesan'] = "Diagnosa berhasil ditambahkan";
                }else{
                    $output['status'] = "gagal";
                    $output['pesan'] = $query ;
                }
            }
        }
        $this->hasil($output);
    }
    public function tampildataPasienrehabrajal()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT *, case when pasien.jenis_kelamin = 't' then 'Laki-laki'
        else 'Perempuan' end as kelamin from kunjungan join transaksi using(id_transaksi) 
            join pasien using(no_rm)
        join pegawai using(id_pegawai) where id_kunjungan='$input->id_kunjungan'";
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

    public function save_layanan_rehabmedik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 
          'idtransaksi','idkunjungan'];     

          if($this->evalParam($input, $listParam)){
            $cek=$this->db->query("select * from dokumen_rehabilitasimedik where id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'")->getNumRows();
            if ($cek > 0) {
               $output = array();
               $output['status']   = "gagal";
               $output['pesan']    = "";    
                //update

               $query="update dokumen_rehabilitasimedik set
               anamnesa ='$input->anamnesa', 
               fisik_ujifungsi ='$input->fisikujifungsi',
               anjuran ='$input->anjuran',
               evaluasi ='$input->evaluasi',
               ases_diagnosa_medis ='$input->ases_diagnosa_medis',
               ases_diagnosa_fungsi ='$input->ases_diagnosa_fungsi',
               ttdpasien ='$input->ttdpasien',
               ttdpegawai ='$input->ttdpegawai',
               suspek_penyakitkerja = '$input->suspek_penyakitkerja',
               suspek_penyakitkerja_ket = '$input->suspek_penyakitkerja_ket'
               where id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'";
           }else{
                //insert
            $query="INSERT INTO dokumen_rehabilitasimedik("
                . "id_transaksi,"
                . "id_kunjungan,"
                . "no_rm,"
                . "anamnesa,"
                . "fisik_ujifungsi,"
                . "anjuran,"
                . "evaluasi,"
                . "ases_diagnosa_medis,"
                . "ases_diagnosa_fungsi,"
                . "ttdpasien,"
                . "ttdpegawai,"
                . "suspek_penyakitkerja,"
                . "suspek_penyakitkerja_ket"
                . ") VALUES("
                . "'".$input->idtransaksi."',"
                . "'".$input->idkunjungan."',"
                . "'".$input->norm."',"
                . "'".$input->anamnesa."',"
                . "'".$input->fisikujifungsi."',"
                . "'".$input->anjuran."',"
                . "'".$input->evaluasi."',"
                . "'".$input->ases_diagnosa_medis."',"
                . "'".$input->ases_diagnosa_fungsi."',"
                . "'".$input->ttdpasien."',"
                . "'".$input->ttdpegawai."',"
                . "'".$input->suspek_penyakitkerja."',"
                . "'".$input->suspek_penyakitkerja_ket."'"
                . ")";
            }
        }

        if ($this->db->simpleQuery($query)) {
            $queryx="INSERT INTO dokumen_pasien values (
                '$input->idtransaksi','34')";
            $save=$this->db->simpleQuery($queryx);
            if ($save) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Menyimpan";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "dokumen tidak tersimpan";
            }
        } else {
         $output['status']   = "gagal";
         $output['pesan']    = $query;
     }
     echo json_encode($output);
 }

 public function save_booking_operasi()
 {
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 
      'idtransaksi','idkunjungan'];     

      if($this->evalParam($input, $listParam)){
        $cek=$this->db->query("select * from antrian_operasi where id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'")->getNumRows();
        if ($cek > 0) {
           $output = array();
           $output['status']   = "gagal";
           $output['pesan']    = "";    
                //update

           $query="update antrian_operasi set
           tgl_operasi ='$input->tglop', 
           jenis_op ='$input->jenisop'
           where id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'";
       }else{
                //insert
        $kodebooking=date('Y-m-d');
        $dataunit=$this->db->query("select * from unit where id_unit='$input->idunit' ")->getRow();
        $datapasien=$this->db->query("select * from penjamin_pasien where no_rm='$input->norm' and id_penjamin=2 limit 1  ")->getRow();
        if (!empty($datapasien)) {
            $nomorkartu=$datapasien->no_kartu;
        } elseif($datapasien->no_kartu==undefined) {
            $nomorkartu='';
        } else {
            $nomorkartu='';
        }
        
        $query="INSERT INTO antrian_operasi("
            . "id_transaksi,"
            . "id_kunjungan,"
            . "kode_booking,"
            . "tgl_operasi,"
            . "jenis_op,"
            . "kode_poli,"
            . "nama_poli,"
            . "terlaksana,"
            . "nopeserta,"
            . "lastupdate,"
            . "kd_pasien"
            . ") VALUES("
            . "'".$input->idtransaksi."',"
            . "'".$input->idkunjungan."',"
            . "'".$kodebooking."',"
            . "'".$input->tglop."',"
            . "'".$input->jenisop."',"
            . "'".$dataunit->map_bpjs."',"
            . "'".$dataunit->nama_unit."',"
            . " 1,"
            . "'".$nomorkartu."',"
            . "'".date('Y-m-d h:m:d')."',"
            . "'".$input->norm."'"
            . ")";
        }
    }

    if ($this->db->simpleQuery($query)) {
        $output['status']   = "sukses";
        $output['pesan']    = "Sukses Menyimpan";
  /*      $queryx="INSERT INTO dokumen_pasien values (
            '$input->idtransaksi','34')";
        $save=$this->db->simpleQuery($queryx);
        if ($save) {
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "dokumen tidak tersimpan";
        }*/
    } else {
     $output['status']   = "gagal";
     $output['pesan']    = $query;
 }
 echo json_encode($output);
}

public function viewLayananRehabmedik()
{
    return view('view/rekammedis/viewLayananRehabmedik');
}
public function viewbookingok()
{
    return view('view/rekammedis/viewbookingok');
}
public function datalayananrehabmedik()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = ['id_transaksi'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)) {
        $query="SELECT
        *,
        CASE
        WHEN pasien.jenis_kelamin = 't' THEN
        'Laki-laki' ELSE'Perempuan' 
        END AS kelamin 
        FROM
        dokumen_rehabilitasimedik
        JOIN kunjungan USING ( id_kunjungan )
        JOIN transaksi on transaksi.id_transaksi=kunjungan.id_transaksi
        JOIN pasien on pasien.no_rm=transaksi.no_rm
        JOIN pegawai USING ( id_pegawai ) 
        WHERE
        dokumen_rehabilitasimedik.id_kunjungan = '$input->id_kunjungan' 
        AND dokumen_rehabilitasimedik.id_transaksi = '$input->id_transaksi'";
        $showform= $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "layanan rehabmedik sudah pernah dibuatkan";
        $output['data']    = $showform;
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "Belum Pernah dibuatkan Form Layanan Rehab";
        $output['data']    = "";
    }           
    echo json_encode($output);      
}

public function view_prosedur_terapi(){
	$output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    $query="SELECT * FROM prosedur_terapi";
    if($this->db->query($query)){
      $output['status']   = "sukses";
      $output['pesan']    = "Data Ditemukan";
      $output['data']    = $this->db->query($query)->getResult();
  }else{
      $output['status']   = "gagal";
      $output['pesan']    = "Data Tidak Ditemukan";
  }
  echo json_encode($output);      
}

public function view_terapi_pasien(){
	$input = json_decode(file_get_contents('php://input'));
    $listParam = ['id_transaksi'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)){
      $query	="SELECT * FROM pasien_terapi JOIN prosedur_terapi USING(id_terapi) WHERE id_transaksi=$input->id_transaksi";
  }
  if($this->db->query($query)){
      $output['status']   = "sukses";
      $output['pesan']    = "Data Ditemukan";
      $output['data']    = $this->db->query($query)->getResult();
  }else{
      $output['status']   = "gagal";
      $output['pesan']    = "Data Tidak Ditemukan";
  }
  echo json_encode($output);   
}

public function save_pros_terapi(){
	$input = json_decode(file_get_contents('php://input'));
    $listParam = ['id_transaksi'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)){
      $query="INSERT INTO pasien_terapi (
          id_transaksi,
          id_kunjungan,
          id_terapi
          )VALUES(
          $input->id_transaksi,
          $input->id_kunjungan,
          $input->id_terapi
      )";
      }
      if($this->db->query($query)){
          $output['status']   = "sukses";
          $output['pesan']    = "Data Berhasil Disimpan";
      }else{
          $output['status']   = "gagal";
          $output['pesan']    = "Data Gagal Disimpan";
      }
      echo json_encode($output);  
  }

  public function deleteterapiirja()
  {
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $penyakit = $this->db->simpleQuery("DELETE FROM pasien_terapi where id_kunjungan= '$input->id_kunjungan' and id_terapi='$input->id_terapi' ");
    if ($penyakit) {
     $output['status']   = "sukses";
     $output['code']     = '';
     $output['pesan']    = 'Berhasil';
 } else {
    $output['status']   = "gagal";
    $output['code']     = '';
    $output['pesan']    = '';
}
echo json_encode($output);
}

}
