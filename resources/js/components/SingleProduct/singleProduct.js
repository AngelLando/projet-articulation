/**export default {
	data() {
		return {
			product: [],
			isHiddenDescr:true,
			isHiddenInfo:false,
			isHiddenRating:false,
		}
	},
	mounted () {
		axios.get('/projet-articulation/public/products/2').then(({data}) => this.product = data.products)
	},
}**/


export default {
    data() {
        return {
            product : [],
            			isHiddenDescr:true,
			isHiddenInfo:false,
			isHiddenRating:false,
        }
    },
    props : ['prod'],
    mounted () {
        this.product = JSON.parse(this.prod);
    },

}

