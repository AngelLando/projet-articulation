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
            orders : [],
            test: [],
            id:document.querySelector("meta[name='user-id']"),

        }
    },
    props : ['data'],
    mounted () {
        let json = JSON.parse(this.data)
        this.orders = json;

        console.log(json)

        if (this.id != null) {
            var local = JSON.parse(localStorage.getItem('storedID'))
            if (local!="") {
                /**if (JSON.parse(this.cart)!=null) {

                }**/
            }

        }
    },

    methods:{
        underline: function(event){
            var clickedElement = event.target;
            $(clickedElement).addClass("active");
            $(clickedElement).removeClass("else");
            $(clickedElement).siblings().removeClass("active");
            $(clickedElement).siblings().addClass("else");
        },

    },
}
