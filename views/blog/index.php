<?php
     use yii\helpers\Html;
     use yii\widgets\LinkPager;
?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">

</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    <?php if(!empty($posts)) : ?>
                    <?php foreach ($posts as $post) : ?>
                    <div class="blog-post  wow fadeInUp">
                        <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $post->id ]) ?>">
                            <?= Html::img($post->image, ['alt' => $post->title , 'class' => 'img-responsive']) ?>
                        </a>
                        <h1>
                            <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $post->id ]) ?>">
                                <?= $post->title ?>
                            </a>
                        </h1>
                        <span class="date-time">
                             <?php
                             $data = $post->published;
                             $data = Yii::$app->formatter->asDate($post->published , 'long')
                             ?>
                             <?= $data ; ?>
                        </span>
                        <p>
                            <?= $post->short ?>
                        </p>
                        <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $post->id ]) ?>" class="btn btn-upper btn-primary read-more">read more</a>
                    </div>
                    <?php endforeach; ?>

                    <div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-left">
                            <div class="pagination-container" style="text-align: center;">
                                <?php echo LinkPager::widget([
                                    'pagination' => $pages,
                                    'options' => ['class' => 'list-inline list-unstyled'],
                                ]); ?>

                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->

                    </div><!-- /.filters-container -->
                    <?php else: ?>
                        <h4>No articles</h4>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            <form method="get" action="<?= \yii\helpers\Url::to(['blog/search']) ?>">
                                <div class="control-group">
                                    <input placeholder="Type to search" class="search-field search" name="q">
                                    <a href="#" class="search-button"></a>
                                </div>
                            </form>
                        </div>

                        <div class="home-banner outer-top-n outer-bottom-xs">
                            <img src="/assets/images/banners/LHS-banner.jpg" alt="Image">
                        </div>
                        <?php if(!empty($category)) : ?>
                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    <?php foreach ($category as $item) : ?>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="<?= \yii\helpers\Url::to(['blog/category' , 'id' => $item->id ]) ?>"  class="accordion-toggle collapsed">
                                                <?= $item->title ?>
                                            </a>
                                        </div><!-- /.accordion-heading -->

                                    </div><!-- /.accordion-group -->
                                    <?php endforeach; ?>
                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->
                        <?php endif; ?>
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">tab widget</h3>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
                                <li><a href="#recent" data-toggle="tab">recent post</a></li>
                            </ul>
                            <div class="tab-content" style="padding-left:0">
                                <?php if(!empty($popular)) : ?>
                                <div class="tab-pane active m-t-20" id="popular">
                                    <?php foreach ($popular as $item) : ?>
                                    <div class="blog-post inner-bottom-30 " >
                                        <?= Html::img($item->image , ['alt' => $item->title , 'class' => 'img-responsive']) ?>
                                        <h4>
                                            <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $item->id ]) ?>">
                                                <?= $item->title ?>
                                            </a>
                                        </h4>
                                        <span class="date-time">
                                              <?php
                                              $data = $item->published;
                                              $data = Yii::$app->formatter->asDate($item->published , 'long')
                                              ?>
                                              <?= $data ; ?>
                                        </span>

                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php else: ?>
                                <p>
                                    No popular articles
                                </p>
                                <?php endif; ?>

                                <?php if(!empty($recent )) : ?>
                                <div class="tab-pane m-t-20" id="recent">
                                    <?php foreach ($recent as $item) : ?>
                                        <div class="blog-post inner-bottom-30 " >
                                            <?= Html::img($item->image , ['alt' => $item->title , 'class' => 'img-responsive']) ?>
                                            <h4>
                                                <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $item->id ]) ?>">
                                                    <?= $item->title ?>
                                                </a>
                                            </h4>
                                            <span class="date-time">
                                              <?php
                                              $data = $item->published;
                                              $data = Yii::$app->formatter->asDate($item->published , 'long')
                                              ?>
                                              <?= $data ; ?>
                                        </span>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php else: ?>
                                No recent articles
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>