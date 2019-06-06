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

        }
    },


    props : ['prod'],
    mounted () {

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
