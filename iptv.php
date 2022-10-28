<?php
error_reporting(0);
header("content-type: application/vnd.apple.mpegurl");
header("pragma: no-cache");
header("Connection: keep-alive");
$pxy="";
$tok = file_get_contents("getmekey/token.txt");
$id = $_GET['id'];
$url = 'http://google.com?'.$tok.'&id='.$id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$html = curl_exec($ch);
$baselink = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
$exp = explode("/", $baselink);
$link = "http://31.172.87.19:2200/";

$burl = $pxy.$link;
$blink = preg_replace("/(?=index).*/", "", $burl);
$flink = $blink."tracks-v1a1/mono.m3u8?".$tok;
$tp = $_GET['tp'];
$pid = $_GET['pid'];
$track = "/tracks-v1a1/mono.m3u8?";
$token = "token=RED_Hqqv1c3nXjqlzBGFPhFuTg==,165803831455.4814651659=";
$clink = $link.$tp.'/'.$pid.$track.$token;
$nlink = $link.$tp.'/'.$pid.'/';
$elink = preg_replace("/(?=index).*/", "", $nlink);

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"User-Agent: REDLINECLIENT\r\n"
  )
);
$context = stream_context_create($opts);
$e = file_get_contents($clink, false, $context);
$f = preg_replace("/(?<=ts).*/", "", $e);
$g = preg_replace("/(?=2022\/).*ts/", "ts.php?ts=".$elink."tracks-v1a1/"."$0", $f);
echo $g;

?>
