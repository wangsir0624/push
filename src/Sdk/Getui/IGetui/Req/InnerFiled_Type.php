<?php

namespace Wangjian\Push\Sdk\Getui\IGetui\Req;

use Wangjian\Push\Sdk\Getui\Protobuf\Type\PBEnum;

class InnerFiled_Type extends PBEnum
{
    const str = 0;
    const int32 = 1;
    const int64 = 2;
    const floa = 3;
    const doub = 4;
    const bool = 5;
}