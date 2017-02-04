<template>
    <div>
        <div class="panel panel-default">
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
                    <div class="portfolio-card col-xs-12 col-sm-6">
                        <div class="thumbnail has-photo">
                            <a href="#">
                                <div class="img" style="background-image: url('./img/ny.jpg')"></div>
                                <div class="caption">
                                    <h3>2017 Ian Vital Presents </h3>
                                </div>
                            </a>
                            <div class="actions clearfix">
                                <a href="#" class="pull-left profile-avatar small">
                                    <div class="initials">?</div>
                                    <img class="media-object avatar" height="45" src="./../../../imgs/city4.jpg" width="45">
                                </a>
                                <div class="pull-right">
                                    <div class="vr-count">
                                        <span>100</span>
                                        <span class="fa fa-heart-o"></span>
                                    </div>
                                </div>
                                <div class="user">
                                    <a href="#">Ian Vital</a>
                                    <div class="location small">San Francisco Bay Area</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-card col-xs-12 col-sm-6">
                        <div class="thumbnail has-photo">
                            <a href="#">
                                <div class="img" style="background-image: url('./img/px.jpg')"></div>
                                <div class="caption">
                                    <h3>2017 Ian Vital Presents </h3>
                                </div>
                            </a>
                            <div class="actions clearfix">
                                <a href="#" class="pull-left profile-avatar small">
                                    <div class="initials">?</div>
                                    <img class="media-object avatar" height="45" src="./../../../imgs/city4.jpg" width="45">
                                </a>
                                <div class="pull-right">
                                    <div class="vr-count">
                                        <span>100</span>
                                        <span class="fa fa-heart-o"></span>
                                    </div>
                                </div>
                                <div class="user">
                                    <a href="#">Ian Vital</a>
                                    <div class="location small">San Francisco Bay Area</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-card col-xs-12 col-sm-6">
                        <div class="thumbnail has-photo">
                            <a href="#">
                                <div class="img" style="background-image: url('./img/nz.jpg')"></div>
                                <div class="caption">
                                    <h3>2017 Ian Vital Presents </h3>
                                </div>
                            </a>
                            <div class="actions clearfix">
                                <a href="#" class="pull-left profile-avatar small">
                                    <div class="initials">?</div>
                                    <img class="media-object avatar" height="45" src="./../../../imgs/city4.jpg" width="45">
                                </a>
                                <div class="pull-right">
                                    <div class="vr-count">
                                        <span>100</span>
                                        <span class="fa fa-heart-o"></span>
                                    </div>
                                </div>
                                <div class="user">
                                    <a href="#">Ian Vital</a>
                                    <div class="location small">San Francisco Bay Area</div>
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
    export default{

    }
</script>
