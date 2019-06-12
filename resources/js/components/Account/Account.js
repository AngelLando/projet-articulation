export default {

    data() {
        return {
            showOrders: true,
            showInfos: false,
            showAdresses: false,
            showNewsletters: false,
            showFavs: false,
            showArrayLeft: false,
            showArrayRight: true,
            json: [],
            orders: [],
            test: [],
            id: document.querySelector("meta[name='user-id']"),
            products: [],
            total: 0,
            user: '',
            lastname: '',
            firstname: '',
            gender: '',
            username: '',
            email: '',
            password: '',
            birth_date: '',
            redirect: false
        }
    },
    props: ['data'],
    mounted() {
        let json = JSON.parse(this.data)
        this.json = json;
        this.user = json.user;
        this.lastname = this.user.person.lastname;
        this.firstname = this.user.person.firstname;
        this.gender = this.user.person.gender;
        this.username = this.user.username;
        this.email = this.user.email;
        this.password = this.user.password;
        this.birth_date = this.user.birth_date;

        if (this.id != null) {
            var local = JSON.parse(localStorage.getItem('storedID'))
            if (local == "" || local == null) {
            } else {

                if (json.cart != "null") {
                    console.log("local storage + BD")
                    this.products = JSON.parse(localStorage.getItem('storedID')),
                        this.products.forEach(function (product) {
                            var cartItem = {
                                product_id: product.id,
                                quantity: product.quantity,
                                product_price: product.price
                            };
                            axios.post('../add', cartItem)
                                .catch(error => {
                                    this.errors = error.response.data.errors
                                    return;
                                }).then(response => {

                                localStorage.removeItem("storedID");

                            })
                        });
                    // on merge ici
                } else {
                    console.log("seulement local")
                    this.products = JSON.parse(localStorage.getItem('storedID')),
                        this.products.forEach(function (product) {
                            var cartItem = {
                                product_id: product.id,
                                quantity: product.quantity,
                                product_price: product.price
                            };
                            axios.post('../add', cartItem)
                                .catch(error => {
                                    this.errors = error.response.data.errors
                                    return;
                                })
                        });
                }
            }
        }
    },

    methods: {
        open: function (event) {
            var clickedElement = event.target;
            $(clickedElement).parent().toggleClass("active");

            if ($('.order_container').hasClass("active")) {

                $('.arrow').addClass('up');
                $('.arrow').removeClass('down');
            } else {

                if ($('.order_line').hasClass("active")) {

                    $('.arrow').addClass('up');
                    $('.arrow').removeClass('down');
                } else {
                    $('.arrow').removeClass('up');
                    $('.arrow').addClass('down');
                }
            }
        },


        underline: function (event) {
            var clickedElement = event.target;
            $(clickedElement).addClass("active");
            $(clickedElement).removeClass("else");
            $(clickedElement).siblings().removeClass("active");
            $(clickedElement).siblings().addClass("else");
        },


        formatDate: function (value) {
            var dateToString;
            var date = '';

            if (value !== null) {
                dateToString = value.toString();
                date = dateToString.substr(0, 10)
                return date;
            }
        },

        formatMontant: function (value) {
            var formattedMontant = '';

            if (value > 0) {
                formattedMontant = (Math.ceil(value * 20) / 20).toFixed(2);
                return formattedMontant;
            }
        },

        updateUser: function () {
            this.user = {
                lastname: this.lastname,
                firstname: this.firstname,
                gender: this.gender,
                username: this.username,
                email: this.email,
                password: this.password,
                birth_date: this.birth_date
            };
            axios.post('account/update', this.user)
                .catch(error => {
                    this.errors = error.response.data.errors
                    return;
                })
        },
        deleteUser: function () {
            this.user = {
                id: this.id.content
            }

            console.log(this.user)
            axios.post('account/delete/' + this.user.id, this.user).catch(error => {
                console.log(error)
            })
                .then(response => {
                    console.log(response)
                    if(response.status == 200 && response.data == 1) {
                        this.redirect = true;
                        setTimeout(function(){ window.location.href = ('../'); }, 2000);
                    }

                })
        }
    },
}
