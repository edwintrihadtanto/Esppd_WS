<?php
    if ( ! function_exists('umur'))
    {
        function umur($tgl_lahir) {
            $lahir  = new DateTime($tgl_lahir);
            $today  = new DateTime();
            $umur   = $today->diff($lahir);
            $thn    = $umur->y;
            $bln    = $umur->m;
            $hr     = $umur->d;
            return $thn." tahun ".$bln." bulan ".$hr." hari";
        }

    }

    if ( ! function_exists('umurdepan'))
    {
        function umurdepan($tgl_lahir) {
            $lahir  = new DateTime($tgl_lahir);
            $today  = new DateTime();
            $umur   = $today->diff($lahir);
            $thn    = $umur->y;
            $bln    = $umur->m;
            $hr     = $umur->d;
            //return $thn;
            return $thn." Thn";
        }

    }

    if ( ! function_exists('tgl_indo')){
        function date_indo($tgl)
        {
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tanggal = $pecah[2];
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal.' '.$bulan.' '.$tahun;
        }
    }
      
    if ( ! function_exists('bulan'))
    {
        function bulan($bln)
        {
            switch ($bln)
            {
                case 1:
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
        }
    }
 
    //Format Shortdate
    if ( ! function_exists('shortdate_indo'))
    {
        function shortdate_indo($tgl)
        {
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tanggal = $pecah[2];
            $bulan = short_bulan($pecah[1]);
            $tahun = $pecah[0];
            //return $tanggal.'-'.$bulan.'-'.$tahun;
            return $tahun.'-'.$bulan.'-'.$tanggal;
        }
    }

       //Format Shortdate
       if ( ! function_exists('tglindo'))
       {
           function tglindo($tgl)
           {
               $ubah = gmdate($tgl, time()+60*60*8);
               $pecah = explode("-",$ubah);
               $tanggal = $pecah[2];
               $bulan = short_bulan($pecah[1]);
               $tahun = $pecah[0];
               //return $tanggal.'-'.$bulan.'-'.$tahun;
               return $tanggal.'-'.$bulan.'-'.$tahun;
           }
       }
      
    if ( ! function_exists('short_bulan'))
    {
        function short_bulan($bln)
        {
            switch ($bln)
            {
                case 1:
                    return "01";
                    break;
                case 2:
                    return "02";
                    break;
                case 3:
                    return "03";
                    break;
                case 4:
                    return "04";
                    break;
                case 5:
                    return "05";
                    break;
                case 6:
                    return "06";
                    break;
                case 7:
                    return "07";
                    break;
                case 8:
                    return "08";
                    break;
                case 9:
                    return "09";
                    break;
                case 10:
                    return "10";
                    break;
                case 11:
                    return "11";
                    break;
                case 12:
                    return "12";
                    break;
            }
        }
    }
 
    //Format Medium date
    if ( ! function_exists('mediumdate_indo'))
    {
        function mediumdate_indo($tgl)
        {
            $ubah = gmdate($tgl, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tanggal = $pecah[2];
            $bulan = medium_bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal.'-'.$bulan.'-'.$tahun;
        }
    }
      
    if ( ! function_exists('medium_bulan'))
    {
        function medium_bulan($bln)
        {
            switch ($bln)
            {
                case 1:
                    return "Jan";
                    break;
                case 2:
                    return "Feb";
                    break;
                case 3:
                    return "Mar";
                    break;
                case 4:
                    return "Apr";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Jun";
                    break;
                case 7:
                    return "Jul";
                    break;
                case 8:
                    return "Ags";
                    break;
                case 9:
                    return "Sep";
                    break;
                case 10:
                    return "Okt";
                    break;
                case 11:
                    return "Nov";
                    break;
                case 12:
                    return "Des";
                    break;
            }
        }
    }
     
    //Long date indo Format
    if ( ! function_exists('longdate_indo')){
        function longdate_indo($tanggal)
        {
            $ubah = gmdate($tanggal, time()+60*60*8);
            $pecah = explode("-",$ubah);
            $tgl = $pecah[2];
            $bln = $pecah[1];
            $thn = $pecah[0];
            $bulan = bulan($pecah[1]);
      
            $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
            $nama_hari = "";
            if($nama=="Sunday") {$nama_hari="Minggu";}
            else if($nama=="Monday") {$nama_hari="Senin";}
            else if($nama=="Tuesday") {$nama_hari="Selasa";}
            else if($nama=="Wednesday") {$nama_hari="Rabu";}
            else if($nama=="Thursday") {$nama_hari="Kamis";}
            else if($nama=="Friday") {$nama_hari="Jumat";}
            else if($nama=="Saturday") {$nama_hari="Sabtu";}
            return ' '.$nama_hari.', '.$tgl.' '.$bulan.' '.$thn;
        }
    }
    function format_ribuan($value) {
        if (!$value)
            return 0;
        return number_format($value, 0, ',' , '.');
    }
    function kekata($x) {
        $x = abs($x);
        $angka = array("", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($x <12) {
            $temp = " ". $angka[$x];
        } else if ($x <20) {
            $temp = kekata($x - 10). " belas";
        } else if ($x <100) {
            $temp = kekata($x/10)." puluh". kekata($x % 10);
        } else if ($x <200) {
            $temp = " seratus" . kekata($x - 100);
        } else if ($x <1000) {
            $temp = kekata($x/100) . " ratus" . kekata($x % 100);
        } else if ($x <2000) {
            $temp = " seribu" . kekata($x - 1000);
        } else if ($x <1000000) {
            $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
        } else if ($x <1000000000) {
            $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
        } else if ($x <1000000000000) {
            $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
        } else if ($x <1000000000000000) {
            $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
        }     
            return $temp;
    }
    
    function terbilang($x, $style=4) {
        if($x<0) {
            $hasil = "minus ". trim(kekata($x));
        } else {
            $hasil = trim(kekata($x));
        }     
        switch ($style) {
            case 1:
                $hasil = strtoupper($hasil);
                break;
            case 2:
                $hasil = strtolower($hasil);
                break;
            case 3:
                $hasil = ucwords($hasil);
                break;
            default:
                $hasil = ucfirst($hasil);
                break;
        }     
        return $hasil;
    }
?>