<?php

namespace Wangjian\Push\Sdk\Getui;

use Wangjian\Push\Sdk\Getui\IGetui\IGtMessage;
use Wangjian\Push\Sdk\Getui\IGetui\Template\IGtAPNTemplate;
use Wangjian\Push\Sdk\Getui\IGetui\Template\IGtBaseTemplate;
use Wangjian\Push\Sdk\Getui\IGetui\Template\IGtLinkTemplate;
use Wangjian\Push\Sdk\Getui\IGetui\Template\IGtNotificationTemplate;
use Wangjian\Push\Sdk\Getui\IGetui\Template\IGtNotyPopLoadTemplate;
use Wangjian\Push\Sdk\Getui\IGetui\Template\IGtTransmissionTemplate;
use Wangjian\Push\Sdk\Getui\IGtPush;
use Wangjian\Push\Sdk\Getui\IGetui\IGtTarget;
use Wangjian\Push\Sdk\Getui\IGetui\IGtAppMessage;
use Wangjian\Push\Sdk\Getui\IGetui\IGtListMessage;
use Wangjian\Push\Sdk\Getui\IGetui\IGtSingleMessage;
use Exception;

class Client
{
    /**
     * 消息模板常量
     * @const string
     */
    const TEMPLATE_NOTIFICATION = 'notification';
    const TEMPLATE_LINK = 'link';
    const TEMPLATE_NOTYPOPLOAD = 'notypopload';
    const TEMPLATE_TRANSMISSION = 'transmission';
    const TEMPLATE_APN = 'apn';

    /**
     * 推送模式常量
     * @const string
     */
    const MODE_SINGLE = 'single';
    const MODE_LIST = 'list';
    const MODE_APP = 'app';

    /**
     * app id
     * @var string
     */
    protected $app_id;

    /**
     * host
     * @var string
     */
    protected $host;

    /**
     * app key
     * @var string
     */
    protected $app_key;

    /**
     * master secret
     * @var string
     */
    protected $master_secret;

    /**
     * IGtPush instance
     * @var IGtPush
     */
    protected $igt;

    /**
     * Getui constructor
     * @param array $configs
     */
    public function __construct($configs)
    {
        $this->app_id = $configs['app_id'];
        $this->host = $configs['host'];
        $this->app_key = $configs['app_key'];
        $this->master_secret = $configs['master_secret'];
        $this->igt = new IGtPush($configs['host'], $configs['app_key'], $configs['master_secret']);
    }

    /**
     * 消息推送
     * @param mixed $target  如果target为空，表示推送给APP，如果target元素为1个，表示单推，多个表示多推
     * @param array $templateConfigs  模板配置
     * @param array $messageConfigs  消息配置
     * @return mixed
     * @throws Exception
     */
    public function cast($target, $templateConfigs, $messageConfigs)
    {
        $pushMode = '';
        if (empty($target)) {
            $pushMode = self::MODE_APP;
        } else {
            if (count($target) > 1) {
                $pushMode = self::MODE_LIST;
            } else {
                $pushMode = self::MODE_SINGLE;
            }
        }

        $template = $this->prepareTemplate(array_merge(
            [
                'appId' => $this->app_id,
                'appKey' => $this->app_key
            ],
            $templateConfigs
        ));
        $message = $this->prepareMessage($template, $messageConfigs, $pushMode);

        $rep = null;
        switch ($pushMode) {
            case self::MODE_SINGLE:
                $targetClient = new IGtTarget();
                $targetClient->set_appId($this->app_id);
                $targetClient->set_clientId($target);

                $rep = $this->igt->pushMessageToSingle($message, $targetClient);
                break;
            case self::MODE_LIST:
                $targetClients = [];
                foreach ($target as $targetId) {
                    $targetClient = new IGtTarget();
                    $targetClient->set_appId($this->app_id);
                    $targetClient->set_clientId($targetId);
                    $targetClients[] = $targetClient;
                }

                $contentId = $this->igt->getContentId($message);

                $rep = $this->igt->pushMessageToList($contentId, $targetClients);
                break;
            case self::MODE_APP:
                $rep = $this->igt->pushMessageToApp($message);
                break;
            default:
                throw new Exception('unsupported push mode');
        }

        return $rep;
    }

    /**
     * 生成模板
     * @param array $templateConfigs
     * @return IGtBaseTemplate
     * @throws Exception
     */
    protected function prepareTemplate($templateConfigs)
    {
        $template = null;
        switch ($templateConfigs['type']) {
            case self::TEMPLATE_NOTIFICATION:
                $template = new IGtNotificationTemplate();
                break;
            case self::TEMPLATE_LINK:
                $template = new IGtLinkTemplate();
                break;
            case self::TEMPLATE_NOTYPOPLOAD:
                $template = new IGtNotyPopLoadTemplate();
                break;
            case self::TEMPLATE_TRANSMISSION:
                $template = new IGtTransmissionTemplate();
                break;
            case self::TEMPLATE_APN:
                $template = new IGtAPNTemplate();
                break;
            default:
                throw new Exception('unsupported template');
        }

        foreach ($templateConfigs as $key => $value) {
            $method = 'set_' . lcfirst($key);

            if (method_exists($template, $method)) {
                call_user_func([$template, $method], $value);
            }
        }

        return $template;
    }

    /**
     * 生成消息
     * @param IGtBaseTemplate $template  消息模板
     * @param array $messageConfigs  消息配置
     * @param string $pushMode  推送模式
     * @return IGtMessage;
     * @throws Exception
     */
    protected function prepareMessage(IGtBaseTemplate $template, $messageConfigs, $pushMode)
    {
        $message = null;
        switch ($pushMode) {
            case self::MODE_SINGLE:
                $message = new IGtSingleMessage();
                break;
            case self::MODE_LIST:
                $message = new IGtListMessage();
                break;
            case self::MODE_APP:
                $message = new IGtAppMessage();
                break;
            default:
                throw new Exception('unsupported push mode');
        }

        $message->set_data($template);

        foreach ($messageConfigs as $key => $value) {
            $method = 'set_' . lcfirst($key);

            if (method_exists($message, $method)) {
                call_user_func([$message, $method], $value);
            }
        }

        return $message;
    }
}
