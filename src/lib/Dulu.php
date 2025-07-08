<?php
/** @noinspection HttpUrlsUsage */

/** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */

/** @noinspection DuplicatedCode */

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Tianyage\QqFrame\lib;

use Exception;

class Dulu extends Common
{
    
    /**
     * 事件名称代码
     *
     */
    public array $EVENT_TYPE_CODE = [
        //  （手表协议收不到此事件）
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":908777454,"主动QQ":2071267038,"被动QQ":908777454,"来源群号":1058425105,"消息内容":"{\"app\":\"com.tencent.qun.invite\",\"config\":{\"autosize\":0,\"ctime\":1737319649,\"round\":1,\"token\":\"5cb83539cd54636be3ec36b08bcbc8d3\",\"type\":\"normal\"},\"meta\":{\"news\":{\"desc\":\"邀请你加入群聊“刷步数交流”，进入可查看详情。\",\"jumpUrl\":\"mqqapi:\/\/group\/invite_join?src_type=internal&version=1&groupcode=1058425105&msgseq=1737319649826551&groupname=%e5%88%b7%e6%ad%a5%e6%95%b0%e4%ba%a4%e6%b5%81&senderuin=2071267038&receiveruin=908777454\",\"preview\":\"https:\/\/p.qlogo.cn\/gh\/1058425105\/1058425105\/?t=1737319649\",\"tag\":\"邀请加群\",\"tagIcon\":\"https:\/\/downv6.qq.com\/innovate\/group_ark_icon.png\",\"title\":\"邀请你加入群聊\"}},\"prompt\":\"邀请加群\",\"ver\":\"1.0.0.31\",\"view\":\"news\"}\n","消息类型":2002,"消息子类型":3,"消息Req":1737319649826551,"消息Seq":22656,"消息Random":1724344919,"消息时间戳":1737319649}}
        '群事件_我被邀请加入群' => "2002.3",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":2783550142,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\uD83D\\uDEF5\\uD83D\\uDEF4\\uD83D\\uDEB2\\uD83D\\uDE9C\\u26DF\\uD83D\\uDE9B\\uD83D\\uDE9A\\uD83D\\uDE99\\uD83D\\uDE98\\uD83D\\uDE97\\uD83D\\uDE96\\uD83D\\uDE95\\uD83D\\uDE94\\uD83D\\uDE93\\uD83D\\uDE92(454701103)同意了\\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2777(2783550142)加入群聊","消息类型":3003,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人加入了群'   => "3003.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":2783550142,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2777(2783550142)申请加入群聊，验证消息：你好，提示：该账号存在风险，请谨慎操作","消息类型":3014,"消息子类型":3,"消息Req":1737317491484369,"消息Seq":54350,"消息Random":0,"消息时间戳":1737317491}}
        '群事件_某人申请加群'   => "3014.3",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":2783550142,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2777(2783550142)退出了群聊","消息类型":3006,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人退出了群'   => "3006.0",
        // 看不出谁踢的
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":2783550142,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2777(2783550142)被移出群聊","消息类型":3007,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人被踢出群'   => "3007.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":2088815608,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2776(2088815608)被\\uD83D\\uDEF5\\uD83D\\uDEF4\\uD83D\\uDEB2\\uD83D\\uDE9C\\u26DF\\uD83D\\uDE9B\\uD83D\\uDE9A\\uD83D\\uDE99\\uD83D\\uDE98\\uD83D\\uDE97\\uD83D\\uDE96\\uD83D\\uDE95\\uD83D\\uDE94\\uD83D\\uDE93\\uD83D\\uDE92(454701103)禁言600秒","消息类型":3012,"消息子类型":1,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人被禁言'     => "3012.1",
        // 主动Q撤回被动Q
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":454701103,"来源群号":214305852,"消息内容":"测试","消息类型":3010,"消息子类型":1,"消息Req":0,"消息Seq":3463,"消息Random":1487285493,"消息时间戳":1737315646}}
        '群事件_某人撤回事件'   => "3010.1",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":2071267038,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => 步数助手 \\u2776(2071267038)失去了管理员身份","消息类型":3008,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人被取消管理' => "3008.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":2071267038,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => 步数助手 \\u2776(2071267038)获得了管理员身份","消息类型":3008,"消息子类型":1,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人被赋予管理' => "3008.1",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\uD83D\\uDEF5\\uD83D\\uDEF4\\uD83D\\uDEB2\\uD83D\\uDE9C\\u26DF\\uD83D\\uDE9B\\uD83D\\uDE9A\\uD83D\\uDE99\\uD83D\\uDE98\\uD83D\\uDE97\\uD83D\\uDE96\\uD83D\\uDE95\\uD83D\\uDE94\\uD83D\\uDE93\\uD83D\\uDE92(454701103)开启了全体禁言","消息类型":3011,"消息子类型":1,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_开启全员禁言'   => "3011.1",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":0,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\uD83D\\uDEF5\\uD83D\\uDEF4\\uD83D\\uDEB2\\uD83D\\uDE9C\\u26DF\\uD83D\\uDE9B\\uD83D\\uDE9A\\uD83D\\uDE99\\uD83D\\uDE98\\uD83D\\uDE97\\uD83D\\uDE96\\uD83D\\uDE95\\uD83D\\uDE94\\uD83D\\uDE93\\uD83D\\uDE92(454701103)关闭了全体禁言","消息类型":3011,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_关闭全员禁言'   => "3011.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":2783550142,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\uD83D\\uDEF5\\uD83D\\uDEF4\\uD83D\\uDEB2\\uD83D\\uDE9C\\u26DF\\uD83D\\uDE9B\\uD83D\\uDE9A\\uD83D\\uDE99\\uD83D\\uDE98\\uD83D\\uDE97\\uD83D\\uDE96\\uD83D\\uDE95\\uD83D\\uDE94\\uD83D\\uDE93\\uD83D\\uDE92(454701103)邀请了\\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2777(2783550142)加入群聊","消息类型":3004,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人被邀请入群' => "3004.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":2088815608,"来源群号":214305852,"消息内容":"微博互推(214305852) => \\u1D50\\u1DBB機器人\\uD83D\\uDC4D\\u2776(2088815608)被\\uD83D\\uDEF5\\uD83D\\uDEF4\\uD83D\\uDEB2\\uD83D\\uDE9C\\u26DF\\uD83D\\uDE9B\\uD83D\\uDE9A\\uD83D\\uDE99\\uD83D\\uDE98\\uD83D\\uDE97\\uD83D\\uDE96\\uD83D\\uDE95\\uD83D\\uDE94\\uD83D\\uDE93\\uD83D\\uDE92(454701103)解除禁言","消息类型":3012,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '群事件_某人被解除禁言' => "3012.0",
        
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":908777454,"被动QQ":0,"来源群号":0,"消息内容":"收款专用户(908777454)删除了你","消息类型":2003,"消息子类型":0,"消息Req":0,"消息Seq":20370,"消息Random":445522106,"消息时间戳":1737316450}}
        '好友事件_被好友删除'   => "2003.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"774232","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":2071267038,"来源群号":0,"消息内容":"(2071267038): simon\\uD83D\\uDCAD(454701103)撤回了一条消息","消息类型":2004,"消息子类型":0,"消息Req":0,"消息Seq":55272,"消息Random":1374357424,"消息时间戳":1737371096}}
        '好友事件_某人撤回事件' => "2004.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":2975296615,"被动QQ":0,"来源群号":0,"消息内容":"我们已经是好友啦，一起来聊天吧!","消息类型":2005,"消息子类型":0,"消息Req":0,"消息Seq":0,"消息Random":0,"消息时间戳":0}}
        '好友事件_有新好友'     => "2005.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":908777454,"被动QQ":0,"来源群号":0,"消息内容":"来自QQ号查找，问题1:添加后请发送\"菜单\"\n回答:你好\n问题2:网页版访问 bushu.wang\n回答:在吗","消息类型":2000,"消息子类型":0,"消息Req":1737318998000000,"消息Seq":1737318998,"消息Random":281639,"消息时间戳":1737318998}}
        '好友事件_好友请求'     => "2000.0",
        // {"server_info":{"key":"A2I8C","ip":"114.132.62.188","port":"9999","pid":"290968","path":"C:%5CDuLuNTQQ%5CContainer.exe","ver":"1.2.1"},"type":"Event","data":{"框架QQ":2071267038,"主动QQ":454701103,"被动QQ":0,"来源群号":0,"消息内容":"simon\\uD83D\\uDCAD(454701103)赞了我的资料卡1次","消息类型":2001,"消息子类型":0,"消息Req":0,"消息Seq":19923,"消息Random":1016312274,"消息时间戳":1737315749}}
        '好友事件_资料卡点赞'   => "2001.0",
        
        '框架事件_登录成功' => "31.0",
        '框架事件_登录失败' => "38.0",
        
        '消息类型_好友通常消息' => "166.0",
        '消息类型_群聊消息'     => "82.0",
    ];
    
    /* 群打卡
    {"框架QQ":3171469720,"主动QQ":1285994275,"被动QQ":0,"来源群号":548723330,"消息内容":"肥高联交流群(548723330) => 安职天翼   屹琛\\u202D\\u2067~喵\\u2067\\u202D(1285994275)今日已打卡 ","消息类型":3000,"消息子类型":0,"消息Req":0,"消息Seq":56188,"消息Random":1416006400,"消息时间戳":1737676470} */
    
    /**
     * IP或域名
     *
     * @var string
     */
    public string $host;
    
    /**
     * 框架QQ
     *
     * @var int
     */
    public int $robot_qq;
    
    /**
     * 框架端口
     *
     * @var int
     */
    public int $port;
    
    /**
     * 接口key
     *
     * @var string
     */
    private string $key;
    
    /**
     * 接口访问超时时间 默认10s
     *
     * @var int
     */
    private int $timeout = 10;
    
    private bool   $ret_ok;
    private int    $ret_code;
    private string $ret_message;
    private string $ret_data;
    
    public function init(string $host, int $robot, int $port = 2000, string $key = 'A2I8C'): void
    {
        $this->host     = $host;
        $this->robot_qq = $robot;
        $this->port     = $port;
        $this->key      = $key;
    }
    
    public function setTimeout(int $sec): void
    {
        $this->timeout = $sec;
    }
    
    public function setRobotQq(int $qq): void
    {
        $this->robot_qq = $qq;
    }
    
    /**
     * 全局黑名单
     * 名单内的QQ触发消息会忽略
     *
     * @return array
     */
    public function getBlackList_G(): array
    {
        return [
            // 官方消息
            '1000000',
            // Q群管家机器人
            '2854196310',
            '835463495',
            '481777355',
            '2088815608',
            '2859220444',
            '2071267038',
            '2783550142',
        ];
    }
    
    /**
     * 获取登录二维码
     *
     * @param int|string $qq       要登录的QQ号
     * @param int|string $protocol 协议：0 安卓QQ,1 企点QQ,2 QQaPad,3 企业QQ,4 手机Tim,5 手表QQ,6 QQiPad,7 macQQ,8 LinuxQQ 普通QQ无法登录企业/企点
     *
     * @return array
     * @throws Exception
     */
    public function qrLogin(int|string $qq, int|string $protocol = 5): array
    {
        $param = [
            'qq' => $qq,
        ];
        $this->query('/qrLogin', $param);
        
        if ($this->ret_code === 0) {
            $arr  = json_decode($this->ret_data, true);
            $data = [
                'status' => 1,
                'qr'     => $arr['qr_data'],
                'qr_id'  => $arr['qr_id'],
                'msg'    => '二维码获取成功',
            ];
        } else {
            $data = [
                'status' => 2,
                'qr'     => '',
                'qr_id'  => 0,
                'msg'    => $this->ret_message,
            ];
        }
        
        return $data;
    }
    
    /**
     * 删除QQ
     *
     * @return array
     * @throws Exception
     */
    public function del(): array
    {
        // {
        //    "code": 0,
        //    "message": "删除成功",
        //    "data": "",
        //    "echo": ""
        //}
        
        // {
        //    "code": 50001,
        //    "message": "删除失败",
        //    "data": "",
        //    "echo": ""
        //}
        $this->query('/del');
        if ($this->ret_code === 0) {
            $data = [
                'status' => 1,
                'msg'    => $this->ret_message,
            ];
        } else {
            $data = [
                'status' => 2,
                'msg'    => $this->ret_message,
            ];
        }
        
        return $data;
    }
    
    /**
     * 获取ClientKey
     *
     * @return array
     * @throws Exception
     */
    public function getClientKey(): array
    {
        $this->query('/getClientKey');
        if ($this->ret_code === 0) {
            $data = [
                'status' => 1,
                'msg'    => $this->ret_message,
                'data'   => $this->ret_data,
            ];
        } else {
            $data = [
                'status' => 2,
                'msg'    => $this->ret_message,
                'data'   => '',
            ];
        }
        return $data;
    }
    
    /**
     * QQ是否在线
     *
     * @return array
     * @throws Exception
     */
    public function checkOnline(): array
    {
        $this->query('/getClientKey');
        if ($this->ret_code === 0) {
            $data = [
                'status' => 1,
                'msg'    => $this->ret_data,
            ];
        } else {
            $data = [
                'status' => 2,
                'msg'    => $this->ret_message,
            ];
        }
        return $data;
    }
    
    /**
     * 获取二维码状态
     *
     * @param string $qr_id
     *
     * @return array
     * @throws Exception
     */
    public function qrQuery(string $qr_id = ''): array
    {
        try {
            $this->query('/qrQuery', ['qr_id' => $qr_id]);
            $arr     = json_decode($this->ret_data, true);
            $retcode = $arr['retcode'];
            $retmsg  = $arr['retmsg'] ?: '无';
            if ($retcode === 0) {
                // {"retcode":0,"retmsg":"登录成功","time":"1679663947"}
                $data = [
                    'status' => 1,
                    'msg'    => "{$this->robot_qq}登录成功",
                ];
            } elseif ($retcode === 505) {
                // {"retcode":505,"retmsg":"等待用户扫码...","time":"1679663879"}
                $data = [
                    'status' => 3,
                    'msg'    => "等待扫码中",
                ];
            } elseif ($retcode === 504) {
                // {"retcode":504,"retmsg":"扫码成功，请在手机上确认登录","time":"1679663929"}
                $data = [
                    'status' => 3,
                    'msg'    => "扫码成功，请在手机上确认登录",
                ];
            } elseif ($retcode === 502) {
                // 实测 pandaLocal 用户在QQ中点击拒绝按钮或右上角X关闭，会返回502，但retmsg是空的
                if ($retmsg === '无') {
                    $data = [
                        'status' => 2,
                        'msg'    => "您已拒绝了本次登录请求",
                    ];
                } else {
                    // 设备网络不稳的或处于复杂网络环境
                    $data = [
                        'status' => 2,
                        'msg'    => "网络异常，请尝试使用TimAPP来授权",
                    ];
                }
            } elseif ($retcode === -109) {
                $data = [
                    'status' => 2,
                    'msg'    => "已主动取消了二维码登录",
                ];
            } elseif ($retcode === -108) {
                $data = [
                    'status' => 4,
                    'msg'    => "实际扫码QQ与本次申请的QQ{$this->robot_qq}不一致，登录失败[{$retcode}]",
                ];
            } elseif ($retcode === -107 || $retcode === 49 || $retcode === 503) {
                // {"retcode":49,"retmsg":"","time":"1722509933"}
                $data = [
                    'status' => 2,
                    'msg'    => "二维码已超时，如需继续登录请重新获取",
                ];
            } elseif ($retcode === 3) {
                //  {"retcode":3,"retmsg":"获取二维码状态失败","time":"1700825011"} （应该是框架QQ存在，但是已超时(连接断开)会返回这个状态，和下面的code-4相反）
                $data = [
                    'status' => 3,
                    'msg'    => "获取二维码状态失败",
                ];
            } elseif ($retcode === -2) {
                //  {"retcode":-2,"retmsg":"扫码完成，登录失败错误代码:-2","time":"1701101228"}
                $data = [
                    'status' => 2,
                    'msg'    => "扫码完成但已被风控，请使用新协议",
                ];
            } elseif ($retcode === -4) {
                //  {"retcode":-4,"retmsg":"查询二维码状态失败！错误代码 -4","time":"1722509284"}  （比如登录期间，QQ从框架中删除掉就会返回，应该就是QQ不存在框架中返回这个状态）
                $data = [
                    'status' => 2,
                    'msg'    => "超时登录，如需继续登录请重新获取",
                ];
            } else {
                //                if (function_exists('trace')) {
                //                    trace($json . PHP_EOL, 'qrQuery_xlz');
                //                }
                
                // 其他错误
                $data = [
                    'status' => 2,
                    'msg'    => "登录失败：{$retmsg}[$retcode]",
                ];
            }
        } catch (Exception $e) {
            // 其他错误
            $data = [
                'status' => 3,
                'msg'    => "服务器访问超时",
            ];
        }
        
        
        return $data;
    }
    
    /**
     * 获取cookie
     *
     * @param string $type 登录类型，例：qzone qzoneh5 qun vip ti ... (详细查看getLoginParams方法)
     *
     * @return array
     * @throws Exception
     */
    public function getCookie(string $type): array
    {
        $ret   = $this->getLoginParams($type);
        $param = [
            'url'   => urldecode($ret['u1']),
            'appid' => $ret['aid'],
            'daid'  => $ret['daid'],
        ];
        
        try {
            $this->query('/getCookie', $param);
            if ($this->ret_code === 0) {
                $cookie = $this->ret_data;
                preg_match('/skey=(.{10});/', $cookie, $skey);
                preg_match("/p_skey=(.*?);/", $cookie, $p_skey);
                preg_match("/pt4_token=(.*?);/", $cookie, $pt4_token);
                
                if (isset($skey[1]) && isset($p_skey[1])) {
                    $data = [
                        'status'    => 1,
                        'msg'       => $type . '的cookie获取成功',
                        'cookie'    => $cookie,
                        'skey'      => $skey[1],
                        'p_skey'    => $p_skey[1],
                        // pt4_token不是每个都有返回
                        'pt4_token' => $pt4_token[1] ?? '',
                    ];
                } else {
                    throw new Exception($this->robot_qq . ':cookie获取成功但解析失败');
                }
            } else {
                $data = [
                    'status' => 2,
                    'msg'    => 'cookie获取失败',
                ];
            }
        } catch (Exception $e) {
            $data = [
                'status' => -1,
                'msg'    => 'cookie获取超时',
            ];
        }
        
        return $data;
    }
    
    /**
     * 群签到+打卡
     *
     * @param string $group
     * @param string $params
     *
     * @return string
     * @throws Exception
     */
    public function qunqd(string $group, string $params): string
    {
        $param = [
            'group'  => $group,
            'params' => $params,
        ];
        return $this->query('/groupSignin', $param);
    }
    
    /**
     * 名片赞
     *
     * @param string|int $toqq 对方QQ
     * @param int        $num  点赞次数 默认1
     *
     * @return string
     */
    public function cardLike(string|int $toqq, int $num = 1): string
    {
        return $this->cardLike2($toqq, $num);
    }
    
    /**
     * 名片赞2
     * （发功能包版，一次性点赞，可以减少接口访问次数了）
     *
     * @param string|int $toqq 对方QQ
     * @param int        $num  点赞次数 默认1
     * @param int        $type 点赞类型 1好友 27随心贴陌生人（好像无效）  31搜索QQ（好像无效）  5群友  12我赞过谁  41附近的人 66点赞列表
     *
     * @return string
     */
    public function cardLike2(string|int $toqq, int $num = 1, int $type = 1): string
    {
        $num = max($num, 1); // 最少1赞
        $num = min($num, 20); // 最多20赞
        
        try {
            $this->query('/cardLike', [
                'toqq' => $toqq,
                'num'  => $num,
                'type' => $type,
            ]);
            
            // 成功
            if ($this->ret_code === 0) {
                $msg = "名片点赞{$num}次成功";
            } elseif ($this->ret_code === 1) {
                $msg = "名片点赞{$num}次失败：TA不是你的好友";
            } elseif ($this->ret_code === 20003) {
                // 今日点赞好友数己达上限 或 今日同一好友点赞数已达 SVIP 上限  或  今日点赞数己达上限(给非好友时才会返回这个)
                $msg = $this->ret_message;
            } elseif ($this->ret_code === 10003) {
                // 由于对方权限设置，点赞失败
                $msg = '由于对方权限设置，点赞失败';
            } else {
                $msg = "{$this->ret_message}[{$this->ret_code}]";
            }
        } catch (Exception $e) {
            $msg = "名片点赞{$num}次超时";
        }
        
        return $msg;
    }
    
    /**
     * 上传好友图片
     *
     * @param int    $toqq
     * @param string $file_url 图片地址
     * @param bool   $isflash  是否闪照(逻辑型,可空)
     * @param string $type     path:本地路径 url:网络路径 base64:BASE64编码数据(不推荐)
     *
     * @return string [pic,hash=04B9E8C81D6656AF805233CBFAEEBE19,guid=/454701103-2590811547-04B9E8C81D6656AF805233CBFAEEBE19,wide=0,high=0,cartoon=false]
     *                失败返回空
     */
    public function uploadFriendPic(int $toqq, string $file_url, bool $isflash = false, string $type = 'url'): string
    {
        // {
        //    "code": 0,
        //    "message": "好友图片上传完成",
        //    "data": "[Image,size=34136,md5=bd13101fbb9aafd8acfc72ba3adccb03,sha1=f894ee5fc591c03e686c86cabebc06ec0b7c1369,name=bd13101fbb9aafd8acfc72ba3adccb03.mjpeg,width=400,height=400,fileid=EhT4lO5fxZHAPmhshsq-vAbsC3wTaRjYigIg_goo06HF8O-OiwMyBHByb2RaEKF1Qnb21YZzkxGOdkh5sPk,url=https://multimedia.nt.qq.com.cn/download?appid=1406&fileid=EhT4lO5fxZHAPmhshsq-vAbsC3wTaRjYigIg_goo06HF8O-OiwMyBHByb2RaEKF1Qnb21YZzkxGOdkh5sPk&rkey=CAESOBkcro_MGujocMOdQbOEYO32ns1UGGuDTP9EQ_uGKcdtgi15knJWFj7h9A-kt-Ha8Jool-yhNSA8&spec=0]",
        //    "echo": ""
        //}
        $param = [
            'toqq'     => $toqq,
            'pic_type' => $type,
            'pic'      => $file_url,
            'is_flash' => $isflash,
        ];
        try {
            $this->query('/uploadFriendPic', $param);
            if ($this->ret_code === 0) {
                return $this->ret_data;
            } else {
                return '';
            }
        } catch (Exception $e) {
            return '';
        }
    }
    
    /**
     * 上传群图片
     *
     * @param int    $group_id
     * @param string $file_url 图片地址
     * @param bool   $isflash  是否闪照(逻辑型,可空)
     * @param string $type     path:本地路径 url:网络路径 base64:BASE64编码数据(不推荐)
     *
     * @return string 成功[pic,hash=04B9E8C81D6656AF805233CBFAEEBE19,wide=0,high=0,cartoon=false]
     *                失败返回空
     */
    public function uploadGroupPic(int $group_id, string $file_url, bool $isflash = false, string $type = 'url'): string
    {
        $param = [
            'group'    => $group_id,
            'pic_type' => $type,
            'pic'      => $file_url,
            'is_flash' => $isflash,
        ];
        try {
            $this->query('/uploadGroupPic', $param);
            if ($this->ret_code === 0) {
                return $this->ret_data;
            } else {
                return '';
            }
        } catch (Exception $e) {
            return '';
        }
    }
    
    /**
     * 发送私聊消息
     *
     * @param int|string $toqq
     * @param string     $content
     *
     * @return array
     */
    public function sendFriendMsg(int|string $toqq, string $content): array
    {
        $param = [
            'toqq'    => $toqq,
            'content' => $content,
        ];
        // {"retcode":0,"retmsg":"","time":"1680015780"}  time用于撤回
        try {
            $this->query('/sendFriendMsg', $param);
            if ($this->ret_code === 0) {
                $data = [
                    'status' => 1,
                    'msg'    => '发送成功',
                    'time'   => 0,
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg'    => $this->ret_message,
                ];
            }
        } catch (Exception $e) {
            $data = [
                'status' => -1,
                'msg'    => '访问超时',
            ];
        }
        
        return $data;
    }
    
    
    /**
     * 发送群消息
     *
     * @param int    $group_id
     * @param string $content
     *
     * @return array
     */
    public function sendGroupMsg(int $group_id, string $content): array
    {
        $param = [
            'group'   => $group_id,
            'content' => $content,
        ];
        try {
            $this->query('/sendGroupMsg', $param);
            if ($this->ret_code === 0) {
                $data = [
                    'status' => 1,
                    'msg'    => '发送成功',
                    'time'   => 0,
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg'    => $this->ret_message,
                ];
            }
        } catch (Exception $e) {
            $data = [
                'status' => -1,
                'msg'    => '访问超时',
            ];
        }
        
        return $data;
    }
    
    /**
     * 获取框架所有QQ
     *
     * @return string
     */
    public function getAll(): string
    {
        // {"2071267038":{"协议":"安卓手表","昵称":"步数助手 \\u2776","等级":0,"接收":0,"发送":0,"在线":"2分20秒","状态":1,"附加信息":"在线：2分20秒"},"908777454":{"协议":"安卓平板","昵称":"收款专用户","等级":0,"接收":0,"发送":0,"在线":"2分20秒","状态":1,"附加信息":"在线：2分20秒"}}
        
        
        try {
            $this->query('/getAll', ['qq' => 10000]);
            if ($this->ret_code === 0) {
                $arr    = json_decode($this->ret_data, true);
                $qqlist = [];
                if (count($arr) > 0) {
                    foreach ($arr as $qq => $item) {
                        if ($qq) {
                            $qqlist[$qq] = [
                                '昵称'       => $item['昵称'],
                                '登录状态'   => $item['状态'] === 1 ? '登录完毕' : '未登录',
                                '等级信息'   => $item['等级'],
                                '收发信息'   => $item['附加信息'],
                                '登录IP'     => '',
                                '登录协议'   => $item['协议'],
                                '腾讯服务器' => '',
                            ];
                        }
                    }
                }
                
                $data = ['QQlist' => $qqlist];
                
                return json_encode($data, JSON_UNESCAPED_UNICODE);
            } else {
                return $this->ret_message;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 好友请求事件处理
     *
     * @param int  $toqq      对方QQ
     * @param int  $req       消息Req
     * @param int  $seq       消息Seq
     * @param int  $oper_type 1同意 2拒绝
     * @param bool $pack      是否需要自己发包 ，否为使用框架自身API (自己发包只能同意请求)
     *
     * @return string 不会有返回值
     */
    public function friendHandle(int $toqq, int $req, int $seq, int $oper_type, bool $pack = false): string
    {
        try {
            if ($pack) {
                $param = [
                    'toqq' => $toqq,
                ];
                $this->query('/agreeFriend', $param);
            } else {
                $param = [
                    'toqq'      => $toqq,
                    'req'       => $req,
                    'seq'       => $seq,
                    'oper_type' => $oper_type,
                ];
                $this->query('/friendHandle', $param);
            }
            return $this->ret_message;
        } catch (Exception $e) {
            return '好友请求处理失败：' . $e->getMessage();
        }
    }
    
    /**
     * 入群验证事件处理
     *
     * @param int    $group      群号
     * @param int    $toqq       对方QQ
     * @param int    $seq        消息Seq
     * @param int    $oper_type  11同意 12拒绝 14忽略
     * @param int    $event_type 事件类型(1:我被邀请加入群 3:某人申请加群)
     * @param string $reason     可空, 当拒绝时，可在此设置拒绝理由
     *
     * @return string 不会有返回值
     */
    public function groupHandle(int $group, int $toqq, int $seq, int $oper_type, int $event_type, string $reason = ''): string
    {
        $param = [
            'group'      => $group,
            'toqq'       => $toqq,
            'seq'        => $seq,
            'oper_type'  => $oper_type,
            'event_type' => $event_type,
            'reason'     => $reason,
        ];
        try {
            $this->query('/groupHandle', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return '入群验证处理失败：' . $e->getMessage();
        }
    }
    
    /**
     * 踢出群成员
     *
     * @param int $group 群号
     * @param int $toqq  对方QQ
     *
     * @return string
     */
    public function kick(int $group, int $toqq): string
    {
        $param = [
            'group' => $group,
            'toqq'  => $toqq,
        ];
        try {
            $this->query('/kick', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return '踢出群成员失败：' . $e->getMessage();
        }
    }
    
    /**
     * 撤回消息 私聊
     *
     * @param int $toqq   对方QQ
     * @param int $random random
     * @param int $req    req
     * @param int $time   消息接受时间
     *
     * @return string
     */
    public function withdrawFriend(int $toqq, int $random, int $req, int $time): string
    {
        $param = [
            'type'   => 'private',
            'toqq'   => $toqq,
            'random' => $random,
            'req'    => $req,
            'time'   => $time,
        ];
        try {
            $this->query('/withdraw', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return '撤回私聊失败：' . $e->getMessage();
        }
    }
    
    /**
     * 撤回消息 群聊
     * （管理员可以撤回他人）
     *
     * @param int $group  群号
     * @param int $random random
     * @param int $req    req
     *
     * @return string
     */
    public function withdrawGroup(int $group, int $random, int $req): string
    {
        $param = [
            'type'   => 'group',
            'group'  => $group,
            'random' => $random,
            'req'    => $req,
        ];
        try {
            $this->query('/withdraw', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return '撤回群聊失败：' . $e->getMessage();
        }
    }
    
    /**
     * 添加QQ
     *
     * @param int|string $qq       QQ号
     * @param string     $pwd      密码
     * @param int        $protocol 协议：0 安卓QQ,1 企点QQ,2 QQaPad,3 企业QQ,4 手机Tim,5 手表QQ,6 QQiPad,7 macQQ,8 LinuxQQ 普通QQ无法登录企业/企点
     *
     * @return string
     */
    public function add(int|string $qq, string $pwd, int $protocol): string
    {
        $param = [
            'qq'       => $qq,
            'pwd'      => $pwd,
            'protocol' => $protocol,
        ];
        try {
            $this->query('/add', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return '添加QQ失败：' . $e->getMessage();
        }
    }
    
    /**
     * 登录指定QQ （需要先添加QQ）
     *
     * @param int|string $qq
     *
     * @return array
     */
    public function login(int|string $qq): array
    {
        $param = [
            'qq' => $qq,
        ];
        try {
            $this->query('/login', $param);
            // 2、239为登录下发成功，但需要验证  改为0是兼容其他框架的返回值
            if ($this->ret_code === 2 || $this->ret_code === 239) {
                $this->ret_code = 0;
            }
            return [
                'retcode' => (string)$this->ret_code,
                'retmsg'  => $this->ret_message,
            ];
        } catch (Exception $e) {
            return [
                'retcode' => -1,
                'retmsg'  => '登录失败：' . $e->getMessage(),
            ];
        }
    }
    
    /**
     * 下线指定QQ （需要先添加QQ）
     *
     * @param int|string $qq
     *
     * @return array
     */
    public function logout(int|string $qq): array
    {
        try {
            $this->query('/logout', [
                'qq' => $qq,
            ]);
            if ($this->ret_code === 0) {
                $data = [
                    'status' => 1,
                    'msg'    => $this->robot_qq . '删除成功',
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg'    => $this->ret_message,
                ];
            }
        } catch (Exception $e) {
            $data = [
                'status' => 2,
                'msg'    => '下线失败：' . $e->getMessage(),
            ];
        }
        
        return $data;
    }
    
    
    /**
     * 领取红包
     *
     * @param int|string $toqq      红包发送人QQ
     * @param int|string $group     红包所在群号
     * @param string     $redpack   红包代码
     * @param string     $audiohash 语音包匹配的hash ，文字为恭喜发财
     *
     * @return string 一段json
     * {"retcode":"0","retmsg":"ok","skey":"v09dfa57922653004a23210948310ad3","skey_expire":"1500","trans_seq":"0","recv_object":{"amount":"1"},"send_object":{"bus_type":"2","channel":"65536","feedsid":"","grab_uin_list":"","hb_idiom":"","idiom_alpha":"","idiom_seq":"","is_first_grap":"1","is_owner":"0","listid":"10000466012310181400115814156600","poem_rule":"","rareword_explain_url":"https://h5.qianbao.qq.com/rareWordRedPacket?_wwv=516&_wv=16781312&rareWord=%E5%BA%8A%E5%89%8D%E6%98%8E%E6%9C%88%E5%85%89%E7%96%91%E6%98%AF%E5%9C%B0%E4%B8%8A%E9%9C%9C","send_name":"simon??","send_tinyid":"","send_uin":"454701103","show_pron":"","type":"1","wishing":"床前明月光疑是地上霜"},"state":"0","need_realname_flag":"0"}
     */
    public function redpack(int|string $toqq, int|string $group, string $redpack, string $audiohash = ''): string
    {
        // QY框架  群里拼手气红包
        // [redpack,tps=\u51c0\u5316\u7f51\u7edc\u73af\u5883\uff0c\u7ef4\u62a4\u548c\u8c10\u793e\u4f1a\uff0c\u7ea2\u5305\u6d88\u606f\u5df2\u505c\u7528,title=测试,channel=1]
        //
        //panda 群拼手气  apad扫码
        // [redpack,listid=10000320012310183600112515134500,authkey=15b9af62ec68a0468800735bb304fa39o7,title=哈哈,common=false,subtype=6,channel=1]
        //
        // [redpack,listid=10000320012310183600102391158100,authkey=78ff890bb756efad0e424ebf425c757bey,title=123,common=false,subtype=6,channel=1]
        //
        //群普通红包
        // [redpack,listid=10000466012310181400115814094400,authkey=90e5661753f8c870ccfab6678d7d611fo2,title=6,common=true,subtype=4,channel=1]
        //
        //群专属
        // [redpack,touins=908777454|,listid=10000466012310183700111092596600,authkey=283cb308ec8b1bdbd1fec72776abd4c0nj,title=恭喜发财,common=false,subtype=16,channel=1024]
        //
        // 群口令
        // [redpack,listid=10000466012310181400105716573800,authkey=584da0093c820c58a47a80989c5de43cmk,title=确认过眼神，我是对的人,common=false,subtype=12,channel=32]
        //
        //语音红包
        // [redpack,listid=10000466012310181400115814156600,authkey=17492ed786c0b4a2b963705fdd8ca39fc4,title=床前明月光疑是地上霜,common=false,subtype=26,channel=65536]
        $param = [
            'toqq'      => $toqq,
            'group'     => $group,
            'redpack'   => $redpack,
            'audiohash' => $audiohash,
        ];
        //
        //' 没实名 {"retcode":"0","retmsg":"根据国家政策，实名认证即可领取红包。实名信息仅用于公安部认证，QQ不会用于其他用途。24小时未领取，红包将被退回","returl":"tenpaysdk://idCardVerify","state":"5","balance":"0","need_realname_flag":"1"}
        //
        //' 首次领成功 {"retcode":"0","retmsg":"ok","skey":"v09dfa65421652ff19dc1d87bdb4aa9f","skey_expire":"1500","trans_seq":"1","recv_object":{"amount":"2"},"send_object":{"bus_type":"2","channel":"1","feedsid":"","grab_uin_list":"","hb_idiom":"","idiom_alpha":"","idiom_seq":"","is_first_grap":"1","is_owner":"0","listid":"10000320012310183600102391158100","poem_rule":"","rareword_explain_url":"https://h5.qianbao.qq.com/rareWordRedPacket?_wwv=516&_wv=16781312&rareWord=%E6%B5%8B%E8%AF%95","send_name":"simon??","send_tinyid":"","send_uin":"454701103","show_pron":"","type":"1","wishing":"测试"},"state":"0","need_realname_flag":"0"}
        //
        //' 已领取过 {"retcode":"0","retmsg":"ok","skey":"v09dfabcd16652fefdf4b63bce491f8d","skey_expire":"1500","trans_seq":"11","recv_array":[{"amount":"1","answer":"","create_time":"22:43:19","create_ts":"1697640199","recv_list_id":"1000032001231018360011251513450000","recv_name":"往事随风","recv_tinyid":"","recv_uin":"908777454"}],"send_object":{"bus_type":"2","channel":"1","feedsid":"","grab_uin_list":"","hb_idiom":"","idiom_alpha":"","idiom_seq":"","invalid_time":"2023-10-19 20:00:38","is_owner":"0","like_no_num":"0","like_yes_num":"0","listid":"10000320012310183600112515134500","lucky_amount":"1","lucky_create_time":"22:43:19","lucky_tinyid":"0","lucky_uin":"908777454","permit_like":"1","poem_rule":"","rareword_explain_url":"https://h5.qianbao.qq.com/rareWordRedPacket?_wwv=516&_wv=16781312&rareWord=%E5%93%88%E5%93%88","recv_amount":"1","recv_num":"1","send_name":"simon??","send_tinyid":"","send_uin":"454701103","show_pron":"","state":"2","total_amount":"1","total_num":"1","type":"1","wishing":"哈哈"},"self_object":{"amount":"1","answer":"","create_time":"22:43:19","create_ts":"1697640199","recv_list_id":"1000032001231018360011251513450000","recv_name":"往事随风","recv_tinyid":"","recv_uin":"908777454"},"state":"1"}
        //
        // 已领取过2 {"retcode":"0","retmsg":"ok","skey":"v09dfa5792165c67ea357d3c4ecaf503","skey_expire":"1500","trans_seq":"11","recv_array":[{"amount":"5","answer":"","create_time":"03:35:54","create_ts":"1707507354","recv_list_id":"1000044801240210520010334035920001","recv_name":"simon??","recv_tinyid":"","recv_uin":"454701103"},{"amount":"4","answer":"","create_time":"03:07:42","create_ts":"1707505662","recv_list_id":"1000044801240210520010334035920000","recv_name":"908777454","recv_tinyid":"","recv_uin":"908777454"}],"send_object":{"bus_type":"2","channel":"1","feedsid":"","grab_uin_list":"","hb_idiom":"","idiom_alpha":"","idiom_seq":"","invalid_time":"2024-02-11 03:07:38","is_owner":"0","like_no_num":"0","like_yes_num":"0","listid":"10000448012402105200103340359200","lucky_amount":"5","lucky_create_time":"03:35:54","lucky_tinyid":"0","lucky_uin":"454701103","permit_like":"1","poem_rule":"","rareword_explain_url":"https://h5.qianbao.qq.com/rareWordRedPacket?_wwv=516&_wv=16781312&rareWord=j3%E5%A5%BD","recv_amount":"9","recv_num":"2","send_name":"??????????????????????????????","send_tinyid":"","send_uin":"454701103","show_pron":"","state":"1","total_amount":"15","total_num":"3","type":"1","wishing":"j3好"},"self_object":{"amount":"4","answer":"","create_time":"03:07:42","create_ts":"1707505662","recv_list_id":"1000044801240210520010334035920000","recv_name":"908777454","recv_tinyid":"","recv_uin":"908777454"},"state":"1"}
        //
        //' 语音包领取失败
        //' {"retcode":"109020070","retmsg":"语音口令匹配失败","skey":"v09dfa40a21652ff75dc29459ec78851","skey_expire":"1500","trans_seq":"1","err_show_flag":"2"}
        try {
            $this->query('/redpack', $param);
            return $this->ret_data;
        } catch (Exception $e) {
            return '';
        }
    }
    
    
    /**
     * 添加好友
     * 也可用于同意好友请求
     *
     * @param int|string $toqq   对方QQ
     * @param string     $answer 回答问题的答案或是验证消息，多个问题答案用"|"分隔开。 （用于同意好友请求似乎可留空）
     *
     * @return string
     */
    public function addFriend(int|string $toqq, string $answer = ''): string
    {
        $param = [
            'toqq'   => $toqq,
            'answer' => $answer,
        ];
        try {
            $this->query('/addFriend', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 解析CustomNode代码
     * (取卡片消息代码)
     *
     * @param string $code_str [CustomNode,xxxx]
     *
     * @return string
     * {"app":"com.tencent.multimsg","config":{"autosize":1,"forward":1,"round":1,"type":"normal","width":300},"extra":"{\"tsum\":2}","meta":{"detail":{"news":[{"text":" \uD83D\uDEF5\uD83D\uDEF4\uD83D\uDEB2\uD83D\uDE9C\u26DF\uD83D\uDE9B\uD83D\uDE9A\uD83D\uDE99\uD83D\uDE98\uD83D\uDE97\uD83D\uDE96\uD83D\uDE95\uD83D\uDE94\uD83D\uDE93\uD83D\uDE92:冻结查询 "},{"text":" \uD83D\uDEF5\uD83D\uDEF4\uD83D\uDEB2\uD83D\uDE9C\u26DF\uD83D\uDE9B\uD83D\uDE9A\uD83D\uDE99\uD83D\uDE98\uD83D\uDE97\uD83D\uDE96\uD83D\uDE95\uD83D\uDE94\uD83D\uDE93\uD83D\uDE92:菜单 "}],"resid":"jkEHjOlZUwtFm5aVN2md980jMTAFP4kL6nUne7pk4ur7PDst8FMKCNEQDaYxpBt5","source":" 群聊的聊天记录 ","summary":" 查看转发消息  ","uniseq":"8D8E6DDA-35A2-402B-B094-C20C9C5EFDB2"}},"prompt":"[聊天记录]","ver":"0.0.0.5","view":"contact"}
     */
    public function parserCustomNode(string $code_str): string
    {
        $param = [
            'data' => $code_str,
        ];
        
        try {
            $this->query('/parserCustomNode', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 解析转发消息内容
     * (取合并转发消息内容)
     *
     * @param string $resId 通过解析CustomNode代码可以获取到
     *
     * @return string
     * {"richtexts":[{"filename":"MultiMsg","info":[{"card":"","fromqq":454701103,"fromgroup":0,"receivetime":0,"req":0,"random":0,"buddleid":3433,"content":"冻结查询"},{"card":"","fromqq":454701103,"fromgroup":0,"receivetime":0,"req":0,"random":0,"buddleid":3433,"content":"菜单"}]}]}
     */
    public function parserResId(string $resId): string
    {
        $param = [
            'resId' => $resId,
        ];
        
        try {
            $this->query('/parserResId', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 生成customNode代码
     * (上传合并转发消息)
     *
     * @param string $from    “{$from}的聊天记录” 例如:群聊、A和B
     * @param string $text    （字符不可过多，这个接口会自动省略为...）定义封面消息内容,多条消息用符号"<[#]>"分隔,如【A: 巴拉巴拉<[#]>B: 巴拉巴拉<[#]>C: 巴拉巴拉】
     * @param string $msgjson json格式,数据结构可参照API【取合并转发消息内容】的返回结果,"MultiMsg"是最外层的消息,嵌套使用filename作为索引。
     *
     * @return string
     * [customNode,key=xxx]
     */
    public function buildCustomNode(string $from, string $text, string $msgjson): string
    {
        $param = [
            'from'    => $from,
            'text'    => $text,
            'msgjson' => base64_encode($msgjson),
        ];
        
        try {
            $this->query('/buildCustomNode', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 获取名片赞列表
     *
     * 同时返回赞我列表前30条数据和当日我赞他人列表
     *
     * @param int $offset 跳过多少条，默认从0开始获取
     *
     * @return string jce.view值或报错内容
     */
    public function getMpzList(int $offset = 0): string
    {
        $param = [
            // time在后期可以删除了，因为不需要这个参数  还留着仅为兼容旧版插件考虑
            'time'     => time(),
            'offset'   => $offset,
            'is_voter' => 1,
        ];
        
        try {
            $this->query('/getMpzList', $param);
            if ($this->ret_code === 0) {
                return $this->ret_data;
            } else {
                return $this->ret_message;
            }
        } catch (Exception $e) {
            return 'error：' . $e->getMessage();
        }
    }
    
    /**
     * 发送输入状态
     *
     * @param int|string $toqq
     * @param int        $code 1:正在输入,2:关闭显示,3:正在说话
     *
     * @return string
     */
    public function sendStatus(int|string $toqq, int $code = 1): string
    {
        $param = [
            'toqq' => $toqq,
            'code' => $code,
        ];
        
        try {
            $this->query('/sendStatus', $param);
            return $this->ret_message;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    /**
     * 获取好友申请的过滤列表
     *
     * @return array
     */
    public function getFriendFilterList(): array
    {
        try {
            // {
            //    "code": 0,
            //    "message": "获取过滤列表成功",
            //    "data": "{\"1\":\"3433\",\"2\":\"0\",\"3\":\"0\",\"4\":{\"1\":\"1\",\"2\":{\"1\":{\"1\":\"3497104486\",\"2\":\"白勺\",\"3\":\"0\",\"4\":\"1\",\"5\":\"\",\"6\":\"QQ群\",\"7\":\"对方加好友过于频繁，请谨慎同意\",\"8\":\"1735985315\",\"9\":\"1015979007\",\"10\":\"2\",\"12\":\"南昌\",\"13\":\"6D62027C75A8CB8335FA9C0387971A2EAE29D805C89960C3A866B719477B2D32676A45C77D7FAF2838C2F31887D17F31\"},\"1(1)\":{\"1\":\"2449048416\",\"2\":\"只对你动情????\",\"3\":\"20\",\"4\":\"1\",\"5\":\"\",\"6\":\"QQ空间\",\"7\":\"对方加好友过于频繁，请谨慎同意\",\"8\":\"1735744860\",\"9\":\"0\",\"10\":\"0\",\"12\":\"南阳\",\"13\":\"DF3BE38582665C637A53441F1A89C44AB49D45A235597B45DF86C938957348FDBA0138B0A35E8542F3BB296466B3DE5C\"}}}}",
            //    "echo": ""
            //}
            $this->query('/getFriendFilterList', []);
            if ($this->ret_code === 0) {
                return [
                    'status' => 1,
                    'msg'    => $this->ret_message,
                    'data'   => json_decode($this->ret_data, true),
                ];
            } else {
                return [
                    'status' => 2,
                    'msg'    => $this->ret_message,
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => 2,
                'msg'    => $e->getMessage(),
            ];
        }
    }
    
    /**
     * 删除名片赞列表的历史记录
     *
     * @param string|int $toqq   被删记录的QQ
     * @param int        $offset 跳过多少条
     *
     * @return array
     */
    public function delMpzHistory(string|int $toqq = '', int $offset = 450): array
    {
        try {
            $params = [
                'toqq'   => $toqq,
                'offset' => $offset,
            ];
            $this->query('/delMpzHistory', $params);
            if ($this->ret_code === 0) {
                return [
                    'status' => 1,
                    'msg'    => '清理成功',
                    'data'   => json_decode($this->ret_data, true),
                ];
            } else {
                return [
                    'status' => 2,
                    'msg'    => $this->ret_message,
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => 2,
                'msg'    => $e->getMessage(),
            ];
        }
    }
    
    /**
     * 获取好友列表
     *
     * @param int $pack 是否用发包模式 0否
     * @param int $next_id
     * @param int $next_qq
     *
     * @return array
     */
    public function getFriendList(int $pack = 1, int $next_id = 0, int $next_qq = 0): array
    {
        try {
            $params = [
                'pack'    => $pack,
                'next_id' => $next_id,
                'next_qq' => $next_qq,
            ];
            $this->query('/getFriendList', $params);
            if ($this->ret_code === 0) {
                return [
                    'status' => 1,
                    'msg'    => '获取成功',
                    'data'   => json_decode($this->ret_data, true),
                ];
            } else {
                return [
                    'status' => 2,
                    'msg'    => $this->ret_message,
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => 2,
                'msg'    => $e->getMessage(),
            ];
        }
    }
    
    /**
     * 提交数据
     *
     * @param string $path
     * @param array  $param
     *
     * @return string
     * @throws Exception
     */
    private function query(string $path, array $param = []): string
    {
        // 追加框架QQ
        $param['qq'] = $param['qq'] ?? $this->robot_qq;
        if (isset($param['qq']) && $param['qq'] === 0) {
            die('qq错误：' . $param['qq']);
        }
        // 追加key
        $param['key'] = $this->key;
        
        $url = "http://{$this->host}:{$this->port}{$path}";
        
        $json = $this->curl($url, post: json_encode($param), timeout: $this->timeout);
        if ($json) {
            $arr = json_decode($json, true);
            // 处理控制符导致的解析错误
            if (json_last_error() === JSON_ERROR_CTRL_CHAR) {
                $json = parent::strip_control_characters($json);
                $arr  = json_decode($json, true);
            }
            
            $this->ret_ok      = true;
            $this->ret_code    = $arr['code'];
            $this->ret_message = $arr['message'];
            $this->ret_data    = $arr['data'] ?: '';
        } else {
            $this->ret_ok      = false;
            $this->ret_code    = -1;
            $this->ret_message = '接口访问超时';
            $this->ret_data    = '';
            throw new Exception("{$path}接口访问超时", $this->ret_code);
        }
        
        return $json;
    }
    
    /**
     * 获取当前类名（包含命名空间）
     *
     * @return string
     */
    public function getClassName(): string
    {
        return __CLASS__;
    }
}