<?php
namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author TIM IT EXTERNALS
 */
class Rekammedisirna extends Api{
    public function listpasiensimrs()
    {
      $input = json_decode(file_get_contents('php://input'));
      $listParam = [ 'rm' ];
      if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $data       = $input->rm;
        $pegawai    = $input->pegawai;
        $query = "SELECT * from kunjungan k inner join nginap n 
        on k.kd_pasien=n.kd_pasien and k.tgl_masuk=n.kd_pasien and k.kd_unit=n.kd_unit and k.urut_masuk=n.urut_masuk
        inner join pasien p on p.kd_pasien=k.kd_pasien
        left join kamar km on n.no_kamar=km.no_kamar
        where k.tgl_masuk = CURRENT_DATE ";


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
    public function listpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $data       = $input->norm;
            $pegawai    = $input->pegawai;
            $jenis_pegawai=$this->db->query("SELECT jenis_pegawai FROM pegawai where id_pegawai= $pegawai ")->getRow()->jenis_pegawai;
            if ($jenis_pegawai ==3 || $jenis_pegawai == 5) {
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
                        penj.nama_penjamin,km.nama_kamar,
                        age(P.tgl_lahir) :: varchar,
                        EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,x.id_kunjungan as soap,k.id_pegawai, jam_masuk, 
                        (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = k.id_pegawai) as nama_dokter,
                        CASE 
                        WHEN jenis_kelamin = true THEN 'Laki-laki'
                        WHEN jenis_kelamin = false THEN 'Perempuan' ELSE '-'
                        END AS jk,
                        jenis_kelamin
                        FROM
                        transaksi tr
                        INNER JOIN pasien P ON tr.no_rm = P.no_rm
                        INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                        INNER JOIN unit u ON u.id_unit = k.id_unit
                        INNER JOIN kamar km on k.id_kamar=km.id_kamar
                        INNER JOIN (select * from penjamin_transaksi where penjamin_utama=true) pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama=true
                        INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                        left join (select * from soap_pasien where aktif order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
                        WHERE
                        LEFT (k.id_unit, 1) in ('2','8')   -->> Rawat Inap  
                        and tr.tgl_tutup is null and k.aktif=true
                        GROUP BY 
                        tr.id_transaksi,k.id_kunjungan,tgl_transaksi,k.id_unit, nama_unit, tr.no_rm, nama, alamat,telepon,no_sjp,nama_penjamin, nama_kamar,age,tgl_lahir,soap,k.id_pegawai,jam_masuk, jenis_kelamin";
                    } else {
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
                        penj.nama_penjamin,km.nama_kamar,
                        age(P.tgl_lahir) :: varchar,
                        EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,x.id_kunjungan as soap,k.id_pegawai, jam_masuk,
                        CASE 
                        WHEN jenis_kelamin = true THEN 'Laki-laki'
                        WHEN jenis_kelamin = false THEN 'Perempuan' ELSE '-'
                        END AS jk,
                        jenis_kelamin
                        FROM
                        transaksi tr
                        INNER JOIN pasien P ON tr.no_rm = P.no_rm
                        INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                        left JOIN hak_akses_erm USING(id_kunjungan)
                        INNER JOIN unit u ON u.id_unit = k.id_unit
                        INNER JOIN kamar km on k.id_kamar=km.id_kamar
                        INNER JOIN (select * from penjamin_transaksi where penjamin_utama=true) pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama=true
                        INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                        left join (select * from soap_pasien where aktif=true order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
                        WHERE
                        LEFT (k.id_unit, 1) in ('2','8')   -->> Rawat Inap  
                        and hak_akses_erm.id_user='$input->user' and tr.tgl_tutup is null and k.aktif=true 
                        GROUP BY 
                        tr.id_transaksi,k.id_kunjungan,tgl_transaksi,k.id_unit, nama_unit, tr.no_rm, nama, alamat,telepon,no_sjp,nama_penjamin, nama_kamar,age,tgl_lahir,soap,k.id_pegawai,jam_masuk, jenis_kelamin";
                    }

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                    $output['data1']    = $this->simrs->query("SELECT k.kd_pasien,km.nama_kamar,k.no_sjp,p.nama from kunjungan k inner join nginap n 
                        on k.kd_pasien=n.kd_pasien and k.tgl_masuk=n.tgl_masuk and k.kd_unit=n.kd_unit and k.urut_masuk=n.urut_masuk
                        inner join pasien p on p.kd_pasien=k.kd_pasien
                        left join kamar km on n.no_kamar=km.no_kamar
                        where k.tgl_masuk = CURRENT_DATE and n.akhir=true ")->getResult();  
                    $output['umur']     = umur('1992-08-03');
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;    
                    $output['data1']    = $this->simrs->query("SELECT k.kd_pasien,km.nama_kamar from kunjungan k inner join nginap n 
                        on k.kd_pasien=n.kd_pasien and k.tgl_masuk=n.tgl_masuk and k.kd_unit=n.kd_unit and k.urut_masuk=n.urut_masuk
                        inner join pasien p on p.kd_pasien=k.kd_pasien
                        left join kamar km on n.no_kamar=km.no_kamar
                        where k.tgl_masuk = CURRENT_DATE ")->getResult();               
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function listpasienserahterimaby()
    {
        $input    = json_decode(file_get_contents('php://input'));
        $tampil   =false;
        $query  ="
        SELECT
        s.id_kunjungan,
        s.id_unit_asal,
        s.id_unit_tujuan,
        s.tgl_pindah,
        s.kondisi_masuk,
        s.indikasi_masuk,
        s.nyeri,
        s.resiko_jatuh,
        s.terapi,
        s.dpjp,
        s.dpjp_konsul,
        s.terhubung_dpjp,
        s.jam_terhubung,
        s.advis_dpjp,
        s.keterangan_advis,
        s.rencana_terapi,
        s.rencana_tindakan,
        s.diperhatikan,
        s.lab,
        s.aktif,
        s.rad,
        s.ekg,
        s.lain,
        s.id_kamar_tujuan,
        s.terima,
        k.id_transaksi,
        s.dokter_serah,
        s.perawat,
        s.diagnosa
        FROM
        serah_terima s inner join kunjungan k 
        on s.id_kunjungan=k.id_kunjungan
        where s.terima='f' and k.id_kunjungan='$input->id_kunjungan' ";
        $tampil=$this->db->simpleQuery($query);

        if ($tampil) { //JIKA TIDAK KOSONG
            $queryx = $this->db->query($query)->getRow();   
            $output['status']   = "sukses";
            $output['code']     = "200";
            $output['pesan']    = "";
            $output['data']     = $queryx;
        } else { // JIKA KOSONG
            $output['status']   = "sukses";
            $output['code']     = "201";
            $output['pesan']    = "";                   
        }
        echo json_encode($output);
    }

    public function listpasienserahterima()
    {
        $input = json_decode(file_get_contents('php://input'));
        $tampil=false;

        if (($input->unittujuan == '')||($input->unittujuan == '0')){
            $filterunittujuan = "";
        }else{
            $filterunittujuan = "AND x.id_unit_asal = '$input->unittujuan' ";
        }

        if (($input->tglpindah == '')||($input->tglpindah == '0')){
            $filtertglpindah = "";
        }else{
            $filtertglpindah = "AND x.tgl_pindah = '$input->tglpindah' ";
        }
        
        $query ="
        SELECT
        x.id_kunjungan,
        x.tgl_pindah,
        un.nama_unit AS unit_tujuan,
        x.nama_unit AS unit_asal,
        x.nama,
        x.tgl_lahir,
        x.alamat,
        x.umur,
        x.jenis_kelamin,
        x.nama_kamar,
        x.no_rm,
        x.nama_pegawai,
        x.id_kamar_tujuan,
        x.id_transaksi,
        x.id_unit_asal,
        x.id_unit_tujuan,
        x.id_pegawai,
        x.nama_penjamin
        FROM
        (
            SELECT
            s.id_kunjungan,
            s.id_unit_asal,
            s.id_unit_tujuan,
            s.tgl_pindah,
            u.nama_unit,
            P.nama,
            P.tgl_lahir,
            UPPER ( P.alamat ) AS alamat,
            EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur,
            P.jenis_kelamin,
            km.nama_kamar,
            P.no_rm,
            s.id_kamar_tujuan,
            pe.nama_pegawai,
            K.id_transaksi,
            K.id_pegawai,
            nama_penjamin
            FROM
            serah_terima s
            INNER JOIN kunjungan K ON s.id_kunjungan = K.id_kunjungan
            INNER JOIN transaksi T ON T.id_transaksi = K.id_transaksi
            INNER JOIN pasien P ON P.no_rm = T.no_rm
            INNER JOIN unit u ON s.id_unit_asal = u.id_unit
            INNER JOIN kamar km ON s.id_kamar_tujuan = km.id_kamar
            INNER JOIN pegawai pe ON pe.id_pegawai = K.id_pegawai
            INNER JOIN ( SELECT * FROM penjamin_transaksi WHERE penjamin_utama = TRUE ) pt ON pt.id_transaksi = T.id_transaksi
            INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
            WHERE
            terima = 'f' 
            AND s.id_unit_tujuan IN ($input->unitakses) 
            ) x
        LEFT JOIN unit un ON x.id_unit_tujuan = un.id_unit

        WHERE x.no_rm ILIKE ('".$input->norm."%') $filterunittujuan $filtertglpindah"; 

        //$tampil = $this->db->simpleQuery($query);
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
    public function saveGrowhtChart()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam=[
            'id_kunjungan',
            'id_transaksi',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input,$listParam)) {
            $cek=$this->db->query("select * from growth_chart where no_rm='$input->no_rm' and tgl_input= CURRENT_DATE")->getResult();
            if (!empty($cek)) {

            } 
            
            $bulan=$this->db->query("SELECT concat((date_part('year', CURRENT_DATE :: date) -
                date_part('year', tgl_lahir :: date)) *12 + (date_part('month', CURRENT_DATE :: date) -
                date_part('month', tgl_lahir :: date)),' B') as umur FROM pasien where no_rm='$input->no_rm' ")->getRow()->umur;
            $hari=$this->db->query("SELECT  concat((date_part('day', CURRENT_DATE :: date) -
                date_part('day', tgl_lahir :: date)),' H') as umur FROM pasien where no_rm='$input->no_rm' ")->getRow()->umur;

            if ($bulan=='0 B') {
                $umur=$hari;
            } else {
                $umur=$bulan;
            }
            
            if (!empty($umur)) {
                $save=$this->db->simpleQuery("INSERT INTO growth_chart(id_transaksi,
                    id_kunjungan,
                    bb,
                    tb,
                    lk,
                    ll,
                    umur,
                    no_rm,
                    id_pegawai,
                    aktif
                ) VALUES('$input->id_kunjungan','$input->id_transaksi','$input->bb','$input->tb','$input->lk','$input->ll','".$umur."','$input->no_rm','$input->id_pegawai',true)");
            } 
            
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
            $output['pesan']    = "tidak berhasil simpan erm irna";
            $output['data']     = $this->db->error();
        }

        $this->hasil($output);
    }
    public function datamrpenyakitirna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'transaksi' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT * from mr_penyakit inner join penyakit USING(id_penyakit) where id_transaksi='$input->transaksi'";

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
    public function jenisinfus()
    {
        $data =  $this->db->query("SELECT kd_obat,nama_obat FROM far_obat where kd_jns_obt=5 ");
        $output['status'] = 'sukses';
        $output['code']     = 200;
        $output['data'] = $data->getResult();

        echo json_encode($output);
    }
    public function getData_historiOrderEresep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunjungan'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";           
            $query_detJadi  = " SELECT * FROM order_resep re inner join 
            order_resepdet ord on re.id_order=ord.id_order
            INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
            INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa where re.id_kunjungan='$input->id_kunjungan' ";

            if ($this->db->query($query_detJadi)->getResult()>0) {

               $output['status'] = 'sukses';
               $output['code']     = 200;
               $output['data'] = 'Terisi';
           } else {
              $output['status'] = 'sukses';
              $output['code']     = 200;
              $output['data'] = 'Kosong';
          }    
          echo json_encode($output);   
      }
  }
  public function detailrencanapulangirna()
  {
    $input = json_decode(file_get_contents('php://input'));
    $data =  $this->db->query("SELECT * FROM discharge_planning where id_transaksi='$input->id_transaksi' ");
    $output['status'] = 'sukses';
    $output['code']     = 200;
    $output['data'] = $data->getResult();

    echo json_encode($output);
}

public function cekrencanapulangirna()
{
    $input = json_decode(file_get_contents('php://input'));
    $data =  $this->db->query("SELECT * FROM discharge_planning where id_transaksi='$input->id_transaksi' ")->getResult();
    if (!empty($data)) {

        $output['status'] = 'sukses';
        $output['code']     = 200;
        $output['data'] = 'Terisi';
    } else {
      $output['status'] = 'sukses';
      $output['code']     = 200;
      $output['data'] = 'Kosong';
  }
  echo json_encode($output);
}
public function cekassesmenmedis()
{
    $input = json_decode(file_get_contents('php://input'));
    $data =  $this->db->query("SELECT * FROM assesmen_medis_umum where id_kunjungan='$input->id_kunjungan' ")->getResult();
    if (!empty($data)) {

        $output['status'] = 'sukses';
        $output['code']     = 200;
        $output['data'] = 'Terisi';
    } else {
      $output['status'] = 'sukses';
      $output['code']     = 200;
      $output['data'] = 'Kosong';
  }
  echo json_encode($output);
}
public function cekdiagnosairna()
{
    $input = json_decode(file_get_contents('php://input'));
    $data =  $this->db->query("SELECT * FROM mr_penyakit where id_transaksi='$input->id_transaksi' and left(id_unit,1)='2' ")->getResult();
    if (!empty($data)) {

        $output['status'] = 'sukses';
        $output['code']     = 200;
        $output['data'] = 'Terisi';
    } else {
      $output['status'] = 'sukses';
      $output['code']     = 200;
      $output['data'] = 'Kosong';
  }
  echo json_encode($output);
}
public function cekassesmenperawatirna()
{
    $input = json_decode(file_get_contents('php://input'));
    $data =  $this->db->query("SELECT * FROM assesmen_keperawatan_umum where id_kunjungan='$input->id_kunjungan' ")->getResult();
    if (!empty($data)) {

        $output['status'] = 'sukses';
        $output['code']     = 200;
        $output['data'] = 'Terisi';
    } else {
      $output['status'] = 'sukses';
      $output['code']     = 200;
      $output['data'] = 'Kosong';
  }
  echo json_encode($output);
}
public function dokumenPasien()
{
    $input = json_decode(file_get_contents('php://input'));
    $tambahan =  $this->db->query("SELECT * FROM
        dokumen_pasien
        INNER JOIN dokumen_rekam_medis USING ( id_dokumen ) 
        WHERE
        id_transaksi = '$input->id_transaksi' and utama='f' ");
    // $konsul =  $this->db->query("SELECT * FROM
    //     konsultasi_dpjp 
    //     WHERE id_kunjungan='$input->id_kunjungan' and id_transaksi = '$input->id_transaksi' and aktif=true and dpjp_konsul='$input->id_pegawai'  and terjawab=false ");

    $output['data']         = $tambahan->getResult();

    $output['jawabkonsul']  = '';
    $output['status']       = 'sukses';

    echo json_encode($output);
}

public function cekresume()
{
    $input      = json_decode(file_get_contents('php://input'));
    $listParam  =['id_transaksi',];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="select * from resume_pasien where id_transaksi =$input->id_transaksi and aktif=true ";
        $queryx = $this->db->query($query)->getRow();                
        if (!empty($queryx)) { 
            $output['status']  = "sukses";
            $output['data']    = "Terisi" ;
        } else { 
            $output['status']  = "sukses"; 
            $output['data']    = "Kosong" ;

        }
    }else{
      $output['status']  = "sukses"; 
      $output['data']    = "Kosong" ;
  }
  echo json_encode($output);
}

public function serahterimairna()
{
    $input  = json_decode(file_get_contents('php://input'));
    $data   =  $this->db->query("SELECT *,
        (SELECT nama_pegawai from pegawai where id_pegawai=se.dpjp)as dokter_dpjp,
        (SELECT nama_pegawai from pegawai where id_pegawai=se.dpjp_konsul) as dpjpkonsul, 
        (SELECT nama_pegawai from pegawai where id_pegawai=se.perawat) as perawat_serah,
        (SELECT nama_pegawai from pegawai where id_pegawai=se.dokter_serah) as dokter_pemberi 
        FROM serah_terima se  where se.id_kunjungan='$input->id_kunjungan' ");

    $output['status'] = 'sukses';
    $output['data'] = $data->getResult();

    echo json_encode($output);
}

public function pengantarrawatinap()
{
    $input  = json_decode(file_get_contents('php://input'));
    $data   =  $this->db->query("SELECT *,
        CASE WHEN status_emergency ='1' then 'EMERGENCY' else 'NON EMERGENCY' end as stat_emergency,
        (SELECT nama_pegawai from pegawai where id_pegawai=pe.dokterpengirim) as dokter_pengirim,
        (SELECT nama_pegawai from pegawai where id_pegawai=pe.dokterdpjp) as dokter_dpjp 
        FROM pengantar_rawat_inap pe where id_transaksi='$input->id' ");

    $output['status'] = 'sukses';
    $output['data'] = $data->getResult();

    echo json_encode($output);
}

public function statuspulangirna()
{
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
        $output['pesan']    = "tidak berhasil simpan erm irna";
        $output['data']     = $this->db->error();
    }

    $this->hasil($output);
}

public function viewasstreage()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'id_kunjungan' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $id         = $input->id_kunjungan;
        $query      = "SELECT * from treage  where id_kunjungan ='$id'  limit 1";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getRow();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "";
                    $output['pesan']    ='data kosong';                   
                }
            } 
        }
        echo json_encode($output);
    }

    public function showkonsulirna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id_kunjungan       = $input->id_kunjungan;
            $id_transaksi       = $input->id_transaksi;
            $id_pegawai         = $input->id_pegawai;
            $query      = "SELECT * from konsultasi_dpjp  where id_kunjungan ='$id_kunjungan' and id_transaksi='$id_transaksi' and aktif=true and urut='$input->urut' limit 1 ";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getRow();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "";
                    $output['pesan']    ='data kosong';                   
                }
            } 
        }
        echo json_encode($output);
    }

    public function showjawabkonsulirna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id_kunjungan       = $input->id_kunjungan;
            $id_transaksi       = $input->id_transaksi;
            $id_pegawai         = $input->id_pegawai;
            $query      = "SELECT * from konsultasi_dpjp  where id_kunjungan ='$id_kunjungan' and id_transaksi='$id_transaksi' and aktif=true and dpjp_konsul='$id_pegawai' limit 1 ";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getRow();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "";
                    $output['pesan']    ='data kosong';                   
                }
            } 
        }
        echo json_encode($output);
    }

    public function datapenunjangradiologipasienirna()
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

    public function cekresumeirna()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $listParam  =['id_kunjungan',];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $query="select * from resume_pasien where id_transaksi =$input->transaksi and aktif=true ";
            $queryx = $this->db->query($query)->getRow();                
            if (!empty($queryx)) { 
                $output['status']   = "sukses";
                $output['code']     = 200;
                $output['pesan']    = "Resume Pasien Telah Terinput" ;
            } else { 
                $output['status']   = "sukses";
                $output['code']     = 201;   

            }
        }else{
           $output['code']     = "01";
           $output['status']   = 'Data Tidak lengkap';
       }
       $this->hasil($output);
   }

   public function awalinap()
   {
    $input      = json_decode(file_get_contents('php://input'));
    $listParam  =['transaksi',];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $awalinap=$this->db->query("SELECT tgl_masuk from kunjungan where id_transaksi=$input->transaksi and awal_inap='t' ")->getRow();                
        if (!empty($awalinap)) { 
            $output['status']   = "sukses";
            $output['code']     = 200;
            $output['data']    = $awalinap->tgl_masuk;
        } 
    }else{
       $output['code']     = "01";
       $output['status']   = 'Data Tidak lengkap';
   }
   $this->hasil($output);
}

