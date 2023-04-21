<?php

namespace Tianyage\QqFrame;

use Tianyage\QqFrame\lib\Qy as qy;
use Tianyage\QqFrame\lib\Xlz as xlz;
use Tianyage\QqFrame\lib\Wq as wq;

class QF
{
    
    public qy|xlz|wq $sdk;
    
    /**
     *
     * @param string $host  IP或域名
     * @param int    $robot 框架QQ
     * @param int    $port  api端口
     *
     * @return qy|xlz|wq
     */
    final public function init(string $host, int $robot, int $port): qy|xlz|wq
    {
        if ($port === 3000 || $port === 3001) {
            $this->sdk = new xlz();
        } else {
            $this->sdk = new qy();
        }
        
        $this->sdk->init($host, $robot, $port);
        
        return $this->sdk;
    }
    
    public function __call($name, $arguments)
    {
        return $this->sdk->$name() ?? false;
    }
    
    public function __get($name)
    {
        return $this->$name ?? false;
    }
}