<?php
namespace Wangjian\Push\Sdk\Youmeng\Android;

use Wangjian\Push\Sdk\Youmeng\AndroidNotification;

class AndroidGroupcast extends AndroidNotification
{
    public function __construct()
    {
        parent::__construct();
        $this->data["type"] = "groupcast";
        $this->data["filter"]  = null;
    }
}
