
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
 import example from './components/ExampleComponent.vue'
import UserProfile from './components/UserProfile.vue'
import album from './components/Album.vue'
import timeline from './components/TimelineComponent.vue'
import about from './components/AboutComponent.vue'
import friendsProfile from './components/Friends/friendsProfile.vue'
import friends from './components/friends.vue'

 const routes = [
  { path: '/example', component: example },
  { path : '/profile', component : UserProfile },
  { path : '/album' , component : album},
     { path : '/about' , component : about},
  { path : '/timeline' , component : timeline},
  { path : '/friends' , component : friends },
  { path : '/friendsProfile/:userId' , name : 'friendsProfile' , component : friendsProfile }
]


const router = new VueRouter({
  routes // short for `routes: routes`
})

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Vue.component('LoginComponent', require('./components/LoginComponent.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
