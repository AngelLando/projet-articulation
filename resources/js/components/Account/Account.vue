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
                <div class="container pt-3">
                    <div class ="orders_header row">
                        <p class="header_title col-3">Commande n°</p>
                        <p class="header_title col-2 text-right">Date</p>
                        <p class="header_title col-2 text-center">Montant</p>
                        <p class="header_title col-3 text-center">État</p>
                        <p class="header_title col-2 text-center">Paiement</p>
                    </div>
                </div>
                <div>Pas de commande pour le moment.</div>
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
