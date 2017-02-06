<template>
    <div id="pano-control">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="op-list text-left">
                        <router-link
                                v-if="vr"
                                :to="{name: 'user', params: { id: vr.user.name }}"
                                class="op"
                        >
                            <div href="#" class="op-badge">
                                <i class="fa fa-user-circle"></i>
                            </div>
                            <span>{{ vr.user.name }}</span>
                        </router-link>

                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="op-list text-right">
                        <a href="#" class="op">
                            <div href="#" class="op-badge">
                                <i class="fa fa-share-square-o"></i>
                            </div>
                            <span>分享</span>
                        </a>
                        <a href="#" class="op">
                            <div href="#" class="op-badge">
                                <i class="fa fa-thumbs-up"></i>
                            </div>
                            <span>100</span>
                        </a>
                        <a href="#" class="op">
                            <div href="#" class="op-badge">
                                <i class="fa fa-commenting-o"></i>
                            </div>
                            <span>说说</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    #pano-control {
        position: fixed;
        bottom: 0;
        width: 100%;
        color: #fff;
        padding-bottom: 10px;
    }
    #pano-control a {
        color: #fff;
    }
    .author {
        margin-top: 2em;
    }
    .op-list .op{
        padding-left: 10px;
        padding-right: 10px;
        display: inline-block;
        text-align: center;
    }
    .op-list .op:hover {
        text-decoration: none;
    }
    .op-list .op-badge{
        width: 2.2em;
        height: 2.2em;
        text-align: center;
        background-color: #ecf0f1;
        border-radius: 50%;
        color: #222;
        display: inline-block;
        line-height: 2.2em;
    }
    a.op-badge i {
        color: #2c3e50 !important;
    }
    .op-list .op span{
        display: block;
        font-size: 12px;
        text-align: center;
        margin-top: 5px;
    }
</style>
<script>
    import {mapState} from 'vuex'
    export default{
        computed: mapState({
            vr: state => state.vrStore.vrInfo
        }),
        data () {
            return {

            }
        }
    }
</script>
