<nav class="mt-3 mb-3">
    <ul class="flex justify-start space-x-6">
        <li>
            <div data-tweet-id="<?= $value['id'] ?>" data-user-id="<?= $auth_user['id'] ?>" class="replay-count inline-flex items-center space-x-2">
                <img src="svg/bubble.svg" class="w-4" alt="コメント">
                <span class="text-gray-600 text-xs">0</span>
            </div>
        </li>
        <li class="flex">
            <form action="home/like.php" method="post" class="inline-flex items-center space-x-2">
                <div onclick="updateLike(this)" class="inline-flex items-center space-x-2">
                    <img src="svg/heart.svg" class="w-4" alt="削除">
                    <span class="text-gray-600 text-xs"><?= $value['like_count'] ?></span>
                </div>
                <input type="hidden" name="tweet_id" value="<?= $value['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $auth_user['id'] ?>">
            </form>
        </li>
        <li>
            <div data-tweet-id="<?= $value['id'] ?>" data-user-id="<?= $auth_user['id'] ?>" class="retweet-count inline-flex items-center space-x-2">
                <img src="svg/loop.svg" class="w-4" alt="リツイート">
                <span class="text-gray-600 text-xs">0</span>
            </div>
        </li>
        <?php if ($auth_user['id'] == $value['id']): ?>
            <li>
                <form action="home/delete.php" method="post" class="inline-flex items-center space-x-2">
                    <div onclick="deleteTweet(this)" class="inline-flex items-center space-x-2">
                        <img src="svg/trash.svg" class="w-4" alt="削除">
                    </div>
                    <input type="hidden" name="tweet_id" value="<?= $value['id'] ?>">
                    <input type="hidden" name="user_id" value="<?= $auth_user['id'] ?>">
                </form>
            </li>
        <?php endif ?>
    </ul>
</nav>

<script>
    function updateLike(target) {
        target.closest('form').submit()
    }

    function deleteTweet(target) {
        if (!confirm('削除しますか？')) {
            return;
        }
        target.closest('form').submit()
    }
</script>