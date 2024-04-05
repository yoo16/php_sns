<div class="flex p-3 border-t">
    <!-- profile image -->
    <div class="min-w-max">
        <img src="images/me.png" class="rounded-full h-10 w-10">
    </div>
    <!-- tweet body -->
    <div class="w-full ml-5">
        <div class="tweet-user">
            <span class="font-bold text-gray-800"><?= @$tweet['name'] ?></span>
            <span class="text-gray-500">@<?= @$tweet['account_name'] ?></span>
            <span class="ml-2 text-gray-500">&nbsp;<?= date('Y/m/d', strtotime($tweet['created_at'])) ?></span>
        </div>

        <div class="mt-1 mb-5">
            <?= nl2br($tweet['message']) ?>
        </div>

        <!-- tweet nav -->
        <?php include(VIEW_DIR . 'components/tweet_nav.php') ?>
    </div>
</div>