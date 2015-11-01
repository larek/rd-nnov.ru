function infoAlert(option){
    if(option.type == 'error'){
        $(".infowrap").html("<div class='alert alert-danger text-center'><span class='glyphicon glyphicon glyphicon-exclamation-sign'></span> "+option.content+"</div>");
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
    if(error == 1){
        infoAlert({
            type : 'error',
            content : "Заполните обязательные поля, пожалуйста",
        });
        $(".required").each(function(){
            $(this).val()=="" ? $(this).css('border','1px solid red') : $(this).css('border','1px solid #cccccc')
        });
    }else{
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
            link : link
        }).done(function(data){
            console.log(data);
        }).error(function(data){
            console.log(data);
        });
    }
});