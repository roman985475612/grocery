<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="login-box">
  <div class="login-logo">
    <b>Grocery</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'username', [
            'template' => "<div class=\"input-group mb-3\">"
                            ."{input}"
                            ."<div class=\"input-group-append\">"
                            ."<div class=\"input-group-text\">"
                            ."<span class=\"fas fa-user\"></span>"
                            ."</div>"
                            ."</div>"
                            ."</div>",
        ])->textInput([
            'placeholder' => 'username',
        ]) ?>
        <?= $form->field($model, 'password', [
            'template' => "<div class=\"input-group mb-3\">"
                            ."{input}"
                            ."<div class=\"input-group-append\">"
                            ."<div class=\"input-group-text\">"
                            ."<span class=\"fas fa-lock\"></span>"
                            ."</div>"
                            ."</div>"
                            ."</div>",
        ])->passwordInput([
            'placeholder' => 'password'
        ]) ?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
    <?php ActiveForm::end() ?>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= Url::to(['auth/register']) ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
