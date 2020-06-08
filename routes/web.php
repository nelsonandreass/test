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

Route::get('/', 'MainController@index');

Route::get('/product/{id}' , 'MainController@show');

Route::get('/login', 'AuthController@loginpage');
Route::post('/loginprocess' , 'AuthController@loginprocess');
Route::get('/logout' , 'AuthController@logout');

Route::get('/register', 'AuthController@registerpage');
Route::post('/registerprocess' , 'AuthController@registerprocess');

Route::get('/ajax-form','MainController@ajax_form');
Route::post('/ajax','MainController@ajax');

Route::get('/test','AuthController@test');


//transaction
Route::prefix('transaction')->
middleware(['login'])->
group(function(){
    Route::post('/addToChart' , 'TransactionController@store');
    Route::get('/showChart' , 'TransactionController@show');
});

Route::prefix('admin')->
// middleware(['auth','admin'])->
group(function(){
    Route::get('/', 'MainController@index');
    
    Route::get('/inputproduct','ProductController@create');

    Route::post('/productprocess','ProductController@store');

    Route::get('/edit','ProductController@show');

    Route::post('/delete' , 'ProductController@destroy');

    Route::get('/editpage' , 'ProductController@edit');
    
    ROute::post('/editprocess' , 'ProductController@update');
});