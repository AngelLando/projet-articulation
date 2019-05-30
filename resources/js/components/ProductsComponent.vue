<template>
<div>
    <h1>Tous les produits</h1>
    <div v-for="product in products" style="display : inline;">
        <p>{{ product.name }}</p>
        <p>{{ product.year }}</p>
        <img :src="product.path_image" alt="">
        <h2>{{product.price}} CHF</h2>
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
            axios.get('products').then(({data}) => this.products = data.products)
               .then(data=> console.log(data.products))
        },
        props : ['sta']
    }
</script>