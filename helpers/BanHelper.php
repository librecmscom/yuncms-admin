<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\admin\helpers;

use Yii;
use yii\caching\TagDependency;
use yuncms\admin\models\Banword;

/**
 * Class BanHelper
 * @package yuncms\admin\helpers
 */
class BanHelper
{
    const CACHE_TAG = 'admin.banword';

    private static $words;

    /**
     * 执行敏感词替换
     *
     * @param bool $refresh 是否刷新缓存
     * @param string $string 要检查的字符串
     * @return string 处理后的字符串
     */
    public static function replaceWord($string, $refresh = false)
    {
        static::loadWords($refresh);
        $words = array_combine(static::$words, array_fill(0, count(static::$words), '*'));
        return strtr($string, $words);
    }

    /**
     * 检查字符串是否包含敏感词
     *
     * @param bool $refresh 是否刷新缓存
     * @param string $string 要检查的字符串
     * @return bool
     */
    public static function checkWord($string, $refresh = false)
    {
        static::loadWords($refresh);
        foreach ( static::$words as $word ) {
            if (strlen ( $word ) > 0 && stripos ( $string, $word ) !== false) {
                return false;
            }
        }
        //没找到
        return true;
    }

    /**
     * 获取敏感词
     * @param bool $refresh 是否刷新缓存
     * @return array|\yii\db\ActiveRecord[]|mixed
     */
    public static function loadWords($refresh = false)
    {
        $key = __METHOD__;
        if (YII_DEBUG || static::$words === null || $refresh || Yii::$app->cache === null || ((static::$words = Yii::$app->cache->get($key)) === false)) {
            $words = Banword::find()->select('word')->asArray()->all();
            static::$words = [];
            foreach ($words as $w) {
                static::$words[] = $w['word'];
            }
            if (Yii::$app->cache !== null) {
                Yii::$app->cache->set($key, static::$words, 0, new TagDependency (['tags' => self::CACHE_TAG]));
            }
        }
    }

    /**
     * 使缓存无效
     */
    public static function invalidate()
    {
        if (Yii::$app->cache != null) {
            TagDependency::invalidate(Yii::$app->cache, self::CACHE_TAG);
        }
        static::$words = null;
        static::loadWords();
    }
}