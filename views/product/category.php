<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
?>
<div class="breadcrumb">

</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
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
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                        <!-- ============================================== PRICE SILDER============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Slider</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="" >
                                </div>
                                <!-- /.price-range-holder -->
                                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== PRICE SILDER : END ============================================== -->
                        <!-- ============================================== MANUFACTURES============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Manufactures</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Forever 18</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li><a href="#">Dolce & Gabbana</a></li>
                                    <li><a href="#">Alluare</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Other Brand</a></li>
                                </ul>
                                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== MANUFACTURES: END ============================================== -->
                        <!-- ============================================== COLOR============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Colors</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Yellow</a></li>
                                    <li><a href="#">Pink</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Teal</a></li>
                                </ul>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COLOR: END ============================================== -->

                        <!-- ============================================== COMPARE: END ============================================== -->
                        <?php if(!empty($banners)) : ?>
                        <div class="home-banner">
                            <?= Html::img($banners['0']['image']) ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <!-- ========================================== SECTION – HERO ========================================= -->

                <?php if(!empty($products)) : ?>
                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image">
                            <?= Html::img($category->banner , ['alt' => $category->title , 'class' => 'img-responsive']) ?>
                        </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text">
                                    <?= $category->bannerh ?>
                                </div>
                                <div class="excerpt hidden-sm hidden-md">
                                    <?= $category->bannerp ?>
                                </div>
                                <div class="excerpt-normal hidden-sm hidden-md">
                                    <?= $category->bannertext ?>
                                </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>


                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-12 col-md-6">

                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-6 col-md-4 text-right">
                            <div class="pagination-container">
                                <?php echo LinkPager::widget([
                                    'pagination' => $pages,
                                    'options' => ['class' => 'list-inline list-unstyled'],
                                ]); ?>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container --> </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">

                            <div class="category-product">
                                <div class="row">
                                    <?php foreach ($products as $product) : ?>
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $product->id]) ?>">
                                                            <?= Html::img($product->image, ['alt' => $product->title]) ?>
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    <?php if ($product->sale == 1) : ?>
                                                        <div class="tag sale"><span>sale</span></div>
                                                    <?php elseif ($product->hot == 1) : ?>
                                                        <div class="tag hot"><span>hot</span></div>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $product->id]) ?>">
                                                            <?= $product->title ?>
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                            $<?= $product->price ?>
                                                        </span>
                                                        <span class="price-before-discount">
                                                            $<?= $product->oldprice ?>
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
                                                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->


                        </div>
                        <!-- /.tab-pane -->
                        <?php if(!empty($products )) : ?>
                        <div class="tab-pane "  id="list-container">
                            <div class="category-product">
                                <?php foreach ($products as $product) : ?>
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <?= Html::img($product->image, ['alt' => $product->title]) ?>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="<?= \yii\helpers\Url::to(['product/index' , 'id' => $product->id]) ?>">
                                                                <?= $product->title ?>
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">
                                                            <span class="price">
                                                                $<?= $product->price ?>
                                                            </span>
                                                            <span class="price-before-discount">
                                                                $<?= $product->oldprice ?>
                                                            </span>
                                                        </div>
                                                        <!-- /.product-price -->
                                                        <div class="description m-t-10">
                                                            <?= $product->short ?>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-list-row -->
                                            <?php if ($product->sale == 1) : ?>
                                                <div class="tag sale"><span>sale</span></div>
                                            <?php elseif ($product->hot == 1) : ?>
                                                <div class="tag hot"><span>hot</span></div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.product-list -->
                                    </div>
                                    <!-- /.products -->
                                </div>
                                <!-- /.category-product-inner -->
                                <?php endforeach; ?>

                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                        <?php endif; ?>
                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <?php echo LinkPager::widget([
                                    'pagination' => $pages,
                                    'options' => ['class' => 'list-inline list-unstyled'],
                                ]); ?>
                            </div>
                            <!-- /.pagination-container --> </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->
                <?php else : ?>
                    <h4 style="text-align: center;">No products</h4>
                <?php endif; ?>
            </div>
            <!-- /.col -->
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
                            <?= Html::img($brand->image, ['data-echo' => $brand->image]) ?>
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
<!-- /.body-content -->