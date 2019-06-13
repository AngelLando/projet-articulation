export default {
	data() {
		return {
			product : [],
			isHiddenDescr:true,
			isHiddenInfo:false,
			isHiddenRating:false,
			cartItem : '',
			product_id: '',
			quantity : 1,
			errors : {},
			exception:false,
            id: document.querySelector("meta[name='user-id']"),
			id: document.querySelector("meta[name='user-id']"),
		}
	},
	methods:{

		sendMail: function(){
			var name = this.product.slug;
			window.location.href = "mailto:?subject=Belle découverte&body=Cher ami-e, je te recommande ce vin que j'apprécie beaucoup : http://pingouin1.heig-vd.ch/six/produit/" +name+ ". Belle découverte et à bientôt.";
		},

		toggleHeart: function(event){
			var clickedElement = event.target;

			if($(clickedElement).hasClass("full")) {
				$(clickedElement).addClass("empty");
				$(clickedElement).removeClass("full");
			} else {
				$(clickedElement).addClass("full");
				$(clickedElement).removeClass("empty");
			}
		},
		underline: function(event){
			var clickedElement = event.target;
			$(clickedElement).removeClass("more_info");
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
				}).then(response=>{
					if (response.status==200) {
						                    $('.numberItems').text(response.data);

					}
				})
			}
			if (this.quantity>this.product.stock || this.quantity<=0) {
			}else{
				var clickedElement = event.target;

                if($(clickedElement).hasClass("product_button")) {
                    $(clickedElement).addClass("item-added");
                    setTimeout(function () {
                        $(clickedElement).removeClass('item-added');
                    }, 1500);
                } else {
                    $(clickedElement).parent().parent().children(':nth-child(2)').addClass("item-added");
                    setTimeout(function () {
                        $(clickedElement).parent().parent().children(':nth-child(2)').removeClass('item-added');
                    }, 1500);
                }
                if (this.id == null) {

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
						"slug":this.product.slug,
						"packaging_capacity":this.product.packaging_capacity,
						"quantity":this.quantity,
						"path_image":this.product.path_image,
						"name":this.product.name,
						"price": this.product.promotion_price,
						"format":this.product.format,
					})

				}
				localStorage.setItem('storedID', JSON.stringify(local));
                    $('.numberItems').text(JSON.parse(localStorage.getItem('storedID')).length);
			}
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

