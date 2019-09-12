<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">

</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-12">
                    <div class="blog-post wow fadeInUp">
                        <?= Html::img($post->image, ['alt' => $post->title , 'class' => 'img-responsive  blog-image']) ?>
                        <h1>
                            <?= $post->title ?>
                        </h1>
                        <span class="author">
                            <?= $author->name ?>
                        </span>
                        <span class="review">
                           <?php if(!empty($comments)) : ?>
                               <?php echo count($comments); ?> comments
                           <?php else: ?>
                               0 comments
                           <?php endif; ?>
                        </span>
                        <span class="date-time">
                              <?php
                              $data = $post->published;
                              $data = Yii::$app->formatter->asDate($post->published , 'long')
                              ?>
                              <?= $data ; ?>
                        </span>
                        <p>
                            <?= $post->content ?>
                        </p>
                    </div>
                    <div class="blog-post-author-details wow fadeInUp">
                        <div class="row">
                            <div class="col-md-2">
                                <?= Html::img($author->image , ['alt' => $author->name , 'class' => 'img-circle img-responsive']) ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <?= $author->name ?>
                                </h4>

                                <span class="author-job">
                                    <?= $author->post ?>
                                </span>
                                <p>
                                    <?= $author->description ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="blog-review wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-review-comments">
                                    <?php if(!empty($comments)) : ?>
                                        <?php echo count($comments); ?> comments
                                    <?php else: ?>
                                    0 comments
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <?php if(!empty($comments)) : ?>
                            <?php foreach ($comments as $comment) : ?>
                                <div class="col-md-12 clearfix-comment">
                                    <div class="col-md-2 col-sm-2">
                                        <?= Html::img($comment->image, [ 'id' => $comment->id ,'class' => 'img-rounded img-responsive']) ?>
                                    </div>
                                    <div class="col-md-10 col-sm-10 ">
                                        <div class="blog-comments inner-bottom-xs outer-bottom-xs">
                                            <h4>
                                                <?= $comment->name ?>
                                            </h4>
                                            <span class="review-action pull-right">
                                                 <?php
                                                 $data = $comment->published;
                                                 $data = Yii::$app->formatter->asDate($comment->published , 'long')
                                                 ?>
                                                 <?= $data ; ?>
                                            </span>
                                            <p>
                                                <?= $comment->comment ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Leave A Comment</h4>
                            </div>
                            <?php if(Yii::$app->session->hasFlash('success')) : ?>
                                <div class="echo-success">
                                    <?php echo Yii::$app->session->getFlash('success') ?>
                                </div>
                            <?php endif; ?>
                            <?php if(Yii::$app->session->hasFlash('error')) : ?>
                                <div class="echo-error">
                                    <?php echo Yii::$app->session->getFlash('error') ?>
                                </div>
                            <?php endif; ?>
                            <?php $form = ActiveForm::begin([
                                    'id' => 'comment-form',
                                    'class' => 'form-horizontal',
                            ]) ?>

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <?= $form->field($model , 'name' ,[
                                            'inputOptions' => ['class' => 'form-control input-holder']
                                        ] )->input('name' , ['placeholder' => 'Name'])->label(false) ?>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <?= $form->field($model , 'email' ,[
                                            'inputOptions' => ['class' => 'form-control input-holder']
                                        ] )->input('email' , ['placeholder' => 'Email'])->label(false) ?>
                                    </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <?= $form->field($model , 'title' ,[
                                            'inputOptions' => ['class' => 'form-control input-holder']
                                        ] )->input('title' , ['placeholder' => 'Title'])->label(false) ?>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <?= $form->field($model , 'comment' )->textarea(['rows' => 6 ])->label(false) ?>
                                    </div>
                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <?= Html::submitButton('Submit' , ['class' => 'btn-upper btn btn-primary checkout-page-button']) ?>
                            </div>
                            <?php ActiveForm::end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->