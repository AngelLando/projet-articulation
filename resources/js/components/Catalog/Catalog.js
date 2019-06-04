import VueFilters from '../Filters/Filters.vue';

export default {

    name: "component-catalog",


    components: {
        VueFilters
    },


    data() {
        return {
            products : [],
            selected_kinds : []
        }
    },


    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        console.log(json);
        this.products = json.products;
    },

}






