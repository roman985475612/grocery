<?php
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'title', ['template' => '{input}'])->textInput(['placeholder' => 'Title']) ?>
    <div class="form-group">
        <select id="category-parent_id" class="custom-select" name="Category[parent_id]">
            <option value="0" >---</option>
            <?= \app\components\MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
        </select>
    </div>
    <?= $form->field($model, 'keywords', ['template' => '{input}'])->textInput(['placeholder' => 'Keywords']) ?>
    <?= $form->field($model, 'description', ['template' => '{input}'])->textInput(['placeholder' => 'Description']) ?>
<?php ActiveForm::end() ?>
