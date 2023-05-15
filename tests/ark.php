<?php

use Tianyage\QqFrame\QF;

require_once '../vendor/autoload.php';
$qf   = new QF();
$json = '{"app":"com.tencent.bot.groupbot","config":{"ctime":1670125202,"token":"fc5ce3884e51d9e87e26b40c743647a8"},"desc":"","meta":{"embed":{"fields":[{"name":"测试测试"}],"thumbnail":{"url":"https://gchat.qpic.cn/gchatpic_new/499006520/499006520-2647964529-CBC7BEAD1FF0C45A8A00D258726CE29E/0?term=3&is_origin=0"},"title":""}},"prompt":"追梦云中心","ver":"1.0.0.9","view":"index"}';
echo $qf->signArk($json);