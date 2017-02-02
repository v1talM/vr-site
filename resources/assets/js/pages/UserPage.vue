<template>
    <div class="user-wrapper">
        <navbar></navbar>
        <user-header></user-header>
        <user-main></user-main>
        <copyright></copyright>
    </div>
</template>
<style>
    .user-wrapper{

    }
</style>
<script>
    import Navbar from './../components/navbar.vue'
    import UserHeader from './../components/user/Header.vue'
    import UserMain from './../components/user/Main.vue'
    import Copyright from './../components/Footer.vue'
    export default{
        components: {
            Navbar, UserHeader, UserMain, Copyright
        }
    }
</script>
