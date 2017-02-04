<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="padding-sm">
                <h2>
                    <i class="fa fa-upload"></i>
                    上传作品
                </h2>
                <hr>
                <form id="addProForm" class="form-horizontal" @submit.prevent="handleAddPro()">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-lg-2 control-label ">作品名称</label>
                            <div class="col-lg-6">
                                <input v-model="pro_title"
                                       type="text"
                                       required="required"
                                       class="form-control input-sm"
                                >
                            </div>
                            <div class="col-lg-4 help-block">20个字符以内。</div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label ">添加封面</label>
                            <div class="col-lg-6">
                                <input
                                        @change="onFileChange"
                                        type="file"
                                        class="form-control input-sm"
                                        name="thumb"
                                >
                            </div>
                            <div class="col-lg-4 help-block">作品封面。展示作品的效果图</div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label ">作品图片</label>
                            <div class="col-lg-6">
                                <input
                                        @change="onFileChange"
                                        type="file"
                                        required="required"
                                        class="form-control input-sm"
                                        name="photo"
                                >
                            </div>
                            <div class="col-lg-4 help-block">请上传您的全景作品图片。</div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary btn-sm">上传作品</button>
                            </div>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
</template>
<style>
    .padding-sm{
        padding: 10px 15px;
    }
    @media(min-width: 728px){
        .form-horizontal .control-label{
            padding-top: 7px;
        }

    }
</style>
<script>
    import {mapState, mapActions} from 'vuex'
    import {getHeader} from './../../config'
    export default{
        computed: mapState({
          user: state => state.vrUser.user,
          $loadingRouteData: state => state.vrStore.loadingRouteData
        }),
        data () {
            return {
                pro_title: '',
                thumb: '',
                photo: ''
            }
        },
        methods: {
            ...mapActions([
                'uploadProduct',
                'getUserId',
                'setLoadingRouteData',
                'unsetLoadingRouteData',
                'setShowModal',
                'setModalContent',
            ]),
            handleAddPro () {
                this.setLoadingRouteData()
                const thumb = this.thumb
                const photo = this.photo
                const product = {
                    pro_title: this.pro_title,
                    pro_thumb: thumb,
                    pro_photo: photo,
                    user_id: this.user.id
                }
                if(thumb === '' || photo === '' ) return ;
                const headers = getHeader()
                this.uploadProduct({headers, product}).then( response => {
                    this.unsetLoadingRouteData()
                    const content = {
                        header: 'Message!',
                        body: [response.body.info]
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                    this.clearStatus()
                }).catch( error => {
                    this.unsetLoadingRouteData()
                    const content = {
                        header: 'Oops!',
                        body: error.body
                    }
                    this.setModalContent(content)
                    this.setShowModal()
                })
            },
            onFileChange (e) {
                let file = e.target.files || e.dataTransfer.files;
                if (!file.length) return;
                if( e.target.name == 'thumb' ){
                    this.createThumbImage(file);
                }else{
                    this.createPhotoImage(file);
                }
            },
            createThumbImage (file) {
                if(typeof FileReader==='undefined'){
                    alert('您的浏览器不支持图片上传，请升级您的浏览器');
                    return false;
                }
                var image = new Image();
                var vm = this;
                var reader = new FileReader();
                reader.readAsDataURL(file[0]);
                reader.onload = function(e){
                    vm.thumb = e.target.result;
                };
            },
            createPhotoImage (file) {
                if(typeof FileReader==='undefined'){
                    alert('您的浏览器不支持图片上传，请升级您的浏览器');
                    return false;
                }
                var image = new Image();
                var vm = this;
                var reader = new FileReader();
                reader.readAsDataURL(file[0]);
                reader.onload = function(e){
                    vm.photo = e.target.result;
                };
            },
            clearStatus () {
                document.getElementById("addProForm").reset();
            }
        }

    }
</script>
