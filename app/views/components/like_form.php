<div class="flex">
    <!-- TODO: usersのIDと tweetsのIDを送信 -->
    <form action="tweet/like.php" method="POST">
        <input type="hidden" name="user_id" value="<?= $auth_user['id'] ?>">
        <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">

        <?php if (in_array($tweet['id'], $user_likes)) : ?>
            <button class="flex btn btn-sm">
                <img src="images/svg/heart_active.svg" class="h-4 w-4">
                <span class="ml-3 text-xs text-pink-700"><?= @$like_counts[$tweet['id']] ?></span>
            </button>
        <?php else : ?>
            <button class="flex btn btn-sm">
                <img src="images/svg/heart.svg" class="h-4 w-4">
                <span class="ml-3 text-xs text-gray-300"><?= @$like_counts[$tweet['id']] ?></span>
            </button>
        <?php endif ?>
    </form>
</div>