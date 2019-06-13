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
                                <div class="row delete-filters">
                                    <p @click="resetAllFilters"><i class="fa fa-times-circle" aria-hidden="true"></i>  Effacer tous les filtres</p>
                                </div>
                                <div class="text-right all_filters row align-items-start justify-content-start">
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option type_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span class="filter_name">Type de vin</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <button @click="resetFilter1" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li v-for="product in unique(products, 'kind')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input @click="reStartCounter" :id="product.kind" class="filter1" type="checkbox" :value="product.kind" v-model="selected_kinds">
                                                <label :for="product.kind">{{product.kind}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option format_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span>Format</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <button @click="resetFilter2" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li v-for="product in unique(products, 'format')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input @click="reStartCounter" :id="product.format" class="filter2" type="checkbox" :value="product.format" v-model="selected_formats">
                                                <label :for="product.format">{{product.format}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <button @click="resetFilter3" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li v-for="product in unique(products, 'packaging_capacity')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input @click="reStartCounter" :id="product.packaging_capacity" class="filter3" type="checkbox" :value="product.packaging_capacity" v-model="selected_packagings">
                                                <label :for="product.packaging_capacity">{{product.packaging_capacity}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option vintage_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span>Millésime</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul id="years">
                                            <button @click="resetFilter4" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-1" value=1946 class="filter4" type="checkbox" v-model="selected_years"><label for="mil-1">1946-1947</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-2" value=1982 class="filter4" type="checkbox" v-model="selected_years"><label for="mil-2">1982-1983</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-3" value=1984 class="filter4" type="checkbox" v-model="selected_years"><label for="mil-3">1984-1985</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-4" value="1994" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-4">1994-1995</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-5" value="1996" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-5">1996-1997</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-6" value="1998" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-6">1998-1999</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-7" value="2002" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-7">2002-2003</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-8" value="2004" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-8">2004-2005</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-9" value="2006" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-9">2006-2007</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-10" value="2008" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-10">2008-2009</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-11" value="2010" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-11">2010-2011</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-12" value=2012 class="filter4" type="checkbox" v-model="selected_years"><label for="mil-12">2012-2013</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-13" value="2014" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-13">2014-2015</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-14" value="2016" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-14">2016-2017</label><span></span></li>
                                            <li class="item_filter_btn chiller_cb" data-filter="*"><input @click="reStartCounter" id="mil-15" value="2018" class="filter4" type="checkbox" v-model="selected_years"><label for="mil-15">2018-2019</label><span></span></li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option appellation_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span>Appellation</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul id="appellations">
                                            <button @click="resetFilter5" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li v-for="appellation in appellations" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input @click="reStartCounter" :id="appellation.name" class="filter5" type="checkbox" :value="appellation.name" v-model="selected_appellations">
                                                <label :for="appellation.name">{{appellation.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span>Catégorie</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <button @click="resetFilter6" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li v-for="tag in tags" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input @click="reStartCounter" :id="tag.name" class="filter6" type="checkbox" :value="tag.name" v-model="selected_tags">
                                                <label :for="tag.name">{{tag.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center align-items-center justify-content-center mr-3 arrow_right"><span>Pays</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <button @click="resetFilter7" class="btn-reset">
                                                Effacer
                                            </button>
                                            <li v-for="product in unique(products, 'country')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input @click="reStartCounter" :id="product.country" class="filter7" type="checkbox" :value="product.country" v-model="selected_countries">
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
                                    <div @click="reStartCounter" class="slider-price col-md-4 col-sm-2"><vue-slider v-model="value_2" :min="10.70" :max="915.50" :interval="0.10"/></div>
                                    <div class="price-filter price-filter-max col-md-2 col-sm-1"><span>CHF {{value_2[1]}}</span><span v-if="value_2[1] % 1 === 0">.–</span><span v-if="(((value_2[1]*1000) % 1 === 0) && (value_2[1] % 1 !== 0))">0</span></div>
                                </div>
                                <div class="row results_sort ml-3 pt-4 pb-1">
                                    <div class="sort col-md-auto col-sm-3">
                                        <select class="bootstrap-select sort_by">
                                            <option value="1" selected="selected">Prix croissants</option>
                                            <option value="2">Prix décroissants</option>
                                        </select>
                                    </div>
                                    <div class="sort col-md-auto col-sm-1">
                                        Trier par :
                                    </div>
                                    <div class="results col-md-auto">
                                        {{counter}} produits trouvés
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
                            <div v-for="(product,index,i) in products"  class="counter col-xl-4 col-md-6 products_found" v-if="(((selected_years.length == 0) || transform(selected_years, product) == 1) && ((selected_appellations.length == 0) || isInArray(selected_appellations, product.appellation) == 1) && ((selected_tags.length == 0) || isInArray(selected_tags, product.tag) == 1) && (product.price > value_2[0] && product.price < value_2[1]) && (selected_kinds.length == 0 || selected_kinds.includes(product.kind)) && (selected_formats.length == 0 || selected_formats.includes(product.format)) && (selected_packagings.length == 0 || selected_packagings.includes(product.packaging_capacity)) && (selected_countries.length == 0 || selected_countries.includes(product.country)))">
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
                                        <div class="product_price text-right">
                                            <template v-if="product.promotion > 0"><span class="badge badge-success">– {{ product.promotion }}%</span></template> CHF
                                            <template v-if="product.promotion > 0">{{ product.promotion_price.toFixed(2) }} <del>CHF {{ product.price.toFixed(2) }}</del></template>
                                            <template v-else>{{ product.price.toFixed(2) }}</template>
                                        </div>
                                    </div>
                                    <div class="product_buttons">
                                        <div class="btn-quantity text-right d-flex flex-row align-items-start justify-content-start">
                                           <div class="product_button product_quantity text-center d-flex flex-column align-items-center justify-content-center">
                                            <input type="number" class="choice_list text-center" placeholder="1" min="1" v-model="quantity" :max="product.stock" @click="setQuantity(product)">
                                            <p class="error pt-2" v-if="errors.quantity">{{errors.quantity[0]}}</p>
                                        </div>
                                        <div @click="input(product)" class="product_button add_product text-center d-flex flex-column align-items-center justify-content-center">AJOUTER</div>
                                        <div class="product_button add_product added text-center flex-column align-items-center justify-content-center">AJOUTÉ</div>
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
