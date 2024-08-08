
<?php



require("config_koneksi/konfigurasi_nya.php");



if (!empty($_POST)) {

	if (empty($_POST['nomor_spt'])) {
    
        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Nomor Surat Perintah Tugas Wajib Diisi"; 

        die(json_encode($jawaban_nya));

    }

    $query        = " SELECT * FROM tb_spt WHERE nomor_spt = :username";
    $yang_di_query = array(

        ':username' => $_POST['nomor_spt']	
    );

    //jalankan query-nya

    try {

        // bikin statement apa yang mau di query ke database. 
        $statement_nya   = $db->prepare($query);

        $result = $statement_nya->execute($yang_di_query);
    }

    catch (PDOException $ex) {
        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Databasenya salah. Di coba lagi yah!";

        die(json_encode($jawaban_nya));

    }    

    $row = $statement_nya->fetch();

    if ($row) {

        $jawaban_nya["sukses"] = 1;

        $jawaban_nya["pesan"] = "Nomor Surat Perintah Tugas Telah Terdaftar";

        die(json_encode($jawaban_nya));

    }

   		$query_simpan_nomor_spt = "insert into tb_spt

				(nomor_spt, surat_masuk_dari, tgl_surat_masuk, 

				dasar, untuk, lama_pelaksanaan, tgl_berangkat, tgl_tiba, 

				dikeluarkan, tgl_dikeluarkan, jml_petugas, nip_petugas_admin, nip) 

				values 

				( :nomor_spt, :surat_masuk_dari, :tgl_surat_masuk, 

				:dasar, :untuk, :lama_pelaksanaan, :tgl_berangkat, :tgl_tiba,

				:dikeluarkan, :tgl_dikeluarkan, :jml_petugas,  :nip_petugas_admin, :nip_pemberi_perintah) ";
  


 // berikut adalah blanko kosong harus di update dengan data yang sebenarnya
  

 $tgl_surat_masuk = new DateTime($_POST['tgl_surat_masuk']);	

 $tgl_dikeluarkan = new DateTime($_POST['tgl_dikeluarkan']);		

 $tgl_berangkat = new DateTime($_POST['tgl_berangkat']);	

 $tgl_tiba = new DateTime($_POST['tgl_tiba']);	


 $ambil_tgl_surat_masuk = $tgl_surat_masuk ->format('Y-m-d');

 $ambil_tgl_dikeluarkan = $tgl_dikeluarkan ->format('Y-m-d');

 $ambil_tgl_berangkat = $tgl_berangkat ->format('Y-m-d');

 $ambil_tgl_tiba = $tgl_tiba ->format('Y-m-d');
 

   
 $_ambil_array_simpan_nomor_spt = array(
       
	':nomor_spt'  			=> $_POST['nomor_spt'],

	':surat_masuk_dari'  		=> $_POST['surat_masuk_dari'],

	':tgl_surat_masuk'  		=> $ambil_tgl_surat_masuk,

	':dasar'  			=> $_POST['dasar'],

	':untuk'  			=> $_POST['untuk'],

	':lama_pelaksanaan' 		=> $_POST['lama_pelaksanaan'],

	':tgl_berangkat' 		=> $ambil_tgl_berangkat,

	':tgl_tiba' 			=> $ambil_tgl_tiba,

	':dikeluarkan'  		=> $_POST['dikeluarkan'],

	':tgl_dikeluarkan' 		=> $ambil_tgl_dikeluarkan,

	':jml_petugas' 			=> $_POST['jml_petugas'],

	':nip_petugas_admin' 		=> $_POST['nip_petugas_admin'],

	':nip_pemberi_perintah'		=> $_POST['nip_pemberi_perintah']

	//':atas_nama'			=> $_POST['atas_nama'], //TIDAK DIPAKAI
 
	//':atas_nama_bawah'		=> $_POST['atas_nama_bawah'] //TIDAK DIPAKAI




    );

	$query_delete = "Delete From tb_petugas_yg_ditugaskan where nomor_spt = :nomor_spt and nip = '' " ;
  			

	$array_querry_delete = array(
	
	':nomor_spt'  	=> $_POST['nomor_spt']	

 	
    	);
	

	$query_simpan_petugas = "insert into tb_petugas_yg_ditugaskan (nomor_spt, nip) values (:nomor_spt, :nip) ";

		
		$ambil_query_simpan_nip_1 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip1']
	  
    		);
	
			
		$ambil_query_simpan_nip_2 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip2']
	  
    		);

		$ambil_query_simpan_nip_3 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip3']
	  
    		);

		$ambil_query_simpan_nip_4 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip4']
	  
    		);

		$ambil_query_simpan_nip_5 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip5']
	  
    		);

		$ambil_query_simpan_nip_6 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip6']
	  
    		);

		$ambil_query_simpan_nip_7 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip7']
	  
    		);

		$ambil_query_simpan_nip_8 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip8']
	  
    		);

		$ambil_query_simpan_nip_9 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip9']
	  
    		);

		$ambil_query_simpan_nip_10 = array(
       
		':nomor_spt'  	=> $_POST['nomor_spt'],
	
		':nip' 		=> $_POST['nip10']
	  
    		);



    // jalankan query akhir untuk mendaftar user baru



    try {	


	//----------------------

        $statement_nya   = $db->prepare($query_simpan_nomor_spt);

        $result = $statement_nya->execute($_ambil_array_simpan_nomor_spt);


  	//----------------------

	$statement_simpan_petugas   = $db->prepare($query_simpan_petugas);
		

			$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

			$hasil_6 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_6);

			$hasil_7 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_7);
        	 
			$hasil_8 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_8);

			$hasil_9 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_9);

			$hasil_10 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_10);
	
  	
	$statement_delete   = $db->prepare($query_delete);

        $result_delete = $statement_delete->execute($array_querry_delete);
				