public function datapenunjangpasienirna()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'norm' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $norm       = $input->norm;

        $query = "SELECT * FROM
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
            AND un.jenis_unit in ('1','2','3')
        )";

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
                    $output['data']     = 0;                    
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
                $output['code']     = "01";
                $output['status']   = 'sukses';
                $output['pesan']    = ''; 
            }
        } else {
            $output['code']     = "01";
            $output['status']   = '';
            $output['pesan']    = '';
        }

        echo json_encode($output);
    }

    public function datakunjunganhistorirmsoapiirna()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $listParam  = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id       = $input->norm;

            $query = "  SELECT * FROM askep_soap s 
            inner join zusers p on p.kd_user=s.kd_ppa  where s.kd_pasien_kunj ='$id' and s.no_transaksi='$input->id_transaksi'  and aktif='t' order by jam_soap desc  ";

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

    public function cekcppt()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $listParam  = [ 'id_transaksi' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $query = "  SELECT * FROM askep_soap s 
            inner join zusers p on p.kd_user=s.kd_ppa  where s.id_transaksi='$input->id_transaksi'  and aktif='t' ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['data']     = 'Terisi';
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['data']     = 'Kosong';
                    $output['pesan']    = "Kosong/Belum ada";                   
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function viewtandavital()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $query   = "SELECT 
            ask.id_kunjungan,
            ask.keluhan_utama,
            ask.penyakit_sekarang,
            ask.tinggal,
            ask.status_mental,
            ask.status_psikologi,
            ask.pengguna_restrain,
            ask.budaya,
            ask.kepala,
            ask.mata,
            ask.tht,
            ask.leher,
            ask.mulut,
            ask.thoraks,
            ask.jantung,
            ask.paru,
            ask.abdomen,
            ask.genitalia,
            ask.status_lokalis,
            ask.penunjang_lain,
            ask.intervensi_kep,
            ask.diagnosa_kep,
            ask.mata_ket,
            ask.kepala_ket,
            ask.tht_ket,
            ask.leher_ket,
            ask.mulut_ket,
            ask.thoraks_ket,
            ask.jantung_ket,
            ask.paru_ket,
            ask.abdomen_ket,
            ask.genitalia_ket,
            ask.riwayat_penyakit_sekarang,
            ask.alergi,
            ask.skrining_gizi,
            ask.penurunan_bb,
            ask.asupan_makan,
            ask.skor_gizi,
            ask.saran_tindakan_gizi,
            ask.status_fungsional,
            ask.resiko_jatuh,
            ask.ket_resiko_jatuh,
            ask.alasan_restrain,
            ask.budaya_ket,
            ask.riyawat_menstruasi,
            ask.umur_menarche,
            ask.siklur_haid,
            ask.hpht,
            ask.perkiraan_haid,
            ask.aktif,
            ask.tgl_update,
            ask.gambar,
            ask.cara_berjalan,
            ask.cara_pegang,
            ask.skorface,
            ask.bicara,
            ask.penerjemah,
            ask.bhs_isyarat,
            ask.hambatan,
            ask.nyeri_60_kurang,
            ask.ttd,
            ask.ttd_pasien,
            ask.nama_ttd_pasien,
            ask.id_tanda_vital,
            t.keadaan_umum,
            t.respirasi,
            t.nadi,
            t.spo2,
            t.pupil_kiri,
            t.tekanan_darah1,
            t.suhu,
            t.reflek_cahaya_kiri,
            t.bb,
            t.tinggi_badan,
            t.imt,
            t.skor_kesadaran,
            t.tipe_kesadaran,
            t.pupil_kanan,
            t.reflek_cahaya_kanan,
            t.tekanan_darah2,
            t.palpasi,
            t.id_pegawai,
            t.respon_e,
            t.respon_m,
            t.respon_v
            FROM assesmen_keperawatan_umum ask left join tanda_vital t on t.id_tanda_vital=ask.id_tanda_vital where ask.id_transaksi='$input->id_transaksi' and ask.aktif='t' limit 1";
            $queryx = $this->db->query($query)->getRow();               
                if (!empty($query)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                    $output['code']     =200;
                }else{// JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $output['data']     = 0;
                    $output['code']     =201;
                }
            };

            echo json_encode($output);
        }

        public function viewisipreanies(){
          $input = json_decode(file_get_contents('php://input'));

          $output = array();
          $output['status']   = "gagal";
          $output['pesan']    = "";

          $query="SELECT * FROM assesmen_pre_anestesi WHERE id_kunjungan=$input";
        if ($this->db->simpleQuery($query)) { //true
            $queryx = $this->db->query($query)->getRow();                
            if (!empty($queryx)) { //JIKA TIDAK KOSONG
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $queryx;
            } else { // JIKA KOSONG
                $output['status']   = "sukses";
                $output['pesan']    = "Data Masih Kosong";
                $output['data']     = 0;
            }
        }
        echo json_encode($output);
    }

    public function viewtandavitalirja()
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
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "201"; 
                    $output['pesan']    = "Tanda Vital kosong";  
                    $output['data']     = "0";               
                }
            } 
        };

        echo json_encode($output);
    }

    public function dataewsirna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_transaksi' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id       = $input->id_transaksi;

            $query = "SELECT * FROM ews s inner join pegawai p on p.id_pegawai=s.id_pegawai where s.id_transaksi ='$id' ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "";
                    $output['pesan']    ='data kosong';                   
                }
            } 
        }
        echo json_encode($output);
    }

    public function pegawaidokok()
    {
        $pegawai =  $this->db->query("SELECT * FROM ok_dokter inner join pegawai using(id_pegawai) where jenis_pegawai='1' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
        echo json_encode($output);
    }

    public function pegawaiperok()
    {
        $pegawai =  $this->db->query("SELECT * FROM ok_dokter inner join pegawai using(id_pegawai) where jenis_pegawai='0' ");
        $output['status']   = 'sukses';
        $output['pesan']    = '';
        $output['data']     = $pegawai->getResult();
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
            $nmapasien  = $input->nmapasien;
            $unit       = $input->unit;
            $tgl        = $input->tgl;

            if (($unit == '')||($unit == '0')){
                $filterunittujuan = "AND LEFT (k.id_unit, 1) in ('2','8')";
            }else{
                $filterunittujuan = "AND K.id_unit = '$unit'";
            }

            if (($tgl == '')||($tgl == '0')){
                $filtertglmasuk = "";
            }else{
                $filtertglmasuk = "AND k.tgl_masuk = '$tgl' ";
            }

            $cek=is_numeric($norm);
            // $pegawai       = $input->pegawai;
            // $jenis_pegawai=$this->db->query("select jenis_pegawai from pegawai where id_pegawai= $pegawai ")->getRow()->jenis_pegawai;
            // if ($jenis_pegawai ==3 || $jenis_pegawai == 5) {
            //     $query = "
            //     SELECT
            //     tr.id_transaksi,k.id_kunjungan,
            //     DATE(tr.tgl_transaksi) as tgl_transaksi,
            //     k.id_unit,
            //     u.nama_unit,
            //     tr.no_rm,
            //     UPPER(P.nama) as nama,
            //     UPPER(P.alamat) as alamat,
            //     P.tgl_lahir,
            //     P.telepon,
            //     pt.no_sjp,
            //     penj.nama_penjamin,
            //     km.nama_kamar,
            //     EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as umur,
            //     x.id_kunjungan as soap,
            //     k.id_pegawai, 
            //     jam_masuk,
            //     jenis_kelamin, 
            //     (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = k.id_pegawai) as nama_dokter
            //     FROM
            //     transaksi tr
            //     INNER JOIN pasien P ON tr.no_rm = P.no_rm
            //     INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
            //     INNER JOIN unit u ON u.id_unit = k.id_unit
            //     inner join kamar km on km.id_kamar=k.id_kamar
            //     INNER JOIN (select * from penjamin_transaksi where penjamin_utama=true) pt ON pt.id_transaksi = tr.id_transaksi
            //     INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
            //     left join (select * from soap_pasien order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
            //     WHERE
            //     tr.no_rm like UPPER('".$norm."%') AND UPPER(P.nama) like UPPER('".$nmapasien."%') $filtertglmasuk $filterunittujuan";
            // }else{
            //     if ($cek==true) {
            //         $query = "
            //         SELECT
            //         tr.id_transaksi,k.id_kunjungan,
            //         DATE(tr.tgl_transaksi) as tgl_transaksi,
            //         k.id_unit,
            //         u.nama_unit,
            //         tr.no_rm,
            //         UPPER(P.nama) as nama,
            //         UPPER(P.alamat) as alamat,
            //         P.tgl_lahir,
            //         P.telepon,
            //         pt.no_sjp,
            //         penj.nama_penjamin,
            //         km.nama_kamar,
            //         EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as umur,
            //         x.id_kunjungan as soap, 
            //         jam_masuk,
            //         jenis_kelamin, 
            //         (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = k.id_pegawai) as nama_dokter
            //         FROM
            //         transaksi tr
            //         INNER JOIN pasien P ON tr.no_rm = P.no_rm
            //         INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
            //         INNER JOIN unit u ON u.id_unit = k.id_unit
            //         inner join kamar km on km.id_kamar=k.id_kamar
            //         INNER JOIN hak_akses_erm USING(id_kunjungan)
            //         INNER JOIN (select * from penjamin_transaksi where penjamin_utama=true) pt ON pt.id_transaksi = tr.id_transaksi
            //         INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
            //         left join (select * from soap_pasien  order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
            //         WHERE
            //         tr.no_rm like UPPER('".$norm."%') AND UPPER(P.nama) like UPPER('".$nmapasien."%') 
            //             AND k.aktif = true $filtertglmasuk $filterunittujuan 
            //             AND hak_akses_erm.id_user = '$input->user' 
            //             AND hak_akses_erm.tgl_kadaluarsa IS NULL ";
            //         }else{
            //             $query = "
            //             SELECT
            //             tr.id_transaksi,k.id_kunjungan,
            //             DATE(tr.tgl_transaksi) as tgl_transaksi,
            //             k.id_unit,
            //             u.nama_unit,
            //             tr.no_rm,
            //             UPPER(P.nama) as nama,
            //             UPPER(P.alamat) as alamat,
            //             P.tgl_lahir,
            //             P.telepon,
            //             pt.no_sjp,
            //             penj.nama_penjamin,
            //             km.nama_kamar,
            //             EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as umur,
            //             x.id_kunjungan as soap,
            //             jam_masuk,
            //             jenis_kelamin, 
            //             (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = k.id_pegawai) as nama_dokter
            //             FROM
            //             transaksi tr
            //             INNER JOIN pasien P ON tr.no_rm = P.no_rm
            //             INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
            //             INNER JOIN unit u ON u.id_unit = k.id_unit
            //             inner join kamar km on km.id_kamar=k.id_kamar
            //             INNER JOIN hak_akses_erm USING(id_kunjungan)
            //             INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama = true
            //             INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
            //             left join (select * from soap_pasien  order by id desc LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
            //             WHERE
            //             --LEFT (k.id_unit, 1) in ('2','8')  -->> Rawat Jalan
            //             tr.no_rm like UPPER('".$norm."%') AND UPPER(P.nama) like UPPER('".$nmapasien."%')
            //                 $filtertglmasuk $filterunittujuan 
            //                 AND k.aktif = true 
            //                 AND hak_akses_erm.id_user = '$input->user' 
            //                 AND hak_akses_erm.tgl_kadaluarsa IS NULL ";      
            //             }
            //         }
            // echo $query;
            // return;
            // if ($this->db->simpleQuery($query)) { //true
            //     $queryx = $this->db->query($query)->getResult();                
            //     if (!empty($queryx)) { //JIKA TIDAK KOSONG
            //         $output['status']   = "sukses";
            //         $output['code']     = "00";
            //         $output['pesan']    = "Data ditemukan";
            //         $output['data']     = $queryx;
            //         $output['umur']     = umur('1992-08-03');
            //         $output['data1']    = $this->db->query("SELECT k.kd_pasien,km.nama_kamar,k.no_sjp,p.nama,p.alamat,u.nama_unit,n.jam_inap,n.tgl_inap,
            //             EXTRACT(year FROM AGE(p.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(p.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(p.tgl_lahir))||' Hr' as umur,p.jenis_kelamin,n.kd_unit from kunjungan k inner join nginap n 
            //     on k.kd_pasien=n.kd_pasien and k.tgl_masuk=n.tgl_masuk and k.kd_unit=n.kd_unit and k.urut_masuk=n.urut_masuk
            //     inner join pasien p on p.kd_pasien=k.kd_pasien
            //     left join kamar km on n.no_kamar=km.no_kamar
            //     left join unit u on u.kd_unit=n.kd_unit
            //     where k.tgl_masuk = CURRENT_DATE and n.akhir=true ")->getResult();  
            //     } else { // JIKA KOSONG
            //     }
            // } else {
            //     $output['code']     = "01";
            //     $output['status']   = 'gagal cari, hubungi admin';
            //     $output['pesan']    = $this->db->error()['message'];
            // }
            $output['status']   = "sukses";
            $output['code']     = "XX";
            $output['data1']    = $this->db->query("SELECT k.tgl_masuk,k.kd_pasien,km.nama_kamar,k.no_sjp,p.nama,p.alamat,u.nama_unit,n.jam_inap,n.tgl_inap,n.no_kamar,
                EXTRACT(year FROM AGE(p.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(p.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(p.tgl_lahir))||' Hr' as umur,p.jenis_kelamin,n.kd_unit,t.no_transaksi as id_transaksi,
                n.urut_nginap as id_kunjungan,p.tgl_lahir,n.tgl_masuk as tgl_inap,c.customer as penjamin 
                from kunjungan k inner join nginap n 
                on k.kd_pasien=n.kd_pasien and k.tgl_masuk=n.tgl_masuk and k.kd_unit=n.kd_unit and k.urut_masuk=n.urut_masuk 
                inner join pasien p on p.kd_pasien=k.kd_pasien
                left join kamar km on n.no_kamar=km.no_kamar
                left join unit u on u.kd_unit=n.kd_unit
                inner join transaksi t on t.tgl_transaksi=k.tgl_masuk
                inner join customer c on c.kd_customer=k.kd_customer
                and t.kd_unit=K.kd_unit and t.kd_pasien=K.kd_pasien 
                and t.urut_masuk=K.urut_masuk
                where k.tgl_masuk = CURRENT_DATE and n.akhir=true ")->getResult();  
            $output['pesan']    = "";                 
        }
        echo json_encode($output);
    }
    function save_soapObservasi()
    { 
        $save  =false;
        $input = json_decode(file_get_contents('php://input'));
        $rm         =$input->rm;
        $unit       =$input->unit;
        $user    =$input->id_user;
        $ppa     =$input->jenis_user;
        /**/
        $o          =str_replace("'","",$input->o);
        $a          =str_replace("'","",$input->a);
        $darah      =$input->t_darah;
        $nadi       =$input->nadi;
        $suhu       =$input->suhu; 
        $saturasi   =$input->saturasi;
        $nafas      =$input->nafas;
        $gcs        =$input->gcs;
        $tgl_masuk  =$input->tglmasuk;
        $id_transaksi  =$input->id_transaksi;
        $urut=$this->db->query("SELECT count(*) as jumlah from observasi_sementara where id_transaksi='".$id_transaksi."' limit 1")->getRow()->jumlah;
        $urut_masuk=$urut + 1 ;
        $sql = "INSERT INTO observasi_sementara(
            kd_pasien,
            tgl_masuk,
            kd_unit,
            urut,
            tensi,
            suhu,
            nadi,
            nafas,
            gcs,
            objektif,
            terapi,
            id_user,
            tgl_observasi,
            aktif,
            kd_ppa,
            saturasi,
            id_transaksi) VALUES(
            '".$rm."',
            '".$tgl_masuk."',
            '".$unit."',
            ".$urut_masuk.",
            '".$darah."',
            '".$suhu."',
            '".$nadi."',
            '".$nafas."',
            '".$gcs."',
            '".$o."',
            '".$a."',
            '".$user."',
            '".date("Y-m-d")."',
            'true',
            ".$ppa.",
            '".$saturasi."',
            ".$id_transaksi."
        )";
            $save=$this->db->simpleQuery($sql);
            if ($save) {

                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = '';


            } else {
                $output['status']   = "gagal";
                $output['pesan']    = $sql;
            }

            $this->hasil($output);

        }
        public function saveinputpembedahan()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam =['penyakit',];

            if ($this->evalParam($input, $listParam)) {
                $output = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";

                $this->db->transStart();

                $tglpato = $input->tglpato;
                if ($tglpato == '') {
                    $tglpatox = 'null';
                } else {
                    $tglpatox = "'".$input->tglpato."'";
                }

                $cekPosisiPasien = "SELECT id_unit FROM kunjungan WHERE id_kunjungan='$input->id_kunjungan' and id_transaksi = '$input->id_transaksi' AND LEFT ( id_unit, 1 ) IN ( '8' )";
            // echo $cekPosisiPasien;
            // return;
                $cekx   = $this->db->query($cekPosisiPasien)->getResult();
            if (!empty($cekx)) { //true
                $row       = $this->db->query($cekPosisiPasien)->getRow();
                $id_unit   = $row->id_unit;
                if ($id_unit == ''){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Pasien Belum dipindah ke Kamar Operasi!!";
                    $this->hasil($output);
                    return;
                }
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Pasien Belum dipindah ke Kamar Operasi!!";
                $this->hasil($output);
                return;
            }

            $cek = $this->db->query("SELECT * FROM input_bedah WHERE id_kunjungan='$input->id_kunjungan' and id_transaksi = '$input->id_transaksi' ")->getResult();

            if (!empty($cek)) {
                $this->db->query("UPDATE input_bedah set aktif = false WHERE id_kunjungan = '$input->id_kunjungan' and id_transaksi = '$input->id_transaksi' ");
            }

            $query =" INSERT INTO input_bedah(id_kunjungan,
                berat,
                gula,
                rokok,
                kelengkapan,
                albumin,
                penyakit,
                asesmen_dpjp,
                asesmen_anestesi,
                mrsa,
                cukur,
                waktu_cukur,
                bowel,
                steroid,
                radioterapi,
                mandi,
                profilaksis,
                infeksi,
                ruang,
                trauma,
                ssc,
                prosedur,
                diagnosa,
                multiprosedur,
                asa,
                luka,
                sirkulasi,
                tekanan,
                suhu,
                staff,
                air_count,
                jamur,
                lembab,
                drain,
                posisi_drain,
                jns_drain,
                sterilisasi,
                desinfeksi,
                alat,
                antibiotik,
                jns_bedah,
                dok_op1,
                dok_op2,
                dok_ane1,
                dok_ane2,
                sus_ass1,
                sus_ass2,
                sus_instru,
                sus_omloop1,
                sus_omloop2,
                sus_omloop3,
                sus_omloop4,
                nata_anes1,
                nata_anes2,
                tgl_awal,
                tgl_akhir,
                klasifikasi,
                bedah,
                jns_anestesi,
                icd_pra,
                icd_pasca,
                diagnose_pra,
                diagnose_pasca,
                pendarahan,
                transfusi,
                patologi,
                komplikasi,
                implant,
                jns_implant,
                uraian,
                suhuruang,
                id_transaksi,
                aktif,
                isiankomplikasi,
                tglpatologi,
                isianpatologi,
                profilaksisobat,
                profilaksisdosis,
                profilaksiswaktu,
                no_reg,
                antibiotikobat,
                antibiotikdosis,
                antibiotikwaktu
                )values(
                '$input->id_kunjungan',
                '$input->berat',
                '$input->gula',
                '$input->rokok',
                '$input->kelengkapan',
                '$input->albumin',
                '$input->penyakit',
                '$input->asesmen_dpjp',
                '$input->asesmen_anestesi',
                '$input->mrsa',
                '$input->cukur',
                '$input->waktu_cukur',
                '$input->bowel',
                '$input->steroid',
                '$input->radioterapi',
                '$input->mandi',
                '$input->profilaksis',
                '$input->infeksi',
                '$input->ruang',
                '$input->trauma',
                '$input->ssc',
                '$input->prosedur',
                '$input->diagnosa',
                '$input->multiprosedur',
                '$input->asa',
                '$input->luka',
                '$input->sirkulasi',
                '$input->tekanan',
                '$input->suhu',
                '$input->staff',
                '$input->air_count',
                '$input->jamur',
                '$input->lembab',
                '$input->drain',
                '$input->posisi_drain',
                '$input->jns_drain',
                '$input->sterilisasi',
                '$input->desinfeksi',
                '$input->alat',
                '$input->antibiotik',
                '$input->jns_bedah',
                '$input->dok_op1',
                '$input->dok_op2',
                '$input->dok_ane1',
                '$input->dok_ane2',
                '$input->sus_ass1',
                '$input->sus_ass2',
                '$input->sus_instru',
                '$input->sus_omloop1',
                '$input->sus_omloop2',
                '$input->sus_omloop3',
                '$input->sus_omloop4',
                '$input->nata_anes1',
                '$input->nata_anes2',
                '$input->tgl_awal',
                '$input->tgl_akhir',
                '$input->klasifikasi',
                '$input->bedah',
                '$input->jns_anestesi',
                '$input->icd_pra',
                '$input->icd_pasca',
                '$input->diagnose_pra',
                '$input->diagnose_pasca',
                '$input->pendarahan',
                '$input->transfusi',
                '$input->patologi',
                '$input->komplikasi',
                '$input->implant',
                '$input->jns_implant',
                '$input->uraian',
                '$input->suhuruang',
                '$input->id_transaksi',
                true,
                '$input->isiankompli',
                $tglpatox,
                '$input->isianpato',
                '$input->prokfilaksisobat',
                '$input->prokfilaksidosis',
                '$input->prokfilaksijam',
                '$input->no_reg',
                '$input->antibiotikobat',
                '$input->antibiotikdosis',
                '$input->antibiotikjam'
            )";

                $this->db->query($query);

                $cekdok = $this->db->query("SELECT * FROM dokumen_pasien WHERE id_transaksi = '$input->id_transaksi' and id_dokumen = '13' and id_kunjungan = '$input->id_kunjungan' ")->getResult();

                if (empty($cekdok)) {
                    $insertdok = "INSERT INTO dokumen_pasien values ('$input->id_transaksi','13','$input->id_kunjungan')";
                    $this->db->query($insertdok);
                }

                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']       = "sukses";
                    $output['pesan']        = "Simpan Berhasil";
                    $output['data']         = '';
                }else{
                    $this->db->transRollback();
                    $output['status']       = "gagal";
                    $output['pesan']        = "Gagal Simpan";
                    $output['data']         = '';
                }

            } else {
                $output['status']   = "gagal";
                $output['pesan']    = $query;
            }

            $this->hasil($output);
        }


        public function saveCheckoperasi()
        {
            $input      = json_decode(file_get_contents('php://input'));
            $listParam  =['id_kunjungan',];
            $output             = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $save               = false;
            if ($this->evalParam($input, $listParam)) {
                $query="INSERT INTO cek_keselamatan_op(
                    id_kunjungan,
                    tanggal,
                    operator,
                    tindakan,
                    lokasi,
                    verify,
                    tanda,
                    lengkap,
                    asma,
                    alergi,
                    resiko_darah,
                    intravena,
                    alat_khusus,
                    dokumen,
                    tim_ope,
                    cek_tanggal_op,
                    nama,
                    identitas,
                    prosedur_ope,
                    lokasi2,
                    konsen,
                    antibiotik,
                    review_bedah,
                    review_anestesi,
                    review_rawat,
                    foto,
                    prosedur,
                    eror_alat,
                    jaringan,
                    implant,
                    review,
                    next_point,
                    tgl_op,
                    id_transaksi
                    )values(
                    '$input->id_kunjungan',
                    '$input->tanggal',
                    '$input->operator',
                    '$input->tindakan',
                    '$input->lokasi',
                    '$input->verify',
                    '$input->tanda',
                    '$input->lengkap',
                    '$input->asma',
                    '$input->alergi',
                    '$input->resiko_darah',
                    '$input->intravena',
                    '$input->alat_khusus',
                    '$input->dokumen',
                    '$input->tim_ope',
                    '$input->tanggal_op',
                    '$input->nama',
                    '$input->identitas',
                    '$input->prosedur_ope',
                    '$input->lokasi2',
                    '$input->konsen',
                    '$input->antibiotik',
                    '$input->review_bedah',
                    '$input->review_anestesi',
                    '$input->review_rawat',
                    '$input->foto',
                    '$input->prosedur',
                    '$input->eror_alat',
                    '$input->jaringan',
                    '$input->implant',
                    '$input->review',
                    '$input->next_point',
                    '$input->tgl_op',
                    '$input->id_transaksi')";

                    $save=$this->db->simpleQuery($query);
                }
                if ($save) {
                    $queryx="INSERT INTO dokumen_pasien values (
                        '$input->id_transaksi',
                        '14','$input->id_kunjungan')";
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

            public function savepersetujuantindakan()
            {
                $input              = json_decode(file_get_contents('php://input'));
                $listParam          = ['id_kunjungan',];
                $output             = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $save               = false;
                if ($this->evalParam($input, $listParam)) {
                    $cek=$this->db->query("SELECT * from persetujuan_tindakan where id_kunjungan='$input->id_kunjungan' ")->getResult();
                    if (empty($cek)) {

                        $query="INSERT INTO persetujuan_tindakan(
                            id_transaksi,
                            id_kunjungan,
                            id_pegawai,
                            tgl_tindakan,
                            perawat,
                            nama,
                            hub,
                            umur,
                            alamat,
                            telp,
                            ktp,
                            saksi,
                            format,
                            tindakan,
                            tindakan_ket,
                            alasan_tindakan,
                            ttddokter,
                            ttdperawat,
                            ttdpembuat,
                            ttdsaksi,
                            id_dokter,
                            id_user
                            ) values(
                            '$input->id_transaksi',
                            '$input->id_kunjungan',
                            '$input->dokter',
                            '$input->tgl',
                            '$input->perawat',
                            '$input->nama',
                            '$input->hubung',
                            '$input->umur',
                            '$input->alamat',
                            '$input->telp',
                            '$input->ktp',
                            '$input->saksi',
                            '$input->format',
                            '$input->tindakan',
                            '$input->tindakan_ket',
                            '$input->alasan_tindakan',
                            '$input->ttddokter',
                            '$input->ttdperawat',
                            '$input->ttdpembuat',
                            '$input->ttdsaksi',
                            '$input->dokter',
                            '$input->iduser'
                        )";

                            $queryx="INSERT INTO dokumen_pasien values (
                                '$input->id_transaksi',
                                '3','$input->id_kunjungan')";
                            $save_dok=$this->db->simpleQuery($queryx);
                        } else {

                            $query="UPDATE persetujuan_tindakan SET 
                            id_pegawai='$input->dokter',
                            tgl_tindakan='$input->tgl',
                            perawat='$input->perawat',
                            nama='$input->nama',
                            hub='$input->hubung',
                            umur='$input->umur',
                            alamat='$input->alamat',
                            telp='$input->telp',
                            ktp='$input->ktp',
                            saksi='$input->saksi',
                            format='$input->format'
                            WHERE id_kunjungan='$input->id_kunjungan' and id_transaksi='$input->id_transaksi'";
                        }


                        $save=$this->db->simpleQuery($query);
                    }

                    if ($save) {
                        $output['status']   = "sukses";
                        $output['pesan']    = 'Berhasil';
                        $output['data']     = '';
                    } else {

                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                        $output['data']     = $this->db->error();
                    }

                    $this->hasil($output);
                }
                public function simpanassesmengiziirna()
                {
                    $input      = json_decode(file_get_contents('php://input'));
                    $listParam  = ['id_kunjungan',];
                    $output     = array();
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $save               = false;
                    if ($this->evalParam($input, $listParam)) {
                        $query="INSERT INTO assesmen_gizi(
                            id_kunjungan,
                            skrining_perawat,
                            skrining_ahli_gizi,
                            kondisi_khusus,
                            alergi,
                            diet_awal,
                            tindak_lanjut,
                            id_pegawai,
                            tgl_assesmen,
                            ttd
                            )values(
                            '$input->id_kunjungan',
                            '$input->skrining_perawat',
                            '$input->skrining_ahli_gizi',
                            '$input->kondisi_khusus',
                            '$input->alergi',
                            '$input->diet_awal',
                            '$input->tindak_lanjut',
                            '$input->id_pegawai',
                            '".date('Y-m-d')."',
                            '$input->ttd')";

                            $save=$this->db->simpleQuery($query);
                        }

                        if ($save) {
                            $queryx="INSERT INTO dokumen_pasien values (
                                '$input->transaksi',
                                '21')";
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
                            $output['data']     = $this->db->error();
                        }

                        $this->hasil($output);
                    }

                    public function tesinfusr()
                    {
                     $input      = json_decode(file_get_contents('php://input'));
                     $query="INSERT INTO pemberian_infus(
                       id_kat_infus,
                       tgl_pemberian_infus,
                       kd_obat,
                       infus_pump,
                       pumpno,
                       kolf,
                       jam_pasang,
                       jam_ganti,
                       perawat,
                       ttd_perawat,
                       keterangan,
                       instruksi,
                       ket_instruksi,
                       tgl_instruksi,
                       perawat_pem_ins,
                       ttd_perawat_pem_ins,
                       id_kunjungan,
                       id_transaksi,
                       ukuran_infus,
                       frekuensi_infus,
                       modejam
                       )values(
                       '$input->id_kat',
                       '$input->tgl_pem_in',
                       '$input->nama_infus',
                       '$input->pump',
                       '$input->pumpno',
                       '$input->kolf',
                       '$input->jam_pasang',
                       '$input->jam_ganti',
                       '$input->perawat1',
                       '$input->ttdPerawat1',
                       '$input->keterangan',
                       '$input->instruksi',
                       '$input->ins_lain',
                       '$input->tgl_ins',
                       '$input->perawat2',
                       '$input->ttdperawat2',
                       '$input->id_kunjungan',
                       '$input->id_transaksi',
                       '$input->ukuran_infus',
                       '$input->frekuensi_infus',
                       '$input->modejam'
                   )";

                       $output['status']   = "gagal";
                       $output['pesan']    = $query;
                       $output['data']     = $query;

                       $this->hasil($output);
                   }
                   public function tesinfus()
                   {
                    $input      = json_decode(file_get_contents('php://input'));
                    $listParam  = ['id_kunjungan',];
                    $output     = array();
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $save               = false;


                    if ($this->evalParam($input, $listParam)) {
                       if (!empty($input->tgl_ins)) {
                        $queryinfus="INSERT INTO pemberian_infus(
                           id_kat_infus,
                           tgl_pemberian_infus,
                           kd_obat,
                           infus_pump,
                           pumpno,
                           kolf,
                           jam_pasang,
                           jam_ganti,
                           perawat,
                           ttd_perawat,
                           keterangan,
                           instruksi,
                           ket_instruksi,
                           tgl_instruksi,
                           perawat_pem_ins,
                           ttd_perawat_pem_ins,
                           id_kunjungan,
                           id_transaksi,
                           ukuran_infus,
                           frekuensi_infus,
                           modejam,
                           aktif
                           )values(
                           '$input->id_kat',
                           '$input->tgl_pem_in',
                           '$input->nama_infus',
                           '$input->pump',
                           '$input->pumpno',
                           '$input->kolf',
                           '$input->jam_pasang',
                           '$input->jam_ganti',
                           '$input->perawat1',
                           '$input->ttdPerawat1',
                           '$input->keterangan',
                           '$input->instruksi',
                           '$input->ket_instruksi',
                           '$input->tgl_ins',
                           '$input->perawat2',
                           '$input->ttdperawat2',
                           '$input->id_kunjungan',
                           '$input->id_transaksi',
                           '$input->ukuran_infus',
                           '$input->frekuensi_infus',
                           '$input->modejam',
                           true
                       )";
                       } else {
                         $queryinfus="INSERT INTO pemberian_infus(
                           id_kat_infus,
                           tgl_pemberian_infus,
                           kd_obat,
                           infus_pump,
                           pumpno,
                           kolf,
                           jam_pasang,
                           jam_ganti,
                           perawat,
                           ttd_perawat,
                           keterangan,
                           id_kunjungan,
                           id_transaksi,
                           ukuran_infus,
                           frekuensi_infus,
                           modejam,
                           aktif
                           )values(
                           '$input->id_kat',
                           '$input->tgl_pem_in',
                           '$input->nama_infus',
                           '$input->pump',
                           '$input->pumpno',
                           '$input->kolf',
                           '$input->jam_pasang',
                           '$input->jam_ganti',
                           '$input->perawat1',
                           '$input->ttdPerawat1',
                           '$input->keterangan',
                           '$input->id_kunjungan',
                           '$input->id_transaksi',
                           '$input->ukuran_infus',
                           '$input->frekuensi_infus',
                           '$input->modejam',
                           true
                       )";
                       }
                       $query=$queryinfus;

                       $save=$this->db->simpleQuery($queryinfus);
                   }

                   if ($save) {
                    $cekurut=$this->db->query("select * from pemberian_infus where id_kunjungan= '$input->id_kunjungan' and id_transaksi='$input->id_transaksi' ")->getNumRows();
                    if ($cekurut>0) {
                        $urut=$cekurut + 1;
                    } else {
                        $urut=1;
                    }
                    $queryx="INSERT INTO dokumen_pasien values (
                        '$input->id_transaksi','32','$input->id_kunjungan',".$urut.")";
                    $save_dok=$this->db->simpleQuery($queryx);
                    if ($save_dok) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Berhasil";
                        $output['data']     = '';
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = 'gagal';
                    }
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = $query;
                    $output['data']     = $this->db->error();
                }

                $this->hasil($output);
            }

            public function savepemberianobatnonhigh()
            {
                $input     = json_decode(file_get_contents('php://input'));
                $listParam = ['id',];
                $output = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $save               = false;
                if ($this->evalParam($input, $listParam)) {
                    $query="
                    INSERT into pemberian_obat(
                        id_kunjungan,
                        tgl_pemberian,
                        jenis_obat,
                        kd_obat,
                        dosis,
                        ket_waktu,
                        rute,
                        kd_dokter,
                        kd_perawat,
                        id_instruksi,
                        instruksi,
                        tgl_instruksi,
                        dokter_instruksi,
                        perawat_instruksi,
                        high_alert,
                        ttd
                        )values(
                        '$input->id',
                        '".date('Y-m-d')."',
                        '$input->jns_obat',
                        '$input->nma_obat',
                        '$input->dosis',
                        '$input->ket_waktu',
                        '$input->rute',
                        '$input->dokter',
                        '$input->suster',
                        '$input->instruksi',
                        '$input->ket_ins',
                        '".date('Y-m-d')."',
                        '$input->dok_ins',
                        '$input->sus_ins',
                        false,
                        '$input->ttd' )";
                        $save=$this->db->simpleQuery($query);
                    }
                    if ($save) {
                        $output['status']   = "sukses";
                        $output['pesan']    = 'Berhasil';
                        $output['data']     = '';
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                        $output['data']     = $this->db->error();
                    }

                    $this->hasil($output);
                }

                public function simpankonsultasidpjptanyairna()
                {
                    $input     = json_decode(file_get_contents('php://input'));
                    $listParam = ['id_kunjungan','id_transaksi'];
                    $output             = array();
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $save               = false;
                    if ($this->evalParam($input, $listParam)) {
                        $this->db->transBegin();
                        $cekurut=$this->db->query("select * from konsultasi_dpjp where id_kunjungan= '$input->id_kunjungan' and id_transaksi='$input->id_transaksi' and dpjp='$input->id_user' and aktif=true ")->getNumRows();
                        if ($cekurut>0) {
                            $urut=$cekurut + 1;
                        } else {
                            $urut=1;
                        }

                        $cekkonsul=$this->db->query("select * from konsultasi_dpjp where id_kunjungan= '$input->id_kunjungan' and id_transaksi='$input->id_transaksi' and dpjp='$input->id_user' and dpjp_konsul='$input->ttd_dpjp_jawab' and aktif=true ")->getResult();

                        if (!empty($cekkonsul)) {
                            $this->db->query("update konsultasi_dpjp set aktif=false where id_kunjungan= '$input->id_kunjungan' and id_transaksi='$input->id_transaksi' and dpjp='$input->id_user' and dpjp_konsul='$input->ttd_dpjp_jawab' and aktif=true");
                            $urutsebelum=$this->db->query("select * from konsultasi_dpjp where id_kunjungan= '$input->id_kunjungan' and id_transaksi='$input->id_transaksi' and dpjp='$input->id_user' and dpjp_konsul='$input->ttd_dpjp_jawab' and aktif=true ")->getRow()->urut;
                            $query="
                            INSERT into konsultasi_dpjp(
                               id_kunjungan,
                               id_transaksi,
                               tgl_konsul,
                               urut,
                               no_rm,
                               dpjp,
                               dpjp_konsul,
                               keterangan_tanya,
                               diagnosis_tanya,
                               ttd_dpjp,
                               id_user,
                               id_unit,
                               aktif,
                               terjawab,
                               pilihan_konsul
                               )values(
                               '$input->id_kunjungan',
                               '$input->id_transaksi',
                               '".date('Y-m-d')."',
                               '$urutsebelum',
                               '$input->no_rm',
                               '$input->id_user',
                               '$input->ttd_dpjp_jawab',
                               '$input->keterangantanya',
                               '$input->diagnosistanya',
                               '$input->HasilTtdTanyaKonsultasiIrna',
                               '$input->id_user',
                               '$input->id_unit',
                               true,
                               false,
                               '$input->selectketerangan' )";
                               $save=$this->db->simpleQuery($query);
                               if ($save) {

                                $this->db->transCommit();
                                $output['status']   = "sukses";
                                $output['pesan']    = 'Berhasil';
                                $output['data']     = '';    
                            } else {

                                $this->db->transRollback();
                                $output['status']   = "gagal";
                                $output['pesan']    = "gagal";
                            }

                        }else{

                            $query="
                            INSERT into konsultasi_dpjp(
                               id_kunjungan,
                               id_transaksi,
                               tgl_konsul,
                               urut,
                               no_rm,
                               dpjp,
                               dpjp_konsul,
                               keterangan_tanya,
                               diagnosis_tanya,
                               ttd_dpjp,
                               id_user,
                               id_unit,
                               aktif,
                               terjawab,
                               pilihan_konsul
                               )values(
                               '$input->id_kunjungan',
                               '$input->id_transaksi',
                               '".date('Y-m-d')."',
                               '$urut',
                               '$input->no_rm',
                               '$input->id_user',
                               '$input->ttd_dpjp_jawab',
                               '$input->keterangantanya',
                               '$input->diagnosistanya',
                               '$input->HasilTtdTanyaKonsultasiIrna',
                               '$input->id_user',
                               '$input->id_unit',
                               true,
                               false,
                               '$input->selectketerangan'  )";

                               $save=$this->db->simpleQuery($query);
                               if ($save) {

                                $user = $this->db->query("select * from users where id_pegawai ='$input->ttd_dpjp_jawab'")->getRow();

                                $savehakakses="INSERT INTO hak_akses_erm (id_kunjungan,id_user,can_edit) values (
                                    '$input->id_kunjungan',
                                    ".$user->id_user.",true)";
                                $save_akses=$this->db->simpleQuery($savehakakses);

                                if ($save_akses) {
                                    $queryx="INSERT INTO dokumen_pasien values ('$input->id_transaksi','29','$input->id_kunjungan','$urut')";
                                    $save_dok=$this->db->simpleQuery($queryx);

                                    if ($save_dok) {
                                        $this->db->transCommit();
                                        $output['status']   = "sukses";
                                        $output['pesan']    = 'Berhasil';
                                        $output['data']     = '';
                                    } else {
                                        $this->db->transRollback();
                                        $output['status']   = "gagal";
                                        $output['pesan']    = 'gagal';
                                    }

                                } else {

                                    $this->db->transRollback();
                                    $output['status']   = "gagal";
                                    $output['pesan']    = "gagal";
                                }

                            } else {

                                $this->db->transRollback();
                                $output['status']   = "gagal";
                                $output['pesan']    = "gagal";
                            }

                        }
                    }
                    $this->hasil($output);
                }

                public function simpankonsultasidpjpjawabirna()
                {
                    $input      = json_decode(file_get_contents('php://input'));
                    $listParam  = ['id_kunjungan'];
                    $output     = array();
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $save               = false;
                    if ($this->evalParam($input, $listParam)) {
                        $query="
                        UPDATE konsultasi_dpjp set
                        dpjp_konsul      ='$input->id_user',
                        keterangan_jawab ='$input->keteranganjawab',
                        diagnosis_tanya  ='$input->diagnosisjawab',
                        saran            = '$input->saranjawab',
                        ttd_dpjp_jawab   ='$input->HasilTtdJawabKonsultasiIrna',
                        terjawab         =true
                        where id_transaksi ='$input->id_transaksi' and id_kunjungan= '$input->id_kunjungan' and dpjp_konsul='$input->id_user' and aktif=true and terjawab=false ";
                        $save=$this->db->simpleQuery($query);
                    }
                    if ($save) {
                        $output['status']   = "sukses";
                        $output['pesan']    = 'Berhasil';
                        $output['data']     = '';
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                        $output['data']     = $this->db->error();
                    }

                    $this->hasil($output);
                }

                public function simpanadimeirna()
                {
                    $input      = json_decode(file_get_contents('php://input'));
                    $listParam  = ['id_kunjungan',];
                    $output     = array();
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $save               = false;
                    if ($this->evalParam($input, $listParam)) {
                        $query="
                        INSERT into adime(
                            id_kunjungan,
                            id_transaksi,
                            tgl_input,
                            assesmen,
                            diagnosa,
                            monitoring,
                            evaluasi,
                            intervensi,
                            id_pegawai,
                            ttd,
                            aktif
                            )values(
                            '$input->id_kunjungan',
                            '$input->id_transaksi',
                            '$input->tgl_masuk',
                            '$input->assesmen',   
                            '$input->diagnosa',    
                            '$input->monitoring',  
                            '$input->evaluasi',    
                            '$input->intervensi',   
                            '$input->id_pegawai', 
                            '$input->ttd',
                            true
                        )";
                            $save=$this->db->simpleQuery($query);
                        }

                        if ($save) {
                            $output['status']   = "sukses";
                            $output['pesan']    = 'Berhasil';
                            $output['data']     = '';
                        } else {
                            $output['status']   = "gagal";
                            $output['pesan']    = $query;
                            $output['data']     = $this->db->error();
                        }

                        $this->hasil($output);
                    }
                    public function savepemberianobathigh()
                    {
                        $input      = json_decode(file_get_contents('php://input'));
                        $listParam  = ['id',];
                        $output     = array();
                        $output['status']   = "gagal";
                        $output['pesan']    = "";
                        $save               = false;
                        if ($this->evalParam($input, $listParam)) {
                            $query="
                            INSERT into pemberian_obat(
                                id_kunjungan,
                                tgl_pemberian,
                                jenis_obat,
                                kd_obat,
                                dosis,
                                ket_waktu,
                                rute,
                                kd_dokter,
                                kd_perawat,
                                id_instruksi,
                                instruksi,
                                tgl_instruksi,
                                dokter_instruksi,
                                perawat_instruksi,
                                high_alert,
                                ttd
                                )values(
                                '$input->id',
                                '$input->tgl',
                                '$input->jns_obat',
                                '$input->nma_obat',
                                '$input->dosis',
                                '$input->ket_waktu',
                                '$input->rute',
                                '$input->dokter',
                                '$input->suster',
                                '$input->instruksi',
                                '$input->ket_ins',
                                '$input->tgl_ins',
                                '$input->dok_ins',
                                '$input->sus_ins',
                                true,
                                '$input->ttd'
                            )";
                                $save=$this->db->simpleQuery($query);
                            }

                            if ($save) {
                                $output['status']   = "sukses";
                                $output['pesan']    = 'Berhasil';
                                $output['data']     = '';
                            } else {
                                $output['status']   = "gagal";
                                $output['pesan']    = $query;
                                $output['data']     = $this->db->error();
                            }

                            $this->hasil($output);
                        }

                        public function cetakgeneralconcent()
                        {
                            $input = json_decode(file_get_contents('php://input'));
                            $norm       = $_POST['norm'];

                            $mpdf   = new \Mpdf\Mpdf([
                                'mode' => 'utf-8',
                                'A4',
                                'format' => $formatkertas, 
                                'margin_top' => 2,
                                'margin_bottom' => 0,
                                'margin_left' => 2,
                                'margin_right' => 2,
                                'mirrorMargins' => true
                            ]);

                            $title  = "Label Pasien";

                            $mpdf->SetDisplayMode('fullpage');
                            $mpdf->SetTitle($title);
                            $mpdf->WriteHTML("<style>
                                body{
                                    font-family:Arial;
                                }
                                div.a {
                                    text-align: center;
                                    width:100%;
                                }
                                .lh{
                                    line-height:0.1;
                                }
                                .lh1{
                                    line-height:1;
                                }
                                .barcode {
                                    padding: 0mm;
                                    margin: 0;
                                    vertical-align: top;
                                    color: #000044;
                                }
                                </style>");
                            $mpdf->WriteHTML('<div class="modal-body">
                                <div class="row ">
                                <div class="col-md-12">
                                <div class="card rapet">
                                <div class="col-md-12">
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;A. PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-0"><label class="col-form-label">1.&nbsp;</label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya menyetujui untuk perawatan di Rumah Sakit  sebagai pasien rawat inap.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-0"><label class="col-form-label">2.&nbsp;</label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya mengetahui bahwa pasien/saya memiliki kondisi yang membutuhkan perawatan medis, 
                                pasien/saya mengizinkan dokter dan profesional tenaga kesehatan lainnya untuk melakukan prosedur diagnostik dan untuk 
                                memberikan pengobatan medis seperti yang dilakukan dalam profesional mereka. Prosedur diagnostik dan perawatan medis 
                                termasuk terapi tidak terbatas pada EKG, X-RAY, tes darah, terapi fisik, pemberian obat suntik dan cairan infus.
                                Persetujuan yang saya berikan tidak termasuk persetujuan untuk prosedur/ tindakan invasive (misalnya, operasi) 
                                atau tindakan yang mempunyai resiko tinggi.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-0"><label class="col-form-label">3.&nbsp;</label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya sadar bahwa praktek kedokteran dan bedah bukan ilmu pasti dan saya mengakui tidak 
                                ada jaminan atas hasil apapun terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada pasien/saya.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-0"><label class="col-form-label">4.&nbsp;</label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya mengerti dan memahami bahwa :
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">   &nbsp;&nbsp;</label></div>
                                <div class="col-md-0"><label class="col-form-label">a.&nbsp;</label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya memiliki hak untuk mengajukan pertanyaan tentang pengobatan yang diusulkan 
                                ( termasuk identitas setiap orang yang memberikan atau mengamati pengobatan ) setiap saat.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">   &nbsp;&nbsp;</label></div>
                                <div class="col-md-0"><label class="col-form-label">b.&nbsp;</label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya mengerti dan memahami bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk 
                                setiap prosedur / tindakan invasif (misalnya operasi) atau tindakan yang mempunyai resiko tinggi
                                Jika saya memutuskan untuk menghentikan perawatan medis untuk diri saya sendiri. Saya memahami dan 
                                menyadari bahwa Rumah Sakit  atau dokter <br>tidak bertanggungjawab atas hasil yang merugikan saya.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;B. HASIL YANG TIDAK DIHARAPKAN
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya sadar bahwa praktek kedokteran dan bedah bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil 
                                apapun terhadap perawatan, prosedur atau pemeriksaan apapun yang dilakukan kepada saya.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;C. PERSETUJUAN PELEPASAN INFORMASI
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya memahami informasi yang ada didalam diri saya, termasuk diagnosis, hasil laboratorium dan hasil tes diagnostik yang 
                                akan digunakan untuk perawatan medis, Rumah Sakit  akan menjamin kerahasiaannya. 
                                <br>Saya memberi wewenang kepada RS untuk memberikan informasi tentang tentang diagnosis, hasil pelayanan dan pengobatan bila 
                                diperlukan untuk memproses klaim asuransi / perusahaan dan atau lembaga pemerintah.Sesuai kewajiban simpan rahasia kedokteran 
                                dan mengacu pada peraturan menteri kesehatan refublik indonesia no. 36/MENKES/III/2008, Saya memberi wewenang kepada Rumah Sakit  
                                untuk memberikan informasi tentang diagnosis, hasil pelayanan dan pengobatan saya kepada anggota keluarga saya dan kepada:
                                </label>

                                <br><label class="col-form-label" id="dacconsent_lnama1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;bunga</label>
                                <br><label class="col-form-label" id="dacconsent_lnohp1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;081290001484</label>
                                <br><label class="col-form-label" id="dacconsent_lhub1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hubungan dengan Pasien &nbsp; : &nbsp;Pengantar</label>
                                <br>
                                <br><label class="col-form-label" id="dacconsent_lnama2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; : &nbsp;-</label>
                                <br><label class="col-form-label" id="dacconsent_lnohp2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;-</label>
                                <br><label class="col-form-label" id="dacconsent_lhub2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hubungan dengan Pasien &nbsp; : &nbsp;--Pilih--</label>
                                <br><label class="col-form-label">Saya menyatakan bahwa pernyataan diatas dibuat dengan penuh kesadaran dan tanpa paksaan. </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;D. PRIVASI
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya megijinkan Rumah Sakit memberikan akses bagi : keluarga dan handai taulan serta 
                                orang-orang yang akan menjenguk atau menemui saya.
                                <br>Sebutkan nama/profesi bila ada permintaan :
                                </label>
                                <br><label class="col-form-label" id="dacconsent_lkerja1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. &nbsp;-</label>
                                <br><label class="col-form-label" id="dacconsent_lkerja2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. &nbsp;-</label>

                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;E. INFORMASI BIAYA
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Pihak Pembayar :
                                <br>Pribadi  &nbsp;&nbsp;&nbsp; &nbsp;: Saya berkewajiban untuk membayar biaya perawatan yang telah diberikan oleh Rumah  Sakit  
                                <br>Jaminan  : Saya akan tunduk pada ketentuan yang ditetapkan oleh badan penjamin/asuransi yang akan membiayai perawatan saya.
                                <br>Saya memahami tentang informasi biaya pengobatan atau biaya tindakan yang dijelaskan oleh petugas Rumah Sakit.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;F. HAK DAN KEWAJIBAN PASIEN
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya memiliki hak untuk mengambil bagian dalam keputusan mengenai penyakit saya dan dalam hal perawatan medis dan 
                                rencana pengobatan. Saya telah mendapat informasi tentang â€œHak dan kewajiban pasienâ€ di Rumah Sakit  
                                melalui Leaflet dan banner yang disediakan oleh petugas. 
                                <br>Saya memiliki hak untuk mendapatkan pelayanan kerohanian sesuai agama dan kepercayaan yang saya anut.
                                <br>Saya/pasien memahami bahwa Rumah Sakit  tidak bertanggungjawab atas kehilangan barang-barang pribadi dan 
                                barang berharga yang dibawa ke Rumah Sakit.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;G. PESERTA DIDIK / PELATIH
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Ikut berpartisipasi dalam asuhan pasien sebagai bagian dari pendidikan / pelatihan mereka 
                                dengan pengawasan atau supervisi staf yang kompeten.
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                <label class="col-form-label font-weight-bold">
                                &nbsp;&nbsp;H. INFORMASI RAWAT INAP
                                </label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-0"><label class="col-form-label">  </label></div>
                                <div class="col-md-11">
                                <label class="col-form-label">
                                Saya tidak diperkenankan untuk membawa barang-barang berharga keruang rawat inap, jika ada anggota keluarga atau 
                                teman harus diminta untuk membawa pulang uang atau perhiasan. Bila tidak ada anggota keluarga, RS sakit menyediakan 
                                tempat penitipan barang milik pasien ditempat resmi yang telah disediakan RS. Saya telah menerima informasi tentang 
                                peraturan yang diberlakukan oleh Rumah Sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan 
                                mematuhi jam berkunjung pasien sesuai dengan aturan di rumah sakit.
                                <br>Anggota keluarga pasien/saya yang menunggu pasien (sebanyak 1 orang) bersedia untuk selalu memakai tanda pengenal 
                                khusus yang diberikan oleh Rumah Sakit , dan demi keamanan  seluruh pasien setiap keluarga dan siapapun yang 
                                akan megunjungi pasien/saya diluar jam berkunjung bersedia untuk diminta/diperiksa identitasnya dan memakai identitias 
                                yang diberikan oleh Rumah Sakit.
                                </label>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>');
$mpdf->Output("Label Pasien.pdf", 'I');
exit;
}

public function savegeneralconcent()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =[
        'id_kunjungan',];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $save               = false;
        if ($this->evalParam($input, $listParam)) {
            $cek=$this->db->query("SELECT * from general_consent where id_kunjungan= '$input->id_kunjungan' ");
            if (!empty($cek->getResult())) {
                $urut=$cek->getNumRows()+1;
                $updatestatus=$this->db->query("update general_consent set aktif=false where id_kunjungan='$input->id_kunjungan' ");
                $save=$this->db->simpleQuery("
                    INSERT into general_consent(
                        id_kunjungan,
                        no_rm,
                        tgl_input,
                        nama_ttd,
                        alamat_ttd,
                        tlp_ttd,
                        hubungan_pasien,
                        lepas_info_nama1,
                        lepas_info_tlfn1,
                        lepas_info_hub1,
                        lepas_info_nama2,
                        lepas_info_tlfn2,
                        lepas_info_hub2,
                        pilihan_privasi,
                        privasi1,
                        privasi2,
                        aktif,
                        ttd_penjelas,
                        ttd_pasien,
                        urut,
                        id_user)values(
                        '$input->id_kunjungan',
                        '$input->rm',
                        '$input->dacconsent_tgl',
                        '$input->dacconsent_nama3',
                        '$input->dacconsent_alamat',
                        '$input->dacconsent_nohp3',
                        '$input->dacconsent_hubungan3',
                        '$input->dacconsent_nama1',
                        '$input->dacconsent_nohp1',
                        '$input->dacconsent_hubungan1',
                        '$input->dacconsent_nama2',
                        '$input->dacconsent_nohp2',
                        '$input->dacconsent_hubungan2',
                        '$input->dacconsent_privasi',
                        '$input->dacconsent_privasi1',
                        '$input->dacconsent_privasi2',
                        true,
                        '$input->ttdpenjelas',
                        '$input->ttdpasien',
                        $urut,
                        '$input->id_user'
                    )");

                if ($save) {
                    $output['status']   = "sukses";
                    $output['pesan']    = 'Berhasil';
                    $output['data']     = '';
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Ada Inputan Kosong";
                }
            } else {
                $save=$this->db->simpleQuery("
                    INSERT into general_consent(
                        id_kunjungan,
                        no_rm,
                        tgl_input,
                        nama_ttd,
                        alamat_ttd,
                        tlp_ttd,
                        hubungan_pasien,
                        lepas_info_nama1,
                        lepas_info_tlfn1,
                        lepas_info_hub1,
                        lepas_info_nama2,
                        lepas_info_tlfn2,
                        lepas_info_hub2,
                        pilihan_privasi,
                        privasi1,
                        privasi2,
                        aktif,
                        ttd_penjelas,
                        ttd_pasien,
                        urut)values(
                        '$input->id_kunjungan',
                        '$input->rm',
                        '$input->dacconsent_tgl',
                        '$input->dacconsent_nama3',
                        '$input->dacconsent_alamat',
                        '$input->dacconsent_nohp3',
                        '$input->dacconsent_hubungan3',
                        '$input->dacconsent_nama1',
                        '$input->dacconsent_nohp1',
                        '$input->dacconsent_hubungan1',
                        '$input->dacconsent_nama2',
                        '$input->dacconsent_nohp2',
                        '$input->dacconsent_hubungan2',
                        '$input->dacconsent_privasi',
                        '$input->dacconsent_privasi1',
                        '$input->dacconsent_privasi2',
                        true,
                        '$input->ttdpenjelas',
                        '$input->ttdpasien',
                        1
                    )");

                if ($save) {
                   $queryx="INSERT INTO dokumen_pasien values (
                    '$input->id_transaksi',
                    '24','$input->id_kunjungan')";
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
                $output['pesan']    =$this->db->error();
                $output['data']     = $this->db->error();
            }
        }
    }

    $this->hasil($output);
}

public function saveAssesmenKeperawatanIrna()
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
            $idtandavital=$this->db->query("UPDATE sys_nomor_dok SET nomor=(SELECT nomor + 1 from sys_nomor_dok where key_data=3) WHERE key_data=3 RETURNING nomor ")->getRow()->nomor;
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
                    penurunan_bb,
                    asupan_makan,
                    skor_gizi,
                    saran_tindakan_gizi,
                    skorface,
                    ttd,
                    id_tanda_vital)
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
                  true,
                  '$input->bbturunkg',
                  '$input->penurunanmakan',
                  '$input->totalskor',
                  '$input->saran',
                  '$input->skorface',
                  '$input->ttd',
                  ".$idtandavital.")");
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
                no_rm,
                id_tanda_vital)
               values
               (
                   '$input->id_kunjungan',
                   '$input->KeadaanUmum',
                   '$input->respirasi',
                   '$input->nadi',
                   '$input->Spo2',
                   '$input->pupil_kiri',
                   '$input->tekanan_darah1',
                   '$input->suhu',
                   '$input->reflekCahayaKiri',
                   '$input->bb',
                   '$input->tinggi',
                   '$input->imt',
                   '$input->skor',
                   '$input->tipekesadaranasskepermirna',
                   '$input->pupil_kanan',
                   '$input->reflekCahayaKanan',
                   '$input->tekanan_darah2',
                   '$input->palpasi',
                   true,
                   '$input->id_user',
                   '$input->norm',
                   ".$idtandavital.")");
       }else{
        $output['status']   = "gagal";
        $output['pesan']    =$this->db->error();
        $output['data']     = $this->db->error();
    }

    if ($save_tandavital) {
        $queryx="INSERT INTO dokumen_pasien values (
            '$input->transaksi',
            '16')";
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
        $output['pesan']    =$this->db->error();
        $output['data']     = $this->db->error();
    }
    $this->hasil($output);
}

