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
			id: document.querySelector("meta[name='user-id']"),
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

			if (this.id != null) {
				this.cartItem  = {
					product_id: this.product.id,
					quantity: this.quantity
				};
				axios.post('../add', this.cartItem)
				.catch(error => {
					this.errors = error.response.data.errors
					return;
				})
			}
			var local = localStorage.getItem('storedID');
			local = local ? JSON.parse(local): [];
			var prodId = this.product.id
			var q = parseInt(this.quantity, 10);
			var alreadyExist = false;
			local.forEach(function(element) {
				if (element.id == prodId) {
					alreadyExist=true;
					var f = parseInt(element.quantity,10)
					element.quantity = q+f;
				}
			});
			if (alreadyExist==false) {
				local.push({
					"id":this.product.id,
					"packaging_capacity":this.product.packaging_capacity,
					"quantity":this.quantity,
					"path_image":this.product.path_image,
					"name":this.product.name,
					"price": this.product.price,
					"format":this.product.format,
				})}
				localStorage.setItem('storedID', JSON.stringify(local));
			}
		},
		props : ['prod'],
		mounted () {
			let json = JSON.parse(this.prod);
			this.product = json.product;
			this.products = json.recommandations;
			this.products = json.products;
		},

	}

