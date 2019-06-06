export default {
    data() {
        return {
            products : [],
            product_id : '',
            quantity : '',
            errors : {},
        }
    },
    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
    },
    methods : {
        input: function (clickedProduct) {
           let id = document.querySelector("meta[name='user-id']")
           if (id != null) {
            this.cartItem  = {
                product_id: clickedProduct.id,
                quantity: this.quantity
            };
            axios.post('../add', this.cartItem)
            .catch(error => {
                this.errors = error.response.data.errors
                return;
            })
        } if(id == null) {
            var local = localStorage.getItem('storedID');
            local = local ? JSON.parse(local): [];
            local.push({
                "id":clickedProduct.id,
                "packaging_capacity":clickedProduct.packaging_capacity,
                "quantity":this.quantity,
                "path_image":clickedProduct.path_image,
                "name":clickedProduct.name,
                "price": clickedProduct.price,
                "format":clickedProduct.format,
            })
            localStorage.setItem('storedID', JSON.stringify(local));
        }
    }
}

}


