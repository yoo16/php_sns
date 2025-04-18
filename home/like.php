<?php
require_once '../app.php';

use App\Models\Like;

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// ログインユーザチェック
$auth_user = $_SESSION[APP_KEY]['auth_user'] ?? null;
// ユーザがいなかったらログイン画面にリダイレクト
if (empty($auth_user['id'])) {
    header('Location: ../login/');
    exit;
}

$tweet_id = $_POST['tweet_id'] ?? null;
$user_id = $_POST['user_id'] ?? null;

if ($tweet_id && $user_id) {
    // tweet_id と user_id があれば、いいねの更新
    $like = new Like();
    $like->update($tweet_id, $user_id);
}

// 前の画面にリダイレクト
$referer = $_SERVER['HTTP_REFERER'] ?? '/';
header('Location: ' . htmlspecialchars($referer, ENT_QUOTES, 'UTF-8'));
