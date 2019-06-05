<template>
    <div>

            <!--    FILTERS PART    !-->

        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products-filters">
                    <div class="container">
                        <div class="row filters_row">
                            <div class="selection">


                                <div class="text-right d-flex row align-items-start justify-content-start">
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option type_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span class="filter_name">Type de vin</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'kind')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.kind" type="checkbox" :value="product.kind" v-model="selected_kinds">
                                                <label :for="product.kind">{{product.kind}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option format_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Format</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'format')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.format" type="checkbox" :value="product.format" v-model="selected_formats">
                                                <label :for="product.format">{{product.format}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'packaging_capacity')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.packaging_capacity" type="checkbox" :value="product.packaging_capacity" v-model="selected_packagings">
                                                <label :for="product.packaging_capacity">{{product.packaging_capacity}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option vintage_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Millésime</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-1" type="checkbox"><label for="mil-1">1946-1947</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-2" type="checkbox"><label for="mil-2">1982-1983</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-3" type="checkbox"><label for="mil-3">1984-1985</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-4" type="checkbox"><label for="mil-4">1994-1995</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-5" type="checkbox"><label for="mil-5">1996-1997</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-6" type="checkbox"><label for="mil-6">1998-1999</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-7" type="checkbox"><label for="mil-7">2002-2003</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-8" type="checkbox"><label for="mil-8">2004-2005</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-9" type="checkbox"><label for="mil-9">2006-2007</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-10" type="checkbox"><label for="mil-10">2008-2009</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-11" type="checkbox"><label for="mil-11">2010-2011</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-12" type="checkbox"><label for="mil-12">2012-2013</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-13" type="checkbox"><label for="mil-13">2014-2015</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-14" type="checkbox"><label for="mil-14">2016-2017</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-15" type="checkbox"><label for="mil-15">2018-2019</label><span></span></li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option appellation_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Appellation</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="appellation in appellations" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="appellation.name" type="checkbox" :value="appellation.name" v-model="selected_appellations">
                                                <label :for="appellation.name">{{appellation.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Catégorie</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="tag in tags" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="tag.name" type="checkbox" :value="tag.name" v-model="selected_tags">
                                                <label :for="tag.name">{{tag.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Pays</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'country')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.country" type="checkbox" :value="product.country" v-model="selected_countries">
                                                <label :for="product.country">{{product.country}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>

                                <div class="row price_filter pb-3">

                                    <div class="price-filter-label content col-md-auto">Prix :</div>
                                    <div class="price-filter price-filter-min col-md-auto"><span>CHF {{value_2[0]}}</span><span v-if="value_2[0] % 1 === 0">.–</span><span v-if="(((value_2[0]*1000) % 1 === 0) && (value_2[0] % 1 !== 0))">0</span></div>
                                    <div class="slider-price col-md-auto"><vue-slider v-model="value_2" :min="10.70" :max="915.50" :interval="0.10"/></div>
                                    <div class="price-filter price-filter-max col-md-auto"><span>CHF {{value_2[1]}}</span><span v-if="value_2[1] % 1 === 0">.–</span><span v-if="(((value_2[1]*1000) % 1 === 0) && (value_2[1] % 1 !== 0))">0</span></div>

                                </div>

                                <div class="row results_sort ml-3 pt-5 pb-3">
                                    <div class="sort col-md-auto">
                                        <select class="bootstrap-select">
                                            <option value="1" selected="selected">Noms A-Z</option>
                                            <option value="2">Noms Z-A</option>
                                            <option value="3">Prix croissants</option>
                                            <option value="4">Prix décroissants</option>
                                            <option value="4">Ancienneté croissante</option>
                                            <option value="4">Ancienneté décroissante</option>

                                        </select>
                                    </div>
                                    <div class="sort col-md-auto">
                                        Trier par :
                                    </div>
                                    <div class="results col-md-auto">
                                        14 produits trouvés
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--    PRODUCTS PART    !-->


        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row products_row">

                            <!-- Product -->
                            <div v-for="product in products"  class="col-xl-4 col-md-6" v-if="(((selected_appellations.length == 0) || isInArray(selected_appellations, product.appellation) == 1) && (product.price > value_2[0] && product.price < value_2[1]) && (selected_kinds.length == 0 || selected_kinds.includes(product.kind)) && (selected_formats.length == 0 || selected_formats.includes(product.format)) && (selected_packagings.length == 0 || selected_packagings.includes(product.packaging_capacity)) && (selected_tags.length == 0 || selected_tags.includes(product.tag)) && (selected_countries.length == 0 || selected_countries.includes(product.country)))">
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

<script src="./BigCatalog.js"></script>
<style src="./BigCatalog.css" scoped></style>
