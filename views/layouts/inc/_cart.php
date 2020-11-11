<?php
use yii\helpers\Url;
?>

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cart</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?= Url::to(['cart/view']) ?>" class="btn btn-success">Order</a>
        <button type="button" class="btn btn-danger">Clear cart</button>
      </div>
    </div>
  </div>
</div>