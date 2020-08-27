<?php

// App has a registry array member
// We insert config.php to the registry array and give it the key 'config'
App::bind('config', require 'config.php');

// We insert the QueryBuilder object to the registry array and give it the key 'database'
// Query Builder needs a PDO object which is returned by Connection::make
// Conenction::make creates the PDO with the config it gets from the App registry array
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

// This returns the required views and get the data from the controller
function view($name, $data = [])
{
    // if our data is 'user' => 'jon', extract will make a $user = 'jon' variable
    extract($data);
    return require "app/views/{$name}.view.php";
}

// This redirects to a path
function redirect($path)
{
    header("Location: /{$path}");
}
