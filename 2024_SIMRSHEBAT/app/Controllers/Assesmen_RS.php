<?php


namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author lapto
 */
class Assesmen_RS extends Api
{
    public function simpanassesmengiziirna()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            if (($input->tindak_lanjut == '1')||($input->tindak_lanjut == '2')) {
                $klinisfisik      = $input->klinisfisik;

                $replace_klinisfisik1 = str_replace('[',"",$klinisfisik);
                $replace_klinisfisik2 = str_replace(']',"",$replace_klinisfisik1);
                $replace_klinisfisik3 = str_replace('"',"",$replace_klinisfisik2);

                $field = ',pantangan,
                makanan_utama,
                makanan_selingan,
                asupan_gizi,
                riwayat_personal,
                diagnosa_gizi,
                konseling_gizi,
                asupan_makanan,
                kebutuhan_gizi,
                jenis_diet,
                cara_beri,
                bentuk_makanan,
                evaluasi,
                konsul_lanjut,
                konsul_materi,
                kondisi_khusus_ket,
                aktif,
                klinisfisik';
                $inputvalue = ",'$input->pantangan',
                '$input->makananutama',
                '$input->selingan',
                '$input->asupan',
                '$input->rwytpersonal',
                '$input->diagmasalah',
                '$input->konseling',
                '$input->asupanmakanan',
                '$input->kebutuhangizi',
                '$input->jenisdiet',
                '$input->caraberi',
                '$input->bentuk',
                '$input->evaluasi',
                '$input->konsullanjut',
                '$input->konsulmateri',
                '$input->kondisi_khusus_ket', 't', '$replace_klinisfisik3' ";
            } else {
                $field = "";
                $inputvalue = "";
            }

            $query    = "SELECT * FROM assesmen_gizi WHERE id_kunjungan = '$input->id_kunjungan'";
            
            $hasil = $this->db->query($query);
            if ($hasil->getNumRows() > 0){
                $result = 'true'; // update sek lagi insert tok
            }else{
                $result = 'false'; // insert tok
            }

