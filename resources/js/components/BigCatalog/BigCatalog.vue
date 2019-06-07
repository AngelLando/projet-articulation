<template>
    <div>

        <!--    FILTERS PART    !-->

        <div class="super_container filters">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products-filters mt-3">
                    <div class="container">
                        <div class="row filters_row">
                            <div class="selection">


                                <div class="text-right d-flex all_filters row align-items-start justify-content-start">
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option type_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span class="filter_name">Type de vin</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'kind')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.kind" type="checkbox" :value="product.kind" v-model="selected_kinds">
                                                <label :for="product.kind">{{product.kind}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option format_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span>Format</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'format')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.format" type="checkbox" :value="product.format" v-model="selected_formats">
                                                <label :for="product.format">{{product.format}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'packaging_capacity')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.packaging_capacity" type="checkbox" :value="product.packaging_capacity" v-model="selected_packagings">
                                                <label :for="product.packaging_capacity">{{product.packaging_capacity}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option vintage_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span>Millésime</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-1" value=1946 type="checkbox" v-model="selected_years"><label for="mil-1">1946-1947</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-2" value=1982 type="checkbox" v-model="selected_years"><label for="mil-2">1982-1983</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-3" value=1984 type="checkbox" v-model="selected_years"><label for="mil-3">1984-1985</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-4" value="1994" type="checkbox" v-model="selected_years"><label for="mil-4">1994-1995</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-5" value="1996" type="checkbox" v-model="selected_years"><label for="mil-5">1996-1997</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-6" value="1998" type="checkbox" v-model="selected_years"><label for="mil-6">1998-1999</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-7" value="2002" type="checkbox" v-model="selected_years"><label for="mil-7">2002-2003</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-8" value="2004" type="checkbox" v-model="selected_years"><label for="mil-8">2004-2005</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-9" value="2006" type="checkbox" v-model="selected_years"><label for="mil-9">2006-2007</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-10" value="2008" type="checkbox" v-model="selected_years"><label for="mil-10">2008-2009</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-11" value="2010" type="checkbox" v-model="selected_years"><label for="mil-11">2010-2011</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-12" value=2012 type="checkbox" v-model="selected_years"><label for="mil-12">2012-2013</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-13" value="2014" type="checkbox" v-model="selected_years"><label for="mil-13">2014-2015</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-14" value="2016" type="checkbox" v-model="selected_years"><label for="mil-14">2016-2017</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input id="mil-15" value="2018" type="checkbox" v-model="selected_years"><label for="mil-15">2018-2019</label><span></span></li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option appellation_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span>Appellation</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="appellation in appellations" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="appellation.name" type="checkbox" :value="appellation.name" v-model="selected_appellations">
                                                <label :for="appellation.name">{{appellation.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span>Catégorie</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="tag in tags" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="tag.name" type="checkbox" :value="tag.name" v-model="selected_tags">
                                                <label :for="tag.name">{{tag.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3 arrow_right"><span>Pays</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
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

                                    <div class="price-filter-label content col-md-1 col-sm-1">Prix :</div>
                                    <div class="price-filter price-filter-min col-md-2 col-sm-1"><span>CHF {{value_2[0]}}</span><span v-if="value_2[0] % 1 === 0">.–</span><span v-if="(((value_2[0]*1000) % 1 === 0) && (value_2[0] % 1 !== 0))">0</span></div>
                                    <div class="slider-price col-md-4 col-sm-2"><vue-slider v-model="value_2" :min="10.70" :max="915.50" :interval="0.10"/></div>
                                    <div class="price-filter price-filter-max col-md-2 col-sm-1"><span>CHF {{value_2[1]}}</span><span v-if="value_2[1] % 1 === 0">.–</span><span v-if="(((value_2[1]*1000) % 1 === 0) && (value_2[1] % 1 !== 0))">0</span></div>

                                </div>

                                <div class="row results_sort ml-3 pt-4 pb-1">
                                    <div class="sort col-md-auto col-sm-3">
                                        <select class="bootstrap-select sort_by">
                                            <option value="1" selected="selected">Noms A-Z</option>
                                            <option value="2">Noms Z-A</option>
                                            <option value="3">Prix croissants</option>
                                            <option value="4">Prix décroissants</option>
                                            <option value="4">Ancienneté croissante</option>
                                            <option value="4">Ancienneté décroissante</option>

                                        </select>
                                    </div>
                                    <div class="sort col-md-auto col-sm-1">
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
                            <div v-for="product in products"  class="col-xl-4 col-md-6" v-if="(((selected_years.length == 0) || transform(selected_years, product) == 1) && ((selected_appellations.length == 0) || isInArray(selected_appellations, product.appellation) == 1) && ((selected_tags.length == 0) || isInArray(selected_tags, product.tag) == 1) && (product.price > value_2[0] && product.price < value_2[1]) && (selected_kinds.length == 0 || selected_kinds.includes(product.kind)) && (selected_formats.length == 0 || selected_formats.includes(product.format)) && (selected_packagings.length == 0 || selected_packagings.includes(product.packaging_capacity)) && (selected_countries.length == 0 || selected_countries.includes(product.country)))">
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
                                        <div class="product_name"><a :href="`produit/`+product.slug">{{ product.name }}</a></div>
                                    </div>
                                    <div class="product_info price d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_price text-right">CHF {{ product.price }}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span></div>
                                    </div>
                                    <div class="product_buttons">
                                        <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                           <div class="product_button product_quantity text-center d-flex flex-column align-items-center justify-content-center">
                                            <input type="number" class="choice_list text-center" placeholder= "1" min="1" :max="product.stock" @click="setQuantity(product)">
                                            <p class="error pt-2" v-if="errors.quantity">{{errors.quantity[0]}}</p>
                                        </div>
                                        <div @click="input(product)" class="product_button add_product text-center d-flex flex-column align-items-center justify-content-center">AJOUTER</div>
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
