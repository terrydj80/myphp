<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'cctv1';
$n = [
   'cctv1' => 'cctv1HD', //CCTV1
   'cctv2' => 'cctv2HD', //CCTV2
   'cctv3' => 'cctv3HD', //CCTV3
   'cctv4' => 'cctv4HD', //CCTV4
   'cctv5' => 'cctv5HD', //CCTV5
   'cctv5p' => 'cctv5SportHD', //CCTV5+
   'cctv6' => 'cctv6HD', //CCTV6
   'cctv7' => 'cctv7HD', //CCTV7
   'cctv8' => 'cctv8HD', //CCTV8
   'cctv9' => 'cctv9HD', //CCTV9
   'cctv10' => 'cctv10HD', //CCTV10
   'cctv11' => 'cctv11HD', //CCTV11
   'cctv12' => 'cctv12HD', //CCTV12
   'cctv13' => 'CCTVNewsHD', //CCTV13
   'cctv14' => 'cctvseHD', //CCTV14
   'cctv15' => 'cctv15HD', //CCTV15
   'cctv16' => 'cctv16HD', //CCTV16
   'cctv16_4k' => 'CCTV16_4K', //CCTV16-4K
   'cctv17' => 'cctv17HD', //CCTV17
   'cctv4k' => 'CCTV4K', //CCTV4K
   'bqkj' => 'bqkjHD', //CCTV兵器科技
   'dyjc' => 'diyijuchangHD', //CCTV第一剧场
   'hjjc' => 'hjjcHD', //CCTV怀旧剧场
   'fyjc' => 'fyjcHD', //CCTV风云剧场
   'fyjc2' => 'shandongHD', //CCTV风云剧场x
   'fyyy' => 'fyyyHD', //CCTV风云音乐
   'fyzq' => 'fyzqHD', //CCTV风云足球
   'whjp' => 'yswhHD', //CCTV央视文化精品
   'gefwq' => 'golfHD', //CCTV高尔夫网球
   'nxss' => 'nvxing', //CCTV女性时尚
   'ystq' => 'ystqHD', //CCTV央视台球
   'yggw' => 'yggw', //央广购物
   'zsgw' => 'ysgw', //中视购物*

   'zxs' => 'qicai', //中央新影-中学生
   'fxzl' => 'faxian', //中央新影-发现之旅
   'lgs' => 'gushi', //中央新影-老故事
   'sh' => 'shuhua', //书画
   'zgtq' => 'tianqiSD', //中国气象

   'cgtn' => 'cgtnSD', //CGTN

   'cetv1' => 'cetv-1SD', //CETV1中教1台
   'cetv4' => 'cetv-4SD', //CETV4中教4台
   'zqjy' => 'zaojiaoHD', //CETV早期教育

   'chcgq' => 'chcgqdyHD', //CHC高清电影
   'chcdz' => 'chcdzdyHD', //CHC动作电影
   'chcjt' => 'chcjtyyHD', //CHC家庭影院

   'bjws' => 'beijingHD', //北京卫视
   'dfws' => 'shanghaiHD', //东方卫视
   'tjws' => 'tianjinHD', //天津卫视
   'cqws' => 'chongqingHD', //重庆卫视
   'hljws' => 'heilongjiangHD', //黑龙江卫视
   'jlws' => 'jilinHD', //吉林卫视
   'lnws' => 'liaoningHD', //辽宁卫视
   'nmws' => 'neimengkuSD', //内蒙古卫视
   'nxws' => 'ningxia', //宁夏卫视
   'qhws' => 'qinghaiSD', //青海卫视
   'hbws' => 'hebeiSD', //河北卫视
   'sxiws' => 'shanxiSD', //山西卫视
   'ahws' => 'anhuiSD', //安徽卫视
   'hnws' => 'henanHD', //河南卫视
   'hubws' => 'hubeiSD', //湖北卫视
   'hunws' => 'hunanHD', //湖南卫视
   'jxws' => 'jiangxiHD', //江西卫视
   'jsws' => 'jiangsuHD', //江苏卫视
   'zjws' => 'zhejiangHD', //浙江卫视
   'dnws' => 'dongnanHD', //东南卫视
   'gdws' => 'guangdongHD', //广东卫视
   'szws' => 'shenzhenHD', //深圳卫视
   'gxws' => 'guangxiHD', //广西卫视
   'ynws' => 'yunanSD', //云南卫视
   'gzws' => 'guizhouHD', //贵州卫视
   'scws' => 'sichuanHD', //四川卫视
   'xjws' => 'xinjiangSD', //新疆卫视
   'btws' => 'bingtuanSD', //兵团卫视
   'xzws' => 'xizangSD', //西藏卫视
   'hinws' => 'hainanSD', //海南卫视
   'ssws' => 'sanshaSD', //三沙卫视

   'bjjskj' => 'bjayjsSD', //北京纪实科教
   'bjkk' => 'bjkakuSD', //卡酷少儿
   'zhtc' => 'techan', //中华特产
   'sthj' => 'shengtai', //生态环境
   'shdy' => 'diaoyu', //四海钓鱼
   'cmpd' => 'doxtv', //车迷频道
   'bxjk' => 'jiankangSD', //百姓健康
   'hqqg' => 'car', //环球奇观
   'hqly' => 'huanqiulvyou', //环球旅游
   'yybb' => 'youxi', //优优宝贝
   'yybb' => 'jusha', //聚鲨环球精选*

   'dfcj' => 'dfcj', //东方财经
   'hxjc4k' => 'hxjc_4K', //欢笑剧场4K
   'dsjc' => 'dsjcHD', //都市剧场
   'mlzq' => 'mlzqHD', //魅力足球
   'dmxc' => 'dmxcHD', //动漫秀场
   'yxfy' => 'yxfyHD', //游戏风云
   'shss' => 'shenghuo', //生活时尚
   'fztd' => 'fazhi', //法治天地
   'jsxt' => 'jinse', //金色学堂

   'cqxw' => 'CQTVNewsHD', //重庆新闻
   'cqkj' => 'CQTVkejiaoHD', //重庆科教
   'cqys' => 'cqyingshiHD', //重庆影视
   'cqwtyl' => 'cqwtylHD', //重庆文体娱乐
   'cqse' => 'cqseHD', //重庆少儿
   'cqsssh' => 'cqssgwHD', //重庆时尚生活
   'cqxnc' => 'cqggncHD', //重庆新农村
   'cqqm' => 'cqcarSD', //重庆汽摩
   'cqsf' => 'CQTVTrendyHD', //重庆社会与法
   'cqyd' => 'mryyHD', //重庆移动
   'cgrm' => 'cqrongmei', //重广融媒
   'akds' => 'aikanHD', //爱看导视

   'hczh' => 'hechuan', //合川综合
   'cszh' => 'changshou', //长寿综合
   'yyxwzh' => 'youyang', //酉阳综合*
   'xszh' => 'xiushan', //秀山综合X
   'qjzh' => 'qianjiang', //黔江综合
   'wszh' => 'wushanzhSD', //巫山综合
   'flzh' => 'fulingzh', //涪陵综合
   'yyzh' => 'jiangjinHD', //云阳综合*
   'tlzh' => 'tongliangzongheHD', //铜梁综合
   'rczh' => 'rongchangHD', //荣昌综合
   'wxzh' => 'wlzh', //巫溪综合

   'jygw' => 'jygw', //家有购物

   'wlqp' => 'qipai', //网络棋牌
   'xdm' => 'dongman', //新动漫

   'zqfw' => 'jiazheng', //证券服务

   'ygw' => 'jyougouwu', //优购物*

   'sdjy' => 'sdjiaoyuSD', //jiaoyuSD', //山东教育
   'sctx' => 'soucang', //收藏天下

   'jjgw' => 'jjgw', //家家购物

   'gxpd' => 'guoxue', //国学频道

   'klcd' => 'klcdHD', //快乐垂钓
   'jykt' => 'jinyingSD', //金鹰卡通
   'xfpy' => 'xianfeng', //先锋乒羽

   'fsgw' => 'fsgw', //风尚购物

   'jslz' => 'liang', //江苏靓妆
   'cftx' => 'caifu', //财富天下

   'tywq' => 'weiqi', //天元围棋
   'sy' => 'sheying', //摄影频道

   'fhzw' => 'xfjcHD', //凤凰中文
   'fhzx' => 'xfylHD', //凤凰资讯

   'qsjl' => 'qsjlHD', //求索纪录
   ];
