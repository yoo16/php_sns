<?php
require_once "../app.php";

$controller = new LoginController();
$controller->auth();
