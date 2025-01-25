<?php

declare(strict_types=1);

namespace Tianyage\QqFrame\lib;

class EBotNT extends Common
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
        
        '好友事件_被好友删除'             => 1003,
        '好友事件_签名变更'               => 101,
        '好友事件_昵称改变'               => 102,
        '好友事件_某人撤回事件'           => 103,
        '好友事件_有新好友'               => 1016,
        '好友事件_好友请求'               => 105,
        '好友事件_对方同意了您的好友请求' => 106,
        '好友事件_对方拒绝了您的好友请求' => 107,
        '好友事件_资料卡点赞'             => 1017,
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
        '框架事件_登录成功'             => 11001,
        '框架事件_登录失败'             => 38,
        
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
    
    /**
     * 接口访问超时时间 默认10s
     *
     * @var int
     */
    private int $timeout = 10;
    
    public function init(string $host, int $robot, int $port = 6000, string $key = 'A2I8C'): void
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
     */
    public function qrLogin(int|string $qq, int|string $protocol = 5): array
    {
        // 将字符串协议改为正确的code
        if (is_string($protocol)) {
            if ($protocol === 'watch') {
                $protocol = 5;
            } elseif ($protocol === 'ipad') {
                $protocol = 6;
            } elseif ($protocol === 'pc') {
                $protocol = 9;
            } else {
                $protocol = 5;
            }
        }
        
        $param = [
            'qq'       => $qq,
            'protocol' => $protocol,
        ];
        $json  = $this->query('/qrLogin', $param);
        $arr   = json_decode($json, true);
        if ($arr) {
            $retcode = $arr['retcode'];
            $retmsg  = $arr['retmsg'];
            if ($retcode === 0) {
                $data = [
                    'status' => 1,
                    'qr'     => $arr['qr'],
                    'msg'    => '二维码获取成功',
                ];
            } elseif ($retcode === -103) {
                // 已在执行登录任务
                // 但是小栗子长时间没有主动query会二维码失效，但是如果时间太长的话就会检测不出来（依旧显示等待扫码），所以直接删除
                $this->del();
                $data = [
                    'status' => 2,
                    'msg'    => '二维码已失效',
                ];
            } elseif ($retcode === -104) {
                // QQ[xxxx]当前状态无法再进行登录操作
                // 例如失效 冻结之类的好像，需要先删除再拉取二维码
                $this->del();
                $data = [
                    'status' => 2,
                    'msg'    => '数据已重置，请重试',
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
                'msg'    => '拉取授权超时，请稍后重试',
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
        if ($arr && ($arr['retcode'] === 0 || $arr['retcode'] === -126)) {
            // 0成功 -126 qq不存在
            $data = [
                'status' => 1,
                'msg'    => $this->robot_qq . '删除成功',
            ];
        } else {
            $data = [
                'status' => 2,
                'msg'    => $arr['retmsg'] ?? '删除错误',
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
        $res = $this->query('/getClientkey'); // 失败返回json  成功返回32位字符串 访问超时返回空
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
            $arr     = json_decode($json, true);
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
                    'msg'    => "{$this->robot_qq}登录失败：{$retmsg}[$retcode]",
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
     * 获取cookie
     *
     * @param string $type 登录类型，例：qzone qzoneh5 qun vip ti ... (详细查看getLoginParams方法)
     *
     * @return array
     * @throws \Exception
     */
    public function getCookie(string $type): array
    {
        $ret   = $this->getLoginParams($type);
        $param = [
            'domain' => $ret['domain'],
        ];
        
        $json = $this->query('/getCookie', $param);
        $arr  = json_decode($json, true);
        if (!$json) {
            $data = [
                'status' => -1,
                'msg'    => 'cookie获取超时',
            ];
        } elseif ($arr && $arr['retcode'] === 0) {
            $cookie = $arr['data'];
            preg_match('/skey=(.{10})/', $cookie, $skey);
            preg_match("/p_skey=(.{44})/", $cookie, $p_skey);
            preg_match("/pt4_token=(.{44})/", $cookie, $pt4_token);
            
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
                throw new \Exception($this->robot_qq . ':cookie获取成功但解析失败');
            }
        } else {
            $data = [
                'status' => 2,
                'msg'    => 'cookie获取失败',
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
     * (非好友情况下进行点赞时返回成功，但不一定真正点上了，对方开启陌生人点赞时才能点上(手Q默认关闭陌生人点赞))
     *
     * @param string|int $toqq 对方QQ
     * @param int        $num  点赞次数 默认1
     *
     * @return string
     */
    public function cardLike(string|int $toqq, int $num = 1): string
    {
        // {"server_info":{"key":"123","port":"4001","serverUrl":"http://192.168.11.1"},"type":"Event","data":{"框架QQ":"908777454","操作QQ":"0","触发QQ":"454701103","来源群号":"0","来源群名":"","消息内容":"赞了我的资料卡1次","消息类型":"108","操作QQ昵称":"","触发QQ昵称":"simon\\u2776","消息子类型":"10021","消息Seq":"0","消息时间戳":"1679587653"}}
        $num = max($num, 1); // 最少点赞一次
        
        //        $json    = '';
        $succ = 0; // 点赞成功次数的统计
        $err  = 0; // 点赞失败
        //        $timeout = 0; // 点赞超时
        $errmsg = ''; // 点赞错误信息
        
        for ($i = 1; $i <= $num; $i++) {
            // 好友最多20  陌生人最多执行50次
            if ($i > 20) {
                break;
            }
            
            // 判断点赞成功与失败
            $json = $this->query('/cardLike', [
                'toqq' => $toqq,
            ]);
            
            if ($json) {
                $arr = json_decode($json, true);
                if (isset($arr['retcode'])) {
                    // 成功
                    if ($arr['retcode'] === 0) {
                        $succ++;
                    } elseif ($arr['retcode'] === 404) {
                        $err++;
                        $errmsg = "自动更新已掉线";
                        break; //点赞失败的话就停止循环
                    } else {
                        $err++;
                        $errmsg = ($arr['retmsg'] ?: "PCNT协议风控中") . "[{$arr['retcode']}]";
                        break; // 点赞失败后直接跳出循环
                    }
                } else {
                    if (function_exists('trace')) {
                        trace($json . PHP_EOL, 'cardLike_xlz');
                    }
                    
                    $err++;
                    $errmsg = "异常数据";
                    break; // 点赞失败的话就停止循环
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
            $msg = "名片点赞失败1次：{$errmsg}";
        }
        
        return $msg;
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
        return $this->cardLike($toqq, $num);
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
     * @return array
     */
    public function sendFriendMsg(int|string $toqq, string $content): array
    {
        $param = [
            'toqq'    => $toqq,
            'content' => $content,
        ];
        // {"retcode":0,"retmsg":"","time":"1680015780"}  time用于撤回
        $json = $this->query('/sendFriendMsg', $param);
        if ($json) {
            $arr = json_decode($json, true);
            if ($arr) {
                if ($arr['retcode'] === 0) {
                    $data = [
                        'status' => 1,
                        'msg'    => '发送成功',
                        'time'   => $arr['time'],
                    ];
                } elseif ($arr['retcode'] === 16) {
                    $data = [
                        'status' => 3,
                        'msg'    => '对方不是你的好友',
                    ];
                } elseif ($arr['retcode'] === -1) {
                    // {"retcode":-1,"retmsg":"获取返回数据包失败","time":"0"}
                    // panda框架下，如果toqq不在好友列表中(或者同时是QQ号不存在或被冻结查找不到？) 会返回-1
                    $data = [
                        'status' => -2,
                        'msg'    => '发送数据包失败，对方QQ不存在',
                    ];
                } elseif ($arr['retcode'] === 1 && $arr['retmsg'] === '') {
                    // {"retcode":1,"retmsg":"","time":"1714973481"}
                    $data = [
                        'status' => 1,
                        'msg'    => '发送完成，但消息疑似被屏蔽',
                        'time'   => $arr['time'],
                    ];
                } elseif ($arr['retcode'] === 405) {
                    // [405]该框架QQ未登录
                    $data = [
                        'status' => -1,
                        'msg'    => 'QQ目前离线中',
                    ];
                } else {
                    $data = [
                        'status' => 2,
                        'msg'    => $json,
                    ];
                }
            } else {
                $data = [
                    'status' => 2,
                    'msg'    => '返回结果格式错误',
                ];
            }
        } else {
            $data = [
                'status' => -1,
                'msg'    => '访问超时',
            ];
        }
        
        return $data;
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
        return $this->query('/sendFriendMsgJson', $param);
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
        // {"retcode":0,"retmsg":"","time":"1680015202","msg_req":9800,"msg_random":1680024476}
        // {"retcode":110,"retmsg":"发送失败，你已被移出该群，请重新加群。","time":"1696957492","msg_req":24149,"msg_random":1696981710}
        // {"retcode":120,"retmsg":"你已被禁言，消息无法发送。","time":"1696957492","msg_req":24149,"msg_random":1696981710}
        $json = $this->query('/sendGroupMsg', $param);
        $arr  = json_decode($json, true);
        if ($arr) {
            if ($arr['retcode'] === 0) {
                $data = [
                    'status' => 1,
                    'msg'    => '发送成功',
                    'time'   => $arr['time'],
                ];
            } elseif ($arr['retcode'] === 110) {
                $data = [
                    'status' => 2,
                    'msg'    => '发送失败，你已不在此群',
                ];
            } elseif ($arr['retcode'] === 120) {
                $data = [
                    'status' => 2,
                    'msg'    => '发送失败，群内你已被禁言',
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg'    => "发送失败：[{$arr['retcode']}]" . ($arr['retmsg'] ?? '未知错误'),
                ];
            }
        } else {
            $data = [
                'status' => 2,
                'msg'    => '发送失败，接口返回错误',
            ];
        }
        
        return $data;
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
        
        $str = $this->query('/getAll', ['qq' => 10000]);
        
        $arr = explode("\r\n", $str);
        
        $qqlist = [];
        if (count($arr) > 0) {
            foreach ($arr as $qq) {
                $qqlist[$qq] = [
                    '昵称'       => '',
                    '登录状态'   => '登录完毕',
                    '等级信息'   => '',
                    '收发信息'   => '',
                    '登录IP'     => '',
                    '登录协议'   => 'EBotNT',
                    '腾讯服务器' => '',
                ];
            }
        }
        
        $data = ['QQlist' => $qqlist];
        
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    /**
     * 好友请求事件处理
     *
     * @param int  $toqq      对方QQ
     * @param int  $seq       消息Seq
     * @param int  $oper_type 1同意 2拒绝
     * @param bool $pack      是否需要自己发包 ，否为使用框架自身API (自己发包只能同意请求)
     *
     * @return string 不会有返回值
     */
    public function friendHandle(int $toqq, int $seq, int $oper_type, bool $pack = false): string
    {
        if ($pack) {
            $param = [
                'toqq' => $toqq,
            ];
            return $this->query('/agreeFriend', $param);
        } else {
            $param = [
                'toqq'      => $toqq,
                'seq'       => $seq,
                'oper_type' => $oper_type,
            ];
            return $this->query('/friendHandle', $param);
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
        return $this->query('/withdraw', $param);
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
        return $this->query('/withdraw', $param);
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
        return $this->query('/add', $param);
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
        return json_decode($this->query('/login', $param), true);
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
        return $this->query('/redpack', $param);
    }
    
    /**
     * 获取群内未领取红包列表
     * （只支持语音、手气、口令）
     *
     * @param int|string $toqq
     * @param int|string $group
     *
     * @return string
     */
    public function getRedpackList(int|string $toqq, int|string $group): string
    {
        $param = [
            'toqq'  => $toqq,
            'group' => $group,
        ];
        return $this->query('/getRedpackList', $param);
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
        return $this->query('/addFriend', $param);
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
        
        return $this->query('/parserCustomNode', $param);
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
        
        return $this->query('/parserResId', $param);
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
        
        return $this->query('/buildCustomNode', $param);
    }
    
    /**
     * 获取名片赞列表
     *
     * 同时返回赞我列表前30条数据和当日我赞他人列表
     *
     * @param int $offset 跳过多少条，默认从0开始获取
     *
     * @return string json，decode后的data为jce.view值
     */
    public function getMpzList(int $offset = 0): string
    {
        $param = [
            'offset' => $offset,
            'time'   => time(),
        ];
        
        return $this->query('/getMpzList', $param);
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
        
        return $this->query('/sendStatus', $param);
    }
    
    /**
     * 获取好友申请的过滤列表
     *
     * @return string
     */
    public function getFriendFilterList(): string
    {
        $param = [
        ];
        
        return $this->query('/getFriendFilterList', $param);
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
        
        return $this->curl($url, post: json_encode($param), timeout: $this->timeout);
    }
}