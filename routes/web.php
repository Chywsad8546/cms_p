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




//登录
Route::get('/cms/userLogin', 'UserController@userLogin');

//获取新闻管理列表
Route::get('/cms/getSysMenuList', 'SysMenu@getSysMenuList');