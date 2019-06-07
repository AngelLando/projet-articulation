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
            selected_years: [],
            quantity : '',
            errors : {},
            counter: '',
            cartItem : '',
            id: document.querySelector("meta[name='user-id']"),
        }
    },

    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
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
        setQuantity:function(product){
            this.quantity = event.target.value;
        },


        transform: function (selection, product) {
            const intArray = [];
            const resultArray = [];

            selection.forEach((s) => {
                intArray.push(parseInt(s, 10))
                intArray.push((parseInt(s, 10))+1)
            })

            intArray.forEach((i) => {
                    if (product.year == i) {
                        resultArray.push(product.year)
                    }
            })
            if(resultArray.length > 0) {
                return 1;
            } else {
                return 0;
            }
        },


        input: function (clickedProduct) {
            if (this.id != null) {
                this.cartItem  = {
                    product_id: clickedProduct.id,
                    quantity: this.quantity
                };
                axios.post('add', this.cartItem)
                .catch(error => {
                    this.errors = error.response.data.errors
                    return;
                })
            } 
   if (this.quantity>clickedProduct.stock || this.quantity<=0) {
                console.log("erreur")
            }else{
            var local = localStorage.getItem('storedID');
            local = local ? JSON.parse(local): [];
            var prodId = clickedProduct.id
            var q = parseInt(this.quantity, 10);
            var alreadyExist = false;
            local.forEach(function(element) {
                if (element.id == prodId) {
                    alreadyExist=true;
                    var f = parseInt(element.quantity,10)
                    element.quantity = q+f;
                }
            });
            if (alreadyExist==false) {
                local.push({
                  "id":clickedProduct.id,
                  "packaging_capacity":clickedProduct.packaging_capacity,
                  "quantity":this.quantity,
                  "path_image":clickedProduct.path_image,
                  "name":clickedProduct.name,
                  "price": clickedProduct.price,
                  "format":clickedProduct.format,
              })}
                localStorage.setItem('storedID', JSON.stringify(local));
            }
            }
        },

    }






