<template>
    <div id="content">
        <el-container>
            <el-aside width="300px" ref="aside">
                <el-button style="width:100%;height:60px;border:dashed 1px #333" @click="createGoods()">
                    <i class="fa fa-plus"></i>
                </el-button>
                <div class="goodsList">
                    <ul>
                        <li v-for="(item,index) in goodsList" :key="index">
                            <el-row>
                                <el-col :span="8">
                                    <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.g_header.f_key" alt="">
                                </el-col>
                                <el-col :span="16">
                                    <div class="">
                                        <h6><strong>{{item.g_title}}</strong></h6>
                                        <p>{{item.g_type}} | {{item.g_price_now}} | {{item.g_price_now}}</p>
                                        <p>
                                            <el-button 
                                                type="primary" 
                                                icon="el-icon-edit" 
                                                circle size="mini"
                                                @click="loadingGoods(index)"></el-button>
                                            <el-button 
                                                type="danger" 
                                                icon="el-icon-delete" 
                                                circle size="mini"
                                                @click="deleteGoods(index)"></el-button>
                                        </p>
                                    </div>
                                </el-col>
                            </el-row>
                        </li>
                    </ul>
                </div>
            </el-aside>
            <el-main>
                <el-row :gutter="20">

                    <el-col :span="10">
                        <el-button type="primary" @click="resetGoods()">重置</el-button>
                        <el-form label-width="100px" class="demo-ruleForm">
                            <el-form-item label="类型" prop="name">
                                <el-select v-model="goods.g_type" placeholder="类型">
                                    <el-option label="眼睛" value="eyes"></el-option>
                                    <el-option label="鼻子" value="nose"></el-option>
                                    <el-option label="自体脂肪" value="fat"></el-option>
                                    <el-option label="皮肤" value="skin"></el-option>
                                </el-select>
                            </el-form-item>

                            <el-form-item label="标题" prop="name">
                                <el-input v-model="goods.g_title"></el-input>
                            </el-form-item>

                            <el-form-item label="现价" prop="name">
                                <el-input v-model="goods.g_price_now"></el-input>
                            </el-form-item>

                            <el-form-item label="原价" prop="name">
                                <el-input v-model="goods.g_price_old"></el-input>
                            </el-form-item>
                            
                            <el-form-item label="销量" prop="name">
                                <el-input v-model="goods.g_sales"></el-input>
                            </el-form-item>

                            <el-form-item label="添加头图" prop="name">
                               
                                <el-button @click="showDialog('header')">添加头图</el-button>
                                <el-button @click="goods.g_header=[]">清空</el-button>

                                <div 
                                    class="color-item" 
                                    v-for="(item,index) in goods.g_header"
                                    v-dragging="{ item: item, list: goods.g_header, group: 'header' }"
                                    :key="index">
                                    {{item.key}} 
                                    <el-button type="text" @click="deleteHeaderItem(index)"> x </el-button>
                                </div>
                            </el-form-item>

                            <el-form-item label="添加描述" prop="name">
                                <el-button @click="showDialog('desc')">添加描述</el-button>
                                <el-button @click="goods.g_desc=[]">清空</el-button>
                                <div 
                                    class="color-item" 
                                    v-for="(item,index) in goods.g_desc"
                                    v-dragging="{ item: item, list: goods.g_desc, group: 'desc' }"
                                    :key="index">
                                    {{item.key}} 
                                    <el-button type="text" @click="deleteDescItem(index)"> x </el-button>
                                </div>
                            </el-form-item>
                            <el-button  @click="addGoods()">确认添加</el-button>
                            <el-button type="primary" v-if="goods.id" @click="modifyGoods()">修改</el-button>
                        </el-form>
                    </el-col>

                    <el-col :span="10">
                        <h4 style="border-bottom:1px solid #999;padding:10px">预览</h4>
                        <div style="border:1px solid #999;height:800px;overflow:auto">
                            <el-carousel height="300px">
                                <el-carousel-item v-for="(item,index) in goods.g_header" :key="index">
                                    <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.key" alt="xvx" width="100%">
                                </el-carousel-item>
                            </el-carousel>
                            <br><br>
                            <div v-for="(item,index) in goods.g_desc" :key="index">
                                <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.key" alt="xvx" width="100%">
                            </div>
                        </div>
                    </el-col>
                </el-row>
            </el-main>
        </el-container>

        <el-dialog :title="currentAct" :visible.sync="dialogStatus">
            <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="素材库" name="first" @click="loadFodder()">
                    <div v-for="(item,index) in fodderList" 
                        class="fooderItem-box"
                        @dblclick="addGHeader(index)">
                        <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.f_key" width="100%">
                        <span 
                            class="pre-pic"
                            @click.stop="dialogVisible=true;dialogImageUrl='http://phg4we4j7.bkt.clouddn.com/'+item.f_key">
                                <i class="el-icon-circle-plus-outline"></i>
                        </span>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="上传图片" name="second">
                    <el-upload
                    action="http://up-z2.qiniup.com"
                    list-type="picture-card"
                    :on-preview="handlePictureCardPreview"
                    :on-remove="handleRemove"
                    :auto-upload="true"
                    :data="token"
                    :multiple="true"
                    :on-success="handlePicUpSuccess">
                        <i class="el-icon-plus"></i>
                    </el-upload>

                    <el-dialog :visible.sync="dialogVisible" append-to-body>
                        <img width="100%" :src="dialogImageUrl" alt="">
                    </el-dialog>

                </el-tab-pane>
            </el-tabs>

            <div slot="footer" class="dialog-footer">
                <el-button @click="outerVisible = false">取 消</el-button>
                <el-button type="primary" @click="innerVisible = true">确定</el-button>
            </div>
        </el-dialog>

    </div>
</template>

