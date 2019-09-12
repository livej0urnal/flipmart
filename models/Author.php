<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 12.03.2019
 * Time: 15:28
 */

namespace app\models;
use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public static function tableName()
    {
        return 'author';
    }

    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['author' => 'id']);
    }
}