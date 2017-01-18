<template>
    <div class="wrapper">
        <loader v-if="$loadingRouteData"></loader>
        <transition name="load">

            <router-view>

            </router-view>

        </transition>
        <modal v-if="$showModal">

        </modal>
    </div>

</template>
<style>
    html, body, #app, .wrapper{
        height: 100%;
    }

    .load-enter-active, .load-leave-active {
      transition: opacity .5s, transform .5s;
    }
    .load-enter, .load-leave-active {
      opacity: 0;
      transform: scale(0.95);
    }
    .btn-primary{
        background-color: #18bc9c;
        border-color: #18bc9c;
    }
    .btn-primary:hover {
        background-color: #42b983;
        border-color: #42b983;
        color: #fff;
    }
</style>
<script>
    import {mapState, mapActions} from 'vuex'
    import loader from './components/Loader.vue'
    import modal from './components/Modal.vue'

    export default {
        computed: mapState({
            $loadingRouteData: state => state.vrStore.loadingRouteData,
            $showModal: state => state.vrModal.showModal
        }),
        components: {
            loader, modal
        },
        created () {
            const userObj = JSON.parse(window.localStorage.getItem('authUser'))
            this.$store.dispatch('setAuthUser', userObj)
        }
    }
</script>
