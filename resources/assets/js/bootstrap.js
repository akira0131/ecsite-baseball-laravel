/* global _ Vue */

window._ = require('lodash')
window.Popper = require('popper.js').default;

/**
 * モーダルやタブのような基本的なBootstrap機能をサポートしている
 * jQueryとBootstrap jQueryプラグインをロードします。このコードは
 * アプリケーション独自の必要に応じて、変更されることになります。
 */

try {
  window.$ = window.jQuery = require('jquery');

  require('bootstrap');
} catch (e) {}

require('admin-lte')
require('icheck')

/**
 * Laravelのバックエンドにリクエストを簡単に発行できるように、axios HTTP
 * ライブラリをロードします。このライブラリは自動的に"XSRF"トークン
 * クッキーの値に基づいて、ヘッダーベースのCSRFトークンを送ります。
 */

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * VueはモダンなJavaScriptライブラリで、リアクティブなデータ結合と
 * 再利用可能なコンポーネントを使用し、インタラクティブなWebインターフェイスを構築できます。
 * VueのAPIはクリーンかつシンプルで、次の素晴らしいプロジェクト構築へ集中させてくれます。
 */

window.Vue = require('vue')

// Use trans function in Vue (equivalent to trans() Laravel Translations helper). See htmlheader.balde.php partial.
Vue.prototype.trans = (key) => {
  return _.get(window.trans, key, key)
}

// Laravel AdminLTE vue components
Vue.component('register-form', require('./components/auth/RegisterForm.vue'))
Vue.component('login-form', require('./components/auth/LoginForm.vue'))
Vue.component('email-reset-password-form', require('./components/auth/EmailResetPasswordForm.vue'))
Vue.component('reset-password-form', require('./components/auth/ResetPasswordForm.vue'))

/**
 * Echoはチャンネルを購入したり、Laravelによりブロードキャストされるイベントをリスニング
 * するための、記述的なAPIを提供しています。Echoとイベントブロードキャストにより、
 * あなたのチームは堅牢なリアルタイムWebアプリを簡単に構築できるでしょう。
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
