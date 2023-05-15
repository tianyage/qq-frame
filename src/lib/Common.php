<?php

namespace Tianyage\QqFrame\lib;

class Common
{
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