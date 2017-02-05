<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title center">
                    <h2>精彩案例</h2>
                    <h4 class="upper">情怀与VR相遇，让美好流行</h4>
                    <hr>
                </div>

            </div>
        </div>
        <div class="row">
            <div v-for="vr in vrList" class="portfolio-card col-md-4">
                <div class="thumbnail has-photo">
                    <router-link :to="{name: 'vr', params: { id: vr.id }}">
                        <div class="img" v-bind:style="{backgroundImage:'url(' + vr.pro_thumb + ')'}"></div>
                        <div class="caption">
                            <h3> {{ vr.pro_title }} </h3>
                        </div>
                    </router-link>
                    <div class="actions clearfix">
                        <router-link
                                :to="{name: 'user', params: { id: vr.user.name }}"
                                class="pull-left profile-avatar small"
                        >
                            <div class="initials">?</div>
                            <img class="media-object avatar" height="45" :src="vr.user.avatar" width="45">
                        </router-link>
                        <div class="pull-right">
                            <div class="vr-count">
                                <span>100</span>
                                <span class="fa fa-heart-o"></span>
                            </div>
                        </div>
                        <div class="user">
                            <router-link :to="{name: 'user', params: { id: vr.user.name }}">{{ vr.user.name }}</router-link>
                            <div class="location small">{{ vr.pro_title }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <nav class="text-center">
            <ul class="pagination">
                <li :class="{ 'disabled': current == 1}">
                    <a href="javascript:;"
                       @click = "setCurrent(current - 1)"
                       aria-label="Previous"
                    >
                        <span aria-hidden="true">上一页</span>
                    </a>
                </li>
                <li :class="{ 'active': n  == current }"
                    v-for="n in page"
                    @click="setCurrent(n)"
                >
                    <a href="javascript:;">{{ n }} <span class="sr-only">(current)</span></a>
                </li>
                <li :class="{ 'disabled': current == page}">
                    <a href="javascript:;"
                       @click = "setCurrent(current + 1)"
                       aria-label="Previous"
                    >
                        <span aria-hidden="true">下一页</span>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</template>
<style>
    .title.center{
        text-align: center;
        margin-top: 25px;
        margin-bottom: 25px;
    }
    .title h4.upper {
        font-size: 14px;
        margin-bottom: 20px;
        line-height: 1.25;
        letter-spacing: 2px;
    }
    .title h2 {
        margin-top: 0;
        font-weight: 700;
        font-size: 30px;
    }
    .title hr {
        width: 45px;
        margin: 20px auto;
        border-top: 1px solid #18bc9c;
    }
    .portfolio-card .thumbnail {
        border-radius: 0;
        position: relative;
        padding: 0;
        margin-bottom: 30px;
        border: 1px solid #dddddd;
    }
    .portfolio-card .thumbnail:before {
        position: absolute;
        left: 0;
        top: 0;
        content: '';
        height: 250px;
        width: 100%;
        background: #000;
        opacity: 0.2;
        transition: opacity 0.5s ease-in-out;
        pointer-events: none;
    }
    .portfolio-card .thumbnail .img {
        width: 100%;
        height: 250px;
        background: no-repeat center;
        background-size: cover;
    }
    .portfolio-card .caption {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 250px;
        font-size: 36px;
        padding: 0;
        overflow: hidden;
        text-align: center;
    }
    .portfolio-card .caption:before {
        content: '';
        height: 100%;
        vertical-align: middle;
        display: inline-block;
        margin-right: -0.25em;
    }
    .portfolio-card .caption h3 {
        display: inline-block;
        vertical-align: middle;
        margin: 0;
        color: #fff;
        text-shadow: 1px 1px 10px #000;
        font-size: 30px;
    }
    .portfolio-card .actions {
        text-align: left;
        padding: 12px;
        height: 70px;
        position: relative;
    }
    .profile-avatar {
        position: relative;
        display: inline-block;
        width: 70px;
        height: 70px;
    }
    .profile-avatar.small {
        width: 45px;
        height: 45px;
    }
    .portfolio-card .actions .profile-avatar {
        margin-right: 10px;
    }
    .profile-avatar .initials {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        line-height: 70px;
        font-size: 36px;
        text-align: center;
        border-radius: 50%;
        text-shadow: none;
        color: transparent;
        background: rgba(255,255,255,0.8) url('./../../../imgs/city3.jpg') no-repeat center;
        background-size: 60%;
    }
    .profile-avatar.small .initials {
        line-height: 45px;
        font-size: 26px;
    }
    .profile-avatar img {
        position: relative;
    }
    .avatar {
        border-radius: 50%;
        height: inherit !important;
    }
    .sprite {
        width: 40px;
        height: 40px;
        background-size: 152px 825px;
        display: inline-block;
        vertical-align: middle;
    }
    .portfolio-card .vr-count span {
        font-size: 16px;
        color: #18bc9c;
        display: block;
        text-align: center;
        padding-left: 4px;
    }
    .sprite.sprite-vr-counter {
        background-position: 0 -24px;
        width: 76px;
        height: 22px;
    }
    .portfolio-card .actions .user {
        font-size: 18px;
        color: #000;
    }
    .portfolio-card .thumbnail.has-photo:hover:before {
        opacity: 0;
    }
    .portfolio-card .thumbnail.has-photo:hover .caption {
        display: none;
    }
    .pagination {
        padding: 30px 0;
        text-align: center;
    }
    .pagination ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }
    .pagination a {
        display: inline-block;
        padding: 10px 18px;
        color: #222;
    }
    .pagination a.is-active {
        background-color: #18bc9c;
        color: #fff;
    }
</style>
<script>
    import {mapActions, mapState} from 'vuex'
    import {display_per_page} from './../../env'
    export default{
        data () {
            return {
                current: 0,
                total: 1,
                display: display_per_page,
            }
        },
        computed: mapState({
            vrList: state => state.vrStore.vrList,
            page () {
                return Math.ceil(this.total / this.display)
            }
        }),
        mounted () {
            this.setLoadingRouteData()
            this.getProductsTotal()
            this.setCurrent(1)
        },
        methods: {
            ...mapActions([
                'getVRListFromServer',
                'getVRListTotal',
                'setLoadingRouteData',
                'unsetLoadingRouteData',
                'setVRList',
                'setModalContent',
                'setShowModal'
            ]),
            setCurrent (idx) {
                if( this.current != idx && idx > 0 && idx < this.total + 1) {
                    this.current = idx;
                    this.getProductsByPage(idx);
                }
            },
            getProductsByPage (idx) {
                this.getVRListFromServer(idx).then( response => {
                    this.setVRList(response.body.data)
                    this.unsetLoadingRouteData()
                }).catch( error => {
                    const content = {
                        header: 'Oops!',
                        body: error.body
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                })
            },
            getProductsTotal () {
                this.getVRListTotal().then( response => {
                    this.total = response.body.data
                }).catch( error => {
                    const content = {
                        header: 'Oops!',
                        body: error.body
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                })
            }
        }
    }
</script>
