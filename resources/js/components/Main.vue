<template>
    <div id="main">
        <layout>
            <wx-header slot="wx-header"></wx-header>
            <router-view slot="router-view"> </router-view>
        </layout>
    </div>
</template>

<script>
import wxHeader from './main/wxHeader.vue';
import layout from './common/layout.vue';
export default {
    name:'Container',
    components:{
        wxHeader,
        layout
    }
}
</script>

<style>
    
</style>



