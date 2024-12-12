<?php

namespace App\Controllers;

class Assesmentbos extends Api
{
    public function simpan_Assesment_Obgyn()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['htglhpht'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $id_kunjungan = '1';
            $rwytmenstruasi = '1';
            $umurenarche = $input->umurenarche;
            $jmldarahhaid = $input->jmldarahhaid;
            $hsiklushaid = $input->hsiklushaid;
            $hlamahaid = $input->hlamahaid;
            $hdesminore = $input->hdesminore;
            $hkawin = $input->hkawin;
            $hkawin1usia = $input->hkawin1usia;
            $husiasuami1 = $input->husiasuami1;
            $hkawin2usia = $input->hkawin2usia;
            $husiasuami2 = $input->husiasuami2;
            $hobstetrikg = $input->hobstetrikg;
            $hobstetrikp = $input->hobstetrikp;
            $hobstetrika = $input->hobstetrika;
            $htglhpht = $input->htglhpht;
            $htglsalin = $input->htglsalin;
            $hhamiltm1id = '1';
            $hhamiltm1list = implode(",", $input->hhamiltm1list);
            $hhamiltm2list = implode(",", $input->hhamiltm2list);
            $hginekologilist = implode(",", $input->hginekologilist);
            // // $hhamiltm1list = '1';
            // $hhamiltm2list = '1';
            // $hginekologilist = '1';
            $riwayatkblama = '1';
            $riwayatkblist = implode(",", $input->hriwayatkblist);
            $riwayatkbkomplikasilist = implode(",", $input->hriwayatkbkomplikasilist);
            // $riwayatkblist = '1';
            // $riwayatkbkomplikasilist = '1';
            $aktif = true;
            $id_pegawai = '1';
            $tgl_update = date('Y-m-d');

            $this->db->transStart();

            $this->db->simpleQuery("INSERT INTO assesmen_bidan (id_kunjungan, rwytmenstruasi, umurenarche, jmldarahhaid, hsiklushaid, hlamahaid, hdesminore, hkawin, hkawin1usia, husiasuami1, hkawin2usia, husiasuami2, hobstetrikg, hobstetrikp, hobstetrika, htglhpht, htglsalin,hhamiltm1id, hhamiltm1list, hhamiltm2list, hginekologilist, riwayatkblama, riwayatkblist, riwayatkbkomplikasilist, aktif, id_pegawai, tgl_update) VALUES('$id_kunjungan', '$rwytmenstruasi', '$umurenarche', '$jmldarahhaid', '$hsiklushaid', '$hlamahaid', '$hdesminore', '$hkawin', '$hkawin1usia', '$husiasuami1', '$hkawin2usia', '$husiasuami2', '$hobstetrikg', '$hobstetrikp', '$hobstetrika', '$htglhpht', '$htglsalin', '$hhamiltm1id', '$hhamiltm1list', '$hhamiltm2list', '$hginekologilist', '$riwayatkblama', '$riwayatkblist', '$riwayatkbkomplikasilist', '$aktif', '$id_pegawai', '$tgl_update')");
            $this->db->transComplete();

            // $output['status']   = "sukses";
            // $output['pesan']    = "Simpan Berhasil";
            // $output['X'] = implode(",", $hhamiltm1list);
            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Simpan Berhasil";
                $outpur['X'] = 'X';
            } else {
                $this->db->transRollback();
                $output['status']   = "sukses";
                $output['pesan']    = "Gagal Simpan";
                $outpur['X'] = 'X';
            }
        }
        $this->hasil($output);
    }

    public function simpan_Assesment_Neonatus()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = ['warna_kulit1'];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            $id_kunjungan = '1';
            $warna_kulit1 = $input->warna_kulit1;
            $warna_kulit5 = $input->warna_kulit5;
            $warna_kulit10 = $input->warna_kulit10;
            $d_jantung1 = $input->d_jantung1;
            $d_jantung5 = $input->d_jantung5;
            $d_jantung10 = $input->d_jantung10;
            $pk_rangsang1 = $input->pk_rangsang1;
            $pk_rangsang5 = $input->pk_rangsang5;
            $pk_rangsang10 = $input->pk_rangsang10;
            $t_otot1 = $input->t_otot1;
            $t_otot5 = $input->t_otot5;
            $t_otot10 = $input->t_otot10;
            $pernafasan1 = $input->pernafasan1;
            $pernafasan5 = $input->pernafasan5;
            $pernafasan10 = $input->pernafasan10;
            $skor_apgar1 = $input->skor_apgar1;
            $skor_apgar5 = $input->skor_apgar5;
            $skor_apgar10 = $input->skor_apgar10;
            $sumber_informasi = $input->sumber_informasi;
            $ket_sumber_informasi = $input->ket_sumber_informasi;
            $cara_masuk = $input->cara_masuk;
            $asal_masuk = $input->asal_masuk;
            $kehamilanke_bg = $input->kehamilanke_bg;
            $kehamilanke_bp = $input->kehamilanke_bp;
            $kehamilanke_ba = $input->kehamilanke_ba;
            $usiahamil = $input->usiahamil;
            $komplikasi = $input->komplikasi;
            $goldar = $input->goldar;
            $rhesusibu = $input->rhesusibu;
            $jns_salin = $input->jns_salin;
            $indikasi = $input->indikasi;
            $presentasi = $input->presentasi;
            $placenta = $input->placenta;
            $kpd = $input->kpd;
            $obat_obatan = $input->obat_obatan;
            $ditolong = $input->ditolong;
            $intensive = $input->intensive;
            $ket_intensive = implode(",", $input->ket_intensive);
            $resiko_infeksi = implode(",", $input->resiko_infeksi);
            $cn_ekpresi_wajah = $input->cn_ekpresi_wajah;
            $cn_menangis = $input->cn_menangis;
            $cn_pola_nafas = $input->cn_pola_nafas;
            $cn_lengan = $input->cn_lengan;
            $cn_kaki = $input->cn_kaki;
            $cn_keadaan_rangsang = $input->cn_keadaan_rangsang;
            $cnyeriflacctot1 = $input->cnyeriflacctot1;
            $cn_frek_detak_jantung = $input->cn_frek_detak_jantung;
            $cn_saturasi = $input->cn_saturasi;
            $cnyeriflacctot2 = $input->cnyeriflacctot2;
            $prematur = $input->prematur;
            $hasil_skrining = '1';
            $minum = implode(",", $input->minum);
            $frekuensi_pasi = $input->frekuensi_pasi;
            $masalahminum = $input->masalahminum;
            $penurunan_bb = $input->penurunan_bb;
            $penyakit_menyertai = $input->penyakit_menyertai;
            $total_skorgizi = $input->total_skorgizi;
            $tindak_lanjut = implode(",", $input->tindak_lanjut);
            $resiko_jatuh = implode(",", $input->resiko_jatuh);
            $e_bicara = $input->e_bicara;
            $e_hambatan = $input->e_hambatan;
            $e_terjemah = $input->e_terjemah;
            $e_pembelajaran = implode(",", $input->e_pembelajaran);



            // $riwayatkblist = implode(",", $input->hriwayatkblist);

            $this->db->transStart();

            $this->db->simpleQuery("INSERT INTO assesmen_neonatus (id_kunjungan, warna_kulit1, warna_kulit5, warna_kulit10, d_jantung1, d_jantung5, d_jantung10, pk_rangsang1, pk_rangsang5, pk_rangsang10, t_otot1, t_otot5, t_otot10, pernafasan1, pernafasan5, pernafasan10, skor_apgar1, skor_apgar5, skor_apgar10, sumber_informasi, ket_sumber_informasi, cara_masuk, asal_masuk, kehamilanke_bg, kehamilanke_bp, kehamilanke_ba, usiahamil, komplikasi, goldar, rhesusibu, jns_salin, indikasi, presentasi, placenta, kpd, obat_obatan, ditolong, intensive, ket_intensive, resiko_infeksi, cn_ekpresi_wajah, cn_menangis, cn_pola_nafas, cn_lengan, cn_kaki, cn_keadaan_rangsang, cnyeriflacctot1, cn_frek_detak_jantung, cn_saturasi, cnyeriflacctot2, prematur, hasil_skrining, minum, frekuensi_pasi, masalahminum, penurunan_bb, penyakit_menyertai, total_skorgizi, tindak_lanjut, resiko_jatuh, e_bicara, e_hambatan, e_terjemah, e_pembelajaran) VALUES('$id_kunjungan', '$warna_kulit1', '$warna_kulit5', '$warna_kulit10', '$d_jantung1', '$d_jantung5', '$d_jantung10', '$pk_rangsang1', '$pk_rangsang5', '$pk_rangsang10', '$t_otot1', '$t_otot5', '$t_otot10', '$pernafasan1', '$pernafasan5', '$pernafasan10', '$skor_apgar1', '$skor_apgar5', '$skor_apgar10', '$sumber_informasi', '$ket_sumber_informasi', '$cara_masuk', '$asal_masuk', '$kehamilanke_bg', '$kehamilanke_bp', '$kehamilanke_ba', '$usiahamil', '$komplikasi', '$goldar', '$rhesusibu', '$jns_salin', '$indikasi', '$presentasi', '$placenta', '$kpd', '$obat_obatan', '$ditolong', '$intensive', '$ket_intensive', '$resiko_infeksi', '$cn_ekpresi_wajah', '$cn_menangis', '$cn_pola_nafas', '$cn_lengan', '$cn_kaki', '$cn_keadaan_rangsang', '$cnyeriflacctot1', '$cn_frek_detak_jantung', '$cn_saturasi', '$cnyeriflacctot2', '$prematur', '$hasil_skrining', '$minum', '$frekuensi_pasi', '$masalahminum', '$penurunan_bb', '$penyakit_menyertai', '$total_skorgizi', '$tindak_lanjut', '$resiko_jatuh', '$e_bicara', '$e_hambatan', '$e_terjemah', '$e_pembelajaran')");
            $this->db->transComplete();

            // $output['status']   = "sukses";
            // $output['pesan']    = "Simpan Berhasil";
            // $output['X'] = implode(",", $hhamiltm1list);
            if ($this->db->transStatus()) {
                $output['status']   = "sukses";
                $output['pesan']    = "Simpan Berhasil";
            } else {
                $this->db->transRollback();
                $output['status']   = "sukses";
                $output['pesan']    = "Gagal Simpan";
            }
        }
        $this->hasil($output);
    }
    public function Rlkegiatan35()
    {
        $unit =  $this->db->query("SELECT * FROM kegiatan WHERE rl='3.5'");
        $output['status']   = 'sukses';
        $output['data']     = $unit->getResult();
        echo json_encode($output);
    }
}
