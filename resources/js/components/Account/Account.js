export default {

    data() {
        return {
            showOrders: true,
            showInfos: false,
            showAdresses: false,
            showNewsletters: false,
            showFavs: false,
            showArrayLeft: false,
            showArrayRight: true,
            json: [],
            orders: [],
            test: [],
            id:document.querySelector("meta[name='user-id']"),
            products:[],
            total: 0,
            user: []
        }
    },
    props : ['data'],
    mounted () {
        let json = JSON.parse(this.data)
        this.json = json;
        this.user = json.user;

        if (this.id != null) {
            var local = JSON.parse(localStorage.getItem('storedID'))
            if (local=="" || local==null) {
            }else{

               if (json.cart!="null") {
                    console.log("local storage + BD")
                    this.products=JSON.parse(localStorage.getItem('storedID')),
                    this.products.forEach(function(product) {
                        var cartItem  = {
                            product_id: product.id,
                            quantity: product.quantity,
                            product_price: product.price
                        };
                        axios.post('../add', cartItem)
                        .catch(error => {
                            this.errors = error.response.data.errors
                            return;
                        }).then(response => {

                            localStorage.removeItem("storedID");
                
                        })
                    });
                // on merge ici
               }else{
                    console.log("seulement local")
                    this.products=JSON.parse(localStorage.getItem('storedID')),
                    this.products.forEach(function(product) {
                        var cartItem  = {
                            product_id: product.id,
                            quantity: product.quantity,
                            product_price: product.price
                        };
                        axios.post('../add', cartItem)
                        .catch(error => {
                            this.errors = error.response.data.errors
                            return;
                        })
                    });
                }
            }
        }
    },

    methods:{
        open: function(event){
            var clickedElement = event.target;
            $(clickedElement).parent().toggleClass("active");

            if($('.order_container').hasClass("active")) {

                $('.arrow').addClass('up');
                $('.arrow').removeClass('down');
            } else {

                if($('.order_line').hasClass("active")) {

                    $('.arrow').addClass('up');
                    $('.arrow').removeClass('down');
                } else {
                    $('.arrow').removeClass('up');
                    $('.arrow').addClass('down');
                }
            }
        },


        underline: function(event){
            var clickedElement = event.target;
            $(clickedElement).addClass("active");
            $(clickedElement).removeClass("else");
            $(clickedElement).siblings().removeClass("active");
            $(clickedElement).siblings().addClass("else");
        },


        formatDate: function(value){
            var dateToString;
            var date = '';

            if (value !== null) {
                dateToString = value.toString();
                date = dateToString.substr(0, 10)
                return date;
            }
        },


        formatMontant: function(value){
            var montant = '';
            var formattedMontant = '';

            if (value > 0) {
                formattedMontant = (Math.ceil(value*20)/20).toFixed(2);
                return formattedMontant;
            }
        },
    },
}
