<template>
    <div>
        <navbar></navbar>
        <jumbotron></jumbotron>
        <features></features>
        <profile></profile>
    </div>
</template>

<script>
    import navbar from './../components/navbar.vue'
    import jumbotron from './../components/Jumbotron.vue'
    import features from './../components/Features.vue'
    import profile from './../components/Profile.vue'
    export default {
        components: {
            navbar, jumbotron, features, profile
        }
    }
</script>
