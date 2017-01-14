/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import Vue from 'vue';
import VueResource from 'vue-resource';
Vue.use(VueResource);

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});
const API_ROOT = '';

export default {
    getVrList () {
        return Vue.resource(API_ROOT + '/vr/1').get();
    },
    //注册用户接口调用方法
    registUser ( userObj ) {
        return Vue.resource(API_ROOT + '/signup').save(userObj);
    },
    //登录用户接口调用方法
    loginUser ( userObj ) {
        return Vue.resource(API_ROOT + '/login').save(userObj);
    }
}