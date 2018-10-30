<template>
    <div id="cont" class="container">
        <router-view></router-view>
        <hr>
        <br><br>
    </div>
</template>


<script>

import returnVisit from './returnVisit.vue';

export default {
    data(){
        return {
            path:'',
        }
    },
    created(){
        this.init();
    },
    methods:{
        init(){
            
        },
    },
    components:{
        returnVisit,
    }
}
</script>


