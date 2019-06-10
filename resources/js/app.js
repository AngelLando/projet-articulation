// Ici, on inclut tous les import nécessaires et les pages que nous allons utiliser comme components
require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
window.Vue = require('vue');
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('my-account', require('./components/Account/Account.vue').default);
Vue.component('big-catalog', require('./components/BigCatalog/BigCatalog.vue').default);
Vue.component('mini-products-catalog', require('./components/MiniCatalog/MiniCatalog.vue').default);
Vue.component('cart-component', require('./components/Cart/Cart.vue').default);
Vue.component('products-single', require('./components/SingleProduct/singleProduct.vue').default);
Vue.component('checkout-component', require('./components/Cart/Cart.vue').default);
Vue.component('slider-homepage', require('./components/Slider/Slider.vue').default);
Vue.component('address-component', require('./components/Address/Address.vue').default);
Vue.component('confirmation-component', require('./components/Confirmation/Confirmation.vue').default);
Vue.component('about-us-component', require('./components/AboutUs/AboutUs.vue').default);
Vue.component('cgv-component', require('./components/CGV/CGV.vue').default);
Vue.component('cart-nav-component', require('./components/cartNav/cartNav.vue').default);




//Ici, on monte juste le tout ensemble. On lui dit: tu prends le App.vue (c'est notre base avec header footer) et tu lui montes à la div app le router avec les components.
const app = new Vue({
 el: '#app',

});

// ajoute la classe sur l'onglet sélectionné

/*
$(".second-nav-list").on("click", ".nav-item", evt => {
    console.log("lkjlkj");
    let current = $(evt.currentTarget);
    $(current).addClass("active");
    $(current).siblings().removeClass("active");
});*/


// rend le menu sticky au scroll


window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("two-nav");
var main = document.getElementById("content");
var newlsetter = document.getElementById("newsletter");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= 1) {
        navbar.classList.add("sticky");
        main.classList.add("content-move")
        newsletter.classList.add("newsletter-hide")
    } else {
        navbar.classList.remove("sticky");
        main.classList.remove("content-move")
        newlsetter.classList.remove("newsletter-hide")
    }
}


