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
                <template slot="title"><i class="el-icon-document"></i>文件</template>
                <el-menu-item index="1-1">
                   <i class="fa fa-file-o"> &nbsp;</i> 新建文件
                </el-menu-item>
                <el-menu-item index="1-2">
                   <i class="fa fa-folder-open-o"> &nbsp;</i>打开文件
                </el-menu-item>
                <el-menu-item index="1-3">
                    <i class="fa fa-save"> &nbsp;</i> 保存
                </el-menu-item>
                <el-menu-item index="1-4">
                    <i class="fa fa-download"> &nbsp;</i> 导出
                </el-menu-item>
            </el-submenu>
            <el-submenu index="2">
                <template slot="title"><i class="el-icon-edit"></i> 编辑</template>
                <el-menu-item index="2-1">
                    <i class="fa fa-copy"> &nbsp;</i> 复制
                </el-menu-item>
                <el-menu-item index="2-2">
                    <i class="fa fa-paste"> &nbsp;</i> 粘贴
                </el-menu-item>
            </el-submenu>
            <el-submenu index="3">
                <template slot="title"><i class="el-icon-setting"></i> 设置</template>
                <el-menu-item index="3-1">
                    <i class="fa fa-table"> &nbsp;</i> 表格设置
                </el-menu-item>
            </el-submenu>

            <el-submenu index="4">
                <template slot="title"><i class="fa fa-plug">&nbsp;</i> 插件</template>
                <el-menu-item index="4-1">
                    <i class="fa fa-subscript"> &nbsp;</i> 公式参考
                </el-menu-item>
                <el-menu-item index="4-2">
                    <i class="fa fa-chain"> &nbsp;</i> 数据加载
                </el-menu-item>
            </el-submenu>

             <el-submenu index="5">
                <template slot="title"><i class="el-icon-info"></i> 帮助</template>
                <el-menu-item index="5-1">
                    <i class="fa fa-about"> &nbsp;</i> 关于
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
    },
    components:{
       
    }
}

</script>

<style rel="stylesheet/scss" lang="scss">
    
</style>
