$(function(){
    $('.remodal-confirm').on('click',function(){
        $('#modal').submit();
    });

    $('.flash_message').fadeOut(3000);
    
    $('img').on('click',function(){
        var foodImg = $(this).attr('id');
        shopMap = foodImg.replace('foodImg','shopMap');
        if($('#'+shopMap).hasClass('d-none')){
            $('#'+shopMap).removeClass('d-none');
        }else{
            $('#'+shopMap).addClass('d-none');    
        }
        
    });

});
