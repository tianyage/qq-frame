<?php

namespace Tianyage\QqFrame\lib;

class Qy extends Common
{
    
    /**
     * 事件名称代码
     *
     */
    public array $EVENT_TYPE_CODE = [
        '群事件_我被邀请加入群'       => 1,
        '群事件_某人加入了群'         => 2,
        '群事件_某人申请加群'         => 3,
        '群事件_群被解散'             => 4,
        '群事件_某人退出了群'         => 5,
        '群事件_某人被踢出群'         => 6,
        '群事件_某人被禁言'           => 7,
        '群事件_某人撤回事件'         => 8,
        '群事件_某人被取消管理'       => 9,
        '群事件_某人被赋予管理'       => 10,
        '群事件_开启全员禁言'         => 11,
        '群事件_关闭全员禁言'         => 12,
        '群事件_开启匿名聊天'         => 13,
        '群事件_关闭匿名聊天'         => 14,
        '群事件_开启坦白说'           => 15,
        '群事件_关闭坦白说'           => 16,
        '群事件_允许群临时会话'       => 17,
        '群事件_禁止群临时会话'       => 18,
        '群事件_允许发起新的群聊'     => 19,
        '群事件_禁止发起新的群聊'     => 20,
        '群事件_允许上传群文件'       => 21,
        '群事件_禁止上传群文件'       => 22,
        '群事件_允许上传相册'         => 23,
        '群事件_禁止上传相册'         => 24,
        '群事件_某人被邀请入群'       => 25,
        '群事件_展示成员群头衔'       => 26,
        '群事件_隐藏成员群头衔'       => 27,
        '群事件_某人被解除禁言'       => 28,
        '群事件_群名变更'             => 32,
        '群事件_系统提示'             => 33,
        '群事件_群头像事件'           => 34,
        '群事件_入场特效'             => 35,
        '群事件_修改群名片'           => 36,
        '群事件_群被转让'             => 37,
        '群事件_匿名被禁言'           => 40,
        '群事件_匿名被解除禁言'       => 41,
        '群事件_某人的加群申请被拒绝' => 42,
        '群事件_展示群互动标识'       => 43,
        '群事件_隐藏群互动标识'       => 44,
        '群事件_展示群成员等级'       => 45,
        '群事件_隐藏群成员等级'       => 46,
        
        '好友事件_被好友删除'             => 100,
        '好友事件_签名变更'               => 101,
        '好友事件_昵称改变'               => 102,
        '好友事件_某人撤回事件'           => 103,
        '好友事件_有新好友'               => 104,
        '好友事件_好友请求'               => 105,
        '好友事件_对方同意了您的好友请求' => 106,
        '好友事件_对方拒绝了您的好友请求' => 107,
        '好友事件_资料卡点赞'             => 108,
        '好友事件_签名点赞'               => 109,
        '好友事件_签名回复'               => 110,
        '好友事件_个性标签点赞'           => 111,
        '好友事件_随心贴回复'             => 112,
        '好友事件_随心贴增添'             => 113,
        '好友事件_系统提示'               => 114,
        '好友事件_随心贴点赞'             => 115,
        '好友事件_匿名提问_被提问'        => 116,
        '好友事件_匿名提问_被点赞'        => 117,
        '好友事件_匿名提问_被回复'        => 118,
        '好友事件_输入状态'               => 119,
        '空间事件_与我相关'               => 29,
        
        '登录事件_电脑上线'             => 200,
        '登录事件_电脑下线'             => 201,
        '登录事件_移动设备上线'         => 202,
        '登录事件_移动设备下线'         => 203,
        '登录事件_其他应用登录验证请求' => 204,
        '框架事件_登录成功'             => 31,
        '框架事件_登录失败'             => 38,
    ];
    
