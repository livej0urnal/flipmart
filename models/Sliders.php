<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 09.03.2019
 * Time: 20:30
 */

namespace app\models;

use yii\db\ActiveRecord;

class Sliders extends ActiveRecord
{
    public static function tableName()
    {
        return 'sliders';
    }
}