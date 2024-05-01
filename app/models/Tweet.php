<?php
class Tweet extends Model
{
    use TweetValidate;
    public string $table = "tweets";

    public function get($limit = 20)
    {
        $sql = "SELECT 
                    tweets.id,
                    tweets.user_id,
                    tweets.message,
                    tweets.created_at,
                    users.account_name,
                    users.name
                FROM tweets 
                INNER JOIN users ON tweets.user_id = users.id
                ORDER BY tweets.created_at DESC 
                LIMIT :limit;";

        $params = ['limit' => $limit];
        $this->values = $this->fetchAllBySQL($sql, $params);
        return $this->values;
    }

    public function getByUserID($user_id, $limit = 20)
    {
        $sql = "SELECT 
                    tweets.id,
                    tweets.user_id,
                    tweets.message,
                    tweets.created_at,
                    users.account_name,
                    users.name
                FROM tweets 
                INNER JOIN users ON tweets.user_id = users.id
                WHERE user_id = :user_id
                ORDER BY tweets.created_at DESC 
                LIMIT :limit;";

        $params = ['user_id' => $user_id, 'limit' => $limit];
        $this->values = $this->fetchAllBySQL($sql, $params);
        return $this->values;
    }
}
