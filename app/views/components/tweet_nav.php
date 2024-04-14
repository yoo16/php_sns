<nav class="flex justify-between py-2">
    <div class="mr-5">
        <a href="#"><img src="images/svg/bubble.svg" class="h-4 w-4" alt=""></a>
    </div>
    <div class="mr-5">
        <a href="#"><img src="images/svg/loop.svg" class="h-4 w-4" alt=""></a>
    </div>

    <div class="mr-5">
        <?php include VIEW_DIR . 'components/like_form.php' ?>
    </div>

    <div class="mr-5">
        <?php if ($auth_user['id'] == $tweet['user_id']) : ?>
            <?php include VIEW_DIR . 'components/delete_form.php' ?>
        <?php endif ?>
    </div>
</nav>