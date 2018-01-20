<?php
namespace Wangjian\Push\Sdk\Youmeng\Ios;

use Wangjian\Push\Sdk\Youmeng\IOSNotification;

class IOSUnicast extends IOSNotification
{
    public function __construct()
    {
        parent::__construct();
        $this->data["type"] = "unicast";
        $this->data["device_tokens"] = null;
    }
}
