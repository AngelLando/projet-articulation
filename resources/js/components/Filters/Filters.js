import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'
import { BFormGroup } from 'bootstrap-vue/es/components';
import { BFormCheckboxGroup } from 'bootstrap-vue/es/components';
import { BFormCheckbox } from 'bootstrap-vue/es/components';

export default {
    data() {
        return {
            products : [],
            value_2: [10.70, 915.50],
            appellations: [],
        }
    },
    components: {
        VueSlider
    },

    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
/*
        var test= this.products;

        this.products.foreach(function(product) {
            appellations.push(product.appellation);
        });*/

        console.log(this.products.appellations);

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
    }
}
