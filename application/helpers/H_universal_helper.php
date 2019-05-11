<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function cutForDate($string){
    return substr($string,0,10);
  }

  function fullTime($string){
    return date("d F Y , H:i:s", strtotime($string));
  }

  function halfnoTime($string){
    return date("d F Y", strtotime($string));
  }

  function jsdate_to_db1($a) {
    $b = str_replace("/","-",substr($a,0,10));
    $c = date("Y-m-d", strtotime($b));
    $d = $c . " 00:00:00";
    return $d;
  }

  function jsdate_to_db2($a) {
    $b = str_replace("/","-",substr($a,13,20));
    $c = date("Y-m-d", strtotime($b));
    $d = $c . " 00:00:00";
    return $d;
  }

  function jsdate_range_format($a) {
    $b = date("d/m/Y", strtotime($a));
    return $b;
  }

  function jsdate_range_format2($a) {
    $b = date("d M Y", strtotime($a));
    return $b;
  }

  function test(){
    $this->load->library('email');

    //konfigurasi email
    $config = array();
    $config['charset'] = 'utf-8';
    $config['useragent'] = 'Codeigniter';
    $config['protocol']= "smtp";
    $config['mailtype']= "html";
    $config['smtp_host']= "ssl://smtp.gmail.com";
    $config['smtp_port']= 465;
    $config['smtp_timeout']= "5";
    $config['smtp_user']= "tugasakhirta2018@gmail.com";
    $config['smtp_pass']= "?1a2b3c4d5e";
    $config['crlf']="\r\n";
    $config['newline']="\r\n";

    $config['wordwrap'] = TRUE;

    $this->email->initialize($config);
    $this->email->from('Koperasi Dharma Bakti');
    $this->email->to("riowidhapaulana@gmail.com");
    $this->email->subject('judul');
    $this->email->message('isi');

    if($this->email->send()){
        echo "pengiriman email Success";
    }
    else{
        echo "pengiriman email Failed";
    }

  }

  function sufflekata($jumlah)
  {
    return substr(str_shuffle(md5(time())),0,$jumlah);
  }

  function suffleangka($jumlah)
  {
    $angka="1234567890";
    return substr(str_shuffle($angka),0,$jumlah);
  }

  function rupiahToInt($jumlah)
  {
    return str_replace(array("Rp",".",",00"," "," ,00"),"",$jumlah);
  }

  function rupiahToInt2($jumlah)
  {
    return str_replace(array("Rp",".",","," "),"", $jumlah);
  }

  function kirim_sms($nohp, $message, $return = '0')
  {
  	$CI =& get_instance();

  	$smsgatewayurl='https://reguler.zenziva.net/';
  	$userkey="9uh1l2";
  	$passkey="wbib7ofkbj";
  	$message=urlencode($message);
  	$elementapi='/apps/smsapi.php';
    https://reguler.zenziva.net/apps/smsapi.php?userkey=9uh1l2&passkey=wbib7ofkbj&nohp=081224499212&pesan=tes
  	$parameterapi=$elementapi.'?userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$nohp.'&pesan='.$message;
  	$smsgatewaydata=$smsgatewayurl.$parameterapi;
  	$url=$smsgatewaydata;
  	$ch=curl_init();
  	curl_setopt($ch, CURLOPT_POST, false);
  	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  	$output=curl_exec($ch);
  	if (!$output) {
  		$output=file_get_contents($smsgatewaydata);
  	}
  	if ($return=='1')
  	{
  		return $output;
  	}
      // else
    	// {
    	// 	echo "Berhasil Dikirimm";
    	// }
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


  function terbilang($x, $style=3) { //Merubah interger menjadi kalimat sebut
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper(str_replace("  ", " ", $hasil));
            break;
        case 2:
            $hasil = strtolower(str_replace("  ", " ", $hasil));
            break;
        case 3:
            $hasil = ucwords(str_replace("  ", " ", $hasil));
            break;
        default:
            $hasil = ucfirst(str_replace("  ", " ", $hasil));
            break;
    }
    return $hasil;
    //echo terbilang($nilai, $style=4); echo '<br/>';
  }

  function rupiahset($angka){
  	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
  	return $hasil_rupiah;
  }

  function rupiahform($angka){
    $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
    return $hasil_rupiah;
  }

  function rupiahdot($angka){
    $hasil_rupiah = number_format($angka,0,',','.');
    return $hasil_rupiah;
  }



  function timeAgo($time_ago)
  {
      $time_ago = strtotime($time_ago);
      $cur_time   = time();
      $time_elapsed   = $cur_time - $time_ago;
      $seconds    = $time_elapsed ;
      $minutes    = round($time_elapsed / 60 );
      $hours      = round($time_elapsed / 3600);
      $days       = round($time_elapsed / 86400 );
      $weeks      = round($time_elapsed / 604800);
      $months     = round($time_elapsed / 2600640 );
      $years      = round($time_elapsed / 31207680 );
      // Seconds
      if($seconds <= 60){
          return "Baru saja";
      }
      //Minutes
      else if($minutes <=60){
          if($minutes==1){
              return "1 Menit yang lalu";
          }
          else{
              return "$minutes Menit yang lalu";
          }
      }
      //Hours
      else if($hours <=24){
          if($hours==1){
              return "1 Jam yang lalu";
          }else{
              return "$hours Jam yang lalu";
          }
      }
      //Days
      else if($days <= 7){
          if($days==1){
              return "Kemarin";
          }else{
              return "$days Hari yang lalu";
          }
      }
      //Weeks
      else if($weeks <= 4.3){
          if($weeks==1){
              return "1 Minggu yang lalu";
          }else{
              return "$weeks Minggu yang lalu";
          }
      }
      //Months
      else if($months <=12){
          if($months==1){
              return "1 Bulan yang lalu";
          }else{
              return "$months Bulan yang lalu";
          }
      }
      //Years
      else{
          if($years==1){
              return "1 Tahun yang lalu";
          }else{
              return "$years Tahun yang lalu";
          }
      }
    }

    function clear_input($value)
    {
      return strip_tags(addslashes(htmlspecialchars($value)));
    }
