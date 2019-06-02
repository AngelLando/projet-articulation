<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row product_row">
                            <div class ="breadcrumbs col-xl-12 mb-3 ml-3"><p>Nos vins > 2015 Château Brane-Cantenac</p></div>
                            <!-- Product -->
                            <div class="col-xl-4">
                                <div class="product">
                                        <!--<div><div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <div><div><img src="images/favorite-heart-empty.svg" class="svg" alt=""><div>+</div></div></div>
                                        </div></div>!-->
                                        <div>
                                            <div class="product_image"><img class="image" :src="product.path_image" alt=""><div class="share"><img src="images/share.svg" class="svg" alt=""><div class="favorite-heart"><img src="images/favorite-heart-empty.svg" class="svg" alt=""></div></div></div>
                                        </div>
                                    </div>
                                </div>

                                <div class ="col-xl-5 ">
                                    <p class ="product_year ">2015</p>
                                    <p class="product_name">Château les Justices</p>
                                    <p class="product_price pb-2">CHF 30.16</p>
                                    <div class="product_buttons">
                                        <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                            <div class="product_button product_quantity text-center d-flex flex-column align-items-center justify-content-center">
                                                <p>quantité</p>
                                            </div>
                                            <div class="product_button add_product text-center d-flex flex-column align-items-center justify-content-center">AJOUTER</div>
                                            <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                                <div><div><img src="images/cart.svg" class="svg" alt=""></div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="selection">
                                        <div class="selection_title pt-4"><p>Années pour ce vin :</p></div>
                                        <div>
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div class="product_selection year_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">2015</div>
                                                <div class="product_selection year_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">2016</div>
                                                <div class="product_selection year_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">2017</div>

                                            </div>
                                        </div>
                                        <div class="selection_title pt-4"><p>Condtionnements disponibles pour ce format :</p></div>
                                        <div>
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div class="product_selection conditionnement_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">Carton de 12 unités</div>

                                            </div>
                                        </div>
                                        <div class="selection_title pt-4"><p>Formats disponibles :</p></div>
                                        <div>
                                            <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                                <div class="product_selection conditionnement_choice text-center d-flex flex-column align-items-center justify-content-center mr-3">75 cl</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class ="col-xl-12 ml-3"></div>
                                <div class="row more_info ">
                                    <div class="description more_info_selected col-md-auto"><p v-on:click="isHiddenDescr=true; isHiddenInfo=false; isHiddenRating=false">Description</p></div>
                                    <div class="information col-md-auto"><p v-on:click="isHiddenDescr=false; isHiddenInfo=true; isHiddenRating=false">Information</p></div>
                                    <div class="rating col-md-auto"><p v-on:click="isHiddenDescr=false; isHiddenInfo=false; isHiddenRating=true">Avis (4)</p></div>
                                </div>
                                                 <div class="content content_description col-xl-12 ml-3"><p v-if="isHiddenDescr">Le Château Les Justices, en Sauternes, appartient à la famille Gonet-Médeville, surnommée "l'antiquaire du Sauternes", du fait de son Château Gilette qui défie le temps. En effet, ce nectar est mis en bouteilles seulement après une vingtaine d'années de vieillissement. Le vin du Château Les Justices en est une superbe introduction...
                                    </p></div>
                                    <div class="content content_information col-xl-12 ml-3"><p v-if="isHiddenInfo">Ceci est un petit test information
                                    </p></div>
                                                <div class="content content_information col-xl-12 ml-3"><p v-if="isHiddenRating">Ceci est un petit test notes
                                    </p></div>

                            </div>
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

