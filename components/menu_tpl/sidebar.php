
        <li class="dropdown menu-item">
            <a href="<?= \yii\helpers\Url::to(['product/category' , 'id' => $category['id']]) ?>" <?php if(isset($category['childs'])) : ?> class="dropdown-toggle" data-toggle="dropdown" <?php endif; ?>>
                <i class="<?= $category['icon'] ?>" aria-hidden="true"></i>
                <?= $category['title'] ?>
            </a>
            <?php if(isset($category['childs'])) : ?>
            <ul class="dropdown-menu mega-menu">
                <li class="yamm-content">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <ul class="links list-unstyled">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['product/category' , 'id' => $category['id']]) ?>">
                                        <?= $this->getMenuHtml($category['childs']) ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-banner-holder col-sm-8"> <a href="#"><img alt="" src="/assets/images/sliders/02.jpg" /></a> </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- /.yamm-content -->
            </ul>
            <?php endif; ?>
            <!-- /.dropdown-menu -->
        </li>
