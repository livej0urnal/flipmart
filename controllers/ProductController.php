<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 13.03.2019
 * Time: 18:56
 */

namespace app\controllers;
use app\controllers\AppController;
use app\models\Brands;
use app\models\Categories;
use app\models\Category;
use app\models\Deals;
use app\models\Gallery;
use app\models\Product;
use app\models\Banners;
use app\models\Reviews;
use yii\data\Pagination;
use app\models\ReviewsForm;
use Yii;

class ProductController extends AppController
{
    public function actionIndex($id)
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product)){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        $banners = Banners::find()->where(['category' => '1' ])->all();
        $deals = Deals::find()->all();
        $productid = $deal['productid'];
        $hot = Product::find()->where(['id' => $productid])->all();
        $brands = Brands::find()->all();
        $best = Product::find()->where(['sale' => '1'])->all();
        $gallery = Gallery::find()->where(['product' => $id])->all();
        $reviews = Reviews::find()->where(['product' => $id])->all();
        $model = new ReviewsForm();
        if($model->load(Yii::$app->request->post()))
        {
            $model->product = $product['id'];
            $model->name = strip_tags($model->name);
            $model->review = strip_tags($model->review);
            if($model->save()){
                Yii::$app->session->setFlash('success' , 'Done');
                return $this->refresh();

            } else{

                Yii::$app->session->setFlash('error' , 'Error');
            }
        }
        $this->setMeta($product->seotitle, '' , $product->seodescription);
        return $this->render('index' , compact('product' , 'banners' , 'deals' , 'hot' , 'brands' , 'best' , 'gallery' , 'reviews' , 'model'));
    }

    public function actionCategory()
    {
        $id = Yii::$app->request->get('id');
        $category = Categories::findOne($id);
        if(empty($category)){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        $banners = Banners::find()->where(['category' => '1'])->all();
        $brands = Brands::find()->all();
        $products = Product::find()->where(['categoryid' => $id])->all();
        $query = Product::find()->where(['categoryid' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12 , 'forcePageParam' => false, 'pageSizeParam' => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta( $category->seotitle, '' , $category->seodescription);
        return $this->render('category' , compact('category' , 'banners' , 'brands' , 'products' , 'pages'));
    }

    public function actionBrand()
    {
        $id = Yii::$app->request->get('id');
        $brand = Brands::findOne($id);
        if(empty($brand)){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        $products = Product::find()->where(['brand' => $brand->id])->all();
        $query = Product::find()->where(['brand' => $brand->id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6 , 'forcePageParam' => false, 'pageSizeParam' => false ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta($brand->title, '' , '');
        return $this->render('brands' , compact('brand' , 'products' , 'pages'));
    }
}