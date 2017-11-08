(function(){

    function infoAlert(option) {
        var infoWrap = $(".infowrap");
        var preKind = "<div class='alert alert-";
        var preGlyph = " text-center'><span class='glyphicon glyphicon-";
        var preContent = "-sign'></span> ";

        var result = "";

        if (option.type === "error"){
            result += preKind + "danger" + preGlyph + "exclamation";
            result += preContent + option.content + "</div>";
        }

        if (option.type === "success"){
            result += preKind + "success" + preGlyph + "ok";
            result += preContent + option.content + "</div>";
        }

        infoWrap.html(result);
    }

    function checkEachRequiredField(){
        var eachRequired = $(this);
        if (eachRequired.val() == "") {
            infoAlert({
                type: "error",
                content: "Заполните обязательные поля, пожалуйста",
            });
            eachRequired.css("border","1px solid red");
            eachRequired.addClass('rd-nnov-bad-field');
        } else {
            eachRequired.css("border","1px solid #ccc");
            eachRequired.removeClass("rd-nnov-bad-field");
        }
    }

    $(function(){

    $(".btn-register").click(function(){

        var $email = $(".email");
        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

        // empty alerts
        infoAlert(false);

        // check required fields
        $(".required").each(checkEachRequiredField);
        

        // check email
        if (pattern.test($email.val())) {

            $email.removeClass("rd-nnov-bad-field");

        } else {

            infoAlert({
                type : "error",
                content : "Неправильный формат email",
            });
            $email.css("border","1px solid red");
            $email.addClass("rd-nnov-bad-field");

        }

        // if required and email fields filled correct
        if (!$(".required, .email").hasClass("rd-nnov-bad-field")) {

            var $concept = $(".concept");
            var textOneTooLong = $concept.val() > 140;
            var textTwoTooLong = $(".menu").val() > 140;

            if (textOneTooLong) {
                infoAlert({
                    type : "error",
                    content : "В поле КОНЦЕПИЯ РЕСТОРАНА больше 140 символов",
                });
                $concept.css("border","1px solid red");
            } else if (textTwoTooLong) {
                infoAlert({
                    type : "error",
                    content : "В поле ОСНОВНЫЕ БЛЮДА больше 140 символов",
                });
                $concept.css("border","1px solid red");
            } else {
                var $this = $(this);
                $this.html("Идет запрос...");
                $this.addClass("disabled");

                var options = {
                    title: $(".title").val(),
                    concept: $(".concept").val(),
                    menu: $(".menu").val(),
                    address_street: $(".address_street").val(),
                    address_building: $(".address_building").val(),
                    address_comment: $(".address_comment").val(),
                    time: $(".time").val(),
                    time2: $(".time2").val(),
                    phone: $(".phone").val(),
                    soc_pagev: $(".soc_pagev").val(),
                    link: $(".link").val(),
                    email: $(".email").val()
                };
            
                $.get("/new-rest", options).done(function(data){
                    if (data !== "false") {
                        window.location = data;
                    }
                    console.log(data);
                }).error(function(data){
                    console.log(data);
                });

            }

        }
    });

    $(".btn-updaterest").click(function(){

        var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
        var $email = $(".email");

        infoAlert(false);

        // check required
        $(".required").each(checkEachRequiredField);

        // check email
        if (pattern.test($email.val())) {
            $email.removeClass("rd-nnov-bad-field");
        } else {
             infoAlert({
                type : "error",
                content : "Неправильный формат email",
            });
            $email.css("border","1px solid red");
            $email.addClass("rd-nnov-bad-field");
        }

        // if required and email fields filled correct
        if (!$(".required, .email").hasClass("rd-nnov-bad-field")) {
            var $this = $(this);
            $this.html("Идет запрос...");
            $this.addClass("disabled");

            var options = {
                id: $this.attr("id"),
                title: $(".title").val(),
                concept: $(".concept").val(),
                menu: $(".menu").val(),
                address_street: $(".address_street").val(),
                address_building: $(".address_building").val(),
                address_comment: $(".address_comment").val(),
                time: $(".time").val(),
                time2: $(".time2").val(),
                phone: $(".phone").val(),
                soc_pagev: $(".soc_pagev").val(),
                link: $(".link").val(),
                email: $email.val()
            };
        
            $.get("/update-rest", options).done(function(data){
                if(data !== "false"){
                    window.location = data;
                }
                console.log(data);
            }).error(function(data){
                console.log(data);
            });
        }
    });

    });

})();