<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class OSMessage extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["2"] = "PBBool";
        $this->values["2"] = "";
        $this->fields["3"] = "PBInt";
        $this->values["3"] = "";
        $this->fields["4"] = "Transparent";
        $this->values["4"] = "";
        $this->fields["5"] = "PBString";
        $this->values["5"] = "";
        $this->fields["6"] = "PBInt";
        $this->values["6"] = "";
        $this->fields["7"] = "PBInt";
        $this->values["7"] = "";
        $this->fields["8"] = "PBInt";
        $this->values["8"] = "";
    }

    public function isOffline()
    {
        return $this->_get_value("2");
    }

    public function set_isOffline($value)
    {
        return $this->_set_value("2", $value);
    }

    public function offlineExpireTime()
    {
        return $this->_get_value("3");
    }

    public function set_offlineExpireTime($value)
    {
        return $this->_set_value("3", $value);
    }

    public function transparent()
    {
        return $this->_get_value("4");
    }

    public function set_transparent($value)
    {
        return $this->_set_value("4", $value);
    }

    public function extraData()
    {
        return $this->_get_value("5");
    }

    public function set_extraData($value)
    {
        return $this->_set_value("5", $value);
    }

    public function msgType()
    {
        return $this->_get_value("6");
    }

    public function set_msgType($value)
    {
        return $this->_set_value("6", $value);
    }

    public function msgTraceFlag()
    {
        return $this->_get_value("7");
    }

    public function set_msgTraceFlag($value)
    {
        return $this->_set_value("7", $value);
    }

    public function priority()
    {
        return $this->_get_value("8");
    }

    public function set_priority($value)
    {
        return $this->_set_value("8", $value);
    }
}
