<?php
namespace Wangjian\Push\Sdk\Youmeng\Ios;

use Wangjian\Push\Sdk\Youmeng\IOSNotification;

class IOSListcast extends IOSNotification
{
    public function __construct()
    {
        parent::__construct();
        $this->data["type"] = "listcast";
        $this->data["device_tokens"] = null;
    }
}
