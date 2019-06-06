export default {
	data() {
		return {
			products : [],
			tvaPercent:7.7,
			tva:0,
			finalsubPrice:0,
			livraison:25,
			finalPrice:0,
			productToDelete: '',
		}
	},
	methods:{
		deleteProduct : function (event) {
			axios.delete('cartItem/' + event.id).catch(error => {
				console.dir(error);
			})
		}
	},

	computed:{
		total: function(){
			return 34*$('option').text()
		},

	},
	
	props : ['cart'],
	mounted () {
		/*
				
		*/
		let id = document.querySelector("meta[name='user-id']")
		if (id != null) {
			this.products = JSON.parse(this.cart);
						console.log(this.products)


		} if(id == null) {
			this.products = JSON.parse(localStorage.getItem('storedID'));
		}
		var finalsubPrice= 0;
		this.products.forEach(function(product) {
			console.log(product.quantity)
			var total =  product.price*product.quantity;
			product.totalprice=total
			finalsubPrice=finalsubPrice+product.totalprice;
		});
		this.finalsubPrice=finalsubPrice;
		this.tva = Math.round(this.tvaPercent*this.finalsubPrice/100);
		this.finalPrice = this.finalsubPrice+this.tva+this.livraison;
	},
	beforeMount(){



	},

}