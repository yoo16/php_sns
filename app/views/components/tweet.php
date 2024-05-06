<div class="flex p-3 border-t">
    <!-- profile image -->
    <div class="min-w-max">
        <img src="<?= User::profileImageURLById($tweet['user_id']) ?>" class="rounded-full h-10 w-10">
    </div>
    <!-- tweet body -->
    <div class="w-full ml-5">
        <div class="flex">
            <span class="font-bold text-gray-800"><?= $tweet['name'] ?></span>
            <span class="ml-2 text-gray-500">@<?= $tweet['account_name'] ?></span>
            <span class="ml-2 text-gray-500">&nbsp;<?= date('Y/m/d', strtotime($tweet['created_at'])) ?></span>
            <?php include VIEW_DIR . 'components/delete_form.php' ?>
        </div>

        <div class="mt-1 mb-5">
            <?= nl2br($tweet['message']) ?>
        </div>

        <!-- tweet nav -->
        <?php include(VIEW_DIR . 'components/tweet_nav.php') ?>
    </div>
</div>