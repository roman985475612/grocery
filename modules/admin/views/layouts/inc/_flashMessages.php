<?php foreach (Yii::$app->session->getAllFlashes() as $key => $message): ?>
    <div class="alert alert-<?= $key ?> alert-dismissible fade show" role="alert">
        <strong><?= ucfirst($key) ?>!</strong> <?= $message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endforeach ?>
