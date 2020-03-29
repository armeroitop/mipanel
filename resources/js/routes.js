/* import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./views/Home').default
        },
        {
            path: '/blog',
            name: 'blog',
            component: require('./views/Blog').default
        },
        {
            path: ':slug',
            name: 'post',
            component: require('./views/Post').default,
            props: true
        },
        {
            path: '*',           
            component: require('./views/404').default
        },
    ],
    mode: 'history'

}) */