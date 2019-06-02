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
	methods:{
		underline: function(event){
			console.log(event.target)
			var clickedElement = event.target;
			$(clickedElement).addClass("more_info_selected");
			$(clickedElement).siblings().removeClass("more_info_selected");
			$(clickedElement).siblings().addClass("more_info");
		},
	},
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

