<template>
    <div id="st-header">
        <el-menu :default-active="activeIndex2" 
        mode="horizontal" 
        background-color="#545c64"
        text-color="#fff"
        active-text-color="#ffd04b" 
        @select="handleSelect"
        unique-opened
        menu-trigger="click">
            <el-submenu index="1">
                <template slot="title"><i class="el-icon-document"></i>素材</template>
                    <el-menu-item index="1-1" @click="to('fodder')">
                        <i class="fa fa-folder"> &nbsp;</i> 素材管理
                    </el-menu-item>
            </el-submenu>
            <el-submenu index="2">
                <template slot="title"><i class="el-icon-document"></i>项目管理</template>
                <el-menu-item index="2-1" @click="to('goods')">
                   <i class="fa fa-folder-open-o"> &nbsp;</i>项目管理
                </el-menu-item>
            </el-submenu>
        </el-menu>

    </div>
</template>

<script>

export default{
    data() {
        return {
            activeIndex: '1',
            activeIndex2: '1',
        };
    },
    updated(){
        
    },
    methods: {
        handleSelect(key, keyPath) {

        },
        openDialog(key,value){

        },
        to(target){
            console.log(target);
            this.$router.push(target);
        }
    },
    components:{
       
    }
}

</script>

<style rel="stylesheet/scss" lang="scss">
    
</style>
