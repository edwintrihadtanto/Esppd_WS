<?php


namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author lapto
 */
class List_erm_irna extends Api
{


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
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,sp.id_kunjungan as soap
                    FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    left join soap_pasien sp on sp.id_kunjungan=k.id_kunjungan
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
    public function updateterimapasien()
    {
      $input = json_decode(file_get_contents('php://input'));
      $listParam = [ 'norm' ];
      if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $query="SELECT * from serah_terima ";
        $queryx = $this->db->query($query)->getRow();                
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
                echo json_encode($output);
            }
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
                  UPPER(P.nama) as nama,
                  UPPER(P.alamat) as alamat,
                    --P.tgl_lahir,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,sp.id_kunjungan as soap
                    FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    left join soap_pasien sp on sp.id_kunjungan=k.id_kunjungan
                    WHERE
                    LEFT (k.id_unit, 1) = '1'   -->> Rawat Jalan
                    AND  tr.no_rm like UPPER('".$norm."%')";
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
                    --P.tgl_lahir,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,sp.id_kunjungan as soap
                    FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    left join soap_pasien sp on sp.id_kunjungan=k.id_kunjungan
                    WHERE
                    LEFT (k.id_unit, 1) = '1'   -->> Rawat Jalan
                    AND upper(p.nama) like UPPER('".$norm."%')";      
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
    public function saveserahterima()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =[
          'kunjungan',
          'transaksi',];
          $output = array();
          $output['status']   = "gagal";
          $output['pesan']    = "";
          $save               = false;

