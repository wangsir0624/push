<?php
namespace Wangjian\Push\Sdk\Youmeng\Ios;

use Wangjian\Push\Sdk\Youmeng\IOSNotification;

class IOSGroupcast extends IOSNotification {
	function  __construct() {
		parent::__construct();
		$this->data["type"] = "groupcast";
		$this->data["filter"]  = NULL;
	}
}