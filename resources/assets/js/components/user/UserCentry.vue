<template>
    <div>
        <div class="panel panel-default" v-if="vrUser.user && vrUser.user.id == userInfo.id">
            <div class="panel-body text-center">
                <router-link :to="{name: 'userCreate'}" class="btn btn-primary btn-add-project">
                    <i class="fa fa-upload"></i> 上传作品
                </router-link>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                最近作品
            </div>
            <div class="panel-body">
                <div class="user-profile-box row">
                    <div class="portfolio-card col-xs-12 col-sm-6" v-for="product in userInfo.products">
                        <div class="thumbnail has-photo">
                            <a href="#">
                                <div class="img" v-bind:style="{backgroundImage: 'url(' + product.pro_thumb + ')'}"></div>
                                <div class="caption">
                                    <h3>{{ product.pro_title }}</h3>
                                </div>
                            </a>
                            <div class="actions clearfix">
                                <a href="#" class="pull-left profile-avatar small">
                                    <div class="initials">?</div>
                                    <img class="media-object avatar"
                                         height="45"
                                         :src="userInfo.avatar"
                                         width="45">
                                </a>
                                <div class="pull-right">
                                    <div class="vr-count">
                                        <span>{{ product.favorite }}</span>
                                        <span class="fa fa-heart-o"></span>
                                    </div>
                                </div>
                                <div class="user">
                                    <a href="#">{{ userInfo.name }}</a>
                                    <div class="location small">{{ product.pro_title }}</div>
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

</style>
<script>
    import {mapState} from 'vuex'
    export default{
        computed: mapState({
            userInfo: state => state.vrUser.userInfo,
            vrUser: state => state.vrUser
        })
    }
</script>
