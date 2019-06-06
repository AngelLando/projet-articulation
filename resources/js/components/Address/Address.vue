<template>
    <div>
        <div class="super_container">
            <div class="super_container_inner">
                <div class="super_overlay"></div>
                <div class="products mb-5">
                    <div class="container pb-3">
                       <div class ="pt-3 pb-1 checkout row">
                        <form @submit.prevent="submitAddress(isHiddenBillTo,isHiddenShipTo)" action="#" class=" row billing-form">
                            <div class="row align-items-end col-md-9">
                                <div class="order_title col-md-12"><p>Adresse de commande</p></div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="gender1">Préfixe</label>
                                        <div class="select-wrap">
                                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                          <select name="gender1" id="gender1" v-model="gender1" class="form-control" required>
                                            <option value="m">Mr</option>
                                            <option value="f">Mme</option>
                                            <option value="other">/</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="firstname1">Prénom</label>
                                    <input type="text" id="firstname1" name="firstname1" v-model="firstname1" class="form-control" placeholder="" required>
                                    <p class="error pt-2" v-if="errors['address1.firstname1']">{{errors['address1.firstname1'][0]}}</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="lastname1">Nom de famille</label>
                                    <input class= "form-control" type="text" id="lastname1" name="lastname1" v-model="lastname1" required>
                                    <p class="error pt-2" v-if="errors['address1.lastname1']">{{errors['address1.lastname1'][0]}}</p>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="street1">Rue et numéro</label>
                                    <input type="text" class="form-control" id="street1" name="street1" v-model="street1" required>
                                    <p class="error pt-2" v-if="errors['address1.street1']">{{errors['address1.street1'][0]}}</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="npa1">NPA</label>
                                    <input type="number" id="npa1" name="npa1" v-model="npa1"  class="form-control" required>
                                    <p class="error pt-2" v-if="errors['address1.npa1']">{{errors['address1.npa1'][0]}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city1">Localité</label>
                                    <input type="text" id="city1" name="city1" v-model="city1" class="form-control" required>
                                    <p class="error pt-2" v-if="errors['address1.city1']">{{errors['address1.city1'][0]}}</p>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="region1">Région</label>
                                    <input type="text" id="region1" class="form-control" name="region1" v-model="region1" required>
                                    <p class="error pt-2" v-if="errors['address1.region1']">{{errors['address1.region1'][0]}}</p>
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
                                        <p class="error pt-2" v-if="errors['address1.country1']">{{errors['address1.country1'][0]}}</p>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mt-2 line_top pt-3">
                                <div class="item_filter_btn chiller_cb">
                                    <input id="shipto" type="checkbox" name="optradio" v-on:click="isHiddenShipTo =!isHiddenShipTo"><label for="shipto">Livrer à une autre adresse</label>
                                    <span></span>
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
                                                 <option value="other">/</option>
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
                        <div class="item_filter_btn chiller_cb">
                         <input id="billto" type="checkbox" name="optradio" v-on:click="isHiddenBillTo =!isHiddenBillTo"><label for="billto">Facturer à une autre adresse</label>
                         <span></span>
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
                                     <option value="other">/</option>
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
                            <label for="npa3">NPA</label>
                            <input type="number" id="npa3" name="npa3" v-model="npa3"  class="form-control">
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
            <div class="line_bottom pt-2"><p></p></div>
        </div>

    </div>
    <div class="col-md-12 line_bottom mb-4 pt-1 pb-4">
<label class="pb-2 comment" for="comment">Commentaire (optionnel)</label>

<textarea id="comment" class="col-md-12" name="comment" placeholder="Ajouter un commentaire..." v-model="comment">
</textarea>
</div>
    <div class=" col-md-12 row text-center ">
    <button type="submit" class="text-center col-12 submit_order">Commander</button>

</div>
</div>
<div class="col-md-3 order order-md-2 ml-2 mb-4">
  <h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="order_title">Votre panier</span>
</h4>
<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Sous total</h6>
        <small class="text-muted">Hors TVA et frais</small>
    </div>
    <span class="text-muted " v-model="finalsubPrice">CHF {{finalsubPrice}}<span v-if="finalsubPrice % 1 === 0">.–</span><span v-if="(((finalsubPrice*1000) % 1 === 0) && (finalsubPrice % 1 !== 0))">0</span></span>
</li>
<li class="list-group-item d-flex justify-content-between background_grey lh-condensed">
  <div>
    <h6 class="my-0">TVA</h6>
    <small class="text-muted" v-model="tva">7.7%</small>
</div>
<span class="text-muted">CHF {{tva}}<span v-if="tva % 1 === 0">.–</span><span v-if="(((tva*1000) % 1 === 0) && (tva % 1 !== 0))">0</span></span>
</li>
<li class="list-group-item d-flex justify-content-between lh-condensed">
  <div>
    <h6 class="my-0">Frais de livraison</h6>
    <small class="text-muted">En Suisse</small>
</div>
<span class="text-muted" v-model="livraison">CHF {{livraison}}<span v-if="livraison % 1 === 0">.–</span><span v-if="(((livraison*1000) % 1 === 0) && (livraison % 1 !== 0))">0</span></span>
</li>
<li v-if="isHiddenPromoCode" class="list-group-item d-flex justify-content-between bg-light">
  <div class="text-success">
    <h6 class="my-0">Code promo</h6>
          <small class="text-muted">cuki -10%</small>
</div>
<span class="text-success">- CHF {{rabais}}<span v-if="rabais % 1 === 0">.–</span><span v-if="(((rabais*1000) % 1 === 0) && (rabais % 1 !== 0))">0</span></span>
</li>

<li class="list-group-item d-flex justify-content-between background_grey">
      <h6 class="my-0">Total</h6>
  <p class="price_total" v-model="finalPrice">CHF {{finalPrice}}<span v-if="finalPrice % 1 === 0">.–</span><span v-if="(((finalPrice*1000) % 1 === 0) && (finalPrice % 1 !== 0))">0</span></p>
</li>
</ul>

<form @submit.prevent="checkPromoCode()" class="card p-2">
    <div class="input-group">
      <input type="text" class="form-control" id="promocode" placeholder="Code promo" v-model="promocode">
      <div class="input-group-append">
        <button  type="submit" class="btn btn_code btn-secondary">Appliquer</button>
    </div>
</div>
</form>
<div class="error mt-2" v-if="isError">Ce code promo n'est pas valide.</div>


<div class="card p-2 mt-3 pl-4 pt-3 ">
        <h6 class="my-0">Paiement</h6>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" v-model="payment_method" type="radio" class="custom-control-input"  required value="Carte de crédit">
                <label class="custom-control-label" for="credit">Carte de crédit</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" v-model="payment_method" type="radio" class="custom-control-input" checked required value="Paypal">
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>

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
