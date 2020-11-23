<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>

<div class="input-group mb-3">
    <div class="custom-control custom-radio custom-control-inline">
        <input 
            type="radio" 
            id="customRadioInline1" 
            name="Order[status]" 
            class="custom-control-input" 
            value="0"
            <?php if ($order->status == "0") echo ' checked' ?>
        >
        <label class="custom-control-label" for="customRadioInline1">in process</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadioInline2" name="Order[status]" class="custom-control-input" value="1" <?php if ($order->status == "1") echo ' checked' ?>
>
        <label class="custom-control-label" for="customRadioInline2">success</label>
    </div>
</div>
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
