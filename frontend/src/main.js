import Vue from 'vue'
import App from './App.vue'
import Router from 'vue-router'

Vue.use(Router);

Vue.config.productionTip = false


const Foo = { template: '<div>foo</div>' }
const Bar = { template: '<div>bar</div>' }

const routes = [
    { path: '/home', component: Foo },
    { path: '/products', component: Bar }
]

const router = new Router({
    routes : routes,
    mode: 'history',
    base : '/HEIG-2/devProdMed/ProjetArticulation/laravel/projet-articulation/public',
})

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
