export default {
    data() {
        return {
            search: '',
            count : '',
        }
    },
    props: ['res'],
    mounted() {
        let json = JSON.parse(this.res)
        let search = json.search.split('%')
        this.count = json.products.length
        this.search = search[1];
    }
}