public function saveedukasiutama()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $save               = false;

    if ($this->evalParam($input, $listParam)) {
        $replace_hamb1 = str_replace('[',"",$input->hambatan);
        $replace_hamb2 = str_replace(']',"",$replace_hamb1);
        $replace_hamb3 = str_replace('"',"",$replace_hamb2);

        $save=$this->db->query("INSERT INTO edukasi 
            (
                id_transaksi,
                id_kunjungan,
                no_rm,
                bahasa,
                penerjemah,
                baca,
                keyakinan,
                hambatan,
                diagnosa_medis,
                planning,
                penggunaan_alat,
                tgl_edukasi,
                id_pegawai,
                nilai,
                diterima,
                hambatan_lain,
                kondisi_medis,
                rencana_pengobatan,
                hasil_pengobatan,
                instruksi_perawatan,
                perubahan_kondisi,
                hak_dan_kewajiban,
                teknik,
                identifikasi,
                risiko_jatuh,
                manajemen_nyeri,
                pasien_terminal,
                penggunaan_alat_medis,
                diet,
                pengelolaan_makanan,
                penggunaan_obat,
                potensi_efek,
                potensi_interaksi,
                teknik_rehabilitasi,
                edukasi_lain_satu,
                edukasi_lain_dua,
                edukasi_lain_tiga,
                edukasi_lainket_satu,
                edukasi_lainket_dua,
                edukasi_lainket_tiga,
                bahasa_lain
                )
            VALUES
            (
                '$input->id_transaksi',
                '$input->id_kunjungan',
                '$input->rm',
                '$input->bahasa',
                '$input->penerjemah',
                '$input->kemampuan',
                '$input->keyakinan',
                '$replace_hamb3',
                '$input->diagnosa',
                '$input->planning',
                '$input->alat',
                '$input->tanggal',
                '$input->id_pegawai',
                '$input->nilai',
                '$input->diterima',
                '$input->hambatan_lain',
                '$input->kondisi_medis',
                '$input->rencana_pengobatan',
                '$input->hasil_pengobatan',
                '$input->instruksi_perawatan',
                '$input->perubahan_kondisi',
                '$input->hak_dan_kewajiban',
                '$input->teknik',
                '$input->identifikasi',
                '$input->risiko_jatuh',
                '$input->manajemen_nyeri',
                '$input->pasien_terminal',
                '$input->penggunaan_alat_medis',
                '$input->diet',
                '$input->pengelolaan_makanan',
                '$input->penggunaan_obat',
                '$input->potensi_efek',
                '$input->potensi_interaksi',
                '$input->teknik_rehabilitasi',
                '$input->edukasi_lain_satu',
                '$input->edukasi_lain_dua',
                '$input->edukasi_lain_tiga',
                '$input->edukasi_lainket_satu',
                '$input->edukasi_lainket_dua',
                '$input->edukasi_lainket_tiga',
                '$input->bahasa_lain'
            )");
    }

    if ($save) {
        $output['status']   = "sukses";
        $output['pesan']    = 'Edukasi Berhasil di Simpan';
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "Gagal Simpan Edukasi!!";
    }

    $this->hasil($output);
}

