require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);


import PostTable from './components/admin/PostTable'
import PostCreation from './components/admin/PostCreation'
import PostUpdating from './components/admin/PostUpdating'
import PostItem from './components/admin/PostItem'

const router = new VueRouter({
    routes: [
        {path: '/', component: PostTable, name: 'admin'},
        {path: '/:id', component: PostItem, name: 'showPost'},
        {path: '/create', component: PostCreation, name: 'createPost'},
        {path: '/edit/:id', component: PostUpdating, name: 'updatePost'},
    ]
});


Vue.component('post-likes', require('./components/PostLikes.vue'));
Vue.component('post-views', require('./components/PostViews.vue'));

const app = new Vue({
    el: '#app',
    router,
});
