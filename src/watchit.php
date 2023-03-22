
<?php

$url= "https://gocast2.com/crichdws.php?player=mobile&live=starhindi";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Referer: https://gocast2.com",
   "Content-Type: application/vnd.apple.mpegurl",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

function lpcode($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
     }
     $start='return([';
     $end='].join("")';
     $myoutput=lpcode($resp,$start,$end);

$shikari = str_replace('"','',$myoutput);
$shikari1 = str_replace(',','',$shikari);
$shikari2 = stripslashes($shikari1);


//new curl

$curl1 = curl_init($shikari2);
curl_setopt($curl1, CURLOPT_URL, $shikari2);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);

$headers1 = array(
   "Referer: https://gocast2.com",
);
curl_setopt($curl1, CURLOPT_HTTPHEADER, $headers1);
//for debug only!
curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, false);

$resp1 = curl_exec($curl1);
curl_close($curl1);

//hls setup and hls//

$elink = "https://sp5.flowerscast.com:999/hls/";
$opts = array(
  'http'=>array(
    'method'=>"GET",
    
  )
);
$context = stream_context_create($opts);
$f = preg_replace("/(?<=ts).*/", "", $resp1);
$g = preg_replace("/(?=starhindi).*ts/", "hin.php?ts=".$elink."$0", $f);



echo $g;

?>
