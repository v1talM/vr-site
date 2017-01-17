/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import Vue from 'vue'
import Vuex from 'vuex'
import vrStore from './vrStore'
import vrUser from './vrUser'
import vrModal from './vrModal'
Vue.use(Vuex)
export default new Vuex.Store({
    modules: {
        vrStore, vrUser, vrModal
    }
})