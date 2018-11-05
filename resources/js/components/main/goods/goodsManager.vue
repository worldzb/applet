<template>
    <div id="content">
        <el-container>
            <el-aside width="200px">
                <el-button style="width:100%;height:60px;border:dashed 1px #333" @click="createGoods()">
                    <i class="fa fa-plus"></i>
                </el-button>
            </el-aside>
            <el-main>
                <el-row :gutter="20">
                    <el-col :span="6" style="height:800px;overflow:auto">
                        <el-row :gutter="10" v-for="(item, index) in lib.data" :key="item.id"> 
                            <el-col :span="8">
                                <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.f_key" class="image" style="width:100%">
                            </el-col>
                            <el-col :span="3">
                                <span><strong>key:</strong>{{ item.f_key }}</span> <br>
                                <span><strong>hash:</strong>{{ item.f_hash }}</span>
                                <el-button type="text" class="button">删除</el-button>
                            </el-col>
                        </el-row>
                    </el-col>
                    <el-col :span="7">
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
                                <el-input placeholder="头图地址key" v-model="temp.g_header">
                                    <template slot="prepend">key</template>
                                </el-input>
                                <el-button @click="addGHeader()">添加头图</el-button>
                                <el-button @click="goods.g_header=[]">清空</el-button>
                            </el-form-item>
                            <el-form-item label="添加头图" prop="name">
                                <el-input placeholder="描述地址key" v-model="temp.g_desc">
                                    <template slot="prepend">key</template>
                                </el-input>
                                <el-button @click="addGDesc()">添加描述</el-button>
                                <el-button @click="goods.g_desc=[]">清空</el-button>
                            </el-form-item>
                            <el-button @click="addGoods()">确认添加</el-button>
                            <text v-for="item in goods.g_header" :key="item.id">
                                {{item}}
                            </text>
                        </el-form>
                    </el-col>
                    <el-col :span="7">
                        <div style="border:1px solid #999">
                            <h4 style="border-bottom:1px solid #999;padding:10px">预览</h4>
                            <el-carousel height="150px">
                                <el-carousel-item v-for="item in goods.g_header" :key="item.id">
                                    {{item.key}}
                                    <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.key" alt="xvx">
                                </el-carousel-item>
                            </el-carousel>
                            <br><br>
                            <div v-for="item in goods.g_desc" :key="item.id">
                                <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.key" alt="xvx">
                            </div>
                        </div>
                    </el-col>
                </el-row>
            </el-main>
        </el-container>

    </div>
</template>

<script>
const PATH='http://api.jinggangym.com/api/';
export default {
    data(){
        return {
            dialogVisible:false,
            activeName:'',
            //商品滚动头图
            goods:{
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
            lib:[],
        }
    },
    created(){
        axios.get(PATH+'getFodderList',{}).then((res)=>{
            this.lib=res.data;
        });
    },
    methods:{
        createGoods(){
            this.$message({
                message: this.config.PATH,
                type: 'success'
            });
        },
        handleClose(){
            
        },
        handleClick(){
            console.log('fdsafa');
        },
        addGoods(){
            console.log(this.goods);
            axios.post(this.config.PATH+'goods',this.goods).then(()=>{
                
            });

            this.$message({
                message: '添加成功',
                type: 'success'
            });
        },
        addGHeader(){
            //console.log(this.temp.g_header);
            axios.get(this.config.PATH+'checkPic',{
                params:{
                    key:this.temp.g_header
                }
            }).then((res)=>{
                if(res){
                    this.goods.g_header.push({
                        id:res.data.id,
                        key:res.data.f_key
                    });
                }
            });
           
        },
        addGDesc(){
             axios.get(this.config.PATH+'checkPic',{
                params:{
                    key:this.temp.g_desc
                }
            }).then((res)=>{
                console.log(res.data);
                if(res){
                    this.goods.g_desc.push({
                        id:res.data.id,
                        key:res.data.f_key
                    });
                }
            });
        },
    }
}
</script>

<style>

</style>
