<?php

namespace yuncms\admin\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Admin]].
 *
 * @see Admin
 */
class AdminQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /*public function active()
    {
        return $this->andWhere(['status' => Admin::STATUS_PUBLISHED]);
    }*/

    /**
     * @inheritdoc
     * @return Admin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Admin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
