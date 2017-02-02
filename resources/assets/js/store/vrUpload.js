/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/31 0031.
 */
import api from '../api'
const actions = {
    uploadProduct ({}, {headers, product}) {
        return api.uploadProduct(headers, product)
    }
}

export default {
    actions
}