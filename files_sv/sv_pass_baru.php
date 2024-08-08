<?php
date_default_timezone_set('Asia/Jakarta');
include_once "../config_koneksi/konfigurasi_nya.php";

class sv_reg{}
//$_POST["nippegawai"] = "303-03081992-052017-8776";
//$_POST["password"] = "25";
//$_POST["email"] = "ee";
 
    $nip_pegawai = $_POST["nippegawai"];
    $pass        = $_POST["password"];
    $passmd5     = md5($_POST["password"]);
    $email       = $_POST["email"];
    $tglskrng    = date("Y/m/d H:i:s");
     
     
     if (empty($nip_pegawai)) { 

        $response = new sv_reg();
        $response->success = 0;
        $response->message = "NIP/NPK Pegawai Tidak Boleh Kosong !!!"; 

        die(json_encode($response));

     }else {
        if (empty($pass)){

            $response = new sv_reg();
            $response->success = 0;
            $response->message = "Password Tidak Boleh Kosong";
            die(json_encode($response));
        }else{
           $cek_data = mysqli_query($con, "
                SELECT
                count( tb_pegawai.nip ) AS count_nip,
                count( tb_user.nip ) AS count_user,
                tb_pegawai.nip AS nip,
                nama_pegawai,
                jabatan,
                golongan,
                security_level,
                pass 
            FROM
                tb_user
                RIGHT JOIN tb_pegawai ON tb_user.nip = tb_pegawai.nip 
            WHERE
                tb_pegawai.nip = '$nip_pegawai' 
            ORDER BY
                tb_user.nip ASC;
                ");

            $row = mysqli_fetch_array($cek_data);

            if (($row['count_nip'] == 0) && ($row['count_user'] == 0)){
                
                $response = new sv_reg();
                $response->success = 404;
                $response->message = "Anda Belum Terdaftar Di Kepegawaian !!!";
                
                $response->nip = "";
                $response->nama_pegawai = "";
                $response->jabatan = "";
                $response->golongan = "";
                $response->password = "";
                die(json_encode($response));
                
            }else{
                if($row['count_user'] == 1){
                
                    $response = new sv_reg();                    
                    $response->success = 101;                    
                    $response->message = "Anda Sudah Terdaftar Di Database";                    
                    die(json_encode($response));
                
                }else{

                    // $response = new sv_reg();                    
                    // $response->success = 1;                    
                    // $response->message = "Tes Simpan 123";                    
                    // die(json_encode($response));
                    
                    
                    
                    $register_insert    = mysqli_query($con,"INSERT INTO tb_user values ('','$nip_pegawai', '$passmd5', '2', '$tglskrng')");
                    

                    if (!$register_insert){
                        
                      $response = new sv_reg();                    
                      $response->success = 0;                    
                      $response->message = "Gagal Register...\nHubungi IPDE !!!";                    
                      die(json_encode($response));
                    
                    }else{
                        $register_delete    = mysqli_query($con,"DELETE FROM tb_backup_users where nip = '$nip_pegawai'  ") ;
                        $register_update    = mysqli_query($con,"INSERT INTO tb_backup_users values ('','$passmd5','$nip_pegawai', '$pass', '$tglskrng')") ;
                        
                        $response = new sv_reg();                    
                        $response->success = 1;                    
                        $response->message = "...Register Successfully...\nSilahkan lanjut login dengan NIP/NPK dan Password anda !!!";                    
                        die(json_encode($response));
                
                    }
                }
            }
        }
    }
    
@mysqli_close($con);
