<template>
    <div>
        <section class="slider">
            <div>
                <!--<div class="slider"><img class="image-slider" src="images/slider-image1.jpg" alt=""></div>!-->
                <div id="slide1" class="slider-image active" style="background-image:url(images/slider-image1.jpg)">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 infos">
                            <h2>8 juin 2019</h2>
                            <p>Dégustation de vins italiens dans les montagnes neuchâteloises.</p>
                            <button class="btn-primary btn-inscription"><a href="#" class="site-btn sb-line">Inscription</a></button>
                        </div>
                    </div>
                </div>
                <div id="slide2" class="slider-image" style="background-image:url(images/slider-image1.jpg)">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 infos">
                            <h2>Jusqu'au 30 juin</h2>
                            <p>Profitez de réductions exceptionnelles sur les offres du mois !</p>
                            <button class="btn-primary btn-inscription"><a href="#" class="site-btn sb-line">Découvrir</a></button>
                        </div>
                    </div>
                </div>
                <div id="slide3" class="slider-image" style="background-image:url(images/slider-image1.jpg)">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 infos">
                            <h2>Les favoris</h2>
                            <p>Découvrez les vins qui rencontrent le plus de succès dans notre catalogue.</p>
                            <button class="btn-primary btn-inscription"><a href="#" class="site-btn sb-line">Découvrir</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features-section">
            <div class="container-fluid rect-features">
                <div class="row">
                    <div class="col-md-4 p-0 feature active">
                        <div id="btn-slide-1" class="feature-inner">
                            <h2><a href="">DÉGUSTATION</a></h2>
                        </div>
                    </div>
                    <div id="btn-slide-2" class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <h2><a href="">OFFRES DU MOIS</a></h2>
                        </div>
                    </div>
                    <div id="btn-slide-3" class="col-md-4 p-0 feature">
                        <div class="feature-inner">
                            <h2><a href="">COUPS DE COEUR</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script src="./Slider.js"></script>
<style src="./Slider.css" scoped></style>


