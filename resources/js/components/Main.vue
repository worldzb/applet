<template>
    <div id="body">
       <cont></cont>
       <bottom-menu></bottom-menu>
    </div>
</template>

<script>
    import hd from './layout/header.vue';
    import cont from './module/content.vue';
    import bottomMenu from './module/bottomMenu.vue';
    export default {
        components:{
            hd,
            
            cont,
            bottomMenu,
        },
    }
</script>

<style>

</style>

