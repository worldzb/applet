<template>
    <div class="main" ref="main">
        <div class="header" ref="header">
            <slot name="wx-header"></slot>
        </div>
        <div class="body" ref="body">
            <slot name="router-view"></slot>
        </div>
    </div>
</template>

<script>

export default {
    watch:{
    
    },
    created(){
        
    },
    mounted(){
        this.$refs.main.style.height=window.innerHeight+'px';
        this.$refs.main.style.width=window.innerWidth+'px';
        this.$refs.body.style.height=(window.innerHeight-61)+'px';
        window.onresize = () => {
            this.$refs.main.style.height=window.innerHeight+'px';
            this.$refs.main.style.width=window.innerWidth+'px';
        }
    },
    
}
</script>

<style Scoped>
.main{
    background:red;
}
.header{
    height: 61px;
}
.body{
    background: #fff;
    overflow: auto;
}
</style>