public function load_edukasiirnautama()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    $idtrans        = $input->id_transaksi;
    $norm           = $input->norm;
    $id_kunjungan   = $input->id_kunjungan;

    $query = $this->db->query("SELECT * FROM edukasi WHERE id_transaksi = '$idtrans' AND id_kunjungan = '$id_kunjungan' AND no_rm = '$norm' ORDER BY id DESC LIMIT 1"); 

    $detailedukasi = $this->db->query("SELECT * FROM detail_edukasi d INNER JOIN zusers z on z.kd_user=d.id_pegawai 
        WHERE id_transaksi = '$idtrans' AND norm = '$norm' ORDER BY id_edukasi ASC");

    if ($query->getNumRows() > 0){
        $output['code']     = '200';
        $output['status']   = "sukses";
        $output['pesan']    = 'Data Edukasi ditemukan';
        $output['data']     = $query->getResult();
        $output['detail']   = $detailedukasi->getResult();
    } else {
        $output['code']     = '500';
        $output['status']   = "sukses";
        $output['pesan']    = "Data Edukasi Kosong";
        $output['data']     = '';
        $output['detail']   = '';
    }

    $output['code']     = '201';
    $output['status']   = "sukses";
    $output['data']     = "";
    $output['pesan']    = 'Data Edukasi ditemukan';

}

public function tampilobservasiirna()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    $idtrans        = $input->id_transaksi;
    $id_kunjungan   = $input->id_kunjungan;

    $query = $this->db->query("SELECT * FROM observasi_sementara o inner join zusers z on z.kd_user=o.id_user WHERE id_transaksi = '$idtrans' ORDER BY jam DESC "); 

    if ($query->getNumRows() > 0){
        $output['code']     = 200;
        $output['status']   = "sukses";
        $output['pesan']    = 'Data Obsevasi ditemukan';
        $output['data']     = $query->getResult();
    } else {
        $output['code']     = 201;
        $output['status']   = "sukses";
        $output['pesan']    = "Data Obsevasi Kosong";
        $output['data']     = '';
        $output['detail']   = '';
    }

    $this->hasil($output);

}

public function tampilobservasiirnalast()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    $idtrans        = $input->id_transaksi;
    $id_kunjungan   = $input->id_kunjungan;

    $query = $this->db->query("SELECT * FROM observasi_sementara o inner join zusers z on z.kd_user=o.id_user WHERE id_transaksi = '$idtrans' ORDER BY jam DESC limit 1"); 

    if ($query->getNumRows() > 0){
        $output['code']     = 200;
        $output['status']   = "sukses";
        $output['pesan']    = 'Data Obsevasi ditemukan';
        $output['data']     = $query->getResult();
    } else {
        $output['code']     = 201;
        $output['status']   = "sukses";
        $output['pesan']    = "Data Obsevasi Kosong";
        $output['data']     = '';
        $output['detail']   = '';
    }

    $this->hasil($output);

}

public function ReviewResumeIrna()
{
   $input = json_decode(file_get_contents('php://input'));
   $output = array();
 // $query="SELECT
 // concat ( 'Jantung ', CASE WHEN jantung = '1' THEN 'normal' ELSE jantung_ket END ) AS jantung,
 // concat ( 'Kepala ', CASE WHEN kepala = '1' THEN 'normal' ELSE kepala_ket END ) AS kepala,
 // concat ( 'Mata ',CASE WHEN  mata = '1' THEN 'normal' ELSE mata_ket END ) AS mata,
 // concat ( 'Tht ',CASE WHEN tht = '1' THEN 'normal' ELSE tht_ket END ) AS tht,
 // concat ( 'Leher ',CASE WHEN leher = '1' THEN 'normal' ELSE leher_ket END ) AS leher,
 // concat ( 'Mulut ',CASE WHEN mulut = '1' THEN 'normal' ELSE mulut_ket END ) AS mulut,
 // concat ( 'Thorak ',CASE WHEN thoraks = '1' THEN 'normal' ELSE thoraks_ket END ) AS thoraks,
 // concat ( 'Paru ',CASE WHEN paru = '1' THEN 'normal' ELSE paru_ket END, paru_ket ) AS paru,
 // concat ( 'Abdomen ',CASE WHEN abdomen = '1' THEN 'normal' ELSE abdomen_ket END ) AS abdomen,
 // concat ( 'Genitalis ',CASE WHEN genitalia = '1' THEN 'normal' ELSE genitalia_ket END  ) AS genitalia 
 // FROM
 // assesmen_medis_umum
 // INNER JOIN kunjungan USING ( id_kunjungan )  where
 // id_kunjungan = '$input->id_kunjungan' order by tgl_masuk desc limit 1";
 // $querycaramasuk="SELECT C
 // .cara_masuk,r.rujukan 
 // FROM
 // penjamin_transaksi
 // T INNER JOIN cara_masuk C ON C.kd_cara_masuk = T.cara_masuk
 // inner join rujukan r on r.kd_rujukan=T.id_rujukan where T.id_transaksi='$input->transaksi' limit 1 ";
   $query="select bod.kd_prd, o.nama_obat,bod.jml_out,bod.tgl_out,u.nama_unit,bo.no_resep
   from apt_barang_out_detail bod
   inner join apt_barang_out bo on bo.no_out=bod.no_out and bo.tgl_out=bod.tgl_out
   inner join transaksi t on t.no_transaksi=bo.apt_no_transaksi and t.kd_kasir=bo.apt_kd_kasir 
   and t.kd_pasien=bo.kd_pasienapt and t.kd_unit=bo.kd_unit
   inner join apt_obat o on o.kd_prd=bod.kd_prd
   inner join unit u on u.kd_unit=bo.kd_unit
   where t.no_transaksi='$input->id_transaksi' order by o.nama_obat asc";

 //$query1 = $this->db->query($query)->getRow(); 
 //$query2 = $this->db->query($querycaramasuk)->getRow();  
   if ($this->db->simpleQuery($query)) {  
       $queryx = $this->db->query($query)->getResult();              
       if (!empty($queryx)) { 
        $output['status']   = "sukses";
        $output['code']     =200;
    // $output['data1']     = $query1;
    // $output['data2']     = $query2;
        $output['obat']      = $queryx;
        $output['pesan']    = ''; 
    } else { 
        $output['status']   = "gagal";
        $output['code']     =201;
        $output['pesan']    = 'Pasien belum dilakukan assesmen medis';  
        $output['data']     =''; 

    }
} else {
    $output['code']     = "01";
    $output['status']   = 'gagal cari, hubungi admin';
    $output['pesan']    = $this->db->error()['message'];
}
echo json_encode($output);
}

public function datakunjunganhistorirmsoapiresume()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'idkunjungan' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $id       = $input->id_transaksi;
        $user     = $input->user;

        $query = "SELECT * FROM askep_soap s inner join zusers p on p.kd_user=s.kd_ppa where s.no_transaksi ='$id' and s.aktif='t' limit 1  ";

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

    public function datamrpenyakitirja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT    kd_penyakit,
            penyakit,
            CASE

            WHEN stat_diag = 0 THEN
            'awal' ELSE 
            case when stat_diag = 1 then 'utama' ELSE
            'sekunder'
            end
            END AS status 
            from mr_penyakit inner join penyakit USING(kd_penyakit) where no_transaksi='$input->kunjungan'";

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
    public function datamricd9irja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT    kd_icd9,deskripsi,tgl_tindakan
            from mr_tindakan inner join icd_9 USING(kd_icd9) where no_transaksi='$input->kunjungan'";

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
    public function cekedukasi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =['id_transaksi',];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $query="select * from edukasi where id_transaksi =$input->id_transaksi";
            $queryx = $this->db->query($query)->getRow();                
            if (!empty($queryx)) { 
                $output['status']   = "sukses";
                $output['data']     = "Terisi";
            } else { 
                $output['status']   = "sukses";
                $output['data']     = "Data kosong";                    
            }
        }else{
           $output['code']     = "01";
           $output['status']   = 'Data Tidak lengkap';
       }
       $this->hasil($output);
   }

   public function detailresumeirna()
   {
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan',];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="select * from resume_pasien where id_transaksi =$input->id_transaksi and aktif=true ";
        $queryx = $this->db->query($query)->getRow();                
        if (!empty($queryx)) { 
            $output['status']   = "sukses";
            $output['code']     = 200;
            $output['data']     = $queryx;
        } else { 
            $output['status']   = "sukses";
            $output['code']     = 201;                    
        }
    }else{
       $output['code']     = "01";
       $output['status']   = 'Data Tidak lengkap';
   }
   $this->hasil($output);
}

public function saveResumeErmIrna()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan',];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $save               = false;
    $cek                ="";
    $riwayat_kesehatan      =str_replace("'","",$input->riwayat_kesehatan);
    $pemeriksaan_fisik      =str_replace("'","",$input->pemeriksaan_fisik);
    $pemeriksaan_diagnostik =str_replace("'","",$input->pemeriksaan_diagnostik);
    $terapi                 =str_replace("'","",$input->terapi);
    $tindakan               =str_replace("'","",$input->tindakan);
    $instruksi              =str_replace("'","",$input->instruksi);
    $diagnosis              =str_replace("'","",$input->diagnosis);
    $perkembangan_perawatan =str_replace("'","",$input->perkembangan_perawatan);
    if ($this->evalParam($input, $listParam)) {
        $cek=$this->db->query("select * from resume_pasien where id_kunjungan='$input->id_kunjungan' ")->getResult();
        if (!empty($cek)) {
            $this->db->query("update resume_pasien set aktif=false where id_kunjungan='$input->id_kunjungan' ");
        } 
        $query="INSERT INTO resume_pasien (
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
            id_transaksi,
            ttd,
            aktif,
            ttdpasien,
            ttd_perawat,
            diagnosa_sekunder,
            perawat
            )VALUES(
            '$input->id_kunjungan',
            '$input->tgl_masuk',
            '$input->tgl_keluar',
            '$input->dpjp',
            '$input->cara_masuk',
            '$input->berat_lahir',
            '$input->tgl',
            '$riwayat_kesehatan',
            '$pemeriksaan_fisik',
            '$pemeriksaan_diagnostik',
            '$terapi',
            '$tindakan',
            '$instruksi',
            '$diagnosis',
            '$perkembangan_perawatan',
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
            '$input->transaksi',
            '$input->ttd',
            true,
            '$input->ttdpasien',
            '$input->ttdperawat',
            '$input->diagnosissekunder',
            '$input->perawat'
        )";
            $save=$this->db->simpleQuery($query);
        }

        if ($save) {
            $cekdoc=$this->db->query("select from dokumen_pasien where id_transaksi= '$input->transaksi' and id_dokumen ='4' ")->getResult();
            if (!empty($cekdoc)) {     
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = '';

            } else {
               $queryx="INSERT INTO dokumen_pasien values ('$input->transaksi', '4')";
               $save_dok=$this->db->simpleQuery($queryx);
               if ($save_dok) {
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = '';
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = 'gagal';
            }
        }
    } else {
        $output['status']   = "gagal";
        $output['pesan']    =$query;
    }

    $this->hasil($output);
}

