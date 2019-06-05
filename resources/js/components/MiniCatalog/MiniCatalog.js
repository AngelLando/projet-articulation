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
        console.log(json);
        this.products = json.products;
    },
    methods : {
        input: function (clickedProduct) {
            this.cartItem  = {
                product_id: clickedProduct.id,
                quantity: this.quantity
            };
            console.log(this.cartItem);

            axios.post('../add', this.cartItem)
                .catch(error => {
                    this.errors = error.response.data.errors
                    return;
                }).then(response => {
                    console.log(response)
            })

            var existing = localStorage.getItem('storedData');
            existing = existing ? existing.split(',') : [];
            existing.push(clickedProduct.id);
            localStorage.setItem('storedData', existing.toString());
        }
    }

}


