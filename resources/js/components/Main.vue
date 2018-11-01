<template>
    <div id="main">
        <wx-header></wx-header>
        <router-view></router-view>
    </div>
</template>

<script>
import wxHeader from './main/wxHeader.vue';
export default {
    name:'Container',
    components:{
        wxHeader,
    }
}
</script>

<style>
    
</style>



