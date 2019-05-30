<template>
<div>
    <h1>Tous les produits</h1>
    <div v-for="product in products" style="display : inline;">
        <p>{{ product.product_name }}</p>
        <p>{{ product.product_year }}</p>
        <img :src="product.product_path_image" alt="">
        <h2>{{product.product_price}} CHF</h2>
        <a :href="product.id"> Acheter ce produit </a>
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
            axios.get('products').then(({data}) => this.products = data)
        },
        props : ['sta']
    }

</script>