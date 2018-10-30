<template>
    <div id="y-table">
        <button @click="plus()"> 增加 </button>
        <thead>
            <tr>
                <td v-for="(item,index) in rows">
                    <span class="adjust-size"> &nbsp;</span>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item,index) in cols">
                <td v-for="(item,index) in rows">f</td>
            </tr>
        </tbody>
    </div>
</template>

<script>
//基础表格控件
import YT from './y-table.js';
export default {
    data(){
        return{
            currentRows:0,
            currentCols:0,
        }
    },
    props: {
        rows: Number,//行
        cols: Number,//列
        data: Object,//数据
    },
    created(){
        
    },
    watch:{
        cols(newData){
            this.currentCols=newData;
        },
        rows(newData){
            this.currentRows=newData;
        },
        data(){
            
        }
    },
    components:{

    },
    methods:{
        plus(){
            this.rows++;
        }
    }
}
</script>



<style lang="scss">
    $activity-color:#0088cc;
    #y-table{
        thead{
            background:$activity-color;
            color: #fff;
        }
        td{
            width: 100px;
            border: 1px solid #eee
        }
        td:hover{
            width: 100px;
            border: 1px solid #ccc
        }
        .adjust-size{
            display: block;
            width: 2px;
            height: 100%;
            float:right;
        }
        .adjust-size:hover{
           background: red;
           cursor:w-resize;
        }
    }
</style>
