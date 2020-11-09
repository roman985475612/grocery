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
				<?php foreach($links as $link): ?>
					<?php if(!empty($link['route'])): ?>
					<li>
						<a href="<?= $link['route'] ?>">
							<?= Html::encode($link['title']) ?>
						</a>
						<span>|</span>
					</li>
					<?php else: ?>
						<li><?= Html::encode($link['title']) ?></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
