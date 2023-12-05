<?php
$id = isset($_GET['id'])?$_GET['id']:'list';
if($id=='list'||$id==''||$id=='rand'){
  $url='https://live.ximalaya.com/live-web/v1/getProvinceList?';
  $data=json_decode(get_data($url));
  switch ($id) {
    case 'list':
    foreach ($data->result as $out){
      $cid=$out->provinceCode;   
      $str='https://mobile.ximalaya.com/radio-first-page-app/search?locationId='.$cid.'&locationTypeId=0&categoryId=0&pageNum=1&pageSize=100';  
      $info=json_decode(get_data($str));
      foreach ($info->data->radios as $pam){
        $rid=$pam->id;
        $name=$pam->name;
        echo $name.',http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?id='.$rid.'</a><br>';
      }
    }
    break;
    default:
    foreach ($data->result as $out){
      $sid[]=$out->provinceCode;
    }
    $cid=$sid[array_rand($sid,1)];
    $str='https://mobile.ximalaya.com/radio-first-page-app/search?locationId='.$cid.'&locationTypeId=0&categoryId=0&pageNum=1&pageSize=100';  
    $info=json_decode(get_data($str));
    foreach ($info->data->radios as $pam){
      $urls[]=$pam->playUrl->ts64;
      $rids[]=$pam->id;
    }
    if($id=='rand'){
      $playurl=$urls[array_rand($urls,1)];
      //print_r($playurl);
      header('location:'.$playurl);
    }
    if($id==''){
      $id=$rids[array_rand($rids,1)];
    }
    break;   
  }
}
if($id!=='list'&&$id!==''&&$id!=='rand'){
  $url='https://live.ximalaya.com/live-web/v1/radio?radioId='.$id;
  $json=json_decode(get_data($url));
  $playurl=$json->data->playUrl->ts64;
  //print_r($playurl);
  header('location:'.$playurl);
}      

function get_data($url){
$header=array(
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36",
    "referer: https://live.ximalaya.com/",
    );   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}