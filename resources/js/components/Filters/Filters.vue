<template>

    <div>


        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row product_row">
                            <div class="selection">
                                <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option type_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span class="filter_name">Type</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.kind}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option format_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Format</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                            <ul>
                                                <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                    <input type="checkbox">
                                                    {{product.format}}
                                                </li>
                                                <button class="btn-primary btn-apply-filter">test</button>
                                            </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.packaging_capacity}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option vintage_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Millésime</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">1947 - 1946</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">1983 - 1982</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">1985 - 1984</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">1995 - 1994</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">1997 - 1996</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">1999 - 1998</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2003 - 2002</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2005 - 2004</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2007 - 2006</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2009 - 2008</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2011 - 2010</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2013 - 2012</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2015 - 2014</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2017 - 2016</li>
                                            <li class="item_filter_btn" data-filter="*"><input type="checkbox">2019 - 2018</li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option appellation_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Appellation</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.appellation}}
                                            </li>
                                        </ul>
                                    </div>





                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Catégorie</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.tag}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="products_dropdown text-right">
                                        <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Pays</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                        <ul>
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.country}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="content col-xl-12">Prix :</div>

                                <vue-slider v-model="value_2" :min="10.77" :max="915.45" :interval="0.01"/>


                                <div class="row results_sort ml-3 pt-5 pb-3">
                                    <div class="sort col-md-auto">
                                        liste
                                    </div>
                                    <div class="sort col-md-auto">
                                        Trier par :
                                    </div>
                                    <div class="results col-md-auto">
                                        14 produits trouvés
                                    </div>
                                </div>

                                <div>
                                    <b-form-checkbox-group

                                        id="checkbox-group-1"
                                        v-model="selected"
                                        :options="options"
                                        name="flavour-1"
                                    ></b-form-checkbox-group>

                                    <div>Selected: <strong>{{ selected }}</strong></div>
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



