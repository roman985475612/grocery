<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= $this->render('//layouts/inc/_breadcrumb', [
    'links' => [
        [
            'title' => $topic,    
        ],
    ],
]) ?>

<!-- banner -->
<div class="banner">

    <?= $this->render('//layouts/inc/_sidebar') ?>

		<div class="w3l_banner_nav_right">
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/13.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Utensils</h4>
					<ol>
						<li>sunt in culpa qui officia</li>
						<li>commodo consequat</li>
						<li>sed do eiusmod tempor incididunt</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/14.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Hair Care</h4>
					<ol>
						<li>enim ipsam voluptatem officia</li>
						<li>tempora incidunt ut labore et</li>
						<li>vel eum iure reprehenderit</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/15.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Grocery Store</h4>
							<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
						</div>
					</div>
					<h4>Cookies</h4>
					<ol>
						<li>dolorem eum fugiat voluptas</li>
						<li>ut aliquid ex ea commodi</li>
						<li>magnam aliquam quaerat</li>
					</ol>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid">
                <h3><?= $topic ?></h3>
				<?php if (!empty($products)): ?>
					<div class="w3ls_w3l_banner_nav_right_grid1">
					<?php $i=0; foreach ($products as $product): ?>
						<?php if($i != 0 && $i % 4 == 0): ?>
								<div class="clearfix"> </div>
							</div>
							<div class="w3ls_w3l_banner_nav_right_grid1">
						<?php endif ?>
						
						<?= $this->render('@app/views/layouts/inc/_card.php', ['product' => $product]) ?>
						
					<?php $i++; endforeach ?>
					</div>
					<div class="col-md-12">
						<?= LinkPager::widget([
							'pagination' => $pagination,
						])?>
					</div>
				<?php else: ?>
					<p class="h1 text-center">Здесь пока нет товаров :(</p>
				<?php endif ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
