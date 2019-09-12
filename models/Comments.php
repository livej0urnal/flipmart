<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 12.03.2019
 * Time: 15:51
 */

namespace app\models;

use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }

    public function getPosts()
    {
        return $this->hasOne(Posts::className() , ['post' => 'id']);
    }
}