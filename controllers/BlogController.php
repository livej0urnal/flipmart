<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 09.03.2019
 * Time: 23:14
 */

namespace app\controllers;
use app\controllers\AppController;
use app\models\Blog;
use app\models\Comments;
use app\models\Posts;
use app\models\Author;
use app\models\CommentsForm;
use yii\data\Pagination;
use Yii;

class BlogController extends AppController
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => 600,
                'variations' => [
                    Yii::$app->request->get('id')
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $category = Blog::find()->all();
        $posts = Posts::find()->all();
        if(empty($posts)){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        $query = Posts::find()->orderby(['id'=>SORT_DESC]);
        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize' => 4 , 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $comments = Comments::find()->where(['post' => $id])->all();
        $popular = Posts::find()->where(['popular' => '1'])->limit(2)->all();
        $recent = Posts::find()->where(['recent' => '1'])->limit(2)->all();
        $this->setMeta('Blog from Flipmart');
        return $this->render('index' , compact('category' , 'posts' , 'comments' , 'pages' , 'popular' , 'recent'));
    }

    public function actionSingle($id)
    {
        $id = Yii::$app->request->get('id');
        $post = Posts::findOne($id);
        if(empty($post)){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        $author = Author::findOne($post->author);
        $comments = Comments::find()->where(['post' => $post->id])->all();
        $model = new CommentsForm();
        $model->post = $post->id;
        if($model->load(Yii::$app->request->post()))
        {
            $model->name = strip_tags($model->name);
            $model->title = strip_tags($model->title);
            $model->comment = strip_tags($model->comment);
            if($model->save()){
                Yii::$app->session->setFlash('success' , 'Done');
                return $this->refresh();
            } else{
                Yii::$app->session->setFlash('error' , 'Error');
            }
        }
        $this->setMeta($post->seotitle, '' , $post->seodescription);
        return $this->render('single' , compact('post' , 'author' , 'comments' , 'model'));
    }

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta($q .' | Flipmart');
        if(!$q)
        {
            return $this->render('search');
        }

        $query = Posts::find()->where(['like', 'title', $q ]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2 , 'forcePageParam' => false, 'pageSizeParam' => false ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('posts', 'pages', 'q'));
    }

    public function actionCategory()
    {
        $id = Yii::$app->request->get('id');
        $category = Blog::findOne($id);

        if(empty($category)){
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        $posts = Posts::find()->where(['categoryid' => $id])->all();
        $query = Posts::find()->where(['categoryid' => $id])->orderby(['id'=>SORT_DESC]);
        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize' => 3 , 'forcePageParam' => false, 'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $comments = Comments::find()->where(['post' => $id])->all();
        $popular = Posts::find()->where(['popular' => '1'])->limit(2)->all();
        $recent = Posts::find()->where(['recent' => '1'])->limit(2)->all();
        $this->setMeta($category->seotitle, '' , $category->seodescription);
        return $this->render('category' , compact('posts' , 'popular' , 'comments' , 'recent' , 'pages'));
    }
}