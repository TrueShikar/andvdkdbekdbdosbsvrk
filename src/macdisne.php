<?php
error_reporting(0);
header("content-type: video/mp2t");
header("pragma: no-cache");
$ts = $_GET['ts'];
$hole = 'http://188.241.218.10:8070'.$ts;
$opts = array(
  'http'=>array(
    'method'=>"GET"
  )
);
$context = stream_context_create($opts);
$e = file_get_contents($hole, false, $context);
echo $e;
?>
