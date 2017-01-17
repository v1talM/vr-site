/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import api from '../api'
const state = {
    vrList: [],
    loadingRouteData: false,
    showModal: false
}

const mutations = {
    SET_VR_LIST (state, vr){
        state.vrList = vr
    },
    SET_LOADING_ROUTE_DATA(state){
        state.loadingRouteData = true
    },
    UNSET_LOADING_ROUTE_DATA(state){
        state.loadingRouteData = false
    },
    SET_SHOW_MODAL(state){
        state.showModal = ! state.showModal
    }
}

const actions = {
    setLoadingRouteData({commit}) {
        commit('SET_LOADING_ROUTE_DATA')
    },
    unsetLoadingRouteData({commit}) {
        commit('UNSET_LOADING_ROUTE_DATA')
    },
    setShowModal({commit}) {
        commit('SET_SHOW_MODAL')
    }
}

export default {
    state, mutations, actions
}