/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');


 import BootstrapVue from 'bootstrap-vue'

 window.Vue = require('vue');
 import 'bootstrap/dist/css/bootstrap.css'
 import 'bootstrap-vue/dist/bootstrap-vue.css'
 import Router from 'vue-router'
 import App from './views/App'
 import productCard from './views/productCard'
 import ProductsComponent from './components/ProductsComponent'
 Vue.use(Router)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('productcard-component', require('./components/ProductCardComponent.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('header-component', require('./components/header/HeaderComponent.vue').default);

Vue.component('footer-component', require('./components/footer/FooterComponent.vue').default);

Vue.component('products-component', require('./components/ProductsComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

    const router = new Router({
        routes: [
        {
          path:'/',
          name: ProductsComponent,
          component: ProductsComponent

        },
            {
              path:'/:productid',
              name: productCard,
              component: productCard
            }
            ]
          })

 const app = new Vue({
  el: '#app',
  render: h => h(App),
  router,
});
