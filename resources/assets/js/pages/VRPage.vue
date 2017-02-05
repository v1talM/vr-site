<template>
    <div style="height: inherit">
        <navbar></navbar>
        <pano></pano>
    </div>


</template>
<style>

</style>
<script>
    import Pano from './../components/vr/Pano.vue'
    import navbar from './../components/navbar.vue'
    export default{
        data(){
            return{

            }
        },
        components:{
            navbar, Pano
        }
    }
</script>
