<div class="border-t border-gray-300 mt-4">
    <? if ($tweets) : ?>
        <?php foreach ($tweets as $value): ?>
            <div class="row">
                <?php include COMPONENT_DIR . 'tweet.php' ?>
            </div>
        <?php endforeach ?>
    <? endif ?>
</div>