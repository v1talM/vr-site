/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/13 0013.
 */
import api from './../api'
const state = {
    user: null,
    userInfo: {},
}
const mutations = {
    SET_AUTH_USER ( state, userObj ) {
        state.user = userObj
    },
    CLEAR_AUTH_USER( state ) {
        state.user = null
    },
    GET_USER_ID( state ) {
        return state.user.id
    },
    SET_USER_INFO ( state, userInfo ) {
        state.userInfo = userInfo
        state.userInfo.products_count = userInfo.products.length
    }
}

const actions = {
    //登录用户vuex处理
    loginUser({}, userObj){
        return api.getAccessToken(userObj)
    },
    //登录用户后根据token获取用户信息存vuex
    getUserData({}, headers){
        return api.getUserData(headers)
    },
    //存储登录用户信息
    setAuthUser({commit}, userObj){
        commit('SET_AUTH_USER', userObj)
    },
    //清除登录用户信息
    clearAuthUser({commit}){
        commit('CLEAR_AUTH_USER')
    },
    //获取用户的id
    getUserId({commit}){
        commit('GET_USER_ID')
    },
    //用户中心获取用户信息后存vuex
    setUserInfo({commit}, userInfo){
        commit('SET_USER_INFO', userInfo)
    }
}

export default {
    state, mutations, actions
}