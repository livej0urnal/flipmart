<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 13.03.2019
 * Time: 19:55
 */

namespace app\models;
use yii\db\ActiveRecord;

class Deals extends ActiveRecord
{
    public static function tableName()
    {
        return 'deals';
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className() , ['id' => 'productid']);
    }
}