export default {

    data() {
        return {
            products : [],
            product_id : '',
            quantity : 1,
            errors : {},
            id:document.querySelector("meta[name='user-id']"),
            productHREF : '',
            cart: [],
        }
    },

    props : ['prod'],

    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
        let href = window.location.pathname;
        let path = href.split('/');
        if (path.indexOf('produit') == -1) {
            this.productHREF = 'produit/'
        }

    },

    methods : {

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

        input: function (clickedProduct) {
            this.errors = [] ;
            if (this.id != null) {
                this.cartItem  = {
                    product_id: clickedProduct.id,
                    quantity: this.quantity
                };
                let href = window.location.pathname;
                let path = href.split('/');
                let url;
                if(path[path.length-2] == 'produit') {
                    url = '../add'
                } else {
                    url = 'add'
                }
                axios.post(url, this.cartItem).catch(error => {
                    this.errors = error.response.data.errors
                    return;
                }).then(response=>{
                    if (response.status==200) {
                                            $('.numberItems').text(response.data);

                    }
                })
            }

            if (this.quantity>clickedProduct.stock || this.quantity<=0) {
            } else {

                var clickedElement = event.target;

                if($(clickedElement).hasClass("product_button")) {
                    $(clickedElement).addClass("item-added");
                    setTimeout(function () {
                        $(clickedElement).removeClass('item-added');
                    }, 1500);
                } else {
                    $(clickedElement).parent().parent().parent().parent().children(':nth-child(2)').addClass("item-added");
                    setTimeout(function () {
                        $(clickedElement).parent().parent().parent().parent().children(':nth-child(2)').removeClass('item-added');
                    }, 1500);
                }
                if (this.id == null) {

                    var local = localStorage.getItem('storedID');
                    local = local ? JSON.parse(local): [];
                    var prodId = clickedProduct.id
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
                                "id":clickedProduct.id,
                                "slug":clickedProduct.slug,
                                "packaging_capacity":clickedProduct.packaging_capacity,
                                "quantity":this.quantity,
                                "path_image":clickedProduct.path_image,
                                "name":clickedProduct.name,
                                "price": clickedProduct.price,
                                "promotion_price": clickedProduct.promotion_price,
                                "format":clickedProduct.format,
                                "promotion":clickedProduct.promotion
                            })

                    }
                    localStorage.setItem('storedID', JSON.stringify(local));
                              $('.numberItems').text(JSON.parse(localStorage.getItem('storedID')).length);

                }
            }
        },

        setQuantity:function(product){
            this.quantity = event.target.value;
        },
    },
}


