<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row product_row">
                            <div class ="breadcrumbs col-xl-12 mb-4 ml-3"><a href="nos-vins">Nos vins</a> ><a href=""> {{product.kind}}</a> > <strong><a href="">{{product.name}}</a></strong></div>
                            <!-- Product -->
                            <div class="col-xl-4">
                                <div class="product">
                                        <div>
                                            <div class="product_image"><div class="favorite-heart empty" @click="toggleHeart"></div><img class="image" :src="product.path_image" alt=""><div class="share_container"><a class="share" @click="sendMail"></a></div></div>
                                        </div>
                                </div>
                            </div>
                                <div class ="col-xl-7 ">
                                    <p class ="product_kind ">{{product.kind}}</p>
                                    <p class="product_name">{{product.name}}</p>
                                    <p class="product_price pb-2">CHF {{ product.price }}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></p>
                                    <div class="product_buttons">
                                        <form @submit.prevent="submitCartItem">
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div class="product_button product_quantity text-center d-flex flex-column align-items-center justify-content-center">
                                                    <input type="number" class="choice_list text-center" placeholder= "1" v-model="quantity" min="1" :max="product.stock">

                                                </div>

                                                <div @click="input(product.id)" class="product_button add_product text-center d-flex flex-column align-items-center justify-content-center">AJOUTER</div>
                                                <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                    <div class="cart"></div>
                                                </div>
                                            </div>
                                            <p class="error pt-2" v-if="errors.quantity">{{errors.quantity[0]}}</p>

                                        </form>
                                    </div>
                                    <div class="selection">
                                        <div class="selection_title pt-4"><p>Années pour ce vin :</p></div>
                                        <div>
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div @click="set_choice" class="product_selection product_selection_selected year_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">{{product.year}}</div>
                                                <div @click="set_choice" class="product_selection year_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">2016</div>
                                                <div @click="set_choice" class="product_selection year_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">2017</div>

                                            </div>
                                        </div>
                                        <div class="selection_title pt-4"><p>Condtionnements disponibles pour ce format :</p></div>
                                        <div>
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div @click="set_choice" class="product_selection product_selection_selected conditionnement_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">Caisse de {{product.packaging_capacity}} bouteilles</div>

                                            </div>
                                        </div>
                                        <div class="selection_title pt-4"><p>Formats disponibles :</p></div>
                                        <div>
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div @click="set_choice" class="product_selection_selected product_selection conditionnement_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">{{product.format}}</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-xl-12 "></div>
                                <div class="row more_info ml-3 pt-5 pb-3">
                                    <div class="description more_info_selected col-md-auto" @click="underline" v-on:click="isHiddenDescr=true; isHiddenInfo=false; isHiddenRating=false">Description</div>
                                    <div class="information col-md-auto" @click="underline" v-on:click="isHiddenDescr=false; isHiddenInfo=true; isHiddenRating=false">Information</div>
                                    <div class="rating col-md-auto" @click="underline" v-on:click="isHiddenDescr=false; isHiddenInfo=false; isHiddenRating=true">Avis (1)</div>
                                </div>
                                <div class="content content_description col-xl-12 ml-3" v-if="isHiddenDescr">{{product.description}}
                                </div>
                                <div class="content content_information col-xl-12 ml-3" v-if="isHiddenInfo"><p >Cotation : {{product.quotation}}</p>
                                    <p>Teneur en alcool : 
                                    {{product.alcohol}} %</p>
                                    <p >Type : {{product.kind}}</p>
                                </div>
                                <div class="content content_rating col-xl-12 ml-3" v-if="isHiddenRating"><p>Excellent !!</p>
                                <p><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i></p>
                                <p>Ce vin est de loin mon favori parmi tout le catalogue, je le recommande à 100 % ! Il se prête à toutes les occasions, ni trop sucré, ni trop sec, la perfection. </p>
                            </div>
                            <div class = "col-xl-12 text-center"><hr class="line ml-3 mt-4 mb-4"></div>
                        </div>
                        <div class="container pt45 pb70">
                            <div class="row px20 pt0 similar_products">
                                <div class="col-md-5 hidden-xs hidden-sm block similarities">D'autres produits similaires</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./singleProduct.js"></script>
<style scoped src="./singleProduct.css"></style>

