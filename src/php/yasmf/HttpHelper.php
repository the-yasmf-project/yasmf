<?php


namespace yasmf;


class HttpHelper
{
    public static function get($name) {
        return isset($_GET[$name]) ? $_GET[$name] : null;
    }
}