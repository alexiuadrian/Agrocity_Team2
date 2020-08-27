<?php

$router->get('', 'PagesController@home');

$router->post('login', 'PagesController@login' );
$router->get('dashboard', 'PagesController@dashboard');
$router->get('logout', 'PagesController@logout');
