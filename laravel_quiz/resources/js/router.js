import Vue from 'vue'
import Router from 'vue-router'
import App from './components/page/Home'
import App from './components/page/Quiz'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/quiz',
      name: 'quiz',
      component: Quiz
    }
  ]
})