$(function () {
    

    $('.ani_box').toggle(function () {
        $('.ani_box').addClass('act');
        $('.toggle_menu').stop().slideDown(300);

    }, function () {
        $('.ani_box').removeClass('act');
        $('.toggle_menu').stop().slideUp(300);
    });
  
    
});