    public array $MSG_TYPE_CODE = [
        '消息类型_临时会话'                  => 141,
        '消息类型_临时会话_群临时'           => 0,
        '消息类型_临时会话_讨论组临时'       => 1,
        '消息类型_临时会话_公众号'           => 129,
        '消息类型_临时会话_网页QQ咨询'       => 201,
        '消息类型_临时会话_好友申请验证消息' => 134,
        '消息类型_好友通常消息'              => 166,
        '消息类型_讨论组消息'                => 83,
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
    
    public function init(string $host, int $robot, int $port = 4000, string $key = 'A2I8C'): void
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
     * @param int|string $protocol 协议：0=安卓,1=企点,2=HD,3=企业,4=TIM,5=iPad,6=苹果,7=Mac,8=Linux,9~16=手表1-8,17谷歌QQ,18鸿蒙QQ,19鸿蒙HD,20LiteQQ
     *
     * @return array
     */
    public function qrLogin(int|string $qq, int|string $protocol = 15): array
    {
        // 将字符串协议改为正确的code
        if (is_string($protocol)) {
            $protocol = match ($protocol) {
                'watch2' => 15,
                'apad'   => 2,
                'ipad'   => 5,
                'pc'     => 8,
                // 'watch'
                default  => 9,
            };
        }
        
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
                'msg'    => $this->port . '号服务器维护中，请稍后再试',
            ];
        }
        return $data;
    }
    
    /**
     * QQ是否在线
     *
     * @return array
     */
    public function checkOnline(): array
    {
        $res = $this->query('/getSessionkey'); // 失败返回json  成功返回32位字符串 访问超时返回空
        if ($res) {
            $arr = json_decode($res, true);
            if ($arr) {
                return [
                    'status' => 2,
                    'msg'    => '当前QQ不在线',
                    'data'   => $arr,
                ];
            } else {
                return [
                    'status' => 1,
                    'msg'    => $res,
                ];
            }
        } else {
            return [
                'status' => 2,
                'msg'    => '访问接口超时',
            ];
        }
    }
    
    /**
     * 获取二维码状态
     *
     * @param string $qr_id
     *
     * @return array
     */
    public function qrQuery(string $qr_id = ''): array
    {
        $json = $this->query('/qrQuery', ['qr_id' => $qr_id]);
        if ($json) {
            $arr = json_decode($json, true);
            // QY框架成功获取数据时返回code msg , 报错时（比如QQ不存在）是返回retcode retmsg
            $retcode = $arr['code'] ?? $arr['retcode'];
            $retmsg  = $arr['msg'] ?? $arr['retmsg'];
            if ($retcode === 200) {
                $data = [
                    'status' => 1,
                    'msg'    => "{$this->robot_qq}登录成功",
                ];
            } elseif ($retcode === 54) {
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}已主动取消了二维码登录",
                ];
            } elseif ($retcode === -11) {
                $data = [
                    'status' => 4,
                    'msg'    => "申请二维码的{$this->robot_qq}与实际扫码的QQ号不一致，登录失败",
                ];
            } elseif ($retcode === 53) {
                // {"code":53,"msg":"扫码成功,点击继续登录即可完成上线","qrcode_qq":"454701103"}
                $data = [
                    'status' => 3,
                    'msg'    => "{$this->robot_qq}扫码成功 等待确认",
                ];
            } elseif ($retcode === 48) {
                $data = [
                    'status' => 3,
                    'msg'    => "{$this->robot_qq}等待扫码",
                ];
            } elseif ($retcode === 404) {
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}登录失败，QQ已不存在云端内",
                ];
            } elseif ($retcode === 0 && str_contains($retmsg, '登录成功')) {
                // {"code":0,"msg":"确认登录成功！开始执行上线操作","qrcode_qq":"454701103"}
                $data = [
                    'status' => 3,
                    'msg'    => "{$this->robot_qq}授权成功，开始执行登录上线操作",
                ];
            } else {
                // 其他错误
                $data = [
                    'status' => 2,
                    'msg'    => "{$this->robot_qq}登录失败：{$retmsg}",
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
     * @param string $toqq 对方QQ
     * @param int    $num  点赞次数 默认1
     *
     * @return string
     */
    public function cardLike(string $toqq, int $num = 1): string
    {
        // {"server_info":{"key":"123","port":"4001","serverUrl":"http://192.168.11.1"},"type":"Event","data":{"框架QQ":"908777454","操作QQ":"0","触发QQ":"454701103","来源群号":"0","来源群名":"","消息内容":"赞了我的资料卡1次","消息类型":"108","操作QQ昵称":"","触发QQ昵称":"simon\\u2776","消息子类型":"10021","消息Seq":"0","消息时间戳":"1679587653"}}
        $num = max($num, 1); // 最少点赞一次
        
        //        $json    = '';
        $succ = 0; // 点赞成功次数的统计
        $err  = 0; // 点赞失败
        //        $timeout = 0; // 点赞超时
        $errmsg = ''; // 点赞错误信息
        
        for ($i = 1; $i <= $num; $i++) {
            // 最多执行20次
            if ($i > 20) {
                break;
            }
            
            // 判断点赞成功与失败
            $json = $this->query('/cardLike', [
                'toqq' => $toqq,
            ]);
            if ($json) {
                $arr = json_decode($json, true);
                // 成功
                if ($arr['retcode'] === 0) {
                    $succ++;
                } elseif ($arr['retcode'] === 1) {
                    $err++;
                    $errmsg = "TA不是你的好友";
                    break; // 点赞失败的话就停止循环
                } elseif ($arr['retcode'] === 404) {
                    $err++;
                    $errmsg = "自动更新已掉线";
                    break; //点赞失败的话就停止循环
                } else {
                    $err++;
                    $errmsg = $arr['retmsg'] ?: "手表协议风控中[{$arr['retcode']}]";
                    break; // 点赞失败后直接跳出循环
                }
            } else {
                $err++;
                //                $timeout++;
                $errmsg = '点赞超时';
            }
            
            // 连续点赞做个延迟 0.02s
            if ($num > 2 && $num !== $i) {
                usleep(mt_rand(20000, 30000));  // 微秒
            }
        }
        
        // 总结本次点赞信息
        if ($num > 1) {
            if ($err) {
                $msg = "名片点赞{$num}次，其中{$succ}次成功（{$errmsg}）";
            } else {
                $msg = "名片点赞成功{$num}次";
            }
        } elseif ($succ) {
            $msg = '名片点赞成功1次';
        } else {
            $msg = '名片点赞失败1次：' . $errmsg;
        }
        
        //        if ($json) {
        //            $arr = json_decode($json, true);
        //            if ($arr['retcode'] === 0) {
        //                $msg = "名片点赞{$num}次成功";
        //            } elseif ($arr['retcode'] === 1) {
        //                $msg = "名片点赞{$num}次失败：TA不是你的好友";
        //            } else {
        //                $retmsg = $arr['retmsg'] ?: "手表协议风控中[{$arr['retcode']}]";
        //                $msg    = "名片点赞{$num}次失败：{$retmsg}";
        //            }
        //        } else {
        //            $msg = "名片点赞超时";
        //        }
        return $msg;
    }
    
    /**
     * 名片赞2
     * （发功能包版，一次性点赞，可以减少接口访问次数了）
     *
     * @param string $toqq 对方QQ
     * @param int    $num  点赞次数 默认1
     *
     * @return string
     */
    public function cardLike2(string $toqq, int $num = 1): string
    {
        // {"server_info":{"key":"123","port":"4001","serverUrl":"http://192.168.11.1"},"type":"Event","data":{"框架QQ":"908777454","操作QQ":"0","触发QQ":"454701103","来源群号":"0","来源群名":"","消息内容":"赞了我的资料卡1次","消息类型":"108","操作QQ昵称":"","触发QQ昵称":"simon\\u2776","消息子类型":"10021","消息Seq":"0","消息时间戳":"1679587653"}}
        $num = max($num, 1); // 最少1赞
        $num = min($num, 20); // 最多20赞
        
        // 根据数量使用不同的接口
        if ($num > 1) {
            $mod = '/cardLike2';
        } else {
            $mod = '/cardLike';
        }
        $json = $this->query($mod, [
            'toqq' => $toqq,
            'num'  => $num,
        ]);
        if ($json) {
            $arr = json_decode($json, true);
            // 成功
            if ($arr['retcode'] === 0) {
                $msg = "名片点赞{$num}次成功";
            } elseif ($arr['retcode'] === 1) {
                $msg = "名片点赞{$num}次失败：TA不是你的好友";
            } elseif ($arr['retcode'] === 404) {
                // 这条代码暂时无效，因为 发功能包 的api目前不返回这个404 只返回bool
                $msg = "自动更新已掉线";
            } else {
                $retmsg = $arr['retmsg'] ?: "手表协议风控中[{$arr['retcode']}]";
                $msg    = "名片点赞{$num}次失败：{$retmsg}";
            }
        } else {
            $msg = '名片点赞超时';
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
     * 发送私聊json消息
     *
     * @param int|string $toqq
     * @param string     $base64_json
     *
     * @return string
     */
    public function sendFriendMsgJson(int|string $toqq, string $base64_json): string
    {
        $param = [
            'toqq' => $toqq,
            'json' => $base64_json,
        ];
        // {"retcode":0,"retmsg":"","time":"1680015780"}  time用于撤回
        // {"retcode":16,"retmsg":"发送失败，请先添加对方为好友","time":"1696957329"}
        return $this->query('/sendFriendMsgJson', $param);
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
        // {"retcode":110,"retmsg":"发送失败，你已被移出该群，请重新加群。","time":"1696957492","msg_req":24149,"msg_random":1696981710}
        return $this->query('/sendGroupMsg', $param);
    }
    
    /**
     * 发送群json消息
     *
     * @param int    $group_id
     * @param string $base64_json
     *
     * @return string
     */
    public function sendGroupMsgJson(int $group_id, string $base64_json): string
    {
        $param = [
            'group' => $group_id,
            'json'  => $base64_json,
        ];
        // {"retcode":0,"retmsg":"","time":"1680015202","msg_req":9800,"msg_random":1680024476}
        return $this->query('/sendGroupMsgJson', $param);
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
        return $this->query('/groupHandle', $param);
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
        return $this->query('/kick', $param);
    }
    
    /**
     * 添加QQ
     *
     * @param int|string $qq       QQ号
     * @param string     $pwd      密码
     * @param int        $protocol 协议：0=安卓,1=企点,2=HD,3=企业,4=TIM,5=iPad,6=苹果,7=Mac,8=Linux,9~16=手表1-8,17谷歌QQ,18鸿蒙QQ,19鸿蒙HD,20LiteQQ
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
        return $this->query('/add', $param);
    }
    
    /**
     * 登录指定QQ （需要先添加QQ）
     *
     * @param int|string $qq
     *
     * @return string
     */
    public function login(int|string $qq): string
    {
        $param = [
            'qq' => $qq,
        ];
        return $this->query('/login', $param);
    }
    
    /**
     * 下线指定QQ （需要先添加QQ）
     *
     * @param int|string $qq
     *
     * @return string
     */
    public function logout(int|string $qq): string
    {
        $param = [
            'qq' => $qq,
        ];
        return $this->query('/logout', $param);
    }
    
    /**
     * 领取红包
     * (QY不支持领红包)
     *
     * @param int|string $toqq    红包发送人QQ
     * @param int|string $group   红包所在群号
     * @param string     $redpack 红包代码
     *
     * @return string
     */
    public function redpack(int|string $toqq, int|string $group, string $redpack): string
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
            'toqq'    => $toqq,
            'group'   => $group,
            'redpack' => $redpack,
        ];
        return $this->query('/hb', $param);
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