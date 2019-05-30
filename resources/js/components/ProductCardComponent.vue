<template>
<div class="row m-5">
<div class="col-sm-3">
<img src="https://via.placeholder.com/300x400" alt="IMG-PRODUCT">
</div>
<div class="col-sm-8">
<h4>Année</h4>
<h3>Nom du vin</h3>
<h3>Prix</h3>
<div class="input-group spinner">
<input type="text" class="form-control" value="42">
<div class="input-group-btn-vertical">
<button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
<button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
</div>
</div>
<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
<!-- Button -->
<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
Add to Cart
</button>
</div>
</div>
</div>
</template>


    <script>
   /**export default {
        data(){
            return {
                product : []
            }
        },
        beforeMount(){
            let url = `/api/products/${this.$route.params.id}`
            axios.get(url).then(response => this.product = response.data)      
        }
    }**/
    </script>


<style>
.spinner {
width: 100px;
}
.spinner input {
text-align: right;
}
.input-group-btn-vertical {
position: relative;
white-space: nowrap;
width: 1%;
vertical-align: middle;
display: table-cell;
}
.input-group-btn-vertical > .btn {
display: block;
float: none;
width: 100%;
max-width: 100%;
padding: 8px;
margin-left: -1px;
position: relative;
border-radius: 0;
}
.input-group-btn-vertical > .btn:first-child {
border-top-right-radius: 4px;
}
.input-group-btn-vertical > .btn:last-child {
margin-top: -2px;
border-bottom-right-radius: 4px;
}
.input-group-btn-vertical i{
position: absolute;
top: 0;
left: 4px;
}
</style>