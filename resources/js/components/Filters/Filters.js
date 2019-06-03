    export default {
        data() {
            return {
                products : []
            }
        },
        props : ['prod'],
        mounted () {
            let json = JSON.parse(this.prod);
            this.products = json.products;
        },

    }


