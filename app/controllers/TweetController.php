<?php
class TweetController extends Controller
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
            'tweets' => $tweet->get(),
            'like_counts' => $like->counts(),
            'user_likes' => $like->valuesByUser($this->auth_user),
            'auth_user' => $this->auth_user,
        ];
        View::render('tweet/index', $data);
    }

    public function add()
    {
        $posts = sanitize($_POST);
        $tweet = new Tweet();
        $posts['user_id'] = $this->auth_user['id'];
        $tweet->validate($posts);
        if (!$tweet->errors) {
            $tweet->save($posts);
        }
        Route::redirect('./');
    }

    public function delete()
    {
        $auth_user = Session::get('auth_user');
        $posts = sanitize($_POST);
        $tweet = new Tweet();
        $tweet->find($posts['tweet_id']);
        if ($tweet->value && $tweet->value['user_id'] == $auth_user['id']) {
            $tweet->delete($posts['tweet_id']);
            Route::redirect('./');
        } else {
            exit;
        }
    }

    public function like()
    {
        $like = new Like();
        if ($value = $like->has($_POST['tweet_id'], $_POST['user_id'])) {
            $like->delete($value['id']);
        } else {
            $like->save($_POST);
        }
        Route::redirect('./');
    }
}
