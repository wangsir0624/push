<?php
namespace Wangjian\Push\Sdk\Youmeng\Ios;

use Wangjian\Push\Sdk\Youmeng\IOSNotification;

class IOSGroupcast extends IOSNotification
{
    public function __construct()
    {
        parent::__construct();
        $this->data["type"] = "groupcast";
        $this->data["filter"]  = null;
    }
}
