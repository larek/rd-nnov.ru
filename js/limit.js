function limitChars(textid, limit, infodiv){
    var $textId = $('#' + textid);
    var $infoDiv = $('#' + infodiv);
    var textlength = $textId.val().length;
    if (textlength > limit) {
        $infoDiv.html('Вам нельзя написать более чем ' + limit + ' символов!');
        $textId.val(text.substr(0,limit));
        return false;
    } else {
        $infoDiv.html('У Вас осталось '+ (limit - textlength) + ' символов.');
        return true;
    }
}

$(function(){
    $('#concept').keyup(function(){
        limitChars('concept', 140, 'infodiv-concept');
    });

    $('#menu').keyup(function(){
        limitChars('menu', 140, 'infodiv-menu');
    });

});