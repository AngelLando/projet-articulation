// Ici, on inclut tous les import nécessaires et les pages que nous allons utiliser comme components
require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
window.Vue = require('vue');
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Router from 'vue-router'
import App from './views/App'
import productCard from './views/productCard'
import login from './views/login'
 import home from './views/home'
import ProductsComponent from './components/ProductsComponent'
Vue.use(Router)

//Ici, on monte juste le tout ensemble. On lui dit: tu prends le App.vue (c'est notre base avec header footer) et tu lui montes à la div app le router avec les components.
const app = new Vue({
 el: '#app',
 render: h => h(App),
 router,
});
