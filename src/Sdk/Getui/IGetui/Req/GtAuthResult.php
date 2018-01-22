<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class GtAuthResult extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBInt";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "PBString";
        $this->values["3"] = "";
        $this->fields["4"] = "PBString";
        $this->values["4"] = "";
    }

    public function code()
    {
        return $this->_get_value("1");
    }

    public function set_code($value)
    {
        return $this->_set_value("1", $value);
    }

    public function redirectAddress()
    {
        return $this->_get_value("2");
    }

    public function set_redirectAddress($value)
    {
        return $this->_set_value("2", $value);
    }

    public function seqId()
    {
        return $this->_get_value("3");
    }

    public function set_seqId($value)
    {
        return $this->_set_value("3", $value);
    }

    public function info()
    {
        return $this->_get_value("4");
    }

    public function set_info($value)
    {
        return $this->_set_value("4", $value);
    }
}
