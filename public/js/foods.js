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

    $('a').on('click',function(){
        var editId = $(this).attr('id');
        getId = editId.replace('editId','');
        $.get("edit",{id:getId});
    });

    $('#imgChangeCheck').on('change',function(){
        
        if($(this).prop('checked')){
            $('#changeImg').fadeIn(1000);
        }else{
            $('#changeImg').fadeOut(1000);
        }

    })

    $('.hoverBorder').on({
        'mouseenter':function(){
            $(this).addClass('border');
        },
        'mouseleave':function(){
            $(this).removeClass('border');
        }
    })

    $('#deleteSubmit').on('click',function(){
        if(confirm('削除してもいいですか？')){
            return true;
        }else{
            return false;
        }
    });


});
