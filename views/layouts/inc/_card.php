<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="col-md-3 top_brand_left">
    <div class="hover14 column">
        <div class="agile_top_brand_left_grid">
            <?php if ($product->is_offer): ?>
                <div class="agile_top_brand_left_grid_pos">
                    <?= Html::img("@web/images/offer.png", [
                        'alt' => 'offer',
                        'class' => 'img-responsive'
                    ]) ?>
                </div>
            <?php endif ?>
            <div class="agile_top_brand_left_grid1">
                <figure>
                    <div class="snipcart-item block" >
                        <div class="snipcart-thumb">
                            <a href="<?= Url::to(['product/detail', 'id' => $product->id]) ?>">
                                <?= Html::img("@web/products/{$product->img}", ['alt' => $product->title]) ?>
                            </a>		
                            <p><?= $product->title ?></p>
                            <h4>
                                $<?= $product->price ?> 
                                <?php if ($product->old_price !== '0.00'): ?>
                                    <span>$<?= $product->old_price ?></span>
                                <?php endif ?>
                            </h4>
                        </div>
                        <div class="snipcart-details top_brand_home_details">
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
                </figure>
            </div>
        </div>
    </div>
</div>
