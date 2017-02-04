<template>
    <div class="user-main container">
        <div class="user-main-content row">
            <div class="col-sm-3">
                <div class="user-info-box">
                    <div class="user-info-panel">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img class="img avatar img-108" src="./../../../imgs/city3.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading user-name">Ian Vital</h4>
                                <div class="media-content user-info-item">
                                    <span class="item">第 1 位会员</span>
                                    <span class="item">注册于 <i class="text-gray">3天前</i></span>
                                    <span class="item">活跃于 <i class="text-gray">今天</i></span>
                                </div>
                            </div>
                            <hr>
                            <div class="user-follow row">
                                <div class="col-xs-4">
                                    <a class="follow-count">0</a>
                                    <a>被关注</a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="favourite-count">0</a>
                                    <a>关注了</a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="profile-count"> 10 </a>
                                    <a>作品数</a>
                                </div>
                            </div>
                            <hr>
                            <div class="user-detail row">
                                <div class="col-xs-4">
                                    <a class="detail-btn"><i class="fa fa-weibo"></i> 微博</a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="detail-btn"><i class="fa fa-weixin"></i> 微信</a>
                                </div>
                                <div class="col-xs-4">
                                    <a class="detail-btn"><i class="fa fa-qq"></i> QQ</a>
                                </div>
                            </div>
                            <hr>
                            <div class="user-edit row">
                                <div class="col-xs-12">
                                    <a class="btn btn-block edit-btn"><i class="fa fa-edit"></i> 编辑个人资料</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-active-box">
                    <div class="user-active-panel">
                        <ul class="list-group">
                            <a href="#" class="user-active-link">
                                <li class="list-group-item"><i class="fa fa-list"></i> Ta 发布的作品</li>
                            </a>
                            <a href="#" class="user-active-link">
                                <li class="list-group-item"><i class="fa fa-comments"></i> Ta 发表的回复</li>
                            </a>
                            <a href="#" class="user-active-link">
                                <li class="list-group-item"><i class="fa fa-smile-o"></i> Ta 关注的用户</li>
                            </a>
                            <a href="#" class="user-active-link">
                                <li class="list-group-item"><i class="fa fa-star-o"></i> Ta 暂过的作品</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <transition name="slide">
                    <router-view></router-view>
                </transition>

            </div>
        </div>
    </div>
</template>
<style>
    .user-main{

    }
    .user-main .user-info-box, .user-main .user-active-box{
        background-color: #fff;
        padding: 10px;
        margin: 0 0 30px 0;
        border: 1px solid #ecf0f1;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }
    .user-main .user-info-box .user-info-panel, .user-main .user-active-box .user-active-panel{
        padding: 10px;
    }
    .img-108{
        width: 108px;
        height: 108px;
    }
    .avatar {
        border-radius: 50%;
        padding: 3px;
        border: 1px solid #ddd;
    }
    .user-info-panel .user-name {
        margin-top: 10px;
        font-size: 20px;
    }
    .user-info-panel .user-info-item{
        font-size: 12px;
    }
    .user-info-panel .user-info-item span {
        margin-top: 10px;
        display: block;
    }
    .user-info-panel .user-info-item span> i {
        font-style: normal;
    }
    .text-gray{
        color: #999;
    }
    .user-info-panel .user-follow a{
        display: block;
        text-align: center;
        font-size: 12px;
        color: #999;
    }
    .user-follow a.follow-count, .user-follow a.favourite-count, .user-follow a.profile-count{
        font-size: 24px;
        color: #18bc9c;
    }
    .user-info-panel a:hover {
        text-decoration: none;
    }
    .user-detail{
        padding: 10px;
    }
    .user-detail .col-xs-4{
        padding-left: 5px;
        padding-right: 5px;
        text-align: center;
    }
    .user-detail .detail-btn{
        font-size: 12px;
        color: #2c3e50;
        padding: 4px 8px;
        border: 1px solid #ddd;
        border-radius: 10px;
        cursor: pointer;
    }
    .user-edit .edit-btn{
        background-color: #18bc9c;
        padding-top: 5px;
        padding-bottom: 5px;
        color: #fff;
        font-size: 14px;
    }
    .user-main .panel, .user-main .panel .panel-heading{
        border-radius: 0;
    }
    .user-active-box .user-active-panel .list-group{
        margin-bottom: 0;
    }
    .user-active-link{
        color: inherit;
        text-decoration: none;
        line-height: 24px;
    }
    .user-active-link:hover{
        text-decoration: none;
    }
    .list-group .list-group-item:first-child{
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
    }
    .list-group .list-group-item:last-child{
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }
    .user-active-link li{
        padding: 10px 15px;
        border: none;
        border-bottom: 1px solid #ecf0f1;
        text-align: center;
    }
    .btn-add-project {
        padding: 5px 10px;
    }
    .slide-enter-active {
      animation: slideInRight .5s;
    }
    .slide-leave-active {
      animation: slideOutLeft .5s;
    }
    @-webkit-keyframes slideInRight {
      from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible;
      }

      to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }

    @keyframes slideInRight {
      from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible;
      }

      to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }
    }
    @-webkit-keyframes slideOutLeft {
      from {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }

      to {
        visibility: hidden;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
      }
    }

    @keyframes slideOutLeft {
      from {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }

      to {
        visibility: hidden;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
      }
    }
</style>
<script>

    export default{

    }
</script>
