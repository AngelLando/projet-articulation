<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container pb-3">
                       <div class ="pt-3 pb-1 cart_header row">
                        <p class="header_title col-6">Produits</p>
                        <p class="header_title col-1 text-right">Quantité</p>
                        <p class="header_title col-2 text-left">Prix unitaire</p>
                        <p class="header_title col-2 text-center">Total</p>
                    </div>
                    <div v-for="product in products"  class="">
                        <div class ="pt-3 pb-1 cart_content row">
                          <div class="product_cart_image pl-3"> <img  class="product_cart_image" :src="product.path_image" alt=""> </div> 
                          <p class="cart_product_name col-6 row pl-5 mt-2">{{product.name}}</p>
                          <div class="col-1 text-right product_quantity text-center ">
                              <select  class="choice_list">
                                <option :value="product.packaging_capacity">{{product.packaging_capacity}}</option>
                            </select>
                        </div><p class="multiply">X</p>
                        <p class="cart_product_price col-2">CHF {{product.price}}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></p>
                        <p class="cart_title col-2 text-center cart_product_price_total">CHF {{product.price * product.packaging_capacity}}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></p>
                        <div><img src="images/delete.svg" class="svg" alt=""></div>
                        <p class="cart_product_details">Carton de {{product.packaging_capacity}} unité<span v-if="(product.packaging_capacity>1)">s</span> - {{product.format}}</p>

                    </div>
                </div>
                <div class ="cart_prices">
                    <div class="row pt-2">
                        <div class="col-7"></div>
                        <p class="col-2 text-right cart_frais">TVA</p>
                        <p class="col-2 text-center cart_frais_price">CHF 150.-</p>
                        <div class="col-1"></div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-7"></div>
                        <p class="col-2 text-right cart_frais">Livraison</p>
                        <p class="col-2 text-center cart_frais_price">CHF 25.-</p>
                        <div class="col-1"></div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-7"></div>
                        <p class="col-2 text-right cart_frais_price_total">Total</p>
                        <p class="col-2 text-center cart_frais_price_total">CHF 225.50</p>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div class = "cart_buttons row">
                    <div class="col-6"></div>
                       <div class=" col-3 continuer_achats text-center d-flex flex-column align-items-center justify-content-center mr-3"><a class="continuer_text" href="nos-vins"><img src="images/polygon.svg" class="svg_button pr-2" alt="">Continuer mes achats</a></div>
                       <div class=" col-2 commander text-center d-flex flex-column align-items-center justify-content-center mr-3"><a class="commander_text" href="checkout">Commander</a></div>
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
