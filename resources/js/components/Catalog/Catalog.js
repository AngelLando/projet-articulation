export default {
    data() {
        return {
            products : []
        }
    },
    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        console.log(json);
        this.products = json.products;
    },

}


