<template>
    <div>
        <navbar></navbar>
        <jumbotron></jumbotron>
    </div>
</template>

<script>
    import navbar from './../components/navbar.vue'
    import jumbotron from './../components/Jumbotron.vue'
    export default {
        components: {
            navbar, jumbotron
        }
    }
</script>
