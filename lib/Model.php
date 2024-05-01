<?php
class Model
{
    public $pdo;
    public string $table = "";
    public $value;
    public array $values = [];
    public array $errors = [];
    function __construct()
    {
        $db_connection = DB_CONNECTION;
        $db_name = DB_DATABASE;
        $db_host = DB_HOST;
        $db_port = DB_PORT;
        $db_user = DB_USERNAME;
        $db_password = DB_PASSWORD;

        $dsn = "{$db_connection}:dbname={$db_name};host={$db_host};charset=utf8;port={$db_port}";
        try {
            $this->pdo = new PDO($dsn, $db_user, $db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage();
            echo $dsn;
            exit;
        }
    }

    public function fetchBySQL(string $sql, array $params = null)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $this->value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->value;
    }

    public function fetchAllBySQL(string $sql, array $params = null)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $this->values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->values;
    }

    public function get(int $limit = 20)
    {
        $sql = "SELECT * FROM {$this->table} LIMIT :limit;";

        $this->values = $this->fetchAllBySQL($sql, ['limit' => $limit]);
        return $this->values;
    }

    public function find(int $id)
    {
        if (empty($id)) return;
        $sql = "SELECT * FROM {$this->table} WHERE id = :id;";

        $this->value = $this->fetchBySQL($sql, ['id' => $id]);
        return $this->value;
    }

    public function insert(array $posts)
    {
        if (!$posts) return;
        $posts = sanitize($posts);

        foreach ($posts as $column => $post) {
            $columns[] = $column;
            $values[] = ":{$column}";
        }
        $column = implode(",", $columns);
        $value = implode(",", $values);

        $sql = "INSERT INTO {$this->table} ({$column}) VALUES ({$value});";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($posts);
    }

    public function update(int $id, array $posts)
    {
        if (!$posts) return;
        $posts = sanitize($posts);

        foreach ($posts as $column => $post) {
            $values[] = "{$column} = :{$column}";
        }
        $value = implode(",", $values);

        $sql = "UPDATE {$this->table} SET {$value} WHERE id = {$id};";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($posts);
    }

    public function delete($id)
    {
        $params['id'] = $id;
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function bind(array $data)
    {
        $data = sanitize($data);
        $this->value = $data;
    }

}