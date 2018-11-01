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
                    <el-col :span="10">
                        <el-form label-width="100px" class="demo-ruleForm">
                            <el-form-item label="标题" prop="name">
                                <el-input v-model="goods.g_title"></el-input>
                            </el-form-item>
                            <el-form-item label="现价" prop="name">
                                <el-input v-model="goods.g_price_now"></el-input>
                            </el-form-item>
                            <el-form-item label="原价" prop="name">
                                <el-input v-model="goods.g_price_old"></el-input>
                            </el-form-item>
                            <el-form-item label="描述" prop="name">
                                <el-input v-model="goods.g_desc"></el-input>
                            </el-form-item>
                            <el-form-item label="销量" prop="name">
                                <el-input v-model="goods.g_sales"></el-input>
                            </el-form-item>

                        </el-form>
                    </el-col>
                    <el-col :span="10">
                        <div style="border:1px solid #999">
                            <h4 style="border-bottom:1px solid #999;padding:10px">预览</h4>
                            <el-carousel height="150px">
                                <el-carousel-item v-for="item in carousel_data" :key="item">
                                    <img :src="item" alt="">
                                </el-carousel-item>
                            </el-carousel>
                        </div>
                    </el-col>
                </el-row>
            </el-main>
        </el-container>

        
    </div>
</template>

<script>
export default {
    data(){
        return {
            dialogVisible:false,
            activeName:'',
            //商品滚动头图
            goods:{
                g_header:[],
                g_title:'',
                g_price_now:'',
                g_price_old:'',
                g_desc:[],
                g_sales:0,
            }

        }
    },
    created(){
        
    },
    methods:{
        createGoods(){
            this.$message({
                message: '恭喜你，这是一条成功消息',
                type: 'success'
            });
        },
        handleClose(){
            
        },
        handleClick(){
            console.log('fdsafa');
        }
    }
}
</script>

<style>

</style>
