<template>
    <div>


        <div>Types : <strong>{{ selected_kinds }}</strong></div>

        <!--<VueFilters :secondValue.sync="selected_kinds"></VueFilters>!-->


        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row products_row">

                            <!-- Product -->
                            <div v-for="product in products"  v-if="(selected_kinds !== null | selected_kinds == product.kind)" class="col-xl-4 col-md-6">
                                <div class="product">
                                    <div>
                                        <div class="product_image"><img class="image" :src="product.path_image" alt=""><div class="favorite-heart"><img src="images/favorite-heart-empty.svg" class="svg" alt=""></div></div>
                                    </div>
                                    <div class="product_content">

                                        <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                            <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div>
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
                                            <div class="product_name"><a :href="`produit/`+product.slug">{{ product.name }}</a></div>
                                        </div>
                                        <div class="product_info price d-flex flex-row align-items-start justify-content-start">
                                            <div class="product_price text-right">CHF {{ product.price }}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></div>
                                        </div>
                                        <div class="product_buttons">
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                   <div class="product_button product_quantity text-center d-flex flex-column align-items-center justify-content-center">
                                              <select  class="choice_list">
                                                <option :value="product.packaging_capacity">{{product.packaging_capacity}}</option>
                                              </select>
                                          </div>
                                                <div class="product_button add_product text-center d-flex flex-column align-items-center justify-content-center">AJOUTER</div>
                                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                    <div><div><img src="images/cart.svg" class="svg" alt=""></div></div>
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

<script src="./Catalog.js"></script>
<style src="./Catalog.css" scoped></style>
