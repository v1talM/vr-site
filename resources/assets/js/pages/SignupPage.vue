<template>
    <div id="signup">

        <navbar></navbar>
        <signup></signup>

    </div>
</template>
<style>
    #signup {
        height: auto;
        min-height: 100%;
        background-color: #3598DC;
        padding: 25px 0;
    }
</style>
<style>
    @import './../../css/font-awesome.css'
</style>
<script>
    import navbar from './../components/navbar.vue'
    import signup from './../components/signup/Signup.vue'
    export default{
        mounted () {
            let app = document.getElementById('signup')
            let o_width = window.innerWidth
            if(o_width >= 768) {
                app.style.height = window.innerHeight + 'px'
            }
        },
        components: {
            navbar, signup
        }
    }
</script>
