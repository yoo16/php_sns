<?php
require_once '../../app.php';

use App\Models\Like;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// PHPストリームでJSON取得
$json = file_get_contents('php://input');
// JSONをデコード
$data = json_decode($json, true);
$tweet_id = $data['tweet_id'] ?? null;
$user_id = $data['user_id'] ?? null;

if (!$tweet_id) {
    echo json_encode(['error' => 'tweet_id is required']);
    exit;
}
if (!$user_id) {
    echo json_encode(['error' => 'user_id is required']);
    exit;
}

$like = new Like();
$result = $like->update($tweet_id, $user_id);

// いいねの数を取得
$like = new Like();
$like_count = $like->count($tweet_id);

// JSONレスポンスを返す
$response = [
    'status' => 'success',
    'message' => 'Like updated successfully',
    'like_count' => $like_count,
];
echo json_encode($response);
exit;