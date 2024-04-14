<?php 

class Controller
{
    public $auth_user;

    function __construct() {
        if (Session::has("auth_user")) {
            $this->auth_user = Session::get("auth_user");
        }
    }

}