public function saveedukasiirna()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [
        'id_pegawai'
    ];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $save               = false;

    $this->db->transStart();
    if ($this->evalParam($input, $listParam)) {

        $jenis_petugas      = $input->jenispetugas;
        $jenis_rawat        = $input->jenisrawat;
        $id_pegawai         = $input->id_pegawai;
        $id_user            = $input->id_user;
        $nama               = $input->nama;
        $hub_dg_pasien      = $input->hub;
        $tgl_edukasi        = $input->tgl;
        $waktu              = $input->waktu;
        $metode             = $input->metode;
        $media              = $input->media;
        $respon_verifikasi  = $input->respon;
        $evaluasi           = $input->evaluasi;
        if ($evaluasi == 2){
            $tgl_reevaluasi = "'$input->tgl_reevaluasi'";
        }else{
            $tgl_reevaluasi = 'null';
        }
        $id_transaksi       = $input->id_transaksi;
        $norm               = $input->norm;

        $topik_edukasi      = $input->topik;

        $replace_topik1 = str_replace('[',"",$topik_edukasi);
        $replace_topik2 = str_replace(']',"",$replace_topik1);
        $replace_topik3 = str_replace('"',"",$replace_topik2);

        if (($nama == '')||($hub_dg_pasien == '')||($waktu == '')){
            $output['status']   = "gagal";
            $output['pesan']    = "Data tidak lengkap.";
            $this->hasil($output);
            return;
        }

            if ($jenis_petugas == 1){ //AHLI GIZI
                $ket_ahligizi1      = $input->ket_ahligizi1;
                $ket_ahligizi2      = $input->ket_ahligizi2;

                $insert_detedukasi  = "INSERT INTO detail_edukasi ( jenis_rawat, jenis_petugas, id_pegawai, id_user, nama, hub_dg_pasien, tgl_edukasi, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, id_transaksi, topik_edukasi, norm, ket_ahligizi1, ket_ahligizi2)
                VALUES
                (
                    '$jenis_rawat',
                    '$jenis_petugas',
                    '$id_pegawai',
                    '$id_user',
                    '$nama',
                    '$hub_dg_pasien',
                    '$tgl_edukasi',
                    '$waktu',
                    '$metode',
                    '$media',
                    '$respon_verifikasi',
                    '$evaluasi',
                    $tgl_reevaluasi,
                    '$id_transaksi',
                    '$replace_topik3',
                    '$norm',
                    '$ket_ahligizi1',
                    '$ket_ahligizi2'
                )";
            }else if ($jenis_petugas == 2){ //PERAWAT
                $ket_perawat1      = $input->ket_perawat1;
                $ket_perawat2      = $input->ket_perawat2;
                $ket_perawat3      = $input->ket_perawat3;

                $insert_detedukasi  = "INSERT INTO detail_edukasi ( jenis_rawat, jenis_petugas, id_pegawai, id_user, nama, hub_dg_pasien, tgl_edukasi, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, id_transaksi, topik_edukasi, norm, ket_perawat1, ket_perawat2, ket_perawat3)
                VALUES
                (
                    '$jenis_rawat',
                    '$jenis_petugas',
                    '$id_pegawai',
                    '$id_user',
                    '$nama',
                    '$hub_dg_pasien',
                    '$tgl_edukasi',
                    '$waktu',
                    '$metode',
                    '$media',
                    '$respon_verifikasi',
                    '$evaluasi',
                    $tgl_reevaluasi,
                    '$id_transaksi',
                    '$replace_topik3',
                    '$norm',
                    '$ket_perawat1',
                    '$ket_perawat2',
                    '$ket_perawat3'
                )";
            }else if ($jenis_petugas == 3){ //BIDAN
                $ket_perawat1      = $input->ket_perawat1;
                $ket_perawat2      = $input->ket_perawat2;
                $ket_perawat3      = $input->ket_perawat3;

                $insert_detedukasi  = "INSERT INTO detail_edukasi ( jenis_rawat, jenis_petugas, id_pegawai, id_user, nama, hub_dg_pasien, tgl_edukasi, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, id_transaksi, topik_edukasi, norm, ket_perawat1, ket_perawat2, ket_perawat3)
                VALUES
                (
                    '$jenis_rawat',
                    '$jenis_petugas',
                    '$id_pegawai',
                    '$id_user',
                    '$nama',
                    '$hub_dg_pasien',
                    '$tgl_edukasi',
                    '$waktu',
                    '$metode',
                    '$media',
                    '$respon_verifikasi',
                    '$evaluasi',
                    $tgl_reevaluasi,
                    '$id_transaksi',
                    '$replace_topik3',
                    '$norm',
                    '$ket_perawat1',
                    '$ket_perawat2',
                    '$ket_perawat3'
                )";
            }else if ($jenis_petugas == 4){ //DOKTER
                $ket_dokter1      = $input->ket_dokter1;
                $ket_dokter2      = $input->ket_dokter2;
                $ket_dokter3      = $input->ket_dokter3;

                $insert_detedukasi  = "INSERT INTO detail_edukasi ( jenis_rawat, jenis_petugas, id_pegawai, id_user, nama, hub_dg_pasien, tgl_edukasi, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, id_transaksi, topik_edukasi, norm, ket_dokter1, ket_dokter2, ket_dokter3)
                VALUES
                (
                    '$jenis_rawat',
                    '$jenis_petugas',
                    '$id_pegawai',
                    '$id_user',
                    '$nama',
                    '$hub_dg_pasien',
                    '$tgl_edukasi',
                    '$waktu',
                    '$metode',
                    '$media',
                    '$respon_verifikasi',
                    '$evaluasi',
                    $tgl_reevaluasi,
                    '$id_transaksi',
                    '$replace_topik3',
                    '$norm',
                    '$ket_dokter1',
                    '$ket_dokter2',
                    '$ket_dokter3'
                )";
            }else if ($jenis_petugas == 5){ //TEN KESEHATAN
                $ket_tenagakes1      = $input->ket_tenagakes1;
                $ket_tenagakes2      = $input->ket_tenagakes2;

                $insert_detedukasi  = "INSERT INTO detail_edukasi ( jenis_rawat, jenis_petugas, id_pegawai, id_user, nama, hub_dg_pasien, tgl_edukasi, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, id_transaksi, topik_edukasi, norm, ket_tenagakes1, ket_tenagakes2)
                VALUES
                (
                    '$jenis_rawat',
                    '$jenis_petugas',
                    '$id_pegawai',
                    '$id_user',
                    '$nama',
                    '$hub_dg_pasien',
                    '$tgl_edukasi',
                    '$waktu',
                    '$metode',
                    '$media',
                    '$respon_verifikasi',
                    '$evaluasi',
                    $tgl_reevaluasi,
                    '$id_transaksi',
                    '$replace_topik3',
                    '$norm',
                    '$ket_tenagakes1',
                    '$ket_tenagakes2'
                )";
            }else if ($jenis_petugas == 6){ //APOTEKER
                $ket_apoteker1      = $input->ket_apoteker1;

                $insert_detedukasi  = "INSERT INTO detail_edukasi ( jenis_rawat, jenis_petugas, id_pegawai, id_user, nama, hub_dg_pasien, tgl_edukasi, waktu, metode, media, respon_verifikasi, evaluasi, tgl_reevaluasi, id_transaksi, topik_edukasi, norm, ket_apoteker1)
                VALUES
                (
                    '$jenis_rawat',
                    '$jenis_petugas',
                    '$id_pegawai',
                    '$id_user',
                    '$nama',
                    '$hub_dg_pasien',
                    '$tgl_edukasi',
                    '$waktu',
                    '$metode',
                    '$media',
                    '$respon_verifikasi',
                    '$evaluasi',
                    $tgl_reevaluasi,
                    '$id_transaksi',
                    '$replace_topik3',
                    '$norm',
                    '$ket_apoteker1',
                    '$ket_tenagakes2'
                )";
            }else{
                $output['code']     = "500";
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Simpan...";
                return;
            }

            $save = $this->db->query($insert_detedukasi);
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Simpan";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal di Simpan...";
        }

        $this->hasil($output);
    }

    public function intruksipembedahan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $save = false;

        if ($this->evalParam($input, $listParam)) {
            $query="INSERT INTO instruksi_bedah(
                id_kunjungan,
                tgl_masuk,
                diagnosa,
                dokter,
                tensi,
                nadi,
                suhu,
                napas,
                minum,
                makan,
                stop_infus,
                obat,
                khusus,
                dpjp
                )values(
                '$input->id_kunjungan',
                '$input->tgl_masuk',
                '$input->diagnosa',
                '$input->dokter',
                '$input->tensi',
                '$input->nadi',
                '$input->suhu',
                '$input->napas',
                '$input->minum',
                '$input->makan',
                '$input->stop_infus',
                '$input->obat',
                '$input->khusus',
                '$input->dpjp'
            )";
                $save=$this->db->simpleQuery($query);
            }
            if ($save) {
                $queryx="INSERT INTO dokumen_pasien values (
                    '$input->transaksi',
                    '15')";
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

            $this->hasil($output);
        }

        public function updatesoapirna() 
        {
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
            $subjek=str_replace("'","",$input->subjek);
            $objek=str_replace("'","",$input->objek);
            $assesmen=str_replace("'","",$input->assesmen);
            $planning=str_replace("'","",$input->planning);
            $instruksi=str_replace("'","",$input->instruksi);
            $tindakan=str_replace("'","",$input->tindakan);
            if ($this->evalParam($input, $listParam)) {
                $erm = $this->db->simpleQuery("update soap_pasien set
                 subject='$subjek',
                 object='$objek',
                 assusment='$assesmen',
                 planing='$planning',
                 instruksi='$instruksi',
                 suhu='$input->suhu',
                 t_darah='$input->tekanandarah',
                 nadi='$input->nadi',
                 saturasi='$input->saturasi',
                 spo2='$input->Spo2',
                 tindakan='$tindakan',
                 t_darah_bawah='$input->tekanandarah2' where jam_soap='$input->id' and kd_pasien_kunj='$input->rm'
                 ");
            }

            if ($erm) {
                $output['status']   = "sukses";
                $output['pesan']    ='Berhasil';
                $output['data']     ='';
            } else {
                $query=("update soap_pasien set
                 subjek='$subjek',
                 objek='$objek',
                 assesmen='$assesmen',
                 planning='$planning',
                 instruksi='$instruksi',
                 suhu='$input->suhu',
                 tekanan_darah='$input->tekanandarah',
                 nadi='$input->nadi',
                 saturasi='$input->saturasi',
                 spo2='$input->Spo2',
                 tindakan='$tindakan',
                 tekanan_darah2='$input->tekanandarah2' where id='$input->id'
                 ");
                $output['status']   = "gagal";
                $output['pesan'] = $query;
                $output['data'] = $query;
            }

            $this->hasil($output);
        }
        public function addmrpenyakitirna()
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

            $cekutama=$this->db->query("select * from mr_penyakit where id_transaksi='$input->id_transaksi' and status_diag=1 limit 1")->getRow();
            $cekicd10=$this->db->query("select * from mr_penyakit where id_transaksi='$input->id_transaksi' and id_penyakit='$input->kode' limit 1 ")->getRow();
            if ($cekutama>'' && $input->stat=='1') {
                $output['status']   = "sukses";
                $output['code']     = '201';
                $output['pesan']    = 'Status utama sudah ada';
            } else {
                if ($cekicd10>'') {
                    $output['status']   = "sukses";
                    $output['code']     = '201';
                    $output['pesan']    = 'ICD 10 sudah Terinput';
                } else {
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,tgl_kunjungan,id_penyakit,id_kunjungan,status_diag,kasus,id_transaksi) VALUES('$input->rm','$input->unit','".$tgl."','$input->kode', '$input->id_kunjungan','$input->stat','$kasus','$input->id_transaksi') ");
                        if ($penyakit) {
                            $output['status']   = "sukses";
                            $output['code']     = '200';
                            $output['pesan']    = 'Berhasil';
                        } else {
                            $output['status']   = "sukses";
                            $output['code']     = '201';
                            $output['pesan']    = '';
                        }
                    }
                }
                

                echo json_encode($output);
            }
            public function icdjsonlocalstorage()
            {      

                $data=$this->db->query("SELECT code as kd_penyakit,UPPER(str) as penyakit FROM mrconso where left(sab,5)='ICD10' 
                    union all
                    SELECT kd_penyakit,UPPER(penyakit) as penyakit FROM diagnosa_keperawatan ");
                
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = $data->getResult();
                echo json_encode($output);
            }
            public function addeErmirna()
            {
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
                $subjek=str_replace("'","",$input->subjek);
                $objek=str_replace("'","",$input->objek);
                $assesmen=str_replace("'","",$input->assesmen);
                $planning=str_replace("'","",$input->planning);
                $instruksi=str_replace("'","",$input->instruksi);
                $tindakan=str_replace("'","",$input->tindakan);
                if ($this->evalParam($input, $listParam)) {
                    $query1="INSERT INTO askep_soap (
                        kd_pasien_kunj,
                        kd_unit_kunj,
                        urut_masuk_kunj,
                        tgl_masuk_kunj,
                        tgl_soap,
                        jam_soap,
                        kd_ppa,
                        subject,
                        object,
                        assusment,
                        planing,
                        instruksi,
                        aktif,
                        t_darah,
                        suhu,
                        nadi,
                        nafas,
                        saturasi,
                        ppa,
                        gcs,
                        tindakan,
                        no_transaksi,
                        t_darah_bawah
                        )
                    VALUES
                    (
                        '$input->rm',
                        '$input->unit',
                        '$input->urut_masuk',
                        '$input->tgl_masuk',
                        '".date("Y-m-d")."',
                        '".date("Y-m-d h:m:s")."',
                        '$input->id_pegawai',
                        '".$subjek."',
                        '".$objek."',
                        '".$assesmen."',
                        '".$planning."',
                        '".$instruksi."',
                        't',
                        '$input->tekanandarah',
                        '$input->suhu',
                        '$input->nadi',
                        '$input->Spo2',
                        '$input->saturasi',
                        2,
                        '$input->gcs',
                        '$tindakan',
                        '$input->id_transaksi', 
                        '$input->tekanandarah2'
                    )";
                    $erm = $this->db->simpleQuery($query1);
                }

                if ($erm) {
                    $queryx="INSERT INTO dokumen_pasien values (
                        '$input->id_transaksi','20')";
                    $save_dok=$this->db->simpleQuery($queryx);
                    if ($save_dok) {
                        $output['status']   = "sukses";
                        $output['pesan']    ='Berhasil';
                        $output['data']     ='';
                    } else {
                      $output['status']   = "gagal";
                      $output['pesan'] = $query1;
                      $output['data'] = $this->db->error();
                  }
              } else {
                $output['status']   = "gagal";
                $output['pesan'] = $query1;;
                $output['data'] = $this->db->error();
            }

            $this->hasil($output);
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
                $output['pesan']    = "tidak berhasil simpan erm irna";
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
                $output['pesan']    = "tidak berhasil simpan erm irna";
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
                    $output['pesan']    = "tidak berhasil simpan erm irna";
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
                        $output['pesan']    = "tidak berhasil simpan erm irna";
                        $output['data']     = $this->db->error();
                    }

                    $this->hasil($output);
                }

                public function saveAssesmenDokterirna()
                {
                    $input = json_decode(file_get_contents('php://input'));
                    $listParam =[
                        'id_kunjungan',
                        'keluhanutamaErmirna',];
                        $output = array();
                        $output['status']   = "gagal";
                        $output['pesan']    = "";
                        $save               = false;
                        if ($this->evalParam($input, $listParam)) {
                            $idtandavital=$this->db->query("UPDATE sys_nomor_dok SET nomor=(SELECT nomor + 1 from sys_nomor_dok where key_data=3) WHERE key_data=3 RETURNING nomor ")->getRow()->nomor;
                            $save=$this->db->simpleQuery("INSERT INTO 
                                assesmen_medis_umum(
                                    id_kunjungan,
                                    keluhan_utama,
                                    penyakit_sekarang,
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
                                    ttd,
                                    id_tanda_vital)
                                VALUES(
                                  '$input->id_kunjungan',
                                  '$input->keluhanutamaErmirna',
                                  '$input->RPenyakitNowErmirna',
                                  '$input->AssesmenErmirna',
                                  '$input->tindakanErmirna',
                                  '$input->planningErmirna',
                                  '$input->pasienKompleksErmirna',
                                  '$input->fisikStatusLocalisErmirna',   
                                  '$input->fisikKepalaErmirna',          
                                  '$input->fisikKepalaErmirnaKet',       
                                  '$input->fisikJantungErmirna',         
                                  '$input->fisikJantungErmirnaKet',      
                                  '$input->fisikMataErmirna',            
                                  '$input->fisikMataErmirnaKet',        
                                  '$input->fisikParuErmirna',           
                                  '$input->fisikParuErmirnaKet',         
                                  '$input->fisikThtErmirna',            
                                  '$input->fisikThtErmirnaKet',          
                                  '$input->fisikAbdomenErmirna',         
                                  '$input->fisikAbdomenErmirnaKet',                               
                                  '$input->fisikLeherErmirna',           
                                  '$input->fisikLeherErmirnaKet',       
                                  '$input->fisikGenitaliaErmirna',       
                                  '$input->fisikGenitaliaErmirnaKet',    
                                  '$input->fisikMulutErmirna',           
                                  '$input->fisikMulutErmirnaKet',        
                                  '$input->fisikThoraxErmirna',          
                                  '$input->fisikThoraxErmirnaKet',
                                  '$input->RPenyakitNowErmirna',
                                  '$input->id_user',
                                  '$input->ttd',
                                  ".$idtandavital.")");
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
                                    no_rm,
                                    id_tanda_vital)
                                values(
                                 '$input->id_kunjungan',
                                 '$input->KeadaanUmumAssMedirna',
                                 '$input->respirasiAssMedirna',
                                 '$input->nadiAssMedirna',
                                 '$input->Spo2AssMedirna',
                                 '$input->pupilAssMedirnaKiri',
                                 '$input->tDarahErmirna1',
                                 '$input->suhuErmirna',
                                 '$input->reflekCahayaKiriErmirna1',
                                 '$input->bbErmirna',
                                 '$input->tinggiErmirna',
                                 '$input->imtErmirna',
                                 '$input->skorassesmenmedisErmIrna',
                                 '$input->dacrjasesmenmedis_bgcstot',
                                 '$input->pupilAssMedirnaKanan',
                                 '$input->reflekCahayaKiriErmirna2',
                                 '$input->tDarahErmirna2',
                                 '$input->palpasiErmirna',
                                 true,
                                 '$input->id_user',
                                 '$input->eyeOpen',
                                 '$input->ResponMotorik',
                                 '$input->responVerbal',
                                 '$input->norm',
                                 ".$idtandavital.")");
                        }else {
                            $output['status']   = "gagal";
                            $output['pesan']    =$this->db->error();
                        }

                        if ($save_tandavital) {
                         $queryx="INSERT INTO dokumen_pasien values (
                            '$input->transaksi','18')";
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
                        $output['pesan']    =$this->db->error();
                        $output['data']     = $this->db->error();
                    }
                    $this->hasil($output);       
                }

                public function searchPasien()
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
                     SELECT ROW_NUMBER () OVER ( ORDER BY k.id_kunjungan desc ) as no, tr.id_transaksi,k.id_kunjungan, DATE(tr.tgl_transaksi) as tgl_transaksi, k.id_unit, u.nama_unit, tr.no_rm, UPPER(P.nama) as nama, UPPER(P.alamat) as alamat, P.telepon, penj.nama_penjamin, k.id_pegawai,nama_pegawai,hubungan_penanggung_jawab,tgl_keluar,nama_keluarga
                     FROM transaksi tr 
                     INNER JOIN pasien P ON tr.no_rm = P.no_rm 
                     INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi 
                     INNER JOIN unit u ON u.id_unit = k.id_unit 
                     INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi 
                     INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin 
                     JOIN pegawai on k.id_pegawai = pegawai.id_pegawai 
                     WHERE
                     LEFT (k.id_unit, 1) = '2'   
                     AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')";


                        if ($this->db->simpleQuery($query)) { 
                            $queryx = $this->db->query($query)->getResult();                
                            if (!empty($queryx)) { 
                                $output['status']   = "sukses";
                                $output['code']     = "00";
                                $output['pesan']    = "Data ditemukan";
                                $output['data']     = $queryx;
                            } else { 
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

                public function searchPoli()
                {
                    $output = array();
                    $output['status']   = "gagal";
                    $output['pesan']    = "";
                    $query = "SELECT * FROM unit WHERE id_unit LIKE ('1%')";
                    $poli= $this->db->query($query)->getResult();
                    $output['status']   = 'sukses';
                    $output['data']     = $poli;
                    echo json_encode($output);        
                }

                public function viewPoli()
                {
                  $input = json_decode(file_get_contents('php://input'));
                  $output = array();
                  $output['status']   = "gagal";
                  $output['pesan']    = "";
                  $query = "SELECT * FROM unit WHERE id_unit LIKE ('$input%')";
      //echo"$query";
                  $vpoli= $this->db->query($query)->getResult();
                  $output['status']   = 'sukses';
                  $output['poli']     = $vpoli;
                  echo json_encode($output);        
              }

              public function daftarpemberianobat()
              {
                  $input = json_decode(file_get_contents('php://input'));
                  $output = array();
                  $output['status']   = "gagal";
                  $output['pesan']    = "";
                  $query = "SELECT *,case when jenis_obat=1 then 'Obat Jadi' else 'Obat Racik' end as jenis_obat_far from pemberian_obat inner join far_obat USING(kd_obat) where id_kunjungan in (SELECT id_kunjungan from kunjungan where id_transaksi='$input->id_transaksi' )  and high_alert=false";
                  $queryhigh = "SELECT *,case when jenis_obat=1 then 'Obat Jadi' else 'Obat Racik' end as jenis_obat_far from pemberian_obat inner join far_obat USING(kd_obat) where id_kunjungan in (SELECT id_kunjungan from kunjungan where id_transaksi='$input->id_transaksi' ) and high_alert=true";
                  $vobat     = $this->db->query($query)->getResult();
                  $vhighobat = $this->db->query($queryhigh)->getResult();
                  $output['status']   = 'sukses';
                  $output['nonhigh']  = $vobat;
                  $output['high']     = $vhighobat;
                  echo json_encode($output);        
              }
              public function daftarpemberianinfus()
              {
                  $input = json_decode(file_get_contents('php://input'));
                  $output = array();
                  $output['status']   = "gagal";
                  $output['pesan']    = "";
                  $query = "SELECT * from pemberian_infus p inner join far_obat f on f.kd_obat=p.kd_obat  where id_transaksi='$input->id_transaksi' and id_kat_infus='1'" ;
                  $queryhigh = "SELECT * from pemberian_infus p inner join far_obat f on f.kd_obat=p.kd_obat  where id_transaksi='$input->id_transaksi' and id_kat_infus='2'" ;
                  $vinfus     = $this->db->query($query)->getResult();
                  $vhighinfus = $this->db->query($queryhigh)->getResult();
                  $output['status']   = 'sukses';
                  $output['nonhigh']  = $vinfus;
                  $output['high']     = $vhighinfus;
                  echo json_encode($output);        
              }
              public function searchDokter()
              {
                $input = json_decode(file_get_contents('php://input'));
                if(!empty($input)){
                    $param="AND id_unit = '$input'";
                }else{
                    $param="";
                }

                $output = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";   

                $query = "SELECT * FROM dokter ORDER BY nama ASC";

                $dokpoli= $this->db->query($query)->getResult();
                $output['status']   = 'sukses';
                $output['data']     = $dokpoli;     

                echo json_encode($output);
            }

            public function searchPerawat()
            {
                $input = json_decode(file_get_contents('php://input'));

                if(!empty($input)){
                    $param="AND id_unit = '$input'";
                }else{
                    $param="";
                }

                $output = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";   

                $query = "SELECT * from perawat  ORDER BY nama_perawat ASC";

                $suspoli= $this->db->query($query)->getResult();
                $output['status']   = 'sukses';
                $output['data']     = $suspoli;     

                echo json_encode($output);
            }

            public function viewDokter()
            {
              $input = json_decode(file_get_contents('php://input'));

              $output = array();
              $output['status']   = "gagal";
              $output['pesan']    = ""; 

              $query = "SELECT id_pegawai,nama_pegawai FROM pegawai WHERE id_pegawai = '$input'";

              $vdokpoli= $this->db->query($query)->getResult();
              $output['status']   = 'sukses';
              $output['data']     = $vdokpoli;      
              echo json_encode($output);
          }

          public function Ruangan()
          {
             $input = json_decode(file_get_contents('php://input'));

             $output = array();
             $output['status']   = "gagal";
             $output['pesan']    = "";    

             $query = "SELECT kunjungan.id_unit,
             case when nama_kamar is null then nama_unit else nama_kamar end as nama_kamar 
             FROM kunjungan
             left JOIN kamar on kamar.id_kamar=kunjungan.id_kamar
             inner join unit u on u.id_unit =kunjungan.id_unit
             WHERE id_kunjungan='$input'";

             $ruang= $this->db->query($query)->getResult();
             $output['status']   = 'sukses';
             $output['data']     = $ruang;        
             echo json_encode($output);
         }

         public function save_discharge_planning()
         {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [ 
              'id_transaksi'];     

              if($this->evalParam($input, $listParam)){
                $cek=$this->db->query("select * from discharge_planning where id_transaksi='$input->id_transaksi'")->getNumRows();
                if ($cek > 0) {
                   $output = array();
                   $output['status']   = "gagal";
                   $output['pesan']    = "";    
                //update

                   $query="update discharge_planning set
                   id_kamar ='$input->Vid_kamar', 
                   pengaruh_keluarga ='$input->vdacriplanning_b1_1Id',
                   pengaruh_pekerjaan ='$input->vdacriplanning_b1_2Id',
                   pengaruh_keuangan ='$input->vdacriplanning_b1cId',
                   pengaruh_keluarga_ket ='$input->vdacriplanning_b1_1Idket',
                   pengaruh_pekerjaan_ket='$input->vdacriplanning_b1_2Idket',
                   pengaruh_keuangan_ket='$input->vdacriplanning_b1cIdket',
                   antisipasi='$input->vdacriplanning_b2Id',
                   antisipasi_ket ='$input->vdacriplanning_b2Idket',
                   bantuan_menyiapkan_makanan='$input->vdacriplanning_b3Id_1',
                   bantuan_mandi ='$input->vdacriplanning_b3Id_2',
                   bantuan_makanan ='$input->vdacriplanning_b3Id_3',
                   bantuan_perpakaian ='$input->vdacriplanning_b3Id_4',
                   bantuan_diet='$input->vdacriplanning_b3Id_5',
                   bantuan_transportasi ='$input->vdacriplanning_b3Id_6',
                   bantuan_menyiapkan_obat='$input->vdacriplanning_b3Id_7',
                   bantuan_edukasi_kesehatan ='$input->vdacriplanning_b3Id_8',
                   bantuan_minum_obat ='$input->vdacriplanning_b3Id_9',
                   bantuan_lain='$input->vdacriplanning_b3Id_10',
                   bantuanlain_ket ='$input->vdacriplanning_b3Idket10',
                   helper ='$input->vdacriplanning_b4Id',
                   helper_ket ='$input->vdacriplanning_b4Idket',
                   sendiri ='$input->vdacriplanning_b5Id',
                   sendiri_ket='$input->vdacriplanning_b5Idket',
                   alat_medis ='$input->vdacriplanning_b6Id',
                   alat_medis_cateter ='$input->vdacriplanning_b6ket_1',
                   alat_medis_ngt='$input->vdacriplanning_b6ket_2',
                   alat_medis_dobelumen ='$input->vdacriplanning_b6ket_3',
                   alat_medis_oksigen ='$input->vdacriplanning_b6ket_4',
                   alat_medis_lain ='$input->vdacriplanning_b6ket_5',
                   alat_medis_ket='$input->vdacriplanning_b6ketket5',
                   alat_jln ='$input->vdacriplanning_b7Id',
                   alat_jln_tongkat ='$input->vdacriplanning_b7ket_1',
                   alat_jln_kursiroda ='$input->vdacriplanning_b7ket_2',
                   alat_jln_walker ='$input->vdacriplanning_b7ket_3',
                   alat_jln_lain ='$input->vdacriplanning_b7ket_4',
                   alat_jln_ket='$input->vdacriplanning_b7ketket4',
                   rawat_khusus ='$input->vdacriplanning_b8Id',
                   home_care ='$input->vdacriplanning_b8ket_1',
                   visite_care ='$input->vdacriplanning_b8ket_2',
                   kesulitan ='$input->vdacriplanning_b9Id',
                   masalah_makan ='$input->vdacriplanning_b9ket_1',
                   masalah_minum ='$input->vdacriplanning_b9ket_2',
                   masalah_bab ='$input->vdacriplanning_b9ket_3',
                   masalah_lain ='$input->vdacriplanning_b9ket_4',
                   masalah_ket ='$input->vdacriplanning_b9ketket4',
                   nyeri ='$input->vdacriplanning_b10Id',
                   nyeri_ket ='$input->vdacriplanning_b10Idket',
                   edukasi ='$input->vdacriplanning_b11Id',
                   edukasi_obat='$input->vdacriplanning_b11ket_1',
                   edukasi_efeksamping ='$input->vdacriplanning_b11ket_2',
                   edukasi_nyeri='$input->vdacriplanning_b11ket_3',
                   edukasi_diit ='$input->vdacriplanning_b11ket_4',
                   edukasi_tolong='$input->vdacriplanning_b11ket_5',
                   edukasi_folup ='$input->vdacriplanning_b11ket_6',
                   edukasi_lain='$input->vdacriplanning_b11ket_7',
                   edukasi_ket ='$input->vdacriplanning_b11ketket7',
                   keterampilan='$input->vdacriplanning_b12Id',
                   keterampilan_rawatluka ='$input->vdacriplanning_b12ket_1',
                   keterampilan_injeksi ='$input->vdacriplanning_b12ket_2',
                   keterampilan_bayi ='$input->vdacriplanning_b12ket_3',
                   keterampilan_lain ='$input->vdacriplanning_b12ket_4',
                   keterampilan_ket ='$input->vdacriplanning_b12ketket4',
                   tgl_kontrol ='$input->vdacriplanning_ctglkontrol',
                   id_unit ='$input->vdacriplanning_cpoli',
                   id_dpjp ='$input->vdacriplanning_cdokter1Id',
                   dokumen_lab ='$input->vdacriplanning_cdokumenId_1',
                   dokumen_rad ='$input->vdacriplanning_cdokumenId_2',
                   dokumen_lain ='$input->vdacriplanning_cdokumenId_3',
                   dokumen_lain_ket ='$input->vdacriplanning_cdokumenIdket3',
                   catatan ='$input->vdacriplanning_catat',
                   ttddpjp ='$input->ttd',
                   alasan_mrs ='$input->vdacriplanning_aalasan',
                   diagnosa ='$input->vdacriplanning_adiagnosa',
                   px_wali ='$input->vdacriplanning_apx',
                   ppja ='$input->vdacriplanning_apjId',
                   tgl_keluar ='$input->vdacriplanning_atglpulang',
                   pendamping ='$input->vdacriplanning_apendamping',
                   hubungan ='$input->vdacriplanning_ahubungan',
                   no_rm ='$input->norm',
                   id_user ='$input->id_user',
                   tgl_input ='".date('Y-m-d')."',
                   tgl_masuk ='$input->vdacriplanning_atgl'
                   where id_transaksi='$input->id_transaksi'
                   ";
                // echo" $query";
// <<<<<<< HEAD
//            }else{
//                 //insert
//             $query="INSERT INTO discharge_planning("
//               . "id_transaksi,"
//               . "no_rm,"
//               . "id_user,"
//               . "id_unit,"
//               . "id_dpjp,"
//               . "tgl_kontrol,"
//               . "pengaruh_keluarga,"
//               . "antisipasi,"
//               . "bantuan,"
//               . "helper,"
//               . "sendiri,"
//               . "alat_medis,"
//               . "alat_jln,"
//               . "rawat_khusus,"
//               . "kesulitan,"
//               . "nyeri,"
//               . "edukasi,"
//               . "keterampilan,"
//               . "dokumen,"
//               . "catatan,"
//               . "tgl_input,"
//               . "tgl_masuk,"
//               . "alasan_mrs,"
//               . "diagnosa,"
//               . "px_wali,"
//               . "ppja,"
//               . "tgl_keluar,"
//               . "pendamping,"
//               . "hubungan,"
//               . "pengaruh_pekerjaan,"
//               . "pengaruh_keuangan,"
//               . "dokumen_lain,"
//               . "bantuan_lain,"
//               . "ttddpjp,"
//               . "pengaruh_keluarga_ket,"
//               . "antisipasi_ket,"
//               . "helper_ket,"
//               . "bantuanlain_ket,"
//               . "sendiri_ket"
//               . ") VALUES("
//               . "'".$input->id_transaksi."',"
//               . "'".$input->norm."',"
//               . "'".$input->id_user."',"
//               . "'".$input->vdacriplanning_cpoli."',"
//               . "".$input->vdacriplanning_cdokter1Id.","
//               . "'".$input->vdacriplanning_ctglkontrol."',"
//               . "'".$input->vdacriplanning_b1_1Id."',"
//               . "'".$input->vdacriplanning_b2Id."',"
//               . "'".$input->vdacriplanning_b3Id."',"
//               . "'".$input->vdacriplanning_b4Id."',"
//               . "'".$input->vdacriplanning_b5Id."',"
//               . "'".$input->vdacriplanning_b6Id."',"
//               . "'".$input->vdacriplanning_b7Id."',"
//               . "'".$input->vdacriplanning_b8Id."',"
//               . "'".$input->vdacriplanning_b9Id."',"
//               . "'".$input->vdacriplanning_b10Id."',"
//               . "'".$input->vdacriplanning_b11Id."',"
//               . "'".$input->vdacriplanning_b12Id."',"
//               . "'".$input->vdacriplanning_cdokumenId."',"
//               . "'".$input->vdacriplanning_catat."',"
//               . "'".date('Y-m-d')."',"
//               . "'".$input->vdacriplanning_atgl."',"
//               . "'".$input->vdacriplanning_aalasan."',"
//               . "'".$input->vdacriplanning_adiagnosa."',"
//               . "'".$input->vdacriplanning_apx."',"
//               . "'".$input->vdacriplanning_apjId."',"
//               . "'".$input->vdacriplanning_atglpulang."',"
//               . "'".$input->vdacriplanning_apendamping."',"
//               . "'".$input->vdacriplanning_ahubungan."',"
//               . "'".$input->vdacriplanning_b1_2Id."',"
//               . "'".$input->vdacriplanning_b1cId."',"
//               . "'".$input->dokumenlain_ket."',"
//               . "'".$input->bantuanlain."',"
//               . "'".$input->ttd."',"
//               . "'".$input->vdacriplanning_b1_1Idket."',"
//               . "'".$input->vdacriplanning_b2Idket."',"
//               . "'".$input->vdacriplanning_b3Idket10."',"
//               . "'".$input->vdacriplanning_b4Idket."',"
//               . "'".$input->vdacriplanning_b5Idket."'"
//               . ")";

//           }
//       }
// =======
               }else{

                //insert
                $query="INSERT INTO discharge_planning("
                    . "id_kamar,"
                    . "pengaruh_keluarga,"
                    . "pengaruh_pekerjaan,"
                    . "pengaruh_keuangan,"
                    . "pengaruh_keluarga_ket,"
                    . "pengaruh_pekerjaan_ket,"
                    . "pengaruh_keuangan_ket,"
                    . "antisipasi,"
                    . "antisipasi_ket,"
                    . "bantuan_menyiapkan_makanan,"
                    . "bantuan_mandi,"
                    . "bantuan_makanan,"
                    . "bantuan_perpakaian,"
                    . "bantuan_diet,"
                    . "bantuan_transportasi,"
                    . "bantuan_menyiapkan_obat,"
                    . "bantuan_edukasi_kesehatan,"
                    . "bantuan_minum_obat,"
                    . "bantuan_lain,"
                    . "bantuanlain_ket,"
                    . "helper,"
                    . "helper_ket,"
                    . "sendiri,"
                    . "sendiri_ket,"
                    . "alat_medis,"
                    . "alat_medis_cateter,"
                    . "alat_medis_ngt,"
                    . "alat_medis_dobelumen,"
                    . "alat_medis_oksigen,"
                    . "alat_medis_lain,"
                    . "alat_medis_ket,"
                    . "alat_jln,"
                    . "alat_jln_tongkat,"
                    . "alat_jln_kursiroda,"
                    . "alat_jln_walker,"
                    . "alat_jln_lain,"
                    . "alat_jln_ket,"
                    . "rawat_khusus,"
                    . "home_care,"
                    . "visite_care,"
                    . "kesulitan,"
                    . "masalah_makan,"
                    . "masalah_minum,"
                    . "masalah_bab,"
                    . "masalah_lain,"
                    . "masalah_ket,"
                    . "nyeri,"
                    . "nyeri_ket,"
                    . "edukasi,"
                    . "edukasi_obat,"
                    . "edukasi_efeksamping,"
                    . "edukasi_nyeri,"
                    . "edukasi_diit,"
                    . "edukasi_tolong,"
                    . "edukasi_folup,"
                    . "edukasi_lain,"
                    . "edukasi_ket,"
                    . "keterampilan,"
                    . "keterampilan_rawatluka,"
                    . "keterampilan_injeksi,"
                    . "keterampilan_bayi,"
                    . "keterampilan_lain,"
                    . "keterampilan_ket,"
                    . "tgl_kontrol,"
                    . "id_unit,"
                    . "id_dpjp,"
                    . "dokumen_lab,"
                    . "dokumen_rad,"
                    . "dokumen_lain,"
                    . "dokumen_lain_ket,"
                    . "catatan,"
                    . "ttddpjp,"
                    . "alasan_mrs,"
                    . "diagnosa,"
                    . "px_wali,"
                    . "ppja,"
                    . "tgl_keluar,"
                    . "pendamping,"
                    . "hubungan,"
                    . "no_rm,"
                    . "id_user,"
                    . "id_transaksi,"
                    . "tgl_input,"
                    . "tgl_masuk"
                    . ") VALUES("
                    . "'".$input->Vid_kamar."',"
                    . "'".$input->vdacriplanning_b1_1Id."',"
                    . "'".$input->vdacriplanning_b1_2Id."',"
                    . "'".$input->vdacriplanning_b1cId."',"
                    . "'".$input->vdacriplanning_b1_1Idket."',"
                    . "'".$input->vdacriplanning_b1_2Idket."',"
                    . "'".$input->vdacriplanning_b1cIdket."',"
                    . "'".$input->vdacriplanning_b2Id."',"
                    . "'".$input->vdacriplanning_b2Idket."',"
                    . "'".$input->vdacriplanning_b3Id_1."',"
                    . "'".$input->vdacriplanning_b3Id_2."',"
                    . "'".$input->vdacriplanning_b3Id_3."',"
                    . "'".$input->vdacriplanning_b3Id_4."',"
                    . "'".$input->vdacriplanning_b3Id_5."',"
                    . "'".$input->vdacriplanning_b3Id_6."',"
                    . "'".$input->vdacriplanning_b3Id_7."',"
                    . "'".$input->vdacriplanning_b3Id_8."',"
                    . "'".$input->vdacriplanning_b3Id_9."',"
                    . "'".$input->vdacriplanning_b3Id_10."',"
                    . "'".$input->vdacriplanning_b3Idket10."',"
                    . "'".$input->vdacriplanning_b4Id."',"
                    . "'".$input->vdacriplanning_b4Idket."',"
                    . "'".$input->vdacriplanning_b5Id."',"
                    . "'".$input->vdacriplanning_b5Idket."',"
                    . "'".$input->vdacriplanning_b6Id."',"
                    . "'".$input->vdacriplanning_b6ket_1."',"
                    . "'".$input->vdacriplanning_b6ket_2."',"
                    . "'".$input->vdacriplanning_b6ket_3."',"
                    . "'".$input->vdacriplanning_b6ket_4."',"
                    . "'".$input->vdacriplanning_b6ket_5."',"
                    . "'".$input->vdacriplanning_b6ketket5."',"
                    . "'".$input->vdacriplanning_b7Id."',"
                    . "'".$input->vdacriplanning_b7ket_1."',"
                    . "'".$input->vdacriplanning_b7ket_2."',"
                    . "'".$input->vdacriplanning_b7ket_3."',"
                    . "'".$input->vdacriplanning_b7ket_4."',"
                    . "'".$input->vdacriplanning_b7ketket4."',"
                    . "'".$input->vdacriplanning_b8Id."',"
                    . "'".$input->vdacriplanning_b8ket_1."',"
                    . "'".$input->vdacriplanning_b8ket_2."',"
                    . "'".$input->vdacriplanning_b9Id."',"
                    . "'".$input->vdacriplanning_b9ket_1."',"
                    . "'".$input->vdacriplanning_b9ket_2."',"
                    . "'".$input->vdacriplanning_b9ket_3."',"
                    . "'".$input->vdacriplanning_b9ket_4."',"
                    . "'".$input->vdacriplanning_b9ketket4."',"
                    . "'".$input->vdacriplanning_b10Id."',"
                    . "'".$input->vdacriplanning_b10Idket."',"
                    . "'".$input->vdacriplanning_b11Id."',"
                    . "'".$input->vdacriplanning_b11ket_1."',"
                    . "'".$input->vdacriplanning_b11ket_2."',"
                    . "'".$input->vdacriplanning_b11ket_3."',"
                    . "'".$input->vdacriplanning_b11ket_4."',"
                    . "'".$input->vdacriplanning_b11ket_5."',"
                    . "'".$input->vdacriplanning_b11ket_6."',"
                    . "'".$input->vdacriplanning_b11ket_7."',"
                    . "'".$input->vdacriplanning_b11ketket7."',"
                    . "'".$input->vdacriplanning_b12Id."',"
                    . "'".$input->vdacriplanning_b12ket_1."',"
                    . "'".$input->vdacriplanning_b12ket_2."',"
                    . "'".$input->vdacriplanning_b12ket_3."',"
                    . "'".$input->vdacriplanning_b12ket_4."',"
                    . "'".$input->vdacriplanning_b12ketket4."',"
                    . "'".$input->vdacriplanning_ctglkontrol."',"
                    . "'".$input->vdacriplanning_cpoli."',"
                    . "'".$input->vdacriplanning_cdokter1Id."',"
                    . "'".$input->vdacriplanning_cdokumenId_1."',"
                    . "'".$input->vdacriplanning_cdokumenId_2."',"
                    . "'".$input->vdacriplanning_cdokumenId_3."',"
                    . "'".$input->vdacriplanning_cdokumenIdket3."',"
                    . "'".$input->vdacriplanning_catat."',"
                    . "'".$input->ttd."',"
                    . "'".$input->vdacriplanning_aalasan."',"
                    . "'".$input->vdacriplanning_adiagnosa."',"
                    . "'".$input->vdacriplanning_apx."',"
                    . "'".$input->vdacriplanning_apjId."',"
                    . "'".$input->vdacriplanning_atglpulang."',"
                    . "'".$input->vdacriplanning_apendamping."',"
                    . "'".$input->vdacriplanning_ahubungan."',"
                    . "'".$input->norm."',"
                    . "'".$input->id_user."',"
                    . "'".$input->id_transaksi."',"
                    . "'".date('Y-m-d')."',"
                    . "'".$input->vdacriplanning_atgl."'"
                    . ")";
                // echo"$query";exit();
}
}
//>>>>>>> 1b86a13763c29bd2bb3b9e8dca8587bfae737951

if ($this->db->simpleQuery($query)) {
    $queryx="INSERT INTO dokumen_pasien values (
        '$input->id_transaksi','5')";
    $save_dok=$this->db->simpleQuery($queryx);
    if ($save_dok) {
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

public function showpersetujuantindakaninap()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM persetujuan_tindakan WHERE  id_kunjungan='$input->id_kunjungan'  ";
        $showform= $this->db->query($query)->getResult();
    }
    if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['data']    = $showform;
    }           
    echo json_encode($output);      
}

public function showInformasiSedasi()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM informasi_anestesi_sedasi WHERE  id_kunjungan='$input->id_kunjungan'  ";
        $showform= $this->db->query($query)->getResult();
    }
    if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['data']    = $showform;
    }           
    echo json_encode($output);      
}

