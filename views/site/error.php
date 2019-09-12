<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="body-content outer-top-bd" style="min-height: 550px;">
    <div class="container">
        <div class="x-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 x-text text-center">
                    <h1 style="font-size: 34px;"><?= Html::encode($this->title) ?></h1>
                    <br>
                    <p> <?= nl2br(Html::encode($message)) ?> </p>
                    <div class="clearfix"></div>
                    <a href="<?= \yii\helpers\Url::home() ?>"><i class="fa fa-home"></i>Homepage</a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
