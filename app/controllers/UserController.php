<?php
class UserController extends Controller
{
    public $auth_user;

    public function __construct()
    {
        parent::__construct();
        if (!$this->auth_user) {
            Route::redirect('../login/');
        }
    }

    public function index()
    {
        $data = [
            'auth_user' => $this->auth_user,
        ];
        View::render('user/index', $data);
    }

    public function edit()
    {
        $data = [
            'auth_user' => $this->auth_user,
        ];
        View::render('user/edit', $data);
    }

    public function update()
    {
        checkPostRequest();
        $user = new User();
        $user->update((int) $this->auth_user['id'], $_POST);

        $user->find($this->auth_user['id']);
        Session::add('auth_user', $user->value);
        Route::redirect('./');
    }

    public function uploadProfileImage()
    {
        $user_id = $this->auth_user['id'];

        // アップロードフォルダのパス
        $upload_dir = IMAGE_DIR . "users/profile/";

        // ディレクトリ作成
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $file = $_FILES['image'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            // ファイル移動
            $tmp_name = $file['tmp_name'];
            $destination = "{$upload_dir}{$user_id}.png";
            move_uploaded_file($tmp_name, $destination);
        }
        Route::redirect('./');
    }

    public function logout()
    {
        Session::forget('auth_user');
        Route::redirect('../login/');
    }
}
