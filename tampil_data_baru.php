<?php

require("config_koneksi/konfigurasi_nya.php");

$query = "SELECT tb_pegawai.nip, nama_pegawai, jabatan, golongan, pass FROM tb_pegawai LEFT JOIN tb_user

ON tb_pegawai.nip = tb_user.nip order by nama_pegawai ASC";

//query-nya di eksekusi
try {
    $apa_yang_di_query  =  array();
    $statement_nya   = $db->prepare($query);
    $result = $statement_nya->execute($apa_yang_di_query);
 
}
catch (PDOException $ex) {
    $jawab["sukses"] = 0;
    $jawab["pesan"] = "Database_nya Salah!";
    die(json_encode($jawab));
}
// ambil semua baris komentar yang di ketemukan dan
// masukan semuanya kedalam sebuah array() menggunakan fetchAll() 
$rows = $statement_nya->fetchAll();


if ($rows) {
    $jawab["sukses"] = 1;
    $jawab["pesan"] = "Telah ada data pegawai!";
    $jawab["semua_komentar"]   = array();
    
    foreach ($rows as $baris) {
        $komentar         = array();
  	$komentar["tb_pegawai.nip"]  = $baris["tb_pegawai.nip"];
        $komentar["nama_pegawai"] = $baris["nama_pegawai"];
        $komentar["jabatan"]    = $baris["jabatan"];
        $komentar["golongan"]  = $baris["golongan"];
        
        
        //setelah di masukan ke dalam array maka
  //jawaban JSON harus di update
        array_push($jawab["semua_komentar"], $komentar);
    }
    
    // tunjukan jawaban JSON ke layar
    echo json_encode($jawab);
    
    
} else {
    $jawab["sukses"] = 0;
    $jawab["pesan"] = "Belum ada data pegawai!";
    die(json_encode($jawab));
}

?>