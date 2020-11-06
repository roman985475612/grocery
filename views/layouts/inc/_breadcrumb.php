<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
		<div class="container">
			<ul>
                <li><i class="fa fa-home" aria-hidden="true"></i>
                    <a href="<?= Url::Home() ?>">Home</a><span>|</span>
                </li>
				<li><?= Html::encode($title) ?></li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
