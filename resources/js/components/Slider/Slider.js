export default {


    data() {
        return {
            showSlide1: true,
            showSlide2: false,
            showSlide3: false,
        }
    },

    methods:{
        changeClass: function(event){
            var clickedElement = event.target;
            $(".feature").removeClass("active");
            $(".feature").addClass("else");
            $(clickedElement).addClass("active");
            $(clickedElement).removeClass("else");
        },
    },

}


