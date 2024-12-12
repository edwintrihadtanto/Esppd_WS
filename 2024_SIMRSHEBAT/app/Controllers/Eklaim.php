<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Eklaim extends Api
{

    function index()
    {
        $this->load->model('main/vi_gettrustee');
    }

    public function tes()
    {
        // $this->load->model('main/vi_gettrustee');
    }

    function sendWS($payload)
    {
        $key = "b125d6c5d243354e7497c7d88ea31ec3e7db718b277f890b4db809fcff23bc9f";
        // json query
        //$this->session->set_userdata('json_payload', $payload);
        // membuat json juga dapat menggunakan json_encode:
        // $json_request = json_encode($ws_query);
        // data yang akan dikirimkan dengan method POST adalah encrypted:
        $payload = $this->inacbg_encrypt($payload, $key);
        // tentukan Content-Type pada http header
        $header = array("Content-Type: application/x-www-form-urlencoded");
        // url server aplikasi E-Klaim,
        // silakan disesuaikan instalasi masing-masing
        // $url = "http://103.184.180.97:88/E-Klaim/ws.php";
        $url = "http://192.168.1.4/E-Klaim/ws.php";

        // setup curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // request dengan curl
        $response = curl_exec($ch);
        // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
        // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
        $first = strpos($response, "\n") + 1;
        $last = strrpos($response, "\n") - 1;
        $response = substr(
            $response,
            $first,
            strlen($response) - $first - $last
        );
        // decrypt dengan fungsi inacbg_decrypt
        $response = $this->inacbg_decrypt($response, $key);
        // hasil decrypt adalah format json, ditranslate kedalam array
        //$msg = json_decode($response, true);
        // variable data adalah base64 dari file pdf
        //return $msg;
        return $response;
        // print_r($response);
    }



    public function lookupPendaftaranPasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm',
            'nama',
            'nik',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $parameter = '';
            if ($input->no_rm > '') {
                $parameter .= "AND no_rm = '$input->no_rm'";
            }
            if ($input->nama > '') {
                $parameter .= "AND nama ILIKE '%$input->nama%'";
            }
            if ($input->nik > '') {
                $parameter .= "AND nik = '$input->nik'";
            }

            if ($parameter == '') {
                $output['pesan'] = "Pasien tidak ditemukan";
            } else {
                $query = "
                    SELECT ROW_NUMBER
                        ( ) OVER ( ORDER BY no_rm ) AS no,
                        pasien.*
                    FROM
                        pasien 
                    WHERE
                        no_rm > '' $parameter
                    ORDER BY
                        no_rm
                ";
                $list_pasien = $this->db->query($query);
                if ($list_pasien->getNumRows() > 0) {
                    $output['status'] = "sukses";
                    $output['data'] = $list_pasien->getResult();
                } else {
                    $output['pesan'] = "Pasien tidak ditemukan";
                }
            }
        }
        $this->hasil($output);
    }

    public function riwayatPenyakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    TO_CHAR(tgl_kunjungan, 'dd/mm/yyyy') AS tgl_kunjungan,
                    id_penyakit,
                    penyakit,
                    status
                FROM
                    mr_penyakit
                    JOIN unit USING ( id_unit )
                    JOIN penyakit USING ( id_penyakit ) 
                    JOIN status_diagnosa USING (status_diag)
                WHERE
                    no_rm = '$input->no_rm' 
                ORDER BY
                    tgl_kunjungan DESC, status_diag ASC
            ";
            $list_penyakit = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_penyakit->getResult();
        }
        $this->hasil($output);
    }

    public function riwayatKunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    TO_CHAR(tgl_masuk, 'dd/mm/yyyy') AS tgl_masuk,
                    nama_unit,
                    nama_pegawai 
                FROM
                    kunjungan
                    JOIN transaksi USING ( id_transaksi )
                    JOIN pegawai USING ( id_pegawai )
                    JOIN unit USING ( id_unit ) 
                WHERE
                    no_rm = '$input->no_rm' 
                ORDER BY
                    tgl_masuk DESC
            ";
            $list_penyakit = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_penyakit->getResult();
        }
        $this->hasil($output);
    }

    public function listNoka()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "
                SELECT
                    * 
                FROM
                    penjamin_pasien
                WHERE
                    no_rm = '$input->no_rm' 
            ";
            $list_penyakit = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_penyakit->getResult();
        }
        $this->hasil($output);
    }

    public function unit()
    {
        $user =  $this->db->query("SELECT * FROM unit where jenis_unit =  '3' ");
        $output['status']   = 'sukses';
        $output['data']     = $user->getResult();
        echo json_encode($output);
    }
    public function cek_kunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $query = $this->db->query("SELECT * FROM
                        transaksi
                        JOIN kunjungan USING ( id_transaksi )
                        JOIN pasien USING ( no_rm )
                        JOIN unit USING ( id_unit ) where transaksi.id_transaksi='$input->id_transaksi'");

            if ($query->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Berhasil Cari Pasien";
            } else {
                $output['status']   = "sukses";
                $output['code']     = "XX";
                $output['pesan']    = "";
            }
        }
        echo json_encode($output);
    }

    public function mod_Klaim()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));
        $no_sep  = str_replace('"', '', json_encode($data->no_sjp));

        // $kel =  $this->db->query("SELECT
        //         DISTINCT(no_sjp) as nosep,
        //         inacbg_grouping.tarif as tarifcbg,
        //         inacbg_grouping.data as datacbg,
        //         transaksi.no_rm as norm,
        //         * 
        //     FROM
        //         penjamin_transaksi
        //         JOIN transaksi USING ( id_transaksi ) 
        //         JOIN pasien USING (no_rm)
        //         join penjamin USING (id_penjamin)
        //         left join penjamin_pasien on penjamin_pasien.no_rm=transaksi.no_rm and  penjamin_pasien.id_penjamin='2'
        //         LEFT JOIN inacbg_grouping on inacbg_grouping.nosep=penjamin_transaksi.no_sjp
        //         WHERE
        //             '1'='1'
        //         AND penjamin_transaksi.id_penjamin = '2' 
        //         AND penjamin_transaksi.penjamin_utama = 't'
        //         AND penjamin_transaksi.id_transaksi='$id_transaksi'");
        $kel =  $this->db->query("SELECT
                DISTINCT(no_sjp) as nosep,
                inacbg_grouping.tarif as tarifcbg,
                inacbg_grouping.data as datacbg,
                transaksi.no_rm as norm,
                * 
            FROM
                penjamin_transaksi
                JOIN transaksi USING ( id_transaksi ) 
								join kunjungan using(id_transaksi)
								join unit using(id_unit)
                JOIN pasien USING (no_rm)
                join penjamin USING (id_penjamin)
                left join penjamin_pasien on penjamin_pasien.no_rm=transaksi.no_rm and  penjamin_pasien.id_penjamin='2'
                LEFT JOIN inacbg_grouping on inacbg_grouping.nosep=penjamin_transaksi.no_sjp
                WHERE
                    '1'='1'
								AND unit.jenis_unit in ('1','2','3')
                AND penjamin_transaksi.id_penjamin = '2' 
                AND penjamin_transaksi.penjamin_utama = 't'
                AND penjamin_transaksi.id_transaksi='$id_transaksi'
				order by kunjungan.id_kunjungan desc limit 1");

        $outputx['data'] = $kel->getResult();


        $parse = $this->db->query("select medrec_diagutama.*,mrconso.STR as \"STR\" from medrec_diagutama left join mrconso on mrconso.CODE=medrec_diagutama.mrdu_icd10 where medrec_diagutama.mr_nosep='" . $no_sep . "'");
        $row = $parse->getRow();
        if ($row) {
            //echo "parse1 ada";
            //var_dump($resultx);
            $outputx['mrdu_icd10']        = $row->mrdu_icd10;
            $outputx['mrconso_str']       = $row->STR;
            if ($outputx['mrconso_str'] == "") {
                $outputx['mrconso_str'] = $this->getDiagnose($outputx['mrdu_icd10']);
                $outputx['mrdu_icd10'] = "";
            }
            //echo $data[0]->mr_noregister;
            //var_dump($data);
        }

        $parse2 = $this->db->query("select medrec_diagsekunder.*,mrconso.STR as \"STR\" from medrec_diagsekunder left join mrconso on mrconso.CODE=medrec_diagsekunder.mrds_icd10 where medrec_diagsekunder.mr_nosep='" . $no_sep . "';");
        $row2 = $parse2->getResult();

        // $parse = $this->getDiagnosaSekunderById($no_sep);
        var_dump(count($row2));
        // echo"$parse2->getNumRows()";
        if (count($row2) > 0) {
            echo "parse2 ada";
            for ($i = 0; $i < count($row2); $i++) {
                $outputx['diagsekunder'][$i]['mrds_icd10']         = $row2[$i]->mrds_icd10;
                $outputx['diagsekunder'][$i]['mrconso_str']        = $row2[$i]->STR;
                if ($outputx['diagsekunder'][$i]['mrconso_str'] == "") {
                    $outputx['diagsekunder'][$i]['mrconso_str'] = $this->getDiagnose($outputx['diagsekunder'][$i]['mrds_icd10']);
                    $data['mrdu_icd10'] = "";
                }
            }
            //var_dump($this->data['diagsekunder']);
        } else {
            //echo "parse kosong";
        }

        $parse3 = $this->db->query("select medrec_tindakanlain.*,mrconso.STR as \"STR\" from medrec_tindakanlain left join mrconso on mrconso.CODE=medrec_tindakanlain.mrtl_icd9 where medrec_tindakanlain.mr_nosep='" . $no_sep . "' order by medrec_tindakanlain.mrtl_id asc;");
        $row3 = $parse3->getResult();

        if (count($row3) > 0) {
            //echo " ada";
            for ($i = 0; $i < count($row3); $i++) {
                $dataoutputx['tindakanlain'][$i]['mrtl_id']             = $row3[$i]->mrtl_id;
                $outputx['tindakanlain'][$i]['mrtl_tindakanlain']      = $row3[$i]->mrtl_tindakanlain;
                $outputx['tindakanlain'][$i]['mrtl_icd9']             = $row3[$i]->mrtl_icd9;
                $outputx['tindakanlain'][$i]['mrconso_str']         = $row3[$i]->STR;
                if ($outputx['tindakanlain'][$i]['mrconso_str'] == "") {
                    $outputx['tindakanlain'][$i]['mrconso_str'] = $this->getDiagnose($data['tindakanlain'][$i]['mrtl_icd9']);
                }
            }
        }

        // var_dump($outputx);
        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/eklaim/mod_eklaim', $data);
    }


    // public function caripasien()
    // {
    //     echo"a";exit();
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'kdpasiencariKlaim',
    //         'caritgl1',
    //         'caritgl2',
    //         'jmlpasiencari'
    //     ];
    //     if ($this->evalParam($input, $listParam)) {
    //         $output = array();
    //         $output['status']   = "gagal";
    //         $output['pesan']    = "";

    //         if ($input->caristatustutuptransaksi == 'all') {
    //             $criteriatutup = "";
    //         } elseif ($input->caristatustutuptransaksi == 't') {
    //             $criteriatutup = "AND transaksi.tgl_tutup is not null";
    //         } elseif ($input->caristatustutuptransaksi == 'f') {
    //             $criteriatutup = "AND transaksi.tgl_tutup is null";
    //         }


    //         if ($input->kdpasiencariKlaim == null || $input->kdpasiencariKlaim == '') {
    //             $krierianama = "AND pasien.nama ilike '%$input->nmpasiencariKlaim%'";
    //             $krieriakdpasien = "";
    //         } else {
    //             $krierianama = "";
    //             $krieriakdpasien = "AND transaksi.no_rm = '$input->kdpasiencariKlaim'";
    //         }

    //         if ($input->jmlpasiencari == 'all') {
    //             $limitnya = "";
    //         } else {
    //             $limitnya = "limit $input->jmlpasiencari";
    //         }

    //         // $query = " SELECT
    //         //         * 
    //         //     FROM
    //         //         transaksi tra 
    //         //         JOIN pasien pas on tra.no_rm=pas.no_rm
    //         //         JOIN penjamin_transaksi pj ON tra.id_transaksi = pj.id_transaksi AND pj.penjamin_utama = 't'
    //         //         JOIN penjamin using(id_penjamin)
    //         //         where
    //         //         '1'='1'
    //         //         $krieriakdpasien
    //         //         $criterialunas
    //         //         $criteriatutup
    //         //         $krierianama
    //         //         AND date(tra.tgl_transaksi) between date('$input->caritgl1') and date('$input->caritgl2')
    //         //         AND pj.id_penjamin='2'
    //         //         order by tra.id_transaksi desc
    //         //     limit '$input->jmlpasiencari'
    //         // ";

    //         $query = "SELECT
    //             DISTINCT(no_sjp) as nosep,
    //             * 
    //         FROM
    //             penjamin_transaksi
    //             JOIN transaksi USING ( id_transaksi ) 
    //             JOIN pasien USING (no_rm)
    //             join penjamin USING (id_penjamin)
    //         WHERE
    //                 '1'='1'
    //                 $krieriakdpasien
    //                 $criteriatutup
    //                 $krierianama
    //             AND id_penjamin = '2' 
    //             AND penjamin_utama = 't'
    //             AND date(tgl_transaksi) between date('$input->caritgl1') and date('$input->caritgl2')
    //             order by id_transaksi DESC
    //             $limitnya
    //             ";

    //        // echo"$query";
    //         // exit();


    //         if ($this->db->simpleQuery($query)) { //true
    //             $queryx = $this->db->query($query)->getResult();
    //             if (!empty($queryx)) {
    //                 $output['status']   = "sukses";
    //                 $output['code']     = "00";
    //                 $output['pesan']    = "Berhasil Cari Pasien";
    //                 $output['data']     = $this->db->query($query)->getResult();
    //             } else {
    //                 $output['status']   = "sukses";
    //                 $output['code']     = "XX";
    //                 $output['pesan']    = "";
    //                 $output['data']     = $this->db->query($query)->getResult();
    //             }
    //         } else {
    //             $output['code']     = "01";
    //             $output['status']   =  'gagal cari, hubungi admin';
    //             $output['pesan']    = $this->db->error()['message'];
    //         }
    //         // echo "$query";

    //         // $output['code'] = "01";
    //         // $output['status'] =  'sukses';
    //         // $output['pesan'] = 'tes';
    //     }
    //     echo json_encode($output);
    // }
    public function caripasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kdpasiencariKlaim', 'caritgl1', 'caritgl2', 'jmlpasiencari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            if ($input->caristatustutuptransaksi == 'all') {
                $criteriatutup = "";
            } elseif ($input->caristatustutuptransaksi == 't') {
                $criteriatutup = "AND transaksi.tgl_tutup is not null";
            } elseif ($input->caristatustutuptransaksi == 'f') {
                $criteriatutup = "AND transaksi.tgl_tutup is null";
            }


            if ($input->kdpasiencariKlaim == null || $input->kdpasiencariKlaim == '') {
                $krierianama = "AND pasien.nama ilike '%$input->nmpasiencariKlaim%'";
                $krieriakdpasien = "";
            } else {
                $krierianama = "";
                $krieriakdpasien = "AND transaksi.no_rm = '$input->kdpasiencariKlaim'";
            }

            if ($input->jmlpasiencari == 'all') {
                $limitnya = "";
            } else {
                $limitnya = "limit $input->jmlpasiencari";
            }

            // $query = " SELECT
            //         * 
            //     FROM
            //         transaksi tra 
            //         JOIN pasien pas on tra.no_rm=pas.no_rm
            //         JOIN penjamin_transaksi pj ON tra.id_transaksi = pj.id_transaksi AND pj.penjamin_utama = 't'
            //         JOIN penjamin using(id_penjamin)
            //         where
            //         '1'='1'
            //         $krieriakdpasien
            //         $criterialunas
            //         $criteriatutup
            //         $krierianama
            //         AND date(tra.tgl_transaksi) between date('$input->caritgl1') and date('$input->caritgl2')
            //         AND pj.id_penjamin='2'
            //         order by tra.id_transaksi desc
            //     limit '$input->jmlpasiencari'
            // ";

            $query = "SELECT
                DISTINCT(no_sjp) as nosep,
                * 
            FROM
                penjamin_transaksi
                JOIN transaksi USING ( id_transaksi ) 
                JOIN pasien USING (no_rm)
                join penjamin USING (id_penjamin)
            WHERE
                    '1'='1'
                    $krieriakdpasien
                    $criteriatutup
                    $krierianama
                AND id_penjamin = '2' 
                AND penjamin_utama = 't'
                AND date(tgl_transaksi) between date('$input->caritgl1') and date('$input->caritgl2')
                order by id_transaksi DESC
                $limitnya
                ";

            // echo"$query";
            // // exit();


            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Berhasil Cari Pasien";
                    $output['data']     = $this->db->query($query)->getResult();
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->query($query)->getResult();
                }
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }
    public function carisep()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'kdpasiencariKlaim',
            'caritgl1',
            'caritgl2',
            'caristatuslunas',
            'jmlpasiencari'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            if ($input->caristatustutuptransaksi == 'all') {
                $criteriatutup = "";
            } elseif ($input->caristatustutuptransaksi == 't') {
                $criteriatutup = "AND transaksi.tgl_tutup is not null";
            } elseif ($input->caristatustutuptransaksi == 'f') {
                $criteriatutup = "AND transaksi.tgl_tutup is null";
            }


            if ($input->caristatuslunas == 'all') {
                $criterialunas = "";
            } else {
                $criterialunas = "AND transaksi.lunas='$input->caristatuslunas'";
            }

            if ($input->kdpasiencariKlaim == null || $input->kdpasiencariKlaim == '') {
                $krierianama = "AND pasien.nama ilike '%$input->nmpasiencariKlaim%'";
                $krieriakdpasien = "";
            } else {
                $krierianama = "";
                $krieriakdpasien = "AND transaksi.no_rm = '$input->kdpasiencariKlaim'";
            }

            if ($input->jmlpasiencari == 'all') {
                $limitnya = "";
            } else {
                $limitnya = "limit $input->jmlpasiencari";
            }

            // cari idtransaksi dengan tgl
            $querytransaksi = $this->db->query("SELECT array_agg(x.arrayid_transaksi) as idtransaksi FROM (
                SELECT
                            DISTINCT(id_transaksi) as arrayid_transaksi
                        FROM
                            penjamin_transaksi
                            JOIN transaksi USING ( id_transaksi ) 
                            JOIN pasien USING (no_rm)
                            join penjamin USING (id_penjamin)
                        WHERE
                                '1'='1'
                                $krieriakdpasien
                                $criterialunas
                                $criteriatutup
                                $krierianama
                            AND id_penjamin = '2' 
                            AND penjamin_utama = 't'
                            AND date(tgl_transaksi) between date('2024-07-01') and date('2024-07-18')
                            order by id_transaksi DESC) as x");

            foreach ($querytransaksi->getResult() as $datatranskasi);
            $a = $datatranskasi->idtransaksi;
            $a1 = str_replace("{", "", $a);
            $a2 = str_replace("}", "", $a1);

            // cari sep dengan hasil query transaksi by tanggal
            $querynosjp = $this->db->query("SELECT
                array_agg( no_sjp )  as nosep
        FROM
            penjamin_transaksi 
        WHERE
            id_penjamin = '2'
            and no_sjp <> ''
            and id_transaksi in ($a2)
            ");

            foreach ($querynosjp->getResult() as $rowquerynosjp);
            $b = $rowquerynosjp->nosep;
            $b1 = str_replace("{", "", $b);
            $b2 = str_replace("}", "", $b1);
            $b3 = str_replace(",", "','", $b2);
            $b4 = "'$b3'";
            echo "SELECT
        DISTINCT(no_sjp) as nosep,
        * 
    FROM 
        transaksi 
        JOIN penjamin_transaksi USING ( id_transaksi ) 
        JOIN pasien USING (no_rm)
        join penjamin USING (id_penjamin)
    WHERE
            '1'='1'
            $krieriakdpasien
            $criterialunas
            $criteriatutup
            $krierianama
        AND id_penjamin = '2' 
        AND penjamin_utama = 't'
        AND date(tgl_transaksi) between date('$input->caritgl1') and date('$input->caritgl2')
        order by id_transaksi DESC
        $limitnya";
            exit();

            // cek sep dan join dengan id transaksi limit 1
            $querytranskasi = $this->db->query("SELECT
        * 
    FROM
        transaksi
        JOIN penjamin_transaksi using(id_transaksi)
        where penjamin_transaksi.no_sjp in ($b4)
            ");

            foreach ($querytranskasi->getResult() as $rowquerytranskasi);
            $c = $rowquerytranskasi->nosep;
            $c1 = str_replace("{", "", $c);
            $c2 = str_replace("}", "", $c1);

            //

            //    $a= array_push($datatranskasi->arrayid_transaksi,"blue","yellow");
            //     echo"$a";
            // $query = $this->db->query("SELECT
            //                                         distinct(no_sjp)
            //                                     FROM
            //                                         penjamin_transaksi 
            //                                     WHERE
            //                                         id_penjamin = '2'
            //                                         and no_sjp <> ''

            //                                      ");


            // foreach ($query->getResult() as $datasep) {
            //     echo "".$datasep->no_sjp.""."<br>";
            // }

            // exit();
            // if ($this->db->simpleQuery($query)) { //true
            //     $queryx = $this->db->query($query)->getResult();
            //     if (!empty($queryx)) {
            //         $output['status']   = "sukses";
            //         $output['code']     = "00";
            //         $output['pesan']    = "Berhasil Cari Pasien";
            //         $output['data']     = $this->db->query($query)->getResult();
            //     } else {
            //         $output['status']   = "sukses";
            //         $output['code']     = "XX";
            //         $output['pesan']    = "";
            //         $output['data']     = $this->db->query($query)->getResult();
            //     }
            // } else {
            //     $output['code']     = "01";
            //     $output['status']   =  'gagal cari, hubungi admin';
            //     $output['pesan']    = $this->db->error()['message'];
            // }
        }
        //echo json_encode($output);
    }


    public function detailtransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            // $query = "SELECT * 
            // FROM
            //     detail_transaksi join produk using(id_produk)
            //     join kunjungan using(id_kunjungan)
            //     join unit using(id_unit)
            //     where detail_transaksi.id_transaksi='$input->id_transaksi' 
            // ";
            $query = "SELECT 
            produk.kd_produk,
            dt.tgl_input,
            dt.diskon,
            unit.nama_unit,
            dt.id_produk,
            produk.nama_produk,
            dt.qty,
            dt.harga,
            dt.total_harga,
            dt.id_detail_transaksi,
            x.namapeg,
            kunjungan.tgl_masuk
        FROM
            detail_transaksi dt
            join kunjungan using(id_kunjungan)
            join unit using(id_unit)
            join produk using(id_produk)
            LEFT JOIN (
                            SELECT ARRAY_AGG
                        ( peg.nama_pegawai ) AS namapeg,
                        dtx.id_detail_transaksi 
                    FROM
                        detail_transaksi dtx
                        JOIN detail_component dc ON dtx.id_detail_transaksi = dc.id_detail_transaksi
                        JOIN pegawai peg ON dc.id_pegawai = peg.id_pegawai 
                    WHERE
                        dtx.id_transaksi = '$input->id_transaksi' 
                    GROUP BY
                        dtx.id_detail_transaksi 
            ) x ON dt.id_detail_transaksi = x.id_detail_transaksi 
        WHERE
            dt.id_transaksi = '$input->id_transaksi'
            order by dt.id_detail_transaksi desc
            ";
            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    // $output['pesan']    = "Data Detail Transaksi";
                    $output['data']     = $this->db->query($query)->getResult();
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->query($query)->getResult();
                }
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }
    public function KasirG_simpanTransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'in_id_transaksi',
            'in_id_kunjungan',
            'in_id_produk',
            'in_tgl_input',
            'in_id_tarif',
            'in_qty',
            'in_diskon',
            'in_id_user',
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            if ($input->in_diskon == '') {
                $diskon = 0;
            } else {
                $diskon = $input->in_diskon;
            }
            $this->db->transStart();
            //insert detail kunjungan
            $querydetailkunjungan = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, qty) 
            VALUES ('$input->in_id_kunjungan', '$input->in_id_produk','$input->in_qty') returning id_detail_kunjungan";
            $detail_kunjungan = $this->db->query($querydetailkunjungan)->getRow()->id_detail_kunjungan;
            // echo"$querydetailkunjungan";
            // return;
            //insert detail transaksi
            $querydetailtransaksi = "INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, tgl_input, id_tarif, qty, diskon, id_detail_kunjungan) 
            VALUES ('$input->in_id_transaksi', '$input->in_id_kunjungan', '$input->in_id_produk', '$input->in_tgl_input','$input->in_id_tarif','$input->in_qty','$diskon','$detail_kunjungan') returning id_detail_transaksi";
            //    echo"$querydetailtransaksi";
            //    exit();
            $id_detail_transaksi = $this->db->query($querydetailtransaksi)->getRow()->id_detail_transaksi;
            // echo"$id_detail_transaksi";
            // exit();
            //INSERT KE AC JURNAL
            // $sumtotal = $this->db->query("select sum(harga) as total from detail_component where id_detail_transaksi='$id_detail_transaksi'")->getRow()->total;
            // $codegl = "PNJ";
            // $idgl = "".$codegl."-".$input->in_id_transaksi."-".$id_detail_transaksi."";
            // // echo"$idgl";
            // // exit();
            // $lastidjurnal =  $this->db->query("INSERT INTO ac_jurnal (id_gl, tgl_jurnal, keterangan, jumlah, id_pegawai) 
            // VALUES ('$idgl', '$input->in_tgl_input', 'Penjualan $input->in_id_transaksi','$sumtotal','$input->in_id_user') returning id_jurnal")->getRow()->id_jurnal;
            //INSERT KE JURNAL DETAIL
            // $qinsertjurnaildetail = "SELECT
            //                                 jenis_component.jenis_component,
            //                                 detail_component.id_jenis_component,
            //                                 detail_component.id_detail_transaksi,
            //                                 detail_component.harga_asli,
            //                                 detail_component.diskon_rupiah,
            //                                 detail_component.harga,
            //                                 detail_component.id_pegawai,
            //                                 map_componen_account.normal,
            //                                 map_componen_account.id_acc
            //                         FROM
            //                         detail_component 
            //                         JOIN jenis_component using(id_jenis_component)
            //                         JOIN account on account.id_acc=jenis_component.id_acc
            //                                     JOIN map_componen_account on detail_component.id_jenis_component=map_componen_account.id_jenis_component
            //                         WHERE
            //                         detail_component.id_detail_transaksi = '$id_detail_transaksi '
            //                                     and map_componen_account.kondisi='1';";
            // // echo"$qinsertjurnaildetail";
            // // exit();
            // $insertjurnaildetail = $this->db->query($qinsertjurnaildetail);
            // foreach ($insertjurnaildetail->getResult() as $rowinsertjurnaildetail) {
            //     // echo"$rowinsertjurnaildetail->jenis_component";
            //     // exit();
            //     if ($rowinsertjurnaildetail->normal == 'KREDIT') {
            //         $insertdetailjurnal = $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan,debit, kredit, id_pegawai, date_created) 
            //     VALUES ('$lastidjurnal', '$rowinsertjurnaildetail->id_acc', 'Penjualan $input->in_id_transaksi $rowinsertjurnaildetail->jenis_component','0','$rowinsertjurnaildetail->harga','$input->in_id_user','$input->in_tgl_input')");
            //     }
            //      else {
            //         $insertdetailjurnal = $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan,debit, kredit, id_pegawai, date_created) 
            //     VALUES ('$lastidjurnal', '$rowinsertjurnaildetail->id_acc', 'Penjualan $input->in_id_transaksi $rowinsertjurnaildetail->jenis_component','$rowinsertjurnaildetail->harga','0','$input->in_id_user','$input->in_tgl_input')");
            //     }
            // }


            $this->db->transComplete();

            // if ($this->db->simpleQuery($query)) {
            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses menambahkan transaksi";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal memasukan transaksi";
                //$output['error']    = $this->db->error()['message'];
                //echo"$query";
            }
        }
        $this->hasil($output);
    }

    public function datapenindakbyiddettransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT
            array_agg(nama_pegawai) as namapeg
        FROM
            detail_component
            JOIN pegawai USING ( id_pegawai ) 
        WHERE
            detail_transaksi.id_transaksi='$input->id_transaksi' 
            ";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Data Detail Transaksi";
                    $output['data']     = $this->db->query($query)->getResult();
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->query($query)->getResult();
                }
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }

    public function penatajasa_detailpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['norm'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $norm           = $input->norm;
            $nmapasien      = $input->nmpasien;
            $nik            = $input->nik;
            $unit           = $input->poli;
            if (($unit == '') || ($unit == '0')) {
                $paramunit = '';
            } else {
                $paramunit = "AND k.id_unit = '" . $unit . "'";
            }
            $jml            = $input->jml;
            $tgl_transaksi  = $input->tglkunj;
            //$tgl_transaksi  = '2023-05-24';

            $query = "
                SELECT
                    tr.id_transaksi,
                    k.id_kunjungan,
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
                    P.nik,
                    k.posting,
                    peg.nama_pegawai
                FROM
                    transaksi tr
                    INNER JOIN pasien P ON tr.no_rm = P.no_rm
                    INNER JOIN kunjungan k ON k.id_transaksi = tr.id_transaksi
                    INNER JOIN unit u ON u.id_unit = k.id_unit
                    INNER JOIN penjamin_transaksi pt ON pt.id_transaksi = tr.id_transaksi
                    INNER JOIN penjamin penj ON penj.id_penjamin = pt.id_penjamin
                    INNER JOIN pegawai peg ON peg.id_pegawai=k.id_pegawai
                WHERE
                    u.jenis_unit = '3'    -->> 
                    AND upper(p.nama) like UPPER('" . $nmapasien . "%') AND tr.no_rm like UPPER('" . $norm . "%') AND P.nik like '%" . $nik . "%' " . $paramunit . "
                    AND DATE(tr.tgl_transaksi) = '" . $tgl_transaksi . "' 
                    LIMIT '" . $jml . "'";

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

    public function cariproduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kel =  $this->db->query("SELECT
                                        prod.id_produk,
                                        prod.nama_produk
                                    FROM
                                        produk_unit pu
                                        JOIN produk prod ON pu.id_produk = prod.id_produk 
                                    WHERE
                                        id_unit = '3001'
                                        and prod.nama_produk ilike '%$input->id%' ");
        $output['status'] = 'sukses';
        $output['data'] = $kel->getResult();

        echo json_encode($output);
    }
    public function produkunitall()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kel =  $this->db->query("SELECT
                                        prod.id_produk,
                                        prod.nama_produk
                                    FROM
                                        produk_unit pu
                                        JOIN produk prod ON pu.id_produk = prod.id_produk 
                                    WHERE
                                        id_unit = '3001'");
        $output['status'] = 'sukses';
        $output['data'] = $kel->getResult();

        echo json_encode($output);
    }
    public function penatajasa_detailtindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['id_kunj'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = " SELECT dk.id_detail_tindakan, dk.id_produk, p.kd_produk, p.nama_produk, dk.ketrangan, dk.qty FROM detail_kunjungan dk INNER JOIN produk p ON p.id_produk = dk.id_produk WHERE dk.id_kunjungan = '$input->id_kunj' ORDER BY dk.id_detail_tindakan ASC";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['pesan']    = "Data ditemukan";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "gagal";
                    $output['pesan']    = "Data tidak ditemukan";
                    $output['data']     = $queryx;
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'Gagal, Hubungi Admin!!';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function penatajasa_simpanProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunj',
            'idprd',
            'ket',
            'qty',
        ];

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "INSERT INTO detail_kunjungan (id_kunjungan, id_produk, ketrangan, qty) VALUES ('$input->id_kunj', '$input->idprd', '$input->ket', '$input->qty')";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses menambahkan produk";
            } else {
                $output['pesan']    = "Gagal memasukan produk";
            }
        }
        $this->hasil($output);
    }

    public function penatajasa_deleteProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_tindakan',
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "DELETE FROM detail_kunjungan WHERE id_detail_tindakan = '$input->id_detail_tindakan'";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Hapus Produk";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Produk";
            }
        }
        $this->hasil($output);
    }

    public function jenisbayar()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran order by id_jenis_pembayaran asc ");
        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }
    public function jenisbayardeposit()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran  where id_jenis_pembayaran='4' order by id_jenis_pembayaran asc ");
        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }
    public function selecttellerkas()
    {
        $input = json_decode(file_get_contents('php://input'));
        $idkas =  $this->db->query("SELECT id_kas from users where id_user='$input->id_user'")->getRow()->id_kas;
        // $bayar =  $this->db->query("SELECT * FROM ac_kas where teller='f' or id_kas='$idkas' order by teller desc");
        // echo"$input->id";
        // exit();
        if ($input->id == 1 || $input->id == '1' || $input->id == '4' || $input->id == '4') {
            $bayar =  $this->db->query("SELECT
            * 
        FROM
            ac_kas 
        WHERE
            id_kas='$idkas'");
            // echo"a";
            // echo"$input->id";

        } else {
            $bayar =  $this->db->query("SELECT
            * 
        FROM
            ac_kas 
        WHERE
            id_jenis_pembayaran='$input->id'");
            // echo"b"; 
            // echo"$input->id";

        }



        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }
    public function jenisbayarpelunasan()
    {
        $bayar =  $this->db->query("SELECT * FROM jenis_pembayaran where id_jenis_pembayaran not in ('2','4') order by id_jenis_pembayaran asc ");
        $output['status'] = 'sukses';
        $output['data'] = $bayar->getResult();
        echo json_encode($output);
    }

    public function pembayaran()
    {
        $input = json_decode(file_get_contents('php://input'));
        $x =  $this->db->query("SELECT * FROM pembayaran where id_jenis_pembayaran='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }

    public function apakahkartu()
    {
        $input = json_decode(file_get_contents('php://input'));
        $x =  $this->db->query("SELECT * FROM pembayaran where id_pembayaran='$input->id' ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }

    // public function mod_lookkup()
    // {
    //     return view('view/modal/kasirgeneral/mod_lookkup');
    // }

    public function mod_deposit()
    {
        return view('view/modal/kasirgeneral/mod_deposit');
    }

    public function mod_bataltransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_bataltransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
        // return view('view/modal/kasirgeneral/mod_bataltransaksi');
    }
    public function cetakbill_old()
    {
        $input = json_decode(file_get_contents('php://input'));
        // var_dump($input);
        // exit();
        $validtrans   = $_POST['idtransaksi'];
        // echo"$validtrans";
        // exit();
        $querypasien = $this->db->query("SELECT * FROM
        transaksi
        JOIN pasien USING ( no_rm )
        JOIN kelurahan ON pasien.kd_kelurahan_ktp = kelurahan.kd_kelurahan
        JOIN kecamatan USING ( kd_kecamatan )
        JOIN kabupaten USING ( kd_kabupaten )
        JOIN propinsi USING ( kd_propinsi ) 
     WHERE
         transaksi.id_transaksi = '$validtrans'");

        $querydokterkunjungan = $this->db->query("SELECT
        distinct(nama_pegawai)
        FROM
        transaksi
        JOIN kunjungan USING ( id_transaksi ) 
        JOIN pegawai using(id_pegawai)
        WHERE
        id_transaksi = '$validtrans'
        and pegawai.jenis_pegawai='1'");

        $query = $this->db->query("SELECT
        kunjungan.tgl_masuk,
        unit.nama_unit,
        produk.nama_produk,
        detail_transaksi.qty,
        detail_transaksi.total_harga
    FROM
        detail_transaksi
        JOIN kunjungan USING ( id_kunjungan ) 
        JOIN produk USING (id_produk)
        JOIN unit USING (id_unit)
    WHERE
        detail_transaksi.id_transaksi = '$validtrans'
        order by kunjungan.tgl_masuk,unit.nama_unit asc");

        $querytotal = $this->db->query("SELECT sum(total_harga) as totalharga FROM
        detail_transaksi
        WHERE
        id_transaksi = '$validtrans'");

        $querybayar = $this->db->query("SELECT * from bayar join pembayaran using(id_pembayaran) WHERE id_transaksi = '$validtrans'");
        // var_dump($querypasien);
        // exit();
        $html = "<html>
            <body>
            <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
            <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM
                <p style='font-size:30px;color:#14B937'>DARMAYU</p>
            </td>
        </tr>
        <tr>
            <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
            <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
    </table>
    <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>

  

          <table align='center' style='border:1px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querypasien->getResult() as $datatransaksi); {
            if ($datatransaksi->jenis_kelamin == 'f') {
                $kelamin = "Perempuan";
            } else {
                $kelamin = "Laki-laki";
            }
            $tgltransaksi = substr($datatransaksi->tgl_transaksi, 0, 10);
            $html .= "<tr>
                <td style='width: 150px;'>No Transaksi</td>
                <td style='width: 5px;'>:</td>
                <td>#" . $datatransaksi->id_transaksi . "</td>
                </tr>
                <tr>
                <td>Tgl Transaksi</td>
                <td>:</td>
                <td>" . date_indo($tgltransaksi) . "</td>
                </tr>
                <tr>
                <td>Nama</td>
                <td>:</td>
                <td>$datatransaksi->nama</td>
                </tr>
                <tr>
                <td>Kelamin</td>
                <td>:</td>
                <td>$kelamin</td>
                </tr>
                <tr>
                <td>Tgl. Lahir</td>
                <td>:</td>
                <td>" . date_indo($datatransaksi->tgl_lahir) . "</td>
                </tr>
                <tr>
                <td>No.Rekam Medis</td>
                <td>:</td>
                <td>$datatransaksi->no_rm</td>
                </tr>
                <tr>
                <td valign='top'>Alamat</td>
                <td valign='top'>:</td>
                <td valign='top'>" . $datatransaksi->alamat_ktp . ", " . $datatransaksi->kelurahan . ", " . $datatransaksi->kecamatan . "," . $datatransaksi->kabupaten . " " . $datatransaksi->propinsi . " </td>
                </tr>";
        }
        $html .= "</table>
        <br>
          <table border='1' align='center'  style='border:1px solid black;border-collapse:collapse;width:100%'>
            <tr>
            <td style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>No</td>
            <td style='border:1px solid black;text-align: left;font-weight: bold;'>Unit</td>
            <td style='border:1px solid black;text-align: left;font-weight: bold;'>Deskripsi</td>
            <td style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Jumlah</td>
            <td style='border:1px solid black;text-align: right;font-weight: bold;width:200px;'>Total</td>
            </tr>
            ";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $html .= "
            <tr>
            <td style='border:1px solid black;text-align: center;'>$no</td>
            <td style='border:1px solid black;'>$row->nama_unit</td>
            <td style='border:1px solid black;'>$row->nama_produk</td>
            <td style='border:1px solid black;text-align: center;'>$row->qty</td>
            <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->total_harga) . "</td>
            </tr>
            ";
            $no++;
        }
        foreach ($querytotal->getResult() as $rowtotal) {
            $html .= "
            <tr>
            <td style='text-align: right;font-weight: bold' colspan='4'>Total Biaya</td>
            <td  style='text-align: right;font-weight: bold'>Rp. " . format_ribuan($rowtotal->totalharga) . "</td>
            </tr>
            ";
            $no++;
        }
        foreach ($querybayar->getResult() as $rowtotalbayar) {
            $html .= "
            <tr>
            <td style='border:1px solid black;text-align: right;font-weight: bold' colspan='4'>" . $rowtotalbayar->deskripsi_pembayaran . "</td>
            <td  style='border:1px solid black;text-align: right;font-weight: bold;'><i>Rp. " . format_ribuan($rowtotalbayar->jumlah) . "<i></td>
            </tr>
            ";
            $no++;
        }
        $html .= "
            </table>
            <br>
            <div style='border:0px solid black;border-collapse:collapse;width:100%';font-size:8px><u><b>Dokter</b></u> :</div>
            <table style='border:0px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querydokterkunjungan->getResult() as $rowquerydokterkunjungan) {
            $html .= "
            <tr>
            <td style='font-size:10px'>$rowquerydokterkunjungan->nama_pegawai</td>
            </tr>";
        }
        $html .= "</table>
            </body>
            </html>";
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'
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
        $mpdf->Output("cetak_bill.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');


    }
    public function cetakkwitansi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));
        $idtransaksi   = $_POST['idtransaksi'];
        $idbayar = $_POST['idbayar'];
        $nominal = $_POST['idnominal'];
        $namauser = $_POST['val_namauser'];
        $namapas = $_POST['val_namapas'];
        $freenama = $_POST['val_freenama'];
        $freeuraian = $_POST['val_freeuraian'];
        $iduser = $_POST['val_iduser'];
        $tglsekarang = date("Y-m-d H:i:s");

        //     $querymaxkwitansi = $this->db->query("SELECT * FROM
        //     transaksi
        //     JOIN pasien USING ( no_rm )
        //     JOIN kelurahan ON pasien.kd_kelurahan_ktp = kelurahan.kd_kelurahan
        //     JOIN kecamatan USING ( kd_kecamatan )
        //     JOIN kabupaten USING ( kd_kabupaten )
        //     JOIN propinsi USING ( kd_propinsi ) 
        //  WHERE
        //      transaksi.id_transaksi = '$idtransaksi'");

        $queryinsertnomorkwitansi = "INSERT INTO kwitansi (id_transaksi, id_pembayaran, nominal, id_user, nama_kwitansi,deskripsi)
                                                        VALUES (
                                                        '$idtransaksi',
                                                                '$idbayar',
                                                                '$nominal',
                                                                '$iduser',
                                                                '$freenama',
                                                                '$freeuraian'
                                                         ) returning id_kwitansi";
        //  echo"$queryinsertnomorkwitansi";
        //  exit();                                                
        $id_kwitansi = $this->db->query($queryinsertnomorkwitansi)->getRow()->id_kwitansi;

        $html = "<html>
            <body>
            <div>
            <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
            <tr>
                <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
                <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                    RUMAH SAKIT UMUM
                    <p style='font-size:30px;color:#14B937'>DARMAYU</p>
                </td>
            </tr>
            <tr>
                <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
            </tr>
            <tr>
                <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
            </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
    
    
    <table border='0' style='padding-top: 0px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
    <tr>
        <td style='width: 600px;'><div style='padding-top: 0px;padding-bottom:10px;text-align:left;font-weight: bold;font-style: italic;text-decoration: underline;'>KUITANSI Nomor #$id_kwitansi</div></td>
        <td style='width: 400px;text-align:right'><div style='padding-top: 0px;padding-bottom:10px;text-align:right;font-weight: bold;font-style: italic;text-decoration: underline;'>No.Transaksi #$idtransaksi</div></td>
    </tr>
    </table>
    <table border='0' style='padding-top: 0px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td style='width: 150px;font-size:15px;'>Sudah Terima dari</td>
            <td>:</td>
            <td style='width: 500px;font-size:15px;'>$freenama</td>
        </tr>
        <tr>
            <td style='width: 100px;font-size:15px;'>Jumlah Uang</td>
            <td>:</td>
            <td style='width: 500px;font-size:15px;'> <b>Rp. " . format_ribuan($nominal) . "</b></td>
        </tr>
        <tr>
            <td valign='top' style='width: 100px;font-size:15px'>Pembayaran</td>
            <td valign='top'>:</td>
            <td valign='top' style='width: 500px;font-size:15px;'>$freeuraian</td>
        </tr>
    </table>
    <table border='0' style='padding-top: 0px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td valign='top'>Terbilang : </td>
            <td valign='top' style='width: 400px;font-size:15px;text-align:left'> <b>" . terbilang($nominal) . " Rupiah</b></td>
        </tr>
    </table>
   
    <table border='0' style='padding-top: 5px;font-size: 14;font-family: Arial, Helvetica, sans-serif;'>
        
        <tr>
            <td style='width: 350px;font-size:15px;text-align:center'>

            </td>
            <td style='width: 350px;text-align:center'>
            " . date_indo(substr($tglsekarang, 0, 10)) . "<br>
                Operator <br>
                <br><br><br>
                <u>$namauser</u>
            </td>
        </tr>
    </table>


</div>
            </body>
            </html>";
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'A4',
            'format' => [90, 160]
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
    public function laporanpendapatanrs()
    {
        // header("Content-type: application/vnd-ms-excel");
        // header("Content-Disposition: attachment; filename=Laporan Pendapatan Rs.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $replacetglwal = str_replace("/", "-", $_POST['tglawal']);
        $dateawal = date_create($replacetglwal);
        $tglawal = date_format($dateawal, "Y-m-d");

        $replacetglakhir = str_replace("/", "-", $_POST['tglakhir']);
        $dateakhir = date_create($replacetglakhir);
        $tglakhir = date_format($dateakhir, "Y-m-d");

        // $tglawal   = $_POST['tglawal'];
        // $tglakhir = $_POST['tglakhir'];
        $id_jenis_pembayaran_laporan = $_POST['id_jenis_pembayaran_laporan'];
        $id_pembayaran_laporan = $_POST['id_pembayaran_laporan'];
        $id_userpaid = $_POST['id_userpaid'];
        $tglawal_shift1 = $_POST['tglawal_shift1'];
        $tglawal_shift2 = $_POST['tglawal_shift2'];
        $tglawal_shift3 = $_POST['tglawal_shift3'];
        $tglakhir_shift1 = $_POST['tglakhir_shift1'];
        $tglakhir_shift2 = $_POST['tglakhir_shift2'];
        $tglakhir_shift3 = $_POST['tglakhir_shift3'];
        $tglsekarang = date("Y-m-d H:i:s");
        $shift_all = "false";
        $shift_all_2 = "false";

        $dt1         = date_create(date('Y-m-d', strtotime($tglawal)));
        $dt2         = date_create(date('Y-m-d', strtotime($tglakhir)));
        $date_diff     = date_diff($dt1, $dt2);
        $range         =  $date_diff->format("%a");

        $q_waktu = '';
        $q_shift = '';
        $q_shift2 = '';
        $q_shift3 = '';
        $t_shift = '';
        $t_shift2 = '';
        $t_shift3 = '';

        if ($id_pembayaran_laporan == 'all') {
            $idpembayaran = "";
        } else {
            $idpembayaran = "and id_pembayaran='$id_pembayaran_laporan'";
        }

        if ($id_userpaid == 'all') {
            $iduser = "";
            $namapegawai = "";
        } else {
            $iduser = "and bayar.id_user='$id_userpaid'";
            $namapegawai = $this->db->query("SELECT nama from users where id_user='$id_userpaid'")->getRow()->nama;;
        }

        // echo"$tglawal";echo"<br>";
        // echo"$tglakhir";echo"<br>";
        // echo"$id_jenis_pembayaran_laporan";echo"<br>";
        // echo"$id_pembayaran_laporan";echo"<br>";
        // echo"tglawal_shift1: ".$tglawal_shift1."";echo"<br>";
        // echo"$tglawal_shift2";echo"<br>";
        // echo"$tglawal_shift3";echo"<br>";
        // echo"$tglakhir_shift1";echo"<br>";
        // echo"$tglakhir_shift2";echo"<br>";
        // echo"$tglakhir_shift3";echo"<br>";
        // exit();

        if ($tglawal_shift1 == 'true' && $tglawal_shift2 == 'true' && $tglawal_shift3 == 'true' && $tglakhir_shift1 == 'true' && $tglakhir_shift2 == 'true' && $tglakhir_shift3 == 'true') {
            // echo"a";
            // exit();
            $q_waktu = " ((date(tgl_bayar)) between '" . $tglawal . "' and  '" . $tglakhir . "' ) or date(tgl_bayar) = '" . date('Y-m-d', strtotime($tglakhir . ' +1 day')) . "'  And Shift=4 ";
        } else {
            #GRUP COMBO 1
            if ($shift_all == 'true') {
                $q_shift =    " 
                                (
                                    (
                                        date(tgl_bayar) = '" . $tglawal . "' And Shift In (1,2,3)
                                    )     
                                    Or  
                                    (
                                        date(tgl_bayar) = '" . date('Y-m-d', strtotime($tglawal . ' +1 day')) . "'  And Shift=4
                                ) 

                            ";
                $t_shift = 'SHIFT (1,2,3)';
            } else {
                if ($tglawal_shift1 == 'true' || $tglawal_shift2 == 'true' || $tglawal_shift3 == 'true') {
                    $s_shift = '';
                    if ($tglawal_shift1 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '1';
                    }
                    if ($tglawal_shift2 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '2';
                    }
                    if ($tglawal_shift3 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '3';
                    }
                    $q_shift .= " date(tgl_bayar) = '" . $tglawal . "'   And Shift In (" . $s_shift . ")";
                    if ($tglawal_shift3 == 'true') {
                        $q_shift = "(" . $q_shift . " Or  ((date(tgl_bayar))= '" . date('Y-m-d', strtotime($tglawal . ' +1 day')) . "'  And Shift=4) )  ";
                    }
                    $t_shift = 'SHIFT (' . $s_shift . ')';
                    $q_shift = $q_shift;
                }
            }

            #GRUP COMBO 2
            if ($shift_all_2 == 'true') {
                $q_shift2 =    " 
                                (
                                    (
                                        date(tgl_bayar) = '" . $tglakhir . "' And shift In (1,2,3)
                                    )     
                                    Or  
                                    (
                                        date(tgl_bayar) = '" . date('Y-m-d', strtotime($tglakhir . ' +1 day')) . "'  And Shift=4
                                ) 

                            ";
                $t_shift2 = 'SHIFT (1,2,3)';
            } else {
                if ($tglakhir_shift1 == 'true' || $tglakhir_shift2 == 'true' || $tglakhir_shift3 == 'true') {
                    $s_shift = '';
                    if ($tglakhir_shift1 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '1';
                    }
                    if ($tglakhir_shift2 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '2';
                    }
                    if ($tglakhir_shift3 == 'true') {
                        if ($s_shift != '') $s_shift .= ',';
                        $s_shift .= '3';
                    }
                    $q_shift2 .= " date(tgl_bayar) = '" . $tglakhir . "'   And Shift In (" . $s_shift . ")";
                    if ($tglakhir_shift3 == 'true') {
                        $q_shift2 = "(" . $q_shift2 . " Or  ((date(tgl_bayar))= '" . date('Y-m-d', strtotime($tglakhir . ' +1 day')) . "'  And Shift=4) )   ";
                    }
                    $t_shift2 = 'SHIFT (' . $s_shift . ')';
                    $q_shift2 = $q_shift2;
                }
            }


            # 3. RANGE PERIODE TGL BERBEDA > 1 HARI
            if ($range > 1) {
                $q_shift3 =    " OR (
                                (
                                    (
                                        date(tgl_bayar) between '" . date('Y-m-d', strtotime($tglawal . ' +1 day')) . "'  And '" . date('Y-m-d', strtotime($tglakhir . ' -1 day')) . "'  And Shift In (1,2,3)
                                    )     
                                    Or  
                                    (
                                        date(tgl_bayar) between '" . date('Y-m-d', strtotime($tglawal . ' +2 day')) . "'  And  '" . $tglakhir . "'  And Shift=4
                                    ) 
                                )
                            ";
            }

            $q_waktu = " ((" . $q_shift . ") OR ((" . $q_shift2 . ")) " . $q_shift3 . " )  ";
        }

        $query = $this->db->query("SELECT
                    *,pasien.nama as namapasien,users.nama as namausers 
                FROM
                    bayar 
                    left join transaksi using(id_transaksi)
                    join pembayaran using(id_pembayaran)
                    join jenis_pembayaran using(id_jenis_pembayaran)
                    join pasien using(no_rm)
                    left join users on users.id_user=bayar.id_user
                WHERE
                $q_waktu    
                $idpembayaran
                $iduser 
                order by tgl_bayar asc,id_transaksi");

        $jumlahnominal = $this->db->query("SELECT
                    sum(jumlah) as totaljumlah 
                FROM
                    bayar
                    LEFT JOIN transaksi USING ( id_transaksi )
                    JOIN pembayaran USING ( id_pembayaran )
                    JOIN pasien USING ( no_rm ) 
                WHERE
                $q_waktu
                $idpembayaran
                $iduser
                ");


        $tes = "SELECT
                * 
            FROM
                bayar 
                left join transaksi using(id_transaksi)
                join pembayaran using(id_pembayaran)
                join pasien using(no_rm)
                
            WHERE
            $q_waktu
            $idpembayaran
            $iduser
            order by tgl_bayar asc,id_transaksi";
        // echo"$tes";
        // exit();

        $tglawal_shift1 = $_POST['tglawal_shift1'];
        $tglawal_shift2 = $_POST['tglawal_shift2'];
        $tglawal_shift3 = $_POST['tglawal_shift3'];
        $tglakhir_shift1 = $_POST['tglakhir_shift1'];
        $tglakhir_shift2 = $_POST['tglakhir_shift2'];
        $tglakhir_shift3 = $_POST['tglakhir_shift3'];

        if ($tglawal_shift1 == 'true') {
            $v_shift1 = '1';
        } else {
            $v_shift1 = '';
        }

        if ($tglawal_shift2 == 'true') {
            $v_shift2 = '2';
        } else {
            $v_shift2 = '';
        }

        if ($tglawal_shift3 == 'true') {
            $v_shift3 = '3';
        } else {
            $v_shift3 = '';
        }

        if ($tglakhir_shift1 == 'true') {
            $v_shift1_x = '1';
        } else {
            $v_shift1_x  = '';
        }

        if ($tglakhir_shift2 == 'true') {
            $v_shift2_x = '2';
        } else {
            $v_shift2_x  = '';
        }

        if ($tglakhir_shift3 == 'true') {
            $v_shift3_x = '3';
        } else {
            $v_shift3_x  = '';
        }

        $html = "<html>
            <body>
            <div>
            <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
            <tr>
                <td rowspan='5' align='right' style='width: 130px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
                <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                    RUMAH SAKIT UMUM
                    <p style='font-size:30px;color:#14B937'>DARMAYU</p>
                </td>
            </tr>
            <tr>
                <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
            </tr>
            <tr>
                <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
            </tr>
        </table>
        <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
    
    <div style='text-align:center';paddibg-top:15px>Laporan Penerimaan Pasien $tglawal Shift ($v_shift1,$v_shift2,$v_shift3) sd $tglakhir Shift ($v_shift1_x,$v_shift2_x,$v_shift3_x) <br>$namapegawai</div>
    <br>
    <table border='1' style='font-family: Arial, Helvetica, sans-serif;border:1px solid black;border-collapse:collapse;width:100%'  >
    <tr>
    <td><b>No</b></td>
    <td><b>Tgl Bayar</b></td>
    <td><b>Jam Bayar</b></td>
    <td><b>Transaksi</b></td>
    <td><b>Shift</b></td>
    <td><b>No.Rm</b></td>
    <td><b>Pasien</b></td>
    <td><b>Pembayaran</b></td>
    <td><b>User</b></td>
    <td style='text-align:right'><b>Nominal</b></td>
    </tr>
    ";
        $no = 1;
        foreach ($query->getResult() as $row) {
            $tgl = substr($row->tgl_bayar, 0, 10);
            $waktu = substr($row->tgl_bayar, 11, 5);
            $html .= "<tr>
        <td>" . $no . "</td>
       <td>" . mediumdate_indo($tgl) . "</td>
       <td>" . $waktu . "</td>
       <td>$row->id_transaksi</td>
       <td>$row->shift</td>
       <td>$row->no_rm</td>
       <td>$row->namapasien</td>
       <td>" . $row->deskripsi_pembayaran . " </td>
       <td>$row->namausers</td>
       <td style='text-align:right;width:150px'><b>Rp. " . format_ribuan($row->jumlah) . "</b></td>
       </tr>
       ";
            $no++;
        };

        foreach ($jumlahnominal->getResult() as $rowjumlahnominal) {
            $html .= "<tr>
       <td colspan='9' style='text-align:right'><b>Jumlah<b></td>
       <td style='text-align:right'><b>Rp. " . format_ribuan($rowjumlahnominal->totaljumlah) . "</b></td>

       </tr>
       ";
        };

        $html .= "</table>
    

    

</div>
            </body>
            </html>";
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

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
    public function kunjunganpas()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
        DISTINCT(un.id_unit),
              un.nama_unit,
        kun.id_kunjungan,
              un.jenis_unit,
              CASE WHEN un.jenis_unit = 2 Then 'ranap' else 'rajal'
              END as coba,
              rip.nama_ruang,
              kam.nama_kamar,
              kun.posting,
              kun.tgl_masuk
    FROM
        transaksi tra
        JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi
        JOIN unit un ON kun.id_unit = un.id_unit and ( un.jenis_unit in ('1','2','3') or un.id_unit='7001' )
              LEFT JOIN kamar kam ON kam.id_kamar=kun.id_kamar
              LEFT JOIN ruang_inap rip ON rip.id_ruang=kam.id_ruang
    WHERE
        tra.id_transaksi = '$input->idtrans'
        -- AND kun.aktif='t'
              GROUP BY un.id_unit,kun.id_kunjungan,kam.nama_kamar,rip.nama_ruang;");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function kunjunganpas_unposting()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
        DISTINCT(un.id_unit),
              un.nama_unit,
        kun.id_kunjungan,
              un.jenis_unit,
              CASE WHEN un.jenis_unit = 2 Then 'ranap' else 'rajal'
              END as coba,
              rip.nama_ruang,
              kam.nama_kamar,
              kun.posting,
              kun.tgl_masuk,
              status_kunjungan,
              kun.aktif
    FROM
        transaksi tra
        JOIN kunjungan kun ON tra.id_transaksi = kun.id_transaksi and kun.status_kunjungan not in ('2')
        JOIN unit un ON kun.id_unit = un.id_unit and un.jenis_unit in ('1','2','3')
              LEFT JOIN kamar kam ON kam.id_kamar=kun.id_kamar
              LEFT JOIN ruang_inap rip ON rip.id_ruang=kam.id_ruang
    WHERE
        tra.id_transaksi = '$input->idtrans'
        -- AND kun.aktif='t'
              GROUP BY un.id_unit,kun.id_kunjungan,kam.nama_kamar,rip.nama_ruang;
       ");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function penjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        //     $kunj =  $this->db->query("SELECT
        //     * 
        // FROM
        //     penjamin_transaksi join penjamin using(id_penjamin)
        // WHERE
        //     id_transaksi = '$input->idtrans' order by penjamin_utama desc;
        //    ");
        $kunj =  $this->db->query("SELECT
    id_penjamin,nama_penjamin 
 FROM
     penjamin_transaksi join penjamin using(id_penjamin)
 WHERE
     id_transaksi='$input->idtrans' 
             GROUP BY id_penjamin,nama_penjamin");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function kelolapenjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT
        * 
    FROM
        penjamin
            where id_penjamin not in (SELECT
        id_penjamin
    FROM
        penjamin
        LEFT JOIN penjamin_transaksi USING ( id_penjamin ) 
    WHERE
        id_transaksi = '$input->idtrans')");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function getProduk()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_unit'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            //         $listProdukx = $this->db->query("SELECT P.id_produk,P.kd_produk,P.nama_produk,un.nama_unit,tar.harga,tar.id_tarif
            //         FROM
            //        produk
            //        P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk
            //            INNER JOIN tarif tar ON tar.id_produk=pu.id_produk
            //        INNER JOIN unit un ON un.id_unit = pu.id_unit 
            //    WHERE pu.id_unit = '$input->id_unit'");

            $listProduk = $this->db->query("SELECT 
            P.id_produk,
            P.kd_produk,
            P.nama_produk,
            un.nama_unit,
            tar.harga,
            tar.id_tarif,
            tar.id_penjamin 
        FROM
            produk
            P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk
            INNER JOIN tarif tar ON tar.id_produk = pu.id_produk
            INNER JOIN unit un ON un.id_unit = pu.id_unit 
        WHERE
            pu.id_unit = '$input->id_unit' and id_penjamin='$input->id_penjamin'");

            if ($listProduk->getNumRows() > 0) {
                $output['status']   = "sukses";
                $output['pesan']    = "Produk ditemukan";
                $output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Produk tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    public function mod_lookkup_jas()
    {
        $data = json_decode($_GET['data']);
        $id_detail_transaksi  = str_replace('"', '', json_encode($data->id_detailtransaksi));
        // var_dump($data->id_detailtransaksi);
        // exit;
        $query =  $this->db->query("SELECT
        dt.id_detail_transaksi,
        tar.id_tarif,
        pr.id_produk,
        pr.kd_produk,
        pr.nama_produk,
        jc.jenis_component,
        tc.operator,
        dc.harga,
        peg.nama_pegawai
    FROM
        detail_transaksi dt
        JOIN tarif tar ON dt.id_tarif = tar.id_tarif 
        JOIN produk pr on tar.id_produk = pr.id_produk
        JOIN detail_component dc ON dt.id_detail_transaksi=dc.id_detail_transaksi
        JOIN tarif_component tc ON tc.id_tarif=tar.id_tarif and dc.id_jenis_component=tc.id_jenis_component
        JOIN jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
        LEFT JOIN pegawai peg ON peg.id_pegawai=dc.id_pegawai
    WHERE
        dt.id_detail_transaksi='$id_detail_transaksi'
             ");
        $outputx['data'] = $query->getResult();

        $data = json_decode(json_encode($outputx), true);

        return view('view/modal/kasirgeneral/mod_lookkup_jas', $data);
    }
    public function mod_lookkup_jas2()
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

        return view('view/modal/kasirgeneral/mod_lookkup_jas', $data);
    }
    public function mod_lookkup_penatajasa()
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

        return view('view/modal/kasirgeneral/mod_lookkup_penatajasa', $data);
    }
    public function pegawaibyid()
    {
        $input = json_decode(file_get_contents('php://input'));
        $kunj =  $this->db->query("SELECT * from pegawai where jenis_pegawai = '1'");
        //echo"$a";
        $output['status'] = 'sukses';
        $output['data'] = $kunj->getResult();

        echo json_encode($output);
    }
    public function selectdetailcomponent()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detailtransaksi'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {

            $listProduk = $this->db->query("SELECT
        dc.id_detail_transaksi,
        dc.harga_asli, 
        dc.diskon_rupiah,
        dc.diskon_persen * 100 as diskon_persen,
        dt.id_detail_transaksi,
        jc.id_jenis_component,
        tar.id_tarif,
        pr.id_produk,
        pr.kd_produk,
        pr.nama_produk,
        jc.jenis_component,
        tc.operator,
        dc.harga,
        peg.nama_pegawai,
        peg.id_pegawai,
        jc.edit
    FROM
        detail_transaksi dt
        JOIN tarif tar ON dt.id_tarif = tar.id_tarif 
        JOIN produk pr on tar.id_produk = pr.id_produk
        JOIN detail_component dc ON dt.id_detail_transaksi=dc.id_detail_transaksi
        JOIN tarif_component tc ON tc.id_tarif=tar.id_tarif and dc.id_jenis_component=tc.id_jenis_component
        JOIN jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
        LEFT JOIN pegawai peg ON peg.id_pegawai=dc.id_pegawai
    WHERE
        dt.id_detail_transaksi='$input->id_detailtransaksi'");

            if ($listProduk->getNumRows() > 0) {
                $output['status']   = "sukses";
                //$output['pesan']    = "Component ditemukan";
                $output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Componen tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    public function updatedetailcomponentransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $nominal = str_replace(".", "", $input->val_nominalubah);
        //harga total
        // $diskon_persen = $this->db->query("SELECT diskon_persen from detail_component 
        //     WHERE
        //         id_detail_transaksi = '$input->id_detail_transaksi' 
        //         AND id_jenis_component = '$input->id_jenis_component'
        //         ")->getRow()->diskon_persen;
        $diskon_persen = 0;
        if ($diskon_persen > 0) {
            $diskonrupiah = $nominal * $diskon_persen;
            $diskon_persen = $diskon_persen;
        } else {
            $diskonrupiah = 0;
            $diskon_persen = 0;
        }
        // echo"$nominal<br>";
        // echo"$diskonrupiah";
        // exit();
        $jumlah = $nominal - $diskonrupiah;
        // echo"$jumlah";
        // exit();
        $updatecomponen = "UPDATE detail_component 
                                            SET diskon_rupiah='$diskonrupiah', diskon_persen='$diskon_persen', harga='$jumlah'
                                            WHERE
                                                id_detail_transaksi = '$input->id_detail_transaksi' 
                                                AND id_jenis_component = '$input->id_jenis_component'
                                                ";
        // echo"$updatecomponen";

        if ($this->db->simpleQuery($updatecomponen)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil ubah nominal";
        } else {
            $output['status']   = "gagal";
            $output['pesan'] = "gagal";
        }

        $this->hasil($output);
    }
    public function updatedetailcomponentransaksidiskon()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi',
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $diskonpersen = $input->val_nominalubah;

        //harga asli
        $selectharga = $this->db->query("SELECT harga_asli from detail_component 
        WHERE
            id_detail_transaksi = '$input->id_detail_transaksi' 
            AND id_jenis_component = '$input->id_jenis_component'
            ")->getRow()->harga_asli;

        //harga total
        $harga = $this->db->query("SELECT harga from detail_component 
        WHERE
            id_detail_transaksi = '$input->id_detail_transaksi' 
            AND id_jenis_component = '$input->id_jenis_component'
            ")->getRow()->harga;


        $persenrupiah = $selectharga *  ($diskonpersen / 100);
        $persen = ($diskonpersen / 100);
        $harga_tot = $selectharga - $persenrupiah;

        $updatecomponen = "UPDATE detail_component 
                                            SET harga = '$harga_tot' , diskon_rupiah='$persenrupiah',
                                            diskon_persen='$persen'
                                            WHERE
                                                id_detail_transaksi = '$input->id_detail_transaksi' 
                                                AND id_jenis_component = '$input->id_jenis_component'
                                                ";

        if ($this->db->simpleQuery($updatecomponen)) {
            $output['status']   = "sukses";
            $output['pesan']    = "Berhasil ubah nominal";
        } else {
            $output['status']   = "gagal";
            $output['pesan'] = "gagal";
        }

        $this->hasil($output);
    }
    public function updatedetailcomponentpeg()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'valueidpeg',
            'valueiddetailtransaksi',
            'valueidjeniscomponent'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $query = "UPDATE detail_component SET id_pegawai ='$input->valueidpeg' where id_detail_transaksi= '$input->valueiddetailtransaksi' and id_jenis_component='$input->valueidjeniscomponent'";
            //         echo "$a";
            //         exit;
            //         $listProduk = $this->db->query("UPDATE detail_component SET id_pegawai ='$input->valueidpeg' where id_detail_transaksi= '$input->valueiddetailtransaksi' and id_jenis_component='$input->valueidjeniscomponent'
            // ");

            if ($this->db->simpleQuery($query)) {

                $output['status']   = "sukses";
                $output['pesan']    = "Component Berhasil Diupdate";
                //$output['data']     = $listProduk->getResult();
            } else {
                $output['pesan'] = "Componen tidak ditemukan";
            }
        }
        $this->hasil($output);
    }
    public function Kasir_deletetindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_detail_transaksi',
            'id_transaksi'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $cekpenunjang =  $this->db->query("SELECT
                                                * 
                                            FROM
                                                detail_transaksi
                                                JOIN kunjungan USING ( id_kunjungan )
                                                JOIN unit USING ( id_unit ) 
                                            WHERE
                                                id_detail_transaksi = '$input->id_detail_transaksi' 
                                                and unit.jenis_unit in('4','5','6','7','8')");
            if ($cekpenunjang->getNumRows() > 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Transaksi, silahkan hubungi penunjang untuk pembatalan";
                return $this->hasil($output);
                exit();
            }

            $cekkomponen =  $this->db->query("SELECT
                                                    * 
                                                FROM
                                                    detail_transaksi
                                                    JOIN detail_component USING ( id_detail_transaksi ) 
                                                WHERE
                                                    id_detail_transaksi = '$input->id_detail_transaksi'");
            if ($cekkomponen->getNumRows() <= 0) {
                $iddetailkunjungan = $this->db->query("SELECT id_detail_kunjungan from detail_transaksi where id_detail_transaksi='$input->id_detail_transaksi'")->getRow()->id_detail_kunjungan;
                $queryhapus = "DELETE FROM detail_kunjungan WHERE id_detail_kunjungan = '$iddetailkunjungan'";

                if ($this->db->simpleQuery($queryhapus)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus tanpa Komponen";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Transaksi";
                }
                return $this->hasil($output);
            }
            $cekjurnal =  $this->db->query("SELECT
                                        jurnal
                                    FROM
                                        detail_transaksi
                                        JOIN detail_component USING ( id_detail_transaksi ) 
                                    WHERE
                                        id_detail_transaksi = '$input->id_detail_transaksi'
                                        GROUP BY jurnal
                                        limit 1")->getRow()->jurnal;

            if ($cekjurnal == 't') {
                $output['status']   = "gagal";
                $output['pesan']    = "Sudah dilakukan penjurnalan";
                $this->hasil($output);
                exit();
            } else {
                // $querycekbayar =  $this->db->query("SELECT * from bayar where id_transaksi='$input->id_transaksi'");
                // if ($querycekbayar->getNumRows() <= 0) {
                $iddetailkunjungan = $this->db->query("SELECT id_detail_kunjungan from detail_transaksi where id_detail_transaksi='$input->id_detail_transaksi'")->getRow()->id_detail_kunjungan;
                $queryhapus = "DELETE FROM detail_kunjungan WHERE id_detail_kunjungan = '$iddetailkunjungan'";
                // $iddetailkunjungan = $this->db->query("SELECT id_detail_kunjungan from detail_transaksi where id_detail_transaksi='$input->id_detail_transaksi'")->getRow()->id_detail_kunjungan;
                // $queryhapus = "DELETE FROM detail_transaksi WHERE id_detail_transaksi = '$input->id_detail_transaksi'";
                if ($this->db->simpleQuery($queryhapus)) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus Transaksi";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Transaksi";
                }
                // } else {
                //     $output['status']   = "gagal";
                //     $output['pesan']    = "Pembayaran Sudah dilakukan";
                // }
            }
        }
        $this->hasil($output);
    }
    public function Kasir_pergantianshift()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_shiftsaatini',
            'val_shifselanjutnya',
            'val_tanggalshift',
            'val_jamshift',
            'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $waktutransaksi = "" . $input->val_tanggalshift . " " . "$input->val_jamshift";
        $replace = str_replace("/", "-", $waktutransaksi);
        $date = date_create($replace);
        $val_date2 = date_format($date, "Y-m-d H:i:s");
        $kode = "KASIR_RS";

        if ($this->evalParam($input, $listParam)) {
            $gantishift = "UPDATE ganti_shift set shift='$input->val_shifselanjutnya',last_update='$val_date2' where kode='$kode'";
            $insertlog = "INSERT INTO log_ganti_shift (tanggal_ganti,id_user,shift_ke,kode)
                values('$val_date2','$input->val_id_user','$input->val_shifselanjutnya','$kode')";
            $this->db->query($insertlog);

            if ($this->db->simpleQuery($gantishift)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Ganti Shift";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hubungi Admin";
            }
        }
        $this->hasil($output);
    }
    public function tampilsjp()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = " SELECT * FROM
            penjamin_transaksi
                        join penjamin using (id_penjamin)
           where penjamin_transaksi.id_transaksi='$input->id_transaksi'
               ";
            $list_sjp = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_sjp->getResult();
        }
        $this->hasil($output);
    }
    public function totalyangharusdibayar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->id_transaksi'";
            $querybayar = "select sum(jumlah) as sudahdibayar from bayar where id_transaksi='$input->id_transaksi'";
            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $hasil = $totalnominal - $totalnominalsudahdibayar;
            //echo"$hasil";
            //exit();


            //    $query = "WITH total_bayar AS ( SELECT $input->id_transaksi id_transaksi, SUM ( jumlah ) jumlah_bayar FROM bayar WHERE id_transaksi = $input->id_transaksi ) SELECT SUM
            //    ( total_harga ) - AVG ( jumlah_bayar ) totalharusdibayar 
            //    FROM
            //        detail_transaksi
            //        JOIN total_bayar USING ( id_transaksi ) 
            //    WHERE
            //        id_transaksi = '$input->id_transaksi' "; 

            //        echo"$query";
            $sum = $hasil;
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    public function totalyangharusdibayarpelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            ( debit ) AS totalharusdibayar,
            id_piutang
        FROM
            piutang 
        WHERE
            id_transaksi = '$input->id_transaksi' 
            and id_referensi='$input->id_bayar'
            and (kredit is null or kredit=0)
            ";
            // echo"$query";
            // exit();
            $id_piutang = $this->db->query($query)->getRow()->id_piutang;
            $querybayar = "SELECT sum(debit) as sudahdibayar from kas where id_transaksi='$input->id_transaksi' 
                             and id_referensi='$id_piutang'
                             AND id_jenis_aktivitas_keuangan in ('4')";
            // echo"$querybayar";
            // exit();

            $queryperbaikan = "SELECT sum(kredit) as diperbaiki from kas where id_transaksi='$input->id_transaksi' 
                             and id_referensi='$id_piutang'
                             AND id_jenis_aktivitas_keuangan in ('7')";

            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $totalperbaikan = $this->db->query($queryperbaikan)->getRow()->diperbaiki;

            $hasil = $totalnominal - $totalnominalsudahdibayar + $totalperbaikan;
            // echo"$hasil";
            // exit();


            //    $query = "WITH total_bayar AS ( SELECT $input->id_transaksi id_transaksi, SUM ( jumlah ) jumlah_bayar FROM bayar WHERE id_transaksi = $input->id_transaksi ) SELECT SUM
            //    ( total_harga ) - AVG ( jumlah_bayar ) totalharusdibayar 
            //    FROM
            //        detail_transaksi
            //        JOIN total_bayar USING ( id_transaksi ) 
            //    WHERE
            //        id_transaksi = '$input->id_transaksi' "; 

            //        echo"$query";
            $sum = $hasil;
            // echo"$sum";
            // exit();
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    public function totalsisadepositpasien()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_norm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT SUM
            ( kredit ) - SUM ( debit ) AS sisadeposit 
        FROM
            deposit 
        WHERE
            no_rm = '$input->val_norm'
            ";
            // echo"$query";
            // exit();
            $hasil = $this->db->query($query)->getRow()->sisadeposit;

            $sum = $hasil;
            // echo"$sum";
            // exit();
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();
        }
        $this->hasil($output);
    }
    public function lihatshifkasir()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $hasil = $this->db->query($query)->getRow()->shift;
        if (!$hasil) {
            $output['status'] = "gagal";
            $output['code'] = "XX";
            $output['pesan'] = "gagal mengambil shift";
        } else {
            $output['status'] = "sukses";
            $output['data'] = $hasil;
        }


        $this->hasil($output);
    }
    public function lihatkasuser()
    {
        $input = json_decode(file_get_contents('php://input'));

        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $query = "SELECT kas_nama from users join ac_kas using(id_kas) where id_user='$input->iduser'";
        $hasil = $this->db->query($query)->getRow()->kas_nama;
        if (!$hasil) {
            $output['status'] = "gagal";
            $output['code'] = "XX";
            $output['pesan'] = "gagal";
        } else {
            $output['status'] = "sukses";
            $output['data'] = $hasil;
        }


        $this->hasil($output);
    }
    public function tampilhisbayar()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = " SELECT * FROM
            bayar join pembayaran using (id_pembayaran)
            join users using(id_user)
           where bayar.id_transaksi='$input->id_transaksi'
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhispiutang()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = " SELECT * FROM
            bayar join pembayaran using (id_pembayaran)
            join jenis_pembayaran using (id_jenis_pembayaran)
            join users using(id_user)
           where bayar.id_transaksi='$input->id_transaksi'
           and jenis_pembayaran.id_jenis_pembayaran='2'
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilpenjamintransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            *,
        CASE
                WHEN penjamin_utama = 't' THEN
                'PENJAMIN UTAMA' ELSE' ' 
            END AS penjaminutama 
        FROM
            penjamin_transaksi
            JOIN penjamin USING ( id_penjamin ) 
        WHERE
            id_transaksi = '$input->id_transaksi' order by id_penjamin asc
               ";
            $wow = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $wow->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhispembayaranpiutang()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT id_piutang from piutang where id_transaksi='$input->id_transaksi'
            and id_referensi='$input->id_bayar'
            ";
            // echo"$query";
            // exit();
            $id_piutang = $this->db->query($query)->getRow()->id_piutang;
            $query = "SELECT
            * 
        FROM
            kas join jenis_aktivitas_keuangan using(id_jenis_aktivitas_keuangan)
            join users using(id_user)
        WHERE
            id_referensi = '$id_piutang' 
            AND id_transaksi='$input->id_transaksi'
            AND id_jenis_aktivitas_keuangan in ('4')
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhisdeposit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'no_rm'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            * 
        FROM
            deposit 
            join users USING(id_user)
        WHERE
            no_rm ='$input->no_rm'
            and debit=0";
            // echo"$query";
            // exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilhispembayaranpiutang_perbaikan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT id_piutang from piutang where id_transaksi='$input->id_transaksi'
            and id_referensi='$input->id_bayar'
            ";
            // echo"$query";
            // exit();
            $id_piutang = $this->db->query($query)->getRow()->id_piutang;
            $query = "SELECT
            * 
        FROM
            kas join jenis_aktivitas_keuangan using(id_jenis_aktivitas_keuangan)
            join users using(id_user)
        WHERE
            id_referensi = '$id_piutang' 
            AND id_transaksi='$input->id_transaksi'
            AND id_jenis_aktivitas_keuangan in ('7')
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function tampilprodukunit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            * 
        FROM
            produk
            LEFT JOIN produk_unit USING ( id_produk )
            LEFT JOIN tarif ON tarif.id_produk = produk.id_produk 
            AND tarif.id_penjamin = '1'
                -- JOIN unit USING ( id_unit ) 
    LEFT join unit on unit.id_unit=produk_unit.id_unit
            where produk_unit.id_unit in (
            select id_unit from kunjungan where id_transaksi='102'
            )
            order by produk.nama_produk,unit.nama_unit asc
               ";
            //    echo"$query";
            //    exit();
            $list_bayar = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $list_bayar->getResult();
        }
        $this->hasil($output);
    }
    public function Buka_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi',
            'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();

            $querylog = "INSERT INTO log_buka_transaksi (id_transaksi,id_user,alasan,waktu_buka) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan',
                 current_timestamp
            )";
            // echo"$querylog";
            // exit();
            $this->db->query($querylog);

            // $queryupdatetransaksi = "UPDATE transaksi SET lunas ='f' where id_transaksi= '$input->val_id_transaksi'";
            $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup = NULL where id_transaksi= '$input->val_id_transaksi'";
            //  echo"$queryupdatetransaksi";
            // exit();
            $this->db->query($queryupdatetransaksi);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Buka Transaksi";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Buka Transaksi";
            }
        }
        $this->hasil($output);
    }


    public function cekpostingtransaksiKasir()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "gagal";
        $output['code'] = "XX";
        if ($this->evalParam($input, $listParam)) {
            $query = $this->db->query("SELECT
            * 
        FROM
            kunjungan 
            join unit using(id_unit)
        WHERE
            id_transaksi = '$input->val_id_transaksi' 
            AND posting = 'f' 
            LIMIT 1");

            if ($query->getNumRows() > 0) {
                foreach ($query->getResult() as $row) {
                    $namaunit = $row->nama_unit;
                };
                $output['status'] = "sukses";
                $output['pesan'] = "Ada unit yang Belum Posting Transaksi UNIT $namaunit";
                $output['code'] = "XX";
            } else {
                $output['status'] = "sukses";
                $output['pesan'] = "Silahkan klik tombol tutup transaksi";
                $output['code'] = "200";
            }
            $output['data'] = $query->getResult();
        }
        $this->hasil($output);
    }
    public function paidtransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_pembayaran',
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');
        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '08') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shift = '4';
        } else {
            $shift = $shiftsekarang;
        }
        // komen jangan dihapus
        // if ($jam >= '07' && $jam < '14') {
        //     $shit = '1';
        // } elseif ($jam >= '14' && $jam < '21') {
        //     $shit = '2';
        // } elseif ($jam >= '21') {
        //     $shit = '3';
        // } elseif ($jam < '7') {
        //     $shit = '4';
        // }

        if ($this->evalParam($input, $listParam)) {

            if ($input->id_kas > 0) {
                $query = "INSERT INTO bayar ( id_transaksi, id_pembayaran, jumlah, id_user, tgl_bayar, shift, id_kas )
                VALUES (
                    '$input->val_idtransaksi',
                    '$input->val_id_pembayaran',
                    '$input->val_jumlahbayarkasir',
                    '$input->id_user',
                    '$valwaktutransaksi',
                    '$shift',
                    '$input->id_kas'
                )";
            } else {
                $query = "INSERT INTO bayar ( id_transaksi, id_pembayaran, jumlah, id_user, tgl_bayar, shift )
                VALUES (
                    '$input->val_idtransaksi',
                    '$input->val_id_pembayaran',
                    '$input->val_jumlahbayarkasir',
                    '$input->id_user',
                    '$valwaktutransaksi',
                    '$shift'
                )";
            }


            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function tambahdeposit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_norm',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');
        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }
        // komen jangan dihapus
        // if ($jam >= '07' && $jam < '14') {
        //     $shit = '1';
        // } elseif ($jam >= '14' && $jam < '21') {
        //     $shit = '2';
        // } elseif ($jam >= '21') {
        //     $shit = '3';
        // } elseif ($jam < '7') {
        //     $shit = '4';
        // }

        if ($this->evalParam($input, $listParam)) {
            $query = "INSERT INTO deposit (tgl_deposit, no_rm, id_user, shift, kredit,id_jenis_aktivitas_keuangan)
            VALUES (
                '$valwaktutransaksi',
                '$input->val_norm',
                '$input->id_user',
                '$shit',
                '$input->val_jumlahbayarkasir',
                '8'
            )";
            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Deposit Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function paidtransaksipelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if ($input->val_jumlahbayarkasir < 0) {
            $idjenisaktivitas = '7';
        } else {
            $idjenisaktivitas = '4';
        }

        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '08') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shift = '4';
        } else {
            $shift = $shiftsekarang;
        }
        // komen jangan di hapus jika otomatis tanpa tutup buka shift
        // if ($jam >= '07' && $jam < '14') {
        //     $shit = '1';
        // } elseif ($jam >= '14' && $jam < '21') {
        //     $shit = '2';
        // } elseif ($jam >= '21') {
        //     $shit = '3';
        // } elseif ($jam < '7') {
        //     $shit = '4';
        // }
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            $idreferensi = $this->db->query("SELECT
                        id_piutang 
                        FROM
                        piutang 
                        WHERE
                        id_referensi = '$input->val_idbayar' 
                        AND 
                        id_transaksi = '$input->val_idtransaksi' 
                        AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;

            //  echo"$idreferensi";
            //  exit();
            $query = "INSERT INTO kas ( id_transaksi, debit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
                                            VALUES (
                                                '$input->val_idtransaksi',
                                                '$input->val_jumlahbayarkasir',
                                                '$valwaktutransaksi',
                                                '$idjenisaktivitas',
                                                '$idreferensi',
                                                '$input->id_user',
                                                '$shift'
                                            )";
            $this->db->query($query);
            //  echo"$query";
            //  exit();                           
            // $query = "INSERT INTO piutang ( id_transaksi,id_referensi, kredit, id_jenis_aktivitas_keuangan, id_user, shift )
            // VALUES (
            //     '$input->val_idtransaksi',
            //     '$idreferensi',
            //     '$input->val_jumlahbayarkasir',
            //     '4',
            //     '$input->id_user',
            //     '$shit'
            // )";
            // echo"$query";
            // exit();


            //JURNAL
            $this->db->query("INSERT INTO bayar_pelunasan(id_transaksi, id_pembayaran,jumlah, id_user, shift, id_kas,jurnal )
            VALUES (
                '$input->val_idtransaksi',
                '$input->val_id_pembayaran',
                '$input->val_jumlahbayarkasir',
                '$input->id_user',
                '$shift',
                '$input->val_id_kas',
                'f'
            )");

            $gl_kas_max = $this->db->query("SELECT
            max(substr(id_gl,4)::INTEGER+1) as glkasmax
            FROM
            ac_jurnal 
            WHERE
            id_gl ILIKE 'KM%'")->getRow()->glkasmax;
            $newGL = "KM-$gl_kas_max";


            $namakas = $this->db->query("select kas_nama from ac_kas where id_kas='$input->val_id_kas'")->getRow()->kas_nama;

            // echo"$namakas";
            // exit();
            //insert jurnal bayar 
            $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                '$newGL',
                '$namakas id bayar piutang $input->val_idbayar dan no transaksi $input->val_idtransaksi',
                '$input->id_user'
            )returning id_jurnal")->getRow()->id_jurnal;
            // echo"$id_jurnalkas";
            // exit();

            $idacc = $this->db->query("select id_acc from ac_kas where id_kas='$input->val_id_kas'")->getRow()->id_acc;
            $namapas = $this->db->query("SELECT
            nama 
        FROM
            transaksi
            JOIN pasien USING ( no_rm ) 
        WHERE
            id_transaksi = '$input->val_idtransaksi'")->getRow()->nama;

            //kas debet    
            $this->db->query("INSERT INTO ac_jurnal_detail 
            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
            VALUES ('$id_jurnalkas', '$idacc', 'Pembayaran Piutang idbayar $input->val_idbayar notransaksi  $input->val_idtransaksi','4','$namapas','$input->val_jumlahbayarkasir','0','$input->id_user')");
            //piutang pendapatan kredit
            $this->db->query("INSERT INTO ac_jurnal_detail 
            (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
            VALUES ('$id_jurnalkas', '32', 'Pembayaran Piutang idbayar $input->val_idbayar notransaksi  $input->val_idtransaksi','4','$namapas','0','$input->val_jumlahbayarkasir','$input->id_user')");
            // echo"$x";
            // exit();
            $tambahjumlahkasbank = $this->db->query("UPDATE ac_kas 
                                                    SET jumlah = (jumlah + $input->val_jumlahbayarkasir) 
                                                    WHERE id_kas = '$input->val_id_kas'");
            $nominal_ac_ar = $this->db->query("select kredit from ac_ar where id_bayar='$input->val_idbayar'")->getRow()->kredit;
            $this->db->query("UPDATE ac_ar SET kredit = $nominal_ac_ar+$input->val_jumlahbayarkasir WHERE id_bayar = '$input->val_idbayar'");

            $this->db->transComplete();


            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function hapustransaksipelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";

        if ($input->val_jumlahbayarkasir > 0) {
            $idjenisaktivitas = '7';
        }


        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }

        if ($this->evalParam($input, $listParam)) {
            $idreferensi = $this->db->query("SELECT
                        id_piutang 
                        FROM
                        piutang 
                        WHERE
                        id_referensi = '$input->val_idbayar' 
                        AND 
                        id_transaksi = '$input->val_idtransaksi' 
                        AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;

            $query = "INSERT INTO kas ( id_transaksi, kredit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
                                            VALUES (
                                                '$input->val_idtransaksi',
                                                '$input->val_jumlahbayarkasir',
                                                '$valwaktutransaksi',
                                                '$idjenisaktivitas',
                                                '$idreferensi',
                                                '$input->id_user',
                                                '$shit'
                                            )";

            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil direvisi";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function hapusdepositperbaikan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_nominalhapus',
            'val_norm',
            'id_user'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $idjenisaktivitas = '10';



        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);

        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');

        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;

        if (($jam <= '08') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }

        if ($this->evalParam($input, $listParam)) {
            $keterangan = "Perbaikan deposit pasien " . $input->val_norm . "";
            $query = "INSERT INTO deposit (tgl_deposit,no_rm,id_user,shift,debit,id_jenis_aktivitas_keuangan,keterangan)
                                            VALUES (
                                                '$valwaktutransaksi',
                                                '$input->val_norm',
                                                '$input->id_user',
                                                '$shit',
                                                '$input->val_nominalhapus',
                                                '$idjenisaktivitas',
                                                '$keterangan'
                                            )";
            //  echo"$query"; 
            //  exit();                  
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Deposit Berhasil direvisi";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    // public function paidtransaksipelunasanperbaikan()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'val_idtransaksi',
    //         'val_jumlahbayarkasir',
    //         'val_tglbayar',
    //         'id_user',
    //         'val_jambayar'
    //     ];
    //     $output = array();
    //     $output['status'] = "gagal";
    //     $output['pesan'] = "";

    //     $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
    //     $replace = str_replace("/", "-", $waktutransaksi);

    //     $date = date_create($replace);
    //     $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
    //     $jam = $date->format('H');

    //     $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
    //     $shiftsekarang = $this->db->query($query)->getRow()->shift;

    //     if(($jam <= '07') && ($shiftsekarang==3 || $shiftsekarang=='3')){
    //         $shit = '4';
    //     }
    //     else{
    //         $shit = $shiftsekarang;
    //     }
    //     // komen jangan di hapus jika otomatis tanpa tutup buka shift
    //     // if ($jam >= '07' && $jam < '14') {
    //     //     $shit = '1';
    //     // } elseif ($jam >= '14' && $jam < '21') {
    //     //     $shit = '2';
    //     // } elseif ($jam >= '21') {
    //     //     $shit = '3';
    //     // } elseif ($jam < '7') {
    //     //     $shit = '4';
    //     // }
    //     if ($this->evalParam($input, $listParam)) {
    //         $idreferensi = $this->db->query("SELECT
    //                     id_piutang 
    //                     FROM
    //                     piutang 
    //                     WHERE
    //                     id_referensi = '$input->val_idbayar' 
    //                     AND 
    //                     id_transaksi = '$input->val_idtransaksi' 
    //                     AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;

    //         //  echo"$idreferensi";
    //         //  exit();
    //         $query = "INSERT INTO kas ( id_transaksi, debit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
    //                                         VALUES (
    //                                             '$input->val_idtransaksi',
    //                                             '$input->val_jumlahbayarkasir',
    //                                             '$valwaktutransaksi',
    //                                             '4',
    //                                             '$idreferensi',
    //                                             '$input->id_user',
    //                                             '$shit'
    //                                         )";
    //             //  echo"$query";
    //             //  exit();                           
    //         // $query = "INSERT INTO piutang ( id_transaksi,id_referensi, kredit, id_jenis_aktivitas_keuangan, id_user, shift )
    //         // VALUES (
    //         //     '$input->val_idtransaksi',
    //         //     '$idreferensi',
    //         //     '$input->val_jumlahbayarkasir',
    //         //     '4',
    //         //     '$input->id_user',
    //         //     '$shit'
    //         // )";
    //         // echo"$query";
    //         // exit();
    //         if ($this->db->simpleQuery($query)) { //true
    //             $output['status']   = "sukses";
    //             $output['code']     = "00";
    //             $output['pesan']    = "Pembayaran Berhasil";
    //         } else {
    //             $output['code']     = "XX";
    //             $output['status']   =  'gagal simpan';
    //             $output['pesan']    = $this->db->error()['message'];
    //             //echo"$query";

    //         }
    //     }
    //     $this->hasil($output);
    // }

    public function hapusbayarpelunasan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransaksi',
            'val_jumlahbayarkasir',
            'val_tglbayar',
            'id_user',
            'val_jambayar'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $waktutransaksi = "" . $input->val_tglbayar . " " . "$input->val_jambayar";
        $replace = str_replace("/", "-", $waktutransaksi);
        $date = date_create($replace);
        $valwaktutransaksi = date_format($date, "Y-m-d H:i:s");
        $jam = $date->format('H');
        $query = "SELECT shift from ganti_shift where kode='KASIR_RS'";
        $shiftsekarang = $this->db->query($query)->getRow()->shift;
        if (($jam <= '07') && ($shiftsekarang == 3 || $shiftsekarang == '3')) {
            $shit = '4';
        } else {
            $shit = $shiftsekarang;
        }
        if ($this->evalParam($input, $listParam)) {
            $idreferensi = $this->db->query("SELECT
                        id_piutang 
                        FROM
                        piutang 
                        WHERE
                        id_referensi = '$input->val_idbayar' 
                        AND 
                        id_transaksi = '$input->val_idtransaksi' 
                        AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;
            //  echo"$idreferensi";
            //  exit();
            $query = "INSERT INTO kas ( id_transaksi, debit,tgl_aktivitas, id_jenis_aktivitas_keuangan, id_referensi, id_user, shift )
                                            VALUES (
                                                '$input->val_idtransaksi',
                                                '$input->val_jumlahbayarkasir',
                                                '$valwaktutransaksi',
                                                '4',
                                                '$idreferensi',
                                                '$input->id_user',
                                                '$shit'
                                            )";
            if ($this->db->simpleQuery($query)) { //true
                $output['status']   = "sukses";
                $output['code']     = "00";
                $output['pesan']    = "Pembayaran Berhasil";
            } else {
                $output['code']     = "XX";
                $output['status']   =  'gagal simpan';
                $output['pesan']    = $this->db->error()['message'];
                //echo"$query";

            }
        }
        $this->hasil($output);
    }
    public function Kasir_deletepembayaran()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idbayar',
            'val_idtransakasi',
            'val_idpembayaran'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $bayarjurnal = $this->db->query("SELECT jurnal from bayar where id_bayar='$input->val_idbayar'")->getRow()->jurnal;

            if ($bayarjurnal == 't') {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal , transaksi sudah pernah dijurnal $bayarjurnal";
                $this->hasil($output);
                exit();
            }
            $this->db->transStart();
            $tutuptransaksi = $this->db->query("SELECT tgl_tutup from transaksi where id_transaksi='$input->val_idtransakasi'")->getRow()->tgl_tutup;
            if ($tutuptransaksi == null) {
                $queryidpembayaran = "SELECT
                                                * 
                                            FROM
                                                pembayaran
                                                JOIN jenis_pembayaran USING ( id_jenis_pembayaran ) 
                                            WHERE
                                                id_pembayaran = '$input->val_idpembayaran'";

                // echo"$queryidpembayaran";
                // exit();
                $rowidpembayaran = $this->db->query($queryidpembayaran)->getRow()->id_jenis_pembayaran;
                // echo"$rowidpembayaran";
                // exit();
                if ($rowidpembayaran == 1 || $rowidpembayaran == '1') {
                    $idreferensi = $this->db->query("SELECT
                                                    id_kas 
                                                FROM
                                                    kas 
                                                WHERE
                                                    id_referensi = '$input->val_idbayar' 
                                                    AND id_transaksi = '$input->val_idtransakasi' 
                                                    AND id_jenis_aktivitas_keuangan = '1'")->getRow()->id_kas;
                } elseif ($rowidpembayaran == 2 || $rowidpembayaran == '2') {
                    $idreferensi = $this->db->query("SELECT
                    id_piutang 
                FROM
                    piutang 
                WHERE
                    id_referensi = '$input->val_idbayar' 
                    AND id_transaksi = '$input->val_idtransakasi' 
                    AND id_jenis_aktivitas_keuangan = '2'")->getRow()->id_piutang;
                }

                $querylog = "INSERT INTO log_hapus_bayar (id_transaksi,id_user,nominal,alasan,waktu_hapus) VALUES (
                    '$input->val_idtransakasi',
                    '$input->val_iduser',
                    '$input->val_nominal',
                    '$input->val_alasan',
                    current_timestamp
                )";
                // echo"$querylog";

                $this->db->query($querylog);
                //$this->db->simpleQuery($querylog);
                // if($rowidpembayaran = '1' || $rowidpembayaran = '2' ||  $rowidpembayaran = '3'){
                // if($rowidpembayaran = '1'){
                // $queryinsereditbayarhistori = "INSERT INTO history_edit_bayar (id_user,nominal,alasan,id_jenis_pembayaran,id_transaksi,id_referensi) 
                // VALUES (
                //     '$input->val_iduser',
                //     '$input->val_nominal',
                //     '$input->val_alasan',
                //     '$rowidpembayaran',
                //     '$input->val_idtransakasi',
                //     '$idreferensi'
                // )";
                // $this->db->query($queryinsereditbayarhistori);
                // }
                $queryhapus = "DELETE FROM bayar WHERE id_bayar = '$input->val_idbayar'";
                $this->db->query($queryhapus);
                // exit();
                $this->db->transComplete();

                // if ($this->db->simpleQuery($query)) {
                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Hapus Pembayaran";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Hapus Bayar";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus Transaksi, transaksi sudah tertutup";
            }
            // echo"$queryhapus";
            // exit();
        }
        $this->hasil($output);
    }
    public function Kasir_deletepenjaminhistory()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_penjamin',
            'idtransaksi',
            'nosjp'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $queryhapus = "DELETE FROM penjamin_transaksi WHERE id_penjamin = '$input->id_penjamin'
                and id_transaksi = '$input->idtransaksi' and no_sjp = '$input->nosjp'";

            if ($this->db->simpleQuery($queryhapus)) {


                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Hapus penjamin";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Hapus penjamin";
            }
        }
        $this->hasil($output);
    }
    public function Kasir_bukapenatajasa()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "UPDATE kunjungan SET posting = 'f',jam_keluar=null,id_cara_keluar=null,tgl_keluar=null WHERE id_kunjungan = '$input->id_kunjungan'";

            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Buka Penata Jasa";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Coba Lagi";
            }
        }
        $this->hasil($output);
    }
    public function mod_bukatransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_bukatransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_KasirPEnjamintransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_kasirpenjamintransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_KasirUnpostingPJ()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_KasirUnpostingPJ', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_lookkup()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_lookkup', $data);
        // return view('view/modal/kasirgeneral/mod_bukatransaksi');
    }
    public function mod_tutuptransaksi()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        // echo"$id_transaksi";
        // exit();

        $kel =  $this->db->query("SELECT * FROM transaksi
                                JOIN pasien USING ( no_rm )
                                 where transaksi.id_transaksi='$id_transaksi' ");
        $outputx['data'] = $kel->getResult();

        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/kasirgeneral/mod_tutuptransaksi', $data);
        // return view('view/modal/kasirgeneral/mod_tutuptransaksi');
    }
    public function XXXBuka_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi',
            'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();

            $querylog = "INSERT INTO log_buka_transaksi (id_transaksi,id_user,alasan) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan'
            )";
            // echo"$querylog";
            // exit();
            $this->db->query($querylog);

            // $queryupdatetransaksi = "UPDATE transaksi SET lunas ='f' where id_transaksi= '$input->val_id_transaksi'";
            $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup = NULL where id_transaksi= '$input->val_id_transaksi'";
            //  echo"$queryupdatetransaksi";
            // exit();
            $this->db->query($queryupdatetransaksi);
            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Buka Transaksi";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal Buka Transaksi";
            }
        }
        $this->hasil($output);
    }
    public function tambahtransaksipenjamin()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_user'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            // echo"$input->apakahutama";
            // exit();
            if ($input->apakahutama == 't') {
                // echo"aasasa";
                // exit(); 
                $update = "UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->id_transaksi'";
                $this->db->query($update);

                $querinsert = "INSERT INTO penjamin_transaksi (id_penjamin,id_transaksi,penjamin_utama,no_sjp) VALUES (
                    '$input->id_penjamin',
                    '$input->id_transaksi',
                    '$input->apakahutama',
                    '$input->sep'
                )";
                $this->db->query($querinsert);
            } else {
                // echo"xxx";
                // exit(); 
                // echo"$input->id_penjamin";
                // echo"$input->val_id_transaksi";
                // echo"$input->apakahutama";
                // echo"$input->sep";

                // exit();
                $querinsert = "INSERT INTO penjamin_transaksi (id_penjamin,id_transaksi,penjamin_utama,no_sjp) VALUES (
                    '$input->id_penjamin',
                    '$input->id_transaksi',
                    '$input->apakahutama',
                    '$input->sep'
                )";
                // echo"$querinsert";
                // exit();              
                $this->db->query($querinsert);
            }



            $this->db->transComplete();

            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Tambah Penjamin";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Sukses Tambah Penjamin";
            }
        }
        $this->hasil($output);
    }
    public function Batal_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi',
            'val_id_user'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $querycekbayar =  $this->db->query("SELECT * from bayar where id_transaksi='$input->val_id_transaksi'");
            if ($querycekbayar->getNumRows() <= 0) {

                $querydetailtransaksi =  $this->db->query("SELECT * from detail_transaksi where id_transaksi='$input->val_id_transaksi'");
                if ($querydetailtransaksi->getNumRows() > 0) {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Sudah Ada Detail transaksi";
                    $this->hasil($output);
                    exit();
                }

                $this->db->transStart();

                // $idkamar =  $this->db->query("SELECT id_kamar from kunjungan where id_kamar is not null and id_transaksi='$input->val_id_transaksi' and  status_kunjungan='3'")->getRow()->id_kamar;;
                // if($idkamar > 0){
                //     $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$idkamar'");
                // }

                $cek_kamar =  $this->db->query("SELECT id_kamar from kunjungan where id_kamar is not null and id_transaksi='$input->val_id_transaksi' and  status_kunjungan='3'");
                //echo"$idkamar";exit();
                if ($cek_kamar->getNumRows() > 0) {
                    $idkamar = $cek_kamar->getRow()->id_kamar;
                    $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$idkamar'");
                }

                $querylog = "INSERT INTO log_batal_transaksi (id_transaksi,id_user,alasan) VALUES (
                '$input->val_id_transaksi',
                '$input->val_id_user',
                '$input->val_alasan'
            )";
                // echo"$querylog";
                // exit();
                $this->db->query($querylog);
                //delete transaksi detail
                $querydeletetransaksidetail = "DELETE from detail_transaksi where id_transaksi= '$input->val_id_transaksi'";
                // echo"$querydeletetransaksidetail";
                // exit();
                $this->db->query($querydeletetransaksidetail);
                //delete kunjungan detail
                $querydeletekunjungandetail = "DELETE 
                                            FROM
                                                detail_kunjungan 
                                            WHERE
                                                id_detail_kunjungan IN ( SELECT detail_kunjungan.id_detail_kunjungan FROM transaksi JOIN kunjungan USING ( id_transaksi ) JOIN detail_kunjungan USING ( id_kunjungan ) WHERE transaksi.id_transaksi = '$input->val_id_transaksi' )
                                            ";
                // echo"$querydeletekunjungandetail";   
                // exit();                             
                $this->db->query($querydeletekunjungandetail);
                //delete kunjungan
                $querydeletekunjungan = "DELETE FROM kunjungan WHERE id_transaksi = '$input->val_id_transaksi'";
                // echo"$querydeletekunjungan ";
                // exit();
                $this->db->query($querydeletekunjungan);
                //delete tgransaksi
                $querydeletetransaksi = "DELETE FROM transaksi WHERE id_transaksi = '$input->val_id_transaksi'";
                $this->db->query($querydeletetransaksi);

                $querydeletepengantaranap = "DELETE FROM pengantar_rawat_inap WHERE id_transaksi = '$input->val_id_transaksi'";
                $this->db->query($querydeletepengantaranap);


                $this->db->transComplete();

                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Batal Transaksi";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Buka Transaksi";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Pembayaran sudah dilakukan";
            }
        }
        $this->hasil($output);
    }
    public function Tutup_transaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi',
            'val_id_user'
        ];
        date_default_timezone_set('Asia/Jakarta');

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        $waktutransaksi = "" . $input->val_tgl . " " . "$input->val_jam";
        $replace = str_replace("/", "-", $waktutransaksi);
        $date = date_create($replace);
        //$val_date = strtotime($waktutransaksi);
        $val_date2 = date_format($date, "Y-m-d H:i:s");
        // echo"$val_date2";
        //    exit();
        if ($this->evalParam($input, $listParam)) {
            $cekobat_retur =  $this->db->query("select * from far_retur where id_transaksi='$input->val_id_transaksi' and posting='f'");
            if ($cekobat_retur->getNumRows() > 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Ada retur obat belum close, silahkan hubungi apotik";
                $this->hasil($output);
                exit();
            }

            // $this->db->transStart();
            $query = "select sum(total_harga) as totalharusdibayar from detail_transaksi where id_transaksi='$input->val_id_transaksi'";
            $querybayar = "select sum(jumlah) as sudahdibayar from bayar where id_transaksi='$input->val_id_transaksi'";
            $totalnominal = $this->db->query($query)->getRow()->totalharusdibayar;
            $totalnominalsudahdibayar = $this->db->query($querybayar)->getRow()->sudahdibayar;
            $hasil = $totalnominal - $totalnominalsudahdibayar;

            $querylunas = "select lunas from transaksi where id_transaksi='$input->val_id_transaksi'";
            $rowquerylunas = $this->db->query($querylunas)->getRow()->lunas;



            if (($hasil == 0 || $hasil == '0') || ($rowquerylunas == 't')) {
                $queryupdatetransaksi = "UPDATE transaksi SET tgl_tutup ='$val_date2',lunas='t' where id_transaksi= '$input->val_id_transaksi'";
                // echo"$queryupdatetransaksi";
                // exit();

                $this->db->transStart();
                $this->db->query($queryupdatetransaksi);
                //PROSES MENJURNAL
                $idGL = "PNJ-$input->val_id_transaksi";
                // echo"$idGL";
                // exit();
                // echo"$idGL";
                // echo"<br>";
                // echo"$input->val_id_transaksi";
                // echo"<br>";
                // echo"$input->val_id_user";
                // echo"<br>";
                // exit();
                //cek apakah id jurnal sudah ada ?
                $cekidjurnal = $this->db->query("SELECT id_jurnal from ac_jurnal where id_gl='$idGL'");
                // echo"$cekidjurnal";
                // exit();
                if ($cekidjurnal->getNumRows() > 0) {
                    $getid = $this->db->query("SELECT id_jurnal from ac_jurnal where id_gl='$idGL'")->getRow()->id_jurnal;
                    $id_jurnal = $getid;
                } else {
                    // echo"b";
                    // exit();
                    //jika belum ada ac_jurnal maka insert ac jurnal
                    $insertacjurnal = "INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                        '$idGL',
                        'Penjualan id Transaksi $input->val_id_transaksi',
                        '$input->val_id_user'
                    )returning id_jurnal";
                    // echo"$insertacjurnal";
                    // exit();
                    $id_jurnal = $this->db->query($insertacjurnal)->getRow()->id_jurnal;
                }
                // echo"$id_jurnal";
                // exit();
                // echo"$insertacjurnal";
                // exit();


                //cek komponen tarif maping
                $carikomponennull =  "SELECT
               jenis_component.jenis_component
           FROM
               transaksi 
               join pasien using(no_rm)
               join detail_transaksi using(id_transaksi)
               join detail_component using(id_detail_transaksi)
               JOIN jenis_component USING ( id_jenis_component )
               LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
               LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.kredit
           WHERE 
               id_transaksi = '$input->val_id_transaksi'
               and jurnal='f'
               AND account.id_acc is null
               group by 
               jenis_component.jenis_component,
               account.id_acc,
               account.coa,
               transaksi.id_transaksi,
               pasien.nama limit 1";
                if ($this->db->query($carikomponennull)->getNumRows() > 0) {
                    $komponenya = $this->db->query($carikomponennull)->getRow()->jenis_component;
                    // echo"a";exit();
                    $output['pesan'] = "Gagal Menjurnalkan silahkan cek mapping komponen $komponenya";
                    $output['status']   = "gagal";
                    $this->hasil($output);
                    exit();
                }

                // PROSES JURNAL DETAIL DEBIT
                $selectmapingcomponendebit = $this->db->query("SELECT
                                            jenis_component.jenis_component,
                                            sum(detail_component.harga*detail_transaksi.qty) as harga,
                                            account.id_acc,
                                            account.coa,
                                            transaksi.id_transaksi,
                                            pasien.nama,
                                            concat(account.coa,' ',transaksi.id_transaksi,' ',jenis_component.jenis_component) as keterangan
                                        FROM
                                            transaksi 
                                            join pasien using(no_rm)
                                            join detail_transaksi using(id_transaksi)
                                            join detail_component using(id_detail_transaksi)
                                            JOIN jenis_component USING ( id_jenis_component )
                                            LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
                                            LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.debit
                                        WHERE 
                                            id_transaksi = '$input->val_id_transaksi'
                                            and jurnal='f'
                                            group by 
                                            jenis_component.jenis_component,
                                            account.id_acc,
                                            account.coa,
                                            transaksi.id_transaksi,
                                            pasien.nama
                                            ");

                foreach ($selectmapingcomponendebit->getResult() as $rowselectmapingcomponendebit) {
                    // echo"$rowselectmapingcomponendebit->id_jenis_component";echo"<br>";
                    // echo"$rowselectmapingcomponendebit->id_acc";echo"<br>";
                    // echo"$rowselectmapingcomponendebit->jenis_component";echo"<br>";
                    // echo"$rowselectmapingcomponendebit->harga";echo"<br>";
                    // echo"$input->val_id_user";echo"<br>";
                    // exit();
                    // INSERT DETAIL JURNAL debit
                    $nama = str_replace("'", "''", "$rowselectmapingcomponendebit->nama");
                    $insert_detail_ac_jurnal = $this->db->query("INSERT INTO ac_jurnal_detail 
                    (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                    VALUES ('$id_jurnal', '$rowselectmapingcomponendebit->id_acc', '$rowselectmapingcomponendebit->keterangan','4','$nama','$rowselectmapingcomponendebit->harga','0','$input->val_id_user')");
                    // echo"$insert_detail_ac_jurnal";
                    // // exit();
                }
                // akhir debit
                // kredit

                $selectmapingcomponenkredit = $this->db->query("SELECT
                    jenis_component.jenis_component,
                    sum(detail_component.harga*detail_transaksi.qty) as harga,
                    account.id_acc,
                    account.coa,
                    transaksi.id_transaksi,
                    pasien.nama,
                    concat(account.coa,' ',transaksi.id_transaksi,' ',jenis_component.jenis_component) as keterangan
                FROM
                    transaksi 
                    join pasien using(no_rm)
                    join detail_transaksi using(id_transaksi)
                    join detail_component using(id_detail_transaksi)
                    JOIN jenis_component USING ( id_jenis_component )
                    LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
                    LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.kredit
                WHERE 
                    id_transaksi = '$input->val_id_transaksi'
                    and jurnal='f'
                    group by 
                    jenis_component.jenis_component,
                    account.id_acc,
                    account.coa,
                    transaksi.id_transaksi,
                    pasien.nama");
                //echo"$selectmapingcomponenkredit";

                //cek komponen tarif maping
                // $carikomponennull =  $this->db->query("SELECT
                //     jenis_component.jenis_component
                // FROM
                //     transaksi 
                //     join pasien using(no_rm)
                //     join detail_transaksi using(id_transaksi)
                //     join detail_component using(id_detail_transaksi)
                //     JOIN jenis_component USING ( id_jenis_component )
                //     LEFT JOIN map_componen_account_jurnal USING ( id_jenis_component )
                //     LEFT JOIN account ON account.id_acc = map_componen_account_jurnal.kredit
                // WHERE 
                //     id_transaksi = '$input->val_id_transaksi'
                //     and jurnal='f'
                //     AND account.id_acc is null
                //     group by 
                //     jenis_component.jenis_component,
                //     account.id_acc,
                //     account.coa,
                //     transaksi.id_transaksi,
                //     pasien.nama")->getRow()->jenis_component;

                // if ($carikomponennull > 0) {
                //     // echo"a";exit();
                //     $output['pesan'] = "Gagal Menjurnalkan silahkan cek maping komponen $carikomponennull";
                //     $output['status']   = "gagal";
                //     $this->hasil($output);
                //     exit();
                // }

                foreach ($selectmapingcomponenkredit->getResult() as $rowselectmapingcomponenkredit) {
                    // INSERT DETAIL JURNAL
                    $nama = str_replace("'", "''", "$rowselectmapingcomponenkredit->nama");
                    $insert_detail_ac_jurnal =  $this->db->query("INSERT INTO ac_jurnal_detail 
                    (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                    VALUES ('$id_jurnal', '$rowselectmapingcomponenkredit->id_acc', '$rowselectmapingcomponenkredit->keterangan','4','$nama','0','$rowselectmapingcomponenkredit->harga','$input->val_id_user')");
                }

                $sqlupdatejurnal = $this->db->query("SELECT
                                                * 
                                            FROM
                                                detail_component 
                                            WHERE
                                                detail_component.jurnal='f' 
                                                and id_detail_transaksi IN ( SELECT id_detail_transaksi FROM detail_transaksi WHERE id_transaksi = '$input->val_id_transaksi' )");

                foreach ($sqlupdatejurnal->getResult() as $rowsqlupdatejurnal) {
                    $this->db->query("UPDATE detail_component SET jurnal = 't' WHERE id_detail_transaksi = '$rowsqlupdatejurnal->id_detail_transaksi' AND id_jenis_component = '$rowsqlupdatejurnal->id_jenis_component' and jurnal='f' ");
                }


                // JURNAL PEMBAYARAN DETAIL
                $listpembayaran = $this->db->query("SELECT
                    case 
                    when pembayaran.piutang='t' then 'piutang'
                    when (pembayaran.piutang='f' and pembayaran.bank='f')  then 'kas'
                    when (pembayaran.piutang='f' and pembayaran.bank='t')  then 'bank'
                    end as kelompok,
                    bayar.tgl_bayar,
                    bayar.id_bayar,
                    bayar.id_transaksi,
                    bayar.id_pembayaran,
                    pembayaran.deskripsi_pembayaran,
                    bayar.jumlah,
                    ac_kas.id_kas,
                    ac_kas.kas_nama,
                    pembayaran.piutang,
                    pembayaran.bank,
                    pasien.nama,
                    ac_kas.id_acc,
                    ac_kas.kredit as kreditbayar                    
                FROM
                    bayar 
                    join pembayaran using(id_pembayaran)
                    left join ac_kas using(id_kas)
                    join transaksi using(id_transaksi)
                    join pasien using(no_rm)
                WHERE
                    id_transaksi = '$input->val_id_transaksi'
                    and jurnal ='f'");

                foreach ($listpembayaran->getResult() as $rowlistpembayaran) {

                    //tunai
                    if ($rowlistpembayaran->kelompok == 'kas') {
                        // if (($rowlistpembayaran->piutang == false || $rowlistpembayaran->piutang == 'f') && ($rowlistpembayaran->bank == false || $rowlistpembayaran->bank == 'f')) {
                        // echo "".$rowlistpembayaran->id_bayar."kas";
                        // echo "<br>";
                        //insert kas
                        $tambahjumlahkasteller = $this->db->query("UPDATE ac_kas 
                        SET jumlah = (jumlah + $rowlistpembayaran->jumlah) 
                        WHERE
                            id_kas = '$rowlistpembayaran->id_kas'");


                        $gl_kas_max = $this->db->query("SELECT
                                        max(substr(id_gl,4)::INTEGER+1) as glkasmax
                                    FROM
                                        ac_jurnal 
                                    WHERE
                                        id_gl ILIKE 'KM%'")->getRow()->glkasmax;
                        $newGL = "KM-$gl_kas_max";

                        //insert jurnal bayar 
                        $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                            '$newGL',
                            '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi',
                            '$input->val_id_user'
                        )returning id_jurnal")->getRow()->id_jurnal;

                        //kas debet    
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                        //piutang pendapatan kredit
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->kreditbayar', 'Piutang Pendapatan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                    }
                    //by bank
                    if ($rowlistpembayaran->kelompok == 'bank') {
                        // if (($rowlistpembayaran->piutang == false || $rowlistpembayaran->piutang == 'f') && ($rowlistpembayaran->bank == true || $rowlistpembayaran->bank == 't')) {
                        // echo "".$rowlistpembayaran->id_bayar."bank";
                        // echo "<br>";
                        //insert kas
                        $tambahjumlahkasbank = $this->db->query("UPDATE ac_kas 
                        SET jumlah = (jumlah + $rowlistpembayaran->jumlah) 
                        WHERE
                            id_kas = '$rowlistpembayaran->id_kas'");

                        $gl_kas_max = $this->db->query("SELECT
                        max(substr(id_gl,4)::INTEGER+1) as glkasmax
                        FROM
                        ac_jurnal 
                        WHERE
                        id_gl ILIKE 'KM%'")->getRow()->glkasmax;
                        $newGL = "KM-$gl_kas_max";

                        //insert jurnal bayar 
                        $id_jurnalkas = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) VALUES (
                        '$newGL',
                        '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi',
                        '$input->val_id_user'
                        )returning id_jurnal")->getRow()->id_jurnal;;
                        //insert kas
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                        (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                        VALUES ('$id_jurnalkas', '$rowlistpembayaran->id_acc', '$rowlistpembayaran->kas_nama id bayar$rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                        //piutang pendapatan kredit
                        $this->db->query("INSERT INTO ac_jurnal_detail 
                           (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) 
                           VALUES ('$id_jurnalkas', '$rowlistpembayaran->kreditbayar', 'Piutang Pendapatan transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                    }
                    //piutang
                    if ($rowlistpembayaran->kelompok == 'piutang') {
                        $gl_piu_max = $this->db->query("SELECT
                        CASE
                            WHEN
                            x.glmaxpiu IS NULL THEN 1 
                            ELSE x.glmaxpiu 
                            end as glmax_piutang
                            from ( SELECT MAX ( substr( id_gl, 5 ) :: INTEGER + 1 ) AS glmaxpiu FROM ac_jurnal WHERE id_gl ILIKE'PIU%' ) x")->getRow()->glmax_piutang;
                        $newGL_piu = "PIU-$gl_piu_max";

                        switch ($rowlistpembayaran->id_pembayaran) {
                            case "15": //jika piutang karyawan
                                //debet
                                $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                                                    VALUES ('34', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                //tabel ac_jurnal
                                //insert jurnal piutang 
                                $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    VALUES (
                                            '$newGL_piu',
                                            'Piutang karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                            '$input->val_id_user'
                                            )returning id_jurnal")->getRow()->id_jurnal;
                                //piutang karyawan debet    
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '34', 'Piutang Karyawan id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                //piutang pendapatan kredit
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                                break;

                            case "2": //jika piutang bpjs
                                //debet
                                $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) VALUES ('254', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                //tabel ac_jurnal
                                //insert jurnal piutang 
                                $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    VALUES (
                                            '$newGL_piu',
                                            'Piutang bpjs id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                            '$input->val_id_user'
                                            )returning id_jurnal")->getRow()->id_jurnal;
                                //piutang bpjs debet    
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '254', 'Piutang BPJS id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                //piutang pendapatan kredit
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                                break;

                            default: // selain itu masuk ke piutang non bpjs
                                $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) VALUES ('49', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                                //tabel ac_jurnal
                                //insert jurnal piutang 
                                $id_jurnalpiutang = $this->db->query("INSERT INTO ac_jurnal (id_gl,keterangan,id_pegawai) 
                                    VALUES (
                                            '$newGL_piu',
                                            'Piutang Non bpjs id bayar $rowlistpembayaran->id_bayar transaksi $rowlistpembayaran->id_transaksi',
                                            '$input->val_id_user'
                                            )returning id_jurnal")->getRow()->id_jurnal;
                                //piutang non bpjs debet    
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '49', 'Piutang Non Bpjs id bayar $rowlistpembayaran->id_bayar transaksi$rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','$rowlistpembayaran->jumlah','0','$input->val_id_user')");
                                //piutang pendapatan kredit
                                $this->db->query("INSERT INTO ac_jurnal_detail (id_jurnal, id_acc, keterangan, penerima, nm_penerima, debit,kredit,id_pegawai) VALUES ('$id_jurnalpiutang', '32', 'Piutang Pendapatan transaksi $rowlistpembayaran->id_transaksi','4','$rowlistpembayaran->nama','0','$rowlistpembayaran->jumlah','$input->val_id_user')");
                        }
                        // $gl_piu_max = $this->db->query("SELECT
                        // CASE
                        //     WHEN
                        //     x.glmaxpiu IS NULL THEN 1 
                        //     ELSE x.glmaxpiu 
                        //     end as glmax_piutang
                        //     from ( SELECT MAX ( substr( id_gl, 4 ) :: INTEGER + 1 ) + 1 AS glmaxpiu FROM ac_jurnal WHERE id_gl ILIKE'PIU%' ) x")->getRow()->glmax_piutang;
                        //  $newGL_piu = "PIU-$gl_piu_max";


                        // switch ($rowlistpembayaran->id_pembayaran) {
                        //     case "15":
                        //         //jika piutang karyawan
                        //         $i = $this->db->query("INSERT INTO ac_ar 
                        //     (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //     VALUES ('34', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                        //         break;
                        //     default:
                        //         $i = $this->db->query("INSERT INTO ac_ar 
                        //       (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //       VALUES ('32', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                        // }

                        // 05/03/2024 tambahan bpjs dan non bpjs
                        // switch ($rowlistpembayaran->id_pembayaran) {
                        //     case "15": //jika piutang karyawan
                        //         //debet
                        //         $i = $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //                             VALUES ('34', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                        //         //kredit
                        //        // $i = $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //                             //VALUES ('32', '6', '$rowlistpembayaran->id_bayar','0','$rowlistpembayaran->jumlah','$rowlistpembayaran->nama')");
                        //         break;
                        //     case "2": //jika piutang bpjs
                        //             //debet
                        //         $i = $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //                                 VALUES ('254', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                        //             //kredit
                        //         //$i = $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //                                  //VALUES ('32', '6', '$rowlistpembayaran->id_bayar','0','$rowlistpembayaran->jumlah','$rowlistpembayaran->nama')");
                        //         break;    
                        //     default: // selain itu masuk ke piutang non bpjs
                        //         $i = $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //                                 VALUES ('49', '6', '$rowlistpembayaran->id_bayar','$rowlistpembayaran->jumlah','0','$rowlistpembayaran->nama')");
                        //       //kredit
                        //         //$i = $this->db->query("INSERT INTO ac_ar (id_acc, id_penerima, id_bayar, debit, kredit,nm_penerima) 
                        //                                 //VALUES ('32', '6', '$rowlistpembayaran->id_bayar','0','$rowlistpembayaran->jumlah','$rowlistpembayaran->nama')");
                        // }



                    }
                }

                //update jurnal f di bayar
                $this->db->query("UPDATE bayar SET jurnal = 't' WHERE id_transaksi = '$input->val_id_transaksi'");
                // $this->db->query("UPDATE transaksi SET jurnal = 't' WHERE id_transaksi = '$input->val_id_transaksi'");



                $this->db->transComplete();


                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Tutup Transaksi";
                    // echo"a";
                    // exit();
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal Tutup Transaksai";
                }
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Pembayaran belum balance";
                $output['nominalkurang']    = $hasil;

                // echo"b";
                // exit();
            }
        }
        $this->hasil($output);
    }
    public function generatetarifkasir()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_id_transaksi',
            'val_id_penjamin'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query =  $this->db->query("SELECT 
            transaksi.id_transaksi,
     detail_kunjungan.id_produk,
     detail_kunjungan.qty,
     detail_kunjungan.id_kunjungan,
     detail_kunjungan.id_detail_kunjungan,
     tarif.id_tarif
FROM
    transaksi
    LEFT JOIN kunjungan USING ( id_transaksi )
    LEFT JOIN detail_kunjungan USING ( id_kunjungan ) 
    JOIN tarif USING(id_produk)
WHERE
    detail_kunjungan.id_detail_kunjungan NOT IN ( SELECT id_detail_kunjungan FROM detail_transaksi WHERE id_transaksi = '$input->val_id_transaksi' ) 
    AND id_transaksi = '$input->val_id_transaksi'
    AND tarif.id_penjamin='$input->val_id_penjamin'
    AND tarif.tgl_selesai is null");
            if ($query->getNumRows() > 0) {
                $this->db->transStart();
                foreach ($query->getResult() as $row) {
                    $querydetailtransaksi =  $this->db->query("INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, id_tarif, qty, id_detail_kunjungan) 
                    VALUES ('$input->val_id_transaksi', '$row->id_kunjungan', '$row->id_produk','$row->id_tarif','$row->qty','$row->id_detail_kunjungan')");
                }
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "Sukses generate " . $query->getNumRows() . " produk";
                } else {
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Gagal hubungi admin";
                    //$output['error']    = $this->db->error()['message'];
                    //echo"$query";
                }
            } else {
                $output['status']   = "sukses";
                $output['code']     = "200";
                $output['pesan']    = "Tarif sudah lengkap";
            }
        }
        echo json_encode($output);
    }
    public function Kasir_GantipenjamingenerateTarif()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi',
            'id_penjamin'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $querycekapakahsudahadatarif =  $this->db->query("SELECT
                nama_produk 
            FROM
                produk 
            WHERE
                id_produk IN ( SELECT id_produk FROM detail_transaksi WHERE id_transaksi = '$input->id_transaksi' ) 
                AND id_produk NOT IN ( SELECT id_produk FROM tarif WHERE id_penjamin = '$input->id_penjamin' and ( tgl_selesai IS NULL OR tgl_selesai > NOW()))");



            if ($querycekapakahsudahadatarif->getNumRows() > 0) {
                $namaproduk = $querycekapakahsudahadatarif->getRow()->nama_produk;
                $output['status']   = "gagal";
                $output['code']     = "XX";
                $output['pesan']    = "Tarif <b>$namaproduk</b> belum ada di penjamin yang dipilih";
                echo json_encode($output);
                exit();
            } else {
                $cekdetailtransaksiapotek = $this->db->query("select * from detail_transaksi join produk using(id_produk) join jenis_produk using(id_jenis_produk) where detail_transaksi.id_transaksi='$input->id_transaksi' and id_jenis_produk in ('3')");
                if ($cekdetailtransaksiapotek->getNumRows() > 0) {
                    $output['status']   = "gagal";
                    $output['code']     = "XX";
                    $output['pesan']    = "Hubungi Apoti untuk unposting terlebih dahulu sebelum mengganti tarif";
                    echo json_encode($output);
                    exit();
                }

                $queryhapusdetailtransaksi = $this->db->query("DELETE FROM detail_transaksi WHERE id_transaksi= '$input->id_transaksi'");
                $query =  $this->db->query("SELECT 
                                                transaksi.id_transaksi,
                                        detail_kunjungan.id_produk,
                                        detail_kunjungan.qty,
                                        detail_kunjungan.id_kunjungan,
                                        detail_kunjungan.id_detail_kunjungan,
                                        tarif.id_tarif
                                    FROM
                                        transaksi
                                        LEFT JOIN kunjungan USING ( id_transaksi )
                                        LEFT JOIN detail_kunjungan USING ( id_kunjungan ) 
                                        JOIN tarif USING(id_produk)
                                    WHERE
                                        detail_kunjungan.id_detail_kunjungan NOT IN ( SELECT id_detail_kunjungan FROM detail_transaksi WHERE id_transaksi = '$input->id_transaksi' ) 
                                        AND id_transaksi = '$input->id_transaksi'
                                        AND tarif.id_penjamin='$input->id_penjamin'
                                        AND tarif.tgl_selesai is null");
                if ($query->getNumRows() > 0) {
                    $this->db->transStart();
                    foreach ($query->getResult() as $row) {
                        $querydetailtransaksi =  $this->db->query("INSERT INTO detail_transaksi (id_transaksi, id_kunjungan, id_produk, id_tarif, qty, id_detail_kunjungan) 
                    VALUES ('$input->id_transaksi', '$row->id_kunjungan', '$row->id_produk','$row->id_tarif','$row->qty','$row->id_detail_kunjungan')");
                    }
                    $this->db->transComplete();
                    if ($this->db->transStatus()) {
                        $output['status']   = "sukses";
                        $output['code']     = "200";
                        $output['pesan']    = "Sukses ganti tarif " . $query->getNumRows() . " produk";
                    } else {
                        $output['status']   = "gagal";
                        $output['code']     = "XX";
                        $output['pesan']    = "Gagal hubungi admin";
                        //$output['error']    = $this->db->error()['message'];
                        //echo"$query";
                    }
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "Tarif sudah lengkap";
                }
            }
        }
        echo json_encode($output);
    }
    public function laporanpercomponen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $replacetglwal = str_replace("/", "-", $_POST['tglawal']);
        $dateawal = date_create($replacetglwal);
        $tglawal = date_format($dateawal, "Y-m-d");

        $replacetglakhir = str_replace("/", "-", $_POST['tglakhir']);
        $dateakhir = date_create($replacetglakhir);
        $tglakhir = date_format($dateakhir, "Y-m-d");



        $query = $this->db->query("SELECT
        transaksi.id_transaksi,
        nama,
        nama_penjamin,
        sum(detail_component.harga*detail_transaksi.qty) as sum_sub_jumlahharga
    FROM
        transaksi
        join pasien on pasien.no_rm=transaksi.no_rm
        join detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi
        join detail_component on detail_component.id_detail_transaksi=detail_transaksi.id_detail_transaksi
        left join penjamin_transaksi on penjamin_transaksi.id_transaksi=transaksi.id_transaksi and penjamin_transaksi.penjamin_utama='t'
        left join penjamin on penjamin.id_penjamin=penjamin_transaksi.id_penjamin
    WHERE
        DATE ( tgl_tutup ) BETWEEN '$tglawal' 
        AND '$tglakhir'
        GROUP by transaksi.id_transaksi,nama_penjamin,nama");


        $html = "<html>
            <body>
            <div>
    <table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
            <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM
                <p style='font-size:30px;color:#14B937'>DARMAYU</p>
            </td>
        </tr>
        <tr>
            <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
            <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
    </table>
    <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'>
    <div style='text-align:center';paddibg-top:15px>Laporan Penerimaan Pasien Percomponent " . date_indo($tglawal) . " sd " . date_indo($tglakhir) . " </div>

    <table border='1' style='font-family: Arial, Helvetica, sans-serif;width:100%' >
    ";
        foreach ($query->getResult() as $row) {
            $html .= "<tr>
            <td colspan='4'><b>No.Transaksi : " . $row->id_transaksi . " / " . $row->nama . " / " . $row->nama_penjamin . " / " . format_ribuan($row->sum_sub_jumlahharga) . " </b></td>
            </tr>";
            $html .= "<tr>
            <td><b>Tgl.Tutup Transaksi</b></td>
            <td><b>Jenis Componen</b></td>
            <td><b>Diskon</b></td>
            <td><b>Jumlah</b></td>

            </tr>";
            $query_detail = $this->db->query("SELECT
            date(tra.tgl_tutup) as tgl_tutup,
                tra.id_transaksi,
                jc.jenis_component,
                sum(dc.harga_asli) sum_harga_asli,
                sum(dc.diskon_rupiah) as sum_diskon_rupiah,
                sum(dc.harga*dtra.qty) as sum_harga
            FROM
                detail_component dc
                JOIN detail_transaksi dtra ON dc.id_detail_transaksi = dtra.id_detail_transaksi
                join jenis_component jc on jc.id_jenis_component=dc.id_jenis_component
                join transaksi tra on tra.id_transaksi=dtra.id_transaksi and tra.tgl_tutup is not null
                WHERE date(tra.tgl_tutup) between '$tglawal' and '$tglakhir'
                and tra.id_transaksi='$row->id_transaksi'
                GROUP by tra.tgl_tutup,jenis_component, tra.id_transaksi,jc.jenis_component");
            foreach ($query_detail->getResult() as $row_detail) {
                $html .= "<tr>
                        <td>" . tglindo($row_detail->tgl_tutup) . "</td>
                        <td>$row_detail->jenis_component</td>
                        <td>" . format_ribuan($row_detail->sum_diskon_rupiah) . "</td>
                        <td>" . format_ribuan($row_detail->sum_harga) . "</td>
                    </tr>
                    ";
            }
        };


        $html .= "</table>
    

    

</div>
            </body>
            </html>";
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'

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
    public function pegawaikas()
    {
        $x =  $this->db->query("SELECT * FROM users where id_kas is not null order by nama ");
        $output['status'] = 'sukses';
        $output['data'] = $x->getResult();

        echo json_encode($output);
    }
    public function ceknominalkoma()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_transaksi'
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $query = "SELECT
            count(id_transaksi) as jum
        FROM
            detail_transaksi 
        WHERE
            id_transaksi = '$input->id_transaksi' 
            AND total_harga :: VARCHAR ILIKE '%.%'";
            $query = $this->db->query($query)->getRow()->jum;


            $sum = $query;
            // $sum = $this->db->query($query);
            $output['status'] = "sukses";
            $output['data'] = $sum;
            // $output['data'] = $sum->getResult();

        }
        $this->hasil($output);
    }
    public function penatajasaRWJ_deletecomponentpegawai()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_jenis_component',
            'id_detail_transaksi'
        ];

        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "UPDATE detail_component SET id_pegawai = NULL WHERE id_detail_transaksi = '$input->id_detail_transaksi' AND id_jenis_component = '$input->id_jenis_component'";
            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) {
                $output['status']   = "sukses";
                $output['code']   = "200";
                $output['pesan']    = "Sukses";
            } else {
                $output['status']   = "gagal";
                $output['code']   = "XX";
                $output['pesan']    = "Gagal";
            }
        }
        $this->hasil($output);
    }
    public function LaporanPertindakanPerkomponen2()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Komponen Detail V2.xls");

        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));

        $tglawal    = $_POST['tglawal'];
        $tglakhr    = $_POST['tglakhir'];

        $replacetglwal  = str_replace("/", "-", $_POST['tglawal']);
        $dateawal       = date_create($replacetglwal);
        $tglawal1       = date_format($dateawal, "d-M-Y");

        $replacetglwal2 = str_replace("/", "-", $_POST['tglakhir']);
        $dateawal2      = date_create($replacetglwal2);
        $tglawal2       = date_format($dateawal2, "d-M-Y");


        $query  = $this->db->query("SELECT
        transaksi.id_transaksi,
        transaksi.tgl_transaksi,
        transaksi.tgl_tutup,
        pasien.no_rm,
        pasien.nama,
        unit.nama_unit,
        produk.nama_produk,
        jenis_component.jenis_component,
        detail_component.harga*detail_transaksi.qty as harga,
        account.coa
    FROM
        detail_component
        JOIN detail_transaksi using( id_detail_transaksi )
        JOIN transaksi using(id_transaksi)
        JOIN kunjungan using(id_kunjungan)
        JOIN unit using(id_unit)
        JOIN pasien using(no_rm)
        JOIN produk using(id_produk)
        JOIN jenis_component using(id_jenis_component)
        JOIN map_componen_account_jurnal on map_componen_account_jurnal.id_jenis_component=jenis_component.id_jenis_component
        JOIN account on account.id_acc=map_componen_account_jurnal.kredit
        where transaksi.tgl_tutup is not null
        and date(transaksi.tgl_transaksi) BETWEEN '$tglawal' and '$tglakhr'
        order by transaksi.id_transaksi asc;
        ");
        // echo"$query";
        // exit();
        $html = "<html>
                    <body style='font-family: Times New Roman;'>
                        <h4 style='text-align:center; font-weight: bold';>Laporan Penerimaan Perkomponen Detail <br>Tanggal $tglawal1 s/d $tglawal2 </h4>
                        <table border='1' cellspacing='1' cellpadding='1' class='table-sm table-bordered'>
                            <tr style='background-color: #abdaa8;'>
                                <td><b>No</b></td>
                                <td><b>No. Transaksi</b></td>
                                <td><b>Tgl. Transaksi</b></td>
                                <td><b>Tgl. Tutup Transaksi</b></td>
                                <td><b>No Rm</b></td>
                                <td><b>Nama Pasien</b></td>
                                <td><b>Unit</b></td>
                                <td><b>Deskripsi</b></td>
                                <td><b>Komponen</b></td>
                                <td><b>Nominal</b></td>
                                <td><b>Coa</b></td>
                            </tr>";
        if ($query->getNumRows() > 0) {
            $no = 1;
            foreach ($query->getResult() as $row) {
                $html .= "  <tr>
                                <td style='vertical-align: middle;'>$no</td>
                                <td style='vertical-align: middle;'>$row->id_transaksi</td>
                                <td style='vertical-align: middle;'>$row->tgl_transaksi</td>
                                <td style='vertical-align: middle;'>$row->tgl_tutup</td>
                                <td style='vertical-align: middle;'>$row->no_rm</td>
                                <td style='vertical-align: middle;'>$row->nama</td>
                                <td style='vertical-align: middle;'>$row->nama_unit</td>
                                <td style='vertical-align: middle;'>$row->nama_produk</td>
                                <td style='vertical-align: middle;'>$row->jenis_component</td>
                                <td style='vertical-align: middle;'>$row->harga</td>
                                <td style='vertical-align: middle;'>$row->coa</td>
                            </tr>";
                $no++;
            }
        } else {
            $html .= "  <tr>
                            <td colspan='15' style='vertical-align: middle; text-align: center;'><b>-- Data Tidak Ditemukan --</b></td>                            
                        </tr>";
        }

        $html .= "      </table>
                    </body>
                </html>";

        echo $html;
        exit;
    }
    public function cetakbill()
    {
        $input = json_decode(file_get_contents('php://input'));
        // var_dump($input);
        // exit();
        $namauser   = $_POST['namausernya'];
        // echo"$namauser";
        // exit();
        $validtrans   = $_POST['idtransaksi'];
        // echo"$validtrans";
        // exit();
        $querypasien = $this->db->query("SELECT * FROM
        transaksi
        JOIN pasien USING ( no_rm )
        JOIN kelurahan ON pasien.kd_kelurahan_ktp = kelurahan.kd_kelurahan
        JOIN kecamatan USING ( kd_kecamatan )
        JOIN kabupaten USING ( kd_kabupaten )
        JOIN propinsi USING ( kd_propinsi ) 
     WHERE
         transaksi.id_transaksi = '$validtrans'
         ");

        $querydokterkunjungan = $this->db->query("SELECT
        distinct(nama_pegawai)
        FROM
        transaksi
        JOIN kunjungan USING ( id_transaksi ) 
        JOIN pegawai using(id_pegawai)
        WHERE
        id_transaksi = '$validtrans'
        and pegawai.jenis_pegawai='1'");

        $nama_penjamin = $this->db->query("select nama_penjamin from penjamin_transaksi join penjamin using(id_penjamin) where id_transaksi='$validtrans' and penjamin_utama='t'")->getRow()->nama_penjamin;;
        $sep = $this->db->query("select no_sjp from penjamin_transaksi join penjamin using(id_penjamin) where id_transaksi='$validtrans' and penjamin_utama='t'")->getRow()->no_sjp;;

        $query = $this->db->query("SELECT
        produk.id_produk,
        kunjungan.tgl_masuk,
        unit.nama_unit,
        produk.nama_produk,
        jenis_produk.deskripsi,
        x.harga_asli,
        x.harga_penyajian,
        x.diskon_rupiah,
        x.sum_diskon_rupiah,
        detail_transaksi.qty,
        detail_transaksi.harga,
        detail_transaksi.total_harga,
        x.sum_total_harga_asli,
                case when x.harga_detail_component = x.harga_asli Then  x.sum_total_harga_asli
                         when x.harga_detail_component <> x.harga_asli Then  x.sum_detail_component
                         END hargapenyajiantotal,
                case when x.sum_diskon_rupiah = 0 Then  x.harga_penyajian
                         when (x.sum_diskon_rupiah > 0 or x.sum_diskon_rupiah is null) Then  x.harga_asli
                         END v_hargapenyajian              
        FROM
        detail_transaksi
        JOIN kunjungan USING ( id_kunjungan ) 
        JOIN produk USING (id_produk)
        JOIN jenis_produk using (id_jenis_produk)
        JOIN unit USING (id_unit)
        LEFT JOIN (
                                SELECT id_produk,id_detail_transaksi,
                                sum((harga_asli*qty)/qty) as harga_asli,
                                sum(harga_asli*qty) as sum_total_harga_asli, 
                                sum(diskon_rupiah*qty) as sum_diskon_rupiah,
                                sum((diskon_rupiah*qty)/qty) as diskon_rupiah,
                                sum((detail_component.harga*qty)/qty) as harga_detail_component,
                                sum(detail_component.harga*qty) as sum_detail_component,
                                SUM ( (detail_component.harga * qty) / qty ) AS harga_penyajian
                                FROM 
                                detail_transaksi JOIN detail_component using(id_detail_transaksi) 
                                where detail_transaksi.id_transaksi = '$validtrans'
                                GROUP by id_produk,id_detail_transaksi
                            ) x on detail_transaksi.id_detail_transaksi=x.id_detail_transaksi
        WHERE
        detail_transaksi.id_transaksi = '$validtrans' order by kunjungan.tgl_masuk,unit.nama_unit");

        $querytotal = $this->db->query("SELECT sum(total_harga) as totalharga FROM
        detail_transaksi
        WHERE
        id_transaksi = '$validtrans'");

        $querybayar = $this->db->query("SELECT * from bayar join pembayaran using(id_pembayaran) WHERE id_transaksi = '$validtrans'");
        // var_dump($querypasien);
        // exit();

        //cek apakah ada inap
        $cekinap = $this->db->query("select count(id_kunjungan) as adainap from kunjungan where id_transaksi='$validtrans' and id_kamar is not null")->getRow()->adainap;
        if ($cekinap > 0) {
            //awal masuk kunjungan entah itu igd atau inap
            // $masukawalsekali = $this->db->query("select tgl_masuk from kunjungan where id_transaksi='$validtrans' and status_kunjungan=0")->getRow()->tgl_masuk;
            //awal masuk inap
            $masukawalinap =  $this->db->query("select tgl_masuk from kunjungan where id_transaksi='$validtrans' and awal_inap='t'")->getRow()->tgl_masuk;
            //keluar inap
            $keluarinap = $this->db->query("select tgl_keluar from kunjungan where id_transaksi='$validtrans' and status_kunjungan='3'")->getRow()->tgl_keluar;
            if ($keluarinap == null || $keluarinap == '') {
                $keluarinap = '-';
                $lamarawat = '-';
                $keluarinap_indo = '-';
                $masukawalinap_indo = date_indo($masukawalinap);
            } else {
                $keluarinap_indo = date_indo($keluarinap);
                $masukawalinap_indo = date_indo($masukawalinap);
                $date1 = date_create("$masukawalinap");
                $date2 = date_create("$keluarinap");
                $diff = date_diff($date1, $date2);
                $lamarawat = ($diff->format("%R%a")) + 1;
                // exit();
            }
            //

            $htmlinap = "<tr>
                            <td>Tgl. Masuk inap</td>
                            <td>:</td>
                            <td>" . $masukawalinap_indo . "</td>
                          </tr>
                          <tr>
                            <td>Tgl. Keluar inap</td>
                            <td>:</td>
                            <td>" . $keluarinap_indo . "</td>
                          </tr>
                          <tr>
                            <td>Lama Rawat</td>
                            <td>:</td>
                            <td>" . $lamarawat  . " hari</td>
                          </tr>";
        } else {
            $htmlinap = "";
        }
        $html = "<div><table border='0' style='font-family: Arial, Helvetica, sans-serif;'>
        <tr>
            <td rowspan='5' align='right' style='width: 200px;text-align:right;float: right;'><img src='_assets/dist/img/darmayu.jpg' height='100px'></td>
            <td style='width: 600px;text-align: center;font-weight: bold;font-size: 20px;letter-spacing: 2px;'>
                RUMAH SAKIT UMUM
                <p style='font-size:30px;color:#14B937'>DARMAYU</p>
            </td>
        </tr>
        <tr>
            <td style='width: 600px;text-align: center;font-size: 12px;letter-spacing: 1px;'>Jl. Kapten Tendean No. 47, Kelurahan Demangan, Kecamatan Taman, Kota Madiun</td>
        </tr>
        <tr>
            <td style='width:600px;text-align: center;font-size: 14px;font-weight: bold;letter-spacing: 1px;'>Telp 0351-4109999 | Email : rsudarmayumdn@yahoo.com</td>
        </tr>
    </table>
    <hr style='height:5px;border-top:4px solid black;border-bottom:2px solid black;'></div>";
        $html .= " <table align='center' style='border:0px solid black;border-collapse:collapse;width:100%;'>";

        foreach ($querypasien->getResult() as $datatransaksi); {
            if ($datatransaksi->jenis_kelamin == 'f') {
                $kelamin = "Perempuan";
            } else {
                $kelamin = "Laki-laki";
            }
            $tgltransaksi = substr($datatransaksi->tgl_transaksi, 0, 10);
            if ($datatransaksi->tgl_tutup == null || $datatransaksi->tgl_tutup == '') {
                $tgltutuptransaksi = "-";
            } else {
                $tgltutuptransaksi = date_indo(substr($datatransaksi->tgl_tutup, 0, 10));
            }

            // echo"$tgltutuptransaksi";exit();
            $html .= "<tr>
            <td style='width: 150px;'>No. Transaksi</td>
            <td style='width: 5px;'>:</td>
            <td>#" . $datatransaksi->id_transaksi . "</td>
            </tr>
            <tr>
            <td style='width: 150px;'>Penjamin</td>
            <td style='width: 5px;'>:</td>
            <td>" . $nama_penjamin . "</td>
            </tr>
            <tr>
            <td style='width: 150px;'>No. Penjamin</td>
            <td style='width: 5px;'>:</td>
            <td>" . $sep . "</td>
            </tr>
            <tr>
            <td>Tgl. Transaksi</td>
            <td>:</td>
            <td>" . date_indo($tgltransaksi) . "</td>
            </tr>
            <tr>
            <td>Tgl. Tutup Transaksi</td>
            <td>:</td>
            <td>" . $tgltutuptransaksi . "</td>
            </tr>
            <tr>
            <td>Nama</td>
            <td>:</td>
            <td>$datatransaksi->nama</td>
            </tr>
            <tr>
            <td>No.Rekam Medis</td>
            <td>:</td>
            <td>$datatransaksi->no_rm</td>
            </tr>
            <tr>
            <td>Kelamin</td>
            <td>:</td>
            <td>$kelamin</td>
            </tr>
            <tr>
            <td>Tgl. Lahir</td>
            <td>:</td>
            <td>" . date_indo($datatransaksi->tgl_lahir) . "</td>
            </tr>
            <tr>
            <td valign='top'>Alamat</td>
            <td valign='top'>:</td>
            <td valign='top'>" . $datatransaksi->alamat_ktp . ", " . $datatransaksi->kelurahan . ", " . $datatransaksi->kecamatan . "," . $datatransaksi->kabupaten . " " . $datatransaksi->propinsi . " </td>
            </tr>
            $htmlinap";
        }
        $html .= "</table>";
        $html .= "
          <br>
          <table border='1' align='center'  style='border:1px solid black;border-collapse:collapse;width:100%;'>
            <tr>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>No</th>
            <th style='border:1px solid black;text-align: left;font-weight: bold;'>Unit</th>
            <th style='border:1px solid black;text-align: left;font-weight: bold;'>Deskripsi</th>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Jumlah</th>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Harga</th>
            <th style='border:1px solid black;text-align: center;font-weight: bold;width:50px;'>Diskon</th>
            <th style='border:1px solid black;text-align: right;font-weight: bold;width:130px;'>Total</th>
            </tr>
            ";
        $queryjenisproduk = $this->db->query("SELECT
        jenis_produk.id_jenis_produk,
        jenis_produk.deskripsi
    FROM
        detail_transaksi 
        join produk using(id_produk)
        join jenis_produk using(id_jenis_produk)
    WHERE
        id_transaksi = '$validtrans'
        GROUP by jenis_produk.id_jenis_produk
        order by jenis_produk.deskripsi asc");
        foreach ($queryjenisproduk->getResult() as $datajenisproduk) {
            $html .= "
            <tr>
                <td colspan='7'><b>$datajenisproduk->deskripsi</b></td>
            </tr>";
            $no = 1;
            $sum = 0;

            foreach ($query->getResult() as $row) {
                if ($datajenisproduk->deskripsi == $row->deskripsi) {

                    $html .= "
                    <tr>
                    <td style='border:1px solid black;text-align: center;'>$no</td>
                    <td style='border:1px solid black;'>$row->nama_unit</td>
                    <td style='border:1px solid black;'>$row->nama_produk";
                    if ($datajenisproduk->id_jenis_produk == '10' || $datajenisproduk->id_jenis_produk == '5' || $datajenisproduk->id_jenis_produk == '13') {
                        $querypeg = $this->db->query("SELECT
                                                    pegawai.nama_pegawai 
                                                FROM
                                                    detail_component join pegawai on detail_component.id_pegawai=pegawai.id_pegawai
                                                    join jenis_component on jenis_component.id_jenis_component=detail_component.id_jenis_component
                                                WHERE
                                                    id_detail_transaksi = '$row->id_detail_transaksi'");
                        foreach ($querypeg->getResult() as $row_querypeg) {

                            $html .= "<br><p style='font-size:10px'>$row_querypeg->nama_pegawai</p>";
                        }
                    }

                    $html .= "</td>                    <td style='border:1px solid black;text-align: center;'>$row->qty</td>
                    <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->v_hargapenyajian) . "</td>
                    <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->sum_diskon_rupiah) . "</td>
                    <td style='border:1px solid black;text-align: right;'>" . format_ribuan($row->total_harga) . "</td>
                    </tr>
                    ";
                    $no++;
                    $sum += $row->total_harga;
                }
            }
            $html .= "
            <tr>
                <td colspan='6' style='text-align:right'><b>Sub Total</b></td>
                <td style='text-align:right'><b>" . format_ribuan($sum) . "</b></td>
            </tr>";
        }


        foreach ($querytotal->getResult() as $rowtotal) {

            $html .= "
            <tr>
            <td style='text-align: right;font-weight: bold' colspan='6'>Total Biaya</td>
            <td  style='text-align: right;font-weight: bold'>Rp. " . format_ribuan($rowtotal->totalharga) . "</td>
            </tr>
            ";
        }
        foreach ($querybayar->getResult() as $rowtotalbayar) {
            $html .= "
            <tr>
            <td style='border:1px solid black;text-align: right;font-weight: bold' colspan='6'>" . $rowtotalbayar->deskripsi_pembayaran . "</td>
            <td  style='border:1px solid black;text-align: right;font-weight: italic;'><i>Rp. " . format_ribuan($rowtotalbayar->jumlah) . "<i></td>
            </tr>
            ";
        }
        $html .= "
            </table>
            <br>
            <div style='border:0px solid black;border-collapse:collapse;width:100%';font-size:8px><u><b>Dokter</b></u> :</div>
            <table style='border:0px solid black;border-collapse:collapse;width:100%'>";
        foreach ($querydokterkunjungan->getResult() as $rowquerydokterkunjungan) {
            $html .= "
            <tr>
            <td style='font-size:10px'>$rowquerydokterkunjungan->nama_pegawai</td>
            </tr>";
        }
        $html .= "</table><pagebreak>";
        //RESEP

        $cariresep = $this->db->query(" SELECT * FROM kunjungan inner join far_obat_out using(id_kunjungan) WHERE id_transaksi = '$validtrans' and far_obat_out.dilayani='1' order by id_kunjungan asc");

        foreach ($cariresep->getResult() as $listRow_cariresep) {
            $id_kunj   =  $listRow_cariresep->id_kunjungan;
            //$tgl_kunj  = $listRow_cariresep->tgl_masuk;
            //echo"a";exit();

            $tgl_resp  = $listRow_cariresep->tglresep;

            $no_rm     = $listRow_cariresep->norm;

            $idunit    = $listRow_cariresep->id_unit;

            $noresep   = $listRow_cariresep->noresep;


            $getJenisUnit   = " SELECT 
             jenis_unit
             FROM unit WHERE id_unit = '" . $idunit . "'";

            $rowx        = $this->db->query($getJenisUnit)->getRow();
            $jenis_unit = $rowx->jenis_unit;

            if ($jenis_unit == 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Cek Unit Pasien dari Gawat Darurat, Rawat Jalan atau Rawat Inap";
                $this->hasil($output);
                return;
            } else {
                if (($jenis_unit == '1') || ($jenis_unit == '7')) {
                    $idfar = '4001';
                } else if ($jenis_unit == '2') {
                    $idfar = '4002';
                } else if ($jenis_unit == '3') {
                    $idfar = '4003';
                } else if ($jenis_unit == '4') {
                    $idfar = $idunit;
                }
            }

            $id_kunj_far = $this->cekIdKunjunganResep($noresep, $id_kunj, $no_rm, $idfar);

            $query  = " SELECT
             no_rm, pasien.nama, tgl_masuk,
             id_kunjungan,
             noresep, tglresep,
             far_obat_out.id_unit,
             nama_unit,
             tgl_lahir,
             id_kunjungan_far,
             nama_pegawai,
             users.nama AS nm_user,
             nama_penjamin,
             gatot, hpp, ppn,
             kunjungan.id_unit
             FROM
             far_obat_out
             LEFT JOIN kunjungan USING ( id_kunjungan )
             INNER JOIN transaksi USING ( id_transaksi )
             INNER JOIN pasien USING ( no_rm )
             INNER JOIN unit ON kunjungan.id_unit = unit.id_unit 
                                 --INNER JOIN pegawai ON pegawai.id_pegawai = kunjungan.id_pegawai
                                 INNER JOIN pegawai ON pegawai.id_pegawai = far_obat_out.id_pegawai
                                 INNER JOIN users ON users.id_user = far_obat_out.id_user
                                 INNER JOIN penjamin ON penjamin.id_penjamin = far_obat_out.penjamin
                                 WHERE
                                 LEFT ( kunjungan.id_unit, 1 ) = '$jenis_unit' and
                                 far_obat_out.id_kunjungan_far = '$id_kunj_far'";

            $row        = $this->db->query($query)->getRow();
            if ($this->db->query($query)->getNumRows() == 0) {
                $output['status']   = "gagal";
                $output['pesan']    = "Resep Belum Disimpan..";
                $this->hasil($output);
                return;
            }

            if (strlen($row->nama) > 26) {
                $nmapasien = substr($row->nama, 0, 26) . "...";
            } else {
                $nmapasien = $row->nama;
            }
            $html .= "<div>
                               
                                 <hr>
                                 <table align='center' cellspacing='3' cellpadding='3' style='border:1px solid black;' width='100%'>";
            $html .= "
                                 <tr>
                                 <td width='100'>No Resep</td>
                                 <td width='10'>:</td>
                                 <td width='268'>$noresep</td>
                                 <td width='110'>Nama</td>
                                 <td width='10'>:</td>
                                 <td>$nmapasien</td>
                                 </tr>
                                 <tr>
                                 <td>Tanggal</td>
                                 <td>:</td>
                                 <td>$tgl_resp</td>
                                 <td>Nomor RM</td>
                                 <td>:</td>
                                 <td>$row->no_rm</td>
                                 </tr>
                                 <tr>
                                 <td>Dokter</td>
                                 <td>:</td>
                                 <td>$row->nama_pegawai</td>
                                 <td>Tanggal Lahir</td>
                                 <td>:</td>
                                 <td>" . umur($row->tgl_lahir) . "</td>
                                 </tr>
                                 <tr>
                                 <td>User</td>
                                 <td>:</td>
                                 <td>$row->nm_user</td>
                                 <td>Penjamin</td>
                                 <td>:</td>
                                 <td>$row->nama_penjamin</td>
                                 </tr>";
            $html .= "</table>";
            $qbatJadi  = "  SELECT
                                         *
                                 FROM
                                 far_obat_out
                                 INNER JOIN far_obat_outdet USING(noresep, tglresep, id_far)
                                 INNER JOIN far_obat USING (kd_obat)
                                 INNER JOIN mapping_signa USING (id_signa)
                                 INNER JOIN pegawai USING (id_pegawai)
                                 WHERE
                                 noresep = '$noresep' and tglresep = '$tgl_resp' and id_far = '$idfar' and id_kunjungan = '$id_kunj' and jns_racikan = '0' ORDER BY urut ASC
                                 ";

            $totalhargaObatJadi = 0;
            if ($this->db->query($qbatJadi)->getNumRows() > 0) {

                $html .= "<p style='text-align:center; font-weight: bold';>-- Obat Non Racik --</p>
                                     <table border='1' cellpadding='2' cellspacing='0' width='100%'>
                                     <tr>
                                     <td width='30'><b>No</b></td>
                                     <td ><b>Nama Obat</b></td>
                                     <td width='200'><b>Signa</b></td>
                                     <td width='70'><b>Jumlah</b></td>
                                     <td width='100'><b>Harga</b></td>
                                     <td width='100'><b>Total</b></td>
                                     </tr>";
                $no = 1;
                foreach ($this->db->query($qbatJadi)->getResult() as $row) {
                    $totalharga = $row->jumlah * $row->harga_jual;
                    $totalhargaObatJadi += $totalharga;
                    $html .= "<tr>
                                         <td>$no.</td>
                                         <td>$row->nama_obat</td>
                                         <td style='text-align: center;'>" . strtoupper($row->signa) . "</td>
                                         <td style='text-align: center;'>$row->jumlah</td>
                                         <td style='text-align: right;'>$row->harga_jual</td>
                                         <td style='text-align: right;'>$totalharga</td>
                                         </tr>";
                    // if ($row->signa > ''){
                    //     $html .= "<tr>
                    //                 <td colspan='5'><b>Signa : </b>".strtoupper($row->signa)."</td>
                    //              </tr>";
                    // }
                    if ($row->ket > '') {
                        $html .= "<tr>
                                             <td colspan='6'><b>Ket : </b>" . strtoupper($row->ket) . "</td>
                                             </tr>";
                    }
                    $no++;
                };
                $html .= "<tr>
                                     <td colspan='6' style='text-align: right;'><b>Total : Rp. " . format_ribuan($totalhargaObatJadi) . "</b></td>
                                     </tr>";

                $html .= "</table>";
            }

            $qbatJnsRacik  = "  SELECT
                                 jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                                 FROM
                                 far_obat_outdet food 
                                 INNER JOIN mapping_signa ms ON ms.id_signa = food.id_signa
                                 WHERE
                                 noresep = '" . $noresep . "' 
                                 AND id_far = '" . $idfar . "' 
                                 AND tglresep = '" . $tgl_resp . "'  
                                 AND jns_racikan != '0' 
                                 GROUP BY
                                 noresep, tglresep, jns_racikan, food.id_signa, qty_racik, ket_racik, signa
                                 ORDER BY jns_racikan ASC
                                 ";

            $totalhargaObatRacik = 0;
            if ($this->db->query($qbatJnsRacik)->getNumRows() > 0) {
                $html .= "<p style='text-align:center; font-weight: bold';>-- Obat Racik --</p>";
                $html .= "<table border='1' cellpadding='2' cellspacing='0' width='100%'>
                                     <tr>
                                     <td width='10'><b>No</b></td>
                                     <td><b>Nama Obat</b></td>
                                     <td width='50'><b>Permintaan</b></td>
                                     <td width='70'><b>Jumlah</b></td>
                                     <td width='100'><b>Harga</b></td>
                                     <td width='100'><b>Total</b></td>
                                     </tr>";
                foreach ($this->db->query($qbatJnsRacik)->getResult() as $rowqbatJnsRacik) {
                    $qbatRacik  = " 
                                         SELECT
                                                 *
                                         FROM
                                         far_obat_out
                                         INNER JOIN far_obat_outdet USING(noresep, tglresep, id_far)
                                         INNER JOIN far_obat USING (kd_obat)
                                         INNER JOIN mapping_signa USING (id_signa)
                                         INNER JOIN pegawai USING (id_pegawai)
                                         WHERE
                                         noresep = '$noresep' and tglresep = '$tgl_resp' and id_far = '$idfar' and id_kunjungan = '$id_kunj' and jns_racikan = '$rowqbatJnsRacik->jns_racikan' ORDER BY urut ASC ";

                    $no = 1;
                    $html .= "<tr><td colspan='6' style='text-align: center;'>$rowqbatJnsRacik->jns_racikan</td></tr>";
                    foreach ($this->db->query($qbatRacik)->getResult() as $row) {
                        $totalhargaRacik = $row->jumlah * $row->harga_jual;
                        $totalhargaObatRacik += $totalhargaRacik;
                        $html .= "<tr>
                                             <td>$no.</td>
                                             <td>$row->nama_obat</td>
                                             <td style='text-align: center;'>$row->dosis</td>
                                             <td style='text-align: center;'>$row->jumlah</td>
                                             <td style='text-align: right;'>$row->harga_jual</td>
                                             <td style='text-align: right;'>$totalhargaRacik</td>
                                             </tr>";
                        if ($row->ket > '') {
                            $html .= "<tr>
                                                 <td colspan='6'><b>Keterangan : </b>" . strtoupper($row->ket) . "</td>
                                                 </tr>";
                        }
                        $no++;
                    };
                    // $html .= "<tr><td colspan='5' style='text-align: left;'><b>Signa : </b>".strtoupper($rowqbatJnsRacik->signa)."</td></tr>";
                    // $html .= "<tr><td colspan='5' style='text-align: left;'><b>Catatan : </b>$rowqbatJnsRacik->ket_racik</td></tr>";
                    if ($rowqbatJnsRacik->signa > '') {
                        $html .= "<tr>
                                             <td colspan='6'><b>Signa : </b>" . strtoupper($rowqbatJnsRacik->signa) . "</td>
                                             </tr>";
                    }
                    if ($rowqbatJnsRacik->ket_racik > '') {
                        $html .= "<tr>
                                             <td colspan='6'><b>Catatan : </b>" . strtoupper($rowqbatJnsRacik->ket_racik) . "</td>
                                             </tr>";
                    }
                }
                $html .= "<tr>
                                     <td colspan='6' style='text-align: right;'><b>Total : Rp. " . format_ribuan($totalhargaObatRacik) . "</b></td>
                                     </tr>";
                $html .= "</table>";
            }


            //$grandtotalALL = $totalhargaObatJadi + $totalhargaObatRacik; // CARA MANUAL
            $subtotalALL    = $row->gatot;  // AMBIL DATABASE
            $ppntotalALL    = $row->ppn;    // AMBIL DATABASE

            // if ($row->id_unit == '4001'){
            //     $ppntotalALL    = ($grandtotalALL * 11) / 100; // CARA MANUAL
            // }else{
            //     $ppntotalALL    = 0;
            // }

            $grandtotalALL  = $subtotalALL + $ppntotalALL; // AMBIL DATABASE

            $html .= "<table border='1' cellpadding='2' cellspacing='0' width='100%'>
                         <tr>
                         <td style='text-align: right;' ><b>SubTotal</b></td>
                         <td width='10'><b>:</b></td>
                         <td width='150' style='text-align: right;'><b>Rp. " . format_ribuan($subtotalALL) . "</b></td>
                         </tr>
                         <tr>
                         <td style='text-align: right;' ><b>PPN</b></td>
                         <td width='10'><b>:</b></td>
                         <td width='150' style='text-align: right;'><b>Rp. " . format_ribuan($ppntotalALL) . "</b></td>
                         </tr>
                         <tr>
                         <td style='text-align: right;'><b>Grand Total</b></td>
                         <td><b>:</b></td>
                         <td style='text-align: right;'><b>Rp. " . format_ribuan($grandtotalALL) . "</b></td>
                         </tr>
                         </table>";
            $html .= "</div><pagebreak>";
        }
        //echo $html;
        $mpdf   = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4'
        ]);
        // $mpdf = new \Mpdf\Mpdf();

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
        // $mpdf->SetHTMLHeader($judul);
        //$mpdf->AddPage();

        $mpdf->WriteHTML($html);

        $mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">' . $namauser . '</td>
    </tr>
</table>');

        $mpdf->Output("cetak_bill.pdf", 'I');
        exit;
        //echo $html;
        //$mpdf->Output('sep_termal.pdf', 'I');
        //$klien = str_replace(".","",$_SERVER['REMOTE_ADDR']);
        //$mpdf->Output($klien.'sep_termal.pdf', 'I');


    }
    public function Kasir_deletetransaksinyantol()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'val_idtransakasi'
        ];
        // echo"$input->val_idtransakasi";
        // exit();
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {

            $query = "DELETE FROM transaksi WHERE id_transaksi = '$input->val_idtransakasi'";

            // echo"$query";
            // exit();
            if ($this->db->simpleQuery($query)) {
                $querylog = "INSERT INTO log_batal_transaksi (id_transaksi,id_user,alasan) VALUES (
                    '$input->val_id_transaksi',
                    '$input->val_id_user',
                    'pendaftaran gagal'
                )";
                $this->db->query($querylog);
                $output['status']   = "sukses";
                $output['code']   = "200";
                $output['pesan']    = "Sukses hapus dan hubungi admisi";
            } else {
                $output['status']   = "gagal";
                $output['code']   = "XX";
                $output['pesan']    = "Gagal";
            }
        }
        $this->hasil($output);
    }

    public function Kasir_ubahpenjamintransaksiutama()
    {

        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_penjamin',
            'idtransaksi',
            'nosjp'
        ];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";
        if ($this->evalParam($input, $listParam)) {
            // echo"UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->idtransaksi'";exit();
            $clear =  $this->db->query("UPDATE penjamin_transaksi SET penjamin_utama = 'f' where id_transaksi= '$input->idtransaksi'");
            // if($clear->getNumRows() > 0){
            // $queryubah = "UPDATE penjamin_transaksi SET penjamin_utama = 't' where id_transaksi= '$input->idtransaksi' and id_penjamin = '$input->id_penjamin'";
            $queryubah = "UPDATE penjamin_transaksi SET penjamin_utama = 't' where id_transaksi= '$input->idtransaksi' and id_penjamin = '$input->id_penjamin' and no_sjp = '$input->nosjp'";

            // }
            // echo"UPDATE penjamin_transaksi SET penjamin_utama = 't' where id_transaksi= '$input->idtransaksi' and id_penjamin = '$input->id_penjamin'";exit();

            if ($this->db->simpleQuery($queryubah)) {
                $output['status']   = "sukses";
                $output['pesan']    = "Sukses Ganti Penjamin Utama";
            } else {
                $output['status']   = "gagal";
                $output['pesan']    = "Gagal silahkan hubungi tim it";
            }
        }
        $this->hasil($output);
    }
    //GET ID Kunjungan Far Resep
    public function cekIdKunjunganResep($noresep, $id_kunj, $no_rm, $idfar)
    {
        $query    = "SELECT * FROM far_obat_out 
                WHERE noresep = '" . $noresep . "' AND id_kunjungan = '" . $id_kunj . "' AND norm = '" . $no_rm . "' AND id_far = '" . $idfar . "'";
        $row   = $this->db->query($query)->getRow();
        $id_kunj_far   = $row->id_kunjungan_far;
        return $id_kunj_far;
    }


    public function nosep($coder_nik, $no_sjp)
    {
        $statusGroupingStage1 = $this->groupingStage1($no_sjp);
        if ($statusGroupingStage1['metadata']['code'] <> 200) {
            $responUpdateClaim['status'] = "error";
            $responUpdateClaim['pesan'] = "grouping stage 1 gagal, " . $statusGroupingStage1['metadata']['code'] . " / " . $statusGroupingStage1['metadata']['message'];
            echo json_encode($responUpdateClaim);
        } else {
            //echo json_encode($data);
            if (isset($statusGroupingStage1['special_cmg_option'])) {
                //// TODO masuk stage 2
                //echo "special cmg";\
                $paramcmg = "";
                foreach ($statusGroupingStage1['special_cmg_option'] as $datacmg) {
                    //print_r($datacmg);
                    // $fp = fopen('data.txt', 'a');//opens file in append mode
                    // fwrite($fp, "paramcmg:".$datacmg['code']);
                    // //fwrite($fp, "status :".$statusGroupingStage1);
                    // fwrite($fp, PHP_EOL);
                    // fclose($fp);
                    // //todo exclude bronchoscopy YY11 dari topup
                    // if ($datacmg['code'] <> "YY11") {
                    $paramcmg .= "#" . $datacmg['code'];
                    // }
                    //echo "<br/><br/>";
                }
                $paramcmg = substr($paramcmg, 1);
                //echo $paramcmg;
                $statusGroupingStage2 = $this->groupingStage2($no_sjp, $paramcmg);
                if ($statusGroupingStage1['metadata']['code'] <> 200) {
                    $responUpdateClaim['status'] = "error";
                    $responUpdateClaim['pesan'] = "grouping stage 2 gagal, " . $statusGroupingStage2['metadata']['code'] . " / " . $statusGroupingStage2['metadata']['message'];
                } else {
                    //// TODO ada topup
                    $this->M_rajal->saveGrouping($no_sjp, $statusGroupingStage1, $coder_nik);
                    $this->finalAndKirim($coder_nik, $no_sjp);
                }
            } else {
                //// TODO langsung
                $this->M_rajal->saveGrouping($no_sjp, $statusGroupingStage1, $coder_nik);
                $this->finalAndKirim($coder_nik, $no_sjp);
            }
        }
    }
    public function autoGrouper($no_sjp)
    {
        // $coder_nik = $this->session->userdata('userdata')->coder_nik;
        $coder_nik = '123123123123';

        $statusGroupingStage1 = $this->groupingStage1($no_sjp);
        // echo json_encode($statusGroupingStage1);
        // exit;
        if ($statusGroupingStage1['metadata']['code'] <> 200) {
            // $responUpdateClaim['status'] = "error";
            // $responUpdateClaim['pesan'] = "grouping stage 1 gagal, " . $statusGroupingStage1['metadata']['code'] . " / " . $statusGroupingStage1['metadata']['message'];
            echo json_encode($statusGroupingStage1);
        } else {
            if (substr($statusGroupingStage1["response"]["cbg"]["code"], 0, 1) == "X") {
                //expired license
                $resp["metadata"]["code"] = $statusGroupingStage1["response"]["cbg"]["code"];
                $resp["metadata"]["message"] = $statusGroupingStage1["response"]["cbg"]["description"];
                echo json_encode($resp);
            } else {
                //echo json_encode($data);
                if (isset($statusGroupingStage1['special_cmg_option'])) {
                    //// TODO masuk stage 2
                    // echo "special cmg";
                    $paramcmg = "";
                    foreach ($statusGroupingStage1['special_cmg_option'] as $datacmg) {
                        //print_r($datacmg);
                        // $fp = fopen('data.txt', 'a');//opens file in append mode
                        // fwrite($fp, "paramcmg:".$datacmg['code']);
                        // //fwrite($fp, "status :".$statusGroupingStage1);
                        // fwrite($fp, PHP_EOL);
                        // fclose($fp);
                        // //todo exclude bronchoscopy YY11 dari topup
                        // if ($datacmg['code'] <> "YY11") {
                        $paramcmg .= "#" . $datacmg['code'];
                        // }
                        //echo "<br/><br/>";
                    }
                    $paramcmg = substr($paramcmg, 1);
                    //echo $paramcmg;
                    $statusGroupingStage2 = $this->groupingStage2($no_sjp, $paramcmg);
                    if ($statusGroupingStage2['metadata']['code'] <> 200) {
                        // $responUpdateClaim['status'] = "error";
                        // $responUpdateClaim['pesan'] = "grouping stage 2 gagal, " . $statusGroupingStage2['metadata']['code'] . " / " . $statusGroupingStage2['metadata']['message'];
                        $statusGroupingStage2['json_groupingstage2 tanpa topup'] = "bukan 200";
                        echo json_encode($statusGroupingStage2);
                    } else {
                        //// TODO ada topup
                        $this->saveGrouping($no_sjp, $statusGroupingStage1, $coder_nik);
                        // $this->finalAndKirim($coder_nik, $no_sjp);
                        $statusGroupingStage2['json_groupingstage2 dengan topup'] = "200";
                        echo json_encode($statusGroupingStage2);
                    }
                } else {
                    //// TODO langsung
                    // echo "tanpa cmg";
                    //simpan dikomen dulu
                    $this->saveGrouping($no_sjp, $statusGroupingStage1, $coder_nik);
                    // $this->finalAndKirim($coder_nik, $no_sjp);
                    $statusGroupingStage1['json_groupingstage1_tanpa_cmg'] = json_decode(session()->get('json_groupingstage1'));
                    echo json_encode($statusGroupingStage1);
                }
            }
        }
    }
    public function nosepCovid($coder_nik, $no_sjp)
    {
        $statusGroupingStage1 = $this->groupingStage1($no_sjp);
        if ($statusGroupingStage1['metadata']['code'] <> 200) {
            $responUpdateClaim['status'] = "error";
            $responUpdateClaim['pesan'] = "grouping stage 1 gagal, " . $statusGroupingStage1['metadata']['code'] . " / " . $statusGroupingStage1['metadata']['message'];
            echo json_encode($responUpdateClaim);
        } else {
            //echo json_encode($data);
            if (isset($statusGroupingStage1['special_cmg_option'])) {
                //// TODO masuk stage 2
                //echo "special cmg";\
                $paramcmg = "";
                foreach ($statusGroupingStage1['special_cmg_option'] as $datacmg) {
                    //print_r($datacmg);
                    // $fp = fopen('data.txt', 'a');//opens file in append mode
                    // fwrite($fp, "paramcmg:".$datacmg['code']);
                    // //fwrite($fp, "status :".$statusGroupingStage1);
                    // fwrite($fp, PHP_EOL);
                    // fclose($fp);
                    // //todo exclude bronchoscopy YY11 dari topup
                    // if ($datacmg['code'] <> "YY11") {
                    $paramcmg .= "#" . $datacmg['code'];
                    // }
                    //echo "<br/><br/>";
                }
                $paramcmg = substr($paramcmg, 1);
                //echo $paramcmg;
                $statusGroupingStage2 = $this->groupingStage2($no_sjp, $paramcmg);
                if ($statusGroupingStage1['metadata']['code'] <> 200) {
                    $responUpdateClaim['status'] = "error";
                    $responUpdateClaim['pesan'] = "grouping stage 2 gagal, " . $statusGroupingStage2['metadata']['code'] . " / " . $statusGroupingStage2['metadata']['message'];
                } else {
                    //// TODO ada topup
                    $this->M_rajal->saveGrouping($no_sjp, $statusGroupingStage1, $coder_nik);
                    $this->finalClaimCovid($coder_nik, $no_sjp);
                }
            } else {
                //// TODO langsung
                $this->M_rajal->saveGrouping($no_sjp, $statusGroupingStage1, $coder_nik);
                $this->finalClaimCovid($coder_nik, $no_sjp);
            }
        }
    }
    public function finalAndKirim($coder_nik, $no_sjp)
    {
        $statusFinalClaim = $this->finalClaim($coder_nik, $no_sjp);
        if ($statusFinalClaim['metadata']['code'] <> 200) {
            $responUpdateClaim['status'] = "error";
            $responUpdateClaim['pesan'] = "final klaim gagal, " . $statusFinalClaim['metadata']['code'] . " / " . $statusFinalClaim['metadata']['message'];
            // $responUpdateClaim['payload4'] = $this->session->userdata('json_finalclaim');
            // $responUpdateClaim['payload5'] = $this->session->userdata('json_finalclaim_output');
            echo json_encode($responUpdateClaim);
        } else {
            $statusSendClaimIndividual = $this->sendClaimIndividual($no_sjp);
            if ($statusSendClaimIndividual['metadata']['code'] <> 200) {
                $responUpdateClaim['status'] = "error";
                $responUpdateClaim['pesan'] = "kirim klaim gagal, " . $statusSendClaimIndividual['metadata']['code'] . " / " . $statusSendClaimIndividual['metadata']['message'];
                echo json_encode($responUpdateClaim);
            } else {
                $responUpdateClaim['status'] = "ok";
                $responUpdateClaim['pesan'] = $statusSendClaimIndividual['metadata']['code'] . " / " . $statusSendClaimIndividual['metadata']['message'];
                $responUpdateClaim['payload1'] = $this->session->userdata('json_newclaim');
                $responUpdateClaim['payload2'] = $this->session->userdata('json_update');
                $responUpdateClaim['grouping1'] = $this->session->userdata('json_groupingstage1');
                $responUpdateClaim['grouping2'] = $this->session->userdata('json_groupingstage2');
                $responUpdateClaim['payload4'] = $this->session->userdata('json_finalclaim');
                $responUpdateClaim['payload5'] = $this->session->userdata('json_sendclaimindividual');
                $responUpdateClaim['bpjs'] = $this->session->userdata('kelasRawatBPJSByNomor');
                $responUpdateClaim['kamar'] = $this->session->userdata('kelasRawatKamarByNomor');
                $responUpdateClaim['akomodasi'] = $this->session->userdata('cekAkomodasi');
                $responUpdateClaim['tes'] = $this->session->userdata('tes');
                // $fp = fopen('data.txt', 'a');//opens file in append mode
                // fwrite($fp, "grouping 1:".$responUpdateClaim['grouping1']);
                // fwrite($fp, "grouping 2:".$responUpdateClaim['grouping2']);
                // //fwrite($fp, "status :".$statusGroupingStage1);
                // fwrite($fp, PHP_EOL);
                // fclose($fp);
                //$responUpdateClaim['res'] = $res;
                echo json_encode($responUpdateClaim);
            }
        }
    }

    public function finalKlaimV2($no_sep)
    {
        $coder_nik = $this->session->userdata('userdata')->coder_nik;
        $json_payload = '{
            "metadata": {
            "method": "claim_final"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '",
            "coder_nik": "' . $coder_nik . '"
            }
            }';
        $this->session->set_userdata('json_finalclaim', $json_payload);
        $msg = $this->sendWS($json_payload);
        echo $msg;
    }
    public function tesGrouping($no_sep)
    {
        $data = $this->groupingStage1($no_sep);
        //echo json_encode($data);
        if (isset($data['special_cmg_option'])) {
            //echo "special cmg";\
            $paramcmg = "";
            foreach ($data['special_cmg_option'] as $datacmg) {
                //print_r($datacmg);
                $paramcmg .= "#" . $datacmg['code'];
                //echo "<br/><br/>";
            }
            $paramcmg = substr($paramcmg, 1);
            echo $paramcmg;
        }
    }
    function groupingStage1($no_sep)
    {
        // json query
        $json_payload = '{
            "metadata": {
            "method": "grouper",
            "stage": "1"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '"
            }
            }';
        session()->set('json_groupingstage1', $json_payload);
        $msg = json_decode($this->sendWS($json_payload), true);
        return $msg;
    }
    function groupingStage2($no_sep, $param)
    {
        // json query
        $json_payload = '{
            "metadata": {
            "method": "grouper",
            "stage": "2"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '",
            "special_cmg": "' . $param . '"
            }
            }';
        $this->session->set_userdata('json_groupingstage2', $json_payload);
        $msg = json_decode($this->sendWS($json_payload), true);
        return $msg;
    }
    function finalClaim($coder_nik, $no_sep)
    {
        // json query
        $json_payload = '{
            "metadata": {
            "method": "claim_final"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '",
            "coder_nik": "' . $coder_nik . '"
            }
            }';
        $this->session->set_userdata('json_finalclaim', $json_payload);
        $msg = json_decode($this->sendWS($json_payload), true);
        return $msg;
        // print_r($response);
    }
    function finalClaimCovid($coder_nik, $no_sep)
    {
        // json query
        $payload = '{
            "metadata": {
            "method": "claim_final"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '",
            "coder_nik": "' . $coder_nik . '"
            }
            }';
        $this->session->set_userdata('json_finalclaim', $payload);
        $dataCovid = $this->sendWS($payload);
        //return $dataCovid->response->claim_number;
        echo $dataCovid;
    }
    function sendClaimIndividual($no_sep)
    {
        // json query
        $json_payload = '{
                "metadata": {
                    "method": "send_claim_individual"
                },
                "data": {
                    "nomor_sep": "' . $no_sep . '"
                }
            }';
        $this->session->set_userdata('json_sendclaimindividual', $json_payload);
        $msg = $this->sendWS($json_payload);
        echo $msg;
        // print_r($response);
    }

    public function sendClaim($tgl = NULL)
    {
        set_time_limit(0);
        if ($tgl == NULL) {
            $tgl = date("Y-m-d");
        }
        $key = "287e969a55bd9991d4b2594b5b76f9712913552c7c218e48040765d00c13c630";
        // json query
        $json_payload = '{
            "metadata": {
            "method": "send_claim"
            },
            "data": {
                "start_dt": "' . $tgl . '",
                "stop_dt": "' . $tgl . '",
                "jenis_rawat": "3",
                "date_type": "2"
            }
            }';
        $this->session->set_userdata('json_sendclaim', $json_payload);
        // membuat json juga dapat menggunakan json_encode:
        // $ws_query["metadata"]["method"] = "claim_print";
        // $ws_query["data"]["nomor_sep"] = "1308R0010419V007954";
        // $json_request = json_encode($ws_query);
        // data yang akan dikirimkan dengan method POST adalah encrypted:
        $payload = $this->inacbg_encrypt($json_payload, $key);
        // tentukan Content-Type pada http header
        $header = array("Content-Type: application/x-www-form-urlencoded");
        // url server aplikasi E-Klaim,
        // silakan disesuaikan instalasi masing-masing
        // $url = "http://103.184.180.97:88/E-Klaim/ws.php";
        $url = "http://192.168.1.4/E-Klaim/ws.php";

        // setup curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // request dengan curl
        $response = curl_exec($ch);
        // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
        // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
        $first = strpos($response, "\n") + 1;
        $last = strrpos($response, "\n") - 1;
        $response = substr(
            $response,
            $first,
            strlen($response) - $first - $last
        );
        // decrypt dengan fungsi inacbg_decrypt
        $response = $this->inacbg_decrypt($response, $key);
        // hasil decrypt adalah format json, ditranslate kedalam array
        $msg = json_decode($response, true);
        // variable data adalah base64 dari file pdf
        //var_dump($msg);
        echo $response;
    }

    function inacbg_encrypt($data, $key)
    {
        /// make binary representasion of $key
        $key = hex2bin($key);
        /// check key length, must be 256 bit or 32 bytes
        if (mb_strlen($key, "8bit") !== 32) {
            throw new Exception("Needs a 256-bit key!");
        }
        /// create initialization vector
        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        $iv = openssl_random_pseudo_bytes($iv_size); // dengan catatan dibawah
        /// encrypt
        $encrypted = openssl_encrypt(
            $data,
            "aes-256-cbc",
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        /// create signature, against padding oracle attacks
        $signature = mb_substr(hash_hmac(
            "sha256",
            $encrypted,
            $key,
            true
        ), 0, 10, "8bit");
        /// combine all, encode, and format
        $encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
        return $encoded;
    }
    // Decryption Function
    function inacbg_decrypt($str, $strkey)
    {
        /// make binary representation of $key
        $key = hex2bin($strkey);
        /// check key length, must be 256 bit or 32 bytes
        if (mb_strlen($key, "8bit") !== 32) {
            throw new Exception("Needs a 256-bit key!");
        }
        /// calculate iv size
        $iv_size = openssl_cipher_iv_length("aes-256-cbc");
        /// breakdown parts
        $decoded = base64_decode($str);
        $signature = mb_substr($decoded, 0, 10, "8bit");
        $iv = mb_substr($decoded, 10, $iv_size, "8bit");
        $encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
        /// check signature, against padding oracle attack
        $calc_signature = mb_substr(hash_hmac(
            "sha256",
            $encrypted,
            $key,
            true
        ), 0, 10, "8bit");
        if (!$this->inacbg_compare($signature, $calc_signature)) {
            return "SIGNATURE_NOT_MATCH"; /// signature doesn't match
        }
        $decrypted = openssl_decrypt(
            $encrypted,
            "aes-256-cbc",
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        return $decrypted;
    }
    /// Compare Function
    function inacbg_compare($a, $b)
    {
        /// compare individually to prevent timing attacks
        /// compare length
        if (strlen($a) !== strlen($b)) return false;
        /// compare individual
        $result = 0;
        for ($i = 0; $i < strlen($a); $i++) {
            $result |= ord($a[$i]) ^ ord($b[$i]);
        }
        return $result == 0;
    }
    // function cetak()
    // {
    //     $key = "287e969a55bd9991d4b2594b5b76f9712913552c7c218e48040765d00c13c630";
    //     // json query
    //     // $json_request = "
    //     // {
    //     // \"metadata\": {
    //     // \"method\": \"claim_print\"
    //     // },
    //     // \"data\": {
    //     // \"nomor_sep\": \"1308R0010419V007954\"
    //     // }
    //     // }";

    //     // membuat json juga dapat menggunakan json_encode:
    //     $ws_query["metadata"]["method"] = "claim_print";
    //     $ws_query["data"]["nomor_sep"] = "1308R0010419V007954";
    //     $json_request = json_encode($ws_query);
    //     // data yang akan dikirimkan dengan method POST adalah encrypted:
    //     $payload = $this->inacbg_encrypt($json_request, $key);
    //     // tentukan Content-Type pada http header
    //     $header = array("Content-Type: application/x-www-form-urlencoded");
    //     // url server aplikasi E-Klaim,
    //     // silakan disesuaikan instalasi masing-masing
    //     $url = "http://103.184.180.97:88/E-Klaim/ws.php";
    //     // setup curl
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    //     // request dengan curl
    //     $response = curl_exec($ch);
    //     // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
    //     // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
    //     $first = strpos($response, "\n") + 1;
    //     $last = strrpos($response, "\n") - 1;
    //     $response = substr(
    //         $response,
    //         $first,
    //         strlen($response) - $first - $last
    //     );
    //     // decrypt dengan fungsi inacbg_decrypt
    //     $response = $this->inacbg_decrypt($response, $key);
    //     // hasil decrypt adalah format json, ditranslate kedalam array
    //     $msg = json_decode($response, true);
    //     // variable data adalah base64 dari file pdf
    //     $pdf = base64_decode($msg["data"]);
    //     // hasilnya adalah berupa binary string $pdf, untuk disimpan:
    //     file_put_contents("klaim.pdf", $pdf);
    //     // atau untuk ditampilkan dengan perintah:
    //     header("Content-type:application/pdf");
    //     header("Content-Disposition:attachment;filename=klaim.pdf");
    //     echo $pdf;
    // }
    function getClaimStatus($no_sep)
    {
        $key = "287e969a55bd9991d4b2594b5b76f9712913552c7c218e48040765d00c13c630";
        // json query
        $json_payload = '{
            "metadata": {
            "method": "get_claim_status"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '"
            }
            }';
        $this->session->set_userdata('json_getclaimstatus', $json_payload);
        // membuat json juga dapat menggunakan json_encode:
        // $ws_query["metadata"]["method"] = "claim_print";
        // $ws_query["data"]["nomor_sep"] = "1308R0010419V007954";
        // $json_request = json_encode($ws_query);
        // data yang akan dikirimkan dengan method POST adalah encrypted:
        $payload = $this->inacbg_encrypt($json_payload, $key);
        // tentukan Content-Type pada http header
        $header = array("Content-Type: application/x-www-form-urlencoded");
        // url server aplikasi E-Klaim,
        // silakan disesuaikan instalasi masing-masing
        // $url = "http://103.184.180.97:88/E-Klaim/ws.php";
        $url = "http://192.168.1.4/E-Klaim/ws.php";

        // setup curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        // request dengan curl
        $response = curl_exec($ch);
        // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
        // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
        $first = strpos($response, "\n") + 1;
        $last = strrpos($response, "\n") - 1;
        $response = substr(
            $response,
            $first,
            strlen($response) - $first - $last
        );
        // decrypt dengan fungsi inacbg_decrypt
        $response = $this->inacbg_decrypt($response, $key);
        // hasil decrypt adalah format json, ditranslate kedalam array
        $msg = json_decode($response, true);
        // variable data adalah base64 dari file pdf
        //return $msg;
        print_r($response);
    }

    function getClaimData($no_sep, $return)
    {
        // json query
        $payload = '{
            "metadata": {
            "method": "get_claim_data"
            },
            "data": {
            "nomor_sep": "' . $no_sep . '"
            }
            }';
        session()->set('json_get_claim_data', $payload);
        $data = $this->sendWS($payload);
        if ($return == "true") {
            return $data;
        } else {
            echo $data;
        }
    }

    public function backgroundUploadPdfCovid($coder_nik, $no_sep)
    {
        $statusUploadFile = $this->uploadFilesCovidV2($no_sep);
        echo "statusUploadFile=" . json_encode($statusUploadFile) . "<br/>";
        if ($statusUploadFile['code'] == "ok") {
            $responUpdateClaim['status'] = "ok";
            $responUpdateClaim['pesan'] = "data klaim covid berhasil dikirim";
            $this->M_rajal->updateTransferUploadEklaimCovid($coder_nik, $no_sep, 2);
            $str = "cd /home/ipde/cronjob && wget -bq " . base_url() . "RemoteGrouping/nosepCovid/" . $coder_nik . "/" . $no_sep . "";
            //echo $str;
            shell_exec($str);
        } else {
            $responUpdateClaim['status'] = "error";
            $responUpdateClaim['pesan'] = "klaim gagal dikirim, " . $statusUploadFile['message'];
            $this->M_rajal->updateTransferUploadEklaimCovid($coder_nik, $no_sep, 1);
        }
        echo json_encode($responUpdateClaim) . "<br/>";
    }

    public function getPendingUploadPdfEklaimCovid()
    {
        $data = $this->M_rajal->getPendingUploadPdfEklaimCovid();
        echo json_encode($data) . "<br/>";
        foreach ($data as $klaim) {
            echo "nomor sep = " . $klaim->mr_nosep . "/" . $klaim->mrdp_codernik . "<br/>";
            $status_klaim = json_decode($this->getClaimData($klaim->mr_nosep, "true"));
            echo "status klaim = " . json_encode($status_klaim) . "<br/>";
            if ($status_klaim->metadata->code == "200") {
                echo $status_klaim->response->data->kemenkes_dc_status_cd . "<br/>";
                if ($status_klaim->response->data->klaim_status_cd <> "final") {
                    if ($status_klaim->response->data->kemenkes_dc_status_cd <> "sent") {
                        $this->backgroundUploadPdfCovid($klaim->mrdp_codernik, $klaim->mr_nosep);
                    } else {
                        echo "sudah terkirim<br/>";
                        $data = $this->M_rajal->setPendingUploadPdfEklaimCovid($klaim->mr_nosep);
                        // var_dump($data);
                        if ($data > 0) {
                            echo "sudah diupdate terkirim<br/>";
                        } else {
                            echo "gagal diupdate terkirim<br/>";
                        }
                    }
                } else {
                    echo "klaim sudah final<br/>";
                    $data = $this->M_rajal->setPendingUploadPdfEklaimCovid($klaim->mr_nosep);
                    // var_dump($data);
                    if ($data > 0) {
                        echo "sudah diupdate final<br/>";
                    } else {
                        echo "gagal diupdate final<br/>";
                    }
                }
            } elseif ($status_klaim->metadata->error_no == "E2004") {
                echo "klaim tidak ada di sistem<br/>";
                $data = $this->M_rajal->setHapusEklaimCovid($klaim->mr_nosep);
                // var_dump($data);
                if ($data > 0) {
                    echo "sudah diupdate final<br/>";
                } else {
                    echo "gagal diupdate final<br/>";
                }
            }
            echo "<br/>";
        }
    }

    public function uploadFilesCovidV2($no_sep)
    {
        // $listFiles = $this->getListFiles($no_sep);
        // print_r($listFiles);
        // exit;
        $listFiles = json_decode($this->getListFiles($no_sep));
        $fileUploaded = [];
        foreach ($listFiles->response->data as $key) {
            array_push($fileUploaded, $key->file_name);
        }
        // echo json_encode($fileName) . "<br/>";
        // foreach($fileName as $key){
        //     echo $key."<br/>";
        // }

        if (!is_dir('berkaspdf/hasil_cetak/covid/' . $no_sep . '/')) {
            // echo "ga ada folder";
            mkdir("berkaspdf/hasil_cetak/covid/" . $no_sep . "/");
            // chown("berkaspdf/hasil_cetak/covid/" . $no_sep . "/",'ikpk');
            // chgrp("berkaspdf/hasil_cetak/covid/" . $no_sep . "/",'ikpk');
        }
        // var_dump(is_dir('berkaspdf/hasil_cetak/covid/'));
        $listpenunjang = get_filenames('berkaspdf/hasil_cetak/covid/' . $no_sep . '/');
        // print_r($listpenunjang);
        // echo "<br/>nosep=".$no_sep."<br/>";
        $cekfile = count($listpenunjang);
        // echo "count=".$cekfile."/";
        // exit;
        if ($cekfile > 0) {
            sort($listpenunjang);
            $statusupload = "ok";
            // echo json_encode($listpenunjang);
            // exit;
            foreach ($listpenunjang as $filepenunjang) {
                if (in_array($filepenunjang, $fileUploaded)) {
                    echo $filepenunjang . " uploaded " . " <br/>";
                    $status['code'] = "ok";
                    $status['message'] = "tidak ada file diupload";
                } else {
                    echo $filepenunjang . " belum " . " <br/>";
                    if ($statusupload == "ok") {
                        // print_r($listpenunjang);
                        // exit;
                        // Define local path or URL of our image
                        $pdf_file = 'berkaspdf/hasil_cetak/covid/' . $no_sep . '/' . $filepenunjang;
                        //echo file_exists($pdf_file);
                        // exit;
                        // Load file contents into variable
                        $bin = file_get_contents($pdf_file);
                        // Encode contents to Base64
                        $b64 = base64_encode($bin);
                        //cek tipe file
                        $tipefile = substr($filepenunjang, 0, 1);
                        switch ($tipefile) {
                            case "1":
                                $fileclass = "resume_medis";
                                break;
                            case "2":
                                $fileclass = "ruang_rawat";
                                break;
                            case "3":
                                $fileclass = "laboratorium";
                                break;
                            case "4":
                                $fileclass = "radiologi";
                                break;
                            case "5":
                                $fileclass = "penunjang_lain";
                                break;
                            case "6":
                                $fileclass = "resep_obat";
                                break;
                            case "7":
                                $fileclass = "tagihan";
                                break;
                            case "8":
                                $fileclass = "kartu_identitas";
                                break;
                            case "9":
                                $fileclass = "lain_lain";
                                break;
                            case "A":
                                $fileclass = "dokumen_kipi";
                                break;
                            case "B":
                                $fileclass = "bebas_biaya";
                                break;
                            case "C":
                                $fileclass = "surat_kematian";
                                break;
                        }
                        // Show the Base64 value
                        // echo $b64; //-> "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs="
                        // json query
                        $payload = '{
                            "metadata": {
                                "method": "file_upload",
                                "nomor_sep": "' . $no_sep . '",
                                "file_class": "' . $fileclass . '",
                                "file_name": "' . $filepenunjang . '"
                                },
                            "data": "' . $b64 . '"
                            }';
                        // echo "payload=".$payload."<br/>";
                        // exit;
                        $this->session->set_userdata('json_uploadclaimcovid', $payload);
                        $dataCovid = json_decode($this->sendWS($payload), true);
                        // $dataCovid = [];
                        // $dataCovid['metadata']['code'] == "200";
                        echo json_encode($dataCovid) . "<br/>";

                        if ($dataCovid['metadata']['code'] == "200") {
                            // echo "sip";
                            echo "file_class=" . $fileclass . ",file_name=" . $filepenunjang . "<br/>";
                            $statusupload = "ok";
                            $status['code'] = "ok";
                            $status['message'] = "upload berhasil";
                        } else {
                            $statusupload = "error";
                            $status['code'] = "error";
                            $status['message'] = "upload gagal";
                            // $status['response'] = $dataCovid['metadata']['response'];
                            // $status['upload_dc_bpjs_response'] = $dataCovid['metadata']['upload_dc_bpjs_response'];
                        }
                        //$dataCovid = $this->sendWS($payload);
                        //return $dataCovid->response->claim_number;
                        // echo json_encode($dataCovid) . "<br/>";
                        // exit;
                    }
                }
            }
        } else {
            $status['code'] = "error";
            $status['message'] = "file claim kosong";
        }
        // } else {
        //     $status['code'] = "error";
        //     $status['message'] = "hapus file gagal";
        // }
        // echo json_encode($status);
        return $status;
    }
    public function uploadFilesCovid($no_sep)
    {
        // $hapusfile = $this->getHapusFilesCovid($no_sep);
        // echo "status_hapus=." . $hapusfile . "<br/>";
        // if ($hapusfile == "ok") {
        // $listFiles = json_decode($this->getListFiles($no_sep));
        // $fileName = [];
        // foreach($listFiles->response->data as $key){
        //     array_push($fileName,$key->file_name);
        // }
        // $countFiles = count($listFiles->response->data);
        if (!is_dir('berkaspdf/hasil_cetak/covid/' . $no_sep . '/')) {
            // echo "ga ada folder";
            mkdir("berkaspdf/hasil_cetak/covid/" . $no_sep . "/");
            // chown("berkaspdf/hasil_cetak/covid/" . $no_sep . "/",'ikpk');
            // chgrp("berkaspdf/hasil_cetak/covid/" . $no_sep . "/",'ikpk');
        }
        // var_dump(is_dir('berkaspdf/hasil_cetak/covid/'));
        $listpenunjang = get_filenames('berkaspdf/hasil_cetak/covid/' . $no_sep . '/');
        // print_r($listpenunjang);
        // echo "<br/>nosep=".$no_sep."<br/>";
        $cekfile = count($listpenunjang);
        // echo "count=".$cekfile."/";
        // exit;
        if ($cekfile > 0) {
            sort($listpenunjang);
            $statusupload = "ok";
            // echo json_encode($listpenunjang);
            // exit;
            foreach ($listpenunjang as $filepenunjang) {
                if ($statusupload == "ok") {
                    // print_r($listpenunjang);
                    // exit;
                    // Define local path or URL of our image
                    $pdf_file = 'berkaspdf/hasil_cetak/covid/' . $no_sep . '/' . $filepenunjang;
                    //echo file_exists($pdf_file);
                    // exit;
                    // Load file contents into variable
                    $bin = file_get_contents($pdf_file);
                    // Encode contents to Base64
                    $b64 = base64_encode($bin);
                    //cek tipe file
                    $tipefile = substr($filepenunjang, 0, 1);
                    switch ($tipefile) {
                        case "1":
                            $fileclass = "resume_medis";
                            break;
                        case "2":
                            $fileclass = "ruang_rawat";
                            break;
                        case "3":
                            $fileclass = "laboratorium";
                            break;
                        case "4":
                            $fileclass = "radiologi";
                            break;
                        case "5":
                            $fileclass = "penunjang_lain";
                            break;
                        case "6":
                            $fileclass = "resep_obat";
                            break;
                        case "7":
                            $fileclass = "tagihan";
                            break;
                        case "8":
                            $fileclass = "kartu_identitas";
                            break;
                        case "9":
                            $fileclass = "lain_lain";
                            break;
                        case "A":
                            $fileclass = "dokumen_kipi";
                            break;
                        case "B":
                            $fileclass = "bebas_biaya";
                            break;
                        case "C":
                            $fileclass = "surat_kematian";
                            break;
                    }
                    // Show the Base64 value
                    // echo $b64; //-> "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs="
                    // json query
                    $payload = '{
                            "metadata": {
                                "method": "file_upload",
                                "nomor_sep": "' . $no_sep . '",
                                "file_class": "' . $fileclass . '",
                                "file_name": "' . $filepenunjang . '"
                                },
                            "data": "' . $b64 . '"
                            }';
                    // echo $payload;
                    // exit;
                    $this->session->set_userdata('json_uploadclaimcovid', $payload);
                    $dataCovid = json_decode($this->sendWS($payload), true);
                    // $dataCovid = [];
                    // $dataCovid['metadata']['code'] == "200";
                    // echo json_encode($dataCovid);

                    if ($dataCovid['metadata']['code'] == "200") {
                        // echo "sip";
                        echo "file_class=" . $fileclass . ",file_name=" . $filepenunjang . "<br/>";
                        $statusupload = "ok";
                        $status['code'] = "ok";
                        $status['message'] = "upload berhasil";
                    } else {
                        $statusupload = "error";
                        $status['code'] = "error";
                        $status['message'] = "upload gagal";
                        // $status['response'] = $dataCovid['metadata']['response'];
                        // $status['upload_dc_bpjs_response'] = $dataCovid['metadata']['upload_dc_bpjs_response'];
                    }
                    //$dataCovid = $this->sendWS($payload);
                    //return $dataCovid->response->claim_number;
                    // echo json_encode($dataCovid) . "<br/>";
                    // exit;
                }
            }
        } else {
            $status['code'] = "error";
            $status['message'] = "file claim kosong";
        }
        // } else {
        //     $status['code'] = "error";
        //     $status['message'] = "hapus file gagal";
        // }
        // echo json_encode($status);
        return $status;
    }

    function getHapusFilesCovid($no_sep)
    {
        $statushapus = "ok";
        // json query
        $payload = '{
            "metadata": {
                "method": "file_get"
                },
                "data": {
                "nomor_sep": "' . $no_sep . '"
                }
            }';
        // echo $payload;
        $dataCovid = json_decode($this->sendWS($payload), true);
        //$dataCovid = $this->sendWS($payload);
        //return $dataCovid->response->claim_number;
        // return $dataCovid;
        // echo "x<br/>".json_encode($dataCovid)."<br/>x";
        // exit;
        // $file_id = $dataCovid['response']['data'];
        // echo json_encode($file_id);
        if ($dataCovid['metadata']['code'] == "200") {
            foreach ($dataCovid['response']['data'] as $file_id) {
                if ($statushapus == "ok") {
                    //echo $file_id['file_id'] . "<br/>";
                    $out = $this->deleteFilesCovid($no_sep, $file_id['file_id']);
                    if ($out == "ok") {
                        // echo "sip";
                        $statushapus = "ok";
                    } else {
                        $statushapus = "error";
                    }
                }
            }
        }
        return $statushapus;
        // exit;
    }

    function deleteFilesCovid($no_sep, $file_id)
    {
        // json query
        $payload = '{
            "metadata": {
                "method": "file_delete"
                },
                "data": {
                    "nomor_sep": "' . $no_sep . '",
                    "file_id": "' . $file_id . '"
                }
            }';
        // echo $payload;
        $dataCovid = json_decode($this->sendWS($payload), true);
        // echo "hapus=".json_encode($dataCovid)."<br/>";
        //$dataCovid = $this->sendWS($payload);
        if ($dataCovid['metadata']['code'] == "200") {
            // echo "sip";
            $status = "ok";
        } else {
            $status = "error";
        }
        return $status;
        // exit;
    }

    public function getListFiles($nomor_sep)
    {
        // json query
        $payload = '{
            "metadata": {
                "method": "file_get"
                },
            "data": {
                "nomor_sep": "' . $nomor_sep . '"
                }
            }';
        //$dataCovid = json_decode($this->sendWS($payload));
        $result = $this->sendWS($payload);
        //return $dataCovid->response->claim_number;
        // echo $result->response->data;
        $result = json_decode($result);
        // echo $result;
        // echo json_encode($result)."<br/>";
        // echo "jumlah file=".count($result->response->data);
        return json_encode($result);
    }

    public function getDiagnose()
    {
        if (isset($_GET['term'])) {
            $keyword = $_GET['term'];
            // json query
            $payload = '{
            "metadata": {
                "method": "search_diagnosis"
                },
            "data": {
                "keyword": "' . $keyword . '"
                }
            }';
            //$dataCovid = json_decode($this->sendWS($payload));
            $result = $this->sendWS($payload);
            //return $dataCovid->response->claim_number;
            // echo $result->response->data;
            $result = json_decode($result);
            // echo $result;
            if ($result->response->data == "EMPTY") {
                echo ("[\"kode tidak ditemukan\"]");
            } else {
                $output = [];
                foreach ($result->response->data as $data) {
                    array_push($output, $data[1] . " - " . $data[0]);
                }
                sort($output);
                echo json_encode($output);
            }
        }
    }

    public function getProcedure()
    {
        if (isset($_GET['term'])) {
            $keyword = $_GET['term'];
            // echo substr($keyword,2,1);
            // echo $keyword;
            if (substr($keyword, 2, 1) == ".") {
                if (substr($keyword, 5, 1) == "+") {
                    $search_key = substr($keyword, 0, 5);
                } else {
                    $search_key = substr($keyword, 0, 5);
                }
            } else {
                $search_key = substr($keyword, 0, 4);
            }
            // json query
            $payload = '{
            "metadata": {
                "method": "search_procedures"
                },
            "data": {
                "keyword": "' . $search_key . '"
                }
            }';
            //$dataCovid = json_decode($this->sendWS($payload));
            $result = $this->sendWS($payload);
            //return $dataCovid->response->claim_number;
            // echo $result->response->data;
            $result = json_decode($result);
            // echo $result;
            if ($result->response->data == "EMPTY") {
                echo ("[\"kode tidak ditemukan\"]");
            } else {
                $output = [];
                foreach ($result->response->data as $data) {
                    if (substr($keyword, strlen($keyword) - 2, 1) && strlen($keyword) == 7) {
                        $data[1] .= substr($keyword, strlen($keyword) - 2, 2);
                    }
                    array_push($output, $data[1] . " - " . $data[0]);
                }
                sort($output);
                echo json_encode($output);
            }
        }
    }
    public function getDiagnoseInagrouper()
    {
        if (isset($_GET['term'])) {
            $keyword = $_GET['term'];
            // json query
            $payload = '{
            "metadata": {
                "method": "search_diagnosis_inagrouper"
                },
            "data": {
                "keyword": "' . $keyword . '"
                }
            }';
            //$dataCovid = json_decode($this->sendWS($payload));
            $result = $this->sendWS($payload);
            //return $dataCovid->response->claim_number;
            // echo $result->response->data;
            $result = json_decode($result);
            // echo $result;
            if ($result->response->data == "EMPTY") {
                echo ("[\"kode tidak ditemukan\"]");
            } else {
                $output = [];
                foreach ($result->response->data as $data) {
                    array_push($output, $data[1] . " - " . $data[0]);
                }
                sort($output);
                echo json_encode($output);
            }
        }
    }

    public function getProcedureInagrouper()
    {
        if (isset($_GET['term'])) {
            $keyword = $_GET['term'];
            // echo substr($keyword,2,1);
            // echo $keyword;
            if (substr($keyword, 2, 1) == ".") {
                if (substr($keyword, 5, 1) == "+") {
                    $search_key = substr($keyword, 0, 5);
                } else {
                    $search_key = substr($keyword, 0, 5);
                }
            } else {
                $search_key = substr($keyword, 0, 4);
            }
            // json query
            $payload = '{
            "metadata": {
                "method": "search_procedures_inagrouper"
                },
            "data": {
                "keyword": "' . $search_key . '"
                }
            }';
            //$dataCovid = json_decode($this->sendWS($payload));
            $result = $this->sendWS($payload);
            //return $dataCovid->response->claim_number;
            // echo $result->response->data;
            $result = json_decode($result);
            // echo $result;
            if ($result->response->data == "EMPTY") {
                echo ("[\"kode tidak ditemukan\"]");
            } else {
                $output = [];
                foreach ($result->response->data as $data) {
                    if (substr($keyword, strlen($keyword) - 2, 1) && strlen($keyword) == 7) {
                        $data[1] .= substr($keyword, strlen($keyword) - 2, 2);
                    }
                    array_push($output, $data[1] . " - " . $data[0]);
                }
                sort($output);
                echo json_encode($output);
            }
        }
    }
    public function tampilrinciandetailtransaksi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT sum(total_harga) as totalnominalpasien from detail_transaksi where id_transaksi='$input->id_transaksi'";

        // echo"$query";exit();
        if ($this->db->query($query)->getRow() > '') { //true
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
    public function unittampilkunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $queryinap = "SELECT
                    * 
                FROM
                    kunjungan 
                    join unit using(id_unit)
                WHERE
                    id_transaksi = '$input->id_transaksi' 
                    AND jenis_unit='2'";
        if ($this->db->query($queryinap)->getRow() > '') {
            //ranap
            $pelayanan = "pelayananranap";
        } else {
            $queryrajal = "SELECT * FROM kunjungan join unit using(id_unit) WHERE id_transaksi = '$input->id_transaksi' AND jenis_unit='1'";
            if ($this->db->query($queryrajal)->getRow() > '') {
                //rajal 
                $pelayanan = "pelayananrajal";

            } else {
                $pelayanan = "pelayananigd";

            }
        }
        // echo"$query";exit();
        if ($pelayanan) { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $pelayanan;
        } else {
            $output['code'] = 201;
            $output['status'] = "sukses";
            $output['pesan'] = "";
        }
        echo json_encode($output);
    }
    public function simpanEklaim()
    {

        // $data = $this->input->post();
        $data = $this->request->getPost();

        // var_dump($data);
       

        // echo"haloo";
        // exit();
        // $out['status'] = 'ok';
        // $out['pesan'] = $data;
        // $out['jumlah'] = count($data['delivery_dttm']);
        // $count_xy = 0;
        // foreach ($data['delivery_dttm'] as $x => $y) {
        //     $out['deli'][$x] = $y;
        //     // echo $x . "/" . $y . "<br/>";
        // }
        // echo json_encode($out);
        // exit;
        if ($data['diagutama'] == '') {
            $out['status'] = 'error';
            $out['pesan'] = 'Diagnosa utama kosong';
            echo json_encode($out);
        } else {
            $result = $this->updateInadrg($data);
            // $result = TRUE;
            //if ($result > 0) {
            // if ($result['trans_status'] == TRUE) {
            if ($result == TRUE) {
                
                // $out['status'] = 'ok';
                // $out['msg'] = show_succ_msg('Data Inadrg Berhasil disimpan', '20px');
                //echo "no_sep=".$no_sep."<br/>";
                $kd_pasien = $_POST['kd_pasien'];
                $no_sep = $_POST['no_sep'];
                $data['no_sep'] = $no_sep;
                $data['kd_pasien'] = $kd_pasien;

                $flag_apgar = $this->cek_apgar($data['diagutama']);
                $flag_persalinan = $this->cek_persalinan($data['diagutama']);


                $data['flag_apgar'] = $flag_apgar;
                $data['flag_persalinan'] = $flag_persalinan;

                // $data['dataRajal'] = $this->M_rajal->select_by_sep($no_sep);
                // $data['dataRajal'] = $this->M_rajal->select_by_idV2($data['kd_pasien'],$data['hidden_tgl_masuk'],$data['kd_unit'],$data['urut_masuk']);

                // $data['dataInadrg'] = $this->M_rajal->getDataPasienById($no_sep);
                // $data['dataInadrg'] = $this->db->query("select medrec_datapasien.* from medrec_datapasien where medrec_datapasien.mr_nosep='" . $no_sep . "'");
                $data['dataInadrg'] = '';

                $data['diagnosa'] = "";
                $data['diagutama'] = explode(" - ", $data['diagutama']);
                $data['diagnosa'] .= "#" . $data['diagutama'][0];

                foreach ($data['diagsekunder'] as $diagsek) {
                    if ($diagsek <> "") {
                        $diagsek = explode(" - ", $diagsek);
                        $data['diagnosa'] .= "#" . $diagsek[0];
                    }
                }
                $data['diagnosa'] = substr($data['diagnosa'], 1);

                $data['tindakan'] = "";
                foreach ($data['penunjangdiagnostikLab'] as $tindakan) {
                    if ($tindakan <> "") {
                        $tindakan = explode(" - ", $tindakan);
                        $data['tindakan'] .= "#" . $tindakan[0];
                    }
                }

                foreach ($data['penunjangdiagnostikRad'] as $tindakan) {
                    if ($tindakan <> "") {
                        $tindakan = explode(" - ", $tindakan);
                        $data['tindakan'] .= "#" . $tindakan[0];
                    }
                }

                foreach ($data['penunjangdiagnostikLain'] as $tindakan) {
                    if ($tindakan <> "") {
                        $tindakan = explode(" - ", $tindakan);
                        $data['tindakan'] .= "#" . $tindakan[0];
                    }
                }

                foreach ($data['laporanoperasi'] as $tindakan) {
                    if ($tindakan <> "") {
                        $tindakan = explode(" - ", $tindakan);
                        $data['tindakan'] .= "#" . $tindakan[0];
                    }
                }

                foreach ($data['tindakanlain'] as $tindakan) {
                    if ($tindakan <> "") {
                        $tindakan = explode(" - ", $tindakan);
                        $data['tindakan'] .= "#" . $tindakan[0];
                    }
                }

                $data['tindakan'] = substr($data['tindakan'], 1);

                $mr_pasien_stripped = str_replace("-", "", $kd_pasien);
                $data['mr_pasien_stripped'] = $mr_pasien_stripped;
                $kelasRawatBPJSByNomor = $data['hak_kelas'];
                $noka = $data['no_kartu'];

                // $this->session->set_userdata('kelasRawatBPJSByNomor', $kelasRawatBPJSByNomor);
                session()->set('kelasRawatBPJSByNomor', $kelasRawatBPJSByNomor);

                if ($data['jenis_kelamin'] == "Laki-laki" || $data['jenis_kelamin'] == "t") {
                    $kelamin = "1";
                } else {
                    $kelamin = "2";
                }

                $tgl_lahir = date("Y-m-d H:i:s", strtotime($data['tgl_lahir']));
                // echo "tgl_lahir=" . $tgl_lahir . "<br/>";
                $statusNewClaim = $this->newClaim($noka, $no_sep, $mr_pasien_stripped, $data['nama'], $tgl_lahir, $kelamin);
                // echo "status new claim=" . json_encode($statusNewClaim);
                // exit;
                // $jsonNewClaim = json_decode($statusNewClaim);
                //echo "<br/><br/>meta=".$jsonNewClaim->metadata;
                //print_r($jsonNewClaim);
                //echo $statusNewClaim['metadata']['code'];
                
                if ($statusNewClaim['metadata']['code'] == 200 || $statusNewClaim['metadata']['code'] == 400) {
                    
                    //200 ok, 400 duplicate tapi lalu diupdate
                    // $statusUpdateClaim = $this->updateClaimVx2x($noka, $no_sep, $mr_pasien_stripped, $data['diagnosa'], $data['tindakan'], $kelasRawatBPJSByNomor, $data['tarif'], $data['dataInadrg']);
                    $statusUpdateClaim = $this->updateClaimV2($data);
                    
                    //print_r($statusUpdateClaim);
                    if ($statusUpdateClaim['metadata']['code'] <> 200) {
                        $responUpdateClaim['status'] = "error";
                        $responUpdateClaim['pesan'] = "update claim gagal gaes, error code " . $statusUpdateClaim['metadata']['code'] . " / " . $statusUpdateClaim['metadata']['message'];
                        $responUpdateClaim['payload2'] =  session()->set('json_update');
                        echo json_encode($responUpdateClaim);
                    } else {
                        //$session = session();
                        $responUpdateClaim['payload1'] = session()->get('json_newclaim');
                        $responUpdateClaim['payload2'] =  session()->get('json_update');
                        $responUpdateClaim['bpjs'] = session()->get('kelasRawatBPJSByNomor');
                        $responUpdateClaim['kamar'] = session()->get('kelasRawatKamarByNomor');
                        $responUpdateClaim['akomodasi'] = session()->get('cekAkomodasi');
                        $responUpdateClaim['responseUpdate'] = $statusUpdateClaim;
                        // $responUpdateClaim['tes'] = $this->session->userdata('tes');
                        // $responUpdateClaim['res'] = $res;
                        // $responUpdateClaim['queryTrans'] = $this->session->userdata('queryTrans');
                        //simpan log
                        $this->savePayload($no_sep, trim(json_encode(session()->get('json_update'))));
                        // $this->M_rajal->savePayload($no_sep, trim(json_encode($this->session->userdata('json_update'))));
                        // print_r($data['dataInadrg']);
                        // exit;

                        // if ($data['dataInadrg'][0]->mrdp_sitb <> "")
                        if ($data['dataInadrg'] == "mrdp_sitb")
                        //cek sitb
                        {
                            $statusVerifySITB = json_decode($this->sitb_validate($no_sep, $data['dataInadrg'][0]->mrdp_sitb), true);
                            // var_dump($statusVerifySITB);
                            // echo json_encode($statusVerifySITB);
                            if ($statusVerifySITB['response']['status'] == "INVALID") {
                                $this->M_rajal->validate_sitb($data['dataInadrg'][0]->mrdp_sitb, "false");
                                $responUpdateClaim['validate_sitb'] = "false";
                                $responUpdateClaim['status'] = "error";
                                $responUpdateClaim['pesan'] = "validasi nomor SITB gagal, <br/>" . $statusVerifySITB['response']['status'] . " / " . $statusVerifySITB['response']['detail'];
                                echo json_encode($responUpdateClaim);
                                exit;
                            } else {
                                $this->M_rajal->validate_sitb($data['dataInadrg'][0]->mrdp_sitb, "true");
                                $responUpdateClaim['validation'] = $statusVerifySITB;
                                $responUpdateClaim['validate_sitb'] = "true";
                                $responUpdateClaim['status'] = "ok";
                                $responUpdateClaim['pesan'] = $statusUpdateClaim['metadata']['code'] . " / " . $statusNewClaim['metadata']['message'];
                            }
                        } else {
                            $responUpdateClaim['status'] = "ok";
                            $responUpdateClaim['pesan'] = $statusUpdateClaim['metadata']['code'] . " / " . $statusNewClaim['metadata']['message'];
                        }
                        echo json_encode($responUpdateClaim);
                        // $str = "cd /home/ipde/cronjob && wget -bq " . base_url() . "RemoteGrouping/nosep/" . $this->session->userdata('userdata')->coder_nik . "/" . $data['dataRajal']->no_sjp . "";
                        // //echo $str;
                        // shell_exec($str);
                    }
                } else {
                    $output['status'] = "error";
                    $output['pesan'] = "new claim gagal, error code " . $statusNewClaim['metadata']['code'] . " / " . $statusNewClaim['metadata']['message'];
                    echo json_encode($output);
                }
            } else {
                $output['status'] = 'error';
                $output['pesan'] = 'Data Inadrg Gagal disimpan';
                echo json_encode($output);
            }
        }
        // $this->hasil($output);

    }
    function newClaim($no_kartu, $no_sep, $no_rm, $nama_pasien, $tgl_lahir, $gender)
    {
        $json_request_tambah = '{
            "metadata": {
            "method": "new_claim"
            },
            "data": {
            "nomor_kartu": "' . $no_kartu . '",
            "nomor_sep": "' . $no_sep . '",
            "nomor_rm": "' . $no_rm . '",
            "nama_pasien": "' . $nama_pasien . '",
            "tgl_lahir": "' . $tgl_lahir . '",
            "gender": "' . $gender . '"
            }
            }';
        // echo "request new claim=" . $json_request_tambah;
        session()->set('json_newclaim', json_decode($json_request_tambah));
        $response = $this->sendWS($json_request_tambah);
        $msg = json_decode($response);
        // echo "msg code=".$msg->metadata->code;
        switch ($msg->metadata->code) {
            case "400":
                $json_update_pasien = '{
                    "metadata": {
                    "method": "update_patient",
                    "nomor_rm": "' . $no_rm . '"
                    },
                    "data": {
                    "nomor_kartu": "' . $no_kartu . '",
                    "nomor_rm": "' . $no_rm . '",
                    "nama_pasien": "' . $nama_pasien . '",
                    "tgl_lahir": "' . $tgl_lahir . '",
                    "gender": "' . $gender . '"
                    }
                    }';
                session()->set('json_update_pasien', json_decode($json_update_pasien), true);
                $response_update = $this->sendWS($json_update_pasien);
                return json_decode($response_update, true);
                break;
            case "200":
                return json_decode($response, true);
                break;
            default:
                return json_decode($response, true);
        }
    }
    // function updateClaimVx2x($noka, $no_sep, $no_rm, $diagnosa, $tindakan, $kelasRawatBPJSByNomor, $tarif, $dataInadrg)
    function updateClaimV2($data)
    {
        $tgl_masuk = $data['hidden_tgl_masuk'];
        // $filterKelasBPJS = "()";
        switch ($data['hak_kelas']) {
            case "Kelas 1":
                $hak_kelas = "1";
                break;
            case "Kelas 2":
                $hak_kelas = "2";
                break;
            case "Kelas 3":
                $hak_kelas = "3";
                break;
        }

        // if ($data['hak_kelas'] == 1) {
        //     $filterKelasBPJS = array('10012', '10013', '10040', '10041', '10049', '10051');
        // }
        // if ($data['hak_kelas'] == 2) {
        //     $filterKelasBPJS = array('10011', '10013', '10040', '10041', '10049', '10051');
        // }
        // if ($data['hak_kelas'] == 3) {
        //     $filterKelasBPJS = array('10011', '10012', '10040', '10041', '10049', '10051');
        // }
        if ($data['tgl_keluar'] == "") {
            // $tgl_keluar = substr($data['tgl_transaksi'], 0, 10);
            $sekarang = date('Y-m-d h:i:s');
            $tgl_keluar = $sekarang;
        } else {
            // $tgl_keluar = substr($data['tgl_keluar'], 0, 10);
            $tgl_keluar = $data['tgl_keluar'];

        }
        
        $pelayanan =  $data['kd_unit'] ; //kd unit = pelayanan ges
        if ($pelayanan == "pelayananrajal") {
            // echo"$data[hidden_tgl_masuk]";
            // exit();
            // $tgl_keluar = substr($data['hidden_tgl_masuk'], 0, 10);
            $tgl_keluar = $data['tgl_keluar'];

        }
        
        $lamainap = round((strtotime($tgl_keluar . " +1 day") - strtotime($tgl_masuk)) / (60 * 60 * 24));
        // $parse = $this->M_rajal->getDataPasienById($no_sep);
        $parse = $data['dataInadrg'];
        //$parse = $this->strmonitor->search($nama,$kelamin,$status,$pendidikan,$tgl_berakhir,$pk,$offset);
        if ($parse) {
            //echo"parse";exit();
            $data['mrdp_carapulang']            = $parse[0]->mrdp_carapulang;
            $data['mrdp_bblahir']               = $parse[0]->mrdp_bblahir; //satuan dalam gram
            $data['mrdp_coinsidens']            = $parse[0]->mrdp_coinsidens;
            $data['mrdp_covidsep']              = $parse[0]->mrdp_covidsep;
            $data['mrdp_dokter']                = $parse[0]->mrdp_dokter;
            $data['mrdp_caramasuk']             = $parse[0]->mrdp_caramasuk;
            $data['mrdp_sistole']               = $parse[0]->mrdp_sistole;
            $data['mrdp_diastole']              = $parse[0]->mrdp_diastole;
            $data['mrdp_upgrade_class_ind']     = $parse[0]->mrdp_upgrade_class_ind;
            $data['mrdp_upgrade_class_class']   = $parse[0]->mrdp_upgrade_class_class;
            $data['mrdp_upgrade_class_los']     = $parse[0]->mrdp_upgrade_class_los;
            $data['mrdp_upgrade_class_payor']   = $parse[0]->mrdp_upgrade_class_payor;
            $data['mrdp_tarif_poli_eks']        = $parse[0]->mrdp_tarif_poli_eks;
            $data['mrdp_sitb']                  = $parse[0]->mrdp_sitb;
            $data['mrdp_presentase']            = $parse[0]->mrdp_presentase;
            $data['mrdp_icu_los']               = $parse[0]->mrdp_icu_los;
            $data['mrdp_dializer']              = $parse[0]->mrdp_dializer;
            $data['mrdp_use_ind']               = $parse[0]->mrdp_use_ind;
            $data['mrdp_intubasi']              = $parse[0]->mrdp_intubasi;
            $data['mrdp_extubasi']              = $parse[0]->mrdp_extubasi;
            //var_dump($data);
        } else {
            //echo"nonparse";exit();
            //kalo ga ada di query
            $data['mrdp_carapulang']            = "1";
            $data['mrdp_bblahir']               = "0"; //satuan dalam gram
            $data['mrdp_coinsidens']            = "0";
            $data['mrdp_covidsep']              = "0";
            $data['mrdp_dokter']                = "0";
            $data['mrdp_caramasuk']             = "gp";
            $data['mrdp_sistole']               = "120";
            $data['mrdp_diastole']              = "80";
            $data['mrdp_upgrade_class_ind']     = "0";
            $data['mrdp_upgrade_class_class']   = "";
            $data['mrdp_upgrade_class_los']     = "";
            $data['mrdp_upgrade_class_payor']   = "";
            $data['mrdp_tarif_poli_eks']        = "";
            $data['mrdp_sitb']                  = "";
            $data['mrdp_presentase']            = "0";
            $data['mrdp_icu_los']               = "0";
            $data['mrdp_dializer']              = "0";
            $data['mrdp_use_ind']               = "0";
            $data['mrdp_intubasi']              = "";
            $data['mrdp_extubasi']              = "";
        }

        if ($data['mrdp_coinsidens'] == "0") {
            $data['mrdp_covidsep']      = "0";
        }

        if (isset($data['icu_indikator'])) {
            $intensif = "1";
        } else {
            $intensif = "0";
        }
        
        //$los=date_diff(date_create($tgl_keluar),date_create($tgl_masuk))->format('%a');
        //print_r($data['dataRajal']);
        // json query

        // $tarif = $this->ambilTarif($no_sep);
        // $tarif = $this->mappingTarif($daftarDataPasien, $no_rm);

        //$pelayanan =  session()->set('pelayanan');
        // echo "pelayanan=".$pelayanan;
        // exit;
        if ($data['kd_unit']== "pelayananranap") {
            $pelayanan = "pelayananranap";
        }
        if ($data['kd_unit']== "pelayananrajal") {
            $pelayanan = "pelayananrajal";
        }
        if ($data['kd_unit']== "pelayananigd") {
            $pelayanan = "pelayananigd";
        }

        //echo"inic$pelayanan";

        switch ($pelayanan) {
            case "pelayananrajal":
                $jenis_rawat = "2"; //rawat jalan
                break;
            case "pelayananranap":
                $jenis_rawat = "1"; //rawat inap
                break;
            case "pelayananigd":
                $jenis_rawat = "3"; //igd. di manual harusnya 3 tapi ga bisa
                break;
        }
        
        ($data['diagnosa'] == "") ? $data['diagnosa'] = "#" : "";
        ($data['tindakan'] == "") ? $data['tindakan'] = "#" : "";
        $json_request_update = '
         {
             "metadata": {
             "method": "set_claim_data",
             "nomor_sep": "' . $data['no_sep'] . '"
             },
             "data": {
             "nomor_sep": "' . $data['no_sep'] . '",
             "nomor_kartu": "' . $data['no_kartu'] . '",
             "tgl_masuk": "' . $tgl_masuk . '",
             "tgl_pulang": "' . $tgl_keluar . '",
             "cara_masuk": "' . $data['mrdp_caramasuk'] . '",
             "jenis_rawat": "' . $jenis_rawat . '",
             "kelas_rawat": "' . $hak_kelas . '",
             "adl_sub_acute": "",
             "adl_chronic": "",
             "icu_indikator": "' . $intensif . '",
             "icu_los": "' . $data['mrdp_icu_los'] . '",
             "ventilator_hour": "0",
             "upgrade_class_ind": "' . $data['mrdp_upgrade_class_ind'] . '",
             "upgrade_class_class": "' . $data['mrdp_upgrade_class_class'] . '",
             "upgrade_class_los": "' . $data['mrdp_upgrade_class_los'] . '",
             "upgrade_class_payor": "' . $data['mrdp_upgrade_class_payor'] . '",
             "add_payment_pct": "' . $data['mrdp_presentase'] . '",
             "birth_weight": "' . $data['mrdp_bblahir'] . '",
             "sistole": ' . $data['mrdp_sistole'] . ',
             "diastole": ' . $data['mrdp_diastole'] . ',
             "discharge_status": "' . $data['mrdp_carapulang'] . '",
             "diagnosa": "' . $data['diagnosa'] . '",
             "procedure": "' . $data['tindakan'] . '",
             "diagnosa_inagrouper": "' . $data['diagnosa'] . '",
             "procedure_inagrouper": "' . $data['tindakan'] . '",
             "tarif_rs": {
                 "prosedur_non_bedah": "' . $data['tarif']['1'] . '",
                 "prosedur_bedah": "' . $data['tarif']['2'] . '",
                 "konsultasi": "' . $data['tarif']['3'] . '",
                 "tenaga_ahli": "' . $data['tarif']['4'] . '",
                 "keperawatan": "' . $data['tarif']['5'] . '",
                 "penunjang": "' . $data['tarif']['6'] . '",
                 "radiologi": "' . $data['tarif']['7'] . '",
                 "laboratorium": "' . $data['tarif']['8'] . '",
                 "pelayanan_darah": "' . $data['tarif']['9'] . '",
                 "rehabilitasi": "' . $data['tarif']['10'] . '",
                 "kamar": "' . $data['tarif']['11'] . '",
                 "rawat_intensif": "' . $data['tarif']['12'] . '",
                 "obat": "' . $data['tarif']['13'] . '",
                 "obat_kronis": "' . $data['tarif']['14'] . '",
                 "obat_kemoterapi": "' . $data['tarif']['15'] . '",
                 "alkes": "' . $data['tarif']['16'] . '",
                 "bmhp": "' . $data['tarif']['17'] . '",
                 "sewa_alat": "' . $data['tarif']['18'] . '"
             },
             "covid19_co_insidense_ind": "' . $data['mrdp_coinsidens'] . '",
             "covid19_no_sep": "' . $data['mrdp_covidsep'] . '",';
        //dializer
        if ($data['kd_unit'] == "277") {
            $json_request_update .= '
                     "dializer_single_use": "1",';
        }
        //kantong darah
        if ($data['tarif']['9'] <> "0") {
            $json_request_update .= '
                     "kantong_darah": "' . $data['kantong_darah'] . '",';
        }
        //apgar
        if ($data['flag_apgar'] == TRUE) {
            $json_request_update .= '
             "apgar":{
                 "menit_1":{
                     "appearance": ' . $data["m1_appearance"] . ',
                     "pulse": ' . $data["m1_pulse"] . ',
                     "grimace": ' . $data["m1_grimace"] . ',
                     "activity": ' . $data["m1_activity"] . ',
                     "respiration": ' . $data["m1_respiration"] . '
                 },
                 "menit_5":{
                     "appearance": ' . $data["m5_appearance"] . ',
                     "pulse": ' . $data["m5_pulse"] . ',
                     "grimace": ' . $data["m5_grimace"] . ',
                     "activity": ' . $data["m5_activity"] . ',
                     "respiration": ' . $data["m5_respiration"] . '
                 }
             },';
        }
        //persalinan
        if ($data['flag_persalinan'] == TRUE) {
            $json_request_update .= '
             "persalinan":{
                 "usia_kehamilan":"' . $data["usia_kehamilan"] . '",
                 "gravida":"' . $data["gravida"] . '",
                 "partus":"' . $data["partus"] . '",
                 "abortus":"' . $data["abortus"] . '",
                 "onset_kontraksi":"' . $data["onset_kontraksi"] . '"
                 ';
            if (isset($data['delivery_dttm'])) {
                // echo "xx".json_encode($data['delivery_dttm'])."<br/>";
                // exit;
                $json_request_update .= ',"delivery": [
                         ';
                // foreach()
                $num_delivery = count($data['delivery_dttm']);
                $i = 1;
                foreach ($data['delivery_dttm'] as $del_k => $del_v) {
                    // echo $data['delivery_dttm'][$del_k]."<br/>";
                    // echo $del_k."/".$del_v."<br/>";
                    if (!isset($data['use_manual'][$del_k])) {
                        $data['use_manual'][$del_k] = '0';
                    }
                    if (!isset($data['use_forcep'][$del_k])) {
                        $data['use_forcep'][$del_k] = '0';
                    }
                    if (!isset($data['use_vacuum'][$del_k])) {
                        $data['use_vacuum'][$del_k] = '0';
                    }

                    $json_request_update .= '{
                     "delivery_sequence":"' . $i . '",
                     "delivery_method":"' . $data['delivery_method'][$del_k] . '",
                     "delivery_dttm":"' . $data['delivery_dttm'][$del_k] . '",
                     "letak_janin":"' . $data['letak_janin'][$del_k] . '",
                     "kondisi":"' . $data['kondisi'][$del_k] . '",
                     "use_manual":"' . $data['use_manual'][$del_k] . '",
                     "use_forcep":"' . $data['use_forcep'][$del_k] . '",
                     ';
                    $json_request_update .= '
                     "shk_spesimen_ambil":"' . $data['shk_spesimen_ambil'][$del_k] . '",
                     "shk_lokasi":"' . $data['shk_lokasi'][$del_k] . '",
                     "shk_alasan":"' . $data['shk_alasan'][$del_k] . '",
                     "shk_spesimen_dttm":"' . $data['shk_spesimen_dttm'][$del_k] . '",
                     ';
                    if ($i <> $num_delivery) {
                        $json_request_update .= '"use_vacuum":"' . $data['use_vacuum'][$del_k] . '"},
                         ';
                    } else {
                        $json_request_update .= '"use_vacuum":"' . $data['use_vacuum'][$del_k] . '"}
                         ';
                    }
                    $i++;
                }
                // exit;
                $json_request_update .= '
                     ]';
            }
            $json_request_update .= '
             },';
        }
        if ($data['mrdp_use_ind'] == 1) {
            $json_request_update .= '
             "ventilator": {
                 "use_ind": "' . $data['mrdp_use_ind'] . '",
                 "start_dttm": "' . $data['mrdp_intubasi'] . '",
                 "stop_dttm": "' . $data['mrdp_extubasi'] . '"
             },
         ';
        }
        //codr nik hardcode punya user simrs di eklaim
        $json_request_update .= '
             "tarif_poli_eks": "' . $data['mrdp_tarif_poli_eks'] . '",
             "nama_dokter": "' . $data['mrdp_dokter'] . '",
             "kode_tarif": "CS",
             "payor_id": "3",
             "payor_cd": "JKN",
             "cob_cd": "",
             "coder_nik": "123123123123"
             }
             }';
             
        //  echo $json_request_update;
        //  exit;
        // $this->session->set_userdata('json_update', json_decode($json_request_update));
        // $session = session();
        session()->set('json_update', json_decode($json_request_update));
        
        // $this->session->set_userdata('tes', $tes);
        $msg = json_decode($this->sendWS($json_request_update), true);
        // variable data adalah base64 dari file pdf
        return $msg;
    }
    public function cek_apgar($diag)
    {
        $temp_apgar = false;
        $cek_diagutama1 = substr($diag, 0, 3);
        switch ($cek_diagutama1) {
            case "Z38":
                $temp_apgar = true;
                // echo "3x";
                break;
        }
        $cek_diagutama2 = substr($diag, 0, 1);
        switch ($cek_diagutama2) {
            case "P":
                $temp_apgar = true;
                // echo "4x";
                break;
        }
        return $temp_apgar;
    }
    public function cek_persalinan($diag)
    {
        $temp_persalinan = false;
        $cek_diagutama1 = substr($diag, 0, 3);
        switch ($cek_diagutama1) {
            case "Z37":
                $temp_persalinan = true;
                // echo "3x";
                break;
        }
        $cek_diagutama2 = substr($diag, 0, 1);
        switch ($cek_diagutama2) {
            case "O":
                $temp_persalinan = true;
                // echo "4x";
                break;
        }
        return $temp_persalinan;
    }
    public function tampilrincianbiayaeklaim()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT
                    jenis_produk.id_jenis_produk,deskripsi,sum(detail_transaksi.total_harga) 
                FROM
                    detail_transaksi
                    JOIN produk USING ( id_produk )
                    JOIN jenis_produk using (id_jenis_produk)
                    where detail_transaksi.id_transaksi='$input->id_transaksi'
                    group by jenis_produk.id_jenis_produk";

        //echo"$query";exit();
        if ($this->db->query($query)->getRow() > '') { //true
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['code'] = 200;
            $output['data'] = $this->db->query($query)->getResult();
        } else {
            $output['code'] = 200;
            $output['status'] = "sukses";
            $output['pesan'] = 'Belum ada entrian tarif tindakan';
            $output['data'] = '0';

        }
        echo json_encode($output);
    }
    public function savePayload($no_sjp, $data)
    {
        $query = "select * from inacbg_grouping where nosep='" . $no_sjp . "'";
        $cek = $this->db->query($query);

        // echo"$a";
        // exit();
        $data = json_decode($data);
        $date1 = date_create($data->data->tgl_pulang);
        $date2 = date_create($data->data->tgl_masuk);
        $diff = date_diff($date1, $date2);
        $los = $diff->format("%a") + 1;
        $jenis_rawat = $data->data->jenis_rawat;
        //1 ranap, 2 rajal, 3 igd
        $data = json_encode($data);
        if ($cek->getNumRows() > 0) {
            //update
            $query  =  $this->db->query("UPDATE inacbg_grouping set nosep='" . $no_sjp . "', payload='" . trim($data) . "', los='" . trim($los) . "', jenis_rawat='" . trim($jenis_rawat) . "',tgl='" . date("Y-m-d H:i:s") . "' where nosep='" . $no_sjp . "'");
        } else {
            //insert
            $query  =  $this->db->query("INSERT INTO inacbg_grouping (nosep, payload, los, jenis_rawat,tgl) VALUES('" . $no_sjp . "', '" . trim($data) . "', '" . trim($los) . "', '" . trim($jenis_rawat) . "','" . date("Y-m-d H:i:s") . "')");
        }
        // echo $query;
        // exit;
        // $pgdb->query($query);
        // return $query->affected_rows();
    }
    public function updateInadrg($data)
    {
        $flag_apgar = false;
        $flag_persalinan = false;

        // echo json_encode($data) . "<br/><br/>";
        // $pgdb = $this->load->database('pgdb', TRUE);
        //$data = $pgdb->query($sql);
        $this->db->transStart();
        $this->db->query("delete from medrec_datapasien where mr_nosep='" . $data['no_sep'] . "';");
        $this->db->query("delete from medrec_diagutama where mr_nosep='" . $data['no_sep'] . "';");

        $this->db->query("delete from medrec_diagsekunder where mr_nosep='" . $data['no_sep'] . "';");
        $this->db->query("delete from medrec_laporanoperasi where mr_nosep='" . $data['no_sep'] . "';");

        $this->db->query("delete from medrec_tindakanlain where mr_nosep='" . $data['no_sep'] . "';");

        $this->db->query("delete from apgar where kd_pasien='" . $data['kd_pasien'] . "' and id_transaksi='" . $data['id_transaksi'] . "'");
        // echo"xxx";exit();

        $this->db->query("delete from persalinan where kd_pasien='" . $data['kd_pasien'] . "' and id_transaksi='" . $data['id_transaksi'] . "'");
        $this->db->query("delete from persalinan_delivery where kd_pasien='" . $data['kd_pasien'] . "' and id_transaksi='" . $data['id_transaksi'] . "'");

        if (!isset($data['dializer'])) {
            $data['dializer'] = 0;
        }
        if (!isset($data['intubasi'])) {
            $data['intubasi'] = '1970-01-01 00:00:00';
        }
        if ($data['intubasi'] == '') {
            $data['intubasi'] = '1970-01-01 00:00:00';
        }
        if (!isset($data['extubasi'])) {
            $data['extubasi'] = '1970-01-01 00:00:00';
        }
        if ($data['extubasi'] == '') {
            $data['extubasi'] = '1970-01-01 00:00:00';
        }
        if (!isset($data['use_ind'])) {
            $data['use_ind'] = 0;
            $data['intubasi'] = '';
            $data['extubasi'] = '';
        }

        if (!isset($data['upgrade_class_ind'])) {
            $data['upgrade_class_ind'] = 0;
        }
        if ($data['upgrade_class_ind'] == 0) {
            // $data['caramasuk'] = 'gp';
            $data['upgrade_class_class'] = '';
            $data['upgrade_class_los'] = '0';
            $data['upgrade_class_payor'] = '';
            $data['tarif_poli_eks'] = '0';
            $data['add_payment_pct'] = '0';
            // $data['sistole'] = 120;
            // $data['diastole'] = 80;
        } else {
            if ($data['jenis_perawatan'] == "Rajal") {
                $data['upgrade_class_class'] = '';
                $data['upgrade_class_los'] = '0';
                $data['upgrade_class_payor'] = '';
                $data['add_payment_pct'] = '0';
            } else {
                $data['tarif_poli_eks'] = '0';
            }
        }
        if (!isset($data['upgrade_class_payor'])) {
            $data['upgrade_class_payor'] = '';
        }
        if (!isset($data['add_payment_pct'])) {
            $data['add_payment_pct'] = '0';
        }
        if (!isset($data['icu_los'])) {
            $data['icu_los'] = 0;
        }

        if (!isset($data['check_sitb'])) {
            $data['nomor_sitb'] = "";
        }
        if (!isset($data['kantong_darah'])) {
            $data['kantong_darah'] = "0";
        }
        // echo "check_sitb-".$data['check_sitb']."<br/>";
        // echo "sitb-".$data['nomor_sitb'];
        // exit;
        if (isset($data['carapulang']) || isset($data['bblahir'])) {
            $query = "INSERT INTO medrec_datapasien (mr_nosep, mrdp_carapulang, mrdp_bblahir, mrdp_coinsidens, mrdp_covidsep, mrdp_dokter, mrdp_caramasuk, mrdp_sistole, mrdp_diastole, mrdp_upgrade_class_ind, mrdp_upgrade_class_class, mrdp_upgrade_class_los, mrdp_upgrade_class_payor, mrdp_tarif_poli_eks, mrdp_sitb, mrdp_presentase, mrdp_icu_los, mrdp_dializer, mrdp_use_ind, mrdp_intubasi, mrdp_extubasi, mrdp_kantong_darah) ";
            $query .= "VALUES('" . $data['no_sep'] . "', '" . $data['carapulang'] . "', '" . $data['bblahir'] . "', '" . $data['koinsiden'] . "', '" . $data['covidsep'] . "', '" . $data['dokter'] . "', '" . $data['caramasuk'] . "', '" . $data['sistole'] . "', '" . $data['diastole'] . "', '" . $data['upgrade_class_ind'] . "', '" . $data['upgrade_class_class'] . "', '" . $data['upgrade_class_los'] . "', '" . $data['upgrade_class_payor'] . "', '" . $data['tarif_poli_eks'] . "', '" . $data['nomor_sitb'] . "', '" . $data['add_payment_pct'] . "', '" . $data['icu_los'] . "', '" . $data['dializer'] . "', '" . $data['use_ind'] . "', '" . $data['intubasi'] . "', '" . $data['extubasi'] . "', '" . $data['kantong_darah'] . "')";
            // echo $query;
            // exit;
            $this->db->query($query);
        }

        $pecah_diagutama = explode(" - ", $data['diagutama']);
        $diagutama = $pecah_diagutama[0];
        $query = $this->db->query("INSERT INTO medrec_diagutama (mr_nosep,mrdu_icd10) VALUES('" . $data['no_sep'] . "','" . $diagutama . "');");
        // echo $query . "<br/>";
        $flag_apgar = $this->cek_apgar($diagutama);
        $flag_persalinan = $this->cek_persalinan($diagutama);
        //$pgdb->query($query);
        // echo "jml diagsekunder=".count($data['diagsekunder']) . "<br/>";
        if (isset($data['diagsekunder'])) {
            if (count($data['diagsekunder']) > 0) {
                for ($i = 0; $i < count($data['diagsekunder']); $i++) {
                    if ($data['diagsekunder'][$i] <> "") {
                        $pecah_diagsekunder = explode(" - ", $data['diagsekunder'][$i]);
                        $diagsekunder = $pecah_diagsekunder[0];
                        $query = $this->db->query("INSERT INTO medrec_diagsekunder (mr_nosep,mrds_icd10) VALUES('" . $data['no_sep'] . "','" . $diagsekunder . "');");
                        $flag_apgar = $this->cek_apgar($diagsekunder);
                        $flag_persalinan = $this->cek_persalinan($diagsekunder);
                        // echo $query . "<br/>";
                        //$pgdb->query($query);
                    }
                }
            }
        }

        // echo "jml penunjangdiaglab=".count($data['penunjangdiagnostikLab']) . "<br/>";
        if (isset($data['penunjangdiagnostikLab'])) {
            if (count($data['penunjangdiagnostikLab']) > 0) {
                for ($i = 0; $i < count($data['penunjangdiagnostikLab']); $i++) {
                    if ($data['penunjangdiagnostikLab'][$i] <> "" || $data['pd_hasilLab'][$i] <> "") {
                        $pecah_penunjangdiagnostikLab = explode(" - ", $data['penunjangdiagnostikLab'][$i]);
                        $penunjangdiagnostikLab = $pecah_penunjangdiagnostikLab[0];
                        $query = $this->db->query("INSERT INTO medrec_penunjangdiagnostik (mr_nosep,mrpd_tipe,mrpd_icd9,mrpd_hasil) VALUES('" . $data['no_sep'] . "','Laboratorium','" . $penunjangdiagnostikLab . "','" . $data['pd_hasilLab'][$i] . "');");
                        //echo $query . "<br/>";
                        //$pgdb->query($query);
                    }
                }
            }
        }
        // echo "jml penunjangdiagrad=".count($data['penunjangdiagnostikRad']) . "<br/>";
        if (isset($data['penunjangdiagnostikRad'])) {
            if (count($data['penunjangdiagnostikRad']) > 0) {
                for ($i = 0; $i < count($data['penunjangdiagnostikRad']); $i++) {
                    if ($data['penunjangdiagnostikRad'][$i] <> "" || $data['pd_hasilRad'][$i] <> "") {
                        $pecah_penunjangdiagnostikRad = explode(" - ", $data['penunjangdiagnostikRad'][$i]);
                        $penunjangdiagnostikRad = $pecah_penunjangdiagnostikRad[0];
                        $query = $this->db->query("INSERT INTO medrec_penunjangdiagnostik (mr_nosep,mrpd_tipe,mrpd_icd9,mrpd_hasil) VALUES('" . $data['no_sep'] . "','Radiologi','" . $penunjangdiagnostikRad . "','" . $data['pd_hasilRad'][$i] . "');");
                        //echo $query . "<br/>";
                        //$pgdb->query($query);
                    }
                }
            }
        }
        // echo "jml penunjangdiaglain=".count($data['penunjangdiagnostikLain']) . "<br/>";
        if (isset($data['penunjangdiagnostikLain'])) {
            if (count($data['penunjangdiagnostikLain']) > 0) {
                for ($i = 0; $i < count($data['penunjangdiagnostikLain']); $i++) {
                    if ($data['penunjangdiagnostikLain'][$i] <> "" || $data['pd_hasilLain'][$i] <> "") {
                        $pecah_penunjangdiagnostikLain = explode(" - ", $data['penunjangdiagnostikLain'][$i]);
                        $penunjangdiagnostikLain = $pecah_penunjangdiagnostikLain[0];
                        $query = $this->db->query("INSERT INTO medrec_penunjangdiagnostik (mr_nosep,mrpd_tipe,mrpd_icd9,mrpd_hasil) VALUES('" . $data['no_sep'] . "','Lain lain','" . $penunjangdiagnostikLain . "','" . $data['pd_hasilLain'][$i] . "');");
                        //echo $query . "<br/>";
                        //$pgdb->query($query);
                    }
                }
            }
        }
        // echo "jml laporanoperasi=".count($data['laporanoperasi']) . "<br/>";
        if (isset($data['laporanoperasi'])) {
            if (count($data['laporanoperasi']) > 0) {
                for ($i = 0; $i < count($data['laporanoperasi']); $i++) {
                    switch ($i) {
                        case '0':
                            $mrlo_tindakan = "Jenis Operasi";
                            break;
                        case '1':
                            $mrlo_tindakan = "Tanggal / Jam";
                            break;
                        case '2':
                            $mrlo_tindakan = "Operator";
                            break;
                        case '3':
                            $mrlo_tindakan = "Anaesthesi (jenis/SP An";
                            break;
                        case '4':
                            $mrlo_tindakan = "Diagnosa Pre Op";
                            break;
                        case '5':
                            $mrlo_tindakan = "Diagnosa Post Op";
                            break;
                    }
                    $pecah_laporanoperasi = explode(" - ", $data['laporanoperasi'][$i]);
                    $laporanoperasi = $pecah_laporanoperasi[0];
                    if ($data['lo_uraian'][$i] <> "" || $laporanoperasi <> "") {
                        $query = $this->db->query("INSERT INTO medrec_laporanoperasi (mr_nosep,mrlo_tindakan,mrlo_uraian,mrlo_icd9) VALUES('" . $data['no_sep'] . "','" . $mrlo_tindakan . "','" . $data['lo_uraian'][$i] . "','" . $laporanoperasi . "');");
                    }
                    //echo $query . "<br/>";
                    //$pgdb->query($query);
                }
            }
        }
        // echo "jml tindakanlain=".count($data['tindakanlain']) . "<br/>";
        if (isset($data['tindakanlain'])) {
            if (count($data['tindakanlain']) > 0) {
                for ($i = 0; $i < count($data['tindakanlain']); $i++) {
                    if ($data['tindakanlain'][$i] <> "") {
                        $pecah_tindakanlain = explode(" - ", $data['tindakanlain'][$i]);
                        $tindakanlain = $pecah_tindakanlain[0];
                        $query = $this->db->query("INSERT INTO medrec_tindakanlain (mr_nosep,mrtl_tindakanlain,mrtl_icd9) VALUES('" . $data['no_sep'] . "','','" . $tindakanlain . "');");
                        //echo $query . "<br/>";
                        //$pgdb->query($query);
                    }
                }
            }
        }

        if ($flag_apgar == true) {
            $query = "INSERT INTO apgar (kd_pasien,tgl_masuk,kd_unit,urut_masuk,nosep,m1_appearance,m1_pulse,m1_grimace,m1_activity,m1_respiration,m5_appearance,m5_pulse,m5_grimace,m5_activity,m5_respiration,id_transaksi) ";
            $query .= "VALUES('" . $data['kd_pasien'] . "','" . $data['hidden_tgl_masuk'] . "','" . $data['kd_unit'] . "','" . $data['urut_masuk'] . "','" . $data['no_sep'] . "','" . $data['m1_appearance'] . "','" . $data['m1_pulse'] . "','" . $data['m1_grimace'] . "','" . $data['m1_activity'] . "','" . $data['m1_respiration'] . "','" . $data['m5_appearance'] . "','" . $data['m5_pulse'] . "','" . $data['m5_grimace'] . "','" . $data['m5_activity'] . "','" . $data['m5_respiration'] . "','" . $data['id_transaksi'] . "');";
            $this->db->query($query);
        }

        if ($flag_persalinan == true) {
            $query = "INSERT INTO persalinan (kd_pasien,tgl_masuk,kd_unit,urut_masuk,nosep,mrp_usia_kehamilan,mrp_gravida,mrp_partus,mrp_abortus,mrp_onset_kontraksi,id_transaksi) ";
            $query .= "VALUES('" . $data['kd_pasien'] . "','" . $data['hidden_tgl_masuk'] . "','" . $data['kd_unit'] . "','" . $data['urut_masuk'] . "','" . $data['no_sep'] . "','" . $data['usia_kehamilan'] . "','" . $data['gravida'] . "','" . $data['partus'] . "','" . $data['abortus'] . "','" . $data['onset_kontraksi'] . "','" . $data['id_transaksi'] . "');";
            $this->db->query($query);
        }

        if ($flag_persalinan == true) {
            if (isset($data['delivery_dttm'])) {
                $out['jumlah'] = count($data['delivery_dttm']);
                $count_xy = 1;
                foreach ($data['delivery_dttm'] as $x => $y) {
                    $out['deli'][$x] = $y;
                    // echo $x . "/" . $y . "<br/>";
                    if (!isset($data['use_manual'][$x])) {
                        $data['use_manual'][$x] = '0';
                    }
                    if (!isset($data['use_forcep'][$x])) {
                        $data['use_forcep'][$x] = '0';
                    }
                    if (!isset($data['use_vacuum'][$x])) {
                        $data['use_vacuum'][$x] = '0';
                    }
                    if (!isset($data['shk_spesimen_ambil'][$x])) {
                        $data['shk_spesimen_ambil'][$x] = 'ya';
                    }
                    if (!isset($data['shk_lokasi'][$x])) {
                        $data['shk_lokasi'][$x] = 'vena';
                    }
                    if (!isset($data['shk_alasan'][$x])) {
                        $data['shk_alasan'][$x] = '';
                    }
                    if (!isset($data['shk_spesimen_dttm'][$x])) {
                        $data['shk_spesimen_dttm'][$x] = date("Y-m-d") . " " . date("H:i:s");
                    }
                    $query = "INSERT INTO persalinan_delivery (kd_pasien,tgl_masuk,kd_unit,urut_masuk,nosep,mrpde_delivery_sequence,mrpde_delivery_method,mrpde_delivery_dttm,mrpde_letak_janin,mrpde_kondisi,mrpde_use_manual,mrpde_use_forcep,mrpde_use_vacuum,mrpde_shk_spesimen_ambil,mrpde_shk_lokasi,mrpde_shk_alasan,mrpde_shk_spesimen_dttm,id_transaksi) ";
                    $query .= "VALUES('" . $data['kd_pasien'] . "','" . $data['hidden_tgl_masuk'] . "','" . $data['kd_unit'] . "','" . $data['urut_masuk'] . "','" . $data['no_sep'] . "','" . $count_xy . "','" . $data['delivery_method'][$x] . "','" . $data['delivery_dttm'][$x] . "','" . $data['letak_janin'][$x] . "','" . $data['kondisi'][$x] . "','" . $data['use_manual'][$x] . "','" . $data['use_forcep'][$x] . "','" . $data['use_vacuum'][$x] . "','" . $data['shk_spesimen_ambil'][$x] . "','" . $data['shk_lokasi'][$x] . "','" . $data['shk_alasan'][$x] . "','" . $data['shk_spesimen_dttm'][$x] . "','" . $data['id_transaksi'] . "');";
                    $this->db->query($query);
                    $count_xy++;
                }
            }
        }

        // echo $query . "<br/>";
        //$pgdb->query($query);
        //$lastid=$pgdb->insert_id();
        //echo $lastid;
        //SELECT LAST_INSERT_ID();";
        // $sql1 = "insert into medrec_pasien values ";
        //$pgdb->query($query);
        $this->db->transComplete();
        //return $data->affected_rows();
        $response['trans_status'] = $this->db->transStatus();
        $response['flag_apgar'] = $flag_apgar;
        $response['flag_persalinan'] = $flag_persalinan;

        // return $pgdb->trans_status();
        return $response;
    }
    public function getDiagnosaUtamaById($no_sep)
    {
        $query = "select medrec_diagutama.*,mrconso.STR as \"STR\" from medrec_diagutama left join mrconso on mrconso.CODE=medrec_diagutama.mrdu_icd10 where medrec_diagutama.mr_nosep='" . $no_sep . "';";
        // echo $query."<br/>";
        // if ($this->db->query($query)->result()) {
        //     return $this->db->query($query)->result();
        // } else {
        $data = $this->db->query($query);
        return $data->getRowArray();
        // }
    }
    public function saveGrouping($no_sjp, $data, $coder_nik)
    {
        $query = "select * from inacbg_grouping where nosep='" . $no_sjp . "'";
        $cek = $this->db->query($query);

        // print_r($cek);
        // echo count($cek);
        // exit;
        $code   = $data['response']['cbg']['code'];
        $tarif  = $data['response']['cbg']['tariff'];
        $datajson = json_encode($data);
        if ($cek->getNumRows()  > 0) {
            //update
            $query  = "UPDATE inacbg_grouping set nosep='" . $no_sjp . "', code='" . $code . "', tarif='" . $tarif . "', data='" . $datajson . "', tgl='" . date("Y-m-d H:i:s") . "',codernik='" . $coder_nik . "' where nosep='" . $no_sjp . "'";
            $this->db->query($query);
        } else {
            //insert
            $query  = "INSERT INTO inacbg_grouping (nosep, code, tarif, data, tgl, codernik) VALUES('" . $no_sjp . "', '" . $code . "', '" . $tarif . "', '" . $datajson . "','" . date("Y-m-d H:i:s") . "','" . $coder_nik . "')";
            $this->db->query($query);
        }
        // echo $query;
        // exit;
        // $pgdb->query($query);
        // return $pgdb->affected_rows();
        // return $pgdb->affected_rows();
        $this->db->affectedRows();
    }
    public function getDiagnosaSekunderById($no_sep)
    {
        $query = "select medrec_diagsekunder.*,mrconso.STR as \"STR\" from medrec_diagsekunder left join mrconso on mrconso.CODE=medrec_diagsekunder.mrds_icd10 where medrec_diagsekunder.mr_nosep='" . $no_sep . "';";
        //echo $query."<br/>";
        // if ($this->db->query($query)->result()) {
        //     return $this->db->query($query)->result();
        // } else {
        $data = $this->db->query($query);
        return $data->getRow();
        // }
        // return $this->db->query($query)->result();
    }

    public function getTindakanLainById($no_sep)
    {
        $query = "select medrec_tindakanlain.*,mrconso.STR as \"STR\" from medrec_tindakanlain left join mrconso on mrconso.CODE=medrec_tindakanlain.mrtl_icd9 where medrec_tindakanlain.mr_nosep='" . $no_sep . "' order by medrec_tindakanlain.mrtl_id asc;";
        //echo $query."<br/>";
        // if ($this->db->query($query)->result()) {
        //     return $this->db->query($query)->result();
        // } else {
        $data = $this->db->query($query);
        return $data->getRow();
        // }
        // return $this->db->query($query)->result();
    }
    public function mod_referensidiag()
    {
        $data = json_decode($_GET['data']);
        $id_transaksi  = str_replace('"', '', json_encode($data->id_transaksi));

        $kel =  $this->db->query("SELECT
                DISTINCT(no_sjp) as nosep,
                inacbg_grouping.tarif as tarifcbg,
                inacbg_grouping.data as datacbg,
                transaksi.no_rm as norm,
                * 
            FROM
                penjamin_transaksi
                JOIN transaksi USING ( id_transaksi ) 
                JOIN pasien USING (no_rm)
                join penjamin USING (id_penjamin)
                left join penjamin_pasien on penjamin_pasien.no_rm=transaksi.no_rm and  penjamin_pasien.id_penjamin='2'
                LEFT JOIN inacbg_grouping on inacbg_grouping.nosep=penjamin_transaksi.no_sjp
                WHERE
                    '1'='1'
                AND penjamin_transaksi.id_penjamin = '2' 
                AND penjamin_transaksi.penjamin_utama = 't'
                AND penjamin_transaksi.id_transaksi='$id_transaksi'");

        $outputx['data'] = $kel->getResult();


        // var_dump($outputx);
        $data = json_decode(json_encode($outputx), true);
        return view('view/modal/eklaim/mod_referensidiag', $data);
    }
    public function detailreferensidiagnosa()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'idtransaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";


            $query = "SELECT case when status_diag='0' then 'Diagnosa Awal'
                            when status_diag='1' then 'Diagnosa Utama'
                            when status_diag='2' then 'Diagnosa Sekunder'
                            END as statusdiagnosa,
                         * from mr_penyakit
                            JOIN unit USING (id_unit) 
                            LEFT JOIN penyakit USING ( id_penyakit ) 
                        where id_transaksi='$input->idtransaksi' and mr_penyakit.id_penyakit <> ''
                        ";

            // echo"$query";
            // // exit();


            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Berhasil Cari diagnosa";
                    $output['data']     = $this->db->query($query)->getResult();
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->query($query)->getResult();
                }
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }
    public function detailreferensitindakan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'idtransaksi'
        ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";



            $arrayidkunjungan = $this->db->query("SELECT
                            array_agg(id_kunjungan) as arrayidkunjungan
                        FROM
                            kunjungan 
                        WHERE
                            id_transaksi = '$input->idtransaksi'
                            GROUP BY id_transaksi")->getRow()->arrayidkunjungan;
            $vowels = array("{", "}");
            $aa = str_replace($vowels, "", $arrayidkunjungan);
            $query = "SELECT
                        * 
                    FROM
                        mr_tindakan 
                        join icd_9 using (kd_icd9)
                        join unit using(id_unit) where id_kunjungan in ($aa)";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();
                if (!empty($queryx)) {
                    $output['status']   = "sukses";
                    $output['code']     = "00";
                    $output['pesan']    = "Berhasil Cari tindakan";
                    $output['data']     = $this->db->query($query)->getResult();
                } else {
                    $output['status']   = "sukses";
                    $output['code']     = "XX";
                    $output['pesan']    = "";
                    $output['data']     = $this->db->query($query)->getResult();
                }
            } else {
                $output['code']     = "01";
                $output['status']   =  'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
            // echo "$query";

            // $output['code'] = "01";
            // $output['status'] =  'sukses';
            // $output['pesan'] = 'tes';
        }
        echo json_encode($output);
    }
}
