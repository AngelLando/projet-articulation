<template>
    <div class="account container pt45 pb70">
        <div class="row px20 pt0">
            <div class="col-md-3 hidden-xs hidden-sm block">
                <nav class="static-menu serif h4 mb35">
                    <p>Mon compte test2</p>
                    <ul class="nav-account m0 p0">
                        <li class="mb20 active" @click="underline" v-on:click="showOrders=true; showInfos=false; showAdresses=false; showNewsletters=false; showFavs=false">
                            Mes commandes
                        </li>
                        <li class="mb20 else" @click="underline" v-on:click="showOrders=false; showInfos=true; showAdresses=false; showNewsletters=false; showFavs=false">
                            Mes informations
                        </li>
                        <li class="mb20 else" @click="underline" v-on:click="showOrders=false; showInfos=false; showAdresses=true; showNewsletters=false; showFavs=false">
                            Mes adresses
                        </li>
                        <li class="mb20 else" @click="underline" v-on:click="showOrders=false; showInfos=false; showAdresses=false; showNewsletters=true; showFavs=false">
                            Mes newsletters
                        </li>
                        <li class="mb20 else" @click="underline" v-on:click="showOrders=false; showInfos=false; showAdresses=false; showNewsletters=false; showFavs=true">
                            Mes préférés
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="content orders col-md-9 hidden-xs hidden-sm block" v-if="showOrders">
                <h2>Mes commandes</h2>

                <div class="row number_orders">

                    <div class="col-md-auto text-left ">
                        Afficher
                    </div>
                    <div class="number_list col-md-auto">
                        <select class="browser-default custom-select">
                            <option selected value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class="col-6 text-left">
                        commandes par page
                    </div>
                    <nav class="no-page col-md-auto text-left">
                        <ul>
                            <span class="arrow-left"><img src="images/left-arrow.svg" v-if="showArrayLeft" alt=""></span>
                            <li class="active" @click="underline" v-on:click="showArrayLeft=false; showArrayRight=true" >1</li>
                            <li class="else" @click="underline" v-on:click="showArrayLeft=true; showArrayRight=false" >2</li>
                            <span class="arrow-right"><img src="images/right-arrow.svg" v-if="showArrayRight" alt=""></span>
                        </ul>
                    </nav>
                </div>
                <div class="container pt-3">
                    <div class="orders_header row">
                        <p class="col-4">Commande n°</p>
                        <p class="col-2 text-left">Date</p>
                        <p class="col-2 text-left">Montant</p>
                        <p class="col-2 text-left">État</p>
                        <p class="col-2 text-left">Paiement</p>
                    </div>
                    <div class="order_line row">
                        <p class="col-1 down-arrow else"><img src="images/down-arrow.svg" alt=""></p>
                        <p class="col-3">10701058609848</p>
                        <p class="col-2 text-left">11.03.19</p>
                        <p class="col-2 text-left">CHF 108.00</p>
                        <p class="col-2 text-left">Livrée</p>
                        <p class="col-2 text-left">Réglé</p>
                    </div>
                </div>
            </div>
            <div class="content infos col-md-9 hidden-xs hidden-sm block" v-if="showInfos">
                <h2>Mes informations</h2>
                <div>Rien de fait pour le moment :)</div>
            </div>
            <div class="content addresses col-md-9 hidden-xs hidden-sm block" v-if="showAdresses">
                <h2>Mes adresses</h2>
                <div>Rien de fait non plus pour le moment :)</div>
            </div>
            <div class="content newsletters col-md-9 hidden-xs hidden-sm block" v-if="showNewsletters">
                <h2>Mes newsletters</h2>
                <div>Pas de newsletter pour le proto :)</div>
            </div>
            <div class="content favorites col-md-9 hidden-xs hidden-sm block" v-if="showFavs">
                <h2>Mes préférés</h2>
                <div>Pas de wishlist pour le proto :)</div>
            </div>
        </div>
    </div>
</template>

<script src="./Account.js"></script>
<style src="./Account.css" scoped></style>
