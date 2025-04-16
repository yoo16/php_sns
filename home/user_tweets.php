<?php
require_once '../app.php';

use App\Models\AuthUser;
use App\Models\Tweet;
use App\Models\User;

// ユーザセッションの確認し、ログインしていない場合はログイン画面にリダイレクト
$auth_user = AuthUser::checkLogin();

// ユーザIDを取得
$user_id = $_GET['id'] ?? null;

$user = new User();
$user_data = $user->find($user_id);
if (!$user_data) {
    // ユーザいない場合はホームにリダイレクト
    header('Location: home/');
    exit;
}
$tweet = new Tweet();
$tweets = $tweet->getByUserID($user_data['id']);
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
            <?php include COMPONENT_DIR . 'user_dashboard.php' ?>
        </main>
    </div>
</body>

</html>