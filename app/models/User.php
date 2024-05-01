<?php
class User extends Model
{
    use UserValidate;

    public string $table = "users";
    public array $columns = [
        'id',
        'name',
        'account_name',
        'email',
        'password',
    ];
    public string $csv_file = DATA_DIR . "users.csv";

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = \"{$email}\";";
        $user = $this->fetchBySQL($sql);
        return $user;
    }
    public function auth(string $email, string $password)
    {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            $this->errors['auth'] = "ユーザ名かパスワードが間違っています。";
        }
    }

    public static function profileImagePath($id)
    {
        return PROFILE_IMAGE_DIR . "{$id}";
    }

    public static function hasProfileImagePath($id)
    {
        $path = self::profileImagePath($id);
        return file_exists($path);
    }

    public static function profileImageURLById($id)
    {
        $defaultUrl = "images/me.png";
        $url = "images/users/profile/{$id}?" . time();
        return self::hasProfileImagePath($id) ? $url : $defaultUrl;
    }
}
