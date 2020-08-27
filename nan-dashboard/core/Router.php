<?php

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    // Requires the routes file for further use, then it returns a router instance
    public static function load($file)
    {
        // Instantiates a new Router object
        $router = new static;

        require $file;

        return $router;
    }

    // get() and post() are used in the router.php file to bind the controller for each route in the $routes array from Router class
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    // Searches for the trimmed URI in the $routes subarray corresponding to the request type given
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

            // If if finds the route, it returns what callAction returns
            // The first parameter in call to action is the part before @, the part after @ is the action
            // Action is a function - it can be about, contact, home, index, store
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception('No route defined for this URI.');
    }

    protected function callAction($controller, $action)
    {
        // Instantiate a $controller object ($controller is a string equal to PagesController or UsersController)
        $controller = new $controller;

        // Looks for the method (about, contact, home etc) in the controller object
        if (!method_exists($controller, $action)) {
            throw new Exception("{$controller} does not respond to the {$action} action.");
        }

        // If it finds the method, it calls it and returns it's result
        // The result is returned to the direct() function, which returns it in the index.php file where it was called
        // The result will be "return view(...)". view() is defined in bootstrap.php
        return $controller->$action();
    }
}
