<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'cctv6';
$n = [
    'cctv6' => ['LIVEI56PNI726KA7A','d25572fd4442ce3a50085bf94027532b18f9335f'],//CCTV6电影频道
    '1905a' => ['LIVE8J4LTCXPI7QJ5','0a89c3f3631ac79506c9993b1c986b8d676ce07b'],//1905国外电影
    '1905b' => ['LIVENCOI8M4RGOOJ9','547f93de5afc3c84a6d55f89863db7aced5c4053'],//1905国内电影
];
$post = '{"cid":999999,"expiretime":2000000600,"nonce":2000000000,"page":"https://www.1905.com/","playerid":1,"streamname":"'.$n[$id][0].'","uuid":1,"appid":"jpUpo7MZi"}';
$sign = $n[$id][1];
$ctx = stream_context_create(["http" => ["method" => "POST","header" => "Authorization:$sign",'content' => $post]]);
$d = file_get_contents("https://profile.m1905.com/mvod/liveinfo.php",null,$ctx);
$playurl = "https://hlslive.1905.com/live/{$n[$id][0]}/index.m3u8".json_decode($d,1)['data']['sign']['hd']['sign'];
header("Content-Type: application/vnd.apple.mpegURL");
header('location:'.$playurl);
//echo $playurl;
?>