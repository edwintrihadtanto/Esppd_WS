<?php
//$con = pg_connect("host=103.184.180.97 port=5432 dbname=db_madiun user='postgres' password='darmayu'");
// $host        = "host=103.184.180.97";
// $port        = "port=5432";
// $dbname      = "dbname=db_madiun";
// $credentials = "user=postgres password=darmayu";

// $con= pg_connect( "$host $port $dbname $credentials"  ) or die("Could not connect: " . pg_last_error());

// echo"x";exit();

     
/**
Initialize API header parameters
*/
$consid    = "21780";
$secretKey = "1hDF0B4057";
      /**
      Initialize API header parameters
      */
     

    // Computes the timestamp
    date_default_timezone_set('UTC');
    //date_default_timezone_set('Asia/Jakarta');

	$tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
    // Computes the signature by hashing the salt with the secret key as the key
    $signature = hash_hmac('sha256', $consid."&".$tStamp, $secretKey, true);
    // base64 encode…
    $encodedSignature = base64_encode($signature);

    $ch = curl_init();
    $headers = array(
        'X-cons-id: '.$consid .'',
        'X-timestamp: '.$tStamp.'' ,
        'X-signature: '.$encodedSignature.'',
        'Content-Type: Application/JSON',          
        'Accept: Application/JSON'
    );


    /** 
      Getting record from API Aplicares
    */           
    curl_setopt($ch, CURLOPT_URL, "https://new-api.bpjs-kesehatan.go.id/aplicaresws/rest/bed/read/0216R010/1/100");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($ch);
    $err = curl_error($ch);

    //print_r($err);
   // print_r($content);  
    
    $data = json_decode($content,true);
    //print_r($data);
    //echo "<br><br><br>"; 

    foreach ($data["response"] as $record) {
      //print_r($record);
    }

    $datax = array( 'data'  => $record );
    $superman = json_encode($datax);

    //echo"$superman";
    // create or update json file
    $fp = fopen("list.json", "w");
    fwrite($fp, $superman);
    fclose($fp);

    // close cURL resource, and free up system resources
    curl_close($ch);       

?>
<!DOCTYPE html>
<html>
<head>
<title>View data from BPJS-Aplicares</title>
<!--<link rel="stylesheet" type="text/css" href="datatables/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.css">   
<link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.css">-->
<link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

</head>
<body>
    <table id="list-table" class="table table-striped" cellspacing="0"> <!--table table-striped table-bordered-->
        <thead>
            <tr>
                <th style="width:10px">Last Updates</th>
                <th style="width:10px">Tersedia Pria Wanita</th>
                <th style="width:10px">Kapasitas</th>
                <th style="width:10px">Nama Ruang</th>
                <th style="width:10px">Nama Kelas</th>
                <th style="width:10px">Kode Ruangan</th>
                <th style="width:10px">Tersedia</th>
                <th style="width:10px">Row Number</th>
                <th style="width:10px">Tersedia Wanita</th>
                <th style="width:10px">Tersedia Pria</th>
                <th style="width:10px">Kode Kelas</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>


    <!--<script src="jQuery/jQuery-2.1.4.min.js"></script>
    <script src="datatables/jquery.dataTables.min.js"></script>  
    <script src="datatables/bootstrap.js"></script>  
    <script src="datatables/dataTables.bootstrap.min.js"></script> -->    
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> 
       
    <script type="text/javascript">
        $(document).ready(function(){  
        $('#list-table').DataTable({  
            "ajax"     :     "../list.json", 
            "columns"  :  [
                    { "data" : "lastupdate" },  
                    { "data" : "tersediapriawanita" },  
                    { "data" : "kapasitas" },
                    { "data" : "namaruang" }, 
                    { "data" : "namakelas" },
                    { "data" : "koderuang" },
                    { "data" : "tersedia" }, 
                    { "data" : "rownumber" },
                    { "data" : "tersediawanita" },
                    { "data" : "tersediapria" }, 
                    { "data" : "kodekelas" }                   
                ]  
            });  
        });      
    </script>

</body>
</html>