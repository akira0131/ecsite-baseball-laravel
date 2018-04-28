<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションサービスの初期化処理
     * ViewComposers
     *
     * bootメソッド：
     *   アプリケーションサービスへのブートストラップ処理(アプリケーションが起動する際に割り込んで実行される処理)。
     *   ここにコンポーザを設定するする処理を用意することで、設定したビューをレンダリングする際に自動的にコンポーザが呼び出されるようになる。
     *
     * View::composerのフィールド：
     *   View::composer(ビューの指定, 関数またはクラス);
     *
     * Viewインスタンス：
     *   Illuminate\Support\Facades\Viewにあるviewクラスのインスタンス
     *   ビューを管理するオブジェクトになり、ここにあるメソッドなどを利用してビューを操作できる。
     *
     *   withメソッド：
     *     フィールド：
     *       $view->with(変数名, 値);
     *     説明：ビューに変数などを追加できる。
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'components.html_header', 'App\Http\ViewComposers\AssetComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
