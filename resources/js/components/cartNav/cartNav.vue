<template>
    <div>
        <li class="nav-item" @mouseover="getCart()" @mouseleave="hover = false">
            <img :src="img" class="icon" width="23" height="23" alt="Panier">
            <a class="nav-link" :href="url">PANIER</a>
            <div class="cart" v-if="hover == true">
                <div>
                    <div class="cart_header row">
                        <p class="header_title col-6">Produits</p>
                        <p class="header_title col-1 text-right">Quantité</p>
                        <p class="header_title col-2 text-center">Prix</p>
                    </div>

                    <div class="row line_bottom pb-4 pt-4" v-for="product in cart" v-if="product.id!=null">

                        <div class="col-11 row">
                            <div class="col-12"><p class="cart_product_name">{{product.name}}</p></div>
                            <div class="col-12"><p class="choice_packaging">Carton de {{product.packaging_capacity}}
                                unité<span v-if="(product.packaging_capacity>1)">s</span> - {{product.format}}</p></div>
                            <div class="col-5"></div>
                            <div class="col-2 text-right">
                                <input type="number" class="choice_list text-center" :class="product.id"
                                       :value="product.quantity" min="1" :max="product.stock"
                                       @click="adjustPrice(product)">
                            </div>
                            <p class="multiply">X</p>
                            <div class="col-2"><p class="cart_product_price">CHF {{product.price}}<span
                                    v-if="product.price % 1 === 0">.–</span><span
                                    v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></p>
                            </div>
                            <div class=" col-1"><img @click="deleteProduct(product);checkLocalStorage()"
                                                     src="images/delete.svg" class="cross" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    </div>
</template>

<script src="./cartNav.js"></script>
<style scoped src="./cartNav.css"></style>
