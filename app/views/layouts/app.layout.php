<!DOCTYPE html>
<html lang="ja">

<?php include VIEW_DIR . 'components/head.php' ?>

<body>
    <div class="flex">
        <header class="w-1/4 pt-3 pl-5 border-r justify-end">
            <?php include(VIEW_DIR . 'components/nav.php') ?>
            <?php include(VIEW_DIR . 'components/tweet_user.php') ?>
        </header>

        <main class="w-2/4 pt-3">
            <?php include $view_path ?>
        </main>
        
        <div class="w-1/4">

        </div>
    </div>
</body>

</html>