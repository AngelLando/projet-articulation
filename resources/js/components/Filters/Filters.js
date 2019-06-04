import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/antd.css'
import { BFormGroup } from 'bootstrap-vue/es/components';
import { BFormCheckboxGroup } from 'bootstrap-vue/es/components';
import { BFormCheckbox } from 'bootstrap-vue/es/components';

export default {
    data() {
        return {
            products : [],
            value_2: [10.77, 915.45],
            selected: [], // Must be an array reference!
            options: [
                { text: 'Orange', value: 'orange' },
                { text: 'Apple', value: 'apple' },
                { text: 'Pineapple', value: 'pineapple' },
                { text: 'Grape', value: 'grape' }
            ]
        }
    },
    components: {
        VueSlider,
        BFormGroup,
        BFormCheckboxGroup,
        BFormCheckbox
    },
    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
    },

}
