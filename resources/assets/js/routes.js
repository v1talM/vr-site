/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import App from './App.vue'
import VR from './pages/VR.vue'
export default [
    { path: '/', component: App },
    { path: '/vr/:id', component: VR}
]