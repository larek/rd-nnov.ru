$(document).ready(function(){

function infoAlert(option){
    if(option.type == 'error'){
        $(".infowrap").html("<div class='alert alert-danger text-center'><span class='glyphicon glyphicon glyphicon-exclamation-sign'></span> "+option.content+"</div>");
    }
    if(option.type == 'success'){
        $(".infowrap").html("<div class='alert alert-success text-center'><span class='glyphicon glyphicon glyphicon glyphicon-ok-sign'></span> "+option.content+"</div>");
    }
    if(option == false){
        $(".infowrap").html("");
    }
}

$(".btn-register").click(function(){
    var error = 0;
    infoAlert(false);
    
    $(".required").each(function(){
        if($(this).val()==""){
            error = 1;
            $(this).css('border','1px solid red');
        }
        else{
            $(this).css('border','1px solid #CCCCCC');
        }
    });
    
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

    $.get('/check-text', {text1 : $(".concept").val(), text2 : $(".menu").val()}).done(function(data){
        dataLen = $.parseJSON(data);
        text1Len = dataLen.text1;
        text2Len = dataLen.text2;
        //console.log(dataLen.text1);
    });

    if(error == 1){
        infoAlert({
            type : 'error',
            content : "Заполните обязательные поля, пожалуйста",
        });
        $(".required").each(function(){
            $(this).val()=="" ? $(this).css('border','1px solid red') : $(this).css('border','1px solid #cccccc')
        });
    }else if(!pattern.test($(".email").val())){
        infoAlert({
            type : 'error',
            content : "Неправильный формат email",
        });
        $(".email").css('border','1px solid red');
    }
    else{
        $.get('/check-text', {text1 : $(".concept").val(), text2 : $(".menu").val()}).done(function(data){
            dataLen = $.parseJSON(data);
            text1Len = dataLen.text1;
            text2Len = dataLen.text2;
            if(text1Len>140){
                infoAlert({
                    type : 'error',
                    content : "В поле КОНЦЕПИЯ РЕСТОРАНА больше 140 символов",
                });
                $(".concept").css('border','1px solid red');
            }else if(text2Len>140){
                infoAlert({
                    type : 'error',
                    content : "В поле ОСНОВНЫЕ БЛЮДА больше 140 символов",
                });
                $(".concept").css('border','1px solid red');
            }else{
                $(this).html("Идет запрос...");
                $(this).addClass('disabled');
                var title = $(".title").val();
                var concept = $(".concept").val();
                var menu = $(".menu").val();
                var address_street = $(".address_street").val();
                var address_building = $(".address_building").val();
                var address_comment = $(".address_comment").val();
                var time = $(".time").val();
                var time2 = $(".time2").val();
                var phone = $(".phone").val();
                var soc_pagev = $(".soc_pagev").val();
                var link = $(".link").val();
                var email = $(".email").val();
            
                $.get("/new-rest", {
                    title : title,
                    concept : concept,
                    menu : menu,
                    address_street : address_street,
                    address_building : address_building,
                    address_comment : address_comment,
                    time : time,
                    time2 : time2,
                    phone : phone,
                    soc_pagev : soc_pagev,
                    link : link,
                    email : email
                }).done(function(data){
                    if(data !== 'false'){
                        window.location = data;
                    }
                    console.log(data);
                }).error(function(data){
                    console.log(data);
                });

            }
            
        });
        
    }
});

$(".btn-updaterest").click(function(){
    var error = 0;
    infoAlert(false);
    $(".required").each(function(){
        if($(this).val()==""){
            error = 1;
            $(this).css('border','1px solid red');
        }
        else{
            $(this).css('border','1px solid #CCCCCC');
        }
    });
    
    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    
    if(error == 1){
        infoAlert({
            type : 'error',
            content : "Заполните обязательные поля, пожалуйста",
        });
        $(".required").each(function(){
            $(this).val()=="" ? $(this).css('border','1px solid red') : $(this).css('border','1px solid #cccccc')
        });
    }else if(!pattern.test($(".email").val())){
         infoAlert({
            type : 'error',
            content : "Неправильный формат email",
        });
        $(".email").css('border','1px solid red');
    }else{
        $(this).html("Идет запрос...");
        $(this).addClass('disabled');
        var id = $(this).attr('id');
        var title = $(".title").val();
        var concept = $(".concept").val();
        var menu = $(".menu").val();
        var address_street = $(".address_street").val();
        var address_building = $(".address_building").val();
        var address_comment = $(".address_comment").val();
        var time = $(".time").val();
        var time2 = $(".time2").val();
        var phone = $(".phone").val();
        var soc_pagev = $(".soc_pagev").val();
        var link = $(".link").val();
        var email = $(".email").val();
    
        $.get("/update-rest", {
            id : id,
            title : title,
            concept : concept,
            menu : menu,
            address_street : address_street,
            address_building : address_building,
            address_comment : address_comment,
            time : time,
            time2 : time2,
            phone : phone,
            soc_pagev : soc_pagev,
            link : link,
            email : email
        }).done(function(data){
            if(data !== 'false'){
                window.location = data;
            }
            console.log(data);
        }).error(function(data){
            console.log(data);
        });
    }
});


});