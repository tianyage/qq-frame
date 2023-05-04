<?php

namespace Tianyage\QqFrame;

use Tianyage\QqFrame\lib\Qy as qy;
use Tianyage\QqFrame\lib\Xlz as xlz;

class QF
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
        if ($port === 3000 || $port === 3001) {
            $this->sdk = new xlz();
        } else {
            $this->sdk = new qy();
        }
        
        $this->sdk->init($host, $robot, $port);
        
        return $this->sdk;
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