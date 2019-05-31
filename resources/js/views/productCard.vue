   <template>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <img :src="product.image" :alt="product.name">
                    <h3 class="title" v-html="product.name"></h3>
                    <p class="text-muted">{{product.description}}</p>
                    <h4>
                        <span class="small-text text-muted float-left">$ {{product.price}}</span>
                        <span class="small-text float-right">Available Quantity: {{product.stock}}</span>
                    </h4>
                    <br>
                    <hr>
                </div>
            </div>
        </div>
    </template>

    <script>
    export default {
        data(){
            return {
                product : []
            }
        },
        beforeMount(){
            axios.get(`products/${this.$route.params.productid}`).then(({data}) => this.product = data.products)     
        }
    }
    </script>

    <style scoped>
    .small-text { font-size: 18px; }
    .title { font-size: 36px; }
    </style>