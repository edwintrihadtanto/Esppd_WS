**
 * @package fungsi upload
 */
 
global $filename,$error;
 
/**
 * @var $fileupload digunakan untuk mengambil nilai dari parameter $_FILE[<param>]
 * @var $target_file adalah folder untuk meletakkan file yang diupload
 * @var limit, untuk membatasi jumlah maksimal size file yang diupload (satuan Kb )
 * @param $_FILE[<param>], <param> diambil dari attribut name dari tag input <input name="param" />
 */
function upload_data( $fileupload = array(), $argument = array() )
{    
    global $filename,$error;
 
    if( !defined('MAIN') ){
        $error  = 'Direktori utama belum diset. <br> ';
        $error .= 'Silahkan diset dengan menggunakan fungsi ';
        $error .= 'define(\'MAIN\',dirname(__FILE__)) ';
       // $error .= 'di file config.php / file koneksi database anda / file index.php';
        return FALSE;
    }
    /** parameter default */
    $param = array(
        'target_file' => 'temp/upload',
        'limit'          => 100,
        );
 
    if( is_array($argument) && count($argument) > 0 ){
        
        # modifikasi parameter default dengan parameter baru
        $param = array_merge($param,$argument);
    }
 
    /** mengubah Array menjadi Variable */
    extract($param);
 
    if( !isset( $fileupload['error'] ) ||  is_array( $fileupload['error'] ) ){
        $error = 'Parameter Upload Salah Mohon Cek Kembali';
 
        return FALSE;
    }
 
    /** check status file yang diupload dan ketersediaan server */
    switch ($fileupload['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            $error = 'File Gagal Di kirim';
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            $error = 'Batas Upload Server tidak cukup.';
        default:
            $error = 'Unknown errors.';
    }
 
    $extention = end( explode('.', $fileupload['uploaded_file']['name']) );
 
    /** extensi file yang tidak diupload */
    $forbiden_ext = array('php','pl','jsp','asp','sh','cgi','html','css');
    
    if( in_array( $extention, $forbiden_ext ) ){
        $error = 'Ekstensi File tidak diijinkan';
        return FALSE;
    }
 
    # set limit dalam bit
    $limit_in_bit = $limit*1000; 
 
    if ( $fileupload['uploaded_file']['size'] > $limit_in_bit ) {
        $error = 'File yang diupload tidak boleh lebih dari '.$limit.' Kb';
        return FALSE;
    }
 
    # check keberadaan direktori uploads
    $target_file = trim($target_file,'/');
    if( !is_readable( MAIN . '/' . $target_file ) ){
 
        # jika tidak ada direktori yang dimaksud sistem akan membuat direktori tersebut 
        if( !mkdir( MAIN . '/' . $target_file ) ){
 
            # jika sistem gagal membuat direktori
            $error  = 'Direktori untuk meletakkan file belum ada, ';
            $error .= 'Sistem gagal membuat direktori ' . $target_file;
            return FALSE;
        }
    }
 
    # nama file dibuat unique 
    $newfilename = md5( uniqid().$fileupload["uploaded_file"]["tmp_name"] ) . '.'.$extention;
 
    # upload file 
    move_uploaded_file($fileupload["uploaded_file"]["tmp_name"], $target_file.'/'.$newfilename);
    
    $filename = $newfilename;
    
    return TRUE; 
}
 
/**
 * @return blank jika tidak ada error, jika terdapat error maka akan muncul errornya apa
 */
function get_error_upload(){
    global $error;
    return $error;
}
 
 
/**
 * @return nama file yang di acak, jika berhasil diupload
 */
function get_file_name(){
    global $filename;
    return $filename;
}