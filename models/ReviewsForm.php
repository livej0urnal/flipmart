<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 17.03.2019
 * Time: 18:43
 */

namespace app\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class ReviewsForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'reviews';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules()
    {
        return [
            [['name' , 'summary' , 'review'] , 'required'],
            [['name'] , 'string' , 'min' => 2 , 'max' => 12],
            ['review' , 'trim'],
            ['summary' , 'number']

        ];
    }
}