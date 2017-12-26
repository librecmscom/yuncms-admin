<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\admin;

use Yii;

/**
 * Class Application
 *
 * @property \yii\web\UrlManager $frontUrlManager
 * @package  yuncms\admin
 */
class Application extends \yii\web\Application
{

    public $id = 'app-backend';

    /**
     * @inheritdoc
     */
    protected function bootstrap()
    {
        parent::bootstrap();
        //附加权限验证行为
        $this->attachBehavior('access', Yii::createObject('yuncms\admin\components\AccessControl'));

        //锁定布局
        $this->layout = '@vendor/xutl/yii2-inspinia-widget/views/layouts/main';

        //设置前台URL
        $this->frontUrlManager->baseUrl = Yii::$app->settings->get('url', 'system');
    }

    /**
     * Returns the URL manager for this application.
     * @return object|\yii\web\UrlManager
     */
    public function getFrontUrlManager()
    {
        return $this->get('frontUrlManager');
    }

    /**
     * @inheritdoc
     */
    public function coreComponents()
    {
        //增加或重置一些系统默认组件的默认配置
        return array_merge(parent::coreComponents(), [
            'user' => [
                'class' => 'yii\web\User',
                'enableAutoLogin' => true,
                'loginUrl' => ['/admin/security/login'],
                'identityClass' => 'yuncms\admin\models\Admin',
                'identityCookie' => [
                    'name' => '_identity_backend',
                    'httpOnly' => true
                ],
            ],
            //定义authManager
            'authManager' => [
                'class' => 'yuncms\admin\components\RbacManager',
                'cache' => 'cache',
            ],
            'urlManager' => [
                'class' => 'yii\web\UrlManager',
                'rules' => [
                    'login' => '/admin/security/login',
                    'logout' => '/admin/security/logout',
                ],
            ],
            'frontUrlManager' => [
                'class' => 'yii\web\UrlManager',
            ],
        ]);
    }

}