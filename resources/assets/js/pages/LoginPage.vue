<template>
    <div id="login">
        <navbar></navbar>
        <login></login>
    </div>
</template>
<style>
    #login {
        min-height: 100%;
        height: auto;
        background-color: #3598DC;
        padding-top: 35px;
    }
</style>
<style>
    @import './../../css/font-awesome.css'
</style>
<script>
    import navbar from './../components/navbar.vue'
    import login from './../components/login/Login.vue'
    export default{
        components: {
            navbar, login
        }
    }
</script>
