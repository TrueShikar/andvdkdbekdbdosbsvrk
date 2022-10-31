<?php

$url= "https://gocast123.me/embed2.php?player=mobile&v=star1in";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Referer: https://gocast123.me",
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


//new_curl

$url1= $myoutput;
$curl1 = curl_init($url1);
curl_setopt($curl1, CURLOPT_URL, $url1);
curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Referer: https://gocast123.me",
);
curl_setopt($curl1, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, false);

$myoutput1 = curl_exec($curl1);
curl_close($curl1);


//end new curl


//ts scrape
$elink = preg_replace("/star1in.m3u8/",'',$myoutput);
$opts = array(
  'http'=>array(
    'method'=>"GET",
    
  )
);
$context = stream_context_create($opts);
$f = preg_replace("/(?<=ts).*/", "", $myoutput1);
$g = preg_replace("/(?=star1in).*ts/", "go.php?ts=".$elink."$0", $f);

header("Content-Type: application/vnd.apple.mpegurl");

echo $g.PHP_EOL;




?>
