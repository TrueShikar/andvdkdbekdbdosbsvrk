<?php
error_reporting(0);
header("content-type: video/mp2t");
header("pragma: no-cache");
$ts = $_GET['ts'];
$tok = file_get_contents("getmekey/token.txt");
$pxy = "";
$url = $ts;
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Referer: https://123ecast.xyz"
  )
);
$context = stream_context_create($opts);
$e = file_get_contents($url, false, $context);
echo $e;
?>
