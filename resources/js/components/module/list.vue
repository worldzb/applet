<template>
    <div>
        <ul class="list list-unstyled">
            <li v-for="(item,index) in data">
                <label>{{item.client_add_dt}}</label>
                <label class="label label-success">{{ item.client_name }}</label><br>
                电话：<label>{{ item.client_phone }}</label>
                <p class="cont-p" v-html="item.client_remarks">
                </p>
            </li>
        </ul>

    </div>
</template>

<script>
export default {
    data(){
        return{

        }
    },
    props:{
        data:{
            
        }
    },
    created(){

    },
    methods:{
        
    }
}
</script>

<style>
    .list li{
        background: #fff;
        margin-top:5px;
        border-radius: 5px;
        padding: 5px;
    }
    .cont-p{
        background: #eee;
        padding: 5px;
        max-height: 200px;
        overflow: hidden;
        position:relative;
        line-height:1.4em;
        /* 3 times the line-height to show 3 lines */
        height:6em;
        overflow:hidden;
    }
    .cont-p::after {
        content:"...";
        font-weight:bold;
        position:absolute;
        bottom:0;
        right:0;
        padding:0 20px 1px 45px;
        background:url(http://newimg88.b0.upaiyun.com/newimg88/2014/09/ellipsis_bg.png) repeat-y;
    }
</style>
