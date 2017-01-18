<template>
    <div class="container">
        <div class="row">
            <form @submit.prevent="handleUserLogin()"
                   class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                <div class="row">
                    <h1>
                        <i class="fa fa-lock"></i>
                        登 录
                    </h1>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">
                            <i class="fa fa-envelope-o"></i>
                        </label>
                        <div class="col-sm-11">
                            <input class="form-control"
                                   autocomplete="off"
                                   placeholder="您的登录邮箱"
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
                                    placeholder="您的登录密码"
                                    type="password"
                                    v-model="password"
                                    required="required"
                            >
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg"> 登 录 </button>
                    <p>忘记密码？ <a href="#">点击找回</a>   </p>
                </div>

            </form>
        </div>
    </div>
</template>
<style>
#login form {
    color: #FEFEFE;
    padding: 35px 0 35px 0;
}
#login .row {
    padding: 15px 80px 15px 80px;
}
@media(max-width: 768px){
    #login .row {
        padding: 15px;
    }
}
#login h1 {
    font-family: Roboto, Helvetica, Arial, sans-serif;
    font-weight: normal;
    margin-bottom: 1.4em;
    text-align: center;
}
#login p {
    text-align: center;
}
#login .container a {
    text-align: center;
    font-weight: bold;
    color: white;
}
#login a:hover {
    color: #CCC;
}
#login .btn-lg {
    min-width: 100%;
    border-radius: 0;
    margin-top: 1em;
    margin: 1em 0;
    background: white;
    color: #3598DC;
    border: none;
    padding: 10px 15px;
}
#login .form-group{
    margin-bottom: 25px;
    border-bottom: 1px solid white;
    min-height: 40px;
}
#login label{
    font-size: 1.6em;
}


#login  input{
    border: none;
    border-radius: 0;
    background: none;
    color: white;
    box-shadow: none;
}
#login  input:focus{
    box-shadow: none;
}
#login input:-webkit-autofill{
    background-color: transparent !important;
}

</style>
<script>
    import {mapState, mapActions} from 'vuex'
    import {getHeader} from './../config'
    export default{
        computed: mapState({
           user: state => state.vrUser.user,
           $loadingRouteData: state => state.vrStore.loadingRouteData
        }),
        data () {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            ...mapActions([
                'setLoadingRouteData',
                'unsetLoadingRouteData',
                'setShowModal',
                'setModalContent',
                'loginUser',
                'getUserData',
            ]),
            handleUserLogin () {
                const userObj = {
                    'email': this.email,
                    'password': this.password
                }
                const authUser = {}
                this.setLoadingRouteData()
                this.loginUser(userObj).then( response => {
                    if( response.status === 200){
                        authUser.access_token = response.body.access_token
                        authUser.refresh_token = response.body.refresh_token
                        window.localStorage.setItem('authUser', JSON.stringify(authUser))
                        const headers = getHeader()
                        this.getUserData(headers).then( response => {
                            authUser.email = response.body.email
                            authUser.name = response.body.name
                            window.localStorage.setItem('authUser', JSON.stringify(authUser))
                            this.$store.dispatch('setAuthUser', authUser)
                            this.unsetLoadingRouteData()
                            this.$router.push({ name: 'home' })
                        }).catch( error => {
                            this.unsetLoadingRouteData()
                            const content = {
                                header: 'Oops!',
                                body: error.body
                            }
                            this.setModalContent(content)
                            this.setShowModal()
                        })
                    }
                }).catch( error => {
                    this.unsetLoadingRouteData()
                    const content = {
                        header: '登录失败!',
                        body: ['请检查用户名和密码是否正确']
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                })

            }
        }
    }
</script>
