<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\admin;

use Yii;
use yii\web\Cookie;
use yii\i18n\PhpMessageSource;
use yii\base\BootstrapInterface;
use yuncms\admin\helpers\SettingHelper;

/**
 * Class Bootstrap
 * @package backend
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param \yuncms\admin\Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yuncms\admin\Application) {
//            Yii::$container->set('yii\web\User', [
//                'enableAutoLogin' => true,
//                'loginUrl' => ['/admin/security/login'],
//                'identityClass' => 'yuncms\admin\models\Admin',
//                'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//            ]);
            //$app->set('authManager', [
            //    'class' => 'yuncms\admin\components\RbacManager',
            //    'cache' => 'cache',
            //]);

            //设置前台URL
            $app->frontUrlManager->baseUrl = Yii::$app->settings->get('url','system');

            //附加权限验证行为
//            $app->attachBehavior('access', Yii::createObject([
//                'class' => 'yuncms\admin\components\AccessControl'
//            ]));

//            $app->urlManager->addRules([
//                'login' => '/site/login',
//                'logout' => '/site/logout',
//                'error' => '/site/error',
//            ], false);
        }

        /**
         * 注册语言包
         */
        if (!isset($app->get('i18n')->translations['admin*'])) {
            $app->get('i18n')->translations['admin*'] = [
                'class' => PhpMessageSource::className(),
                'sourceLanguage' => 'en-US',
                'basePath' => __DIR__ . '/messages',
            ];
        }
    }
}