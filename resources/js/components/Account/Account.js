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

        }
    },
    props : ['data'],
    mounted () {
        let json = JSON.parse(this.data)
        this.json = json;

        console.log(this.json);

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
        },


        underline: function(event){
            var clickedElement = event.target;
            $(clickedElement).addClass("active");
            $(clickedElement).removeClass("else");
            $(clickedElement).siblings().removeClass("active");
            $(clickedElement).siblings().addClass("else");
        },


        formatDate: function(value){

            console.log(value);

            var output = 0;
            var dateToString;
            var date = '';

            if (value !== null) {
                dateToString = value.toString();
                date = dateToString.substr(0, 10)
                return date;
            }
        },
    },
}
