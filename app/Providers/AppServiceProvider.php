<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションサービスの初期化処理
     *
     * @return void
     */
    public function boot()
    {
        /**
         * キャッシュヒット対策
         * public配下のファイルをタイムスタンプ付きでキャッシュするヘルパー
         *
         * ex )
         * <link rel="stylesheet" href="@addtimestamp(css/app.css)" type="text/css" />
         * output )
         * <link rel="stylesheet" href="https://example.com.jp/css/app.css?v=1521625069" />
         */
        \Blade::directive('addtimestamp', function ($expression) {

            // ファイルパス取得
            $path = public_path($expression);

            // 更新時間取得
            $timestamp = \File::lastModified($path);

            // 更新時間が取得できなかった場合は、現在時刻で代用
            if ($timestamp === false) {
                $timestamp = Carbon::now()->timestamp;
            }

            // ファイルパスの後ろにタイムスタンプを追加
            $path = asset($expression) . '?v=' . $timestamp;

            return $path;
        });
    }

    /**
     * アプリケーションサービスの登録
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
