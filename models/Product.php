<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 13.03.2019
 * Time: 19:14
 */

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategories()
    {
        return $this->hasOne(Categories::className() , ['id' => 'categoryid']);
    }

    public function getDeals()
    {
        return $this->hasMany(Deals::className() , ['productid' => 'id']);
    }

    public function getBrands()
    {
        return $this->hasOne(Brands::className() , ['id' => 'brand']);
    }

    public function getGallery()
    {
        return $this->hasMany(Gallery::className() , ['product' => 'id']);
    }

    public function getReviews()
    {
        return $this->hasMany(Reviews::className() , ['product' => 'id']);
    }


}