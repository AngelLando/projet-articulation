<template>
    <div>
        <h1>Tous les produits</h1>
        <div v-for="product in products" style="display : inline;">

            <p>{{ product.name }}</p>
            <p>{{ product.year }}</p>
            <img :src="product.path_image" alt="">
            <h2>{{product.price}} CHF</h2>
                        <router-link :to="{ path: '/'+product.id, params: {productid:product.id}}">Acheter ce produit</router-link>
            <button class="btn btn-sm btn-primary float-right">Buy Now</button>


    </div>

</div>
</template>

<script>
export default {
    data() {
        return {
            products : []
        }
    },
    mounted () {
        axios.get('products').then(({data}) => this.products = data.products)
    },
    props : ['sta']
}
</script>