            $query = "  INSERT INTO assesmen_gizi(
                            id_kunjungan,
                            id_pegawai,
                            skrining_perawat,
                            skrining_ahli_gizi,
                            kondisi_khusus,
                            alergi,
                            diet_awal,
                            tindak_lanjut,
                            ttd_ahli_gizi,
                            ttd $field)
                        values(
                            '$input->id_kunjungan',
                            '$input->id_pegawai',
                            '$input->skrining_perawat',
                            '$input->skrining_ahli_gizi',
                            '$input->kondisi_khusus',
                            '$input->alergi',
                            '$input->diet_awal',
                            '$input->tindak_lanjut',
                            '$input->ttdahligizi',
                            '$input->ttd' $inputvalue)";
        
            $update = " UPDATE assesmen_gizi SET aktif = 'f' WHERE id_kunjungan = '$input->id_kunjungan'";
            
            $insertDoc = "INSERT INTO dokumen_pasien values ('$input->transaksi', '21', '$input->id_kunjungan')";
            
            if ($result == 'true'){
                $updatex = $this->db->query($update);
                if ($updatex){
                    $this->db->query($query);
                }
            }else{
                $save = $this->db->query($query);
                if ($save){
                    $this->db->query($insertDoc);
                }
            }
        }

        // if ($save) {
        //     $queryx = "INSERT INTO dokumen_pasien values (
        //         '$input->transaksi',
        //         '21', '$input->id_kunjungan')";
        //     $save_dok = $this->db->simpleQuery($queryx);
        //     if ($save_dok) {
        //         $output['status'] = "sukses";
        //         $output['pesan'] = 'Berhasil';
        //         $output['data'] = '';
        //     } else {
        //         $output['status'] = "gagal";
        //         $output['pesan'] = 'gagal';
        //     }
        // } else {
        //     $output['status'] = "gagal";
        //     $output['pesan'] = $query;
        //     $output['data'] = $this->db->error();
        // }

        $this->db->transComplete();
        if ($this->db->transStatus()) {
            $output['code']         = "200";
            $output['status']       = "sukses";
            $output['pesan']        = "Simpan Assesmen Gizi Berhasil";
        }else{
            $this->db->transRollback();
            $output['code']         = "500";
            $output['status']       = "gagal";
            $output['pesan']        = "Gagal Simpan Assesmen Gizi!!";
        }

        $this->hasil($output);
    }

    public function simpanassesmenanakirna()
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
            $save = $this->db->simpleQuery("INSERT INTO assesmen_anak(
                id_kunjungan,
                id_pegawai,
                sumber_info,
                cara_masuk,
                asal_masuk,
                rwtantenatal,
                pnykithamil,
                obat,
                persalinan,
                penolong,
                getasi,
                bblahir,
                panjangbdn,
                lingkarkep,
                apgarskor,
                kelainan,
                rwyttumbuh,
                rwytimunisasi,
                face,
                legs,
                actv,
                cry,
                consolblity,
                totalskornyeri,
                bab,
                sikap,
                bak,
                jalan,
                bersihdiri,
                klrmasktoilet,
                naikturuntngga,
                makan,
                mandi,
                totalbarthel,
                skorbarthel,
                skorgizia,
                skorgizib,
                skorgizic1,
                skorgizic2,
                skorgizid,
                totalgizi,
                resjatuhusia,
                resjatuhjk,
                resjatuhdiag,
                resjatuhkog,
                resjatuhlink,
                resjatuhresop,
                resjatuhobt,
                resjatuhtotal,
                derajatresjatuh,
                ttd)
                VALUES(
                '$input->id_kunjungan',
                '$input->id_pegawai',
                '$input->sumber_info',
                '$input->cara_masuk',
                '$input->asal_masuk',
                '$input->rwtantenatal',
                '$input->pnykithamil',
                '$input->obat',
                '$input->persalinan',
                '$input->penolong',
                '$input->getasi',
                '$input->bblahir',
                '$input->panjangbdn',
                '$input->lingkarkep',
                '$input->apgarskor',
                '$input->kelainan',
                '$input->rwyttumbuh',
                '$input->rwytimunisasi',
                '$input->face',
                '$input->legs',
                '$input->actv',
                '$input->cry',
                '$input->consolblity',
                '$input->totalskornyeri',
                '$input->bab',
                '$input->sikap',
                '$input->bak',
                '$input->jalan',
                '$input->bersihdiri',
                '$input->klrmasktoilet',
                '$input->naikturuntngga',
                '$input->makan',
                '$input->mandi',
                '$input->totalbarthel',
                '$input->skorbarthel',
                '$input->skorgizia',
                '$input->skorgizib',
                '$input->skorgizic1',
                '$input->skorgizic2',
                '$input->skorgizid',
                '$input->totalgizi',
                '$input->resjatuhusia',
                '$input->resjatuhjk',
                '$input->resjatuhdiag',
                '$input->resjatuhkog',
                '$input->resjatuhlink',
                '$input->resjatuhresop',
                '$input->resjatuhobt',
                '$input->resjatuhtotal',
                '$input->derajatresjatuh',
                '$input->ttd')");
        }
        if ($save) {
            $save_tandavital = $this->db->simpleQuery("INSERT into tanda_vital(
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
                no_rm)
                VALUES(
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
                'true',
                '$input->id_pegawai',
                '$input->respon_e',
                '$input->respon_m',
                '$input->respon_v',
                '$input->no_rm')");
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
        }

        if ($save_tandavital) {
            $queryx = "INSERT INTO dokumen_pasien(id_transaksi,id_dokumen) VALUES (
            '$input->id_transaksi','18')";
            $save_dok = $this->db->simpleQuery($queryx);
            if ($save_dok) {
                $output['status'] = "sukses";
                $output['pesan'] = 'Berhasil';
                $output['data'] = '';
            } else {
                $output['status'] = "gagal";
                $output['pesan'] = 'gagal';
            }
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
            $output['data'] = $this->db->error();
        }

        $this->hasil($output);
    }

    public function loadAssesmenGizi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam =['id_kunjungan'];
        $output = array();
        $output['status']   = "gagal";
        $output['pesan']    = "";

        $idtrans        = $input->id_transaksi;
        $norm           = $input->norm;
        $id_kunjungan   = $input->id_kunjungan;

        $queryAssGizi = $this->db->query("SELECT * FROM assesmen_gizi WHERE id_kunjungan = '$id_kunjungan' AND aktif = 't' ");

        $queryAssMedis = $this->db->query("SELECT * FROM assesmen_medis_umum WHERE id_kunjungan = '$id_kunjungan' AND aktif = 't' ");

        if ($queryAssMedis->getNumRows() > 0){
            $output['status']        = "sukses";
            $output['pesan']         = 'Assesmen Medis ditemukan';
            $output['dataAssMedis']  = $queryAssMedis->getResult();
        }else{
            $output['status']        = "sukses";
            $output['pesan']         = '';
            $output['dataAssMedis']  = 0;
        }
        
        if ($queryAssGizi->getNumRows() > 0){
            $output['status']        = "sukses";
            $output['pesan']         = 'Assesmen Gizi ditemukan';
            $output['dataAssGizi']   = $queryAssGizi->getResult();
        } else {
            $output['status']        = "sukses";
            $output['pesan']         = '';
            $output['dataAssGizi']   = 0;
        }

        $this->hasil($output);
    }

    public function printassesmenGizi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = json_decode(file_get_contents('php://input'));
        $id_kunjungan  = $_POST['id_kunjungan'];
        $transaksi  = $_POST['transaksi'];

        $query = $this->db->query("
            SELECT
                ag.*,
                K.*,
                us.nama AS ttd_user,
                T.*,
                peg.*,
                P.no_rm,
                P.nama,
                P.tgl_lahir,
                age( P.tgl_lahir ) :: VARCHAR,
                EXTRACT ( YEAR FROM AGE( P.tgl_lahir ) ) || ' Th ' || EXTRACT ( MONTH FROM AGE( P.tgl_lahir ) ) || ' Bln ' || EXTRACT ( DAY FROM AGE( P.tgl_lahir ) ) || ' Hr' AS umur 
            FROM
                assesmen_gizi ag
                INNER JOIN kunjungan K ON ag.id_kunjungan = K.id_kunjungan
                INNER JOIN transaksi T ON K.id_transaksi = T.id_transaksi
                INNER JOIN pasien P ON T.no_rm = P.no_rm
                INNER JOIN pegawai peg ON K.id_pegawai = peg.id_pegawai
                INNER JOIN users us ON ag.ttd_ahli_gizi = us.id_user 
            WHERE
                t.id_transaksi = '$transaksi' AND k.id_kunjungan = '$id_kunjungan' and ag.aktif = true");

        $data['assGz'] = $query->getResult();
        
        if ($query->getNumRows() == 0){
            $output['status']   = "gagal";
            $output['pesan']    = "Hasil Assesmen Gizi tidak ditemukan !!";
            $this->hasil($output);
            return;
        }else{
            $html = view('view/gizi/printassesmengizi', $data);

            $mpdf   = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
                'format' => 'A4' //panjang, tinggi
            ]);

            $title  = "Assesmen Gizi";

            $mpdf->AddPage(
                'P', // L - landscape, P - portrait
                '',
                '',
                '',
                '',
                2, // margin_left
                2, // margin right
                2, // margin top
                0, // margin bottom
                0, // margin header
                0
            ); // margin footer        
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->SetTitle($title);
            $mpdf->WriteHTML($html);

            $mpdf->Output("Assesmen Gizi.pdf", 'I');
            exit;
        }
        
    }

}
