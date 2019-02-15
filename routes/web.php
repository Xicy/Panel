<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', "Controller@test");

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{asset}', function () {
    return \Munee\Dispatcher::run(new \Munee\Request());
})->where("asset", "^(.*\.(?:css|less|scss|js|coffee|jpg|png|gif|jpeg))$");

Route::get('/a', function () {
    $o = clock(auth()->user(), auth()->user()->extras, auth()->user()->extras->last_login_ip);
    return $o;
});


Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});
Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');
