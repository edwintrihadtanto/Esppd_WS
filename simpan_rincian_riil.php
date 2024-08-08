<?php

require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {
   

	if (empty($_POST['no_sppd'])) {

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Nomor SPPD Belum Tersedia"; 
        
        die(json_encode($jawaban_nya));

    }

     $query        = " SELECT * FROM tb_input_sppdbaru  WHERE nomor_surat_sppd = :nomor_sppd";


      $yang_di_query = array(

        ':nomor_sppd' => $_POST['no_sppd']
	
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


	
     //DIMATIKAN SEMENTARA
	$query1 = "insert into tb_rincian_pengeluaran_riil

		(nomor_surat_sppd, nip, uraian_daftar_riil, jumlah_riil, tgl_pembuatan, nama_file_upload) 

		values 

		( :nomor_sppd, :nip, :rincian_biaya, :jumlah, :tgl_pembuatan_rincian, '-')";
  	
	$array_querry1 = array(
	
	':nomor_sppd'		=> $_POST['no_sppd'],
	
	':nip'			=> $_POST['ambilnip'],

 	':rincian_biaya'	=> $_POST['uraian'],

	':jumlah'		=> $_POST['jml'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_buat']

	

    	);
	
	
	    	


	try {

		$statement_update   = $db->prepare($query1 );

        	$hasil_update = $statement_update->execute($array_querry1);

	 }

    		catch (PDOException $ex) {

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Gagal Proses Penyimpanana Data";

        	die(json_encode($jawaban_nya));

    	}


    	$jawaban_nya["sukses"] = 1;

    	$jawaban_nya["pesan"] = "Upss... Thank You !!!";

    	echo json_encode($jawaban_nya);


		


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