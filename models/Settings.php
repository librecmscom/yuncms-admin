<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\admin\models;

use Yii;
use yii\base\Model;

/**
 * Class Settings
 * @package yuncms\admin\models
 */
class Settings extends Model
{
    /**
     * @var string 基础Url
     */
    public $baseUrl;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $keywords;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $copyright;

    /**
     * @var string
     */
    public $close;

    /**
     * @var string
     */
    public $closeReason;

    /**
     * @var string
     */
    public $analysisCode;

    /**
     * 返回标识
     */
    public function formName()
    {
        return 'system';
    }

    /**
     * 定义字段类型
     * @return array
     */
    public function getTypes()
    {
        return [
            'name' => 'string',
            'title' => 'string',
            'keywords' => 'string',
            'description' => 'string',
            'copyright' => 'string',
            'baseUrl' => 'string',
            'enablePasswordRecovery' => 'string',
            'close' => 'boolean',
            'closeReason' => 'string',
            'analysisCode' => 'string',

        ];
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name', 'title', 'keywords', 'description', 'copyright', 'baseUrl'], 'required'],
            [['name', 'title', 'keywords', 'description', 'copyright', 'closeReason', 'analysisCode'], 'string'],
            ['close', 'boolean'],
            ['close', 'default', 'value' => false],
            ['baseUrl', 'url']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'baseUrl' => Yii::t('admin', 'Base Url'),
            'name' => Yii::t('admin', 'Site Name'),
            'title' => Yii::t('admin', 'Site Title'),
            'keywords' => Yii::t('admin', 'Site Keywords'),
            'description' => Yii::t('admin', 'Site Description'),
            'copyright' => Yii::t('admin', 'Site Copyright'),
            'close' => Yii::t('admin', 'Site Close'),
            'closeReason' => Yii::t('admin', 'Site Close Reason'),
            'analysisCode' => Yii::t('admin', 'Site Analysis Code'),
        ];
    }
}