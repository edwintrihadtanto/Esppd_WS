<?php



require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {	

    $query = "SELECT * FROM tb_user WHERE nip = :nip";
    $parameter_nya = array(

        ':nip' => $_POST['nip']

    );

    try {

        $statement_nya   = $db->prepare($query);
        $result = $statement_nya->execute($parameter_nya);

    }

    catch (PDOException $ex) {

        $jawaban_nya["berhasil"] = 0;

        $jawaban_nya["tampilkan_pesan"] = "NIP/NPK SALAH";

        die(json_encode($jawaban_nya));

    }

    $validasi_identitas = false;
    $row = $statement_nya->fetch();

    if ($row) {

        if ($_POST['pass'] === $row['pass']) {


            $login_nya_ok = true;


		if($row['security_level'] == 1){

		    $cek_level_ok_1 = true;


		}else if ($row['security_level'] == 2){

		    $cek_level_ok_2 = true;

		}

        }

    }


    if ($login_nya_ok) {

	$jawaban_nya["berhasil"] = 1;

	if ($cek_level_ok_1) {

		$jawaban_nya["level"] = 1;

        	$jawaban_nya["tampilkan_pesan"] = "Welcome Administrator ... !!!";

 		die(json_encode($jawaban_nya));

		} else if ($cek_level_ok_2) {

		$jawaban_nya["level"] = 2;

        	$jawaban_nya["tampilkan_pesan"] = "Selamat Datang Petugas";

 		die(json_encode($jawaban_nya));


		} else {
		$jawaban_nya["level"] = 0;

        	$jawaban_nya["tampilkan_pesan"] = "Anda Tidak Memiliki Hak Akses, Silahkan Hubungi Administrator";

 		die(json_encode($jawaban_nya));
		}

    } else {
        $jawaban_nya["berhasil"] = 0;
	$jawaban_nya["level"] = 0;
        $jawaban_nya["tampilkan_pesan"] = "Masukan NIP dan Password Anda Dengan Benar !!!";
        die(json_encode($jawaban_nya));
    }

 
} else {


?>
 <h1>Login</h1> 

  <form action="login_nya.php" method="post"> 

      Username:<br /> 

      <input type="text" name="nip" placeholder="username" /> 

      <br /><br /> 


      Password:<br /> 

      <input type="password" name="pass" placeholder="password" value="" /> 

      <br /><br /> 


      <input type="submit" value="Login" /> 

  </form> 


 <?php
}

?> 