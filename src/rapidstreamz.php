<?php
error_reporting(0);
if(isset($_GET['submit']))
 #header('refresh: 2');
$otp=$_GET['otp'];
$mob=$_GET['mob'];
$refer=$_GET['refer'];
$iip=$_GET['iip'];
$tk=$_GET['token'];
$bb=$_GET['bb'];
$uri=$_GET['url'];

$f = array("sameer","suresh","chettiar","jatin","chauhan","agarwal","rahul","tanmay","tiwari","kunal","ras6ania","sunil","kumar","gaurav","arihant","jain","falguni","yashashree","arpi","arshish","gupta","tanmay","samtgr","kiyera","atul","abhay","chandra","shoibaakriti","aanchal","talreja","aatholiy","abhijeet","akkalwar","abhijeet","bajpai","abhijeetsh","abhirup","roy","abhishek","sumit","kapil","suman","rani","ramu","souvik","yogesh","umesh","sahadat","ankit","prasant","pravakar","sunil","sibaram");
$fname = $f[mt_rand(0,50)];

$l = array("sameer","suresh","chettiar","jatin","chauhan","agarwal","rahul","tanmay","tiwari","kunal","rasania","sunil","kumar","gaurav","arihant","jain","falguni","yashashree","arpi","arshish","gupta","tanmay","samtgr","kiyera","atul","abhay","chandra","shoibaakriti","aanchal","talreja","aatholiy","abhijeet","akkalwar","abhijeet","bajpai","abhijeetsh","abhirup","roy","abhishek","sumit","kapil","rani","ramu","souvik","yogesh","umesh","sahadat","ankit","prasant","pravakar","sunil","sibaram");
$lname = $l[mt_rand(0,50)];
$no = rand(1,999);
function rando($length) {
    $characters = '1234567890abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$name=''.$fname.''.$lname.''.$no.'';
$pwd=rando(3);
$device=rando(16);



$url='https://delta.rapidstreams.io/gt.rstrm/';

$data='mobile=91'.$mob.'&nickname=Ravi&code='.$otp.'&password=898621&inviteCode='.$refer.'';

$headers[]='Host: s1.indenjoy.com';
$headers[]='content-length: '.strlen($data).'';
$headers[]='accept: */*';
$headers[]='user-agent: Mozilla/5.0 (Linux; Android 10; Infinix X655F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/'.$iip.' Mobile Safari/537.36';
$headers[]='content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[]='sec-fetch-site: same-origin';

$headers[]='sec-fetch-mode: cors';
$headers[]='sec-fetch-dest: empty';
$headers[]='referer: '.$refer.'';
$headers[]='accept-language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7,mr;q=0.6';
$headers[]='cookie: sb2e7849e='.$bb.'';






$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

$output1=curl_exec($ch);
$json=json_decode($output1,true);
curl_close($ch);

$msg=$json['msg'];

?>
<div class="content">
<iframe src="https://wh1021080.ispot.cc/voot/bb247.php?s=<?php echo $uri.$output1 ?>" width="1000" height="1000" allowfullscreen="true"></iframe>
</div> 