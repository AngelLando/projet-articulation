<template>
<div class="container newsletter" v-if="newsDisplayOn">
    <div class="row">
        <div class="col-12 background">
                                <a class="close pt-2" v-on:click="newsDisplayOn=!newsDisplayOn">x</a>

            <div class="thumbnail center well well-small text-center pt-3 pb-5">
                <h2 class="title_news pt-4">INSCRIPTION À LA NEWSLETTER</h2>
                
                <p class="content_news pt-3 pb-2 ">Ne manquez plus nos offres exclusives grâce à la newsletter hebdomadaire de Gazzar.</p>
                <div class="thanks" v-if="!submitNews">Merci pour votre intérêt. Vous recevrez prochainement un mail de confirmation.</div>
                <form v-if="submitNews" v-on:submit.prevent action="" method="post">
                    <div class="input-prepend "><span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="email_input" type="text" id="" name="" placeholder="Entrez votre adresse mail">
                    </div>
                    <br />
                    <input @click="sendNews()" type="submit" value="Souscrire à la Newsletter" class="btn btn-large" />
              </form>
            </div>    
        </div>
    </div>
</div>
</template>

<script src="./popup.js"></script>
<style scoped src="./popup.css"></style>

