/*
 * This file is part of jinggangym <https://jinggangym.com/>* Copyright (C) 2006-2018.All rights reserved. 
 * @Author: worldzb 
 * @Date: 2018-09-04 16:44:59 
 * @Last Modified by: worldzb
 * @Last Modified time: 2018-10-31 16:37:10
 */ 
 
import VueRouter from 'vue-router';//引入路由
import Vue from 'vue';
import ComMap from './com-map.js';

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'main',
            component: ComMap.Main,
            children:[
                {
                    path:'/fodder',
                    component:ComMap.PicUpload
                },
                {
                    path:'/goods',
                    component:ComMap.GoodsManager
                }
            ]
        }
    ]
})
  
export default router;


