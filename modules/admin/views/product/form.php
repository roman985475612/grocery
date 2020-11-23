<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'title'  , ['template' => '{input}'])->textInput(['placeholder' => 'Title']) ?>
    <?= $form->field($model, 'content', ['template' => '{input}'])->textarea(['placeholder' => 'Content']) ?>
    <?= $form->field($model, 'price'  , ['template' => '{input}'])->textInput(['placeholder' => 'Price']) ?>
    <div class="form-group">
        <select id="product-category_id" class="custom-select" name="Product[category_id]">
            <option value="0" >---</option>
            <?php foreach ($categories as $cat_id => $cat_title): ?>
                <option 
                    value="<?= $cat_id?>"
                    <?php if ($cat_id == $model->category_id) echo ' selected' ?>
                >
                    <?= $cat_title ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
    <?= $form->field($model, 'keywords', ['template' => '{input}'])->textInput(['placeholder' => 'Keywords']) ?>
    <?= $form->field($model, 'description', ['template' => '{input}'])->textInput(['placeholder' => 'Description']) ?>
    <?php if (!empty($model->img)): ?>
        <img class="img-thumbnail mb-2" src="<?= $model->getImage() ?>">
    <?php endif ?>
    <?= $form->field($model, 'img', ['template' => '{input}'])->fileInput(['placeholder' => 'Image']) ?>
    <?//= yii\helpers\Html::submitButton('Submit') ?>
<?php ActiveForm::end() ?>
