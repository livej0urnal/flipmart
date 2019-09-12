<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 12.03.2019
 * Time: 14:59
 */

namespace app\models;

use yii\db\ActiveRecord;

class Blog extends ActiveRecord
{
    public static function tableName()
    {
        return 'blog';
    }

    public function getPosts()
    {
        return $this->hasMany(Posts::className() , ['categoryid' => 'id']);
    }
}