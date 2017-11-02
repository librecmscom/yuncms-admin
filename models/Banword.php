<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%badword}}".
 *
 * @property int $id
 * @property string $word
 * @property integer $created_at
 * @property integer $updated_at
 */
class Banword extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ban_word}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['word'], 'required'],
            [['word'], 'string', 'min' => 2, 'max' => 64],
            [['word'], 'filter', 'filter' => 'trim'],
            [['word'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'word' => Yii::t('admin', 'Ban Word'),
            'created_at' => Yii::t('admin', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return BanwordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BanwordQuery(get_called_class());
    }
}
