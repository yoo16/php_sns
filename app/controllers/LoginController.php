<?php

class LoginController extends Controller
{
    public function index()
    {
        Session::forget("login");
        Session::forget("errors");
        Route::redirect('input.php');
    }

    public function input()
    {
        $checked = '';
        $login = [];
        $errors = [];

        if (isset($_SESSION['login'])) {
            $login['email'] = $_SESSION['login']['email'];
        }
        $errors = Session::get('errors');

        $data = [
            'login' => $login,
            'errors' => $errors,
            'checked' => $checked,
        ];
        View::render('login/input', $data, ['layout' => 'public']);
    }

    public function auth()
    {
        checkPostRequest();

        $user = new User();
        $posts = sanitize($_POST);
        Session::add('login', $_POST);

        $user->validateLogin($posts);

        if (!$user->errors) {
            $auth_user = $user->auth($posts['email'], $posts['password']);
            if ($auth_user) {
                Session::add('auth_user', $auth_user);
                Route::redirect('../');
            }
        }

        Session::add('errors', $user->errors);
        if ($user->errors) {
            Route::redirect('input.php');
        }
    }
}
