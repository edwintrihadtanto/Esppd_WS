<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_apotek;

class Apotek extends Api {
    
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db =  db_connect();
    }

    public function obatresepRWJ()
    {
        return view('view/modal/apotek/resepRWJ_daftarobat');
    }

    public function pencarian_pasienretur()
    {
        return view('view/modal/apotek/searchPasienFar');
    }

    public function expiredobatresep()
    {
        return view('view/modal/apotek/resepRWJ_expiredObat');
    }

    public function eresepRWI()
    {
        return view('view/modal/apotek/eresepRWI');
    }

    public function resepRWJDokter_input()
    {
        return view('view/modal/apotek/resepRWJDokter_input');
    }
    
    public function erm_eresepGabung()
    {
        return view('view/modal/apotek/erm_eresepIframe');
    }

    public function eresepRWJAPT() // PENERIMAAN ORDER RJ
    {
        return view('view/modal/apotek/eresepRWJAPT');
    }

    public function eresepRWIAPT() // PENERIMAAN ORDER RI
    {
        return view('view/modal/apotek/eresepRWIAPT');
    }

    public function eresepIGDAPT() // PENERIMAAN ORDER IGD
    {
        return view('view/modal/apotek/eresepIGDAPT');
    }

    public function resepRJIGDAPT()
    {
        return view('view/modal/apotek/resepRJIGDAPT');
    }

    public function resepRWIAPT()
    {
        return view('view/modal/apotek/resepRWIFar');
    }
    
    public function returRJIGDAPT()
    {
        return view('view/modal/apotek/returresepRJIGD');
    }

    public function returRIAPT()
    {
        return view('view/modal/apotek/returresepRI');
    }

    public function preview_detailObat()
    {
        return view('view/modal/apotek/erm_eresepRWJ_preview');
    }

    public function preview_detailObatRJRIIGD_APT()
    {
        return view('view/modal/apotek/eresepRWJAPT_preview');
    }

    public function historyorder_eresep()
    {
        return view('view/modal/apotek/historyorder_eresep');
    }
    
    public function template_eresep()
    {
        return view('view/modal/apotek/templateorder_eresep');
    }

    public function riwayatobat_detail()
    {
        return view('view/modal/apotek/riwayatobat_detail');
    }

    public function telaah_ResepObat()
    {
        return view('view/modal/apotek/resepRJIGDRI_telaahresep');
    }

    public function addnewtemplate()
    {
        return view('view/modal/apotek/template_eresep');
    }

    public function addmappingdepo()
    {
        return view('view/modal/apotek/mappingunitdepo');
    }

    public function templateresep_preview_detailObat()
    {
        return view('view/modal/apotek/preview_detailObat_template');
    }

    public function pencarianobat()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'obatcari' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $iduser     = $input->id_user;
            $penjamin   = $input->penjaminpas;
            // $id_far     = $this->cekIdFarUser($iduser);
            $id_unit    = $input->id_unit;
            $id_far     = $this->getMappingUnitDepo($id_unit);
            if (($id_far == '0')||($id_far == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }
            //$margin     = $this->getMargin($penjamin);
            $kd_milik   = $input->kd_milik;
            $margin     = $this->getMargin_denganunit($penjamin, $id_far);

            if ($margin < 0){
                $output['status']   = "gagal";
                $output['pesan']    = "Margin Obat Tidak diKetahui, Cek Setup Penjamin!! ";
                $this->hasil($output);
                return;
            }

            if ($kd_milik == ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Cek Kepemilikan Obat User, di Setup User Modul Farmasi!";
                $this->hasil($output);
                return;
            }

            $query = "  SELECT DISTINCT 
                            kd_obat, nama_obat, 
                            SUM(COALESCE(stok_unit, 0)) as stok_unit, 
                            COALESCE ( harga_beli, 0 ) AS AVGharga_beli, --> // Rata-rata far_stok
                            COALESCE ( harga, 0 ) AS tarif_harga_satuan, --> // BELUM KE MARGIN tarif_obat
                            milik,
                            ( harga * '$margin' ) as harga_jual, --> // SUDAH KE MARGIN tarif_obat
                            --harga as harga_jual,
                            kd_sat_besar,
                            fraction
                        FROM
                            far_obat
                            LEFT JOIN far_stok USING ( kd_obat )
                            LEFT JOIN tarif_obat USING ( kd_obat, kd_milik )
                            LEFT JOIN far_obat_milik USING ( kd_milik )
                        WHERE nama_obat ilike '%$input->obatcari%' and id_unit = '$id_far' AND kd_milik = '$kd_milik'
                        GROUP BY
                        kd_obat, nama_obat, harga, milik, harga_beli
                        ORDER BY nama_obat,stok_unit DESC LIMIT 100";
                        
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                    $output['margin']   = $margin;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                    $output['margin']   = 0;
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function getUnitAPT() 
    {
        $output = array();
        $query = "
            SELECT
                *
            FROM
            unit
            JOIN jenis_unit USING ( jenis_unit )
            WHERE jenis_unit in ('1', '2', '3')
            ORDER BY jenis_unit ASC
        ";
        $hasilQuery =  $this->db->query($query);
        $output['status'] = "sukses";
        $output['pesan'] = "";
        $output['data'] = $hasilQuery->getResult();
        $this->hasil($output);
    }
 
    public function getObat_eresep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'obatcari',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            //$listObat = $this->db->query("SELECT * FROM far_obat WHERE nama_obat like upper('".$input->obatcari."%') ORDER BY nama_obat ASC LIMIT 10");
            $listObat = $this->db->query("SELECT * FROM far_obat ORDER BY nama_obat ASC");

            if ($listObat->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Obat ditemukan
                $output['data']     = $listObat->getResult();
            } else {
                $output['pesan']    = "Obat tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getUnitDepoFarmasi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            
            $id_far = $input->id_unit;
            if ($id_far > 0){
                $kondisi = "AND id_unit != '$input->id_unit'";
            }else{
                $kondisi = "";
            }

            $listUnit = $this->db->query("SELECT * FROM unit WHERE jenis_unit in ('1','2','3','4','5','6','7','8','9')
                $kondisi ORDER BY nama_unit ASC");

            if ($listUnit->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $listUnit->getResult();
            } else {
                $output['pesan']    = "Unit Depo Farmasi tidak ditemukan...";
            }
        }

        $this->hasil($output);
    }

    public function getUnitDepoFarmasi_Tok()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            
            $listUnit = $this->db->query("SELECT id_unit, nama_unit FROM unit WHERE jenis_unit in ('4') AND id_unit in ('4001', '4002', '4003') ORDER BY nama_unit ASC");

            if ($listUnit->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $listUnit->getResult();
            } else {
                $output['pesan']    = "Unit Farmasi tidak ditemukan...";
            }
        }

        $this->hasil($output);
    }

    public function getUnitOrderResep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $idfar       = $input->idfar;

        if ($idfar != ''){
            if ($idfar == '4001'){
                $jenis_unit = '1';
            }else if ($idfar == '4002'){
                $jenis_unit = '2';
            }else if ($idfar == '4003'){
                $jenis_unit = '3';
            }else{
                $jenis_unit = '0';
            }
            
            $listUnit = $this->db->query("SELECT * FROM unit WHERE jenis_unit = '$jenis_unit' ORDER BY nama_unit ASC");

        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Modul Farmasi Tidak diketahui";
            $this->hasil($output);
            return;
        }

        
        if ($listUnit->getNumRows() > 0) {
            $output['status']   = "sukses";
            $output['pesan']    = ""; //Signa ditemukan
            $output['data']     = $listUnit->getResult();
        } else {
            $output['pesan']    = "Unit Depo Farmasi tidak ditemukan...";
        }
    

        $this->hasil($output);
    }

    public function getKepemilikanObat()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            
            $listMilik = $this->db->query("SELECT * FROM far_obat_milik ORDER BY kd_milik ASC");

            if ($listMilik->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $output['data']     = $listMilik->getResult();
            } else {
                $output['pesan']    = "Kepemilikan Obat tidak ditemukan...";
            }
        }

        $this->hasil($output);
    }

    public function getSigna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            
            $listSigna = $this->db->query("SELECT * FROM mapping_signa ORDER BY id_signa ASC");

            if ($listSigna->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Signa ditemukan
                $output['data']     = $listSigna->getResult();
            } else {
                $output['pesan']    = "Signa tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function getJnsRacikan_eresep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            
            $listObat = $this->db->query("SELECT * FROM far_jns_racik");

            if ($listObat->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = ""; //Obat ditemukan
                $output['data']     = $listObat->getResult();
            } else {
                $output['pesan']    = "Obat tidak ditemukan";
            }
        }

        $this->hasil($output);
    }

    public function resepRWJDokter_listpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            $tglkunjawal= $input->tglkunj;
            $tglkunjakhr= $input->tglkunj;
            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND k.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }

            $query = "
                SELECT
                    k.id_kunjungan,
                    tr.id_transaksi,
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
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,
                    jam_masuk
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi  and penjamin_utama = true
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                WHERE
                    LEFT (k.id_unit, 1) IN ('1', '7')   -->> Rawat Jalan
                    AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(tr.tgl_transaksi) BETWEEN '".$tglkunjawal."' AND '".$tglkunjakhr."'
                    AND tgl_tutup IS NULL
                    $konidisi1
                    $konidisi2
                ";

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

    public function resepRWIDokter_listpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            $tglkunjawal= $input->tglkunj;
            $tglkunjakhr= $input->tglkunj;
            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND k.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }

            $query = "
                SELECT
                    k.id_kunjungan,
                    tr.id_transaksi,
                    DATE(tr.tgl_transaksi) as tgl_transaksi,
                    k.id_unit,
                    u.nama_unit || ' / ' || nama_kamar as nama_unit,
                    tr.no_rm,
                    UPPER(P.nama) as nama,
                    UPPER(P.alamat) as alamat,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,
                    jam_masuk
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi and posting = false
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and penjamin_utama = true
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    LEFT JOIN kamar kam ON kam.id_kamar = K.id_kamar
                    LEFT JOIN ruang_inap rip ON rip.id_ruang = kam.id_ruang 
                WHERE
                    LEFT (k.id_unit, 1) = '2'   -->> Rawat Inap
                    AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(tr.tgl_transaksi) BETWEEN '".$tglkunjawal."' AND '".$tglkunjakhr."'
                    AND K.aktif = 'true'
                    AND tgl_tutup IS NULL
                    $konidisi1
                    $konidisi2
                ";

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

    public function resepIGDDokter_listpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            $tglkunjawal= $input->tglkunj;
            $tglkunjakhr= $input->tglkunj;
            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND k.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }

            $query = "
                SELECT
                    k.id_kunjungan,
                    tr.id_transaksi,
                    DATE(tr.tgl_transaksi) as tgl_transaksi,
                    k.id_unit,
                    u.nama_unit,
                    tr.no_rm,
                    UPPER(P.nama) as nama,
                    UPPER(P.alamat) as alamat,
                    P.telepon,
                    pt.no_sjp,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,
                    jam_masuk
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and penjamin_utama = true
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                WHERE
                    LEFT (k.id_unit, 1) = '3'   -->> Rawat IGD
                    AND upper(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(tr.tgl_transaksi) BETWEEN '".$tglkunjawal."' AND '".$tglkunjakhr."' 
                    AND tgl_tutup IS NULL
                    $konidisi1
                    $konidisi2
                ";
                
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

    public function eresepRjRiIGD_listorder()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $noorder    = $input->noorder;
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $tglorder1  = $input->tglorder1;
            $tglorder2  = $input->tglorder2;
            
            $stsorder   = $input->stsorder;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            if (($noorder == '') || ($noorder == '0')){
                $konidisi = '';
            }else{
                $konidisi = "ord.id_order = '".$noorder."' AND";
            }

            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND k.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }
            
            $idfar = $input->idfar;

            $query = "
                SELECT
                    tr.id_transaksi,
                    tr.tgl_tutup,
                    ord.id_kunjungan,
                    tgl_masuk,
                    ord.id_order,
                    ord.id_unit,
                    nama_unit,
                    ord.id_pegawai,
                    nama_pegawai,
                    cat_diagnosa,
                    cat_iter,
                    order_mng,
                    tglorder,
                    tr.no_rm,
                    nama,
                    telepon,
                    tgl_lahir,
                    -- penj.id_penjamin,
                    -- penj.nama_penjamin,
                    -- no_sjp,
                    ord.dilayani,
                    foo.dilayani as dilayaniFar
                FROM
                    order_resep ord
                    INNER JOIN kunjungan k ON ord.id_kunjungan = k.id_kunjungan
                    INNER JOIN transaksi tr ON  k.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    -- INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    -- INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg ON peg.id_pegawai = ord.id_pegawai
                    LEFT JOIN far_obat_out  foo ON foo.id_order = ord.id_order
                WHERE
                    $konidisi
                    UPPER(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(ord.tglorder) BETWEEN '".$tglorder1."' AND '".$tglorder2."'
                    AND ord.order_mng = 't' 
                    AND ord.dilayani = '".$stsorder."' 
                    $konidisi1
                    AND ord.id_far = '".$idfar."' 
                ORDER BY
                    tglorder DESC $konidisi2";
            // echo $query;
            // return;    
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

    public function eresepRWI_listorder()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $noorder    = $input->noorder;
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $tglorder1  = $input->tglorder1;
            $tglorder2  = $input->tglorder2;
            
            $stsorder   = $input->stsorder;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            if (($noorder == '') || ($noorder == '0')){
                $konidisi = '';
            }else{
                $konidisi = "ord.id_order = '".$noorder."' AND";
            }

            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND k.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }
            $idfar = '4002';
            $query = "
                SELECT
                    tr.id_transaksi,
                    tr.tgl_tutup,
                    ord.id_kunjungan,
                    tgl_masuk,
                    ord.id_order,
                    ord.id_unit,
                    nama_unit,
                    ord.id_pegawai,
                    nama_pegawai,
                    cat_diagnosa,
                    cat_iter,
                    order_mng,
                    tglorder,
                    tr.no_rm,
                    nama,
                    telepon,
                    tgl_lahir,
                    -- penj.id_penjamin,
                    -- penj.nama_penjamin,
                    -- no_sjp,
                    ord.dilayani,
                    foo.dilayani as dilayaniFar
                FROM
                    order_resep ord
                    INNER JOIN kunjungan k ON ord.id_kunjungan = k.id_kunjungan
                    INNER JOIN transaksi tr ON  k.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    -- INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    -- INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg ON peg.id_pegawai = ord.id_pegawai
                    LEFT JOIN far_obat_out  foo ON foo.id_order = ord.id_order
                WHERE
                    $konidisi
                    UPPER(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(ord.tglorder) BETWEEN '".$tglorder1."' AND '".$tglorder2."'
                    AND ord.order_mng = '".$stsorder."' 
                    $konidisi1
                    AND ord.id_far = '".$idfar."'
                ORDER BY
                    tglorder DESC $konidisi2";
            // echo $query;
            // return;    
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

    public function resepRWJ_listapotek()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noresep', 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $noresep    = $input->noresep;
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $tglresep1  = $input->tglresep1;
            $tglresep2  = $input->tglresep2;
            
            $stsdilayni = $input->stsdilayni;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            if (($noresep == '') || ($noresep == '0')){
                $konidisi = '';
            }else{
                $konidisi = "noresep = '".$noresep."' AND";
            }

            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND foo.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }

            if ($stsdilayni == '-'){
                $konidisi3 = '';
            }else{
                $konidisi3 = "AND foo.dilayani = '".$stsdilayni."'";
            }

            $idfar = $input->idfar;
            if (($idfar == '0')||($idfar == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }else{
                if ($idfar == '4001'){
                    $jenis_unit = "jenis_unit IN ('1', '4') AND";
                }else if ($idfar == '4003'){
                    $jenis_unit = "jenis_unit IN ('3', '4') AND";
                }else{
                    $jenis_unit = "jenis_unit = '0' AND"; 
                    $output['status']   = "gagal";
                    $output['pesan']    = "Cek Modul, Ini Modul Rawat Jalan / Gawat Darurat!";
                    $this->hasil($output);
                    return;
                }
            }
            $query = "
                SELECT
                    tr.id_transaksi,
                    tr.tgl_tutup,
                    foo.id_kunjungan,
                    tgl_masuk,
                    foo.noresep,
                    foo.id_unit,
                    nama_unit,
                    foo.id_pegawai,
                    nama_pegawai,
                    cat_alergi,
                    tglresep,
                    tr.no_rm,
                    p.nama,
                    telepon,
                    tgl_lahir,
                    foo.dilayani,
                    id_order,
                    liveresep,
                    id_kunjungan_far,
                    bystatus
                FROM
                    far_obat_out foo
                    INNER JOIN kunjungan K ON foo.id_kunjungan = K.id_kunjungan
                    INNER JOIN transaksi tr ON K.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien p ON tr.no_rm = p.no_rm
                    INNER JOIN unit u ON u.id_unit = K.id_unit 
                    INNER JOIN pegawai peg ON peg.id_pegawai = foo.id_pegawai
                    LEFT JOIN far_bridge fb USING (noresep, tglresep)
                WHERE
                    $jenis_unit
                    $konidisi
                    UPPER(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(tglresep) BETWEEN '".$tglresep1."' AND '".$tglresep2."'
                    $konidisi3 
                    $konidisi1
                    AND id_far = '$idfar'
                ORDER BY
                    tglresep DESC $konidisi2";
            // echo $query;
            // return;    
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

    public function resepRWI_listapotek()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noresep', 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $noresep    = $input->noresep;
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $tglresep1  = $input->tglresep1;
            $tglresep2  = $input->tglresep2;
            
            $stsdilayni = $input->stsdilayni;
            $poli       = $input->poli;
            $jml        = $input->jmlh;
            if (($noresep == '') || ($noresep == '0')){
                $konidisi = '';
            }else{
                $konidisi = "noresep = '".$noresep."' AND";
            }

            if (($poli == '') || ($poli == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "AND foo.id_unit = '".$poli."'";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi2 = '';
            }else{
                $konidisi2 = "LIMIT '".$jml."'";
            }

            if ($stsdilayni == '-'){
                $konidisi3 = '';
            }else{
                $konidisi3 = "AND foo.dilayani = '".$stsdilayni."'";
            }

            $idfar = $input->idfar;
            if (($idfar == '0')||($idfar == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }else{
                
                if ($idfar == '4002'){
                    $jenis_unit = "jenis_unit IN ('2', '4') AND";               
                }else{
                    $jenis_unit = "jenis_unit = '0' AND"; 
                    $output['status']   = "gagal";
                    $output['pesan']    = "Cek Modul, Ini Modul Rawat Inap!";
                    $this->hasil($output);
                    return;
                }

            }

            $query = "
                SELECT
                    tr.id_transaksi,
                    tr.tgl_tutup,
                    foo.id_kunjungan,
                    tgl_masuk,
                    foo.noresep,
                    foo.id_unit,
                    nama_unit,
                    foo.id_pegawai,
                    nama_pegawai,
                    cat_alergi,
                    tglresep,
                    tr.no_rm,
                    nama,
                    telepon,
                    tgl_lahir,
                    foo.dilayani,
                    id_order,
                    liveresep,
                    id_kunjungan_far
                FROM
                    far_obat_out foo
                    INNER JOIN kunjungan K ON foo.id_kunjungan = K.id_kunjungan
                    INNER JOIN transaksi tr ON K.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien p ON tr.no_rm = p.no_rm
                    INNER JOIN unit u ON u.id_unit = K.id_unit 
                    INNER JOIN pegawai peg ON peg.id_pegawai = foo.id_pegawai 
                WHERE
                    $jenis_unit
                    $konidisi
                    UPPER(p.nama) like UPPER('".$nmapasien."%') AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(tglresep) BETWEEN '".$tglresep1."' AND '".$tglresep2."'
                    $konidisi3 
                    $konidisi1
                    AND id_far = '$idfar'
                ORDER BY
                    tglresep DESC $konidisi2";
            // echo $query;
            // return;    
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

    public function getPenjamin_pasien_RWJAPT()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_transaksi' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            
            $id_transaksi    = $input->id_transaksi;
            
            $query = "
                    SELECT
                        tr.no_rm,
                        penj.id_penjamin,
                        penj.nama_penjamin,
                        no_sjp 
                    FROM
                        transaksi tr
                        INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi and pt.penjamin_utama = true
                        INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    WHERE
                        tr.id_transaksi = '".$id_transaksi."'";
               
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();

                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                    
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Penjamin Tidak Ditemukan!!";                   
                }
            } else {
                $output['status']   = 'gagal';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function getListPenjamin()
    {
        $query = "SELECT * FROM penjamin ORDER BY id_penjamin";
        
        $output['status']       = "sukses";
        $output['pesan']        = "";
        $output['data']         = $this->db->query($query)->getResult();

        echo json_encode($output);
    }

    public function getData_erm_eresepGab()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunj', 'tgl_kunj', 'tglorder' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idresep   = $input->idresep;
            $id_kunj   = $input->id_kunj;
            $tgl_kunj  = $input->tglorder;
            $tglorder  = $input->tglorder; //BIASANYA HARI SEKARANNG            
            if ($id_kunj != '' ){ 
                
                if ($idresep != ''){
                    $query    = "SELECT * FROM order_resep LEFT JOIN pegawai USING (id_pegawai) WHERE id_order = '".$idresep."' AND id_kunjungan = '".$id_kunj."' AND tglorder = '".$tglorder."' ORDER BY id_order ASC";
                }else{
                    $query    = "SELECT * FROM order_resep LEFT JOIN pegawai USING (id_pegawai) WHERE id_kunjungan = '".$id_kunj."' AND tglorder = '".$tglorder."' AND dilayani = 0 ORDER BY id_order";
                }
                // echo $query;
                // return;
                $hasil = $this->db->query($query);
                if ($hasil->getNumRows() > 0) {
                    $row        = $this->db->query($query)->getRow();
                    $dilayani   = $row->dilayani;

                    if ($dilayani != 0){
                        // $output['status']   = "gagal";
                        // $output['pesan']    = "Order Resep Sudah Dilayani Apotik!!";
                        
                        $output['code']     = "500";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        $this->hasil($output);
                        return;
                    }else{

                        $id_order   = $row->id_order;
                        $query_detJadi  = " SELECT * FROM
                                                order_resepdet ord 
                                                INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
                                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                            WHERE
                                                id_order = '".$id_order."' 
                                                AND tgl_order = '".$tglorder."' 
                                                AND jns_racikan = '0' 
                                            ORDER BY
                                                urut ASC";

                        $GroupRacik     = " SELECT
                                                jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            FROM
                                                order_resepdet ord 
                                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                            WHERE
                                                id_order = '".$id_order."' 
                                                AND tgl_order = '".$tglorder."' 
                                                AND jns_racikan != '0' 
                                            GROUP BY
                                                id_order, tgl_order, jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            ORDER BY jns_racikan ASC";
                        
                        if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                            $query_detRacik = " SELECT * FROM
                                                order_resepdet ord 
                                                INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
                                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                            WHERE
                                                id_order = '".$id_order."' 
                                                AND tgl_order = '".$tglorder."' 
                                                AND jns_racikan != '0' 
                                            ORDER BY
                                                urut ASC";
                            $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                        }
                        
                        // echo $query_detRacik;
                        // return;
                        $output['code']         = "200";
                        $output['status']       = "sukses";
                        $output['pesan']        = "Order Resep ditemukan.";
                        $output['data']         = $hasil->getResult();
                        $output['count']        = $hasil->getNumRows();
                        $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                        $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                        
                    }

                }else{
                    $output['code']     = "501";
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                }
            }
        }
        $this->hasil($output);
    }

    public function getData_OrderEresepRWJAPT()
    {
        //sleep(10);
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunj', 'tgl_kunj', 'tglorder' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idresep   = $input->idresep;
            $id_kunj   = $input->id_kunj;
            $tgl_kunj  = $input->tglorder;
            $tglorder  = $input->tglorder; //BIASANYA HARI SEKARANNG       

            if ($id_kunj != '' ){ 
                
                if ($idresep != ''){
                    $cekAdaTidak    = "SELECT * FROM far_obat_out WHERE id_order = '$idresep'";
                    $q = $this->db->query($cekAdaTidak);
                    if ($q->getNumRows() > 0){
                        $rowq  = $this->db->query($cekAdaTidak)->getRow();
                        
                        $output['code']     = "202";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        $output['noresep']  = $rowq->noresep;
                        $output['tglresep'] = $rowq->tglresep;
                        $this->hasil($output);
                        return;
                    }else{
                        $query    = "SELECT * FROM order_resep WHERE id_order = '".$idresep."' AND id_kunjungan = '".$id_kunj."' AND tglorder = '".$tglorder."' ORDER BY id_order ASC LIMIT 1";   
                    }

                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Order Resep Tidak Diketahui!!";
                    $this->hasil($output);
                    return;
                }
                // echo $query;
                // return;
                $hasil = $this->db->query($query);
                if ($hasil->getNumRows() > 0) {

                    $row        = $this->db->query($query)->getRow();
                    $dilayani   = $row->dilayani;
                    $id_far     = $row->id_far;
                    if (($id_far == '0')||($id_far == 'null')){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                        $this->hasil($output);
                        return;
                    }

                    $id_transaksi   = $input->id_transaksi;
                    $margin         = $this->getPenjamin_pasien($id_transaksi, $id_far);

                    if ($dilayani != 0){
                        $output['code']     = "501";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        // $this->hasil($output);
                        // return;
                    }else{

                        $id_order   = $row->id_order;
                        $query_detJadi  = " SELECT
                                                * ,
                                                ( harga * '$margin' ) as harga_jual,
                                                ( harga * '$margin' )* jumlah as total_harga
                                            FROM
                                                order_resepdet ord
                                                JOIN far_obat fo USING (kd_obat)
                                                JOIN mapping_signa ms USING (id_signa)
                                                JOIN tarif_obat USING (kd_obat)
                                            WHERE
                                                id_order = '$id_order' 
                                                AND tgl_order = '$tglorder' 
                                                AND jns_racikan = '0' 
                                            ORDER BY
                                                urut ASC
                                            ";

                        $GroupRacik     = " SELECT
                                                jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            FROM
                                                order_resepdet ord 
                                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                            WHERE
                                                id_order = '".$id_order."' 
                                                AND tgl_order = '".$tglorder."' 
                                                AND jns_racikan != '0' 
                                            GROUP BY
                                                id_order, tgl_order, jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            ORDER BY jns_racikan ASC";
                        
                        if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                            $query_detRacik = " SELECT
                                                    * ,
                                                    ( harga * '$margin' ) as harga_jual,
                                                    ( harga * '$margin' )* jumlah as total_harga
                                                FROM
                                                    order_resepdet ord
                                                    JOIN far_obat fo USING (kd_obat)
                                                    JOIN mapping_signa ms USING (id_signa)
                                                    JOIN tarif_obat USING (kd_obat)
                                                WHERE
                                                    id_order = '$id_order' 
                                                    AND tgl_order = '$tglorder' 
                                                    AND jns_racikan != '0' 
                                                ORDER BY
                                                    urut ASC";
                            $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                        }
                        
                        // echo $query_detRacik;
                        // return;
                        $output['code']         = "200";
                        $output['status']       = "sukses";
                        $output['pesan']        = "Data ditemukan.";
                        $output['data']         = $hasil->getResult();
                        $output['count']        = $hasil->getNumRows();
                        $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                        $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                        
                    }

                }else{
                    $output['code']     = "500";
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                }
            }
        }
        $this->hasil($output);
    }

    public function getData_OrderEresepRWIAPT()
    {
        //sleep(10);
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunj', 'tgl_kunj', 'tglorder' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idresep   = $input->idresep;
            $id_kunj   = $input->id_kunj;
            $tgl_kunj  = $input->tglorder;
            $tglorder  = $input->tglorder; //BIASANYA HARI SEKARANNG       

            if ($id_kunj != '' ){ 
                
                if ($idresep != ''){
                    $cekAdaTidak    = "SELECT * FROM far_obat_out WHERE id_order = '$idresep'";
                    $q = $this->db->query($cekAdaTidak);
                    if ($q->getNumRows() > 0){
                        $rowq  = $this->db->query($cekAdaTidak)->getRow();
                        
                        $output['code']     = "202";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        $output['noresep']  = $rowq->noresep;
                        $output['tglresep'] = $rowq->tglresep;
                        $this->hasil($output);
                        return;
                    }else{
                        $query    = "SELECT * FROM order_resep WHERE id_order = '".$idresep."' AND id_kunjungan = '".$id_kunj."' AND tglorder = '".$tglorder."' ORDER BY id_order ASC LIMIT 1";   
                    }

                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Order Resep Tidak Diketahui!!";
                    $this->hasil($output);
                    return;
                }
                // echo $query;
                // return;
                $hasil = $this->db->query($query);
                if ($hasil->getNumRows() > 0) {

                    $row        = $this->db->query($query)->getRow();
                    $dilayani   = $row->dilayani;
                    $id_far     = $row->id_far;
                    if (($id_far == '0')||($id_far == 'null')){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                        $this->hasil($output);
                        return;
                    }

                    $id_transaksi   = $input->id_transaksi;
                    $margin         = $this->getPenjamin_pasien($id_transaksi, $id_far);

                    if ($dilayani != 0){
                        $output['code']     = "501";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        // $this->hasil($output);
                        // return;
                    }else{

                        $id_order   = $row->id_order;
                        $query_detJadi  = " SELECT
                                                * ,
                                                ( harga * '$margin' ) as harga_jual,
                                                ( harga * '$margin' )* jumlah as total_harga
                                            FROM
                                                order_resepdet ord
                                                JOIN far_obat fo USING (kd_obat)
                                                JOIN mapping_signa ms USING (id_signa)
                                                JOIN tarif_obat USING (kd_obat)
                                            WHERE
                                                id_order = '$id_order' 
                                                AND tgl_order = '$tglorder' 
                                                AND jns_racikan = '0' 
                                            ORDER BY
                                                urut ASC
                                            ";

                        $GroupRacik     = " SELECT
                                                jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            FROM
                                                order_resepdet ord 
                                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                            WHERE
                                                id_order = '".$id_order."' 
                                                AND tgl_order = '".$tglorder."' 
                                                AND jns_racikan != '0' 
                                            GROUP BY
                                                id_order, tgl_order, jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            ORDER BY jns_racikan ASC";
                        
                        if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                            $query_detRacik = " SELECT
                                                    * ,
                                                    ( harga * '$margin' ) as harga_jual,
                                                    ( harga * '$margin' )* jumlah as total_harga
                                                FROM
                                                    order_resepdet ord
                                                    JOIN far_obat fo USING (kd_obat)
                                                    JOIN mapping_signa ms USING (id_signa)
                                                    JOIN tarif_obat USING (kd_obat)
                                                WHERE
                                                    id_order = '$id_order' 
                                                    AND tgl_order = '$tglorder' 
                                                    AND jns_racikan != '0' 
                                                ORDER BY
                                                    urut ASC";
                            $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                        }
                        
                        // echo $query_detRacik;
                        // return;
                        $output['code']         = "200";
                        $output['status']       = "sukses";
                        $output['pesan']        = "Data ditemukan.";
                        $output['data']         = $hasil->getResult();
                        $output['count']        = $hasil->getNumRows();
                        $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                        $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                        
                    }

                }else{
                    $output['code']     = "500";
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                }
            }
        }
        $this->hasil($output);
    }

    public function getData_OrderEresepIGDAPT()
    {
        //sleep(10);
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunj', 'tgl_kunj', 'tglorder' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idresep   = $input->idresep;
            $id_kunj   = $input->id_kunj;
            $tgl_kunj  = $input->tglorder;
            $tglorder  = $input->tglorder; //BIASANYA HARI SEKARANNG       

            if ($id_kunj != '' ){ 
                
                if ($idresep != ''){
                    $cekAdaTidak    = "SELECT * FROM far_obat_out WHERE id_order = '$idresep'";
                    $q = $this->db->query($cekAdaTidak);
                    if ($q->getNumRows() > 0){
                        $rowq  = $this->db->query($cekAdaTidak)->getRow();
                        
                        $output['code']     = "202";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        $output['noresep']  = $rowq->noresep;
                        $output['tglresep'] = $rowq->tglresep;
                        $this->hasil($output);
                        return;
                    }else{
                        $query    = "SELECT * FROM order_resep WHERE id_order = '".$idresep."' AND id_kunjungan = '".$id_kunj."' AND tglorder = '".$tglorder."' ORDER BY id_order ASC LIMIT 1";   
                    }

                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Nomor Order Resep Tidak Diketahui!!";
                    $this->hasil($output);
                    return;
                }
                // echo $query;
                // return;
                $hasil = $this->db->query($query);
                if ($hasil->getNumRows() > 0) {

                    $row        = $this->db->query($query)->getRow();
                    $dilayani   = $row->dilayani;
                    $id_far     = $row->id_far;
                    if (($id_far == '0')||($id_far == 'null')){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                        $this->hasil($output);
                        return;
                    }

                    $id_transaksi   = $input->id_transaksi;
                    $margin         = $this->getPenjamin_pasien($id_transaksi, $id_far);
                    
                    if ($dilayani != 0){
                        $output['code']     = "501";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        // $this->hasil($output);
                        // return;
                    }else{
                        $id_order       = $row->id_order;
                        $query_detJadi  = " SELECT
                                                * ,
                                                --(jumlah * harga) as total_harga
                                                ( harga * '$margin' ) as harga_jual,
                                                ( harga * '$margin' )* jumlah as total_harga
                                            FROM
                                                order_resepdet ord
                                                JOIN far_obat fo USING (kd_obat)
                                                JOIN mapping_signa ms USING (id_signa)
                                                JOIN tarif_obat USING (kd_obat)
                                            WHERE
                                                id_order = '$id_order' 
                                                AND tgl_order = '$tglorder' 
                                                AND jns_racikan = '0' 
                                            ORDER BY
                                                urut ASC
                                            ";

                        $GroupRacik     = " SELECT
                                                jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            FROM
                                                order_resepdet ord 
                                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                            WHERE
                                                id_order = '".$id_order."' 
                                                AND tgl_order = '".$tglorder."' 
                                                AND jns_racikan != '0' 
                                            GROUP BY
                                                id_order, tgl_order, jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                            ORDER BY jns_racikan ASC";
                        
                        if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                            $query_detRacik = " SELECT
                                                    * ,
                                                    --(jumlah * harga) as total_harga
                                                    ( harga * '$margin' ) as harga_jual,
                                                    ( harga * '$margin' )* jumlah as total_harga
                                                FROM
                                                    order_resepdet ord
                                                    JOIN far_obat fo USING (kd_obat)
                                                    JOIN mapping_signa ms USING (id_signa)
                                                    JOIN tarif_obat USING (kd_obat)
                                                WHERE
                                                    id_order = '$id_order' 
                                                    AND tgl_order = '$tglorder' 
                                                    AND jns_racikan != '0' 
                                                ORDER BY
                                                    urut ASC";
                            $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                        }
                        
                        // echo $query_detRacik;
                        // return;
                        $output['code']         = "200";
                        $output['status']       = "sukses";
                        $output['pesan']        = "Data ditemukan.";
                        $output['data']         = $hasil->getResult();
                        $output['count']        = $hasil->getNumRows();
                        $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                        $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                        
                    }

                }else{
                    $output['code']     = "500";
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                }
            }
        }
        $this->hasil($output);
    }
    
    public function getData_historiOrderEresep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunj', 'tgl_kunj', 'tglorder' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id_kunj   = $input->id_kunj;
            $tgl_kunj  = $input->tglorder;
            $tglorder  = $input->tglorder; //BIASANYA HARI SEKARANNG            
            $query_detJadi  = " SELECT * FROM order_resep re inner join 
                                order_resepdet ord on re.id_order=ord.id_order
                                INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
                                INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa where re.id_kunjungan='".$id_kunj."'";

            if ($this->db->query($query_detJadi)->getResult()>0) {
                
                        $output['code']     = "200";
                        $output['status']   = "sukses";
                        $output['pesan']    = '';
                        $output['data']     = $this->db->query($query_detJadi)->getResult();
            } else {
                        $output['code']      = "201";
                        $output['status']   = "gagal";

                        $output['pesan']    = '';
            }    
            echo json_encode($output);   
        }
    }

    public function getPenjamin_pasien($id_transaksi, $id_far)
    {
        $query = "SELECT
                    tr.no_rm,
                    penj.id_penjamin,
                    penj.nama_penjamin,
                    no_sjp 
                FROM
                    transaksi tr
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                WHERE
                    tr.id_transaksi = '".$id_transaksi."'";
        $row = $this->db->query($query)->getRow();
        $penjamin   = $row->id_penjamin;

        $margin = $this->getMargin_denganunit($penjamin, $id_far);
        return $margin;
    }

    /*    
        Di Pakai bersama Tarif Obat berdasarkan tabel tarif_obat yg belum dimargin 
    */    
    public function getData_eresepRWJAPT() 
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noresep', 'id_kunj', 'id_unit', 'norm', 'tgl_resep' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $iduser     = $input->iduser;
            $noresep    = $input->noresep;
            $id_kunj    = $input->id_kunj;
            $id_unit    = $input->id_unit;
            /*$gekIdFar   = " SELECT 
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                    WHEN jenis_unit = '4' THEN '0'
                                END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
            $getrowkIdFar  = $this->db->query($gekIdFar)->getRow();
            $idfar         = $getrowkIdFar->id_far;*/
            $idfar     = $this->getMappingUnitDepo($id_unit);
            if (($idfar == '0')||($idfar == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }
            $norm       = $input->norm;
            $tgl_kunj   = $input->tgl_kunj;
            $tglresep   = $input->tgl_resep;
            $id_transaksi   = $input->id_transaksi;
            $margin         = $this->getPenjamin_pasien($id_transaksi, $idfar);
            
            if ($noresep != ''){
                if ($idfar != '0'){
                    $query    = "SELECT * FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$norm."' AND id_far = '".$idfar."' AND tglresep = '".$tglresep."'";
                }else{ //KHUSUS KUNJ. LANGSUNG
                    $idfar = $this->cekIdFarUser($iduser);
                    if (($idfar == '0')||($idfar == 'null')){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                        $this->hasil($output);
                        return;
                    }else{
                        //$query    = "SELECT * FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$norm."' AND tglresep = '".$tglresep."'";
                        $query    = "SELECT * FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$norm."' AND id_far = '".$idfar."'";
                    }
                    
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Resep Tidak Diketahui!!";
                $this->hasil($output);
                return;
            }
            // echo $query;
            // return;
            $hasil = $this->db->query($query);
            if ($hasil->getNumRows() > 0) {

                $row        = $this->db->query($query)->getRow();
                $dilayani   = $row->dilayani;
                $tgl_resep  = $row->tglresep;
                $id_kunj_far= $row->id_kunjungan_far;

                $vi    = $input->vi;
                if (($vi == 'eresepRWJAPT_preview')||($vi == 'eresepRWIAPT_preview')||($vi == 'eresepIGDAPT_preview')||($vi == 'riwayatobat_detail_prev')){
                    $result  = 'true';
                }else{
                    if ($dilayani > 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Resep Sudah Terlayani!!";
                        $output['dilayani'] = $dilayani;
                        $output['data']     = $hasil->getResult();
                        $this->hasil($output);
                        return;
                        //$result  = 'false';
                    }else{
                        $result  = 'true';
                    }
                }
                

                if ($result  == 'true'){
                    $query_detJadi  = " SELECT
                                            * ,
                                            --(jumlah * harga) as total_harga
                                            ( harga * '$margin' ) as harga_jual,
                                            ( harga * '$margin' ) * jumlah as total_harga
                                        FROM
                                            far_obat_outdet food 
                                            JOIN far_obat fo USING (kd_obat)
                                            JOIN mapping_signa ms USING (id_signa)
                                            JOIN tarif_obat USING (kd_obat)
                                        WHERE
                                            noresep = '$noresep' 
                                            AND id_far = '$idfar' 
                                            AND tglresep = '$tgl_resep' 
                                            AND jns_racikan = '0'  
                                        ORDER BY
                                            urut ASC
                                        ";
                    
                    $GroupRacik     = " SELECT
                                            jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                                        FROM
                                            far_obat_outdet food 
                                            INNER JOIN mapping_signa ms ON ms.id_signa = food.id_signa
                                        WHERE
                                            noresep = '".$noresep."' 
                                            AND id_far = '".$idfar."' 
                                            AND tglresep = '".$tgl_resep."'  
                                            AND jns_racikan != '0' 
                                        GROUP BY
                                            noresep, tglresep, jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                                        ORDER BY jns_racikan ASC";
                    
                    if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                        $query_detRacik = " SELECT
                                                * ,
                                                ( harga * '$margin' ) as harga_jual,
                                                ( harga * '$margin' ) * jumlah as total_harga
                                            FROM
                                                far_obat_outdet food 
                                                JOIN far_obat fo USING (kd_obat)
                                                JOIN mapping_signa ms USING (id_signa)
                                                JOIN tarif_obat USING (kd_obat)
                                            WHERE
                                                noresep = '$noresep' 
                                                AND id_far = '$idfar' 
                                                AND tglresep = '$tgl_resep' 
                                                AND jns_racikan != '0'  
                                            ORDER BY
                                                urut ASC
                                            ";
                        $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                    }
                    
                    $StokObatGab    ="  SELECT
                                            id_kunjungan_far,
                                            exp,
                                            far_obat_outstok.batch,
                                            kd_obat,
                                            stok_dikeluarkan,
                                            COALESCE ( stok_unit, 0 ) AS stok_unit,
                                            kd_milik,
                                            id_unit,
                                            jns_racikan
                                        FROM
                                            far_obat_outstok
                                            INNER JOIN far_stok USING (exp, kd_obat, id_unit, kd_milik)
                                        WHERE
                                            id_kunjungan_far = '$id_kunj_far'
                                        ";

                    $output['code']         = "200";
                    $output['status']       = "sukses";
                    $output['pesan']        = "Data ditemukan.";
                    $output['data']         = $hasil->getResult();
                    $output['count']        = $hasil->getNumRows();
                    $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                    $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                    $output['StokObatOut']  = $this->db->query($StokObatGab)->getResult();
                    
                }

            }else{
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
            }
            

        }
        $this->hasil($output);
    }

    public function lookup_detailobatRJRIIGD() //dipakek bersama
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noresep', 'id_kunj', 'id_unit', 'norm', 'tgl_resep' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $iduser     = $input->iduser;
            $noresep    = $input->noresep;
            $id_kunj    = $input->id_kunj;
            $id_unit    = $input->id_unit;
            /*$gekIdFar   = " SELECT 
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                    WHEN jenis_unit = '4' THEN '0'
                                END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
            $getrowkIdFar  = $this->db->query($gekIdFar)->getRow();
            $idfar         = $getrowkIdFar->id_far;*/
            $idfar         = $this->getMappingUnitDepo($id_unit);
            if (($idfar == '0')||($idfar == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }
            $norm       = $input->norm;
            $tgl_kunj   = $input->tgl_kunj;
            $tglresep   = $input->tgl_resep;
            $id_transaksi   = $input->id_transaksi;
            $margin         = $this->getPenjamin_pasien($id_transaksi, $idfar);
            
            if ($noresep != ''){
                if ($idfar != '0'){
                    $query    = "SELECT *, (gatot + ppn) as grandtotal FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$norm."' AND id_far = '".$idfar."' AND tglresep = '".$tglresep."'";
                }else{ //KHUSUS KUNJ. LANGSUNG
                    $idfar = $this->cekIdFarUser($iduser);
                    if (($idfar == '0')||($idfar == 'null')){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                        $this->hasil($output);
                        return;
                    }else{
                        $query    = "SELECT *, (gatot + ppn) as grandtotal FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunj."' AND norm = '".$norm."' AND id_far = '".$idfar."'";
                    }
                    
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Resep Tidak Diketahui!!";
                $this->hasil($output);
                return;
            }
            // echo $query;
            // return;
            $hasil = $this->db->query($query);
            if ($hasil->getNumRows() > 0) {

                $row        = $this->db->query($query)->getRow();
                $dilayani   = $row->dilayani;
                $tgl_resep  = $row->tglresep;
                $id_kunj_far= $row->id_kunjungan_far;

                $vi    = $input->vi;
                if (($vi == 'eresepRWJAPT_preview')||($vi == 'eresepRWIAPT_preview')||($vi == 'eresepIGDAPT_preview')||($vi == 'riwayatobat_detail_prev')){
                    $result  = 'true';
                }else{
                    if ($dilayani > 0){
                        $output['code']         = 100;
                        $output['status']       = "sukses";
                        $output['pesan']        = "";
                        $output['dilayani']     = $dilayani;
                        $output['data']         = $hasil->getResult();
                        
                        $this->hasil($output);
                        return;
                    }else{
                        $result  = 'true';
                    }
                }
                

                if ($result  == 'true'){
                    $query_detJadi  = " SELECT
                                            * ,
                                            --(jumlah * harga) as total_harga
                                            -- ( harga * '$margin' ) as harga_jual,
                                            -- ( harga * '$margin' ) * jumlah as total_harga
                                            ( harga_jual * jumlah ) as total_harga
                                        FROM
                                            far_obat_outdet food 
                                            JOIN far_obat fo USING (kd_obat)
                                            JOIN mapping_signa ms USING (id_signa)
                                            JOIN tarif_obat USING (kd_obat)
                                        WHERE
                                            noresep = '$noresep' 
                                            AND id_far = '$idfar' 
                                            AND tglresep = '$tgl_resep' 
                                            AND jns_racikan = '0'  
                                        ORDER BY
                                            urut ASC
                                        ";
                    
                    $GroupRacik     = " SELECT
                                            jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                                        FROM
                                            far_obat_outdet food 
                                            INNER JOIN mapping_signa ms ON ms.id_signa = food.id_signa
                                        WHERE
                                            noresep = '".$noresep."' 
                                            AND id_far = '".$idfar."' 
                                            AND tglresep = '".$tgl_resep."'  
                                            AND jns_racikan != '0' 
                                        GROUP BY
                                            noresep, tglresep, jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                                        ORDER BY jns_racikan ASC";
                    
                    if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                        $query_detRacik = " SELECT
                                                * ,
                                                -- ( harga * '$margin' ) as harga_jual,
                                                -- ( harga * '$margin' ) * jumlah as total_harga
                                                ( harga_jual * jumlah ) as total_harga
                                            FROM
                                                far_obat_outdet food 
                                                JOIN far_obat fo USING (kd_obat)
                                                JOIN mapping_signa ms USING (id_signa)
                                                JOIN tarif_obat USING (kd_obat)
                                            WHERE
                                                noresep = '$noresep' 
                                                AND id_far = '$idfar' 
                                                AND tglresep = '$tgl_resep' 
                                                AND jns_racikan != '0'  
                                            ORDER BY
                                                urut ASC
                                            ";
                        $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                    }
                    
                    $StokObatGab    ="  SELECT
                                            id_kunjungan_far,
                                            exp,
                                            far_obat_outstok.batch,
                                            kd_obat,
                                            stok_dikeluarkan,
                                            COALESCE ( stok_unit, 0 ) AS stok_unit,
                                            kd_milik,
                                            id_unit,
                                            jns_racikan,
                                            jns_racikan||''||kd_obat as jns_racikan_gab
                                        FROM
                                            far_obat_outstok
                                            LEFT JOIN far_stok USING (exp, kd_obat, id_unit, kd_milik)
                                        WHERE
                                            id_kunjungan_far = '$id_kunj_far'
                                        ";

                    $output['code']         = "200";
                    $output['status']       = "sukses";
                    $output['pesan']        = "Data ditemukan.";
                    $output['data']         = $hasil->getResult();
                    $output['count']        = $hasil->getNumRows();
                    $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                    $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                    $output['StokObatOut']  = $this->db->query($StokObatGab)->getResult();
                    
                }

            }else{
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
            }
            

        }
        $this->hasil($output);
    }

    public function CreateOrderResepRWJ()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_order', 'user', 'id_unit' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunjungan  = $input->id_kunj;
            $id_unit       = $input->id_unit;
            $gekIdFar    = "SELECT 
                            CASE 
                                WHEN jenis_unit IN ('1', '7') THEN '4001'
                                WHEN jenis_unit = '2' THEN '4002'
                                WHEN jenis_unit = '3' THEN '4003'
                            END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
            $getrowkIdFar  = $this->db->query($gekIdFar)->getRow();
            $idfar         = $getrowkIdFar->id_far;
            $id_pegawai    = $input->id_peg;
            $dilayani      = '0';
            $order_mng     = 'false';
            $cat_diagnosa  = str_replace(array("\r","\n")," ", $input->diag);
            $cat_iter      = str_replace(array("\r","\n")," ", $input->iter);
            $id_user       = $input->user;
            $status_order  = 'true';
            //$tglorder      = date("Y-m-d");
            $tglorder      = $input->tglorder;
            $waktu_order   = date("H:i:s");
            $jnsresep      = $input->jnsresep;

            if (empty($idfar)){
                // $output['status']   = "gagal";
                // $output['pesan']   = "Unit farmasi tujuan tidak diketahui!!";
                // $this->hasil($output);
                // return; 
                $idfar     = $this->cekIdFarUser($id_user);
            }
            
            $this->db->transStart();
            if ($input->id_order != ''){ //JIKA SUDAH ADA ID ORDERNYA MAKA UPDATE
                $id_order  = $input->id_order;
                $cek    = "SELECT dilayani FROM order_resep WHERE id_order = '".$id_order."' AND tglorder = '".$tglorder."' ORDER BY id_order DESC LIMIT 1";

                if ($this->db->query($cek)) { //true
                    $row        = $this->db->query($cek)->getRow();
                    $dilayani   = $row->dilayani;
                    if ($dilayani != 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Order Resep Sudah Dilayani Apotik!!";
                        $this->hasil($output);
                        return;
                    }else{
                        $query  ="UPDATE order_resep SET 
                                    cat_diagnosa = '$cat_diagnosa',
                                    cat_iter     = '$cat_iter',
                                    jnsresep     = '$jnsresep'
                                WHERE id_kunjungan = '$id_kunjungan' and id_order = '$id_order' and tglorder = '$tglorder' ";
                    }
                    
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Simpan Order Resep!!";
                    exit;
                }
                
            }else{ //JIKA MASIH KOSONG BUAT BARU ID ORDERNYA
                // $cek    = "SELECT id_order FROM order_resep WHERE tglorder = '".$tglorder."' ORDER BY id_order DESC LIMIT 1";
                $cek    = "SELECT id_order FROM order_resep ORDER BY id_order DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $id_order   = $row->id_order;
                        //$realx  = date('Ymd');
                        $real   = ((int)$id_order + 1);
                        $id_mrresep = $real;
                    }else{
                        $id_mrresep = 1;
                    }
                }

                $id_order = $id_mrresep;
                //BUAT ORDER RESEP
                $query = "INSERT INTO order_resep (id_kunjungan, id_order, id_unit, id_pegawai, dilayani, order_mng, cat_diagnosa, id_user, status_order, cat_iter, tglorder, id_far, jnsresep) VALUES ('$id_kunjungan', '$id_order', '$id_unit', '$id_pegawai', '$dilayani', '$order_mng', '$cat_diagnosa', '$id_user', '$status_order', '$cat_iter', '$tglorder', '$idfar', '$jnsresep')";
            }

            if ($this->db->query($query)) {
                
                $data    = $input->data;
                //OBAT JADI
                if ($input->jmlObat != 0){
                    $delobatJadi = "DELETE FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder'";
                    $this->db->query($delobatJadi);
                    
                    for( $i=0; $i < $input->jmlObat; $i++){
                        $getUrut = "SELECT MAX(urut) as urut FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder' ";
                        $this->db->query($getUrut);
                        $row     = $this->db->query($getUrut)->getRow();
                        $urut   = (int)$row->urut + 1;

                        //$urut       = $data[$i]->urut;
                        $kd_obat      = $data[$i]->kd_obat;
                        $jumlah       = $data[$i]->qty;
                        $id_far       = $idfar;
                        $kd_milik     = 3;
                        $ket          = $data[$i]->ket;
                        $signa        = $data[$i]->signa;
                        $jns_racik    = 0;
                        $tgl_order    = $tglorder;
                        $dosis_obat   = 0;

                        $save_detobatJadi = "INSERT INTO order_resepdet (id_order, urut, kd_obat, jumlah, id_far, kd_milik, ket, tgl_order, jns_racikan, id_signa, dosis) VALUES ('$id_order', '$urut', '$kd_obat', '$jumlah', '$id_far', '$kd_milik', '$ket', '$tgl_order', '$jns_racik', '$signa', '$dosis_obat')";

                        $this->db->query($save_detobatJadi);
                    }
                }else{
                    $delobatJadi = "DELETE FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder'";
                    $this->db->query($delobatJadi);
                }

                //OBAT RACIK
                $dataracik   = $input->data_racik;
                if ($input->jmlObatRacik != 0){
                    $delobatRacik = "DELETE FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder' and jns_racikan != '0' ";
                    $this->db->query($delobatRacik);

                    for( $j=0; $j < $input->jmlObatRacik; $j++){ //MEMBACA BANYAKNYA RACIKAN
                        $dataObatRacik   = $dataracik[$j]->obat;
                        for( $i=0; $i < $dataracik[$j]->count; $i++){
                            $getUrut = "SELECT MAX(urut) as urut FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder' ";
                            $this->db->query($getUrut);
                            $row     = $this->db->query($getUrut)->getRow();
                            $urut   = (int)$row->urut + 1;
                            
                            //$urut         = $dataObatRacik[$i]->urut;
                            $kd_obat      = $dataObatRacik[$i]->kd_obat;
                            $dosis_obat   = $dataObatRacik[$i]->dosis;
                            $jumlah       = $dataObatRacik[$i]->qty;
                            $ket          = $dataObatRacik[$i]->ket;
                            $id_far       = $idfar;
                            $kd_milik     = 3;
                            $signa        = $dataracik[$j]->Signa;
                            $jns_racik    = $dataracik[$j]->Nama;
                            $qty_racik    = $dataracik[$j]->Bnyk;
                            $ket_racik    = $dataracik[$j]->Ket;
                            $tgl_order    = $tglorder;

                            $save_detobatRacik = "INSERT INTO order_resepdet (id_order, urut, kd_obat, jumlah, id_far, kd_milik, ket, tgl_order, jns_racikan, id_signa, dosis, qty_racik, ket_racik) VALUES ('$id_order', '$urut', '$kd_obat', '$jumlah', '$id_far', '$kd_milik', '$ket', '$tgl_order', '$jns_racik', '$signa', '$dosis_obat', '$qty_racik', '$ket_racik')";

                            $this->db->query($save_detobatRacik);
                        }
                    }
                }else{
                    $delobatRacik = "DELETE FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder' and jns_racikan != '0'";
                    $this->db->query($delobatRacik);
                }
                
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']       = "sukses";
                    $output['pesan']        = "Simpan Berhasil Resep";
                    $output['x']            = $id_order;
                }else{
                    $this->db->transRollback();
                    $output['status']       = "gagal";
                    $output['pesan']        = "Gagal Simpan Resep";
                    $output['x']            = $id_order;
                }

            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Resep";
                //$output['pesan']    = $this->db->error();
                $output['x']        = '';

            }

        }
        $this->hasil($output);
        //echo json_encode($output);
    }

    public function HapusOrderEresepRJ()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_order', 'user' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_order    = $input->id_order;
            $tglorder    = $input->tglorder;
            $query = "DELETE FROM order_resep WHERE id_order = '$id_order' and tglorder = '$tglorder' ";

            if ($this->db->simpleQuery($query)) {
            
                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil di Hapus";
                
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Hapus";
            }

        }
        $this->hasil($output);
        //echo json_encode($output);
    }

    //CEK TRANSAKSI SUDAH DITUTUP ATAU BELUM
    public function cekTransaksi($id_kunj_far)
    {
        $cekTransaksi = "SELECT
                            tgl_tutup, posting 
                        FROM
                            transaksi
                            INNER JOIN kunjungan USING ( id_transaksi )
                        WHERE id_kunjungan = '$id_kunj_far'";
        $hasilTransaksi = $this->db->query($cekTransaksi)->getRow();
        $tgl_tutup   = $hasilTransaksi->tgl_tutup;
        $posting     = $hasilTransaksi->posting;
        return $tgl_tutup;
    }

    //GET ID Kunjungan Resep
    public function cekIdKunjunganResep($noresep, $id_kunjungan, $norm, $id_far)
    {
        $query    = "SELECT * FROM far_obat_out 
                WHERE noresep = '".$noresep."' AND id_kunjungan = '".$id_kunjungan."' AND norm = '".$norm."' AND id_far = '".$id_far."'";
        $row   = $this->db->query($query)->getRow();
        $id_kunj_far   = $row->id_kunjungan_far;
        return $id_kunj_far;
    }

    //GET ID Tranaksi
    public function cekIdTransaksi($id_kunj_far)
    {
        $cekTransaksi = "SELECT
                            id_transaksi 
                        FROM
                            transaksi
                            INNER JOIN kunjungan USING ( id_transaksi )
                        WHERE id_kunjungan = '$id_kunj_far'";
        $hasilTransaksi = $this->db->query($cekTransaksi)->getRow();
        $id_transaksi   = $hasilTransaksi->id_transaksi;
        return $id_transaksi;
    }

    //GET ID Far USER
    public function cekIdFarUser($iduser)
    {
        $query    = "SELECT * FROM users WHERE id_user = '".$iduser."'";
        $row   = $this->db->query($query)->getRow();
        $id_far   = $row->id_far;
        return $id_far;
    }

    //GET ID Far USER
    public function cekIdFarUnit($idunit, $iduser)
    {
        if ($idunit != ''){

            $query  = " SELECT 
                            CASE 
                                WHEN jenis_unit IN ('1', '7') THEN '4001'
                                WHEN jenis_unit = '2' THEN '4002'
                                WHEN jenis_unit = '3' THEN '4003'
                                WHEN jenis_unit = '4' THEN '0'
                            END AS id_far
                        FROM unit WHERE id_unit = '".$idunit."'";
            $row   = $this->db->query($query)->getRow();
            $id_far   = $row->id_far;

        }else{
            $id_far = $this->cekIdFarUser($iduser);
        }
        return $id_far;
    }

    //GET ID Far USER
    public function getMargin($penjamin) //TIDAK DIPAKAI
    {
        $query    = "SELECT
                        tarif_obat_cust.id_kelompok_penjamin,
                        jumlah as margin
                    FROM
                        tarif_obat_cust
                        JOIN kelompok_penjamin USING ( id_kelompok_penjamin )
                        JOIN penjamin USING (id_kelompok_penjamin)
                        WHERE id_penjamin = '$penjamin'";
        $row   = $this->db->query($query)->getRow();
        $margin   = $row->margin;
        return $margin;
    }

    public function getMargin_denganunit($penjamin, $id_far)
    {
        $query    = "SELECT
                        tarif_obat_cust.id_kelompok_penjamin,
                        jumlah as margin
                    FROM
                        tarif_obat_cust
                        JOIN kelompok_penjamin USING ( id_kelompok_penjamin )
                        JOIN penjamin USING (id_kelompok_penjamin)
                        WHERE id_penjamin = '$penjamin' and id_unit = '$id_far' ";
        $row   = $this->db->query($query)->getRow();
        $margin   = $row->margin;
        return $margin;
    }

    public function HapusResepRWJAPT()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noresep', 'idkunj', 'idunit', 'tglresep' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $noresep   = $input->noresep;
            $idunit    = $input->idunit;
            $idkunj    = $input->idkunj;
            $tglkunj   = $input->tglkunj;
            $id_order  = $input->id_order;
            $tglorder  = $input->tglorder;
            $norm      = $input->norm;
            $reason    = $input->reason;
            $iduser    = $input->user;
            $tglresep  = $input->tglresep;

            $cek_idfarmasi = $this->cekIdFarUser($iduser);
            if ($cek_idfarmasi == ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }else{
                $idfar = $this->cekIdFarUnit($idunit, $iduser);

            }
             
            if ($idfar != '0'){
                $getquery    = "SELECT * FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$idkunj."' AND norm = '".$norm."' AND id_far = '".$idfar."'";
                if ($idfar == '4001'){
                    $posisi = '1';
                }else if ($idfar == '4002'){
                    $posisi = '2';
                }else if ($idfar == '4003'){
                    $posisi = '3';
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                    $this->hasil($output);
                    return;
                }
            }else{
                $getquery    = "SELECT * FROM far_obat_out WHERE noresep = '".$noresep."' AND id_kunjungan = '".$idkunj."' AND norm = '".$norm."' AND id_far = '".$idunit."'";
            }
            
            $getrowIdFar   = $this->db->query($getquery)->getRow();
            $id_kunj_far   = $getrowIdFar->id_kunjungan_far;
            $langsung      = $getrowIdFar->liveresep;
            $totharga      = $getrowIdFar->gatot;
            $id_jurnal     = $getrowIdFar->id_jurnal;
            $noretur       = $getrowIdFar->no_retur;

            //$cekTransaksi = $this->cekTransaksi($id_kunj_far);
            $cekTransaksi = "SELECT
                                id_transaksi, tgl_tutup, posting, tgl_transaksi
                            FROM
                                transaksi
                                INNER JOIN kunjungan USING ( id_transaksi )
                            WHERE id_kunjungan = '$id_kunj_far'";
            $hasilTransaksi = $this->db->query($cekTransaksi)->getRow();
            $id_transaksi   = $hasilTransaksi->id_transaksi;
            $tgl_transaksi  = $hasilTransaksi->tgl_transaksi;
            $tgl_tutup      = $hasilTransaksi->tgl_tutup;
            $posting        = $hasilTransaksi->posting;
            
            $this->db->transStart();
            if ($tgl_tutup != ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Transaksi Sudah Di Tutup!!";
                $this->hasil($output);
                return;
            }

            if ($id_jurnal != ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Resep Sudah di Jurnal<br>Hub. Admin.!!";
                $this->hasil($output);
                return;
            }

            if ($noretur != ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Resep Sudah di Retur, Batalkan Retur terlebih dahulu!!";
                $this->hasil($output);
                return;
            }
            //else if (($tgl_tutup == '')&&($posting == 't')){ //JIKA BELUM TUTUP TRANSAKSI dan SUDAH KETRANSFER
                
                
                // $updateOrderDilayani  ="UPDATE order_resep SET dilayani   = '0'
                //                         WHERE id_kunjungan = '$idkunj' and id_order = '$id_order' and tglorder = '$tglorder' ";
            if ($langsung == '0'){
                $del_resep = "DELETE FROM far_obat_out WHERE noresep = '$noresep' and tglresep = '$tglresep' and id_kunjungan_far = '$id_kunj_far'";

                $this->db->query($del_resep);

                $updateOrderDilayani  ="UPDATE order_resep SET dilayani   = '0' WHERE id_kunjungan = '$idkunj' and id_order = '$id_order' ";

                $this->db->query($updateOrderDilayani);
            }else{
                
                if ($cek_idfarmasi == '4001'){
                    $posisi = '1';
                }else if ($cek_idfarmasi == '4002'){
                    $posisi = '2';
                }else if ($cek_idfarmasi == '4003'){
                    $posisi = '3';
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                    $this->hasil($output);
                    return;
                }

                $delTransaksi = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi' and tgl_transaksi = '$tgl_transaksi' and no_rm = '$norm'";
                $this->db->query($delTransaksi);
                
                //$del_resep = "DELETE FROM far_obat_out WHERE noresep = '$noresep' and tglresep = '$tglresep' and id_kunjungan_far = '$id_kunj_far'";

                //$this->db->simpleQuery($del_resep);
            }
           
            $save_loghapusresep = "INSERT INTO log_hapus_resep (id_transaksi, id_user, nominal, alasan, noresep, id_far, id_unit, posisi) VALUES ('$id_transaksi', '$iduser', '$totharga', '$reason', '$noresep', '$idfar', '$idunit', '$posisi')";
            $this->db->query($save_loghapusresep);
            
            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil di Hapus";
                
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Hapus";
            }

        }
        
        $this->hasil($output);
    }

    public function cek_detailorder($id_order)
    {
        $query = "  SELECT 
                        count(id_order) as count
                    FROM
                        order_resepdet 
                    WHERE
                        id_order = '$id_order'";
        $row = $this->db->query($query)->getRow();
        $count   = $row->count;
        return $count;
    }

    public function cek_jenis_obat($id_order)
    {
        $query = "  SELECT 
                        true as selected
                    FROM
                        order_resepdet 
                    WHERE
                        id_order = '$id_order' and jns_racikan > '0'";
        
        if ($this->db->query($query)->getNumRows() > 0){
            $jenis_obat = 'true';   // Jenis Obat Racikan
            $jenis_code = 'R';
        }else{
            $jenis_obat = 'false';  // Jenis Obat Single
            $jenis_code = 'A';
        }
        return $jenis_obat;
    }

    public function PostingOrderResepRJ()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'idresep', 'id_kunj', 'tgl_kunj', 'tglorder' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $this->db->transStart();
            $id_order  = $input->idresep;
            $jnsresep  = $input->jnsresep;
            if ($id_order == ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Order Resep Belum Disimpan!!";
                $this->hasil($output);
                return;
            }
            $cek    = "SELECT dilayani FROM order_resep WHERE id_order = '".$id_order."' AND tglorder = '".$input->tglorder."' ORDER BY id_order DESC LIMIT 1";

            if ($this->db->query($cek)) { //true
                $row        = $this->db->query($cek)->getRow();
                $dilayani   = $row->dilayani;
                if ($dilayani != 0){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Order Resep Sudah Dilayani Apotik!!";
                    $this->hasil($output);
                    return;
                }else{

                    $cek_detailorder = $this->cek_detailorder($id_order);
                    if ($cek_detailorder == 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal di Posting, belum ada obat yang disimpan!!";
                        $this->hasil($output);
                        return;
                    }

                    $jenisobat  = $this->cek_jenis_obat($id_order);
                    if ($jenisobat == ''){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal di Posting, Status Obat Tidak diketahui\n- Simpan Ulang -";
                        $this->hasil($output);
                        return;
                    }
                    $query  ="UPDATE order_resep SET order_mng   = 'true', jnsobat = '$jenisobat', jnsresep = '$jnsresep' WHERE id_kunjungan = '$input->id_kunj' and id_order = '$id_order' and tglorder = '$input->tglorder' ";
                    $this->db->query($query);
                }
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['status']       = "sukses";
                $output['pesan']        = "Berhasil di simpan";
            }else{
                $output['status']       = "gagal";
                $output['pesan']        = "Gagal di simpan";
            }
        }
        $this->hasil($output);
    }

    public function CreateResepRJRIIGD_Live()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'userRWJAPT', 'id_pegRWJAPT' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            //$id_unit        = $input->id_unitRWJAPT;
            $id_pegawai     = $input->id_pegRWJAPT; //id Dokter
            $cat_alergi     = str_replace(array("\r","\n")," ", $input->catalergiRWJAPT);
            $id_user        = $input->userRWJAPT;
            $id_pegUser     = $input->id_pegUserRWJAPT; //id pegawai USer
            $id_far         = $this->cekIdFarUser($id_user);
            //$getrowkIdFar   = $this->db->query($gekIdFar)->getRow();
            //$id_far         = $getrowkIdFar->id_far;
            if ($id_far == '0'){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }
            $norm           = $input->normRWJAPT;
            $tglkunj        = $input->tgl_kunjRWJAPT;
            $tglresep       = $input->tglresepRWJAPT;
            //$tglorder       = $input->tglorderRWJAPT;
            $liveresep      = $input->liveresepRWJAPT;
            $id_order       = $input->id_orderRWJAPT;
            $penjamin       = $input->penjaminresepRWJAPT;
            //$penjamin       = '21'; // PENJAMIN UMUM BEBAS
            $grandtotal     = $input->grandtotalresepRWJAPT;
            $ppntotal       = $input->ppnresepRWJAPT;
            $no_sjp         = strtoupper($input->sepRWJAPT);
            $id_penanggung_jawab        = '';
            $nama_penanggung_jawab      = '';
            $hubungan_penanggung_jawab  = '';
            $no_hp_penanggung_jawab     = '';
            $lunas                      = 'f';

            $kdmilikObat    = $input->kd_milikObatbyUser;
            $get_margin = $this->getMargin_denganunit($penjamin, $id_far);

            if ($get_margin < 0){
                $output['status']   = "gagal";
                $output['pesan']    = "Margin Obat Tidak diKetahui, Cek Setup Penjamin!! ";
                $this->hasil($output);
                return;
            }

            $this->db->transStart();
            if (($liveresep == '1') && ($input->noresepRWJAPT == '')){
                
                if ($id_far == '4001'){
                    $query = "INSERT INTO far_obat_out (id_unit, id_pegawai, cat_alergi, id_user, id_far, tglresep, norm, liveresep, penjamin, gatot, hpp, ppn) VALUES ('$id_far', '$id_pegawai', '$cat_alergi', '$id_user', '$id_far', '$tglresep', '$norm', '$liveresep', '$penjamin', '$grandtotal', '0', '$ppntotal')returning id_kunjungan";
                }else{
                    $query = "INSERT INTO far_obat_out (id_unit, id_pegawai, cat_alergi, id_user, id_far, tglresep, norm, liveresep, penjamin, gatot, hpp, ppn) VALUES ('$id_far', '$id_pegawai', '$cat_alergi', '$id_user', '$id_far', '$tglresep', '$norm', '$liveresep', '$penjamin', '$grandtotal', '0', '0')returning id_kunjungan";
                }
                
                $id_kunjungan = $this->db->query($query)->getRow()->id_kunjungan;

                $qnoresep = "SELECT noresep FROM far_obat_out WHERE id_kunjungan = '".$id_kunjungan."' and tglresep = '".$tglresep."' ORDER BY noresep DESC LIMIT 1";
                $noresep  = $this->db->query($qnoresep)->getRow()->noresep;

                $idtransaksi = $this->cekIdTransaksi($id_kunjungan);
                $insert_penj = "INSERT INTO penjamin_transaksi (id_penjamin, id_transaksi, no_sjp, cara_masuk) VALUES ('$penjamin','$idtransaksi', '$no_sjp', '1')";
                $this->db->query($insert_penj);
            }else{

                $id_kunjungan   = $input->id_kunjRWJAPT;
                $noresep        = $input->noresepRWJAPT;
                $idtransaksi    = $this->cekIdTransaksi($id_kunjungan);
                $cek    = "SELECT * FROM far_obat_out WHERE id_far = '".$id_far."' and tglresep = '".$tglresep."' and id_kunjungan = '".$id_kunjungan."' ORDER BY noresep DESC LIMIT 1";
                $row        = $this->db->query($cek)->getRow();
                $dilayani   = $row->dilayani;
                if ($dilayani != 0){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Resep Sudah Dilayani Apotik!!";
                    $this->hasil($output);
                    return;
                }

                if ($id_far == '4001'){
                    $query  =" UPDATE far_obat_out SET 
                                    dilayani    = '0',
                                    cat_alergi  = '$cat_alergi',
                                    gatot       = '$grandtotal',
                                    id_pegawai  = '$id_pegawai',
                                    hpp         = '0',
                                    ppn         = '$ppntotal'
                                WHERE id_kunjungan = '$id_kunjungan' and noresep = '$noresep' and tglresep = '$tglresep' ";
                }else{
                    $query  =" UPDATE far_obat_out SET 
                                    dilayani    = '0',
                                    cat_alergi  = '$cat_alergi',
                                    gatot       = '$grandtotal',
                                    id_pegawai  = '$id_pegawai',
                                    hpp         = '0',
                                    ppn         = '0'
                                WHERE id_kunjungan = '$id_kunjungan' and noresep = '$noresep' and tglresep = '$tglresep' ";
                }
                $this->db->query($query);
            }
            
            //if ($this->db->simpleQuery($query)) {
            if ($id_kunjungan != ''){
                $data    = $input->dataRWJAPT;
                $hrgaasliTotalObatJadi = 0;
                $hrgaasliTotalRacik    = 0;
                //OBAT JADI
                if ($input->jmlObatRWJAPT != 0){
                    $delobatJadi = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep'";
                    $this->db->query($delobatJadi);
                    
                    for( $i=0; $i < $input->jmlObatRWJAPT; $i++){
                        $getUrut = "SELECT MAX(urut) as urut FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                        $this->db->simpleQuery($getUrut);
                        $row     = $this->db->query($getUrut)->getRow();
                        $urut   = (int)$row->urut + 1;

                        //$urut       = $data[$i]->urut;
                        $kd_obt       = $data[$i]->kd_obt;
                        $jumlah       = $data[$i]->qty;
                        //$id_far       = 1;
                        $kd_milik     = $kdmilikObat;
                        $ket          = $data[$i]->ket;
                        $signa        = $data[$i]->signa;
                        $jns_racik    = 0;
                        //$tglresep     = $tglresep;
                        $dosis_obat   = 0;
                        $exp          = $data[$i]->exp;
                        $hrgajual     = $data[$i]->hargaJual;
                        $hrgaasli     = $data[$i]->hargaAsli;

                        $hrgaasliTot  = $jumlah * $hrgaasli;
                        $hrgaasliTotalObatJadi += $hrgaasliTot;

                        if ($exp != ''){
                            $save_detobatJadi = "INSERT INTO far_obat_outdet (noresep, urut, kd_obat, jumlah, id_far, kd_milik, ket, tglresep, jns_racikan, id_signa, dosis, exp, harga_jual, harga_sat, markup) VALUES ('$noresep', '$urut', '$kd_obt', '$jumlah', '$id_far', '$kd_milik', '$ket', '$tglresep', '$jns_racik', '$signa', '$dosis_obat', '$exp','$hrgajual', '$hrgaasli', '$get_margin')";

                            $this->db->query($save_detobatJadi);
                        }else{
                            $output['code']     = "502";
                            $output['status']   = "gagal";
                            $output['pesan']    = "Expired Date Obat Belum di Tentukan...!";
                            $this->hasil($output);
                            return;
                        }
                    }

                }else{
                    $delobatJadi = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' and jns_racikan = '0' ";
                    $this->db->query($delobatJadi);
                }

                //OBAT RACIK
                $dataracik   = $input->data_racikRWJAPT;
                if ($input->jmlObatRacikRWJAPT != 0){
                    $delobatRacik = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' and jns_racikan != '0' ";
                    $this->db->query($delobatRacik);

                    for( $j=0; $j < $input->jmlObatRacikRWJAPT; $j++){ //MEMBACA BANYAKNYA RACIKAN
                        $dataObatRacik   = $dataracik[$j]->obat;
                        for( $i=0; $i < $dataracik[$j]->count; $i++){
                            $getUrut = "SELECT MAX(urut) as urut FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                            $this->db->simpleQuery($getUrut);
                            $row     = $this->db->query($getUrut)->getRow();
                            $urut   = (int)$row->urut + 1;
                            
                            //$urut         = $dataObatRacik[$i]->urut;
                            $kd_obt       = $dataObatRacik[$i]->kd_obt;
                            $dosis_obat   = $dataObatRacik[$i]->dosis;
                            $jumlah       = $dataObatRacik[$i]->qty;
                            $ket          = $dataObatRacik[$i]->ket;
                            $expired      = $dataObatRacik[$i]->exp;
                            $hrgajual     = $dataObatRacik[$i]->harga;
                            $hrgaasli     = $dataObatRacik[$i]->harga_asli;

                            $hrgaasliTot  = $jumlah * $hrgaasli;
                            $hrgaasliTotalRacik += $hrgaasliTot;
                            //$id_far       = 1;
                            $kd_milik     = $kdmilikObat;
                            $signa        = $dataracik[$j]->Signa;
                            $jns_racik    = $dataracik[$j]->Nama;
                            $qty_racik    = $dataracik[$j]->Bnyk;
                            $ket_racik    = $dataracik[$j]->Ket;
                            //$tglresep     = $tglresep;
                            if ($expired != ''){
                                $save_detobatRacik = "INSERT INTO far_obat_outdet (noresep, urut, kd_obat, jumlah, id_far, kd_milik, ket, tglresep, jns_racikan, id_signa, dosis, qty_racik, ket_racik, exp, harga_jual, harga_sat, markup) VALUES ('$noresep', '$urut', '$kd_obt', '$jumlah', '$id_far', '$kd_milik', '$ket', '$tglresep', '$jns_racik', '$signa', '$dosis_obat', '$qty_racik', '$ket_racik', '$expired', '$hrgajual', '$hrgaasli', '$get_margin')";

                                $this->db->query($save_detobatRacik);
                            }else{
                                $output['code']     = "502";
                                $output['status']   = "gagal";
                                $output['pesan']    = "Expired Date Obat Belum di Tentukan...!";
                                $this->hasil($output);
                                return;
                            }
                        }
                    }
                }else{
                    $delobatRacik = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' and jns_racikan != '0'";
                    $this->db->query($delobatRacik);
                }
                
                $hrgaasliTotalALL = $hrgaasliTotalObatJadi + $hrgaasliTotalRacik;
                $update_HPP  =" UPDATE far_obat_out SET hpp = $hrgaasliTotalALL WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                $this->db->query($update_HPP);
                
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    
                    $this->db->transStart();

                    if ($id_kunjungan != ''){
                      /*  $cekJumlahObat = "SELECT kd_obat FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep'";
                        $satu = $this->db->query($cekJumlahObat)->getNumRows();

                        $cekJumlahObatOutStok = "SELECT kd_obat FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunjungan'";
                        $dua = $this->db->query($cekJumlahObatOutStok)->getNumRows();

                        if ($satu != $dua){
                            $output['status']   = "gagal";
                            $output['pesan']    = "Jumlah item obat tidak sesusai\nUlangi Entrian Expired Obat!";
                            $this->hasil($output);
                            return;
                        }*/

                        if ($input->jmlObatRWJAPT != 0){
                            $delstokobatJadi = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunjungan' and jns_racikan = '0' ";
                            $this->db->query($delstokobatJadi);
                            
                            $datastokObatJadi = $input->updateStokObatJadi;
                            for( $ss=0; $ss < $input->jmlObatRWJAPT; $ss++){
                                $countjmlh   = $datastokObatJadi[$ss]->countjmlh;

                                if ($countjmlh != 0){
                                    $stok   = $datastokObatJadi[$ss]->stok;
                                    for( $xx=0; $xx < $datastokObatJadi[$ss]->countjmlh; $xx++){
                                        $id_kunjungan_far   = $id_kunjungan; //$stok[$xx]->id_kunj_far;
                                        $exp                = $stok[$xx]->getexp;
                                        $kd_obat            = $stok[$xx]->getkd_obt;
                                        $id_unit            = $stok[$xx]->getidUnit;
                                        $kd_milik           = $stok[$xx]->getkdmilik;
                                        $stok_dikeluarkan   = $stok[$xx]->getjumlah;
                                        $batch              = $stok[$xx]->getbatch;
                                        $getstokawal        = $stok[$xx]->getstokawal;
                                        $jns_racikan        = $stok[$xx]->jns_racikan;

                                        $save_stokObatJadi = "INSERT INTO far_obat_outstok (id_kunjungan_far, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, jns_racikan) VALUES('$id_kunjungan_far', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$stok_dikeluarkan', '$jns_racikan') 
                                        ON CONFLICT (id_kunjungan_far, id_unit, kd_obat, exp, kd_milik, jns_racikan) DO 
                                        UPDATE SET stok_dikeluarkan = EXCLUDED.stok_dikeluarkan";
                                        
                                        $this->db->query($save_stokObatJadi);
                                        
                                    }
                                }
                            }
                        }else{
                            $delstokobatJadi = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunjungan' and jns_racikan = '0' ";
                            $this->db->query($delstokobatJadi);
                        }

                        if ($input->jmlObatRacikRWJAPT != 0){
                            $delstokobatRacik = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunjungan' and jns_racikan != '0' ";
                            $this->db->query($delstokobatRacik);
                            
                            $datastokObatRacik = $input->updateStokObatRacik;
                            // echo count($input->updateStokObatRacik);
                            // return;
                            for( $rr=0; $rr < count($datastokObatRacik); $rr++){
                                $countjmlh   = $datastokObatRacik[$rr]->countjmlh;                               
                                if ($countjmlh != 0){
                                    $stok   = $datastokObatRacik[$rr]->stok;
                                    for( $xxr=0; $xxr < $countjmlh; $xxr++){
                                        $id_kunjungan_far   = $id_kunjungan;
                                        $exp                = $stok[$xxr]->getexp;
                                        $kd_obat            = $stok[$xxr]->getkd_obt;
                                        $id_unit            = $stok[$xxr]->getidUnit;
                                        $kd_milik           = $stok[$xxr]->getkdmilik;
                                        $stok_dikeluarkan   = $stok[$xxr]->getjumlah;
                                        $batch              = $stok[$xxr]->getbatch;
                                        $getstokawal        = $stok[$xxr]->getstokawal;
                                        $jns_racikan        = $stok[$xxr]->jns_racikan;

                                        $save_stokObatRacik = "INSERT INTO far_obat_outstok (id_kunjungan_far, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, jns_racikan) VALUES ('$id_kunjungan_far', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$stok_dikeluarkan', '$jns_racikan')";

                                        $this->db->query($save_stokObatRacik);
                                    }
                                }
                            }
                        }else{
                            $delstokobatRacik = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunjungan' and jns_racikan != '0' ";
                            $this->db->query($delstokobatRacik);
                        }

                    }

                    $this->db->transComplete();
                    if ($this->db->transStatus()) {
                        $cek    = "SELECT * FROM far_obat_out WHERE id_far = '$id_far' and noresep = '$noresep' and tglresep = '$tglresep'";

                        $output['code']     = "200";
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil Resep";
                        $output['result']   = $this->db->query($cek)->getResult();
                        $output['id_transaksi'] = $idtransaksi;
                    }else{
                        $output['code']     = "500";
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan STOK OBAT LIVE...";
                    }
                }else{
                    $this->db->transRollback();
                    $output['code']     = "500";
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Simpan...";
                }
    
            } else {
                $output['x']        = '';
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $this->hasil($output);
                return;

            }

        }
        $this->hasil($output);
    }

    public function CreateResepRJRIIGD()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'userRWJAPT', 'id_pegRWJAPT' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunjungan   = $input->id_kunjRWJAPT;
            $id_unit        = $input->id_unitRWJAPT;
            $id_pegawai     = $input->id_pegRWJAPT; // id dokter
            $cat_alergi     = str_replace(array("\r","\n")," ", $input->catalergiRWJAPT);
            $id_user        = $input->userRWJAPT;
            $gekIdFar       = "SELECT 
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                END AS id_far
                                FROM unit WHERE id_unit = '".$id_unit."'";
            $getrowkIdFar   = $this->db->query($gekIdFar)->getRow();
            $id_far         = $getrowkIdFar->id_far;
            $id_farstok = $this->getMappingUnitDepo($id_unit);
            if (($id_farstok == '0')||($id_farstok == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }
            $norm           = $input->normRWJAPT;
            $tglkunj        = $input->tgl_kunjRWJAPT;
            $tglresep       = $input->tglresepRWJAPT;
            $tglorder       = $input->tglorderRWJAPT;
            $liveresep      = $input->liveresepRWJAPT;
            $id_order       = $input->id_orderRWJAPT;
            $penjamin       = $input->penjaminresepRWJAPT; 
            $grandtotal     = $input->grandtotalresepRWJAPT; 
            $ppntotal       = $input->ppnresepRWJAPT; 

            $kdmilikObat    = $input->kd_milikObatbyUser;
            $get_margin = $this->getMargin_denganunit($penjamin, $id_far);

            if ($get_margin < 0){
                $output['status']   = "gagal";
                $output['pesan']    = "Margin Obat Tidak diKetahui, Cek Setup Penjamin!! ";
                $this->hasil($output);
                return;
            }

            $this->db->transStart();
            if ($input->noresepRWJAPT == ''){
                /*$cek    = "SELECT id_far, noresep, tglresep FROM far_obat_out WHERE id_far = '".$id_far."' and tglresep = '".$tglresep."' ORDER BY noresep DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $x      = $row->noresep;
                        $real   = ((int)$x + 1);
                        $id_noresep = $real;
                    }else{
                        $id_noresep = 1;
                    }
                }

                $noresep = $id_noresep;*/
                //BUAT RESEP
                // $query = "INSERT INTO far_obat_out (id_kunjungan, noresep, id_unit, id_pegawai, cat_alergi, id_user, id_far, tglresep, norm, liveresep, id_order, penjamin, gatot) VALUES ('$id_kunjungan', '$noresep', '$id_unit', '$id_pegawai', '$cat_alergi', '$id_user', '$id_far', '$tglresep', '$norm', '$liveresep', '$id_order', '$penjamin', '$grandtotal')";
                if ($id_far == '4001'){

                    $query = "INSERT INTO far_obat_out (id_kunjungan, id_unit, id_pegawai, cat_alergi, id_user, id_far, tglresep, norm, liveresep, id_order, penjamin, gatot, hpp, ppn) VALUES ('$id_kunjungan', '$id_unit', '$id_pegawai', '$cat_alergi', '$id_user', '$id_far', '$tglresep', '$norm', '$liveresep', '$id_order', '$penjamin', '$grandtotal', '0', '$ppntotal') returning noresep";

                }else{
                    $query = "INSERT INTO far_obat_out (id_kunjungan, id_unit, id_pegawai, cat_alergi, id_user, id_far, tglresep, norm, liveresep, id_order, penjamin, gatot, hpp, ppn) VALUES ('$id_kunjungan', '$id_unit', '$id_pegawai', '$cat_alergi', '$id_user', '$id_far', '$tglresep', '$norm', '$liveresep', '$id_order', '$penjamin', '$grandtotal', '0', '0') returning noresep";
                }

                $noresep = $this->db->query($query)->getRow()->noresep;
                $result  = 'true';

            }else{
                $noresep  = $input->noresepRWJAPT;
                $cek    = "SELECT dilayani FROM far_obat_out WHERE noresep = '$noresep' and id_far = '$id_far' and tglresep = '$tglresep' ORDER BY noresep DESC LIMIT 1";

                if ($this->db->simpleQuery($cek)) { //true
                    $row        = $this->db->query($cek)->getRow();
                    $dilayani   = $row->dilayani;
                    if ($dilayani != 0){
                        // $output['status']   = "gagal";
                        // $output['pesan']    = "Resep Sudah Dilayani Apotik!!";
                        
                        $output['code']     = "501";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        $this->hasil($output);
                        return;

                    }else{
                        if ($id_far == '4001'){
                            $query  ="  UPDATE far_obat_out SET 
                                            dilayani    = '0',
                                            cat_alergi  = '$cat_alergi',
                                            gatot       = '$grandtotal',
                                            penjamin    = '$penjamin',
                                            ppn         = '$ppntotal'
                                        WHERE id_kunjungan = '$id_kunjungan' and noresep = '$noresep' and tglresep = '$tglresep' ";
                        }else{
                            $query  ="  UPDATE far_obat_out SET 
                                            dilayani    = '0',
                                            cat_alergi  = '$cat_alergi',
                                            gatot       = '$grandtotal',
                                            penjamin    = '$penjamin',
                                            ppn         = '0'
                                        WHERE id_kunjungan = '$id_kunjungan' and noresep = '$noresep' and tglresep = '$tglresep' ";
                        }
                        $this->db->query($query);
                        $result = 'true';
                    }
                    
                }else{ 
                    $output['code']     = "500";
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $this->hasil($output);
                    return;
                }
            }

            //if ($this->db->simpleQuery($query)) {
            if ($noresep != '') {
                $updateOrderDilayani  ="UPDATE order_resep SET 
                                dilayani   = '1',
                                order_mng  = 'true'
                            WHERE id_kunjungan = '$id_kunjungan' and id_order = '$id_order' and tglorder = '$tglorder' ";
                
                if (($id_order != '')&&($tglorder != '')){
                    $this->db->query($updateOrderDilayani);
                }
                
                $data    = $input->dataRWJAPT;
                $hrgaasliTotalObatJadi = 0;
                $hrgaasliTotalRacik    = 0;
                //OBAT JADI
                if ($input->jmlObatRWJAPT != 0){
                    $delobatJadi = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep'";
                    $this->db->query($delobatJadi);

                    for( $i=0; $i < $input->jmlObatRWJAPT; $i++){
                        $getUrut = "SELECT MAX(urut) as urut FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                        $this->db->simpleQuery($getUrut);
                        $row     = $this->db->query($getUrut)->getRow();
                        $urut   = (int)$row->urut + 1;

                        //$urut       = $data[$i]->urut;
                        $kd_obt       = $data[$i]->kd_obt;
                        $jumlah       = $data[$i]->qty;
                        //$id_far       = 1;
                        $kd_milik     = $kdmilikObat;
                        $ket          = $data[$i]->ket;
                        $signa        = $data[$i]->signa;
                        $jns_racik    = 0;
                        //$tglresep     = $tglresep;
                        $dosis_obat   = 0;
                        $exp          = $data[$i]->exp;
                        $hrgajual     = $data[$i]->hargaJual;
                        $hrgaasli     = $data[$i]->hargaAsli;

                        $hrgaasliTot  = $jumlah * $hrgaasli;
                        $hrgaasliTotalObatJadi += $hrgaasliTot;
                        
                        if ($exp != ''){
                            $save_detobatJadi = "INSERT INTO far_obat_outdet (noresep, urut, kd_obat, jumlah, id_far, kd_milik, ket, tglresep, jns_racikan, id_signa, dosis, exp, harga_jual, harga_sat, markup) VALUES ('$noresep', '$urut', '$kd_obt', '$jumlah', '$id_farstok', '$kd_milik', '$ket', '$tglresep', '$jns_racik', '$signa', '$dosis_obat', '$exp', '$hrgajual', '$hrgaasli', '$get_margin')";

                            $this->db->query($save_detobatJadi);
                        }else{
                            $output['code']     = "502";
                            $output['status']   = "gagal";
                            $output['pesan']    = "Expired Date Obat Belum di Tentukan...!";
                            $this->hasil($output);
                            return;
                        }
                    }

                    
                }else{
                    $delobatJadi = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' and jns_racikan = '0' ";
                    $this->db->query($delobatJadi);
                }

                //OBAT RACIK
                $dataracik   = $input->data_racikRWJAPT;
                if ($input->jmlObatRacikRWJAPT != 0){
                    $delobatRacik = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' and jns_racikan != '0' ";
                    $this->db->query($delobatRacik);
                    
                    for( $j=0; $j < $input->jmlObatRacikRWJAPT; $j++){ //MEMBACA BANYAKNYA RACIKAN
                        $dataObatRacik   = $dataracik[$j]->obat;
                        for( $i=0; $i < $dataracik[$j]->count; $i++){
                            $getUrut = "SELECT MAX(urut) as urut FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                            $this->db->simpleQuery($getUrut);
                            $row     = $this->db->query($getUrut)->getRow();
                            $urut   = (int)$row->urut + 1;
                            
                            //$urut         = $dataObatRacik[$i]->urut;
                            $kd_obt       = $dataObatRacik[$i]->kd_obt;
                            $dosis_obat   = $dataObatRacik[$i]->dosis;
                            $jumlah       = $dataObatRacik[$i]->qty;
                            $ket          = $dataObatRacik[$i]->ket;
                            $expired      = $dataObatRacik[$i]->exp;
                            $hrgajual     = $dataObatRacik[$i]->harga;
                            $hrgaasli     = $dataObatRacik[$i]->harga_asli;

                            $hrgaasliTot  = $jumlah * $hrgaasli;
                            $hrgaasliTotalRacik += $hrgaasliTot;

                            //$id_far       = 1;
                            $kd_milik     = $kdmilikObat;
                            $signa        = $dataracik[$j]->Signa;
                            $jns_racik    = $dataracik[$j]->Nama;
                            $qty_racik    = $dataracik[$j]->Bnyk;
                            $ket_racik    = $dataracik[$j]->Ket;
                            //$tglresep     = $tglresep;
                            if ($expired != ''){
                                $save_detobatRacik = "INSERT INTO far_obat_outdet (noresep, urut, kd_obat, jumlah, id_far, kd_milik, ket, tglresep, jns_racikan, id_signa, dosis, qty_racik, ket_racik, exp, harga_jual, harga_sat, markup) VALUES ('$noresep', '$urut', '$kd_obt', '$jumlah', '$id_farstok', '$kd_milik', '$ket', '$tglresep', '$jns_racik', '$signa', '$dosis_obat', '$qty_racik', '$ket_racik', '$expired', '$hrgajual', '$hrgaasli', '$get_margin')";

                                $this->db->query($save_detobatRacik);
                            }else{
                                $output['code']     = "502";
                                $output['status']   = "gagal";
                                $output['pesan']    = "Expired Date Obat Belum di Tentukan...!";
                                $this->hasil($output);
                                return;
                            }
                        }
                    }

                }else{
                    $delobatRacik = "DELETE FROM far_obat_outdet WHERE noresep = '$noresep' and tglresep = '$tglresep' and jns_racikan != '0'";
                    $this->db->query($delobatRacik);
                }
                
                $hrgaasliTotalALL = $hrgaasliTotalObatJadi + $hrgaasliTotalRacik;
                $update_HPP  =" UPDATE far_obat_out SET hpp = $hrgaasliTotalALL WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                $this->db->query($update_HPP);

                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    
                    $this->db->transStart();
                    $id_kunj_far = $this->cekIdKunjunganResep($noresep, $id_kunjungan, $norm, $id_far);

                    if ($id_kunj_far != ''){
                        if ($input->jmlObatRWJAPT != 0){
                            $delstokobatJadi = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunj_far' and jns_racikan = '0' ";
                            $this->db->query($delstokobatJadi);
                            
                            $datastokObatJadi = $input->updateStokObatJadi;
                            for( $ss=0; $ss < $input->jmlObatRWJAPT; $ss++){
                                $countjmlh   = $datastokObatJadi[$ss]->countjmlh;

                                if ($countjmlh != 0){
                                    $stok   = $datastokObatJadi[$ss]->stok;
                                    for( $xx=0; $xx < $datastokObatJadi[$ss]->countjmlh; $xx++){
                                        $id_kunjungan_far   = $id_kunj_far; //$stok[$xx]->id_kunj_far;
                                        $exp                = $stok[$xx]->getexp;
                                        $kd_obat            = $stok[$xx]->getkd_obt;
                                        $id_unit            = $stok[$xx]->getidUnit;
                                        $kd_milik           = $stok[$xx]->getkdmilik;
                                        $stok_dikeluarkan   = $stok[$xx]->getjumlah;
                                        $batch              = $stok[$xx]->getbatch;
                                        $getstokawal        = $stok[$xx]->getstokawal;
                                        $jns_racikan        = $stok[$xx]->jns_racikan;

                                        $save_stokObatJadi = "INSERT INTO far_obat_outstok (id_kunjungan_far, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, jns_racikan) VALUES('$id_kunjungan_far', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$stok_dikeluarkan', '$jns_racikan') 
                                        ON CONFLICT (id_kunjungan_far, id_unit, kd_obat, exp, kd_milik, jns_racikan) DO 
                                        UPDATE SET stok_dikeluarkan = EXCLUDED.stok_dikeluarkan";
                                        //$save_stokObatJadi = "INSERT INTO far_obat_outstok (id_kunjungan_far, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, jns_racikan) VALUES ('$id_kunjungan_far', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$stok_dikeluarkan', '$jns_racikan')";

                                        $this->db->query($save_stokObatJadi);
                                        
                                    }
                                }
                            }
                        }else{
                            $delstokobatJadi = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunj_far' and jns_racikan = '0' ";
                            $this->db->query($delstokobatJadi);
                        }

                        if ($input->jmlObatRacikRWJAPT != 0){
                            $delstokobatRacik = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunj_far' and jns_racikan != '0' ";
                            $this->db->query($delstokobatRacik);
                            
                            $datastokObatRacik = $input->updateStokObatRacik;
                            // echo count($input->updateStokObatRacik);
                            // return;
                            for( $rr=0; $rr < count($datastokObatRacik); $rr++){
                                $countjmlh   = $datastokObatRacik[$rr]->countjmlh;                               
                                if ($countjmlh != 0){
                                    $stok   = $datastokObatRacik[$rr]->stok;
                                    for( $xxr=0; $xxr < $countjmlh; $xxr++){
                                        $id_kunjungan_far   = $id_kunj_far;
                                        $exp                = $stok[$xxr]->getexp;
                                        $kd_obat            = $stok[$xxr]->getkd_obt;
                                        $id_unit            = $stok[$xxr]->getidUnit;
                                        $kd_milik           = $stok[$xxr]->getkdmilik;
                                        $stok_dikeluarkan   = $stok[$xxr]->getjumlah;
                                        $batch              = $stok[$xxr]->getbatch;
                                        $getstokawal        = $stok[$xxr]->getstokawal;
                                        $jns_racikan        = $stok[$xxr]->jns_racikan;

                                        $save_stokObatRacik = "INSERT INTO far_obat_outstok (id_kunjungan_far, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, jns_racikan) VALUES ('$id_kunjungan_far', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$stok_dikeluarkan', '$jns_racikan')";
                                        
                                        // echo $save_stokObatRacik;
                                        // return;
                                        // $save_stokObatRacik = "INSERT INTO far_obat_outstok (id_kunjungan_far, exp, batch, kd_obat, id_unit, kd_milik, stok_dikeluarkan, jns_racikan) VALUES('$id_kunjungan_far', '$exp', '$batch', '$kd_obat', '$id_unit', '$kd_milik', '$stok_dikeluarkan', '$jns_racikan') 
                                        // ON CONFLICT (id_kunjungan_far, id_unit, kd_obat, exp, kd_milik, jns_racikan) DO 
                                        // UPDATE SET stok_dikeluarkan = EXCLUDED.stok_dikeluarkan";

                                        $this->db->query($save_stokObatRacik);
                                    }
                                }
                            }
                        }else{
                            $delstokobatRacik = "DELETE FROM far_obat_outstok WHERE id_kunjungan_far = '$id_kunj_far' and jns_racikan != '0' ";
                            $this->db->query($delstokobatRacik);
                        }

                    }

                    $this->db->transComplete();
                    if ($this->db->transStatus()) {
                        $cek    = "SELECT * FROM far_obat_out WHERE id_far = '$id_far' and noresep = '$noresep' and tglresep = '$tglresep'";

                        $output['code']     = "200";
                        $output['status']   = "sukses";
                        $output['pesan']    = "Simpan Berhasil Resep";
                        $output['result']   = $this->db->query($cek)->getResult();
                        //$output['id_kunj_far'] =  $id_kunj_far;
                    }else{
                        $output['code']     = "500";
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal Simpan STOK OBAT...";
                    }
                }else{
                    $this->db->transRollback();
                    $output['code']     = "500";
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Simpan...";
                }
    
            } else {
                //$output['status']   = "gagal";
                //$output['pesan']    = "Gagal Simpan Resep";
                //$output['pesan']    = $this->db->error();
                $output['x']        = '';
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
                $this->hasil($output);
                return;

            }

        }
        $this->hasil($output);
    }

    public function cek_nominalkoma_resep($noresep)
    {
        $query = "  SELECT 
                        count(noresep) as count
                    FROM
                        far_obat_out 
                    WHERE
                        noresep = '$noresep' 
                        AND gatot :: VARCHAR ILIKE '%.%'";
        $row = $this->db->query($query)->getRow();
        $count   = $row->count;
        return $count;
    }

    public function transferObat_penjualanApotek()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noresep', 'id_kunj', 'id_unit', 'norm', 'tgl_resep' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $noresep    = $input->noresep;
            $id_kunj    = $input->id_kunj;
            $id_unit    = $input->id_unit;
            $getIdProd  = " SELECT 
                                CASE 
                                    WHEN jenis_unit = '1' THEN '133'
                                    WHEN jenis_unit = '2' THEN '133'
                                    WHEN jenis_unit = '3' THEN '133'
                                    WHEN jenis_unit = '7' THEN '133'
                                    WHEN jenis_unit = '8' THEN '134'
                                END AS id_produk,
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
            $rowid_produk  = $this->db->query($getIdProd)->getRow();
            $id_produkx    = $rowid_produk->id_produk;
            $id_farx       = $rowid_produk->id_far;

            if ($id_farx == ''){
                $id_produk  = '133';
                $id_far     = $id_unit;
            }else{
                $id_produk  = $id_produkx;
                $id_far     = $id_farx;
            }

            $norm       = $input->norm;
            $nmpasien   = $input->nmpasien;
            $tgl_kunj   = $input->tgl_kunj;
            $vtgl_resep = $input->tgl_resep;
            $id_pegawai = $input->id_peg;
            $harga      = $input->totharga;
            $iduser     = $input->user;
            $now        = date('Y-m-d');
            $id_jenis_component = '1';

            if ($noresep != ''){
                $query    = "SELECT * FROM far_obat_out WHERE noresep = '$noresep' AND id_kunjungan = '$id_kunj' AND norm = '$norm' AND id_far = '$id_far' AND tglresep = '$vtgl_resep'";

                $queryHPP = "
                            SELECT SUM
                                ( jumlah * harga_sat ) AS totharga_satuan --> HPP Belum Margin
                            FROM
                                far_obat_outdet 
                            WHERE
                                noresep = '$noresep'";
                
                $cek_desimal = $this->cek_nominalkoma_resep($noresep);

                if ($cek_desimal > 0){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Transfer Gagal, Ada Nominal Desimal\nSimpan Ulang!!";
                    $this->hasil($output);
                    return;
                }

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Resep Tidak Diketahui!!";
                $this->hasil($output);
                return;
            }
            // echo $query;
            // return;
            $hasil = $this->db->query($query);
            if ($hasil->getNumRows() > 0) {

                $row        = $this->db->query($query)->getRow();
                $dilayani   = $row->dilayani;
                $tgl_resep  = $row->tglresep;
                $id_kunj_far= $row->id_kunjungan_far;
                $id_penjamin= $row->penjamin;
                $gatot      = $row->gatot;              // Grand Total SUDAH MARGIN
                $ppn        = $row->ppn;                // PPN dari Grand Total MARGIN
                $hpp        = $row->hpp;                // Grand Total BELUM MARGIN (HARGA ASLI)
                $gatot_ppn  = ceil($gatot + $ppn);      // Grand Total Margin + PPN Margin (KHUSUS RJ)

                $rowHPP     = $this->db->query($queryHPP)->getRow();
                $HPPdb      = $rowHPP->totharga_satuan;
                if (($harga == 0)||($gatot == 0)||($hpp == 0)){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Harga Penjualan Kosong, Simpan Dahulu!!";
                    $this->hasil($output);
                    return;
                }else if ($harga > 0){
                    if ($harga != $gatot){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Harga Penjualan Tidak Sama.<br>Simpan Dahulu, Baru Transfer!";
                        $this->hasil($output);
                        return;
                    }

                    if ($HPPdb != $hpp){
                        $output['status']   = "gagal";
                        $output['pesan']    = "HPP Tidak Sama.<br>Simpan Dahulu, Baru Transfer!";
                        $this->hasil($output);
                        return;
                    }

                }

                $cekJumlahObat  = " SELECT
                                        id_kunjungan_far,
                                        noresep,
                                        jns_racikan,
                                        kd_obat,
                                        nama_obat 
                                    FROM
                                        far_obat_out foo
                                        INNER JOIN far_obat_outdet food USING ( noresep )
                                        LEFT JOIN far_obat_outstok foos USING ( id_kunjungan_far, jns_racikan, kd_obat )
                                        INNER JOIN far_obat USING ( kd_obat ) 
                                    WHERE
                                        noresep = '$noresep' and foo.tglresep = '$vtgl_resep'
                                        AND foos.EXP IS NULL 
                                    ORDER BY
                                        jns_racikan ASC ";

                $jika = $this->db->query($cekJumlahObat)->getNumRows();

                if ($jika > 0){
                    $row            = $this->db->query($cekJumlahObat)->getRow();
                    $nama_racikan   = $row->jns_racikan;
                    $nama_obat      = $row->nama_obat;
                    if ($nama_racikan == 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Item Obat Jadi ada $nama_obat Belum Tersimpan, Ulangi Entrian lalu Simpan!!";
                        $this->hasil($output);
                        return;    
                    }else{
                        $output['status']   = "gagal";
                        $output['pesan']    = "Item Obat Racik: Jenis Racikan $nama_racikan ada $nama_obat Belum Tersimpan, Ulangi Entrian lalu Simpan!!";
                        $this->hasil($output);
                        return;  
                    }
                    
                }

                $query_outstok  = " SELECT
                                        id_kunjungan_far,
                                        exp, 
                                        kd_obat,
                                        id_unit,
                                        kd_milik,
                                        sum(stok_dikeluarkan) as stok_dikeluarkan
                                    FROM
                                        far_obat_outstok 
                                    WHERE
                                        id_kunjungan_far = '$id_kunj_far'
                                    GROUP BY
                                        id_kunjungan_far,
                                        exp, 
                                        kd_obat,
                                        id_unit,
                                        kd_milik,
                                        stok_dikeluarkan";
                $getquery_outstok   = $this->db->query($query_outstok);  
                //PROSES CEK STOK OBAT
                foreach ($getquery_outstok->getResult() as $result){ 
                    
                    $id_unit    = $result->id_unit;
                    $kd_obat    = $result->kd_obat;
                    $kd_milik   = $result->kd_milik;
                    $exp        = $result->exp;
                    $qty        = $result->stok_dikeluarkan;
                    $nama_obat  = $this->db->query("SELECT nama_obat from far_obat where kd_obat='".$kd_obat."'")->getRow()->nama_obat;

                    $getStokTersedia = "SELECT * FROM far_stok
                                        WHERE exp = '$exp' and id_unit = '$id_unit' and kd_obat = '$kd_obat' and kd_milik = '$kd_milik' ";
                    $result_getStokTersedia = $this->db->query($getStokTersedia)->getRow();
                    
                    if ($this->db->query($getStokTersedia)->getNumRows() > 0){
                        $stok_unit   = $result_getStokTersedia->stok_unit;
                        if($qty > $stok_unit){
                            
                            $output['status']   = "gagal";
                            $output['pesan']    = $kd_obat." / ".$nama_obat.",\n Jumlah Obat Tidak Mencukupi...!!";
                            $this->hasil($output);
                            return;
                        }
                    }else{
                        $output['status']   = "gagal";
                        $output['pesan']    = $kd_obat." / ".$nama_obat.",\n Stok Obat Tidak Tersedia!!";
                        $this->hasil($output);
                        return;
                    }

                }

                if ($dilayani > 0){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Resep Sudah Terlayani!!";
                    $this->hasil($output);
                    return;
                }else{

                    $getTransaksi   = "SELECT id_transaksi FROM kunjungan WHERE id_kunjungan = '$id_kunj_far'";
                    if ($this->db->query($getTransaksi)->getNumRows() <= 0){
                        $output['status']  = "gagal";
                        $output['pesan']    = "Transaksi tidak diketahui, Gagal Kunjungan!<br>Hapus Resep dan Simpan lagi..";
                        $this->hasil($output);
                        return;
                    }
                    $getrowTrans    = $this->db->query($getTransaksi)->getRow();
                    $id_transaksi   = $getrowTrans->id_transaksi;

                    /*$getTarif   = " SELECT id_tarif FROM
                                        tarif tr
                                        INNER JOIN produk pr ON tr.id_produk = pr.id_produk 
                                    WHERE
                                        pr.id_produk = '$id_produk' AND id_penjamin = '$id_penjamin'";*/
                    $getTarif   = " SELECT
                                        id_tarif,
                                        jumlah
                                    FROM
                                        tarif tr
                                        INNER JOIN produk pr USING (id_produk)
                                        INNER JOIN tarif_component USING (id_tarif)
                                    WHERE
                                        pr.id_produk = '$id_produk' 
                                        AND id_penjamin = '$id_penjamin'";
                    // echo $getTarif;
                    // return;
                    if ($this->db->query($getTarif)->getNumRows() <= 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "-- Tarif tidak diketahui --\nCek Tarif Penjamin dan Componentnya\nHub. Tim IT Madiun!";
                        $this->hasil($output);
                        return;
                    }
                    $getrowTarif    = $this->db->query($getTarif)->getRow();
                    $id_tarif       = $getrowTarif->id_tarif;
                    $qty            = '1';
                    $diskon         = '0';

                    $cekTransaksi   = $this->cekTransaksi($id_kunj_far);
                    // $cekTransaksi   = "SELECT tgl_tutup FROM transaksi WHERE id_transaksi = '$id_transaksi'";
                    // $hasilTransaksi = $this->db->query($cekTransaksi)->getRow();
                    // $tgl_tutup   = $hasilTransaksi->tgl_tutup;
                    if ($cekTransaksi != '') {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Transaksi Sudah Di Tutup!!";
                        $this->hasil($output);
                        return;
                    }

                    if ($id_transaksi != null){
                        $this->db->transStart();
                        // $insert = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, tgl_input, id_tarif, qty, diskon, harga, total_harga) VALUES ('$id_transaksi','$id_kunj_far', '$id_produk', '$vtgl_resep', '$id_tarif', '$qty', '$diskon', '$harga', '$harga') returning id_detail_transaksi";
                        $insert = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, tgl_input, id_tarif, qty, diskon) VALUES ('$id_transaksi','$id_kunj_far', '$id_produk', '$vtgl_resep', '$id_tarif', '$qty', '$diskon') returning id_detail_transaksi";

                        $id_detail_transaksi = $this->db->query($insert)->getRow()->id_detail_transaksi;

                        if ($id_far == '4001'){
                            // $update = "UPDATE detail_component SET harga = '$gatot_ppn', harga_asli = '$gatot_ppn', id_pegawai = '$id_pegawai', jurnal = 't' WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $update = "UPDATE detail_component SET harga = '$gatot_ppn', harga_asli = '$gatot_ppn', jurnal = 't' WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $this->db->query($update);
                        }else{
                            // $update = "UPDATE detail_component SET harga = '$harga', harga_asli = '$harga', id_pegawai = '$id_pegawai', jurnal = 't'  WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $update = "UPDATE detail_component SET harga = '$harga', harga_asli = '$harga', jurnal = 't'  WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $this->db->query($update);
                        }

                        $update_kunj = "UPDATE kunjungan SET posting = 't' WHERE id_kunjungan = '$id_kunj_far'";
                        $this->db->query($update_kunj);

                        // $updateAPTDilayani  ="UPDATE far_obat_out SET dilayani = '1' WHERE noresep = '$noresep' AND id_kunjungan = '$id_kunj' AND norm = '$norm' AND id_far = '$id_far'";
                        // $this->db->simpleQuery($updateAPTDilayani);

                        $update_kunjstokout = "UPDATE far_obat_outstok SET posting = 't' WHERE id_kunjungan_far = '$id_kunj_far'";
                        $this->db->query($update_kunjstokout);

                        //PROSES JURNAL RESEP
                        $cekJurnal = "SELECT id_jurnal FROM ac_jurnal WHERE id_gl = 'PNJ-$id_transaksi'";
                        $result_cekJurnal = $this->db->query($cekJurnal)->getRow();
                        
                        if ($this->db->query($cekJurnal)->getNumRows() > 0){
                            //JIKA SUDAH ADA MAKA TINGGAL INSERT KE AC_JURNAL_DETAIL
                            $id_jurnal   = $result_cekJurnal->id_jurnal;
                        }else{
                            //JIKA BELUM ADA MAKA TINGGAL INSERT KE AC_JURNAL DULU
                            $saveJurnal = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('PNJ-$id_transaksi', '$now', 'Penjualan ID Transaksi $id_transaksi', '$iduser') returning id_jurnal";
                            $id_jurnal = $this->db->query($saveJurnal)->getRow()->id_jurnal;
                        }
                        
                        // ID COA => 51000 ID ACC => 144
                        /*$saveJurnal_debet = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '144', 'Harga Pokok Penjualan', '4', '$nmpasien', '$hpp','0','$iduser','$now')";
                        $this->db->simpleQuery($saveJurnal_debet);*/

                        // ID COA => 51001 ID ACC => 145
                        $saveJurnal_debet = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '145', 'Harga Pokok Penjualan', '4', '$nmpasien', '$hpp','0','$iduser','$now')";
                        $this->db->query($saveJurnal_debet);

                        $saveJurnal_kredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '27', 'Persediaan Medis', '4', '$nmpasien', '0','$hpp','$iduser','$now')";
                        $this->db->query($saveJurnal_kredit);

                        //JIKA RESEP RJ INI DIINSERTKAN PPN KELUARAN
                        if ($id_far == '4001'){
                            $saveJurnal_ppnkeluar = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '90', 'PPN Keluaran', '4', '$nmpasien', '0','$ppn','$iduser','$now')";
                            $this->db->query($saveJurnal_ppnkeluar);

                            $saveJurnal_piutang_penpadatan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '32', 'Piutang Pendapatan', '4', '$nmpasien', '$gatot_ppn','0','$iduser','$now')";
                            $this->db->query($saveJurnal_piutang_penpadatan);
                        }else{
                            $saveJurnal_piutang_penpadatan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '32', 'Piutang Pendapatan', '4', '$nmpasien', '$gatot','0','$iduser','$now')";
                            $this->db->query($saveJurnal_piutang_penpadatan);
                        }

                        $saveJurnal_pendptan_item = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '119', 'Pendapatan Item', '4', '$nmpasien', '0','$gatot','$iduser','$now')";
                            $this->db->query($saveJurnal_pendptan_item);

                        $waktu_terlayani = date("Y-m-d H:i:s");
                        $updateAPTDilayani  ="UPDATE far_obat_out SET dilayani = '1', id_jurnal = '$id_jurnal', waktu_terlayani = '$waktu_terlayani' WHERE noresep = '$noresep' AND id_kunjungan = '$id_kunj' AND norm = '$norm' AND id_far = '$id_far' AND id_kunjungan_far = '$id_kunj_far'";
                            $this->db->query($updateAPTDilayani);

                        $this->db->transComplete();
                        if ($this->db->transStatus()) {
                            $output['code']         = "200";
                            $output['status']       = "sukses";
                            $output['pesan']        = "Transfer Berhasil";
                        }else{
                            $this->db->transRollback();
                            $output['code']         = "500";
                            $output['status']       = "gagal";
                            $output['pesan']        = "Gagal Transfer...";
                        }
                    }else{
                        $output['code']         = "500";
                        $output['status']       = "gagal";
                        $output['pesan']        = "Id Transaksi Tidak Diketahui!!";
                    }
                }

            }else{
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
            }
            
        }
        $this->hasil($output);
    }

    public function getExpObat()
    {
        $input = json_decode(file_get_contents('php://input'));
        $output = array();

        $iduser    = $input->id_user;
        $idunit    = $input->id_unit;
        
        // $idfarx = $this->cekIdFarUnit($idunit, $iduser);
       
        // if ($idfarx == '0'){
        //     $idfar = $this->cekIdFarUser($iduser);
        //     if (($idfar == '0')||($idfar == 'null')){
        //         $output['status']   = "gagal";
        //         $output['pesan']    = "Modul Farmasi Tidak diketahui!";
        //         $this->hasil($output);
        //         return;
        //     }
        // }else{
        //     // $gekIdFar   = " SELECT
        //     //                     CASE 
        //     //                         WHEN jenis_unit IN ('1', '7') THEN '4001'
        //     //                         WHEN jenis_unit = '2' THEN '4002'
        //     //                         WHEN jenis_unit = '3' THEN '4003' 
        //     //                     END AS id_far
        //     //                 FROM unit WHERE id_unit = '".$input->id_unit."'";
        //     // $getrowkIdFar   = $this->db->query($gekIdFar)->getRow();
        //     // $id_far         = $getrowkIdFar->id_far;
        //     $id_far = $idfarx;
        // }

        $idfar = $this->getMappingUnitDepo($idunit);
        // $idfar = $this->cekIdFarUser($iduser);
        if (($idfar == '0')||($idfar == 'null')){
            $output['status']   = "gagal";
            $output['pesan']    = "Modul Farmasi Tidak diketahui!";
            $this->hasil($output);
            return;
        }
        $query = "
                SELECT
                    kd_obat,
                    nama_obat,
                    EXP,
                    COALESCE ( stok_unit, 0 ) AS stok_unit,
                    kd_milik,
                    milik,
                    id_unit
                FROM
                    far_obat
                    LEFT JOIN far_stok USING ( kd_obat ) 
                    INNER JOIN far_obat_milik USING (kd_milik)
                WHERE
                    kd_obat = '$input->kd_obat' 
                    AND id_unit = '$idfar' 
                    AND stok_unit != '0' 
                    AND kd_milik = '$input->kd_milik'
                ORDER BY
                    EXP ASC
        ";

        //RESEP LANGSUNG TIDAK MUNCUL EXP
        $hasilQuery =  $this->db->query($query);
        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getDetail_HistoryOrderResep()
    {
        $input = json_decode(file_get_contents('php://input'));
    
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $id_order   = $input->id_order;
        $tglorder   = $input->tglorder;           
        if ($id_order != '' ){ 
            $query_detJadi  = " SELECT * FROM
                                    order_resepdet ord 
                                    INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
                                    INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                WHERE
                                    id_order = '".$id_order."' 
                                    AND tgl_order = '".$tglorder."' 
                                    AND jns_racikan = '0' 
                                ORDER BY
                                    urut ASC";

            $GroupRacik     = " SELECT
                                    jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                FROM
                                    order_resepdet ord 
                                    INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                WHERE
                                    id_order = '".$id_order."' 
                                    AND tgl_order = '".$tglorder."' 
                                    AND jns_racikan != '0' 
                                GROUP BY
                                    id_order, tgl_order, jns_racikan, ord.id_signa, qty_racik, ket_racik, signa
                                ORDER BY jns_racikan ASC";
            
            if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                $query_detRacik = " SELECT * FROM
                                    order_resepdet ord 
                                    INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
                                    INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                WHERE
                                    id_order = '".$id_order."' 
                                    AND tgl_order = '".$tglorder."' 
                                    AND jns_racikan != '0' 
                                ORDER BY
                                    urut ASC";
                $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
            }
                    
            // echo $query_detRacik;
            // return;
            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "";
            $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
            $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
            
        }else{
            $output['code']     = "501";
            $output['status']   = "sukses";
            $output['pesan']    = "";
        
        }
        $this->hasil($output);
    }

    public function getHistoryOrderResep()
    {
        $input = json_decode(file_get_contents('php://input'));    
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $id_unit    = $input->id_unit;
        $no_rm    = $input->no_rm;
        
        $getJenisUnit   = " SELECT 
                                jenis_unit
                            FROM unit WHERE id_unit = '".$id_unit."'";
        $row        = $this->db->query($getJenisUnit)->getRow();
        $jenis_unit = $row->jenis_unit;
        
        if ($input->jmlh > 0){
            $jml        = "LIMIT ".$input->jmlh;
        }else{
            $jml        = "";
        }
        $query  = " SELECT
                        tgl_masuk,
                        tglorder,
                        id_kunjungan,
                        id_order,
                        order_resep.id_unit,
                        nama_unit 
                    FROM
                        order_resep
                        LEFT JOIN kunjungan USING ( id_kunjungan )
                        INNER JOIN transaksi USING ( id_transaksi )
                        INNER JOIN pasien USING ( no_rm )
                        INNER JOIN unit ON kunjungan.id_unit = unit.id_unit 
                    WHERE
                        LEFT ( kunjungan.id_unit, 1 ) = '$jenis_unit' and no_rm = '$no_rm' and order_mng = 't'
                    ORDER BY
                        tgl_masuk DESC $jml";

        if ($this->db->query($query)->getNumRows() > 0) {
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Data ditemukan.";
            $output['data']     = $this->db->query($query)->getResult();
        }else{
            $output['code']     = "501";
            $output['status']   = "sukses";
            $output['pesan']    = "";
        }

        $this->hasil($output);
    }

    public function getTemplateOrderEResep()
    {
        $input = json_decode(file_get_contents('php://input'));    
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $iddokter    = $input->iddokter;
        
        if ($input->jmlh > 0){
            $jml        = "LIMIT ".$input->jmlh;
        }else{
            $jml        = "";
        }
        $query  = " SELECT *,
                        (SELECT nama FROM users WHERE id_user = templateresep.id_user) as nama_user,
                        (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = templateresep.id_pegawai) as nama_pegawai
                    FROM
                        templateresep
                    WHERE
                        status = true and id_pegawai = '$iddokter'
                    ORDER BY
                        tgl_buat DESC $jml";

        if ($this->db->query($query)->getNumRows() > 0) {
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Data ditemukan.";
            $output['data']     = $this->db->query($query)->getResult();
        }else{
            $output['code']     = "501";
            $output['status']   = "sukses";
            $output['pesan']    = "";
        }

        $this->hasil($output);
    }

    public function CreateOrderResepRWJ_history()
    {
        $input = json_decode(file_get_contents('php://input'));
        
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

            $id_kunjungan  = $input->id_kunj;
            $id_unit       = $input->id_unit;
            $gekIdFar    = "SELECT 
                            CASE 
                                WHEN jenis_unit IN ('1', '7') THEN '4001'
                                WHEN jenis_unit = '2' THEN '4002'
                                WHEN jenis_unit = '3' THEN '4003'
                            END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
            $getrowkIdFar  = $this->db->query($gekIdFar)->getRow();
            $idfar         = $getrowkIdFar->id_far;
            $id_pegawai    = $input->id_peg;
            $dilayani      = '0';
            $order_mng     = 'false';
            $cat_diagnosa  = $input->diag;
            $cat_iter      = $input->iter;
            $id_user       = $input->user;
            $status_order  = 'true';
            //$tglorder      = date("Y-m-d");
            $tglorder      = $input->tglorder;
            $waktu_order   = date("H:i:s");
            
            if ($input->id_order != ''){ //JIKA SUDAH ADA ID ORDERNYA MAKA UPDATE
                $id_order  = $input->id_order;
                $cek    = "SELECT dilayani FROM order_resep WHERE id_order = '".$id_order."' AND tglorder = '".$tglorder."' ORDER BY id_order DESC LIMIT 1";

                if ($this->db->simpleQuery($cek)) { //true
                    $row        = $this->db->query($cek)->getRow();
                    $dilayani   = $row->dilayani;
                    if ($dilayani != 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Order Resep Sudah Dilayani Apotik!!";
                        $this->hasil($output);
                        return;
                    }else{
                        $query  ="UPDATE order_resep SET 
                                    cat_diagnosa = '$cat_diagnosa',
                                    cat_iter     = '$cat_iter'
                                WHERE id_kunjungan = '$id_kunjungan' and id_order = '$id_order' and tglorder = '$tglorder' ";
                    }
                    
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Simpan Order Resep!!";
                    exit;
                }
                
            }else{ //JIKA MASIH KOSONG BUAT BARU ID ORDERNYA
                // $cek    = "SELECT id_order FROM order_resep WHERE tglorder = '".$tglorder."' ORDER BY id_order DESC LIMIT 1";
                $cek    = "SELECT id_order FROM order_resep ORDER BY id_order DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $id_order   = $row->id_order;
                        //$realx  = date('Ymd');
                        $real   = ((int)$id_order + 1);
                        $id_mrresep = $real;
                    }else{
                        $id_mrresep = 1;
                    }
                }

                $id_order = $id_mrresep;
                //BUAT ORDER RESEP
                $query = "INSERT INTO order_resep (id_kunjungan, id_order, id_unit, id_pegawai, dilayani, order_mng, cat_diagnosa, id_user, status_order, cat_iter, tglorder, id_far) VALUES ('$id_kunjungan', '$id_order', '$id_unit', '$id_pegawai', '$dilayani', '$order_mng', '$cat_diagnosa', '$id_user', '$status_order', '$cat_iter', '$tglorder', '$idfar')";
            }

            if ($this->db->simpleQuery($query)) {
                $cariid_orderx = $input->cariid_orderx;
                $caritglorderx = $input->caritglorderx;
                
                $getDetailObat  = " SELECT * FROM
                                        order_resepdet ord 
                                        INNER JOIN far_obat fo ON fo.kd_obat = ord.kd_obat
                                        INNER JOIN mapping_signa ms ON ms.id_signa = ord.id_signa
                                    WHERE
                                        id_order = '".$cariid_orderx."' 
                                        AND tgl_order = '".$caritglorderx."' 
                                    ORDER BY
                                        urut ASC";
                // echo $getDetailObat;
                // return;
                if ($this->db->query($getDetailObat)->getNumRows() > 0) {
                    
                    $delobat_lama = "DELETE FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder'";
                    $this->db->simpleQuery($delobat_lama);

                    foreach ($this->db->query($getDetailObat)->getResult() as $result){
                        $getUrut = "SELECT MAX(urut) as urut FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder' ";
                        $this->db->simpleQuery($getUrut);
                        $row     = $this->db->query($getUrut)->getRow();
                        
                        $urut         = (int)$row->urut + 1;
                        $kd_obat      = $result->kd_obat;
                        $jumlah       = $result->jumlah;
                        $id_far       = $idfar;
                        $kd_milik     = $result->kd_milik;
                        if ($result->ket == ''){
                            $ket      = null;
                        }else{
                            $ket      = $result->ket;
                        }
                        
                        $tgl_order    = $tglorder;
                        $dosis        = $result->dosis;
                        $jns_racik    = $result->jns_racikan;
                        $idsigna      = $result->id_signa;
                        if ($result->qty_racik == ''){
                            $qty_racik    = '0';
                        }else{
                            $qty_racik    = $result->qty_racik;
                        }
                        
                        if ($result->ket_racik == ''){
                            $ket_racik    = null;
                        }else{
                            $ket_racik    = $result->ket_racik;
                        }
                        
                        $simpan = "INSERT INTO order_resepdet (id_order, urut, kd_obat, jumlah, id_far, kd_milik, ket, tgl_order, dosis, jns_racikan, id_signa, qty_racik, ket_racik) VALUES ('$id_order', '$urut', '$kd_obat', '$jumlah', '$id_far', '$kd_milik', '$ket', '$tgl_order', '$dosis', '$jns_racik', '$idsigna', '$qty_racik', '$ket_racik')";
                        // echo $simpan;
                        // return;
                        $this->db->simpleQuery($simpan);
                    }

                    $output['status']   = "sukses";
                    $output['pesan']    = "Simpan Berhasil Resep";
                    $output['id_order'] = $id_order;
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Tidak ditemukan History Order.";
                    $output['id_order'] = $id_order;
                }

            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Resep";
                //$output['pesan']    = $this->db->error();
                $output['id_order'] = '';

            }

        $this->hasil($output);
        //echo json_encode($output);
    }

    public function getMappingUnitDepo($id_unit)
    {
        $query = "  SELECT
                        depo_unit_tuj,
                        nama_unit
                    FROM
                        depo_unit
                        LEFT JOIN unit ON depo_unit.depo_unit_tuj = unit.id_unit 
                    WHERE
                        depo_unit.id_unit = '$id_unit' 
                        AND depo_unit.aktif = TRUE ";

        if ($this->db->query($query)->getNumRows() > 0) {
            $row = $this->db->query($query)->getRow();
            $unitfarmasitujuan = $row->depo_unit_tuj;
            
        }else{
            $unitfarmasitujuan = 0;
           
        }
        
        return $unitfarmasitujuan;
    }

    public function CreateOrderResepRWJ_templateresep()
    {
        $input = json_decode(file_get_contents('php://input'));
        
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $id_kunjungan  = $input->id_kunj;
        $id_unit       = $input->id_unit;
        $gekIdFar      = "  SELECT 
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
        $getrowkIdFar  = $this->db->query($gekIdFar)->getRow();
        $idfar         = $getrowkIdFar->id_far;
        $id_pegawai    = $input->id_peg;
        $dilayani      = '0';
        $order_mng     = 'false';
        $cat_diagnosa  = $input->diag;
        $cat_iter      = $input->iter;
        $id_user       = $input->user;
        $status_order  = 'true';
        $tglorder      = $input->tglorder;
        $waktu_order   = date("H:i:s");
        
        $this->db->transStart();
        if ($input->id_order != ''){ // UPDATE
            $id_order   = $input->id_order;
            $cek        = " SELECT dilayani FROM order_resep WHERE id_order = '".$id_order."' AND tglorder = '".$tglorder."' ORDER BY id_order DESC LIMIT 1";

            if ($this->db->query($cek)) { //true
                $row        = $this->db->query($cek)->getRow();
                $dilayani   = $row->dilayani;
                if ($dilayani != 0){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Order Resep Sudah Dilayani Apotik!!";
                    $this->hasil($output);
                    return;
                }else{
                    $query  ="  UPDATE order_resep SET 
                                    cat_diagnosa = '$cat_diagnosa',
                                    cat_iter     = '$cat_iter'
                                WHERE id_kunjungan = '$id_kunjungan' and id_order = '$id_order' and tglorder = '$tglorder' ";
                }
                
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan Order Resep!!";
                exit;
            }
            
        }else{ // NEW
            $cek    = "SELECT id_order FROM order_resep ORDER BY id_order DESC LIMIT 1";
            if ($this->db->query($cek)) { //true
                $cekx   = $this->db->query($cek)->getResult();
                $row    = $this->db->query($cek)->getRow();
                if (!empty($cekx)){
                    $id_order   = $row->id_order;
                    //$realx  = date('Ymd');
                    $real   = ((int)$id_order + 1);
                    $id_mrresep = $real;
                }else{
                    $id_mrresep = 1;
                }
            }

            $id_order   = $id_mrresep;
            $query      = " INSERT INTO order_resep (id_kunjungan, id_order, id_unit, id_pegawai, dilayani, order_mng, cat_diagnosa, id_user, status_order, cat_iter, tglorder, id_far) VALUES ('$id_kunjungan', '$id_order', '$id_unit', '$id_pegawai', '$dilayani', '$order_mng', '$cat_diagnosa', '$id_user', '$status_order', '$cat_iter', '$tglorder', '$idfar')";
        }
        
        if ($this->db->query($query)) {
            $id_template = $input->id_template;
            $tgl_buat    = $input->tgl_buat;
            
            $getDetailObat  = " SELECT * FROM
                                    templateresep_det trd 
                                    INNER JOIN far_obat fo ON fo.kd_obat = trd.kd_obat
                                    INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa
                                WHERE
                                    id_template = '$id_template' 
                                ORDER BY
                                    urut ASC";
            // echo $getDetailObat;
            // return;
            if ($this->db->query($getDetailObat)->getNumRows() > 0) {
                
                $delobat_lama = "DELETE FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder'";
                $this->db->query($delobat_lama);

                foreach ($this->db->query($getDetailObat)->getResult() as $result){
                    $getUrut = "SELECT MAX(urut) as urut FROM order_resepdet WHERE id_order = '$id_order' and tgl_order = '$tglorder' ";
                    //$this->db->query($getUrut);
                    $row     = $this->db->query($getUrut)->getRow();
                    
                    $urut         = (int)$row->urut + 1;
                    $kd_obat      = $result->kd_obat;
                    $jumlah       = $result->jumlah;
                    $id_far       = $idfar;
                    $kd_milik     = 3; //$result->kd_milik
                    if ($result->ket == ''){
                        $ket      = null;
                    }else{
                        $ket      = $result->ket;
                    }
                    
                    $tgl_order    = $tglorder;
                    $dosis        = $result->dosis;
                    $jns_racik    = $result->jns_racikan;
                    $idsigna      = $result->id_signa;
                    if ($result->qty_racik == ''){
                        $qty_racik    = '0';
                    }else{
                        $qty_racik    = $result->qty_racik;
                    }
                    
                    if ($result->ket_racik == ''){
                        $ket_racik    = null;
                    }else{
                        $ket_racik    = $result->ket_racik;
                    }
                    
                    $simpan = "INSERT INTO order_resepdet (id_order, urut, kd_obat, jumlah, id_far, kd_milik, ket, tgl_order, dosis, jns_racikan, id_signa, qty_racik, ket_racik) VALUES ('$id_order', '$urut', '$kd_obat', '$jumlah', '$id_far', '$kd_milik', '$ket', '$tgl_order', '$dosis', '$jns_racik', '$idsigna', '$qty_racik', '$ket_racik')";
                    $this->db->query($simpan);
                }

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Tidak ditemukan Obat pada Template Resep.";
                $output['id_order'] = "";
                $this->hasil($output);
                return;
            }
        }

        $this->db->transComplete();

        if ($this->db->transStatus()) {
            $output['status']   = "sukses";
            $output['pesan']    = "Simpan Berhasil Resep";
            $output['id_order'] = $id_order;
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Gagal Simpan Resep";
            $output['id_order'] = '';
        }

        $this->hasil($output);
    }

    public function riwayatobat_listapotek()
    {
        $input = json_decode(file_get_contents('php://input'));    
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $no_rm    = $input->norm;
        $tgl_masuk= $input->tglmasuk;

        $idfar    = $input->idfar;

        if ($idfar != ''){
            if ($idfar == '4001'){
                $jenis_unit = "('1','4')";
            }else if ($idfar == '4002'){
                $jenis_unit = "('2','4')";
            }else if ($idfar == '4003'){
                $jenis_unit = "('3','4')";
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui";
                $this->hasil($output);
                return;
            }
        }else{
            $output['status']   = "gagal";
            $output['pesan']    = "Modul Farmasi Tidak diketahui";
            $this->hasil($output);
            return;
        }
        
        if ($no_rm > 0){
            $kondisi    = "no_rm = '$no_rm' and";
        }else{
            $kondisi    = "";
        }

        if ($input->jmlh > 0){
            $jml        = "LIMIT ".$input->jmlh;
        }else{
            $jml        = "";
        }
        $query  = " SELECT
                        id_transaksi,
                        no_rm, nama, tgl_masuk,
                        id_kunjungan,
                        noresep, tglresep,
                        far_obat_out.id_unit,
                        nama_unit
                    FROM
                        far_obat_out
                        LEFT JOIN kunjungan USING ( id_kunjungan )
                        INNER JOIN transaksi USING ( id_transaksi )
                        INNER JOIN pasien USING ( no_rm )
                        INNER JOIN unit ON kunjungan.id_unit = unit.id_unit 
                    WHERE
                        --LEFT ( kunjungan.id_unit, 1 ) = '$jenis_unit' AND
                        --LEFT ( kunjungan.id_unit, 1 ) in '$jenis_unit' AND
                        id_far = '$idfar' AND
                        $kondisi nama ILIKE '".$input->nmpasien."%' and tglresep = '$tgl_masuk' and dilayani = '1'
                    ORDER BY
                        tgl_masuk DESC $jml";

        if ($this->db->query($query)->getNumRows() > 0) {
            $output['code']     = "200";
            $output['status']   = "sukses";
            $output['pesan']    = "Data ditemukan.";
            $output['data']     = $this->db->query($query)->getResult();
        }else{
            $output['code']     = "501";
            $output['status']   = "sukses";
            $output['pesan']    = "";
        }

        $this->hasil($output);
    }

    public function etiketUDD()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));
        
        $id_kunj   = $_POST['id_kunj'];
        $tgl_kunj  = $_POST['tgl_kunj'];
        $tgl_resp  = $_POST['tgl_resp'];
        $no_rm     = $_POST['no_rm'];
        $idunit    = $_POST['idunit'];
        $noresep   = $_POST['noresep'];
        $jenisObat = $_POST['jenisObat'];

        if ($jenisObat == '1'){
            $tipe   = "and tipe = 'Obat Dalam'";
            $nmtipe = "Obat Dalam";
        }else if ($jenisObat == '2'){
            $tipe   = "and tipe = 'Obat Luar'";
            $nmtipe = "Obat Luar";
        }else{
            $tipe   = "";
            $nmtipe = "-";
        }

        $getJenisUnit   = " SELECT 
                                jenis_unit
                            FROM unit WHERE id_unit = '".$idunit."'";

        $rowx        = $this->db->query($getJenisUnit)->getRow();
        $jenis_unit = $rowx->jenis_unit;

        if ($jenis_unit == 0){
            $output['status']   = "gagal";
            $output['pesan']    = "Cek Unit Pasien dari Gawat Darurat, Rawat Jalan atau Rawat Inap";
            $this->hasil($output);
            return;
        }else{
            if ($jenis_unit == '1'){
                $idfar = '4001';
            }else if ($jenis_unit == '2'){
                $idfar = '4002';
            }else if ($jenis_unit == '3'){        
                $idfar = '4003';
            }else if ($jenis_unit == '4'){        
                $idfar = $idunit;
            }
        }

        $query  = " SELECT
                        no_rm, nama, tgl_masuk,
                        id_kunjungan,
                        noresep, tglresep,
                        far_obat_out.id_unit,
                        nama_unit,
                        tgl_lahir,
                        id_kunjungan_far
                    FROM
                        far_obat_out
                        LEFT JOIN kunjungan USING ( id_kunjungan )
                        INNER JOIN transaksi USING ( id_transaksi )
                        INNER JOIN pasien USING ( no_rm )
                        INNER JOIN unit ON kunjungan.id_unit = unit.id_unit 
                    WHERE
                        LEFT ( kunjungan.id_unit, 1 ) = '$jenis_unit' and
                        far_obat_out.id_kunjungan = '$id_kunj'";
        
        $row        = $this->db->query($query)->getRow();
        if ($this->db->query($query)->getNumRows() == 0){
            $output['status']   = "gagal";
            $output['pesan']    = "Order Resep Belum Disimpan..";
            $this->hasil($output);
            return;
        }

        $queryObatJadi  = " SELECT
                                *
                            FROM
                                far_obat_out
                                INNER JOIN far_obat_outdet USING(noresep, tglresep, id_far)
                                INNER JOIN far_obat USING (kd_obat)
                                INNER JOIN mapping_signa USING (id_signa)
                                INNER JOIN pegawai USING (id_pegawai)
                            WHERE
                                noresep = '$noresep' and tglresep = '$tgl_resp' and id_far = '$idfar' and id_kunjungan = '$id_kunj' $tipe AND jns_racikan = '0' ORDER BY urut ASC
                            ";

        $queryObatRacik = " SELECT
                                jns_racikan, food.id_signa, qty_racik, ket_racik, signa, nama_pegawai
                            FROM
                                far_obat_out
                                INNER JOIN far_obat_outdet food USING(noresep, tglresep, id_far)
                                INNER JOIN mapping_signa ms ON ms.id_signa = food.id_signa 
                                INNER JOIN pegawai USING (id_pegawai)
                            WHERE
                                noresep = '".$noresep."' 
                                AND id_far = '".$idfar."' 
                                AND tglresep = '".$tgl_resp."'  
                                AND jns_racikan != '0' 
                            GROUP BY
                                noresep, tglresep, jns_racikan, food.id_signa, qty_racik, ket_racik, signa, nama_pegawai
                            ORDER BY jns_racikan ASC";
        // echo $GroupRacik;
        // return;
        $queryDetailObatJadi = $this->db->query($queryObatJadi);
        $GroupRacik          = $this->db->query($queryObatRacik);

        if (($queryDetailObatJadi->getNumRows() == 0)&&($GroupRacik->getNumRows() == 0)){
            $output['status']   = "gagal";
            $output['pesan']    = "Tidak ditemukan $nmtipe / Racikan Obat!!";
            $this->hasil($output);
            return;
        }

        $html = "<html>
                    <head>
                    <style type='text/css'>
                        body{
                            margin : 0px;
                            padding: 0px;
                            font-family : 'Times New Romans';
                            font-size: 25px;
                        }

                        .height-kertas{
                            padding-left: 1px;
                            padding-right: 1px;
                            //border: solid 1px black;
                        }
                        .header{
                            font-size: 30px;
                            text-align:center;
                            margin-top : 5px;
                        }
                        .barcode {
                            padding: 0;
                            margin: 0;
                            vertical-align: top;
                            color: black;
                        }
                        .barcodecell {
                            text-align: center;
                            vertical-align: middle;
                        }
                        
                        div.pagebreak{
                            page-break-after: always;
                            box-decoration-break: slice|clone;
                        }
                    </style>
                    </head>
                    <body>";

                $html .= "<div class='height-kertas'>"; 
        foreach ($queryDetailObatJadi->getResult() as $obatJadi) {
            $html .= "<div class='header'><b>RSU DARMAYU MADIUN</b></div>";
            //$html .= "<hr>";
       
            //$html .= "<div class='barcodecell'><barcode code='$no_rm' type='C128A' class='barcode' height='0.66'/></div>";
        
            $html .= "<table width = '100%' border='0' cellpadding='0' cellspacing='0' style='margin-top:0px;'>";
                $html .= "<tr>";
                $html .= "<td valign='top' width='70'><b>No.Resep</b></td>";
                $html .= "<td valign='top' width='210'><b>: ".$row->noresep."</b></td>";
                $html .= "<td valign='top'><b>Tgl.Resep : ".date_format(date_create($tgl_resp), 'd-M-Y')."</b></td>";
                $html .= "</tr>";
                
                $html .= "<tr>";
                $html .= "<td valign='top' ><b>No. RM</b></td>";
                $html .= "<td valign='top' ><b>: ".$no_rm."</b></td>";            
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td valign='top'><b>Nama</b></td>";
                $tmp_nama = $row->nama;
                if (strlen($tmp_nama) > 24) {
                    $tmp_nama = substr($tmp_nama, 0, 24)."...";
                }
                $html .= "<td valign='top' colspan='2'><b>: ".$tmp_nama."</b></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td valign='top'><font class='font_label'><b>Tgl Lahir</b></font></td>";
                $html .= "<td valign='top' colspan='2'><b>: ".date_format(date_create($row->tgl_lahir), 'd-M-Y')." / ".umur($row->tgl_lahir)."</b></td>";
                $html .= "</tr>";

            $html .= "</table>";
            $html .= "<div style='border: 2px solid black; margin-top:5px; margin-bottom:10px;'></div>";
            //OBAT

            $html .= "<table width='100%' cellpadding='0' cellspacing='0' border='0' style='padding-left:10px;'>";
                $html .= "<tr>";
                $html .= "<td valign='top'><b>$obatJadi->nama_obat</b></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td valign='top'><b>$obatJadi->signa</b></td>";
                $html .= "</tr>";
            $html .= "</table>";
            
            $html .= "<table width='100%' cellpadding='0' cellspacing='0' border='0' style='margin-top:10px;'>";
                if ($obatJadi->ket != ''){
                    $html .= "<tr>";
                    $html .= "<td valign='top' width='70'><b>Catatan</b></td>";
                    $html .= "<td valign='top' width='10'>:</td>";
                    $html .= "<td valign='left'><b>".strtoupper($obatJadi->ket)."</b></td>";
                    $html .= "</tr>";
                }
                $html .= "<tr>";
                $html .= "<td valign='top' width='70'><b>Expired</b></td>";
                $html .= "<td valign='top' width='10'>:</td>";
                $html .= "<td valign='left'><b>".date_format(date_create($obatJadi->exp), 'd-m-Y')."</b></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td valign='top'><b>Dokter</b></td>";
                $html .= "<td valign='top'>:</td>";
                $html .= "<td valign='left'><b>".strtoupper($obatJadi->nama_pegawai)."</b></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td valign='top'><b>Banyak</b></td>";
                $html .= "<td valign='top'>:</td>";
                $html .= "<td valign='left'><b>$obatJadi->jumlah</b></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td valign='top' colspan='3'><b>".strtoupper($obatJadi->tipe)."</b></td>";
                $html .= "</tr>";

            $html .= "</table>";

            $html .= "<div class='pagebreak'></div>";
            //$html .= "<pagebreak>";
            
        }

        if ($GroupRacik->getNumRows() > 0) {          
            $queryDetailObatRacik  = $this->db->query(" 
                        SELECT
                            *
                        FROM
                            far_obat_out
                            INNER JOIN far_obat_outdet USING(noresep, tglresep, id_far)
                            INNER JOIN far_obat USING (kd_obat)
                            INNER JOIN mapping_signa USING (id_signa)
                            INNER JOIN pegawai USING (id_pegawai)
                        WHERE
                            noresep = '$noresep' and tglresep = '$tgl_resp' and id_far = '$idfar' and id_kunjungan = '$id_kunj' $tipe AND jns_racikan > '0' ORDER BY urut ASC
                            ");
                        
            //for( $i=0; $i < $this->db->query($GroupRacik)->getNumRows(); $i++){
            foreach ($GroupRacik->getResult() as $obatRacik) {
            
                $html .= "<div class='header'><b>RSU DARMAYU MADIUN</b></div>";
                $html .= "<table border='0' cellpadding='0' cellspacing='0' style='margin-top:0px;' width = '100%'>";
                    $html .= "<tr>";
                    $html .= "<td valign='top' width='70'><b>No.Resep</b></td>";
                    $html .= "<td valign='top' width='210'><b>: ".$row->noresep."</b></td>";
                    $html .= "<td valign='top'><b>Tgl.Resep : ".date_format(date_create($tgl_resp), 'd-M-Y')."</b></td>";
                    $html .= "</tr>";
                    
                    $html .= "<tr>";
                    $html .= "<td valign='top' ><b>No. RM</b></td>";
                    $html .= "<td valign='top' ><b>: ".$no_rm."</b></td>";            
                    $html .= "</tr>";

                    $html .= "<tr>";
                    $html .= "<td valign='top'><b>Nama</b></td>";
                    $tmp_nama = $row->nama;
                    if (strlen($tmp_nama) > 24) {
                        $tmp_nama = substr($tmp_nama, 0, 24)."...";
                    }
                    $html .= "<td valign='top' colspan='2'><b>: ".$tmp_nama."</b></td>";
                    $html .= "</tr>";

                    $html .= "<tr>";
                    $html .= "<td valign='top'><font class='font_label'><b>Tgl Lahir</b></font></td>";
                    $html .= "<td valign='top' colspan='2'><b>: ".date_format(date_create($row->tgl_lahir), 'd-M-Y')." / ".umur($row->tgl_lahir)."</b></td>";
                    $html .= "</tr>";

                $html .= "</table>";
                $html .= "<div style='border: 2px solid black; margin-top:5px; margin:10px;'></div>";
              
                $html .= "<table cellpadding='0' cellspacing='0' border='0' style='padding-left:10px;' width='100%' >";      
                
                    $html .= "<tr>";
                    $html .= "<td valign='top'><u><b>$obatRacik->jns_racikan</b></u></td>";
                    $html .= "</tr>";
                  
                    $html .= "<tr>";
                    $html .= "<td valign='top'><b>$obatRacik->signa</b></td>";
                    $html .= "</tr>";

                    $html .= "<tr>";
                    $html .= "<td valign='top'><b></b></td>";
                    $html .= "</tr>";
                $html .= "</table>";
                
                $html .= "<table cellpadding='0' cellspacing='0' border='0' style='margin-top:30px;' width='100%' >";
                    
                    $html .= "<tr>";
                        $html .= "<td valign='top' width='70'><b>Catatan</b></td>";
                        $html .= "<td valign='top' width='10'>:</td>";
                        $html .= "<td valign='left'><b>".strtoupper($obatRacik->ket_racik)."</b></td>";
                    $html .= "</tr>";

                    $html .= "<tr>";
                        $html .= "<td valign='top'><b>Dokter</b></td>";
                        $html .= "<td valign='top'>:</td>";
                        $html .= "<td valign='left'><b>".strtoupper($obatRacik->nama_pegawai)."</b></td>";
                    $html .= "</tr>";

                $html .= "</table>";

                $html .= "<div class='pagebreak'></div>";
                //$html .= "<pagebreak>";
            }

        }
            
        $html .= "</div>";
        $html .= " </body>
                </html>";
        
        $mpdf   = new \Mpdf\Mpdf(
            [
            'mode'          => 'utf-8',
            'format'        => [180, 115], //pxl
            'margin_top'    => 0,
            'margin_bottom' => 0,
            'margin_left'   => 2,
            'margin_right'  => 2,
            'mirrorMargins' => true
            ]);

        $mpdf->WriteHTML($html);
        $mpdf->Output("Cetak Etiket.pdf", 'I');
        exit;
    }

    public function returRJIGD_listapotek()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noretur', 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $noretur    = $input->noretur;
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $tglretur1  = $input->tglretur1;
            $tglretur2  = $input->tglretur2;
            
            $stsposting = $input->stsposting;
            $jml        = $input->jmlh;
            $idfar      = $input->idfar;

            if (($noretur == '') || ($noretur == '0')){
                $konidisi = '';
            }else{
                $konidisi = "no_retur = '".$noretur."' AND";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "LIMIT '".$jml."'";
            }

            if ($stsposting == '-'){
                $konidisi2 = '';
            }else{
                $konidisi2 = "AND posting = '".$stsposting."'";
            }

            if (($idfar == '0')||($idfar == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }else{
                if ($idfar == '4001'){
                    $jenis_unit = "jenis_unit IN ('1', '4') AND";
                }else if ($idfar == '4003'){
                    $jenis_unit = "jenis_unit IN ('3', '4') AND";
                }else{
                    $jenis_unit = "jenis_unit = '0' AND"; 
                    $output['status']   = "gagal";
                    $output['pesan']    = "Cek Modul, Ini Modul Retur Rawat Jalan / Gawat Darurat!";
                    $this->hasil($output);
                    return;
                }
            }

            $query = "
                SELECT 
                    posting,
                    no_retur,
                    tgl_retur,
                    no_rm,
                    nama,
                    nama_unit,
                    id_transaksi,
                    tgl_kunj,
                    id_unit,
                    EXTRACT(year FROM AGE(tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(tgl_lahir))||' Hr' as tgl_lahir,
                    no_sjp,
                    nama_penjamin,
                    id_penjamin,
                    telepon,
                    id_pegawai,
                    nama_pegawai
                FROM
                    far_retur
                    INNER JOIN transaksi USING ( id_transaksi, no_rm )
                    INNER JOIN pasien USING ( no_rm )
                    INNER JOIN unit u USING ( id_unit )
                    INNER JOIN penjamin_transaksi USING ( id_transaksi )
                    INNER JOIN penjamin penj USING ( id_penjamin ) 
                    INNER JOIN pegawai peg USING (id_pegawai)
                WHERE
                    $jenis_unit
                    $konidisi 
                    UPPER ( nama ) LIKE UPPER ( '%' ) 
                    AND no_rm LIKE UPPER ( '%' ) 
                    AND DATE ( tgl_retur ) BETWEEN '$tglretur1' 
                    AND '$tglretur2' 
                    AND id_unit_far = '$idfar'
                    $konidisi2
                ORDER BY
                    tgl_retur DESC 
                    $konidisi1";
            // echo $query;
            // return;
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

    public function returRI_listapotek()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noretur', 'norm' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $noretur    = $input->noretur;
            $norm       = $input->norm;
            $nmapasien  = $input->nmpasien;
            $tglretur1  = $input->tglretur1;
            $tglretur2  = $input->tglretur2;
            
            $stsposting = $input->stsposting;
            $jml        = $input->jmlh;
            $idfar      = $input->idfar;

            if (($noretur == '') || ($noretur == '0')){
                $konidisi = '';
            }else{
                $konidisi = "no_retur = '".$noretur."' AND";
            }

            if (($jml == '') || ($jml == '0')){
                $konidisi1 = '';
            }else{
                $konidisi1 = "LIMIT '".$jml."'";
            }

            if ($stsposting == '-'){
                $konidisi2 = '';
            }else{
                $konidisi2 = "AND posting = '".$stsposting."'";
            }

            if (($idfar == '0')||($idfar == 'null')){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }else{
                if ($idfar == '4002'){
                    $jenis_unit = "jenis_unit IN ('2', '4') AND"; //Rawat Inap
                }else{
                    $jenis_unit = "jenis_unit = '0' AND"; 
                    $output['status']   = "gagal";
                    $output['pesan']    = "Cek Modul, Ini Modul Retur Rawat Inap!";
                    $this->hasil($output);
                    return;
                }
            }

            $query = "
                SELECT 
                    posting,
                    no_retur,
                    tgl_retur,
                    no_rm,
                    nama,
                    nama_unit,
                    id_transaksi,
                    tgl_kunj,
                    id_unit,
                    EXTRACT(year FROM AGE(tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(tgl_lahir))||' Hr' as tgl_lahir,
                    no_sjp,
                    nama_penjamin,
                    id_penjamin,
                    telepon,
                    id_pegawai,
                    nama_pegawai
                FROM
                    far_retur
                    INNER JOIN transaksi USING ( id_transaksi, no_rm )
                    INNER JOIN pasien USING ( no_rm )
                    INNER JOIN unit u USING ( id_unit )
                    INNER JOIN penjamin_transaksi USING ( id_transaksi )
                    INNER JOIN penjamin penj USING ( id_penjamin ) 
                    INNER JOIN pegawai peg USING (id_pegawai)
                WHERE
                    $jenis_unit
                    $konidisi 
                    UPPER ( nama ) LIKE UPPER ( '%' ) 
                    AND no_rm LIKE UPPER ( '%' ) 
                    AND DATE ( tgl_retur ) BETWEEN '$tglretur1' 
                    AND '$tglretur2' 
                    AND id_unit_far = '$idfar'
                    $konidisi2
                ORDER BY
                    tgl_retur DESC 
                    $konidisi1";
            // echo $query;
            // return;
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

    public function getKunjunganPasienRJRIIGD()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'norm', 'tglkunj' ];

        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm       = $input->norm;
            $nmpas      = $input->nmpas;
            $tglkunj    = $input->tglkunj;
            $idfar      = $input->idfar;
            
            if ($idfar == '4001'){
                $kondisi = "jenis_unit IN ('1', '4') AND"; //Rawat Jalan
                $group   = "";
            }else if ($idfar == '4002'){
                $kondisi = "jenis_unit IN ('2', '4') AND"; //Rawat Inap
                $group = "GROUP BY 
                            K.id_kunjungan,
                            tr.id_transaksi,
                            K.id_unit,
                            u.nama_unit,
                            tr.no_rm,
                            P.nama,
                            P.alamat,
                            P.telepon,
                            pt.no_sjp,
                            P.tgl_lahir,
                            penj.id_penjamin,
                            penj.nama_penjamin, 
                            jam_masuk,
                            peg.id_pegawai,
                            nama_pegawai ";
            }else if ($idfar == '4003'){
                $kondisi = "jenis_unit IN ('3', '4') AND"; //Rawat IGD
                $group   = "";
            }else{
                $kondisi = "jenis_unit = '0' AND"; 
                $group   = "";
                $output['status']   = "gagal";
                $output['pesan']    = "Unit Modul Farmasi Tidak Diketahui!!";
                $this->hasil($output);
                return;
            }

            $query = "
                SELECT
                    k.id_kunjungan,
                    tr.id_transaksi,
                    DATE(tr.tgl_transaksi) as tgl_transaksi,
                    k.id_unit,
                    u.nama_unit,
                    tr.no_rm,
                    UPPER(P.nama) as nama,
                    UPPER(P.alamat) as alamat,
                    P.telepon,
                    pt.no_sjp,
                    penj.id_penjamin,
                    penj.nama_penjamin,
                    age(P.tgl_lahir) :: varchar,
                    EXTRACT(year FROM AGE(P.tgl_lahir))||' Th '||EXTRACT(MONTH FROM AGE(P.tgl_lahir))||' Bln '||EXTRACT(DAY FROM AGE(P.tgl_lahir))||' Hr' as tgl_lahir,
                    jam_masuk,
                    peg.id_pegawai,
                    nama_pegawai
                FROM
                    far_obat_out foo
                    INNER JOIN kunjungan K ON foo.id_kunjungan = K.id_kunjungan
                    INNER JOIN transaksi tr ON K.id_transaksi = tr.id_transaksi
                    INNER JOIN pasien p ON tr.no_rm = p.no_rm
                    INNER JOIN unit u ON u.id_unit = K.id_unit 
                    INNER JOIN pegawai peg ON peg.id_pegawai = foo.id_pegawai 
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                WHERE
                    $kondisi
                    p.nama ilike '%".$nmpas."%' AND tr.no_rm like UPPER('".$norm."%')
                    AND DATE(tr.tgl_transaksi) = '$tglkunj' 
                    AND tgl_tutup IS NULL
                    AND id_far = '$idfar'
                    $group
                ";
            
            if ($this->db->simpleQuery($query)) {
                $result = $this->db->query($query)->getResult();                
                if (!empty($result)) { 
                // JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $result;
                } else { 
                // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "100";
                    $output['pesan']    = "";
                }
            } else {
                $output['code']     = "501";
                $output['status']   = 'gagal';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }

    public function returresepRJIGDRI_pencarian_resep()
    {
        $input = json_decode(file_get_contents('php://input'));    
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        
        $norm       = $input->norm;
        $tglkunj    = $input->tglkunj;
        $idfar      = $input->idfar;

        if ($idfar == '4001'){
            $kondisi = "jenis_unit IN ('1', '4') AND"; //Rawat Jalan
        }else if ($idfar == '4002'){
            $kondisi = "jenis_unit IN ('2', '4') AND"; //Rawat Inap
        }else if ($idfar == '4003'){
            $kondisi = "jenis_unit IN ('3', '4') AND"; //Rawat IGD
        }else{
            $kondisi = "jenis_unit = '0' AND"; 
            $output['status']   = "gagal";
            $output['pesan']    = "Unit Modul Farmasi Tidak Diketahui!!";
            $this->hasil($output);
            return;
        }

        $query = "
            SELECT 
                K.id_kunjungan,
                tr.id_transaksi,
                food.id_far,
                noresep,
                tglresep,
                urut,
                jns_racikan,
                kd_obat,
                nama_obat,
                jumlah,
                dosis,
                qty_racik,
                UPPER(CASE 
                        WHEN jns_racikan > '0' THEN ket_racik
                        WHEN jns_racikan = '0' THEN ket
                    END) AS catatan,
                exp,
                harga_jual,
                harga_sat,
                kd_milik,
                markup
            FROM
                transaksi tr
                INNER JOIN pasien P USING (no_rm)
                INNER JOIN kunjungan K USING (id_transaksi)
                INNER JOIN unit u USING (id_unit)
                INNER JOIN far_obat_out foo USING (id_kunjungan)
                INNER JOIN far_obat_outdet food USING (noresep, tglresep)
                INNER JOIN far_obat USING (kd_obat)
            WHERE
                $kondisi
                tr.no_rm = '$norm'
                AND DATE ( tr.tgl_transaksi ) = '$tglkunj'
                AND dilayani = '1'
                AND foo.id_far = '$idfar'
                AND tgl_tutup IS NULL
                ORDER BY noresep, urut ASC
            ";
        // echo $query;
        // return;

        if ($this->db->simpleQuery($query)) {
            $result = $this->db->query($query)->getResult();                
            if (!empty($result)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Data ditemukan";
                $output['data']     = $result;
            } else { 
                $output['status']   = "gagal";
                $output['pesan']    = "Resep Obat Tidak Ditemukan, Pastikan Resep Sudah Terlayani / Transaksi Belum di Tutup!";
                $output['data']     = $result;                    
            }
        } else {
            $output['status']   = 'gagal';
            $output['pesan']    = 'Belum Ada Resep / Sudah Tutup Transaksi!!';
        }
        echo json_encode($output);
    }

    public function lookup_detailobatreturRJRIIGD()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'noretur', 'tglretur'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $iduser     = $input->iduser;
            $noretur    = $input->noretur;
            $tglretur   = $input->tglretur;
            
            if ($noretur != ''){
               
                $query    = "SELECT *, (total + ppn) as grandtotal FROM far_retur WHERE no_retur = '$noretur' AND tgl_retur = '$tglretur' ";
        
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Retur Tidak Diketahui!!";
                $this->hasil($output);
                return;
            }
            // echo $query;
            // return;
            $hasil = $this->db->query($query);
            if ($hasil->getNumRows() > 0) {

                $row       = $this->db->query($query)->getRow();
                $posting   = $row->posting;

                if ($posting == 't'){
                    $query_detobat  = " SELECT
                                            jns_racikan,
                                            frd.kd_obat,
                                            nama_obat,
                                            dosis,
                                            frd.jumlah,
                                            food.jumlah as stok_awal,
                                            (food.jumlah - frd.jumlah) as stok_tersedia,
                                            kd_milik,
                                            noresep,
                                            tglresep,
                                            hrga_jual,
                                            hrga_pokok,
                                            exp_retur,
                                            frd.markup,
                                            UPPER(CASE 
                                                    WHEN jns_racikan > '0' THEN ket_racik
                                                    WHEN jns_racikan = '0' THEN ket
                                            END) AS catatan,
                                            ( hrga_pokok * frd.jumlah ) AS total_harga1,
                                            ( hrga_jual * frd.jumlah ) AS total_harga 
                                        FROM
                                            far_retur_det frd
                                            INNER JOIN far_obat USING ( kd_obat )
                                            INNER JOIN far_obat_outdet food USING ( noresep, tglresep, kd_obat, kd_milik, jns_racikan)
                                        WHERE
                                            no_retur = '$noretur' AND tgl_retur = '$tglretur' 
                                        ORDER BY
                                            frd.urut ASC
                                        ";

                    $output['code']         = "100";
                    $output['status']       = "sukses";
                    $output['pesan']        = "";
                    $output['posting']      = $posting;
                    $output['data']         = $hasil->getResult();
                    $output['ObatRetur']    = $this->db->query($query_detobat)->getResult();
                    $this->hasil($output);
                    return;
                }else{
                    $result  = 'true';
                }
                            

                if ($result  == 'true'){
                    $query_detobat  = " SELECT
                                            jns_racikan,
                                            frd.kd_obat,
                                            nama_obat,
                                            dosis,
                                            frd.jumlah,
                                            food.jumlah as stok_awal,
                                            (food.jumlah - frd.jumlah) as stok_tersedia,
                                            kd_milik,
                                            noresep,
                                            tglresep,
                                            hrga_jual,
                                            hrga_pokok,
                                            exp_retur,
                                            frd.markup,
                                            UPPER(CASE 
                                                    WHEN jns_racikan > '0' THEN ket_racik
                                                    WHEN jns_racikan = '0' THEN ket
                                            END) AS catatan,
                                            ( hrga_pokok * frd.jumlah ) AS total_harga1,
                                            ( hrga_jual * frd.jumlah ) AS total_harga 
                                        FROM
                                            far_retur_det frd
                                            INNER JOIN far_obat USING ( kd_obat )
                                            INNER JOIN far_obat_outdet food USING ( noresep, tglresep, kd_obat, kd_milik, jns_racikan )
                                        WHERE
                                            no_retur = '$noretur' AND tgl_retur = '$tglretur' 
                                        ORDER BY
                                            frd.urut ASC
                                        ";
                    // echo $query_detobat;
                    // return;
                    // $StokObatGab    ="  SELECT
                    //                         id_kunjungan_far,
                    //                         exp,
                    //                         far_obat_outstok.batch,
                    //                         kd_obat,
                    //                         stok_dikeluarkan,
                    //                         COALESCE ( stok_unit, 0 ) AS stok_unit,
                    //                         kd_milik,
                    //                         id_unit,
                    //                         jns_racikan
                    //                     FROM
                    //                         far_obat_outstok
                    //                         INNER JOIN far_stok USING (exp, kd_obat, id_unit, kd_milik)
                    //                     WHERE
                    //                         id_kunjungan_far = '$id_kunj_far'
                    //                     ";

                    $output['code']      = "200";
                    $output['status']    = "sukses";
                    $output['pesan']     = "Data ditemukan.";
                    $output['data']      = $hasil->getResult();
                    $output['count']     = $hasil->getNumRows();
                    $output['ObatRetur'] = $this->db->query($query_detobat)->getResult();
                    // $output['StokObatOut']  = $this->db->query($StokObatGab)->getResult();   
                }

            }else{
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
            }
        }
        $this->hasil($output);
    }

    public function saveReturRJIGDRI()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_user', 'no_rm', 'id_unit' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_transaksi   = $input->id_transaksi;
            $noretur        = $input->noretur;
            $tgl_retur      = $input->tgl_retur;
            $tgl_kunj       = $input->tgl_kunj;
            $id_unit        = $input->id_unit;
            $id_user        = $input->id_user;
            $getIDFAR       = " SELECT 
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                END AS id_far
                                FROM unit WHERE id_unit = '".$id_unit."'";
            $rowIDFAR       = $this->db->query($getIDFAR)->getRow();
            //$id_unit_far    = $rowIDFAR->id_far;
            
            $id_unit_far    = $input->id_unit_far;
            $no_rm          = $input->no_rm;
            $id_dokter      = $input->id_dokter;
            $jmlhbayar      = $input->jmlhbayar;
            $ppnbayar       = $input->ppnbayar;
            $penjamin       = $input->penjamin;

            $this->db->transStart();
            if ($noretur == ''){
                $query = "INSERT INTO far_retur (tgl_retur, id_unit, id_user, id_unit_far, no_rm, total, ppn, tgl_kunj, id_transaksi, id_pegawai, penjamin) VALUES ('$tgl_retur', '$id_unit', '$id_user', '$id_unit_far', '$no_rm', '$jmlhbayar', '$ppnbayar', '$tgl_kunj', '$id_transaksi', '$id_dokter', '$penjamin') returning no_retur";
                $no_retur   = $this->db->query($query)->getRow()->no_retur;
                $result     = 'true';
            }else{
                $no_retur   = $noretur;
                $cek        = "SELECT posting FROM far_retur WHERE no_retur = '$no_retur' and tgl_retur = '$tgl_retur' ORDER BY no_retur DESC LIMIT 1";

                if ($this->db->simpleQuery($cek)) { //true
                    $row       = $this->db->query($cek)->getRow();
                    $posting   = $row->posting;
                    if ($posting == 't'){
                        
                        $output['code']     = "501";
                        $output['status']   = "sukses";
                        $output['pesan']    = "";
                        $this->hasil($output);
                        return;

                    }else{
                        
                        $query  = " UPDATE far_retur SET 
                                        total       = '$jmlhbayar',
                                        ppn         = '$ppnbayar'
                                    WHERE no_retur = '$no_retur' and tgl_retur = '$tgl_retur' ";
                        
                        $this->db->query($query);
                        $result = 'true';
                    }
                    
                }else{ 
                    $output['code']     = "500";
                    $output['status']   = "sukses";
                    $output['pesan']    = "";
                    $this->hasil($output);
                    return;
                }
            }

            if ($no_retur != '') {
                
                $data    = $input->dataObat;
                $grandtotal     = 0;
                $grandtotalHPP  = 0;

                if ($input->jmlh_item != 0){

                    $delobatretur = "DELETE FROM far_retur_det WHERE no_retur = '$no_retur' and tgl_retur = '$tgl_retur' ";
                    $this->db->query($delobatretur);

                    for( $i=0; $i < $input->jmlh_item; $i++){

                        $getUrut = "SELECT MAX(urut) as urut FROM far_retur_det WHERE no_retur = '$no_retur' and tgl_retur = '$tgl_retur'";
                        $this->db->simpleQuery($getUrut);
                        $row     = $this->db->query($getUrut)->getRow();
                        $urut    = (int)$row->urut + 1;

                        $jns_racikan    = $data[$i]->jnsracik;
                        $kd_obat        = $data[$i]->kd_obt;
                        $kd_milik       = $data[$i]->kd_milik;
                        $noresep        = $data[$i]->noresep;
                        $tglresep       = $data[$i]->tglresep;
                        $jumlah         = $data[$i]->qty;
                        $markup         = $data[$i]->markup;
                        $hrga_pokok     = $data[$i]->hargasat;
                        $hrga_jual      = $data[$i]->hargajual;
                        
                        $exp_retur      = $data[$i]->exp;
                        
                        $subtotal       = $jumlah * $hrga_jual;
                        $grandtotal     += $subtotal;

                        $subtotalHPP    = $jumlah * $hrga_pokok;
                        $grandtotalHPP  += $subtotalHPP;
                        
                        if ($exp_retur != ''){
                            $save_detobatRetur = "INSERT INTO far_retur_det (no_retur, tgl_retur, urut, kd_obat, kd_milik, noresep, tglresep, jumlah, id_unit, markup, hrga_pokok, hrga_jual, exp_retur, jns_racikan) VALUES ('$no_retur', '$tgl_retur', '$urut', '$kd_obat', '$kd_milik', '$noresep', '$tglresep', '$jumlah', '$id_unit_far', '$markup', '$hrga_pokok', '$hrga_jual', '$exp_retur', '$jns_racikan')";

                            $this->db->query($save_detobatRetur);

                            $updateResep    = " UPDATE far_obat_out SET no_retur = '$no_retur'
                                                WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                        
                            $this->db->query($updateResep);

                        }else{
                            $output['code']     = "502";
                            $output['status']   = "gagal";
                            $output['pesan']    = "Expired Date Obat $data[$i]->nm_prd Kosong!!";
                            $this->hasil($output);
                            return;
                        }
                    }
                }else{
                    $delobatretur   = "DELETE FROM far_retur_det WHERE no_retur = '$no_retur' and tgl_retur = '$tgl_retur' ";
                    $this->db->query($delobatretur);

                    $updateResep    = " UPDATE far_obat_out SET no_retur  = ''
                                        WHERE noresep = '$noresep' and tglresep = '$tglresep' ";
                        
                    $this->db->query($updateResep);
                }

                $updateretur_HPP  = " UPDATE far_retur SET hpp = $grandtotalHPP WHERE no_retur = '$no_retur' and tgl_retur = '$tgl_retur'";
                $this->db->query($updateretur_HPP);

                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['code']     = "200";
                    $output['status']   = "sukses";
                    $output['pesan']    = "Simpan Retur Berhasil";
                    $output['noretur']  = $no_retur;
                }else{
                    $this->db->transRollback();
                    $output['code']     = "500";
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Simpan Retur...";
                }
    
            } else {
                $output['status']   = "gagal";
                //$output['pesan']    = "Gagal Simpan Retur";
                $output['pesan']    = $this->db->error();
                // $output['noretur']  = '';
                // $output['code']     = "500";
                // $output['status']   = "sukses";
                // $output['pesan']    = "";
                $this->hasil($output);
                return;

            }
            
        }
        $this->hasil($output);
    }

    public function transferRetur_penjualanApotek()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'no_retur', 'id_trans', 'id_unit', 'norm', 'nm_pasien' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_retur   = $input->no_retur;
            $id_trans   = $input->id_trans;
            $id_unit    = $input->id_unit;
            $getIdProd  = " SELECT 
                                CASE 
                                    WHEN jenis_unit = '1' THEN '133'
                                    WHEN jenis_unit = '2' THEN '133'
                                    WHEN jenis_unit = '3' THEN '133'
                                    WHEN jenis_unit = '7' THEN '133'
                                    WHEN jenis_unit = '8' THEN '134'
                                END AS id_produk,
                                CASE 
                                    WHEN jenis_unit IN ('1', '7') THEN '4001'
                                    WHEN jenis_unit = '2' THEN '4002'
                                    WHEN jenis_unit = '3' THEN '4003'
                                END AS id_far
                            FROM unit WHERE id_unit = '".$id_unit."'";
            $rowid_produk  = $this->db->query($getIdProd)->getRow();
            $id_produkx    = $rowid_produk->id_produk;
            $id_farx       = $rowid_produk->id_far;

            if ($id_farx == ''){
                $id_produk  = '133';
                $id_far     = $id_unit;
            }else{
                $id_produk  = $id_produkx;
                $id_far     = $id_farx;
            }

            $norm       = $input->norm;
            $nmpasien   = $input->nm_pasien;
            $tgl_kunj   = $input->tgl_kunj;
            $tgl_retur  = $input->tgl_retur;
            $id_dokter  = $input->id_dokter;
            $harga      = $input->jmlhbayar;
            $iduser     = $input->user;
            $now        = date('Y-m-d');
            $id_jenis_component = '1';

            if ($no_retur != ''){
                $query    = "SELECT * FROM far_retur WHERE no_retur = '$no_retur' AND tgl_retur = '$tgl_retur' AND no_rm = '$norm' AND id_unit_far = '$id_far' ";

                $queryHPP = "
                            SELECT 
                                SUM( jumlah * hrga_pokok ) AS totharga_satuan,    --> HPP Belum Margin
                                CEIL(SUM( jumlah * hrga_jual )) AS totharga_jual, --> HPP + Margin Sesuai Harga Pas Penjualan
                                CEIL((SUM( jumlah * hrga_jual ) * 11) / 100) as PPN_HargJual  --> PPN dari Pnjualan HPP + Margin
                            FROM
                                far_retur_det
                            WHERE
                                no_retur = '$no_retur' AND tgl_retur = '$tgl_retur' ";
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Nomor Retur Tidak Diketahui!!";
                $this->hasil($output);
                return;
            }

            // echo $query;
            // return;
            $hasil = $this->db->query($query);
            if ($hasil->getNumRows() > 0) {

                $row        = $this->db->query($query)->getRow();
                $posting    = $row->posting;
                // $tgl_retur  = $row->tgl_retur;
                // $id_trans   = $row->id_transaksi;
                $id_penjamin = $row->penjamin;
                $id_kunj_far = $row->id_kunjungan_far;

                $gatot      = $row->total;          // Grand Total SUDAH MARGIN
                $ppn        = $row->ppn;            // PPN dari Total MARGIN
                $hpp        = $row->hpp;            // HPP BELUM MARGIN (HARGA ASLI)
                $gatot_ppn  = ceil($gatot + $ppn);  // HPP Margin + PPN Margin (KHUSUS RJ)

                $rowHPP     = $this->db->query($queryHPP)->getRow();
                $HPPdb      = $rowHPP->totharga_satuan;

                if (($harga == 0)||($gatot == 0)||($hpp == 0)){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Harga Penjualan Kosong, Simpan Dahulu!!";
                    $this->hasil($output);
                    return;
                }else if ($harga > 0){
                    if ($harga != $gatot){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Harga Penjualan Tidak Sama.<br>Simpan Dahulu, Baru Posting!";
                        $this->hasil($output);
                        return;
                    }

                    if ($HPPdb != $hpp){
                        $output['status']   = "gagal";
                        $output['pesan']    = "HPP Tidak Sama.<br>Simpan Dahulu, Baru Posting!";
                        $this->hasil($output);
                        return;
                    }

                }

                $query_returdet     = " SELECT
                                            id_kunjungan_far, frd.kd_obat, nama_obat, food.jumlah, frd.jumlah, (food.jumlah - frd.jumlah) as stok_tersedia
                                        FROM
                                            far_retur_det frd
                                            INNER JOIN far_obat_out USING (noresep, tglresep)
                                            INNER JOIN far_obat_outdet food USING (noresep, kd_obat)
                                            INNER JOIN far_obat USING (kd_obat)
                                        WHERE frd.no_retur = '$no_retur' AND tgl_retur = '$tgl_retur'";
                
                $getquery_returdet  = $this->db->query($query_returdet);
                
                //PROSES CEK JUMLAH OBAT ANATARA RESEP DAN RETUR
                foreach ($getquery_returdet->getResult() as $result){ 
                    
                    $nama_obat      = $result->nama_obat;
                    $stok_tersedia  = $result->stok_tersedia;

                    if ($stok_tersedia < 0){
                        
                        $output['status']   = "gagal";
                        $output['pesan']    = $nama_obat.",\n Jumlah Obat Tidak Sesuai yang dikeluarkan!!";
                        $this->hasil($output);
                        return;
                    }
                }

                if ($posting == 't'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Retur Sudah diPosting!!";
                    $this->hasil($output);
                    return;
                }else{

                    if ($id_trans == ''){
                        $output['status']  = "gagal";
                        $output['pesan']    = "Transaksi tidak diketahui, Gagal Posting!<br>Ulangi Retur lagi..";
                        $this->hasil($output);
                        return;
                    }

                    $getTarif   = " SELECT
                                        id_tarif,
                                        jumlah
                                    FROM
                                        tarif tr
                                        INNER JOIN produk pr USING (id_produk)
                                        INNER JOIN tarif_component USING (id_tarif)
                                    WHERE
                                        pr.id_produk = '$id_produk' 
                                        AND id_penjamin = '$id_penjamin'";

                    if ($this->db->query($getTarif)->getNumRows() <= 0){
                        $output['status']   = "gagal";
                        $output['pesan']    = "-- Tarif tidak diketahui --\nCek Tarif Penjamin dan Componentnya\nHub. Tim IT Madiun!";
                        $this->hasil($output);
                        return;
                    }

                    $getrowTarif    = $this->db->query($getTarif)->getRow();
                    $id_tarif       = $getrowTarif->id_tarif;
                    $qty            = '1';
                    $diskon         = '0';

                    $cekTransaksi   = "SELECT tgl_tutup FROM transaksi WHERE id_transaksi = '$id_trans'";
                    $hasilTransaksi = $this->db->query($cekTransaksi)->getRow();
                    $tgl_tutup      = $hasilTransaksi->tgl_tutup;

                    if ($tgl_tutup != '') {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Transaksi Sudah Di Tutup!!";
                        $this->hasil($output);
                        return;
                    }

                    if ($id_trans != null){
                        $this->db->transStart();
                        
                        if ($id_kunj_far == null){

                            //BUAT KUNJUNGAN
                            $insertKunj     = "INSERT INTO kunjungan(id_transaksi, id_unit, id_pegawai, posting) VALUES('$id_trans', '$id_far', '$id_dokter', 't') returning id_kunjungan";
                            $id_kunjungan   = $this->db->query($insertKunj)->getRow()->id_kunjungan;

                            //BUAT DETAIL TRANSASKSI
                            $insertDetTrans         = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, tgl_input, id_tarif, qty, diskon) VALUES ('$id_trans', '$id_kunjungan', '$id_produk', '$tgl_retur', '$id_tarif', '$qty', '$diskon') returning id_detail_transaksi";
                            $id_detail_transaksi    = $this->db->query($insertDetTrans)->getRow()->id_detail_transaksi;
                        
                        }else{
                            $output['status']   = "gagal";
                            $output['pesan']    = "Sudah Di Retur\nGagal Posting!!";
                            $this->hasil($output);
                            return;
                        }
                        
                        if ($id_far == '4001'){
                            //$update = "UPDATE detail_component SET harga = '-$gatot_ppn', harga_asli = '-$gatot_ppn', id_pegawai = '$id_dokter' WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $update = "UPDATE detail_component SET harga = '-$gatot_ppn', harga_asli = '-$gatot_ppn' WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $this->db->query($update);
                        }else{
                            //$update = "UPDATE detail_component SET harga = '-$harga', harga_asli = '-$harga', id_pegawai = '$id_dokter' WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $update = "UPDATE detail_component SET harga = '-$harga', harga_asli = '-$harga' WHERE id_detail_transaksi = '$id_detail_transaksi' AND id_jenis_component = '$id_jenis_component' ";
                            $this->db->query($update);
                        }

                        //PROSES JURNAL RETUR
                        $cekJurnal = "SELECT id_jurnal FROM ac_jurnal WHERE id_gl = 'PNJ-$id_trans'";
                        $result_cekJurnal = $this->db->query($cekJurnal)->getRow();
                        
                        if ($this->db->query($cekJurnal)->getNumRows() > 0){
                            //JIKA SUDAH ADA MAKA TINGGAL INSERT KE AC_JURNAL_DETAIL
                            $id_jurnal   = $result_cekJurnal->id_jurnal;
                        }else{
                            //JIKA BELUM ADA MAKA TINGGAL INSERT KE AC_JURNAL DULU
                            $saveJurnalRetur = "INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, id_pegawai) VALUES ('PNJ-$id_trans', '$now', 'Penjualan ID Transaksi $id_trans', '$iduser') returning id_jurnal";
                            $id_jurnal = $this->db->query($saveJurnalRetur)->getRow()->id_jurnal;
                        }

                        // ID COA => 51000 ID ACC => 144
                        /*$saveJurnalRetur_debet = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '144', 'Harga Pokok Penjualan', '4', '$nmpasien', '0','$hpp','$iduser','$now')";
                        $this->db->simpleQuery($saveJurnalRetur_debet);*/
                        
                        // ID COA => 51001 ID ACC => 145
                        $saveJurnalRetur_debet = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '145', 'Harga Pokok Penjualan', '4', '$nmpasien', '0','$hpp','$iduser','$now')";
                        $this->db->query($saveJurnalRetur_debet);

                        $saveJurnalRetur_kredit = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '27', 'Persediaan Medis', '4', '$nmpasien', '$hpp','0','$iduser','$now')";
                        $this->db->query($saveJurnalRetur_kredit);

                        //JIKA RETUR RJ INI DIINSERTKAN PPN KELUARAN
                        if ($id_far == '4001'){
                            $saveJurnalRetur_ppnkeluar = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '90', 'PPN Keluaran', '4', '$nmpasien', '$ppn','0','$iduser','$now')";
                            $this->db->query($saveJurnalRetur_ppnkeluar);

                            $saveJurnalRetur_piutang_penpadatan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '32', 'Piutang Pendapatan', '4', '$nmpasien', '0','$gatot_ppn','$iduser','$now')";
                            $this->db->query($saveJurnalRetur_piutang_penpadatan);
                        }else{
                            $saveJurnalRetur_piutang_penpadatan = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '32', 'Piutang Pendapatan', '4', '$nmpasien', '0','$gatot','$iduser','$now')";
                            $this->db->query($saveJurnalRetur_piutang_penpadatan);
                        }

                        $saveJurnalRetur_pendptan_item = "INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit, kredit, id_pegawai, date_created) VALUES ('$id_jurnal', '119', 'Pendapatan Item', '4', '$nmpasien', '$gatot','0','$iduser','$now')";
                            $this->db->query($saveJurnalRetur_pendptan_item);

                        $updateReturPos  ="UPDATE far_retur SET posting = 't', id_kunjungan_far = '$id_kunjungan', id_jurnal = '$id_jurnal' WHERE no_retur = '$no_retur' AND tgl_retur = '$tgl_retur' ";

                            $this->db->query($updateReturPos);

                        $this->db->transComplete();

                        if ($this->db->transStatus()) {
                           
                            $output['code']         = "200";
                            $output['status']       = "sukses";
                            $output['pesan']        = "Berhasil di Retur";
                            
                        }else{
                            $this->db->transRollback();
                            $output['code']         = "500";
                            $output['status']       = "gagal";
                            $output['pesan']        = "Gagal Retur...";
                        }
                    }else{
                        $output['code']         = "500";
                        $output['status']       = "gagal";
                        $output['pesan']        = "Id Transaksi Tidak Diketahui!!";
                    }
                }

            }else{
                $output['code']     = "500";
                $output['status']   = "sukses";
                $output['pesan']    = "";
            }
            
        }
        $this->hasil($output);
    }

    public function HapusReturRJIGDRI()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'no_retur', 'id_trans', 'idunit', 'tgl_retur' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $no_retur  = $input->no_retur;
            $idunit    = $input->idunit;
            $id_trans  = $input->id_trans;
            $tgl_kunj  = $input->tgl_kunj;
            $tgl_retur = $input->tgl_retur;
            $norm      = $input->norm;
            $reason    = $input->reason;
            $iduser    = $input->user;

            $cek_idfarmasi = $this->cekIdFarUser($iduser);
            if ($cek_idfarmasi == ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Modul Farmasi Tidak diketahui!";
                $this->hasil($output);
                return;
            }

            $getquery    = "SELECT
                                id_kunjungan_far,
                                fr.id_jurnal,
                                id_unit,
                                id_unit_far,
                                tgl_tutup,
                                SUM ( total + ppn ) AS gatot,
                                CASE
                                    WHEN id_unit_far = '4001' THEN '6'
                                    WHEN id_unit_far = '4002' THEN '7' 
                                    WHEN id_unit_far = '4003' THEN '8' 
                                END AS posisi
                            FROM
                                far_retur fr
                                INNER JOIN transaksi USING ( id_transaksi ) 
                            WHERE
                                no_retur = '$no_retur' AND tgl_retur = '$tgl_retur' 
                            GROUP BY
                                id_kunjungan_far,
                                fr.id_jurnal,
                                id_unit,
                                id_unit_far,
                                tgl_tutup,
                                transaksi.id_jurnal";

            if ($this->db->query($getquery)->getNumRows() > 0) {

                $getrow        = $this->db->query($getquery)->getRow();
                $id_kunj_far   = $getrow->id_kunjungan_far;
                $idfar         = $getrow->id_unit_far;
                $totharga      = $getrow->gatot;
                $id_jurnal     = $getrow->id_jurnal;
                $tgl_tutup     = $getrow->tgl_tutup;
                $posisi        = $getrow->posisi;

                if ($posisi == '0'){
                    $output['status']   = "gagal";
                    $output['pesan']    = "Id Unit Farmasi Tidak diketahui!!";
                    $this->hasil($output);
                    return;
                }

            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Data Kunjungan Tidak ditemukan!!";
                $this->hasil($output);
                return;
            }

            if ($tgl_tutup != ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Transaksi Sudah Di Tutup!!";
                $this->hasil($output);
                return;
            }

            // COMMENT SAJA JIKA INGIN LANGSUNG HAPUS (PASTIKAN ID JURNAL SUDAH DIBUKA)
            if ($id_jurnal != ''){
                $output['status']   = "gagal";
                $output['pesan']    = "Retur Sudah di Jurnal\nHub. Tim IT Madiun!!";
                $this->hasil($output);
                return;
            }
            
            $this->db->transStart();

            $cekNoResep = " SELECT
                                noresep, tglresep
                            FROM
                                far_retur
                                INNER JOIN far_retur_det USING ( no_retur, tgl_retur ) 
                            WHERE
                                no_retur = '$no_retur' AND tgl_retur = '$tgl_retur' 
                            GROUP BY
                                noresep, tglresep";
        
            if ($this->db->query($cekNoResep)->getNumRows() > 0){
                foreach ($this->db->query($cekNoResep)->getResult() as $row){
                    $updateNoResep = "UPDATE far_obat_out SET no_retur = NULL WHERE noresep = '$row->noresep' AND tglresep = '$row->tglresep' ";
                    $this->db->query($updateNoResep);
                }
            }else{
                $output['status']   = "gagal";
                $output['pesan']    = "Detail Resep Tidak diketahui!!";
                $this->hasil($output);
                return;
            }

            if ($id_kunj_far == ''){ //JIKA RETUR MASIH DALAM SAVE BELUUM DI POS
                $delRetur = $this->db->query("DELETE FROM far_retur WHERE no_retur = '$no_retur' AND tgl_retur = '$tgl_retur'");

            }else{

                $delKunjRetur = "DELETE FROM kunjungan WHERE id_kunjungan = '$id_kunj_far' AND tgl_masuk = '$tgl_retur'";
                $this->db->query($delKunjRetur);
                
                $updatePosRetur = "UPDATE far_retur SET posting = 'f' WHERE no_retur = '$no_retur' AND tgl_retur = '$tgl_retur'";
                $this->db->query($updatePosRetur);

                $delRetur = "DELETE FROM far_retur WHERE no_retur = '$no_retur' AND tgl_retur = '$tgl_retur' and id_kunjungan_far = '$id_kunj_far'";
                $this->db->query($delRetur);
                
            }
            
            
            $save_loghapusretur = $this->db->query("INSERT INTO log_hapus_resep (id_transaksi, id_user, nominal, alasan, noresep, id_far, id_unit, posisi) VALUES ('$id_trans', '$iduser', '$totharga', '$reason', '$no_retur', '$idfar', '$idunit', '$posisi')");

           
            $this->db->transComplete();
            if ($this->db->transStatus() === false) {
                $output['status']   = "gagal";
                $output['pesan']    = 'Hapus Retur Gagal!!';
            }else{
                $output['status']   = "sukses";
                $output['pesan']    = "Retur Berhasil di Hapus";
            }
            
        }
        
        $this->hasil($output);
    }

    public function getdataTelaahResep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan_far', 'noresep', 'tglresep' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunj_far        = $input->id_kunjungan_far;
            $noresep            = $input->noresep;
            $tglresep           = $input->tglresep;

            $this->db->transStart();
            if (($id_kunj_far == '')||($noresep == '')){
                $output['status']   = "gagal";
                $output['pesan']    = "Resep Belum Disimpan!!";
                $this->hasil($output);
                return;
            }else{
                $query  = "SELECT * FROM far_obat_telaah WHERE id_kunjungan_far = '$id_kunj_far' ";
                $cek    = $this->db->query($query);
                if ($cek->getNumRows() > 0) {

                    $code     = '200';
                    $result   = 'sukses';
                    $pesan    = 'Data diTemukan..';
                    $data     = $cek->getResult();
                }else{
                    $code     = '100';
                    $result   = 'sukses';
                    $pesan    = '';
                    $data     = '';
                }
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']     = $code;
                $output['status']   = $result;
                $output['pesan']    = $pesan;
                $output['result']   = $data;
                
            } else {
                $this->db->transRollback();
                $output['status']   = "gagal";
                //$output['pesan']    = "Gagal di Simpan";
                $output['pesan']    = $this->db->error();
            }
        }

        $this->hasil($output);
    }

    public function SimpanTelaahResep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_kunjungan_far', 'noresep', 'tglresep' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunj_far        = $input->id_kunjungan_far;
            $noresep            = $input->noresep;
            $tglresep           = $input->tglresep;

            $penerima           = $input->penerima;
            $penyiapan          = $input->penyiapan;
            $peracik            = $input->peracik;
            $pengesahan         = $input->pengesahan;
            $konsul             = $input->konsul;

            $kejelasan          = $input->kejelasan;
            $kejelasanket       = $input->kejelasanket;
            $ketepatanobat      = $input->ketepatanobat;
            $ketepatanobatket   = $input->ketepatanobatket;
            $ketepatandosis     = $input->ketepatandosis;
            $ketepatandosisket  = $input->ketepatandosisket;
            $ketepatanrute      = $input->ketepatanrute;
            $ketepatanruteket   = $input->ketepatanruteket;
            $ketepatanwaktu     = $input->ketepatanwaktu;
            $ketepatanwaktuket  = $input->ketepatanwaktuket;
            $duplikat           = $input->duplikat;
            $duplikatket        = $input->duplikatket;
            $alergi             = $input->alergi;
            $alergiket          = $input->alergiket;
            $interaksi          = $input->interaksi;
            $interaksiket       = $input->interaksiket;
            $beratbadananak     = $input->beratbadananak;
            $beratbadananakket  = $input->beratbadananakket;
            $kontradiksi        = $input->kontradiksi;
            $kontradiksiket     = $input->kontradiksiket;
            $konsultelp         = $input->konsultelp;

            $this->db->transStart();
            if (($id_kunj_far == '')||($noresep == '')){
                $output['status']   = "gagal";
                $output['pesan']    = "Resep Belum Disimpan!!";
                $this->hasil($output);
                return;
            }else{
                $query  = "SELECT * FROM far_obat_telaah WHERE id_kunjungan_far = '$id_kunj_far' ";
                $cek    = $this->db->query($query);

                if ($cek->getNumRows() > 0) { // UPDATE
                    $query  = " UPDATE far_obat_telaah SET 
                                    penerima           = '$penerima',
                                    penyiapan          = '$penyiapan',
                                    peracik            = '$peracik',
                                    pengesahan         = '$pengesahan',
                                    konsul             = '$konsul',
                                    kejelasan          = '$kejelasan',
                                    kejelasanket       = '$kejelasanket',
                                    ketepatanobat      = '$ketepatanobat',
                                    ketepatanobatket   = '$ketepatanobatket',
                                    ketepatandosis     = '$ketepatandosis',
                                    ketepatandosisket  = '$ketepatandosisket',
                                    ketepatanrute      = '$ketepatanrute',
                                    ketepatanruteket   = '$ketepatanruteket',
                                    ketepatanwaktu     = '$ketepatanwaktu',
                                    ketepatanwaktuket  = '$ketepatanwaktuket',
                                    duplikat           = '$duplikat',
                                    duplikatket        = '$duplikatket',
                                    alergi             = '$alergi',
                                    alergiket          = '$alergiket',
                                    interaksi          = '$interaksi',
                                    interaksiket       = '$interaksiket',
                                    beratbadananak     = '$beratbadananak',
                                    beratbadananakket  = '$beratbadananakket',
                                    kontradiksi        = '$kontradiksi',
                                    kontradiksiket     = '$kontradiksiket',
                                    konsultelp         = '$konsultelp'
                                WHERE id_kunjungan_far = '$id_kunj_far'";
                }else{
                    $query = "  INSERT INTO far_obat_telaah (
                                    id_kunjungan_far,
                                    noresep,
                                    tglresep,
                                    penerima,
                                    penyiapan,
                                    peracik,
                                    pengesahan,
                                    konsul,
                                    kejelasan,
                                    kejelasanket,
                                    ketepatanobat,
                                    ketepatanobatket,
                                    ketepatandosis,
                                    ketepatandosisket,
                                    ketepatanrute,
                                    ketepatanruteket,
                                    ketepatanwaktu,
                                    ketepatanwaktuket,
                                    duplikat,
                                    duplikatket,
                                    alergi,
                                    alergiket,
                                    interaksi,
                                    interaksiket,
                                    beratbadananak,
                                    beratbadananakket,
                                    kontradiksi,
                                    kontradiksiket,
                                    konsultelp 
                                )
                                VALUES
                                    (
                                        '$id_kunj_far',
                                        '$noresep',
                                        '$tglresep',
                                        '$penerima',
                                        '$penyiapan',
                                        '$peracik',
                                        '$pengesahan',
                                        '$konsul',
                                        '$kejelasan',
                                        '$kejelasanket',
                                        '$ketepatanobat',
                                        '$ketepatanobatket',
                                        '$ketepatandosis',
                                        '$ketepatandosisket',
                                        '$ketepatanrute',
                                        '$ketepatanruteket',
                                        '$ketepatanwaktu',
                                        '$ketepatanwaktuket',
                                        '$duplikat',
                                        '$duplikatket',
                                        '$alergi',
                                        '$alergiket',
                                        '$interaksi',
                                        '$interaksiket',
                                        '$beratbadananak',
                                        '$beratbadananakket',
                                        '$kontradiksi',
                                        '$kontradiksiket',
                                    '$konsultelp' 
                                    )";
                }
            }

            if ($this->db->query($query)){
                $code   = '200';
                $result = 'sukses';
                $pesan  = 'Simpan Berhasil';
            }else{
                $code   = '100';
                $result = 'gagal';
                $pesan  = 'Telaah Resep Gagal diSimpan!!';
            }

            $this->db->transComplete();
            if ($this->db->transStatus()) {
                $output['code']     = $code;
                $output['status']   = $result;
                $output['pesan']    = $pesan;
                
            } else {
                $this->db->transRollback();
                $output['code']     = $code;
                $output['status']   = "gagal";
                //$output['pesan']    = "Gagal di Simpan";
                $output['pesan']    = $this->db->error();
            }
        }

        $this->hasil($output);
    }

    public function LaporanPenjualanObat()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Penjualan dan Retur Resep.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $depo       = $_POST['depo'];
        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];

        $replacetglwal  = str_replace("/", "-", $_POST['tglawal']);
        $dateawal       = date_create($replacetglwal);
        $tglawal1       = date_format($dateawal, "d-M-Y");

        $replacetglwal2 = str_replace("/", "-", $_POST['tglakhir']);
        $dateawal2      = date_create($replacetglwal2);
        $tglawal2       = date_format($dateawal2, "d-M-Y");

        $getNmaUnit = $this->db->query(" SELECT * FROM unit WHERE id_unit = '" . $depo . "'")->getRow();
        $nm_unit    = $getNmaUnit->nama_unit;

        /*
        $query  = $this->db->query("SELECT 
                                        K.id_kunjungan,
                                        tr.id_transaksi,
                                        liveresep,
                                        resep.noresep,
                                        resep.tglresep,
                                        no_rm,
                                        nama,
                                        nama_penjamin,
                                        alamat,
                                        resep.urut,
                                        resep.jns_racikan,
                                        resep.kd_obat,
                                        resep.nama_obat,
                                        resep.jumlah,
                                        resep.harga_sat AS hpp,
                                        resep.harga_jual,
                                        resep.nama_unit_far,
                                        nama_unit,
                                        nama_kamar 
                                    FROM
                                        transaksi tr
                                        INNER JOIN pasien P USING ( no_rm )
                                        INNER JOIN kunjungan K USING ( id_transaksi )
                                        INNER JOIN unit u ON u.id_unit = K.id_unit
                                        INNER JOIN penjamin_transaksi USING ( id_transaksi )
                                        INNER JOIN penjamin USING ( id_penjamin )
                                        LEFT JOIN kamar USING ( id_kamar )
                                        LEFT JOIN ruang_inap USING ( id_ruang )
                                        INNER JOIN (
                                        SELECT
                                            id_kunjungan,
                                            noresep,
                                            tglresep,
                                            urut,
                                            jns_racikan,
                                            kd_obat,
                                            nama_obat,
                                            jumlah,
                                            harga_sat,
                                            harga_jual,
                                            foo.id_far,
                                            dilayani,
                                            nama_unit as nama_unit_far,
                                            liveresep
                                        FROM
                                            kunjungan
                                            INNER JOIN far_obat_out foo USING ( id_kunjungan )
                                            INNER JOIN far_obat_outdet food USING ( noresep, tglresep )
                                            INNER JOIN far_obat USING ( kd_obat )
                                            INNER JOIN unit u ON u.id_unit = foo.id_far 
                                        ) AS resep USING ( id_kunjungan ) 
                                        WHERE
                                        DATE ( tr.tgl_transaksi ) BETWEEN '$tglawal' AND '$tglakhr' 
                                        AND resep.dilayani = '1' 
                                        AND resep.id_far = '$depo' 
                                        AND tgl_tutup IS NOT NULL
                                    ORDER BY
                                        resep.noresep,
                                        resep.urut ASC ");

        $query_retur  = $this->db->query("  SELECT 
                                            K.id_kunjungan,
                                            tr.id_transaksi,
                                            resep.noresep,
                                            resep.no_retur,
                                            resep.tgl_retur,
                                            no_rm,
                                            nama,
                                            nama_penjamin,
                                            alamat,
                                            resep.urut,
                                            resep.kd_obat,
                                            resep.nama_obat,
                                            resep.jumlah,
                                            resep.hrga_pokok AS hpp,
                                            resep.hrga_jual,
                                            resep.nama_unit_far,
                                            nama_unit,
                                            nama_kamar 
                                            FROM
                                                transaksi tr
                                                INNER JOIN pasien P USING ( no_rm )
                                                INNER JOIN kunjungan K USING ( id_transaksi )
                                                INNER JOIN unit u ON u.id_unit = K.id_unit
                                                INNER JOIN penjamin_transaksi USING ( id_transaksi )
                                                INNER JOIN penjamin USING ( id_penjamin )
                                                LEFT JOIN kamar USING ( id_kamar )
                                                LEFT JOIN ruang_inap USING ( id_ruang )
                                                INNER JOIN (
                                                SELECT
                                                    fr.id_transaksi,
                                                    id_kunjungan_far,
                                                    noresep,
                                                    no_retur,
                                                    tgl_retur,
                                                    urut,
                                                    kd_obat,
                                                    nama_obat,
                                                    jumlah,
                                                    hrga_pokok,
                                                    hrga_jual,
                                                    fr.id_unit,
                                                    fr.posting,
                                                    id_unit_far,
                                                    nama_unit AS nama_unit_far
                                                FROM
                                                    kunjungan kunj
                                                    INNER JOIN far_retur fr  ON fr.id_kunjungan_far = kunj.id_kunjungan 
                                                    INNER JOIN far_retur_det frd USING ( no_retur, tgl_retur )
                                                    INNER JOIN far_obat USING ( kd_obat )
                                                    INNER JOIN unit u ON u.id_unit = fr.id_unit 
                                                ) AS resep ON resep.id_kunjungan_far = K.id_kunjungan 
                                            WHERE
                                                DATE ( tr.tgl_transaksi ) BETWEEN '$tglawal' AND '$tglakhr' 
                                                AND resep.posting = 't' 
                                                AND resep.id_unit_far = '$depo' 
                                                AND tgl_tutup IS NOT NULL 
                                            ORDER BY
                                                resep.no_retur,
                                                resep.urut ASC");
        */
        $query  = $this->db->query(" SELECT 
                                        K.id_kunjungan,
                                        tr.id_transaksi,
                                        liveresep,
                                        resep.noresep,
                                        resep.tglresep,
                                        no_rm,
                                        nama,
                                        nama_penjamin,
                                        alamat,
                                        resep.urut,
                                        resep.jns_racikan,
                                        resep.kd_obat,
                                        resep.nama_obat,
                                        resep.jumlah,
                                        resep.harga_sat AS hpp,
                                        resep.harga_jual,
                                        (resep.jumlah * resep.harga_jual) as reseptotal,
                                        resep.nama_unit_far,
                                        nama_unit,
                                        nama_kamar,
                                        retur.no_retur,
                                        retur.tgl_retur,
                                        retur.jumlah AS qty_retur,
                                        retur.hrga_pokok as hpp_retur,
                                        retur.hrga_jual as harga_jual_retur,
                                        (retur.jumlah * retur.hrga_jual) as returtotal
                                    FROM
                                        transaksi tr
                                        INNER JOIN pasien P USING ( no_rm )
                                        INNER JOIN kunjungan K USING ( id_transaksi )
                                        INNER JOIN unit u ON u.id_unit = K.id_unit
                                        INNER JOIN penjamin_transaksi USING ( id_transaksi )
                                        INNER JOIN penjamin USING ( id_penjamin )
                                        LEFT JOIN kamar USING ( id_kamar )
                                        LEFT JOIN ruang_inap USING ( id_ruang )
                                        INNER JOIN (
                                        SELECT
                                            id_kunjungan,
                                            noresep,
                                            tglresep,
                                            urut,
                                            jns_racikan,
                                            kd_obat,
                                            nama_obat,
                                            jumlah,
                                            harga_sat,
                                            harga_jual,
                                            foo.id_far,
                                            dilayani,
                                            nama_unit AS nama_unit_far,
                                            liveresep 
                                        FROM
                                            kunjungan
                                            INNER JOIN far_obat_out foo USING ( id_kunjungan )
                                            INNER JOIN far_obat_outdet food USING ( noresep, tglresep )
                                            INNER JOIN far_obat USING ( kd_obat )
                                            INNER JOIN unit u ON u.id_unit = foo.id_far 
                                        ) AS resep USING ( id_kunjungan )
                                        LEFT JOIN (
                                        SELECT
                                            fr.id_transaksi,
                                            id_kunjungan_far,
                                            noresep,
                                            no_retur,
                                            tgl_retur,
                                            urut,
                                            kd_obat,
                                            nama_obat,
                                            jumlah,
                                            hrga_pokok,
                                            hrga_jual,
                                            fr.id_unit,
                                            fr.posting,
                                            id_unit_far,
                                            nama_unit AS nama_unit_far  
                                        FROM
                                            kunjungan kunj
                                            INNER JOIN far_retur fr ON fr.id_kunjungan_far = kunj.id_kunjungan
                                            INNER JOIN far_retur_det frd USING ( no_retur, tgl_retur )
                                            INNER JOIN far_obat USING ( kd_obat )
                                            INNER JOIN unit u ON u.id_unit = fr.id_unit  
                                        ) AS retur ON retur.id_transaksi = tr.id_transaksi  AND retur.noresep = resep.noresep AND retur.kd_obat = resep.kd_obat
                                    WHERE
                                        DATE ( tr.tgl_transaksi ) BETWEEN '$tglawal' AND '$tglakhr' 
                                        AND resep.dilayani = '1' 
                                        AND resep.id_far = '$depo' 
                                        AND tgl_tutup IS NOT NULL
                                    ORDER BY
                                        resep.noresep,
                                        resep.urut ASC ");

        $html = "<html><body style='font-family: Times New Roman;'>";
        $html .= "<h4 style='text-align:center; font-weight: bold';>Laporan Penjualan Resep dan Retur Resep $nm_unit <br>Tanggal $tglawal1 s/d $tglawal2 </h4>
                    <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
                        <tr style='background-color: #abdaa8;'>
                            <td><b>No</b></td>
                            <td><b>No.Resep</b></td>
                            <td><b>Tgl.Resep</b></td>
                            <td><b>No.RM</b></td>
                            <td><b>Nama Pasien</b></td>
                            <td><b>Jenis Pasien</b></td>
                            <td><b>Alamat Pasien</b></td>
                            <td><b>Kode Obat</b></td>
                            <td><b>Nama Obat</b></td>
                            <td><b>Qty</b></td>
                            <td><b>HPP</b></td>
                            <td><b>Harga Jual</b></td>
                            <td><b>Total Resep</b></td>
                            <td><b>Unit Apotek</b></td>
                            <td><b>Kelas Rawat</b></td>
                            <td><b>Ruangan</b></td>
                            <td><b>No.Retur</b></td>
                            <td><b>Tgl.Retur</b></td>
                            <td><b>QtyRetur</b></td>
                            <td><b>HPP</b></td>
                            <td><b>Harga Jual</b></td>
                            <td><b>Total Retur</b></td>
                        </tr>";
        if ($query->getNumRows() > 0){
            $no = 1;
            $subtotal_resep = 0;
            $subtotal_retur = 0;
            
            foreach ($query->getResult() as $row) {
                $html .= "  <tr>
                                <td style='vertical-align: middle;'>$no</td>
                                <td style='vertical-align: middle;'>$row->noresep</td>
                                <td style='vertical-align: middle;'>$row->tglresep</td>
                                <td style='vertical-align: middle;'>$row->no_rm</td>
                                <td style='vertical-align: middle;'>$row->nama</td>
                                <td style='vertical-align: middle;'>$row->nama_penjamin</td>
                                <td style='vertical-align: middle;'>$row->alamat</td>
                                <td style='vertical-align: middle;'>$row->kd_obat</td>
                                <td style='vertical-align: middle;'>$row->nama_obat</td>
                                <td style='vertical-align: middle;'>$row->jumlah</td>
                                <td style='vertical-align: middle;'>$row->hpp</td>
                                <td style='vertical-align: middle;'>$row->harga_jual</td>
                                <td style='vertical-align: middle;'>$row->reseptotal</td>
                                <td style='vertical-align: middle;'>$row->nama_unit_far</td>
                                <td style='vertical-align: middle;'>$row->nama_unit</td>
                                <td style='vertical-align: middle;'>$row->nama_kamar</td>
                                <td style='vertical-align: middle;'>$row->no_retur</td>
                                <td style='vertical-align: middle;'>$row->tgl_retur</td>
                                <td style='vertical-align: middle;'>$row->qty_retur</td>
                                <td style='vertical-align: middle;'>$row->hpp_retur</td>
                                <td style='vertical-align: middle;'>$row->harga_jual_retur</td>
                                <td style='vertical-align: middle;'>$row->returtotal</td>
                            </tr>";
                $no++;

                $subtotal_resep += $row->reseptotal;
                $subtotal_retur += $row->returtotal;
            }

            $html .= "  <tr style='background-color: #abdaa8;'>
                            <td colspan='12' style='vertical-align: middle; text-align: right;'><b>Sub Total Resep</b></td>
                            <td style='vertical-align: middle;'><b>Rp. ".format_ribuan($subtotal_resep)."</b></td>
                            <td colspan='8' style='vertical-align: middle; text-align: right;'><b>Sub Total Retur</b></td>
                            <td style='vertical-align: middle;'><b>Rp. ".format_ribuan($subtotal_retur)."</b></td>
                        </tr>";
        }else{
            $html .= "  <tr>
                            <td colspan='22' style='vertical-align: middle; text-align: center;'><b>-- Tidak Ada Penjualan / Retur Resep --</b></td>                            
                        </tr>";
        }

        $html .= "</table>";
        $html .= "</body></html>";
        echo $html;

        /*
        $html = "<br>
                    <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
                    <tr style='background-color: #abdaa8;'>
                        <td><b>No</b></td>
                        <td><b>No.Retur</b></td>
                        <td><b>Tgl.Retur</b></td>
                        <td><b>No.RM</b></td>
                        <td><b>Nama Pasien</b></td>
                        <td><b>Jenis Pasien</b></td>
                        <td><b>Alamat Pasien</b></td>
                        <td><b>Kode Obat</b></td>
                        <td><b>Nama Obat</b></td>
                        <td><b>Qty</b></td>
                        <td><b>HPP</b></td>
                        <td><b>Harga Jual</b></td>
                        <td><b>Unit Apotek</b></td>
                        <td><b>Kelas Rawat</b></td>
                        <td><b>Ruangan</b></td>
                        <td><b>No.Resep</b></td>
                    </tr>";

        if ($query_retur->getNumRows() > 0){
            $html .= "  <tr>
                            <td colspan='16' style='vertical-align: middle; text-align: left;'><b>RETUR RESEP</b></td>
                        </tr>";
            $nox = 1;
            foreach ($query_retur->getResult() as $row_retur) {
                $html .= "  <tr>
                                <td style='vertical-align: middle;'>$nox</td>
                                <td style='vertical-align: middle;'>$row_retur->no_retur</td>
                                <td style='vertical-align: middle;'>$row_retur->tgl_retur</td>
                                <td style='vertical-align: middle;'>$row_retur->no_rm</td>
                                <td style='vertical-align: middle;'>$row_retur->nama</td>
                                <td style='vertical-align: middle;'>$row_retur->nama_penjamin</td>
                                <td style='vertical-align: middle;'>$row_retur->alamat</td>
                                <td style='vertical-align: middle;'>$row_retur->kd_obat</td>
                                <td style='vertical-align: middle;'>$row_retur->nama_obat</td>
                                <td style='vertical-align: middle;'>$row_retur->jumlah</td>
                                <td style='vertical-align: middle;'>$row_retur->hpp</td>
                                <td style='vertical-align: middle;'>$row_retur->hrga_jual</td>
                                <td style='vertical-align: middle;'>$row_retur->nama_unit_far</td>
                                <td style='vertical-align: middle;'>$row_retur->nama_unit</td>
                                <td style='vertical-align: middle;'>$row_retur->nama_kamar</td>
                                <td style='vertical-align: middle;'>$row_retur->noresep</td>
                            </tr>";
                $nox++;
            }
        }else{
            $html .= "  <tr>
                            <td colspan='16' style='vertical-align: middle; text-align: center;'><b>-- Tidak Ada Retur Resep --</b></td>
                        </tr>";
        }
        $html .= "  </table>";
        

        $html .= "</body></html>";
        echo $html;
        */
        
        exit;
    }

    public function LaporanKartuStokDetail()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Kartu Stok Detail.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $depo       = $_POST['depo'];
        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];
        $kd_prd     = $_POST['kd_prd'];

        $replacetglwal  = str_replace("/", "-", $tglawal);
        $dateawal       = date_create($replacetglwal);
        $tglawal1       = date_format($dateawal, "d-M-Y");

        $replacetglwal2 = str_replace("/", "-", $tglakhr);
        $dateawal2      = date_create($replacetglwal2);
        $tglawal2       = date_format($dateawal2, "d-M-Y");

        $getNmaUnit = $this->db->query(" SELECT * FROM unit WHERE id_unit = '" . $depo . "'")->getRow();
        $nm_unit    = $getNmaUnit->nama_unit;

        $getNmaObat = $this->db->query(" SELECT * FROM far_obat WHERE kd_obat = '" . $kd_prd . "'")->getRow();
        $nm_obat    = $getNmaObat->nama_obat;
