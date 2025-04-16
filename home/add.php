<?php
// 共通ファイル app.php を読み込み

use App\Models\Tweet;

require_once('../app.php');

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// TODO: ログインユーザチェック
$auth_user = $_SESSION[APP_KEY]['auth_user'] ?? null;
// TODO: ユーザがいなかったらログイン画面にリダイレクト
if (empty($auth_user['id'])) {
    header('Location: ../login/');
    exit;
}

// TODO: POSTデータを取得
$posts = sanitize($_POST);

// TODO: 投稿処理
$tweet = new Tweet();
$tweet_id = $tweet->insert($auth_user['id'], $posts);

// トップにリダイレクト
header('Location: ./');
exit;