<template>
    <div class="account container pt45 pb70">
        <div class="row px20 pt0">
            <div class="col-md-3 hidden-xs hidden-sm block">
                <nav class="static-menu serif h4 mb35">
                    <p class="myaccount">Mon compte</p>
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
                <hr>
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
                            <li class="active">1</li> <!--  @click="underline" v-on:click="showArrayLeft=false; showArrayRight=true"  !-->
                            <li class="else" >2</li> <!--   @click="underline" v-on:click="showArrayLeft=true; showArrayRight=false"   !-->
                            <span class="arrow-right"><img src="images/right-arrow.svg" v-if="showArrayRight" alt=""></span>
                        </ul>
                    </nav>
                </div>
                <div class="container pt-3">
                    <div class="orders_header row">
                        <p class="col-2 ">N°</p>
                        <p class="col-3 date-col text-left">Date</p>
                        <p class="col-3 text-left">Montant</p>
                        <p class="col-2 text-left">État</p>
                        <p class="col-1 text-left">Paiement</p>
                    </div>
                        <div class="order_container row" v-for="order in json.orderList" @click="open">
                            <div class="order_line row">
                                <p class="col-1 arrow down"></p>
                                <p class="col-1 text-col ">{{order.no}}</p>
                                <p class="col-3 date text-col text-left">{{formatDate(order.date)}}</p>
                                <p class="col-3 total text-col text-left">CHF {{formatMontant(order.total)}}<span v-if="order.total % 1 === 0">.–</span></p>
                                <p class="col-2 status text-col text-left">{{order.shipping_status}}</p>
                                <p class="col-2 payment text-col text-left">{{order.payment_status}}</p>
                            </div>
                            <div class="more">
                                <div class="row">
                                    <div class="col-12 resume">
                                        <b>Produits commandés</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div v-for="product in order.products" class="col-md-6">
                                        <div class="row">
                                            <div class="col-2">
                                                <img  class="product_order_image" :src="product.image" alt="">
                                            </div>
                                            <div class="col-8">
                                                <p>{{product.name}}</p>
                                                <p>{{product.format}}</p>
                                                <p>CHF {{product.price}}<span v-if="product.price % 1 === 0">.–</span><span v-if="(((product.price*1000) % 1 === 0) && (product.price % 1 !== 0))">0</span> x {{product.quantity}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div v-if="json.length == 0">Pas de commande pour le moment.</div>

            </div>
            <div class="content infos col-md-9 hidden-xs hidden-sm block" v-if="showInfos">
                <h2>Mes informations</h2>
                <hr>
                <form method="POST">
                    <!--{{ csrf_field() }}!-->
                    <div class="form-group">
                        <label for="lastname">Nom</label>
                        <input type="text" name="lastname" class="form-control" :placeholder="lastname" id="lastname" placeholder="Nom" v-model="lastname">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" class="form-control" :placeholder="firstname" id="firstname" placeholder="Prénom" v-model="firstname">
                    </div>
                    <div class="form-group">
                        <label for="gender">Genre</label>
                        <select class="form-control" name="gender" id="gender" v-model="gender">
                            <option value=""></option>
                            <option value="m">Homme</option>
                            <option value="f">Femme</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-control" :placeholder="username" id="username" placeholder="Nom d'utilisateur" v-model="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" :placeholder="email" id="email" placeholder="Email" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" v-model="password">
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Date de naissance</label>
                        <input type="date" name="birth_date" class="form-control" :placeholder="birth_date" id="birth_date" placeholder="Date de naissance" v-model="birth_date">
                    </div><hr>
                    <div @click="updateUser(user.id)" class="btn btn-primary btn-edit-infos">Mettre à jour mon compte</div>
                </form>
            </div>
            <div class="content addresses col-md-9 hidden-xs hidden-sm block" v-if="showAdresses">
                <h2>Mes adresses</h2>
                <hr>
                <div>Rien de fait non plus pour le moment :)</div>
            </div>
            <div class="content newsletters col-md-9 hidden-xs hidden-sm block" v-if="showNewsletters">
                <h2>Mes newsletters</h2>
                <hr>
                <div>Pas de newsletter pour le proto :)</div>
            </div>
            <div class="content favorites col-md-9 hidden-xs hidden-sm block" v-if="showFavs">
                <h2>Mes préférés</h2>
                <hr>
                <div>Pas de wishlist pour le proto :)</div>
            </div>

            <button @click="deleteUser()">SUPPRIMER LE COMPTE</button>
            <p v-if="redirect">VOUS ALLEZ ÊTRE REDIRIGé</p>
        </div>
    </div>
</template>

<script src="./Account.js"></script>
<style src="./Account.css" scoped></style>
