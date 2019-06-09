<template>
    <div>
    <li class="nav-item" @mouseover="getCart()" @mouseleave="hover = false">
        <img src="images/shopping-cart.svg" class="icon" width="23" height="23" alt="Panier">
        <a class="nav-link" :href="url">PANIER</a>
    </li>
    <div v-if="hover == true" style="display : block; position: absolute; background-color: white; z-index: 400000; ">
        <ul v-for="cartItem in cart">
            <p>{{cartItem.name}}</p>
            <p>{{cartItem.quantity}}</p>
        </ul>
    </div>
    </div>
</template>

<script src="./cartNav.js"></script>
