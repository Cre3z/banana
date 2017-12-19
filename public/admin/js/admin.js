$(document).ready(function(){
   
    $('.nav > li').on('click', function(){
//        $('.nav > li.active').removeClass('active');
        $(this).addClass('active');
        console.log($(this));
    });
    
});