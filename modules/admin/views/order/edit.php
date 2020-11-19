<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($order, 'note', [
        'template' => "<div class=\"input-group mb-3\">"
                        ."{input}"
                        ."<div class=\"input-group-append\">"
                        ."<div class=\"input-group-text\">"
                        ."<span class=\"fas fa-user\"></span>"
                        ."</div>"
                        ."</div>"
                        ."</div>",
    ])->textInput([
        'placeholder' => 'Note',
    ]) ?>
    <?= $form->field($order, 'address', [
        'template' => "<div class=\"input-group mb-3\">"
                        ."{input}"
                        ."<div class=\"input-group-append\">"
                        ."<div class=\"input-group-text\">"
                        ."<span class=\"fas fa-user\"></span>"
                        ."</div>"
                        ."</div>"
                        ."</div>",
    ])->textInput([
        'placeholder' => 'Address',
    ]) ?>
<?php ActiveForm::end() ?>
