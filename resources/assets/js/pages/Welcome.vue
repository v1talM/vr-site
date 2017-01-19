<template>
    <div>
            <navbar></navbar>
            <jumbotron></jumbotron>
            <features></features>
            <profile></profile>
            <introduce></introduce>
            <start></start>
            <copyright></copyright>
    </div>
</template>
<style>
    @import './../../css/bootstrap.css'
</style>
<script>
    import navbar from './../components/navbar.vue'
    import jumbotron from './../components/welcome/Jumbotron.vue'
    import features from './../components/welcome/Features.vue'
    import profile from './../components/welcome/Profile.vue'
    import introduce from './../components/welcome/Introduce.vue'
    import start from './../components/welcome/Start.vue'
    import copyright from './../components/Footer.vue'
    import loader from './../components/Loader.vue'
    export default {
        components: {
            navbar, jumbotron, features, profile, introduce, start, copyright, loader
        },
        mounted () {
            
        }
    }
</script>
