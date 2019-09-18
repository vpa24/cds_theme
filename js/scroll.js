$(document).ready(function() {
  $(window).trigger("scroll");
  $(window).bind("scroll", function() {
    var pixels = 20; //number of pixels before modifying styles
    if ($(window).scrollTop() > pixels) {
      $("#header").addClass("fixed bg-white");
      $("#header a").addClass("text-body");
      $('#header .search-box[type="submit"]').addClass("text-body");
    } else {
      $("#header").removeClass("fixed bg-white");
      $("#header a").removeClass("text-body");
      $('#header .search-box[type="submit"]').removeClass("text-body");
    }
  });
});
