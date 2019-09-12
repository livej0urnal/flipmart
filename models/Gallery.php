<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 14.03.2019
 * Time: 12:59
 */

namespace app\models;
use yii\db\ActiveRecord;

class Gallery extends ActiveRecord
{
    public static function tableName()
    {
        return 'gallery';
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className() , ['id' => 'product']);
    }
}