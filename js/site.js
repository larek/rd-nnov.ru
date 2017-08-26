$(function(){
    
    var height = $(window).height();
    var width = $(window).width();
    height<1000 ? $(".front-banner").height(height - 200) : $(".front-banner").height(width/2);
    
  
});