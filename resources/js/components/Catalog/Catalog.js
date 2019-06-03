export default {
    data() {
        return {
            products : []
        }
    },
    props : ['prod'],
    mounted () {
        this.products = JSON.parse(this.prod);
    },

}


