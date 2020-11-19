<?php
use yii\helpers\Url;
?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= $this->context->title ?></h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 2%">
                        ID
                    </th>
                    <th style="width: 15%">
                        Customer
                    </th>
                    <th style="width: 15%">
                        Created at | updated at
                    </th>
                    <th>
                       Total | Qty
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 30%">
                        Note
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order->id ?></td>
                    <td>
                        <a><?= $order->name ?></a>
                        <br/>
                        <small><?= $order->email ?></small>
                    </td>
                    <td>
                        <span><?= $order->getCreatedAt() ?></span><br>
                        <span><?= $order->getCreatedAt() ?></span>
                    </td>
                    <td>
                        <span><?= $order->total ?></span><br>
                        <span><?= $order->qty ?></span>
                    </td>
                    <td class="project-state">
                        <?php if ($order->status): ?>
                            <span class="badge badge-success">Success</span>
                        <?php else: ?>
                            <span class="badge badge-warning">In process</span>
                        <?php endif ?>
                    </td>
                    <td><?= $order->note ?></td>
                    <td class="project-actions text-right">
                        <a 
                            class="btn btn-primary btn-sm action-view"
                            data-id="<?= $order->id ?>" 
                            href="<?= Url::to(['order/view', 'id' => $order->id ]) ?>"
                        >
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a 
                            class="btn btn-info btn-sm action-edit"
                            data-id="<?= $order->id ?>" 
                            href="<?= Url::to(['order/edit', 'id' => $order->id ]) ?>"
                        >
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a 
                            class="btn btn-danger btn-sm action-delete" 
                            data-id="<?= $order->id ?>" 
                            href="<?= Url::to(['order/delete', 'id' => $order->id ]) ?>"
                        >
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn" id="actionBtn" data-dismiss="modal"></button>
      </div>
    </div>
  </div>
</div>