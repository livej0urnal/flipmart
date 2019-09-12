<?php

namespace app\controllers;

use app\models\Banners;
use app\models\Login;
use app\models\Product;
use app\models\Signup;
use Yii;
use app\controllers\AppController;
use app\models\Sliders;
use app\models\Posts;
use app\models\Brands;
use app\models\Deals;
use app\models\Advantages;

class SiteController extends AppController
{


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 3600,
                'variations' => [
                    Yii::$app->request->get('id')
                ]
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $sliders = Sliders::find()->all();
        $posts = Posts::find()->limit(5)->all();
        $brands = Brands::find()->all();
        $new = Product::find()->where(['new' => '1'])->all();
        $clothing = Product::find()->where(['categoryid' => 1 , 'new' => '1'] )->limit(10)->all();
        $watches = Product::find()->where(['categoryid' => 2 , 'new' => '1'] )->limit(10)->all();
        $shoes = Product::find()->where(['categoryid' => 3 , 'new' => '1'] )->limit(10)->all();
        $deals = Deals::find()->all();
        $product = $deal['productid'];
        $products = Product::find()->where(['id' => $product])->all();
        $special = Product::find()->where(['sale' => 1])->limit(3)->all();
        $advantages = Advantages::find()->all();
        $best = Product::find()->where(['best' => '1'])->all();
        $banners = Banners::find()->where(['home' => '1'])->all();
        $this->setMeta('Flipmart premium HTML5 & CSS3 Template' , '' ,'');
        return $this->render('index' , compact('sliders' , 'posts' , 'brands' , 'new' , 'clothing' , 'watches' , 'shoes' , 'deals' , 'products' , 'special' , 'advantages' , 'best' , 'banners' ));
    }


    public function actionSignup()
    {
        $model = new Signup();
        if(isset($_POST['Signup']))
        {
           $model->attributes = Yii::$app->request->post('Signup');
           if($model->validate() && $model->signup()){
               Yii::$app->session->setFlash('success', 'Your order is accepted');
               return $this->goHome();
           }
           else{
               Yii::$app->session->setFlash('error', 'Error');
           }
        }
        $this->setMeta('New user register');
        return $this->render('signup' , compact('model'));
    }

    public function actionLogin()
    {
        $login_model = new Login();
        if(Yii::$app->request->post('Login'))
        {
            $login_model->attributes = Yii::$app->request->post('Login');
            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
        $this->setMeta('Login page');
        return $this->render('login' , compact('login_model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
