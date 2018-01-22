<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class ServerNotify extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "ServerNotify_NotifyType";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "PBString";
        $this->values["3"] = "";
        $this->fields["4"] = "PBString";
        $this->values["4"] = "";
    }

    public function type()
    {
        return $this->_get_value("1");
    }

    public function set_type($value)
    {
        return $this->_set_value("1", $value);
    }

    public function info()
    {
        return $this->_get_value("2");
    }

    public function set_info($value)
    {
        return $this->_set_value("2", $value);
    }

    public function extradata()
    {
        return $this->_get_value("3");
    }

    public function set_extradata($value)
    {
        return $this->_set_value("3", $value);
    }

    public function seqId()
    {
        return $this->_get_value("4");
    }

    public function set_seqId($value)
    {
        return $this->_set_value("4", $value);
    }
}
