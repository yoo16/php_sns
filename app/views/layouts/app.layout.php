<!DOCTYPE html>
<html lang="jp">

<?php include VIEW_DIR . 'components/head.php' ?>

<body>
    <div class="flex">
        <header class="w-1/5 p-3 border-r min-h-screen">
            <?php include(VIEW_DIR . 'components/nav.php') ?>
            <?php include(VIEW_DIR . 'components/tweet_user.php') ?>
        </header>

        <main class="w-3/5 pt-3">
            <?php include $view_path ?>
        </main>
    </div>
</body>

</html>