          if ($this->evalParam($input, $listParam)) {
            $sqlcekawal="SELECT * from serah_terima s INNER JOIN (SELECT id_kunjungan FROm kunjungan where id_transaksi='$input->transaksi')k on k.id_kunjungan=s.id_kunjungan where s.terima='f' ";
            $cekawal = $this->db->query($sqlcekawal)->getResult();  
            if (empty($cekawal)) {
             $sqlcek  ="SELECT * from serah_terima where id_kunjungan='$input->kunjungan' and id_unit_asal='$input->asal' and id_unit_tujuan='$input->unittujuan' and aktif='t' and terima='f' ";
             $cek     = $this->db->query($sqlcek)->getResult(); 
              $terapi=str_replace("'",'',$input->terapi);
              $keluhan=str_replace("'",'',$input->keluhan);
              $perhatikan=str_replace("'",'',$input->perhatikan);
              $indikasi=str_replace("'",'',$input->indikasi);
              $tindakan=str_replace("'",'',$input->tindakan);

           if (empty($cek)) { //JIKA TIDAK KOSONG
               $query="INSERT INTO serah_terima(
                id_kunjungan,
                id_unit_asal,
                id_unit_tujuan,
                tgl_pindah,
                kondisi_masuk,
                indikasi_masuk,
                nyeri,
                resiko_jatuh,
                terapi,
                dpjp,
                dpjp_konsul,
                terhubung_dpjp,
                jam_terhubung,
                advis_dpjp,
                keterangan_advis,
                rencana_terapi,
                rencana_tindakan,
                diperhatikan,
                lab,
                aktif,
                rad,
                ekg,
                lain,
                id_kamar_tujuan,
                hub_via,
                perawat,
                dokter_serah,
                terima,
                diagnosa
                )values(
                '$input->kunjungan',
                '$input->asal',
                '$input->unittujuan',
                '$input->tgl_pindah',
                '".$keluhan."',
                '".$indikasi."',
                '$input->nyeri',
                '$input->jatuh',
                '".$terapi."',
                '$input->dok_terima',
                '$input->konsul',
                '$input->dpjpterkonfim',
                '$input->hub_dpjb',
                '$input->respon_advis',
                '$input->advis',
                '".$terapi."',
                '".$tindakan."',
                '".$perhatikan."',
                '$input->lab',
                't',
                '$input->rad',
                '$input->ekg',
                '0',
                '$input->id_kamar',
                '$input->hub_via',
                '$input->rawat_serah',
                '$input->dok_serah',
                false,
                '$input->diagnosa')";
                $save=$this->db->simpleQuery($query);
                if ($save) {
                    $queryx="INSERT INTO dokumen_pasien values (
                        '$input->transaksi',
                        '22','$input->kunjungan')";
                    $save_dok=$this->db->simpleQuery($queryx);
                    if ($save_dok) {
                        $output['status']   = "sukses";
                        $output['pesan']    = 'Berhasil';
                        $output['data']     = '';
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = 'gagal';
                    }
                } else {
                   $output['status']   = "gagal";
                   $output['pesan']    = $query;
               }
         }else{ //JIKA KOSONG
          $output['status']   = "gagal";
          $output['pesan']    = 'Pasien Telah Terinput ke unit yang sama';
      }
  } else {
   $output['status']   = "gagal";
   $output['pesan']    = 'Pasien Telah Terinput ke unit yang sama dan Belum diterima';
}


                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = 'Data Kurang Lengkap';                    
                }


                $this->hasil($output);
            }

            public function saveAssesmenDokterIrna()
            {
                $input = json_decode(file_get_contents('php://input'));
                $listParam =[
                  'id_kunjungan',
                  'keluhanutamaermirja',
                  'RiwayatPenyakitNowermirja',];
                  $output = array();
                  $unit =$input->id_unit;
                  $output['status']   = "gagal";
                  $output['pesan']    = "";
                  $save               = false;
                  $saveggi            = false;
                  if ($this->evalParam($input, $listParam)) {

                    $save=$this->db->simpleQuery("INSERT INTO 
                        assesmen_medis_irna_umum(
                            id_kunjungan,
                            keluhan_utama,
                            penyakit_sekarang,
                            tinggal,
                            status_mental,
                            status_psikologi,
                            pengguna_restrain,
                            budaya,
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
                          '$input->keluhanutamaermirja',
                          '$input->RiwayatPenyakitNowermirja',
                          '$input->TinggalBersamaermirja',
                          '$input->statusmentalermirja',
                          '$input->statusPsikologis',
                          '$input->penggunaanRestrainermirja',
                          '$input->Budayaermirja',
                          '$input->KeadaanUmumAssMedIrja',
                          '$input->respirasiAssMedIrja',
                          '$input->nadiAssMedIrja',
                          '$input->Spo2AssMedIrja',
                          '$input->pupilAssMedIrja',
                          '$input->tekananDarahermirja',
                          '$input->palpasiermirja',
                          '$input->suhuermirja',
                          '$input->reflekCahayaKiriermirja',
                          '$input->bbermirja',
                          '$input->tinggiermirja',
                          '$input->imtermirja',
                          '$input->dacrjasesmenmedis_bgcstot',
                          '$input->Assesmenermirja',
                          '$input->tindakanermirja',
                          '$input->planningermirja',
                          '$input->pasienKompleksermirja',
                          '$input->fisikStatusLocalisermirja',   
                          '$input->fisikKepalaermirja',          
                          '$input->fisikKepalaermirjaKet',       
                          '$input->fisikJantungermirja',         
                          '$input->fisikJantungermirjaKet',      
                          '$input->fisikMataermirja',            
                          '$input->fisikMataermirjaKet',        
                          '$input->fisikParuermirja',           
                          '$input->fisikParuermirjaKet',         
                          '$input->fisikThtermirja',            
                          '$input->fisikThtermirjaKet',          
                          '$input->fisikAbdomenermirja',         
                          '$input->fisikAbdomenermirjaKet',                               
                          '$input->fisikLeherermirja',           
                          '$input->fisikLeherermirjaKet',       
                          '$input->fisikGenitaliaermirja',       
                          '$input->fisikGenitaliaermirjaKet',    
                          '$input->fisikMulutermirja',           
                          '$input->fisikMulutermirjaKet',        
                          '$input->fisikThoraxermirja',          
                          '$input->fisikThoraxermirjaKet',
                          '$input->RiwayatPenyakitNowermirja',
                          '$input->RiwayatPenyakitDuluermirja',
                          '$input->RiwayatPenyakitFam',
                          '$input->RiwayatOpermirja',
                          '$input->RiwayatAlergiermirja')");
} 
if ($save) {

 $output['status']   = "sukses";
 $output['pesan']    = 'Berhasil';
} else {
 $output['status']   = "gagal";
 $output['pesan']    =$this->db->error();
}

$this->hasil($output);

}

}
