<?php

//defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;

use CodeIgniter\Controller;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Bridging extends Api
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
        $string = json_decode(file_get_contents('https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/' . $request, true, $context));


        return $string;
    }

    public function cekNik()
    {
        $input = json_decode(file_get_contents('php://input'));
        $nik   = $input->nik;
        $tgl   = '2020-01-12';
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param = '';
        $request = 'Peserta/nik/'.$nik.'/tglSEP/' . $tgl;
        $string = $this->url($request, $param, $method, $tStamp);
        if ($string == null) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = 'data nik kosong';
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);
        $hasil['data']   = $hasil['peserta']['noKartu'];
        $hasil['status'] = 'sukses';
        echo json_encode($hasil);
    }
    public function CariRujukanIrja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $noka   = $input->noka;
        $faskes = $input->faskes;
        if ($faskes==2 || $faskes==3) {
            $request = '/Rujukan/RS/List/Peserta/' . $noka;
        } else {
           $request = '/Rujukan/List/Peserta/' . $noka;
       }

       $tStamp = $this->tStamp();
       $method = 'GET';
       $param  = '';
       $string = $this->url($request, $param, $method, $tStamp);
       if ($string->metaData->code == 201) {
        $hasil = array();
        $hasil['status'] = 'gagal';
        $hasil['pesan'] = 'Rujukan Tidak Ada';
        echo json_encode($hasil);
        return; 
    }
    $response = $string->response;
    $hasil = $this->Decrypt($response, $tStamp);
    $hasil['status'] = 'sukses';
    echo json_encode($hasil);
}

