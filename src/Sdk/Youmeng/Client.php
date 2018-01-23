<?php
namespace Wangjian\Push\Sdk\Youmeng;

use Exception;
use Wangjian\Push\Sdk\Youmeng\Android\AndroidBroadcast;
use Wangjian\Push\Sdk\Youmeng\Android\AndroidCustomizedcast;
use Wangjian\Push\Sdk\Youmeng\Android\AndroidFilecast;
use Wangjian\Push\Sdk\Youmeng\Android\AndroidGroupcast;
use Wangjian\Push\Sdk\Youmeng\Android\AndroidListcast;
use Wangjian\Push\Sdk\Youmeng\Android\AndroidUnicast;
use Wangjian\Push\Sdk\Youmeng\Ios\IOSBroadcast;
use Wangjian\Push\Sdk\Youmeng\Ios\IOSCustomizedcast;
use Wangjian\Push\Sdk\Youmeng\Ios\IOSFilecast;
use Wangjian\Push\Sdk\Youmeng\Ios\IOSGroupcast;
use Wangjian\Push\Sdk\Youmeng\Ios\IOSListcast;
use Wangjian\Push\Sdk\Youmeng\Ios\IOSUnicast;

class Client
{
    /**
     * 发送类型常量
     * @const int
     */
    const TYPE_UNICAST = 'unicast';
    const TYPE_LISTCAST = 'listcast';
    const TYPE_FILECAST = 'filecast';
    const TYPE_BROADCAST = 'broadcast';
    const TYPE_GROUPCAST = 'groupcast';
    const TYPE_CUSTOMIZEDCAST = 'customizedcast';

    /**
     * platform常量
     * @const string
     */
    const PLATFORM_IOS = 'iOS';
    const PLATFORM_ANDROID = 'Android';

    /**
     * app key
     * @var string
     */
    protected $appKey;

    /**
     * app master secret
     * @var string
     */
    protected $appMasterSecret;

    /**
     * 是否是production模式
     * @var bool
     */
    protected $production;

    /**
     * Client constructor
     * @param string $appKey
     * @param string $appMasterSecret
     * @param bool $production
     */
    public function __construct($appKey, $appMasterSecret, $production = false)
    {
        $this->appKey = $appKey;
        $this->appMasterSecret = $appMasterSecret;
        $this->production = $production;
    }

    /**
     * 推送
     * @param string $platform  平台
     * @param int $type  推送类型
     * @param array $options  推送选项
     * @return bool
     */
    public function cast($platform, $type, $options)
    {
        $notification = $this->getNotification($platform, $type);

        $result =  $this->preprocess($notification)
            ->process($notification, $options)
            ->send();

        return true;
    }

    /**
     * 利用platform和type获取一个notification对象
     * @param string $platform
     * @param int $type
     * @return UmengNotification
     * @throws Exception
     */
    protected function getNotification($platform, $type)
    {
        $notification = null;

        if ($platform == self::PLATFORM_ANDROID) {
            switch ($type) {
                case self::TYPE_UNICAST:
                    $notification = new AndroidUnicast();
                    break;
                case self::TYPE_LISTCAST:
                    $notification = new AndroidListcast();
                    break;
                case self::TYPE_FILECAST:
                    $notification = new AndroidFilecast();
                    break;
                case self::TYPE_BROADCAST:
                    $notification = new AndroidBroadcast();
                    break;
                case self::TYPE_GROUPCAST:
                    $notification = new AndroidGroupcast();
                    break;
                case self::TYPE_CUSTOMIZEDCAST:
                    $notification = new AndroidCustomizedcast();
                    break;
                default:
                    throw new Exception('unsupported cast type');
            }
        } elseif ($platform == self::PLATFORM_IOS) {
            switch ($type) {
                case self::TYPE_UNICAST:
                    $notification = new IOSUnicast();
                    break;
                case self::TYPE_LISTCAST:
                    $notification = new IOSListcast();
                    break;
                case self::TYPE_FILECAST:
                    $notification = new IOSFilecast();
                    break;
                case self::TYPE_BROADCAST:
                    $notification = new IOSBroadcast();
                    break;
                case self::TYPE_GROUPCAST:
                    $notification = new IOSGroupcast();
                    break;
                case self::TYPE_CUSTOMIZEDCAST:
                    $notification = new IOSCustomizedcast();
                    break;
                default:
                    throw new Exception('unsupported cast type');
            }
        } else {
            throw new Exception('unsupported platform');
        }

        return $notification;
    }

    /**
     * 预处理
     * @param UmengNotification $notification
     * @return $this
     */
    protected function preprocess(UmengNotification $notification)
    {
        $notification->setAppMasterSecret($this->appMasterSecret);
        $notification->setPredefinedKeyValue('appkey', $this->appKey);
        $notification->setPredefinedKeyValue('production_mode', $this->production);
        $notification->setPredefinedKeyValue('timestamp', time());

        return $this;
    }

    /**
     * 处理
     * @param UmengNotification $notification
     * @param array $options
     * @return UmengNotification
     * @throws Exception
     */
    protected function process(UmengNotification $notification, $options)
    {
        if (!empty($rawFile = $options['file'])) {
            if (substr($rawFile, 0, 1) == '@') {
                $file = file_get_contents(substr($rawFile, 1));
            } else {
                $file = $rawFile;
            }

            unset($options['file']);
        }

        foreach ($options as $key => $value) {
            try {
                $notification->setPredefinedKeyValue($key, $value);
            } catch (Exception $e) {
                if ($notification instanceof IOSNotification) {
                    $notification->setCustomizedField($key, $value);
                } elseif ($notification instanceof AndroidNotification) {
                    $notification->setExtraField($key, $value);
                } else {
                    throw new Exception('unsupported notification');
                }
            }
        }

        if (!empty($file) && method_exists($notification, 'uploadContents')) {
            call_user_func([$notification, 'uploadContents'], $file);
        }

        return $notification;
    }
}
