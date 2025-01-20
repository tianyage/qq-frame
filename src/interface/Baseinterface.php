<?php

namespace Tianyage\QqFrame\interface;

class Baseinterface
{
    public function getAll()
    {
    }
    
    public function add(string $qq, string $pwd, int $protocol = 0)
    {
    }
    
    public function del(string $qq)
    {
    }
    
    public function login(string $qq)
    {
    }
    
    public function logout(string $qq)
    {
    }
    
    public function qrLogin(string $qq)
    {
    }
    
    public function qrQuery(int|string $check_key)
    {
    }
    
    public function getCookie(string $qq, string $channel)
    {
    }
    
    public function getClientKey(string $qq)
    {
    }
    
    public function sendFirendMsg(string $qq, string $toqq, string $content)
    {
    }
    
    public function sendGroupMsg(string $qq, string $group_id, string $content)
    {
    }
    
    public function uploadFriendPic(string $qq, string $toqq, string $pic_type, string $pic_data)
    {
    }
    
    public function uploadGroupPic(string $qq, string $group_id, string $pic_type, string $pic_data)
    {
    }
    
    public function cardLike(string $qq, string $toqq, int $num)
    {
    }
    
    public function getCardLikeList(string $qq)
    {
    }
    
    public function groupSign(string $qq, string $group_id)
    {
    }
    
    public function redPack(string $qq, string $group_id, string $toqq, string $content)
    {
    }
    
    public function agreeFriend(string $qq, string $toqq, int $req, bool $is_filter = false)
    {
    }
    
    public function getFriendFilterList(string $qq)
    {
    }
    
    public function sendStatus(string $qq, string $code)
    {
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
     */
    public function friendHandle(int $toqq, int $req, int $seq, int $oper_type, bool $pack = false)
    {
    }
    
    
}