<template>
    <div id="return-visit">
        <list :data="rv_list"></list>
    </div>
</template>

<script>
import list from './list.vue';
export default {
    data(){
        return{
            path:'',
            rv_list:'',
        }
    },
    created(){
        this.init();
    },
    methods:{
        init(){
            axios.get(this.config.PATH+'returnVisitToday',{
                params:{
                    data:''
                }
            }).then((res)=>{
                this.rv_list=res.data
            })
        },
    },
    components:{
        list
    }
}
</script>

<style>
    
</style>

