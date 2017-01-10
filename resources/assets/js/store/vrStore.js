/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import api from '../api'
const state = {
    vrList: []
}

const mutations = {
    SET_VR_LIST (state, vr){
        state.vrList = vr
    }
}

const actions = {
    getVrList ({commit}) {
        api.getVrList().then( response => {
            commit('SET_VR_LIST', response.data)
        })
    }
}

export default {
    state, mutations, actions
}