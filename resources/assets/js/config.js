/**
 * Created by Ian Vital <373357042@qq.com> on 2017/1/17 0017.
 */
export const getHeader = function () {
    const tokenData = JSON.parse(window.localStorage.getItem('authUser'))
    const headers = {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + tokenData.access_token
    }
    return headers
}