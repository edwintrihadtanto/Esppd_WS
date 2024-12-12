<?php
namespace App\Controllers;

class Mobilejkn extends Api
{
    private $db = null;
    private $cons_id = '31744';  
    private $secret_key = '5kQ5FEF0A4';
    //private $baseURL = '';
    private $baseURL = 'https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/';
    private $user_key = '64bb9cf23e5bb31d0fe054d1b0e49f3e';
    private $maxJKN = 1000;
    private $maxNON = 1000;

    public function __construct()
    {
        require_once(APPPATH . '/../vendor/autoload.php');
        date_default_timezone_set("Asia/Jakarta");
        $this->db =  db_connect();
        $this->cons_id = '31744';  
        $this->secret_key = '5kQ5FEF0A4';
        //$this->baseURL = '';
        $this->baseURL = 'https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/';
        $this->user_key = '64bb9cf23e5bb31d0fe054d1b0e49f3e';
        $this->maxJKN = 1000;
        $this->maxNON = 1000;
    }
    
    function index()
    {
        $this->response->setStatusCode(404);
    }

    private function tStamp()
    {
        $tStamp = strval(time() - strtotime('1970-01-01 07:00:00'));
        return $tStamp;
    }
    
    private function getHeader($tStamp)
    {
        $signature = hash_hmac('sha256', $this->cons_id . "&" . $tStamp, $this->secret_key, true);
        $encodedSignature = base64_encode($signature);
        return array("X-Cons-ID: " . $this->cons_id, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $this->user_key, "Content-Type: application/x-www-form-urlencoded\r\n");
    }

    private function decrypt($response, $tStamp)
    {
        $key = $this->cons_id . $this->secret_key . $tStamp;
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($response), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        $hasil = json_decode(\LZCompressor\LZString::decompressFromEncodedURIComponent($output), true);
        return $hasil;
    }
    
