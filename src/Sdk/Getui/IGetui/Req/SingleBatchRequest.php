<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class SingleBatchRequest extends PBMessage
{
    public $wired_type = PBMessage::WIRED_LENGTH_DELIMITED;

    public function __construct($reader = null)
    {
        parent::__construct($reader);
        $this->fields["1"] = "PBString";
        $this->values["1"] = "";
        $this->fields["2"] = "SingleBatchItem";
        $this->values["2"] = array();
    }

    public function batchId()
    {
        return $this->_get_value("1");
    }

    public function set_batchId($value)
    {
        return $this->_set_value("1", $value);
    }

    public function batchItem($offset)
    {
        return $this->_get_arr_value("2", $offset);
    }

    public function add_batchItem()
    {
        return $this->_add_arr_value("2");
    }

    public function set_batchItem($index, $value)
    {
        $this->_set_arr_value("2", $index, $value);
    }

    public function remove_last_batchItem()
    {
        $this->_remove_last_arr_value("2");
    }

    public function batchItem_size()
    {
        return $this->_get_arr_size("2");
    }
}
