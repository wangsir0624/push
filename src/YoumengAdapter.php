<?php
namespace Wangjian\Push;

use Wangjian\Push\Sdk\Youmeng\Client;
use Wangjian\Push\SendOption\SendOption;
use Wangjian\Push\SendOption\YoumengSendOption;
use Exception;

class YoumengAdapter extends AbstractAdapter
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function cast(SendOption $option)
    {
        if(!($option instanceof YoumengSendOption)) {
            throw new Exception('invalid send option for YoumengAdapter');
        }

        return $this->client->cast($option->getPlatform(), $option->getType(), $option->getOptions());
    }
}