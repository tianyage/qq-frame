<?php

namespace Tianyage\QqFrame\lib;

class Common
{
    /**
     * 登录网页获取cookie的一些必要url参数
     *
     * @param string $type
     *
     * @return array
     */
    public function getLoginParams(string $type): array
    {
        $params = [];
        switch ($type) {
            case 'open';
                $params['aid']        = 716027609;             // 这里控制登录模式，比如716027609是互联登录，还是直接的业务登录（互联可以q内长按识别二维码，业务不行）
                $params['daid']       = 5;                     // 这里控制登录的具体业务，比如5是空间，18是会员，不管u1(s_url)填写什么，都是看这个daid来返回对应域的cookie
                $params['u1']         = urlencode(
                    'https://qzs.qq.com/qzone/v5/loginsucc.html?para=izone'
                );                                         // 其实就是回调地址，对与错目前来说都一样，程序抓cookie的话也不需要回调（这个链接相当于获取cookie后跳转到登录成功页面的意思）
                $params['pt_3rd_aid'] = 100384226;             // 这里控制（第三方）互联的appid，显示对应的互联名称和头像。100384226是QQ空间 100497308QQ音乐
                $params['domain']     = '';
                break;
            case 'qun':
                // 群空间
                $params['aid']    = 715030901;
                $params['daid']   = 73;
                $params['u1']     = urlencode('https://qun.qq.com/');
                $params['domain'] = 'qun.qq.com';
                break;
            case 'vip':
                // QQ会员
                $params['aid']    = 8000201;
                $params['daid']   = 18;
                $params['u1']     = urlencode('https://vip.qq.com/loginsuccess.html');
                $params['domain'] = 'vip.qq.com';
                break;
            case 'vipclub':
                // https://ui.ptlogin2.qq.com/cgi-bin/login?hide_title_bar=1&style=9&no_verifyimg=1&link_target=blank&appid=8000212&target=top&daid=18&s_url=https%3A%2F%2Fclub.vip.qq.com%2Fapi%2Ftianxuan%2FexecAct%3Fg_tk%3D2145515061
                
                // 极地白 气泡 https://ui.ptlogin2.qq.com/cgi-bin/login?hide_title_bar=1&style=9&no_verifyimg=1&link_target=blank&appid=8000212&target=top&daid=18&s_url=http%3A%2F%2Fzb.vip.qq.com%2Fv2%2Fpages%2FitemDetail%3Fappid%3D3%26itemid%3D2964%26_nav_titleclr%3D000000%26_nav_txtclr%3D000000
                
                // 还不知道这个是针对哪些业务
                $params['aid']    = 8000212;
                $params['daid']   = 18;
                $params['u1']     = urlencode('https://vip.qq.com/loginsuccess.html');
                $params['domain'] = 'club.vip.qq.com';
                break;
            case 'qinfo':
                // https://ui.ptlogin2.qq.com/cgi-bin/login?style=9&appid=716040006&s_url=https%3A%2F%2Fqinfo.clt.qq.com%2Fqlevel%2Fsetting.html%23gc%3D795063954&low_login=0
                
                $params['aid']    = 716040006;
                $params['daid']   = 0;
                $params['u1']     = urlencode('https://qinfo.clt.qq.com/qlevel/setting.html#gc=795063954');
                $params['domain'] = 'qinfo.clt.qq.com';
                break;
            case 'ti':
                // ti.qq.com
                // 目前这个域名不支持扫码登录（官方那里都是回调错误）
                // 只能用密码方式或客户端clientkey
                $params['aid']  = 809041606;
                $params['daid'] = 338;
                $params['u1']   = urlencode('https://ti.qq.com/qqlevel/index');
                //                $params['u1'] = urlencode('https://ti.qq.com/friendship_auth/index.html?_wv=3&_bid=173');
                $params['domain'] = 'ti.qq.com';
                break;
            case 'wg':
                // wegame
                $params['aid']    = 1600001063;
                $params['daid']   = 733;
                $params['u1']     = urlencode('https://www.wegame.com.cn/middle/login/third_callback.html');
                $params['domain'] = 'www.wegame.com.cn';
                break;
            case 'connect':
                // QQ互联 https://connect.qq.com/manage.html#/
                $params['aid']    = 716027613;
                $params['daid']   = 377;
                $params['u1']     = urlencode('https://connect.qq.com/login_success.html&hide_close_icon=1');
                $params['domain'] = 'connect.qq.com';
                break;
            case 'music':
                // QQ音乐
                $params['aid']        = 716027609;
                $params['daid']       = 383;
                $params['u1']         = urlencode('https://graph.qq.com/oauth2.0/login_jump');
                $params['pt_3rd_aid'] = 100497308;
                $params['domain']     = 'y.qq.com';
                break;
            case 'qzoneh5':
                // 空间触屏版
                $params['aid']    = 549000929;
                $params['daid']   = 5;
                $params['u1']     = urlencode('https://h5.qzone.qq.com/mqzone/profile');
                $params['domain'] = 'h5.qzone.qq.com';
                break;
            default:
                // QQ空间PC
                $params['aid']    = 549000912;
                $params['daid']   = 5;
                $params['u1']     = urlencode('https://qzs.qq.com/qzone/v5/loginsucc.html?para=izone');
                $params['domain'] = 'qzone.qq.com';
                break;
        }
        
        //        // 使用互联登录 增加一些参数
        //        if ($is_connect) {
        //            $this->aid        = 716027609;
        //            $this->pt_3rd_aid = 101877776; // 用的追梦云的记录的id
        //        }
        
        return $params;
    }
    
