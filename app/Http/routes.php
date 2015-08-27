<?php

Route::get('/', function () {
    return view('pages.home');
});

Route::get('blog/tag/{tag}', 'BlogController@showByTag');
Route::get('blog/drafts', 'BlogController@drafts');
Route::get('resume','PagesController@showResume');
Route::get('portfolio','PagesController@showPortfolio');
Route::resource('blog', 'BlogController');