/* //SEMENTARA FUNGSI DIBAWAH INI DIMATIKAN DIKARENAKAN ADA_ADA SAJA


		if(($_POST['jml_petugas'] == "1")&&($_POST['nip1'] != " ")) {

			$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		
        	 		
		}else if (($_POST['jml_petugas'] == "2")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] == " ")){
		
			$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);
		
		}else if (($_POST['jml_petugas'] == "3")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);

		}else if (($_POST['jml_petugas'] == "4")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] != " ")&&($_POST['nip5'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	


		}else if (($_POST['jml_petugas'] == "5")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] != " ")&&($_POST['nip5'] != " ")&&($_POST['nip6'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

		}else if (($_POST['jml_petugas'] == "6")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] != " ")&&($_POST['nip5'] != " ")&&($_POST['nip6'] != " ")&&($_POST['nip7'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

			$hasil_6 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_6);	

		}else if (($_POST['jml_petugas'] == "7")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] != " ")&&($_POST['nip5'] != " ")&&($_POST['nip6'] != " ")&&($_POST['nip7'] != " ")&&($_POST['nip8'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

			$hasil_6 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_6);

			$hasil_7 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_7);	

		}else if (($_POST['jml_petugas'] == "8")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] != " ")&&($_POST['nip5'] != " ")&&($_POST['nip6'] != " ")&&($_POST['nip7'] != " ")&&($_POST['nip8'] != " ")&&($_POST['nip9'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

			$hasil_6 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_6);

			$hasil_7 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_7);
        	 
			$hasil_8 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_8);	

		}else if (($_POST['jml_petugas'] == "9")&&($_POST['nip1'] != " ")&&($_POST['nip2'] != " ")&&($_POST['nip3'] != " ")&&($_POST['nip4'] != " ")&&($_POST['nip5'] != " ")&&($_POST['nip6'] != " ")&&($_POST['nip7'] != " ")&&($_POST['nip8'] != " ")&&($_POST['nip9'] != " ")&&($_POST['nip10'] == " ")){

	      		$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

			$hasil_6 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_6);

			$hasil_7 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_7);
        	 
			$hasil_8 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_8);

			$hasil_9 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_9);	

		}else{

			$hasil_1 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_1);		

			$hasil_2 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_2);

	 		$hasil_3 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_3);
				
			$hasil_4 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_4);	

			$hasil_5 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_5);

			$hasil_6 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_6);

			$hasil_7 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_7);
        	 
			$hasil_8 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_8);

			$hasil_9 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_9);

			$hasil_10 = $statement_simpan_petugas -> execute($ambil_query_simpan_nip_10);
				

		}	
	*/
//--------------------------------------------------------------------------------------------------------------------------

      
		

    }catch (PDOException $ex) {

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Prose Simpan Gagal !!!";

        die(json_encode($jawaban_nya));

    }
  

    $jawaban_nya["sukses"] = 1;

    $jawaban_nya["pesan"] = "Simpan Sukses!";

    echo json_encode($jawaban_nya);
 
} else {



?>



 <h1>Register</h1> 



 <form action="simpan_data_SPT.php" method="post"> 



     Nomor Test:<br /> <input type="text" name="nomor_spt" value="" /> <br /><br /> 



     Nip:<br /> <input type="text" name="nip" value="" /> <br /><br /> 





     <input type="submit" value="Register User Baru" /> 



 </form>



 <?php



}



?> 