/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import Vue from 'vue'
import VueResource from 'vue-resource'
import {clientId, clientSecret} from './env'
Vue.use(VueResource);
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});
const API_ROOT = ''

export default {
    //注册用户接口调用方法
    registUser ( userObj ) {
        return Vue.resource(API_ROOT + '/signup').save(userObj)
    },
    //获取access_token接口调用方法
    getAccessToken ( userObj ) {
        const postData = {
            grant_type: 'password',
            client_id: clientId,
            client_secret: clientSecret,
            username: userObj.email,
            password: userObj.password,
            scope: ''
        }
        return Vue.resource(API_ROOT + '/oauth/token').save(postData)
    },
    //获取用户个人信息接口调用方法
    getUserData ( headers ) {
        return Vue.http.get(API_ROOT + '/api/user', {
            headers: headers
        });
    },
    //用户上传作品接口调用方法
    uploadProduct ( headers, product ) {
        return Vue.http.post(API_ROOT + '/api/product', product, {headers: headers})
    },
    getVRListFromServer (page) {
        return Vue.resource(API_ROOT + '/api/product/get').get({page: page})
    },
    getVRListTotal () {
        return Vue.resource(API_ROOT + '/api/product/total').get()
    }
}