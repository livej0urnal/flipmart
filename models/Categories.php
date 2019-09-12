<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 09.03.2019
 * Time: 20:48
 */

namespace app\models;
use yii\db\ActiveRecord;

class Categories extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getProduct()
    {
        return $this->hasMany(Product::className() , ['categoryid' => 'id']);
    }
}