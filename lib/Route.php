<?php

class Route
{
    //TODO
    public static $base_url = BASE_URL;

    public static function redirect($action, $params = '')
    {
        header("Location: {$action}");
        exit;
    }

    public static function baseURL()
    {
        //TODO
        return BASE_URL;
    }

    public static function url($path)
    {
        //TODO
        $base_url = self::baseURL();
        $url = "{$base_url}{$path}";
        return $url;
    }
}