<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div></div>
                <div class="products">
                    <div class="container pt-3">
                        <div v-if="!emptyCart" class=" text-center">Vous n'avez pas de produit dans votre panier actuellement.
                        </div>
                        <div v-if="emptyCart">
                         <div class ="cart_header row">
                            <p class="header_title col-6">Produits</p>
                            <p class="header_title col-1 text-right">Quantité</p>
                            <p class="header_title col-2 text-center">Prix</p>
                            <p class="header_title col-2 text-center">Total</p>
                        </div>

                        <div  class="row line_bottom pb-4 pt-4" v-for="product in products" v-if="product.id!=null">
                            <div class="col-1">
                              <a :href="'produit/'+product.slug"><img  class="product_cart_image" :src="product.path_image" alt=""></a> 

                           </div>
                           <div class="col-11 row content">
                            <div class="col-12"><p class="cart_product_name">{{product.name}}</p></div>
                            <div class="col-12"><p class="choice_packaging">Carton de {{product.packaging_capacity}} unité<span v-if="(product.packaging_capacity>1)">s</span> - {{product.format}}</p></div>
                            <div class="col-5 empty"></div>
                            <div class="col-2 text-right">
                                <input type="number" class="choice_list text-center" :class="product.id" :value="product.quantity" min="1" :max="product.stock" @click="adjustPrice(product)"> 
                            </div>                            
                            <p class="multiply">X</p>
                            
                            <div class="col-2"><p class="cart_product_price">CHF <template v-if="product.promotion > 0">{{product.promotion_price.toFixed(2)}}</template><template v-else>{{product.price.toFixed(2)}}</template></p></div>
                            <div class="col-2 text-center fix_cross"><p class="cart_product_price_total">CHF {{product.totalprice.toFixed(2)}}</p></div>
                            <div class=" col-1"><img @click="deleteProduct(product);checkLocalStorage()" src="images/delete.svg" class="cross" alt=""></div>

                        </div>
                    </div>


                    <div class ="cart_prices mt-3 mb-3 row">
                        <div class="col-1"></div>
                        <div class="row col-11 pt-2">
                            <div class="col-6"></div>
                                                        <div class="col-1"></div>

                            <p class="col-2 text-center cart_frais">TVA ({{tvaPercent}}%)</p>
                            <p class="col-2 text-right cart_frais_price">CHF {{tva.toFixed(2)}}</p>
                            <div class="col-1"></div>

                            <div class="col-6"></div>
                                                        <div class="col-1"></div>

                            <p class="col-2 text-center cart_frais">Livraison</p>
                            <p class="col-2 text-right cart_frais_price">CHF {{livraison.toFixed(2)}}</p>
                            <div class="col-1"></div>
                            <div class="col-6"></div>
                            <div class="col-1"></div>
                            
                            <p class="col-2 text-center cart_frais_price_total">Total</p>
                            <p class="col-2 text-right cart_frais_price_total">CHF {{finalPrice.toFixed(2)}}</p>

                            <div class="col-1"></div>
                        </div>
                    </div>
                    <div class = "cart_buttons mb-3 row">
                        <div class="col-6 vide_button"></div>
                        <div class=" col-3 continuer_achats text-center d-flex flex-column align-items-center justify-content-center"><a class="continuer_text" href="nos-vins"><img src="/six/images/polygon.svg" class="svg_button pr-2" alt="">Continuer mes achats</a></div>
                        <div class=" col-3 commander text-center d-flex flex-column align-items-center justify-content-center"><a class="commander_text" href="checkout">Finaliser la commande</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</template>

<script src="./Cart.js"></script>
<style scoped src="./Cart.css"></style>