date_default_timezone_set("Asia/Shanghai");
$timestamps = round(microtime(true) * 1000);
$sign = md5("aIErXY1rYjSpjQs7pq2Gp5P8k2W7P^Y@appIdkdds-chongqingdemocityId5AplayId{$n[$id]}relativeId{$n[$id]}timestamps{$timestamps}type1");
$url = "http://portal.centre.bo.cbnbn.cn/others/common/playUrlNoAuth?cityId=5A&playId={$n[$id]}&relativeId={$n[$id]}&type=1";
$h = ["appId: kdds-chongqingdemo","sign:".$sign,"timestamps:".$timestamps];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch, CURLOPT_HTTPHEADER,$h);
$data = curl_exec($ch);
curl_close($ch);

$live = json_decode($data,1)['data']['result']['protocol'][0]['transcode'][0]['url'];

$rip = '117.59.80.'.rand(1,255);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $live);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 获取跳转地址
curl_setopt($ch, CURLOPT_HTTPHEADER,['X-Forwarded-For:'.$rip,'Client-IP:'.$rip]);
curl_exec($ch);
$m3u8 = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
$host = parse_url($m3u8)['host'];
$arr= [196,197,199,200];
$ip = '113.207.84.'.$arr[array_rand($arr)];
$payurl = str_replace($host,$ip,$m3u8);

header("Content-Type: application/vnd.apple.mpegURL");
header('location:'.$payurl);
//print_r($payurl);
exit();
?>