/*
        $query  = $this->db->query("SELECT
                                        tglresep,
                                        noresep,
                                        norm,
                                        nama,
                                        fo.kd_obat,
                                        nama_obat,
                                        food.jumlah,
                                        CASE
                                            WHEN frd.jumlah > 0 THEN
                                            frd.jumlah ELSE 0 
                                        END AS retur  
                                    FROM
                                        far_obat_out foo
                                        INNER JOIN far_obat_outdet food USING ( noresep, tglresep )
                                        INNER JOIN far_obat fo USING ( kd_obat )
                                        INNER JOIN pasien P ON P.no_rm = foo.norm
                                        LEFT JOIN far_retur USING ( no_retur )
                                        LEFT JOIN far_retur_det frd USING ( no_retur, noresep, tglresep, kd_obat )
                                    WHERE
                                        DATE ( foo.tglresep ) BETWEEN '$tglawal' AND '$tglakhr' 
                                        AND fo.kd_obat = '$kd_prd'
                                        AND foo.id_far = '$depo' 
                                        AND dilayani = 1 
                                        --AND posting = TRUE
                                    ORDER BY
                                        nama ASC ");*/

        $query  = $this->db->query("SELECT
                                        tglresep,
                                        noresep,
                                        norm,
                                        nama,
                                        fo.kd_obat,
                                        nama_obat,
                                        food.jumlah,
                                        CASE
                                            WHEN frd.jumlah > 0 THEN
                                            frd.jumlah ELSE 0 
                                        END AS retur, 
                                        foos.id_unit,
                                        nama_unit
                                    FROM
                                        far_obat_out foo
                                        INNER JOIN far_obat_outdet food USING ( noresep, tglresep )
                                        INNER JOIN far_obat_outstok foos USING (id_kunjungan_far, kd_obat)
                                        INNER JOIN far_obat fo USING ( kd_obat )
                                        INNER JOIN pasien P ON P.no_rm = foo.norm
                                        LEFT JOIN far_retur USING ( no_retur )
                                        LEFT JOIN far_retur_det frd USING ( no_retur, noresep, tglresep, kd_obat )
                                        INNER JOIN unit ON unit.id_unit = foo.id_unit
                                    WHERE
                                        DATE ( foo.tglresep ) BETWEEN '$tglawal' AND '$tglakhr' 
                                        AND fo.kd_obat = '$kd_prd'
                                        AND foos.id_unit = '$depo'
                                    ORDER BY
                                        nama ASC");

        $html = "<html>
                    <body style='font-family: Times New Roman;'>
                        <h4 style='text-align:center; font-weight: bold';>Laporan Kartu Stok Detail <br>Depo $nm_unit<br>Tanggal $tglawal1 s/d $tglawal2 </h4>
                        <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
                            <tr style='background-color: #abdaa8;'>
                                <td><b>No.</b></td>
                                <td width='150'><b>Tgl Resep.</b></td>
                                <td width='150'><b>No.RM</b></td>
                                <td><b>Nama Pasien</b></td>
                                <td><b>Unit</b></td>
                                <td width='150'><b>Jumlah</b></td>
                                <td width='150'><b>Retur</b></td>
                            </tr>";
        if ($query->getNumRows() > 0){
            $html .= "  <tr>
                            <td colspan='6' style='vertical-align: middle; text-align: left;'><b>$nm_obat</b></td>
                        </tr>";
            $no = 1;
            $penj = 0;
            $retur = 0;
            foreach ($query->getResult() as $row) {

                $html .= "  <tr>
                                <td style='vertical-align: middle;'>$no</td>
                                <td style='vertical-align: middle;'>$row->tglresep</td>
                                <td style='vertical-align: middle;'>$row->norm</td>
                                <td style='vertical-align: middle;'>".strtoupper($row->nama)."</td>
                                <td style='vertical-align: middle;'>".strtoupper($row->nama_unit)."</td>
                                <td style='vertical-align: middle;'>$row->jumlah</td>
                                <td style='vertical-align: middle;'>$row->retur</td>
                            </tr>";
                $no++;
                $penj += $row->jumlah;
                $retur += $row->retur;
            }
            $html .= "  <tr>
                            <td colspan='5' style='vertical-align: middle; text-align: right;'><b>Sub Total</b></td>
                            <td style='vertical-align: middle; text-align: right;'><b>$penj</b></td>
                            <td style='vertical-align: middle; text-align: right;'><b>$retur</b></td>
                        </tr>";
        }else{
            $html .= "  <tr>
                            <td colspan='7' style='vertical-align: middle; text-align: center;'><b>-- Data Tidak Ditemukan --</b></td>                            
                        </tr>";
        }

        $html .= "      </table>
                    </body>
                </html>";

        echo $html;
        exit;
    }

    public function countorderresep(){
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if($this->evalParam($input, $listParam)){
            // $data =  $this->db->query(" SELECT COUNT
            //                                 ( id_order ) AS COUNT,
            //                                 tglorder, waktu_order
            //                             FROM
            //                                 order_resep 
            //                             WHERE
            //                                 order_mng = 't' 
            //                                 AND dilayani = 0
            //                                 AND id_far = '4002'
            //                             GROUP BY tglorder, waktu_order
            //                             ORDER BY tglorder DESC
            //                             LIMIT 5 ");
            $data =  $this->db->query(" SELECT COUNT
                                            ( id_order ) AS COUNT,
                                            min(tglorder),
                                            max(tglorder)
                                        FROM
                                            order_resep 
                                        WHERE
                                            order_mng = 't'AND  
                                            dilayani = 0 
                                            AND id_far = '$input->idfar' ");
            if($data->getNumRows() > 0){
                $output['status']   = "sukses";
                $output['data']     = $data->getResult();
                $output['id']       = '04002';
            }else{
                $output['pesan']    = "";
            }                    
        }

        $this->hasil($output);
    }

    public function templateresep_showdata()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $tglsatu    = $input->tglsatu;
        $tgldua     = $input->tgldua;
        $jmlh       = $input->jmlh;
        $iduser     = $input->iduser;
        $status     = $input->status;

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }
        
        if ($status != ''){
            $kondisi1 = "AND status = '$status'";
        }else{
            $kondisi1 = "";
        }

        $query  = " SELECT
                        * ,
                        (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = templateresep.id_pegawai) as namapeg
                    FROM
                        templateresep
                        LEFT JOIN users USING ( id_user )
                    WHERE tgl_buat BETWEEN '$tglsatu' AND '$tgldua' $kondisi1 
                    ORDER BY id_template ASC $limit";
        $hasilQuery =  $this->db->query($query);

        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function getData_templateresep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'idtemplate', 'tgltemplate', 'iddokter' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idtemplate     = $input->idtemplate;
            $tgltemplate    = $input->tgltemplate;
            $iddokter       = $input->iddokter;     
            
            if ($idtemplate != ''){

                $query    = "SELECT *,
                                (SELECT nama FROM users WHERE id_user = templateresep.id_user) as nama_user,
                                (SELECT nama_pegawai FROM pegawai WHERE id_pegawai = templateresep.id_pegawai) as nama_pegawai
                            FROM templateresep 
                            WHERE id_template = '$idtemplate' AND tgl_buat = '$tgltemplate'";
                $hasil = $this->db->query($query);

                if ($hasil->getNumRows() > 0) {

                    $query_detJadi  = " SELECT
                                            * 
                                        FROM
                                            templateresep_det trd
                                            INNER JOIN far_obat fo ON fo.kd_obat = trd.kd_obat
                                            INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa 
                                        WHERE
                                            id_template = '$idtemplate' 
                                            AND jns_racikan = '0' 
                                        ORDER BY
                                            urut ASC"; 

                    $GroupRacik     = " SELECT
                                            jns_racikan, trd.id_signa, qty_racik, ket_racik, signa
                                        FROM
                                            templateresep_det trd
                                            INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa
                                        WHERE
                                            id_template = '$idtemplate' 
                                            AND jns_racikan != '0' 
                                        GROUP BY
                                            id_template, jns_racikan, trd.id_signa, qty_racik, ket_racik, signa
                                        ORDER BY jns_racikan ASC";
                    // echo $query_detRacik;
                    // return;
                    if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                        $query_detRacik = " SELECT * FROM
                                                templateresep_det trd
                                                INNER JOIN far_obat fo ON fo.kd_obat = trd.kd_obat
                                                INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa
                                            WHERE
                                                id_template = '$idtemplate' 
                                                AND jns_racikan != '0' 
                                            ORDER BY
                                                urut ASC";
                        $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
                    }
                    
                    
                    $output['code']         = "200";
                    $output['status']       = "sukses";
                    $output['pesan']        = "Template Resep ditemukan.";
                    $output['data']         = $hasil->getResult();
                    $output['count']        = $hasil->getNumRows();
                    $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
                    $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
                }
            }else{
                $output['code']         = "500";
                $output['status']       = "sukses";
            }
            
        }
        $this->hasil($output);
    }

    public function SimpanTemplateResep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'idtemplate', 'tgltemplate', 'iddokter' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idtemplate     = $input->idtemplate;
            $tgltemplate    = $input->tgltemplate;
            $iddokter       = $input->iddokter;
            $iduser         = $input->user;
            $catatan        = str_replace(array("\r","\n")," ", $input->catatan);
            $jnsresep       = $input->jnsresep;
            $waktu          = date("H:i:s");
            //$status         = 'true';

            $this->db->transStart();
            if ($idtemplate != ''){ //JIKA SUDAH ADA ID MAKA UPDATE
                $cek    = "SELECT status FROM templateresep WHERE id_template = '$idtemplate' AND tgl_buat = '$tgltemplate' ORDER BY id_template DESC LIMIT 1";

                if ($this->db->query($cek)) { //true
                    $row        = $this->db->query($cek)->getRow();
                    $status   = $row->status;
                    if ($status == 't'){
                        $output['status']   = "gagal";
                        $output['pesan']    = "Template Sudah di Posting!!";
                        $this->hasil($output);
                        return;
                    }else{
                        $query  =" UPDATE templateresep SET 
                                    catatandokter = '$catatan',
                                    jnsresep      = '$jnsresep'
                                WHERE id_template = '$idtemplate' AND tgl_buat = '$tgltemplate' ";
                    }
                    
                }else{
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Simpan Template Resep!!";
                    exit;
                }
                
            }else{ //JIKA MASIH KOSONG BUAT BARU ID BARU
                $cek    = "SELECT id_template FROM templateresep ORDER BY id_template DESC LIMIT 1";
                if ($this->db->simpleQuery($cek)) { //true
                    $cekx   = $this->db->query($cek)->getResult();
                    $row    = $this->db->query($cek)->getRow();
                    if (!empty($cekx)){
                        $id   = $row->id_template;
                        $real = ((int)$id + 1);
                        $idtemplatex = $real;
                    }else{
                        $idtemplatex = 1;
                    }
                }

                $idtemplate = $idtemplatex;

                $query = "INSERT INTO templateresep (id_template, id_user, jnsresep, id_pegawai, catatandokter) VALUES ('$idtemplate', '$iduser', '$jnsresep', '$iddokter', '$catatan')";
            }

            if ($this->db->query($query)) {
                
                $data    = $input->data;
                //OBAT JADI
                if ($input->jmlObat != 0){
                    $delobatJadi = "DELETE FROM templateresep_det WHERE id_template = '$idtemplate'";
                    $this->db->query($delobatJadi);
                    
                    for( $i=0; $i < $input->jmlObat; $i++){
                        $getUrut = "SELECT MAX(urut) as urut FROM templateresep_det WHERE id_template = '$idtemplate'";
                        $this->db->query($getUrut);
                        $row        = $this->db->query($getUrut)->getRow();
                        $urut       = (int)$row->urut + 1;

                        $kd_obat      = $data[$i]->kd_obat;
                        $jumlah       = $data[$i]->qty;
                        $kd_milik     = 3;
                        $ket          = $data[$i]->ket;
                        $signa        = $data[$i]->signa;
                        $jns_racik    = 0;
                        $dosis_obat   = 0;

                        $save_detobatJadi = "INSERT INTO templateresep_det (id_template, urut, kd_obat, jumlah, dosis, jns_racikan, id_signa, ket) VALUES ('$idtemplate', '$urut', '$kd_obat', '$jumlah', '$dosis_obat', '$jns_racik', '$signa', '$ket')";
                        $this->db->query($save_detobatJadi);

                    }
                }else{
                    $delobatJadi = "DELETE FROM templateresep_det WHERE id_template = '$idtemplate'";
                    $this->db->query($delobatJadi);
                }

                //OBAT RACIK
                $dataracik   = $input->data_racik;
                if ($input->jmlObatRacik != 0){
                    $delobatRacik = "DELETE FROM templateresep_det WHERE id_template = '$idtemplate' and jns_racikan != '0' ";
                    $this->db->query($delobatRacik);

                    for( $j=0; $j < $input->jmlObatRacik; $j++){ //MEMBACA BANYAKNYA RACIKAN
                        $dataObatRacik   = $dataracik[$j]->obat;
                        for( $i=0; $i < $dataracik[$j]->count; $i++){
                            $getUrut = "SELECT MAX(urut) as urut FROM templateresep_det WHERE id_template = '$idtemplate'";
                            $this->db->query($getUrut);
                            $row            = $this->db->query($getUrut)->getRow();
                            $urut           = (int)$row->urut + 1;
                            $kd_obat        = $dataObatRacik[$i]->kd_obat;
                            $dosis_obat     = $dataObatRacik[$i]->dosis;
                            $jumlah         = $dataObatRacik[$i]->qty;
                            $ket            = $dataObatRacik[$i]->ket;
                            $kd_milik       = 3;
                            $signa          = $dataracik[$j]->Signa;
                            $jns_racik      = $dataracik[$j]->Nama;
                            $qty_racik      = $dataracik[$j]->Bnyk;
                            $ket_racik      = $dataracik[$j]->Ket;

                            $save_detobatRacik = "INSERT INTO templateresep_det (id_template, urut, kd_obat, jumlah, dosis, ket, jns_racikan, id_signa, qty_racik, ket_racik) VALUES ('$idtemplate', '$urut', '$kd_obat', '$jumlah', '$dosis_obat', '$ket', '$jns_racik', '$signa', '$qty_racik', '$ket_racik')";
                            $this->db->query($save_detobatRacik);
                        }
                    }
                }else{
                    $delobatRacik = "DELETE FROM templateresep_det WHERE id_template = '$idtemplate' and jns_racikan != '0'";
                    $this->db->query($delobatRacik);
                }
                
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']       = "sukses";
                    $output['pesan']        = "Simpan Berhasil";
                    $output['x']            = $idtemplate;
                }else{
                    $this->db->transRollback();
                    $output['status']       = "gagal";
                    $output['pesan']        = "Gagal Simpan";
                    $output['x']            = $idtemplate;
                }

            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Simpan";
                $output['x']        = '';
            }

        }
        $this->hasil($output);
    }

    public function HapusTemplateResep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'idtemplate', 'tgltemplate' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idtemplate    = $input->idtemplate;
            $tgltemplate   = $input->tgltemplate;
            $query = "DELETE FROM templateresep WHERE id_template = '$idtemplate' and tgl_buat = '$tgltemplate' ";

            if ($this->db->query($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil di Hapus";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Hapus!";
            }

        }
        $this->hasil($output);
    }

    public function PostingTemplateResep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'idtemplate', 'tgltemplate', 'iddokter' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $idtemplate    = $input->idtemplate;
            $tgltemplate   = $input->tgltemplate;

            $cekJenisObat = "   SELECT 
                                    true as selected
                                FROM
                                    templateresep_det 
                                WHERE
                                    id_template = '$idtemplate' and jns_racikan > '0'";
        
            if ($this->db->query($cekJenisObat)->getNumRows() > 0){
                $jenis_obat = 'true';
            }else{
                $jenis_obat = 'false';
            }

            $query  ="  UPDATE templateresep SET 
                            status = true, jnsobat = '$jenis_obat'
                        WHERE id_template = '$idtemplate' AND tgl_buat = '$tgltemplate' ";

            if ($this->db->query($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil di Simpan";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Simpan!";
            }

        }
        $this->hasil($output);
    }

    public function savemappingunitdepo()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_unit        = $input->id_unit;
            $id_depotuj     = $input->id_depotuj;

            $this->db->transStart();
            $cek = "    SELECT 
                            true as selected
                        FROM
                            depo_unit 
                        WHERE
                            id_unit = '$id_unit' and aktif = true";
        
            if ($this->db->query($cek)->getNumRows() > 0){
                $status = 'true';
            }else{
                $status = 'false';
            }

            if ($status == 'true'){
                $query  ="  UPDATE depo_unit SET depo_unit_tuj = '$id_depotuj'
                            WHERE id_unit = '$id_unit' and aktif = true";
            }else{
                $query  ="  INSERT INTO depo_unit (id_unit, depo_unit_tuj) VALUES ('$id_unit', '$id_depotuj')";
            }
            
            $this->db->query($query);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil di Simpan";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Simpan!";
            }

        }
        $this->hasil($output);
    }

    public function getTemplateOrderResepDetail()
    {
        $input = json_decode(file_get_contents('php://input'));
    
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $id_template   = $input->id_template;
        $tgl_buat   = $input->tgl_buat;           
        if ($id_template != '' ){ 
            $query_detJadi  = " SELECT * FROM
                                    templateresep_det trd 
                                    INNER JOIN far_obat fo ON fo.kd_obat = trd.kd_obat
                                    INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa
                                WHERE
                                    id_template = '$id_template' 
                                    AND jns_racikan = '0' 
                                ORDER BY
                                    urut ASC";

            $GroupRacik     = " SELECT
                                    jns_racikan, trd.id_signa, qty_racik, ket_racik, signa
                                FROM
                                    templateresep_det trd
                                    INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa
                                WHERE
                                    id_template = '$id_template'
                                    AND jns_racikan != '0' 
                                GROUP BY
                                    id_template, jns_racikan, trd.id_signa, qty_racik, ket_racik, signa
                                ORDER BY jns_racikan ASC";
            
            if ($this->db->query($GroupRacik)->getNumRows() > 0) {
                $query_detRacik = " SELECT * FROM
                                    templateresep_det trd 
                                    INNER JOIN far_obat fo ON fo.kd_obat = trd.kd_obat
                                    INNER JOIN mapping_signa ms ON ms.id_signa = trd.id_signa
                                WHERE
                                    id_template = '$id_template'
                                    AND jns_racikan != '0' 
                                ORDER BY
                                    urut ASC";
                $output['ObatRacik']    = $this->db->query($query_detRacik)->getResult();
            }
                    
            // echo $query_detRacik;
            // return;
            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "";
            $output['ObatJadi']     = $this->db->query($query_detJadi)->getResult();
            $output['GroupRacik']   = $this->db->query($GroupRacik)->getResult();
            
        }else{
            $output['code']     = "501";
            $output['status']   = "sukses";
            $output['pesan']    = "";
        
        }
        $this->hasil($output);
    }

    public function mappingunitdepo_showdata()
    {
        $input = json_decode(file_get_contents('php://input')); 
        $output = array();

        $jmlh      = $input->jmlh;
        $idfar     = $input->idfar;

        if ($jmlh > 0){
            $limit = "LIMIT ".$jmlh;
        }else{
            $limit = "";
        }
        
        if ($idfar != ''){
            $kondisi1 = "AND depo_unit_tuj = '$idfar'";
        }else{
            $kondisi1 = "";
        }

        $query  = " SELECT
                        id_mapping,
                        id_unit,
                        (SELECT nama_unit FROM unit WHERE id_unit = du.id_unit) as namaunit,
                        depo_unit_tuj,
                        (SELECT nama_unit FROM unit WHERE id_unit = du.depo_unit_tuj) as namaunitfar,
                        aktif
                    FROM
                        depo_unit du
                    WHERE aktif = true $kondisi1 
                    ORDER BY id_unit ASC $limit";
        $hasilQuery =  $this->db->query($query);

        $output['status']   = "sukses";
        $output['pesan']    = "";
        $output['data']     = $hasilQuery->getResult();
        $this->hasil($output);
    }

    public function hapusmappingunitdepo()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'id_mapping' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $this->db->transStart();
            $id_mapping    = $input->id_mapping;
            $query = "DELETE FROM depo_unit WHERE id_mapping = '$id_mapping' ";

            $this->db->query($query);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Berhasil di Hapus";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal di Hapus!";
            }

        }
        $this->hasil($output);
    }
}
?>