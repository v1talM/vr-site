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

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Contact</a></li>
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
        height: 50px;
        padding: 14.5px 15px;
    }
    .navbar-brand, .navbar-nav > li > a{
        color: #eaeaea;
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
    @media (min-width: 768px){
        .navbar-nav > li > a{
            padding: 14.5px 15px;
        }
    }

</style>
<script>
    export default{
    }
</script>
