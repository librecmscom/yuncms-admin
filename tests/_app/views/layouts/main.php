<?php

if (Yii::$app->user->getIsGuest()) {
    echo \yii\helpers\Html::a('Login', ['/admin/security/login']);
} else {
    echo \yii\helpers\Html::a('Logout', ['/admin/security/logout']);
}

echo $content;
