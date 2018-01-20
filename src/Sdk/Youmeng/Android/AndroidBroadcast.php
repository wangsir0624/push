<?php
namespace Wangjian\Push\Sdk\Youmeng\Android;

use Wangjian\Push\Sdk\Youmeng\AndroidNotification;

class AndroidBroadcast extends AndroidNotification {
	function  __construct() {
		parent::__construct();
		$this->data["type"] = "broadcast";
	}
}