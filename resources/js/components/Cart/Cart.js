export default {
	data() {
		return {
			products : [],

		}
	},
	methods:{
		delete:function(){
			console.log("test")
		}
	},
	computed:{
		total: function(){
			return 34*$('option').text()
			console.log($('.choice_list').val())
		},

	},
	
	props : ['cart'],
	mounted () {
		this.products = JSON.parse(this.cart);
	},

}
