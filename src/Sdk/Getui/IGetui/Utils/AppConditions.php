<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Utils;

class AppConditions
{
    //手机类型
    const PHONE_TYPE = "phoneType";
    //地区
    const REGION = "region";
    //自定义tag
    const TAG = "tag";

    //条件
    public $condition = array();

    public function __call($name, $args)
    {
        if ($name == 'addCondition') {
            switch (count($args)) {
                case 2:
                    return call_user_func_array(array(
                        $this,
                        'addCondition2'
                    ), $args);
                case 3:
                    return call_user_func_array(array(
                        $this,
                        'addCondition3'
                    ), $args);
            }
        }
    }

    public function addCondition3($key, $values, $optType = 0)
    {
        $item = array();
        $item["key"] = $key;
        $item["values"] = $values;
        $item["optType"] = $optType;
        $this->condition[] = $item;

        return $this;
    }

    public function addCondition2($key, $values)
    {
        return $this->addCondition3($key, $values, 0);
    }

    public function getCondition()
    {
        return $this->condition;
    }
}
