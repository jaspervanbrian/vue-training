
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// window.axios.defaults.headers.common = {
//     'X-Requested-With': 'XMLHttpRequest',
//     'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
// };

Vue.component('friend', require('./components/FriendComponents/Friend.vue'));
Vue.component('friend-list', require('./components/FriendComponents/FriendList.vue'));

import FriendList from './components/FriendComponents/FriendList.vue';

const app = new Vue({
    el: '#app',
    data: {
    	message: FriendList.data().message,
    },
    components: {
    	FriendList
    }
});