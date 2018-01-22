<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class PushListMessage extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBString";
        $this->values["1"] = "";
        $this->fields["2"] = "PBString";
        $this->values["2"] = "";
        $this->fields["3"] = "Target";
        $this->values["3"] = array();
    }

    public function seqId()
    {
        return $this->_get_value("1");
    }

    public function set_seqId($value)
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

    public function targets($offset)
    {
        return $this->_get_arr_value("3", $offset);
    }

    public function add_targets()
    {
        return $this->_add_arr_value("3");
    }

    public function set_targets($index, $value)
    {
        $this->_set_arr_value("3", $index, $value);
    }

    public function remove_last_targets()
    {
        $this->_remove_last_arr_value("3");
    }

    public function targets_size()
    {
        return $this->_get_arr_size("3");
    }
}
