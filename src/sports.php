<?php

$v= $_GET['v'];
$url= "https://123ecast.xyz/embed2.php?v=".$v."&vw=100%&vh=100";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Referer: https://crichdplayer.xyz/",
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
     $start='<source src="';
     $end='"';
     $myoutput=lpcode($resp,$start,$end);

$shikari = str_replace($v.'.m3u8','',$myoutput);


//new curl

$curl1 = curl_init($myoutput);
curl_setopt($curl1, CURLOPT_URL, $myoutput);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);

$headers1 = array(
   "Referer: https://123ecast.xyz",
);
curl_setopt($curl1, CURLOPT_HTTPHEADER, $headers1);
//for debug only!
curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, false);

$resp1 = curl_exec($curl1);
curl_close($curl1);

//hls setup and hls//
$cc= "?=".$v;
$elink = $shikari;
$opts = array(
  'http'=>array(
    'method'=>"GET",
    
  )
);
$context = stream_context_create($opts);
$f = preg_replace("/(?<=ts).*/", "", $resp1);
$g = preg_replace("/(".$cc.").*ts/", "hin1.php?ts=".$elink."$0", $f);


header("Content-Type: application/vnd.apple.mpegurl");
echo $g;

?>
