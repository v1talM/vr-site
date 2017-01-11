<template>
    <section id="profile">
        <div class="profile-bg"></div>
        <div class="container profile-container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center profile-title">精彩推荐</h1>
                    <p class="text-center profile-sub">We create quality products</p>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel profile-panel">
                        <div class="panel-heading">
                            <img src="./../../imgs/city1.jpg" class="img img-responsive">
                        </div>
                        <div class="panel-body text-center">
                            <h4>The magic city</h4>
                            <p>Ian Vital</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel profile-panel">
                        <div class="panel-heading">
                            <img src="./../../imgs/city2.jpg" class="img img-responsive">
                        </div>
                        <div class="panel-body text-center">
                            <h4>The magic city</h4>
                            <p>Ian Vital</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel profile-panel">
                        <div class="panel-heading">
                            <img src="./../../imgs/city3.jpg" class="img img-responsive">
                        </div>
                        <div class="panel-body text-center">
                            <h4>The magic city</h4>
                            <p>Ian Vital</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel profile-panel">
                        <div class="panel-heading">
                            <img src="./../../imgs/city1.jpg" class="img img-responsive">
                        </div>
                        <div class="panel-body text-center">
                            <h4>The magic city</h4>
                            <p>Ian Vital</p>
                        </div>
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
        background-image: url('./../../imgs/profile-bg.jpg');
        overflow: hidden;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
    }
    .profile-container .col-md-3 {
        padding-left: 0;
        padding-right: 0;
    }
    .panel.profile-panel {
        padding: 100px 0;
        background-color: transparent;
        border: none;
    }
    .profile-panel .panel-heading{
        padding: 0;
        border: none;
        border-radius: 0;
        width: 100%;
        height: 100%;
        overflow:hidden;
    }
    .profile-panel .panel-heading img {
        -webkit-filter: grayscale(50%); /* Chrome, Safari, Opera */
        filter: grayscale(50%);
        transition: all .4s ease;
    }
    .profile-panel .panel-body {
        color: #eaeaea;
        background-color: rgba(0,0,0,.8);
        transition: all .3s linear;
    }
    .profile-panel:hover .panel-body{
        background-color: #18bc9c;
    }
     .panel-heading:hover img {
        -webkit-filter: grayscale(0%);
        filter: grayscale(0%);
        transform: scale(1.05);
    }
    .profile-title{
        text-align: center;
        margin-top: 0;
        font-size: 28px;
        font-weight: 300;
        margin-bottom: 15px;
        line-height: 1em;
        letter-spacing: 2px;
        color: #fff;
    }
    .profile-sub {
        margin: 0;
        font-size: 16px;
        color: #eaeaea;
        font-style: italic;
        letter-spacing: 1px;

    }
</style>
<script>
    export default{

    }
</script>
