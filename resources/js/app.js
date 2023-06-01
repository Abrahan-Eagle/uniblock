/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//************ BLOG ************* */
Vue.component('create-author-component', require('./components/CreateAuthorComponent.vue').default);
Vue.component('create-sponsor-component', require('./components/CreateSponsorComponent.vue').default);
Vue.component('create-category-component', require('./components/CreateCategoryComponent.vue').default);
Vue.component('create-tag-component', require('./components/CreateTagComponent.vue').default);
Vue.component('create-post-component', require('./components/CreatePostComponent.vue').default);
Vue.component('create-checkbox-component', require('./components/CheckBoxComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});