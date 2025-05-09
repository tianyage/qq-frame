<?php

namespace Tianyage\QqFrame;

use Tianyage\QqFrame\lib\Common;
use Tianyage\QqFrame\lib\Dream;
use Tianyage\QqFrame\lib\Dulu;
use Tianyage\QqFrame\lib\NapCat;
use Tianyage\QqFrame\lib\EBotNT;
use Tianyage\QqFrame\lib\Qy;
use Tianyage\QqFrame\lib\Xlz;

class QF extends Common
{
    
    public Qy|Xlz|NapCat|EBotNT|Dream|Dulu $sdk;
    
    /**
     *
     * @param string $host  IP或域名
     * @param int    $robot 框架QQ
     * @param int    $port  api端口
     *
     * @return Qy|Xlz|NapCat|EBotNT|Dream|Dulu
     */
    final public function init(string $host, int $robot, int $port): Qy|Xlz|NapCat|EBotNT|Dream|Dulu
    {
        if (str_starts_with($port, 4)) {
            $this->sdk = new Qy();
        } elseif (str_starts_with($port, 5)) {
            $this->sdk = new NapCat();
        } elseif (str_starts_with($port, 8)) {
            $this->sdk = new EBotNT();
        } elseif (str_starts_with($port, 3)) {
            $this->sdk = new Dream();
        } elseif (str_starts_with($port, 2)) {
            $this->sdk = new Dulu();
        } else {
            // port: 6、7
            $this->sdk = new Xlz();
        }
        
        $this->sdk->init($host, $robot, $port);
        
        return $this->sdk;
    }
    
    //    /**
    //     * QQ json消息签名
    //     *
    //     * @param string $json json代码
    //     *
    //     * @return string
    //     */
    //    public function signArk(string $json): string
    //    {
    //        $this->init('106.55.241.25', 908777454, 4002);
    //        $cookie = $this->sdk->getCookie('https://vip.qq.com/loginsuccess.html', 8000201, 18);
    //        if ($cookie) {
    //            preg_match("/p_skey=(.*?);/", $cookie, $match);
    //            $gtk  = $this->buildGTK($match[1]);
    //            $url  = "https://zb.vip.qq.com/tx/trpc/ark-share/GenSignedArk?g_tk={$gtk}";
    //            $post = json_encode(['ark' => $json]);
    //            $ua   = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36';
    //            $data = $this->curl($url, $post, cookie: $cookie, ua: $ua);
    //            echo $data . PHP_EOL;
    //            $arr = json_decode($data, true);
    //            if ($arr['code'] === 0) {
    //                return $arr['data']['signed_ark'];
    //            } else {
    //                return '';
    //            }
    //        }
    //        return '';
    //    }
    
    /**
     * 如果调用的方法不能访问，它将被触发
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->sdk->$name(...$arguments) ?? false;
    }
    
    /**
     * 调用的属性不能访问(比如private)，它将被触发
     *
     * @param $name
     *
     * @return false
     */
    public function __get($name)
    {
        return $this->$name ?? false;
    }
}