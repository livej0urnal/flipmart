<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 12.03.2019
 * Time: 15:09
 */

namespace app\models;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }

    public function getBlog()
    {
        return $this->hasOne(Blog::className() , ['id' => 'categoryid']);
    }

    public function getAuthor()
    {
        return $this->hasOne(Author::className() , ['id' => 'author']);
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className() , ['id' => 'post']);
    }


}