<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 09.03.2019
 * Time: 22:09
 */

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public $phone;
    public $name;

    public function rules()
    {
        return [
            [['email', 'password' , 'name', 'phone' ], 'required'],
            ['email' , 'email'],
            ['email' , 'unique' , 'targetClass' => 'app\models\User'],
            ['password' , 'string' , 'min' => 2, 'max' => 10],
            ['phone' , 'string' , 'min' => 10 , 'max' => 12],
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        return $user->save();
    }
}