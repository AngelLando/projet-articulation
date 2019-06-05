import 'vue-slider-component/theme/antd.css'
import VueSlider from "vue-slider-component";
import 'vue-slider-component/theme/antd.css'


export default {

    name: "component-catalog",


    components: {
        VueSlider
    },


    data() {
        return {
            products : [],
            value_2: [10.70, 915.50],
            appellations: [],
            tags: [],
            selected_kinds: [],
            selected_formats: [],
            selected_packagings: [],
            selected_appellations: [],
            selected_tags: [],
            selected_countries: [],
            quantity : '',
            errors : {}
        }
    },


    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        console.log(json);
        this.products = json.products;
        this.appellations = json.appellations;
        this.tags = json.tags;
    },

    computed: {
        unique () {
            return function (arr, key) {
                var output = []
                var usedKeys = {}
                for (var i = 0; i < arr.length; i++) {
                    if (!usedKeys[arr[i][key]]) {
                        usedKeys[arr[i][key]] = true
                        output.push(arr[i])
                    }
                }
                return output
            }
        }
    },

/*
    methods: {
        isInArray: function (event) {
            products.foreach(function (product) {

                console.log("test");
            })
        }
    },*/

    methods: {
        isInArray: function (selection, produc_appell) {

            const finalarray = [];

            selection.forEach((s) => {

                produc_appell.forEach((a) => {

                    if (a.name === s) {
                        finalarray.push(a.name)
                    }
                });
            })

            if(finalarray.length > 0) {
                return 1;
            } else {
                return 0;
            }
        },
        input: function (clickedProduct) {
            this.cartItem  = {
                product_id: clickedProduct.id,
                quantity: this.quantity
            };
            console.log(this.cartItem);

            axios.post('add', this.cartItem)
                .catch(error => {
                    this.errors = error.response.data.errors
                    return;
                }).then(response => {
                console.log(response)
            })

            var existing = localStorage.getItem('storedData');
            existing = existing ? existing.split(',') : [];
            existing.push(clickedProduct.id);
            localStorage.setItem('storedData', existing.toString());
        }
    },


    
}






