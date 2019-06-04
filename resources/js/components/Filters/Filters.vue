<template>

    <div>


        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row product_row">
                            <div class="selection">
                                <div class="text-right d-flex row align-items-start justify-content-start">
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option type_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span class="filter_name">Type de vin</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'kind')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.kind" type="checkbox">
                                                <label :for="product.kind">{{product.kind}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option format_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Format</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                            <ul>
                                                <li v-for="product in unique(products, 'format')" class="item_filter_btn chiller_cb" data-filter="*">
                                                    <input :id="product.format" type="checkbox">
                                                    <label :for="product.format">{{product.format}}</label>
                                                    <span></span>
                                                </li>
                                            </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'packaging_capacity')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.packaging_capacity" type="checkbox">
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
                                                <input :id="appellation.name" type="checkbox">
                                                <label :for="appellation.name">{{appellation.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Catégorie</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="tag in tags" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="tag.name" type="checkbox">
                                                <label :for="tag.name">{{tag.name}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Pays</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in unique(products, 'country')" class="item_filter_btn chiller_cb" data-filter="*">
                                                <input :id="product.country" type="checkbox">
                                                <label :for="product.country">{{product.country}}</label>
                                                <span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>

                                <div class="row price_filter ml-3 pb-3">

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
    </div>
</template>

<script src="./Filters.js"></script>
<style src="./Filters.css" scoped></style>



