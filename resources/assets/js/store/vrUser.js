/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/13 0013.
 */
import api from './../api'
const state = {
    user: null
}

const mutations = {
    SET_AUTH_USER ( state, userObj) {
        state.user = userObj
    },
    CLEAR_AUTH_USER( state ) {
        state.user = null
    }
}

const actions = {
    loginUser({}, userObj){
        return api.getAccessToken(userObj)
    },
    getUserData({}, headers){
        return api.getUserData(headers)
    },
    setAuthUser({commit}, userObj){
        commit('SET_AUTH_USER', userObj)
    },
    clearAuthUser({commit}){
        commit('CLEAR_AUTH_USER')
    }
}

export default {
    state, mutations, actions
}