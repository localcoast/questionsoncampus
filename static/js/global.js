(function($) {
    "use strict";
    $.fn.wln_breadCrumbs = function() {
        if (1 === $(this).find('a').length) {
            $(this).find('.divider').remove();
        }
    };

    $.fn.wln_navigation = function() {
        $(this).find('li ul').each(function() {
            $(this).addClass('nav').addClass('nav-list');
        });
    };

    $(document).ready(function() {
        $('.breadcrumb').wln_breadCrumbs();
        $('.nav-tabs').wln_navigation();
    });
})(jQuery);