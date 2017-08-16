$(document).ready(function(){
	$("body").keydown(function(r){
		if(r.keyCode == 80){
			$(".front-banner").css({
				background: 'url("/images/front-page-banner.jpg") no-repeat'
			});
			$(".front-banner-description").css({
				display:'none'
			})
			$(".container1").prepend("<div style='position:absolute; text-align: center; width: 100%; padding: 30px; color:white; font-size: 60px'>Дрим тим нахуй</div>");
		}
	})
})