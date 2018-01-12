
window.onload = function(){
    $('.nav-link[role="tab"]').bind('click', function () {
        var url = $(this).data("root")+"/" + $(this).attr("href").substr(1);
        window.history.pushState("", "", url);
    });
};
