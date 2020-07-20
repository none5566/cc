$(function() {
    var url = window.location;
    var element = $('ul#sidebarnav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent().addClass('active');
    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent().addClass('active').children('a').addClass('active');
        } else {
            break;
        }
    }
    $('#sidebarnav a').on('click', function(e) {
        if (!$(this).hasClass("active")) {
            $("ul", $(this).parents("ul:first")).removeClass("in");
            $("a", $(this).parents("ul:first")).removeClass("active");
            $(this).next("ul").addClass("in");
            $(this).addClass("active");
        } else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents("ul:first").removeClass("active");
            $(this).next("ul").removeClass("in");
        }
    })
    $('#sidebarnav >li >a.has-arrow').on('click', function(e) {
        e.preventDefault();
    });
});