<?php
require_once '../app.php';

use App\Models\AuthUser;
use App\Models\User;
use App\Models\Tweet;

$auth_user = AuthUser::checkLogin();

$user_id = $_GET['id'] ?? $auth_user['id'];

// ユーザ情報再読み込み
$user = new User();
$user_data = $user->find($user_id);
if (!$user_data) {
    header('Location: ../home/');
    exit;
}

// ツイート情報取得
$tweet = new Tweet();
$tweets = $tweet->getByUserID($user_data['id']);

$tweet_count = count($tweets);
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body>
    <div class="flex mx-auto container">
        <header class="w-1/5 p-3 border-r min-h-screen">
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5">
            <?php include COMPONENT_DIR . 'dashboard.php' ?>

            <div class="border-t border-gray-300 mt-4">
                <? if ($tweets) : ?>
                    <?php foreach ($tweets as $value): ?>
                        <div class="row">
                            <?php include COMPONENT_DIR . 'tweet.php' ?>
                        </div>
                    <?php endforeach ?>
                <? endif ?>
            </div>
        </main>
    </div>
</body>

</html>