<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\admin\models;

use yii\db\ActiveQuery;
/**
 * This is the ActiveQuery class for [[Badword]].
 *
 * @see Badword
 */
class BanwordQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Banword[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Banword|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
