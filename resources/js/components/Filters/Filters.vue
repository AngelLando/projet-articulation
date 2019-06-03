<template>

    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container">
                        <div class="row product_row">
                            <div class="selection">
                                <div class="selection_title pt-4"><p>Années pour ce vin :</p></div>
                                <div>
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="products_dropdown text-right">
                                            <div class="filter_option type_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Type</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                            <ul>
                                                <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                    <input type="checkbox">
                                                    {{product.type}}
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
                                                <li class="item_filter_btn" data-filter="*">1947 - 1946</li>
                                                <li class="item_filter_btn" data-filter="*">1983 - 1982</li>
                                                <li class="item_filter_btn" data-filter="*">1985 - 1984</li>
                                                <li class="item_filter_btn" data-filter="*">1995 - 1994</li>
                                                <li class="item_filter_btn" data-filter="*">1997 - 1996</li>
                                                <li class="item_filter_btn" data-filter="*">1999 - 1998</li>
                                                <li class="item_filter_btn" data-filter="*">2003 - 2002</li>
                                                <li class="item_filter_btn" data-filter="*">2005 - 2004</li>
                                                <li class="item_filter_btn" data-filter="*">2007 - 2006</li>
                                                <li class="item_filter_btn" data-filter="*">2009 - 2008</li>
                                                <li class="item_filter_btn" data-filter="*">2011 - 2010</li>
                                                <li class="item_filter_btn" data-filter="*">2013 - 2012</li>
                                                <li class="item_filter_btn" data-filter="*">2015 - 2014</li>
                                                <li class="item_filter_btn" data-filter="*">2017 - 2016</li>
                                                <li class="item_filter_btn" data-filter="*">2019 - 2018</li>
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
                                            <div class="filter_option packaging_filter text-center d-flex flex-column align-items-center justify-content-center mr-3"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                            <ul>
                                                <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                    <input type="checkbox">
                                                    {{product.packaging_capacity}}
                                                </li>
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
                                        <div class="filter_option appelation_filter text-center d-flex flex-column align-items-center justify-content-center mr-3">Appellation</div>
                                        <div class="filter_option tag_filter text-center d-flex flex-column align-items-center justify-content-center mr-3">Catégorie</div>
                                        <div class="filter_option country_filter text-center d-flex flex-column align-items-center justify-content-center mr-3">Pays</div>
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