    private function url($request, $param, $method, $tStamp)
    {
        $headers = $this->getHeader($tStamp);
        $opts = array(
            'http' => array(
                'method' => $method,
                'header' => $headers,
                'content' => $param
            ),
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            )
        );
        $context = stream_context_create($opts);
        $string = json_decode(file_get_contents($this->baseURL . $request, true, $context));
        return $string;
    }
    
    public function refPoli(){
        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'GET';
        $param = '';
        $request = 'ref/poli';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }
    
    public function refPoliFP(){
        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'GET';
        $param = '';
        $request = 'ref/poli/fp';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }
    
    public function refDokter($poli = null, $tgl = null){
        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'GET';
        $param = '';
        if($poli == null){
            $request = 'ref/dokter';
        }else if($tgl == null){
            $request = 'jadwaldokter/kodepoli/'.$poli.'/tanggal/'.date('Y-m-d');
        }else{
            $request = 'jadwaldokter/kodepoli/'.$poli.'/tanggal/'.$tgl;
        }
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1 || $string->metadata->code == 200) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }
    
    public function refPasienFP($identitas = null, $noIdentitas = null){
        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'GET';
        $param = '';
        if(($identitas == 'nik' && strlen($noIdentitas) == 16)){
            $request = 'ref/pasien/fp/identitas/'.$identitas.'/noidentitas/'.$noIdentitas;
        }else if(($identitas == 'noka' && strlen($noIdentitas) == 13)){
            $request = 'ref/pasien/fp/identitas/'.$identitas.'/noidentitas/'.$noIdentitas;
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Input tidak sesuai';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1 || $string->metadata->code == 200) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }
    
    public function updateJadwalDokter(){
        $input = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'POST';
        $param = json_encode($input);
        $request = 'jadwaldokter/updatejadwaldokter';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }
    
    public function addAntrian($baru = null){
        $input = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $hasil = array();
        
        $query = "
            SELECT * FROM pasien JOIN penjamin_pasien USING(no_rm)
            WHERE no_rm = '".$input->no_rm."' AND id_penjamin = '2'
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() == 0){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Pasien tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else{
            $dataPasien = $hasilQuery->getRow();
        }

        $query = "
            SELECT * FROM unit
            WHERE id_unit = '".$input->id_unit."' AND map_bpjs > '' AND aktif = TRUE
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() == 0){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Unit tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else{
            $dataUnit = $hasilQuery->getRow();
        }
        $method = 'GET';
        $param = '';
        $request = 'ref/poli/';
        $string = $this->url($request, $param, $method, $tStamp);
        if($string->metadata->code != 1){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Unit tidak ditemukan di BPJS';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else{
            $listUnitBPJS = $this->Decrypt($string->response, $tStamp);
            $unitBPJS = null;
            foreach($listUnitBPJS as $tempUnitBPJS){
                if($unitBPJS == null && $tempUnitBPJS['kdsubspesialis'] == $dataUnit->map_bpjs){
                    $unitBPJS = $tempUnitBPJS;
                }
            }
            $tStamp = $this->tStamp();
        }

        $query = "
            INSERT INTO antrian_mobile_jkn(no_rm, tgl_antrian, id_unit, jenis, ref)
            VALUES('".$input->no_rm."', '".$input->tgl."', '".$input->id_unit."', '".$input->jenis."', '".$input->ref."')
            ON CONFLICT (no_rm, tgl_antrian, id_unit)
            DO UPDATE SET jenis = EXCLUDED.jenis
        ";
        if($this->db->simpleQuery($query)){
            $query = "
                SELECT * FROM antrian_mobile_jkn
                WHERE no_rm = '".$input->no_rm."' 
                AND id_unit = '".$input->id_unit."'
                AND tgl_antrian = '".$input->tgl."'
            ";
            $hasilQuery = $this->db->query($query);
            $dataBooking = $hasilQuery->getRow();
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Gagal membuat antrian';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $query = "
            SELECT
                COALESCE(COUNT(CASE WHEN jenis = 'JKN' THEN 1 END), 0) AS jkn,
                COALESCE(COUNT(CASE WHEN jenis = 'NON JKN' THEN 1 END), 0) AS non
            FROM antrian_mobile_jkn
            WHERE tgl_antrian = '".$input->tgl."'
        ";
        $quotaAntrian = $this->db->query($query)->getRow();
        
        if($baru == 'baru'){
            $pasienBaru = '1';
            $taskIdStart = 1;
        }else{
            $pasienBaru = '0';
            $taskIdStart = 3;
        }

        $query = "
            SELECT * FROM pegawai
            WHERE id_pegawai = '".$input->id_pegawai."' AND kd_dokter_bpjs > ''
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() == 0){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Dokter tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else{
            $dataDokter = $hasilQuery->getRow();
        }
        $method = 'GET';
        $param = '';
        $request = 'jadwaldokter/kodepoli/'.$unitBPJS['kdpoli'].'/tanggal/'.$input->tgl;
        $string = $this->url($request, $param, $method, $tStamp);
        if($string->metadata->code != 200){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Jadwal dokter tidak ditemukan di BPJS';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else{
            $listDokterBPJS = $this->Decrypt($string->response, $tStamp);
            $dokterBPJS = null;
            foreach($listDokterBPJS as $tempDokterBPJS){
                if($dokterBPJS == null && $tempDokterBPJS['kodedokter'] == $dataDokter->kd_dokter_bpjs){
                    $dokterBPJS = $tempDokterBPJS;
                }
            }
            if($dokterBPJS == null){
                $dokterBPJS = $listDokterBPJS[0];
            }
            $tStamp = $this->tStamp();
        }

        $tglSekarang = strtotime("Now");
        $waktuPraktek = explode("-", $dokterBPJS['jadwal']);
        $upadateTaskID = false;
        if($tglSekarang > strtotime($input->tgl." ".$waktuPraktek[1])){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Anda telat mendaftar Antrian Online BPJS';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else if($tglSekarang > strtotime($input->tgl." ".$waktuPraktek[0])){
            $waktuDilayani = ($tglSekarang + 300) * 1000;
            $upadateTaskID = true;
        }else{
            $waktuDilayani = (strtotime($input->tgl." ".$waktuPraktek[0]) + 300)* 1000;
        }

        $method = 'POST';
        $param = '
            {
                "kodebooking": "'.$dataBooking->kodebooking.'",
                "jenispasien": "'.$dataBooking->jenis.'",
                "nomorkartu": "'.$dataPasien->no_kartu.'",
                "nik": "'.$dataPasien->nik.'",
                "nohp": "'.$dataPasien->telepon.'",
                "kodepoli": "'.$unitBPJS['kdpoli'].'",
                "namapoli": "'.$unitBPJS['nmpoli'].'",
                "pasienbaru": '.$pasienBaru.',
                "norm": "'.$input->no_rm.'",
                "tanggalperiksa": "'.$input->tgl.'",
                "kodedokter": '.$dokterBPJS['kodedokter'].',
                "namadokter": "'.$dokterBPJS['namadokter'].'",
                "jampraktek": "'.$dokterBPJS['jadwal'].'",
                "jeniskunjungan": '.$input->asal.',
                "nomorreferensi": "'.$input->ref.'",
                "nomorantrean": "'.$dataBooking->no_antrian.'",
                "angkaantrean": '.$dataBooking->no_antrian.',
                "estimasidilayani": '.$waktuDilayani.',
                "sisakuotajkn": '.($this->maxJKN - $quotaAntrian->jkn).',
                "kuotajkn": '.$this->maxJKN.',
                "sisakuotanonjkn": '.($this->maxNON - $quotaAntrian->non).',
                "kuotanonjkn": '.$this->maxNON.',
                "keterangan": "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
            }
        ';
        $request = 'antrean/add';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 200) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
            if($upadateTaskID){
                $this->updateTaskId($dataBooking->kodebooking, 3, $taskIdStart);
            }
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }

    public function updateTaskId($kodebooking, $akhir, $awal = null){
        $tStamp = $this->tStamp();
        $hasil = array();
        $jalan = true;

        $query = "
            SELECT * FROM antrian_mobile_jkn
            WHERE kodebooking = '".$kodebooking."'
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() > 0){
            $dataBooking = $hasilQuery->getRow();
            $jenisresep = $dataBooking->jenisresep;
            if($awal == null){
                $awal = ($dataBooking->task_id) + 1;
            }
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Kode booking tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }
        
        if($awal < 8 && $akhir >= $awal){
            do{
                sleep(1);
                $tStamp = $this->tStamp();
                $method = 'POST';
                $param = '
                    {
                        "kodebooking": "'.$kodebooking.'",
                        "taskid": '.$awal.',
                        "waktu": '.(strtotime("Now") * 1000).',
                        "jenisresep": "'.$jenisresep.'"
                    }
                ';
                $request = 'antrean/updatewaktu';
                $string = $this->url($request, $param, $method, $tStamp);
                if ($string->metadata->code == 200) {
                    $query = "
                        UPDATE antrian_mobile_jkn
                        SET task_id = '".$awal."'
                        WHERE kodebooking = '".$dataBooking->kodebooking."'
                    ";
                    $hasilQuery = $this->db->simpleQuery($query);
                }else{
                    $jalan = false;
                    $hasil['data']   = '';
                    $hasil['pesan']  = $string->metadata->message;
                    $hasil['status'] = 'gagal';
                    echo json_encode($hasil);
                    return;
                }
                $awal++;
            }while($akhir >= $awal && $jalan);
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Gagal update Task ID';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $hasil['data']   = '';
        $hasil['pesan']  = 'Sukses mengupdate task id';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function addAntrianFarmasi(){
        $input = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $hasil = array();

        $query = "
            SELECT * FROM antrian_mobile_jkn
            WHERE no_rm = '".$input->no_rm."' 
            AND id_unit = '".$input->id_unit."'
            AND tgl_antrian = '".$input->tgl."'
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() > 0){
            $dataBooking = $hasilQuery->getRow();
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Booking tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $method = 'POST';
        $param = '
            {
                "kodebooking": "'.$dataBooking->kodebooking.'",
                "jenisresep": "'.$input->jenis_resep.'",
                "nomorantrean": '.$dataBooking->no_antrian.',
                "keterangan": ""
            }
        ';
        $request = 'antrean/farmasi/add';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 200) {
            $query = "
                UPDATE antrian_mobile_jkn
                SET jenisresep = '".$input->jenis_resep."'
                WHERE kodebooking = '".$dataBooking->kodebooking."'
            ";
            $hasilQuery = $this->db->simpleQuery($query);
            $hasil['data']   = '';
            $hasil['pesan']  = 'Berhasil menambah antrian farmasi';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = $string->metadata->message;
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
        }
    }

    public function batalAntrian(){
        $input = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $hasil = array();

        $query = "
            SELECT * FROM antrian_mobile_jkn
            WHERE no_rm = '".$input->no_rm."' 
            AND id_unit = '".$input->id_unit."'
            AND tgl_antrian = '".$input->tgl."'
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() > 0){
            $dataBooking = $hasilQuery->getRow();
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Booking tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $method = 'POST';
        $param = '
            {
                "kodebooking": "'.$dataBooking->kodebooking.'",
                "keterangan": "'.$input->alasan.'"
            }
        ';
        $request = 'antrean/batal';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 200) {
            $query = "
                DELETE FROM antrian_mobile_jkn
                WHERE kodebooking = '".$dataBooking->kodebooking."'
            ";
            $hasilQuery = $this->db->simpleQuery($query);
            $hasil['data']   = '';
            $hasil['pesan']  = 'Berhasil menghapus antrian farmasi';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = $string->metadata->message;
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
        }
    }

    public function listTaskID(){
        $input = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $hasil = array();

        $query = "
            SELECT * FROM antrian_mobile_jkn
            WHERE no_rm = '".$input->no_rm."' 
            AND id_unit = '".$input->id_unit."'
            AND tgl_antrian = '".$input->tgl."'
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() > 0){
            $dataBooking = $hasilQuery->getRow();
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Booking tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $method = 'POST';
        $param = '
            {
                "kodebooking": "'.$dataBooking->kodebooking.'"
            }
        ';
        $request = 'antrean/getlisttask';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 200) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = $string->metadata->message;
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
        }
    }

    public function dashboardPerTanggal($tgl = null, $waktu = null){
        if($tgl == null){
            $tgl = date('Y-m-d');
        }

        if($waktu != 'server'){
            $waktu = 'rs';
        }

        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'GET';
        $param = '';
        $request = 'dashboard/waktutunggu/tanggal/'.$tgl.'/waktu/'.$waktu;
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }

    public function dashboardPerBulan($bulan = null, $tahun = null, $waktu = null){
        if($bulan == null){
            $bulan = date('m');
        }

        if($tahun == null){
            $tahun = date('Y');
        }

        if($waktu != 'server'){
            $waktu = 'rs';
        }

        $tStamp = $this->tStamp();
        $hasil = array();
        $method = 'GET';
        $param = '';
        $request = 'dashboard/waktutunggu/bulan/'.$bulan.'/tahun/'.$tahun.'/waktu/'.$waktu;
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }

    public function antreanPerKodeBooking($kodebooking){
        $tStamp = $this->tStamp();
        $hasil = array();

        $query = "
            SELECT * FROM antrian_mobile_jkn
            WHERE kodebooking = '".$kodebooking."' 
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() == 0){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Booking tidak ditemukan';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $method = 'GET';
        $param = '';
        $request = 'antrean/pendaftaran/kodebooking/'.$kodebooking;
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }

    public function antreanBelumDilayani(){
        $tStamp = $this->tStamp();
        $hasil = array();

        $method = 'GET';
        $param = '';
        $request = 'antrean/pendaftaran/aktif';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }

    public function antreanDetail($poli, $dokter, $hari, $jam){
        $tStamp = $this->tStamp();
        $hasil = array();

        $method = 'GET';
        $param = '';
        $request = 'antrean/pendaftaran/kodepoli/'.$poli.'/kodedokter/'.$dokter.'/hari/'.$hari.'/jampraktek/'.$jam;
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metadata->code == 1) {
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }else{
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metadata->message;
            $hasil['data'] = $string;
            echo json_encode($hasil);
        }
    }
}
