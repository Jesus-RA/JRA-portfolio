/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueSweetalert2 from 'vue-sweetalert2';
import '../sass/_dark.scss';
window.Vue = require('vue');

// Importando AOS
import AOS from "aos";
import "aos/dist/aos.css";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VueSweetalert2);
Vue.component('delete-project', require('./components/DeleteProject.vue').default);
Vue.component('technologies', require('./components/Technology.vue').default);
Vue.component('delete-technology', require('./components/DeleteTechnology.vue').default);
Vue.component('contact', require('./components/Contact.vue').default);
Vue.component('remove-project-image', require('./components/RemoveProjectImage.vue').default);

// Ver los paquetes instalados
//console.log(Vue.prototype)   
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    created(){
        AOS.init({
            duration: 1200,
        });
    },
    el: '#app',
});