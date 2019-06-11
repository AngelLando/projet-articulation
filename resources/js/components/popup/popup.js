export default {
    data() {
        return {
            newsDisplayOn:true,
            submitNews:true,
        }
    },
      methods : {
      	   sendNews: function () {
            var dn = this;
      	   	this.submitNews=false;
      	   	setTimeout(function(){
      	   	 dn.newsDisplayOn=false;
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
