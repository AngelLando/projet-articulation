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
			id:document.querySelector("meta[name='user-id']")
		}
	},
	methods:{
		deleteProduct : function (event) {
			if (this.id != null) {
				console.log(event.id)
				axios.delete('cartItem/' + event.id).catch(error => {
					console.dir(error);
				})
			}else{
				var test = JSON.parse(localStorage.getItem('storedID'));
				var removeIndex = test.map(function(item) { return item.id; }).indexOf(event.id);
				test.splice(removeIndex,1);
				localStorage.setItem('storedID', JSON.stringify(test));
				this.products = JSON.parse(localStorage.getItem('storedID'));
			}
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