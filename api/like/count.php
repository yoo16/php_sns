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

$like = new Like();
$like_count = $like->count($tweet_id);

echo json_encode(['like_count' => $like_count]);