    public function buildGTK(string $skey): int
    {
        $len  = strlen($skey);
        $hash = 5381;
        for ($i = 0; $i < $len; $i++) {
            //改下面两行
            $hash += ((($hash << 5) & 0x7fffffff) + ord($skey[$i])) & 0x7fffffff;
            $hash &= 0x7fffffff;
        }
        return $hash & 0x7fffffff;//计算g_tk
    }
    
    /**
     * @param string       $url
     * @param string|array $post
     * @param string       $cookie
     * @param string       $referer
     * @param int|array    $header 例：['Content-Type: application/json; charset=UTF-8']
     * @param string       $ua
     * @param int          $gzip
     * @param int          $timeout
     *
     * @return string
     */
    public function curl(string $url, string|array $post = '', string $cookie = '', string $referer = '', int|array $header = 0, string $ua = '', int $gzip = 1, int $timeout = 10): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 信任任何证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // 设为0表示不检查证书
        $httpheader = [
        ];
        if ($post) {
            // 用 { 符号检测是否为json数据 加入指定的头部
            if (!is_array($post) && str_starts_with($post, '{')) {
                $httpheader[] = "Content-Type: application/json; charset=UTF-8";
            } else {
                if (is_array($post)) {
                    $post = http_build_query($post, '', '&', PHP_QUERY_RFC3986);
                }
                $httpheader[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
            }
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if ($referer) {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
        if ($header) {
            if ($header === 1) {
                curl_setopt($ch, CURLOPT_HEADER, true);
            } else {
                // 合并header
                $httpheader = array_merge($httpheader, $header); // 设置自定义的header
            }
        }
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        if ($ua) {
            curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        } else {
            curl_setopt(
                $ch,
                CURLOPT_USERAGENT,
                'Mozilla/5.0 (Linux; Android 9; MI 9 Build/PKQ1.181121.001; wv) AppleWebKit/537.36 (KHTML, like Gecko Baiduspider) Version/4.0 Chrome/66.0.3359.126 TBS/044607 Mobile Safari/537.36 V1_AND_SQ_8.0.0_1024_YYB_D NetType/WIFI WebP/0.3.0 Pixel/1080 StatusBarHeight/75'
            );
        }
        // 超时设置
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        if ($gzip) {
            curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret ?: '';
    }
}