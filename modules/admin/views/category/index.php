<?php
use yii\helpers\Url;
?>
<!-- Main content -->
<section class="content">
    <a 
        class="btn btn-success action-create"
        href="<?= Url::to(['category/create']) ?>"
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
                        <th style="width: 10%">
                            Parent
                        </th>
                        <th style="width: 10%">
                            Title
                        </th>
                        <th style="width: 15%">
                        Keywords
                        </th>
                        <th style="width: 15%">
                            Description
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->parent->title ?? '--' ?></td>
                        <td><?= $category->title ?></td>
                        <td><?= $category->keywords ?></td>
                        <td><?= $category->description ?></td>
                        <td class="project-actions text-right">
                            <a 
                                class="btn btn-primary btn-sm action-view"
                                data-id="<?= $category->id ?>" 
                                href="<?= Url::to(['category/view', 'id' => $category->id ]) ?>"
                            >
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a 
                                class="btn btn-info btn-sm action-edit"
                                data-id="<?= $category->id ?>" 
                                href="<?= Url::to(['category/edit', 'id' => $category->id ]) ?>"
                            >
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a 
                                class="btn btn-danger btn-sm action-delete" 
                                data-id="<?= $category->id ?>" 
                                href="<?= Url::to(['category/delete', 'id' => $category->id ]) ?>"
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