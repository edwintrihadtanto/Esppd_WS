<?php 
  
  $host     = ""; 
  $username = ""; 
  $password = ""; 
  $dbname   = ""; 

    

$link = @mysql_connect($host, $username, $password) or die('Cannot connect to the DB');

@mysql_select_db($dbname, $link) or die('Gagal Koneksi Dbase!!');

// $link = mysqli_connect($host,$username,$password,$dbname);
// if ($link->connect_error) {   
//    die('Maaf koneksi gagal: '. $connect->connect_error);
// }


$con = mysqli_connect($host,$username,$password,$dbname) or die('Unable to Connect Databases');


 // pakai utf8 agar databasenya bisa muat banyak jenis karakter seperti

 // huruf dan agka 

 // silahkan baca2 tentang utf8 di 

 // http://en.wikipedia.org/wiki/UTF-8 

    $pakai_utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 

     

 // bagi mereka yang pintar PHP tentunya tak asing dengan try/catch

 // Metode tersebut di pakai utk menangkap kesalahan pada kode yg

 // bersifat object oriented,

 // pertama di eksekusi dalam 'try' dan kalau memukan kesalahan maka akan

 // berhenti eksekusi dan melompat ke 'catch' dengan sebuah pesan agar

 // pengguna tak garuk2 kepala 

 // Silahkan baca2 tentang exceptions di  

 // http://us2.php.net/manual/en/language.exceptions.php 

    try 

    { 

  // statement dalam wilayah 'try' ini membukan koneksi ke datbase menggunakan

  // PDO library 

  // PDO di design utk menyediakan flexible interface antara PHP dengan 

  // banyak jenis database servers. 

  // silahkan baca2 tentang PDO di 

  // http://us2.php.net/manual/en/class.pdo.php 

        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $pakai_utf8); 

    } 

    catch(PDOException $eksepsinya) 

    { 

  // jika ada kesalahan saat buka koneksi ke database maka 

  // akan terperangkap disini dan berhenti eksekusi dan

  // menunjukan pesan (apanya yg salah)

  // Kalau utk produksi mungkin tak perlu output $eksepsinya->getMessage(). 

  // agar tak mudah di mainkan oleh orang nakal. 

         

        die("Koneksi ke database Gagal: " . $eksepsinya->getMessage()); 

    } 

     

 // berikut adalah konfigurasi PDO mengeluarkan exception ketika

 // menemukan kesalahan dalam kode, agar bisa di pakai utk 

 // try/catch  

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     

 // berikut adalah konfigurasi PDO utk melihat barisan data(rows) di

 // dalam database menggunakan 'associative array'

 // maksudnya array akan ada 'string indexes', dimana isi 

 // string me-representasikan nama kolom di database . 

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

     

 // get_magic_quotes_gpc sudah wafat tapi jaga kemungkinan jikalau

 // ada manusia yg masih pakai PHP tua bangka (PHP 5.3 kebawah) maka

 // kode berikut adalah berguna untuk mengagaglkan magic quotes.  

 // baca tentang magic qoutes selengkapnya di: 

 // http://php.net/manual/en/security.magicquotes.php 

    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 

    { 

        function matikan_magic_quotes_nya(&$array) 

        { 

            foreach($array as &$value) 

            { 

                if(is_array($value)) 

                { 

                    matikan_magic_quotes_nya($value); 

                } 

                else 

                { 

                    $value = stripslashes($value); 

                } 

            } 

        } 

     

        matikan_magic_quotes_nya($_POST); 

        matikan_magic_quotes_nya($_GET); 

        matikan_magic_quotes_nya($_COOKIE); 

    } 

     

 // berikut utk informasikan web browser bahwa isinya adalah di

 // encoded dengan UTF-8 sehingga content yang di return adalah

 // dalam bentuk utf8 juga

    header('Content-Type: text/html; charset=utf-8'); 

     

 // 'sessions' di gunakan utk menyimpan informasi tentang

 // pengunjung dari halaman ke halaman

 // Berbeda dengan 'cookie', sessions menyimpan infromasi di server

 // Namun demikian, dalam banyak kasus 'sessions' masih menggunakan

 // cookies tapi pengunjung juga harus menghidupkan cookie_nya  

 // silahkan baca2 tentang cookie di: 

 // http://us.php.net/manual/en/book.session.php 

    session_start(); 



?>