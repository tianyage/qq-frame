<?php
/** @noinspection HttpUrlsUsage */

/** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */

/** @noinspection DuplicatedCode */

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace Tianyage\QqFrame\lib;

use Exception;

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
        
        // 这是瞎写的值，为了占位不报错而已
        '框架事件_主动下线'             => 1000,
        
        '消息类型_临时会话'                  => 141,
        '消息类型_临时会话_群临时'           => 0,
        '消息类型_临时会话_讨论组临时'       => 1,
        '消息类型_临时会话_公众号'           => 129,
        '消息类型_临时会话_网页QQ咨询'       => 201,
        '消息类型_临时会话_好友申请验证消息' => 134,
        '消息类型_好友通常消息'              => 166,
        '消息类型_讨论组消息'                => 83,
        '消息类型_群聊消息'                  => 82,
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
    
    public function init(string $host, int $robot, int $port = 4000, string $key = 'A2I8C'): void
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
        $clientkey = $this->getClientKey();
        if ($clientkey['status'] === 1) {
            return [
                'status' => 1,
                'msg'    => '在线中',
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => '当前QQ不在线',
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
            } elseif ($retcode === 0 && !$retmsg) {
                // 虽然返回了code0 但是成功登录的时候应该有retmsg，那就retmsg为空的时候算作等待扫码完成
                $data = [
                    'status' => 3,
                    'msg'    => "{$this->robot_qq}扫码成功 等待确认[2]",
                ];
            } else {
                //                if (function_exists('trace')) {
                //                    trace($json . PHP_EOL, 'qrQuery');
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
     * 删除QQ
     *
     * @return array
     */
    public function del(): array
    {
        $res = $this->query('/del');
        $arr = json_decode($res, true);
        if ($arr && ($arr['retcode'] === 200 || $arr['retcode'] === 404)) {
            // 200成功 404 qq不存在
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
    
    public function getClientKey(): array
    {
        $param = [
        ];
        $json  = $this->query('/getClientKey', $param);
        // {"code":0,"message":"获取成功","data":"3DFC9E296DD97E552B0CEAB371432F517DE0579C73268BDBD70093D3C475B1A8466F71E42D3074DAA33C83D78762276273B391D0654EE83A1442D0934C8A583A","echo":""}
        if ($json) {
            $arr = json_decode($json, true);
            if (isset($arr['code']) && $arr['code'] === 0) {
                $sub_data = $arr['data'];
                if (is_array($sub_data)) {
                    return [
                        'status' => 2,
                        'msg'    => '获取clientkey失败：' . $sub_data['retmsg'],
                    ];
                } elseif (str_starts_with($sub_data, '{')) {
                    $sub_arr = json_decode($sub_data, true);
                    return [
                        'status' => 2,
                        'msg'    => '获取clientkey失败：' . ($sub_arr['retmsg'] ?? $sub_data),
                    ];
                } else {
                    return [
                        'status' => 1,
                        'msg'    => '成功',
                        'data'   => $sub_data,
                    ];
                }
            } else {
                if (function_exists('trace')) {
                    /** @noinspection PhpUndefinedFunctionInspection */
                    trace($json, 'getClientKey_qy');
                }
                return [
                    'status' => 2,
                    'msg'    => '获取clientkey失败，' . $json,
                ];
            }
        } else {
            return [
                'status' => -1,
                'msg'    => '访问超时',
            ];
        }
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
        
        $json = $this->query('/getCookie', $param);
        $arr  = json_decode($json, true);
        if (!$json) {
            $data = [
                'status' => -1,
                'msg'    => 'cookie获取超时',
            ];
        } elseif ($arr && $arr['retcode'] === 0) {
            $cookie = $arr['data'];
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
    
    //    /**
    //     * 名片赞
    //     * (非好友情况下进行点赞时返回成功，但不一定真正点上了，对方开启陌生人点赞时才能点上(手Q默认关闭陌生人点赞))
    //     *
    //     * @param string|int $toqq 对方QQ
    //     * @param int        $num  点赞次数 默认1
    //     *
    //     * @return string
    //     */
    //    public function cardLike(string|int $toqq, int $num = 1): string
    //    {
    //        return $this->cardLike2($toqq, $num);
    //    }
    
    /**
     * 名片赞
     * （发功能包版，一次性点赞，可以减少接口访问次数了）
     *
     * @param string|int $toqq       对方QQ
     * @param int        $num        点赞次数 默认1
     * @param int        $type       点赞类型 1好友 27随心贴陌生人（好像无效）  31搜索QQ（好像无效）  5群友  12我赞过谁  41附近的人 66点赞列表
     * @param bool       $del_record 是否删除本次点赞记录
     *
     * @return string
     */
    public function cardLike(string|int $toqq, int $num = 1, int $type = 1, bool $del_record = false): string
    {
        // {"server_info":{"key":"123","port":"4001","serverUrl":"http://192.168.11.1"},"type":"Event","data":{"框架QQ":"908777454","操作QQ":"0","触发QQ":"454701103","来源群号":"0","来源群名":"","消息内容":"赞了我的资料卡1次","消息类型":"108","操作QQ昵称":"","触发QQ昵称":"simon\\u2776","消息子类型":"10021","消息Seq":"0","消息时间戳":"1679587653"}}
        
        $num = max($num, 1); // 最少1赞
        $num = min($num, 50); // 最多50赞  (插件会分成20 20 10)
        
        $json = $this->query('/cardLike', [
            'toqq'       => $toqq,
            'num'        => $num,
            'type'       => $type,
            'del_record' => $del_record,
        ]);
        
        // {"retcode":51,"retmsg":"每天最多给她点20个赞哦。","msg":"给2362836002点赞完成","hex":"10022C3C4C560A56697369746F72537663660C526573704661766F726974657D000077080001060C526573704661766F7269746518000106165151536572766963652E526573704661766F726974651D0000470A0A000112D1419A0822427180E530334623E6AF8FE5A4A9E69C80E5A49AE7BB99E5A5B9E782B93230E4B8AAE8B59EE593A6E380820B13000000008CD604222C3D000C4CFC150B8C980CA80C"}
        
        // {"retcode":1,"retmsg":"not friend","msg":"给2362836001点赞完成","hex":"10022C3C4C560A56697369746F72537663660C526573704661766F726974657D00005E080001060C526573704661766F7269746518000106165151536572766963652E526573704661766F726974651D00002E0A0A00011257CD76C722427180E53001460A6E6F7420667269656E640B13000000008CD604212C3D000C4CFC150B8C980CA80C"}
        
        if ($json) {
            $arr = json_decode($json, true);
            if (!$arr || !isset($arr['retcode'])) {
                return "名片点赞提交失败：{$json}";
            }
            try {
                // 成功
                if ($arr['retcode'] === 0) {
                    $msg = "名片点赞{$num}次成功";
                } elseif ($arr['retcode'] === 1) {
                    $msg = "TA不是你的好友";
                } elseif ($arr['retcode'] === 404) {
                    // 这条代码暂时无效，因为 发功能包 的api目前不返回这个404 只返回bool
                    $msg = "自动更新已掉线";
                } elseif ($arr['retcode'] === 20003) {
                    // 今日点赞好友数己达上限 或 今日同一好友点赞数已达 SVIP 上限  或  今日点赞数己达上限(给非好友时才会返回这个)
                    $msg = $arr['retmsg'];
                } elseif ($arr['retcode'] === 10003) {
                    // 由于对方权限设置，点赞失败
                    $msg = $arr['retmsg'];
                } else {
                    $msg = "[{$arr['retcode']}]{$arr['retmsg']}";
                }
            } catch (Exception $e) {
                $msg = "名片点赞提交失败：{$json}";
            }
        } else {
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
                } elseif ($arr['retcode'] === 405) {
                    // [405]该框架QQ未登录
                    $data = [
                        'status' => -1,
                        'msg'    => 'QQ目前离线中',
                    ];
                } else {
                    $data = [
                        'status' => 2,
                        'msg'    => "[{$arr['retcode']}]" . ($arr['retmsg'] ?? '未知错误'),
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
        // {"retcode":16,"retmsg":"发送失败，请先添加对方为好友","time":"1696957329"}
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
                    'msg'    => '发送失败，群内被禁言',
                ];
            } elseif ($arr['retcode'] === 405) {
                // 该框架QQ未登录
                $data = [
                    'status' => 2,
                    'msg'    => '发送失败，服务器初始化中',
                ];
            } elseif ($arr['retcode'] === 404) {
                // {"retcode":404,"retmsg":"未在框架找到对应QQ","time":"1744475326"}
                $data = [
                    'status' => 2,
                    'msg'    => '发送失败，已不在线',
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
        return $this->query('/getAll', ['qq' => 10000]);
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
     * @noinspection PhpUnusedParameterInspection
     */
    public function friendHandle(int $toqq, int $req, int $seq, int $oper_type, bool $pack = false): string
    {
        $param = [
            'toqq'      => $toqq,
            'req'       => $req,
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
     * @param int        $protocol 协议：0=安卓,1=企点,2=HD,3=企业,4=TIM,5=iPad,6=苹果,7=Mac,8=Linux,9~16=手表1-8,17谷歌QQ,18鸿蒙QQ,19鸿蒙HD,20LiteQQ
     * @param string     $brand    手机品牌（XIAOMI）
     * @param string     $model    手机型号（14pro）
     * @param string     $guid
     *
     * @return string
     */
    public function add(int|string $qq, string $pwd, int $protocol, string $brand = '', string $model = '', string $guid = ''): string
    {
        $param = [
            'qq'       => $qq,
            'pwd'      => $pwd,
            'protocol' => $protocol,
            'brand'    => $brand,
            'model'    => $model,
            'guid'     => $guid,
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
     * (手表不支持领红包)
     *
     * @param int|string $toqq      红包发送人QQ
     * @param int|string $group     红包所在群号
     * @param string     $redpack   红包代码
     * @param string     $audiohash 语音包匹配的hash ，文字为恭喜发财
     *
     * @return string
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
        
        // {"retcode":0,"retmsg":"添加好友成功","time":"1702033257"}
        // {"retcode":1,"retmsg":"发送添加请求成功，等待验证通过","time":"1702033226"}
        // {"retcode":2,"retmsg":"对方拒绝被任何人添加为好友","time":"1702251001"}
        // {"retcode":3,"retmsg":"答案回答错误，问题文本：解封密码『8』","time":"1702289243"}
        // {"retcode":4,"retmsg":"发送添加请求成功，等待验证通过，问题文本：你是谁？","time":"1702032430"}
        // {"retcode":4,"retmsg":"发送添加请求成功，等待验证通过，问题文本：备注什么|你多大了？|加我有什么事吗","time":"1702382499"}
        // {"retcode":101,"retmsg":"对方已为你的好友","time":"1702033288"}
        // {"retcode":406,"retmsg":"添加好友前置条件为满足，请稍后再试！","time":"1702289963"}
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
            // time在后期可以删除了，因为不需要这个参数  还留着仅为兼容旧版插件考虑
            'time'     => time(),
            'offset'   => $offset,
            'is_voter' => 1,
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
     * @return array
     */
    public function getFriendFilterList(): array
    {
        $json = $this->query('/getFriendFilterList');
        $arr  = json_decode($json, true);
        if (isset($arr['retcode']) && $arr['retcode'] === 0) {
            return [
                'status' => 1,
                'msg'    => '过滤列表获取成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['retmsg'] ?? '过滤列表访问超时',
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
    public function delMpzHistory(string|int $toqq = 0, int $offset = 450): array
    {
        $params = [
            'toqq'   => $toqq,
            'offset' => $offset,
        ];
        $json   = $this->query('/delMpzHistory', $params);
        $arr    = json_decode($json, true);
        if (isset($arr['retcode']) && $arr['retcode'] === 0) {
            return [
                'status' => 1,
                'msg'    => '清理成功',
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['retmsg'] ?? '清理列表访问超时',
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
        $params        = [
            'pack'    => $pack,
            'next_id' => $next_id,
            'next_qq' => $next_qq,
        ];
        $this->timeout = 30;
        $json          = $this->query('/getFriendList', $params);
        if ($json) {
            $arr = json_decode($json, true);
            // 处理控制符导致的解析错误
            if (json_last_error() === JSON_ERROR_CTRL_CHAR) {
                $json = parent::strip_control_characters($json);
                $arr  = json_decode($json, true);
            }
            
            if (isset($arr['retcode']) && $arr['retcode'] === 0) {
                return [
                    'status' => 1,
                    'msg'    => '获取成功',
                    'data'   => $arr,
                ];
            } else {
                return [
                    'status' => 2,
                    'msg'    => $arr['retmsg'] ?? '获取好友列表失败',
                ];
            }
        } else {
            return [
                'status' => 2,
                'msg'    => '获取好友列表超时',
            ];
        }
    }
    
    /**
     * QQ头像上传
     *
     * @param string $pic_base64
     *
     * @return array
     */
    public function uploadAvatar(string $pic_base64): array
    {
        $params = [
            'pic' => $pic_base64,
        ];
        // {"retcode":0,"retmsg":"头像上传成功","time":"1741098990"}
        $json = $this->query('/uploadAvatar', $params);
        $arr  = json_decode($json, true);
        if (isset($arr['retcode']) && $arr['retcode'] === 0) {
            return [
                'status' => 1,
                'msg'    => '头像上传成功',
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['retmsg'] ?? '头像上传超时',
            ];
        }
    }
    
    /**
     * 消息框置顶
     *
     * @param int|string $toqq
     * @param bool       $is_cancel 取消置顶 默认否
     *
     * @return string
     */
    public function msgTop(int|string $toqq, bool $is_cancel = false): string
    {
        $param = [
            'toqq'      => $toqq,
            'is_cancel' => $is_cancel,
        ];
        return $this->query('/msgTop', $param);
    }
    
    /**
     * 消息回应表情
     * 贴表情
     *
     * @param int  $group     群号
     * @param int  $seq       消息ID
     * @param int  $bqid      表情Id emoji转为10进制
     * @param bool $is_emoji  是否emoji表情
     * @param bool $is_cancel 是否取消表情
     *
     * @return string
     */
    public function replyEmoji(int $group, int $seq, int $bqid, bool $is_emoji, bool $is_cancel = false): string
    {
        $param = [
            'group'     => $group,
            'seq'       => $seq,
            'bqid'      => $bqid,
            'is_emoji'  => $is_emoji,
            'is_cancel' => $is_cancel,
        ];
        return $this->query('/replyEmoji', $param);
    }
    
    /**
     * 设置群聊专属头衔
     *
     * @param int    $group 群号
     * @param int    $toqq
     * @param string $title 头衔,支持emoji
     *
     * @return string
     */
    public function groupExclusiveTitle(int $group, int $toqq, string $title): string
    {
        $param = [
            'group' => $group,
            'toqq'  => $toqq,
            'title' => $title,
        ];
        return $this->query('/groupExclusiveTitle', $param);
    }
    
    /**
     * 获取小游戏的openkey和openid以及access_token
     *
     * @return array
     */
    public function getGameLoginParams(): array
    {
        $param = [];
        $json  = $this->query('/getGameLoginParams', $param);
        // {"code":0,"message":"游戏登录参数获取成功","data":{"openid":"C67A514B50AE52415CA9CF4366CBA553","access_token":"90049939C766365E600DED0309663E12","openkey":"B1odXkqCCs85TlvZGomTbw=="},"echo":""}
        $arr = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '获取失败，访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '获取成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '获取失败',
            ];
        }
    }
    
    /**
     * qq秀换装
     *
     * @return array
     */
    public function speedQQShow(): array
    {
        $param = [];
        $json  = $this->query('/speedQQShow', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => 'qq秀换装失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => 'qq秀换装成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? 'qq秀换装失败：未知错误',
            ];
        }
    }
    
    /**
     * 空间盲盒签到
     *
     * @return array
     */
    public function speedManghe(): array
    {
        $param = [];
        $json  = $this->query('/speedManghe', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '空间盲盒签到失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '空间盲盒签到成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '空间盲盒签到失败：未知错误',
            ];
        }
    }
    
    /**
     * 空间好友动态浏览十条
     *
     * @return array
     */
    public function speedQzoneBrowse(): array
    {
        $param = [];
        $json  = $this->query('/speedQzoneBrowse', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '空间浏览动态失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '空间浏览动态成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '空间浏览动态失败：未知错误',
            ];
        }
    }
    
    /**
     * 天天领福利，赚金豆兑好礼
     *
     * @return array
     */
    public function speedJindou(): array
    {
        $param = [];
        $json  = $this->query('/speedJindou', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '金豆加速失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '金豆加速成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '金豆加速失败：未知错误',
            ];
        }
    }
    
    /**
     * 空间AI妙绘
     *
     * @return array
     */
    public function speedAI(): array
    {
        $param = [];
        $json  = $this->query('/speedAI', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => 'AI妙绘失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => 'AI妙绘成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? 'AI妙绘失败：未知错误',
            ];
        }
    }
    
    /**
     * 查询某qq的名片赞数量
     *
     * @param int|string $toqq
     *
     * @return array
     */
    public function queryCardLikeCount(int|string $toqq): array
    {
        $param = [
            'toqq' => $toqq,
        ];
        // {"retcode":0,"retmsg":"查询完成","data":55971}
        // {"retcode":202,"retmsg":"查询完成","data":0} qq资料卡无法被查看（不一定是冻结）
        // {"retcode":-1,"retmsg":"发包失败"}
        $json = $this->query('/queryCardLikeCount', $param);
        if (!$json) {
            return [
                'status' => 2,
                'msg'    => '查询失败，接口访问超时',
            ];
        }
        $arr = json_decode($json, true);
        if (!isset($arr['retcode'])) {
            return [
                'status' => 2,
                'msg'    => '查询失败，接口返回数据错误',
            ];
        }
        
        if ($arr['retcode'] === 0) {
            return [
                'status' => 1,
                'msg'    => '查询成功',
                'data'   => $arr['data'],
            ];
        } elseif ($arr['retcode'] === 202) {
            return [
                'status' => 202,
                'msg'    => '资料卡无法被查看',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => $arr['retcode'],
                'msg'    => $arr['retmsg'] ?? '查询失败，未知错误',
                'data'   => $arr['data'] ?? null,
            ];
        }
    }
    
    /**
     * 看免费小说
     *
     * @return array
     */
    public function speedXiaoshuo(): array
    {
        $param = [];
        $json  = $this->query('/speedXiaoshuo', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '看小说加速失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '看小说加速成功',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '看小说加速失败：未知错误',
            ];
        }
    }
    
    /**
     * 同意过滤好友的申请
     *
     * @param string|int $toqq 对方QQ
     *
     * @return array
     */
    public function agreeFriendFilter(string|int $toqq): array
    {
        $param = ['toqq' => $toqq];
        $json  = $this->query('/agreeFriendFilter', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '同意失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '同意过滤好友完成',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '同意过滤好友失败：未知错误',
            ];
        }
    }
    
    /**
     * 查询空间资料（获取访客数）
     *
     * @param string|int $toqq 对方QQ
     *
     * @return array
     */
    public function getQzoneProfile(string|int $toqq): array
    {
        $param = ['toqq' => $toqq];
        $json  = $this->query('/getQzoneProfile', $param);
        $arr   = json_decode($json, true);
        if (!$arr) {
            return [
                'status' => 2,
                'msg'    => '查询空间资料失败：访问超时',
            ];
        }
        if (isset($arr['code']) && $arr['code'] === 0) {
            return [
                'status' => 1,
                'msg'    => '查询空间资料完成',
                'data'   => $arr['data'],
            ];
        } else {
            return [
                'status' => 2,
                'msg'    => $arr['message'] ?? '查询空间资料失败：未知错误',
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