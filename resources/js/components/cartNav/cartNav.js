export default {
    data() {
        return {
            url: 'cart-nav',
            hover: false,
            errors: '',
            fired: false,
            cart: [],
            img: 'images/shopping-cart.svg',
            tvaPercent: 7.7,
            tva: 0,
            finalsubPrice: 0,
            livraison: 0,
            finalPrice: 0,
            productToDelete: '',
            id: document.querySelector("meta[name='user-id']"),
            emptyCart: true,
            cartHref : 'cart',
            deleteSVG : 'images/delete.svg',
            checkout : 'checkout',
            slug :'produit/',
            cartItemHref: 'cartItem/',
            updateHref: 'update/',
            width: '',
            numberItems:0,
        }
    },
    mounted() {
        // dynamic url for subdirectories pages
        let href = window.location.pathname;
        let path = href.split('/');
        this.width = $(window).width();
        if (path.indexOf('produit') != -1) {
            this.url = '../' + this.url
            this.img = '../' + this.img
            this.cartHref = '../' + this.cartHref
            this.deleteSVG = '../' + this.deleteSVG
            this.checkout = '../' + this.checkout
            this.slug = '../'+this.slug
            this.cartItemHref = '../'+this.cartItemHref
            this.updateHref = '../'+this.updateHref
        } else if (path.indexOf('user') != -1) {
            this.slug='../' + this.slug
            this.url = '../' + this.url
            this.img = '../' + this.img
            this.cartHref = '../' + this.cartHref
            this.deleteSVG = '../' + this.deleteSVG
            this.checkout = '../' + this.checkout
            this.cartItemHref = '../'+this.cartItemHref
            this.updateHref = '../'+this.updateHref
        } else if (path.indexOf('admin') != -1) {
            this.slug = '../'+this.slug
            this.url = '../' + this.url
            this.img = '../' + this.img
            this.cartHref = '../' + this.cartHref
            this.deleteSVG = '../' + this.deleteSVG
            this.checkout = '../' + this.checkout
            this.cartItemHref = '../'+this.cartItemHref
            this.updateHref = '../'+this.updateHref
        } else {
            this.url = this.url
            this.img = this.img
            this.cartHref = this.cartHref
            this.deleteSVG = this.deleteSVG
            this.checkout = this.checkout
            this.cartItemHref = this.cartItemHref
            this.updateHref = this.updateHref
        }
        this.cartNumberItems();
    },
    methods: {
        cartNumberItems:function(){
            var number = 0;
            if (this.id != null) {
              axios.get(this.url).catch(error => {
               this.errors = error.response.data.errors;
           }).then(response => {
            this.numberItems = response.data.length;
        })

       }else{ 
        this.cart = JSON.parse(localStorage.getItem('storedID'));
        if (this.cart==null || this.cart=="") {

        }else{
            this.numberItems = this.cart.length;

        }
    }
},


getCart: function () {
    if (this.id != null) {
        axios.get(this.url).catch(error => {
            this.errors = error.response.data.errors
        }).then(response => {
            if(response.data != null) {
                this.cart = response.data;
            } else {
                this.cart = null
            }

            if (this.cart == null || this.cart == "") {
                this.emptyCart = false;
            }
            else {
                this.emptyCart = true;
                this.adjustTotalPrice();
            }
        })
    } else {
        this.cart = JSON.parse(localStorage.getItem('storedID'));
        if (this.cart == "" || this.cart == null) {
            this.emptyCart = false;
        } else {
            this.emptyCart = true;
        }
    }
    this.adjustTotalPrice();
    this.hover = true;
},
deleteProduct: function (event) {
    if (this.id != null) {
        axios.delete(this.cartItemHref + event.id).catch(error => {
            console.dir(error);
        }).then(response=>{
            if (response.status==200) {
                $('.numberItems').text(response.data);

            }
        })

        Vue.set(event, 'id', null)
        Vue.set(event, 'quantity', null)
        Vue.set(event, 'price', null)

        if (this.cart == "" || this.cart == null) {
            this.emptyCart = false;
        }
        this.adjustTotalPrice();

    } else {
        var local = JSON.parse(localStorage.getItem('storedID'));
        var removeIndex = local.map(function (item) {
            return item.id;
        }).indexOf(event.id);
        local.splice(removeIndex, 1);
        localStorage.setItem('storedID', JSON.stringify(local));
        this.cart = JSON.parse(localStorage.getItem('storedID'));
        if (this.cart == "" || this.cart == null) {
            this.emptyCart = false;
        }
        this.adjustTotalPrice();
        $('.numberItems').text(JSON.parse(localStorage.getItem('storedID')).length);
    }
},
calculateDelivery: function () {
    var nbBouteilles = 0;
    this.cart.forEach(function (element) {
        nbBouteilles = nbBouteilles + parseInt(element.quantity, 10);
        ;
    })
    if (nbBouteilles < 12) {
        this.livraison = 30;
    }
    if (nbBouteilles >= 12 && nbBouteilles < 23) {
        this.livraison = 35;
    }
    if (nbBouteilles >= 24 && nbBouteilles < 34) {
        this.livraison = 40;
    }
    if (nbBouteilles >= 35) {
        this.livraison = 0;
    }
}
,
adjustPrice: function (product) {
    var local = localStorage.getItem('storedID'),
    local = local ? JSON.parse(local) : [];
    var test = event.target.value
    product.quantity = test;
    this.adjustTotalPrice();

    var prodId = product.id
    local.forEach(function (element) {
        if (element.id == prodId) {
            element.quantity = test;
        }
    });
    localStorage.setItem('storedID', JSON.stringify(local));

    if (this.id != null) {
        this.cartItem = {
            product_id: product.id,
            quantity: product.quantity
        };
        axios.post(this.updateHref + product.id, {quantity: product.quantity})
        .catch(error => {
            this.errors = error.response.data.errors
        }).then(response=>{
                    if (response.status==200) {
                                            $('.numberItems').text(response.data);

                    }
                })
    }
},
adjustTotalPrice: function () {
    var finalsubPrice = 0;
    this.cart.forEach(function (product) {
        if(product.promotion > 0) {
            var total = product.promotion_price * product.quantity;
        } else {
            var total = product.price * product.quantity;
        }
        product.totalprice = total
        finalsubPrice = finalsubPrice + product.totalprice;
    });
    this.finalsubPrice = finalsubPrice;
    this.tva = Math.round(this.tvaPercent * this.finalsubPrice / 100);
    this.calculateDelivery();
    this.finalPrice = this.finalsubPrice + this.tva + this.livraison;
    this.finalPrice = Math.round(this.finalPrice * 100) / 100;
}
,

}
}