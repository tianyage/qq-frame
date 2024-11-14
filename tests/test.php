<?php

use Tianyage\QqFrame\QF;

require_once '../vendor/autoload.php';
$qf = new QF();
$qf->init('114.132.62.188', 2071267038, 9000);
// $arr = $qf->sdk->sendFriendMsg(454701103, 'test123哈');
// $arr = $qf->sdk->sendGroupMsg(214305852, 'test123哈');
// $arr = $qf->sdk->cardLike2(454701103, 3);
// $arr = $qf->sdk->getCookie('qzone');
//$arr = $qf->sdk->uploadFriendPic(454701103, 'https://bbs.52jscn.com/static/image/common/logo.png');
$arr = $qf->sdk->qrLogin(2071267038, 'pc');
print_r($arr);
// echo $arr;