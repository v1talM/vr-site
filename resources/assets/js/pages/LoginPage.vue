<template>
    <div id="login">
        <navbar></navbar>
        <login></login>
    </div>
</template>
<style>
    #login {
        height: 100%;
        background-color: #3598DC;
        padding-top: 35px;
    }
</style>
<style>
    @import './../../css/font-awesome.css'
</style>
<script>
    import navbar from './../components/navbar.vue'
    import login from './../components/Login.vue'
    export default{
        components: {
            navbar, login
        }
    }
</script>
