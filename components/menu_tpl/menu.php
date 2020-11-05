<?php
use yii\helpers\Url;

$href = Url::to(['category/view', 'id' => $category['id']]);
?>
<?php if (isset($category['children'])): ?>
    <li class="dropdown">
        <a href="<?= $href ?>" class="dropdown-toggle" data-toggle="dropdown">
            <?= $category['title'] ?><span class="caret"></span>
        </a>
        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
            <div class="w3ls_vegetables">
                <ul>
                    <?= $this->getMenuHtml($category['children']) ?>
                </ul>
            </div>                  
        </div>	
    </li>
<?php else: ?>
    <li>
        <a href="<?= $href ?>">
            <?= $category['title'] ?>
        </a>
    </li>
<?php endif ?>
