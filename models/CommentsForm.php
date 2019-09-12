<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 12.03.2019
 * Time: 16:08
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


class CommentsForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }


    public function rules()
    {
        return [
            [['name' , 'email' , 'title' , 'comment'], 'required'],
            ['email' , 'email'],
            ['name' , 'string' , 'min' => 2, 'max' => 12],
            ['title' , 'string' , 'min' => 2, 'max' => 12 ],
            ['comment' , 'trim' ],
            ['comment' , 'unique' , 'targetClass' => 'app\models\Comments']
        ];
    }
//
//    public function behaviors()
//    {
//        return [
//            [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['published'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['published'],
//                ],
//                'value' => new Expression('NOW()'),
//            ],
//        ];
//    }
}