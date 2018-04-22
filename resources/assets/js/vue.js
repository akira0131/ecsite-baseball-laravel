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