<?php
error_reporting(0);
header('Content-Type: text/json;charset=UTF-8');
$id = isset($_GET['id'])?$_GET['id']:'hbws';
   $n = [
   'hbws' => 431, //湖北卫视
   'hbjs' => 432, //湖北经*
   'hbzh' => 433, //湖北综合
   'hbgg' => 434, //湖北公共新闻
   'hbys' => 435, //湖北影视
   'hbsh' => 436, //湖北生活
   'hbjy' => 437, //湖北教育
   'hbls' => 438, //湖北垄上
   ];
   $m = [
   //襄阳
   'xyzh' => ['https://xiangyang-live21.cjyun.org/10125/','s10125-news_hd.m3u8?auth_key=1704038399-0-0-5f0b690930d9e5a9bb24fdfa48e962a2'], //襄阳综合
   'xysh' => ['https://xiangyang-live21.cjyun.org/10125/','s10125-society_hd.m3u8?auth_key=1704038399-0-0-e243613af01160585a99833143ff9c51'], //襄阳经济生活
   'xygg' => ['https://xiangyang-live21.cjyun.org/10125/','s10125-education_hd.m3u8?auth_key=1704038399-0-0-4a3c217a78253817ef6f3ee49deb4e3d'], //襄阳公共
   //黄冈
   'wxzh' => ['http://wuxue-live21.cjyun.org/10107/','s10107-wxtv1.m3u8?auth_key=1704038399-0-0-6ff79a46f5fe722ce9cec632b60734fd'], //武穴综合
   'ltzh' => ['http://luotian-live21.cjyun.org/10013/','s10013-LTZH.m3u8?auth_key=1704038399-0-0-044f45c7681336a875438ced5cbcce1d'],//罗田综合
   'ltly' => ['http://luotian-live21.cjyun.org/10013/','s10013-LTLY.m3u8?auth_key=1704038399-0-0-1e7519816ec0be466be474277da0b617'],//罗田旅游
   'qczh' => ['http://qichun-live21.cjyun.org/10126/','s10126-TC1T.m3u8?auth_key=1704038399-0-0-e6ed2c5372b3865cfb7e630c40d7cbd8'], //蕲春综合
   'qclyys' => ['http://qichun-live21.cjyun.org/10126/','s10126-TC2T.m3u8?auth_key=1704038399-0-0-46594d533ae35bab897d759c6146c554'], //蕲春旅游养生
   //恩施
   'eszh' => ['http://enshi-live21.cjyun.org/10070/','s10070-eszh.m3u8?auth_key=1704038399-0-0-401a464342af6e7342bcfe2d85793aa2'], //恩施综合
   'eswl' => ['http://enshi-live21.cjyun.org/10070/','s10070-esgg.m3u8?auth_key=1704038399-0-0-8ee4403d1adad763d2bf71f1658846ae'], //恩施文旅
   //十堰
   'djkzh' => ['http://danjiangkou-live21.cjyun.org/10081/','s10081-djktv1.m3u8?auth_key=1704038399-0-0-b0826c4a8adaaf45c751055dff918b4a'], //丹江口综合
   ];
$r = 'http://app.cjyun.org/';

if(!!$n[$id]) {
if (empty($_GET['ts'])){
     $d = file_get_contents('http://app.cjyun.org/video/player/stream?site_id=10008&stream_id='.$n[$id]);
     $json = json_decode($d);
     $url = $json->stream;
     print_r(preg_replace("/(.*?.ts)/i", (isset($_SERVER["HTTPS"])&&$_SERVER["HTTPS"]==="on"?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]?ts=http://live21-cjy.hbtv.com.cn/hbtv/$1",getdata($url,$r)));
     }
     else{
         $ts = getdata($_GET['ts'],$r);
         echo $ts;
         }

    }

if(!!$m[$id]) {
if (empty($_GET['ts'])){
   print_r(preg_replace("/(.*?.ts)/i",(isset($_SERVER["HTTPS"])&&$_SERVER["HTTPS"]==="on"?"https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]?ts={$m[$id][0]}$1",getdata($m[$id][0].$m[$id][1],$r)));
} else {
   $ts = getdata($_GET['ts'],$r);
   echo $ts;
}}

function getdata($url,$ref){
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
       curl_setopt($ch, CURLOPT_REFERER, $ref);
       $res = curl_exec($ch);
       curl_close($ch);
       return $res;
}
?>