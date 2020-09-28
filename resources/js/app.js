require('./bootstrap');

// window.$ = window.jQuery = require('jquery');

window.Vue = require('vue');


Vue.component('saldo', require('./components/Saldo').default);
Vue.component('saque', require('./components/Saque').default);
Vue.component('extrato', require('./components/Extrato').default);


import VueRouter from 'vue-router';
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    routes
});
const app = new Vue({
    el: '#app',
    router,


});
