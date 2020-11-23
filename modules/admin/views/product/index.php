<?php
use yii\helpers\Url;
?>
<!-- Main content -->
<section class="content">
    <a 
        class="btn btn-success action-create"
        href="<?= Url::to(['product/create']) ?>"
    >
        <i class="fas fa-plus-circle">
        </i>
        New
    </a><br><br>

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
                        <th style="width: 5%">
                            img
                        </th>
                        <th style="width: 10%">
                            Category
                        </th>
                        <th style="width: 20%">
                            Title
                        </th>
                        <th style="width: 15%">
                            Price
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model as $product): ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><img class="img-thumbnail" style="height: 50px" src="<?= $product->getImage() ?>"></td>
                        <td><?= $product->category->title ?></td>
                        <td><?= $product->title ?></td>
                        <td><?= $product->price ?></td>
                        <td class="project-actions text-right">
                            <a 
                                class="btn btn-primary btn-sm action-view"
                                data-id="<?= $product->id ?>" 
                                href="<?= Url::to(['product/view', 'id' => $product->id ]) ?>"
                            >
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a 
                                class="btn btn-info btn-sm action-edit"
                                data-id="<?= $product->id ?>" 
                                href="<?= Url::to(['product/edit', 'id' => $product->id ]) ?>"
                            >
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a 
                                class="btn btn-danger btn-sm action-delete" 
                                data-id="<?= $product->id ?>" 
                                href="<?= Url::to(['product/delete', 'id' => $product->id ]) ?>"
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