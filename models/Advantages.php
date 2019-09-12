<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 13.03.2019
 * Time: 21:28
 */

namespace app\models;
use yii\db\ActiveRecord;

class Advantages extends ActiveRecord
{
    public static function tableName()
    {
        return 'advantages';
    }
}