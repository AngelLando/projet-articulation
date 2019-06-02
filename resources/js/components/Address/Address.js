export default {
    data() {
        return {
            address : '',
            firstname: '',
            lastname : '',
            gender : '',
            street : '',
            npa : '',
            city : '',
            region : '',
            country : '',
        }
    },
    //props : ['prod'],
    mounted () {

    },
    methods : {
      submitAddress (e) {
        //  e.preventDefault();
          this.address  = {
              firstname: this.firstname,
              lastname: this.lastname,
              gender: this.gender,
              street: this.street,
              npa: this.npa,
              city: this.city,
              region: this.region,
              country: this.country,
          };
          this.data = {
              address : this.address,
              products : JSON.parse(this.cart),
          }
          console.log(this.data)
          axios.post('check', this.data).then(console.log('formulaire envoyé!')).then(function (response) {
              console.log(response);
          })
      }
    },props : ['cart'],

}

