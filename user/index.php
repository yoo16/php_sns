<?php
require_once '../app.php';

use App\Models\AuthUser;
use App\Models\User;
use App\Models\Tweet;

$auth_user = AuthUser::checkLogin();

// ユーザ情報再読み込み
$user = new User();
$auth_user = $user->find($auth_user['id']);

$tweet = new Tweet();
$tweets = $tweet->getByUserID($auth_user['id']);
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body>
    <div class="flex mx-auto container">
        <header class="w-1/5 p-3 border-r min-h-screen">
            <!-- TODO: components/nav.php 読み込み -->
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5">
            <?php include COMPONENT_DIR . 'user_dashboard.php' ?>
        </main>
    </div>
</body>

</html>