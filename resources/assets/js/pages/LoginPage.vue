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
        mounted () {
            let app = document.getElementById('login')
            let o_width = window.innerWidth
            if(o_width >= 768) {
                app.style.height = window.innerHeight + 'px'
            }
        },
        components: {
            navbar, login
        }
    }
</script>
