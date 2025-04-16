<?php
// 共通ファイル app.php を読み込み
require_once '../app.php';

// Userモデルをインポート
use App\Models\User;

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
// POSTデータ取得
$posts = sanitize($_POST);

// TODO: セッションの APP_KEY 下の regist にPOSTデータを保存
$_SESSION[APP_KEY]['regist'] = $posts;

// TODO: サニタイズ

// TODO: Userモデルでユーザ登録(insert)を実行
$auth_user = [];
// TODO: 仮のユーザIDを設定
// if ($posts['account_name'] === 'user1') {
//     $auth_user['id'] = 1; // 仮のユーザID
// } else {
//     $auth_user['id'] = null;
// }
$user = new User();
$user_id = $user->insert($posts);
$auth_user = $user->find($user_id);

if (empty($auth_user['id'])) {
    // ログイン失敗時はログイン入力画面にリダイレクト
    header('Location: input.php');
    exit;
} else {
    // TODO: 認証成功時はセッションにユーザデータを保存
    $_SESSION[APP_KEY]['auth_user'] = $auth_user;
    // TODO: トップページにリダイレクト
    header('Location: ../home/');
    exit;
}
