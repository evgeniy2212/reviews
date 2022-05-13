require('./bootstrap');
window.Vue = require('vue');
Vue.prototype.baseUrl = window.Laravel.baseUrl;
Vue.prototype.authId = window.Laravel.authId;

import App from './chat/App'
import VueChatScroll from 'vue-chat-scroll';
import loader from "vue-ui-preloader";

Vue.use(loader);
Vue.use(VueChatScroll)

const app = new Vue({
    el: '#chatApp',
    render: h => h(App)
});
