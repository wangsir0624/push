<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class AppStartUp extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBString";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "PBString";
        $this->values["3"] = "";
    }

    public function android()
    {
        return $this->_get_value("1");
    }

    public function set_android($value)
    {
        return $this->_set_value("1", $value);
    }

    public function symbia()
    {
        return $this->_get_value("2");
    }

    public function set_symbia($value)
    {
        return $this->_set_value("2", $value);
    }

    public function ios()
    {
        return $this->_get_value("3");
    }

    public function set_ios($value)
    {
        return $this->_set_value("3", $value);
    }
}
