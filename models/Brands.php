<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 13.03.2019
 * Time: 18:50
 */

namespace app\models;
use yii\db\ActiveRecord;

class Brands extends ActiveRecord
{
    public static function tableName()
    {
        return 'brands';
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className() , ['brand' => 'id']);
    }
}