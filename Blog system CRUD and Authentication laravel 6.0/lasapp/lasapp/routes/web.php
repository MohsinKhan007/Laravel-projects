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



// Route::get('/mohsin', function () {
//     //return view('welcome');
//     return '15140104';

// });


Route::get('/', 'PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/portfolio','PagesController@portfolio');
Route::resource('posts','PostsController');














//Route::get('/', function () {
  //  return view('welcome');
    
//});



// Route::get('/about', function () {
//     //return view('welcome');
//     return view('pages.about');

// });


// Route::get('/users/{id}/{name}', function ($id,$name) {
//     return 'this is user :' .$id. 'and name is : '.$name;
// });






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
