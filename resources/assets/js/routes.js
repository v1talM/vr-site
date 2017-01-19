/**
 * Created by Ian Vital <373357042@qq.com> on 2016/12/28 0028.
 */
import Welcome from './pages/Welcome.vue'
import LoginPage from './pages/LoginPage.vue'
import SignupPage from './pages/SignupPage.vue'
import PortfolioPage from './pages/PortfolioPage.vue'
import UserPage from './pages/UserPage.vue'
export default [
    { path: '/', component: Welcome, name: 'home'},
    { path: '/login', component: LoginPage, name: 'login'},
    { path: '/signup', component: SignupPage, name: 'signup'},
    { path: '/portfolio', component: PortfolioPage, name: 'portfolio'},
    { path: '/user/:id', component: UserPage, name: 'user'}
]