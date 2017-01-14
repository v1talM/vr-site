/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import Welcome from './pages/Welcome.vue'
import LoginPage from './pages/LoginPage.vue'
import SignupPage from './pages/SignupPage.vue'
export default [
    { path: '/', component: Welcome },
    { path: '/login', component: LoginPage},
    { path: '/signup', component: SignupPage}
]