<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class Transparent extends PBMessage
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
        $this->fields["4"] = "PBString";
        $this->values["4"] = "";
        $this->fields["5"] = "PBString";
        $this->values["5"] = "";
        $this->fields["6"] = "PBString";
        $this->values["6"] = "";
        $this->fields["7"] = "PushInfo";
        $this->values["7"] = "";
        $this->fields["8"] = "ActionChain";
        $this->values["8"] = array();
        $this->fields["9"] = "PBString";
        $this->values["9"] = array();
    }

    public function id()
    {
        return $this->_get_value("1");
    }

    public function set_id($value)
    {
        return $this->_set_value("1", $value);
    }

    public function action()
    {
        return $this->_get_value("2");
    }

    public function set_action($value)
    {
        return $this->_set_value("2", $value);
    }

    public function taskId()
    {
        return $this->_get_value("3");
    }

    public function set_taskId($value)
    {
        return $this->_set_value("3", $value);
    }

    public function appKey()
    {
        return $this->_get_value("4");
    }

    public function set_appKey($value)
    {
        return $this->_set_value("4", $value);
    }

    public function appId()
    {
        return $this->_get_value("5");
    }

    public function set_appId($value)
    {
        return $this->_set_value("5", $value);
    }

    public function messageId()
    {
        return $this->_get_value("6");
    }

    public function set_messageId($value)
    {
        return $this->_set_value("6", $value);
    }

    public function pushInfo()
    {
        return $this->_get_value("7");
    }

    public function set_pushInfo($value)
    {
        return $this->_set_value("7", $value);
    }

    public function actionChain($offset)
    {
        return $this->_get_arr_value("8", $offset);
    }

    public function add_actionChain()
    {
        return $this->_add_arr_value("8");
    }

    public function set_actionChain($index, $value)
    {
        $this->_set_arr_value("8", $index, $value);
    }

    public function remove_last_actionChain()
    {
        $this->_remove_last_arr_value("8");
    }

    public function actionChain_size()
    {
        return $this->_get_arr_size("8");
    }

    public function condition($offset)
    {
        $v = $this->_get_arr_value("9", $offset);
        return $v->get_value();
    }

    public function append_condition($value)
    {
        $v = $this->_add_arr_value("9");
        $v->set_value($value);
    }

    public function set_condition($index, $value)
    {
        $v = new $this->fields["9"]();
        $v->set_value($value);
        $this->_set_arr_value("9", $index, $v);
    }

    public function remove_last_condition()
    {
        $this->_remove_last_arr_value("9");
    }

    public function condition_size()
    {
        return $this->_get_arr_size("9");
    }
}
