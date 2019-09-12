<?php
use yii\widgets\ActiveForm;
?>

<div class="breadcrumb">

</div>

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account" style="margin: 0 28%; width: 500px;">
                    <h4 class="checkout-subtitle">Login page</h4>
                    <?php
                    $form = ActiveForm::begin(['class' => 'register-form outer-top-xs'])
                    ?>
                    <div class="form-group">
                        <?= $form->field($login_model, 'email') ->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($login_model, 'password') ->passwordInput() ?>
                    </div>

                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    <?php
                    ActiveForm::end();
                    ?>


                </div>
                <!-- create a new account -->			</div><!-- /.row -->
        </div><!-- /.sigin-in-->

        <div class="breadcrumb">

        </div>
    </div>
</div>

