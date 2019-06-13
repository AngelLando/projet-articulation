<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row products_row">

                            <!-- Product -->
                            <div v-for="product in products"  class="col-xl-4 col-md-6 products_found">
                                <div class="product">
                                    <div>
                                        <div class="product_image"><img class="image" :src="product.path_image" alt=""><div class="favorite-heart empty" @click="toggleHeart"></div></div>
                                    </div>
                                    <div class="product_content">

                                        <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="product_info year_format d-flex flex-row align-items-start justify-content-start">
                                            <div>
                                                <div>
                                                    <div class="product_year">{{product.year}}</div>
                                                </div>
                                            </div>
                                            <div class="ml-auto text-right">
                                                <div class="product_format">{{product.format}}</div>
                                            </div>
                                        </div>
                                        <div class="product_info name d-flex flex-row align-items-start justify-content-start">
                                            <div class="product_name"><a :href="productHREF + product.slug">{{ product.name }}</a></div>
                                        </div>
                                        <div class="product_info price d-flex flex-row align-items-start justify-content-start">
                                            <div class="product_price text-right">
                                                <template v-if="product.promotion > 0"><span class="badge badge-success">– {{ product.promotion }}%</span></template> CHF
                                                <template v-if="product.promotion > 0">{{ product.promotion_price.toFixed(2) }} <del>CHF {{ product.price.toFixed(2) }}</del></template>
                                                <template v-else>{{ product.price.toFixed(2) }}</template>
                                            </div>
                                        </div>
                                        <div class="product_buttons">
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                             <div class="product_button product_quantity text-center d-flex flex-column align-items-center justify-content-center">
                                                <input type="number" class="choice_list text-center" placeholder= "1" v-model="quantity" min="1" :max="product.stock" @click="setQuantity(product)">

                                                <p class="error pt-2" v-if="errors.quantity">{{errors.quantity[0]}}</p>

                                            </div>
                                            <div @click="input(product)" class="product_button add_product text-center d-flex flex-column align-items-center justify-content-center">AJOUTER</div>
                                            <div class="product_button add_product added text-center flex-column align-items-center justify-content-center">AJOUTÉ ✔</div>
                                            <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                <div><div @click="input(product)"><img src="images/cart.svg" class="svg" alt=""></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script src="./MiniCatalog.js"></script>
<style src="./MiniCatalog.css" scoped></style>
