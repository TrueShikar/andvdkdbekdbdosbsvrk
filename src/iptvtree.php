<?php

// create a new cURL resource
$ch = curl_init();
$n = $_GET['n'];
// set the URL to fetch
$url = 'http://iptvtree.net:8080/live/598830d7/1c1ab34576/'.$n.'.m3u8';
curl_setopt($ch, CURLOPT_URL, $url);

// set options to include the HTTP headers in the output

curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// execute the request and get the response
$response = curl_exec($ch);

// get the HTTP response code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// close the cURL resource
curl_close($ch);

// output the HTTP response headers and body
 $resp = "HTTP/{$httpCode}\n{$response}";

$liml = $resp.'emd';


//lpcode
function lpcode($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
     }
     $start="Location: ";
     $end="
";
   $myoutput=lpcode($liml,$start,$end);
 $myoutput=str_replace(array("\r", "\n"), '', $myoutput);;


$elink = "http://45.143.222.48:8070";

$opts = array(
  'http'=>array(
    'method'=>"GET",
  
  )
);
$context = stream_context_create($opts);
$f = preg_replace("/(?<=ts).*/", "", file_get_contents($myoutput));
$g = preg_replace("/.*ts/", "ts.php?ts=".$elink."$0", $f);







echo $g;










?>
