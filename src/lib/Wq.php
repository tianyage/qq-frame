<?php

namespace Tianyage\QqFrame\lib;

class Wq extends Common
{
    
    /**
     * 事件名称代码
     *
     */
    public array $EVENT_TYPECODE = [
        'addFreind'       => 105,
        'addGroup'        => 3,
        'invitedAddGroup' => 1,
        'kick'            => 6,
    ];
    
    
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
    
    public function init(string $host, int $robot, int $port = 9999, string $key = 'A2I8C'): void
    {
        $this->host     = $host;
        $this->robot_qq = $robot;
        $this->port     = $port;
        $this->key      = $key;
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
     * @param int        $protocol 协议：0=安卓,1=企点,2=HD,3=企业,4=TIM,5=iPad,6=苹果,7=Mac,8=Linux,9=手表
     *
     * @return array
     */
    public function qrLogin(int|string $qq, int $protocol = 9): array
    {
        $param = [
            'qq'       => $qq,
            'protocol' => $protocol,
        ];
        $json  = $this->query('/qrLogin', $param);
        if ($json) {
            $arr     = json_decode($json, true);
            $retcode = $arr['retcode'];
            $retmsg  = $arr['retmsg'];
            if ($retcode === 0) {
                $data = [
                    'status' => 1,
                    'qr'     => $arr['qr'],
                    'qr_id'  => $arr['qr_id'],
                    'msg'    => '二维码获取成功',
                ];
            } else {
                $data = [
                    'status' => 2,
                    'qr'     => '',
                    'msg'    => $retmsg,
                ];
            }
        } else {
            $data = [
                'status' => 2,
                'qr'     => '',
                'msg'    => '服务器维护中，请稍后再试',
            ];
        }
        return $data;
    }
    
    /**
     * QQ是否在线
     *
     * @return bool
     */
    public function checkOnline(): bool
    {
        $res = $this->query('/getSessionkey'); // 失败返回json  成功返回32位字符串 访问超时返回空
        if ($res) {
            $arr = json_decode($res, true);
            if ($arr) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    
    /**
     * 获取二维码状态
     *
     * @param string $qr_id
     *
     * @return array
     */
    public function qrQuery(string $qr_id): array
    {
        // 1=确认成功，正在登陆|2=登录成功|3=扫描成功，请在手机上点击确认|4=二维码失效，请重新申请|5=未申请二维码|6=等待扫码  -1申请和扫码q不一致
        $retcode = (int)$this->query('/qrQuery', ['qr_id' => $qr_id]);
        if ($retcode) {
            if ($retcode === 1 || $retcode === 2) {
                $data = [
                    'status' => 1,
                    'msg'    => "{$this->robot_qq}登录成功",
                ];
            } elseif ($retcode === 4) {
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}已主动取消了二维码登录",
                ];
            } elseif ($retcode === 3) {
                $data = [
                    'status' => 3,
                    'msg'    => "{$this->robot_qq}扫码成功 等待确认",
                ];
            } elseif ($retcode === 6) {
                $data = [
                    'status' => 3,
                    'msg'    => "{$this->robot_qq}等待扫码",
                ];
            } elseif ($retcode === 5) {
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}登录失败，QQ已不存在云端内",
                ];
            } elseif ($retcode === -1) {
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}登录失败，申请QQ和实际扫码QQ不一致",
                ];
            } else {
                // 其他错误
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}登录失败，未知错误",
                ];
            }
        } else {
            // 其他错误
            $data = [
                'status' => 3,
                'msg'    => "服务器访问超时",
            ];
        }
        
        return $data;
    }
    
    /**
     * 删除QQ
     *
     * @return array
     */
    public function del(): array
    {
        $res = $this->query('/del');
        $arr = json_decode($res, true);
        if ($arr['retcode'] === 200 || $arr['retcode'] === 404) {
            // 200成功 404 qq不存在
            $data = [
                'status' => 1,
                'msg'    => $this->robot_qq . '删除成功',
            ];
        } else {
            $data = [
                'status' => 2,
                'qr'     => '',
                'msg'    => $arr['retmsg'],
            ];
        }
        return $data;
    }
    
    /**
     * 获取cookie
     *
     * @param string $callback_url 如QQ空间是：https://h5.qzone.qq.com/mqzone/index
     * @param int    $appid        如QQ空间是：549000929
     * @param int    $daid         如QQ空间是：5
     *
     * @return string 失败或无权限返回空白
     */
    public function getCookie(string $callback_url, int $appid, int $daid): string
    {
        $param = [
            'url'   => $callback_url,
            'appid' => $appid,
            'daid'  => $daid,
        ];
        return $this->query('/getCookie', $param);
    }
    
    /**
     * 群签到+打卡
     *
     * @param string $group
     * @param string $params
     *
     * @return string
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
     * @param string $toqq
     * @param int    $num
     *
     * @return string
     */
    public function cardLike(string $toqq, int $num = 1): string
    {
        // {"server_info":{"key":"123","port":"4001","serverUrl":"http://192.168.11.1"},"type":"Event","data":{"框架QQ":"908777454","操作QQ":"0","触发QQ":"454701103","来源群号":"0","来源群名":"","消息内容":"赞了我的资料卡1次","消息类型":"108","操作QQ昵称":"","触发QQ昵称":"simon\\u2776","消息子类型":"10021","消息Seq":"0","消息时间戳":"1679587653"}}
        $num = max($num, 1); // 最少点赞一次
        
        $json = '';
        for ($i = 1; $i <= $num; $i++) {
            // 最多执行20次
            if ($i > 20) {
                break;
            }
            $json = $this->query('/cardLike', [
                'toqq' => $toqq,
            ]);
            
            // 连续点赞做个延迟
            if ($num > 1) {
                usleep(20000);
            }
        }
        if ($json) {
            $arr = json_decode($json, true);
            if ($arr['retcode'] === 0) {
                $msg = "名片点赞{$num}次成功";
            } else {
                $retmsg = $arr['retmsg'] ?: "手表协议风控中[{$arr['retcode']}]";
                $msg    = "名片点赞{$num}次失败：{$retmsg}";
            }
        } else {
            $msg = "名片点赞超时";
        }
        return $msg;
    }
    
    /**
     * 上传好友图片
     *
     * @param int    $toqq
     * @param string $file_url 图片地址
     * @param bool   $isflash  是否闪照(逻辑型,可空)
     * @param string $type     path:本地路径 url:网络路径 usermem:共享内存id base64:BASE64编码数据(不推荐)
     *
     * @return string [pic,hash=04B9E8C81D6656AF805233CBFAEEBE19,guid=/454701103-2590811547-04B9E8C81D6656AF805233CBFAEEBE19,wide=0,high=0,cartoon=false]
     *                失败返回空
     */
    public function uploadFriendPic(int $toqq, string $file_url, bool $isflash = false, string $type = 'url'): string
    {
        $param = [
            'toqq'     => $toqq,
            'pic_type' => $type,
            'pic'      => $file_url,
            'is_flash' => $isflash,
        ];
        $ret   = $this->query('/uploadFriendPic', $param);
        
        // 字符串开头是{的表示图片上传失败了，exp:{"retcode":404,"retmsg":"未在框架找到对应QQ","time":"1680018936"}
        if (str_starts_with($ret, '{')) {
            return '';
        } else {
            return $ret;
        }
    }
    
    /**
     * 上传群图片
     *
     * @param int    $group_id
     * @param string $file_url 图片地址
     * @param bool   $isflash  是否闪照(逻辑型,可空)
     * @param string $type     path:本地路径 url:网络路径 usermem:共享内存id base64:BASE64编码数据(不推荐)
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
        $ret   = $this->query('/uploadGroupPic', $param);
        // 字符串开头是{的表示图片上传失败了，exp:{"retcode":404,"retmsg":"未在框架找到对应QQ","time":"1680018936"}
        if (str_starts_with($ret, '{')) {
            return '';
        } else {
            return $ret;
        }
    }
    
    /**
     * 发送私聊消息
     *
     * @param int|string $toqq
     * @param string     $content
     *
     * @return string
     */
    public function sendFriendMsg(int|string $toqq, string $content): string
    {
        $param = [
            'toqq'    => $toqq,
            'content' => $content,
        ];
        // {"retcode":0,"retmsg":"","time":"1680015780"}  time用于撤回
        return $this->query('/sendFriendMsg', $param);
    }
    
    /**
     * 发送群消息
     *
     * @param int    $group_id
     * @param string $content
     *
     * @return string
     */
    public function sendGroupMsg(int $group_id, string $content): string
    {
        $param = [
            'group'   => $group_id,
            'content' => $content,
        ];
        // {"retcode":0,"retmsg":"","time":"1680015202","msg_req":9800,"msg_random":1680024476}
        return $this->query('/sendFriendMsg', $param);
    }
    
    
    /**
     * 获取框架所有QQ
     *
     * @return string
     */
    public function getAll(): string
    {
        // {"QQlist":{"454701103":{"昵称":"simon\\u2776","登录状态":"未登录","等级信息":"SVIP10|169|29550|7.7| 30","收发信息":"10分55秒 收:2,发:0,速:0条/min","登录IP":"10.52.100.181[本地登录]","登录协议":"手表QQ","腾讯服务器":"183.47.117.157:443[所在地代码:sz]"},"2686426513":{"昵称":"\\u0E51花生小狗\\u0E51","登录状态":"登录完毕","等级信息":"NoVIP| 29| 961|0.0| 59","收发信息":"11分26秒 收:3,发:15,速:1条/min","登录IP":"10.52.100.181[本地登录]","登录协议":"手表QQ","腾讯服务器":"222.94.109.183:443[所在地代码:sh]"}}}
        return $this->query('/getAll', ['qq' => 10000]);
    }
    
    /**
     * 好友请求事件处理
     *
     * @param int $toqq      对方QQ
     * @param int $seq       消息Seq
     * @param int $oper_type 1同意 2拒绝
     *
     * @return string 不会有返回值
     */
    public function friendHandle(int $toqq, int $seq, int $oper_type): string
    {
        $param = [
            'toqq'      => $toqq,
            'seq'       => $seq,
            'oper_type' => $oper_type,
        ];
        return $this->query('/friendHandle', $param);
    }
    
    
    /**
     * 提交数据
     *
     * @param string $path
     * @param array  $param
     *
     * @return string
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
        
        return $this->curl($url, post: json_encode($param));
    }
}