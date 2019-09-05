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

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/user', 'Auth\LoginController@showUserLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/user', 'Auth\LoginController@userLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/user', 'Auth\RegisterController@createUser');

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin.index');
Route::view('/user', 'user.index');

Route::resource('users','UserController');
Route::get('get-users','UserController@get_users')->name('get.users');
route::post('user/suspend/{id}','UserController@suspend')->name('user.suspend');
route::post('user/activate/{id}','UserController@activate')->name('user.activate');
route::post('user/reset-password/{id}','UserController@reset_password')->name('user.reset');

Route::resource('inventory','InventoryController');
Route::get('admin-inventory','InventoryController@admin_index')->name('admin.inventory.index');
Route::get('user-inventory','InventoryController@user_index')->name('user.inventory.index');
Route::get('get-inventories','InventoryController@getInventories')->name('get.inventories');
Route::get('get-user-inventories','InventoryController@getUserInventories')->name('get.userinventories');
