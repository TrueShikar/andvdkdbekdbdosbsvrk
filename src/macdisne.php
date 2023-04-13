<?php
error_reporting(0);
header("content-type: video/mp2t");
header("pragma: no-cache");
$ts = $_GET['ts'];
$tok = file_get_contents("getmekey/token.txt");
$pxy = "";
$hole = 'http://188.241.218.10:8070/'.$ts;
$url = $pxy.$hole."?".$tok;
$opts = array(
  'http'=>array(
    'method'=>"GET"
  )
);
$context = stream_context_create($opts);
$e = file_get_contents($url, false, $context);
echo $e;
?>
