<?php

/*
|--------------------------------------------------------------------------
| Webルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのWebルートを登録できます。"web"ルートは
| ミドルウェアのグループの中へ、RouteServiceProviderによりロード
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Route::auth();
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('admin/about', 'AboutController@index')->name('about');

    Route::get('admin/about', function ()    {
        $data = [];
        return view('admin.about',$data);
    })->name('about');

});

/*
|--------------------------------------------------------------------------
| タスクメニュー
|--------------------------------------------------------------------------
|
| 
|
*/
Route::resource('{userId}/task', TaskController::class);





