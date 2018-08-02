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
Route::get('/contact/{name}', function ($name) {
     echo "je suis ".$name;
});
Route::get('/posts/','PagesController@posts');
Route::get('/posts/{post}','PagesController@post');
// Route::post('/posts/store','PagesController@store'); //pour admin role
Route::post('/posts/{post}/store','CommentsController@store');
Route::get('/category/{name}','PagesController@category');

Route::get('view-records','PagesController@caty');
//Auth
Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');
Route::get('/access_denied','PagesController@accessDenied');
//test

Route::group(['middleware'=> 'roles' ,'roles'=>['admin']],function(){
	Route::get('/admin','PagesController@admin');
	Route::get('/add-role','PagesController@addRole');
	Route::post('/stop_comment','PagesController@stopComment');
	Route::post('/stop_register','PagesController@stopRegister');

});
Route::group(['middleware'=> 'roles' ,'roles'=>['editor','admin']],function(){
	Route::get('/editor','PagesController@editor');
	Route::get('/posts/store','PagesController@store');

});
Route::group(['middleware'=> 'roles' ,'roles'=>['user','editor','admin']],function(){
	
	Route::post('/like','PagesController@like')->name('like');
	Route::post('/dislike','PagesController@dislike')->name('dislike');

});
Route::get('/statistics','PagesController@statistics');

// Route::get('/admin',[
// 	'uses'=>'PagesController@admin',
// 	'as'=>'content.admin',
// 	'middleware'=>'roles',
// 	'roles'=>['admin',]
// ]);
// Route::post('/add-role',[
// 	'uses'=>'PagesController@addRole',
// 	'as'=>'content.admin',
// 	'middleware'=>'roles',
// 	'roles'=>['admin',]
// ]);
// Route::get('/editor',[
// 	'uses'=>'PagesController@editor',
// 	'as'=>'content.editor',
// 	'middleware'=>'roles',
// 	'roles'=>['admin','editor']
// ]);