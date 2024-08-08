<?php
date_default_timezone_set('Asia/Jakarta');


require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {

	if (empty($_POST['nip']) || empty($_POST['pass'])) {


	  // kalau 'username' dan 'password' kosong
	  // JSON menjawab agar pengguna tahu apa yg terjadi

	        $jawaban_nya["berhasil"] = 0;
	        $jawaban_nya["tampilkan_pesan"] = "SPPD RSSm || Gagal Login || ...Cek Koneksi Anda...";

	  // metode die() akan matikan halaman dan tidak 
	  // mengeksekusi kode2 selanjutnya, dan juga akan
	  // memperlihatkan parameter2, yaitu JSON data yang
	  // akan di parsing oleh android

        	die(json_encode($jawaban_nya));

	}	

   
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

        $jawaban_nya["tampilkan_pesan"] = "DatabaseNya salah. Di coba lagi yah!";

        die(json_encode($jawaban_nya));

    }


    //bikin satu variable utk priksa kebenaran login dan
    //di inisialisasikan dengan false.

    $validasi_identitas = false;

    //tarik semua parameter pada 'query' di atas dengan
    //metode fetch()


    $row = $statement_nya->fetch();

    if ($row) {
	
  	//kalau passwordnya di encrypt, maka di lakukan di sini tapi
	//saya bukan ahli encrypt, silahkan baca2 tentang encrypt,
	//disini saya hanya berkepentingan utk 
	//menjalankan script ini sejajar dengan java (android) sehingga
	//saya hanya membandingkan password yg di input dan
	//password yg ada di database


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

		$query = "insert into login_activity  (nip, tgl_bln_thn, waktu) values 
			(:nip_login, :tgl_skrng ,:jam_skrng)";
	
	        $yang_di_query = array(

	     		':nip_login' => $_POST['nip'],
			':tgl_skrng' => date("d/m/y"),
             		':jam_skrng' => date("H:i:sa")	
	     	);

     		try {
        		$statement_nya   = $db->prepare($query);
        		$result = $statement_nya->execute($yang_di_query);
     		}
     		catch (PDOException $ex) {
        		$jawaban_nya["sukses"] = 0;
        		$jawaban_nya["pesan"] = "Gagal Simpan Activity !!!";
        		die(json_encode($jawaban_nya));
     		}

 		die(json_encode($jawaban_nya));
			
			

		} else if ($cek_level_ok_2) {

		$jawaban_nya["level"] = 2;

        	$jawaban_nya["tampilkan_pesan"] = "Selamat Datang Petugas";

                $query = "insert into login_activity  (nip, tgl_bln_thn, waktu) values (:nip_login, :tgl_skrng ,:jam_skrng)";
	
    	        $yang_di_query = array(
    
    	     		':nip_login' => $_POST['nip'],
    			    ':tgl_skrng' => date("d/m/y"),
                 	':jam_skrng' => date("H:i:sa")	
    	     	);

         		try {
            		$statement_nya  = $db->prepare($query);
            		$result         = $statement_nya->execute($yang_di_query);
         		}
         		catch (PDOException $ex) {
            		$jawaban_nya["sukses"] = 0;
            		$jawaban_nya["pesan"] = "Gagal Simpan Activity !!!";
            		die(json_encode($jawaban_nya));
         		}

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







  <a href="registrasi.php">Register</a>







 <?php







}















?> 