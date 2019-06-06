import 'vue-slider-component/theme/antd.css'
import VueSlider from "vue-slider-component";
import 'vue-slider-component/theme/antd.css'


export default {

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
            errors : {},
            counter: '',
            cartItem : ''
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
            let id = document.querySelector("meta[name='user-id']")
            if (id != null) {
                this.cartItem  = {
                    product_id: clickedProduct.id,
                    quantity: this.quantity
                };
                axios.post('add', this.cartItem)
                .catch(error => {
                    this.errors = error.response.data.errors
                    return;
                })
            } if(id == null) {
                var local = localStorage.getItem('storedID');
                local = local ? JSON.parse(local): [];
                local.push({
                    "id":clickedProduct.id,
                    "packaging_capacity":clickedProduct.packaging_capacity,
                    "quantity":this.quantity,
                    "path_image":clickedProduct.path_image,
                    "name":clickedProduct.name,
                    "price": clickedProduct.price,
                    "format":clickedProduct.format,
                })
                localStorage.setItem('storedID', JSON.stringify(local));
            }
        }
    },


    
}






