<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------



use think\Route;

Route::resource('api/homestay','admin/homestay');
Route::resource('admin/cat','admin/Cat');
Route::resource('index/index','index/index');
Route::resource('index/detail','index/Detail');
Route::resource('index/lists','index/Lists');
Route::resource('index/user','index/User');
Route::resource('index/login','index/Login');
Route::resource('index/orders','index/Orders');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
