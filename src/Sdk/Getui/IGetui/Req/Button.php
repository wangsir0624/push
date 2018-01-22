<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class Button extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBString";
        $this->values["1"] = "";
        $this->fields["2"] = "PBInt";
        $this->values["2"] = "";
    }

    public function text()
    {
        return $this->_get_value("1");
    }

    public function set_text($value)
    {
        return $this->_set_value("1", $value);
    }

    public function next()
    {
        return $this->_get_value("2");
    }

    public function set_next($value)
    {
        return $this->_set_value("2", $value);
    }
}
