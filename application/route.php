<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//get
Route::get('test','api/test/index');
Route::resource('test','api/test');

Route::post('api/:ver/index','api/:ver.index/index');
Route::get('api/:ver/category','api/:ver.category/index');
Route::get('api/:ver/news','api/:ver.news/index');