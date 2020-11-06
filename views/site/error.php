<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="banner">

    <?= $this->render('//layouts/inc/_sidebar') ?>

    <div class="w3l_banner_nav_right container">
        <h2><?= Html::encode($this->title) ?></h2>
        <br>
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>

    <div class="clearfix"></div>

</div>
