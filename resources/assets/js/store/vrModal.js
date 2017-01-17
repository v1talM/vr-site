/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/17 0017.
 */
const state = {
    showModal: false,
    modalHeader: '',
    modalBody: ''
}

const mutations = {
    SET_SHOW_MODAL(state) {
        state.showModal = true
    },
    SET_MODAL_CONTENT(state, content){
        state.modalHeader = content.header
        state.modalBody = content.body
    },
    SET_CLOSE_MODAL(state) {
        state.showModal = false
    }
}

const actions = {
    setShowModal({commit}) {
        commit('SET_SHOW_MODAL')
    },
    setCloseModal({commit}) {
        commit('SET_CLOSE_MODAL')
    },
    setModalContent({commit}, content) {
        commit('SET_MODAL_CONTENT', content)
    },
}

export default {
    state, mutations, actions
}