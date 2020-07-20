import Vue from 'vue'
import router from './router.js'
import VueSocialSharing from 'vue-social-sharing';
import axios from 'axios';

Vue.prototype.$http = axios;
Vue.use('VueSocialSharing');

new Vue({
  router: router,
}).$mount('#app');
