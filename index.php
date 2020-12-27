<?php

    require 'vendor/autoload.php';
    session_start();
    use NoahBuscher\Macaw\Macaw;
    if (! ob_get_level()) {
        ob_start();
    }
    //tab
    Macaw::get('/', '\App\Controllers\Auth\LoginController@showLoginForm');
    Macaw::get('home', '\App\Controllers\HomeController@home');
    Macaw::get('contact', '\App\Controllers\HomeController@contact');
    Macaw::get('result', '\App\Controllers\HomeController@result');
    Macaw::post('search','\App\Controllers\SearchController@searchFlight');
    //user
    Macaw::get('register', '\App\Controllers\Auth\RegisterController@showRegisterForm');
    Macaw::post('register','\App\Controllers\Auth\RegisterController@register');
    Macaw::post('login', '\App\Controllers\Auth\LoginController@login');
    Macaw::post('logout', '\App\Controllers\Auth\LoginController@logout');
    //error
    Macaw::error('\App\Controllers\HomeController@notFound');

    //test
    Macaw::get('test','\App\Controllers\HomeController@test');
    Macaw::dispatch();
    ob_end_flush();
?>




