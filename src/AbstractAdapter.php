<?php
namespace Wangjian\Push;

use Wangjian\Push\SendOption\SendOption;

abstract class AbstractAdapter
{
    abstract public function cast(SendOption $option);
}
