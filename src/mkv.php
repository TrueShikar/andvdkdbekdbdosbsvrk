<?php
error_reporting(0);
header("content-type: video/mp2t");
header("pragma: no-cache");
$ts = $_GET['ts'];
$tok = file_get_contents("getmekey/token.txt");
$pxy = "";
$url = $pxy.$ts."?".$tok;
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Referer: https://t20cup.lol"
  )
);
$context = stream_context_create($opts);
$e = file_get_contents($url, false, $context);
echo $e;
?>
