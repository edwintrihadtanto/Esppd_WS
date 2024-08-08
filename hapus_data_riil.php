<?php

require("config_koneksi/konfigurasi_nya.php");



if (!empty($_POST)) {
   

	if (empty($_POST['ambil_nomor_sppd'])) {

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Nomor SPPD Belum Tersedia"; 
        
        die(json_encode($jawaban_nya));

    }

     $query        = " SELECT * FROM tb_input_sppdbaru  WHERE nomor_surat_sppd = :nomor_sppd";


      $yang_di_query = array(

        ':nomor_sppd' => $_POST['ambil_nomor_sppd']
	
	    );

    

    //jalankan query-nya

    try {

        // bikin statement apa yang mau di query ke database. 

        $statement_nya   = $db->prepare($query);

        $result = $statement_nya->execute($yang_di_query);

    }

    catch (PDOException $ex) {

        

        //jadi developer yg baik yah, jelaskan kepada user apa yg terjadi:

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Sukses";

        die(json_encode($jawaban_nya));

    }

    

 // ambil semua data yang telah tercatat di database sehingga 

 // aplikasi bisa lihat apakah nama tsb sudah ada atau belum dan

 // kalau nama sudah ada maka berhenti eksekusi dengan membunuh 

 // aplikasinya dengan metode die();


    $row = $statement_nya->fetch();

    if ($row) {

         if ($_POST['nip'] === $row['nip']) {
		
		$cek_data = true;

	}

        //$jawaban_nya["sukses"] = 1;

       // $jawaban_nya["pesan"] = "Nomor Surat Laporan SPPD Lembar 1 Belum Terdaftar";

       // die(json_encode($jawaban_nya));

    }

if ($cek_data) {
	   	

	try {

		$no_sppd = $_POST['ambil_nomor_sppd'];

		$sql_del = "Delete From tb_perincian_biaya where nomor_surat_sppd = :nomor_sppd " ;
		
		$hasil = $db->prepare($sql_del);

		$hasil -> bindValue(':nomor_sppd', $no_sppd , PDO::PARAM_INT);
	
	
			$sql_cek = "Select * From tb_perincian_biaya where nomor_surat_sppd = :nomor_sppd " ;

			$cek  = $db->prepare($sql_cek);

			$cek -> bindValue(':nomor_sppd', $no_sppd , PDO::PARAM_INT);

			$cek -> execute();		

			while ($row = $cek->fetch(PDO::FETCH_ASSOC)) { //MENGHAPUS FILE UPLOAD PADA DIREKTORI
						
				unlink ('temp/upload/'.$row['bukti_image']);
			
				$hasil -> execute();
			}

    	}

    		catch (PDOException $ex) {

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Sorry Cek Query nya Lagi !!! Coba lagi yah!";

        	die(json_encode($jawaban_nya));

    	}


    	$jawaban_nya["sukses"] = 1;

    	$jawaban_nya["pesan"] = "-- Batal Pengolahan Rincian Biaya --";

    	echo json_encode($jawaban_nya);


		
}else {
	
	
		$jawaban_nya["sukses"] = 0;

		$jawaban_nya["pesan"] = "Maaf, Anda Sudah Melakukan Rincian Biaya Perjalanan Dinas";
		
		die(json_encode($jawaban_nya));



}    


} else {

?>

 <h1>Register</h1> 

 <form action="coba.php" method="post"> 

     Nomor Test:<br /> <input type="text" name="nip" value="" /> <br /><br /> 

     <input type="submit" value="Register User Baru" /> 

 </form>

 <?php

}

?> 