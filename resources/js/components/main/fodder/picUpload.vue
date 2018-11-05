<template>
    <div>
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

        <el-dialog :visible.sync="dialogVisible">
            <img width="100%" :src="dialogImageUrl" alt="">
        </el-dialog>

        <el-row>
            <el-col :span="4" v-for="(item, index) in lib.data" :key="item.id">
                <el-card :body-style="{ padding: '0px', overflow:'hidden' }">
                    <img :src="'http://phg4we4j7.bkt.clouddn.com/'+item.f_key" class="image">
                    <div style="padding: 14px;">
                        <span><strong>key:</strong>{{ item.f_key }}</span> <br>
                        <span><strong>hash:</strong>{{ item.f_hash }}</span>
                        <div class="bottom clearfix">
                        <time class="time">{{ item.created_at }}</time>
                        <el-button type="text" class="button">删除</el-button>
                        </div>
                    </div>
                </el-card>
            </el-col>
        </el-row>
    </div>
    
</template>

<script>
//https://jsonplaceholder.typicode.com/posts/

const PATH='https://api.jinggangym.com/api/';
export default {
    data(){
        return {
            dialogImageUrl: '',
            dialogVisible: false,
            token:{},
            lib:[],
        }
    },
    created(){
        //获取上传token
        axios.get(PATH+'getToken',{}).then((res)=>{
            this.token={
                token:res.data
            };
        });
        axios.get(PATH+'getFodderList',{}).then((res)=>{
            this.lib=res.data;
        });

    },
    methods:{
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePictureCardPreview(file) {
            this.dialogImageUrl = file.url;
            this.dialogVisible = true;
        },
        handlePicUpSuccess(response, file, fileList){
            axios.post(PATH+'picUpload',{...response}).then(()=>{

            });
        }
    }
    
}
</script>

<style>
 .time {
    font-size: 13px;
    color: #999;
  }
</style>
