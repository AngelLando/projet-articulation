export default {
    data() {
        return {
            newsDisplayOn:true,
            submitNews:true,
        }
    },
      methods : {
      	   sendNews: function () {
      	   	console.log("d")
      	   	this.submitNews=false;
      	   	setTimeout(function(){
      	   	 this.newsDisplayOn=false;
      	   	}, 2000);


      	   },
      	},

    mounted () {
    	var dc = localStorage.getItem('news');
    	if (dc==null || dc == "") {
    		      this.newsDisplayOn=true;
          localStorage.setItem('news',1);
    	} else{
    		this.newsDisplayOn=false;
    	}
    },
}
