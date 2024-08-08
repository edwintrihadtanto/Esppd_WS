<?php

require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {
   

	if (empty($_POST['ambil_nomor_spt'])) {

        $jawaban_nya["sukses"] = 0;
 
        $jawaban_nya["pesan"] = "Nomor SPT Belum Tersedia"; 
        
        die(json_encode($jawaban_nya));

    }

     $query        = " SELECT * FROM tb_spt WHERE nomor_spt = :nomor_spt";

      $yang_di_query = array(

        ':nomor_spt' => $_POST['ambil_nomor_spt']
	
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

        $jawaban_nya["pesan"] = "Data Tidak Ada";

        die(json_encode($jawaban_nya));

    }

    
    $row = $statement_nya->fetch();

    if ($row) {

         if ($_POST['nip'] == $row['nip']) {
		
		$cek_data = true;

	}

     
    }

if ($cek_data) {
		
		$jawaban_nya["sukses"] = 0;

		$jawaban_nya["pesan"] = "Maaf Data Anda Belum Tercatat 2";
		//$jawaban_nya["pesan"] = $_POST['nip'];
		
		die(json_encode($jawaban_nya));
}else {
	
	$query = "insert into tb_laporan_petugas_stlh_perj_dinas 
		(nomor_spt,nip, hasil_pertemuan, masalah, saran, lain_lain, tgl_pembuatan_laporan) 
		values ( :nomor_spt, :nip, :hasil_pertemuan, :masalah, :saran,
		:lain_lain, :tgl_pembuatan_laporan) ";
  
	$query_update = "UPDATE tb_input_sppdbaru SET status_laporan_petugas = 'Laporan OK' WHERE nomor_spt = :nomor_spt and  nip = :nip   " ;

    
	 $tgl = new DateTime($_POST['tgl_pembuatan_laporan']);	
  	
	 $tgl_pembuatan_laporan = $tgl ->format('Y-m-d');	

	
	$yang_di_query = array(
	
	':nomor_spt'		=> $_POST['ambil_nomor_spt'],
	
	':nip'			=> $_POST['nip'],

 	':hasil_pertemuan'	=> $_POST['hasil_pertemuan'],

	':masalah'		=> $_POST['masalah'],

	':saran'		=> $_POST['saran'],

	':lain_lain'		=> $_POST['lain_lain'],

	':tgl_pembuatan_laporan'=> $tgl_pembuatan_laporan

    	);

	$update_query = array(
	
	':nomor_spt'		=> $_POST['ambil_nomor_spt'],
	
	':nip'			=> $_POST['nip']
 	
    	);


   
    	try {

        	$statement_nya   = $db -> prepare($query);

        	$result = $statement_nya -> execute($yang_di_query);

		$statement_update   = $db -> prepare($query_update);

        	$result = $statement_update -> execute($update_query);

    	}

    		catch (PDOException $ex) {

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Sorry Cek Query nya Lagi !!! Coba lagi yah!";

        	die(json_encode($jawaban_nya));

    	}

    

    	$jawaban_nya["sukses"] = 1;

    	$jawaban_nya["pesan"] = "Simpan Sukses!";

    	echo json_encode($jawaban_nya);

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