<?php
namespace App\Controllers;

use CodeIgniter\Files\File;

class Setup extends Api{

    public function getListUnit() {
        $output = array();
        $query = "
        SELECT
                *,
        CASE
        WHEN aktif
        THEN 'Aktif' 
        ELSE 'Tidak Aktif' 
        END status
        FROM
        unit
        JOIN jenis_unit USING ( jenis_unit )
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getJenisUnit() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        jenis_unit WHERE jenis_unit in ('1', '2')
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getJenisListUnit() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        jenis_unit
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListMappingSigna() {
        $output = array();
        $query = "
        SELECT
                *,
        CASE
        WHEN aktif = true THEN 'Aktif' ELSE 'Tidak Aktif' 
        END status
        FROM mapping_signa ORDER BY id_signa ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function mappingsigna_addeditSigna() {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'proses', 'id_signa', 'signa' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses   = $input->proses;
            $id_signa = $input->id_signa;
            $signa    = $input->signa;
            $id_user  = $input->user;
            
            $this->db->transStart();
            if ($proses == true){
                $update = "UPDATE mapping_signa SET signa   = '$signa' WHERE id_signa = '$id_signa'";
                $this->db->query($update);
                $id_signaX = $id_signa;
            }else if ($proses == false){

                // $cek_id_signa  = $this->db->query("SELECT (max(id_signa::INTEGER)) as id_signa FROM mapping_signa")->getRow()->id_signa;
                // $id_signax = $cek_id_signa + 1;
                if ($signa == ''){
                    $id_signaX  = '';
                }else{
                    $cek_signa = "SELECT * FROM mapping_signa WHERE signa ilike '%$signa%' limit 1";

                    if ($this->db->query($cek_signa)->getNumRows() > 0){
                        $id_signaX  = $this->db->query($cek_signa)->getRow()->id_signa;
                    }else{
                        $insert     = "INSERT INTO mapping_signa (signa, id_user) VALUES ('$signa', '$id_user') returning id_signa";
                        $id_signa   = $this->db->query($insert)->getRow()->id_signa;
                        $id_signaX  = $id_signa;
                    }
                }
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['id_signa']     = $id_signaX;
                $output['pesan']        = "Simpan Signa Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan Signa";
            }

        }
        $this->hasil($output);
    }

    public function getJenisProduk() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        jenis_produk ORDER BY id_parent ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListproduk() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        produk
        JOIN jenis_produk USING ( id_jenis_produk ) ORDER BY id_produk DESC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function produk_addeditProduk() {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'proses', 'id_produk', 'kd_produk', 'jenis_produk', 'produk'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses         = $input->proses;
            $id_produk      = $input->id_produk;
            $kd_produk      = $input->kd_produk;
            $jenis_produk   = $input->jenis_produk;
            $produk         = $input->produk;
            
            $this->db->transStart();
            if ($proses == true){
                $update = " UPDATE produk SET 
                kd_produk = '$kd_produk', 
                id_jenis_produk = '$jenis_produk', 
                nama_produk = '$produk' 
                WHERE id_produk = '$id_produk'";
                $this->db->query($update);
            }else if ($proses == false){
                $insert = "INSERT INTO produk (id_produk, kd_produk, id_jenis_produk, nama_produk) VALUES ('$id_produk','$kd_produk','$jenis_produk','$produk')";
                $this->db->query($insert);
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function getJenisPenjamin() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        penjamin ORDER BY id_penjamin ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getProduk() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        produk ORDER BY nama_produk ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function getProdukLab(){
      $output = array();
      $query = "
      SELECT
                *
      FROM
      produk 
      WHERE produk.kd_produk ilike 'LB%'
      ORDER BY nama_produk ASC
      ";
      $hasilQuery =  $this->db->query($query);
      $output['status'] = "sukses";
      $output['pesan'] = "";
      $output['data'] = $hasilQuery->getResult();
      $this->hasil($output);
  }

  public function getUnitInap() {
    $output = array();
    $query = "SELECT
                        *
    FROM
    unit where jenis_unit='2'
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}
public function getRuang() {
    $output = array();
    $query = "SELECT
                        *
    FROM
    ruang_inap
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getKamar() {
    $output = array();
    $query = "SELECT
                        *
    FROM
    kamar order by nama_kamar asc
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getKamarpilih() {
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $query = "SELECT
                        *
    FROM
    kamar 
    where id_unit='$input->id_unit'
    and id_ruang='$input->id_ruang'
    AND kamar.id_kamar NOT IN (
        SELECT
        kamar.id_kamar
        FROM
        kamar
        JOIN unit USING ( id_unit )
        join sps_ruang on (sps_ruang.id_ruang)::INTEGER=kamar.id_ruang
        JOIN ruang_inap on ruang_inap.id_ruang=kamar.id_ruang
        JOIN spesialisasi_kamar using(id_spesialisasi_kamar)
        where
        spesialisasi_kamar.id_spesialisasi_kamar = '$input->id_spesialisasi_kamar'
        and kamar.id_unit = '$input->id_unit'
        ) 
    order by nama_kamar asc
    ";
        // echo"$query";
        // exit();            
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}
public function getRuangpilih() {
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $query = "SELECT
        * 
    FROM
    ruang_inap 
    WHERE
    id_ruang NOT IN ( SELECT id_ruang FROM sps_ruang JOIN ruang_inap USING ( id_ruang )
        JOIN unit USING ( id_unit ) JOIN spesialisasi_kamar USING ( id_spesialisasi_kamar ) 
        where sps_ruang.id_unit='$input->id_unit' and sps_ruang.id_spesialisasi_kamar='$input->id_spesialisasi_kamar'
        )
    ";
        // echo"$query";
        // exit();            
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getListTarifProduk() {
    $output = array();
    $query = "
    SELECT
                *
    FROM
    tarif
    JOIN produk USING ( id_produk ) 
    JOIN penjamin USING (id_penjamin)
    LEFT JOIN UNIT using(id_unit)
    ORDER BY nama_produk DESC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function tarifproduk_addeditTarifProduk() {

    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'proses', 'id_tarif', 'id_produk', 'id_penjamin', 'harga'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $proses        = $input->proses;
        $id_tarif      = $input->id_tarif;
        $id_produk     = $input->id_produk;
        $id_penjamin   = $input->id_penjamin;
        $harga         = $input->harga;
        $id_unit       = $input->id_unit;
        $this->db->transStart();
        if ($proses == true){
            if($input->tgl_selesai == ''){
                if ($id_unit == 'F-0'){
                    $update = " UPDATE tarif SET 
                    id_produk   = '$id_produk',
                    id_penjamin = '$id_penjamin',
                    harga       = '$harga',
                    tgl_berlaku = '$input->berlaku'
                    WHERE id_tarif = '$input->id_tarif'";
                }else{
                    $update = " UPDATE tarif SET 
                    id_produk   = '$id_produk', 
                    id_penjamin = '$id_penjamin', 
                    harga       = '$harga',
                    tgl_berlaku = '$input->berlaku',
                    tgl_selesai = null,
                    id_unit     = '$id_unit'
                    WHERE id_tarif = '$input->id_tarif'";
                }
            }else{
                if ($id_unit == 'F-0'){
                    $update = " UPDATE tarif SET 
                    id_produk   = '$id_produk', 
                    id_penjamin = '$id_penjamin', 
                    harga       = '$harga',
                    tgl_berlaku = '$input->berlaku',
                    tgl_selesai = '$input->tgl_selesai'
                    WHERE id_tarif = '$input->id_tarif'";
                }else{
                    $update = " UPDATE tarif SET 
                    id_produk   = '$id_produk', 
                    id_penjamin = '$id_penjamin', 
                    harga       = '$harga',
                    tgl_berlaku = '$input->berlaku',
                    tgl_selesai = '$input->tgl_selesai',
                    id_unit     = '$id_unit'
                    WHERE id_tarif = '$input->id_tarif'"; 
                }
            }
                // echo"$update";
                // exit();
            $this->db->query($update);
        }else if ($proses == false){                
            if ($id_unit == 'F-0'){
                $insert = "INSERT INTO tarif (id_produk, id_penjamin, harga, tgl_berlaku) VALUES ('$id_produk','$id_penjamin','$harga','$input->berlaku')";    
            }else{
                $insert = "INSERT INTO tarif (id_produk, id_penjamin, harga,tgl_berlaku,id_unit) VALUES ('$id_produk','$id_penjamin','$harga','$input->berlaku','$id_unit')";
            }                
            $this->db->query($insert);
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Error, Hub. Admin";
            $this->hasil($output);
            return;
        }

        $this->db->transComplete();
        if ($this->db->transStatus()) {

            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Simpan Berhasil";
        }else{
            $this->db->transRollback();
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan";
        }

    }
    $this->hasil($output);
}

public function getUnit() {
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $idfar  = $input->idfar;

    if (($idfar == '4001')||($idfar == '4003')){
        $kondisi = "WHERE id_unit not in ('4002') and jenis_unit not in (2)";
    }else if ($idfar == '4002'){
        $kondisi = "WHERE id_unit not in ('4001', '4003') and jenis_unit not in (1)";
    }else{
        $kondisi = "";
    }
    $query = "
    SELECT
                *
    FROM
    unit 
    $kondisi
    ORDER BY jenis_unit ASC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}
public function unitsps()
{
  $input = json_decode(file_get_contents('php://input'));
  $unit =  $this->db->query(" SELECT DISTINCT kd_unit,nama_unit FROM unit inner join spc_kamar using(kd_unit) 
   WHERE
   kd_spesial = '$input->id' order by nama_unit asc ");

  $output['status'] = 'sukses';
  $output['data'] = $unit->getResult();

  echo json_encode($output);
}
public function ruangsps()
{
  $input = json_decode(file_get_contents('php://input'));
  $ruang =  $this->db->query(" SELECT
   kd_unit,no_kamar,nama_kamar
   FROM
   kamar where kd_unit= '$input->id' and jumlah_bed > 0
   order by nama_kamar asc  ");

  $output['status'] = 'sukses';
  $output['data'] = $ruang->getResult();

  echo json_encode($output);
}
public function getSpesialisasi() {
    $output = array();
    $query = "SELECT * from spesialisasi order by spesialisasi asc";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getSpesilisasiKamar() {
    $output = array();
    //     $query = "SELECT
    //     -- kamar.id_unit,
    //     -- kamar.nama_kamar,
    //     -- unit.nama_unit,
    //     -- spesialisasi_kamar.nama_spesialisasi_kamar,
    //     -- ruang_inap.nama_ruang
    //     *
    // FROM
    //     kamar
    //     JOIN unit USING ( id_unit )
    //     join sps_ruang on (sps_ruang.id_ruang)::INTEGER=kamar.id_ruang
    //     JOIN ruang_inap on ruang_inap.id_ruang=kamar.id_ruang
    //     left JOIN spesialisasi_kamar using(id_spesialisasi_kamar)
    //     ";

    $query = "SELECT
        * 
    FROM
    sps_ruang
    JOIN ruang_inap using (id_ruang)
    JOIN unit USING ( id_unit )
    JOIN spesialisasi_kamar USING(id_spesialisasi_kamar)
    order by nama_ruang asc";

    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getListProdukUnit() {
    $output = array();
    $query = "
    SELECT
                *
    FROM
    produk_unit
    JOIN unit USING ( id_unit ) 
    JOIN produk USING (id_produk)
    ORDER BY id_unit ASC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function produkunit_addeditProduk() {

    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'proses', 'id_unit', 'id_produk'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $proses     = $input->proses;
        $id_unit    = $input->id_unit;
        $id_produk  = $input->id_produk;

        $this->db->transStart();
        if ($proses == true){
                // $update = " UPDATE produk_unit SET 
                //                 id_produk   = '$id_produk'
                //             WHERE id_unit = '$id_unit'";
            $update = " DELETE from produk_unit WHERE 
            id_produk   = '$id_produk'
            and id_unit = '$id_unit'";
            $this->db->query($update);
        }else if ($proses == false){
            $insert = "INSERT INTO produk_unit (id_unit, id_produk) VALUES ('$id_unit','$id_produk')";
                // echo"$insert";
                // exit();
            $this->db->query($insert);
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Error, Hub. Admin";
            $this->hasil($output);
            return;
        }

        $this->db->transComplete();
        if ($this->db->transStatus()) {

            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Simpan Berhasil";
        }else{
            $this->db->transRollback();
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan";
        }

    }
    $this->hasil($output);
}
public function spesialisasi_addeditSpesialisasi() {

    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'proses', 'id_spesialisasi_kamar', 'id_ruang', 'id_unit'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $proses     = $input->proses;
        $id_spesialisasi_kamar    = $input->id_spesialisasi_kamar;
            // echo" $id_spesialisasi_kamar";
            // exit();
        $id_unit  = $input->id_unit;
        $id_ruang  = $input->id_ruang;

        $this->db->transStart();
        if ($proses == true){
                //delete sps_unit
            $delete_spsruang = "DELETE FROM sps_ruang WHERE id_unit = '$id_unit' AND id_ruang = '$id_ruang' AND id_spesialisasi_kamar = '$id_spesialisasi_kamar'";
            $this->db->query($delete_spsruang);
                // delete 
                // $update = " UPDATE produk_unit SET 
                //                 id_produk   = '$id_produk'
                //             WHERE id_unit = '$id_unit'";
                // $this->db->query($update);
        }else if ($proses == false){

            $cek_spsunit = $this->db->query("SELECT * FROM sps_unit WHERE id_unit = '$id_unit' and id_spesialisasi_kamar = '$id_spesialisasi_kamar'")->getNumRows();
            if ($cek_spsunit > 0) {
                    //sudah ada tidak perlau diinsert
            }
            else{
                $insertspsunit = "INSERT INTO sps_unit (id_unit, id_spesialisasi_kamar) VALUES ('$id_unit','$id_spesialisasi_kamar')";
                $this->db->query($insertspsunit);
                    // echo"$insertspsunit";
                    // exit();
            }
            $insertspsruang = "INSERT INTO sps_ruang (id_unit, id_ruang, id_spesialisasi_kamar) VALUES ('$id_unit','$id_ruang','$id_spesialisasi_kamar')";
            $this->db->query($insertspsruang);
                // echo"$insertspsruang";
                // exit();
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Error, Hub. Admin";
            $this->hasil($output);
            return;
        }

        $this->db->transComplete();
        if ($this->db->transStatus()) {

            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Berhasil";
        }else{
            $this->db->transRollback();
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan coba lagi";
        }

    }
    $this->hasil($output);
}

public function getJenisObat() {
    $output = array();
    $query = "
    SELECT
                *
    FROM
    far_jenis_obat ORDER BY kd_jns_obt ASC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getSubJenisObat() {
    $output = array();
    $query = "
    SELECT
                *
    FROM
    far_sub_jenis ORDER BY kd_sub_jns ASC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getListObat() {
    $output = array();
    $query = "
    SELECT
                *,
    CASE 
    WHEN sts_high_alert = 'f' THEN 'Tidak' ELSE 'Ya'
    END AS sts_high_alert_info,
    CASE 
    WHEN lasa = 'f' THEN 'Tidak' ELSE 'Ya'
    END AS lasa_info,
    CASE 
    WHEN restriksi = 'f' THEN 'Tidak' ELSE 'Ya'
    END AS restriksi_info
    FROM
    far_obat
    JOIN far_jenis_obat USING ( kd_jns_obt ) 
    JOIN far_sub_jenis USING ( kd_sub_jns )
    ORDER BY kd_obat ASC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function masterobat_addeditObat() {
    $input = json_decode(file_get_contents('php://input'));  
    $listParam = [ 'proses', 'kd_obat', 'nama_obat', 'kd_jns_obt', 'kd_sub_jns'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $proses         = $input->proses;
        $kd_obat        = $input->kd_obat;
        $nama_obat      = $input->nama_obat;
        $kd_jns_obt     = $input->kd_jns_obt;
        $kd_sub_jns     = $input->kd_sub_jns;
        $sts_high_alert = $input->sts_high_alert;
        $lasa           = $input->lasa;
        $restriksi      = $input->restriksi;
        $aktif          = $input->aktif;
        $kd_satuan      = $input->kd_satuan;
        $kd_sat_besar   = $input->kd_sat_besar;
        $fraction       = $input->fraction;
        $tipe           = $input->tipe;
        $prb            = $input->prb;
        $kronis         = $input->kronis;
        $kemo           = $input->kemo;
        $inforestriksi  = $input->inforestriksi;
        $qtymax         = $input->qtymax;
        $maxhari        = $input->maxhari;
        $retperesepan   = $input->retperesepan;

        if ($input->fraction != ''){
            $fraction       = $input->fraction;
        }else{
            $fraction       = 0;
        }
        $this->db->transStart();
        if ($proses == true){
            $update = " UPDATE far_obat SET 
            nama_obat = '$nama_obat',
            kd_jns_obt = '$kd_jns_obt',
            kd_sub_jns = '$kd_sub_jns',
            sts_high_alert = '$sts_high_alert',
            lasa  = '$lasa',
            restriksi = '$restriksi',
            aktif = '$aktif',
            kd_satuan = '$kd_satuan',
            kd_sat_besar = '$kd_sat_besar',
            fraction = '$fraction',
            tipe = '$tipe',
            prb = '$prb',
            kronis = '$kronis',
            kemo = '$kemo',
            retriksiinfo = '$inforestriksi',
            maxqty = '$qtymax',
            maxhari = '$maxhari',
            retriksiperesepan = '$retperesepan'

            WHERE kd_obat = '$kd_obat'";
            $this->db->query($update);
        }else if ($proses == false){
            $cek    = "SELECT kd_obat FROM far_obat ORDER BY kd_obat DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $x      = $row->kd_obat;
                        $real   = ((int)$x + 1);
                        $kd_obatx = $real;
                    }else{
                        $kd_obatx = 1;
                    }
                }

                $insert = "INSERT INTO far_obat (kd_obat, nama_obat, kd_jns_obt, kd_sub_jns, aktif, sts_high_alert, lasa, restriksi, kd_satuan, kd_sat_besar, fraction, tipe, prb, kronis, kemo, retriksiinfo, maxqty, maxhari, retriksiperesepan) VALUES ('$kd_obatx','$nama_obat','$kd_jns_obt','$kd_sub_jns','$aktif','$sts_high_alert','$lasa','$restriksi','$kd_satuan','$kd_sat_besar', '$fraction', '$tipe', '$prb', '$kronis', '$kemo', '$inforestriksi', '$qtymax', '$maxhari', '$retperesepan')";
                // echo $insert;
                // return;
                $this->db->query($insert);
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function masterobat_HapusObat() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'kd_obat'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $kd_obat        = $input->kd_obat;
            
            $this->db->transStart();
            $delete = " DELETE FROM far_obat WHERE kd_obat = '$kd_obat'";
            $this->db->query($delete);
            
            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus, Terdapat Tarif Obat.";
            }

        }
        $this->hasil($output);
    }
    public function getJenisComponent() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        jenis_component ORDER BY id_jenis_component ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListTarifProdukComponent() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        tarif_component
        JOIN jenis_component USING (id_jenis_component)
        JOIN tarif USING ( id_tarif )
        JOIN produk USING ( id_produk ) 
        JOIN penjamin USING (id_penjamin)
        ORDER BY id_tarif DESC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function tarifprodukcomponent_addedit() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'proses', 'id_tarif', 'idjeniscomponent', 'idjeniscomponentparent', 'operator', 'jumlah'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses             = $input->proses;
            $id_tarif           = $input->id_tarif;
            $id_jenis_component = $input->idjeniscomponent;
            
            $operator                   = $input->operator;

            if ($input->idjeniscomponentparent == '0'){
                $q1 = 1;
            }else{
                $id_jenis_component_parent  = $input->idjeniscomponentparent;
                $q1 = 0;
            }

            $jumlah                     = $input->jumlah;
            
            $this->db->transStart();
            if ($proses == true){
                $delete = " DELETE FROM  tarif_component 
                WHERE id_tarif = '$id_tarif' and id_jenis_component = '$id_jenis_component'";
                $this->db->query($delete);
            }else if ($proses == false){
                if ($q1 == 0){
                    $insert = "INSERT INTO tarif_component (id_tarif, id_jenis_component, id_jenis_component_parent, operator, jumlah) VALUES ('$id_tarif','$id_jenis_component','$id_jenis_component_parent','$operator','$jumlah')";
                }else{
                    $insert = "INSERT INTO tarif_component (id_tarif, id_jenis_component, id_jenis_component_parent, operator, jumlah) VALUES ('$id_tarif','$id_jenis_component',null,'$operator','$jumlah')";
                }
                
                $this->db->query($insert);
                // echo $insert;
                // return;
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function getDataObat() {
        $output = array();
        $query = "
        SELECT *
        FROM
        far_obat
        ORDER BY nama_obat ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getKepemilikianObat() {
        $output = array();
        $query = "
        SELECT *
        FROM
        far_obat_milik
        ORDER BY kd_milik ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListtarifobat() {
        $output = array();
        $query = "
        SELECT *
        FROM
        tarif_obat
        INNER JOIN far_obat USING (kd_obat)
        INNER JOIN far_obat_milik USING (kd_milik)
        ORDER BY kd_obat ASC
        ";

        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function tarifobat_addeditTarifObat() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'proses', 'id_tarif_obt', 'kd_obat', 'harga', 'kd_milik'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses       = $input->proses;
            $id_tarif_obt = $input->id_tarif_obt;
            $kd_obat      = $input->kd_obat;
            $harga        = $input->harga;
            $kd_milik     = $input->kd_milik;
            
            $this->db->transStart();
            if ($proses == true){
                $update = " UPDATE tarif_obat SET 
                kd_obat  = '$kd_obat',
                harga    = '$harga',
                kd_milik = '$kd_milik'
                WHERE id_tarif_obat = '$id_tarif_obt'";
                $this->db->query($update);
                
            }else if ($proses == false){
                $cek    = "SELECT id_tarif_obat FROM tarif_obat ORDER BY id_tarif_obat DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $x      = $row->id_tarif_obat;
                        $real   = ((int)$x + 1);
                        $id_tarif_obatnew = $real;
                    }else{
                        $id_tarif_obatnew = 1;
                    }
                }

                $insert = "INSERT INTO tarif_obat (id_tarif_obat, kd_obat, harga, kd_milik) VALUES ('$id_tarif_obatnew','$kd_obat','$harga','$kd_milik')";
                $this->db->query($insert);

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function getDokter() {
        $output = array();
        $query = " SELECT * FROM pegawai
        WHERE jenis_pegawai = '1'
        ORDER BY nama_pegawai ASC
        ";

        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getUserPegawai() {
        $output = array();
        $query = " SELECT * FROM pegawai WHERE jenis_pegawai = '5' ORDER BY nama_pegawai ASC ";
        
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    
    public function getPerawat() {
        $output = array();
        $query = " SELECT * FROM pegawai
        WHERE jenis_pegawai = '0'
        ORDER BY nama_pegawai ASC
        ";

        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getuserPerawatPegawai() {
        $output = array();
        $query  = " SELECT id_user, id_pegawai, nama_pegawai FROM users 
        INNER JOIN pegawai USING (id_pegawai)
        WHERE jenis_pegawai IN ('0','5')
        ORDER BY nama_pegawai ASC
        ";

        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListDokterKlinik() {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $id_unit  = $input->id_unit;
        if ($id_unit != ''){
            $kondisi = "AND id_unit = '$id_unit'";
        }else{
            $kondisi = "";
        }

        $query = " SELECT * FROM dokter_klinik
        INNER join unit USING (id_unit)
        INNER join pegawai USING (id_pegawai)
        WHERE jenis_pegawai = '1' $kondisi
        ORDER BY id_unit ASC
        ";

        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function dokterklinik_addedit() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'proses', 'id_unit', 'id_pegawai'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses         = $input->proses;
            $id_unit        = $input->id_unit;
            $id_pegawai     = $input->id_pegawai;
            
            $this->db->transStart();
            if ($proses == true){
                $update = " DELETE FROM dokter_klinik WHERE id_pegawai = '$id_pegawai' and id_unit = '$id_unit'";
                $this->db->query($update);
                
            }else if ($proses == false){
                $insert = "INSERT INTO dokter_klinik (id_pegawai, id_unit) VALUES ('$id_pegawai', '$id_unit')";
                $this->db->query($insert);

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function savemodFar() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'iduser', 'module_far'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $iduser         = $input->iduser;
            $module_far     = $input->module_far;
            $modulfar_milik = $input->modulfar_milik;
            
            $this->db->transStart();
            $update = " UPDATE users SET id_far = '$module_far', kepemilikan_obat = '$modulfar_milik' WHERE id_user = '$iduser'";
            $this->db->query($update);

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function vendor() {
        $output = array();
        $query = " SELECT kd_vendor, UPPER(nama) AS nama FROM far_vendor ORDER BY nama ASC";

        $hasilQuery =  $this->db->query($query);
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function importMasterobat(){
      $input = json_decode(file_get_contents('php://input')); 
      /*var_dump(count($input));*/

      if(count($input)>751){
         $output['code']         = "500";
         $output['status']       = "gagal";
         $output['pesan']        = "Data Terlalu Besar";
     }else{
         $this->db->transStart();
         for($i=0;$i<count($input)-1;++$i){
            $nama_obat = $input[$i]->nama_obat;
            $jenis_obat = $input[$i]->kd_jns_obt;
            $sub_jenis_obat = $input[$i]->kd_sub_jns;
            $high_alert = $input[$i]->sts_high_alert;
            $lasa = $input[$i]->lasa;
            $restriksi = $input[$i]->restriksi;
            $aktif = $input[$i]->aktif;
            $fraction = $input[$i]->fraction;
            $cek_kd_obat  = $this->db->query("SELECT (max(kd_obat::INTEGER)) as kode FROM far_obat")->getRow()->kode;
            if(empty($cek_kd_obat)){
               $kd_obat =1;
           }else{
               $kd_obat  = $this->db->query("SELECT (max(kd_obat::INTEGER))+1 as kode FROM far_obat")->getRow()->kode;
           }			

           $insert = "INSERT INTO far_obat (kd_obat,nama_obat,kd_jns_obt,kd_sub_jns,aktif,sts_high_alert,lasa,restriksi,fraction) VALUES (
            $kd_obat,
            '$nama_obat', '$jenis_obat', '$sub_jenis_obat', '$aktif', '$high_alert', '$lasa', '$restriksi', '$fraction')";
           $this->db->query($insert);
       }
       $this->db->transComplete();		

       if ($this->db->transStatus()) {
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $this->db->transRollback();
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    }
}		
$this->hasil($output);
}

public function importMappingSigna(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     $this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){
        $signa=$input[$i]->signa;
        $aktif=$input[$i]->aktif;
        $cek_id_signa  = $this->db->query("SELECT (max(id_signa::INTEGER)) as kode FROM mapping_signa")->getRow()->kode;
        /* */if(empty($cek_id_signa)){
           $id_signa =1;
       }else{
           $id_signa  = $this->db->query("SELECT (max(id_signa::INTEGER))+1 as kode FROM mapping_signa")->getRow()->kode;
       }			

       $insert = "INSERT INTO mapping_signa (id_signa,signa,aktif) VALUES ($id_signa,'$signa', $aktif)"; 
       $this->db->query($insert);
   }
   $this->db->transComplete();		

   if ($this->db->transStatus()) {
    $output['code']         = "200";
    $output['status']       = "sukses";
    $output['pesan']        = "Simpan Berhasil";
}else{
    $this->db->transRollback();
    $output['code']         = "500";
    $output['status']       = "gagal";
    $output['pesan']        = "Gagal Simpan";
}
}		
$this->hasil($output);
}

public function importProdukunit(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     $this->db->transStart();
     /**/ for($i=0;$i<count($input)-1;++$i){
        $id_unit = $input[$i]->id_unit;
        $id_produk = $input[$i]->id_produk;		

        $insert = "INSERT INTO produk_unit (id_unit,id_produk) VALUES ($id_unit,'$id_produk') on conflict do nothing"; 
        $this->db->query($insert); 
    }
    $this->db->transComplete();		

    if ($this->db->transStatus()) {
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $this->db->transRollback();
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    }
}		
$this->hasil($output);
}

public function importTarifobat(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     /**/ $this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){
        $kd_obat=$input[$i]->kd_obat;
        $harga=$input[$i]->harga;
        $kd_milik=$input[$i]->kd_milik;

        $cek_id_tarif_obat  = $this->db->query("SELECT (max(id_tarif_obat::INTEGER)) as kode FROM tarif_obat")->getRow()->kode;
        /* */if(empty($cek_id_tarif_obat)){
           $id_tarif_obat =1;
       }else{
           $id_tarif_obat  = $this->db->query("SELECT (max(id_tarif_obat::INTEGER))+1 as kode FROM tarif_obat")->getRow()->kode;
       }
       $insert = "INSERT INTO tarif_obat (id_tarif_obat,kd_obat,harga,kd_milik) VALUES ($id_tarif_obat,$kd_obat,$harga,$kd_milik) on conflict do nothing"; 
       $this->db->query($insert); 
   }
   $this->db->transComplete();		

   if ($this->db->transStatus()) {
    $output['code']         = "200";
    $output['status']       = "sukses";
    $output['pesan']        = "Simpan Berhasil";
}else{
    $this->db->transRollback();
    $output['code']         = "500";
    $output['status']       = "gagal";
    $output['pesan']        = "Gagal Simpan";
} 
}		
$this->hasil($output);
}

public function importMasterproduk(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     /**/ $this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){

        $kd_produk=$input[$i]->kd_produk;
        $id_jenis_produk=$input[$i]->id_jenis_produk;
        $nama_produk=$input[$i]->nama_produk;

        $cek_id_produk  = $this->db->query("SELECT (max(id_produk::INTEGER)) as kode FROM produk")->getRow()->kode;
        if(empty($cek_id_produk)){
           $id_produk =1;
       }else{
           $id_produk  = $this->db->query("SELECT (max(id_produk::INTEGER))+1 as kode FROM produk")->getRow()->kode;
       }
       $insert = "INSERT INTO produk (id_produk,kd_produk,id_jenis_produk,nama_produk) VALUES ($id_produk,'$kd_produk','$id_jenis_produk','$nama_produk')"; 
       $this->db->query($insert); 
   }
   $this->db->transComplete();		

   if ($this->db->transStatus()) {
    $output['code']         = "200";
    $output['status']       = "sukses";
    $output['pesan']        = "Simpan Berhasil";
}else{
    $this->db->transRollback();
    $output['code']         = "500";
    $output['status']       = "gagal";
    $output['pesan']        = "Gagal Simpan";
} 
}		
$this->hasil($output);
}

public function importTarifproduk(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     /**/$this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){

        $id_produk=$input[$i]->id_produk;
        $id_penjamin=$input[$i]->id_penjamin;
        $tgl_berlaku=$input[$i]->tgl_berlaku;
        $tgl_selesai=$input[$i]->tgl_selesai;
        $harga=$input[$i]->harga;

        $cek_id_tarif  = $this->db->query("SELECT (max(id_tarif::INTEGER)) as kode FROM tarif")->getRow()->kode;
        if(empty($cek_id_tarif)){
           $id_tarif =1;
       }else{
           $id_tarif  = $this->db->query("SELECT (max(id_tarif::INTEGER))+1 as kode FROM tarif")->getRow()->kode;
       }
       $insert = "INSERT INTO tarif (id_tarif,id_produk,id_penjamin,tgl_berlaku,tgl_selesai,harga) VALUES ($id_tarif,$id_produk,$id_penjamin,$tgl_berlaku,$tgl_selesai,$harga)"; 
       $this->db->query($insert); 
   }
   $this->db->transComplete();	 	

   if ($this->db->transStatus()) {
    $output['code']         = "200";
    $output['status']       = "sukses";
    $output['pesan']        = "Simpan Berhasil";
}else{
    $this->db->transRollback();
    $output['code']         = "500";
    $output['status']       = "gagal";
    $output['pesan']        = "Gagal Simpan";
} 
}		
$this->hasil($output);
}

public function importTarifprodukComponent(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     $this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){

        $id_tarif=$input[$i]->id_tarif;
        $id_jenis_component=$input[$i]->id_jenis_component;
        $id_jenis_component_parent=$input[$i]->id_jenis_component_parent;
        $operator=$input[$i]->operator;
        $jumlah=$input[$i]->jumlah;

        $insert = "INSERT INTO tarif_component (id_tarif,id_jenis_component,id_jenis_component_parent,operator,jumlah) VALUES ($id_tarif,$id_jenis_component,$id_jenis_component_parent,'$operator',$jumlah) on conflict do nothing"; 
        $this->db->query($insert); 
    }
    $this->db->transComplete();	 	

    if ($this->db->transStatus()) {
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $this->db->transRollback();
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    } 
}		
$this->hasil($output);
}

public function importDokterklinik(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     /**/$this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){

        $id_pegawai=$input[$i]->id_pegawai;
        $id_unit=$input[$i]->id_unit;

        $insert = "INSERT INTO dokter_klinik (id_pegawai,id_unit) VALUES ($id_pegawai,$id_unit) on conflict do nothing"; 
        $this->db->query($insert); 
    }
    $this->db->transComplete();	 	

    if ($this->db->transStatus()) {
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $this->db->transRollback();
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    } 
}		
$this->hasil($output);
}

public function importSpesialkamar(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     /**/$this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){				
        $id_ruang=$input[$i]->id_ruang;
        $id_unit=$input[$i]->id_unit;
        $id_spesialisasi_kamar=$input[$i]->id_spesialisasi_kamar;

        $cek_id_sps_ruang  = $this->db->query("SELECT (max(id_sps_ruang::INTEGER)) as kode FROM sps_ruang_copy1")->getRow()->kode;
        if(empty($cek_id_sps_ruang)){
           $id_sps_ruang =1;
       }else{
           $id_sps_ruang  = $this->db->query("SELECT (max(id_sps_ruang::INTEGER))+1 as kode FROM sps_ruang_copy1")->getRow()->kode;
       }

       $insert = "INSERT INTO sps_ruang_copy1 (id_sps_ruang,id_ruang,id_unit,id_spesialisasi_kamar) VALUES ($id_sps_ruang,$id_ruang,$id_unit,$id_spesialisasi_kamar) on conflict do nothing";
       $this->db->query($insert); 
   }
   $this->db->transComplete();	 	

   if ($this->db->transStatus()) {
    $output['code']         = "200";
    $output['status']       = "sukses";
    $output['pesan']        = "Simpan Berhasil";
}else{
    $this->db->transRollback();
    $output['code']         = "500";
    $output['status']       = "gagal";
    $output['pesan']        = "Gagal Simpan";
} 
}		
$this->hasil($output);
}

public function importPeriksaLab(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump(count($input));
		// var_dump($input);

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     /**/$this->db->transStart();
     for($i=0;$i<count($input)-1;++$i){

        $id=$input[$i]->id;
        $urut=$input[$i]->urut;
        $iid=$input[$i]->iid;
        $KatId=$input[$i]->KatId;
        $IdTest=$input[$i]->IdTest;
        $IdSub=$input[$i]->IdSub;
        $IdPrs=$input[$i]->IdPrs;
        $IdGrp=$input[$i]->IdGrp;
        $SeqNo=$input[$i]->SeqNo;
        $LvTest=$input[$i]->LvTest;
        $StJdl=$input[$i]->StJdl;
        $cek_order=$input[$i]->cek_order;
        $nilKritis=$input[$i]->nilKritis;
        $NmTestInd=$input[$i]->NmTestInd;
        $NmTestEng=$input[$i]->NmTestEng;
				// $NmTeshCh=$input[$i]->NmTeshCh;
        $opt=$input[$i]->opt;
        $metode=$input[$i]->metode;
        $UnitTest=$input[$i]->UnitTest;
        $InpMask=$input[$i]->InpMask;
        $StCetak=$input[$i]->StCetak;
        $JnInput=$input[$i]->JnInput;
        $desimal=$input[$i]->desimal;
        $JnHasil=$input[$i]->JnHasil;
        $NmSampel=$input[$i]->NmSampel;
        $KdMap=$input[$i]->KdMap;
        $NilDef=$input[$i]->NilDef;
        $createDate=$input[$i]->createDate;
        $UpdateDate=$input[$i]->UpdateDate;
        $createBy=$input[$i]->createBy;
        $updateBy=$input[$i]->updateBy;
        $tat=$input[$i]->tat;
        $harga=$input[$i]->harga;
        $autocomment=$input[$i]->autocomment;
        $keterangan=$input[$i]->keterangan;
        $walapNilKritis=$input[$i]->walapNilKritis;
				// $formula=$input[$i]->formula;

        $insert = "INSERT INTO item_periksa_lab (id,urut,iid,katid,idtest,idsub,idprs,idgrp,seqno,lvtest,Stjdl,cek_order,nilkritis,nmtestind,nmtesteng,opt,metode,unittest,inpmask,stcetak,jninput,desimal,jnhasil,nmsampel,kdmap,nildef,createdate,updatedate,createby,updateby,tat,harga,autocomment,keterangan,walapnilkritis,formula) 
        VALUES (
            $id,$urut,'$iid','$KatId','$IdTest','$IdSub','$IdPrs',$IdGrp,'$SeqNo',$LvTest,'$StJdl','$cek_order','$nilKritis','$NmTestInd','$NmTestEng','$opt','$metode','$UnitTest','$InpMask','$StCetak','$JnInput','$desimal','$JnHasil','$NmSampel','$KdMap','$NilDef','$createDate','$UpdateDate',null,null,$tat,$harga,'$autocomment','$keterangan','$walapNilKritis','null')"; 
        $this->db->query($insert); 
				// var_dump($insert);
    }
    $this->db->transComplete();	 	
    if ($this->db->transStatus()) {
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $this->db->transRollback();
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    } 
}		
$this->hasil($output);
}

public function importMapProdLis(){
  $input = json_decode(file_get_contents('php://input')); 
		// var_dump($input[0]->id);return;

  if(count($input)>751){
     $output['code']         = "500";
     $output['status']       = "gagal";
     $output['pesan']        = "Data Terlalu Besar";
 }else{
     $this->db->transStart();
			/*$counter=0;
			foreach ($input as $x) {
			// for($i=0;$i<count($input);$i++){
				// var_dump($input);return;1253
				if($counter<900){
					foreach ($x as $a) {$counter++;}
				}else if($counter>899 && $counter<1000){
					foreach ($x as $a) {
						// var_dump($a);return;
						$id=$a[0];
						$id_item=$a[1];
						$type=$a[2];
						$id_kelamin=$a[3];
						$ref_date=$a[4];
						$daterangemin=$a[5];
						$daterangemax=$a[6];
						$keteranganusia=$a[7];
						$valrangemin=$a[8];
						$valrangemax=$a[9];
						$valrange=$a[10];
						$keteanganval=$a[11];
						$defaultval=$a[12];
						$nil_kritis=$a[13];
						
						$insert = "INSERT INTO map_indi_lis (id,id_item,type,id_kelamin,ref_date,daterangemin,daterangemax,keteranganusia,valrangemin,valrangemax,valrange,keteanganval,defaultval,nil_kritis) 
						VALUES (
						$id,$id_item,'$type',$id_kelamin,'$ref_date',$daterangemin,$daterangemax,'$keteranganusia',$valrangemin,$valrangemax,'$valrange','$keteanganval','$defaultval','$nil_kritis')"; 
						$this->db->query($insert); 
						// var_dump($insert);
						$counter++;
					}
				}else{
					foreach ($x as $a) {$counter++;}
				}
			} */
			// var_dump($counter);
			// $insert='';
			for($i=500;$i<503;++$i){ //$i<count($input)-1;
				$id=$input[$i]->id;
				$id_item=$input[$i]->id_item;
				$type=$input[$i]->type;
				$id_kelamin=$input[$i]->id_kelamin;
				$ref_date=$input[$i]->ref_date;
				$daterangemin=$input[$i]->daterangemin;
				$daterangemax=$input[$i]->daterangemax;
				$keteranganusia=$input[$i]->keteranganusia;
				$valrangemin=$input[$i]->valrangemin;
				$valrangemax=$input[$i]->valrangemax;
				$valrange=$input[$i]->valrange;
				$keteanganval=$input[$i]->keteanganval;
				$defaultval=$input[$i]->defaultval;
				$nil_kritis=$input[$i]->nil_kritis;
				
				$insert = "INSERT INTO map_indi_lis (id,id_item,type,id_kelamin,ref_date,daterangemin,daterangemax,keteranganusia,valrangemin,valrangemax,valrange,keteanganval,defaultval,nil_kritis) 
				VALUES (
                    $id,$id_item,'$type',$id_kelamin,'$ref_date',$daterangemin,$daterangemax,'$keteranganusia',$valrangemin,$valrangemax,'$valrange','$keteanganval','$defaultval','$nil_kritis');"; 
				// var_dump($insert);return;
				$this->db->query($insert); 
			}
			$this->db->transComplete();	 
		}
		
		if ($this->db->transStatus()) {
			$output['code']         = "200";
			$output['status']       = "sukses";
			$output['pesan']        = "Simpan Berhasil";
		}else{
			$this->db->transRollback();
			$output['code']         = "500";
			$output['status']       = "gagal";
			$output['pesan']        = "Gagal Simpan";
		} 
		$this->hasil($output);
	}
	
	public function getIndiHasil(){
		$output = array();
        $query  = " SELECT
                        *
        FROM
        indikator_hasil ORDER BY nama_indikator_hasil ASC ;
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getIndiLIS(){
      $output = array();
      $query  = " SELECT
                        *
      FROM
      item_periksa_lab ORDER BY id ASC ;
      ";
      $hasilQuery =  $this->db->query($query);
      $output['status'] = "sukses";
      $output['pesan'] = "";
      $output['data'] = $hasilQuery->getResult();
      $this->hasil($output);
  }

  public function saveIndiHasil(){
      $input = json_decode(file_get_contents('php://input'));  
      $listParam = [ 'nama','satuan','nilai'];
      if ($this->evalParam($input, $listParam)) {
         $output = array();
         $output['status']   = "gagal";
         $output['pesan']    = "";

         $query="INSERT INTO indikator_hasil (
             nama_indikator_hasil,
             satuan_indikator_hasil,
             nilai_hasil_normal
             )VALUES(
             '$input->nama',
             '$input->satuan',
             '$input->nilai'
         )";

             if($this->db->query($query)){
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }

    public function editIndiHasil(){
      $input = json_decode(file_get_contents('php://input'));  
      $listParam = [ 'nama','satuan','nilai'];
      $output = array();
      $output['status']   = "gagal";
      $output['pesan']    = "";
      if ($this->evalParam($input, $listParam)) {
         $query="UPDATE indikator_hasil SET  
         nama_indikator_hasil='$input->nama',
         satuan_indikator_hasil='$input->satuan',
         nilai_hasil_normal='$input->nilai'
         WHERE nama_indikator_hasil='$input->nama' AND satuan_indikator_hasil='$input->satuan' AND nilai_hasil_normal='$input->nilai'";

         if($this->db->query($query)){
            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Simpan Berhasil";
        }else{
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan";
        }
    }ELSE{
        $output['pesan']        = "Isian Masih Kosong";
    }
    $this->hasil($output);
}

public function delIndiHasil(){
  $input = json_decode(file_get_contents('php://input'));  
  $listParam = [ 'nama','satuan','nilai'];
  $output = array();
  $output['status']   = "gagal";
  $output['pesan']    = "";
  if ($this->evalParam($input, $listParam)) {
     $query="DELETE FROM indikator_hasil WHERE nama_indikator_hasil='$input->nama' AND satuan_indikator_hasil='$input->satuan' AND nilai_hasil_normal='$input->nilai'";

     if($this->db->query($query)){
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    }
}else{
 $output['pesan']        = "Isian Masih Kosong";
}
$this->hasil($output);
}

public function getMapIndi(){
  $output = array();
  $query  = " SELECT map_produk_indikator_hasil.id_produk,nama_produk,map_produk_indikator_hasil.id_indikator_hasil,nama_indikator_hasil
  FROM map_produk_indikator_hasil
  JOIN produk ON map_produk_indikator_hasil.id_produk=produk.id_produk
  JOIN indikator_hasil on map_produk_indikator_hasil.id_indikator_hasil=indikator_hasil.id_indikator_hasil
  ";
  $hasilQuery =  $this->db->query($query);
  $output['status'] = "sukses";
  $output['pesan'] = "";
  $output['data'] = $hasilQuery->getResult();
  $this->hasil($output);
}

public function saveMapIndi(){
  $input = json_decode(file_get_contents('php://input'));  
  $listParam = [ 'id_produk','id_indikator_hasil'];
  if ($this->evalParam($input, $listParam)) {
     $output = array();
     $output['status']   = "gagal";
     $output['pesan']    = "";

     $query=" INSERT INTO map_produk_indikator_hasil (
         id_produk,
         id_indikator_hasil
         )VALUES(
         $input->id_produk,
         $input->id_indikator_hasil
     )";

         if($this->db->query($query)){
            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Simpan Berhasil";
        }else{
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan";
        }
    }
    $this->hasil($output);
}

public function getMapIndiLIS(){
  $output = array();
  $query  = " SELECT map_produk_indikator_hasil.id_produk,nama_produk,map_produk_indikator_hasil.id_indikator_hasil,nmtestind,unittest
  FROM map_produk_indikator_hasil
  JOIN produk ON map_produk_indikator_hasil.id_produk=produk.id_produk					
  JOIN item_periksa_lab on item_periksa_lab.id=map_produk_indikator_hasil.id_indikator_hasil
  ";
  $hasilQuery =  $this->db->query($query);
  $output['status'] = "sukses";
  $output['pesan'] = "";
  $output['data'] = $hasilQuery->getResult();
  $this->hasil($output);
}

public function editMapIndi(){
  $input = json_decode(file_get_contents('php://input'));  
  $listParam = [ 'id_produk','id_indikator_hasil'];
  if ($this->evalParam($input, $listParam)) {
     $output = array();
     $output['status']   = "gagal";
     $output['pesan']    = "";

     $query="UPDATE map_produk_indikator_hasil SET 
     id_produk=$input->id_produk,
     id_indikator_hasil=$input->id_indikator_hasil
     WHERE id_produk=$input->id_produk_lama AND id_indikator_hasil=$input->id_indikator_hasil_lama";

     if($this->db->query($query)){
        $output['code']         = "200";
        $output['status']       = "sukses";
        $output['pesan']        = "Simpan Berhasil";
    }else{
        $output['code']         = "500";
        $output['status']       = "gagal";
        $output['pesan']        = "Gagal Simpan";
    }
}else{
 $output['code']         = "500";
 $output['status']       = "gagal";
 $output['pesan']        = "Data Kurang Lengkap";
}
$this->hasil($output);
}

public function Pabrik() {
    $output = array();
    $query  = " SELECT * FROM far_pabrik ORDER BY pabrik ASC";

    $hasilQuery =  $this->db->query($query);
    $output['status']   = "sukses";
    $output['pesan']    = "";
    $output['data']     = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getSatuanKecil() {
    $output = array();
    $query  = " SELECT * FROM far_satuan ORDER BY kd_satuan ASC";

    $hasilQuery =  $this->db->query($query);
    $output['status']   = "sukses";
    $output['pesan']    = "";
    $output['data']     = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getSatuanBesar() {
    $output = array();
    $query  = " SELECT * FROM far_satuan_big ORDER BY kd_satuan_besar ASC";

    $hasilQuery =  $this->db->query($query);
    $output['status']   = "sukses";
    $output['pesan']    = "";
    $output['data']     = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getkelompok_penjamin() {
    $output = array();
    $query = "
    SELECT *
    FROM
    kelompok_penjamin
    ORDER BY id_kelompok_penjamin ASC
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getUnitFarmasi() {
    $input = json_decode(file_get_contents('php://input'));
    $output = array();
    $id_unit  = $input->id_unit;
    if ($id_unit != ''){
        $kondisi = "AND id_unit != '$id_unit'";
    }else{
        $kondisi = "";
    }

    $query  = " SELECT
                        *
    FROM
    unit where jenis_unit='4' $kondisi
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}
public function getJenisTarif() {
    $output = array();
    $query  = " SELECT
                        *
    FROM
    tarif_obat_jenis;
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}

public function getTagTarif() {
    $output = array();
    $data   = array(['id'  => '1','tag' => 'Pengali (*)'], ['id'  => '0','tag' => 'Penjumlah (+)']);
        //$data   = array(['id'  => '1','tag' => 'Pengali (*)']);

    $output['status']   = "sukses";
    $output['pesan']    = "";
    $output['data']     = $data;
    $this->hasil($output);
}

public function getListtarifobatcust() {
    $output = array();
    $query  = " SELECT
                        *,
    CASE
    WHEN tag = 1 THEN 'Pengali' ELSE '-'
    END as tag_else
    FROM
    tarif_obat_cust toc
    LEFT JOIN unit u ON toc.id_unit = u.id_unit 
    LEFT JOIN kelompok_penjamin kp ON kp.id_kelompok_penjamin = toc.id_kelompok_penjamin
    LEFT JOIN jenis_unit ju ON ju.jenis_unit = toc.jenis_unit
    LEFT JOIN tarif_obat_jenis toj ON toj.id_jenis_tarif = toc.id_jenis_tarif
    ORDER BY 
    toc.id ASC";

    $hasilQuery =  $this->db->query($query);
    $output['status']   = "sukses";
    $output['pesan']    = "";
    $output['data']     = $hasilQuery->getResult();
    $this->hasil($output);
}

public function tarifobatcust_addedit() {
    $input = json_decode(file_get_contents('php://input'));  
    $listParam = [ 'proses', 'id_tarif_cust', 'id_unit', 'id_kelompok', 'jenis_unit', 'jenis_tarif', 'jumlah', 'tag'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $proses         = $input->proses;
        $id_tarif_cust  = $input->id_tarif_cust;
        $id_unit        = $input->id_unit;
        $id_kelompok    = $input->id_kelompok;
        $jenis_unit     = $input->jenis_unit;
        $jenis_tarif    = $input->jenis_tarif;
        $jumlah         = $input->jumlah;
        $tag            = $input->tag;

        $this->db->transStart();
        if ($proses == true){
            $update = " UPDATE tarif_obat_cust SET 
            id_unit = '$id_unit',
            id_kelompok_penjamin = '$id_kelompok',
            jenis_unit = '$jenis_unit',
            jumlah = '$jumlah',
            tag  = '$tag',
            id_jenis_tarif = '$jenis_tarif'
            WHERE id = '$id_tarif_cust'";
            $this->db->query($update);
        }else if ($proses == false){
            $cek    = "SELECT max(id) as id FROM tarif_obat_cust";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $x      = $row->id;
                        $real   = ((int)$x + 1);
                        $id = $real;
                    }else{
                        $id = 1;
                    }
                }

                $cekurut    = "SELECT max(urut) as urut FROM tarif_obat_cust WHERE id_unit = '$id_unit' AND id_kelompok_penjamin = '$id_kelompok'";
                if ($this->db->simpleQuery($cekurut)) { //true
                    $cekxx   = $this->db->query($cekurut)->getResult();
                    $rowx    = $this->db->query($cekurut)->getRow();
                    if (!empty($cekxx)){
                        $xx      = $rowx->urut;
                        $realx   = ((int)$xx + 1);
                        $urut = $realx;
                    }else{
                        $urut = 1;
                    }
                }

                $insert = "INSERT INTO tarif_obat_cust (id, id_unit, id_kelompok_penjamin, jenis_unit, urut, jumlah, tag, id_jenis_tarif) VALUES ('$id','$id_unit','$id_kelompok','$jenis_unit','$urut','$jumlah','$tag','$jenis_tarif')";
                // echo $insert;
                // return;
                $this->db->query($insert);
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function tarifobatcust_hapus() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'id_tarif_obtcust'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id        = $input->id_tarif_obtcust;
            
            $this->db->transStart();
            $delete = " DELETE FROM tarif_obat_cust WHERE id = '$id'";
            $this->db->query($delete);
            
            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }

        }
        $this->hasil($output);
    }

    public function getListUnitinap() {
        $output = array();
        $query = "
        SELECT
                *,
        CASE
        WHEN aktif
        THEN 'Aktif' 
        ELSE 'Tidak Aktif' 
        END status
        FROM
        unit
        JOIN jenis_unit USING ( jenis_unit )
        where unit.jenis_unit='2'
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function getListRuang() {
        $output = array();
        $query = "SELECT * FROM ruang_inap order by nama_ruang asc";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function getListkamar() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        kamar join unit using(id_unit) 
        join ruang_inap using(id_ruang) order by nama_kamar asc
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function kamar_addeditKamar() {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'proses', 'id_kamar', 'nama_kamar', 'id_unit', 'id_ruang','jumlah_bed'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses         = $input->proses;
            $id_kamar      = $input->id_kamar;
            $nama_kamar      = $input->nama_kamar;
            $id_unit   = $input->id_unit;
            $id_ruang= $input->id_ruang;
            $jumlah_bed= $input->jumlah_bed;
            
            $this->db->transStart();
            if ($proses == true){
                $update = " UPDATE kamar SET 
                nama_kamar = '$nama_kamar', 
                id_unit = '$id_unit', 
                id_ruang = '$id_ruang', 
                jumlah_bed = '$jumlah_bed'
                WHERE id_kamar = '$id_kamar'";
                $this->db->query($update);
            }else if ($proses == false){
                $insert = "INSERT INTO kamar (id_kamar, nama_kamar, id_unit,id_ruang,jumlah_bed) VALUES ('$id_kamar','$nama_kamar','$id_unit','$id_ruang','$jumlah_bed')";
                $this->db->query($insert);
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $this->db->transRollback();
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }
        $this->hasil($output);
    }

    public function modalcopytarif()
    {
        $data = json_decode($_GET['data']);
        $id_detail_transaksi  = str_replace('"', '', json_encode($data->id_detailtransaksi));
        // var_dump($data->id_detailtransaksi);
        // exit;
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $outputx['data'] = $data->id_detailtransaksi;

        $data = json_decode(json_encode($outputx), true);

        return view('view/modal/setup/mod_lookkup_copytarif', $data);
    }
    public function getPenjamin() {
        $output = array();
        $query = "
        SELECT
                *
        FROM
        penjamin 
        ORDER BY nama_penjamin ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function prosescopytarif()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_penjamin',
            'id_unit',
            'kelompok_id_tarif',
            'tgl_berlaku'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if ($this->evalParam($input, $listParam)) {
            date_default_timezone_set("Asia/Jakarta");
            $stringidtarif =$input->kelompok_id_tarif;
            $arraystringidtarif = explode(",",$stringidtarif);
            $jumData = count($arraystringidtarif);
        // echo "$jumData";
        // exit();
            $this->db->transStart();

            for ($i = 0; $i < $jumData; $i++) {
            // echo"".$i.$arraystringidtarif[$i]."";
            // echo"<br>".$i.$arraystringidtarif[$i]."";
             //insert copy tarif tabel tarif
                $tabeltarif = "SELECT * from tarif where id_tarif='$arraystringidtarif[$i]'";
                $t_tarif = $this->db->query($tabeltarif);
                foreach ($t_tarif->getResult() as $rowt_tarif) {
                    $insert_tarif = "INSERT INTO tarif (id_produk, id_penjamin, tgl_berlaku, harga, id_unit) VALUES ('$rowt_tarif->id_produk', '$input->id_penjamin', '$input->tgl_berlaku', '$rowt_tarif->harga','$input->id_unit' )returning id_tarif";
                // echo"$insert_tarif";
                    $idtarif = $this->db->query($insert_tarif)->getRow()->id_tarif;

                // echo"$idtarif";
                // exit();
                    //insert copy tarif tabel tarif_component
                    $tabeltarif_component = "SELECT * from tarif_component where id_tarif='$arraystringidtarif[$i]'";
                    $t_tarif_component = $this->db->query($tabeltarif_component);
                    foreach ($t_tarif_component->getResult() as $rowt_tarif_component) {
                        $insert_tarif = "INSERT INTO tarif_component (id_tarif, id_jenis_component, id_jenis_component_parent, operator, jumlah) VALUES 
                        ('$idtarif', '$rowt_tarif_component->id_jenis_component', '$rowt_tarif_component->id_jenis_component_parent','$rowt_tarif_component->operator','$rowt_tarif_component->jumlah')";
                    //   echo"$insert_tarif";
                        $this->db->query($insert_tarif);                       
                    }

                    // $insert_unit_produk = "INSERT INTO produk_unit (id_unit, id_produk) VALUES ('$input->id_unit','$rowt_tarif->id_produk')";
                    // $this->db->query($insert_unit_produk);
                }            
            }
        //  echo"a";exit();
        //  exit(); 
            $this->db->transComplete(); 
            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses copy tarif";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal copy tarif hubungi admin";
            }
        }
        $this->hasil($output);
    }

    public function getUserList() {
        $output = array();
        $query = " SELECT * FROM users ORDER BY nama ASC ";
        
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getListHakAksesACCGudang() {
        $output = array();
        $query = "
        SELECT
        id_user, nama, acc, 
        CASE 
        WHEN acc = 't' THEN
        'Diijinkan'
        ELSE
        'Tidak Diijinkan'
        END AS acc_name
        FROM
        gud_obat_in_acc
        INNER JOIN users USING ( id_user )
        ORDER BY nama ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function accgudang_addedit() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'proses', 'iduser', 'acc'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $proses = $input->proses;
            $iduser = $input->iduser;
            $acc    = $input->acc;

            $this->db->transStart();
            if ($proses == true){

                $update = " UPDATE gud_obat_in_acc SET acc = '$acc' WHERE id_user = '$iduser'";
                $this->db->query($update);

            }else if ($proses == false){

                $insert = "INSERT INTO gud_obat_in_acc (id_user, acc) VALUES ('$iduser','$acc')";
                $this->db->query($insert);

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Error, Hub. Admin";
                $this->hasil($output);
                return;
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {

                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Simpan Berhasil";
            }else{
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Simpan";
            }

        }

        $this->hasil($output);
    }

    public function accgudang_hapus() {
        $input = json_decode(file_get_contents('php://input'));  
        $listParam = [ 'iduser'];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $iduser  = $input->iduser;
            
            $this->db->transStart();
            $delete = " DELETE FROM gud_obat_in_acc WHERE id_user = '$iduser'";
            $this->db->query($delete);
            
            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']         = "200";
                $output['status']       = "sukses";
                $output['pesan']        = "Hapus Berhasil";
            }else{
                $output['code']         = "500";
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal Hapus";
            }

        }
        $this->hasil($output);
    }
    public function jenis_produk() {
        $output = array();
        $query = "
        SELECT * FROM jenis_produk order by deskripsi asc
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
    public function produk_by_jenis()
    {
     $input = json_decode(file_get_contents('php://input'));
     if($input->id=='false'){
        $kel =  $this->db->query("SELECT * FROM produk");
    }
    else{
     $kel =  $this->db->query("SELECT * FROM produk where id_jenis_produk='$input->id' ");
 }
 $output['status'] = 'sukses';
 $output['data'] = $kel->getResult();
 
 echo json_encode($output);
}
public function getListbhp() {
    $output = array();
    $query = "SELECT
        * 
    FROM
    map_penggunaan_bhp
    LEFT JOIN produk USING ( id_produk )
    JOIN far_obat USING ( kd_obat )
    LEFT JOIN far_sub_jenis using (kd_sub_jns)
    order by produk.nama_produk desc
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}
public function subjenisbhp() {
    $output = array();
    $query = "SELECT * from far_sub_jenis order by sub_jenis asc
    ";
    $hasilQuery =  $this->db->query($query);
    $output['status'] = "sukses";
    $output['pesan'] = "";
    $output['data'] = $hasilQuery->getResult();
    $this->hasil($output);
}
public function far_obat()
{
 $input = json_decode(file_get_contents('php://input'));
 if($input->id=='false'){
     $kel =  $this->db->query("SELECT * FROM far_obat");
 }
 else{
    $kel =  $this->db->query("SELECT * FROM far_obat where kd_sub_jns='$input->id' ");

}
$output['status'] = 'sukses';
$output['data'] = $kel->getResult();

echo json_encode($output);
}
public function penggunaanbhp_addedit() {

    $input = json_decode(file_get_contents('php://input'));
    $listParam = [ 'proses', 'id_produk', 'kd_obat', 'default_jumlah'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $proses         = $input->proses;
        $id_produk      = $input->id_produk;

        $kd_obat      = $input->kd_obat;

        $default_jumlah   = $input->default_jumlah;


        $this->db->transStart();
        if ($proses == true){ 
            $update = " UPDATE map_penggunaan_bhp SET 
            id_produk = '$id_produk', 
            kd_obat = '$kd_obat', 
            default_jumlah = '$default_jumlah' 
            WHERE id_produk = '$id_produk' and kd_obat='$kd_obat'";
            $this->db->query($update);
        }else if ($proses == false){
                // echo"x";
                // exit();
            $insert = "INSERT INTO map_penggunaan_bhp (id_produk, kd_obat, default_jumlah) VALUES ('$id_produk','$kd_obat','$default_jumlah')";
                // echo"$insert";exit();
            $this->db->query($insert);
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Error, Hub. Admin";
            $this->hasil($output);
            return;
        }

        $this->db->transComplete();
        if ($this->db->transStatus()) {

            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Simpan Berhasil";
        }else{
            $this->db->transRollback();
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan";
        }

    }
    $this->hasil($output);
}
public function penggunaanbhp_mapdelete() {

    $input = json_decode(file_get_contents('php://input'));
    $listParam = ['id_produk', 'kd_obat', 'default_jumlah'];
    if ($this->evalParam($input, $listParam)) {
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $id_produk      = $input->id_produk;

        $kd_obat      = $input->kd_obat;

        $default_jumlah   = $input->default_jumlah;


        $this->db->transStart();


        $del = "DELETE FROM map_penggunaan_bhp WHERE id_produk = '$id_produk' AND kd_obat = '$kd_obat'";
                // echo"$del";exit();
        $this->db->query($del);


        $this->db->transComplete();
        if ($this->db->transStatus()) {

            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Delete Berhasil";
        }else{
            $this->db->transRollback();
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal ";
        }

    }
    $this->hasil($output);
}
}
