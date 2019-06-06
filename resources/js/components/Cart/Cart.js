export default {
	data() {
		return {
			products : [],
			tvaPercent:7.7,
			tva:0,
			finalsubPrice:0,
			livraison:25,
			finalPrice:0,
			product :JSON.parse(localStorage.getItem('storedID')),
			productToDelete: '',
		}
	},
	methods:{
		underline: function(event){
		},
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
			console.log("test")
			this.products = JSON.parse(this.cart);

		} if(id == null) {
			console.log("d")
			this.products = JSON.parse(localStorage.getItem('storedID'));
			console.log(this.products)
		}
		var finalsubPrice= 0;
		this.products.forEach(function(product) {
			var total =  product.price*product.packaging_capacity;
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