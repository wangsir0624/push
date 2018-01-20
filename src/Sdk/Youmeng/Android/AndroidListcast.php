<?php
namespace Wangjian\Push\Sdk\Youmeng\Android;

use Wangjian\Push\Sdk\Youmeng\AndroidNotification;

class AndroidListcast extends AndroidNotification {
	function __construct() {
		parent::__construct();
		$this->data["type"] = "listcast";
		$this->data["device_tokens"] = NULL;
	}
}