<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

class PushInfo extends PBMessage
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
        $this->fields["7"] = "PBString";
        $this->values["7"] = "";
        $this->fields["8"] = "PBString";
        $this->values["8"] = "";
        $this->fields["9"] = "PBString";
        $this->values["9"] = "";
        $this->fields["10"] = "PBInt";
        $this->values["10"] = "";
        $this->fields["11"] = "PBBool";
        $this->values["11"] = "";
        $this->fields["12"] = "PBString";
        $this->values["12"] = "";
        $this->fields["13"] = "PBBool";
        $this->values["13"] = "";
        $this->fields["14"] = "PBString";
        $this->values["14"] = "";
    }

    public function message()
    {
        return $this->_get_value("1");
    }

    public function set_message($value)
    {
        return $this->_set_value("1", $value);
    }

    public function actionKey()
    {
        return $this->_get_value("2");
    }

    public function set_actionKey($value)
    {
        return $this->_set_value("2", $value);
    }

    public function sound()
    {
        return $this->_get_value("3");
    }

    public function set_sound($value)
    {
        return $this->_set_value("3", $value);
    }

    public function badge()
    {
        return $this->_get_value("4");
    }

    public function set_badge($value)
    {
        return $this->_set_value("4", $value);
    }

    public function payload()
    {
        return $this->_get_value("5");
    }

    public function set_payload($value)
    {
        return $this->_set_value("5", $value);
    }

    public function locKey()
    {
        return $this->_get_value("6");
    }

    public function set_locKey($value)
    {
        return $this->_set_value("6", $value);
    }

    public function locArgs()
    {
        return $this->_get_value("7");
    }

    public function set_locArgs($value)
    {
        return $this->_set_value("7", $value);
    }

    public function actionLocKey()
    {
        return $this->_get_value("8");
    }

    public function set_actionLocKey($value)
    {
        return $this->_set_value("8", $value);
    }

    public function launchImage()
    {
        return $this->_get_value("9");
    }

    public function set_launchImage($value)
    {
        return $this->_set_value("9", $value);
    }

    public function contentAvailable()
    {
        return $this->_get_value("10");
    }

    public function set_contentAvailable($value)
    {
        return $this->_set_value("10", $value);
    }

    public function invalidAPN()
    {
        return $this->_get_value("11");
    }

    public function set_invalidAPN($value)
    {
        return $this->_set_value("11", $value);
    }

    public function apnJson()
    {
        return $this->_get_value("12");
    }

    public function set_apnJson($value)
    {
        return $this->_set_value("12", $value);
    }

    public function invalidMPN()
    {
        return $this->_get_value("13");
    }

    public function set_invalidMPN($value)
    {
        return $this->_set_value("13", $value);
    }

    public function mpnXml()
    {
        return $this->_get_value("14");
    }

    public function set_mpnXml($value)
    {
        return $this->_set_value("14", $value);
    }
}
