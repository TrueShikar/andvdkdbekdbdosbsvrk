<?php
set_time_limit(300);
$pxy ="";
$account = "0316535914";
$url = $pxy."https://android.rediptv4.com/ch.php?usercode=".$account;
$a = file_get_contents($url);
$json = json_decode($a, true);
foreach($json as $values) {
    if ($values['id'] == '18184') {
        $base = $values['link'];
        $preg = preg_match("/token=.*".$account."/", $base, $match);
        $tok = str_replace("RED", "RED_", $match[0]);
        echo $tok."<br>";
        file_put_contents("token.txt", $tok);
    }
}

?>