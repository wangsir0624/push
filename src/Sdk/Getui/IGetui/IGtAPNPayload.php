<?php

namespace Wangjian\Push\Sdk\Getui\IGetui;

class IGtAPNPayload
{
    public static $PAYLOAD_MAX_BYTES = 2048;

    public $APN_SOUND_SILENCE = "com.gexin.ios.silence";
    public $customMsg = array();
    public $badge = -1;
    public $sound = "default";
    public $contentAvailable = 0;
    public $category;
    public $alertMsg;

    public function get_payload()
    {
        try {
            $apsMap = array();
            if ($this->alertMsg != null) {
                $msg = $this->alertMsg->get_alertMsg();
                if ($msg != null) {
                    $apsMap["alert"] = $msg;
                }
            }

            if ($this->badge >= 0) {
                $apsMap["badge"] = $this->badge;
            }

            if ($this->sound == null || $this->sound == '') {
                $apsMap["sound"] = 'default';
            } elseif ($this->sound != $this->APN_SOUND_SILENCE) {
                $apsMap["sound"] = $this->sound;
            }

            if (sizeof($apsMap) == 0) {
                throw new \Exception("format error");
            }

            if ($this->contentAvailable > 0) {
                $apsMap["content-available"] = $this->contentAvailable;
            }

            if ($this->category != null && $this->category != "") {
                $apsMap["category"] = $this->category;
            }

            $map = array();

            if (count($this->customMsg) > 0) {
                foreach ($this->customMsg as $key => $value) {
                    $map[$key] = $value;
                }
            }

            $map["aps"] = $apsMap;
            return json_encode($map);
        } catch (\Exception $e) {
            throw new \Exception("create apn payload error", $e);
        }
    }

    public function add_customMsg($key, $value)
    {
        if ($key != null && $key != "" && $value != null) {
            $this->customMsg[$key] = $value;
        }
    }
}
