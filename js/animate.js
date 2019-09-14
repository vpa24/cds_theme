$(document).ready(function() {
  setTimeout(function() {
    $("#edit-search-theme-form-1").animate({
      width: "0px",
      opacity: 0
    });
  }, 10000);
  $("#edit-submit-1").hover(function() {
    $("#edit-search-theme-form-1").animate({
      width: "150px",
      opacity: 1
    });
  });
});
