<?php
error_reporting(0);
header("content-type: video/mp2t");
header("pragma: no-cache");
$ts = $_GET['ts'];
$tok = file_get_contents("getmekey/token.txt");
$elink = "http://45.143.222.48:8070";


$url = $elink.$ts;
$opts = array(
  'http'=>array(
    'method'=>"GET"
  )
);
$context = stream_context_create($opts);
$e = file_get_contents($url, false, $context);
echo $e;
?>
