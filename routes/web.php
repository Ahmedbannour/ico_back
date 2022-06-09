<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::group(['middleware'=>'guest'], function(){
    Route::get('/sign-in' , 'Auth\LoginController@index');
    Route::post('/sign-in' , 'Auth\LoginController@post');
    Route::get('/sign-in/github' , 'Auth\LoginController@github');
    Route::get('/sign-in/github/redirect' , 'Auth\LoginController@githubRedirect');

    Route::get('/sign-in/google' , 'Auth\LoginController@google');
    Route::get('/sign-in/google/redirect' , 'Auth\LoginController@googleRedirect');


    Route::get('/sign-in/facebook' , 'Auth\LoginController@facebook');
    Route::get('/sign-in/facebook/redirect' , 'Auth\LoginController@facebookRedirect');

    Route::get('/sign-in/linkedIn' , 'Auth\LoginController@linkedIn');
    Route::get('/sign-in/linkedIn/redirect' , 'Auth\LoginController@linkedInRedirect');
});

Route::middleware(['auth' , 'role:admin'])->group(function(){
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return 'Bonjour Admin Dashbord';
        });
        Route::get('bureau', function () {
                return 'Bonjour Admin Bureau';
        });
       Route::get('locales', function () {
        return 'Bonjour Admin Locales';
        });
    });

});


Route::middleware(['auth' , 'role:marketing'])->group(function(){
    Route::prefix('marketing')->group(function () {
        Route::get('', function () {
            return 'Bonjour marketing dashbord';
        });
        Route::get('bureau', function () {
                return 'Bonjour marketing Bureau';
        });
       Route::get('locales', function () {
        return 'Bonjour marketing Locales';
        });
    });

});

Route::get('/', 'HomeController@index')->name('home');
