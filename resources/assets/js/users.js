
/**
 * 最初にこのプロジェクトのJavascriptの依存パッケージを全てロードします。
 */

window.$ = window.jQuery = require('jquery')
window._ = require('lodash')
window.Popper = require('popper.js').default;

// v4.1.0
require('bootstrap');

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

require('./common');
require('./vue');