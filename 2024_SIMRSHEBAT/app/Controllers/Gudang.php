<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Gudang extends Api {

    public function addnew()
    {
        return view('view/modal/gudang/gud_barangIn');
    }
    
    public function addnewOut()
    {
        return view('view/modal/gudang/gud_barangOut');
    }

    public function addnewRetur()
    {
        return view('view/modal/gudang/gud_returpembelian');
    }

    public function addnewStokOpname()
    {
        return view('view/modal/gudang/gud_stok_opname');
    }

    public function addnewPermintaan()
    {
        return view('view/modal/gudang/gud_permintaanObat');
    }

    public function addnewOutACCPermintaan()
    {
        return view('view/modal/gudang/gud_accpermintaanObat');
    }

    public function gud_barangOut_searching()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'obatcari' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $iduser     = $input->id_user;
            $idfar      = $this->cekIdFarUser($iduser);
            $kd_milik   = $this->cekKdmilikUser($iduser);

            /*if ($idfar != '4004'){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Anda Tidak Dapat Akses Pengeluaran Obat / Alkes!";
                $this->hasil($output);
                return;
            }*/

            if ($kd_milik == ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
                $this->hasil($output);
                return;
            }

            $query = "  SELECT DISTINCT
                            kd_obat,
                            nama_obat,
                            milik,
                            COALESCE ( stok_unit, 0 )  AS stok_unit,
                            COALESCE ( harga, 0 ) AS harga_satuan,
                            milik,
                            --( harga * 1.25 ) AS harga_jual,
                            kd_sat_besar,
                            fraction,
                            exp
                        FROM
                            far_obat
                            LEFT JOIN far_stok USING ( kd_obat )
                            LEFT JOIN tarif_obat USING ( kd_obat, kd_milik )
                            LEFT JOIN far_obat_milik USING ( kd_milik ) 
                        WHERE
                            id_unit = '".$idfar."' and kd_milik = '".$kd_milik."'
                        ORDER BY
                            nama_obat ASC";

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

    public function gud_ObatPermintaan_searching()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'obatcari' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $iduser     = $input->id_user;
            $idfar      = $this->cekIdFarUser($iduser);
            $kd_milik   = $this->cekKdmilikUser($iduser);
            $unit_tujuan = $input->unit_tujuan;

            if ($kd_milik == ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
                $this->hasil($output);
                return;
            }

            $query = "  SELECT DISTINCT
                            kd_obat,
                            nama_obat,
                            milik,
                            COALESCE ( stok_unit, 0 )  AS stok_unit,
                            COALESCE ( harga, 0 ) AS harga_satuan,
                            milik,
                            kd_sat_besar,
                            fraction,
                            exp
                        FROM
                            far_obat
                            LEFT JOIN far_stok USING ( kd_obat )
                            LEFT JOIN tarif_obat USING ( kd_obat, kd_milik )
                            LEFT JOIN far_obat_milik USING ( kd_milik ) 
                        WHERE
                            id_unit = '".$unit_tujuan."' and kd_milik = '".$kd_milik."'
                        ORDER BY
                            nama_obat ASC";
            // echo $query;
            // return;
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

    public function gud_barangIn_showdata()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $noin       = $input->noin;
        $tglsatu    = $input->tglsatu;
        $tgldua     = $input->tgldua;
        $pbf        = $input->pbf;
        $jmlh       = $input->jmlh;
        $iduser     = $input->iduser;
        $faktur     = $input->faktur;
        $posting    = $input->posting;

        $idFar      = $this->cekIdFarUser($iduser);

        if ($noin != ''){
            $kondisi1 = "WHERE no_obat_in = '$noin' AND";
        }else{
            $kondisi1 = "WHERE";
        }

        if ($pbf != ''){
            $kondisi2 = "AND kd_vendor = '$pbf'";
        }else{
            $kondisi2 = "";
        }

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }
        
        if ($faktur != ''){
            $kondisi3 = "AND remark like '%".$faktur."%'";
        }else{
            $kondisi3 = "";
        }

        if ($posting != ''){
            $kondisi4 = "AND stsentri = '$posting'";
        }else{
            $kondisi4 = "";
        }

        $query = " SELECT 
                    no_obat_in,
                    tgl_obat_in,
                    kd_vendor,
                    far_vendor.nama as nm_vendor,
                    posting,
                    stsentri,
                    stsacc,
                    remark,
                    users.nama as pegawai,
                    CASE WHEN fakturpajak is null THEN '' ELSE fakturpajak END AS fakturpajak,
                    CASE WHEN npwp is null THEN '' ELSE npwp END AS npwp
                FROM 
                    gud_obat_in
                    INNER JOIN far_vendor USING (kd_vendor)
                    INNER JOIN users USING (id_user)
                    $kondisi1 tgl_obat_in BETWEEN '$tglsatu' AND '$tgldua' $kondisi2 $kondisi3 $kondisi4 and id_unit_far = '$idFar'
                ORDER BY no_obat_in ASC
                $limit";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function gud_returpembelian_showdata()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $noretur    = $input->noretur;
        $tglsatu    = $input->tglsatu;
        $tgldua     = $input->tgldua;
        $pbf        = $input->pbf;
        $jmlh       = $input->jmlh;
        $iduser     = $input->iduser;
        $idFar      = $this->cekIdFarUser($iduser);

        if ($noretur != ''){
            $kondisi1 = "WHERE no_ret = '$noretur' AND";
        }else{
            $kondisi1 = "WHERE";
        }

        if ($pbf != ''){
            $kondisi2 = "AND kd_vendor = '$pbf'";
        }else{
            $kondisi2 = "";
        }

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }

        $query = " SELECT * FROM gud_obat_ret
                    INNER JOIN far_vendor USING (kd_vendor)
                    $kondisi1 tgl_ret BETWEEN '$tglsatu' AND '$tgldua' $kondisi2 and id_unit = '$idFar'
                    ORDER BY no_ret ASC
                    $limit";
        
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $this->db->query($query)->getResult();
        $this->hasil($output);
    }

    public function gud_informasi_stok()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $kd_obat  = $input->kd_obat;
        $nm_obat  = $input->nm_obat;
        $unit     = $input->unit;
        
        $jmlh     = $input->jmlh;
        $iduser   = $input->iduser;
        $milik    = $input->milik;

        if ($kd_obat != ''){
            $kondisi = "AND kd_obat = '$kd_obat'";
        }else{
            $kondisi = "";
        }

        if ($unit != ''){
            $kondisi2 = "AND id_unit = '$unit'";
        }else{
            $kondisi2 = "";
        }

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }
        
        if ($milik != 0){
            if ($milik == ''){
                $kondisi3 = "";
            }else{
                $kondisi3 = "AND far_stok.kd_milik = '$milik'";
            }
        }else{
            $kondisi3 = "";
        }

        $query = "  SELECT
                        * 
                    FROM
                        far_stok 
                        INNER JOIN far_obat using(kd_obat)
                        INNER JOIN far_obat_milik using(kd_milik)
                        INNER JOIN unit USING (id_unit)
                    WHERE
                    nama_obat like upper('".$nm_obat."%') $kondisi $kondisi2 $kondisi3
                    ORDER BY nama_unit, nama_obat ASC
                    $limit";
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $this->db->query($query)->getResult();
        $this->hasil($output);
    }

    public function gud_barangIn_showdataDetail()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $no_obat_in = $input->no_gud_in;
        
        /*$query = " SELECT no_obat_in, kd_obat, nama_obat, kd_sat_besar, gud_obat_in_det.kd_milik, urut, jml_in_obt, hrg_beli_obt, gud_obat_in.disc as discFak, disc_total, ppn_item, ppn_rupiah, gud_obat_in_det.disc as disc, disc_rupiah, boxqty, frac, tag, tag_disc, hrg_satuan, exp, to_char( exp, 'YYYY/mm/dd' ) , gin, batch, far_pabrik.kd_pabrik, pabrik FROM gud_obat_in
                    INNER JOIN gud_obat_in_det USING (no_obat_in)
                    INNER JOIN far_pabrik ON far_pabrik.kd_pabrik = gud_obat_in_det.kd_pabrik
                    INNER JOIN far_obat USING (kd_obat)
                    WHERE no_obat_in = '$no_obat_in' ORDER BY urut ASC";*/
        $query = " SELECT   no_obat_in,
                            kd_obat,
                            nama_obat,
                            kd_sat_besar,
                            gud_obat_in_det.kd_milik,
                            urut,
                            jml_in_obt,
                            hrg_beli_obt,
                            --harga as hrg_beli_obt,
                            gud_obat_in.disc AS discFak,
                            disc_total,
                            ppn_item,
                            ppn_rupiah,
                            gud_obat_in_det.disc AS disc,
                            disc_rupiah,
                            boxqty,
                            frac,
                            tag,
                            tag_disc,
                            hrg_satuan,
                            EXP,
                            to_char( EXP, 'YYYY/mm/dd' ),
                            gin,
                            batch,
                            far_pabrik.kd_pabrik,
                            pabrik 
                        FROM
                            gud_obat_in
                            INNER JOIN gud_obat_in_det USING ( no_obat_in )
                            INNER JOIN far_pabrik ON far_pabrik.kd_pabrik = gud_obat_in_det.kd_pabrik
                            INNER JOIN far_obat USING ( kd_obat ) 
                            LEFT JOIN tarif_obat USING ( kd_obat )
                    WHERE no_obat_in = '$no_obat_in' ORDER BY urut ASC";
        // echo $query;
        // return;
        $result = $this->db->query($query)->getResult();                
        if (!empty($result)) { //JIKA TIDAK KOSONG
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $result;
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Ditemukan..";
            $output['data']     = "";
        }
        $this->hasil($output);
    }

    public function gud_barangOut_showdataDetail()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $no_obat_out = $input->no_gud_out;
        $iduser = $input->iduser;
        $idFar  = $this->cekIdFarUser($iduser);

        $query = "  SELECT
                        gud_obat_outdet.kd_obat,
                        nama_obat,
                        kd_sat_besar,
                        '0' AS qtyB,
                        fraction,
                        --CASE WHEN harga_beli > 0 THEN harga_beli ELSE 0 END AS harga_beli, --> diambil dari harga_beli di far_stok
                        CASE WHEN harga > 0 THEN harga ELSE 0 END AS harga_beli,
                        CASE WHEN stok_dikeluarkan > 0 THEN stok_dikeluarkan ELSE 0 END AS stok_dikeluarkan,
                        CASE WHEN stok_unit > 0 THEN stok_unit ELSE 0 END AS stok_unit,
                        gud_obat_outdet.EXP
                    FROM
                        gud_obat_out
                        INNER JOIN gud_obat_outdet USING ( no_obat_out )
                        INNER JOIN far_obat USING ( kd_obat ) 
                        --INNER JOIN tarif_obat USING (kd_obat, kd_milik)
                        LEFT JOIN far_stok ON far_stok.kd_obat = gud_obat_outdet.kd_obat and far_stok.kd_milik = gud_obat_outdet.kd_milik and far_stok.exp = gud_obat_outdet.exp and far_stok.id_unit = '$idFar'
                    WHERE
                        no_obat_out = '$no_obat_out' 
                    ORDER BY
                        urut ASC";
        $result = $this->db->query($query)->getResult();                
        if (!empty($result)) { //JIKA TIDAK KOSONG
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $result;
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Ditemukan..";
            $output['data']     = "";
        }
        $this->hasil($output);
    }

    public function gud_retur_showdataDetail()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $no_retur   = $input->no_retur;
        $tglcreate  = $input->tglcreate;
        
        $query = "  SELECT
                        no_ret,
                        no_obat_in,
                        gud_obat_retdet.urut,
                        kd_obat,
                        nama_obat,
                        kd_satuan,
                        gud_obat_retdet.kd_milik,
                        jml_in_obt,
                        qty_ret,
                        hargasat,
                        gud_obat_retdet.ppn_item,
                        frac,
                        batch_ret,
                        exp_ret,
                        gud_obat_retdet.id_unit
                    FROM
                        gud_obat_ret
                        INNER JOIN gud_obat_retdet USING ( no_ret, tgl_ret )
                        LEFT JOIN gud_obat_in_det USING  ( no_obat_in, kd_obat )
                        INNER JOIN far_vendor USING ( kd_vendor )
                        INNER JOIN far_obat USING ( kd_obat ) 
                    WHERE
                        no_ret = '$no_retur' and tgl_ret = '$tglcreate'
                    ORDER BY
                        urut ASC";
        
        $result = $this->db->query($query)->getResult();                
        if (!empty($result)) { //JIKA TIDAK KOSONG
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $result;
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Ditemukan..";
            $output['data']     = "";
        }
        $this->hasil($output);
    }

    public function gud_barangIn_hargaObat()
    {
        $input = json_decode(file_get_contents('php://input'));
        
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $iduser = $input->iduser;
        $kdObat = $input->kdobat;
        $idfar  = $this->cekIdFarUser($iduser);
           
        $query  = " SELECT DISTINCT 
                        milik,
                        COALESCE ( harga, 0 ) as harga_beli
                        --( harga * 1.25 ) as harga_jual
                    FROM
                        far_obat
                        LEFT JOIN tarif_obat USING ( kd_obat )
                        LEFT JOIN far_obat_milik USING ( kd_milik )
                    WHERE kd_obat = '".$kdObat."'";
            // echo  $query;
            // return;            
        if ($this->db->simpleQuery($query)) {
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
                $output['data']     = $queryx;
            }
        } else {
            $output['code']     = "01";
            $output['status']   = 'gagal cari, hubungi admin';
            $output['pesan']    = $this->db->error()['message'];
        }
        
        echo json_encode($output);
    }

    //GET ID Far USER
    public function cekIdFarUser($iduser)
    {
        $query      = "SELECT * FROM users WHERE id_user = '".$iduser."'";
        $row        = $this->db->query($query)->getRow();
        $id_far     = $row->id_far;
        return $id_far;
    }
    
    //GET Nomor In Gudang
    public function cekNoIn($id_unit)
    {
        $query      = "SELECT * FROM mapping_noin WHERE id_unit = '".$id_unit."'";
        $row        = $this->db->query($query)->getRow();
        $x          = $row->noin;
        $noin       = ((int)$x + 1);
        return $noin;
    }

    //GET Nomor Out Pengeluaran Gudang
    public function cekNoOut()
    {
        $query      = "SELECT MAX(no_obat_out) as urut FROM gud_obat_out";
        $row        = $this->db->query($query)->getRow();
        $x          = $row->urut;
        $noout       = ((int)$x + 1);
        return $noout;
    }

    //GET Kepemilikan Obat
    public function cekKdmilikUser($iduser)
    {
        $query      = "SELECT * FROM users WHERE id_user = '".$iduser."'";
        $row        = $this->db->query($query)->getRow();
        $kd_milik   = $row->kepemilikan_obat;
        return $kd_milik;
    }

    //GET Nm Vendor/PBF
    public function getVendor($pbf)
    {
        $query      = "SELECT * FROM far_vendor WHERE kd_vendor = '".$pbf."'";
        $row        = $this->db->query($query)->getRow();
        $nama       = $row->nama;
        return $nama;
    }

    //GET Nm Unit
    public function getNamaUnit($id_unit)
    {
        $query      = "SELECT * FROM unit WHERE id_unit = '".$id_unit."'";
        $row        = $this->db->query($query)->getRow();
        $nama       = $row->nama_unit;
        return $nama;
    }

    //GET Nm Obat
    public function getNamaObat($kd_obat)
    {
        $query      = "SELECT nama_obat from far_obat where kd_obat='".$kd_obat."'";
        $row        = $this->db->query($query)->getRow();
        $nama       = $row->nama_obat;
        return $nama;
    }

    //GET Nomor Out Permintaan Obat
    public function cekNoPermintaan()
    {
        $query      = "SELECT MAX(id_permintaan) as urut FROM order_obat";
        $row        = $this->db->query($query)->getRow();
        $x          = $row->urut;
        $noout       = ((int)$x + 1);
        return $noout;
    }

    public function gud_barangOut_showdata()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $noout      = $input->noout;
        $tglsatu    = $input->tglsatu;
        $tgldua     = $input->tgldua;
        $id_unit    = $input->id_unit;
        $jmlh       = $input->jmlh;
        $id_far     = $this->cekIdFarUser($input->id_user);

        if ($noout != ''){
            $kondisi1 = "WHERE no_obat_out = '$noout' AND";
        }else{
            $kondisi1 = "WHERE";
        }

        if ($id_unit > 0){
            $kondisi2 = "AND id_unit = '$id_unit'";
        }else{
            $kondisi2 = "";
        }

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }

        $query  = " SELECT * FROM gud_obat_out
                    INNER JOIN unit USING (id_unit) 
                    $kondisi1 tgl_obat_out BETWEEN '$tglsatu' AND '$tgldua' $kondisi2 AND id_unit_far = '$id_far'
                    ORDER BY no_obat_out ASC $limit ";

        $hasilQuery =  $this->db->query($query);
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function CreateGudangBarangIn()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $pesan = '';
        $no_obat_in     = $input->no_gud_in;
        $pbf            = $input->pbf;
        $faktur         = $input->faktur;
        $fakturvendor   = $input->fakturvendor;
        $npwp           = $input->npwp;
        $iduser         = $input->iduser;
        $map_idunit     = $input->map_idunit;
        $tglcreate      = $input->tglcreate;
        $id_farUser     = $input->id_farUser;
        $kd_milik       = $this->cekKdmilikUser($iduser);
        if ($kd_milik == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
            $this->hasil($output);
            return;
        }
        $DiscFaktur     = $input->DiskonFaktur;
        $GrandDisc      = $input->GrandDisc;
        $GrandSubTotal  = $input->GrandSubTotal;
        $GrandPPN       = $input->GrandPPN;
        $GrandTotal     = $input->GrandTotal;

        $this->db->transStart();
        if ($no_obat_in == ''){
            $cekNoIn    = $this->cekNoIn($id_farUser);
            if ($cekNoIn == null){
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor In Belum Tersedia.";
                $this->hasil($output);
                return;
            }
            //$noobatin   = $map_idunit."/".date('m/y')."/".$cekNoIn;
            $noobatin   = $cekNoIn;
            $updateNoIn = "UPDATE mapping_noin SET noin = '$cekNoIn' WHERE id_unit = '$id_farUser'";
            $this->db->query($updateNoIn);

            $query = "INSERT INTO gud_obat_in (no_obat_in, tgl_obat_in, ppn, kd_vendor, kd_milik, remark, disc_total, id_unit_far, id_user, fakturpajak, npwp) VALUES ('$noobatin', '$tglcreate', '$GrandPPN', '$pbf', '$kd_milik', '$faktur', '$GrandDisc', '$id_farUser', '$iduser', '$fakturvendor', '$npwp')";
            // echo $query;
            // return;
            $pesan = "Simpan Penerimaan Berhasil.";
        }else{
            $noobatin   = $no_obat_in;
            $cek        = "SELECT posting FROM gud_obat_in WHERE no_obat_in = '$noobatin'";

            if ($this->db->simpleQuery($cek)) {
                $row       = $this->db->query($cek)->getRow();
                $posting   = $row->posting;
                if ($posting != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Penerimaan : ".$noobatin.", Sudah di Posting!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  ="UPDATE gud_obat_in SET 
                            kd_vendor   = '$pbf',
                            -- posting     = 'f',
                            ppn         = '$GrandPPN',
                            kd_milik    = '$kd_milik',
                            remark      = '$faktur',
                            disc_total  = '$GrandDisc',
                            disc        = '$DiscFaktur',
                            fakturpajak = '$fakturvendor',
                            npwp        = '$npwp'
                        WHERE no_obat_in = '$noobatin' and tgl_obat_in = '$tglcreate' ";
                    
                    // echo $query;
                    // return;
                    $pesan = "Update Penerimaan Berhasil.";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $this->hasil($output);
                return;
            }
        }

        if ($this->db->query($query)){
            $data    = $input->data;
            if ($input->countRow != 0){
                $delete = "DELETE FROM gud_obat_in_det WHERE no_obat_in = '$noobatin'";
                $this->db->query($delete);

                for( $i=0; $i < $input->countRow; $i++){
                    $getUrut    = "SELECT MAX(urut) as urut FROM gud_obat_in_det WHERE no_obat_in = '$noobatin'";
                    
                    if ($this->db->simpleQuery($getUrut)) { //true
                        $cekx   = $this->db->query($getUrut)->getResult();
                        $row    = $this->db->query($getUrut)->getRow();
                        if (!empty($cekx)){
                            $x      = $row->urut;
                            $urut   = ((int)$x + 1);
                        }else{
                            $urut   = 1;
                        }
                    }

                    $kd_obat        = $data[$i]->kd_obt;
                    //$kd_milik       = $this->cekKdmilikUser($iduser);
                    $jml_in_obt     = $data[$i]->qty;
                    $hrg_beli_obt   = $data[$i]->hargaBeli;
                    $ppn_item       = $data[$i]->ppn;
                    $ppn_rupiah     = $data[$i]->ppnrp;
                    $disc           = $data[$i]->disc;
                    $disc_rupiah    = $data[$i]->discrp;
                    $boxqty         = $data[$i]->qtyB;
                    $frac           = $data[$i]->frac;
                    $tag            = 1;
                    $tag_disc       = 0;
                    $hrg_satuan     = $data[$i]->hargaSat;
                    $exp            = $data[$i]->expired;
                    $gin            = '';
                    $batch          = $data[$i]->batch;
                    $kd_pabrik      = $data[$i]->pabrik;

                    if ($exp != ''){
                        $save = "INSERT INTO gud_obat_in_det (no_obat_in, kd_obat, kd_milik, urut, jml_in_obt, hrg_beli_obt, disc, ppn_item, disc_rupiah, boxqty, frac, tag, tag_disc, hrg_satuan, exp, gin, batch, kd_pabrik, ppn_rupiah, id_unit) VALUES ('$noobatin', '$kd_obat', '$kd_milik', '$urut', '$jml_in_obt', '$hrg_beli_obt', '$disc', '$ppn_item', '$disc_rupiah', '$boxqty', '$frac', '$tag', '$tag_disc', '$hrg_satuan', '$exp', '$gin', '$batch', '$kd_pabrik', '$ppn_rupiah', '4004')";
                        // echo $save;
                        // return;
                        $this->db->query($save);

                        $upd_frac     ="UPDATE far_obat SET fraction = '$frac' WHERE kd_obat = '$kd_obat'";
                        $this->db->query($upd_frac);

                        if ($hrg_satuan == '0'){
                            $upd_hrgasat  ="UPDATE tarif_obat SET harga = '$hrg_beli_obt' WHERE kd_obat = '$kd_obat'";
                            $this->db->query($upd_hrgasat);
                        }
                        
                    }else{
                        // $output['code']     = "502";
                        $output['status']   = "gagal";
                        $output['pesan']    = "Expired Obat Belum Diisi";
                        $this->hasil($output);
                        return;
                    }
                }

            }else{
                $delete = "DELETE FROM gud_obat_in_det WHERE no_obat_in = '$noobatin'";
                $this->db->query($delete);
            }

        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = $pesan;
            $output['no_gud_in']= $noobatin;
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan...";
        }

        echo json_encode($output);
    }

    public function PostingGudangBarangIn()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_obat_in     = $input->no_gud_in;
        $tglcreate      = $input->tglcreate;
        $id_gl          = 'PBL'.'-'.$no_obat_in;
        $ket            = 'Pembelian Obat';
        $jmlh           = $input->GrandTotal;
        $iduser         = $input->iduser;
        $pbf            = $input->pbf;
        $nmpbf          = $this->getVendor($pbf);
        $now            = date('Y-m-d');
        //JURNAL
        $idacc_hutang          = '85'; // Hutang Pembelian Farmasi
        $idacc_persediaan      = '27'; // Persediaan  Farmasi 
        $idacc_potongan        = '141'; // Potongan Pembelian / Potongan Faktur (diskon setelah dibayar)
        $idmodul               = '16001'; //Penerimaan Barang Masuk
        
        $DiscFaktur     = $input->DiskonFaktur;
        $GrandDisc      = $input->GrandDisc; 
        $GrandPPN       = $input->GrandPPN;
        $GrandTotal     = $input->GrandTotal;

        $debit         =  0;
        $kredit        =  0;


        $this->db->transStart();
        if ($no_obat_in == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Penerimaan Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{

            $update_gud  =" UPDATE gud_obat_in SET stsentri = 't' WHERE no_obat_in = '$no_obat_in' and tgl_obat_in = '$tglcreate' ";
            $this->db->query($update_gud);
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Posting";
        }else{
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting!!";
        }

        echo json_encode($output);
    }

    public function ACCGudangBarangIn()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_obat_in     = $input->no_gud_in;
        $tglcreate      = $input->tglcreate;
        $id_gl          = 'PBL'.'-'.$no_obat_in;
        $ket            = 'Pembelian Obat';
        $jmlh           = $input->GrandTotal;
        $iduser         = $input->iduser;
        $pbf            = $input->pbf;
        $nmpbf          = $this->getVendor($pbf);
        $now            = date('Y-m-d');
        //JURNAL
        $idacc_hutang          = '85'; // Hutang Pembelian Farmasi
        $idacc_persediaan      = '27'; // Persediaan  Farmasi 
        $idacc_potongan        = '141'; // Potongan Pembelian / Potongan Faktur (diskon setelah dibayar)
        $idmodul               = '16001'; //Penerimaan Barang Masuk
        
        $DiscFaktur     = $input->DiskonFaktur;
        $GrandDisc      = $input->GrandDisc; 
        $GrandPPN       = $input->GrandPPN;
        $GrandTotal     = $input->GrandTotal;

        $debit         =  0;
        $kredit        =  0;


        $this->db->transStart();
        if ($no_obat_in == ''){        

            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Penerimaan Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{           
            ## Seharusnya Posting Sudah Sekali dan Tutup Selamanya, 
            ## Jika Jurnal Boleh diedit maka perlu ditambahkan proses cek id jurnal di gud_obt_in

            //INSERT JURNAL
            $saveJurnal = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$now', '$ket', '$iduser') returning id_jurnal";
            
            $id_jurnal = $this->db->query($saveJurnal)->getRow()->id_jurnal;

            $saveJurnalDet_hutang = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$idacc_hutang', 'Hutang Pembelian Farmasi', '$pbf', '$nmpbf', '$debit','$GrandTotal','$iduser','$now')";
            // echo $saveJurnalDet_hutang;
            // return;
            $this->db->query($saveJurnalDet_hutang);

            $saveJurnalDet_persediaan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$idacc_persediaan', 'Persediaan Farmasi', '$pbf', '$nmpbf', '$GrandTotal','$kredit','$iduser','$now')";
            // echo $saveJurnalDet_persediaan;
            // return;
            $this->db->query($saveJurnalDet_persediaan);

            if ($DiscFaktur > 0){
                $debitDisc      =  0;
                $kreditDisc     =  $GrandDisc;

                $saveJurnalDet_Potongan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$idacc_potongan', 'Potongan Pembelian', '$pbf', '$nmpbf', '$debitDisc','$kreditDisc','$iduser','$now')";

                // echo $saveJurnalDet_Potongan;
                // return;

                $this->db->query($saveJurnalDet_Potongan);

            }

            $update_gud  =" UPDATE gud_obat_in SET posting = 't', stsacc = 't', id_jurnal = '$id_jurnal'
                        WHERE no_obat_in = '$no_obat_in' and tgl_obat_in = '$tglcreate' ";
            $this->db->query($update_gud);
            

        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Posting";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting!!";
        }

        echo json_encode($output);
    }

    public function UnPostingGudangBarangIn()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_obat_in     = $input->no_gud_in;
        $tglcreate      = $input->tglcreate;
        
        $this->db->transStart();
        if ($no_obat_in == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Penerimaan Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{
            $query  =" UPDATE gud_obat_in SET stsentri = 'f'
                        WHERE no_obat_in = '$no_obat_in' and tgl_obat_in = '$tglcreate' ";
            
            $this->db->query($query);
            //echo($this->db->affectedRows());
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di UnPosting";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal UnPosting...";
        }

        echo json_encode($output);
    }

    public function CreateGudangBarangOut()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $pesan = '';
        $no_gud_out     = $input->no_gud_out;
        $unit           = $input->unit;
        $remark         = $input->remark;
        $iduser         = $input->iduser;
        $map_idunit     = $input->map_idunit;
        $tglcreate      = $input->tglcreate;
        $id_farUser     = $input->id_farUser;
        $id_unit        = $input->unit;

        $kd_milik       = $this->cekKdmilikUser($iduser);
        if ($kd_milik == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
            $this->hasil($output);
            return;
        }
        $total          = $input->total;
        
        $this->db->transStart();
        if ($no_gud_out == ''){
            $cekNoOut    = $this->cekNoOut();
            if ($cekNoOut == null){
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Out Belum Tersedia.";
                $this->hasil($output);
                return;
            }
            
            $noobatout   = $cekNoOut;
            
            $query = "INSERT INTO gud_obat_out (no_obat_out, tgl_obat_out, id_unit, id_user, total, remark, id_unit_far) VALUES ('$noobatout', '$tglcreate', '$unit', '$iduser', '$total', '$remark', '$id_farUser')";
            // echo $query;
            // return;
            $pesan = "Simpan Berhasil.";
        }else{
            $noobatout   = $no_gud_out;
            $cek        = "SELECT posting FROM gud_obat_out WHERE no_obat_out = '$noobatout'";

            if ($this->db->simpleQuery($cek)) {
                $row       = $this->db->query($cek)->getRow();
                $posting   = $row->posting;
                if ($posting != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Pengeluaran : ".$noobatout.", Sudah di Posting!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  ="UPDATE gud_obat_out SET
                                --posting = 'f',
                                id_unit = '$unit',
                                remark  = '$remark',
                                total   = '$total'
                            WHERE no_obat_out = '$noobatout' and tgl_obat_out = '$tglcreate' ";
                    //$this->db->simpleQuery($query);
                    $pesan = "Update Berhasil.";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $this->hasil($output);
                return;
            }
        }

        if ($this->db->query($query)){
            $data    = $input->data;
            if ($input->countRow != 0){
                $delete = "DELETE FROM gud_obat_outdet WHERE no_obat_out = '$noobatout'";
                $this->db->query($delete);
                
                for( $i=0; $i < $input->countRow; $i++){
                    $getUrut    = "SELECT MAX(urut) as urut FROM gud_obat_outdet WHERE no_obat_out = '$noobatout'";
                    
                    if ($this->db->simpleQuery($getUrut)) { //true
                        $cekx   = $this->db->query($getUrut)->getResult();
                        $row    = $this->db->query($getUrut)->getRow();
                        if (!empty($cekx)){
                            $x      = $row->urut;
                            $urut   = ((int)$x + 1);
                        }else{
                            $urut   = 1;
                        }
                    }

                    $kd_obat      = $data[$i]->kd_obt;
                    $qtyK         = $data[$i]->qtyK;
                    $hargaSat     = $data[$i]->hargaSat;
                    $batch        = '';
                    $exp          = $data[$i]->exp;
                    $frac         = $data[$i]->frac;
                    
                    if ($exp != ''){
                        $save = "INSERT INTO gud_obat_outdet (no_obat_out, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, urut, harga) VALUES ('$noobatout', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$qtyK', '$urut', '$hargaSat')";
                        // echo $save;
                        // return;
                        $this->db->query($save);

                        $upd_frac  ="UPDATE far_obat SET fraction = '$frac' WHERE kd_obat = '$kd_obat'";
                        $this->db->query($upd_frac);
                    }else{
                        // $output['code']     = "502";
                        $output['status']   = "gagal";
                        $output['pesan']    = "Expired Obat Belum Diisi";
                        $this->hasil($output);
                        return;
                    }
                }

            }else{
                $delete = "DELETE FROM gud_obat_outdet WHERE no_obat_out = '$noobatout'";
                $this->db->query($delete);
            }

        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = $pesan;
            $output['no_gud_out']= $noobatout;
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan!!";
        }

        echo json_encode($output);
    }

    public function PostingGudangBarangOut()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_obat_out    = $input->no_gud_out;
        $tglcreate      = $input->tglcreate;
        $total          = $input->total;
        $iduser         = $input->iduser;

        $this->db->transStart();
        if ($no_obat_out == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Pengeluaran Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{
            $update_gud  =" UPDATE gud_obat_out SET posting = 't' WHERE no_obat_out = '$no_obat_out' and tgl_obat_out = '$tglcreate' ";
            // echo $update_gud;
            // return;
            $this->db->query($update_gud);
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Posting";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting...";
        }

        echo json_encode($output);
    }

    public function UnPostingGudangBarangOut()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_obat_out    = $input->no_gud_out;
        $tglcreate      = $input->tglcreate;
        
        $this->db->transStart();
        if ($no_obat_out == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Pengeluaran Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{           
            $query  =" UPDATE gud_obat_out SET posting = 'f'
                        WHERE no_obat_out = '$no_obat_out' and tgl_obat_out = '$tglcreate' ";
            $this->db->query($query);
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di UnPosting";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting...";
        }

        echo json_encode($output);
    }

    public function LogHapusPenerimaan()
    {
        $input = json_decode(file_get_contents('php://input'));
        
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_gud     = $input->no_gud;
        $kdFar      = $input->kdFar;
        $tglcreate  = $input->tglcreate;
        $iduser     = $input->iduser;
        $idpeg      = $input->idpeg;
        $id_farUser = $input->id_farUser;
        $reason     = $input->reason;
        $GrandTotal = $input->GrandTotal;
        $code       = $input->code;
        
        $this->db->transStart();
        
        if ($code == '01'){ // PENERIMAAN
            $posisi = '4';
            $idunit = $id_farUser;
            $delete = "DELETE FROM gud_obat_in WHERE no_obat_in = '$no_gud' and tgl_obat_in = '$tglcreate'";
            $this->db->query($delete);
        }else if ($code == '02'){ // PENGELUARAN
            $posisi = '5';
            $idunit = $input->idunit;
            
            $cek    = "SELECT id_permintaan FROM gud_obat_out WHERE no_obat_out = '$no_gud' and tgl_obat_out = '$tglcreate'";
            $cekx   = $this->db->query($cek)->getResult();
            if (!empty($cekx)){
                $row       = $this->db->query($cek)->getRow();
                $id_permintaan   = $row->id_permintaan;
                if ($id_permintaan != ''){
                    $update ="  UPDATE order_obat SET
                                    acc         = false,
                                    tgl_acc     = null,
                                    id_useracc  = null,
                                    no_obat_out = null
                                WHERE no_obat_out = '$no_gud' ";
                    $this->db->query($update);

                    $queryUpdateOrderObatDet  = "  UPDATE order_obatdet SET qtyacc = 0 
                                        WHERE id_permintaan = '$id_permintaan'";
                    $this->db->query($queryUpdateOrderObatDet);
                }

                $delete = "DELETE FROM gud_obat_out WHERE no_obat_out = '$no_gud' and tgl_obat_out = '$tglcreate'";
                $this->db->query($delete);

            }else{
                $delete = "DELETE FROM gud_obat_out WHERE no_obat_out = '$no_gud' and tgl_obat_out = '$tglcreate'";
                $this->db->query($delete);
            }

        }else if ($code == '03'){ // PENGELUARAN ACC PERMINTAAN
            $posisi = '11';
            $idunit = $input->idunit;
            $cek    = "SELECT posting FROM gud_obat_out WHERE no_obat_out = '$no_gud'";
            $cekx    = $this->db->query($cek)->getResult();
            if (!empty($cekx)){
                $row       = $this->db->query($cek)->getRow();
                $posting   = $row->posting;
                if ($posting == 't'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal diHapus, Sudah di Posting!!";
                    $this->hasil($output);
                    return;
                }

                $delete = "DELETE FROM gud_obat_out WHERE no_obat_out = '$no_gud'";
                $this->db->query($delete);

                $update  ="UPDATE order_obat SET
                    acc         = false,
                    tgl_acc     = null,
                    id_useracc  = null,
                    no_obat_out = null
                WHERE no_obat_out = '$no_gud' ";
                
                $this->db->query($update);

            }else{

                $update  ="UPDATE order_obat SET
                    acc         = false,
                    tgl_acc     = null,
                    id_useracc  = null,
                    no_obat_out = null
                WHERE no_obat_out = '$no_gud' ";
                $this->db->query($update);

            }
        }

        $save_loghapus = "INSERT INTO log_hapus_resep (id_transaksi, id_user, nominal, alasan, noresep, id_far, id_unit, posisi) VALUES ('$kdFar', '$iduser', '$GrandTotal', '$reason', '$no_gud', '$id_farUser', '$idunit', '$posisi')";
        
        $this->db->query($save_loghapus);
        
        $this->db->transComplete();
        if ($this->db->transStatus()) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Hapus";
            
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal di Hapus";
        }
        
        $this->hasil($output);
    }

    public function LogHapusRetur()
    {
        $input = json_decode(file_get_contents('php://input'));
        
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_retur   = $input->no_retur;
        $kdFar      = $input->kdFar;
        $tglcreate  = $input->tglcreate;
        $iduser     = $input->iduser;
        $idpeg      = $input->idpeg;
        $id_farUser = $input->id_farUser;
        $reason     = $input->reason;
        $GrandTotal = $input->GrandTotal;
        $posisi     = '9';

        $this->db->transStart();
    
        $delete = "DELETE FROM gud_obat_ret WHERE no_ret = '$no_retur' and tgl_ret = '$tglcreate'";
        $this->db->query($delete);
        
        $save_loghapus = "INSERT INTO log_hapus_resep (id_transaksi, id_user, nominal, alasan, noresep, id_far, id_unit, posisi) VALUES ('$kdFar', '$iduser', '$GrandTotal', '$reason', '$no_retur', '$id_farUser', '$id_farUser', '$posisi')";    
        $this->db->query($save_loghapus);
        
        $this->db->transComplete();
        if ($this->db->transStatus()) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Hapus";
            
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal di Hapus";
        }
        
        $this->hasil($output);
    }

    public function pencarian_obatretur()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'pbf',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            
            $pbf = $input->pbf;
            $listObat = $this->db->query("SELECT
                                            no_obat_in,
                                            gud_obat_in_det.kd_obat,
                                            nama_obat,
                                            kd_satuan,
                                            gud_obat_in_det.kd_milik,
                                            urut,
                                            jml_in_obt,
                                            hrg_beli_obt,
                                            gud_obat_in.disc AS discFak,
                                            disc_total,
                                            ppn_item,
                                            ppn_rupiah,
                                            gud_obat_in_det.disc AS disc,
                                            disc_rupiah,
                                            boxqty,
                                            frac,
                                            tag,
                                            tag_disc,
                                            hrg_satuan,
                                            gud_obat_in_det.EXP,
                                            to_char( gud_obat_in_det.EXP, 'YYYY/mm/dd' ),
                                            gin,
                                            gud_obat_in_det.batch 
                                        FROM
                                            gud_obat_in
                                            INNER JOIN gud_obat_in_det USING ( no_obat_in )
                                            INNER JOIN far_obat USING ( kd_obat ) 
                                            INNER JOIN far_stok ON far_stok.id_unit = gud_obat_in.id_unit_far AND far_stok.kd_obat = gud_obat_in_det.kd_obat
                                        WHERE
                                            kd_vendor = '$pbf' 
                                            and posting = 'true'
                                        ORDER BY
                                            urut ASC");

            if ($listObat->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Obat ditemukan
                $output['data']     = $listObat->getResult();
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Obat tidak ditemukan";
                $output['data']     = $listObat->getResult();
                
            }
        }

        $this->hasil($output);
    }

    public function CreateGudangReturBarang()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $pesan = '';
        $no_retur   = $input->no_retur;
        $pbf        = $input->pbf;
        $remark     = $input->remark;
        $iduser     = $input->iduser;
        $tglcreate  = $input->tglcreate;
        $id_farUser = $input->id_farUser;
        $GrandTotal = $input->GrandTotal;
        $GrandPPN   = $input->GrandPPN;

        $kd_milik       = $this->cekKdmilikUser($iduser);
        if ($kd_milik == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
            $this->hasil($output);
            return;
        }
        
        $this->db->transStart();
        if ($no_retur == ''){
            $nomor      = "SELECT MAX(no_ret) as urut FROM gud_obat_ret";
            if ($this->db->simpleQuery($nomor)) { //true
                $cekx   = $this->db->query($nomor)->getResult();
                $row    = $this->db->query($nomor)->getRow();
                if (!empty($cekx)){
                    $x      = $row->urut;
                    $no_returx   = ((int)$x + 1);
                }else{
                    $no_returx   = 1;
                }
            }
            
            $query = "INSERT INTO gud_obat_ret (no_ret, tgl_ret, kd_vendor, remark, id_unit, kd_milik, total, id_user) VALUES ('$no_returx', '$tglcreate', '$pbf', '$remark', '$id_farUser', '$kd_milik', '$GrandTotal', '$iduser')";
            // echo $query;
            // return;
            $pesan = "Simpan Berhasil.";
        }else{
            $no_returx   = $no_retur;
            $cek        = "SELECT posting FROM gud_obat_ret WHERE no_ret = '$no_returx'";

            if ($this->db->simpleQuery($cek)) {
                $row       = $this->db->query($cek)->getRow();
                $posting   = $row->posting;
                if ($posting != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Retur : ".$no_returx.", Sudah di Posting!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  ="UPDATE gud_obat_ret SET
                                --posting     = 'f',
                                kd_vendor   = '$pbf',
                                remark      = '$remark',
                                total       = '$GrandTotal',
                                id_user     = '$iduser'
                            WHERE no_ret = '$no_returx' and tgl_ret = '$tglcreate' ";
                    //$this->db->simpleQuery($query);
                    $pesan = "Update Berhasil.";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $this->hasil($output);
                return;
            }
        }

        if ($this->db->query($query)){
            $data    = $input->data;
            if ($input->countRow != 0){
                $delete = "DELETE FROM gud_obat_retdet WHERE no_ret = '$no_returx'";
                $this->db->simpleQuery($delete);
                
                for( $i=0; $i < $input->countRow; $i++){
                    $getUrut    = "SELECT MAX(urut) as urut FROM gud_obat_retdet WHERE no_ret = '$no_returx'";
                    
                    if ($this->db->simpleQuery($getUrut)) { //true
                        $cekx   = $this->db->query($getUrut)->getResult();
                        $row    = $this->db->query($getUrut)->getRow();
                        if (!empty($cekx)){
                            $x      = $row->urut;
                            $urut   = ((int)$x + 1);
                        }else{
                            $urut   = 1;
                        }
                    }

                    $kd_obat      = $data[$i]->kdobat;
                    $qty_ret      = $data[$i]->qty;
                    $ppn_item     = $data[$i]->ppn;
                    $batch_ret    = $data[$i]->batch;
                    $exp_ret      = $data[$i]->exp;
                    $harga        = $data[$i]->harga;
                    $no_gud_in    = $data[$i]->no_gud_in;
                    $kdmilikObat  = $data[$i]->kdmilik;

                    if (($exp_ret != '')&&($batch_ret != '')){
                        $save = "INSERT INTO gud_obat_retdet (no_ret, tgl_ret, no_obat_in, urut, kd_obat, qty_ret, kd_milik, ppn_item, batch_ret, exp_ret, id_unit, hargasat) VALUES ('$no_returx', '$tglcreate', '$no_gud_in', '$urut', '$kd_obat', '$qty_ret', '$kdmilikObat', '$ppn_item', '$batch_ret', '$exp_ret', '$id_farUser', '$harga')";
                        // echo $save;
                        // return;
                        $this->db->query($save);
                    }else{
                        // $output['code']     = "502";
                        $output['status']   = "gagal";
                        $output['pesan']    = "Expired / Batch Obat Belum Diisi";
                        $this->hasil($output);
                        return;
                    }
                }

            }else{
                $delete = "DELETE FROM gud_obat_retdet WHERE no_ret = '$no_returx'";
                $this->db->query($delete);
            }

        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = $pesan;
            $output['no_retur'] = $no_returx;
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan...";
        }

        echo json_encode($output);
    }

    public function PostingGudangReturBarang()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_retur       = $input->no_retur;
        $tglcreate      = $input->tglcreate;
        $id_gl          = 'RBE'.'-'.$no_retur;
        $ket            = 'Retur Pembelian';
        $jmlh           = $input->GrandTotal;
        $iduser         = $input->iduser;
        $pbf            = $input->pbf;
        $nmpbf          = $this->getVendor($pbf);
        $now            = date('Y-m-d');
        //JURNAL
        // $idacc_hutang          = '85'; // Hutang Pembelian Farmasi
        // $idacc_potongan        = '141'; // Potongan Pembelian / Potongan Faktur (diskon setelah dibayar)
        
        $idacc_persediaan  = '27'; // Persediaan  Farmasi 
        $hpp_penjualan     = '145'; // Harga Pokok Penjualan
        $debit   =  0;
        $kredit  =  0;

        $this->db->transStart();
        if ($no_retur == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Retur Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{

            if (($jmlh == '')||($jmlh == 0)){
                $output['status']   = "gagal";
                $output['pesan']    = "Posting Gagal, Grand Total Masih Kosong !!";
                $this->hasil($output);
                return;
            }else  if ($jmlh < 0){
                $output['status']   = "gagal";
                $output['pesan']    = "Posting Gagal, Grand Total Minus !!";
                $this->hasil($output);
                return;
            }
            ## Seharusnya Posting Sudah Sekali dan Tutup Selamanya, 
            ## Jika Jurnal Boleh diedit maka perlu ditambahkan proses cek id jurnal di gud_obt_in

            //INSERT JURNAL
            $saveJurnal = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$now', '$ket', '$iduser') returning id_jurnal";
            
            $id_jurnal = $this->db->query($saveJurnal)->getRow()->id_jurnal;

            $saveJurnalHPP = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$hpp_penjualan', 'Harga Pokok Penjualan', '$pbf', '$nmpbf', '$jmlh','$kredit','$iduser','$now')";
            // echo $saveJurnalHPP;
            // return;
            $this->db->query($saveJurnalHPP);

            $saveJurnalPersediaan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$idacc_persediaan', 'Persediaan Farmasi', '$pbf', '$nmpbf', '$debit','$jmlh','$iduser','$now')";
            // echo $saveJurnalPersediaan;
            // return;
            $this->db->query($saveJurnalPersediaan);

            $update_gudret  =" UPDATE gud_obat_ret SET posting = 't', id_jurnal = '$id_jurnal'
                        WHERE no_ret = '$no_retur' and tgl_ret = '$tglcreate' ";
            $this->db->query($update_gudret);
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Posting";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting...";
        }

        echo json_encode($output);
    }
    
    public function stockUnit()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $output['data']     = "";
        
        $query = "
            SELECT nama_obat,
            stok_unit,
            kd_satuan,
            TO_CHAR(exp :: DATE, 'dd-mm-yyyy') exp
            FROM far_stok 
            JOIN far_obat USING(kd_obat)
            WHERE id_unit = '".$input->id_unit."'
        ";
        
        $hasil = $this->db->query($query);
        
        if($hasil->getNumRows() > 0){
            $output['status']   = "sukses";
            $output['data']     = $hasil->getResult();
        }else{
            $output['pesan'] = "Stok unit kosong";
        }
        
        echo json_encode($output);
    }

    public function cekAccJurnal()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $iduser = $input->iduser;
    
        $query  = "SELECT * FROM gud_obat_in_acc WHERE id_user = '$iduser' ";
        
        $hasil = $this->db->query($query);
        
        if($hasil->getNumRows() > 0){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['data']     = $hasil->getResult();
        }else{
            $output['code']     = "201";
            $output['status']   = "sukses";
        }

        echo json_encode($output);
    }

    public function gud_stok_opname_showdata()
    {
        $input  = json_decode(file_get_contents('php://input')); 
        $output = array();

        $no_so      = $input->no_so;
        $tglsatu    = $input->tglsatu;
        $tgldua     = $input->tgldua;
        $unit       = $input->unit;
        $jmlh       = $input->jmlh;
        $iduser     = $input->iduser;

        $idFar      = $this->cekIdFarUser($iduser);

        if ($no_so != ''){
            $kondisi1 = "no_so = '$no_so' AND";
        }else{
            $kondisi1 = "";
        }

        if ($unit != ''){
            $kondisi2 = "AND gud_stok_opname.id_unit = '$unit'";
        }else{
            $kondisi2 = "";
        }

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }
        
        $query = "  SELECT
                        no_so,
                        tgl_so,
                        gud_stok_opname.id_unit,
                        nama_unit,
                        nama_pegawai,
                        posting,
                        no_ba_so,
                        ket_so 
                    FROM
                        gud_stok_opname
                        INNER JOIN unit USING ( id_unit )
                        INNER JOIN users USING ( id_user )
                        INNER JOIN pegawai USING ( id_pegawai ) 
                    WHERE
                        $kondisi1 
                        tgl_so BETWEEN '$tglsatu' AND '$tgldua' 
                        $kondisi2 
                        AND gud_stok_opname.id_unit = '$idFar' 
                    ORDER BY
                        tgl_so DESC $limit
                    ";
        
        $hasilQuery         =  $this->db->query($query);
        if ($hasilQuery->getNumRows() > 0){

            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $hasilQuery->getResult();
            $this->hasil($output);
        }else{
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = "";
            $this->hasil($output);
        }
    }

    public function pencarian_obatstkopname()
    {
        $input  = json_decode(file_get_contents('php://input')); 
        $output = array();

        $id_unit    = $input->id_unitFar;
        $kd_milik    = $input->kd_milik;
        $query      = " SELECT
                            id_unit,
                            nama_unit,
                            kd_obat,
                            nama_obat,
                            far_stok.kd_milik,
                            stok_unit,
                            min_stok,
                            batch,
                            exp,
                            -- to_char( exp, 'ddmmYYYY') as re_format,
                            harga_beli,
                            harga_jual,
                            harga as tarif_harga_jual
                        FROM
                            far_stok 
                            INNER JOIN far_obat using(kd_obat)
                            INNER JOIN far_obat_milik using(kd_milik)
                            INNER JOIN unit USING (id_unit)
                            INNER JOIN tarif_obat USING (kd_obat)
                        WHERE
                        id_unit = '$id_unit' AND far_stok.kd_milik = '$kd_milik'
                        ORDER BY nama_obat ASC";
        
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $this->db->query($query)->getResult();
        $output['row']      = $this->db->query($query)->getNumRows();
        $this->hasil($output);
    }

    public function LogHapusStokOpname()
    {
        $input = json_decode(file_get_contents('php://input'));
        
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_so      = $input->no_so;
        $kdFar      = $input->kdFar;
        $tglno_so   = $input->tgl_so;
        $iduser     = $input->iduser;
        $idpeg      = $input->idpeg;
        $id_farUser = $input->id_farUser;
        $reason     = $input->reason;
        $GrandTotal = $input->GrandTotal;
        $id_unit    = $input->id_unit;
        $posisi     = '10';

        $this->db->transStart();
    
        $delete = "DELETE FROM gud_stok_opname WHERE no_so = '$no_so' and tgl_so = '$tglno_so' and posting = 'f' ";
        $this->db->query($delete);
        
        $save_loghapus = "INSERT INTO log_hapus_resep (id_transaksi, id_user, nominal, alasan, noresep, id_far, id_unit, posisi) VALUES ('$kdFar', '$iduser', '$GrandTotal', '$reason', '$no_so', '$id_farUser', '$id_unit', '$posisi')";    
        $this->db->query($save_loghapus);
        
        $this->db->transComplete();
        if ($this->db->transStatus()) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Hapus";
            
        } else {
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal di Hapus";
        }
        
        $this->hasil($output);
    }

    public function gud_so_showdataDetail()
    {
        $input  = json_decode(file_get_contents('php://input')); 
        $output = array();

        $iduser     = $input->iduser;
        $no_so      = $input->no_so;
        $tgl_so     = $input->tgl_so;
        
        //$idFar      = $this->cekIdFarUser($iduser);
        
        $query = "  SELECT
                        * 
                    FROM
                        gud_stok_opname
                        INNER JOIN gud_stok_opnamedet USING ( no_so )
                        INNER JOIN far_obat USING ( kd_obat )
                        INNER JOIN far_obat_milik USING ( kd_milik ) 
                    WHERE
                        no_so = '$no_so' 
                        AND tgl_so = '$tgl_so' 
                    ORDER BY
                        urut_so ASC";

        $hasilQuery         = $this->db->query($query);
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function CreateStokOpname()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $pesan      = '';
        $tglno_so   = $input->tglno_so;
        $no_so      = $input->no_so;
        $id_unit    = $input->id_unit;
        $no_ba_so   = $input->no_ba_so;
        $ket_so     = $input->ket_so;
        $iduser     = $input->iduser;
        $total_harga = $input->GrandTotal;
        
        $this->db->transStart();
        if ($no_so == ''){

            $query = "INSERT INTO gud_stok_opname (tgl_so, no_ba_so, ket_so, id_user, id_unit, total_harga) VALUES ('$tglno_so', '$no_ba_so', '$ket_so', '$iduser', '$id_unit', '$total_harga') returning no_so";
            
            $no_stokopname = $this->db->query($query)->getRow()->no_so;
            $pesan = "Simpan Berhasil.";

        }else{
            $no_stokopname  = $no_so;
            $cek  = " SELECT posting FROM gud_stok_opname WHERE no_so = '$no_stokopname' and tgl_so = '$tglno_so' ";

            if ($this->db->simpleQuery($cek)) {
                $row       = $this->db->query($cek)->getRow();
                $posting   = $row->posting;
                if ($posting == 't'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Stok Opname : ".$no_stokopname.", Sudah di Posting!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  = " UPDATE gud_stok_opname SET
                                    no_ba_so    = '$no_ba_so',
                                    ket_so      = '$ket_so',
                                    total_harga = '$total_harga',
                                    id_user     = '$iduser',
                                    id_unit     = '$id_unit'
                                WHERE no_so = '$no_stokopname' and tgl_so = '$tglno_so' ";
                    $this->db->query($query);

                    $pesan  = "Update Berhasil.";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $this->hasil($output);
                return;
            }
        }

        if ($no_stokopname != ''){
            $data    = $input->data;
            if ($input->countRow != 0){
                $delete = "DELETE FROM gud_stok_opnamedet WHERE no_so = '$no_stokopname'";
                $this->db->query($delete);
                
                for( $i=0; $i < $input->countRow; $i++){
                    $getUrut    = "SELECT MAX(urut_so) as urut FROM gud_stok_opnamedet WHERE no_so = '$no_stokopname'";

                    if ($this->db->simpleQuery($getUrut)) { //true
                        $cekx   = $this->db->query($getUrut)->getResult();
                        $row    = $this->db->query($getUrut)->getRow();
                        if (!empty($cekx)){
                            $x      = $row->urut;
                            $urut   = ((int)$x + 1);
                        }else{
                            $urut   = 1;
                        }
                    }

                    $kd_obat        = $data[$i]->kd_obat;
                    $stok_awal      = $data[$i]->stokUnit;
                    $harga_beli     = $data[$i]->harga_beli;
                    $exp_so         = $data[$i]->exp;
                    $batch_so       = $data[$i]->batch;
                    $stokOpname     = $data[$i]->stokOpname;
                    $stokSelisih    = $data[$i]->stokSelisih;
                    $kd_milik       = $data[$i]->kd_milik;
                    $harga_jual_awal = $data[$i]->harga;

                    // if ($batch_so == ''){
                    //     $output['status']   = "gagal";
                    //     $output['pesan']    = "Batch Obat Kosong!!";
                    //     $this->hasil($output);
                    //     return;
                    // }

                    if ($exp_so == ''){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Expired Obat Kosong!!";
                        $this->hasil($output);
                        return;
                    }

                    $save = "INSERT INTO gud_stok_opnamedet (no_so, id_unit, kd_obat, kd_milik, urut_so, batch_so, exp_so, stok_awal, stok_akhir, harga_beli, harga_jual_awal, stok_selisih) VALUES ('$no_stokopname', '$id_unit', '$kd_obat', '$kd_milik', '$urut', '$batch_so', '$exp_so', '$stok_awal', '$stokOpname', '$harga_beli', '$harga_jual_awal', '$stokSelisih')";
                    
                    $this->db->query($save);
                }

            }else{
                $delete = "DELETE FROM gud_stok_opnamedet WHERE no_so = '$no_stokopname'";
                $this->db->query($delete);
            }

        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = $pesan;
            $output['no_so']    = $no_stokopname;
        }else{
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan...";
        }

        echo json_encode($output);
    }

    public function gud_so_PostingStokOpname()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_so          = $input->no_so;
        $tgl_so         = $input->tgl_so;
        $id_gl          = 'BMS'.'-'.$no_so;
        $ket            = 'Stok Opname';
        $GrandTotal     = $input->GrandTotal;
        $iduser         = $input->iduser;
        $id_unit        = $input->id_unit;
        $nmunit         = $this->getNamaUnit($id_unit);
        $now            = date('Y-m-d');
        
        //JURNAL
        $selisihkurang      = '244';    // D Lebih Kecil dari Stok Unit // Selisih Stok Logistik Medis
        $jurnal_hpp_kurang  = '145';    // K Harga Pokok Penjualan 
        $selisihlebih       = '244';    // K lebih besar dari  stok Unit // Selisih Stok Logistik Medis
        $jurnal_hpp_lebih   = '145';    // D Harga Pokok Penjualan

        $debit   =  0;
        $kredit  =  0;

        $this->db->transStart();
        if ($no_so == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Stok Opname Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{

            if (($GrandTotal == '')||($GrandTotal == 0)){
                $output['status']   = "gagal";
                $output['pesan']    = "Posting Gagal, Grand Total Masih Kosong !!";
                $this->hasil($output);
                return;
            }else  if ($GrandTotal < 0){
                $output['status']   = "gagal";
                $output['pesan']    = "Posting Gagal, Grand Total Minus !!";
                $this->hasil($output);
                return;
            }

            $cekSO      = "SELECT * FROM gud_stok_opname WHERE no_so = '$no_so' and tgl_so = '$tgl_so'";
            $resulcekSO = $this->db->query($cekSO);
            
            if ($resulcekSO->getNumRows() > 0){
                $rowx   = $resulcekSO->getRow();
                $total  = $rowx->total_harga;
                if ($GrandTotal != $total){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Data Tidak Sesuai, Simpan Dahulu!";
                    $this->hasil($output);
                    return;
                }
            }

            $data    = $input->data;            
            if ($input->countRow > 0){
                $saveJurnal = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('$id_gl', '$now', '$ket', '$iduser') returning id_jurnal";                
                $id_jurnal  = $this->db->query($saveJurnal)->getRow()->id_jurnal;

                for( $i=0; $i < $input->countRow; $i++){

                    $kd_obat      = $data[$i]->kd_obat;
                    //$nama_obat    = $this->getNamaObat($kd_obat);
                    $nama_obat    = $data[$i]->nm_obat;
                    $nmpenerima   = $nmunit." - ".$nama_obat;
                    $kd_milik     = $data[$i]->kd_milik;
                    $exp          = $data[$i]->exp;
                    $batch        = $data[$i]->batch;
                    $harga        = $data[$i]->harga;
                    $harga_beli   = $data[$i]->harga_beli;

                    $stokUnit     = $data[$i]->stokUnit;
                    $stokOpname   = $data[$i]->stokOpname;
                    $stokSelisih  = $data[$i]->stokSelisih;

                    $totalHarga   = $stokOpname * $harga;

                    $cekStokUnit = "SELECT * FROM far_stok WHERE id_unit = '$id_unit' and kd_obat = '$kd_obat' and kd_milik = '$kd_milik' and exp = '$exp'";
                    $result = $this->db->query($cekStokUnit);
                    
                    if ($result->getNumRows() > 0){
                        $row = $result->getRow();
                        
                        $updateStokObat = "UPDATE far_stok SET stok_unit = '$stokOpname' WHERE id_unit = '$id_unit' and kd_obat = '$kd_obat' and kd_milik = '$kd_milik' and exp = '$exp'";
                        $this->db->query($updateStokObat);

                        if ($stokOpname < $stokUnit){ //Selisih Obat Lebih Kecil dari Stok Unit
                            
                            $saveJurnalSelisihKurang = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$selisihkurang', 'Selisih Stok Logistik Medis, Kode Obat: $kd_obat', '$id_unit', '$nmpenerima', '$totalHarga','$kredit','$iduser','$now')";
                            $this->db->query($saveJurnalSelisihKurang);

                            $hpp_kurang = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$jurnal_hpp_kurang', 'Harga Pokok Penjualan, Kode Obat: $kd_obat', '$id_unit', '$nmpenerima', '$debit','$totalHarga','$iduser','$now')";
                            $this->db->query($hpp_kurang);
                            
                        }else if ($stokOpname > $stokUnit){ //Selisih Obat Lebih Besar dari Stok Unit!
                            
                            $saveJurnalSelisihLebih = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$selisihlebih', 'Selisih Stok Logistik Medis, Kode Obat: $kd_obat', '$id_unit', '$nmpenerima', '$debit','$totalHarga','$iduser','$now')";
                            $this->db->query($saveJurnalSelisihLebih);

                            $hpp_lebih = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$jurnal_hpp_lebih', 'Harga Pokok Penjualan, Kode Obat: $kd_obat', '$id_unit', '$nmpenerima', '$totalHarga','$kredit','$iduser','$now')";
                            $this->db->query($hpp_lebih);

                        }else if ($stokOpname == $stokUnit){ //Selisih Obat Sama Dengan Stok Unit / Stok Opname 0
                            
                            $saveJurnalStokOpnameKosong = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$selisihlebih', 'Selisih Stok Logistik Medis, Kode Obat: $kd_obat', '$id_unit', '$nmpenerima', '$debit','$totalHarga','$iduser','$now')";
                            $this->db->query($saveJurnalStokOpnameKosong);

                            $hpp_lebih = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '$jurnal_hpp_lebih', 'Harga Pokok Penjualan, Kode Obat: $kd_obat', '$id_unit', '$nmpenerima', '$totalHarga','$kredit','$iduser','$now')";
                            $this->db->query($hpp_lebih);

                        }else{
                            $output['status']   = "gagal";
                            $output['pesan']    = "Tidak diketahui Selisih Obat!";
                            $this->hasil($output);
                            return;
                        }

                    }else{
                        $output['status']   = "gagal";
                        $output['pesan']    = "Stok Obat $nama_obat, Kosong !!";
                        $this->hasil($output);
                        return;
                    }
                    
                }

                $update_so  =" UPDATE gud_stok_opname SET posting = 't', id_jurnal = '$id_jurnal' WHERE no_so = '$no_so' and tgl_so = '$tgl_so' ";
                $this->db->query($update_so);

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Item Obat Masih Kosong!!";
                $this->hasil($output);
                return;
            }
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Posting";
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting...";
        }

        echo json_encode($output);
    }

    public function gud_permintaanObat_showdata()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $nopermint  = $input->noin;
        $tglsatu    = $input->tglsatu;
        $tgldua     = $input->tgldua;
        $unit       = $input->unit;
        $jmlh       = $input->jmlh;
        $iduser     = $input->iduser;
        $posting    = $input->posting;
        $acc        = $input->acc;

        $idFar      = $this->cekIdFarUser($iduser);

        if ($nopermint != ''){
            $kondisi1 = "WHERE id_permintaan = '$nopermint' AND";
        }else{
            $kondisi1 = "WHERE";
        }

        if ($unit == 'listpermintaan'){
            $kondisi2 = "AND id_unit_tujuan = '$idFar' ";
        }else if (($unit > 0)||($unit == 0)){
            $kondisi2 = "AND oba.id_unit = '$idFar'";
        }else{
            $kondisi2 = "";
        }

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }
        
        if ($posting != ''){
            $kondisi3 = "AND oba.posting = '$posting'";
        }else{
            $kondisi3 = "";
        }

        if ($acc != ''){
            $kondisi4 = "AND acc = '$acc'";
        }else{
            $kondisi4 = "";
        }

        $query  = " SELECT 
                        oba.id_permintaan,
                        tgl_permintaan,
                        oba.id_unit,
                        ( SELECT nama_unit FROM unit WHERE id_unit = oba.id_unit :: VARCHAR ) AS nama_unit,
                        id_milik,
                        ( SELECT milik FROM far_obat_milik WHERE kd_milik = oba.id_milik ) AS milik,
                        keterangan,
                        id_unit_tujuan,
                        ( SELECT nama_unit FROM unit WHERE id_unit = oba.id_unit_tujuan :: VARCHAR ) AS nama_unit_tujuan,
                        oba.posting,
                        acc,
                        opr,
                        nama,
                        tgl_acc,
                        id_useracc,
                        no_obat_out,
                        goo.posting as posting_gud
                    FROM order_obat oba
                    INNER JOIN users ON id_user = opr ::INTEGER
                    LEFT JOIN gud_obat_out goo USING (no_obat_out)
                    $kondisi1 tgl_permintaan BETWEEN '$tglsatu' AND '$tgldua' $kondisi2 $kondisi3 $kondisi4 
                    ORDER BY id_permintaan ASC $limit";
        $hasilQuery =  $this->db->query($query);

        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function CreateGudangPermintaanObat()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $pesan = '';
        $id_permintaan  = $input->nopermint;
        $tgl_permintaan = $input->tglcreate;
        $id_unit        = $input->id_farUser;
        $iduser         = $input->iduser;
        $keterangan     = $input->keterangan;
        $id_unit_tujuan = $input->unittujuan;
        $posting        = true;
        $total          = $input->total;

        $id_milik       = $this->cekKdmilikUser($iduser);
        if ($id_milik == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
            $this->hasil($output);
            return;
        }
        
        $this->db->transStart();
        if ($id_permintaan == ''){
            $cekNoOut    = $this->cekNoPermintaan();
            if ($cekNoOut == null){
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Permintaan Belum Tersedia.";
                $this->hasil($output);
                return;
            }
            
            $nopermintaan   = $cekNoOut;
            
            $query = "INSERT INTO order_obat (id_permintaan, tgl_permintaan, id_unit, id_milik, keterangan, id_unit_tujuan, opr) VALUES ('$nopermintaan', '$tgl_permintaan', '$id_unit', '$id_milik', '$keterangan', '$id_unit_tujuan', '$iduser')";
            // echo $query;
            // return;
            $pesan = "Simpan Berhasil.";
        }else{
            $nopermintaan   = $id_permintaan;
            $cek        = "SELECT acc FROM order_obat WHERE id_permintaan = '$nopermintaan'";

            if ($this->db->query($cek)) {
                $row   = $this->db->query($cek)->getRow();
                $acc   = $row->acc;
                if ($acc != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Permintaan : ".$nopermintaan.", Sudah di Acc!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  ="UPDATE order_obat SET
                                keterangan = '$keterangan',
                                id_unit_tujuan = '$id_unit_tujuan',
                                opr = '$iduser'
                            WHERE id_permintaan = '$nopermintaan' and tgl_permintaan = '$tgl_permintaan' ";
                    $pesan = "Update Berhasil.";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $this->hasil($output);
                return;
            }
        }

        if ($this->db->query($query)){
            $data    = $input->data;
            if ($input->countRow != 0){
                $delete = "DELETE FROM order_obatdet WHERE id_permintaan = '$nopermintaan' and tgl_permintaan = '$tgl_permintaan'";
                $this->db->query($delete);
                
                for( $i=0; $i < $input->countRow; $i++){
                    /*
                    $getUrut    = "SELECT MAX(urut) as urut FROM order_obatdet WHERE id_permintaan = '$nopermintaan'";
                    
                    if ($this->db->simpleQuery($getUrut)) { //true
                        $cekx   = $this->db->query($getUrut)->getResult();
                        $row    = $this->db->query($getUrut)->getRow();
                        if (!empty($cekx)){
                            $x      = $row->urut;
                            $urut   = ((int)$x + 1);
                        }else{
                            $urut   = 1;
                        }
                    }*/

                    $kd_obat = $data[$i]->kd_obt;
                    $nmobat  = $data[$i]->nmobat;
                    $qty     = $data[$i]->qtyK;
                    $frac    = $data[$i]->frac;
                    $qtyB    = $data[$i]->qtyB;
                    $exp     = $data[$i]->exp;
                    $ket     = $data[$i]->ket;
                    $harga   = $data[$i]->hargaSat;
                    $total   = $data[$i]->total; //sudah pembulatan

                    if ($exp != ''){
                        $save = "INSERT INTO order_obatdet (id_permintaan, tgl_permintaan, id_milik, kd_obat, qty, frac, qtyb, ket, harga, expired) VALUES ('$nopermintaan', '$tgl_permintaan', '$id_milik', '$kd_obat', '$qty', '$frac', '$qtyB', '$ket', '$harga', '$exp')";
                        $this->db->query($save);

                    }else{
                        $output['status']   = "gagal";
                        $output['pesan']    = "Expired Obat ".$nmobat." Kosong";
                        $this->hasil($output);
                        return;
                    }
                }

            }else{
                $delete = "DELETE FROM order_obatdet WHERE id_permintaan = '$nopermintaan' and tgl_permintaan = '$tgl_permintaan'";
                $this->db->query($delete);
            }

        }
        
        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = $pesan;
            $output['nopermint']= $nopermintaan;
        }else{
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan!!";
        }

        echo json_encode($output);
    }

    public function gud_permintaanObat_showdataDetail()
    {
        $input  = json_decode(file_get_contents('php://input')); 
        $output = array();

        $nopermint      = $input->nopermint;
        $tglpermint     = $input->tglpermint;
        $iduser         = $input->iduser;
        $idunittujuan   = $input->idunittujuan;
        $idFar          = $this->cekIdFarUser($iduser);

        $query = "  SELECT
                        order_obatdet.kd_obat,
                        nama_obat,
                        CASE
                            WHEN kd_sat_besar IS NULL THEN
                            '' ELSE kd_sat_besar 
                        END AS kd_sat_besar,
                        qtyb,
                        frac,
                        qty,
                        qtyacc,
                        ket,
                        CASE    
                            WHEN harga > 0 THEN
                            harga ELSE 0 
                        END AS hargasat,
                        (qty * harga) as totalperitem,
                        expired,
                        CASE
                            WHEN stok_unit IS NULL THEN
                            0 ELSE stok_unit 
                        END AS stok_unit,
                        CASE
                            WHEN stok_unit IS NULL THEN
                            0 ELSE stok_unit - qty
                        END AS sisa_stok 
                    FROM
                        order_obat
                        INNER JOIN order_obatdet USING ( id_permintaan, tgl_permintaan )
                        INNER JOIN far_obat USING ( kd_obat ) 
                        LEFT JOIN far_stok ON far_stok.kd_obat = order_obatdet.kd_obat 
                        AND far_stok.kd_milik = order_obatdet.id_milik 
                        AND far_stok.EXP = order_obatdet.expired 
                        AND far_stok.id_unit = '$idunittujuan' 
                    WHERE
                        id_permintaan = '$nopermint' 
                        AND tgl_permintaan = '$tglpermint' 
                    ORDER BY
                        kd_obat ASC";
        $result = $this->db->query($query)->getResult();                
        if (!empty($result)) { 
            $output['status']   = "sukses";
            $output['pesan']    = "";
            $output['data']     = $result;
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Data Tidak Ditemukan..";
            $output['data']     = "";
        }
        $this->hasil($output);
    }

    public function PostingPermintaanObat()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $nopermint      = $input->nopermint;
        $tglpermint     = $input->tglpermint;
        $total          = $input->total;
        $iduser         = $input->iduser;

        $this->db->transStart();
        if ($nopermint == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Permintaan Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{
            $update  =" UPDATE order_obat SET posting = 't' WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint' ";
            $this->db->query($update);
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Posting";
        }else{
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Posting...";
        }

        echo json_encode($output);
    }

    public function UnPostingPermintaanObat()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $nopermint      = $input->nopermint;
        $tglpermint     = $input->tglpermint;
        $iduser         = $input->iduser;

        $this->db->transStart();
        if ($nopermint == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Permintaan Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{

            $cek        = "SELECT acc FROM order_obat WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint' ";

            if ($this->db->query($cek)) {
                $row   = $this->db->query($cek)->getRow();
                $acc   = $row->acc;
                if ($acc != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Permintaan Obat Sudah di ACC.\nSilahkan Buat Permintaan Obat Baru!";
                    $this->hasil($output);
                    return;
                }

                $update  =" UPDATE order_obat SET posting = 'f' WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint' ";
                $this->db->query($update);
            }
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di UnPosting";
        }else{
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal UnPosting...";
        }

        echo json_encode($output);
    }

    public function DeletePermintaanObat()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";

        $nopermint      = $input->nopermint;
        $tglpermint     = $input->tglpermint;
        $iduser         = $input->iduser;

        $this->db->transStart();
        if ($nopermint == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Nomor Permintaan Tidak di Ketahui.<br>Simpan dahulu, baru Posting !!";
            $this->hasil($output);
            return;
        }else{

            $cek        = "SELECT acc FROM order_obat WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint' ";

            if ($this->db->query($cek)) {
                $row   = $this->db->query($cek)->getRow();
                $acc   = $row->acc;
                if ($acc != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Permintaan Obat Sudah di ACC.\nSilahkan Buat Permintaan Obat Baru!";
                    $this->hasil($output);
                    return;
                }

                $delete  =" DELETE FROM order_obat WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint' ";
                $this->db->query($delete);
            }
        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil di Hapus";
        }else{
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal di Hapus!";
        }

        echo json_encode($output);
    }

    public function CreateGudangACCPermintaanObat()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output['status']   = "gagal";
        $output['pesan']    = "";
        $pesan = '';

        $no_gud_out     = $input->no_gud_out;
        $nopermint      = $input->nopermint;
        $tglpermint     = $input->tglpermint;
        $id_unit        = $input->unit;
        $keterangan     = $input->keterangan;
        $iduser         = $input->iduser;
        $tglcreate      = $input->tglcreate;
        $id_farUser     = $input->id_farUser;
        $id_unit        = $input->unit;

        $kd_milik       = $this->cekKdmilikUser($iduser);
        if ($kd_milik == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "Kepemilikan Obat Belum Di Setting.";
            $this->hasil($output);
            return;
        }

        if ($nopermint == ''){
            $output['status']   = "gagal";
            $output['pesan']    = "No. Permintaan tidak diketahui!";
            $this->hasil($output);
            return;
        }

        $total          = $input->total;
        
        $this->db->transStart();
        if ($no_gud_out == ''){
            $cekNoOut    = $this->cekNoOut();
            if ($cekNoOut == null){
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Out Belum Tersedia.";
                $this->hasil($output);
                return;
            }
            
            $noobatout   = $cekNoOut;
            
            $query = "INSERT INTO gud_obat_out (no_obat_out, tgl_obat_out, id_unit, id_user, total, remark, id_unit_far, id_permintaan) VALUES ('$noobatout', '$tglcreate', '$id_unit', '$iduser', '$total', '$keterangan', '$id_farUser', '$nopermint')";
            
            $queryUpdateOrderObat  = "  UPDATE order_obat SET
                                            acc         = true,
                                            tgl_acc     = '$tglcreate',
                                            id_useracc  = '$iduser',
                                            no_obat_out = '$noobatout'
                                        WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint'";
            $this->db->query($queryUpdateOrderObat);
            
            $queryUpdateOrderObatDet  = "  UPDATE order_obatdet SET qtyacc = 0 
                                        WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint'";
            $this->db->query($queryUpdateOrderObatDet);
            
            $pesan = "Simpan Berhasil.";
        }else{
            $noobatout   = $no_gud_out;
            $cek         = "SELECT posting FROM gud_obat_out WHERE no_obat_out = '$noobatout'";

            if ($this->db->simpleQuery($cek)) {
                $row       = $this->db->query($cek)->getRow();
                $posting   = $row->posting;
                if ($posting != 'f'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Pengeluaran : ".$noobatout.", Sudah di Posting!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  ="UPDATE gud_obat_out SET
                                remark  = '$keterangan',
                                total   = '$total'
                            WHERE no_obat_out = '$noobatout' and tgl_obat_out = '$tglcreate' and id_permintaan = '$nopermint'";
                    
                    $queryUpdateOrderObatDet  = "  UPDATE order_obatdet SET qtyacc = 0 
                                        WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint'";
                    $this->db->query($queryUpdateOrderObatDet);
                    
                    $pesan = "Update Berhasil.";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "";
                $this->hasil($output);
                return;
            }
        }

        if ($this->db->query($query)){
            $data    = $input->data;
            if ($input->countRow != 0){
                $delete = "DELETE FROM gud_obat_outdet WHERE no_obat_out = '$noobatout'";
                $this->db->query($delete);
                
                for( $i=0; $i < $input->countRow; $i++){
                    $getUrut    = "SELECT MAX(urut) as urut FROM gud_obat_outdet WHERE no_obat_out = '$noobatout'";
                    
                    if ($this->db->simpleQuery($getUrut)) { //true
                        $cekx   = $this->db->query($getUrut)->getResult();
                        $row    = $this->db->query($getUrut)->getRow();
                        if (!empty($cekx)){
                            $x      = $row->urut;
                            $urut   = ((int)$x + 1);
                        }else{
                            $urut   = 1;
                        }
                    }
                    
                    $kd_obat      = $data[$i]->kd_obt;
                    $qtyacc       = $data[$i]->qtyacc;
                    $hargaSat     = $data[$i]->hargaSat;
                    $batch        = '';
                    $exp          = $data[$i]->exp;
                    $frac         = $data[$i]->frac;
                    
                    if ($exp != ''){
                        $save = "INSERT INTO gud_obat_outdet (no_obat_out, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, urut, harga) VALUES ('$noobatout', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$qtyacc', '$urut', '$hargaSat')";
                        $this->db->query($save);

                        $queryUpdateOrderObat  = "  UPDATE order_obatdet SET qtyacc = '$qtyacc' 
                                                    WHERE id_permintaan = '$nopermint' and tgl_permintaan = '$tglpermint' and kd_obat = '$kd_obat' and expired = '$exp' ";
                        $this->db->query($queryUpdateOrderObat);
                    }else{
                        $output['status']   = "gagal";
                        $output['pesan']    = "Expired Obat Belum Diisi";
                        $this->hasil($output);
                        return;
                    }
                }

            }else{
                $delete = "DELETE FROM gud_obat_outdet WHERE no_obat_out = '$noobatout'";
                $this->db->query($delete);
            }

        }

        $this->db->transComplete();
        if ($this->db->transStatus()){
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = $pesan;
            $output['no_gud_out']= $noobatout;
        }else{
            //$this->db->transRollback();
            $output['code']     = "500";
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan!!";
        }

        echo json_encode($output);
    }
}

?>