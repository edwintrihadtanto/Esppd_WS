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
        if (($_POST['nip'] == '19601021 198511 1 001')&&($row['nip'] == '19601021 198511 1 001')){ // TERKECUALI DIREKTUR
            
        }else if ($_POST['nip'] == $row['nip']) {
            
		    $cek_data = true;
		    
	    }
    }

if ($cek_data) {
		
//DISINI SEHARUSNYA TERDAPAT PROSES PENGECAKAN / QUERRY UNTUK TIDAK TERJADI DUPLIKASI PADA DATABASE DENGAN NOMOR SPT DAN NIP YANG SAMA



		$jawaban_nya["sukses"] = 0;

		$jawaban_nya["pesan"] = "Maaf Data Anda Belum Tercatat";
		
		die(json_encode($jawaban_nya));
}else {

	
	//------------------------------------------------------------------
	$nip_pembuatlaporanperj			= $_POST['nip_pembuatlaporanperj'];
	
	if ($_POST['nip'] == $nip_pembuatlaporanperj){
	    
	$query_update = "UPDATE tb_laporan_petugas_stlh_perj_dinas SET  hasil_pertemuan = :hasil_pertemuan, masalah = :masalah, saran = :saran, lain_lain = :lain_lain, tgl_pembuatan_laporan = :tgl_pembuatan_laporan
        WHERE nomor_spt = :nomor_spt and nip = :nip " ;

	 $tgl = new DateTime($_POST['tgl_pembuatan_laporan']);	
  	
	 $tgl_pembuatan_laporan = $tgl ->format('Y-m-d');

	$update_query = array(
	
	':nomor_spt'		    	=> $_POST['ambil_nomor_spt'],
	
	':nip'			        => $_POST['nip'],

	':hasil_pertemuan'	    	=> $_POST['hasil_pertemuan'],

	':masalah'		        => $_POST['masalah'],

	':saran'		        => $_POST['saran'],

	':lain_lain'		    	=> $_POST['lain_lain'],

	':tgl_pembuatan_laporan'	=> $tgl_pembuatan_laporan

 	
    	);

    $update_status = "UPDATE tb_input_sppdbaru SET status_laporan_petugas = 'SUDAH' WHERE nomor_spt = :nomor_spt" ;
 
	    $update_query_status = array(
	
	    ':nomor_spt'		    	=> $_POST['ambil_nomor_spt']
    	);

   
    	try {

		    $statement_update   = $db -> prepare($query_update);

        	$result = $statement_update -> execute($update_query);
        	
        	 $statement_update2   = $db -> prepare($update_status);

        	$result2 = $statement_update2 -> execute($update_query_status);

    	}

    		catch (PDOException $ex) {

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Database Error ... Gagal Update/Insert !!!";

        	die(json_encode($jawaban_nya));

    	}

    

    	$jawaban_nya["sukses"] = 1;

    	$jawaban_nya["pesan"] = "Update Laporan Perjalanan Dinas Berhasil !!! ";

    	echo json_encode($jawaban_nya);
    	
	}else{
	    $jawaban_nya["sukses"] = 0;

    	$jawaban_nya["pesan"] = "Update Laporan Gagal, Pembuat Laporan adalah NIP/NPK. $nip_pembuatlaporanperj";

    	echo json_encode($jawaban_nya);
	}

}    


} else {

?>

 <h1>Register</h1> 

 <form action="update_lap_perj.php" method="post"> 

     Nomor Test:<br /> <input type="text" name="ambil_nomor_spt" value="" /> <br /><br /> 

     <input type="submit" value="Register User Baru" /> 

 </form>

 <?php

}

?> 