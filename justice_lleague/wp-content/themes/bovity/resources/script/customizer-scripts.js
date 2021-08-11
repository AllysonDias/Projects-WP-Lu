jQuery(document).ready(function($) {
    //"use strict";

    //FontAwesome Icon Control JS
    $('body').on('click', '.avadanta-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.avadanta-icon-list').prev('.avadanta-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.avadanta-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.avadanta-selected-icon', function(){
        $(this).next().slideToggle();
    });


});