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
			id:document.querySelector("meta[name='user-id']"),
			emptyCart:true,
		}
	},
	methods:{
		deleteProduct : function (event) {
			if (this.id != null) {
				axios.delete('cartItem/' + event.id).catch(error => {
					console.dir(error);
				})
				var local = JSON.parse(localStorage.getItem('storedID'));
				var removeIndex = local.map(function(item) { return item.id; }).indexOf(event.id);
				local.splice(removeIndex,1);
				localStorage.setItem('storedID', JSON.stringify(local));
				//this.products = JSON.parse(localStorage.getItem('storedID'));
				//si le local storage est différent de la BD, cette ligne fout la merde parce qu'on lui dit d'utiliser comme liste de produit le LocalStorage mais si il n'y a rien dedans c'est le bordel!
				// par exemple, si trop de temps passe, si il change de navigateur, si il reset le local storage, etc. C'est ce qui m'est arrivé et pour ça que j'ai cru qu'on ne pouvait plus delete.
				// pour l'instant, la fonction delete marche mais il faut recharger pour qu'elle soit effective.
			}else{
				var local = JSON.parse(localStorage.getItem('storedID'));
				var removeIndex = local.map(function(item) { return item.id; }).indexOf(event.id);
				local.splice(removeIndex,1);
				localStorage.setItem('storedID', JSON.stringify(local));
				this.products = JSON.parse(localStorage.getItem('storedID'));
			}
		},
		checkLocalStorage:function(){
			var local = JSON.parse(localStorage.getItem('storedID'))
			if (this.id==null) {
				if (local=="") {
					this.emptyCart=false;

				}
			}
		}
	},

	computed:{


	},

	props : ['cart'],
	mounted () {


		if (this.id != null) {
			this.products = JSON.parse(this.cart);
		} else {
			var local = JSON.parse(localStorage.getItem('storedID'))
			if (local=="") {
				this.emptyCart=false;
			} 
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