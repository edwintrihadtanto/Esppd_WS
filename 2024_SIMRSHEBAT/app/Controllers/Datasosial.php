<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of Datasosial
 *
 * @author lapto
 */
class Datasosial extends Api
{

   public function spesialisasikamar()
   {
      $speskamar =  $this->db->query("SELECT * FROM spesialisasi_kamar order by nama_spesialisasi_kamar asc ");
      $output['status'] = 'sukses';
      $output['data'] = $speskamar->getResult();

      echo json_encode($output);
   }
   public function unitsps()
   {
      $input = json_decode(file_get_contents('php://input'));
      $unit =  $this->db->query(" SELECT * FROM unit inner join spc_kamar using(kd_unit) 
         WHERE
         sps_unit.id_spesialisasi_kamar = '$input->id' order by nama_unit asc ");

      $output['status'] = 'sukses';
      $output['data'] = $unit->getResult();

      echo json_encode($output);
   }
   public function ruangsps()
   {
      $input = json_decode(file_get_contents('php://input'));
      $ruang =  $this->db->query(" SELECT
                                       * 
         FROM
         sps_ruang
         JOIN ruang_inap USING ( id_ruang ) 
         WHERE
         id_spesialisasi_kamar = '$input->id2'
         and
         sps_ruang.id_unit = '$input->id' 
         order by nama_ruang asc  ");

      $output['status'] = 'sukses';
      $output['data'] = $ruang->getResult();

      echo json_encode($output);
   }
   public function ruangspsby()
   {
      $input = json_decode(file_get_contents('php://input'));
      $ruang =  $this->db->query(" SELECT
                                       * 
         FROM
         ruang_inap 
         WHERE
         id_unit = '$input->id' 
         order by nama_ruang asc  ");

      $output['status'] = 'sukses';
      $output['data'] = $ruang->getResult();

      echo json_encode($output);
   }
   public function kamarsps()
   {
      $input = json_decode(file_get_contents('php://input'));
      $kamar =  $this->db->query("SELECT
      * 
         FROM
         (
            SELECT SUM
            ( jumlah_bed - digunakan - rusak ) AS sisa,
            jumlah_bed,
            digunakan,
            rusak,
            nama_kamar ,
            id_kamar
            FROM
            kamar 
            WHERE
            id_ruang = '" . $input->id . "' 
            AND id_unit = '" . $input->id_unit . "' 
            GROUP BY
            id_kamar 
            ORDER BY
            nama_kamar ASC 
            ) AS x
            where x.sisa <> 0");
         $output['status'] = 'sukses';
         $output['data'] = $kamar->getResult();
         echo json_encode($output);
      }
      public function kamarspsby()
      {
         $input = json_decode(file_get_contents('php://input'));
         $kamar =  $this->db->query("SELECT
      * 
            FROM
            (
               SELECT SUM
               ( jumlah_bed - digunakan - rusak ) AS sisa,
               jumlah_bed,
               digunakan,
               rusak,
               nama_kamar ,
               id_kamar
               FROM
               kamar 
               WHERE
               id_kamar = '" . $input->id . "' 
               GROUP BY
               id_kamar 
               ORDER BY
               nama_kamar ASC 
            ) AS x");
            $output['status'] = 'sukses';
            $output['data'] = $kamar->getResult();
            echo json_encode($output);
         }

         public function propinsi()
         {
            $user =  $this->db->query("SELECT * FROM propinsi ORDER BY propinsi");
            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function kotaAll()
         {
            $user =  $this->db->query("SELECT * FROM kabupaten ORDER BY kabupaten");
            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function kecamatanAll()
         {
            $user =  $this->db->query("SELECT * FROM kecamatan ORDER BY kecamatan");
            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function kelurahanAll()
         {
            $user =  $this->db->query("SELECT * FROM kelurahan ORDER BY kelurahan");
            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function propinsiby()
         {
            $input = json_decode(file_get_contents('php://input'));
            $prov =  $this->db->query("SELECT
    * 
              FROM
              propinsi
              P INNER JOIN kabupaten K ON K.kd_propinsi = P.kd_propinsi
              INNER JOIN kecamatan kec ON kec.kd_kabupaten = K.kd_kabupaten
              INNER JOIN kelurahan kel ON kel.kd_kecamatan = kec.kd_kecamatan 
              WHERE
              kel.kd_kelurahan = '$input->id'");
            $output['status'] = 'sukses';
            $output['data'] = $prov->getRow();

            echo json_encode($output);
         }
         public function propinsiktpby()
         {
            $input = json_decode(file_get_contents('php://input'));
            $prov =  $this->db->query("SELECT
    * 
              FROM
              propinsi
              P INNER JOIN kabupaten K ON K.kd_propinsi = P.kd_propinsi
              INNER JOIN kecamatan kec ON kec.kd_kabupaten = K.kd_kabupaten
              INNER JOIN kelurahan kel ON kel.kd_kecamatan = kec.kd_kecamatan 
              WHERE
              kel.kd_kelurahan = '$input->id'");
            $output['status'] = 'sukses';
            $output['data'] = $prov->getRow();

            echo json_encode($output);
         }
         public function kota()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kota =  $this->db->query("SELECT * FROM kabupaten where kd_propinsi='$input->id' ");
            $output['status'] = 'sukses';
            $output['data'] = $kota->getResult();

            echo json_encode($output);
         }
         public function kecamatan()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kec =  $this->db->query("SELECT * FROM kecamatan where kd_kabupaten='$input->id' ");
            $output['status'] = 'sukses';
            $output['data'] = $kec->getResult();

            echo json_encode($output);
         }

         public function kelompokPenjamin()
         {
            $kel =  $this->db->query("SELECT * FROM kelompok_penjamin order by kelompok_penjamin asc");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }

         public function penjamin()
         {
            $kel =  $this->db->query("SELECT * FROM penjamin order by id_penjamin asc");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }

         public function kekerabatan()
         {
            $kel =  $this->db->query("SELECT * FROM kekerabatan order by nama_kekerabatan asc");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }
         public function rujukan_asal()
         {
            $kel =  $this->db->query("SELECT * FROM rujukan_asal order by cara_penerimaan asc");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }
         public function rujukan()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kel =  $this->db->query("SELECT * FROM rujukan where cara_penerimaan='$input->id' order by rujukan asc ");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }
         public function rujukanAll()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kel =  $this->db->query("SELECT * FROM rujukan order by rujukan asc ");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }

         public function rujukanbyidx()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kel =  $this->db->query("SELECT * FROM rujukan where kd_rujukan='$input->id'");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }

         public function kelurahan()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kel =  $this->db->query("SELECT * FROM kelurahan where kd_kecamatan='$input->id' ");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }
         public function nomorasuransibyid()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kel =  $this->db->query("SELECT * FROM penjamin_pasien where id_penjamin='$input->id' and no_rm='$input->id2' ");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }
         public function diagnosabyname()
         {
            $input = json_decode(file_get_contents('php://input'));
            $kel =  $this->db->query("SELECT * FROM penyakit where id_penyakit ilike '%$input->id%' ");
            $output['status'] = 'sukses';
            $output['data'] = $kel->getResult();

            echo json_encode($output);
         }

         public function getAllPenyakit()
         {
            $user =  $this->db->query("SELECT id_penyakit, penyakit FROM penyakit ORDER BY penyakit");
            $output['status'] = 'sukses';
            $output['pesan'] = '';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function getAllDokter()
         {
            $user =  $this->db->query("SELECT id_pegawai, nama_pegawai FROM pegawai WHERE jenis_pegawai = '1' ORDER BY nama_pegawai");
            $output['status'] = 'sukses';
            $output['pesan'] = '';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function getAllTindakan()
         {
            $user =  $this->db->query("SELECT id_penyakit, penyakit FROM penyakit ORDER BY penyakit");
            $output['status'] = 'sukses';
            $output['pesan'] = '';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }


         public function pendidikan()
         {
            $user =  $this->db->query("SELECT * FROM pendidikan order by kd_pendidikan asc ");
            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function pekerjaan()
         {
            $user =  $this->db->query("SELECT * FROM pekerjaan order by kd_pekerjaan asc");
            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }

         public function agamabyid()
         {
            $input = json_decode(file_get_contents('php://input'));
            $a = "SELECT * FROM agama where kd_agama='$input->id";
            $agamabyid =  $this->db->query("SELECT * FROM agama where kd_agama='$input->id' ");
      //echo"$a";
            $output['status'] = 'sukses';
            $output['data'] = $agamabyid->getResult();

            echo json_encode($output);
         }
         public function agama()
         {
            $kota =  $this->db->query("SELECT * FROM agama order by kd_agama asc ");
            $output['status'] = 'sukses';
            $output['data'] = $kota->getResult();

            echo json_encode($output);
         }
         public function darah()
         {
            $kota =  $this->db->query("SELECT * FROM darah order by darah asc ");
            $output['status'] = 'sukses';
            $output['data'] = $kota->getResult();

            echo json_encode($output);
         }

         public function marital()
         {
            $marital =  $this->db->query("SELECT * FROM marital order by marital asc ");
            $output['status'] = 'sukses';
            $output['data'] = $marital->getResult();

            echo json_encode($output);
         }
         public function pekerjaanby()
         {
            $input = json_decode(file_get_contents('php://input'));
            $pekerjaanbyid =  $this->db->query("SELECT * FROM pekerjaan where kd_pekerjaan='$input->id' ");
      //echo"$a";
            $output['status'] = 'sukses';
            $output['data'] = $pekerjaanbyid->getResult();

            echo json_encode($output);
         }

         public function carakeluar()
         {
            $input = json_decode(file_get_contents('php://input'));
            if ($input->posisi == 'rwi') {
               $where = "WHERE id_cara_keluar != '3'";
            } else {
               $where = '';
            }

            $user =  $this->db->query("SELECT * FROM cara_keluar $where");

            $output['status'] = 'sukses';
            $output['data'] = $user->getResult();

            echo json_encode($output);
         }
      }
