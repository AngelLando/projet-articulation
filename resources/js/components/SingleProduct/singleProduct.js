export default {
	methods:{
		underline: function(event){
			var clickedElement = event.target;
			$(clickedElement).addClass("more_info_selected");
			$(clickedElement).siblings().removeClass("more_info_selected");
			$(clickedElement).siblings().addClass("more_info");
		},
		set_choice:function(event){
			var clickedElement = event.target;
			$(clickedElement).addClass("product_selection_selected");
			$(clickedElement).siblings().removeClass("product_selection_selected");
			$(clickedElement).siblings().addClass("product_selection");
		},
		  input: function (test) {
      localStorage.setItem('storedData', test);
      console.log(localStorage.getItem('storedData'));
  }
	},
	watch: {

},
	data() {
		return {
			product : [],
			isHiddenDescr:true,
			isHiddenInfo:false,
			isHiddenRating:false,
		}
	},
	props : ['prod'],
	mounted () {
		let json = JSON.parse(this.prod);
        this.product = json.product;
        this.products = json.recommandations;
	},

}

