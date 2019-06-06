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

			let id = document.querySelector("meta[name='user-id']")
			if (id != null) {
				this.cartItem  = {
					product_id: this.product.id,
					quantity: this.quantity
				};
				axios.post('../add', this.cartItem)
				.catch(error => {
					this.errors = error.response.data.errors
					return;
				})
			} if(id == null) {
				//var local = JSON.parse(localStorage.getItem('storedID')) || [];
				var local = localStorage.getItem('storedID');
				local = local ? JSON.parse(local): [];
				local.push({
					"id":this.product.id,
					"packaging_capacity":this.product.packaging_capacity,
					"quantity":this.quantity,
					"path_image":this.product.path_image,
					"name":this.product.name,
					"price": this.product.price,
					"format":this.product.format,
				})
				/**local['id']=this.product.id;
				local['quantity']=this.quantity;
				local['img']=this.product.path_image;
				local['name']=this.product.name;
				local['price']=this.product.price;
				local['format']=this.product.format;**/
				localStorage.setItem('storedID', JSON.stringify(local));
			}


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

