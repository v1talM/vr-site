<template>
    <div class="container">
        <div class="row">
            <form @submit.prevent="handleRegistUser()"
                    class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="row">
                    <h1>
                        <i class="fa fa-flag"></i>
                        加入 VR-Pano
                    </h1>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">
                            <i class="fa fa-user"></i>
                        </label>
                        <div class="col-sm-11">
                            <input
                                    class="form-control"
                                    autocomplete="off"
                                    placeholder="输入您的昵称"
                                    type="text"
                                    v-model="name"
                                    required="required"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">
                            <i class="fa fa-envelope-o"></i>
                        </label>
                        <div class="col-sm-11">
                            <input
                                    class="form-control"
                                    autocomplete="off"
                                    placeholder="输入您的邮箱地址"
                                    type="email"
                                    v-model="email"
                                    required="required"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">
                            <i class="fa fa-key"></i>
                        </label>
                        <div class="col-sm-11">
                            <input
                                    class="form-control"
                                    placeholder="输入您的登录密码"
                                    type="password"
                                    v-model="password"
                                    required="required"
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">
                            <i class="fa fa-key"></i>
                        </label>
                        <div class="col-sm-11">
                            <input
                                    class="form-control"
                                    placeholder="确认您的登录密码"
                                    type="password"
                                    v-model="password_confirmation"
                                    required="required"
                            >
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg"> 注册账号 </button>
                    <p>已有账号？ <router-link to="/login">立即登录</router-link>   </p>
                </div>

            </form>
        </div>
    </div>

</template>
<style>
#signup form {
    color: #FEFEFE;
    padding: 35px 0 35px 0;
}
#signup .row {
    padding: 15px 80px 15px 80px;
}
@media(max-width: 768px){
    #signup .row {
        padding: 15px;
    }
}
#signup h1 {
    font-family: Roboto, Helvetica, Arial, sans-serif;
    font-weight: normal;
    margin-bottom: 1.4em;
    text-align: center;
}
#signup p {
    text-align: center;
}
#signup .container a {
    text-align: center;
    font-weight: bold;
    color: white;
}
#signup a:hover {
    color: #CCC;
}
#signup .btn-lg {
    min-width: 100%;
    border-radius: 0;
    margin-top: 1em;
    margin: 1em 0;
    background: white;
    color: #3598DC;
    border: none;
    padding: 10px 15px;
}
#signup .form-group{
    margin-bottom: 25px;
    border-bottom: 1px solid white;
    min-height: 40px;
}
#signup label{
    font-size: 1.6em;
}


#signup  input{
    border: none;
    border-radius: 0;
    background: none;
    color: white;
    box-shadow: none;
}
#signup  input:focus{
    box-shadow: none;
}
#signup input:-webkit-autofill{
    background-color: transparent !important;
}
</style>
<script>
    import api from './../api'
    import {mapState, mapActions} from 'vuex'
    export default{
        computed: mapState({
            $loadingRouteData: state => state.vrStore.loadingRouteData
        }),
        data () {
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        },

        methods: {
            ...mapActions([
                'setLoadingRouteData', 'unsetLoadingRouteData', 'setShowModal', 'setModalContent'
            ]),
            clearStatus () {
                this.name = ''
                this.email = '',
                this.password = '',
                this.password_confirmation = ''
            },
            handleRegistUser () {
                this.setLoadingRouteData()
                const userObj = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }
                api.registUser(userObj).then( response => {
                    this.unsetLoadingRouteData()
                    const content = {
                        header: 'Message!',
                        body: [response.body.info]
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                    this.clearStatus()
                }).catch( error => {
                    this.unsetLoadingRouteData()
                    const content = {
                        header: 'Oops!',
                        body: error.body
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                });
            }
        }

    }
</script>
