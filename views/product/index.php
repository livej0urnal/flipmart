<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">

</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <?php if(!empty($banners)) : ?>
                    <div class="home-banner outer-top-n">
                        <?= Html::img($banners['0']['image'] ) ?>
                    </div>
                    <?php endif; ?>


                    <?php if(!empty($deals)) : ?>
                    <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
                        <h3 class="section-title">hot deals</h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

                            <?php foreach ($deals as $deal) :?>
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image">
                                                <?= Html::img($deal->product->image , ['alt' => $deal->product->title]) ?>
                                            </div>
                                            <div class="sale-offer-tag"><span><?= $deal->percent ?>%<br>
                                        off</span></div>
                                            <div class="timing-wrapper">
                                                <div class="box-wrapper">
                                                    <div class="date box">
                                                <span class="key">
                                                    <?php
                                                    $start = new DateTime('now');
                                                    $end = new DateTime($deal->time);
                                                    $days = $end->diff($start);
                                                    echo $days->format('%d');
                                                    ?>
                                                </span>
                                                        <span class="value">
                                                    DAYS
                                                </span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="hour box">
                                                <span class="key">
                                                    <?php
                                                    $start = new DateTime('now');
                                                    $end = new DateTime($deal->time);
                                                    $days = $end->diff($start);
                                                    echo $days->format('%h');
                                                    ?>
                                                </span>
                                                        <span class="value">HRS</span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.hot-deal-wrapper -->

                                        <div class="product-info text-left m-t-20">
                                            <h3 class="name">
                                                <a href="<?= \yii\helpers\Url::to(['/product/index' , 'id' => $deal->product->id]) ?>">
                                                    <?= $deal->product->title ?>
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                        <span class="price">
                                            $<?= $deal->product->price ?>
                                        </span>
                                                <span class="price-before-discount">
                                            $<?= $deal->product->oldprice ?>
                                        </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <div class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </div>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                </div>
                            <?php endforeach; ?>


                        </div><!-- /.sidebar-widget -->
                    </div>
                    <!-- ============================================== HOT DEALS: END ============================================== -->
                    <?php endif; ?>


                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <?php if(!empty($gallery)) : ?>
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    <?php $i = 1; foreach ($gallery as $item) : ?>
                                    <div class="single-product-gallery-item" id="slide<?php echo $i; ?>">
                                        <a data-lightbox="image-1" data-title="Gallery" href="<?= $item->image  ?>">
                                            <img class="img-responsive" alt="" src="/assets/images/blank.gif" data-echo="<?= $item->image  ?>" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    <?php $i++; ?>
                                    <?php endforeach;?>
                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        <?php $i = 1; foreach ($gallery as $item) : ?>
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo $i; ?>" href="#slide<?php echo $i; ?>">
                                                <img class="img-responsive" width="85" alt="" src="/assets/images/blank.gif" data-echo="<?= $item->image ?>" />
                                            </a>
                                        </div>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </div><!-- /#owl-single-product-thumbnails -->



                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                            <?php else: ?>
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                <div id="owl-single-product">
                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1" data-title="Gallery" href="<?= $product->image ?>">
                                            <img class="img-responsive" alt="" src="<?= $product->image ?>" data-echo="<?= $product->image ?>" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                </div><!-- /.single-product-slider -->
                            </div>


                            <?php endif; ?>
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name">
                                    <?= $product->title ?>
                                </h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">
                                                    <?php if(!empty($reviews)) : ?>
                                                    (<?php echo  count($reviews) ?> Reviews)
                                                    <?php else: ?>
                                                    (0 Review)
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">
                                                    <?php if($product->instock <= 0) : ?>
                                                        <h5 style="color: red; margin: 0px;font-size: 13px;margin-top: 2px;">Out Stock</h5>
                                                    <?php else: ?>
                                                        <h5 style="color: green; margin: 0px;font-size: 13px;margin-top: 2px;">In Stock</h5>
                                                    <?php endif; ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    <?= $product->short ?>
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                <span class="price">$<?= $product->price ?></span><br>
                                                <span class="price-strike">$<?= $product->oldprice ?></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Qty :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-7">
                                            <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->






                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">
                                            <?= $product->description ?>
                                        </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">

                                        <div class="product-reviews">
                                            <h4 class="title">Customer Reviews</h4>
                                            <?php if(!empty($reviews)) : ?>
                                            <div class="reviews">
                                                <?php foreach ($reviews as $review) : ?>
                                                <div class="review">
                                                    <div class="review-title">
                                                        <span class="summary">
                                                            <?= $review->name ?>
                                                        </span>
                                                        <span class="date">
                                                            <i class="fa fa-calendar"></i><span>
                                                                  <?php
                                                                  $data = $review->date;
                                                                  $data = Yii::$app->formatter->asDate($review->date , 'long')
                                                                  ?>
                                                                  <?= $data ; ?>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="text">
                                                        <?= $review->review ?>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                            </div><!-- /.reviews -->
                                            <?php else: ?>
                                            <h4 style="color: red; font-size: 14px;">No reviews</h4>
                                            <?php endif; ?>
                                        </div><!-- /.product-reviews -->



                                        <div class="product-add-review">

                                            <div class="review-form">
                                                <div class="form-container">
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
                                                            'id' => 'review-form',
                                                            'class' => 'cnt-form',
                                                    ]) ?>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <?= $form->field($model , 'name')->textInput() ?>
                                                            </div><!-- /.form-group -->
                                                            <div class="form-group">
                                                                <?= $form->field($model , 'summary')->textInput() ?>
                                                            </div><!-- /.form-group -->
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?= $form->field($model , 'review' )->textarea(['rows' => 4 ])->label(false) ?>
                                                            </div><!-- /.form-group -->
                                                        </div>
                                                    </div><!-- /.row -->

                                                    <div class="action text-right">
                                                        <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                    </div><!-- /.action -->

                                                    <?php ActiveForm::end() ?>
                                                </div><!-- /.form-container -->
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <?php if(!empty($best)) : ?>
                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">upsell products</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        <?php foreach ($best as $item) : ?>
                        <div class="item item-carousel">
                            <div class="products">

                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                <?= Html::img($item->image , ['alt' => $item->title]) ?>
                                            </a>
                                        </div><!-- /.image -->

                                        <div class="tag sale"><span>sale</span></div>
                                    </div><!-- /.product-image -->


                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                <?= $item->title ?>
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="product-price">
				                        <span class="price">
                                            $<?= $item->price ?>
                                        </span>
                                            <span class="price-before-discount">
                                                $<?= $item->oldprice ?>
                                            </span>

                                        </div><!-- /.product-price -->

                                    </div><!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                </li>

                                                <li class="lnk wishlist">
                                                    <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>

                                                <li class="lnk">
                                                    <a class="add-to-cart" href="detail.html" title="Compare">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.action -->
                                    </div><!-- /.cart -->
                                </div><!-- /.product -->

                            </div><!-- /.products -->
                        </div><!-- /.item -->
                        <?php endforeach; ?>
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                <?php endif; ?>
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->

        <?php if(!empty($brands)) : ?>
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <?php foreach ($brands as $brand) : ?>
                    <div class="item">
                        <a href="<?= \yii\helpers\Url::to(['product/brand' , 'id' => $brand->id]) ?>" class="image">
                            <?= Html::img($brand->image , ['alt' => $brand->title , 'data-echo' => $brand->image]) ?>
                        </a>
                    </div><!--/.item-->
                    <?php endforeach; ?>
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->

        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        <?php endif; ?>
    </div><!-- /.container -->
</div><!-- /.body-content -->