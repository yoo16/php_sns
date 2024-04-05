<div class="flex">
    <!-- TODO: usersのIDと tweetsのIDを送信 -->
    <form action="tweet/delete.php" method="post">
        <input type="hidden" name="tweet_id" value="<?= $tweet['id'] ?>">
        <button onclick="return confirm('削除しますか？')">
            <img src="images/svg/trash.svg" class="h-4 w-4" alt="">
        </button>
    </form>
</div>