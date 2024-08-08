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
  
    }


if ($cek_data) {

	$query_update = "UPDATE tb_input_sppdbaru SET status_riil = 'SUDAH' WHERE nomor_surat_sppd = :nomor_sppd" ;


	$array_simpan_update = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd']
		
    	);

     //DIMATIKAN SEMENTARA
	$query1 = "insert into tb_rincian_pengeluaran_riil

		(nomor_surat_sppd, nip, uraian_daftar_riil, jumlah_riil, tgl_pembuatan, nama_file_upload) 

		values 

		( :nomor_sppd, :nip, :rincian_biaya, :jumlah, :tgl_pembuatan_rincian, '-')";
  	
	$array_querry1 = array(
	
	':nomor_sppd'		        => $_POST['ambil_nomor_sppd'],
	
	':nip'			            => $_POST['nip'],

 	':rincian_biaya'	        => $_POST['rincian_biaya_default'],

	':jumlah'		            => $_POST['jml_biaya_default'],

	':tgl_pembuatan_rincian'    => $_POST['tgl_pembuatan_rincian']

    	);
	
	
	$array_querry2 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_2'],

	':jumlah'		=> $_POST['jml_biaya_2'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']

    	);

   		$array_querry3 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_3'],

	':jumlah'		=> $_POST['jml_biaya_3'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);
 
	$array_querry4 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_4'],

	':jumlah'		=> $_POST['jml_biaya_4'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);
	
	$array_querry5 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_5'],

	':jumlah'		=> $_POST['jml_biaya_5'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);

	$array_querry6 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_6'],

	':jumlah'		=> $_POST['jml_biaya_6'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);

	$array_querry7 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_7'],

	':jumlah'		=> $_POST['jml_biaya_7'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);

	$array_querry8 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_8'],

	':jumlah'		=> $_POST['jml_biaya_8'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);

	$array_querry9 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_9'],

	':jumlah'		=> $_POST['jml_biaya_9'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);

	$array_querry10 = array(
	
	':nomor_sppd'		=> $_POST['ambil_nomor_sppd'],
	
	':nip'			=> $_POST['nip'],

 	':rincian_biaya'	=> $_POST['rincian_biaya_10'],

	':jumlah'		=> $_POST['jml_biaya_10'],

	':tgl_pembuatan_rincian'=> $_POST['tgl_pembuatan_rincian']


    	);

    	


	try {

		$statement_update   = $db->prepare($query_update );

        	$hasil_update = $statement_update->execute($array_simpan_update);

	    
 //SEMENTARA DIMATIKAN

        	$statement_nya   = $db->prepare($query1);        	
			
		if($_POST['rincian_biaya_default'] <> "") {
        	
		$result = $statement_nya->execute($array_querry1);
		}

		
		if($_POST['rincian_biaya_2'] <> "") {
        	
		$result2 = $statement_nya->execute($array_querry2);

		}
		
		if($_POST['rincian_biaya_3'] <> "") {
        	
		$result3 = $statement_nya->execute($array_querry3);

		}

		if($_POST['rincian_biaya_4'] <> "") {
        	
		$result4 = $statement_nya->execute($array_querry4);

		}

		if($_POST['rincian_biaya_5'] <> "") {
        	
		$result5 = $statement_nya->execute($array_querry5);

		}

		if($_POST['rincian_biaya_6'] <> "") {
        	
		$result6 = $statement_nya->execute($array_querry6);

		}

		if($_POST['rincian_biaya_7'] <> "") {
        	
		$result7 = $statement_nya->execute($array_querry7);

		}

		if($_POST['rincian_biaya_8'] <> "") {
        	
		$result8 = $statement_nya->execute($array_querry8);

		}

		if($_POST['rincian_biaya_9'] <> "") {
        	
		$result9 = $statement_nya->execute($array_querry9);

		}

		if($_POST['rincian_biaya_10'] <> "") {
        	
		$result10 = $statement_nya->execute($array_querry10);

		}
	    

    	}

    		catch (PDOException $ex) {

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Sorry Cek Query nya Lagi !!! Coba lagi yah!";

        	die(json_encode($jawaban_nya));

    	}


    	$jawaban_nya["sukses"] = 1;

    	$jawaban_nya["pesan"] = "Upss... Thank You !!!";

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