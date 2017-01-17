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
    import signup from './../components/Signup.vue'
    export default{
        components: {
            navbar, signup
        }
    }
</script>
