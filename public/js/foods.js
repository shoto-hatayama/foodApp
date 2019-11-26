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

    $('#imgChangeCheck').on('change',function(){
        console.log($(this).prop('checked'));
        if($(this).prop('checked')){
            $('#changeImg').fadeIn(1000);
        }else{
            $('#changeImg').fadeOut(1000);
        }

    })


});
