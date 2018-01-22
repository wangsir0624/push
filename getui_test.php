<?php
require __DIR__ . '/vendor/autoload.php';

$configs = [
    'host' => '',
    'app_id' => 'de4kca4sUfARTcEYEbQnZ',
    'app_key' => 'wFSFiP8HYl8o5T3x8fRw04',
    'master_secret' => 'oXgcpewHtf76Egt20ql105',
];

$client = new \Wangjian\Push\Sdk\Getui\Client($configs);
$template = [
    'type' => 'notification',
    'transmissionType' => 1,
    'transmissionContent' => 'test',
    'title' => 'test',
    'logo' => 'logo.png',
    'logoURL' => "http://wwww.igetui.com/logo.png",
    'appId' => 'AKfGHaL6KbA2loB1LLgGs7'
];
$message = [
    'isOffline' => false
];
var_dump($client->cast('', $template, $message));