export default {
    data() {
        return {
            url: 'cart',
            hover: false,
            errors: '',
            fired : false,
            cart : '',
            img : 'images/shopping-cart.svg',
            tvaPercent: 7.7,
            tva: 0,
            finalsubPrice: 0,
            livraison: 0,
            finalPrice: 0,
            productToDelete: '',
            id: document.querySelector("meta[name='user-id']"),
            emptyCart: true,
        }
    },
    mounted() {
        // dynamic url for subdirectories pages
        let href = window.location.pathname;
        let path = href.split('/');
        if (path.indexOf('produit') != -1) {
            this.url = '../' + this.url
            this.img = '../' + this.img
        } else if (path.indexOf('user') != -1) {
            this.url = '../' + this.url
            this.img = '../' + this.img
        } else {
            this.url =  this.url
            this.img =  this.img
        }
    },
    methods: {
        getCart: function () {
        //ICI PAULINE TU DOIS RéCUPéRER LES DONNéES QUI SONT DANS this.cart QUI VIENNENT DE LA BD
    // ET AJOUTER CHAQUE PRODUIT AU LOCALSTORAGE POUR NE PAS AVOIR BESOIN DE LE REFAIRE DERRIERE
        // If localstorage is empty, ajax and merge
        var local = JSON.parse(localStorage.getItem('storedID'))
        if (local == "" || local == null) {
            axios.get(this.url).catch(error => {
                this.errors = error.response.data.errors
            }).then(response => {
                this.cart = response.data;
                console.log(this.url);
            })
        // If localstorage is not empty, no ajax
    } else {
       this.cart = JSON.parse(localStorage.getItem('storedID'));
   }
this.adjustTotalPrice(); 
   this.hover = true;
},
deleteProduct: function (event) {
    if (this.id != null) {
        axios.delete('cartItem/' + event.id).catch(error => {
            console.dir(error);
        })
        var local = JSON.parse(localStorage.getItem('storedID'));
        var removeIndex = local.map(function (item) {
            return item.id;
        }).indexOf(event.id);
        local.splice(removeIndex, 1);
        localStorage.setItem('storedID', JSON.stringify(local));
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
               this.adjustTotalPrice();
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
        var finalsubPrice = 0;
        var total = product.price * product.quantity;
        product.totalprice = total;
        this.adjustTotalPrice();

        var prodId = product.id
        local.forEach(function (element) {
            if (element.id == prodId) {
                element.quantity = test;
            }
        });
        localStorage.setItem('storedID', JSON.stringify(local));

        if (this.id != null) {
            this.cartItem  = {
                product_id: product.id,
                quantity: product.quantity
            };
            axios.post('update/'+product.id, {quantity : product.quantity})
            .catch(error => {
                this.errors = error.response.data.errors
            }).then(response => {
                console.log(response)
            })
        }
    }
    ,
            adjustTotalPrice: function () {
            var finalsubPrice = 0;
            this.cart.forEach(function (product) {
                var total = product.price * product.quantity;
                product.totalprice = total
                finalsubPrice = finalsubPrice + product.totalprice;
            });
            this.finalsubPrice = finalsubPrice;
            this.tva = Math.round(this.tvaPercent * this.finalsubPrice / 100);
            this.calculateDelivery();
            this.finalPrice = this.finalsubPrice + this.tva + this.livraison;
        }
        ,

}
}