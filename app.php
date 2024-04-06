<?php
require_once "env.php";

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