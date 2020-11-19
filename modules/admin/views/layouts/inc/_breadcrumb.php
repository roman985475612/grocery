<?php
use yii\helpers\Html;
?>
<ul class="breadcrumb float-sm-right">
	<?php if (!empty($this->context->breadcrumbs)): ?>
		<?php foreach($this->context->breadcrumbs as $url => $title): ?>
			<?php if(empty($url)): ?>
				<li class="breadcrumb-item active"><?= Html::encode($title) ?></li>
			<?php else: ?>
				<li class="breadcrumb-item">
					<a class="breadcrumb-link" href="<?= $url ?>">
						<?= Html::encode($title) ?>
					</a>
				</li>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
</ul>
