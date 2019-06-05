export default {
	data() {
		return {
			product : [],
			isHiddenDescr:true,
			isHiddenInfo:false,
			isHiddenRating:false,
			cartItem : '',
			product_id: '',
			quantity : '',
			errors : {},
			exception:false,
		}
	},
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
		},
		input: function (productid) {
			this.cartItem  = {
				product_id: this.product.id,
				quantity: this.quantity
			};
			axios.post('../add', this.cartItem)
			.catch(error => {
				this.errors = error.response.data.errors
				return;
			})

			var local = localStorage.getItem('storedID');
			local = local ? JSON.parse(local): {};
			local['id']=this.product.id;
			local['quantity']=this.quantity;
			local['img']=this.product.path_image;
			local['name']=this.product.name;
			local['price']=this.product.price;
			local['format']=this.product.format;
			localStorage.setItem('storedID', JSON.stringify(local));
		}
	},
	props : ['prod'],
	mounted () {
		let json = JSON.parse(this.prod);
		console.log(json);
		this.product = json.product;
		this.products = json.recommandations;
		this.products = json.products;
	},

}

