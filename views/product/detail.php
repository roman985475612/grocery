<?php

use app\components\OfferWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?= $this->render('//layouts/inc/_breadcrumb', [
    'links' => [
        [
            'title' => $product->category->title,
            'route' => Url::to(['product/list', 'id' => $product->category->id])
        ],
        [
            'title' => $product->title,    
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

        <div class="agileinfo_single">
            <h5><?= $product->title ?></h5>
            <div class="col-md-4 agileinfo_single_left">
                <?= Html::img($product->getImage(), [
                    'id'     => 'productImage',
                    'class'  => 'img-responsive',
                    'alt'    => $product->title,
                    'width'  => '350px',
                    'height' => 'auto'
                ]) ?>
            </div>
            <div class="col-md-8 agileinfo_single_right">
                <div class="rating1">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3" checked>
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                    </span>
                </div>
                <div class="w3agile_description">
                    <h4>Description :</h4>
                    <p><?= $product->content ?></p>
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <h4>
                            $<?= $product->price ?> 
                            <?php if ($product->old_price !== '0.00'): ?>
                                <span>$<?= $product->old_price ?></span>
                            <?php endif ?>
                        </h4>
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                        <?= Html::a(
                            'Add to cart', 
                            ['cart/add', 'product_id' => $product->id],
                            [
                                'class' => 'button add-to-cart',
                                'data-id' => $product->id
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->

<?= OfferWidget::widget() ?>
