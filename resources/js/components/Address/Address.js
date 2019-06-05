export default {
  data() {
    return {
      payment_method:'',
      comment:'',
      address1 : '',
      firstname1: '',
      lastname1 : '',
      gender1 : '',
      street1 : '',
      npa1 : '',
      city1 : '',
      region1 : '',
      country1 : '',
      address2 : '',
      firstname2: '',
      lastname2 : '',
      gender2 : '',
      street2 : '',
      npa2 : '',
      city2 : '',
      region2 : '',
      country2 : '',
      address3 : '',
      firstname3: '',
      lastname3 : '',
      gender3 : '',
      street3 : '',
      npa3 : '',
      city3 : '',
      region3 : '',
      country3 : '',
      isHiddenShipTo:false,
      isHiddenBillTo:false,
      isHiddenPromoCode:false,
      isError:false,
      subtotal:0,
      delivery:25,
      tva:0,
      tvaPercent:7.7,
      total:0,
      promocode:10,
        promotion : false,
      rabais:'',
      errors: {},
        comment:'',
        payment_method: '',
        discount: 10,
    }
  },
    //props : ['prod'],
    mounted () {
      this.products = JSON.parse(this.cart);
      var subtotal = 0;
      this.products.forEach(function(product) {
        var total =  product.price*product.packaging_capacity;
        product.totalprice=total
        subtotal=subtotal+product.totalprice;
      });
      this.subtotal=subtotal
      this.tva = Math.round(this.tvaPercent*this.subtotal/100) ;
      console.log(this.tva)
      console.log(this.subtotal)
      console.log(this.delivery)
      this.total = this.subtotal+this.tva+this.delivery;
    },
    beforeMount(){
      this.total= this.tva+this.subtotal+this.delivery;
      
    },
    methods : {
      checkPromoCode: function(){
        var enteredCode = this.promocode;
        if (enteredCode=="cuki") {
          this.isHiddenPromoCode=true;
          this.total= this.tva+this.subtotal+this.delivery;
          this.rabais = this.total*this.discount/100;
          this.total = this.total-this.rabais;
          this.promotion = this.discount;
          return;
        }else{
          this.isError=true;
        }

      },
      submitAddress (isHiddenBillTo,isHiddenShipTo) {
        //  e.preventDefault();
        this.address1  = {
          firstname1: this.firstname1,
          lastname1: this.lastname1,
          gender1: this.gender1,
          street1: this.street1,
          npa1: this.npa1,
          city1: this.city1,
          region1: this.region1,
          country1: this.country1,
        };
        if (isHiddenShipTo) {
          this.address2  = {
            firstname2: this.firstname2,
            lastname2: this.lastname2,
            gender2: this.gender2,
            street2: this.street2,
            npa2: this.npa2,
            city2: this.city2,
            region2: this.region2,
            country2: this.country2,
          };}
          else{
            this.address2 = null;
          }
          if (isHiddenBillTo) {
            this.address3  = {
              firstname3: this.firstname3,
              lastname3: this.lastname3,
              gender3: this.gender3,
              street3: this.street3,
              npa3: this.npa3,
              city3: this.city3,
              region3: this.region3,
              country3: this.country3,
            };}
            else{
              this.address3=null;
            }
            this.data = {
              address1 : this.address1,
              address2 : this.address2,
              address3 : this.address3,
              products : JSON.parse(this.cart),
                comment : this.comment,
                payment_method : this.payment_method,
                promotion: this.promotion
            }
            console.log(this.data);
            axios.post('check', this.data).catch(error => {
              this.errors = error.response.data.errors
            })
          },


        },props : ['cart'],

      }

