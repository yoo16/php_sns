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


    public function logout()
    {
        Session::forget('auth_user');
        Route::redirect('../login/');
    }
}