<script>
import VueDND from 'awe-dnd'
import Vue from 'vue';
Vue.use(VueDND);

export default {
    data(){
        return {
            dialogVisible:false,
            dialogImageUrl:'',
            activeName:'',
            token:{},
            //商品滚动头图
            goods:{
                id:0,
                g_type:'',
                g_header:[],
                g_title:'',
                g_price_now:'',
                g_price_old:'',
                g_desc:[],
                g_sales:0,
            },
            temp:{
                g_header:'',
                g_desc:'',
            },
            fodderList:[],
            goodsList:[],

            currentAct:'header',
            dialogStatus:false,
            currentGoodsId:0,
        }
    },

    created(){
         //获取上传token
        axios.get(this.config.PATH+'getToken',{}).then((res)=>{
            this.token={
                token:res.data
            };
        });
        axios.get(this.config.PATH+'goodNewList',{}).then((res)=>{
            this.goodsList=res.data;
        });
    },
    mounted () {
       
    } ,
    methods:{
        createGoods(){
            this.$message({
                message: this.config.PATH,
                type: 'success'
            });
        },
        handleClose(){
            
        },
        handleClick(tab, event) {
            if(this.activeName=='first'){
                this.loadFodder();
            }
        },
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        loadFodder(){
            axios.get(this.config.PATH+'getFodderList',{}).then((res)=>{
                this.fodderList=res.data.data;
            });
        },
        handlePicUpSuccess(response, file, fileList){
            axios.post(this.config.PATH+'picUpload',{...response}).then((res)=>{
                this.$message({
                    message: '上传成功',
                    type: 'success'
                });
                if(this.currentAct=='header'){
                    this.goods.g_header.push({
                        id:res.data.id,
                        key:res.data.f_key
                    });
                }else if(this.currentAct=='desc'){
                    this.goods.g_desc.push({
                        id:res.data.id,
                        key:res.data.f_key
                    });
                }
                this.dialogStatus=false;
            });
        },
        addGoods(){
            axios.post(this.config.PATH+'goods',this.goods).then((res)=>{
                if(res.data.id>0){
                    this.goodsList.splice(0,0,res.data);
                }
            });
        },
        modifyGoods(){
            axios.put(this.config.PATH+'goods',this.goods).then((res)=>{
                if(res.data.id>0){
                    this.goodsList.splice(this.currentGoodsId,1,res.data);
                }
            });
        },
        addGHeader($index){
            if(this.currentAct=='header'){
                this.goods.g_header.push({
                    id:this.fodderList[$index].id,
                    key:this.fodderList[$index].f_key
                });
            }else if(this.currentAct=='desc'){
                this.goods.g_desc.push({
                    id:this.fodderList[$index].id,
                    key:this.fodderList[$index].f_key
                });
            }
            this.dialogStatus=false;
        },
        
        loadingGoods($index){
            axios.get(this.config.PATH+'goods/'+this.goodsList[$index].id,{}).then((res)=>{
                this.convertGoods(res.data[0]);
                this.currentGoodsId=$index;
            });
        },

        deleteGoods($index){
             axios.delete(this.config.PATH+'goods/'+this.goodsList[$index].id,{}).then((res)=>{
                if(res.data=1){
                    this.$message({
                        message: '删除成功',
                        type: 'success'
                    });
                    this.goodsList.splice($index,1);
                }
            });
        },

        convertGoods($data){
            let g_header=[],g_desc=[];
            for(let item of $data.g_header){
                g_header.push({
                    id:item.id,
                    key:item.f_key
                });
            }
            for(let item of $data.g_desc){
                g_desc.push({
                    id:item.id,
                    key:item.f_key
                });
            }
            this.goods={
                id:$data.id,
                g_type:$data.g_type,
                g_header:g_header,
                g_title:$data.g_title,
                g_price_now:$data.g_price_now,
                g_price_old:$data.g_price_old,
                g_desc:g_desc,
                g_sales:$data.g_sales,
            };
        },
        deleteHeaderItem($index){
            this.goods.g_header.splice($index,1);
        },
        deleteDescItem($index){
            this.goods.g_desc.splice($index,1);
        },

        showDialog($type){
            this.currentAct=$type;
            this.dialogStatus=true;
        },
        resetGoods(){
            this.goods={
                id:0,
                g_type:'',
                g_header:[],
                g_title:'',
                g_price_now:'',
                g_price_old:'',
                g_desc:[],
                g_sales:0,
            }
        }

    }
}

</script>

<style>

.el-aside{
    background: #545c64;
}
.el-col{
    height: 100%;
}
#content{
    height: 100%;
    overflow: auto;
}
.el-container{
    height: 100%;
    overflow: auto;
}
.el-main{
    height: 100%;
    overflow: auto;
}
.goodsList ul{
    list-style: none;
    padding: 0;
    margin: 0;
    color: #fff;
    cursor: pointer;
}
.goodsList li img{
    width: 100%;
    height: 100px;
}
.goodsList li:hover{
    background: #0088cc
}
.goodsList p{
    padding-left: 3px;
    margin: 3px;
}
button{
    outline: none
}
button:focus{
    outline: 0;
}
.el-dialog__body{
    padding:0px 20px;
}
.fooderItem-box{
    position: relative;
    width: 25%;
    height: 100px;
    float: left;
    border:2px solid #fff;
    overflow: hidden
}
.fooderItem-box:hover{
    width: 25%;
    height: 100px;
    float: left;
    border:2px solid #0088cc;
    
}
.pre-pic{
    position: absolute;
    top: 0;
    left: 0;
    padding:0px 5px;
    background: #0088cc;
    color: #fff;
    opacity: 0.6;
}
.pre-pic:hover{
    opacity: 1;
    cursor: pointer;
}
</style>
