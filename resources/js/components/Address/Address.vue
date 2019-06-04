<template>
   <!--  <div>
        <div>
            <form @submit.prevent="submitAddress" >
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" v-model="firstname">
                <label for="lastname">Nom de famille</label>
                <input type="text" id="lastname" name="lastname" v-model="lastname">
                <label for="gender">Genre</label>
                <select name="gender" id="gender" v-model="gender">
                    <option value="male">Homme</option>
                    <option value="female">Femme</option>
                </select>
                <label for="street">Rue et Numéro</label>
                <input type="text" id="street" name="street" v-model="street">
                <label for="npa">NPA</label>
                <input type="number" id="npa" name="npa" v-model="npa">
                <label for="city">Localité</label>
                <input type="text" id="city" name="city" v-model="city">
                <label for="region">Région</label>
                <input type="text" id="region" name="region" v-model="region">
                <label for="country">Suisse</label>
                <select name="country" id="country" v-model="country">
                    <option value="CH">Suisse</option>
                    <option value="FR">France</option>
                </select>
                <button type="submit">Passer commande</button>
            </form>
        </div>
    </div>-->


    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products">
                    <div class="container pb-3">
                       <div class ="pt-3 pb-1 checkout row">
                        <form @submit.prevent="submitAddress(isHiddenBillTo,isHiddenShipTo)" action="#" class="billing-form">
                            <div class="order_title col-md-12"><p>Adresse de commande</p></div>
                            <div class="row align-items-end">
                             <div class="col-md-2">
                                <div class="form-group">
                                    <label for="gender1">Préfixe</label>
                                    <div class="select-wrap">
                                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                      <select name="gender1" id="gender1" v-model="gender1" class="form-control" required>
                                        <option value="m">Mr</option>
                                        <option value="f">Mme</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="firstname1">Prénom</label>
                                <input type="text" id="firstname1" name="firstname1" v-model="firstname1" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="lastname1">Nom de famille</label>
                                <input class= "form-control" type="text" id="lastname1" name="lastname1" v-model="lastname1" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="street1">Rue et numéro</label>
                                <input type="text" class="form-control" id="street1" name="street1" v-model="street1" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="npa1">NPA</label>
                                <input type="number" id="npa1" name="npa1" v-model="npa1"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city1">Localité</label>
                                <input type="text" id="city1" name="city1" v-model="city1" class="form-control" required>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="region1">Région</label>
                                <input type="text" id="region1" class="form-control" name="region1" v-model="region1" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="country1">Pays</label>
                                <div class="select-wrap">
                                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                  <select name="country1" id="country1" v-model="country1" class="form-control" required>
                                    <option value="CH">Suisse</option>
                                    <option value="FR">France</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mt-2">
                            <div class="radio">
                                <label><input id="shipto" type="checkbox" name="optradio" v-on:click="isHiddenShipTo =!isHiddenShipTo">Livrer à une autre adresse</label>

                            </div>
                            <div class="row" v-if="isHiddenShipTo">
                                <div class="order_title col-md-12"><p>Adresse de livraison</p></div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender2">Préfixe</label>
                                        <div class="select-wrap">
                                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                          <select name="gender2" id="gender2" v-model="gender2" class="form-control" >
                                            <option value="m">Mr</option>
                                            <option value="f">Mme</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="firstname2">Prénom</label>
                                    <input type="text" id="firstname2" name="firstname2" v-model="firstname2" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="lastname2">Nom de famille</label>
                                    <input class= "form-control" type="text" id="lastname2" name="lastname2" v-model="lastname2">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="street2">Rue et numéro</label>
                                    <input type="text" class="form-control" id="street2" name="street2" v-model="street2" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="npa2">NPA</label>
                                    <input type="number" id="npa2" name="npa2" v-model="npa2"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city1">Localité</label>
                                    <input type="text" id="city2" name="city2" v-model="city2" class="form-control">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="region2">Région</label>
                                    <input type="text" id="region2" class="form-control" name="region2" v-model="region2">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="country2">Pays</label>
                                    <div class="select-wrap">
                                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                      <select name="country2" id="country2" v-model="country2" class="form-control">
                                        <option value="CH">Suisse</option>
                                        <option value="FR">France</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label><input id="billto" type="checkbox" name="optradio" v-on:click="isHiddenBillTo =!isHiddenBillTo">Facturer à une autre adresse</label>
                    </div>
                    <div class="row" v-if="isHiddenBillTo">
                             <div class="order_title col-md-12"><p>Adresse de facturation</p></div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender3">Préfixe</label>
                                        <div class="select-wrap">
                                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                          <select name="gender3" id="gender3" v-model="gender3" class="form-control">
                                            <option value="m">Mr</option>
                                            <option value="f">Mme</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="firstname3">Prénom</label>
                                    <input type="text" id="firstname3" name="firstname3" v-model="firstname3" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="lastname3">Nom de famille</label>
                                    <input class= "form-control" type="text" id="lastname3" name="lastname3" v-model="lastname3">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="street3">Rue et numéro</label>
                                    <input type="text" class="form-control" id="street3" name="street3" v-model="street3" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="npa1">NPA</label>
                                    <input type="number" id="npa1" name="npa1" v-model="npa3"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city3">Localité</label>
                                    <input type="text" id="city3" name="city3" v-model="city3" class="form-control">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="region3">Région</label>
                                    <input type="text" id="region3" class="form-control" name="region3" v-model="region3">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="country3">Pays</label>
                                    <div class="select-wrap">
                                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                      <select name="country3" id="country3" v-model="country3" class="form-control">
                                        <option value="CH">Suisse</option>
                                        <option value="FR">France</option>
                                    </select>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-9"></div>
            <button type="submit" class="submit_order">Payer la commande</button>
        </div>
    </div>
</div>
</form><!-- END -->
</div>
</div>
</div>
</div>
</div>
</div>
</template>

<script src="./Address.js"></script>
<style src="./Address.css" scoped></style>
