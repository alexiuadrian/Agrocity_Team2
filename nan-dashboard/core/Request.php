<?php


class Request
{
    // Returns the URI of the page (without the GET parameters like ?name=Vlad&age=30)
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    // Returns the request method
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD']; // will give us GET or POST
    }
}
