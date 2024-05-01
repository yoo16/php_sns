<?php
require_once "env.php";

// パス設定
const BASE_DIR = __DIR__;
const APP_DIR = __DIR__ . "/app/";
const LIB_DIR = __DIR__ . "/lib/";
const DATA_DIR = __DIR__ . "/data/";
const IMAGE_DIR = __DIR__ . "/images/";
const MODEL_DIR = APP_DIR . "models/";
const VIEW_DIR = APP_DIR . "views/";
const CONTROLLER_DIR = APP_DIR . "controllers/";
const LAYOUT_DIR = VIEW_DIR . "layouts/";
const VALIDATE_DIR = APP_DIR . "validate/";
const PROFILE_IMAGE_DIR = IMAGE_DIR . "users/profile/";

// ディレクトリ作成
if (!is_dir(PROFILE_IMAGE_DIR)) {
    mkdir(PROFILE_IMAGE_DIR, 0755, true);
}

require_once LIB_DIR . 'functions.php';
require_once LIB_DIR . 'Model.php';
require_once LIB_DIR . 'View.php';
require_once LIB_DIR . 'Session.php';
require_once LIB_DIR . 'Route.php';

require_once VALIDATE_DIR . 'UserValidate.php';
require_once VALIDATE_DIR . 'TweetValidate.php';

require_once MODEL_DIR . 'User.php';
require_once MODEL_DIR . 'Tweet.php';
require_once MODEL_DIR . 'Like.php';

require_once CONTROLLER_DIR . 'Controller.php';
require_once CONTROLLER_DIR . 'ApiController.php';
require_once CONTROLLER_DIR . 'TweetController.php';
require_once CONTROLLER_DIR . 'UserController.php';
require_once CONTROLLER_DIR . 'LoginController.php';
require_once CONTROLLER_DIR . 'RegistController.php';
