<?php
require __DIR__ . '/vendor/autoload.php';

$android_configs = [
    'driver' => 'youmeng',
    'appKey' => '5a62f0678f4a9d75ca0003f3',
    'appMasterSecret' => 'cv6ipctloywckm4pptjzuxi52grsimjl',
    'production' => false
];

$ios_configs = [
    'driver' => 'youmeng',
    'appKey' => '52c149ae56240b374c003ce3',
    'appMasterSecret' => '1vr2pwgvhmwnbzdt0nqx3tld09zrnzuz',
    'production' => false
];

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

$androidAdapter = \Wangjian\Push\Factory::createAdapter($android_configs);
$iosAdapter = \Wangjian\Push\Factory::createAdapter($ios_configs);

$option = (new \Wangjian\Push\SendOption\YoumengSendOption())->setPlatform('Android')->setType('unicast')->setOptions($options);
var_dump($androidAdapter->cast($option));
