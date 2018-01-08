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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/menu',function(){
	return view('menu');
});

Route::get('/contacto',function(){
	return view('contacto');
});
Route::get("/login",function(){
	return view('welcome');
});
Auth::routes();
Route::post('/login2', 'Auth\SocialAuthController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
Route::get('/usuario/calendario/{id}','Auth\SocialAuthController@vercalendario');
Route::get('/usuario/publicar','Auth\SocialAuthController@publicar');
Route::get('/usuario/publicar3','Auth\SocialAuthController@publicar3');
Route::post('/usuario/publicar1','Auth\SocialAuthController@publicar1');
Route::post('/usuario/calendario/programar','Auth\SocialAuthController@programarp');
Route:: get('/usuario/{id}','Auth\SocialAuthController@index');