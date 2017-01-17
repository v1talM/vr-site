<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            <h3>{{ modalHeader }}</h3>
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            <p v-for="(item,index) in modalBody">{{ item }}</p>
                        </slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="body">
                            <a class="btn btn-primary btn-sm" @click="setCloseModal()">确 认</a>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 400px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
.modal-header{
    border-bottom: none;
}
.modal-header h3 {
  margin-top: 0;
  color: #18bc9c;
  font-size: 3em;
  text-align: center;
}

.modal-body {
  margin:  0;
  padding: 0;
  text-align: center;
}
.modal-body p {
    font-size: 1.2em;
    font-weight: bold;
}
.modal-footer {
    padding: 10px 0;
    text-align: center;
    border-top: none;
    margin-top: 10px;
}
.modal-footer .btn-primary:hover{
    color: #fff !important;
}
/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
<script>
    import {mapState, mapActions} from 'vuex'
    export default{
        computed: mapState({
            modalHeader: state => state.vrModal.modalHeader,
            modalBody: state => state.vrModal.modalBody
        }),

        methods: {
            ...mapActions([
                'setShowModal', 'setCloseModal'
            ]),

        }
    }
</script>
