<?php

require("config_koneksi/konfigurasi_nya.php");

if (!empty($_POST)) {
   

	if (empty($_POST['ambil_nomor_surat'])) {

	        $jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Nomor Surat Laporan SPPD Lembar 1 Wajib Diisi"; 
        
	        die(json_encode($jawaban_nya));

	}

	     $query        = " SELECT * FROM tb_input_sppdbaru WHERE nomor_surat_sppd = :no_sppd";

	     $yang_di_query = array(

	     ':no_sppd' => $_POST['ambil_nomor_surat']
	
	     );
    
    			//jalankan query-nya

	    	try {

	        	// bikin statement apa yang mau di query ke database. 

        	$statement_nya   = $db->prepare($query);

	        $result = $statement_nya->execute($yang_di_query);

		}catch (PDOException $ex) {
        
        		//jadi developer yg baik yah, jelaskan kepada user apa yg terjadi:

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Databasenya salah. Di coba lagi yah!";

        	die(json_encode($jawaban_nya));

    		}

    

 // ambil semua data yang telah tercatat di database sehingga 

 // aplikasi bisa lihat apakah nama tsb sudah ada atau belum dan

 // kalau nama sudah ada maka berhenti eksekusi dengan membunuh 

 // aplikasinya dengan metode die();

	    
		$row = $statement_nya->fetch();

    		if ($row) {
      

        		$jawaban_nya["sukses"] = 1;

        		$jawaban_nya["pesan"] = "Nomor Surat Laporan SPPD Lembar 1 Telah Terdaftar";

        		die(json_encode($jawaban_nya));

    		}

	
	$query        = "SELECT * FROM tb_input_sppdbaru WHERE nomor_spt = :no_spt and nip = :nip";

	     $cek_spt_dan_nip = array(

	     ':no_spt' 	=> $_POST['ambil_nomor_spt'],

	     ':nip'	=> $_POST['nip']

	
	     );
    
		try {
	        	
        	$statement   = $db->prepare($query);

	        $result = $statement->execute($cek_spt_dan_nip);

		}catch (PDOException $ex) {
        
        		//jadi developer yg baik yah, jelaskan kepada user apa yg terjadi:

        	$jawaban_nya["sukses"] = 0;

        	$jawaban_nya["pesan"] = "Tidak Ditemukan";

        	die(json_encode($jawaban_nya));

    		}

		$row = $statement->fetch();

    		if ($row) {
      

        		$jawaban_nya["sukses"] = 1;

        		$jawaban_nya["pesan"] = "Ups... Data Petugas Telah Terdaftar dengan No SPT yang sama";

        		die(json_encode($jawaban_nya));

    		}


 // tapi kalau nama usernya ok maka aplikasi masih terus hidup dan

 // di lanjutkan dengan masukan data yang di input oleh user

 // maka perlu membuat query baru pakai cara berikut yah biar

 // cukup susah buat orang nakal untuk buat sql injection

 

    $query = "insert into tb_input_sppdbaru 

		(nomor_spt, nomor_surat_sppd, nip, biaya_perj, maksud_perj, 

		alat_angkutan, tempat_brngkt, tempat_tujuan, 

		lama_perj, tgl_brngkt, tgl_kembali, 

		tambh_pengikut1, tambh_pengikut2, tambh_pengikut3, tambh_pengikut4, 

		tambh_pengikut5, tanggal_aktivitas, waktu_aktivitas, status, 

		nip_petugas_admin, akun_pembebanan_anggaran, status_laporan_petugas, status_rincian_biaya, status_riil) 


		values 

		(:nomor_spt, :nomor_surat, :nip, :biaya_perj, :maksud_perj, 

		:alat_angkutan, :tempat_brngkt, :tempat_tujuan, 

		:lama_perj, :date1, :date2,  

		:tambh_pengikut1, :tambh_pengikut2, :tambh_pengikut3, :tambh_pengikut4, 

		:tambh_pengikut5, :tgl_aktiviti, :jam_aktiviti, :status_cetak, 

		:nip_petugas_admin, :akun, :status_laporan_petugas, :status_rincian_biaya, :status_riil )";

 
// berikut adalah blanko kosong harus di update dengan data yang sebenarnya

    
 $tgl = new DateTime($_POST['tgl_brngkt']);	
 
 $jam = new DateTime($_POST['tgl_kembali']);		
	
 $ambil_tgl_brngkt = $tgl ->format('Y-m-d');	

 $ambil_tgl_kembali = $jam ->format('Y-m-d');


    $yang_di_query = array(

       	':nomor_spt' => $_POST['ambil_nomor_spt'],

	':nomor_surat' => $_POST['ambil_nomor_surat'],	

	':nip' => $_POST['nip'],

	':nip_petugas_admin' => $_POST['nip_petugas_admin'],

	':biaya_perj' => $_POST['biaya_perj'],

	':maksud_perj' => $_POST['maksud_perj'],

	':alat_angkutan' => $_POST['alat_angkutan'],

	':tempat_brngkt' => $_POST['tempat_brngkt'],

	':tempat_tujuan' => $_POST['tempat_tujuan'],

	':lama_perj' => $_POST['lama_perj'],

	':date1' => $ambil_tgl_brngkt,	

	':date2' => $ambil_tgl_kembali,

	':tambh_pengikut1' => $_POST['tambh_pengikut1'],

	':tambh_pengikut2' => $_POST['tambh_pengikut2'],

	':tambh_pengikut3' => $_POST['tambh_pengikut3'],

	':tambh_pengikut4' => $_POST['tambh_pengikut4'],

	':tambh_pengikut5' => $_POST['tambh_pengikut5'],

	':tgl_aktiviti' => $_POST['tgl_aktivitas'],

	':jam_aktiviti' => $_POST['jam_aktivitas'],	

	':status_cetak' => 'BELUM',				

	':akun' => $_POST['akun'],

	':status_laporan_petugas' => 'BELUM',

	':status_rincian_biaya' => 'BELUM',

	':status_riil' => 'BELUM'		
		

    );

    // jalankan query akhir untuk mendaftar user baru

    try {

        $statement_nya   = $db->prepare($query);

        $result = $statement_nya->execute($yang_di_query);

    }

    catch (PDOException $ex) {

        

        $jawaban_nya["sukses"] = 0;

        $jawaban_nya["pesan"] = "Sorry Cek Query nya Lagi !!! Coba lagi yah!";

        die(json_encode($jawaban_nya));

    }

    

    $jawaban_nya["sukses"] = 1;

    $jawaban_nya["pesan"] = "Simpan Sukses!";

    echo json_encode($jawaban_nya);

    

    //mau bawa kemana usernya? terserah anda sebagai developer.

    //header("Location: login_nya.php"); 

    //die("Redirecting ke halaman login_nya.php");

 //tapi disini saya hanya bilang bahwa registrasinya berhasil

 //dan kalau mau baca komentar silahkan login lah kawan

    

    

} else {

?>

 <h1>Register</h1> 

 <form action="coba.php" method="post"> 

     Nomor Test:<br /> <input type="text" name="ambil_nomor_surat" value="" /> <br /><br /> 

     Nip:<br /> <input type="text" name="nip" value="" /> <br /><br /> 


     <input type="submit" value="Register User Baru" /> 

 </form>

 <?php

}

?> 