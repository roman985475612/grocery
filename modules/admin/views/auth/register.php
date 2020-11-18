<?php
use yii\widgets\ActiveForm;
?>
<div class="login-box">
  <div class="login-logo">
    <b>Grocery</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register a new membership</p>

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
          <div class="col-4 offset-8">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      <?php ActiveForm::end() ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
