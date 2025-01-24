<?php

date_default_timezone_set('Asia/Shanghai');

use Tianyage\QqFrame\QF;

require_once '../vendor/autoload.php';
$qf = new QF();
$qf->init('114.132.62.188', 3050326525, 2000);
$view = $qf->sdk->getMpzList();
// print_r($view);
// 获取今日0点时刻的时间戳
$zeroTimestamp_today = strtotime(date('Y-m-d', time()));
// 昨日0点的时间戳
$zeroTimestamp_yesterday = $zeroTimestamp_today - (60 * 60 * 24);

if (str_starts_with($view, 'error')) {
    $data = [
        'status' => 2,
        'msg'    => "数据解析失败，请稍后重试",
        'err'    => $view,
    ];
} else {
    preg_match_all('/\[\.0.*?\.0\]\((?:Long|Int|Short)\):(\d{5,})/', $view, $qqlist);
    preg_match_all('/\[\.0.*?\.1\]\(Int\):(\d{10})/', $view, $timelist);
    preg_match_all('/\[\.0.*?\.5\]\(.*\):(.*)[^\r]/', $view, $nicklist);
    preg_match_all('/\[\.0.*?\.13\]\((?:Byte|Zero)\):(\d+)/', $view, $friendcode); // 是否好友
    preg_match_all('/\[\.0.*?\.19\]\(Byte\):(\d{1,2})/', $view, $numlist); // 点几赞
    // preg_match_all('/\[\.0.*?\.21\]\((?:Byte|Zero)\):(\d+)/', $view, $today_shengyu); // 今日还可赞数量
    preg_match_all('/\[\.0.*?\.22\]\((?:Byte|Zero)\):(\d+)/', $view, $today_like); // 今日赞他数量
    preg_match('/\[7-0\.1\.1-0\.3\.0\]\((?:Byte|Short)\):(\d+)/', $view, $nextoffset);
    //                                preg_match('/\[7-0\.1\.1-0\.4\]\(List,(\d+)\)/', $view, $liked_total); // 今天已赞过多少人
    // [7-0.1.1-0.2.0(9).24] 应该是点赞样式ID
    
    // 验证各个提取的值数量是否一致
    if (isset($nextoffset[1]) && isset($nicklist[1]) && isset($qqlist[1]) && count($nicklist[1]) === count($qqlist[1])) {
        // 遍历提取出的数据，合并为需要的格式
        foreach ($qqlist[1] as $index => $qq) {
            $arr = [
                // 赞我的QQ
                'qq'       => (int)$qq,
                // 昵称 去除问号，模块不支持unicode
                'nick'     => str_replace('?', '', $nicklist[1][$index]),
                // 赞我数量
                'num'      => (int)$numlist[1][$index],
                // 赞我时间
                'time'     => (int)$timelist[1][$index],
                // 是否好友 1是 0否
                'isfriend' => intval($friendcode[1][$index]),
                // 我今日赞他数量
                'like'     => intval($today_like[1][$index]),
            ];
            
            if ($arr['time'] > $zeroTimestamp_today) {
                $list['today'][$qq] = $arr;
            } elseif ($arr['time'] > $zeroTimestamp_yesterday) {
                $list['yesterday'][$qq] = $arr;
            } else {
                $list['limit'][$qq] = $arr;
                // 超出时间限制的就跳出循环 不再获取更多数据
            }
        }
        
        // 没有下一页了 跳出循环
        if ((int)$nextoffset[1] === 255) {
        }
        
        $data = [
            'status' => 1,
            'msg'    => '列表获取成功',
            'list'   => $list,
        ];
    } else {
        $data = [
            'status' => 2,
            'msg'    => '提取数据的数量不匹配',
        ];
    }
    
    print_r($data);
}