<?php

use Tianyage\QqFrame\QF;

require_once '../vendor/autoload.php';
$qf = new QF();
$qf->init('114.132.173.96', 908777454, 7000);
$arr = json_decode($qf->sdk->getMpzList(), true);
print_r($arr);