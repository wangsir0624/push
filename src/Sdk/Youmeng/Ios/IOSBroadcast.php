<?php
namespace Wangjian\Push\Sdk\Youmeng\Ios;

use Wangjian\Push\Sdk\Youmeng\IOSNotification;

class IOSBroadcast extends IOSNotification
{
    public function __construct()
    {
        parent::__construct();
        $this->data["type"] = "broadcast";
    }
}
