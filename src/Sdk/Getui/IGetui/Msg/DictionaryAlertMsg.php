<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Msg;

class DictionaryAlertMsg implements ApnMsg
{
    public $title;
    public $body;
    public $titleLocKey;
    public $titleLocArgs = array();
    public $actionLocKey;
    public $locKey;
    public $locArgs = array();
    public $launchImage;

    public function get_alertMsg()
    {
        $alertMap = array();

        if ($this->title != null && $this->title != "") {
            $alertMap["title"] = $this->title;
        }

        if ($this->body != null && $this->body != "") {
            $alertMap["body"] = $this->body;
        }

        if ($this->titleLocKey != null && $this->titleLocKey != "") {
            $alertMap["title-loc-key"] = $this->titleLocKey;
        }

        if (sizeof($this->titleLocArgs) > 0) {
            $alertMap["title-loc-args"] = $this->titleLocArgs;
        }

        if ($this->actionLocKey != null && $this->actionLocKey) {
            $alertMap["action-loc-key"] = $this->actionLocKey;
        }

        if ($this->locKey != null && $this->locKey != "") {
            $alertMap["loc-key"] = $this->locKey;
        }

        if (sizeof($this->locArgs) > 0) {
            $alertMap["loc-args"] = $this->locArgs;
        }

        if ($this->launchImage != null && $this->launchImage != "") {
            $alertMap["launch-image"] = $this->launchImage;
        }

        if (count($alertMap) == 0) {
            return null;
        }

        return $alertMap;
    }
}
