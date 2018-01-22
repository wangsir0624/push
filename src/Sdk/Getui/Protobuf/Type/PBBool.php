<?php

namespace Wangjian\Push\Sdk\Getui\Protobuf\Type;

use Wangjian\Push\Sdk\Getui\Protobuf\PBMessage;

/**
 * @author Nikolai Kordulla
 */
class PBBool extends PBInt
{
    public $wired_type = PBMessage::WIRED_VARINT;

    /**
     * Parses the message for this type
     *
     * @param array
     */
    public function ParseFromArray()
    {
        $this->value = $this->reader->next();
        $this->value = ($this->value != 0) ? 1 : 0;
    }
}
