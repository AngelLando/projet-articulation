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
	/**mounted () {
		this.products = JSON.parse(this.cart);
		var finalsubPrice= 0;
				
		this.products.forEach(function(product) {
			var total =  product.price*product.packaging_capacity;
			product.totalprice=total
			finalsubPrice=finalsubPrice+product.totalprice;
		});
		this.finalsubPrice=finalsubPrice;
	this.finalPrice = this.finalsubPrice+this.tva+this.livraison;
	},**/
	beforeMount(){
		this.product.totalprice=this.product.price*this.product.quantity;
				//this.tva = Math.round(this.tvaPercent*this.this.product.totalprice/100);



	},

}