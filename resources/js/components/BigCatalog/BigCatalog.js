import 'vue-slider-component/theme/antd.css'
import VueSlider from "vue-slider-component";
import 'vue-slider-component/theme/antd.css'


export default {

    components: {
        VueSlider
    },

    data() {
        return {
            products : [],
            value_2: [10.70, 915.50],
            appellations: [],
            tags: [],
            selected_kinds: [],
            selected_formats: [],
            selected_packagings: [],
            selected_appellations: [],
            selected_tags: [],
            selected_countries: [],
            selected_years: [],
            quantity : 1,
            errors : {},
            start : ['1'],
            counter: 0,
            cartItem : '',
            id: document.querySelector("meta[name='user-id']"),
        }
    },

    props : ['prod'],
    mounted () {
        let json = JSON.parse(this.prod);
        this.products = json.products;
        this.appellations = json.appellations;
        this.tags = json.tags;
        this.$nextTick(() => {
            var numItems = document.getElementsByClassName("counter").length;
            this.counter=numItems;
        })

    },

    computed: {
        unique () {
            return function (arr, key) {
                var output = []
                var usedKeys = {}
                for (var i = 0; i < arr.length; i++) {
                    if (!usedKeys[arr[i][key]]) {
                        usedKeys[arr[i][key]] = true
                        output.push(arr[i])
                    }
                }
                return output
            }
        },



    },


    methods: {

        reStartCounter: function () {
            console.log("lkj");
            let vm = this;
            setTimeout(function () {
                vm.updateCounter();
            }, 10);
            var clickedElement = event.target;

            if ($(clickedElement).is(':checked')) {
                if($(clickedElement).parent().parent().parent().children(':nth-child(1)').hasClass("filter-used")) {

                } else {
                    $(clickedElement).parent().parent().parent().children(':nth-child(1)').addClass("filter-used")
                }
            } else {
                $(clickedElement).parent().parent().parent().children(':nth-child(1)').removeClass("filter-used")
            }




        },

        updateCounter:function(){
          var numItems = document.getElementsByClassName("counter").length;
          this.counter = numItems
        },

        toggleHeart: function(event){
            var clickedElement = event.target;

            if($(clickedElement).hasClass("full")) {
                $(clickedElement).addClass("empty");
                $(clickedElement).removeClass("full");
            } else {
                $(clickedElement).addClass("full");
                $(clickedElement).removeClass("empty");
            }
        },

        isInArray: function (selection, produc_appell) {
            const finalarray = [];
            selection.forEach((s) => {
                produc_appell.forEach((a) => {
                    if (a.name === s) {
                        finalarray.push(a.name)
                    }
                });
            })
            if(finalarray.length > 0) {
                return 1;
            } else {
                return 0;
            }
        },

        setQuantity:function(product){
            this.quantity = event.target.value;
        },


        transform: function (selection, product) {
            const intArray = [];
            const resultArray = [];

            selection.forEach((s) => {
                intArray.push(parseInt(s, 10))
                intArray.push((parseInt(s, 10))+1)
            })

            intArray.forEach((i) => {
                if (product.year == i) {
                    resultArray.push(product.year)
                }
            })
            if(resultArray.length > 0) {
                return 1;
            } else {
                return 0;
            }
        },


        input: function (clickedProduct) {
            if (this.id != null) {
                this.cartItem  = {
                    product_id: clickedProduct.id,
                    quantity: this.quantity
                };
                axios.post('add', this.cartItem)
                .catch(error => {
                    this.errors = error.response.data.errors
                    return;
                })
            }
            if (this.quantity>clickedProduct.stock || this.quantity<=0) {
                console.log("erreur")
            } else {
                var clickedElement = event.target;

                if($(clickedElement).hasClass("product_button")) {
                    $(clickedElement).addClass("item-added");
                    setTimeout(function () {
                        $(clickedElement).removeClass('item-added');
                    }, 1500);
                } else {
                    $(clickedElement).parent().parent().parent().parent().children(':nth-child(2)').addClass("item-added");
                    setTimeout(function () {
                        $(clickedElement).parent().parent().parent().parent().children(':nth-child(2)').removeClass('item-added');
                    }, 1500);
                }
                if (this.id == null) {

                 var local = localStorage.getItem('storedID');
                 local = local ? JSON.parse(local): [];
                 var prodId = clickedProduct.id
                 var q = parseInt(this.quantity, 10);
                 var alreadyExist = false;
                 local.forEach(function(element) {
                    if (element.id == prodId) {
                        alreadyExist=true;
                        var f = parseInt(element.quantity,10)
                        element.quantity = q+f;
                    }
                });
                 if (alreadyExist==false) {
                    local.push({
                      "id":clickedProduct.id,
                      "slug":clickedProduct.slug,
                      "packaging_capacity":clickedProduct.packaging_capacity,
                      "quantity":this.quantity,
                      "path_image":clickedProduct.path_image,
                      "name":clickedProduct.name,
                      "price": clickedProduct.price,
                      "format":clickedProduct.format,
                  })
                }
                localStorage.setItem('storedID', JSON.stringify(local));
                                    this.cart = JSON.parse(localStorage.getItem('storedID'));
                    $('.numberItems').text(this.cart.length);
            }
            }
        },

        removeColorFilter: function() {
            var clickedElement = event.target;
            $(clickedElement).parent().parent().children(':nth-child(1)').removeClass("filter-used");
        },


        resetFilter1: function() {
            $(".filter1:checkbox").prop('checked', false);
            this.selected_kinds = [];
            this.reStartCounter();
            this.removeColorFilter();
        },

        resetFilter2: function() {
            $(".filter2:checkbox").prop('checked', false);
            this.selected_formats = [];
            this.reStartCounter();
            this.removeColorFilter();
        },

        resetFilter3: function() {
            $(".filter3:checkbox").prop('checked', false);
            this.selected_packagings = [];
            this.reStartCounter();
            this.removeColorFilter();
        },

        resetFilter4: function() {
            $(".filter4:checkbox").prop('checked', false);
            this.selected_years = [];
            this.reStartCounter();
            this.removeColorFilter();
        },

        resetFilter5: function() {
            $(".filter5:checkbox").prop('checked', false);
            this.selected_appellations = [];
            this.reStartCounter()
        },

        resetFilter6: function() {
            $(".filter6:checkbox").prop('checked', false);
            this.selected_tags = [];
            this.reStartCounter();
            this.removeColorFilter();
        },

        resetFilter7: function() {
            $(".filter7:checkbox").prop('checked', false);
            this.selected_countries = [];
            this.reStartCounter();
            this.removeColorFilter();
        },

        resetAllFilters: function() {
            $('.vue-slider-process').css({
                left: '0%',
                width: '100%',
            });
            $('.vue-slider-dot:nth-of-type(2)').css({
                left: '0%',
            });
            $('.vue-slider-dot:nth-of-type(3)').css({
                left: '100%',
            });
            this.value_2[0] = 10.70;
            this.value_2[1] = 915.50;

            $("div.filter_option").removeClass('filter-used');
            this.resetFilter1();
            this.resetFilter2();
            this.resetFilter3();
            this.resetFilter4();
            this.resetFilter5();
            this.resetFilter6();
            this.resetFilter7();
        },

        sortByPrice: function(products) {

            var clickedElement = event.target.value;

            console.log(clickedElement);

            if (clickedElement == 1) {
                products.sort(sortByLow);
            } else if (clickedElement == 2) {
                products.sort(sortByHigh);
            } else {
                products.sort(sortDefault);
            }

            function sortDefault(a, b) {
                const nameA = a.name;
                const nameB = b.name;

                let comparison = 0;
                if (nameA > nameB) {
                    comparison = 1;
                } else if (nameA < nameB) {
                    comparison = -1;
                }
                return comparison;
            }

            function sortByLow(a, b) {
                const priceA = a.price;
                const priceB = b.price;

                let comparison = 0;
                if (priceA > priceB) {
                    comparison = 1;
                } else if (priceA < priceB) {
                    comparison = -1;
                }
                return comparison;
            }

            function sortByHigh(a, b) {
                const priceA = a.price;
                const priceB = b.price;

                let comparison = 0;
                if (priceA > priceB) {
                    comparison = -1;
                } else if (priceA < priceB) {
                    comparison = 1;
                }
                return comparison;
            }

        }
    },
}
