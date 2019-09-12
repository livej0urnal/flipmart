<?php
    use yii\helpers\Html;
?>
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">
                            <?= \app\components\TopMenuWidget::widget(['tpl' => 'sidebar']); ?>
                        </ul>
                    </nav>
                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->


                <?php if(!empty($deals)) : ?>
                <!-- ============================================== HOT DEALS ============================================== -->
                <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                    <h3 class="section-title">hot deals</h3>
                    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                        <?php foreach ($deals as $deal) : ?>
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
                    </div>
                    <!-- /.sidebar-widget -->
                </div>
                <!-- ============================================== HOT DEALS: END ============================================== -->
                <?php endif; ?>

                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->
                <?php if(!empty($special)) : ?>
                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Special Deals</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    <?php foreach ($special as $item) : ?>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                                <?= Html::img($item->image, ['alt' => $item->title]) ?>
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->

                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                                <?= $item->title ?>
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">
                                                            <span class="price">
                                                                $<?= $item->price ?>
                                                            </span>
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->

                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <?php endif; ?>
                <?php if(!empty($banners['0'])) : ?>
                <div class="home-banner">
                    <?= Html::img($banners['0']['image']) ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <?php if(!empty($sliders)) : ?>
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        <?php foreach ($sliders as $slider) : ?>
                        <div class="item" style="background-image: url(<?= $slider->img ?>);">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="slider-header fadeInDown-1">
                                        <?= $slider->toptitle ?>
                                        Top Brands
                                    </div>
                                    <div class="big-text fadeInDown-1">
                                        <?= $slider->title ?>
                                    </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs">
                                        <span>
                                            <?= $slider->description ?>
                                        </span>
                                    </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="<?= $slider->link ?>" class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                                            <?= $slider->linktitle ?>
                                        </a>
                                    </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        <?php endforeach; ?>

                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <?php endif; ?>

                <!-- ========================================= SECTION – HERO : END ========================================= -->
                <?php if(!empty($advantages )) : ?>
                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <?php foreach ($advantages as $item) : ?>
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">
                                                <?= $item->title ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <h6 class="text">
                                        <?= $item->descr ?>
                                    </h6>
                                </div>
                            </div>
                            <!-- .col -->
                            <?php endforeach; ?>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <?php endif; ?>
                <?php if(!empty($new)) : ?>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
                            <?php if(!empty($clothing)) : ?>
                            <li><a data-transition-type="backSlide" href="#clothing" data-toggle="tab">Clothing</a></li>
                            <?php endif; ?>
                            <?php if(!empty($watches)) : ?>
                            <li><a data-transition-type="backSlide" href="#watches" data-toggle="tab">Electronics</a></li>
                            <?php endif; ?>
                            <?php if(!empty($shoes)) : ?>
                            <li><a data-transition-type="backSlide" href="#shoes" data-toggle="tab">Shoes</a></li>
                            <?php endif; ?>
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    <?php foreach ($new as $item) : ?>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                            <?= \yii\helpers\Html::img($item->image , ['alt' => $item->title]) ?>
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    <?php if ($item->sale == 1) : ?>
                                                        <div class="tag sale"><span>sale</span></div>
                                                    <?php elseif ($item->hot == 1) : ?>
                                                        <div class="tag hot"><span>hot</span></div>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /.product-image -->

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
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">
                                                                    Add to cart
                                                                </button>
                                                            </li>
                                                            <li class="lnk wishlist">
                                                                <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="lnk">
                                                                <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        <?php if(!empty($clothing)) : ?>
                        <div class="tab-pane" id="clothing">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php foreach ($clothing as $item ) : ?>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                            <?= \yii\helpers\Html::img($item->image , ['alt' => $item->id]) ?>
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->
                                                    <?php if ($item->sale == 1) : ?>
                                                    <div class="tag sale"><span>sale</span></div>
                                                    <?php elseif ($item->hot == 1) : ?>
                                                    <div class="tag hot"><span>hot</span></div>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /.product-image -->

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
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                            </li>
                                                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        <?php endif; ?>

                        <?php if(!empty($watches)) : ?>
                        <div class="tab-pane" id="watches">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php foreach ($watches as $item ) : ?>
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                                <?= \yii\helpers\Html::img($item->image , ['alt' => $item->id]) ?>
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->
                                                        <?php if ($item->sale == 1) : ?>
                                                            <div class="tag sale"><span>sale</span></div>
                                                        <?php elseif ($item->hot == 1) : ?>
                                                            <div class="tag hot"><span>hot</span></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- /.product-image -->

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
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                </li>
                                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        <?php endif; ?>

                        <?php if(!empty($shoes) ) : ?>
                        <div class="tab-pane" id="shoes">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php foreach ($shoes as $item ) : ?>
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                                <?= \yii\helpers\Html::img($item->image , ['alt' => $item->id]) ?>
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->
                                                        <?php if ($item->sale == 1) : ?>
                                                            <div class="tag sale"><span>sale</span></div>
                                                        <?php elseif ($item->hot == 1) : ?>
                                                            <div class="tag hot"><span>hot</span></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- /.product-image -->

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
                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                </li>
                                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        <?php endif; ?>

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <?php endif; ?>
                <?php if(!empty($banners['1'] && $banners['2'])) : ?>
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <?= Html::img($banners['1']['image'] , ['class' => 'img-responsive']) ?>
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <?= Html::img($banners['2']['image'] , ['class' => 'img-responsive']) ?>
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <?php endif; ?>

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <?php if(!empty($best)) : ?>
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Featured products</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        <?php foreach ($best as $item) : ?>
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $item->id]) ?>">
                                                <?= \yii\helpers\Html::img($item->image , ['alt' => $item->id]) ?>
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        <?php if ($item->sale == 1) : ?>
                                            <div class="tag sale"><span>sale</span></div>
                                        <?php elseif ($item->hot == 1) : ?>
                                            <div class="tag hot"><span>hot</span></div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- /.product-image -->

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
                                        </div>
                                        <!-- /.product-price -->

                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                </li>
                                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        <?php endforeach; ?>
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <?php endif; ?>
                <?php if(!empty($banners['3'])) : ?>
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image">
                                    <?= Html::img($banners['3']['image'] , ['class' => 'img-responsive'] ) ?>
                                </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">
                                            <?= $banners['3']['h2'] ?>
                                            <br>
                                            <span class="shopping-needs">
                                                 <?= $banners['3']['need'] ?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text"> <?= $banners['3']['text'] ?></div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <?php endif; ?>
                <?php if(!empty($posts)) : ?>
                <!-- ============================================== BLOG SLIDER ============================================== -->
                <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                    <h3 class="section-title">latest form blog</h3>
                    <div class="blog-slider-container outer-top-xs">
                        <div class="owl-carousel blog-slider custom-carousel">
                            <?php foreach ($posts as $post) : ?>
                            <div class="item">
                                <div class="blog-post">
                                    <div class="blog-post-image">
                                        <div class="image">
                                            <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $post->id]) ?>">
                                                <?= \yii\helpers\Html::img($post->image, ['alt' => $post->title]) ?>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.blog-post-image -->

                                    <div class="blog-post-info text-left">
                                        <h3 class="name">
                                            <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $post->id]) ?>">
                                                <?= $post->title ?>
                                            </a>
                                        </h3>
                                        <span class="info">
                                              <?php
                                              $data = $post->published;
                                              $data = Yii::$app->formatter->asDate($post->published , 'long')
                                              ?>
                                              <?= $data ; ?>
                                        </span>
                                        <a href="<?= \yii\helpers\Url::to(['blog/single' , 'id' => $post->id]) ?>" class="lnk btn btn-primary">Read more</a> </div>
                                    <!-- /.blog-post-info -->

                                </div>
                                <!-- /.blog-post -->
                            </div>
                            <!-- /.item -->
                            <?php endforeach; ?>

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- /.blog-slider-container -->
                </section>
                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->
                <?php endif; ?>

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <?php if(!empty($brands)) : ?>
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <?php foreach ($brands as $brand) : ?>

                    <div class="item">
                        <a href="<?= \yii\helpers\Url::to(['product/brand' , 'id' => $brand->id]) ?>" class="image">
                            <?= \yii\helpers\Html::img($brand->image , ['alt' => $brand->title , 'data-echo' => $brand->image]) ?>
                        </a>
                    </div>
                    <!--/.item-->
                    <?php endforeach; ?>
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        <?php endif; ?>
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->