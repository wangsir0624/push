<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class PushResult extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PushResult_EPushResult";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "PBString";
        $this->values["3"] = "";
        $this->fields["4"] = "PBString";
        $this->values["4"] = "";
        $this->fields["5"] = "PBString";
        $this->values["5"] = "";
        $this->fields["6"] = "PBString";
        $this->values["6"] = "";
        $this->fields["7"] = "PBString";
        $this->values["7"] = "";
    }

    public function result()
    {
        return $this->_get_value("1");
    }

    public function set_result($value)
    {
        return $this->_set_value("1", $value);
    }

    public function taskId()
    {
        return $this->_get_value("2");
    }

    public function set_taskId($value)
    {
        return $this->_set_value("2", $value);
    }

    public function messageId()
    {
        return $this->_get_value("3");
    }

    public function set_messageId($value)
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

    public function target()
    {
        return $this->_get_value("5");
    }

    public function set_target($value)
    {
        return $this->_set_value("5", $value);
    }

    public function info()
    {
        return $this->_get_value("6");
    }

    public function set_info($value)
    {
        return $this->_set_value("6", $value);
    }

    public function traceId()
    {
        return $this->_get_value("7");
    }

    public function set_traceId($value)
    {
        return $this->_set_value("7", $value);
    }
}
