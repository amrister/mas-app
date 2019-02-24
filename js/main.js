$(function(){
  // Scroll down
  $('.arrow').on('click',function() {
    $('body,html').animate({
      scrollTop: $('.content').offset().top + 70
    },800)
  });

})
