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
        $tweet = new Tweet();
        $like = new Like();
        $data = [
            'tweets' => $tweet->getByUserID($this->auth_user['id']),
            'like_counts' => $like->counts(),
            'user_likes' => $like->valuesByUser($this->auth_user),
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
        $file = $_FILES['image'];
        if ($file['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $file['tmp_name'];
            $destination = User::profileImagePath($this->auth_user['id']);
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
