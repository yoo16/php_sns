<?php

class RegistController extends Controller
{
    public function index()
    {
        Session::forget("regist");
        Session::forget("errors");
        Route::redirect('input.php');
    }

    public function input()
    {
        $data = [
            'regist' => Session::get("regist"),
            'errors' => Session::get("errors"),
        ];
        View::render('regist/input', $data, ['layout' => 'public']);
    }

    public function confirm()
    {
        checkPostRequest();
        $posts = check($_POST);
        Session::add("regist", $_POST);

        $user = new User();
        $user->validateRegist($posts);

        Session::add("errors", $user->errors);
        if ($user->errors) {
            Route::redirect('input.php');
        }
        $data = [
            'posts' => $posts,
            'errors' => $user->errors,
        ];
        View::render('regist/confirm', $data, ['layout' => 'public']);
    }

    public function add()
    {
        checkPostRequest();
        if ($posts = Session::get("regist")) {
            $posts['password'] = password_hash($posts['password'], PASSWORD_DEFAULT);
            $user = new User();
            $user->save($posts);
        }

        Route::redirect('result.php');
    }

    public function result()
    {
            View::render('regist/result', null, ['layout' => 'public']);
            return;
        if (Session::has('regist')) {
            Session::forget('regist');
            View::render('regist/result', null, ['layout' => 'public']);
        } else {
            Route::redirect('./');
        }
    }
}