public function showAssesmenGizi()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM assesmen_gizi WHERE  id_kunjungan='$input->id_kunjungan' and aktif=true ";
        $showform= $this->db->query($query)->getResult();
    }
    if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['data']    = $showform;
    }           
    echo json_encode($output);      
}

public function cekassesmengizi()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM assesmen_gizi WHERE  id_kunjungan='$input->id_kunjungan' and aktif=true ";

        $showform= $this->db->query($query)->getResult();

        if (!empty($showform)) {

            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = "Terisi";

        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = "Kosong";

        }    
    }       
    echo json_encode($output);      
}

public function showEfekPemberianObat()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM efek_samping_obat WHERE  id_kunjungan='$input->id_kunjungan' and aktif=true ";
        $showform= $this->db->query($query)->getResult();
    }
    if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['data']    = $showform;
    }           
    echo json_encode($output);      
}

public function showmodalgeneralconcentinap()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM general_consent WHERE  id_kunjungan='$input->id_kunjungan'  ";
        $showform= $this->db->query($query)->getResult();
    }
    if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['pesan']    = "Sukses Menyimpan";
        $output['data']    = $showform;
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "Data Tidak Ditemukan";
    }           
    echo json_encode($output);      
}

public function showinputpembedahan()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query = "SELECT * FROM input_bedah WHERE id_transaksi='$input->id_transaksi' and id_kunjungan='$input->id_kunjungan' and aktif = 'true' ";
        $showform = $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "Data ditemukan";
        $output['data']     = $showform;
    } else {
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $showform;
    }           
    echo json_encode($output);      
}
public function showsuratkelahiran()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query = "SELECT * FROM surat_kelahiran WHERE id_transaksi='$input->id_transaksi'";
        $showform = $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "Data ditemukan";
        $output['data']     = $showform;
    } else {
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $showform;
    }           
    echo json_encode($output);      
}

public function showinstruksipembedahan()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query = "SELECT * FROM instruksi_bedah WHERE  id_kunjungan='$input->id_kunjungan' and aktif = 'true' ";
        $showform = $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "Data ditemukan";
        $output['data']     = $showform;
    } else {
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $showform;
    }           
    echo json_encode($output);      
}

public function showserahterima()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query = "SELECT * FROM serah_terima WHERE  id_kunjungan='$input->id_kunjungan' and aktif = 'true' ";
        $showform = $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "Data ditemukan";
        $output['data']     = $showform;
    } else {
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $showform;
    }           
    echo json_encode($output);      
}
//showchecklistkeselamatanop
public function showchecklistkeselamatanop()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $query = "SELECT * FROM cek_keselamatan_op WHERE  id_kunjungan='$input->id_kunjungan' ";
        $showform = $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "Data ditemukan";
        $output['data']     = $showform;
    } else {
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $showform;
    }           
    echo json_encode($output);      
}
public function showPasienPulang()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = ['id_transaksi'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)) {
        $query="SELECT * FROM discharge_planning WHERE no_rm='$input->norm' and id_transaksi='$input->id_transaksi' ORDER BY tgl_kontrol DESC LIMIT 10";
        $showform= $this->db->query($query)->getResult();
    }

    if ($this->db->query($query)->getNumRows() > 0) {
        $output['status']   = "sukses";
        $output['pesan']    = "Discharge Planning sudah pernah dibuatkan";
        $output['data']    = $showform;
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "Belum Pernah dibuatkan Discharge Planning";
        $output['data']    = "";
    }           
    echo json_encode($output);      
}

public function saverencanaoperasi()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['no_rm'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)) {
        $save=$this->db->simpleQuery("
         INSERT into rencana_pembedahan(
            no_rm,
            tgl_operasi,
            waktu_dibuat,
            gambar_tubuh,
            gambar_kepala_samping,
            gambar_kepala_depan,
            gambar_tangan_atas,
            gambar_tangan_bawah,
            gambar_kaki,
            id_user,
            aktif,
            keterangan,
            pembuat_rencana,
            id_kunjungan,
            transaksi
            )
         values(
           '$input->no_rm',
           '$input->tgl_operasi',
           '$input->waktu_dibuat',
           '$input->gambar_tubuh',
           '$input->gambar_kepala_samping',
           '$input->gambar_kepala_depan',
           '$input->gambar_tangan_atas',
           '$input->gambar_tangan_bawah',
           '$input->gambar_kaki',
           '$input->user',
           true,
           '$input->keterangan',
           '$input->pembuat_rencana',
           '$input->id_kunjungan',
           '$input->transaksi') ");

        if ($save) {
            $output['status']   = "sukses";
            $output['pesan']    = '';
            $output['data']     = "ok";
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = "";
        }
    }
    $this->hasil($output);
}

public function pemberiinfotindakan()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['norm'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)) {


        $save=$this->db->simpleQuery("
         INSERT into pemberi_info_tindakan_medis(
            id_kunjungan,
            id_transaksi,
            no_rm,
            tgl_pemberian,
            jam_pemberian,
            id_dpjp,
            diagnosis,
            dasar_diagnosis,
            tindakan,
            indikasi,
            tata_cara,
            tujuan,
            risiko,
            komplikasi,
            prognosis,
            alternatif,
            hal_lain,
            lainnya,
            ttdpasien,
            ttddpjp,
            dokter_pelaksana,
            pemberi_info
            )
         values(
            '$input->kunjungan',
            '$input->transaksi',
            '$input->norm',
            '$input->tgl_pemberian',
            '$input->jam_pemberian',
            '$input->id_dpjp',
            '$input->diagnosis',
            '$input->dasar_diagnosis',
            '$input->tindakan',
            '$input->indikasi',
            '$input->tata_cara',
            '$input->tujuan',
            '$input->risiko',
            '$input->komplikasi',
            '$input->prognosis',
            '$input->alternatif',
            '$input->hal_lain',
            '$input->lainnya',
            '$input->ttdpasien',
            '$input->ttddpjp',
            '$input->dokter_pelaksana',
            '$input->pemberi_info'
        ) ");
        if ($save) {
            $queryx="INSERT INTO dokumen_pasien values (
             '$input->transaksi','37','$input->kunjungan')";
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
            $output['pesan']    =$this->db->error();
            $output['data']     = $this->db->error();
        }
    }
    $this->hasil($output);
}

public function saveVitalPasien()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($this->evalParam($input, $listParam)) {
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
             aktif)
            values(
             '$input->id_kunjungan',
             '$input->keadaan_umum',
             '$input->respirasi',
             '$input->nadi',
             '$input->spo2',
             '$input->pupil_kiri',
             '$input->tekanan_darah1',
             '$input->suhu',
             '$input->reflek_cahaya_kiri',
             '$input->bb',
             '$input->tinggi_badan',
             '$input->imt',
             '$input->skor_kesadaran',
             '$input->tipe_kesadaran',
             '$input->pupil_kanan',
             '$input->reflek_cahaya_kanan',
             '$input->tekanan_darah2',
             '$input->palpasi',
             true)
            ");
        if ($save_tandavital) {
            $output['status']   = "sukses";
            $output['pesan']    = 'Berhasil';               
        } else {
            $output['status']   = "gagal";
            $output['pesan']    =$this->db->error();
            $output['data']     = $this->db->error();
        }
    }
    $this->hasil($output);
}

public function saveKeadaanPas2()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    if ($input->jam=='') {
        $jam=date("h:i:sa");
    } else {
        $jam=$input->jam;
    }

    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
       $query="
       INSERT INTO keadaan2(
        id_kunjungan,
        operasi,
        anestesi,
        emosi,
        hamil,
        haid,
        premedikasi,
        nama_obat,
        dosis,
        jam,
        mrsa
        )VALUES(
        $input->id_kunjungan,
        $input->operasi,
        $input->anestesi,
        '$input->emosi',
        '$input->hamil',
        '$input->haid',
        '$input->premedikasi',
        '$input->nama_obat',
        '$input->dosis',
        '$jam',
        '$input->mrsa'
        )
        ";
        if ($this->db->query($query)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Sukses Menyimpan";
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = $query;
        }
    }
    echo json_encode($output);
}

public function saveKeadaanPas()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
       $query="
       INSERT INTO keadaan1(
        id_kunjungan,
        keadaan_umum,
        respirasi,
        nadi,
        spo2,
        pupil_kiri,
        pupil_kanan,
        tekanan_darah1,
        tekanan_darah2,
        suhu,
        cahaya_kiri,
        cahaya_kanan,
        bb,
        tinggi,
        imt,
        palpasi,
        skor,
        tipe,
        diagnosa,
        tindakan,
        tgl_op,
        kasus,
        dok_operator,
        dok_anastesi
        )values(
        $input->id_kunjungan,
        '$input->keadaan_umum',
        '$input->respirasi',
        '$input->nadi',
        '$input->spo2',
        '$input->pupil_kiri',
        '$input->pupil_kanan',
        '$input->tekanan_darah1',
        '$input->tekanan_darah2',
        '$input->suhu',
        '$input->cahaya_kiri',
        '$input->cahaya_kanan',
        $input->bb,
        $input->tinggi,
        $input->imt,
        '$input->palpasi',
        $input->skor_kesadaran,
        '$input->tipe_kesadaran',
        '$input->diagnosa',            
        '$input->tindakan',         
        '$input->tgl_operasi',        
        '$input->kasus',               
        '$input->dokter_op',           
        '$input->dokter_anas'
        )
        ";

        if ($this->db->query($query)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Sukses Menyimpan";
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Ditemukan";
        }    
    }       
    echo json_encode($output);      
}

// public function showPasienPulang()
// {
//     $input = json_decode(file_get_contents('php://input'));
//     $listParam = ['id_transaksi'];
//     $output = array();
//     $output['status']   = "gagal";
//     $output['pesan']    = "";

//     if ($this->evalParam($input, $listParam)) {
//         $query="SELECT * FROM discharge_planning 
//         join pegawai on discharge_planning.id_dpjp=pegawai.id_pegawai
//         WHERE discharge_planning.no_rm='$input->norm' and discharge_planning.id_transaksi='$input->id_transaksi' limit 1";
//         $showform= $this->db->query($query)->getResult();

//     }

// echo json_encode($output);
// }

//<<<<<<< HEAD
public function saveStatusPas()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
       $query="
       INSERT INTO statuspas(
           id_kunjungan,
           identifikasi_ruang,
           identifikasi_terima,
           identifikasi_ket,
           operasi_ruang,
           operasi_terima,
           operasi_ket,
           anestesi_ruang,
           anestesi_terima,
           anestesi_ket,
           puasa_ruang,
           puasa_terima,
           puasa_ket,
           hasil_lab_ruang,
           hasil_lab_terima,
           hasil_lab_ket,
           hasil_rad_ruang,
           hasil_rad_terima,
           hasil_rad_ket,
           darah_ruang,
           darah_terima,
           darah_ket,
           protesa_luar_ruang,
           protesa_luar_terima,
           protesa_luar_ket,
           protesa_dalam_ruang,
           protesa_dalam_terima,
           protesa_dalam_ket,
           mandi_sabun_ruang,
           mandi_sabun_terima,
           mandi_sabun_ket,
           cukur_ruang,
           cukur_terima,
           cukur_ket,
           pencernaan_ruang,
           pencernaan_terima,
           pencernaan_ket,
           baju_ruang,
           baju_terima,
           baju_ket,
           kateter_ruang,
           kateter_terima,
           kateter_ket,
           infus_ruang,
           infus_terima,
           infus_ket
           )VALUES(
           $input->id_kunjungan,
           '$input->identifikasi_ruang',
           '$input->identifikasi_terima',
           '$input->identifikasi_ket',
           '$input->operasi_ruang',
           '$input->operasi_terima',
           '$input->operasi_ket',
           '$input->anestesi_ruang',
           '$input->anestesi_terima',
           '$input->anestesi_ket',
           '$input->puasa_ruang',
           '$input->puasa_terima',
           '$input->puasa_ket',
           '$input->hasil_lab_ruang',
           '$input->hasil_lab_terima',
           '$input->hasil_lab_ket',
           '$input->hasil_rad_ruang',
           '$input->hasil_rad_terima',
           '$input->hasil_rad_ket',
           '$input->darah_ruang',
           '$input->darah_terima',
           '$input->darah_ket',
           '$input->protesa_luar_ruang',
           '$input->protesa_luar_terima',
           '$input->protesa_luar_ket',
           '$input->protesa_dalam_ruang',
           '$input->protesa_dalam_terima',
           '$input->protesa_dalam_ket',
           '$input->mandi_sabun_ruang',
           '$input->mandi_sabun_terima',
           '$input->mandi_sabun_ket',
           '$input->cukur_ruang',
           '$input->cukur_terima',
           '$input->cukur_ket',
           '$input->pencernaan_ruang',
           '$input->pencernaan_terima',
           '$input->pencernaan_ket',
           '$input->baju_ruang',
           '$input->baju_terima',
           '$input->baju_ket',
           '$input->kateter_ruang',
           '$input->kateter_terima',
           '$input->kateter_ket',
           '$input->infus_ruang',
           '$input->infus_terima',
           '$input->infus_ket'
           )
           ";

           if ($this->db->query($query)->getNumRows() > 0) {
//>>>>>>> 1b86a13763c29bd2bb3b9e8dca8587bfae737951
            $output['status']   = "sukses";
            $output['pesan']    = "Sukses Menyimpan";
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Menyimpan";
        }
    }
    echo json_encode($output);
}

public function savePraoperasiTry()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
       $query="
       INSERT INTO praoperasi(
           id_kunjungan,
           hub_ansietas,
           bukti_ansietas,
           ansietas_intervensi,
           hasil_ansietas,
           observasi_ansietas,
           terapeutik_ansietas,
           edukasi_ansietas,
           kolab_ansietas,
           hub_pengetahuan,
           bukti_pengetahuan,
           pengetahuan_intervensi,
           hasil_pengetahuan,
           observasi_ilmu,
           terapeutik_ilmu,
           edukasi_ilmu,
           kolab_ilmu,
           hipotermia,
           hipo_intervensi,
           hasil_hipo,
           observasi_hipo,
           terapeutik_hipo
           )VALUES(
           $input->id_kunjungan,
           '$input->hub_ansietas',
           '$input->bukti_ansietas',
           '$input->ansietas_intervensi',
           '$input->hasil_ansietas',
           '$input->observasi_ansietas',
           '$input->terapeutik_ansietas',
           '$input->edukasi_ansietas',
           '$input->kolab_ansietas',
           '$input->hub_pengetahuan',
           '$input->bukti_pengetahuan',
           '$input->pengetahuan_intervensi',
           '$input->hasil_pengetahuan',
           '$input->observasi_ilmu',
           '$input->terapeutik_ilmu',
           '$input->edukasi_ilmu',
           '$input->kolab_ilmu',
           '$input->hipotermia',
           '$input->hipo_intervensi',
           '$input->hasil_hipo',
           '$input->observasi_hipo',
           '$input->terapeutik_hipo'
           )
           ";
           if ($this->db->query($query)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Sukses Menyimpan";
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Menyimpan";
        }
    }
    echo json_encode($output);
}

public function savePraoperasi()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    if ($input->jam=='') {
        $jam=date("h:i:sa");
    } else {
        $jam=$input->jam;
    }

    if ($this->evalParam($input, $listParam)) {
        $this->db->transBegin();
        $cek=$this->db->query("select * from praoperasi where id_kunjungan= $input->id_kunjungan ")->getResult();
        if (!empty($cek)) {
            $this->db->query("update praoperasi set aktif=false where id_kunjungan=$input->id_kunjungan ");
        }
        $query="
        INSERT INTO praoperasi(
           id_kunjungan,
           hub_ansietas,
           bukti_ansietas,
           ansietas_intervensi,
           hasil_ansietas,
           observasi_ansietas,
           terapeutik_ansietas,
           edukasi_ansietas,
           kolab_ansietas,
           hub_pengetahuan,
           bukti_pengetahuan,
           pengetahuan_intervensi,
           hasil_pengetahuan,
           observasi_ilmu,
           terapeutik_ilmu,
           edukasi_ilmu,
           kolab_ilmu,
           hipotermia,
           hipo_intervensi,
           hasil_hipo,
           observasi_hipo,
           terapeutik_hipo,
           aktif
           )VALUES(
           $input->id_kunjungan,
           '$input->hub_ansietas',
           '$input->bukti_ansietas',
           '$input->ansietas_intervensi',
           '$input->hasil_ansietas',
           '$input->observasi_ansietas',
           '$input->terapeutik_ansietas',
           '$input->edukasi_ansietas',
           '$input->kolab_ansietas',
           '$input->hub_pengetahuan',
           '$input->bukti_pengetahuan',
           '$input->pengetahuan_intervensi',
           '$input->hasil_pengetahuan',
           '$input->observasi_ilmu',
           '$input->terapeutik_ilmu',
           '$input->edukasi_ilmu',
           '$input->kolab_ilmu',
           '$input->hipotermia',
           '$input->hipo_intervensi',
           '$input->hasil_hipo',
           '$input->observasi_hipo',
           '$input->terapeutik_hipo',
           true
           )
           ";
           if ($this->db->query($query)) {
            $cek=$this->db->query("select * from statuspas where id_kunjungan= $input->id_kunjungan ")->getResult();
            if (!empty($cek)) {
                $this->db->query("update statuspas set aktif=false where id_kunjungan=$input->id_kunjungan ");
            }
            $querystatus="INSERT INTO statuspas(
               id_kunjungan,
               identifikasi_ruang,
               identifikasi_terima,
               identifikasi_ket,
               operasi_ruang,
               operasi_terima,
               operasi_ket,
               anestesi_ruang,
               anestesi_terima,
               anestesi_ket,
               puasa_ruang,
               puasa_terima,
               puasa_ket,
               hasil_lab_ruang,
               hasil_lab_terima,
               hasil_lab_ket,
               hasil_rad_ruang,
               hasil_rad_terima,
               hasil_rad_ket,
               darah_ruang,
               darah_terima,
               darah_ket,
               protesa_luar_ruang,
               protesa_luar_terima,
               protesa_luar_ket,
               protesa_dalam_ruang,
               protesa_dalam_terima,
               protesa_dalam_ket,
               mandi_sabun_ruang,
               mandi_sabun_terima,
               mandi_sabun_ket,
               cukur_ruang,
               cukur_terima,
               cukur_ket,
               pencernaan_ruang,
               pencernaan_terima,
               pencernaan_ket,
               baju_ruang,
               baju_terima,
               baju_ket,
               kateter_ruang,
               kateter_terima,
               kateter_ket,
               infus_ruang,
               infus_terima,
               infus_ket,
               aktif
               )VALUES(
               $input->id_kunjungan,
               '$input->identifikasi_ruang',
               '$input->identifikasi_terima',
               '$input->identifikasi_ket',
               '$input->operasi_ruang',
               '$input->operasi_terima',
               '$input->operasi_ket',
               '$input->anestesi_ruang',
               '$input->anestesi_terima',
               '$input->anestesi_ket',
               '$input->puasa_ruang',
               '$input->puasa_terima',
               '$input->puasa_ket',
               '$input->hasil_lab_ruang',
               '$input->hasil_lab_terima',
               '$input->hasil_lab_ket',
               '$input->hasil_rad_ruang',
               '$input->hasil_rad_terima',
               '$input->hasil_rad_ket',
               '$input->darah_ruang',
               '$input->darah_terima',
               '$input->darah_ket',
               '$input->protesa_luar_ruang',
               '$input->protesa_luar_terima',
               '$input->protesa_luar_ket',
               '$input->protesa_dalam_ruang',
               '$input->protesa_dalam_terima',
               '$input->protesa_dalam_ket',
               '$input->mandi_sabun_ruang',
               '$input->mandi_sabun_terima',
               '$input->mandi_sabun_ket',
               '$input->cukur_ruang',
               '$input->cukur_terima',
               '$input->cukur_ket',
               '$input->pencernaan_ruang',
               '$input->pencernaan_terima',
               '$input->pencernaan_ket',
               '$input->baju_ruang',
               '$input->baju_terima',
               '$input->baju_ket',
               '$input->kateter_ruang',
               '$input->kateter_terima',
               '$input->kateter_ket',
               '$input->infus_ruang',
               '$input->infus_terima',
               '$input->infus_ket',
               true)";
               if ($this->db->query($querystatus)) {
                $cek=$this->db->query("select * from keadaan1 where id_kunjungan= $input->id_kunjungan ")->getResult();
                if (!empty($cek)) {
                    $this->db->query("update keadaan1 set aktif=false where id_kunjungan=$input->id_kunjungan ");
                }
                $querykeadaan="INSERT INTO keadaan1(
                    id_kunjungan,
                    keadaan_umum,
                    respirasi,
                    nadi,
                    spo2,
                    pupil_kiri,
                    pupil_kanan,
                    tekanan_darah1,
                    tekanan_darah2,
                    suhu,
                    cahaya_kiri,
                    cahaya_kanan,
                    bb,
                    tinggi,
                    imt,
                    palpasi,
                    skor,
                    tipe,
                    diagnosa,
                    tindakan,
                    tgl_op,
                    kasus,
                    dok_operator,
                    dok_anastesi,
                    aktif
                    )values(
                    $input->id_kunjungan,
                    '$input->keadaan_umum',
                    '$input->respirasi',
                    '$input->nadi',
                    '$input->spo2',
                    '$input->pupil_kiri',
                    '$input->pupil_kanan',
                    '$input->tekanan_darah1',
                    '$input->tekanan_darah2',
                    '$input->suhu',
                    '$input->cahaya_kiri',
                    '$input->cahaya_kanan',
                    $input->bb,
                    $input->tinggi,
                    $input->imt,
                    '$input->palpasi',
                    $input->skor_kesadaran,
                    '$input->tipe_kesadaran',
                    '$input->diagnosa',            
                    '$input->tindakan',         
                    '$input->tgl_operasi',        
                    '$input->kasus',               
                    '$input->dokter_op',           
                    '$input->dokter_anas',
                    true)";
                    if ($this->db->query($querykeadaan)) {
                      $cek=$this->db->query("select * from keadaan2 where id_kunjungan= $input->id_kunjungan ")->getResult();
                      if (!empty($cek)) {
                        $this->db->query("update keadaan2 set aktif=false where id_kunjungan=$input->id_kunjungan ");
                    }
                    $querykeadaan2="
                    INSERT INTO keadaan2(
                        id_kunjungan,
                        operasi,
                        anestesi,
                        emosi,
                        hamil,
                        haid,
                        premedikasi,
                        nama_obat,
                        dosis,
                        jam,
                        mrsa,
                        aktif
                        )VALUES(
                        $input->id_kunjungan,
                        $input->operasi,
                        $input->anestesi,
                        '$input->emosi',
                        '$input->hamil',
                        '$input->haid',
                        '$input->premedikasi',
                        '$input->nama_obat',
                        '$input->dosis',
                        '$jam',
                        '$input->mrsa',
                        true)";
                        if ($this->db->query($querykeadaan2)) {
                            $this->db->transCommit();
                            $output['status']   = "sukses";
                            $output['pesan']    = "Sukses Menyimpan";
                        } else {
                         $this->db->transRollback();
                         $output['status']   = "gagal";
                         $output['pesan']    = "Gagal Menyimpan keadaan pasien part 2";
                     }
                 } else {
                    $this->db->transRollback();
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Menyimpan";
                }

            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Menyimpan";
            }

        } else {
            $this->db->transRollback();
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Menyimpan";
        }
    }
    echo json_encode($output);
}

