
<li class="dropdown hidden-sm">
    <a href="<?= \yii\helpers\Url::to(['product/category' , 'id' => $category['id']]) ?>">
        <?= $category['title'] ?>
        <?php if($category['label'] == 'hot') : ?>
            <span class="menu-label hot-menu hidden-xs">hot</span>
        <?php elseif($category['label'] == 'new') : ?>
            <span class="menu-label new-menu hidden-xs">new</span>
        <?php endif; ?>
    </a>
</li>