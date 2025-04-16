<?php

namespace App\Models;

use PDO;
use PDOException;
use Database;
use File;

class Tweet
{
    /**
     * コンストラクタ
     *
     * インスタンス生成時にプロパティ等の初期化が必要であれば行います。
     */
    public function __construct()
    {
        // 必要に応じた初期化処理を実装
    }

    /**
     * 投稿データを全件取得
     *
     * @return array|null 投稿データの連想配列、もしくは該当する投稿がなければ null
     */
    public function get($limit = 50)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // 投稿データ取得SQL文
            // users テーブルと結合してユーザ名を取得
            // created_at を降順に並べ替え、 LIMITで件数制限
            $sql = "SELECT 
                    tweets.id,
                    tweets.message,
                    tweets.user_id,
                    tweets.image_path,
                    tweets.created_at,
                    tweets.updated_at,
                    users.account_name, 
                    users.display_name,
                    COUNT(likes.id) AS like_count 
                FROM tweets 
                JOIN users ON tweets.user_id = users.id
                LEFT JOIN likes ON tweets.id = likes.tweet_id
                GROUP BY 
                    tweets.id,
                    tweets.message,
                    tweets.user_id,
                    tweets.image_path,
                    tweets.created_at,
                    tweets.updated_at,
                    users.account_name, 
                    users.display_name
                ORDER BY tweets.created_at DESC 
                LIMIT :limit;";

            // SQL事前準備
            $stmt = $pdo->prepare($sql);
            // SQL実行
            $stmt->execute(['limit' => $limit]);
            // 投稿データ取得
            $tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // 投稿データを連想配列として返す
            return $tweets;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo ($e->getMessage());
            return null;
        }
    }

    /**
     * 投稿データを取得
     *
     * @param int $id ユーザID
     * @return array|null ユーザデータの連想配列、もしくは該当するユーザがなければ null
     */
    public function find(int $id)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // SQL作成
            $sql = "SELECT * FROM tweets WHERE id = :id";
            // SQL事前準備
            $stmt = $pdo->prepare($sql);
            // プレースホルダー（:id）の値をバインドしてSQL実行
            $stmt->execute(['id' => $id]);
            // ユーザデータ取得
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // ユーザデータを連想配列として返す
            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * ユーザデータをDBに登録する
     *
     * @param int $user_id ユーザID
     * @param array $data 登録する投稿データ
     * @return mixed 登録成功時は投稿ID、失敗時は null
     */
    public function insert($user_id, $data)
    {
        try {
            $data['user_id'] = $user_id;
            $data['image_path'] = $this->uploadImage();
            // DB接続
            $pdo = Database::getInstance();
            // INSERT用SQL（テーブル名やカラム名は適宜変更）
            $sql = "INSERT INTO tweets (user_id, message, image_path) 
                    VALUES (:user_id, :message, :image_path)";
            // プリペアードステートメントの生成
            $stmt = $pdo->prepare($sql);
            // SQL実行（データ配列のキーとプレースホルダーは一致させる）
            $result = $stmt->execute($data);
            if ($result) {
                // 登録成功時は新規登録ユーザのIDを取得して返す
                return $pdo->lastInsertId();
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return;
    }

    /**
     * 投稿データを削除
     *
     * @param int $tweet_id 投稿ID
     * @return mixed 
     */
    public function delete($id)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // INSERT用SQL（テーブル名やカラム名は適宜変更）
            $sql = "DELETE FROM tweets WHERE id = :id";
            // プリペアードステートメントの生成
            $stmt = $pdo->prepare($sql);
            // SQL実行
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return;
    }

    /**
     * アップロード画像を取得
     *
     * @param int $id 投稿ID
     * @return bool 成功した場合は画像ファイルパス、失敗した場合は null
     */
    public function  uploadImage()
    {
        return File::upload('images/uploads/', 'file');
    }
}
