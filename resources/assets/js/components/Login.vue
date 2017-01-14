<template>
    <div class="container">
        <div class="row">
            <form class="col-xs-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
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
                            <input class="form-control" placeholder="Your account E-mail" type="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label">
                            <i class="fa fa-key"></i>
                        </label>
                        <div class="col-sm-11">
                            <input class="form-control" placeholder="Account password" type="password">
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
#login a {
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

    export default{

    }
</script>
