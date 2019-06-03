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
			var clickedElement = event.target;
			$(clickedElement).addClass("more_info_selected");
			$(clickedElement).siblings().removeClass("more_info_selected");
			$(clickedElement).siblings().addClass("more_info");
		},
		set_choice:function(event){
			var clickedElement = event.target;
			$(clickedElement).addClass("product_selection_selected");
			$(clickedElement).siblings().removeClass("product_selection_selected");
			$(clickedElement).siblings().addClass("product_selection");
		}
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
		let json = JSON.parse(this.prod);
		console.log(json);
        this.product = json.product;
        this.products = json.products;
	},

}

