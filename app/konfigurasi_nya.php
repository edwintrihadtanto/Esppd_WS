<?php 
  
    $host     = ""; 
    $username = ""; 
    $password = ""; 
    $dbname   = ""; 

    $con        = mysqli_connect($host,$username,$password,$dbname) or die('Unable to Connect Databases');
    $pakai_utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
    try
    { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $pakai_utf8); 
    }catch(PDOException $eksepsinya){ 
        die("Koneksi Gagal DBase: " . $eksepsinya->getMessage()); 
    } 

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){

        function matikan_magic_quotes_nya(&$array){

            foreach($array as &$value){

                if(is_array($value)){
                    matikan_magic_quotes_nya($value);
                }else{
                    $value = stripslashes($value);
                }
            }
        }
        matikan_magic_quotes_nya($_POST);
        matikan_magic_quotes_nya($_GET);
        matikan_magic_quotes_nya($_COOKIE);
    } 

    header('Content-Type: text/html; charset=utf-8');  
    session_start(); 
?>