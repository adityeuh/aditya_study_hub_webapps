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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get(
            '/register',
            'RegisterController@show'
        )->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth', 'permission']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(
            ['prefix' => 'users'],
            function () {
                Route::get('/', 'UsersController@index')->name('users.index');
                Route::get('/testing', 'UsersController@testing')->name('users.testing');
                Route::get('/create', 'UsersController@create')->name('users.create');
                Route::post('/create', 'UsersController@store')->name('users.store');
                Route::get('/{user}/show', 'UsersController@show')->name('users.show');
                Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
                Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
                Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
            }
        );


        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', 'PostsController@index')->name('posts.index');
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
        });

        Route::group(['prefix' => 'transactions'], function () {
            Route::get('/', 'TransactionsController@index')->name('transactions.index');
            Route::get('/create', 'TransactionsController@create')->name('transactions.create');
            Route::post('/create', 'TransactionsController@store')->name('transactions.store');
            Route::get('/{transaction}/show', 'TransactionsController@show')->name('transactions.show');
            Route::get('/{transaction}/edit', 'TransactionsController@edit')->name('transactions.edit');
            Route::patch('/{transaction}/update', 'TransactionsController@update')->name('transactions.update');
            Route::delete('/{transaction}/delete', 'TransactionsController@destroy')->name('transactions.destroy');
            Route::get('/getRoom/{uid?}', ['as' => 'transactions.getRoom',   'uses' => 'TransactionsController@getRoom']);
            Route::get('/{transaction}/print', 'TransactionsController@print')->name('transactions.print');
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
        Route::resource('rooms', RoomsController::class);
        // Route::resource('transactions', TransactionsController::class);
    });

    Route::fallback(function () {
        return redirect()->to('login');
    });
});
