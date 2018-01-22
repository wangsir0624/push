<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class ReqServList extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBString";
        $this->values["1"] = "";
        $this->fields["3"] = "PBInt";
        $this->values["3"] = "";
    }

    public function seqId()
    {
        return $this->_get_value("1");
    }

    public function set_seqId($value)
    {
        return $this->_set_value("1", $value);
    }

    public function timestamp()
    {
        return $this->_get_value("3");
    }

    public function set_timestamp($value)
    {
        return $this->_set_value("3", $value);
    }
}
