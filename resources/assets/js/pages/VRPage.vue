<template>
    <div style="height: inherit">
        <navbar></navbar>
        <pano></pano>
        <control></control>
    </div>
</template>
<style>

</style>
<script>
    import Pano from './../components/vr/Pano.vue'
    import navbar from './../components/navbar.vue'
    import Control from './../components/vr/Control.vue'
    export default{
        components:{
            navbar, Pano, Control
        }
    }
</script>
