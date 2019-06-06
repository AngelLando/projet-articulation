export default {
    data() {
        return {
            products : [],
            product_id : '',
            quantity : '',
            errors : {},
            id:document.querySelector("meta[name='user-id']"),
        }
    },
    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
    },
    methods : {
        input: function (clickedProduct) {
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

            axios.post(url, this.cartItem)
            .catch(error => {
                this.errors = error.response.data.errors
                return;
            })
        } if(this.id == null) {
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
                      "packaging_capacity":clickedProduct.packaging_capacity,
                      "quantity":this.quantity,
                      "path_image":clickedProduct.path_image,
                      "name":clickedProduct.name,
                      "price": clickedProduct.price,
                      "format":clickedProduct.format,
                  })}
                    localStorage.setItem('storedID', JSON.stringify(local));
        }
    }
}

}


