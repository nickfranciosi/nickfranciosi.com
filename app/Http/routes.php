<?php

get('/', function () {
    return view('pages.home');
});


get('resume','PagesController@showResume');
get('portfolio','PagesController@showPortfolio');

get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogController@show');

resource('admin/post','PostController');


get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

