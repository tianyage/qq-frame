<?php

namespace Tianyage\QqFrame;

use Tianyage\QqFrame\lib\Common;
use Tianyage\QqFrame\lib\Qy as qy;
use Tianyage\QqFrame\lib\Xlz as xlz;

class QF extends Common
{
    
    public qy|xlz $sdk;
    
    /**
     *
     * @param string $host  IP或域名
     * @param int    $robot 框架QQ
     * @param int    $port  api端口
     *
     * @return qy|xlz
     */
    final public function init(string $host, int $robot, int $port): qy|xlz
    {
        if (str_starts_with($port, 3)) {
            $this->sdk = new xlz();
        } else {
            $this->sdk = new qy();
        }
        
        $this->sdk->init($host, $robot, $port);
        
        return $this->sdk;
    }
    
    /**
     * QQ json消息签名
     *
     * @param string $json json代码
     *
     * @return string
     */
    public function signArk(string $json): string
    {
        $sdk = $this->sdk;
        $this->init('106.55.241.25', 2071267038, 4001);
        $cookie    = $this->sdk->getCookie('https://vip.qq.com/loginsuccess.html', 8000201, 18);
        $this->sdk = $sdk;
        if ($cookie) {
            preg_match("/p_skey=(.*?);/", $cookie, $match);
            $gtk  = $this->buildGTK($match[1]);
            $url  = "https://zb.vip.qq.com/tx/trpc/ark-share/GenSignedArk?g_tk={$gtk}";
            $post = json_encode(['ark' => $json]);
            $ua   = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36';
            $data = $this->curl($url, $post, cookie: $cookie, ua: $ua);
            //            echo $data . PHP_EOL;
            $arr = json_decode($data, true);
            if ($arr['code'] === 0) {
                return $arr['data']['signed_ark'];
            } else {
                return '';
            }
        }
        return '';
    }
    
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
        return $this->sdk->$name() ?? false;
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