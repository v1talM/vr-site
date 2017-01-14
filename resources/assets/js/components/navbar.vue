<template>
    <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">VR-Pano</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">项目展示</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><router-link to="/login" class="login-btn">登 录</router-link></li>
                        <li><router-link to="/signup" class="signup-btn">加入 VR-Pano</router-link></li>
                    </ul>
                </div>
            </div>
        </nav>
</template>
<style>
    .navbar{
        border-radius: 0;
        padding: 30px 0;
        margin-bottom: 0;
        min-height: 50px;
        transition: all .5s;
    }
    .scrolled .navbar{
        border-radius: 0;
        padding: 15px 0;
        margin-bottom: 0;
        min-height: 50px;
        background-color: #fff;
        opacity: .9;
    }
    .navbar-brand{
        height: 42px;
        padding: 10.5px 15px;
    }
    .navbar-brand, .navbar-nav > li > a{
        color: #eaeaea;
        font-weight: bold;
    }

    .scrolled .navbar-brand {
        color: #004a3c;
    }
    .scrolled .navbar-nav > li > a{
        color: #666;
    }
    .navbar-brand, .nav > li > a:hover, .nav > li > a:focus{
        background-color: transparent;
        color: #fff;
    }
    .scrolled .nav > li > a:hover, .scrolled .nav > li > a:focus{
        background-color: transparent !important;
        color: #1c1c1c !important;
    }
    .navbar-nav > li > a.signup-btn {
        border: 1px solid #fff;
        border-radius: 1px;
        padding: 9.5px 15px;
    }
    .scrolled .navbar-nav > li > a.signup-btn {
        background-color: #18bc9c;
        color: #fff !important;
        border-color: #18bc9c;
        padding: 9.5px 15px;
    }
    .scrolled .navbar-nav > li > a.signup-btn:hover, .navbar-nav > li > a.signup-btn:hover {
        background-color: #18bc9c !important;
        color: #fff !important;
        border-color: #18bc9c;
    }
    @media (min-width: 768px){
        .navbar-nav > li > a{
            padding: 10.5px 20px;
        }
        .navbar-nav.navbar-left{
            margin-left: 40px;
        }
    }

</style>
<script>
    export default{
    }
</script>
