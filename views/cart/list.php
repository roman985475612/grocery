<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- products-breadcrumb -->
<?= $this->render('//layouts/inc/_breadcrumb', [
    'links' => [
        [
            'title' => 'Checkout',    
        ],
    ],
]) ?>

<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">

    <?= $this->render('//layouts/inc/_sidebar') ?>

    <div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	      <div class="checkout-right">
				<h4>Your shopping cart contains: <span><?= $cart->total_count() ?> Product(s)</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0 ?>
						<?php foreach($cart->cart() as $id => $item): ?>
							<tr class="rem1">
								<td class="invert"><?= ++$i ?></td>
								<td class="invert-image">
									<a href="<?= Url::to(['product/detail', 'id' => $id]) ?>">
										<?= Html::img("@web/products/{$item['img']}", [
											'alt' => $item['title'],
											'class' => 'img-thumbnail cart-img',
										]) ?>
									</a>
								</td>
								<td class="invert">
									<div class="quantity"> 
										<div class="quantity-select">                           
											<a 
												href="<?= Url::to(['cart/qty-minus', 'product_id' => $id]) ?>" 
												class="entry value-minus"
												data-id="<?= $id ?>"
											>&nbsp;</a>
											<div class="entry value"><span class="qty" id="<?= $id ?>"><?= $item['qty'] ?></span></div>
											<a 
												href="<?= Url::to(['cart/qty-plus', 'product_id' => $id]) ?>" 
												class="entry value-plus"
												data-id="<?= $id ?>"
											>&nbsp;</a>
										</div>
									</div>
								</td>
								<td class="invert"><?= $item['title'] ?></td>
								<td class="invert">$<?= $item['price'] ?></td>
								<td class="invert">
									<div class="rem">
										<a href="<?= Url::to(['cart/del-item', 'product_id' => $id]) ?>" class="close1"></a>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<?php foreach($cart->cart() as $id => $item): ?>
							<li><?= $item['title'] ?> <span class="sum" id="<?= $id ?>">$<?= $item['sum'] ?></span></li>
						<?php endforeach ?>
						<hr>
						<li class="total">Total <span class="total-sum">$<?= $cart->total_sum() ?></span></li>
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Add a new Details</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
					<section class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row form-group">
								<div class="controls">
									<label class="control-label">Full name: </label>
									<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<label class="control-label">Mobile number:</label>
											<input class="form-control" type="text" placeholder="Mobile number">
										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<label class="control-label">Landmark: </label>
											<input class="form-control" type="text" placeholder="Landmark">
										</div>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="controls">
									<label class="control-label">Town/City: </label>
									<input class="form-control" type="text" placeholder="Town/City">
								</div>
									<div class="controls">
											<label class="control-label">Address type: </label>
										<select class="form-control option-w3ls">
																			<option>Office</option>
																			<option>Home</option>
																			<option>Commercial</option>
			
																	</select>
									</div>
							</div>
							<button class="submit check_out">Delivery to this Address</button>
						</div>
					</section>
				</form>
				<div class="checkout-right-basket">
					<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
				</div>
			</div>
			
			<div class="clearfix"> </div>
			
		</div>

	</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
