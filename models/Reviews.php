<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 14.03.2019
 * Time: 13:13
 */

namespace app\models;
use yii\db\ActiveRecord;

class Reviews extends ActiveRecord
{
    public static function tableName()
    {
        return 'reviews';
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className() , ['id' => 'product']);
    }
}