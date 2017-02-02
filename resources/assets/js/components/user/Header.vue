<template>
    <div class="user-heading-jumb">
        <div class="container">
            <div class="jumb-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="img img-responsive avatar" src="./../../../imgs/city3.jpg">
                            </div>
                            <div class="col-sm-8">
                                <div class="media-body">
                                    <h3 class="user-name">
                                        Ian Vital
                                    </h3>
                                    <div class="user-info-detail">
                                        <span class="item"> <i class="fa fa-map-marker"></i> 雅安市</span>
                                        <span class="item"> <i class="fa fa-university"></i> 四川农业大学</span>
                                    </div>
                                    <div class="user-info-edit">
                                        <a class="edit-btn" href="#">上传背景照片</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<style>
    .user-heading-jumb {
        background-image: url('./../../../imgs/background.jpg');
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px 0;
        margin-bottom: 30px;
        position: relative;
    }
    .user-heading-jumb .jumb-content {
        padding: 2em 60px;
        color: #fff;
        text-align: left;
        position: relative;
        margin-top: 13.5px;
        margin-bottom: 20px;
    }
    .user-heading-jumb img.avatar{
        border-radius: 50%;
    }
    .user-heading-jumb .media-body{
        font-size: 12px;
        color: #fff;
    }
    .user-heading-jumb .user-info-detail .item{
        display: block;
        margin-top: 10px;
    }

    .user-info-detail .item i {
        width: 16px;
        height: 16px;
        text-align: center;
        margin-right: 5px;
    }
    .user-info-edit{
        margin-top: 10px;
    }
</style>
<script>
    export default{

    }
</script>
