$(function() {

  var win = $(window);
  var height = win.height();
  var width = win.width();
  var fb = $(".front-banner");

  if (height < 1000) {
    fb.height(height - 200);
  } else {
    fb.height(width / 2);
  }

});