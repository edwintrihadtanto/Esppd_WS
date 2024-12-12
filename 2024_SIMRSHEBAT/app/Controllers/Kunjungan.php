<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of Kunjungan
 *
 * @author lapto
 */


class Kunjungan extends Api
{
    public function addKunjungan()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_user',
            'no_rm',
            'id_unit',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $transaksiBaru = false;
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            $transaksi   = null;
            $queryCekSep = $this->db->query("SELECT * from penjamin_transaksi WHERE no_sjp='$input->no_sjp' ");
            $queryTransaksi =  $this->db->query("SELECT * FROM transaksi WHERE no_rm = '$input->no_rm' AND tgl_tutup IS NULL ORDER BY tgl_transaksi DESC");
            if ($queryCekSep->getNumRows() > 0) {
                if ($queryTransaksi->getNumRows() > 0) {
                    $output['pesan'] = "Transaksi lama belum ditutup";
                    $this->hasil($output);
                    return;
                } else {
                    $listParam = [
                        'id_penjamin',
                        'id_penanggung_jawab',
                        'nama_penanggung_jawab',
                        'hubungan_penanggung_jawab',
                        'no_hp_penanggung_jawab',
                    ];
                    if ($this->evalParam($input, $listParam)) {
                        $transaksiBaru = $this->db->simpleQuery("INSERT INTO transaksi("
                            . "id_user, "
                            . "no_rm, "
                            . "id_penanggung_jawab, "
                            . "nama_penanggung_jawab,"
                            . "hubungan_penanggung_jawab, "
                            . "no_hp_penanggung_jawab"
                            . ") VALUES("
                            . "'$input->id_user',"
                            . "'$input->no_rm',"
                            . "'$input->id_penanggung_jawab',"
                            . "'$input->nama_penanggung_jawab',"
                            . "'$input->hubungan_penanggung_jawab',"
                            . "'$input->no_hp_penanggung_jawab')");
                    }
                }
            } else {
                $listParam = [
                    'id_penjamin',
                    'id_penanggung_jawab',
                    'nama_penanggung_jawab',
                    'hubungan_penanggung_jawab',
                    'no_hp_penanggung_jawab',
                ];
                if ($this->evalParam($input, $listParam)) {
                    $transaksiBaru = $this->db->simpleQuery("INSERT INTO transaksi("
                        . "id_user, "
                        . "no_rm, "
                        . "id_penanggung_jawab, "
                        . "nama_penanggung_jawab,"
                        . "hubungan_penanggung_jawab, "
                        . "no_hp_penanggung_jawab"
                        . ") VALUES("
                        . "'$input->id_user',"
                        . "'$input->no_rm',"
                        . "'$input->id_penanggung_jawab',"
                        . "'$input->nama_penanggung_jawab',"
                        . "'$input->hubungan_penanggung_jawab',"
                        . "'$input->no_hp_penanggung_jawab')");
                }
            }
        }
        //$this->db->transStart();
        if ($transaksiBaru) {

            $queryTransaksi = $this->db->query("SELECT * FROM transaksi WHERE no_rm = '$input->no_rm' AND tgl_tutup IS NULL ORDER BY tgl_transaksi DESC");
            $transaksi = $queryTransaksi->getRow();
            $queryPenjamin = "INSERT INTO penjamin_transaksi(id_penjamin,id_transaksi,no_sjp,id_rujukan,cara_masuk) VALUES('$input->id_penjamin', '$transaksi->id_transaksi', '$input->no_sjp', '$input->rujukan', '$input->caraterima') ";
            /*            if ($this->db->simpleQuery($queryPenjamin)) {
                $insertjurnal  ="INSERT INTO ac_jurnal(id_gl,tgl_jurnal,keterangan,id_pegawai)values('$transaksi->id_transaksi',$date,'Pendaftaran pasien','$input->id_user')";
            } else {
                $output['pesan'] = "Gagal menambahkan penjamin";
                $this->hasil($output);
                return;
            }*/


            if ($this->db->simpleQuery($queryPenjamin)) {
                $cekPenjaminPasien  = $this->db->query("SELECT no_rm,id_penjamin,no_kartu FROM penjamin_pasien WHERE no_rm = '$input->no_rm' AND id_penjamin='$input->id_penjamin' ");
                if ($cekPenjaminPasien->getNumRows() == null) {
                    $queryKunjungan     = $this->db->simpleQuery("INSERT INTO penjamin_pasien(no_rm, id_penjamin, no_kartu) VALUES('$input->no_rm','$input->id_penjamin', '$input->noka')");
                }
            } else {
                $this->db->simpleQuery("DELETE FROM transaksi WHERE id_transaksi = '$transaksi->id_transaksi'");
                $output['pesan'] = "Gagal menambahkan penjamin";
                $this->hasil($output);
                return;
            }
        } else if ($transaksi == null) {
            $output['pesan'] = $this->db->error();
            $this->hasil($output);
            return;
        }

        if (isset($input->id_kamar)) {
            $cekinap =  $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_transaksi = '$transaksi->id_transaksi' AND tgl_keluar_nginap IS NULL AND tgl_masuk_nginap is not null");
            if ($cekinap->getNumRows() > 0) {
                $output['status'] = "gagal";
                $output['pesan'] = 'pasien masih menginap';
                $this->hasil($output);
                exit();
            } else {
                $queryKunjungan = $this->db->simpleQuery("INSERT INTO kunjungan(id_transaksi, id_unit,id_kamar,id_pegawai) VALUES('$transaksi->id_transaksi', '$input->id_unit','$input->id_kamar','$input->id_pegawai')");
                $queryPenjamin = $this->db->simpleQuery("UPDATE penjamin_transaksi SET no_sjp ='$input->no_sjp' WHERE id_transaksi='$transaksi->id_transaksi'");
                $queryranap = $this->db->simpleQuery("UPDATE pengantar_rawat_inap SET no_sjp_rajal = '$input->no_sjp',tgl_masuk_nginap = '$input->jam_masuk' WHERE id_transaksi = '$transaksi->id_transaksi'");
            }
        } else {

            $queryKunjungan     = $this->db->simpleQuery("INSERT INTO kunjungan(id_transaksi, id_unit,id_pegawai) VALUES('$transaksi->id_transaksi', '$input->id_unit','$input->id_pegawai')");
        }

        /*insert mr_penyakit*/
        if ($queryKunjungan) {
            if ($input->diagnosa>'') {
                if (isset($input->id_kamar)) {

                    $id_kunjungan = $this->db->query("SELECT * from kunjungan WHERE id_transaksi='$transaksi->id_transaksi' limit 1")->getRow();
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,id_penyakit,id_kunjungan,status_diag,id_transaksi) VALUES('$input->no_rm', '$input->id_unit','$input->diagnosa', '$id_kunjungan->id_kunjungan',0,'$transaksi->id_transaksi') ");
                } else {

                    $id_kunjungan = $this->db->query("SELECT * from kunjungan WHERE id_transaksi='$transaksi->id_transaksi' limit 1")->getRow();
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,id_penyakit,id_kunjungan,status_diag,id_transaksi) VALUES('$input->no_rm', '$input->id_unit','$input->diagnosa','$id_kunjungan->id_kunjungan',0,'$transaksi->id_transaksi') ");
                }
                $output['pesan'] = $this->db->error();
            }
        } else {
            $output['pesan'] = $this->db->error();
        }
        $this->db->transComplete();
        /*cek kunjungan*/
        if ($queryKunjungan) {
            $queryTransaksi =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$transaksi->id_transaksi' AND id_unit = '$input->id_unit' AND tgl_keluar IS NULL ORDER BY id_kunjungan DESC");
            $output['status'] = "sukses";
            $output['pesan']  = 'Berhasil';
            $output['data'] = $queryTransaksi->getRow();
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
        }

        $this->hasil($output);
    }
    public function addKunjunganIrja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_user',
            'no_rm',
            'id_unit',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $transaksiBaru = false;
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            $transaksi   = null;
            $queryCekSep = $this->db->query("SELECT * from penjamin_transaksi WHERE no_sjp='$input->no_sjp' ");
            $queryTransaksi =  $this->db->query("SELECT * FROM transaksi WHERE no_rm = '$input->no_rm' AND tgl_tutup IS NULL ORDER BY tgl_transaksi DESC");
            if ($queryCekSep->getNumRows() > 0) {
                if ($queryTransaksi->getNumRows() > 0) {
                    $output['pesan'] = "Transaksi lama belum ditutup";
                    $this->hasil($output);
                    return;
                } else {
                    $listParam = [
                        'id_penjamin',
                        'id_penanggung_jawab',
                        'nama_penanggung_jawab',
                        'hubungan_penanggung_jawab',
                        'no_hp_penanggung_jawab',
                    ];
                    if ($this->evalParam($input, $listParam)) {
                        $transaksiBaru = $this->db->simpleQuery("INSERT INTO transaksi("
                            . "id_user, "
                            . "no_rm, "
                            . "id_penanggung_jawab, "
                            . "nama_penanggung_jawab,"
                            . "hubungan_penanggung_jawab, "
                            . "no_hp_penanggung_jawab"
                            . ") VALUES("
                            . "'$input->id_user',"
                            . "'$input->no_rm',"
                            . "'$input->id_penanggung_jawab',"
                            . "'$input->nama_penanggung_jawab',"
                            . "'$input->hubungan_penanggung_jawab',"
                            . "'$input->no_hp_penanggung_jawab')");
                    }
                }
            } else {
                $listParam = [
                    'id_penjamin',
                    'id_penanggung_jawab',
                    'nama_penanggung_jawab',
                    'hubungan_penanggung_jawab',
                    'no_hp_penanggung_jawab',
                ];
                if ($this->evalParam($input, $listParam)) {
                    $transaksiBaru = $this->db->simpleQuery("INSERT INTO transaksi("
                        . "id_user, "
                        . "no_rm, "
                        . "id_penanggung_jawab, "
                        . "nama_penanggung_jawab,"
                        . "hubungan_penanggung_jawab, "
                        . "no_hp_penanggung_jawab"
                        . ") VALUES("
                        . "'$input->id_user',"
                        . "'$input->no_rm',"
                        . "'$input->id_penanggung_jawab',"
                        . "'$input->nama_penanggung_jawab',"
                        . "'$input->hubungan_penanggung_jawab',"
                        . "'$input->no_hp_penanggung_jawab')");
                }
            }
        }
        //$this->db->transStart();
        if ($transaksiBaru) {

            $queryTransaksi = $this->db->query("SELECT * FROM transaksi WHERE no_rm = '$input->no_rm' AND tgl_tutup IS NULL ORDER BY tgl_transaksi DESC");
            $transaksi = $queryTransaksi->getRow();
            $queryPenjamin = "INSERT INTO penjamin_transaksi(id_penjamin,id_transaksi,no_sjp,id_rujukan,cara_masuk) VALUES('$input->id_penjamin', '$transaksi->id_transaksi', '$input->no_sjp', '$input->rujukan', '$input->caraterima') ";



            if ($this->db->simpleQuery($queryPenjamin)) {
                $cekPenjaminPasien  = $this->db->query("SELECT no_rm,id_penjamin,no_kartu FROM penjamin_pasien WHERE no_rm = '$input->no_rm' AND id_penjamin='$input->id_penjamin' ");
                if ($cekPenjaminPasien->getNumRows() == null) {
                    $queryKunjungan     = $this->db->simpleQuery("INSERT INTO penjamin_pasien(no_rm, id_penjamin, no_kartu) VALUES('$input->no_rm','$input->id_penjamin', '$input->noka')");
                }
            } else {
                $this->db->simpleQuery("DELETE FROM transaksi WHERE id_transaksi = '$transaksi->id_transaksi'");
                $output['pesan'] = "Gagal menambahkan penjamin";
                $this->hasil($output);
                return;
            }
        } else if ($transaksi == null) {
            $output['pesan'] = $this->db->error();
            $this->hasil($output);
            return;
        }

        if (isset($input->id_kamar)) {
            $cekinap =  $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_transaksi = '$transaksi->id_transaksi' AND tgl_keluar_nginap IS NULL AND tgl_masuk_nginap is not null");
            if ($cekinap->getNumRows() > 0) {
                $output['status'] = "gagal";
                $output['pesan'] = 'pasien masih menginap';
                $this->hasil($output);
                exit();
            } else {
                $queryKunjungan = $this->db->simpleQuery("INSERT INTO kunjungan(id_transaksi, id_unit,id_kamar,id_pegawai) VALUES('$transaksi->id_transaksi', '$input->id_unit','$input->id_kamar','$input->id_pegawai')");
                $queryPenjamin = $this->db->simpleQuery("UPDATE penjamin_transaksi SET no_sjp ='$input->no_sjp' WHERE id_transaksi='$transaksi->id_transaksi'");
                $queryranap = $this->db->simpleQuery("UPDATE pengantar_rawat_inap SET no_sjp_rajal = '$input->no_sjp',tgl_masuk_nginap = '$input->jam_masuk' WHERE id_transaksi = '$transaksi->id_transaksi'");
            }
        } else {

            $queryKunjungan     = $this->db->simpleQuery("INSERT INTO kunjungan(id_transaksi, id_unit,id_pegawai) VALUES('$transaksi->id_transaksi', '$input->id_unit','$input->id_pegawai')");
        }

        /*insert mr_penyakit*/
        if ($queryKunjungan) {
            if ($input->diagnosa>'') {
                if (isset($input->id_kamar)) {
                    $id_kunjungan = $this->db->query("SELECT * from kunjungan WHERE id_transaksi='$transaksi->id_transaksi' limit 1")->getRow();
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,id_penyakit,id_kunjungan,status_diag,id_transaksi) VALUES('$input->no_rm', '$input->id_unit','$input->diagnosa', '$id_kunjungan->id_kunjungan',0,'$transaksi->id_transaksi') ");
                } else {
                    $id_kunjungan = $this->db->query("SELECT * from kunjungan WHERE id_transaksi='$transaksi->id_transaksi' limit 1")->getRow();
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,id_penyakit,id_kunjungan,status_diag,id_transaksi) VALUES('$input->no_rm', '$input->id_unit','$input->diagnosa','$id_kunjungan->id_kunjungan',0,'$transaksi->id_transaksi') ");
                }
                $output['pesan'] = $this->db->error();
            }
        } else {
            $output['pesan'] = $this->db->error();
        }
        $this->db->transComplete();
        /*cek kunjungan*/
        if ($queryKunjungan) {
            $queryTransaksi =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$transaksi->id_transaksi' AND id_unit = '$input->id_unit' AND tgl_keluar IS NULL ORDER BY id_kunjungan DESC");
            $output['status'] = "sukses";
            $output['pesan']  = 'Berhasil';
        } else {
            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
        }

        $this->hasil($output);
    }
    public function tambahalergi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_user',
            'no_rm',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $alergi = false;
        if ($this->evalParam($input, $listParam)) {
            $alergi = $this->db->simpleQuery("INSERT INTO alergi("
                . "no_rm, "
                . "alergi, "
                . "id_pegawai"
                . ") VALUES("
                . "'$input->no_rm',"
                . "'$input->alergi',"
                . "'$input->id_user')");
        }
        if ($alergi) {
            $output['status'] = "sukses";
            $output['pesan'] = "Berhasil";
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }

    public function addmypenyakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_kunjungan',
            'no_rm',
        ];
        $output = array();
        $tgl_kunjungan = date('Y-m-d');
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $alergi = false;
        if ($this->evalParam($input, $listParam)) {
            $alergi = $this->db->simpleQuery("INSERT INTO mr_penyakit("
                . "no_rm, "
                . "id_unit, "
                . "tgl_kunjungan, "
                . "id_penyakit,"
                . "id_kunjungan,"
                . "status_diag,"
                . "kasus"
                . ") VALUES("
                . "'$input->no_rm',"
                . "'$input->id_unit',"
                . "'$tgl_kunjungan',"
                . "'$input->icd',"
                . "'$input->id_kunjungan',"
                . "'$input->status_diag',"
                . "'false')");
        }
        if ($alergi) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error();
        }
        echo json_encode($output);
    }

    public function addKunjunganrwi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [
            'id_user',
            'no_rm',
            'id_unit',
        ];
        $output = array();
        $output['status'] = "gagal";
        $output['pesan'] = "";
        $transaksiBaru = false;
        if ($this->evalParam($input, $listParam)) {
            $this->db->transStart();
            // echo"$input->no_rm";
            // exit();
            // echo"x".$input->id_penjamin."";
            //     exit();
            // echo"$input->diagnosa";
            // exit();
            $transaksi = null;
            $jam = $input->tgl_masuk . " " . $input->jam_masuk;
            $queryTransaksi =  $this->db->query("SELECT
        * 
                FROM
                transaksi 
       --  join kunjungan using(id_transaksi)
       WHERE
       no_rm = '$input->no_rm' 
        -- AND tgl_tutup IS NULL 
        -- AND id_kamar is not null
        ");
            if ($queryTransaksi->getNumRows() > 0) {
                $transaksi = $queryTransaksi->getRow();
                $output['status'] = "gagal";
                $output['pesan'] = "Transaksi masih terbuka";
                $this->hasil($output);
                return;

                // exit();
            } else {
                $listParam = [
                    'id_penjamin',
                    'no_sjp',
                    'id_penanggung_jawab',
                    'nama_penanggung_jawab',
                    'hubungan_penanggung_jawab',
                    'no_hp_penanggung_jawab',
                ];
                if ($this->evalParam($input, $listParam)) {
                    $transaksiBaru = $this->db->simpleQuery("INSERT INTO transaksi("
                        . "id_user, "
                        . "no_rm, "
                        . "id_penanggung_jawab, "
                        . "nama_penanggung_jawab,"
                        . "hubungan_penanggung_jawab, "
                        . "no_hp_penanggung_jawab"
                        . ") VALUES("
                        . "'$input->id_user',"
                        . "'$input->no_rm',"
                        . "'$input->id_penanggung_jawab',"
                        . "'$input->nama_penanggung_jawab',"
                        . "'$input->hubungan_penanggung_jawab',"
                        . "'$input->no_hp_penanggung_jawab')");
                }
            }
        }
        if ($transaksiBaru) {
            $queryTransaksi = $this->db->query("SELECT * FROM transaksi WHERE no_rm = '$input->no_rm' AND tgl_tutup IS NULL ORDER BY tgl_transaksi DESC");
            $transaksi = $queryTransaksi->getRow();
            if ($input->rujukan == '') {
                $queryPenjamin = "INSERT INTO penjamin_transaksi(id_penjamin,id_transaksi,no_sjp,cara_masuk) VALUES('$input->id_penjamin', '$transaksi->id_transaksi', '$input->no_sjp' ,'$input->caraterima')";
            } else {
                $queryPenjamin = "INSERT INTO penjamin_transaksi(id_penjamin,id_transaksi,no_sjp,id_rujukan,cara_masuk) VALUES('$input->id_penjamin', '$transaksi->id_transaksi', '$input->no_sjp','$input->rujukan', '$input->caraterima')";
            }
            // echo"$queryPenjamin";
            if ($this->db->simpleQuery($queryPenjamin)) {
            } else {
                $this->db->simpleQuery("DELETE FROM transaksi WHERE id_transaksi = '$transaksi->id_transaksi'");
                $output['pesan'] = "Gagal menambahkan penjamin";
                $this->hasil($output);
                return;
            }
        } else if ($transaksi == null) {
            $output['pesan'] = $this->db->error();
            $this->hasil($output);
            return;
        }

        if (isset($input->id_kamar)) {
            $cekinap =  $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_transaksi = '$transaksi->id_transaksi' AND tgl_keluar_nginap IS NULL AND tgl_masuk_nginap is not null");
            if ($cekinap->getNumRows() > 0) {
                $output['status'] = "gagal";
                $output['pesan'] = 'pasien masih menginap';
                $this->hasil($output);
                return;
            } else {
                // echo"hai";
                // exit();
                // echo"$tglmasuk";
                // exit();
                $queryKunjungan = $this->db->simpleQuery("INSERT INTO kunjungan(id_transaksi, id_unit,id_kamar,tgl_masuk,jam_masuk,id_pegawai,status_kunjungan,awal_inap) VALUES('$transaksi->id_transaksi', '$input->id_unit','$input->id_kamar','$input->tgl_masuk','$jam','$input->id_pegawai','3','t')");

                $queryPenjamin = $this->db->simpleQuery("update penjamin_transaksi set no_sjp='$input->no_sjp' where id_transaksi='$transaksi->id_transaksi'");

                $queryranap = $this->db->simpleQuery("UPDATE pengantar_rawat_inap SET no_sjp_rajal = '$input->no_sjp_rajal', tgl_masuk_nginap = '$jam'WHERE id_transaksi = '$transaksi->id_transaksi'");

                $cekPenjaminPasien  = $this->db->query("SELECT no_rm,id_penjamin,no_kartu FROM penjamin_pasien WHERE no_rm = '$input->no_rm' AND id_penjamin='$input->id_penjamin' ");
                // $a = "INSERT INTO penjamin_pasien(no_rm, id_penjamin, no_kartu) VALUES('$input->no_rm','$input->id_penjamin', '$input->noka')";
                // $output['pesan'] = $a;
                // $this->hasil($output);
                // return;
                // echo"$input->noka";
                // exit();
                if ($cekPenjaminPasien->getNumRows() == null) {

                    $querypenjamin_pasien  = $this->db->simpleQuery("INSERT INTO penjamin_pasien(no_rm, id_penjamin, no_kartu) VALUES('$input->no_rm','$input->id_penjamin', '$input->noka')");
                }
                // echo"hai";
                // exit();
                $id_kunjungan = $this->db->query("SELECT * from kunjungan WHERE id_transaksi='$transaksi->id_transaksi' limit 1")->getRow();
                $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,id_penyakit,id_transaksi,status_diag,id_kunjungan) VALUES('$input->no_rm', '$input->id_unit','$input->diagnosa', '$transaksi->id_transaksi',0,'$id_kunjungan->id_kunjungan') ");
                $updatekamar = $this->db->simpleQuery("update kamar set digunakan=digunakan+1 where id_kamar='$input->id_kamar'");
            }
        } else {

            // $queryKunjungan = $this->db->simpleQuery("INSERT INTO kunjungan(id_transaksi, id_unit) VALUES('$transaksi->id_transaksi', '$input->id_unit')");
        }
        /*insert mr_penyakit*/
        if ($queryKunjungan) {
            if ($input->diagnosa>'') {
                if (isset($input->id_kamar)) {
                    $penyakit = $this->db->simpleQuery("INSERT INTO mr_penyakit(no_rm,id_unit,tgl_kunjungan,id_penyakit,id_kunjungan,status_diag) VALUES('$input->no_rm', '$input->id_unit','$jam','$input->diagnosa', '$transaksi->id_transaksi',0) ");
                } 
                $output['pesan'] = $this->db->error();
            }
        } else {
            $output['pesan'] = $this->db->error();
        }
        $this->db->transComplete();
        /*cek kunjungan*/
        if ($queryKunjungan) {
            $queryTransaksi =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$transaksi->id_transaksi' AND id_unit = '$input->id_unit' AND tgl_keluar IS NULL ORDER BY id_kunjungan DESC");
            $output['status'] = "sukses";
            $output['pesan'] = 'Berhasil Simpan Kunjungan';
            //$output['data'] = $queryTransaksi->getRow();
        } else {
            $output['pesan'] = $this->db->error();
        }

        $this->hasil($output);
    }



    public function historikunjunganirja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * FROM kunjungan k 
        inner join transaksi t USING (id_transaksi) 
        INNER JOIN unit u on 
        k.id_unit=u.id_unit 
        INNER JOIN pegawai pe on pe.id_pegawai=K.id_pegawai
        INNER JOIN pasien p USING (no_rm)WHERE t.no_rm='" . $input->rm . "'";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['history'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }
    public function carakeluarpasienirja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "select kd_rujukan,rujukan from rujukan where cara_penerimaan='" . $input->res . "'";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['data'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }
    public function datamricd9irja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $listParam = [ 'kunjungan' ];
        if ($this->evalParam($input, $listParam)) {
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";

            $query = "SELECT    kd_icd9,deskripsi,tgl_tindakan
            from mr_tindakan inner join icd_9 USING(kd_icd9) where id_kunjungan='$input->kunjungan'";

            if ($this->db->simpleQuery($query)) { //true
                $queryx = $this->db->query($query)->getResult();                
                if (!empty($queryx)) { //JIKA TIDAK KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "200";
                    $output['pesan']    = "";
                    $output['data']     = $queryx;
                } else { // JIKA KOSONG
                    $output['status']   = "sukses";
                    $output['code']     = "201";
                    $output['pesan']    = "";                   
                }
            } else {
                $output['code']     = "01";
                $output['status']   = 'gagal cari, hubungi admin';
                $output['pesan']    = $this->db->error()['message'];
            }
        }
        echo json_encode($output);
    }
    public function historipenyakit()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT kd_penyakit,penyakit,tgl_masuk,nama_unit FROM mr_penyakit  join penyakit  
        using(kd_penyakit) join unit using(kd_unit) where kd_pasien='" . $input->no_rm . "' ";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['history'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan']  = $this->db->error()['message'];
        }
        echo json_encode($output);
    }
    public function noka()
    {
        $input = json_decode(file_get_contents('php://input'));
        $data=$this->db->query("SELECT no_kartu from penjamin_pasien where no_rm='$input->rm' and id_penjamin='$input->id' limit 1")->getRow();
        if ($data > '' ) {
            $output['status']  = "sukses";
            $output['pesan']   = "";
            $output['data']    = $data->no_kartu;
            $output['code']    = 200;
        } else {
            $output['status'] = "sukses";
            $output['pesan']  = "";
            $output['code']   = 201;
        }
        
        echo json_encode($output);
    }
    public function historipenyakitkeluarga()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT penyakit,id_penyakit FROM mr_penyakit inner join penyakit using(id_penyakit) where no_rm='" . $input->no_rm . "' ";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['history'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }
    public function historialergi()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * from alergi_pasien where kd_pasien='$input->no_rm' ";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['history'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }
    public function historipenyakitfam()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT * from mr_penyakit_fam inner join penyakit using(id_penyakit) where no_rm='$input->no_rm' ";
        if ($this->db->simpleQuery($query)) {
            $output['status'] = "sukses";
            $output['pesan'] = "";
            $output['history'] = $this->db->query($query)->getResult();
        } else {

            $output['status'] = "gagal";
            $output['pesan'] = $this->db->error()['message'];
        }
        echo json_encode($output);
    }

    public function penyakitsekarangirja()
    {
        $input = json_decode(file_get_contents('php://input'));
        $query = "SELECT DISTINCT(x.penyakit)from(
            SELECT penyakit,tgl_kunjungan FROM mr_penyakit  join penyakit  
            using(id_penyakit) where no_rm='" . $input->kode . "' and tgl_kunjungan  in (CURRENT_DATE) order BY tgl_kunjungan desc limit 5)x";
            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['history'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }

        public function icd()
        {
            $input = json_decode(file_get_contents('php://input'));
            $plus = '/ +/i';

            if (strlen($input->id) > 5) {
                $query = "SELECT * from penyakit where upper(penyakit) like upper('" . $input->id . "%') limit 6";
            } else {
                $query = "SELECT * from penyakit where id_penyakit like upper('" . $input->id . "%') limit 6";
            }

            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['icd'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }
        public function icd9()
        {
            $input = json_decode(file_get_contents('php://input'));
            $plus = '/ +/i';

            if (strlen($input->id) > 3) {
                $query = "SELECT * from icd_9 where upper(deskripsi) like upper('" . $input->id . "%') limit 6";
            } else {
                $query = "SELECT * from icd_9 where kd_icd9 like upper('" . $input->id . "%') limit 6";
            }

            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['icd'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }
        public function KomunikasiKeperawatan()
        {
            $input = json_decode(file_get_contents('php://input'));
            $plus = '/ +/i';

            if (strlen($input->id) > 3) {
                $query = "SELECT * from diagnosa_perawat where upper(uraian)  like upper('" . $input->id . "%') limit 6";
            } else {
                $query = "SELECT * from produk_pelayanan_keperawatan where upper(kode_produk) like upper('" . $input->id . "%') limit 6";
            }

            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['kode'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }

        public function detaildiagnosaperawat()
        {
            $input = json_decode(file_get_contents('php://input'));
            $query = "SELECT * from intervensi_import where kd_diagnosa_perawat ='$input->id' ORDER BY kd_produk asc ";
            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['kode'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }

        public function diagnosaperawat()
        {
            $input = json_decode(file_get_contents('php://input'));
            $plus = '/ +/i';

            $query = "SELECT * from diagnosa_perawat";

            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['kode'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }

        public function IntervensiKeperawatan()
        {
            $input = json_decode(file_get_contents('php://input'));
            $plus = '/ +/i';

            if (strlen($input->id) > 3) {
                $query = "SELECT * from intervensi_keperawatan where upper(uraian)  like upper('" . $input->id . "%') limit 6";
            } else {
                $query = "SELECT * from intervensi_keperawatan where upper(kode_produk) like upper('" . $input->id . "%') limit 6";
            }

            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['kode'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }
        public function caseicd()
        {
            $input = json_decode(file_get_contents('php://input'));
            $kode = strlen($input->id);
            if ($kode < 3) {
                $query = "SELECT * from penyakit where id_penyakit like upper('" . $input->id . "%') limit 5";
            } else {
                $query = "SELECT * from penyakit where penyakit like upper('%" . $input->id . "%') limit 5 ";
            }

            if ($this->db->simpleQuery($query)) {
                $output['status'] = "sukses";
                $output['pesan'] = "";
                $output['icd'] = $this->db->query($query)->getResult();
            } else {

                $output['status'] = "gagal";
                $output['pesan'] = $this->db->error()['message'];
            }
            echo json_encode($output);
        }

        public function tandaVital()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'id_kunjungan'
            ];
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
            if ($this->evalParam($input, $listParam)) {

                $listProduk = $this->db->query("SELECT * from tanda_vital where id_kunjungan ='$input->id_kunjungan'");

                if ($listProduk->getNumRows() > 0) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Produk ditemukan";
                    $output['data']     = $listProduk->getRow();
                } else {
                    $output['pesan'] = "Produk tidak ditemukan";
                }
            }
            $this->hasil($output);
        }

        public function getProduk()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'id_unit', 'id_penjamin'
            ];
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
        // echo"$input->id_penjamin";
        // exit();
            if ($this->evalParam($input, $listParam)) {
            // $listProduk = $this->db->query("SELECT P
            // .id_produk,
            // P.kd_produk,
            // P.nama_produk ,
            // tar.harga,
            // tar.id_tarif,
            // unit.nama_unit
            // FROM
            // produk P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk 
            // join tarif tar on tar.id_produk=P.id_produk
            // left JOIN unit on unit.id_unit=pu.id_unit
            // WHERE
            // pu.id_unit = '$input->id_unit'
            // and tar.id_penjamin='$input->id_penjamin'
            // and tar.tgl_selesai is null
            // and tar.tgl_berlaku <= now()
            // ");
                $listProduk = $this->db->query("SELECT
                 tar.id_unit,
                 * 
                 FROM
                 tarif tar
                 JOIN produk prod ON tar.id_produk = prod.id_produk
                 JOIN unit using(id_unit)
                 WHERE
                 unit.id_unit = '$input->id_unit'
                 and tar.id_penjamin='$input->id_penjamin'
                 and tar.tgl_selesai is null
                 and tar.tgl_berlaku <= now()
                 ");

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

        public function getProdukby()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'id_unit', 'id_penjamin'
            ];
            $output = array();
            $output['status']   = "gagal";
            $output['pesan']    = "";
        // echo"$input->id_penjamin";
        // exit();
            if ($this->evalParam($input, $listParam)) {
            // $listProduk = $this->db->query("SELECT p.id_produk, p.kd_produk, p.nama_produk FROM produk p INNER JOIN produk_unit pu ON p.id_produk = pu.id_produk WHERE pu.id_unit = '$input->id_unit'");
                $listProduk = $this->db->query("SELECT P
                    .id_produk,
                    P.kd_produk,
                    P.nama_produk ,
                    tar.harga,
                    tar.id_tarif
                    FROM
                    produk P INNER JOIN produk_unit pu ON P.id_produk = pu.id_produk 
                    join tarif tar on tar.id_produk=P.id_produk
                    WHERE
                    pu.id_unit = '$input->id_unit'
                    and tar.id_penjamin='$input->id_penjamin'
                    and tar.tgl_selesai is null
                    and tar.tgl_berlaku < CURRENT_DATE
                    and P.nama_produk like '%$input->cari%'
                    ");

                if ($listProduk->getNumRows() > 0) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Produk ditemukan";
                    $output['data']     = $listProduk->getResult();
                } else {
                    $output['pesan'] = $this->db->error();
                }
            }
            $this->hasil($output);
        }

        // public function postingcarakeluar()
        // {
        //     $input = json_decode(file_get_contents('php://input'));
        //     $listParam = [
        //         'idcarakeluar',
        //         'keterangankeluar',
        //         'tglkeluar',
        //     ];
        //     $output = array();
        //     $output['status'] = "gagal";
        //     $output['pesan'] = "";
        //     $transaksiBaru = false;

        //     if ($this->evalParam($input, $listParam)) {
        //         date_default_timezone_set("Asia/Jakarta");
        //         $time = date('H:i:s');
        //         $jam = $input->tglkunj . " " . $time;
        //     //$query = "INSERT INTO detail_tindakan(id_kunjungan, id_produk) VALUE('$input->id_kunjungan', '$produk->id_produk')";
        //         $query = "UPDATE kunjungan SET tgl_keluar ='$input->tglkeluar',id_cara_keluar='$input->idcarakeluar',jam_keluar='$jam',posting='t' WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'";
        //         if ($this->db->simpleQuery($query)) {
        //         // echo"hai";
        //         // exit();
        //             if (!empty($input->idkamar)) {
        //                 $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$input->idkamar'");
        //             }

        //             if ($input->idcarakeluar == '3' || $input->idcarakeluar == 3) {
        //                 $cek_pengantarranap = $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_kunjungan = '$input->idkunjungan' and id_transaksi = '$input->idtransaksi'")->getNumRows();
        //                 if ($cek_pengantarranap > 0) {
        //                     $query = $this->db->simpleQuery("UPDATE pengantar_rawat_inap 
        //                         SET keterangan ='$input->keterangankeluar',
        //                         keluhan = '$input->keluhan',
        //                         rikjang = '$input->rikjang',
        //                         diagnosa = '$input->diagnosatext',
        //                         tindakan_pembedahan = '$input->tindakanpembedahan',
        //                         terapi = '$input->terapi',
        //                         dokterpengirim = '$input->dokterpengirim',
        //                         dokterdpjp = '$input->dokterdpjpIGD',
        //                         status_emergency = '$input->kodeemergencyIGD',
        //                         ruangan = '$input->permintaanruangIGD',
        //                         intruksi_dpjp = '$input->intruksi'
        //                         WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'");
        //                 } else {
        //                     $no_sjp_rajal = $this->db->query("SELECT * FROM penjamin_transaksi WHERE id_transaksi = '" . $input->idtransaksi . "'")->getRow()->no_sjp;
        //                 // echo"ini".$no_sjp_rajal."";
        //                 // exit;
        //                     if (empty($no_sjp_rajal) || $no_sjp_rajal == '') {
        //                         $querypri = "INSERT INTO pengantar_rawat_inap(id_kunjungan,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan,keluhan,rikjang,diagnosa,tindakan_pembedahan,terapi,dokterpengirim,dokterdpjp,status_emergency,ruangan,intruksi_dpjp,tgl_buat) 
        //                         VALUES('$input->idkunjungan', '$input->idtransaksi',null,null,'$input->keterangankeluar','$input->keluhan','$input->rikjang','$input->diagnosatext','$input->tindakanpembedahan','$input->terapi','$input->dokterpengirim','$input->dokterdpjpIGD','$input->kodeemergencyIGD','$input->permintaanruangIGD','$input->intruksi','$input->tglkeluar')";
        //                         $this->db->simpleQuery($querypri);
        //                         $querydok="INSERT INTO dokumen_pasien values ('$input->idtransaksi','26')";
        //                         $this->db->simpleQuery($querydok);
        //                     } else {
        //                         $querypri = "INSERT INTO pengantar_rawat_inap(id_kunjungan,no_sjp_rajal,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan,keluhan,rikjang,diagnosa,tindakan_pembedahan,terapi,dokterpengirim,dokterdpjp,status_emergency,ruangan,intruksi_dpjp,tgl_buat) 
        //                         VALUES('$input->idkunjungan', '$no_sjp_rajal', '$input->idtransaksi',null,null,'$input->keterangankeluar','$input->keluhan','$input->rikjang','$input->diagnosatext','$input->tindakanpembedahan','$input->terapi','$input->dokterpengirim','$input->dokterdpjpIGD','$input->kodeemergencyIGD','$input->permintaanruangIGD','$input->intruksi','$input->tglkeluar')";
        //                         $this->db->simpleQuery($querypri);
        //                         $querydok="INSERT INTO dokumen_pasien values ('$input->idtransaksi','26')";
        //                         $this->db->simpleQuery($querydok);
        //                     // echo"b".$querypri."";
        //                     }
        //                 }
        //             }

        //             $output['status']   = "sukses";
        //             $output['pesan']    = "Sukses posting";
        //         } else {
        //             $output['status']   = "gagal";
        //             $output['pesan']    = "Gagal mposting";
        //         }
        //     }

        //     $this->hasil($output);
        // }
    //     public function postingcarakeluar()
    // {
    //     $input = json_decode(file_get_contents('php://input'));
    //     $listParam = [
    //         'idcarakeluar',
    //         'keterangankeluar',
    //         'tglkeluar',
    //     ];
    //     $output = array();
    //     $output['status'] = "gagal";
    //     $output['pesan'] = "";
    //     $transaksiBaru = false;

    //     if ($this->evalParam($input, $listParam)) {
    //         $this->db->transStart();
    //         date_default_timezone_set("Asia/Jakarta");
    //         $time = date('H:i:s');
    //         $jam = $input->tglkunj . " " . $time;
    //     //$query = "INSERT INTO detail_tindakan(id_kunjungan, id_produk) VALUE('$input->id_kunjungan', '$produk->id_produk')";
    //         $query = "UPDATE kunjungan SET tgl_keluar ='$input->tglkeluar',id_cara_keluar='$input->idcarakeluar',jam_keluar='$jam',posting='t' WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'";
    //         if ($this->db->simpleQuery($query)) {
    //         // echo"hai";
    //         // exit();
    //             if (!empty($input->idkamar)) {
    //                 $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$input->idkamar'");
    //             }

    //             if ($input->idcarakeluar == '3' || $input->idcarakeluar == 3) {
    //                 $cek_pengantarranap = $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_kunjungan = '$input->idkunjungan' and id_transaksi = '$input->idtransaksi'")->getNumRows();
    //                 if ($cek_pengantarranap > 0) {
    //                     $query = $this->db->simpleQuery("UPDATE pengantar_rawat_inap 
    //                         SET keterangan ='$input->keterangankeluar',
    //                         keluhan = '$input->keluhan',
    //                         rikjang = '$input->rikjang',
    //                         diagnosa = '$input->diagnosatext',
    //                         tindakan_pembedahan = '$input->tindakanpembedahan',
    //                         terapi = '$input->terapi',
    //                         dokterpengirim = '$input->dokterpengirim',
    //                         dokterdpjp = '$input->dokterdpjpIGD',
    //                         status_emergency = '$input->kodeemergencyIGD',
    //                         ruangan = '$input->permintaanruangIGD',
    //                         intruksi_dpjp = '$input->intruksi'
    //                         WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'");
    //                 } else {
    //                     $no_sjp_rajal = $this->db->query("SELECT * FROM penjamin_transaksi WHERE id_transaksi = '" . $input->idtransaksi . "'")->getRow()->no_sjp;
    //                 // echo"ini".$no_sjp_rajal."";
    //                 // exit;
    //                     if (empty($no_sjp_rajal) || $no_sjp_rajal == '') {
    //                         $querypri = "INSERT INTO pengantar_rawat_inap(id_kunjungan,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan,keluhan,rikjang,diagnosa,tindakan_pembedahan,terapi,dokterpengirim,dokterdpjp,status_emergency,ruangan,intruksi_dpjp,tgl_buat) 
    //                         VALUES('$input->idkunjungan', '$input->idtransaksi',null,null,'$input->keterangankeluar','$input->keluhan','$input->rikjang','$input->diagnosatext','$input->tindakanpembedahan','$input->terapi','$input->dokterpengirim','$input->dokterdpjpIGD','$input->kodeemergencyIGD','$input->permintaanruangIGD','$input->intruksi','$input->tglkeluar')";
    //                         $this->db->simpleQuery($querypri);
    //                         $querydok="INSERT INTO dokumen_pasien values ('$input->idtransaksi','26')";
    //                         $this->db->simpleQuery($querydok);
    //                     } else {
    //                         $querypri = "INSERT INTO pengantar_rawat_inap(id_kunjungan,no_sjp_rajal,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan,keluhan,rikjang,diagnosa,tindakan_pembedahan,terapi,dokterpengirim,dokterdpjp,status_emergency,ruangan,intruksi_dpjp,tgl_buat) 
    //                         VALUES('$input->idkunjungan', '$no_sjp_rajal', '$input->idtransaksi',null,null,'$input->keterangankeluar','$input->keluhan','$input->rikjang','$input->diagnosatext','$input->tindakanpembedahan','$input->terapi','$input->dokterpengirim','$input->dokterdpjpIGD','$input->kodeemergencyIGD','$input->permintaanruangIGD','$input->intruksi','$input->tglkeluar')";
    //                         $this->db->simpleQuery($querypri);
    //                         $querydok="INSERT INTO dokumen_pasien values ('$input->idtransaksi','26')";
    //                         $this->db->simpleQuery($querydok);
    //                     // echo"b".$querypri."";
    //                     }
    //                 }
    //             }

    //             $output['status']   = "sukses";
    //             $output['pesan']    = "Sukses posting";
    //         } else {
    //             $output['status']   = "gagal";
    //             $output['pesan']    = "Gagal mposting";
    //         }
    //             $this->db->transComplete();
    //             if ($this->db->transStatus()) {
    //                 $output['status']   = "sukses";
    //                 $output['pesan']    = "Sukses posting Pasien";
    //             } else {
    //                 $output['status']   = "gagal";
    //                 $output['pesan']    = $this->db->transStatus();
    //             }
    //     }

    //     $this->hasil($output);
    // }
        public function postingcarakeluar()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'idcarakeluar',
                'keterangankeluar',
                'tglkeluar',
            ];
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $transaksiBaru = false;

            if ($this->evalParam($input, $listParam)) {
                $this->db->transStart();
                date_default_timezone_set("Asia/Jakarta");
                $time = date('H:i:s');
                $jam = $input->tglkunj . " " . $time;
        //$query = "INSERT INTO detail_tindakan(id_kunjungan, id_produk) VALUE('$input->id_kunjungan', '$produk->id_produk')";
                $query = "UPDATE kunjungan SET tgl_keluar ='$input->tglkeluar',id_cara_keluar='$input->idcarakeluar',jam_keluar='$jam',posting='t' WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'";
                if ($this->db->simpleQuery($query)) {
            // echo"hai";
            // exit();
                    if (!empty($input->idkamar)) {
                        $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$input->idkamar'");
                    }

                    if ($input->idcarakeluar == '3' || $input->idcarakeluar == 3) {
                        $cek_pengantarranap = $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_kunjungan = '$input->idkunjungan' and id_transaksi = '$input->idtransaksi'")->getNumRows();
                        if ($cek_pengantarranap > 0) {
                            $query = $this->db->simpleQuery("UPDATE pengantar_rawat_inap 
                                SET keterangan ='$input->keterangankeluar',
                                keluhan = '$input->keluhan',
                                rikjang = '$input->rikjang',
                                diagnosa = '$input->diagnosatext',
                                tindakan_pembedahan = '$input->tindakanpembedahan',
                                terapi = '$input->terapi',
                                dokterpengirim = '$input->dokterpengirim',
                                dokterdpjp = '$input->dokterdpjpIGD',
                                status_emergency = '$input->kodeemergencyIGD',
                                ruangan = '$input->permintaanruangIGD',
                                intruksi_dpjp = '$input->intruksi'
                                WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'");
                        } else {
                            $no_sjp_rajal = $this->db->query("SELECT * FROM penjamin_transaksi WHERE id_transaksi = '" . $input->idtransaksi . "'")->getRow()->no_sjp;
                    // echo"ini".$no_sjp_rajal."";
                    // exit;
                            if (empty($no_sjp_rajal) || $no_sjp_rajal == '') {
                                $querypri = "INSERT INTO pengantar_rawat_inap(id_kunjungan,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan,keluhan,rikjang,diagnosa,tindakan_pembedahan,terapi,dokterpengirim,dokterdpjp,status_emergency,ruangan,intruksi_dpjp,tgl_buat) 
                                VALUES('$input->idkunjungan', '$input->idtransaksi',null,null,'$input->keterangankeluar','$input->keluhan','$input->rikjang','$input->diagnosatext','$input->tindakanpembedahan','$input->terapi','$input->dokterpengirim','$input->dokterdpjpIGD','$input->kodeemergencyIGD','$input->permintaanruangIGD','$input->intruksi','$input->tglkeluar')";
                                $this->db->simpleQuery($querypri);
                                $querydok="INSERT INTO dokumen_pasien values ('$input->idtransaksi','26')";
                                $this->db->simpleQuery($querydok);
                            } else {
                                $querypri = "INSERT INTO pengantar_rawat_inap(id_kunjungan,no_sjp_rajal,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan,keluhan,rikjang,diagnosa,tindakan_pembedahan,terapi,dokterpengirim,dokterdpjp,status_emergency,ruangan,intruksi_dpjp,tgl_buat) 
                                VALUES('$input->idkunjungan', '$no_sjp_rajal', '$input->idtransaksi',null,null,'$input->keterangankeluar','$input->keluhan','$input->rikjang','$input->diagnosatext','$input->tindakanpembedahan','$input->terapi','$input->dokterpengirim','$input->dokterdpjpIGD','$input->kodeemergencyIGD','$input->permintaanruangIGD','$input->intruksi','$input->tglkeluar')";
                                $this->db->simpleQuery($querypri);
                                $querydok="INSERT INTO dokumen_pasien values ('$input->idtransaksi','26')";
                                $this->db->simpleQuery($querydok);
                        // echo"b".$querypri."";
                            }
                        }
                    }

                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses posting";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal mposting";
                }
                $this->db->transComplete();
                if ($this->db->transStatus()) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses posting Pasien";                    
                    if (!empty($input->idkamar) && $input->RWIpenjamin='BPJS' && !empty($input->sep)  ){ 
                        if($input->pulangKLL=='0' || $input->pulangKLL==0){
                            //bukan kecelakaan
                            if($input->statuspulangbpjs=='4' || $input->statuspulangbpjs==4){
                            //pulang mati

                            }
                            else{
                                //pulang hidup

                                $nosep = $input->sep;
                                // "statusPulang":"{1:Atas Persetujuan Dokter, 3:Atas Permintaan Sendiri, 4:Meninggal, 5:Lain-lain}",
                                
                                $statuspulang = $input->statuspulangbpjs;
                                
                                $user      = 'simrsbridging';
                                $tglplg = $input->tglkeluar;
                                
                                $nolpmanualKLL='0';
                                
                                $tStamp     = $this->tStamp();
                                $method     = 'PUT';
                                $param      = $this->jsonupdatetglpulangHidup($nosep, $statuspulang, $tglplg, $nolpmanualKLL, $user);
                                $request    = 'SEP/2.0/updtglplg';
                                $string     = $this->url($request, $param, $method, $tStamp);

                            }
                        }
                        else{
                            $nolpmanualKLL=$input->nomorKLLPulang;
                            if($input->statuspulangbpjs=='4' || $input->statuspulangbpjs==4){
                                //pulang mati

                            }
                            else{
                                    //pulang hidup
                                $nosep = $input->sep;
                                    // "statusPulang":"{1:Atas Persetujuan Dokter, 3:Atas Permintaan Sendiri, 4:Meninggal, 5:Lain-lain}",
                                $statuspulang = $input->statuspulangbpjs;
                                $user      = 'simrsbridging';
                                $tglplg = $input->tglkeluar;    
                                $tStamp     = $this->tStamp();
                                $method     = 'PUT';
                                $param      = $this->jsonupdatetglpulangHidup($nosep, $statuspulang, $tglplg, $nolpmanualKLL, $user);
                                $request    = 'SEP/2.0/updtglplg';
                                $string     = $this->url($request, $param, $method, $tStamp);
                            }
                        }



                        //akhir cek sep


                        if ($string->metaData->code != 200) {
                        //$hasil = array();
                            $output['status'] = 'sukses';
                            $output['pesan']    = "bridging bpjs terkendala jaringan, silahkan pulangkan diaplikasi vklaim";
                        //$this->hasil($output);


                        //$hasil['pesan'] = $string->metaData->message;
                        // echo json_encode($hasil);
                        // return;
                        }
                        else{
                       // $hasil = array();
                            $output['status'] = 'sukses';
                            $output['pesan']    = "berhasil posting dan Sukses bridging bpjs";
                       //$this->hasil($output);

                        //$hasil['pesan'] = $string->metaData->message;
                        // echo json_encode($hasil);
                        // return;
                        }
                    }

                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = $this->db->transStatus();
                }
            }

            $this->hasil($output);
        }
        public function dokter_unit()
        {
            $input = json_decode(file_get_contents('php://input'));
            $dok =  $this->db->query("SELECT * FROM dokter_klinik dk join pegawai peg on peg.id_pegawai=dk.id_pegawai::int where dk.id_unit='$input->id' ");
            $output['status'] = 'sukses';
            $output['data'] = $dok->getResult();

            echo json_encode($output);
        }
        public function konsulrajal()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'rwjkonsulidtrans',
                'rwjkonsulunit',
                'rwjkonsuldokter',
            ];
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $transaksiBaru = false;

            if ($this->evalParam($input, $listParam)) {
                date_default_timezone_set("Asia/Jakarta");
                $tgltime = date('Y-m-d H:i:s');
                $tgl = date('Y-m-d');
            // $a="SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjkonsulidtrans' AND id_unit ='$input->rwjkonsulunit' and tgl_masuk = '$tgl'";
            // echo"$a";
            // exit();
                $cekdobel =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjkonsulidtrans' AND id_unit ='$input->rwjkonsulunit' and tgl_masuk = '$tgl' ");
                if ($cekdobel->getNumRows() > 0) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sudah pernah kosul dihari yang sama";
                } else {
                    $query = "INSERT INTO kunjungan(id_unit,tgl_masuk,id_transaksi,jam_masuk,id_pegawai,status_kunjungan) VALUES('$input->rwjkonsulunit',' $tgl', '$input->rwjkonsulidtrans',' $tgltime','$input->rwjkonsuldokter','1')";
                    if ($this->db->simpleQuery($query)) {

                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses konsul";
                        $output['pesan']    = "Sukses posting";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal konsul";
                    //echo"$query";
                        $output['pesan']    = "Gagal mposting";
                    }
                }
            }

            $this->hasil($output);
        }
        public function pindahpasienirna()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'rwjkonsulidtrans',
                'rwjkonsulunit',
                'rwjkonsuldokter',
            ];
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $transaksiBaru = false;

            if ($this->evalParam($input, $listParam)) {
                date_default_timezone_set("Asia/Jakarta");
                $tgltime = date('Y-m-d H:i:s');
                $tgl = date('Y-m-d');
            // $a="SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjkonsulidtrans' AND id_unit ='$input->rwjkonsulunit' and tgl_masuk = '$tgl'";
            // echo"$a";
            // exit();
                $cekdobel =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjkonsulidtrans' AND id_unit ='$input->rwjkonsulunit' and tgl_masuk = '$tgl' ");
                if ($cekdobel->getNumRows() > 0) {
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sudah pernah kosul dihari yang sama";
                } else {
                    $query = "INSERT INTO kunjungan(id_unit,tgl_masuk,id_transaksi,jam_masuk,id_pegawai,status_kunjungan) VALUES('$input->rwjkonsulunit',' $tgl', '$input->rwjkonsulidtrans',' $tgltime','$input->rwjkonsuldokter','1')";
                    if ($this->db->simpleQuery($query)) {

                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses konsul";
                        $output['pesan']    = "Sukses posting";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = "Gagal konsul";
                    //echo"$query";
                        $output['pesan']    = "Gagal mposting";
                    }
                }
            }

            $this->hasil($output);
        }

        public function serahterimapasienirna()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'id_transaksi',
            ];
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $transaksiBaru = false;

            if ($this->evalParam($input, $listParam)) {
                // $this->db->transStart();
                date_default_timezone_set("Asia/Jakarta");
                $tgltime = date('Y-m-d H:i:s');
                $tgl = date('Y-m-d');
            // $a="SELECT * FROM kunjungan WHERE id_transaksi = '$input->rwjkonsulidtrans' AND id_unit ='$input->rwjkonsulunit' and tgl_masuk = '$tgl'";
            // echo"$a";
            // exit();
                $cekdobel =  $this->db->query("SELECT * FROM kunjungan WHERE id_transaksi = '$input->id_transaksi' AND id_unit ='$input->id_unit_tujuan' and tgl_masuk = '$tgl' and aktif='t' ");
                if ($cekdobel->getNumRows() > 0) {
                    $updateserahterima = $this->db->query("update serah_terima set terima='t' where id_kunjungan='$input->id_kunjungan'");
                    // $output['status']   = "sukses";
                    // $output['pesan']    = "Sudah pernah kosul dihari yang sama";
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Terima Pasien";
                } else if( substr($input->id_unit_asal,0,1) !='2' || left($input->id_unit_asal,0,1) !=2){
                    $updateserahterima = $this->db->query("update serah_terima set terima='t' where id_kunjungan='$input->id_kunjungan'");
                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses Terima Pasien IRJA/IGD";
                } else {
                    $this->db->transStart();
                    $cekjenisunit = $this->db->query("SELECT jenis_unit from unit where id_unit='$input->id_unit_tujuan' ")->getRow()->jenis_unit;
                    if ($cekjenisunit == '2' || $cekjenisunit == 2) {
                    //update kamar lama
                        $idkamar = $this->db->query("SELECT id_kamar from kunjungan where id_kunjungan='$input->id_kunjungan'and status_kunjungan = '3' ")->getRow()->id_kamar;
                        $udpatekamar = $this->db->query("update kamar set digunakan=digunakan-1 where id_kamar='$idkamar'");
                        $updateaktifkamar = $this->db->query("UPDATE kunjungan SET aktif = 'f', tgl_keluar='$tgl', jam_keluar='$tgltime',posting='t',status_kunjungan='2' WHERE id_kunjungan='$input->id_kunjungan' and id_transaksi = '$input->id_transaksi' and aktif='t' and id_kamar is not null");
                    //akhir update kamar lama
                        $querykunjungan = $this->db->query("INSERT INTO kunjungan(id_unit,id_transaksi,id_pegawai,id_kamar,status_kunjungan) VALUES('$input->id_unit_tujuan', '$input->id_transaksi','$input->dpjp','$input->id_kamar_tujuan','3')");
                        $queryupdatekamarbaru = $this->db->query("update kamar set digunakan=digunakan+1 where id_kamar='$input->id_kamar_tujuan'");
                    //updateserahterima
                        $updateserahterima = $this->db->query("update serah_terima set terima='t' where id_kunjungan='$input->id_kunjungan'");
                    } else {
                        $updateserahterima = $this->db->query("update serah_terima set terima='t' where id_kunjungan='$input->id_kunjungan'");
                    }
                    $this->db->transComplete();
                    if ($this->db->transStatus()) {
                        $output['status']   = "sukses";
                        $output['pesan']    = "Sukses Terima Pasien";
                    } else {
                        $output['status']   = "gagal";
                        $output['pesan']    = $this->db->transStatus();
                    }
                }
            }

            $this->hasil($output);
        }


        public function postingcarakeluarz()
        {
            $input = json_decode(file_get_contents('php://input'));
            $listParam = [
                'idcarakeluar',
                'keterangankeluar',
                'tglkeluar',
            ];
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $transaksiBaru = false;

            if ($this->evalParam($input, $listParam)) {
                date_default_timezone_set("Asia/Jakarta");
                $time = date('H:i:s');
                $jam = $input->tglkunj . " " . $time;
            //$query = "INSERT INTO detail_tindakan(id_kunjungan, id_produk) VALUE('$input->id_kunjungan', '$produk->id_produk')";
                $query = "UPDATE kunjungan SET tgl_keluar ='$input->tglkeluar',id_cara_keluar='$input->idcarakeluar',jam_keluar='$jam',posting='t' WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'";
                if ($this->db->simpleQuery($query)) {
                // echo"hai";
                // exit();
                    if ($input->idcarakeluar == '3' || $input->idcarakeluar == 3) {
                        $cek_pengantarranap = $this->db->query("SELECT * FROM pengantar_rawat_inap WHERE id_kunjungan = '$input->idkunjungan' and id_transaksi = '$input->idtransaksi'")->getNumRows();
                        if ($cek_pengantarranap > 0) {
                            $query = $this->db->simpleQuery("UPDATE pengantar_rawat_inap SET keterangan ='$input->keterangankeluar' WHERE id_transaksi='$input->idtransaksi' and id_kunjungan='$input->idkunjungan'");
                        } else {
                            $no_sjp_rajal = $this->db->query("SELECT * FROM penjamin_transaksi WHERE id_transaksi = '" . $input->idtransaksi . "'")->getRow()->no_sjp;
                            $query = "INSERT INTO pengantar_rawat_inap(id_kunjungan,no_sjp_rajal,id_transaksi,tgl_masuk_nginap,tgl_keluar_nginap,keterangan) VALUE('$input->idkunjungan',' $no_sjp_rajal', '$input->idtransaksi',null,null,'$input->keterangankeluar')";
                        }
                    }

                    $output['status']   = "sukses";
                    $output['pesan']    = "Sukses posting";
                } else {
                    $output['status']   = "gagal";
                    $output['pesan']    = "Gagal mposting";
                }
            }

            $this->hasil($output);
        }


        public function modalBHPProduk()
        {
            $input = json_decode(file_get_contents('php://input'));
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $output['data'] = "";

            $mapData = array();
            $mapData['nama_produk'] = '';
            $mapData['listStockBHP'] = [];
            $mapData['listBHP'] = [];

            $query = "
            SELECT nama_produk, flag_bhp
            FROM detail_kunjungan JOIN produk USING(id_produk)
            WHERE id_detail_kunjungan = '" . $input->id_dk . "'
            ";

            $hasil = $this->db->query($query);

            if ($hasil->getNumRows() > 0) {
                $output['status'] = 'sukses';
                $mapData['nama_produk'] = $hasil->getRow()->nama_produk;
                $mapData['flag_bhp'] = $hasil->getRow()->flag_bhp;

                $query = "
                SELECT kd_obat, nama_obat, stok_unit, kd_satuan
                FROM far_stok JOIN far_obat USING(kd_obat)
                WHERE id_unit = '" . $input->id_unit . "'
                ";

                $hasil = $this->db->query($query);
                if ($hasil->getNumRows() < 1) {
                    $output['pesan'] = "Stock unit kosong";
                }

                $mapData['listStockBHP'] = $hasil->getResult('array');

                $query = "
                SELECT kd_obat, nama_obat, jumlah, kd_satuan
                FROM history_penggunaan_bhp JOIN far_obat USING(kd_obat)
                WHERE id_detail_kunjungan = '" . $input->id_dk . "'
                ";

                $hasil = $this->db->query($query);
                $mapData['listBHP'] = $hasil->getResult('array');

                $arrayTemp = [];
                foreach ($mapData['listBHP'] as $BHPTerpakai) {
                    $tidakAda = true;
                    foreach ($mapData['listStockBHP'] as $BHPStock) {
                        if ($BHPStock['kd_obat'] == $BHPTerpakai['kd_obat']) {
                            $tidakAda = false;
                        }
                    }
                    if ($tidakAda) {
                        $tempBHP = array();
                        $tempBHP['kd_obat'] = $BHPTerpakai['kd_obat'];
                        $tempBHP['nama_obat'] = $BHPTerpakai['nama_obat'];
                        $tempBHP['stok_unit'] = 0;
                        $tempBHP['kd_satuan'] = $BHPTerpakai['kd_satuan'];
                        array_push($arrayTemp, $tempBHP);
                    }
                }

                $mapData['listStockBHP'] = array_merge($mapData['listStockBHP'], $arrayTemp);
                $output['data'] = $mapData;
            } else {
                $output['pesan'] = "Produk tidak ditemukan";
            }

            $this->hasil($output);
        }

        public function tambahPenggunaanBHP()
        {
            $input = json_decode(file_get_contents('php://input'));
            $output = array();
            $output['status'] = "gagal";
            $output['pesan'] = "";
            $output['data'] = "";

            $query = "
            INSERT INTO history_penggunaan_bhp
            VALUES('" . $input->id_dk . "','" . $input->id_obat . "','" . $input->jumlah . "')
                ";

                if ($this->db->simpleQuery($query)) {
                    $output['status'] = "sukses";
                } else {
                    $output['pesan'] = "Gagal menambahkan BHP";
                }

                $this->hasil($output);
            }

            public function postingPenggunaanBHP()
            {
                $input = json_decode(file_get_contents('php://input'));
                $output = array();
                $output['status'] = "gagal";
                $output['pesan'] = "";
                $output['data'] = "";

                $query = "
                UPDATE detail_kunjungan SET flag_bhp = true
                WHERE id_detail_kunjungan = '" . $input->id_dk . "'
                ";

                if ($this->db->simpleQuery($query)) {
                    $output['status'] = "sukses";
                } else {
                    $output['pesan'] = "Gagal melakukan finalisasi penggunaan BHP";
                }

                $this->hasil($output);
            }

            public function simpanPenggunaanBHP()
            {
                $input = json_decode(file_get_contents('php://input'));
                $output = array();
                $output['status'] = "gagal";
                $output['pesan'] = "";
                $output['data'] = "";

                $query = "
                UPDATE history_penggunaan_bhp
                SET jumlah = '" . $input->jumlah . "'
                WHERE id_detail_kunjungan = '" . $input->id_dk . "'
                AND kd_obat = '" . $input->id_obat . "'
                ";

                if ($this->db->simpleQuery($query)) {
                    $output['status'] = "sukses";
                } else {
                    $output['pesan'] = "Gagal menambahkan BHP";
                }

                $this->hasil($output);
            }

            public function hapusPenggunaanBHP()
            {
                $input = json_decode(file_get_contents('php://input'));
                $output = array();
                $output['status'] = "gagal";
                $output['pesan'] = "";
                $output['data'] = "";

                $query = "
                DELETE FROM history_penggunaan_bhp
                WHERE id_detail_kunjungan = '" . $input->id_dk . "'
                AND kd_obat = '" . $input->id_obat . "'
                ";

                if ($this->db->simpleQuery($query)) {
                    $output['status'] = "sukses";
                } else {
                    $output['pesan'] = "Gagal menambahkan BHP";
                }

                $this->hasil($output);
            }
            public function data_spri()
            {
                $input = json_decode(file_get_contents('php://input'));
        // echo"$input->id_kunjungan";
        // exit;
                $query = "SELECT
                pegawai.nama_pegawai as dokterpengirim,
                peg.nama_pegawai as dokterdpjs,
                pegawai.id_pegawai as id_dokterpengirim,
                peg.id_pegawai as id_dokterdpjp,
                *    
                FROM
                pengantar_rawat_inap
                JOIN pegawai ON pegawai.id_pegawai = pengantar_rawat_inap.dokterpengirim 
                JOIN pegawai as peg ON peg.id_pegawai = pengantar_rawat_inap.dokterdpjp 
                WHERE
                id_kunjungan = '$input->id_kunjungan'";
        // echo"$query";
                if ($this->db->simpleQuery($query)) {
                    $output['status'] = "sukses";
                    $output['pesan'] = "";
                    $output['data'] = $this->db->query($query)->getResult();
                } else {

                    $output['status'] = "gagal";
                    $output['pesan'] = $this->db->error()['message'];
                }
                echo json_encode($output);
            }
            public function dokter()
            {
                $input = json_decode(file_get_contents('php://input'));
                $dok =  $this->db->query("SELECT * FROM pegawai where jenis_pegawai='1' order by nama_pegawai");
                $output['status'] = 'sukses';
                $output['data'] = $dok->getResult();
                echo json_encode($output);
            }
            public function ruang_inap()
            {
                $input = json_decode(file_get_contents('php://input'));
                $dok =  $this->db->query("SELECT * FROM ruang_inap order by nama_ruang asc");
                $output['status'] = 'sukses';
                $output['data'] = $dok->getResult();
                echo json_encode($output);
            }
            public function apakahadaspri()
            {
                $input = json_decode(file_get_contents('php://input'));
        // echo"$input->id_kunjungan";
        // exit;
                $query = "SELECT
                id_kunjungan 
                FROM
                pengantar_rawat_inap
                JOIN pegawai ON pegawai.id_pegawai = pengantar_rawat_inap.dokterpengirim 
                JOIN pegawai as peg ON peg.id_pegawai = pengantar_rawat_inap.dokterdpjp 
                WHERE
                id_kunjungan = '$input->id_kunjungan'";
        // $idkunjungan = $this->db->query($query)->getRow()->id_kunjungan;

        // echo"$query";
        // exit();
                $data = $this->db->query($query);
                $output['status'] = "sukses";
                $output['data'] = $data->getResult();

        // if ($this->db->simpleQuery($query)) {
        //     $output['status'] = "sukses";
        //     $output['pesan'] = "ada spri";
        //     $output['data'] = $this->db->query($query)->getRow()->id_kunjungan;
        // } else {
        //     $output['status'] = "gagal";
        //     $output['pesan'] = "tidak ada spri";
        //     $output['data'] = "x";
        // }
                echo json_encode($output);
            }
            public function updategantidokter()
            {
                $input = json_decode(file_get_contents('php://input'));
                $output = array();
                $output['status'] = "gagal";
                $output['pesan'] = "";
                $output['data'] = "";
                $query = "
                UPDATE kunjungan
                SET id_pegawai = '" . $input->id_pegawai . "'
                WHERE id_kunjungan = '" . $input->id_kunjungan . "'
                ";
                if ($this->db->simpleQuery($query)) {
                    $querydokter = $this->db->query("select nama_pegawai from kunjungan join pegawai using(id_pegawai)
                        where kunjungan.id_pegawai = '" . $input->id_pegawai . "'")->getRow()->nama_pegawai;
                    $output['status'] = "sukses";
                    $output['nama'] = "$querydokter";
                } else {
                    $output['pesan'] = "Gagal";
                }

                $this->hasil($output);
            }
            public function jsonupdatetglpulangHidup($nosep, $statuspulang, $tglplg, $nolpmanualKLL, $user)
            {

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

                return $json;
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
                $string = json_decode(file_get_contents('https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/' . $request, true, $context));
                // $string = json_decode(file_get_contents('https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/' . $request, true, $context));
                return $string;
            }
            public function tStamp()
            {
                $tStamp = strval(time() - strtotime('1970-01-01 07:00:00'));
                return $tStamp;
            }
            public function getSignatureVedikaBaru($tStamp)
            {

                $data = "31744";
                $secretKey = "5kQ5FEF0A4";
                $user_key = "1fef913f6110d8d3ffecb0dd17dc9c51";
                // $data = "15081";
                // $secretKey = "3cDAEE1ED1";
                // $user_key = "adc0a4d06fcb9419816519d243703bcb";
                $signature = hash_hmac('sha256', $data . "&" . $tStamp, $secretKey, true);
                $encodedSignature = base64_encode($signature);
                return array("X-Cons-ID: " . $data, "X-Timestamp: " . $tStamp, "X-Signature: " . $encodedSignature, "user_key:" . $user_key, "Content-Type: application/x-www-form-urlencoded\r\n");
            }
            public function caramasuk()
            {
                $user =  $this->db->query("SELECT * FROM cara_masuk");
                $output['status'] = 'sukses';
                $output['data'] = $user->getResult();

                echo json_encode($output);
            }
            public function carakeluar()
            {
                $user =  $this->db->query("SELECT * FROM cara_keluar");
                $output['status'] = 'sukses';
                $output['data'] = $user->getResult();

                echo json_encode($output);
            }
            public function keadaanumum()
            {
                $user =  $this->db->query("SELECT * FROM status_pulang");
                $output['status'] = 'sukses';
                $output['data'] = $user->getResult();

                echo json_encode($output);
            }
        }
