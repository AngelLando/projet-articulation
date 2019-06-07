<template>
    <div>
        <section class="slider">
            <div>
                <!--<div class="slider"><img class="image-slider" src="images/slider-image1.jpg" alt=""></div>!-->
                <div id="slide1" class="slider-image active" style="background-image:url(images/slider-image1.png)" v-if="showSlide1">
                    <div class="row row-image">
                        <div class="col-md-4 p-0 infos">
                            <div class="infos-inside">
                                <h2>8 juin 2019</h2>
                                <p class="descr">Dégustation de vins italiens dans les montagnes neuchâteloises.</p>
                                <button class="btn-primary btn-inscription"><a href="#" class="site-btn sb-line">Inscription</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slide2" class="slider-image" style="background-image:url(images/slider-image2.png)" v-if="showSlide2">
                    <div class="row">
                        <div class="col-md-4 p-0 infos">
                            <div class="infos-inside">
                                <h2>Jusqu'au 30 juin</h2>
                                <p class="descr">Profitez de réductions exceptionnelles sur les offres du mois !</p>
                                <button class="btn-primary btn-inscription"><a href="#" class="site-btn sb-line">Découvrir</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slide3" class="slider-image" style="background-image:url(images/slider-image3.png)" v-if="showSlide3">
                    <div class="row">
                        <div class="col-md-4 p-0 infos">
                            <div class="infos-inside">
                                <h2>Les favoris</h2>
                                <p class="descr">Découvrez les vins qui rencontrent le plus de succès dans notre catalogue.</p>
                                <button class="btn-primary btn-inscription"><a href="#" class="site-btn sb-line">Découvrir</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features-section">
            <div class="container-fluid rect-features">
                <div class="row slider-options">
                    <div class="col-md-4 p-0 feature active">
                        <div id="btn-slide-1" class="feature-inner">
                            <h2 v-on:click="showSlide1=true; showSlide2=false; showSlide3=false">DÉGUSTATION</h2>
                        </div>
                    </div>
                    <div id="btn-slide-2" class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <h2 v-on:click="showSlide1=false; showSlide2=true; showSlide3=false">OFFRES DU MOIS</h2>
                        </div>
                    </div>
                    <div id="btn-slide-3" class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <h2 v-on:click="showSlide1=false; showSlide2=false; showSlide3=true">COUPS DE COEUR</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pt45 pb70">
            <div class="row px20 pt0 recommended-products">
                <div class="col-md-5 hidden-xs hidden-sm block recommendations">Nos recommandations</div>
            </div>
        </div>
    </div>
</template>

<script src="./Slider.js"></script>
<style src="./Slider.css" scoped></style>



