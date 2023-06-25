<?php

use Tianyage\QqFrame\QF;

require_once '../vendor/autoload.php';
$qf   = new QF();
$json = '{"app":"com.tencent.bot.groupbot","config":{"ctime":1670125202,"token":"fc5ce3884e51d9e87e26b40c743647a8"},"desc":"","meta":{"embed":{"fields":[{"name":"测试测试"}],"thumbnail":{"url":"https://thirdqq.qlogo.cn/g?b=sdk&k=LFZw9nEsEO23WOj2fmibWsg&kti=ZGJSEwAAAAE&s=100&t=1613915105"},"title":""}},"prompt":"追梦云中心","ver":"1.0.0.9","view":"index"}';
echo $qf->signArk($json);