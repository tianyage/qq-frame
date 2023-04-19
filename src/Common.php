<?php

namespace Tianyage\QqFrame;

class Common
{
    /**
     * @param string       $url
     * @param string|array $post
     * @param string       $cookie
     * @param string       $referer
     * @param int|array    $header 例：['Content-Type: application/json; charset=UTF-8']
     * @param string       $ua
     * @param int          $gzip
     * @param int          $timeout
     * @param int          $randIp
     * @param array        $daili
     *
     * @return string
     */
    public function curl(string $url, string|array $post = '', string $cookie = '', string $referer = '', int|array $header = 0, string $ua = '', int $gzip = 1, int $timeout = 10, int $randIp = 1, array $daili = []): string
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
        // 使用代理服务器
        if (!empty($daili)) {
            if (isset($daili['ip']) && isset($daili['port'])) {
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP); //使用http代理模式
                curl_setopt($ch, CURLOPT_PROXY, $daili['ip']);       //代理服务器地址
                curl_setopt($ch, CURLOPT_PROXYPORT, $daili['port']); //代理服务器端口
            } elseif (isset($daili['dtzf']) && $daili['dtzf'] === 'xun') {
                $time    = time();
                $orderno = 'ZF20211274304gbUNiW';
                $secret  = 'a43f17ade40b4b0ca25780cfc71b1a1f';
                
                $planText   = "orderno=" . $orderno . ",secret=" . $secret . ",timestamp=" . $time;
                $sign       = strtoupper(md5($planText));
                $auth       = 'sign=' . $sign . '&orderno=' . $orderno . '&timestamp=' . $time;
                $httpheader = array_merge($httpheader, [
                    'Proxy-Authorization: ' . $auth,
                ]);
                curl_setopt($ch, CURLOPT_PROXY, "106.15.82.118:80");
            } else {
                // 动态转发
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_BASIC);
                curl_setopt($ch, CURLOPT_PROXY, '117.21.178.6:9082');
                curl_setopt($ch, CURLOPT_PROXYUSERPWD, "2020051500069002254:SGy0JgCInfjkV9QX");
            }
        } // 默认伪造随机IP
        elseif ($randIp) {
            if ($randIp === 1) {
                $ip = get_rand_ip();
            } else {
                $ip = $randIp;
            }
            // 合并header
            $httpheader = array_merge($httpheader, [
                'CLIENT-IP: ' . $ip,
                'X-FORWARDED-FOR: ' . $ip,
            ]);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        if ($ua === 'qq') {
            curl_setopt(
                $ch,
                CURLOPT_USERAGENT,
                'Mozilla/5.0 (Linux; Android 9; MI 9 Build/PKQ1.181121.001; wv) AppleWebKit/537.36 (KHTML, like Gecko Baiduspider) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/044704 Mobile Safari/537.36 V1_AND_SQ_8.0.7_1204_YYB_D QQ/8.0.7.4085 NetType/WIFI WebP/0.3.0 Pixel/1080 StatusBarHeight/75'
            );
        } elseif ($ua) {
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
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        if ($gzip) {
            curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret ?: '';
    }
}