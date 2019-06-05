export default {
	data() {
		return {
			products : [],
			tvaPercent:7.7,
			tva:0,
			finalsubPrice:0,
			livraison:25,
			finalPrice:0,
		}
	},
	methods:{
		underline: function(event){
		},
	},

	computed:{
		total: function(){
			return 34*$('option').text()
		},

	},
	
	props : ['cart'],
	mounted () {
		this.products = JSON.parse(this.cart);
		var finalsubPrice= 0;
		this.products.forEach(function(product) {
			var total =  product.price*product.packaging_capacity;
			product.totalprice=total
			finalsubPrice=finalsubPrice+product.totalprice;
		});
		this.finalsubPrice=finalsubPrice;
		this.tva = Math.round(this.tvaPercent*this.finalsubPrice/100) ;
		console.log(this.tva)
				console.log(this.finalsubPrice)
						console.log(this.livraison)

	this.finalPrice = this.finalsubPrice+this.tva+this.livraison;
	},
	beforeMount(){


	},

}