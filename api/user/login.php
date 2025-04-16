<?php
require_once '../../app.php';

use App\Models\User;

// JSON形式のレスポンスを返すためのヘッダーを設定
header('Content-Type: application/json');

// リクエストボディ（JSON）を取得しデコード
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// ユーザー名とパスワードの取得
$account_name = $data['account_name'] ?? '';
$password = $data['password'] ?? '';

// ※ 以下はサンプル用の認証処理です。
// 実際の運用時には、データベースとの照合など適切な処理を実装してください。
$user = new User();
if ($auth_user = $user->auth($account_name, $password)) {
    // 認証成功
    // セッションにユーザー情報を格納
    $_SESSION[APP_KEY]['auth_user'] = $auth_user;

    // レスポンスとして成功メッセージとセッションIDを返す
    echo json_encode([
        'status' => 'success',
        'message' => 'Login successful',
        'session_id' => session_id()
    ]);
} else {
    // 認証失敗の場合はエラーレスポンス
    http_response_code(401);
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid credentials'
    ]);
}
