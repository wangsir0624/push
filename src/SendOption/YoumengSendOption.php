<?php
namespace Wangjian\Push\SendOption;

class YoumengSendOption extends SendOption
{
    protected $platform;

    protected $type;

    protected $options;

    public function setPlatform($platform)
    {
        $this->platform = $platform;

        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
