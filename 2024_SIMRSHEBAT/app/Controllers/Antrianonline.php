<?php
namespace App\Controllers;

class Antrianonline extends Api
{
    private $db = null;
    private $maxJKN = 1000;
    private $maxNON = 1000;
    private $cons_id = '31744';  
    private $secret_key = '5kQ5FEF0A4';
    private $baseURL = 'https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/';
    private $user_key = '64bb9cf23e5bb31d0fe054d1b0e49f3e';

    public function __construct()
    {
        require_once(APPPATH . '/../vendor/autoload.php');
        date_default_timezone_set("Asia/Jakarta");
        $this->db =  db_connect();
    }

    function index()
    {
        $this->response->setStatusCode(404);
    }

    private function json_validator($data) { 
        if (!empty($data)) { 
            return is_string($data) && is_array(json_decode($data, true)) ? true : false; 
        } 
        return false; 
    } 

    private function generateNoRM(){
        $query = "INSERT INTO pasien
        (SELECT TO_CHAR((MAX((no_rm::INTEGER))+1), 'fm0000000') as no_rm FROM pasien)
        RETURNING no_rm;
        ";
        return $this->db->query($query)->getRow()->no_rm;
    }

    private function validasiTanggal($date) { 
        $d = strtotime($date); 
        return $d && date('Y-m-d', $d) === $date; 
    } 

    private function validasi($request, $template = null){
        $output = array();
        $username = $request->header('x-username');
        $token = $request->header('x-token');

        if($username == null || $token == null){
            $this->response->setStatusCode(404);
            return null;
        }else{
            $username = $request->header('x-username')->getValue();
            $token = $request->header('x-token')->getValue();
        }

        $query = "
            SELECT *, (expired > NOW()) bisa FROM token_bridging
            WHERE username = '$username' AND token = '$token'
        ";
        $hasil = $this->db->query($query);
        if($hasil->getNumRows() == 1){
            $data_token = $hasil->getRow();
            if($data_token->bisa){
                $query = "
                    UPDATE token_bridging
                    SET token = NULL,
                    expired = NULL
                    WHERE username = '$username'
                ";
                if($this->db->simpleQuery($query)){
                    if($template != null){
                        $inputRaw = $request->getBody();
                        if($this->json_validator($inputRaw)){
                            $input = json_decode($inputRaw, true);
                            if(count(array_diff_key($input, $template)) == 0 && count(array_diff_key($template, $input)) == 0){
                                return $input;
                            }else{
                                $output["response"] = "";
                                $output["metadata"] = array(
                                    "message" => "Input tidak lengkap",
                                    "code" => 201
                                );
                                echo json_encode($output);
                                return null;
                            }
                        }else{
                            $output["response"] = "";
                            $output["metadata"] = array(
                                "message" => "Input salah",
                                "code" => 201
                            );
                            echo json_encode($output);
                            return null;
                        }
                    }else{
                        return true;
                    }
                }else{
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Unknow error",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return null;
                }
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Token kadaluarsa",
                    "code" => 201
                );
                echo json_encode($output);
                return null;
            }
        }else{
            $output["response"] = "";
            $output["metadata"] = array(
                "message" => "Token salah",
                "code" => 201
            );
            echo json_encode($output);
            return null;
        }
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

