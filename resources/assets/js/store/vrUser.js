/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/13 0013.
 */
import api from './../api'
const state = {
    vrUser: []
}

const mutations = {
    SET_VR_USER ( state, userObj) {
        state.vrUser = userObj
    }

}

const actions = {
    registUser({commit}, userObj){
        api.registUser(userObj).then( response => {
            console.log(response);
        })
    }
}

export default {
    state, mutations, actions
}