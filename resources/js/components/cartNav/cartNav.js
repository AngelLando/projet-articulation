export default {
    data() {
        return {
            url: 'cart-nav',
            hover: false,
            errors: '',
            fired : false,
            cart : '',
            img : 'images/shopping-cart.svg'
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

            // If localstorage is not empty, no ajax
            var local = JSON.parse(localStorage.getItem('storedID'))
            if (local != "" || local != null) {
                this.cart = JSON.parse(localStorage.getItem('storedID'));

                // If localstorage is empty, ajax and merge
            } else {
                axios.get(this.url).catch(error => {
                    this.errors = error.response.data.errors
                }).then(response => {
                    this.cart = response.data;
                    console.log(this.cart);

                    //ICI PAULINE TU DOIS RéCUPéRER LES DONNéES QUI SONT DANS this.cart QUI VIENNENT DE LA BD
                    // ET AJOUTER CHAQUE PRODUIT AU LOCALSTORAGE POUR NE PAS AVOIR BESOIN DE LE REFAIRE DERRIERE
                })
            }
            this.hover = true;
        }
    }
}