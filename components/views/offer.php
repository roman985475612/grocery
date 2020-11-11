<?php if (!empty($offers)): ?>
    <div class="top-brands">
        <div class="container">
            <h3>Hot Offers</h3>
            <div class="agile_top_brands_grids">
                <?php foreach ($offers as $offer): ?>
                    <?= $this->render('@app/views/layouts/inc/_card.php', ['product' => $offer]) ?>
                <?php endforeach ?>
                <div class="clearfix"></div>
            </div>    
        </div>
    </div>
<?php endif ?>
