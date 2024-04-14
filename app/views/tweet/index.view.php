<div class="mt-5">
    <?php include(VIEW_DIR . 'components/tweet_form.php') ?>
</div>

<? if ($tweets) : ?>
    <div class="mt-5">
        <!-- Tweetの繰り返し表示 -->
        <?php foreach ($tweets as $tweet) : ?>
            <?php include(VIEW_DIR . 'components/tweet.php') ?>
        <?php endforeach ?>
    </div>
<? endif ?>