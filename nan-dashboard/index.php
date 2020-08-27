<?php
// requiring Composer
require 'vendor/autoload.php';
// requiring our bootstrap file
require 'core/bootstrap.php';

// Router::load returns a new router object
// that contains an array with 2 arrays: one for POST routes and one for GET routes
Router::load('app/routes.php')
// then we call direct by giving it the pages URI and REQUEST METHOD
// direct ultimately requires the needed view
    ->direct(Request::uri(), Request::method());
