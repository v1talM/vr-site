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
    import jumbotron from './../components/Jumbotron.vue'
    import features from './../components/Features.vue'
    import profile from './../components/Profile.vue'
    import introduce from './../components/Introduce.vue'
    import start from './../components/Start.vue'
    import copyright from './../components/Footer.vue'

    export default {
        components: {
            navbar, jumbotron, features, profile, introduce, start, copyright
        }
    }
</script>
