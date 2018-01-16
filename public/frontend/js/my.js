// dropdown menu auto expand
$('ul.nav li.dropdown').hover(function () {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function () {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
// to top
// When the user scrolls down 200px from the top of the document, show the button
jQuery(document).ready(function ($) {
  if ($("#toTop").length > 0) {
    $(window).scroll(function () {
      var e = $(window).scrollTop();
      if (e > 200) {
        $("#toTop").show()
      } else {
        $("#toTop").hide()
      }
    });
    $("#toTop").click(function () {
      $('body,html').animate({
        scrollTop: 0
      })
    })
  }
});