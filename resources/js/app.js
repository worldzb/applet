
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';//引入路由

import store from './store/store.js';//引入vuex
import router from './router/router.js';

import config from './config/app-config.js';//引入配置文件
import App from './app.vue'; //引入主组件

import ElementUI from 'element-ui';
//import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

window.Vue=Vue;//将Vue 注册为全局对象
Vue.use(VueRouter);
Vue.prototype.config=config;//将配置添加到Vue类当中,再实例化则将config 注册到 vue实例当中


const app = new Vue({
    el: '#app',
    store,
    router,
    render: h => h(App),
});

