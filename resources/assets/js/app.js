require('./bootstrap');
import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import routes from './routes'
import store from './store/'
import App from './App.vue'

Vue.use(VueResource)
Vue.use(VueRouter)
Vue.component('app', App)
const router = new VueRouter({
    routes
});
const app = new Vue({
    router, store
}).$mount('#app');
