<template>
    <div class="portfolio-wrapper">
        <navbar></navbar>
        <jumbotron></jumbotron>
        <portfolio></portfolio>
        <copyright></copyright>
    </div>
</template>
<style>
    .portfolio-wrapper{
        background: #fafafa;
    }
</style>
<script>
    import navbar from './../components/navbar.vue'
    import Jumbotron from './../components/portfolio/Jumbotron.vue'
    import Portfolio from './../components/portfolio/Portfolio.vue'
    import Copyright from './../components/Footer.vue'
    export default{
        components:{
            navbar, Jumbotron, Portfolio, Copyright
        }
    }
</script>
