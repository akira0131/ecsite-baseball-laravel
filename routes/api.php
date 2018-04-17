<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| APIルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのAPIルートを登録します。これらの
| ルートはRouteServiceProviderによりロードされ、"api"ミドルウェア
| グループにアサインされます。API構築を楽しんでください！
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});
