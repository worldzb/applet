/*
 * This file is part of jinggangym <https://jinggangym.com/>* Copyright (C) 2006-2018.All rights reserved. 
 * @Author: worldzb 
 * @Date: 2018-09-04 16:44:59 
 * @Last Modified by: worldzb
 * @Last Modified time: 2018-09-04 17:43:03
 */ 
 
import VueRouter from 'vue-router';//引入路由
import Vue from 'vue';

Vue.use(VueRouter);

const router = new VueRouter({
    routes:[{
        path: '/home', component: require('../components/module/home.vue')
    },{
        path: '/add', component: require('../components/module/add.vue')
    },{
        path: '/search', component: require('../components/module/search.vue')
    },{
        path: '/about', component: require('../components/module/about.vue')
    }]
})
  
export default router;


