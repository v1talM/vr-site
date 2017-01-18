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
                    <ul class="nav navbar-nav navbar-right" v-if="!vrUser.user || !vrUser.user.access_token">
                        <li><router-link to="/login" class="login-btn">登 录</router-link></li>
                        <li><router-link to="/signup" class="signup-btn">加入 VR-Pano</router-link></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" v-if="vrUser.user && vrUser.user.access_token">
                        <li class="dropdown">
                            <a class="dropdown-toggle user-info"
                               data-toggle="dropdown"
                               role="button"
                               aria-expanded="false"
                               href="#"
                            >
                                <img class="user-avatar" src="./../../imgs/login-w-icon.png">
                                {{ vrUser.user.name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#" @click.prevent="handleLogout()"> <i class="fa fa-window-close-o"></i>  退出登录 </a>
                                </li>

                            </ul>
                        </li>

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
        background-color: transparent;
        color: #1c1c1c;
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
    .navbar-nav > li > a.user-info{
        padding: 5.5px 15px;
        line-height: 30px;
    }
    img.user-avatar{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 5px;
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
    .nav .open > a, .nav .open > a:hover, .nav .open > a:focus{
        background-color: #18bc9c !important;
        color: #fff !important;
    }
    .navbar-nav > li > .dropdown-menu{
        margin-top: 5px;
        border: none;
        border-radius: 0 !important;
        min-width: 140px;
    }
    .dropdown-menu > li > a{
        padding: .55rem 1.5rem;
        font-weight: bold;
        font-size: 14px;
    }
    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus{
        background-color: #18bc9c;
    }
</style>
<script>
    import {mapState} from 'vuex'
    export default{
        computed: mapState({
            vrUser: state => state.vrUser
        }),
        methods: {
            handleLogout () {
                window.localStorage.removeItem('authUser')
                this.$store.dispatch('clearAuthUser')
                this.$router.push({name: 'login'})
            }
        }
    }
</script>
