import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'

export default {
    data() {
        return {
            products : [],
            value_2: [10.77, 915.45]
        }
    },
    components: {
        VueSlider
    },
    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
    },

}
