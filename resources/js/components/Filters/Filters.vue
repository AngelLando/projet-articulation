<template>

    <div>

        <div class="products">
            <div class="container">
                <div class="row products_bar_row">
                    <div class="col">
                        <div class="products_bar d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
                            <div class="products_bar_side d-flex flex-row align-items-center justify-content-start ml-lg-auto">
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="isotope_filter_text"><span>Type</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                                    <ul class="col-xl-4 col-md-6">
                                        <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                            <input type="checkbox">
                                            {{product.kind}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="products_dropdown text-right product_dropdown_filter">
                                        <div class="isotope_filter_text"><span>Format</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>

                                        <ul class="col-xl-4 col-md-6">
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.format}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="products_dropdown text-right product_dropdown_filter">
                                        <div class="isotope_filter_text"><span>Conditionnement</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>

                                        <ul class="col-xl-4 col-md-6">
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.packaging_capacity}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="products_dropdown text-right product_dropdown_filter">
                                        <div class="isotope_filter_text"><span>Millésime</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>

                                        <ul class="col-xl-4 col-md-6">
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
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="products_dropdown text-right product_dropdown_filter">
                                        <div class="isotope_filter_text"><span>Appellation</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>

                                        <ul class="col-xl-4 col-md-6">
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.appellation}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="products_dropdown text-right product_dropdown_filter">
                                        <div class="isotope_filter_text"><span>Catégorie</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>

                                        <ul class="col-xl-4 col-md-6">
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.tag}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="products_dropdown text-right product_dropdown_filter">
                                    <div class="products_dropdown text-right product_dropdown_filter">
                                        <div class="isotope_filter_text"><span>Pays</span><i class="fa fa-caret-down" aria-hidden="true"></i></div>

                                        <ul class="col-xl-4 col-md-6">
                                            <li v-for="product in products" class="item_filter_btn" data-filter="*">
                                                <input type="checkbox">
                                                {{product.country_name}}
                                            </li>
                                        </ul>
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


