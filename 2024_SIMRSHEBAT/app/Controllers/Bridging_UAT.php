<?php
namespace App\Controllers;

/**
 * Description of Bridging BPJS 
 *
 * @author (-_-)
 */

class Bridging_UAT extends Api
{
    public function __construct()
    {
        require_once(APPPATH . '/../vendor/autoload.php');
        date_default_timezone_set("Asia/Jakarta");
        $this->db =  db_connect();
    }

    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }

    public function tStamp()
    {
        $tStamp = strval(time() - strtotime('1970-01-01 07:00:00'));
        return $tStamp;
    }

    public function url($request, $param, $method, $tStamp)
    {
        $headers = $this->getSignatureVedikaBaru($tStamp);
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
        //$string = json_decode(file_get_contents('https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/' . $request, true, $context));
        $string = json_decode(file_get_contents('https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/' . $request, true, $context));
        return $string;
    }

    public function getSignatureVedikaBaru($tStamp)
    {

        //$data = "31744";
        //$secretKey = "5kQ5FEF0A4";
        //$user_key = "1fef913f6110d8d3ffecb0dd17dc9c51";
        $data = "21780";
        $secretKey = "1hDF0B4057";
        $user_key = "6861b75624e5e2b742c3d270ec096b98";
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        return array("X-Cons-ID: " . $data, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $user_key, "Content-Type: application/x-www-form-urlencoded\r\n");
    }

    public function Decrypt($response, $tStamp)
    {
        //$data = "31744";
        //$secretKey = "5kQ5FEF0A4";
        //$user_key = "1fef913f6110d8d3ffecb0dd17dc9c51";
        $data = "21780";
        $secretKey = "1hDF0B4057";
        $user_key = "6861b75624e5e2b742c3d270ec096b98";
        $key = $data . $secretKey . $tStamp;
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($response), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        $hasil = json_decode(\LZCompressor\LZString::decompressFromEncodedURIComponent($output), true);
        return $hasil;
    }
    /*JSON PARAM*/
    public function JsonCreateRencanaKontrol($skdp, $dokter, $unit, $tgl)
    {
        $json = '      {
            "request": {
                "noSEP":"' . $skdp . '",
                "kodeDokter":"' . $dokter . '",
                "poliKontrol":"' . $unit . '",
                "tglRencanaKontrol":"' . $tgl . '",
                "user":"TES WS"
            }
        }

        ';
        return $json;
    }
    
    public function jsonInsertRujukanKhusus($rujukan, $icd1, $icd2, $user)
    {
        $json = '
        {
            "noRujukan": "'.$rujukan.'",
            "diagnosa": [
                {"kode": "P;'.$icd1.'"},
                {"kode": "S;'.$icd2.'"}
            ],
            "procedure":  [
                {"kode": "39.95"}
            ],
            "user": "'.$user.'"
        }';
        return $json;
    }

    public function jsonDeleteRujukanKhusus($rujukan, $id, $user)
    {
        $json = '
        {
           "request": {
                "t_rujukan": {
                    "idRujukan": "'.$id.'",
                    "noRujukan": "'.$rujukan.'",
                    "user": "'.$user.'"
                    }
                }
        }';
        return $json;
    }

    public function jsonInsertRujukan($sep, $tgl, $tglkontrol, $rs, $jnsPelayanan, $catatan, $icd, $tipeRujukan, $unit, $user)
    {
        $json = '
        {
            "request": {
                "t_rujukan": {
                    "noSep": "' . $sep . '",
                    "tglRujukan": "' . $tgl . '",
                    "tglRencanaKunjungan":"' . $tglkontrol . '",
                    "ppkDirujuk": "' . $rs . '",
                    "jnsPelayanan": "' . $jnsPelayanan . '",
                    "catatan": "' . $catatan . '",
                    "diagRujukan": "' . $icd . '",
                    "tipeRujukan": "' . $tipeRujukan . '",
                    "poliRujukan": "' . $unit . '",
                    "user": "' . $user . '"
                }
            }
        }';
        return $json;
    }

    public function jsonupdateRujukan($norujukan, $tgl, $tglkontrol, $rs, $jns_pelayanan, $catatan, $icd, $tiperujukan, $unit, $user)
    {
        $json = '
        {
            "request": {
                "t_rujukan": {
                    "noRujukan": "' . $norujukan . '",
                    "tglRujukan": "' . $tgl . '",
                    "tglRencanaKunjungan":"' . $tglkontrol . '",
                    "ppkDirujuk": "' . $rs . '",
                    "jnsPelayanan": "' . $jns_pelayanan . '",
                    "catatan": "' . $catatan . '",
                    "diagRujukan": "' . $icd . '",
                    "tipeRujukan": "' . $tiperujukan . '",
                    "poliRujukan": "' . $unit . '",
                    "user": "' . $user . '"
                }
            }
        }';
        
        return $json;
    }

    public function jsonDeleteRujukan($idrujukan, $user)
    {
        $json = '
        {
            "request": {
                "t_rujukan": {
                    "noRujukan": "' . $idrujukan . '",
                    "user": "' . $user . '",
                }
            }
        }';
        return $json;
    }
    
    public function JsonDeleteRencanaKontrol($skdp,$user)
    {
        $json = ' {
            "request": {
                "t_suratkontrol":{
                    "noSuratKontrol": "' . $skdp . '",
                    "user": "' . $user . '",
                }
            }
        }
        ';
        return $json;
    }

    public function JsonDeleteSEP($id)
    {
        $json = '
        {
            "request": {
                "t_sep": {
                    "noSep": "' . $id . '",
                    "user": "Coba Ws"
                }
            }
        }';
        return $json;
    }

    public function JsonUpdateSEP($skdp, $sep, $dokter, $unit, $tgl)
    {
        $json = ' {
           "request": {
            "t_sep": {
                "noSep": "' . $sep . '",
                "klsRawat":{
                    "klsRawatHak":"3",
                    "klsRawatNaik":"",
                    "pembiayaan":"",
                    "penanggungJawab":""
                    },
                    "noMR": "00469120",
                    "catatan": "",
                    "diagAwal": "E10",
                    "poli": {
                        "tujuan": "' . $unit . '",
                        "eksekutif": "0"
                        },
                        "cob": {
                            "cob": "0"
                            },
                            "katarak": {
                                "katarak": "0"
                                },
                                "jaminan": {
                                    "lakaLantas": "0",
                                    "penjamin": {
                                        "tglKejadian": "",
                                        "keterangan": "",
                                        "suplesi": {
                                            "suplesi": "0",
                                            "noSepSuplesi": "",
                                            "lokasiLaka": {
                                                "kdPropinsi": "",
                                                "kdKabupaten": "",
                                                "kdKecamatan": ""
                                            }
                                        }
                                    }
                                    },
                                    "dpjpLayan":"' . $dokter . '",
                                    "noTelp": "08522038363",
                                    "user": "Cobaws"
                                }
                            }
                        }  
                        ';
        return $json;
    }

    public function JsonUpdateRencanaKontrol($skdp, $sep, $dokter, $unit, $tgl)
    {
        $json = '  {
            "request": {
                "noSuratKontrol":"' . $sep . '",
                "noSEP":"' . $skdp . '",
                "kodeDokter":"' . $dokter . '",
                "poliKontrol":"' . $unit . '",
                "tglRencanaKontrol":"' . $tgl . '",
                "user":"coba"
            }
        }
        ';
        return $json;
    }

    public function JsonAntrianBpjs($kodebooking,$jkn,$noka,$nik,$hp,$unitbpjs,$namapoli,$rm,$tglkontrol,$dpjp,$namadpjp,$antrian,$sisa,$kuota)
    {
        $json = '
        {
            "kodebooking": "'.$kodebooking.'",
            "jenispasien": "'.$jkn.'",
            "nomorkartu": "'.$noka.'",
            "nik": "'.$nik.'",
            "nohp": "'.$hp.'",
            "kodepoli": "'.$unitbpjs.'",
            "namapoli": "'.$namapoli.'",
            "pasienbaru": 1,
            "norm": "'.$rm.'",
            "tanggalperiksa": "'.$tglkontrol.'",
            "kodedokter": '.$dpjp.',
            "namadokter": "'.$namadpjp.'",
            "jampraktek": "08:00-16:00",
            "jeniskunjungan": 1,
            "nomorreferensi": "'.$kodebooking.'",
            "nomorantrean": "A-12",
            "angkaantrean": '.$antrian.',
            "estimasidilayani": 1615869169000,
            "sisakuotajkn": '.$sisa.',
            "kuotajkn": '.$kuota.',
            "sisakuotanonjkn": '.$sisa.',
            "kuotanonjkn": '.$kuota.',
            "keterangan": "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
        }';
        return $json;
    }

    public function JsonPengajuanPenjaminan($noka, $jnspln, $ket, $tgl)
    {
        $json = '  {
            "request": {
                "t_sep": {
                   "noKartu": "'.$noka.'",
                   "tglSep": "'.$tgl.'",
                   "jnsPelayanan": "'.$jnspln.'",
                   "keterangan": "'.$ket.'",
                   "user": "Coba Ws"
               }
           }
       }       

       ';
       return $json;
    }

    public function CreateRencanaKontrol($skdp, $dokter, $unit, $tgl)
    {

        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        /*$skdp       = $input->skdp;
        $dokter     = $input->dokter;
        $unit       = $input->unit;*/
        $tgl        = date('Y-m-d');
        $method     = 'POST';
        $param      = $this->JsonCreateRencanaKontrol($skdp, $dokter, $unit, $tgl);
        $request    = '/RencanaKontrol/insert';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function DeleteRencanaKontrol($skdp,$user)
    {

        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $tgl        = date('Y-m-d');
        $method     = 'DELETE';
        $param      = $this->JsonDeleteRencanaKontrol($skdp,$user);
        $request    = '/RencanaKontrol/Delete';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function DeleteSEP($sep)
    {

        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $tgl        = date('Y-m-d');
        $method     = 'DELETE';
        $param      = $this->JsonDeleteSEP($sep);
        $request    = '/SEP/2.0/delete';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function UpdateRencanaKontrol($skdp, $sep, $dokter, $unit)
    {
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
            /*    $skdp       = $input->skdp;
        $dokter     = $input->dokter;
        $unit       = $input->unit;*/
        $tgl        = date('Y-m-d');
        $method     = 'POST';
        $param      = $this->JsonUpdateRencanaKontrol($skdp, $sep, $dokter, $unit, $tgl);
        $request    = '/RencanaKontrol/Update';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function AntrianBpjs($noka, $nik, $hp, $unitbpjs, $namapoli, $rm, $tglkontrol, $dpjp, $namadpjp)
    {
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = $this->JsonAntrianBpjs($kodebooking,$jkn,$noka,$nik,$hp,$unitbpjs,$namapoli,$rm,$tglkontrol,$dpjp,$namadpjp,$antrian,$sisa,$kuota);
        $request    = '/antrean/add';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }


    public function UpdateSEP($skdp, $sep, $dokter, $unit, $tgl)
    {

        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
            /*    $skdp       = $input->skdp;
        $dokter     = $input->dokter;
        $unit       = $input->unit;*/
        $tgl        = date('Y-m-d');
        $method     = 'PUT';
        $param      = $this->JsonUpdateSEP($skdp, $sep, $dokter, $unit, $tgl);
        $request    = '/SEP/2.0/update';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function jsonCreateSep($noka, $dokter, $diagnosa, $polirs, $noRujukan, $tglRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $createRencanaKontrol, $kd_perujuk, $kelas, $rs)
    {

        if ($TujuanKunjungan == '1') {
            $TKunjungan  = '';
        } else {
            $TKunjungan  = $TujuanKunjungan;
        }
        if ($prosedurpelayanan == '1') {
            $ppelayanan  = '';
        } else {
            $ppelayanan  = $prosedurpelayanan;
        }
        if ($Penunjang == '1') {
            $PenunjangSep  = '';
        } else {
            $PenunjangSep  = $Penunjang;
        }
        if ($assesmenpelayanan == '1') {
            $apelayanan  = '';
        } else {
            $apelayanan  = $assesmenpelayanan;
        }
        if ($createRencanaKontrol == '0') {
            $cRencanaKontrol = '';
        } else {
            $cRencanaKontrol = $createRencanaKontrol;
        }

        $json = '
        {
            "request":{
                "t_sep":{
                    "noKartu":"' . $noka . '",
                    "tglSep":"' . date("Y-m-d") . '",       
                    "ppkPelayanan":"1308R001",
                    "jnsPelayanan":"2",
                    "klsRawat":{
                        "klsRawatHak":"",
                        "klsRawatNaik":"",
                        "pembiayaan":"",
                        "penanggungJawab":""
                        },
                        "noMR":"6-53-09-19",
                        "rujukan":{
                            "asalRujukan":"1",
                            "tglRujukan":"' . $tglRujukan . '",
                            "noRujukan":"' . $noRujukan . '",
                            "ppkRujukan":"' . $kd_perujuk . '"
                            },
                            "catatan":"tidak",
                            "diagAwal":"' . $diagnosa . '",
                            "poli":{
                                "tujuan":"' . $polirs . '",
                                "eksekutif":"0"},
                                "cob":{
                                    "cob":"0"},
                                    "katarak":{
                                        "katarak":"0" },
                                        "jaminan":
                                        {
                                            "lakaLantas":"0",
                                            "penjamin":
                                            {
                                                "tglKejadian":"",
                                                "keterangan":"",
                                                suplesi":
                                                {
                                                    "suplesi":"0",
                                                    "noSepSuplesi":"",
                                                    "lokasiLaka":{
                                                        "kdPropinsi":"",
                                                        "kdKabupaten":"",
                                                        "kdKecamatan":""}
                                                    }
                                                }
                                                },
                                                "tujuanKunj"    :"' . $TKunjungan . '",
                                                "flagProcedure" :"' . $ppelayanan . '",   
                                                "kdPenunjang"   :"' . $PenunjangSep . '",
                                                "assesmentPel"  :"' . $apelayanan . '",
                                                "skdp":
                                                {
                                                    "noSurat"   :"' . $cRencanaKontrol . '",
                                                    "kodeDPJP"  :"' . $dokter . '"
                                                    },
                                                    "dpjpLayan" :"' . $dokter . '",
                                                    "noTelp"    :"112233445566",
                                                    "user"      :"Coba Ws"
                                                }
                                            }
                                        }';
        return $json;
    }

    public function PostSEP($noka, $idokter, $diagnosa, $polirs, $noRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $createRencanaKontrol, $kd_perujuk, $kelas, $rs)
    {
        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = $this->jsonCreateSep($noka, $idokter, $diagnosa, $polirs, $noRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $createRencanaKontrol, $kd_perujuk, $kelas, $rs);
        $request    = '/SEP/2.0/insert';
        $string     = $this->url($request, $param, $method, $tStamp);
        $hasil = array();
        if ($string->metaData->code != 200) {
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $response   = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = '';
            $hasil['data']      = $response;
        }
        echo json_encode($hasil);
    }
    
    public function SEPIGD()
    {
        $input      = json_decode(file_get_contents('php://input')); 
        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = '
            {
                "request":{
                   "t_sep":{
                      "noKartu":"'.$input->noka.'",
                      "tglSep":"'.$input->tgl.'",
                      "ppkPelayanan":"0216R010",
                      "jnsPelayanan":"2",
                      "klsRawat":{
                         "klsRawatHak":"'.$input->kls.'",
                         "klsRawatNaik":"",
                         "pembiayaan":"",
                         "penanggungJawab":""
                      },
                      "noMR":"'.$input->no_rm.'",
                      "rujukan":{
                         "asalRujukan":"1",
                         "tglRujukan":"",
                         "noRujukan":"",
                         "ppkRujukan":""
                      },
                      "catatan":"SEP IGD melalui bridging",
                      "diagAwal":"'.$input->diagnosa.'",
                      "poli":{
                         "tujuan":"IGD",
                         "eksekutif":"0"
                      },
                      "cob":{
                         "cob":"'.$input->cob.'"
                      },
                      "katarak":{
                         "katarak":"'.$input->katarak.'"
                      },
                      "jaminan":{
                         "lakaLantas":"'.$input->laka.'",
                         "noLP":"'.$input->no_lp.'",
                         "penjamin":{
                            "tglKejadian":"'.$input->tgl_laka.'",
                            "keterangan":"'.$input->keterangan_laka.'",
                            "suplesi":{
                               "suplesi":"'.$input->suplesi.'",
                               "noSepSuplesi":"'.$input->no_suplesi.'",
                               "lokasiLaka":{
                                  "kdPropinsi":"'.$input->provinsi_laka.'",
                                  "kdKabupaten":"'.$input->kota_laka.'",
                                  "kdKecamatan":"'.$input->kecamatan_laka.'"
                               }
                            }
                         }
                      },
                      "tujuanKunj":"0",
                      "flagProcedure":"",
                      "kdPenunjang":"",
                      "assesmentPel":"",
                      "skdp":{
                         "noSurat":"",
                         "kodeDPJP":""
                      },
                      "dpjpLayan":"'.$input->dpjp.'",
                      "noTelp":"'.$input->telp.'",
                      "user":"'.$input->user.'"
                   }
                }
            }
        ';
        $request    = '/SEP/2.0/insert';
        $string     = $this->url($request, $param, $method, $tStamp);
        $hasil = array();
        if ($string->metaData->code != 200) {
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $response   = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = '';
            $hasil['data']      = $response;
        }
        echo json_encode($hasil);
    }

    public function PengajuanPejaminan($noka, $jnspln, $ket, $tgl)
    {

        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = $this->JsonPengajuanPenjaminan($noka, $jnspln, $ket, $tgl);
        $request    = '/Sep/aprovalSEP';
        $string     = $this->url($request, $param, $method, $tStamp);
        $hasil = array();
        if ($string->metaData->code != 200) {
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $response   = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = '';
            $hasil['data']      = $response;
        }
        echo json_encode($hasil);
    }

    /* CARI RUJUKAN */
    public function CariRujukanbyNomor($norujukan)
    {
        $input          = json_decode(file_get_contents('php://input'));
        //$norujukan      = "021600010823P000086"; //Nomor Rujukan
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/'.$norujukan;
        $string         = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }

        echo json_encode($hasil);
    }

    public function CariRujukanbyNoKa($noka)
    {
        $input          = json_decode(file_get_contents('php://input'));
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/Peserta/'.$noka;
        $string         = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }

        echo json_encode($hasil);
    }

    public function CariRujukanbyNoKaMulti($noka)
    {
        $input          = json_decode(file_get_contents('php://input'));
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/List/Peserta/'.$noka;
        $string         = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }

        echo json_encode($hasil);
    }
    
    /*  PEMBUATAN RUJUKAN */
    public function InsertRujukan($sep, $tgl, $tglkontrol, $rs, $jnsPelayanan, $catatan, $icd, $tipeRujukan, $unit, $user)
    {

        $catatan        = "catatan rujukan";
        $jnsPelayanan   = 1 ; // jenis pelayanan -> 1.R.Inap 2.R.Jalan
        $tiperujukan    = 0 ; // tipe rujukan -> 0.penuh, 1.Partial 2. balik PRB

        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = $this->jsonInsertRujukan($sep, $tgl, $tglkontrol, $rs, $jnsPelayanan, $catatan, $icd, $tipeRujukan, $unit, $user);
        $request    = '/Rujukan/2.0/insert';
        $string     = $this->url($request, $param, $method, $tStamp);
        $hasil = array();
        if ($string->metaData->code != 200) {
            //$hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        echo json_encode($hasil);
    }

    public function UpdateRujukan($norujukan, $tgl, $tglkontrol, $rs, $jns_pelayanan, $catatan, $icd, $tiperujukan, $unit, $user)
    {

        $catatan        = "catatan rujukan";
        $jns_pelayanan  = 1 ; // jenis pelayanan -> 1.R.Inap 2.R.Jalan
        $tiperujukan    = 0 ; // tipe rujukan -> 0.penuh, 1.Partial 2.rujuk balik

        $tStamp     = $this->tStamp();
        $method     = 'PUT';
        $param      = $this->jsonupdateRujukan($norujukan, $tgl, $tglkontrol, $rs, $jns_pelayanan, $catatan, $icd, $tiperujukan, $unit, $user);
        $request    = '/Rujukan/2.0/Update';
        $string     = $this->url($request, $param, $method, $tStamp);
        $hasil = array();
        if ($string->metaData->code != 200) {
            //$hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        echo json_encode($hasil);
    }

    public function DeleteRujukan($idrujukan, $user)
    {
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'DELETE';
        $param      = $this->jsonDeleteRujukan($idrujukan, $user);
        $request    = '/Rujukan/delete';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        echo json_encode($hasil);
    }

    public function InsertRujukanKhusus($rujukan, $icd1, $icd2, $user)
    {
        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = $this->jsonInsertRujukanKhusus($rujukan, $icd1, $icd2, $user);
        $request    = '/Rujukan/Khusus/insert';
        $string     = $this->url($request, $param, $method, $tStamp);
        $hasil = array();
        if ($string->metaData->code != 200) {
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $response   = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = '';
            $hasil['data']      = $response;
        }
        echo json_encode($hasil);
    }

    public function DeleteRujukanKhusus($rujukan, $id, $user)
    {
        $tStamp     = $this->tStamp();
        $method     = 'POST';
        $param      = $this->jsonDeleteRujukanKhusus($rujukan, $id, $user);
        $request    = '/Rujukan/Khusus/delete';
        $string     = $this->url($request, $param, $method, $tStamp);
        
        if ($string->metaData->code != 200) {
            //$hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        echo json_encode($hasil);
    }

    public function ListRujukanKhusus()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $request    = '/Rujukan/Khusus/List/Bulan/'.date("m").'/Tahun/'. date("Y");
        $string     = $this->url($request, $param, $method, $tStamp);

        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        $response = $string->response;
        $hasil['data'] = $this->Decrypt($response, $tStamp);
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function ListRujukanSpesialistik()
    {
        $input          = json_decode(file_get_contents('php://input'));
        $PPKRujukan     = "1308R001"; //kode faskes, 8 digit 1311R001 DARMAYU PONOROGO
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/ListSpesialistik/PPKRujukan/'.$PPKRujukan.'/TglRujukan/'. date("Y-m-d");
        $string         = $this->url($request, $param, $method, $tStamp);
        
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }

        $response   = $string->response;
        $hasil['data']      = $this->Decrypt($response, $tStamp);
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function ListSaranaRujukan()
    {
        $input          = json_decode(file_get_contents('php://input'));
        $PPKRujukan     = "1308R001"; //kode faskes, 8 digit 1311R001
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/ListSarana/PPKRujukan/'.$PPKRujukan;
        $string         = $this->url($request, $param, $method, $tStamp);

        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        echo json_encode($hasil);
    }

    public function ListRujukanKeluarRS($tglMulai)
    {
        $input          = json_decode(file_get_contents('php://input'));
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/Keluar/List/tglMulai/'.$tglMulai.'/tglAkhir/'.date("Y-m-d");

        $string         = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }
        echo json_encode($hasil);
    }

    public function ListRujukanKeluarRSbyNomorRujukan($norujukan)
    {
        $input          = json_decode(file_get_contents('php://input'));
        //$norujukan      = "021600010823P000086"; //Nomor Rujukan
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/Keluar/'.$norujukan;
        $string         = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }

        echo json_encode($hasil);
    }

    public function ListRujukanJumlahSEP($jnsrujukan, $norujukan)
    {
        $input          = json_decode(file_get_contents('php://input'));
        //$norujukan      = "021600010823P000086"; //Nomor Rujukan
        $tStamp         = $this->tStamp();
        $method         = 'GET';
        $param          = '';
        $request        = '/Rujukan/JumlahSEP/'.$jnsrujukan.'/'.$norujukan;
        $string         = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        } else {
            $hasil              = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['code']      = $string->metaData->code;
        }

        echo json_encode($hasil);
    }

    /*  END RUJUKAN */
    /*cetak*/
    public function CetakSEPIRJA()
    {
        $input = json_decode(file_get_contents('php://input'));
        $SEP   = $_POST['sep'];
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $request = '/SEP/' . $SEP;
        $string = $this->url($request, $param, $method, $tStamp);
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);
        $nama = $hasil['peserta']['nama'];
        $peserta = $hasil['peserta']['jnsPeserta'];
        $tglsep = $hasil['tglSep'];
        if ($hasil['peserta']['kelamin'] == 'P') {
            $jk = 'WANITA';
        } else {
            $jk = 'PRIA';
        }
        $kelasRawat = '';
        if ($hasil['jnsPelayanan'] == 'Rawat Inap') {
            $kelasRawat = $hasil['hakKelas'];
        }

        $html = "<html>
        <body>
        <table style='text-align: center;' width=100%>
        <tr>
        <td>
        <img src='./include/logo.jpg' width=30 height=30>
        </td>
        <td>
        <div style='font-size:16px;'><b>SURAT ELEGIBILITAS PESERTA</b></div>
        <div style='font-size:13px;'>RSUD DR. SOEDONO MADIUN</div>
        </td>
        <td>                        
        <img src='./include/bpjs.jpeg' width=auto height=30>
        </td>
        </tr>           
        </table>

        <table style='font-size:12px;'>
        <tr>
        <td width='30mm'>
        No. Sep
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        <div style='font-size:14px;'><b>" . $SEP . "</b></div>
        </td>

        <td width='25mm'>
        No. Kartu
        </td>
        <td>
        : 
        </td>
        <td>
        <div style='font-size:14px;'><b>" . $hasil['peserta']['noKartu'] . "</b></div>
        </td>
        <tr>

        <tr>
        <td width='30mm'>
        Tgl. SEP
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        " . $tglsep . "
        </td>

        <td width='25mm'>
        No. Medrec
        </td>
        <td>
        : 
        </td>
        <td>
        <b>'" . $hasil['peserta']['noMr'] . "'</b>
        </td>
        <tr>

        <tr>
        <td width='30mm'>
        Peserta
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        " . $peserta . "
        </td>

        <td width='25mm'>
        Nama Peserta
        </td>
        <td>
        : 
        </td>
        <td>
        " . $nama . "
        </td>
        <tr>

        <tr>
        <td width='30mm'>
        COB
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        - 
        </td>

        <td width='25mm'>
        Tgl. Lahir
        </td>
        <td>
        : 
        </td>
        <td>
        " . $hasil['peserta']['tglLahir'] . "
        </td>
        <tr>

        <tr>
        <td width='30mm'>
        Jns. Rawat
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        " . $hasil['jnsPelayanan'] . "
        </td>

        <td width='25mm'>
        Jns. Kelamin
        </td>
        <td>
        : 
        </td>
        <td>
        " . $jk . "
        </td>
        <tr>

        <tr>
        <td width='30mm'>
        Kls. Rawat
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        " . $kelasRawat . "
        </td>

        <td width='25mm'>
        Poli Tujuan
        </td>
        <td>
        : 
        </td>
        <td>
        " . $hasil['poli'] . "
        </td>
        <tr>


        <tr>
        <td width='30mm'>
        Asal Faskes TK 1
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>

        </td>

        <td width='25mm'>
        Diagnosa Awal
        </td>
        <td>
        : 
        </td>
        <td>
        " . $hasil['diagnosa'] . "
        </td>
        <tr>

        <tr>
        <td width='30mm'>
        Catatan
        </td>
        <td>
        : 
        </td>
        <td width='50mm'>
        <div style='font-size:14px;'><b>" . $hasil['catatan'] . "</b></div>
        </td>
        <td>Kode Panggilan</td>
        <td>:</td>
        <td>123</td>
        <tr>


        </table>

        <table style='font-size:10px;'>
        <tr>
        <td width='100mm'>
            *Saya Menyetujui BPJS Kesehatan menggunakan informasi Medis Pasien jika diperlukan<br>
            *SEP bukan sebagai bukti penjamin peserta<br>
        Cetakan Ke 1 : " . str_pad(gmdate("d-M-Y H:i:s", time() + 60 * 61 * 7), 71, " ") . "
        </td>
        <td width='40mm' style='text-align: right;font-size:12px;'>
        Pasien / Keluarga Pasien
        </td>
        </tr>
        </table>
        </body>
        </html>";
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'A4',
            'format' => [160, 80]
        ]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
        $mpdf->AddPage(
            'P', // L - landscape, P - portrait
            '',
            '',
            '',
            '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2
        ); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("cetak.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');
    }
    /*end cetak*/

    public function CariDokter()
    {
        $input = json_decode(file_get_contents('php://input'));
        $poli   = $input->poli;
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $request = '/RencanaKontrol/JadwalPraktekDokter/JnsKontrol/2/KdPoli/' . $poli . '/TglRencanaKontrol/' . date("Y-m-d");
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string == null) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'error jaringan';
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function CariSep($noka)
    {
        $input    = json_decode(file_get_contents('php://input'));
        $tgl_mulai = date('Y-m-d', strtotime(' - 2 months'));
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $request = 'monitoring/HistoriPelayanan/NoKartu/' . $noka . '/tglMulai/' . $tgl_mulai . '/tglAkhir/' . date("Y-m-d");

        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $hasil    = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            //$hasil['pesan']     = 'Berhasil';
        }
        echo json_encode($hasil);
    }

    public function CreateSpri($nokartu, $kddokter, $kdpoli, $tgl, $user)
    {
        //ttp://localhost/clone5/DartoMakanYuyu/cross_ci3/Bridging_UAT/CreateSpri/0001471029085/30878/BED/2024-05-30/tes
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $nokartu    = $nokartu;
        $kddokter   = $kddokter;
        $kdpoli     = $kdpoli;
        $tgl        = $tgl ;//date('Y-m-d');
        $user       = $user;
        $method     = 'POST';
        $param      = $this->JsonCreateSpri($nokartu, $kddokter, $kdpoli, $tgl, $user);
        $request    = 'RencanaKontrol/InsertSPRI';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function UpdateSpri($noSPRI, $kddokter, $kdpoli, $tgl, $user)
    {

        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'PUT';
        $param      = $this->JsonUpdateSpri($noSPRI, $kddokter, $kdpoli, $tgl, $user);
        $request    = 'RencanaKontrol/UpdateSPRI';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function JsonUpdateSpri($noSPRI, $kddokter, $kdpoli, $tgl, $user)
    {
        // {
        //     "request":
        //         {
        //             "noSPRI":"0301R0110421K000116",
        //             "kodeDokter":"31537",
        //             "poliKontrol":"ANA",
        //             "tglRencanaKontrol":"2021-04-13",
        //             "user":"cobdda"
        //         }
        // }

        $json = '{
            "request":
            {
                "noSPRI":"' . $noSPRI . '",
                "kodeDokter":"' . $kddokter . '",
                "poliKontrol":"' . $kdpoli . '",
                "tglRencanaKontrol":"' . $tgl . '",
                "user":"' . $user . '"
            }
        }';

        return $json;
    }

    public function JsonCreateSpri($nokartu, $kddokter, $kdpoli, $tgl, $user)
    {
        $json = ' {
            "request":
            {
                "noKartu":"' . $nokartu . '",
                "kodeDokter":"' . $kddokter . '",
                "poliKontrol":"' . $kdpoli . '",
                "tglRencanaKontrol":"' . $tgl . '",
                "user":"' . $user . '",
            }
        }';

        return $json;
    }
    public function jsonupdatetglpulangMati($nosep, $statuspulang, $nosuratmeninggal, $tglmeninngal, $tglplg, $nolpmanualKLL, $user)
    {
        //ISI 0 jika tidak ada nolpmanualKLL
        // {
        //     "request":{
        //         "t_sep":{
        //             "noSep": "{nosep}",
        //             "statusPulang":"{1:Atas Persetujuan Dokter, 3:Atas Permintaan Sendiri, 4:Meninggal, 5:Lain-lain}",
        //             "noSuratMeninggal":"{diisi jika statusPulang 4, selain itu kosong}",
        //             "tglMeninggal":"{diisi jika statusPulang 4, selain itu kosong. format yyyy-MM-dd}",
        //             "tglPulang":"{format yyyy-MM-dd}",
        //             "noLPManual":"{diisi jika SEPnya adalah KLL}",
        //             "user":"{user}"
        //         }
        //     }
        // }
        if($nolpmanualKLL=='0' || $nolpmanualKLL=='0'){
            $nolpmanualKLL='';
        }

        $json = '{
            "request":{
                "t_sep":{
                    "noSep":"' . $nosep . '",
                    "statusPulang":"' . $statuspulang . '",
                    "noSuratMeninggal":"' . $nosuratmeninggal . '",
                    "tglMeninggal":"' . $tglmeninngal . '",
                    "tglPulang":"' . $tglplg . '",
                    "noLPManual":"' . $nolpmanualKLL . '",
                    "user":"' . $user . '",
                }
            }
        }';

        return $json;
    }   
    public function jsonupdatetglpulangHidup($nosep, $statuspulang, $tglplg, $nolpmanualKLL, $user)
    {
        // {
        //     "request":{
        //         "t_sep":{
        //             "noSep": "{nosep}",
        //             "statusPulang":"{1:Atas Persetujuan Dokter, 3:Atas Permintaan Sendiri, 4:Meninggal, 5:Lain-lain}",
        //             "noSuratMeninggal":"{diisi jika statusPulang 4, selain itu kosong}",
        //             "tglMeninggal":"{diisi jika statusPulang 4, selain itu kosong. format yyyy-MM-dd}",
        //             "tglPulang":"{format yyyy-MM-dd}",
        //             "noLPManual":"{diisi jika SEPnya adalah KLL}",
        //             "user":"{user}"
        //         }
        //     }
        // }
        if($nolpmanualKLL=='0' || $nolpmanualKLL=='0'){
            $nolpmanualKLL='';
        }

        $json = '{
            "request":{
                "t_sep":{
                    "noSep":"' . $nosep . '",
                    "statusPulang":"' . $statuspulang . '",
                    "noSuratMeninggal":"",
                    "tglMeninggal":"",
                    "tglPulang":"' . $tglplg . '",
                    "noLPManual":"' . $nolpmanualKLL . '",
                    "user":"' . $user . '",
                }
            }
        }';

        // $json = '{
        //     "request":{
        //         "t_sep":{
        //             "noSep": "0216R0100724V000005",
        //             "statusPulang":"1",
        //             "noSuratMeninggal":"",
        //             "tglMeninggal":"",
        //             "tglPulang":"2024-07-12",
        //             "noLPManual":"",
        //             "user":"coba"
        //         }
        //     }
        // }';
        // echo"$json";

        return $json;
    }

    public function UpdateTglPulangHidup($nosep, $statuspulang, $tglplg, $nolpmanualKLL, $user)
    {
                //ISI 0 jika tidak ada nolpmanualKLL


        $input              = json_decode(file_get_contents('php://input'));
        $tStamp             = $this->tStamp();
        $nosep              = $nosep;
        $statuspulang       =  $statuspulang;
        $tglplg             =  $tglplg;
        $nolpmanualKLL      =  $nolpmanualKLL;
        $user               =  $user;

        // echo"$nosep<br>";
        // echo"$statuspulang<br>";
        // echo"$tglplg<br>";
        // echo"$nolpmanualKLL<br>";
        // echo"$user<br>";
        //exit();
        $method     = 'PUT';
        $param      = $this->jsonupdatetglpulangHidup($nosep, $statuspulang, $tglplg, $nolpmanualKLL, $user);
        $request    = 'SEP/2.0/updtglplg/';
        // var_dump($param);
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function UpdateTglPulangMati($nosep, $statuspulang, $nosuratmeninggal, $tglmeninngal, $tglplg, $nolpmanualKLL, $user)
    {
                //ISI 0 jika tidak ada nolpmanualKLL


        $input              = json_decode(file_get_contents('php://input'));
        $tStamp             = $this->tStamp();
        $nosep              = $nosep;
        $statuspulang       =  $statuspulang;
        $nosuratmeninggal   = $nosuratmeninggal;
        $tglmeninngal       =  $tglmeninngal;
        $tglplg             =  $tglplg;
        $nolpmanualKLL      =  $nolpmanualKLL;
        $user               =  $user;
        $tgl        = date('Y-m-d');
        $user      = $input->user;
        $method     = 'PUT';
        $param      = $this->jsonupdatetglpulangMati($nosep, $statuspulang, $nosuratmeninggal, $tglmeninngal, $tglplg, $nolpmanualKLL, $user);
        $request    = 'SEP/2.0/updtglplg';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function ref($input0 = null, $input1 = null, $input2 = null, $input3 = null){
        $inputSalah = false;
        
        if($input0 == 'Diagnosa' && $input1 != null){
            $request = 'referensi/diagnosa/'.$input1;
        }else if($input0 == 'Poli' && $input1 != null){
            $request = 'referensi/poli/'.$input1;
        }else if($input0 == 'Faskes' && $input1 != null && in_array($input2, ['1', '2'])){
            $request = 'referensi/faskes/'.$input1.'/'.$input2;
        }else if($input0 == 'DPJP' && $input1 != null && in_array($input2, [null, '1', '2'])){
            if($input3 == null){
                $input3 = date('Y-m-d');
            }
            if($input2 == null){
                $input2 = '2';
            }
            $request = 'referensi/dokter/pelayanan/'.$input2.'/tglPelayanan/'.$input3.'/Spesialis/'.$input1;
        }else if($input0 == 'Propinsi'){
            $request = 'referensi/propinsi';
        }else if($input0 == 'Kabupaten' && $input1 != null){
            $request = 'referensi/kabupaten/propinsi/'.$input1;
        }else if($input0 == 'Kecamatan' && $input1 != null){
            $request = 'referensi/kecamatan/kabupaten/'.$input1;
        }else if($input0 == 'DiagnosaPRB'){
            $request = 'referensi/diagnosaprb';
        }else if($input0 == 'Tindakan' && $input1 != null){
            $request = 'referensi/procedure/'.$input1;
        }else if($input0 == 'KelasRawat'){
            $request = 'referensi/kelasrawat';
        }else if($input0 == 'Dokter' && $input1 != null){
            $request = 'referensi/dokter/'.str_replace(' ', '%20', $input1);
        }else if($input0 == 'Spesialistik'){
            $request = 'referensi/spesialistik';
        }else if($input0 == 'RuangRawat'){
            $request = 'referensi/ruangrawat';
        }else if($input0 == 'CaraKeluar'){
            $request = 'referensi/carakeluar';
        }else if($input0 == 'PascaPulang'){
            $request = 'referensi/pascapulang';
        }else{
            $inputSalah = true;
        }
        
        if($inputSalah){
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'Input tidak sesuai';
            echo json_encode($hasil);
            return;
        }
        
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function peserta($input0 = null, $input1 = null, $input2 = null) {
        $inputSalah = false;
        
        if(strtolower($input0) == 'nik' && $input1 != null){
            if(strlen($input1) == 16){
                if($input2 == null){
                    $input2 = date('Y-m-d');
                }
                
                $request = 'Peserta/nik/'.$input1.'/tglSEP/'.$input2;
            }else{
                $inputSalah = true;
            }
        }else if(strtolower($input0) == 'noka' && $input1 != null){
            if(strlen($input1) == 13){
                if($input2 == null){
                    $input2 = date('Y-m-d');
                }
                
                $request = 'Peserta/nokartu/'.$input1.'/tglSEP/'.$input2;
            }else{
                $inputSalah = true;
            }
        }else{
            $inputSalah = true;
        }
        
        if($inputSalah){
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'Input tidak sesuai';
            echo json_encode($hasil);
            return;
        }
        
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function dataKunjungan($input0 = null, $input1 = null) {
        $inputSalah = false;
        
        if(in_array($input0, ['1', '2'])){
            if($input1 == null){
                $input1 = date('Y-m-d');
            }

            $request = 'Monitoring/Kunjungan/Tanggal/'.$input1.'/JnsPelayanan/'.$input0;
        }else{
            $inputSalah = true;
        }
        
        if($inputSalah){
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'Input tidak sesuai';
            echo json_encode($hasil);
            return;
        }
        
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function dataKlaim($input0 = null, $input1 = null, $input2 = null) {
        $inputSalah = false;
        
        if(in_array($input0, ['1', '2']) && in_array($input1, ['1', '2', '3'])){
            if($input2 == null){
                $input2 = date('Y-m-d');
            }

            $request = 'Monitoring/Klaim/Tanggal/'.$input2.'/JnsPelayanan/'.$input0.'/Status/'.$input1;
        }else{
            $inputSalah = true;
        }
        
        if($inputSalah){
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'Input tidak sesuai';
            echo json_encode($hasil);
            return;
        }
        
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function historyPeserta($input0 = null, $input1 = null, $input2 = null) {
        $inputSalah = false;
        
        if($input0 != null){
            if($input1 == null){
                $input1 = date('Y-m-d');
            }
            
            if($input2 == null){
                $input2 = date('Y-m-d');
            }

            $request = 'monitoring/HistoriPelayanan/NoKartu/'.$input0.'/tglMulai/'.$input1.'/tglAkhir/'.$input2;
        }else{
            $inputSalah = true;
        }
        
        if($inputSalah){
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'Input tidak sesuai';
            echo json_encode($hasil);
            return;
        }
        
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    
    public function dataKlaimJR($input0 = null, $input1 = null, $input2 = null) {
        $inputSalah = false;
        
        if($input0 != null){
            if($input1 == null){
                $input1 = date('Y-m-d');
            }
            
            if($input2 == null){
                $input2 = date('Y-m-d');
            }

            $request = 'monitoring/JasaRaharja/JnsPelayanan/'.$input0.'/tglMulai/'.$input1.'/tglAkhir/'.$input2;
        }else{
            $inputSalah = true;
        }
        
        if($inputSalah){
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'Input tidak sesuai';
            echo json_encode($hasil);
            return;
        }
        
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function Getdokter($datawal,$limit)
    {
        $input    = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        // Parameter 1 : Row data awal yang akan ditampilkan
        // Parameter 2 : Limit jumlah data yang akan ditampilkan
        //$request = 'dokter/' . $param1 . '/' . $param2');
        $request = 'dokter/'.$datawal.'/'.$limit;

        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $hasil    = $this->Decrypt($string->response, $tStamp);;
            $hasil['status']    = 'sukses';
            //$hasil['pesan']     = 'Berhasil';
        }
        echo json_encode($hasil);
    }

    public function CarinomorsuratKontrol($nosuratkontrol)
    {
        //Parameter: Nomor Surat Kontrol Peserta
        //http://localhost/clone5/DartoMakanYuyu/cross_ci3/Bridging_UAT/CarinomorsuratKontrol/1308R0010524K010803
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $request    = 'RencanaKontrol/noSuratKontrol/' . $nosuratkontrol;
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function Carisuratkontrolberdasarkankartu($bulan,$tahun,$noka,$filter)
    {
        //Parameter 1: Bulan. Contoh: Januari => 01
        //Parameter 2: Tahun
        //Parameter 3: Nomor Kartu
        //Parameter 4: Format filter --> 1: tanggal entri, 2: tanggal rencana kontrol
        //http://localhost/clone5/DartoMakanYuyu/cross_ci3/Bridging_UAT/CarinomorsuratKontrol/1308R0010524K010803
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'GET';
        $param      = '';
        $request    = 'RencanaKontrol/ListRencanaKontrol/Bulan/'.$bulan.'/Tahun/'.$tahun.'/Nokartu/'.$noka.'/filter/'.$filter;
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function ambiljson($data,$parameter)
    /*tgl format 2024-01-01*/
    {
            switch ($data) {
                case 'HapusSEPInternal':
                $value=explode('|', $parameter);
                $sep  =$value[0];
                $surat=$value[1];
                $tgl  =$value[2];
                $poli =$value[3];
                $json = '   {
                   "request": {
                      "t_sep": {
                         "noSep"  : "'.$value[0].'",
                         "noSurat": "'.$value[1].'",
                         "tglRujukanInternal": "'.$value[2].'",
                         "kdPoliTuj": "'.$value[3].'",
                         "user"   : "Coba Ws"
                     }
                 }
             } 
             ';

                return $json;
            }

    }


    public function tampilhasil($request,$method,$param)
    {
        $tStamp     = $this->tStamp(); 
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    

    public function bridging_tes($data,$method,$parameter=null, $parameter2=null)

    {
        if ($method=='GET') {
            $param="";
        }
        switch ($data) {
            /*GET*/
            case 'SEPInternal':
            $request  ='SEP/Internal/'.$parameter;
            $this->tampilhasil($request,$method,$param);
            break;
            case 'ListSpesialistik':
            $request  = '/Rujukan/ListSpesialistik/PPKRujukan/'.$parameter.'/TglRujukan/'. date("Y-m-d");
            $this->tampilhasil($request,$method,$param);
            break;
            case 'CariSEP':
            $request  = 'SEP/'.$parameter;
            $this->tampilhasil($request,$method,$param);
            break;
            case 'GetFingerPrint':
            $request  = 'SEP/FingerPrint/Peserta/'.$parameter.'/TglPelayanan/'.$parameter2;
            $this->tampilhasil($request,$method,$param);
            break;
            case 'GetListFingerPrint':
            $request  = 'SEP/FingerPrint/List/Peserta/TglPelayanan/'.$parameter;
            $this->tampilhasil($request,$method,$param);
            break;
            /*DELETE*/
            case 'HapusSEPInternal':
            $request   ='/SEP/Internal/delete';
            $param     =$this->ambiljson($data,$parameter);
            $this->tampilhasil($request,$method,$param);
            break;

        }
    }    

    public function GetSEP_bysep($SEP)
    {
        $input    = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        // Parameter 1 : Row data awal yang akan ditampilkan
        // Parameter 2 : Limit jumlah data yang akan ditampilkan
        //$request = 'dokter/' . $param1 . '/' . $param2');
        $request = 'SEP/'.$SEP;

        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $hasil    = $this->Decrypt($string->response, $tStamp);;
            $hasil['status']    = 'sukses';
            //$hasil['pesan']     = 'Berhasil';
        }
        echo json_encode($hasil);
    }

    public function Listupdatepulangs($bulan, $tahun)
    {
        $input              = json_decode(file_get_contents('php://input'));
        $tStamp             = $this->tStamp();
        $bulan       =  $bulan;
        $tahun       =  $tahun;
        $method     = 'GET';
        $param      = '';
        // $request    = 'Sep/updtglplg/list/bulan/{Parameter 1}/tahun/{Parameter 2}/{Parameter 3}';
        $request        = 'Sep/updtglplg/list/bulan/'.$bulan.'/tahun/'.$tahun.'';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil['data']   = $this->Decrypt($response, $tStamp);
        $hasil['pesan']  = 'Berhasil';
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }

    public function Listupdatepulang($bulan, $tahun,$filter)
    {
        $input    = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        //  Fungsi : Get List Data Update Tanggal Pulang

        // Method : GET

        // Format : Json

        // Content-Type: Application/x-www-form-urlencoded

        // Parameter 1: Bulan (1-12)

        // Parameter 2: Tahun

        // Parameter 3: Filter (Apabila dikosongkan akan menampilkan semua data pada bulan dan tahun pilihan)
        // {BASE URL}/{Service Name}/Sep/updtglplg/list/bulan/{Parameter 1}/tahun/{Parameter 2}/{Parameter 3}

        $request        = 'Sep/updtglplg/list/bulan/'.$bulan.'/tahun/'.$tahun.'/'.$filter.'';

        // $request        = 'Sep/updtglplg/list/bulan/7/tahun/2024/0216R0100724V000005';
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        } else {
            $hasil    = $this->Decrypt($string->response, $tStamp);;
            $hasil['status']    = 'sukses';
            //$hasil['pesan']     = 'Berhasil';
        }
        echo json_encode($hasil);
    }

    public function Icare(){
        $input    = json_decode(file_get_contents('php://input'));
        $hasil    = array();

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

        if(strlen($dataPasien->no_kartu) == 13){
            $noka = $dataPasien->no_kartu;
        }else if(strlen($dataPasien->nik) == 16){
            $noka = $dataPasien->nik;
        }else{
            $hasil['data']   = '';
            $hasil['pesan']  = 'Nomor kartu dan NIK tidak sesuai';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }

        $query = "
            SELECT * FROM pegawai
            WHERE id_pegawai = '".$input->user."' AND kd_dokter_bpjs <> '0'
        ";
        $hasilQuery = $this->db->query($query);
        if($hasilQuery->getNumRows() == 0){
            $hasil['data']   = '';
            $hasil['pesan']  = 'Pegawai bukanlah dokter';
            $hasil['status'] = 'gagal';
            echo json_encode($hasil);
            return;
        }else{
            $dokter = $hasilQuery->getRow()->kd_dokter_bpjs;
        }

        $tStamp = $this->tStamp();
        $method = 'POST';
        $param  = '{
            "param": "'.$noka.'",
            "kodedokter": '.$dokter.'
        }';

        $data = "31744";
        $secretKey = "5kQ5FEF0A4";
        $user_key = "1fef913f6110d8d3ffecb0dd17dc9c51";
        // $data = "15081";
        // $secretKey = "3cDAEE1ED1";
        // $user_key = "adc0a4d06fcb9419816519d243703bcb";
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $headers = array("X-Cons-ID: " . $data, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $user_key, "Content-Type: application/json\r\n");

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
        $string = json_decode(file_get_contents('https://apijkn-dev.bpjs-kesehatan.go.id/ihs_dev/api/rs/validate', true, $context));
        // $string = json_decode(file_get_contents('https://apijkn.bpjs-kesehatan.go.id/wsihs/api/rs/validate' . $request, true, $context));
        
        if ($string->metaData->code != 200) {
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
            $hasil['data']      = $this->Decrypt($string->response, $tStamp);
        } else {
            $hasil['data']      = $this->Decrypt($string->response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = 'Berhasil';
        }
        echo json_encode($hasil);
    }


}
