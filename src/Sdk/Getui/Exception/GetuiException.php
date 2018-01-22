<?php

namespace Wangjian\Push\Sdk\Getui\Exception;

use Exception;

class GetuiException extends Exception
{
    public $requestId;

    public function __construct($requestId, $message, $e)
    {
        parent::__construct($message, $e);
        $this->requestId = $requestId;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }
}
