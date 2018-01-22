<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Msg;

class SimpleAlertMsg implements ApnMsg
{
    var $alertMsg;

    public function get_alertMsg()
    {
        return $this->alertMsg;
    }
}