public function CariDokter()
{
    $input = json_decode(file_get_contents('php://input'));
    $poli   = $input->poli;
    $tStamp = $this->tStamp();
    $method = 'GET';
    $param  = '';
    $request = '/RencanaKontrol/JadwalPraktekDokter/JnsKontrol/2/KdPoli/' . $poli . '/TglRencanaKontrol/' . date("Y-m-d");
    $string = $this->url($request, $param, $method, $tStamp);
    if ($string->metaData->code == 201) {
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
public function caripolirujukan()
{
    $input = json_decode(file_get_contents('php://input'));
    $poli   = $input->poli;
    $tStamp = $this->tStamp();
    $method = 'GET';
    $param  = '';
    $request = '/referensi/poli/'.$poli;
    $string = $this->url($request, $param, $method, $tStamp);
    if ($string->metaData->code == 201) {
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
public function carirsrujukan()
{
    $input = json_decode(file_get_contents('php://input'));
    $rs   = $input->rs;
    $klas = $input->klas;     
    $tStamp = $this->tStamp();
    $method = 'GET';
    $param  = '';
    $request = '/referensi/faskes/'.$rs.'/'.$klas;
    $string = $this->url($request, $param, $method, $tStamp);
    if ($string->metaData->code == 201) {
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

public function CariSep()
{
    $input    = json_decode(file_get_contents('php://input'));
    $tgl_mulai = date('Y-m-d', strtotime(' - 2 months'));
    $tStamp = $this->tStamp();
    $method = 'GET';
    $param  = '';
    $request = '/monitoring/HistoriPelayanan/NoKartu/' . $input->noka . '/tglMulai/' . $tgl_mulai . '/tglAkhir/' . date("Y-m-d");

    $string = $this->url($request, $param, $method, $tStamp);
    if ($string->metaData->code != 200) {
        $hasil = array();
        $hasil['status']    = 'sukses';
        $hasil['pesan']     = $string->metaData->message;
        $hasil['code']      = 201;
    } else {
        $hasil    = $this->Decrypt($string->response, $tStamp);;
        $hasil['status']    = 'sukses';
        $hasil['code']      = 200;
            //$hasil['pesan']     = 'Berhasil';
    }
    echo json_encode($hasil);
}
public function HistoriSepIrja()
{
    $input    = json_decode(file_get_contents('php://input'));
    $sep   = $this->db->query("SELECT no_sjp from ")->row();
}
public function buatSEPIGD()
{
    $input = json_decode(file_get_contents('php://input'));
    $url = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'url_2'")->row()->nilai;
    $ppk = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'ppk_2'")->row()->nilai;
    $tStamp = $this->tStamp();
    $headers = $this->getSignatureVedikaBaru($tStamp);

    $tglSEP     = date("Y-m-d");
    $tglKejadian = $input->tglKejadian;

    $param = '{
        "request":{
           "t_sep":{
              "noKartu":"' . $input->noKartu . '",
              "tglSep":"' . $tglSEP . '",
              "ppkPelayanan":"' . $ppk . '",
              "jnsPelayanan":"2",
              "klsRawat":{
                 "klsRawatHak":"",
                 "klsRawatNaik":"",
                 "pembiayaan":"",
                 "penanggungJawab":""
                 },
                 "noMR":"' . $input->noMR . '",
                 "rujukan":{
                     "asalRujukan":"2",
                     "tglRujukan":"",
                     "noRujukan":"",
                     "ppkRujukan":""
                     },
                     "catatan":"' . $input->catatan . '",
                     "diagAwal":"' . $input->diagAwal . '",
                     "poli":{
                         "tujuan":"IGD",
                         "eksekutif":"0"
                         },
                         "cob":{
                             "cob":"' . $input->cob . '"
                             },
                             "katarak":{
                                 "katarak":"' . $input->katarak . '"
                                 },
                                 "jaminan":{
                                     "lakaLantas":"' . $input->lakaLantas . '",
                                     "penjamin":{
                                        "tglKejadian":"' . $tglKejadian . '",
                                        "keterangan":"",
                                        "suplesi":{
                                           "suplesi":"' . $input->suplesi . '",
                                           "noSepSuplesi":"' . $input->no_suplesi . '",
                                           "lokasiLaka":{
                                              "kdPropinsi":"' . $input->kdPropinsi . '",
                                              "kdKabupaten":"' . $input->kdKabupaten . '",
                                              "kdKecamatan":"' . $input->kdKecamatan . '"
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
                                     "dpjpLayan":"' . $input->kodeDPJP . '",
                                     "noTelp":"' . $input->noTelp . '",
                                     "user":"' . $input->user . '"
                                 }
                             }
                         }';

                         $opts = array(
                            'http' => array(
                                'method' => "POST",
                                'header' => $headers,
                                'content' => $param
                            )
                        );

                         $context = stream_context_create($opts);

                         $hasil_raw = file_get_contents($url . 'SEP/2.0/insert', false, $context);

                         $hasil = json_decode($hasil_raw, true);

                         $output = array();
                         $output['status'] = 'gagal';
                         $output['metaData'] = $hasil['metaData'];
                         if ($hasil['metaData']['code'] <> '200') {
                            $output['pesan'] = $hasil['metaData']['message'];
                            echo json_encode($output);
                            return;
                        }

                        $response = $this->Decrypt($hasil['response'], $tStamp);
                        $output['status'] = 'sukses';
                        $output['pesan'] = '';
                        $output['data'] =  $response;
                        echo json_encode($output);
                    }
                    public function cariUnit()
                    {
                        $input    = json_decode(file_get_contents('php://input'));
                        $output['data'] = $this->db->query("SELECT map_bpjs from unit where id_unit='$input->id' ")->getRow()->map_bpjs;
                        $output['status'] = 'sukses';
                        $output['pesan'] = '';
                        echo json_encode($output);
                    }
                    public function CariDetailPesertaBPJS()
                    {
                        $input    = json_decode(file_get_contents('php://input')); 
                        $noka     = $input->noka;
                        $tgl_mulai = date('Y-m-d', strtotime(' - 2 months'));
                        $tStamp = $this->tStamp();
                        $method = 'GET';
                        $param  = '';
                        $request = '/Peserta/nokartu/' . $noka . '/tglSEP/' . date("Y-m-d");
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
/*    public function getSignatureVedikaBaru($tStamp)
    {

        $data = "22072";
        $secretKey = "8xUBFB49D3";
        $user_key = "a81c8624dfabbc6047d9aff72646531b";
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        return array("X-Cons-ID: " . $data, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $user_key, "Content-Type: application/x-www-form-urlencoded\r\n");
    }*/
    public function getSignatureVedikaBaru($tStamp)
    {

        $data = "21780";
        $secretKey = "1hDF0B4057";
        $user_key = "6861b75624e5e2b742c3d270ec096b98";
        // $data = "15081";
        // $secretKey = "3cDAEE1ED1";
        // $user_key = "adc0a4d06fcb9419816519d243703bcb";
        $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        return array("X-Cons-ID: " . $data, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $user_key, "Content-Type: application/x-www-form-urlencoded\r\n");
    }
    public function Decrypt($response, $tStamp)
    {
        $data = "21780";
        $secretKey = "1hDF0B4057";
        $user_key = "6861b75624e5e2b742c3d270ec096b98";
        // $data = "15081";
        // $secretKey = "3cDAEE1ED1";
        // $user_key = "adc0a4d06fcb9419816519d243703bcb";
        $key = $data . $secretKey . $tStamp;
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($response), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        $hasil = json_decode(\LZCompressor\LZString::decompressFromEncodedURIComponent($output), true);
        return $hasil;
    }
  /*  public function Decrypt($response, $tStamp)
    {
        $data = "22072";
        $secretKey = "8xUBFB49D3";
        $user_key = "a81c8624dfabbc6047d9aff72646531b";
        $key = $data . $secretKey . $tStamp;
        $encrypt_method = 'AES-256-CBC';
        $key_hash = hex2bin(hash('sha256', $key));
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($response), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        $hasil = json_decode(\LZCompressor\LZString::decompressFromEncodedURIComponent($output), true);
        return $hasil;
    }*/


    /*request bridging bpjs*/
    public function JsonDeleteRencanaKontrol($id,$user)
    {
        $json = ' {
            "request": {
                "t_suratkontrol":{
                    "noSuratKontrol": "' . $id . '",
                    "user": "'.$user.'"
                }
            }
        }
        ';
        return $json;
    }
    public function DeleteRencanaKontrol()
    {

        $input      = json_decode(file_get_contents('php://input'));
        $skdp       = $input->skdp;
        $user       = $input->user;
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
    public function JsonCreateRencanaKontrol($skdp, $dokter, $unit, $tgl)
    {
        $json = '      {
            "request": {
                "noSEP":"' . $skdp . '",
                "kodeDokter":"' . $dokter . '",
                "poliKontrol":"' . $unit . '",
                "tglRencanaKontrol":"' . $tgl . '",
                "user":"coba ws"
            }
        }

        ';
        return $json;
    }

    /*end manipulasi bedging bpjs*/

    public function CreateRencanaKontrol()
    {

        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $sepakhir   = $input->skdp;
        $dokter     = $input->dokter;
        $unitrs     = $input->unitrs;
        $unitbpjs   = $input->unitbpjs;
        $noka       = $input->noka;
        $no_rujukan = $input->no_rujukan;
        $tgl        = date('Y-m-d');
        $cekskdp    = $this->db->query("select * from rencana_kontrol where noka='".$noka."' and aktif is true and no_rujukan='".$no_rujukan."' and id_unit='".$unitrs."' order by tgl_kunjungan limit 1")->getRow();

        if ($cekskdp>'') {

            if ($cekskdp->tgl_kunjungan==$tgl) {

                $hasil['data']   = $cekskdp->skdp;
                $hasil['pesan']  = 'Berhasil';
                $hasil['status'] = 'sukses';
                echo json_encode($hasil);

            }else{

               $skdp       = $cekskdp->skdp;
               $method     = 'PUT';
               $param      = $this->JsonUpdateRencanaKontrol($skdp, $sepakhir, $dokter, $unitbpjs, $tgl);
               $request    = '/RencanaKontrol/Update';
               $string     = $this->url($request, $param, $method, $tStamp);
               $response = $string->response;
               $hasil['data']   = $this->Decrypt($response, $tStamp);
               $hasil['pesan']  = 'Berhasil';
               $hasil['status'] = 'sukses';
               echo json_encode($hasil);

           }
       } else {

         $method     = 'POST';
         $param      = $this->JsonCreateRencanaKontrol($sepakhir, $dokter, $unitbpjs, $tgl);
         $request    = '/RencanaKontrol/insert';
         $string     = $this->url($request, $param, $method, $tStamp);

         if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }else{
            $response = $string->response;
            $hasil['data']   = $this->Decrypt($response, $tStamp);
            $hasil['pesan']  = 'Berhasil';
            $hasil['status'] = 'sukses';
            echo json_encode($hasil);
        }
    }

}
public function CreateRencanaKontrolbyRM()
{

    $input      = json_decode(file_get_contents('php://input'));
    $tStamp     = $this->tStamp();
    $id_transaksi=$input->id_transaksi;
    $sepasal    = $this->db->query("select no_sjp from penjamin_transaksi where id_transaksi='".$id_transaksi."' ")->getRow()->no_sjp;
    if (empty($sepasal)) {
      $hasil['pesan']  = 'SEP Kosong';
      $hasil['status'] = 'gagal';
      $this->db->query(" INSERT INTO rencana_kontrol(id_transaksi,
        id_kunjungan,
        tgl_kunjungan,
        id_unit
    ) VALUES('$input->id_transaksi', '$input->id_kunjungan', '$input->tgl', '$input->unit')  ");
      echo json_encode($hasil);
  } else {
    $methodsep   = 'GET';
    $paramsep    = '';
    $requestsep  = '/SEP/'. $sepasal;
    $stringsep   = $this->url($requestsep, $paramsep, $methodsep, $tStamp);        
    $responsesep = $stringsep->response;
    $hasilsep    = $this->Decrypt($responsesep, $tStamp); 
    $dokter      = $hasilsep['dpjp']['kdDPJP'];
    $norujukan   = $hasilsep['noRujukan'];
    $tgl         = $input->tgl;
    //$dokter     = $this->db->query("select kd_dokter_bpjs from pegawai where id_pegawai='".$input->dpjp."' ")->getRow()->kd_dokter_bpjs;
    $unit       = $this->db->query("select map_bpjs from unit where id_unit='".$input->unit."' ")->getRow()->map_bpjs;
    $method     = 'POST';
    $param      = $this->JsonCreateRencanaKontrol($sepasal, $dokter, $unit, $tgl);
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
    $data            = $this->Decrypt($response, $tStamp);
    $skdp            = $data['noSuratKontrol'];
    $noka            = $data['noKartu'];
    $hasil['data']   = $data;
    $hasil['pesan']  = 'Berhasil';
    $hasil['status'] = 'sukses';
    $this->db->query(" INSERT INTO rencana_kontrol(id_transaksi,
        id_kunjungan,
        tgl_kunjungan,
        id_unit,
        skdp,
        noka,
        sep_awal,
        no_rujukan
    ) VALUES('$input->id_transaksi', '$input->id_kunjungan','$input->tgl','$input->unit','".$skdp."','".$noka."','".$sepasal."','".$norujukan."')  ");
    echo json_encode($hasil);
}
}
public function PostSEP($noka, $idokter, $diagnosa, $polirs, $noRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $createRencanaKontrol, $kd_perujuk, $kelas, $rs)
{


    $tStamp     = $this->tStamp();
    $method     = 'POST';
    $param      = $this->jsonCreateSep($noka, $idokter, $diagnosa, $polirs, $noRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $kd_perujuk, $kelas, $rs, $createRencanaKontrol);
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
public function CreateSepIrja()
{
    $tStamp     = $this->tStamp();
    $input         = json_decode(file_get_contents('php://input'));
    $method     = 'POST';
    $cek_kunjungan = $this->db->query("SELECT no_sjp FROM penjamin_transaksi WHERE no_rujukan = '$input->rujukan'")->getNumRows();
    
    $postmrs    =$input->postmrs;
    if ($postmrs==0) {
        if ($input->polirs == $input->polibpjs && $input->polibpjs != 'HDL' && $input->skdp >'' ) {
            $createRencanaKontrol = $input->skdp;
            $TujuanKunjungan    = $input->tujuankunj;
            $prosedurpelayanan  = $input->prosedurkunj;
            $Penunjang          = $input->penunjangkunj;
            $assesmenpelayanan  = $input->assesmenkunj;
            $rujukan            = $input->rujukan;
            $kd_perujuk         =  substr($input->rujukan, 0, 8);
            $kelas              = 3;
            if (substr($kd_perujuk, 4, 1) == 'R') {
                $rs = '2';
            } else {
                $rs = '1';
            }

        } elseif ($input->polibpjs == 'HDL') {
            $unit = 'INT';
            $createRencanaKontrol = $input->skdp;
            $TujuanKunjungan    = 1;
            $prosedurpelayanan  = 1;
            $Penunjang          = 12;
            $assesmenpelayanan  = '1';
            $rujukan            = $input->rujukan;
            $kd_perujuk         =  substr($input->rujukan, 0, 8);
            $kelas              = 3;
            if (substr($kd_perujuk, 4, 1) == 'R') {
                $rs = '2';
            } else {
                $rs = '1';
            }
        } else {
            $TujuanKunjungan    = $input->tujuankunj;
            $prosedurpelayanan  = $input->prosedurkunj;
            $Penunjang          = $input->penunjangkunj;
            $assesmenpelayanan  = $input->assesmenkunj;
            $rujukan            = $input->rujukan;
            $kd_perujuk         =  substr($input->rujukan, 0, 8);
            $kelas              = 3;
            $createRencanaKontrol = '';
            if (substr($kd_perujuk, 4, 1) == 'R') {
                $rs = '2';
            } else {
                $rs = '1';
            }

        }
    } else {
        $TujuanKunjungan    = $input->tujuankunj;
        $prosedurpelayanan  = $input->prosedurkunj;
        $Penunjang          = $input->penunjangkunj;
        $assesmenpelayanan  = $input->assesmenkunj;
        $createRencanaKontrol = $input->skdp;
        $rujukan            = $input->rujukan;
        $kd_perujuk         =  substr($input->rujukan, 0, 8);
        $kelas              = 3;

        if (substr($kd_perujuk, 4, 1) == 'R') {
            $rs = '2';
        } else {
            $rs = '1';
        }
    }



    $param      = $this->jsonCreateSep($input->noka, $input->dpjp, $input->diagnosa, $input->polirs, $rujukan, $input->tglRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $kd_perujuk, $kelas, $rs, $input->skdp);
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

public function jsonDeleteRujukan()
{
    $json = '
    {
        "request": {
            "t_rujukan": {
                "noRujukan": "jsonDeleteRujukan",
                "user": "admin rs",
            }
        }
    }';
    return $json;
}
public function InsertRujukan()
{
   $input      = json_decode(file_get_contents('php://input'));
   $icd            = $input->diagnosa;
   $tglkontrol     = $input->tgl;
   $sep            = $input->sep;
   $catatan        = $input->keterangan;
   $jnsPelayanan   = $input->pelayanan;
   $tiperujukan    = $input->tipe;
   $rs             = $input->rs;
   $unit           = $input->poli;
   $tgl            = date('Y-m-d');
   $user           = 'Admin RS';

   $tStamp     = $this->tStamp();
   $method     = 'POST';
   $param      = $this->jsonInsertRujukan($sep, $tgl, $tglkontrol, $rs, $jnsPelayanan, $catatan, $icd, $tiperujukan, $unit, $user);
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

    public function DeleteRujukan()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $method     = 'DELETE';
        //$rujukan    =$input->$rujukan;
        $param      = $this->jsonDeleteRujukan();
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
    public function CekListRencanaKontrol()
    {

        $input    = json_decode(file_get_contents('php://input'));
        $noka     = $input->noka;

        $tgl_mulai = date('Y-m-d', strtotime(' - 2 months'));
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $request = '/RencanaKontrol/ListRencanaKontrol/Bulan/'.date('m').'/Tahun/' . date('Y') . '/Nokartu/' . $noka . '/filter/2';

        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $rencana_kontrol = $this->Decrypt($response, $tStamp);
        $hasil['status']    = 'sukses';
        $hasil['pesan']     = '';
        $hasil['data']      = $rencana_kontrol;
        echo json_encode($hasil);
    }
    public function CekListRujukanKeluar()
    {

        $input    = json_decode(file_get_contents('php://input'));

        $tgl_akhir     = date('Y-m-d');
        $tgl_mulai = date('Y-m-d', strtotime(' - 1 months'));
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $request = '/Rujukan/Keluar/List/tglMulai/'.$tgl_mulai.'/tglAkhir/'.$tgl_akhir;

        $string = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
            $hasil = array();
            $hasil['status'] = 'gagal';
            $hasil['pesan'] = $string->metaData->message;
            echo json_encode($hasil);
            return;
        }
        $response = $string->response;
        $rujukan = $this->Decrypt($response, $tStamp);
        $hasil['status']    = 'sukses';
        $hasil['pesan']     = '';
        $hasil['data']      = $rujukan;
        echo json_encode($hasil);
    }
    public function UpdateRencanaKontrol()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $tStamp     = $this->tStamp();
        $skdp       = $input->skdp;
        $dokter     = $input->dpjp;
        $unit       = $input->unit;
        $tgl        = $input->tgl;
        $sep        = '';
        $method     = 'PUT';
        $param      = $this->JsonUpdateRencanaKontrol($skdp, $sep, $dokter, $unit, $tgl);
        $request    = '/RencanaKontrol/Update';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code != 200) {
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
    public function JsonUpdateRencanaKontrol($skdp, $sep, $dokter, $unit, $tgl)
    {
        $json = '  {
            "request": {
                "noSuratKontrol":"' . $skdp . '",
                "noSEP":"' . $sep . '",
                "kodeDokter":"' . $dokter . '",
                "poliKontrol":"' . $unit . '",
                "tglRencanaKontrol":"' . $tgl . '",
                "user":"coba"
            }
        }
        ';
        return $json;
    }
    public function CekSEP($noka)
    {
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param = '';
        $tglMulai=date("Y-m-d", strtotime('+8 hours'));
        $tglAkhir=date("Y-m-d", strtotime('+8 hours'));
        $request = 'monitoring/HistoriPelayanan/NoKartu/' . $noka . '/tglMulai/' .$tglMulai. '/tglAkhir/' .$tglAkhir;
        $string = $this->url($request, $param, $method, $tStamp);
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);
        $res2 = $hasil['histori'];
        if ($res2[0]['tglSep'] == $tglMulai && $res2[0]['ppkPelayanan'] == 'RSUD DR.SOEDONO') {
            return $res2[0]['noSep'];
        } else {
            return 'kosong';
        }
    }
    public function CekListRencanaKontroltes($noka)
    {
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $tgl    =date("Y-m-d", strtotime('+7 hours'));
        $request = 'RencanaKontrol/ListRencanaKontrol/Bulan/' . date('m') . '/Tahun/' . date('Y') . '/Nokartu/' . $noka . '/filter/2';
        $string = $this->url($request, $param, $method, $tStamp);
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);
        $res2 = $hasil['list'];
        if ($res2[0]['tglRencanaKontrol'] == $tgl ) {
            return $res2[0]['noSuratKontrol'];
        } else {
            return 'kosong';
        }
    }

    public function CekRujukanBPJS($noka, $no)
    {
        $input    = json_decode(file_get_contents('php://input'));
        $tStamp = $this->tStamp();
        $tglAkhir = date('Y-m-d', strtotime('-90 days', strtotime(date('Y-m-d'))));
        $request = 'monitoring/HistoriPelayanan/NoKartu/' . $noka . '/tglMulai/' . $tglAkhir . '/tglAkhir/' . date('Y-m-d');
        $method = 'GET';
        $param = '';
        $string = $this->url($request, $param, $method, $tStamp);
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);
        $res2 = $hasil['histori'];
        $res3 = json_decode(json_encode($res2));
        $jumlah = 0;
        foreach ($res3 as $key) {
            if ($key->noRujukan == $no) {
                $jumlah++;
            }
        }
        if ($jumlah > 0) {
            return 'ada';
        } else {
            return 'kosong';
        }
    }
    public function JsonPengajuan($noka, $tgl)
    {
        $json = ' {
            "request": {
                "t_sep": {
                    "noKartu": "' . $noka . '",
                    "tglSep": "2023-06-20",
                    "jnsPelayanan": "2",
                    "jnsPengajuan": "2",
                    "keterangan": "Approv finger",
                    "user": "mandiri"
                }
            }
        }
        ';
        return $json;
    }
    public function bridging_tes()
    {
        $input    = json_decode(file_get_contents('php://input'));
        $data      = $input->data;
        $method    = $input->method;
        $parameter = $input->parameter;
        $parameter2= $input->parameter2;
        $tgl=date('Y-m-d');
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
            $request  = 'SEP/FingerPrint/List/Peserta/TglPelayanan/'.$tgl;
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
    public function ApprovAuto()
    {
        $input      = json_decode(file_get_contents('php://input'));
        $date       = date("Y-m-d");
        $noka       = $input->noka;
        $tStamp     = $this->tStamp();
        $param      = $this->JsonPengajuan($noka, $date);
        $request    = 'Sep/aprovalSEP';
        $method     = 'POST';
        $string     = $this->url($request, $param, $method, $tStamp);
        if ($string->metaData->code == 200) {
            $response   = $string->response;
            $hasil      = $this->Decrypt($response, $tStamp);
            $hasil['status']    = 'sukses';
            $hasil['pesan']     = 'Berhasil';
        } else {
            $hasil['status']    = 'gagal';
            $hasil['pesan']     = $string->metaData->message;
        }
        echo json_encode($hasil);
    }
    //$noka,$dokter,$diagnosa,$polirs,$noRujukan,$tglRujukan,$TujuanKunjungan,$prosedurpelayanan,$Penunjang,$assesmenpelayanan,$createRencanaKontrol,$kd_perujuk,$kelas,$rs
    public function jsonCreateSep($noka, $dokter, $diagnosa, $polirs, $noRujukan, $tglRujukan, $TujuanKunjungan, $prosedurpelayanan, $Penunjang, $assesmenpelayanan, $kd_perujuk, $kelas, $rs, $createRencanaKontrol)

    {

        if ($TujuanKunjungan == '1') {
            $TKunjungan  = '';
        } elseif($TujuanKunjungan=='0') {
            $TKunjungan  = $TujuanKunjungan;
            $ppelayanan  ='';
            $PenunjangSep='';
            $apelayanan  ='';
        }else{
         $TKunjungan  = $TujuanKunjungan; 
     }
     if ($prosedurpelayanan == '99') {
        $ppelayanan  = '';
    } else {
        $ppelayanan  = $prosedurpelayanan;
    }

    if ($Penunjang == '99') {
        $PenunjangSep  = '';
    } else {
        $PenunjangSep  = $Penunjang;
    }
    if ($assesmenpelayanan == '99') {
        $apelayanan  = '';
    } else {
        $apelayanan  = $assesmenpelayanan;
    }
    if ($createRencanaKontrol == '0' || $createRencanaKontrol == null) {
        $cRencanaKontrol = '';
    } else {
        $cRencanaKontrol = $createRencanaKontrol;
    }



    $json = '    {
        "request":{
            "t_sep":{
                "noKartu":"' . $noka . '",
                "tglSep":"' . date("Y-m-d") . '",       
                "ppkPelayanan":"0216R010",
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
                                    "jaminan":{
                                        "lakaLantas":"0",
                                        "penjamin":{
                                            "tglKejadian":"",
                                            "keterangan":"",
                                            "suplesi":{
                                                "suplesi":"0",
                                                "noSepSuplesi":"",
                                                "lokasiLaka":{
                                                    "kdPropinsi":"",
                                                    "kdKabupaten":"",
                                                    "kdKecamatan":""
                                                }
                                            }

                                        }
                                        },
                                        "tujuanKunj"    :"' . $TKunjungan . '",
                                        "flagProcedure" :"' . $ppelayanan . '",   
                                        "kdPenunjang"   :"' . $PenunjangSep . '",
                                        "assesmentPel"  :"' . $apelayanan . '",
                                        "skdp":{
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
                            private function getTstamp()
                            {
                                return strval(time() - strtotime('1970-01-01 07:00:00'));
                            }
                            public function decript($tStamp, $response)
                            {
                                $cons_id = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'cons_id_2'")->getRow()->nilai;
                                $secretKey = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'secret_key_2'")->getRow()->nilai;
                                $key = $cons_id . $secretKey . $tStamp;
                                $encrypt_method = 'AES-256-CBC';
                                $key_hash = hex2bin(hash('sha256', $key));
                                $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
                                $output = openssl_decrypt(base64_decode($response), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
                                return json_decode(\LZCompressor\LZString::decompressFromEncodedURIComponent($output), true);
                            }
                            /*cetak*/
                            public function cekdetailsep($SEP)
                            {
                             $tStamp = $this->tStamp();
                             $method = 'GET';
                             $param  = '';
                             $request = '/SEP/'. $SEP;
                             $string = $this->url($request, $param, $method, $tStamp);        
                             $response = $string->response;
                             $hasil = $this->Decrypt($response, $tStamp); 
                             echo json_encode($hasil);
                         }
                         public function CetakSEPIRJA()
                         {
                            $input = json_decode(file_get_contents('php://input'));
                            $SEP   = $_POST['sep'];
                            $tStamp = $this->tStamp();
                            $method = 'GET';
                            $param  = '';
                            $request = '/SEP/'. $SEP;
                            $string = $this->url($request, $param, $method, $tStamp);        
                            $response = $string->response;
                            $hasil = $this->Decrypt($response, $tStamp);   
                            $nama =$hasil['peserta']['nama'];
                            $peserta=$hasil['peserta']['jnsPeserta'];
                            $tglsep=$hasil['tglSep'];
                            if($hasil['peserta']['kelamin'] == 'P'){
                                $jk='WANITA';
                            } else{
                                $jk='PRIA';
                            }
                            $kelasRawat='';
                            if($hasil['jnsPelayanan']=='Rawat Inap'){
                                $kelasRawat = $hasil['peserta']['hakKelas'];
                            }

                            $writer = new PngWriter();
                            $qrCode = QrCode::create($hasil['peserta']['noKartu'])
                            ->setEncoding(new Encoding('UTF-8'))
                            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                            ->setSize(150)
                            ->setMargin(10)
                            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                            ->setForegroundColor(new Color(0, 0, 0))
                            ->setBackgroundColor(new Color(255, 255, 255));

                            $result = $writer->write($qrCode);

                            $dataUri = $result->getDataUri();

                            $html="<html>
                            <body>
                            <table style='text-align: center;' width=100%>
                            <tr>
                            <td>
                            <img src='./_assets/dist/img/darmayu.jpg' width=30 height=30>
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
                            <div style='font-size:14px;'><b>".$SEP."</b></div>
                            </td>

                            <td width='25mm'>
                            No. Kartu
                            </td>
                            <td>
                            : 
                            </td>
                            <td>
                            <div style='font-size:14px;'><b>".$hasil['peserta']['noKartu']."</b></div>
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
                            ".$tglsep."
                            </td>

                            <td width='25mm'>
                            No. Medrec
                            </td>
                            <td>
                            : 
                            </td>
                            <td>
                            <b>'".$hasil['peserta']['noMr']."'</b>
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
                            ".$peserta."
                            </td>

                            <td width='25mm'>
                            Nama Peserta
                            </td>
                            <td>
                            : 
                            </td>
                            <td>
                            ".$nama."
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
                            ".$hasil['peserta']['tglLahir']."
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
                            ".$hasil['jnsPelayanan']."
                            </td>

                            <td width='25mm'>
                            Jns. Kelamin
                            </td>
                            <td>
                            : 
                            </td>
                            <td>
                            ".$jk."
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
                            ".$kelasRawat."
                            </td>

                            <td width='25mm'>
                            Poli Tujuan
                            </td>
                            <td>
                            : 
                            </td>
                            <td>
                            ".$hasil['poli']."
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
                            ".$hasil['diagnosa']."
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
                            <div style='font-size:14px;'><b>".$hasil['catatan']."</b></div>
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
                            Cetakan Ke 1 : ".str_pad(gmdate("d-M-Y H:i:s", time()+60*61*7),71," ")."
                            </td>
                            <td width='40mm' style='text-align: right;font-size:12px;'>
                            Pasien / Keluarga Pasien
                            <img src='" . $dataUri . "' width='50' height='50'>
                            </td>
                            </tr>
                            </table>
                            </body>
                            </html>";
        //echo $html;
                            $mpdf   = new \Mpdf\Mpdf([
                                'mode' => 'utf-8',
                                'A4',
                                'format' => [160,80]
                            ]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
        $mpdf->AddPage('P', // L - landscape, P - portrait
            '', '', '', '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("cetak.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');
        

    }

    public function CetakSKDPIRJA()
    {
        $input = json_decode(file_get_contents('php://input'));
        $SEP   = $_POST['sep'];
        $tStamp = $this->tStamp();
        $method = 'GET';
        $param  = '';
        $request = '/RencanaKontrol/noSuratKontrol/'. $SEP;
        $string = $this->url($request, $param, $method, $tStamp);        
        $response = $string->response;
        $hasil = $this->Decrypt($response, $tStamp);   
        $nama =$hasil['peserta']['nama'];
        $peserta=$hasil['peserta']['jnsPeserta'];
        $tglsep=$hasil['tglSep'];
        if($hasil['peserta']['kelamin'] == 'P'){
            $jk='WANITA';
        } else{
            $jk='PRIA';
        }
        $kelasRawat='';
        if($hasil['jnsPelayanan']=='Rawat Inap'){
            $kelasRawat = $hasil['peserta']['hakKelas'];
        }



        $html="<html>
        <body>
        <table style='text-align: center;' width=100%>
        <tr>
        <td>
        <img src='./include/logo.jpg' width=30 height=30>
        </td>
        <td>
        <div style='font-size:16px;'><b>SURAT KONTROL DALAM PERAWATAN PESERTA</b></div>
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
        <div style='font-size:14px;'><b>".$SEP."</b></div>
        </td>

        <td width='25mm'>
        No. Kartu
        </td>
        <td>
        : 
        </td>
        <td>
        <div style='font-size:14px;'><b>".$hasil['peserta']['noKartu']."</b></div>
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
        ".$tglsep."
        </td>

        <td width='25mm'>
        No. Medrec
        </td>
        <td>
        : 
        </td>
        <td>
        <b>'".$hasil['peserta']['noMr']."'</b>
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
        ".$peserta."
        </td>

        <td width='25mm'>
        Nama Peserta
        </td>
        <td>
        : 
        </td>
        <td>
        ".$nama."
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
        ".$hasil['peserta']['tglLahir']."
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
        ".$hasil['jnsPelayanan']."
        </td>

        <td width='25mm'>
        Jns. Kelamin
        </td>
        <td>
        : 
        </td>
        <td>
        ".$jk."
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
        ".$kelasRawat."
        </td>

        <td width='25mm'>
        Poli Tujuan
        </td>
        <td>
        : 
        </td>
        <td>
        ".$hasil['poli']."
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
        ".$hasil['diagnosa']."
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
        <div style='font-size:14px;'><b>".$hasil['catatan']."</b></div>
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
        Cetakan Ke 1 : ".str_pad(gmdate("d-M-Y H:i:s", time()+60*61*7),71," ")."
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
            'format' => [160,80]
        ]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
        $mpdf->AddPage('P', // L - landscape, P - portrait
            '', '', '', '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("cetak.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');
        

    }
    /*end cetak*/
    public function getHeader($tStamp)
    {
        $cons_id = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'cons_id_2'")->getRow()->nilai;
        $secretKey = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'secret_key_2'")->getRow()->nilai;
        $user_key = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'user_key_2'")->getRow()->nilai;
        $signature = hash_hmac('sha256', $cons_id . "&" . $tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        return array("X-Cons-ID: " . $cons_id, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $user_key, "Content-Type: application/x-www-form-urlencoded\r\n");
    }
    public function modalsepinap()
    {


        $data = json_decode($_GET['data']);
        $sep       = str_replace('"', '', json_encode($data->seprajal));
        $telp  = str_replace('"', '', json_encode($data->telp));
        $tgl_sep  = str_replace('"', '', json_encode($data->tglsep));
        $id_unit  = str_replace('"', '', json_encode($data->id_unit));
        $user  = str_replace('"', '', json_encode($data->user));
        $no_rm  = str_replace('"', '', json_encode($data->no_rm));
        $poli  = str_replace('"', '', json_encode($data->poli));
        $postdpjpDokter  = str_replace('"', '', json_encode($data->kd_dokter));
        $kode_diagnosa  = str_replace('"', '', json_encode($data->kd_diagnosa));

        if($sep==null || $sep==''){
            $output[ 'metaData']['message'] = "SEP SPRI RAWAT JALAN TIDAK ADA, Silahkan isi dulu di Form Penata Jasa SPRI ";
            $output[ 'metaData']['code'] = '0';
            $outputx['data']['datax'] =   $output;
            return view('view/modal/rwi/modalsepinap', $outputx);

            echo json_encode($output);
            exit();
        }

        if (isset($tgl_sep)) {
            // $tgl_sep = $_POST['tgl_sep'];
            $bulan_sep = substr($tgl_sep, 5, 2);
            $tahun_sep = substr($tgl_sep, 0, 4);
            $a = $bulan_sep . $tahun_sep;
            //var_dump($a);

        } else {
            $tgl_sep = date("Y-m-d");
            $bulan_sep = date("m");
            $tahun_sep = date("Y");
        }
        if (strlen($telp) < 8) {
            $telp = '08123456789';
        }
        $buatSPRI = false;
        $kelas = $this->db->query("SELECT * FROM unit WHERE id_unit = '" . $id_unit . "'")->getRow()->map_bpjs;
        $url = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'url_2'")->getRow()->nilai;
        $cons_id = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'cons_id_2'")->getRow()->nilai;
        $ppk = $this->db->query("SELECT nilai FROM seting_bpjs WHERE key_setting = 'ppk_2'")->getRow()->nilai;
        $tStamp = $this->getTstamp();
        $headers = $this->getHeader($tStamp);
        $opts = array(
            'http' => array(
                'method' => 'GET',
                'header' => $headers
            )
        );
        //cek sep rajal
        $context = stream_context_create($opts);
        $hasil_raw = file_get_contents($url . 'SEP/' . $sep, true, $context);
        $hasil = json_decode($hasil_raw, true);
        if ($hasil['metaData']['code'] <> '200') {
            $output['metaData'] = $hasil['metaData'];
            $output['url'] = $url . 'SEP/' . $sep;
            $outputx['data']['datax'] =   $output;
            return view('view/modal/rwi/modalsepinap', $outputx);
            // echo json_encode($output);

            // return;
        }
        $data_sep =  $this->decript($tStamp, $hasil['response']);
        // echo json_encode($data_sep);
        // exit();

        $data_sep_2 =  $this->decript($tStamp, $hasil['response']);
        $kode_poli = explode(" ", $data_sep_2["poli"])[0];
        // if (isset($kode_diagnosa)) {
        //     $kode_diagnosa = explode(" ", $data_sep_2["diagnosa"])[0];
        //     // var_dump($data_sep_2); exit();
        //     //cek spri
        // }
        $hasil_raw = file_get_contents($url . 'RencanaKontrol/ListRencanaKontrol/Bulan/' . $bulan_sep . '/Tahun/' . $tahun_sep . '/Nokartu/' . $data_sep["peserta"]["noKartu"] . '/filter/2', true, $context);
        $hasil = json_decode($hasil_raw, true);
        $noSPRI = '';
        if ($hasil['metaData']['code'] <> '200') {
            if ($hasil['metaData']['code'] == '201' && $hasil['metaData']['message'] == 'Data Tidak Ditemukan') {
                $buatSPRI = true;
            } else {
                $output['metaData'] = $hasil['metaData'];
                $output['param'] = json_decode($param, true);
                $output['url'] = $url . 'RencanaKontrol/ListRencanaKontrol/Bulan/' . $bulan_sep . '/Tahun/' . $tahun_sep . '/Nokartu/' . $data_sep["peserta"]["noKartu"] . '/filter/2';
                echo json_encode($output);
                return;
            }
        } else {
            $data_list_kontrol =  $this->decript($tStamp, $hasil['response'])["list"];
            $buatSPRI = true;
            for ($i = 0; $i < count($data_list_kontrol); $i++) {
                $data_kontrol = $data_list_kontrol[$i];
                if ($data_kontrol['namaJnsKontrol'] == 'SPRI' && $data_kontrol['tglRencanaKontrol'] == $tgl_sep) {
                    $noSPRI = $data_kontrol['noSuratKontrol'];
                    $buatSPRI = false;
                    $i = count($data_list_kontrol);
                }
            }
        }


        // cek dokter -- belum
        if (isset($poli)) {
            if ($postdpjpDokter == '' || $postdpjpDokter == null) {
                $postdpjpDokter = '0';
                $output['metaData']['code'] = 'X';
                $output['metaData']['message'] = 'Silahkan Pilih Dokter';
                $outputx['data']['datax'] =   $output;
                return view('view/modal/rwi/modalsepinap', $outputx);
                exit;
            }
            $dpjpDokter = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = '" . $postdpjpDokter . "'")->getRow()->kd_dokter_bpjs;
            $kode_poli = $poli;
        } else {
            if ($data_sep["dpjp"]["kdDPJP"] == '0') {
                $dpjpDokter = $data_sep["kontrol"]["kdDokter"];
            } else {
                $dpjpDokter = $data_sep["dpjp"]["kdDPJP"];
            }

            if ($dpjpDokter == "") {
                $dpjpDokter = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = '" . $postdpjpDokter . "'")->getRow()->kd_dokter_bpjs;
            }
        }

        if ($kode_poli == 'IGD') {
            // echo"halo";
            // exit();
            $dpjpDokter = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = '" . $postdpjpDokter . "'")->getRow()->kd_dokter_bpjs;
            $queryPoli = "SELECT
            un.map_bpjs
            FROM
            dokter_klinik dk
            JOIN unit un ON un.id_unit = dk.id_unit 
            WHERE
            dk.id_pegawai = '" . $postdpjpDokter . "' 
            AND un.map_bpjs <> 'IGD'";
            // echo" $queryPoli ";
            // exit;
            $kode_poli = $this->db->query($queryPoli)->getRow()->map_bpjs;
        }
        //exit();
        //HARDCODESEK
        $dpjpDokter ='12687';
        $kode_poli ='INT';
        //HARDCODESEK
        if ($buatSPRI) {
            $param = '
            {
             "request":
             {
               "noKartu":"' . $data_sep["peserta"]["noKartu"] . '",
               "kodeDokter":"' . $dpjpDokter . '",
               "poliKontrol":"' . $kode_poli . '",
               "tglRencanaKontrol":"' . $tgl_sep . '",
               "user":"user' . $user . '"
           }
       }
       ';

       $opts = array(
        'http' => array(
            'method' => "POST",
            'header' => $headers,
            'content' => $param
        )
    );

       $context = stream_context_create($opts);

       $hasil_raw = file_get_contents($url . 'RencanaKontrol/InsertSPRI', false, $context);

       $hasil = json_decode($hasil_raw, true);

       if ($hasil['metaData']['code'] <> '200') {
        $output['metaData'] = $hasil['metaData'];
        $output['url'] = $url . 'RencanaKontrol/InsertSPRI';
        $output['param'] = json_decode($param, true);
        $output['pesan'] = "gagal";
        $outputx['data']['datax'] =   $output;
        return view('view/modal/rwi/modalsepinap', $outputx);

                //echo json_encode($output);
        return;
    } else {
        $output['pesan'] = "berhasil";
        echo json_encode($output);
                // return;
    }



    $data_spri = $this->decript($tStamp, $hasil['response']);
    $noSPRI = $data_spri["noSPRI"];
}

        // cek kelas

if (($kelas - 2) == $data_sep["klsRawat"]["klsRawatHak"] || $kelas == '6' || $kelas == '7') {
    $param_kelas = '
    "klsRawatNaik":"",
    "pembiayaan":"",
    "penanggungJawab":""
    ';
} else {
    $param_kelas = '
    "klsRawatNaik":"' . $kelas . '",
    "pembiayaan":"1",
    "penanggungJawab":"Pribadi"
    ';
}

$param = '{
    "request":{
       "t_sep":{
          "noKartu":"' . $data_sep["peserta"]["noKartu"] . '",
          "tglSep":"' . $tgl_sep . '",
          "ppkPelayanan":"' . $ppk . '",
          "jnsPelayanan":"1",
          "klsRawat":{
             "klsRawatHak":"' . $data_sep["klsRawat"]["klsRawatHak"] . '",
             ' . $param_kelas . '
             },
             "noMR":"' . $no_rm . '",
             "rujukan":{
                 "asalRujukan":"2",
                 "tglRujukan":"' . $data_sep["tglSep"] . '",
                 "noRujukan":"' . $sep . '",
                 "ppkRujukan":"' . $ppk . '"
                 },
                 "catatan":"SJP RWI",
                 "diagAwal":"' . $kode_diagnosa . '",
                 "poli":{
                     "tujuan":"",
                     "eksekutif":"0"
                     },
                     "cob":{
                         "cob":"' . $data_sep["cob"] . '"
                         },
                         "katarak":{
                             "katarak":"' . $data_sep["katarak"] . '"
                             },
                             "jaminan":{
                                 "lakaLantas":"' . $data_sep["kdStatusKecelakaan"] . '",
                                 "penjamin":{
                                    "tglKejadian":"' . $data_sep["lokasiKejadian"]["tglKejadian"] . '",
                                    "keterangan":"' . $data_sep["lokasiKejadian"]["ketKejadian"] . '",
                                    "suplesi":{
                                       "suplesi":"0",
                                       "noSepSuplesi":"",
                                       "lokasiLaka":{
                                          "kdPropinsi":"' . $data_sep["lokasiKejadian"]["kdProp"] . '",
                                          "kdKabupaten":"' . $data_sep["lokasiKejadian"]["kdProp"] . '",
                                          "kdKecamatan":"' . $data_sep["lokasiKejadian"]["kdKec"] . '"
                                      }
                                  }
                              }
                              },
                              "tujuanKunj":"0",
                              "flagProcedure":"",
                              "kdPenunjang":"",
                              "assesmentPel":"",
                              "skdp":{
                                 "noSurat":"' . $noSPRI . '",
                                 "kodeDPJP":"' . $dpjpDokter . '"
                                 },
                                 "dpjpLayan":"",
                                 "noTelp":"' . $telp . '",
                                 "user":"user' . $user . '"
                             }
                         }
                     }
                     ';
                     $opts = array(
                        'http' => array(
                            'method' => "POST",
                            'header' => $headers,
                            'content' => $param
                        )
                    );

                     $context = stream_context_create($opts);

                     $hasil_raw = file_get_contents($url . 'SEP/2.0/insert', false, $context);

                     $hasil = json_decode($hasil_raw, true);

                     if ($hasil['metaData']['code'] <> '200') {
                        $output['metaData'] = $hasil['metaData'];
                        $output['param'] = json_decode($param, true);
                        $output['url'] = $url . 'SEP/2.0/insert';
            //echo json_encode($output);
                        $outputx['data']['datax'] =   $output;
                        return view('view/modal/rwi/modalsepinap', $outputx);
                    } else {

                        $output['metaData'] = $hasil['metaData'];
                        $output['response'] = $this->decript($tStamp, $hasil['response']);
                        $outputx['data']['datax'] =   $output;
            // response asli bpjs dibawah ini di komen
            //$response = $this->decript($tStamp, $hasil['response']);
           // $response = $this->decript($tStamp, $hasil['response']);
                        $outputxx = json_decode(json_encode($outputx), true);
           //var_dump($outputx); echo"<br>";
                        return view('view/modal/rwi/modalsepinap', $outputxx);
                    }
        // $outputx['metaData'] = $hasil['metaData'];
        // $outputx['no_sep'] = $response['sep']['noSep'];
        // $outputx['no_spri'] = $noSPRI;
        // echo json_encode($outputx);


        //output
        // tinggal html sep


                }
                public function DeleteSEP()
                {

                    $input      = json_decode(file_get_contents('php://input'));
                    $tStamp     = $this->tStamp();
                    $sep        = $input->sep;
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
                public function CetakSEPIrna()
                {
                    $input = json_decode(file_get_contents('php://input'));
                    $SEP   = $_POST['sep'];
                    $tStamp = $this->tStamp();
                    $method = 'GET';
                    $param  = '';
                    $request = '/SEP/'. $SEP;
                    $string = $this->url($request, $param, $method, $tStamp);        
                    $response = $string->response;
                    $hasil = $this->Decrypt($response, $tStamp);   
                    $nama =$hasil['peserta']['nama'];
                    $peserta=$hasil['peserta']['jnsPeserta'];
                    $tglsep=$hasil['tglSep'];
                    if($hasil['peserta']['kelamin'] == 'P'){
                        $jk='WANITA';
                    } else{
                        $jk='PRIA';
                    }
                    $kelasRawat='';
                    if($hasil['jnsPelayanan']=='Rawat Inap'){
                        $kelasRawat = $hasil['peserta']['hakKelas'];
                    }

                    $html="<html>
                    <body>
                    <table>
                    <tr>
                    <td><img src='".base_url('_assets/dist/img/bpjs.png')."' height='30'></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align='center'>SURAT ELEGIBILITAS PESERTA<br>RSU DARMAYU</td>
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
                    <div style='font-size:14px;'><b>".$SEP."</b></div>
                    </td>

                    <td width='25mm'>
                    No. Kartu
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <div style='font-size:14px;'><b>".$hasil['peserta']['noKartu']."</b></div>
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
                    ".$tglsep."
                    </td>

                    <td width='25mm'>
                    No. Medrec
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    <b>'".$hasil['peserta']['noMr']."'</b>
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
                    ".$peserta."
                    </td>

                    <td width='25mm'>
                    Nama Peserta
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    ".$nama."
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
                    ".$hasil['peserta']['tglLahir']."
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
                    ".$hasil['jnsPelayanan']."
                    </td>

                    <td width='25mm'>
                    Jns. Kelamin
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    ".$jk."
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
                    ".$kelasRawat."
                    </td>

                    <td width='25mm'>
                    Poli Tujuan
                    </td>
                    <td>
                    : 
                    </td>
                    <td>
                    ".$hasil['poli']."
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
                    ".$hasil['diagnosa']."
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
                    <div style='font-size:14px;'><b>".$hasil['catatan']."</b></div>
                    </td>
                    <td>Kode Panggilan</td>
                    <td>:</td>
                    <td></td>
                    <tr>


                    </table>

                    <table style='font-size:10px;'>
                    <tr>
                    <td width='100mm'>
            *Saya Menyetujui BPJS Kesehatan menggunakan informasi Medis Pasien jika diperlukan<br>
            *SEP bukan sebagai bukti penjamin peserta<br>
                    Cetakan Ke 1 : ".str_pad(gmdate("d-M-Y H:i:s", time()+60*61*7),71," ")."
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
                        'format' => [160,80]
                    ]);
        //$mpdf=new \Mpdf\Mpdf('utf-8', array(160,80));
        $mpdf->AddPage('P', // L - landscape, P - portrait
            '', '', '', '',
            2, // margin_left
            2, // margin right
            2, // margin top
            2, // margin bottom
            0, // margin header
            2); // margin footer

        $mpdf->WriteHTML($html);
        $mpdf->Output("cetak.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');
        

    }
}
