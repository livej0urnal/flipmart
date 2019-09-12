<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 13.03.2019
 * Time: 21:52
 */

namespace app\models;
use yii\db\ActiveRecord;


class Banners extends ActiveRecord
{
    public static function tableName()
    {
        return 'banners';
    }
}