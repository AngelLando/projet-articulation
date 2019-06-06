<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container pt-3">
                     <div class ="cart_header row">
                        <p class="header_title col-6">Produits</p>
                        <p class="header_title col-1 text-right">Quantité</p>
                        <p class="header_title col-2 text-center">Prix</p>
                        <p class="header_title col-2 text-center">Total</p>
                    </div>
                                     
                    <div  class="row line_bottom pb-4 pt-4" v-for="product in products">
                        <div class="col-1">
                           <img  class="product_cart_image" :src="product.path_image" alt="">

                       </div>
                       <div class="col-11 row">
                        <div class="col-12"><p class="cart_product_name">{{product.name}}</p></div>
                        <div class="col-12"><p class="choice_packaging">Carton de {{product.packaging_capacity}} unité<span v-if="(product.packaging_capacity>1)">s</span> - {{product.format}}</p></div>
                        <div class="col-5"></div>
                        <div class="col-2 text-right"> <select  class="choice_list">
                            <option :value="product.quantity">{{product.quantity}}</option>
                        </select>
                    </div>                            
                    <p class="multiply">X</p>
                    <div class="col-2"><p class="cart_product_price">CHF {{product.price}}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></p></div>
                    <div class="col-2 text-center fix_cross"><p class="cart_product_price_total">CHF {{product.totalprice}}<span v-if="product.totalprice % 1 === 0">.–</span><span v-if="(((product.totalprice*1000) % 1 === 0) && (product.totalprice % 1 !== 0))">0</span></p></div>
                    <div class=" col-1"><img @click="deleteProduct(product)" src="images/delete.svg" class="svg" alt=""></div>
                </div>
            </div>


            <div class ="cart_prices mt-3 mb-3 row">
                <div class="col-1"></div>
                <div class="row col-11 pt-2">
                    <div class="col-7"></div>
                    <p class="col-2 text-center cart_frais">TVA ({{tvaPercent}}%)</p>
                    <p class="col-2 text-right cart_frais_price">CHF {{tva}}<span v-if="tva % 1 === 0">.–</span><span v-if="(((tva*1000) % 1 === 0) && (tva % 1 !== 0))">0</span></p>
                    <div class="col-1"></div>
                    
                    <div class="col-7"></div>
                    <p class="col-2 text-center cart_frais">Livraison</p>
                    <p class="col-2 text-right cart_frais_price">CHF {{livraison}}<span v-if="livraison % 1 === 0">.–</span><span v-if="(((livraison*1000) % 1 === 0) && (livraison % 1 !== 0))">0</span></p>
                    <div class="col-1"></div>
                    <div class="col-7"></div>
                    <p class="col-2 text-center cart_frais_price_total">Total</p>
                    <p class="col-2 text-right cart_frais_price_total">CHF {{finalPrice}}<span v-if="finalPrice % 1 === 0">.–</span><span v-if="(((finalPrice*1000) % 1 === 0) && (finalPrice % 1 !== 0))">0</span></p>
                    <div class="col-1"></div>
                </div>
            </div>
            <div class = "cart_buttons mb-3 row">
                <div class="col-6"></div>
                <div class=" col-3 continuer_achats text-center d-flex flex-column align-items-center justify-content-center"><a class="continuer_text" href="nos-vins"><img src="images/polygon.svg" class="svg_button pr-2" alt="">Continuer mes achats</a></div>
                <div class=" col-3 commander text-center d-flex flex-column align-items-center justify-content-center"><a class="commander_text" href="checkout">Finaliser la commande</a></div>
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
