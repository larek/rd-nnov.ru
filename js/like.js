$(document).ready(function() {

    $(".btn-update-like").click(function() {
        boy = $(".like-boy").val();
        girl = $(".like-girl").val();
        $.get("/admin/like/update", { 'boy': boy, 'girl': girl }).done(function(data) {
            window.location = window.location;
        });
    });
});
