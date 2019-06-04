import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'


export default {
    data() {
        return {
            products : [],
            value_2: [10.70, 915.50],
            appellations: [],
            tags: []
        }
    },
    components: {
        VueSlider
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
    }
}
