import Vue from 'vue'
import router from './router.js'
import VueSocialSharing from 'vue-social-sharing';

Vue.use('VueSocialSharing');

new Vue({
  router: router,
}).$mount('#app');
