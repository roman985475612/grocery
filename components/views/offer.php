<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php if (!empty($offers)): ?>
    <div class="top-brands">
        <div class="container">
            <h3>Hot Offers</h3>
            <div class="agile_top_brands_grids">
                <?php foreach ($offers as $offer): ?>
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid_pos">
                                    <?= Html::img("@web/images/offer.png", [
                                        'alt' => 'offer',
                                        'class' => 'img-responsive'
                                    ]) ?>
                                </div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <a href="<?= Url::to(['product/detail', 'id' => $offer->id]) ?>">
                                                    <?= Html::img("@web/products/{$offer->img}", ['alt' => $offer->title]) ?>
                                                </a>		
                                                <p><?= $offer->title ?></p>
                                                <h4>
                                                    $<?= $offer->price ?> 
                                                    <?php if ($offer->old_price !== '0.00'): ?>
                                                        <span>$<?= $offer->old_price ?></span>
                                                    <?php endif ?>
                                                </h4>
                                            </div>
                                            <div class="snipcart-details top_brand_home_details">
                                                <form action="checkout.html" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart" />
                                                        <input type="hidden" name="add" value="1" />
                                                        <input type="hidden" name="business" value=" " />
                                                        <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                                        <input type="hidden" name="amount" value="7.99" />
                                                        <input type="hidden" name="discount_amount" value="1.00" />
                                                        <input type="hidden" name="currency_code" value="USD" />
                                                        <input type="hidden" name="return" value=" " />
                                                        <input type="hidden" name="cancel_return" value=" " />
                                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                                    </fieldset> 
                                                </form>                                        
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="clearfix"></div>
            </div>    
        </div>
    </div>
<?php endif ?>
