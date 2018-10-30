
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
//将Vue 注册为全局对象
import VueRouter from 'vue-router';//引入路由
import config from './config/app-config.js';//引入配置文件
import Main from './components/Main.vue'; //引入主组件
import store from './store/store.js';//引入vuex
import Tool from './lib/dom.js';//引入全局工具函数
import router from './router/router.js';

window.Vue=Vue;

Vue.use(VueRouter);
Vue.prototype.config=config;//将配置添加到Vue类当中,再实例化则将config 注册到 vue实例当中
Vue.prototype.Tool=Tool;//将全局工具函数绑定到Vue类上面


const app = new Vue({
    el: '#app',
    store,
    router,
    render: h => h(Main),
});