    public function token(){
        $output = array();
        $username = $this->request->header('x-username');
        $password = $this->request->header('x-password');

        if($username == null || $password == null){
            $this->response->setStatusCode(404);
            return;
        }else{
            $username = $this->request->header('x-username')->getValue();
            $password = $this->request->header('x-password')->getValue();
        }

        $query = "
            SELECT * FROM token_bridging
            WHERE username = '$username'
            AND password = '$password'
        ";
        $hasil = $this->db->query($query);
        if($hasil->getNumRows() == 1){
            $token = md5(strtotime('Now'));
            $query = "
                UPDATE token_bridging
                SET token = '$token',
                expired = (NOW() + INTERVAL '5 minutes')
                WHERE username = '$username'
                AND password = '$password'
            ";
            $hasil = $this->db->simpleQuery($query);
            if($hasil){
                $output["response"] = array( "token" => $token );
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Gagal membuat token",
                    "code" => 201
                );
                echo json_encode($output);
            }
        }else{
            $output["response"] = "";
            $output["metadata"] = array(
                "message" => "Username dan password tidak cocok",
                "code" => 201
            );
            echo json_encode($output);
        }
    }

    public function statusAntrean(){
        $output = array();
        $template = array(
            "kodepoli" => "",
            "kodedokter" => "",
            "tanggalperiksa" => "",
            "jampraktek" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            if(!$this->validasiTanggal($input['tanggalperiksa'])){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Format tanggal periksa tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            $query = "
                SELECT
                    unit.nama_unit namapoli,
                    pegawai.nama_pegawai namadokter,
                    COUNT(antrian_mobile_jkn.kodebooking) totalantrean,
                    (COUNT(antrian_mobile_jkn.kodebooking) - COUNT(CASE WHEN task_id > 3 THEN 1 END)) sisaantrean,
                    COALESCE(MAX(CASE WHEN task_id > 3 THEN no_antrian END)::VARCHAR, '-') antreanpanggil,
                    ($this->maxJKN - COUNT(CASE WHEN jenis = 'JKN' THEN 1 END)) sisakuotajkn,
                    ($this->maxNON - COUNT(CASE WHEN jenis = 'NON JKN' THEN 1 END)) sisakuotanonjkn,
                    '' keterangan
                FROM
                    unit
                    JOIN dokter_klinik USING (id_unit)
                    JOIN pegawai USING (id_pegawai)
                    LEFT JOIN antrian_mobile_jkn USING (id_unit)
                WHERE 
                    unit.map_bpjs = '".$input['kodepoli']."'
                    AND pegawai.kd_dokter_bpjs = '".$input['kodedokter']."'
	                AND antrian_mobile_jkn.tgl_antrian = '".$input['tanggalperiksa']."'
                GROUP BY
                    unit.nama_unit,
                    pegawai.nama_pegawai
            ";
            $hasil = $this->db->query($query);
            if($hasil->getNumRows() == 1){
                $hasilData = $hasil->getRow();
                $output["response"] = array(
                    "namapoli" => $hasilData->namapoli,
                    "namadokter" => $hasilData->namadokter,
                    "totalantrean" => $hasilData->totalantrean + 0,
                    "sisaantrean" => $hasilData->sisaantrean + 0,
                    "antreanpanggil" => $hasilData->antreanpanggil,
                    "sisakuotajkn" => $hasilData->sisakuotajkn + 0,
                    "kuotajkn" => $this->maxJKN,
                    "sisakuotanonjkn" => $hasilData->sisakuotanonjkn + 0,
                    "kuotanonjkn" => $this->maxNON,
                    "keterangan" => $hasilData->keterangan
                );
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Poli dan dokter tidak ditemukan",
                    "code" => 201
                );
                echo json_encode($output);
            }
        }
    }

    public function ambilAntrean(){
        $template = array(
            "nomorkartu" => "",
            "nik" => "",
            "nohp" => "",
            "kodepoli" => "",
            "norm" => "",
            "tanggalperiksa" => "",
            "kodedokter" => "",
            "jampraktek" => "",
            "jeniskunjungan" => "",
            "nomorreferensi" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            if(!$this->validasiTanggal($input['tanggalperiksa'])){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Format tanggal tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if((!is_numeric($input['nomorkartu'])) || (strlen($input['nomorkartu'] != 13))){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Nomor kartu tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if((!is_numeric($input['nik'])) || (strlen($input['nik'] != 16))){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "NIK tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            $query = "
                SELECT * FROM pasien JOIN penjamin_pasien USING(no_rm)
                WHERE nik = '".$input['nik']."' AND no_kartu = '".$input['nomorkartu']."' AND id_penjamin = '2'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() == 0){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Data pasien ini tidak ditemukan, silahkan melakukan Registrasi Pasien Baru",
                    "code" => 202
                );
                echo json_encode($output);
                return;
            }else{
                $dataPasien = $hasilQuery->getRow();
            }

            $query = "
                SELECT * FROM antrian_mobile_jkn
                JOIN unit using(id_unit)
                WHERE no_rm = '".$dataPasien->no_rm."' 
                AND map_bpjs = '".$input['kodepoli']."'
                AND tgl_antrian = '".$input['tanggalperiksa']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Pasien telah mendaftar pada poli dan tanggal yang sama",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            $query = "
                SELECT * FROM unit 
                WHERE map_bpjs = '".$input['kodepoli']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() == 0){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Unit tidak ada di RS Darmayu Madiun",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }else{
                $dataUnit = $hasilQuery->getRow();
            }

            $jadwalDr = null;
            $tStamp = $this->tStamp();
            $method = 'GET';
            $request = 'jadwaldokter/kodepoli/'.$input['kodepoli'].'/tanggal/'.$input['tanggalperiksa'];
            $string = $this->url($request, '', $method, $tStamp);
            if($string->metadata->code == 200){
                $response = $string->response;
                $hasilRes   = $this->Decrypt($response, $tStamp);

                foreach($hasilRes as $tempJadwalDr){
                    if($tempJadwalDr['kodedokter'] == $input['kodedokter']){
                        $jadwalDr = $tempJadwalDr;
                    }
                }

                if($jadwalDr == null){
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Jadwal dokter tidak ditemukan",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Tidak ada jadwal poli tersebut di HFIS",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            $tglSekarang = strtotime(date('Y-m-d'));
            $tglDaftar = strtotime($input['tanggalperiksa']);
            if($tglDaftar < $tglSekarang){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Tidak bisa mendaftar mundur tanggal",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }else if($tglDaftar == $tglSekarang){
                $waktuSekarang = strtotime('Now');
                $waktuAkhir = strtotime($input['tanggalperiksa'].' '.(explode("-",$jadwalDr['jadwal']))[1]);
                if($waktuSekarang >= $waktuAkhir){
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Poli sudah tutup",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }else{
                    $estimasidilayani = strtotime('Now') + 300;
                    $estimasidilayani *= 1000;
                }
            }else{
                $estimasidilayani = strtotime($input['tanggalperiksa'].' '.(explode("-",$jadwalDr['jadwal']))[0]) + 1800;
                $estimasidilayani *= 1000;
            }

            $jenisPasien = 'JKN';
            if($input['nomorreferensi'] == ''){
                $jenisPasien = 'NON JKN';
            }

            $query = "
                INSERT INTO antrian_mobile_jkn(no_rm, tgl_antrian, id_unit, jenis, ref, kodedokter, namadokter)
                VALUES('".$dataPasien->no_rm."', '".$input['tanggalperiksa']."', '".$dataUnit->id_unit."', '".$jenisPasien."', '".$input['nomorreferensi']."', '".$input['kodedokter']."', '".$jadwalDr['namadokter']."')
            ";
            if($this->db->simpleQuery($query)){
                $query = "
                    SELECT * FROM antrian_mobile_jkn
                    WHERE no_rm = '".$dataPasien->no_rm."' 
                    AND id_unit = '".$dataUnit->id_unit."'
                    AND tgl_antrian = '".$input['tanggalperiksa']."'
                ";
                $hasilQuery = $this->db->query($query);
                $dataBooking = $hasilQuery->getRow();
                $query = "
                    SELECT
                        COALESCE(COUNT(CASE WHEN jenis = 'JKN' THEN 1 END), 0) AS jkn,
                        COALESCE(COUNT(CASE WHEN jenis = 'NON JKN' THEN 1 END), 0) AS non
                    FROM antrian_mobile_jkn
                    WHERE tgl_antrian = '".$input['tanggalperiksa']."'
                ";
                $quotaAntrian = $this->db->query($query)->getRow();
                $output["response"] = array(
                    "nomorantrean" => $dataBooking->no_antrian,
                    "angkaantrean" => $dataBooking->no_antrian,
                    "kodebooking" => $dataBooking->kodebooking,
                    "norm" => $dataBooking->no_rm,
                    "namapoli" => $jadwalDr['namapoli'],
                    "namadokter" => $jadwalDr['namadokter'],
                    "sisakuotajkn" => $estimasidilayani,
                    "sisakuotajkn" => $this->maxJKN - $quotaAntrian->jkn,
                    "kuotajkn" => $this->maxJKN,
                    "sisakuotanonjkn" => $this->maxNON - $quotaAntrian->non,
                    "kuotanonjkn" => $this->maxNON,
                     "keterangan" => "Peserta harap 60 menit lebih awal guna pencatatan administrasi."
                );
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
                return;
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Gagal melakukan booking",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function sisaAntrean(){
        $template = array(
            "kodebooking" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            $query = "
                SELECT * FROM antrian_mobile_jkn
                WHERE kodebooking = '".$input['kodebooking']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $dataBooking = $hasilQuery->getRow();
                $query = "
                    SELECT
                        nama_unit,
                        namadokter,
                        (COUNT(antrian_mobile_jkn.kodebooking) - COUNT(CASE WHEN task_id > 3 THEN 1 END)) sisaantrean,
                        COALESCE(MAX(CASE WHEN task_id > 3 THEN no_antrian END)::VARCHAR, '-') antreanpanggil
                    FROM
                        antrian_mobile_jkn
                        JOIN unit USING( id_unit )
                    WHERE
                        kodedokter = '".$dataBooking->kodedokter."' 
                        AND tgl_antrian = '".$dataBooking->tgl_antrian."'
                    GROUP BY
                        nama_unit,
                        namadokter
                ";
                $dataAntrian = $this->db->query($query)->getRow();
                $output["response"] = array(
                    "nomorantrean" => $dataBooking->no_antrian,
                    "namapoli" => $dataAntrian->nama_unit,
                    "namadokter" => $dataAntrian->namadokter,
                    "sisaantrean" => $dataAntrian->sisaantrean + 0,
                    "antreanpanggil" => $dataAntrian->antreanpanggil,
                    "waktutunggu" => $dataAntrian->sisaantrean * 900000,
                    "keterangan" => ""
                );
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
                return;
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Kode booking tidak ditemukan",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function batalAntrean(){
        $template = array(
            "kodebooking" => "",
            "keterangan" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            $query = "
                SELECT * FROM antrian_mobile_jkn
                WHERE kodebooking = '".$input['kodebooking']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $dataBooking = $hasilQuery->getRow();
                if($dataBooking->task_id == 0){
                    $query = "
                        INSERT INTO riwayat_batal_antrian_mobile_jkn
                        VALUES('".$input['kodebooking']."', DEFAULT, '".$input['keterangan']."')
                    ";
                    $this->db->simpleQuery($query);
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Ok",
                        "code" => 200
                    );
                    echo json_encode($output);
                    return;
                }else{
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Pasien sudah mendapatkan pelayanan",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Kode booking tidak ditemukan",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function checkin(){
        $template = array(
            "kodebooking" => "",
            "waktu" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            $query = "
                SELECT * FROM antrian_mobile_jkn
                WHERE kodebooking = '".$input['kodebooking']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $dataBooking = $hasilQuery->getRow();
                if($dataBooking->task_id == 0){
                    $tStamp = $this->tStamp();
                    $method = 'POST';
                    $request = 'antrean/updatewaktu';
                    $param = '{
                        "kodebooking": "'.$dataBooking->kodebooking.'",
                        "taskid": 3,
                        "waktu": '.$input['waktu'].',
                        "jenisresep": "'.$dataBooking->jenisresep.'"
                    }';
                    $string = $this->url($request, $param, $method, $tStamp);
                    if($string->metadata->code == 200){
                        $query = "
                            UPDATE antrian_mobile_jkn
                            SET task_id = '3'
                            WHERE kodebooking = '".$input['kodebooking']."'
                        ";
                        $this->db->simpleQuery($query);
                        $output["response"] = "";
                        $output["metadata"] = array(
                            "message" => "Ok",
                            "code" => 200
                        );
                        echo json_encode($output);
                        return;
                    }else{
                        $output["response"] = "";
                        $output["metadata"] = array(
                            "message" => $string->metadata->message,
                            "code" => 201
                        );
                        echo json_encode($output);
                        return;
                    }
                }else{
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Pasien sudah mendapatkan pelayanan",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Kode booking tidak ditemukan",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function pasienBaru(){
        $template = array(
            "nomorkartu" => "",
            "nik" => "",
            "nomorkk" => "",
            "nama" => "",
            "jeniskelamin" => "",
            "tanggallahir" => "",
            "nohp" => "",
            "alamat" => "",
            "kodeprop" => "",
            "namaprop" => "",
            "kodedati2" => "",
            "namadati2" => "",
            "kodekec" => "",
            "namakec" => "",
            "kodekel" => "",
            "namakel" => "",
            "rw" => "",
            "rt" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            if(!$this->validasiTanggal($input['tanggallahir'])){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Format tanggal lahir tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if(strlen($input['nomorkartu']) != 13 || (!is_numeric($input['nomorkartu']))){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Nomor kartu BPJS tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if(strlen($input['nik']) != 16 || (!is_numeric($input['nik']))){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "NIK tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if(strlen($input['nomorkk']) != 16 || (!is_numeric($input['nomorkk']))){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Nomor KK tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if($input['jeniskelamin'] == 'L'){
                $jk = 'true';
            }else if($input['jeniskelamin'] == 'P'){
                $jk = 'false';
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Jenis Kelamin tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
            
            $newRM = $this->generateNoRM();

            $query = "
                INSERT INTO pasien(no_rm, nama, nik, jenis_kelamin, tanggal_lahir, alamat, telepon, kd_kelurahan, kd_kelurahan_ktp)
                VALUES(
                    '".$newRM."'
                    '".$input['nama']."',
                    '".$input['nik']."',
                    ".$jk.",
                    '".$input['tanggallahir']."',
                    '".$input['alamat']."',
                    '".$input['nohp']."',
                    '8815','8815'
                )
            ";

            if($this->db->simpleQuery($query)){
                $query = "
                    INSERT INTO penjamin_pasien
                    VALUES('".$newRM."', '2', '".$input['nomorkartu']."')
                ";
                $this->db->simpleQuery($query);
                $output["response"] = array(
                    "norm" => $newRM.""
                );
                $output["metadata"] = array(
                    "message" => "Harap datang ke admisi untuk melengkapi data rekam medis",
                    "code" => 200
                );
                echo json_encode($output);
                return;
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Gagal menambahkan pasien",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function ambilAntreanFarmasi(){
        $template = array(
            "kodebooking" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            $query = "
                SELECT * FROM antrian_mobile_jkn
                WHERE kodebooking = '".$input['kodebooking']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $dataBooking = $hasilQuery->getRow();
                if($dataBooking->jenisresep != 'Tidak ada'){
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Jenis resep belum diupdate",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }else if($dataBooking->jenisresep < 5){
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Pasien belum selesai dilayani di poli",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }else if($dataBooking->jenisresep > 5){
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Pasien sudah mengambil antrian farmasi",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }else if($dataBooking->tgl_antrian != (date('Y-m-d')."")){
                    $output["response"] = "";
                    $output["metadata"] = array(
                        "message" => "Tanggal antrian bukan hari ini",
                        "code" => 201
                    );
                    echo json_encode($output);
                    return;
                }else{
                    $tStamp = $this->tStamp();
                    $method = 'POST';
                    $request = 'antrean/updatewaktu';
                    $param = '{
                        "kodebooking": "'.$dataBooking->kodebooking.'",
                        "taskid": 6,
                        "waktu": '.(strtotime("Now") * 1000).',
                        "jenisresep": "'.$dataBooking->jenisresep.'"
                    }';
                    $string = $this->url($request, $param, $method, $tStamp);
                    if($string->metadata->code == 200){
                        $query = "
                            UPDATE antrian_mobile_jkn
                            SET task_id = '6'
                            WHERE kodebooking = '".$input['kodebooking']."'
                        ";
                        $this->db->simpleQuery($query);
                        
                        $query = "
                            SELECT * FROM antrian_mobile_jkn
                            WHERE kodebooking = '".$input['kodebooking']."'
                        ";
                        $dataBooking = $this->db->query($query)->getRow();
                        $output["response"] = array(
                            "jenisresep" => $dataBooking->jenisresep,
                            "nomorantrean" => $dataBooking->no_antrian_farmasi,
                            "keterangan" => ""
                        );
                        $output["metadata"] = array(
                            "message" => "Ok",
                            "code" => 200
                        );
                        echo json_encode($output);
                        return;
                    }else{
                        $output["response"] = "";
                        $output["metadata"] = array(
                            "message" => $string->metadata->message,
                            "code" => 201
                        );
                        echo json_encode($output);
                        return;
                    }

                    
                }
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Kode booking tidak ditemukan",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function statusAntreanFarmasi(){
        $template = array(
            "kodebooking" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            $query = "
                SELECT * FROM antrian_mobile_jkn
                WHERE kodebooking = '".$input['kodebooking']."'
                AND task_id = '6'
                AND tgl_antrian = ".date('Y-m-d')."
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $dataBooking = $hasilQuery->getRow();
                $query = "
                    SELECT
                        COALESCE (COUNT(CASE WHEN task_id > 5 THEN 1 END), 0) totalantrean,
                        COALESCE (COUNT(CASE WHEN task_id = 6 THEN 1 END), 0) sisaantrean,
                        COALESCE (MAX(CASE WHEN task_id = 7 THEN no_antrian_farmasi ELSE 0 END), 0) antreanpanggil
                    FROM
                        antrian_mobile_jkn
                    WHERE
                        tgl_antrian = '".date('Y-m-d')."'
                ";
                $dataAntrian = $this->db->query($query)->getRow();
                $output["response"] = array(
                    "jenisresep" => $dataBooking->jenisresep,
                    "totalantrean" => 0+$dataAntrian->totalantrean,
                    "sisaantrean" => 0+$dataAntrian->sisaantrean,
                    "antreanpanggil" => 0+$dataAntrian->antreanpanggil,
                    "keterangan" => ""
                );
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
                return;
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Kode booking tidak ditemukan",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function jadwalOperasiRS(){
        $template = array(
            "tanggalawal" => "",
            "tanggalakhir" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            if(!$this->validasiTanggal($input['tanggalawal'])){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Format tanggal awal tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if(!$this->validasiTanggal($input['tanggalakhir'])){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Format tanggal akhir tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            if(strtotime($input['tanggalakhir']) < strtotime($input['tanggalawal'])){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Tanggal Akhir Tidak Boleh Lebih Kecil dari Tanggal Awal",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            $query = "
                SELECT
                    kode_booking kodebooking,
                    tgl_operasi tanggaloperasi,
                    jenis_op jenistindakan,
                    kode_poli kodepoli,
                    nama_poli namapoli,
                    terlaksana,
                    nopeserta,
                    SELECT ROUND(EXTRACT(EPOCH FROM lastupdate) * 1000) lastupdate
                FROM antrian_operasi
                WHERE tgl_operasi BETWEEN '".$input['tanggalawal']."' AND '".$input['tanggalakhir']."' 
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $output["response"] = $hasilQuery->getResult();
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
                return;
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Tidak ada jadwal operasi",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }

    public function jadwalOperasiPasien(){
        $template = array(
            "nopeserta" => ""
        );
        $input = $this->validasi($this->request, $template);
        if($input != null){
            if(strlen($input['nomorkartu']) != 13 || (!is_numeric($input['nomorkartu']))){
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Nomor kartu BPJS tidak sesuai",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }

            $query = "
                SELECT
                    kode_booking kodebooking,
                    tgl_operasi tanggaloperasi,
                    jenis_op jenistindakan,
                    kode_poli kodepoli,
                    nama_poli namapoli,
                    terlaksana
                FROM antrian_operasi
                WHERE nopeserta = '".$input['nopeserta']."'
            ";
            $hasilQuery = $this->db->query($query);
            if($hasilQuery->getNumRows() > 0){
                $output["response"] = $hasilQuery->getResult();
                $output["metadata"] = array(
                    "message" => "Ok",
                    "code" => 200
                );
                echo json_encode($output);
                return;
            }else{
                $output["response"] = "";
                $output["metadata"] = array(
                    "message" => "Tidak ada jadwal operasi",
                    "code" => 201
                );
                echo json_encode($output);
                return;
            }
        }
    }
}