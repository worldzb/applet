/*
 * This file is part of jinggangym <https://jinggangym.com/>* Copyright (C) 2006-2018.All rights reserved. 
 * @Author: worldzb 
 * @Date: 2018-09-04 14:02:53 
 * @Last Modified by: worldzb
 * @Last Modified time: 2018-09-10 17:49:18
 */ 

 import Vuex from 'vuex';
 import Vue from 'vue';
 import mutations from './mutations.js';
 import getters from './getters.js';
 import actions from './actions.js';

 Vue.use(Vuex);

const state={
  
}

 const store = new Vuex.Store({
    state,getters,mutations,actions,
    modules:{
      
    }
  });


  export default store;


