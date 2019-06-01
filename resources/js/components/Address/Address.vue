<template>
    <div>
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
    </div>
</template>

<script src="./Address.js"></script>
<style src="./Address.css"></style>