public function saveIntraOperasi()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $this->db->transBegin();

        $cek=$this->db->query("select * from intraoperasi where id_kunjungan= $input->id_kunjungan ")->getResult();
        if (!empty($cek)) {
            $this->db->query("update intraoperasi set aktif=false where id_kunjungan=$input->id_kunjungan ");
        }

        $query="
        INSERT INTO intraoperasi(
         id_kunjungan,
         pendarahan,
         intervensi_darah,
         intervensi_hasil_darah,
         observasi_darah,
         terapeutik_darah,
         aspirasi,
         intervensi_aspirasi,
         intervensi_hasil_aspirasi,
         observasi_aspirasi,
         terapeutik_aspirasi,
         hipotermia,
         intervensi_hipo,
         intervensi_hasil_hipo,
         observasi_hipo,
         terapeutik_hipo,
         aktif
         )VALUES(
         $input->id_kunjungan,
         '$input->pendarahan',
         '$input->intervensi_darah',
         '$input->intervensi_hasil_darah',
         '$input->observasi_darah',
         '$input->terapeutik_darah',
         '$input->aspirasi',
         '$input->intervensi_aspirasi',
         '$input->intervensi_hasil_aspirasi',
         '$input->observasi_aspirasi',
         '$input->terapeutik_aspirasi',
         '$input->hipotermia',
         '$input->intervensi_hipo',
         '$input->intervensi_hasil_hipo',
         '$input->observasi_hipo',
         '$input->terapeutik_hipo',
         true
         )
         ";

         if ($this->db->query($query)) {
            $cek=$this->db->query("select * from keadaan3 where id_kunjungan= $input->id_kunjungan ")->getResult();
            if (!empty($cek)) {
                $this->db->query("update keadaan3 set aktif=false where id_kunjungan=$input->id_kunjungan ");
            }
            $querykeadaan3="
            INSERT INTO keadaan3(
             id_kunjungan,
             sadar,
             emosi,
             tindakan,
             jns_tindakan,
             tipe,
             jenis_bius,
             jenis_operasi,
             canul_intravera,
             operasi,
             lengan,
             cateter,
             desinfektan,
             insisi,
             diatermi,
             normal_elektrode,
             torniquet,
             implan,
             drain,
             luka,
             tampon,
             antibiotik,
             infus_input1,
             infus_input_jml1,
             infus_output1,
             infus_output_jml1,
             infus_input2,
             infus_input_jml2,
             infus_output2,
             infus_output_jml2,
             infus_input3,
             infus_input_jml3,
             infus_output3,
             infus_output_jml3,
             infus_input4,
             infus_input_jml4,
             infus_output4,
             infus_output_jml4,
             cairan_imbang,
             jaringan,
             kassa_awal,
             kassa_tmbah,
             kassa_akhir,
             jarum_awal,
             jarum_tmbah,
             jarum_akhir,
             bisturi_awal,
             bisturi_tmbah,
             bisturi_akhir,
             depper_awal,
             depper_tmbah,
             depper_akhir,
             aktif
             )VALUES(
             $input->id_kunjungan,
             '$input->sadar',
             '$input->emosi',
             '$input->tindakan',
             '$input->jns_tindakan',
             '$input->tipe',
             '$input->jenis_bius',
             '$input->jenis_operasi',
             '$input->canul_intravera',
             '$input->operasi',
             '$input->lengan',
             '$input->cateter',
             '$input->desinfektan',
             '$input->insisi',
             '$input->diatermi',
             '$input->normal_elektrode',
             '$input->torniquet',
             '$input->implan',
             '$input->drain',
             '$input->luka',
             '$input->tampon',
             '$input->antibiotik',
             '$input->infus_input1',
             '$input->infus_input_jml1',
             '$input->infus_output1',
             '$input->infus_output_jml1',
             '$input->infus_input2',
             '$input->infus_input_jml2',
             '$input->infus_output2',
             '$input->infus_output_jml2',
             '$input->infus_input3',
             '$input->infus_input_jml3',
             '$input->infus_output3',
             '$input->infus_output_jml3',
             '$input->infus_input4',
             '$input->infus_input_jml4',
             '$input->infus_output4',
             '$input->infus_output_jml4',
             '$input->cairan_imbang',
             '$input->jaringan',
             '$input->kassa_awal',
             '$input->kassa_tmbah',
             '$input->kassa_akhir',
             '$input->jarum_awal',
             '$input->jarum_tmbah',
             '$input->jarum_akhir',
             '$input->bisturi_awal',
             '$input->bisturi_tmbah',
             '$input->bisturi_akhir',
             '$input->depper_awal',
             '$input->depper_tmbah',
             '$input->depper_akhir',
             true
             )
             ";

             if ($this->db->query($querykeadaan3)) {
                $cek=$this->db->query("select * from docintra where id_kunjungan= $input->id_kunjungan ")->getResult();
                if (!empty($cek)) {
                    $this->db->query("update docintra set aktif=false where id_kunjungan=$input->id_kunjungan ");
                }
                $querydocintra="
                INSERT INTO docintra(
                   id_kunjungan,
                   tempat,
                   mulai,
                   selesai,
                   aktif
                   )VALUES(
                   '$input->id_kunjungan',
                   '$input->tempat',
                   '$input->mulai',
                   '$input->selesai',
                   true
                   )
                   ";
                   if ($this->db->query($querydocintra)) {
                    $cek=$this->db->query("select * from ttdperawat where id_kunjungan= $input->id_kunjungan ")->getResult();
                    if (!empty($cek)) {
                        $this->db->query("update ttdperawat set aktif=false where id_kunjungan=$input->id_kunjungan ");
                    }
                    $queryttdperawat="
                    INSERT INTO ttdperawat(
                       id_kunjungan,
                       asisten,
                       instrumen,
                       sirkuler,
                       anestesi,
                       img_asisten,
                       img_instrumen,
                       img_sirkuler,
                       img_anestesi,
                       aktif
                       )VALUES(
                       $input->id_kunjungan,
                       $input->asisten,
                       $input->instrumen,
                       $input->sirkuler,
                       $input->anestesi,
                       '$input->ttdasisten',
                       '$input->ttdinstrumen',
                       '$input->ttdsirkuler',
                       '$input->ttdanestesi',
                       true
                       )
                       ";
                       if ($this->db->query($queryttdperawat)) {
                        $this->db->transCommit();
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                       $this->db->transRollback();
                       $output['status']   = "gagal";
                       $output['pesan']    = "Gagal Menyimpan";
                   }
               } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Menyimpan";
            }
        } else {
            $this->db->transRollback();
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Menyimpan";
        }
    } else {
        $this->db->transRollback();
        $output['status']   = "gagal";
        $output['pesan']    = "Gagal Menyimpan";
    }
}
echo json_encode($output);
}

public function savePascaOperasi()
{ 
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['id_kunjungan'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
        $this->db->transBegin();
        $cekpascaop=$this->db->query("select * from pascaoperasi where id_kunjungan= $input->id_kunjungan ")->getResult();
        if (!empty($cekpascaop)) {
            $updatepascaop=$this->db->query("update pascaoperasi set aktif=false where id_kunjungan=$input->id_kunjungan ");
        } 
        $query="
        INSERT INTO pascaoperasi(
           id_kunjungan,
           shok,
           lama_shok,
           hasil_shok,
           observasi_shok,
           terapeutik_shok,
           cairan,
           lama_cairan,
           hasil_cairan,   
           observasi_cairan,
           terapeutik_cairan,
           kolab_cairan,
           nyeri_hub,
           nyeri_bukti,
           lama_nyeri,
           hasil_nyeri,
           observasi_nyeri,
           terapeutik_nyeri,
           edukasi_nyeri,
           kolab_nyeri,
           aktif
           )VALUES(
           $input->id_kunjungan,
           '$input->shok',
           '$input->lama_shok',
           '$input->hasil_shok',
           '$input->observasi_shok',
           '$input->terapeutik_shok',
           '$input->cairan',
           '$input->lama_cairan',
           '$input->hasil_cairan',
           '$input->observasi_cairan',
           '$input->terapeutik_cairan',
           '$input->kolab_cairan',
           '$input->nyeri_hub',
           '$input->nyeri_bukti',
           '$input->lama_nyeri',
           '$input->hasil_nyeri',
           '$input->observasi_nyeri',
           '$input->terapeutik_nyeri',
           '$input->edukasi_nyeri',
           '$input->kolab_nyeri',
           true
           )
           ";
           if ($this->db->query($query)) {
            $cekttddokanestesi=$this->db->query("select * from ttddokanestesi where id_kunjungan= $input->id_kunjungan ")->getResult();
            if (!empty($cekttddokanestesi)) {
                $cekttddokanestesi=$this->db->query("update ttddokanestesi set aktif=false where id_kunjungan=$input->id_kunjungan ");
            } 
            $queryttd="
            INSERT INTO ttddokanestesi(
               id_kunjungan,
               id_dokter,
               id_perawat,
               ttd_dokter,
               ttd_perawat,
               aktif
               )VALUES(
               $input->id_kunjungan,
               $input->id_dokter,
               $input->id_perawat,
               '$input->img_ttddokter',
               '$input->img_perawatanestesi',
               true
           )";

               if ($this->db->query($queryttd)) {
                $cek=$this->db->query("select * from keadaan4 where id_kunjungan= $input->id_kunjungan ")->getResult();
                if (!empty($cek)) {
                    $cek=$this->db->query("update keadaan4 set aktif=false where id_kunjungan=$input->id_kunjungan ");
                } 

                $querykeadaan="
                INSERT INTO keadaan4(
                   id_kunjungan,
                   kondisi,
                   gcs_e,
                   gcs_m,
                   gcs_v,
                   sadar,
                   cahaya_kiri,
                   cahaya_kanan,
                   pupil_kiri,
                   pupil_kanan,
                   kulit_datang,
                   kulit_keluar,
                   sirkulasi,
                   mukosa,
                   posisi,
                   pendarahan,
                   muntah,
                   nyeri,
                   jatuh,
                   jaringan,
                   aktif
                   )VALUES(
                   $input->id_kunjungan,
                   '$input->kondisi',
                   '$input->gcs_e',
                   '$input->gcs_m',
                   '$input->gcs_v',
                   '$input->sadar',
                   '$input->cahaya_kiri',
                   '$input->cahaya_kanan',
                   '$input->pupil_kiri',
                   '$input->pupil_kanan',
                   '$input->kulit_datang',
                   '$input->kulit_keluar',
                   '$input->sirkulasi',
                   '$input->mukosa',
                   '$input->posisi',
                   '$input->pendarahan',
                   '$input->muntah',
                   '$input->nyeri',
                   '$input->jatuh',
                   '$input->jaringan',
                   true
                   )
                   ";
                   if ($this->db->query($querykeadaan)) {
                    $cekpindahpas=$this->db->query("select * from pindahpas where id_kunjungan= $input->id_kunjungan ")->getResult();
                    if (!empty($cekpindahpas)) {
                        $cekpindahpas=$this->db->query("update pindahpas set aktif=false where id_kunjungan=$input->id_kunjungan ");
                    }

                    $querypindah="
                    INSERT INTO pindahpas(
                        id_kunjungan,
                        aldrete,
                        bromage,
                        steward,
                        aktif
                        )VALUES(
                        $input->id_kunjungan,
                        '$input->aldrete',
                        '$input->bromage',
                        '$input->steward',
                        true
                        )
                        ";

                        if ($this->db->query($querypindah)) {
                            $cekdocpasca=$this->db->query("select * from docpasca where id_kunjungan= $input->id_kunjungan ")->getResult();
                            if (!empty($cekdocpasca)) {
                                $cekdocpasca=$this->db->query("update docpasca set aktif=false where id_kunjungan=$input->id_kunjungan ");
                            }

                            $querydocpasca="
                            INSERT INTO docpasca(
                                id_kunjungan,
                                id,
                                masuk,
                                keluar,
                                id_ruangan,
                                nama_ruangan,
                                aktif
                                )VALUES(
                                $input->id_kunjungan,
                                '$input->id',
                                '$input->masuk',
                                '$input->keluar',
                                '$input->id_ruangan',
                                '$input->nama_ruangan',
                                true
                                )
                                ";
                                if ($this->db->query($querydocpasca)) {
                                    $this->db->transCommit();
                                    $output['status']   = "sukses";
                                    $output['pesan']    = "Sukses Menyimpan";
                                } else {
                                    $this->db->transRollback();
                                    $output['status']   = "gagal";
                                    $output['pesan']    = "Gagal Menyimpan dokumen pasca operasi";
                                }
                            } else {
                                $this->db->transRollback();
                                $output['status']   = "gagal";
                                $output['pesan']    = "Gagal Menyimpan pindah pasien";
                            }
                        } else {
                            $this->db->transRollback();
                            $output['status']   = "gagal";
                            $output['pesan']    = "Gagal Menyimpan keadaan pasien";
                        }
                    } else {
                        $this->db->transRollback();
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Menyimpan tanda tangan";
                    }
                } else {
                    $this->db->transRollback();
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Menyimpan pasca operasi";
                }
            }
            echo json_encode($output);
        }

        public function kelengkapan()
        {
            $input = json_decode(file_get_contents('php://input'));
            $nama_dokumen=$this->db->query("SELECT nama_table from dokumen_rekam_medis where id_dokumen='".$input->id_dokumen."' ")->getRow()->nama_table;

            if (!empty($nama_dokumen)) {

                if ($input->id_kunjungan == 0 || $input->id_kunjungan == null) {
                    if ($input->id_dokumen == '26'){ //PENGANTAR RAWAT INAP
                        $hasil = $this->db->query("SELECT * from ".$nama_dokumen." where id_transaksi='$input->id_transaksi' limit 1")->getRow();
                    }else{
                        $hasil = $this->db->query("SELECT * from ".$nama_dokumen." where id_transaksi='$input->id_transaksi' and aktif=true limit 1")->getRow();
                    }
                } else {
                 $hasil=$this->db->query("SELECT * from ".$nama_dokumen." where id_kunjungan='$input->id_kunjungan'  limit 1")->getRow();
             }

             if (!empty($hasil)) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "Terisi";

            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "Kosong";

            }
        } else {
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = "Dokumen Tidak ada";
        }
        echo json_encode($output);
    }

    public function saveinformasisedasi()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam =['id_kunjungan'];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();

            $cek=$this->db->query("SELECT * FROM informasi_anestesi_sedasi WHERE id_kunjungan='$input->id_kunjungan' ")->getResult();
            if (!empty($cek)) {
                $this->db->query("UPDATE informasi_anestesi_sedasi set aktif = false WHERE id_kunjungan = '$input->id_kunjungan' ");
            }

            $query=" INSERT INTO informasi_anestesi_sedasi(
                id_kunjungan,
                id_penyakit,
                diagnosis_c,
                dasar_diag,
                dasar_diag_c,
                tindakan,
                tindakan_c,
                indikasi,
                indikasi_c,
                tata_cara,
                tata_cara_c,
                tujuan,
                tujuan_c,
                resiko,
                resiko_c,
                komplikasi,
                komplikasi_c,
                prognosis,
                prognosis_c,
                alternatif,
                alternatif_c,
                next_point,
                next_point_c,
                tgl_input,
                aktif,
                ttd_dokter,
                ttd_pasien,
                iddokter,
                iduserpemberi,
                id_pegawai
                )values(
                '$input->id_kunjungan',
                '$input->diagnosis',
                '$input->diagnosis_c',
                '$input->dasar_diag',
                '$input->dasar_diag_c',
                '$input->tindakan',
                '$input->tindakan_c',
                '$input->indikasi',
                '$input->indikasi_c',
                '$input->tata_cara',
                '$input->tata_cara_c',
                '$input->tujuan',
                '$input->tujuan_c',
                '$input->resiko',
                '$input->resiko_c',
                '$input->komplikasi',
                '$input->komplikasi_c',
                '$input->prognosis',
                '$input->prognosis_c',
                '$input->alternatif',
                '$input->alternatif_c',
                '$input->next_point',
                '$input->next_point_c',
                '$input->tgl',
                true,
                '$input->ttd_dokter',
                '$input->ttd_pasien',
                '$input->dokter',
                '$input->informan',
                '$input->user'
            )";
                $this->db->query($query);

                $cekdok = $this->db->query("SELECT * FROM dokumen_pasien WHERE id_transaksi = '$input->id_transaksi' and id_dokumen = '23' and id_kunjungan = '$input->id_kunjungan' ")->getResult();

                if (empty($cekdok)) {
                    $insertdok = "INSERT INTO dokumen_pasien values ('$input->id_transaksi','23','$input->id_kunjungan')";
                    $this->db->query($insertdok);
                }

                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']       = "sukses";
                    $output['pesan']        = "Simpan Berhasil";
                    $output['data']         = '';
                }else{
                    $this->db->transRollback();
                    $output['status']       = "gagal";
                    $output['pesan']        = "Gagal Simpan";
                    $output['data']         = '';
                }

            } else {
                $output['status']   = "gagal";
                $output['pesan']    = $query;
            }

            echo json_encode($output);
        }

        public function savepreanes(){
          $input = json_decode(file_get_contents('php://input'));
          $listParam =['id_kunjungan'];
          $output = array();
          $output['status']   = "gagal";
          $output['pesan']    = "";
          if ($this->evalParam($input, $listParam)) {
           $cek=$this->db->query("SELECT * FROM assesmen_pre_anestesi WHERE id_kunjungan='$input->id_kunjungan' ")->getResult();
           if (!empty($cek)) {
            $this->db->query("UPDATE assesmen_pre_anestesi set aktif = false WHERE id_kunjungan = '$input->id_kunjungan' ");
        }
        $query=" INSERT INTO assesmen_pre_anestesi(
            id_kunjungan,
            id_transaksi,
            dokter,
            jenis_operasi,
            r_operasi,
            r_jns_operasi,
            r_komplikasi_operasi,
            r_anestesi,
            r_jns_anestesi,
            r_komplikasi_anestesi,
            habit,
            rokok,
            alkohol,
            sulit,
            sulit_ext,
            puasa,
            puasa_lama,
            puasa_makan,
            puasa_minum,
            jantung,
            jantung_ext,
            paru,
            paru_ext,
            ekg,
            lain,
            diagnosa,
            catatan,
            asa,
            asa_emergency,
            renc_tind,
            renc_lain,
            edukasi,
            ttd_pasien,
            ttd_dokter,
            lingkar_kepala,
            lingkar_lengan,
            lingkar_perut
            )values(
            '$input->id_kunjungan',
            '$input->id_transaksi',
            '$input->PPJA',
            '$input->jns_op',
            '$input->operasi',
            '$input->operasi_jns',
            '$input->operasi_komp',
            '$input->anestesi',
            '$input->anestesi_jns',
            '$input->anestesi_komp',
            '$input->habit',
            '$input->rokok',
            '$input->alkohol',
            '$input->sulit',
            '$input->sulit_anes',
            '$input->puasa',
            '$input->lama',
            '$input->makan',
            '$input->minum',
            '$input->jantung',
            '$input->jantung_ext',
            '$input->paru',
            '$input->paru_ext',
            '$input->ekg',
            '$input->lain',
            '$input->diagnos',
            '$input->catatan',
            '$input->asa',
            '$input->asa_e',
            '$input->tind',
            '$input->tind_ext',
            '$input->edukasi',
            '$input->ttd_pasien',
            '$input->ttd_dokter',
            '$input->lingkarkepala',
            '$input->lingkarlengan',
            '$input->lingkarperut'
        )";
            if ($this->db->query($query)) {
                $queryx="INSERT INTO dokumen_pasien values (
                    '$input->id_transaksi','32','$input->id_kunjungan')";
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
            // var_dump($query);
        }
        echo json_encode($output);
    }

    public function save_efek_samping_obat_irna()
    {
      $input = json_decode(file_get_contents('php://input'));
      $listParam =['id_kunjungan'];
      $output = array();
      $output['status']   = "gagal";
      $output['pesan']    = "";
      if ($this->evalParam($input, $listParam)) {
        $query="INSERT into  efek_samping_obat(
            id_kunjungan,
            id_user,
            kondisi_pasien,
            penyakit_utama,
            akhir,
            penyerta,
            eso_terjadi,
            tgl_terjadi,
            tgl_sesudah_eso,
            sesudah_eso,
            riwayat_eso,
            skor,
            urut,
            aktif,
            dacmeso_apgar1,
            dacmeso_apgar2,
            dacmeso_apgar3,
            dacmeso_apgar4,
            dacmeso_apgar5,
            dacmeso_apgar6,
            dacmeso_apgar7,
            dacmeso_apgar8,
            dacmeso_apgar9,
            dacmeso_apgar10,
            ttd

            )VALUES(
            '$input->id_kunjungan',
            '$input->dacmeso_apjId',
            '$input->selectdacmeso_bwanita',
            '$input->dacmeso_bkeluhan',
            '$input->selectdacmeso_bsudah',
            '$input->selectdacmeso_bkondisi',
            '$input->dacmeso_cmanifestasi',
            '$input->dacmeso_ctgl',
            '$input->dacmeso_dtgl',
            '$input->selectdacmeso_csudah',
            '$input->dacmeso_criwayat',
            '$input->dacmeso_apgartot',
            1,
            true,
            '$input->dacmeso_apgar1',
            '$input->dacmeso_apgar2',
            '$input->dacmeso_apgar3',
            '$input->dacmeso_apgar4',
            '$input->dacmeso_apgar5',
            '$input->dacmeso_apgar6',
            '$input->dacmeso_apgar7',
            '$input->dacmeso_apgar8',
            '$input->dacmeso_apgar9',
            '$input->dacmeso_apgar10',
            '$input->ttd'

        )";
            if ($this->db->query($query)) {
                $queryx="INSERT INTO dokumen_pasien values (
                 '$input->id_transaksi','25','$input->id_kunjungan')";
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
        }
        echo json_encode($output);
    }

    public function savePostoperasi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =['id_kunjungan'];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $cek=$this->db->query("select * from postoperasi where id_kunjungan= $input->id_kunjungan ")->getResult();
            if (!empty($cek)) {
                $this->db->query("update postoperasi set aktif=false where id_kunjungan=$input->id_kunjungan ");
            }

            $query="
            INSERT INTO postoperasi(
               id_kunjungan,
               dokumentasi,
               notif,
               alat,
               keadaan,
               gcs,
               kesadaran,
               cahaya_kiri,
               cahaya_kanan,
               pupil_kiri,
               pupil_kanan,
               tekanan_darah1,
               tekanan_darah2,
               nadi,
               respirasi,
               suhu,
               nyeri,
               jatuh,
               darah,
               urine,
               score_aldrete,
               score_bromage,
               score_steward,
               aktif
               )VALUES(
               $input->id_kunjungan,
               '$input->dokumentasi',
               '$input->notif',
               '$input->alat',
               '$input->keadaan',
               '$input->gcs',
               '$input->kesadaran',
               '$input->cahaya_kiri',
               '$input->cahaya_kanan',
               '$input->pupil_kiri',
               '$input->pupil_kanan',
               '$input->tekanan_darah1',
               '$input->tekanan_darah2',
               '$input->nadi',
               '$input->respirasi',
               '$input->suhu',
               '$input->nyeri',
               '$input->jatuh',
               '$input->darah',
               '$input->urine',
               '$input->score_aldrete',
               '$input->score_bromage',
               '$input->score_steward',
               true
               )
               ";
               if ($this->db->query($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Menyimpan";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Menyimpan";
            }
        }
        echo json_encode($output);
    }

    public function suratsakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =['transaksi'];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $cek=$this->db->query("select * from surat_sakit where id_transaksi='$input->transaksi'")->getNumRows();
        if ($cek > 0) {
            if ($this->evalParam($input, $listParam)) {                   
                $query="
                update surat_sakit set
                alasan='$input->alasan',
                hari='$input->hari',
                tgl_mulai='$input->tgl_mulai',
                tgl_akhir='$input->tgl_akhir',
                diagnosa='$input->diagnosa',
                keterangan='$input->keterangan',
                tgl_surat='$input->tgl_surat',
                dokter='$input->dokter',
                ttddokter='$input->ttddokter',
                norm='$input->norm',
                id_user='$input->id_user'
                where id_transaksi= '$input->transaksi'";

                if ($this->db->query($query)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Menyimpan";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = $query;
                }
            }
        } else {
            if ($this->evalParam($input, $listParam)) {
                $nomorsuket=$this->db->query("select counter from counter_suket where id_suket=5 and tahun=".date('Y')." ");
                if ($nomorsuket->getNumRows()>0) {
                    $nomor=$nomorsuket->getRow()->counter + 1; 
                    $this->db->query("update counter_suket set counter=".$nomor.",tahun=".date('Y')." where id_suket=5"); 
                } else {
                    $this->db->query("update counter_suket set counter=1,tahun=".date('Y')." where id_suket=5"); 
                    $nomor=1;
                }

                $query="
                INSERT INTO surat_sakit(
                    nomor,
                    alasan,
                    hari,
                    tgl_mulai,
                    tgl_akhir,
                    diagnosa,
                    keterangan,
                    tgl_surat,
                    dokter,
                    id_transaksi,
                    ttddokter,
                    norm,
                    id_user
                    )VALUES(
                    '$nomor',
                    '$input->alasan',
                    '$input->hari',
                    '$input->tgl_mulai',
                    '$input->tgl_akhir',
                    '$input->diagnosa',
                    '$input->keterangan',
                    '$input->tgl_surat',
                    '$input->dokter',
                    '$input->transaksi',
                    '$input->ttddokter',
                    '$input->norm',
                    '$input->id_user'
                )";
                        // echo"$query";
                        // exit();
                    if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
                }
            }
            echo json_encode($output);
        }
        public function suratsehat()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam =['transaksi'];
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            if ($this->evalParam($input, $listParam)) {
                $nomorsuket=$this->db->query("select counter from counter_suket where id_suket=2 and tahun=".date('Y')." ");
                if ($nomorsuket->getNumRows()>0) {
                    $nomor=$nomorsuket->getRow()->counter + 1; 
                    $this->db->query("update counter_suket set counter=".$nomor.",tahun=".date('Y')." where id_suket=2"); 
                } else {
                    $this->db->query("update counter_suket set counter=1,tahun=".date('Y')." where id_suket=2"); 
                    $nomor=1;
                }

                $query="
                INSERT INTO surat_sehat(
                    id_transaksi,
                    no_rm,
                    keperluan,
                    tekanan_darah,
                    berat_b,
                    t_badan,
                    gol_darah,
                    buta_warna,
                    id_user,
                    nomor

                    )VALUES(
                    '$input->transaksi',
                    '$input->norm',
                    '$input->keperluan',
                    '$input->tek_darah',
                    '$input->berat_badan',
                    '$input->tinggi_badan',
                    '$input->gol_darah',
                    '$input->buta_warna',
                    '$input->id_user',
                    ".$nomor."
                    )
                    ";
                    if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
                }
                echo json_encode($output);
            }
            public function suratsehatrohani()
            {
                $input = json_decode(file_get_contents('php://input'));
                $listParam =['transaksi'];
                $output = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";
                if ($this->evalParam($input, $listParam)) {
                    $nomorsuket=$this->db->query("select counter from counter_suket where id_suket=6 and tahun=".date('Y')." ");
                    if ($nomorsuket->getNumRows()>0) {
                        $nomor=$nomorsuket->getRow()->counter + 1; 
                        $this->db->query("update counter_suket set counter=".$nomor.",tahun=".date('Y')." where id_suket=6"); 
                    } else {
                        $this->db->query("update counter_suket set counter=1,tahun=".date('Y')." where id_suket=6"); 
                        $nomor=1;
                    }

                    $query="
                    INSERT INTO surat_sehat_rohani(
                     id_transaksi,
                     no_rm,
                     keperluan,
                     id_pegawai,
                     nomor,
                     jenis_pemeriksaan,
                     kesimpulan

                     )VALUES(
                     '$input->transaksi',
                     '$input->norm',
                     '$input->keperluan',
                     '$input->id_pegawai',
                     ".$nomor.",
                     '$input->pemeriksaan',
                     '$input->Kesimpulan'
                     )
                     ";
                     if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
                }
                echo json_encode($output);
            }

    //update 6/2/2024
            public function suratkelahiran()
            {
                $input = json_decode(file_get_contents('php://input'));
                $listParam =['transaksi'];
                $output = array();
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $cek=$this->db->query("select * from surat_kelahiran where no_rm='$input->norm'")->getNumRows();
                if ($cek > 0) {
                    if ($this->evalParam($input, $listParam)) {
                       $nomorsuket=$this->db->query("select counter from counter_suket where id_suket=1 and tahun=".date('Y')." ");
                       if ($nomorsuket->getNumRows()>0) {
                        $nomor=$nomorsuket->getRow()->counter + 1; 
                        $this->db->query("update counter_suket set counter=".$nomor.",tahun=".date('Y')." where id_suket=1"); 
                    } else {
                        $this->db->query("update counter_suket set counter=1,tahun=".date('Y')." where id_suket=1"); 
                        $nomor=1;
                    }

                    $query="
                    update surat_kelahiran set
                    no_rm           ='$input->norm',
                    panjang         ='$input->pb',
                    berat           ='$input->bb',
                    tgl_lahir       ='$input->tgl_lahir',
                    rmibu           ='$input->rmibu',
                    namaayah        ='$input->ayah',
                    nikayah         ='$input->ktpayah',
                    tgllahirayah      ='$input->tgllahirayah',
                    agamaayah         ='$input->agamaayah',
                    jeniskelaminbayi  ='$input->jenislahir',
                    jumlahdilahirkan  ='$input->jumlahkelahiran',
                    urutanak          ='$input->urutanak',
                    jeniskelahiranbayi='$input->jenislahir',
                    nomor             =".$nomor.",
                    a                 ='$input->a',
                    g                 ='$input->g',
                    p                 ='$input->p',
                    vaksin_hepatitis  ='$input->vaksinhepatitis',
                    vitk              ='$input->vitk',
                    imd               ='$input->imd',
                    dr_obg            ='$input->dr_obg',
                    dr_anak           ='$input->dr_anak',
                    perawat           ='$input->perawat',
                    keterangan        ='$input->ket',
                    ttd               ='$input->ttd'
                    where no_rm= '$input->norm'
                    ";
                    if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
                }
            } else {
                if ($this->evalParam($input, $listParam)) {
                    $nomorsuket=$this->db->query("select counter from counter_suket where id_suket=1 and tahun=".date('Y')." ");
                    if ($nomorsuket->getNumRows()>0) {
                      $nomor=$nomorsuket->getRow()->counter + 1; 
                      $this->db->query("update counter_suket set counter=".$nomor.",tahun=".date('Y')." where id_suket=1"); 
                  } else {
                      $this->db->query("update counter_suket set counter=1,tahun=".date('Y')." where id_suket=1"); 
                      $nomor=1;
                  }
                  $query="
                  INSERT INTO surat_kelahiran(
                    id_transaksi,
                    no_rm,
                    panjang,
                    berat,
                    tgl_lahir,
                    id_user,
                    rmibu,        
                    namaayah,
                    nikayah,
                    tgllahirayah,
                    agamaayah,
                    jeniskelaminbayi,
                    jumlahdilahirkan,
                    urutanak,
                    jeniskelahiranbayi,
                    nomor,
                    a,
                    g,
                    p,
                    vaksin_hepatitis,
                    vitk,
                    imd,
                    dr_obg,
                    dr_anak,
                    perawat,
                    keterangan,
                    ttd
                    )VALUES(
                    '$input->transaksi',
                    '$input->norm',
                    '$input->pb',
                    '$input->bb',
                    '$input->tgl_lahir',
                    '$input->id_user',
                    '$input->rmibu',
                    '$input->ayah',
                    '$input->ktpayah',
                    '$input->tgllahirayah',
                    '$input->agamaayah',
                    '$input->gender',
                    '$input->jumlahkelahiran',
                    '$input->urutanak',
                    '$input->jenislahir',
                    ".$nomor.",
                    '$input->a',
                    '$input->g',
                    '$input->p',
                    '$input->vaksinhepatitis',
                    '$input->vitk',
                    '$input->imd',
                    '$input->dr_obg',
                    '$input->dr_anak',
                    '$input->perawat',
                    '$input->ket',
                    '$input->ttd'
                    )
                    ";
                    if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
                }
            }
            echo json_encode($output);
        }

        public function suratkematian()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam =['transaksi'];
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $cek=$this->db->query("select * from surat_kematian where no_rm='$input->norm'")->getNumRows();
            if ($cek > 0) {
                if ($this->evalParam($input, $listParam)) {
                    $query="
                    update surat_kematian set
                    no_rm='$input->norm',
                    nama='$input->nama',
                    umur='$input->umur',
                    alamat='$input->alamat',
                    waktu_kematian='$input->time',
                    penyebab='$input->sebab',
                    riwayat_penyakit='$input->riwayatpenyakit' where no_rm= '$input->norm'
                    ";
                    if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
                }
            } else {
                if ($this->evalParam($input, $listParam)) {
                    $nomorsuket=$this->db->query("select counter from counter_suket where id_suket=3 and tahun=".date('Y')." ");
                    if ($nomorsuket->getNumRows()>0) {
                      $nomor=$nomorsuket->getRow()->counter + 1; 
                      $this->db->query("update counter_suket set counter=".$nomor.",tahun=".date('Y')." where id_suket=3"); 
                  } else {
                      $this->db->query("update counter_suket set counter=1,tahun=".date('Y')." where id_suket=3"); 
                      $nomor=1;
                  }
                  $query="
                  INSERT INTO surat_kematian(
                    no_rm,
                    nama,
                    umur,
                    alamat,
                    waktu_kematian,
                    penyebab,
                    id_user,
                    aktif,
                    id_transaksi,
                    nomor,
                    riwayat_penyakit
                    )VALUES(
                    '$input->norm',
                    '$input->nama',
                    '$input->umur',
                    '$input->alamat',
                    '$input->time',
                    '$input->sebab',
                    '$input->id_user',
                    true,
                    '$input->transaksi',
                    ".$nomor.",
                    '$input->riwayatpenyakit'
                    )
                    ";
                    if ($this->db->query($query)) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Menyimpan";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $query;
                    }
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
        //$id_transaksi=$input->id_transaksi;
                $query = "SELECT * FROM assesmen_keperawatan_umum ass INNER JOIN (select * from tanda_vital where aktif=true ) td on td.id_kunjungan=ass.id_kunjungan where ass.id_kunjungan ='$id' AND ass.aktif='t'  limit 1 ";
                /*        $queryall="SELECT * FROM assesmen_keperawatan_umum ass INNER JOIN (select * from tanda_vital where aktif=true ) td on td.id_kunjungan=ass.id_kunjungan where ass.id_kunjungan  in ( SELECT id_kunjungan FROM kunjungan WHERE id_transaksi='$id_transaksi') AND ass.aktif='t'  limit 1";*/

                if ($this->db->simpleQuery($query)) { 
                    $queryx = $this->db->query($query)->getResult();                
                    if (!empty($queryx)) { 
                        $output['status']   = "sukses";
                        $output['code']     = "00";
                        $output['pesan']    = "Data ditemukan";
                        $output['data']     = $queryx;

                    } else { 
                        $output['status']   = "sukses";
                        $output['code']     = "XX";
                        $output['pesan']    = "Data tidak ditemukan";                                
                    }

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
                $id_transaksi= $input->id_transaksi;
                $query = "SELECT * FROM
                assesmen_medis_umum a 
                INNER JOIN tanda_vital t on a.id_kunjungan=t.id_kunjungan where a.id_kunjungan ='$id'  and t.aktif='t' and a.aktif='t'  LIMIT 1";
                $queryall="SELECT * FROM
                assesmen_medis_umum a 
                INNER JOIN tanda_vital t on a.id_kunjungan=t.id_kunjungan where a.id_kunjungan in (select id_kunjungan from kunjungan where id_transaksi='$id_transaksi' )  and t.aktif='t' and a.aktif='t'  LIMIT 1";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $queryz = $this->db->query($queryall)->getResult();                
                    if (!empty($queryall)) { //JIKA TIDAK KOSONG
                        $output['status']   = "sukses";
                        $output['code']     = "01";
                        $output['pesan']    = "Data ditemukan";
                        $output['data']     = $queryz;
                    } else { // JIKA KOSONG
                        $output['status']   = "sukses";
                        $output['code']     = "XX";
                        $output['pesan']    = "Data tidak ditemukan";
                        $output['data']     = "";                    
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

    public function dataassesmengiziirna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =['id_kunjungan'];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
         $query=" select * from assesmen_gizi where id_kunjungan='$input->id_kunjungan' ";
         if ($this->db->query($query)) {
            $output['status']   = "sukses";
            $output['data']    = $this->db->query($query)->getRow();
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = $query;
        }
    }
    echo json_encode($output);
}

public function ceksuratsehat()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['transaksi'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
     $query=" select * from surat_sehat inner join users using(id_user)
     where id_transaksi='$input->transaksi' ";
     if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['data']    = $this->db->query($query)->getRow();
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = $query;
    }
}
echo json_encode($output);
}

