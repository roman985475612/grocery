<?php
use yii\helpers\Html;
?>
<?php if (!empty($cart->cart())): ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th>Убрать</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5">Итого:</td>
                    <td id="cart-qty"><?= $cart->total_qty() ?></td>
                </tr>
                <tr>
                    <td colspan="5">На сумму:</td>
                    <td id="cart-sum"><?= $cart->total_sum() ?></td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($cart->cart() as $id => $item): ?>
                    <tr>
                        <td>
                            <?= Html::img("@web/products/{$item['img']}", [
                            'alt' => $item['title'],
                            'class' => 'img-thumbnail cart-img',
                            ]) ?>
                        </td>
                        <td><?= $item['title'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['sum'] ?></td>
                        <td>
                            <?= Html::tag('span', null, [
                            'data-id' => $id,
                            'class' => 'glyphicon glyphicon-remove text-danger del-item',
                            'data-hidden' => 'true'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif ?>
