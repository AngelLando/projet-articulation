export default {
    data() {
        return {
            products : []
        }
    },
    mounted () {
        axios.get('products').then(({data}) => this.products = data.products)
    },
    props : ['sta']
}

