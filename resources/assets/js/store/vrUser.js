/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/13 0013.
 */
import api from './../api'
const state = {
    user: []
}

const mutations = {
    SET_VR_USER ( state, userObj) {
        state.user = userObj
    }

}

const actions = {
    loginUser({commit}, userObj){
        api.loginUser(userObj).then( response => {
            console.log(response)
        })
    }
}

export default {
    state, mutations, actions
}