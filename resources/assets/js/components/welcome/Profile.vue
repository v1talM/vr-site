<template>
    <section id="profile">
        <div class="profile-bg"></div>
        <div class="profile-container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center profile-title">精彩推荐</h1>
                    <p class="text-center profile-sub">We create quality products</p>
                </div>
                <div class="col-md-12">
                    <div id="profile-example" class="carousel slide " data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#profile-example"
                                v-bind:data-slide-to="index - 1"
                                v-bind:class="[index == 1 ? 'active' : '']"
                                v-for="(index, item) in carouselItem"
                            ></li>
                        </ol>
                        <div class="container">
                            <div class="carousel-inner " role="listbox">
                                <div class="item" v-bind:class="[index == 1?'active':'']" v-for="(index, item) in carouselItem">
                                    <div class="col-md-3 col-sm-12 col-xs-12" v-for="vr in itemVRList(index)">
                                        <div class="panel profile-panel">
                                            <div class="panel-heading">
                                                <img v-bind:src="vr.pro_thumb" class="img img-responsive">
                                            </div>
                                            <div class="panel-body text-center">
                                                <h4>{{ vr.pro_title }}</h4>
                                                <p>{{ vr.user.name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Wrapper for slides -->
                        <!-- Controls -->
                        <a class="left carousel-control" href="#profile-example" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#profile-example" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </section>
</template>
<style>
    #profile {
        overflow: hidden;
        position: relative;
        padding: 100px 0;
        padding-top: 160px;
    }
    .profile-bg:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(to bottom right,#002f4b,#000000);
        filter: gray;
        opacity: .7;
    }
    .profile-bg {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 0;
        background-image: url('./../../../imgs/profile-bg.jpg');
        overflow: hidden;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    .profile-container .col-md-3 {
        padding-left: 0;
        padding-right: 0;
    }
    #profile .panel.profile-panel {
        padding: 1rem 0;
        background-color: transparent;
        border: none;
    }
    #profile .profile-panel .panel-heading{
        padding: 0;
        border: none;
        border-radius: 0;
        width: 100%;
        height: 100%;
        overflow:hidden;
    }
    #profile .profile-panel .panel-heading img {
        -webkit-filter: grayscale(50%); /* Chrome, Safari, Opera */
        filter: grayscale(50%);
        transition: all .4s ease;
    }
    #profile .profile-panel .panel-body {
        color: #eaeaea;
        background-color: rgba(0,0,0,.8);
        transition: all .3s linear;
    }
    #profile .profile-panel:hover .panel-body{
        background-color: #18bc9c;
    }
     #profile .panel-heading:hover img {
        -webkit-filter: grayscale(0%);
        filter: grayscale(0%);
        transform: scale(1.05);
    }
    #profile .profile-title{
        text-align: center;
        margin-top: 0;
        font-size: 28px;
        font-weight: 300;
        margin-bottom: 15px;
        line-height: 1em;
        letter-spacing: 2px;
        color: #fff;
    }
    #profile .profile-sub {
        margin: 0;
        font-size: 16px;
        color: #eaeaea;
        font-style: italic;
        letter-spacing: 1px;

    }
    .carousel-control {
        width: 7.5%;
    }

    .carousel-indicators {
        bottom: -1rem;
    }
    .carousel-indicators li{
        width: 25px;
        height: 2px;
        border-radius: 0;
        border: 0;
        background-color: #fff;
        margin: 0 2px;
    }
    .carousel-indicators .active{
        background-color: #18bc9c;
        width: 25px;
        height: 2px;
        margin: 0 2px;
    }
    .carousel-control.left, .carousel-control.right {
        background-image: none;
    }
</style>
<script>
    import api from './../../api'
    import {featuredPerPage} from './../../env'
    export default{
        data () {
            return {
                featuredVR: []
            }
        },
        computed: {
            carouselItem () {
                return this.featuredVR.length / featuredPerPage
            }
        },
        created () {
            api.getFeaturedVRList().then( response => {
               this.featuredVR = response.data
            })
        },
        methods: {
            itemVRList (index) {
                return this.featuredVR.slice((index - 1) * featuredPerPage, index * featuredPerPage)
            }
        }
    }
</script>
