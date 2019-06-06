export default {

    data() {
        return {
            showOrders: true,
            showInfos: false,
            showAdresses: false,
            showNewsletters: false,
            showFavs: false,
            orders : [],
        }
    },
    props : ['data'],
    mounted () {
        let json = JSON.parse(this.data)
        console.log(json)
        this.orders = json;
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