public function viewAsuhanperoperatif2()
{
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $datas = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $query1="SELECT * from ttddokanestesi WHERE id_kunjungan='$input' and aktif=true;";
    $query2="SELECT * from keadaan4 WHERE id_kunjungan='$input' and aktif=true;";
    $query3="SELECT * from docpasca WHERE id_kunjungan='$input' and aktif=true;";
    $query4="SELECT * from pascaoperasi WHERE id_kunjungan='$input' and aktif=true;";
    $query5="SELECT * from pindahpas WHERE id_kunjungan='$input' and aktif=true;";
    for($i=1;$i<=5;$i++){
        array_push($datas,$this->db->query(${"query$i"})->getResult());
    }
    if (!empty($this->db->query($query1)->getRow())) {
        $output['status']   = "sukses";
        $output['pesan']    = "Sukses";
        $output['data']    = $datas;
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "Data PascaOperasi Belum di isi";
    }
    echo json_encode($output);
}

public function viewAsuhanperoperatif1()
{
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $datas = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $query1="SELECT * FROM praoperasi WHERE id_kunjungan='$input' and aktif=true;";
    $query2="SELECT * FROM docintra WHERE id_kunjungan='$input' and aktif=true;";
    $query3="SELECT * FROM keadaan3 WHERE id_kunjungan='$input' and aktif=true;";
    $query4="SELECT * FROM intraoperasi WHERE id_kunjungan='$input' and aktif=true;";
    $query5="SELECT * FROM ttdperawat WHERE id_kunjungan='$input' and aktif=true;";
    $query6="SELECT * FROM keadaan2 WHERE id_kunjungan='$input' and aktif=true;";
    $query7="SELECT * FROM keadaan1 WHERE id_kunjungan='$input' and aktif=true;";
    $query8="SELECT * FROM statuspas WHERE id_kunjungan='$input' and aktif=true;";
    for($i=1;$i<=8;$i++){
        array_push($datas,$this->db->query(${"query$i"})->getResult());
    }
                        // var_dump($query);return;
    if (!empty($this->db->query($query1)->getRow())) {
        $output['status']   = "sukses";
        $output['pesan']    = "Sukses";
        $output['data']    = $datas;
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $query="SELECT * from postoperasi WHERE id_kunjungan='$input' and aktif=true";
        if (!empty($this->db->query($query)->getRow())) {
            $output['status']   = "sukses";
            $output['pesan']    = "Sukses";
            $output['data']    = $this->db->query($query)->getResult();
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Data Post Operasi Belum di isi";
        }
        echo json_encode($output);
    }
}

public function ceksuratsakit()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam =['transaksi'];
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    if ($this->evalParam($input, $listParam)) {
     $query=" select * from surat_sakit inner join users using(id_user)
     where id_transaksi='$input->transaksi' ";
     if ($this->db->query($query)) {
        $output['status']   = "sukses";
        $output['data']    = $this->db->query($query)->getRow();
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = $query;
    }
}
echo json_encode($output);
}

public function viewPostoperasi()
{
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $datas = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";
    $query="SELECT * from postoperasi WHERE id_kunjungan='$input' and aktif=true;";
    if (!empty($this->db->query($query)->getRow())) {
        $output['status']   = "sukses";
        $output['pesan']    = "Sukses";
        $output['data']    = $this->db->query($query)->getResult();
    } else {
        $output['status']   = "gagal";
        $output['pesan']    = "Data Post Operasi Belum di isi";
    }
    echo json_encode($output);
}

public function viewEdukasiPasien()
{
    return view('view/modal/rm_irna/EdukasiPasien');
}

public function viewAssesmenGizi()
{
    return view('view/modal/rm_irna/AssGizi');
}

public function viewInfAnastesiAdesi()
{
    return view('view/modal/rm_irna/InfAnastesiAdesi');
}

public function viewAsspreAnastesi()
{
    return view('view/modal/rm_irna/AssesmenpreAnestesi1');
}

public function hapus_detailedukasiirnautama()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'id_transaksi', 'id_edukasi' ];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $id_edukasi     = $input->id_edukasi;
        $id_transaksi   = $input->id_transaksi;
        $no_rm          = $input->norm;

        $query = "DELETE FROM detail_edukasi WHERE id_edukasi = '$id_edukasi' and id_transaksi = '$id_transaksi' and norm = '$no_rm' ";

        if ($this->db->simpleQuery($query)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Hapus";
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal di Hapus";
        }

    }

    $this->hasil($output);
}

public function searchPasienbynorm()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'norm' ];
    if ($this->evalParam($input, $listParam)) {


     $output = array();
     $output['status']   = "gagal";
     $output['pesan']    = "";
     $norm       = $input->norm;
     $query = "SELECT * from pasien where no_rm='$norm'";

     if ($this->db->simpleQuery($query)) { 
        $queryx = $this->db->query($query)->getResult();                
        if (!empty($queryx)) { 
            $output['status']   = "sukses";
            $output['code']     = "00";
            $output['pesan']    = "Data ditemukan";
            $output['data']     = $queryx;
        } else { 
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

public function viewRencanaPemulanganPasien()
{
    return view('view/modal/rm_irna/Rencanapulang');
}
public function unit()
{
    $unit =  $this->db->query("SELECT * FROM unit where left(kd_unit,1)='2' ");
    $output['status']   = 'sukses';
    $output['pesan']    = '';
    $output['data']     = $unit->getResult();
    echo json_encode($output);
}

public function loadinformasisedasi()
{
    $input      = json_decode(file_get_contents('php://input'));
    $listParam  = ['id_kunjungan'];
    $output     = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    $idtrans        = $input->id_transaksi;
    $norm           = $input->norm;
    $id_kunjungan   = $input->id_kunjungan;

    $data = $this->db->query("SELECT * FROM informasi_anestesi_sedasi WHERE id_kunjungan = '$id_kunjungan' AND aktif = true ");

    if ($data->getNumRows() > 0){
        $output['status']   = "sukses";
        $output['pesan']    = 'Informasi Anestesi Sedasi Ditemukan';
        $output['data']     = $data->getResult();
    }else{
        $output['status']   = "sukses";
        $output['pesan']    = '';
        $output['data']     = 0;
    }

    $this->hasil($output);
}

public function viewPemberianInfusIrna()
{
    return view('view/modal/rm_irna/PemberianInfus');
}
public function viewGrowthChart()
{
    return view('view/modal/rm_irna/GrowthChart');
}
public function growthchart()
{
    $input = json_decode(file_get_contents('php://input'));
    $data  = $this->db->query("SELECT * FROM growth_chart where no_rm ='$input->no_rm' ");

    if ($data->getNumRows() > 0){
        $output['status']   = "sukses";
        $output['pesan']    = 'growth chart Ditemukan';
        $output['data']     = $data->getResult();
    }else{
        $output['status']   = "gagal";
        $output['pesan']    = '';
        $output['data']     = 0;
    }

    $this->hasil($output);
}
public function detailtransaksipulang()
{
    $input = json_decode(file_get_contents('php://input'));
    $data =  $this->db->query("SELECT * FROM transaksi join pasien using(no_rm) 
        join kunjungan using(id_transaksi)
        where id_transaksi='$input->id_transaksi' order by id_kunjungan asc limit 1 ");
    $output['status'] = 'sukses';
    $output['code']     = 200;
    $output['data'] = $data->getResult();

    echo json_encode($output);
}

public function viewPersetujuanTind()
{
    return view('view/modal/rm_irna/PersetujuanTind');
}

public function loadPersetujTind()
{
    $input      = json_decode(file_get_contents('php://input'));
    $listParam  = ['id_kunjungan'];
    $output     = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";

    $idtrans        = $input->id_transaksi;
    $norm           = $input->norm;
    $id_kunjungan   = $input->id_kunjungan;

    $data = $this->db->query("SELECT * FROM persetujuan_tindakan WHERE id_kunjungan = '$id_kunjungan' AND aktif = true ");

    if ($data->getNumRows() > 0){
        $output['status']   = "sukses";
        $output['pesan']    = 'Persetujuan Tindakan Ditemukan';
        $output['data']     = $data->getResult();
    }else{
        $output['status']   = "sukses";
        $output['pesan']    = '';
        $output['data']     = 0;
    }

    $this->hasil($output);
}
public function searchdataPasien()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'norm' ];
    if ($this->evalParam($input, $listParam)) {
     $output = array();
     $output['status']   = "gagal";
     $output['pesan']    = "";
     $norm       = $input->norm;
     $nmapasien  = $input->nmpasien;
     $idtransaksi = $input->id_transaksi;
     $query = "SELECT ROW_NUMBER () OVER ( ORDER BY k.id_kunjungan desc ) as no, tr.id_transaksi,k.id_kunjungan, DATE(tr.tgl_transaksi) as tgl_transaksi, k.id_unit, u.nama_unit, tr.no_rm, UPPER(P.nama) as nama, UPPER(P.alamat) as alamat, P.telepon, penj.nama_penjamin, k.id_pegawai,nama_pegawai,hubungan_penanggung_jawab,tgl_keluar,nama_keluarga,k.id_kamar,pengantar_rawat_inap.keluhan,pengantar_rawat_inap.diagnosa as diagnosapengantar
     FROM transaksi tr 
     INNER JOIN pasien P ON tr.no_rm = P.no_rm 
     INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi 
     INNER JOIN unit u ON u.id_unit = k.id_unit 
     INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi 
     INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin 
     JOIN pegawai on k.id_pegawai = pegawai.id_pegawai 
     LEFT JOIN pengantar_rawat_inap on pengantar_rawat_inap.id_transaksi=tr.id_transaksi
     WHERE tr.id_transaksi='$idtransaksi'
     and id_kamar is not null and k.id_unit<>'8001'
     order by id_kunjungan desc limit 1";

     if ($this->db->simpleQuery($query)) { 
        $queryx = $this->db->query($query)->getResult();                
        if (!empty($queryx)) { 
            $output['status']   = "sukses";
            $output['code']     = "00";
            $output['pesan']    = "Data ditemukan";
            $output['data']     = $queryx;
        } else { 
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

public function viewPemberianObat()
{
    return view('view/modal/rm_irna/ListObat');
}

public function jenisanastesi()
{
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $output['status']   = "gagal";
    $output['pesan']    = "";   

    $query = "SELECT * FROM jenis_anastesi";

    $anastesi = $this->db->query($query)->getResult();
    $output['status']   = 'sukses';
    $output['data']     = $anastesi;     

    echo json_encode($output);
}

public function pencarian_pasienRIOK()
{
    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'norm' ];

    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $norm       = $input->norm;
        $pegawai    = $input->pegawai;

        $query = "
        SELECT
        tr.id_transaksi,k.id_kunjungan,
        DATE(tr.tgl_transaksi) as tgl_transaksi,
        k.id_unit,
        u.nama_unit,
        tr.no_rm,
        UPPER(P.nama) as nama,
        UPPER(P.alamat) as alamat,
        P.telepon,
        pt.no_sjp,
        penj.nama_penjamin,km.nama_kamar,
        age(P.tgl_lahir) :: varchar,
        EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,x.id_kunjungan as soap,k.id_pegawai, jam_masuk
        FROM
        transaksi tr
        INNER JOIN pasien P ON tr.no_rm = P.no_rm
        INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
        INNER JOIN unit u ON u.id_unit = k.id_unit
        inner join kamar km on km.id_kamar=k.id_kamar
        INNER JOIN (select * FROM penjamin_transaksi WHERE penjamin_utama=true) pt ON pt.id_transaksi = tr.id_transaksi
        INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
        LEFT JOIN (select * FROM soap_pasien ORDER BY id DESC LIMIT 1)x on x.id_kunjungan=k.id_kunjungan
        WHERE
                    LEFT (k.id_unit, 1) in ('8')   -->> OK
                    AND tr.no_rm like UPPER('".$norm."%')
                        AND k.tgl_masuk = '$input->tgl'";


            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
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

    public function viewListPasien()
    {
        return view('view/modal/rm_irna/listpasien');
    }

    public function getUnitRI()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        if ($input->view == ''){
            $unit = "'1'";
        }else{
            $unit = "'3','2','8'";
        }
        
        $query = "SELECT * FROM unit WHERE LEFT (kd_unit, 1) in ($unit)";
        $unit= $this->db->query($query)->getResult();
        $output['status']   = 'sukses';
        $output['data']     = $unit;
        echo json_encode($output);        
    }

    public function showDataRencanaPembedahan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['no_rm'];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $idrencana = $input->idrencana;

        if ($this->evalParam($input, $listParam)) {

            if ($idrencana != ''){
                $querry = $this->db->query("SELECT * FROM rencana_pembedahan WHERE id_rencana_pembedahan = '$idrencana'");
            }else{
                $querry = $this->db->query("SELECT * FROM rencana_pembedahan INNER JOIN pasien USING (no_rm) WHERE id_kunjungan = '$input->id_kunjungan'");
            }
            
            if (!empty($querry->getResult())) {
                $output['status']   = "sukses";
                $output['pesan']    = 'Berhasil';
                $output['data']     = $querry->getResult();
            } else {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = "";
            }
        }
        $this->hasil($output);
    }

}