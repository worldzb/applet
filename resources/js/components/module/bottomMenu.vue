<template>
    <div id="bottom-menu">
        <ul class="list-unstyled bm-ul">
            <router-link to="/home">
                <li>
                    <i class="fa fa-home"></i><br>
                    <small>
                    主页
                    </small>
                </li>
            </router-link>
            <router-link to="/add">
                <li>
                    <i class="fa fa-plus"></i><br>
                    <small>
                        添加
                    </small>
                </li>
            </router-link>
            <router-link to="/search">
                <li> 
                    <i class="fa fa-search"></i><br>
                    <small>
                        搜索
                    </small>
                </li>
            </router-link> 
            <router-link to="/about">
                <li> 
                    <i class="fa fa-cog"></i><br>
                    <small>设置</small>
                </li>
            </router-link> 
        </ul>
       
    </div>
</template>

<script>
export default {
    created(){
        console.log(this.$router);
    }
}
</script>

<style lang="scss" scoped type="text/css">

$height:45px;
#bottom-menu{
    display: block;
    position: fixed;
    bottom: 0;
    width:100%;
    height: $height;
    padding: 5px;
    background: #eee;
    border-top: #ccc 1px solid;
    padding: 0;
    margin: 0;
    .bm-ul{
        height: $height;
        a{
            li{
                width: 25%;
                height: 100%;
                line-height: 16px;
                float: left;
                text-align: center;
                border-left: 1px solid #fff;
                i{
                    margin-top: 5px;
                    line-height: 23px;
                    font-size: 22px
                }
            }
        }
        
    }
}
.router-link-active {
    color: #333;
}
</style>
