<?php
require __DIR__ . '/vendor/autoload.php';

$client = new \Wangjian\Push\Sdk\Youmeng\Client("5a62f0678f4a9d75ca0003f3", "cv6ipctloywckm4pptjzuxi52grsimjl"); //Android client
//$client = new \Wangjian\Push\Sdk\Youmeng\Client("52c149ae56240b374c003ce3", "1vr2pwgvhmwnbzdt0nqx3tld09zrnzuz");  //iOS client

$options = [
    'timestamp' => time(),
    'ticker' => 'test',
    'title' => 'test',
    'text' => 'test',
    'after_open' => 'test',
    'alert' => 'test',
    'badge' => 'test',
    'sound' => 'chime',
    'test' => 'test',
    'device_tokens' => 'test',
    'file' => "aa"."\n"."bb",
    'filter' => array(
        "where" => 	array(
            "and" 	=>  array(
                array(
                    "tag" => "test"
                ),
                array(
                    "tag" => "Test"
                )
            )
        )
    ),
    'alias' => 'xx',
    'alias_type' => 'xx'
];


var_dump($client->cast(\Wangjian\Push\Sdk\Youmeng\Client::PLATFORM_ANDROID, \Wangjian\Push\Sdk\Youmeng\Client::TYPE_UNICAST, $options));
