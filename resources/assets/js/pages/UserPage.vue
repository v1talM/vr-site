<template>
    <div class="user-wrapper">
        <navbar></navbar>
        <user-header></user-header>
        <user-main></user-main>
        <copyright></copyright>
    </div>
</template>
<style>

</style>
<script>
    import Navbar from './../components/navbar.vue'
    import UserHeader from './../components/user/Header.vue'
    import UserMain from './../components/user/Main.vue'
    import Copyright from './../components/Footer.vue'
    import {mapActions} from 'vuex'
    import api from './../api'
    export default{
        created () {
            const params = this.$route.params
            api.getUserPanelInfoById(params.id).then( response => {
                this.setUserInfo(response.body)
            }).catch( error => {
                const content = {
                    header: 'Oops!',
                    body: error.body
                }
                this.setModalContent(content)
                this.setShowModal()
            })
        },
        methods: {
            ...mapActions([
                'setUserInfo',
                'setShowModal',
                'setModalContent'
            ])
        },
        components: {
            Navbar, UserHeader, UserMain, Copyright
        }
    }
</script>
