export default {
    data() {
        return {
            products : []
        }
    },
    props : ['cart'],
    mounted () {
        this.products = JSON.parse(this.cart);
    },

}

