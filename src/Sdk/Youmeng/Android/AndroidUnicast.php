<?php
namespace Wangjian\Push\Sdk\Youmeng\Android;

use Wangjian\Push\Sdk\Youmeng\AndroidNotification;

class AndroidUnicast extends AndroidNotification
{
    public function __construct()
    {
        parent::__construct();
        $this->data["type"] = "unicast";
        $this->data["device_tokens"] = null;
    }
}
